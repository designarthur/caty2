<?php
// customer/includes/header.php
// This file assumes a session is already started and user is logged in.
// It uses variables set in the session to display user-specific info.<button id="notification-bell" class="relative text-gray-600

$userName = $_SESSION['user_first_name'] ?? 'Customer';
$notificationCount = 0; // Will be fetched dynamically from DB later

// You might fetch notification count here from the database if you want it real-time
// global $conn;
// if (isset($_SESSION['user_id'])) {
//     $stmt = $conn->prepare("SELECT COUNT(*) AS unread_count FROM notifications WHERE user_id = ? AND is_read = FALSE");
//     $stmt->bind_param("i", $_SESSION['user_id']);
//     $stmt->execute();
//     $result = $stmt->get_result();
//     $row = $result->fetch_assoc();
//     $notificationCount = $row['unread_count'];
//     $stmt->close();
// }
?>

<header class="bg-white p-4 shadow-md flex justify-between items-center sticky top-0 z-10 rounded-b-lg">
    <div id="welcome-prompt" class="text-gray-700 font-semibold text-lg">Welcome back, <?php echo htmlspecialchars($userName); ?>!</div>
    <div class="flex items-center space-x-4">
        <div class="relative group">
            <button id="service-request-btn" class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition-colors duration-200 shadow-md flex items-center">
                <i class="fas fa-tools mr-2"></i>Service Request
            </button>
            <div id="service-request-dropdown" class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-xl py-2 z-20 hidden">
                <a href="#" class="block px-4 py-2 text-gray-800 hover:bg-gray-100" onclick="showAIChat('create-booking'); event.preventDefault();">Create Booking</a>
                <a href="#" class="block px-4 py-2 text-gray-800 hover:bg-gray-100" onclick="showAIChat('junk-removal-service'); event.preventDefault();">Junk Removal Service</a>
            </div>
        </div>

        <button id="notification-bell" class="relative text-gray-600 hover:text-gray-800 text-2xl" onclick="window.loadCustomerSection('notifications')">
    <i class="fas fa-bell"></i>
    <span class="absolute top-0 right-0 inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-red-100 bg-red-600 rounded-full" style="display: none;"></span>
</button>
        <button id="start-tutorial-btn" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors duration-200 shadow-md">
            <i class="fas fa-question-circle mr-2"></i>Start Tutorial
        </button>
    </div>
</header>