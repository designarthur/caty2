<?php
// api/openai_chat.php - Handles AI Chat interactions and creates quote requests.

// --- Setup & Includes ---
ini_set('display_errors', 0);
error_reporting(E_ALL);
ini_set('error_log', __DIR__ . '/../logs/php_errors.log');
if (!file_exists(__DIR__ . '/../logs')) {
    mkdir(__DIR__ . '/../logs', 0775, true);
}


session_start();
require_once __DIR__ . '/../includes/db.php';
require_once __DIR__ . '/../includes/functions.php';
require_once __DIR__ . '/../includes/session.php';

// --- Global Exception Handler for JSON Responses ---
set_exception_handler(function ($exception) {
    error_log("FATAL EXCEPTION in openai_chat.php: " . $exception->getMessage() . " in " . $exception->getFile() . " on line " . $exception->getLine());
    if (!headers_sent()) {
        header('Content-Type: application/json');
        http_response_code(500);
    }
    echo json_encode(['success' => false, 'message' => 'A server error occurred. Our team has been notified.']);
    exit;
});

header('Content-Type: application/json');

// --- Configuration & Pre-checks ---
$openaiApiKey = $_ENV['OPENAI_API_KEY'] ?? '';
if (empty($openaiApiKey)) {
    throw new Exception("OpenAI API key is not configured in the .env file.");
}
$companyName = getSystemSetting('company_name') ?? 'Catdump';
$aiModel = 'gpt-4o-mini';


// --- Re-usable getOpenAIResponse function ---
function getOpenAIResponse(array $messages, array $tools, string $apiKey, string $model): array {
    $url = "https://api.openai.com/v1/chat/completions";
    $headers = ['Content-Type: application/json', 'Authorization: Bearer ' . $apiKey];
    $payload = ['model' => $model, 'messages' => $messages, 'tools' => $tools, 'tool_choice' => 'auto'];

    $ch = curl_init($url);
    curl_setopt_array($ch, [CURLOPT_RETURNTRANSFER => true, CURLOPT_POST => true, CURLOPT_POSTFIELDS => json_encode($payload), CURLOPT_HTTPHEADER => $headers, CURLOPT_TIMEOUT => 90]);
    
    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $error = curl_error($ch);
    curl_close($ch);

    if ($response === false) throw new Exception("cURL Error: " . $error);

    $responseData = json_decode($response, true);
    if (json_last_error() !== JSON_ERROR_NONE) {
        throw new Exception("Failed to decode JSON response from OpenAI. Raw response: " . $response);
    }
    if ($httpCode !== 200) {
        throw new Exception("OpenAI API Error (HTTP {$httpCode}): " . ($responseData['error']['message'] ?? 'Unknown Error'));
    }
    

    return $responseData;
}

// --- File Upload Handler ---
function handleFileUploads(): array {
    $uploaded_urls = [];
    $uploadDir = __DIR__ . '/../uploads/junk_removal_media/';
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0775, true);
    }

    if (!empty($_FILES['media_files']['name'][0])) {
        foreach ($_FILES['media_files']['name'] as $key => $name) {
            if ($_FILES['media_files']['error'][$key] == UPLOAD_ERR_OK) {
                $fileTmpPath = $_FILES['media_files']['tmp_name'][$key];
                $fileExtension = strtolower(pathinfo($name, PATHINFO_EXTENSION));
                $newFileName = uniqid('media_') . '.' . $fileExtension;
                $destPath = $uploadDir . $newFileName;

                if (move_uploaded_file($fileTmpPath, $destPath)) {
                    $uploaded_urls[] = '/uploads/junk_removal_media/' . $newFileName;
                } else {
                    error_log("Failed to move uploaded file: " . $_FILES['media_files']['error'][$key]);
                }
            } else {
                error_log("File upload error: " . $_FILES['media_files']['error'][$key]);
            }
        }
    }
    return $uploaded_urls;
}


// --- Main API Logic ---
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userMessageText = trim($_POST['message'] ?? '');
    $initialServiceType = $_POST['initial_service_type'] ?? null;
    $uploadedMediaUrls = [];

    // Handle file uploads if present
    if (isset($_FILES['media_files'])) {
        $uploadedMediaUrls = handleFileUploads();
    }

    if (empty($userMessageText) && empty($uploadedMediaUrls)) {
        echo json_encode(['success' => false, 'message' => 'Message or media cannot be empty.']);
        exit;
    }

    global $conn;
    $userId = $_SESSION['user_id'] ?? null;
    $conversationId = $_SESSION['conversation_id'] ?? null;

    if (!$conversationId) {
        $stmt_conv = $conn->prepare("INSERT INTO conversations (user_id, initial_service_type) VALUES (?, ?)");
        $stmt_conv->bind_param("is", $userId, $initialServiceType);
        $stmt_conv->execute();
        $conversationId = $conn->insert_id;
        $_SESSION['conversation_id'] = $conversationId;
        $stmt_conv->close();
    }

    // --- Dynamic loading of system prompt and tools ---
    // Initialize with a generic fallback in case service file is missing or doesn't define them
    $system_prompt = "You are a helpful assistant for {$companyName}. Please let me know what service you are interested in (e.g., Equipment Rental, Junk Removal).";
    $tools = []; 

    $service_file = __DIR__ . '/services/' . $initialServiceType . '.php'; // Use initialServiceType as the filename
    if (!empty($initialServiceType) && file_exists($service_file)) {
        require_once $service_file; // This file is expected to define $system_prompt and $tools
    }
    
    // Ensure $system_prompt and $tools are actually defined after includes
    // If the service file was included but failed to define them, throw an error.
    if (!isset($system_prompt) || !isset($tools)) {
        throw new Exception("Service file for '{$initialServiceType}' did not properly define \$system_prompt or \$tools.");
    }

    $messages = [['role' => 'system', 'content' => $system_prompt]];
    $stmt_fetch = $conn->prepare("SELECT role, content FROM chat_messages WHERE conversation_id = ? ORDER BY created_at ASC");
    $stmt_fetch->bind_param("i", $conversationId);
    $stmt_fetch->execute();
    $result_messages = $stmt_fetch->get_result();
    while ($row = $result_messages->fetch_assoc()) {
        $messages[] = ['role' => $row['role'], 'content' => $row['content']];
    }
    $stmt_fetch->close();

    // Prepare message content for OpenAI, including image URLs if available
    $message_content = [['type' => 'text', 'text' => $userMessageText]];
    foreach ($uploadedMediaUrls as $url) {
        $full_url = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]" . $url;
        $message_content[] = ['type' => 'image_url', 'image_url' => ['url' => $full_url]];
    }
    $messages[] = ['role' => 'user', 'content' => $message_content];
    
    // --- Call OpenAI API ---
    $apiResponse = getOpenAIResponse($messages, $tools, $openaiApiKey, $aiModel);
    $responseMessage = $apiResponse['choices'][0]['message'];
    $aiResponseText = $responseMessage['content'] ?? "I'm sorry, I'm having trouble processing that. Could you try rephrasing?";
    
    $jsonResponse = ['success' => true, 'ai_response' => trim($aiResponseText), 'is_info_collected' => false];

    // --- Process AI Response ---
    if (isset($responseMessage['tool_calls'])) {
        $toolCall = $responseMessage['tool_calls'][0]['function'];
        if ($toolCall['name'] === 'submit_quote_request') {
           $arguments = json_decode($toolCall['arguments'], true);

            // Check if JSON decoding was successful before proceeding
            if (json_last_error() !== JSON_ERROR_NONE) {
                // Log the error and the invalid data for debugging
                error_log("Failed to decode JSON from tool_call arguments. Raw data: " . $toolCall['arguments']);
                // Throw a new exception to be caught by your handler
                throw new Exception("The AI returned an invalid data format. Could not process the request.");
            }

            $conn->begin_transaction();
            try {
                // Determine the initial status for the quote
                $quote_status = 'pending'; // Default for equipment rental
                if ($arguments['service_type'] === 'junk_removal') {
                    // Set status to 'customer_draft' for junk removal requests
                    $quote_status = 'customer_draft';
                }

                // Ensure customer_type is handled correctly, defaulting if not provided
                $customer_type = $arguments['customer_type'] ?? 'Residential';

                $stmt_user_check = $conn->prepare("SELECT id FROM users WHERE email = ?");
                $stmt_user_check->bind_param("s", $arguments['customer_email']);
                $stmt_user_check->execute();
                $user_result = $stmt_user_check->get_result();
                if ($user_result->num_rows > 0) {
                    $userId = $user_result->fetch_assoc()['id'];
                } else {
                    $name_parts = explode(' ', $arguments['customer_name'], 2);
                    $firstName = $name_parts[0];
                    $lastName = $name_parts[1] ?? '';
                    $temp_password = generateToken(8);
                    $hashed_password = hashPassword($temp_password);
                    $stmt_create_user = $conn->prepare("INSERT INTO users (first_name, last_name, email, phone_number, password_hash, role) VALUES (?, ?, ?, ?, ?, 'customer')");
                    $stmt_create_user->bind_param("sssss", $firstName, $lastName, $arguments['customer_email'], $arguments['customer_phone'], $hashed_password);
                    $stmt_create_user->execute();
                    $userId = $conn->insert_id;
                    $stmt_create_user->close();
                }
                $stmt_user_check->close();

                // Insert into quotes table with the determined status
                $stmt_quote = $conn->prepare("INSERT INTO quotes (user_id, service_type, status, customer_type, location, delivery_date, removal_date, delivery_time, removal_time, live_load_needed, is_urgent, driver_instructions, quote_details) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
                $details_json = json_encode($arguments);
                $delivery_date = $arguments['service_type'] === 'equipment_rental' ? ($arguments['service_date'] ?? null) : null;
                $removal_date = $arguments['service_type'] === 'junk_removal' ? ($arguments['service_date'] ?? null) : null;
                $delivery_time = $arguments['service_type'] === 'equipment_rental' ? ($arguments['service_time'] ?? null) : null;
                $removal_time = $arguments['service_type'] === 'junk_removal' ? ($arguments['service_time'] ?? null) : null; // CORRECTED LINE HERE
                $live_load = (int)($arguments['live_load_needed'] ?? 0);
                $is_urgent = (int)($arguments['is_urgent'] ?? 0);
                $driver_instructions = $arguments['driver_instructions'] ?? null;

                $stmt_quote->bind_param("isssssssiisss", $userId, $arguments['service_type'], $quote_status, $customer_type, $arguments['location'], $delivery_date, $removal_date, $delivery_time, $removal_time, $live_load, $is_urgent, $driver_instructions, $details_json);
                $stmt_quote->execute();
                $quoteId = $conn->insert_id;
                $stmt_quote->close();

                if ($arguments['service_type'] === 'equipment_rental' && !empty($arguments['equipment_details'])) {
                    $stmt_eq = $conn->prepare("INSERT INTO quote_equipment_details (quote_id, equipment_name, quantity, duration_days, specific_needs) VALUES (?, ?, ?, ?, ?)");
                    foreach ($arguments['equipment_details'] as $item) {
                        $equipment_name = $item['equipment_name'] ?? 'N/A';
                        $quantity = $item['quantity'] ?? 1;
                        $duration_days = $item['duration_days'] ?? null;
                        $specific_needs = $item['specific_needs'] ?? null;
                        
                        $stmt_eq->bind_param("isiss", $quoteId, $equipment_name, $quantity, $duration_days, $specific_needs);
                        $stmt_eq->execute();
                    }
                    $stmt_eq->close();
                } elseif ($arguments['service_type'] === 'junk_removal' && !empty($arguments['junk_details'])) {
                    $stmt_junk = $conn->prepare("INSERT INTO junk_removal_details (quote_id, junk_items_json, recommended_dumpster_size, additional_comment, media_urls_json) VALUES (?, ?, ?, ?, ?)");
                    
                    $junk_items_json = json_encode($arguments['junk_details']['junk_items'] ?? []);
                    $recommended_dumpster_size = $arguments['junk_details']['recommended_dumpster_size'] ?? null;
                    $additional_comment = $arguments['junk_details']['additional_comment'] ?? null;
                    $media_urls_json = json_encode($arguments['junk_details']['media_urls'] ?? $uploadedMediaUrls);

                    $stmt_junk->bind_param("issss", $quoteId, $junk_items_json, $recommended_dumpster_size, $additional_comment, $media_urls_json);
                    $stmt_junk->execute();
                    $stmt_junk->close();
                }

                $conn->commit();

                // Adjust AI response and redirect based on the determined status
                if ($quote_status === 'customer_draft') {
                    $aiResponseText = "Great! I've created a draft of your request. Please review the details on the next page and submit it to our team for a final quote.";
                    $jsonResponse['is_info_collected'] = true;
                    $jsonResponse['ai_response'] = $aiResponseText;
                    $jsonResponse['redirect_url'] = "/customer/dashboard.php#junk-removal?quote_id=" . $quoteId;
                } else {
                    $aiResponseText = "Thank you! Your quote request (#Q{$quoteId}) has been successfully submitted. Our team will review the details and send you the best price within the hour.";
                    $jsonResponse['is_info_collected'] = true;
                    $jsonResponse['ai_response'] = $aiResponseText;
                    $jsonResponse['redirect_url'] = "/customer/dashboard.php#quotes?quote_id=" . $quoteId;
                }
                
                unset($_SESSION['conversation_id']);
                
            } catch (mysqli_sql_exception $e) {
                $conn->rollback();
                error_log("SQL Error during quote creation: " . $e->getMessage() . " - Arguments: " . json_encode($arguments));
                throw new Exception("Failed to save your request to the database due to a data error.");
            }
        }
    }

    // Save user's message to chat history
    $stmt_save_user = $conn->prepare("INSERT INTO chat_messages (conversation_id, role, content) VALUES (?, 'user', ?)");
    $stmt_save_user->bind_param("is", $conversationId, $userMessageText);
    $stmt_save_user->execute();
    $stmt_save_user->close();
    
    // Save AI's response to chat history
    $stmt_save_ai = $conn->prepare("INSERT INTO chat_messages (conversation_id, role, content) VALUES (?, 'assistant', ?)");
    $stmt_save_ai->bind_param("is", $conversationId, $aiResponseText);
    $stmt_save_ai->execute();
    $stmt_save_ai->close();

    echo json_encode($jsonResponse);
    
    exit;
}
?>