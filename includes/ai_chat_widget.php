<?php
// includes/ai_chat_widget.php
// This widget can be included on any page where you want to provide AI chat functionality.

// Ensure session is started and functions are available
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require_once __DIR__ . '/functions.php';

// Fetch company name from system settings
$companyName = getSystemSetting('company_name') ?? 'Catdump';

// Check if user is logged in
$isUserLoggedIn = isset($_SESSION['user_id']);
?>

<div id="aiChatWidget" class="fixed bottom-0 right-0 w-full md:w-96 h-full md:h-[600px] bg-white border border-gray-300 rounded-lg shadow-xl flex flex-col z-[1000] transform translate-y-full md:translate-x-full transition-all duration-300 ease-in-out">
    <div class="flex items-center justify-between p-4 bg-blue-600 text-white rounded-t-lg cursor-grab">
        <h3 class="text-lg font-semibold">Chat with AI Assistant</h3>
        <button id="closeChat" class="text-white hover:text-gray-200 p-1 rounded-full hover:bg-blue-700 transition">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
        </button>
    </div>

    <div id="chatMessages" class="flex-1 p-4 overflow-y-auto bg-gray-50">
        <div class="flex justify-start mb-2">
            <div class="bg-blue-200 text-blue-800 rounded-lg p-3 max-w-[80%]">
                Hi! I'm your AI assistant from <?php echo htmlspecialchars($companyName); ?>. How can I help you with your project today? You can tell me what you need, or even upload a photo of your project or junk.
            </div>
        </div>
        <div id="typingIndicator" class="flex justify-start mb-2 hidden">
            <div class="bg-gray-200 text-gray-700 rounded-lg p-3 max-w-[80%] animate-pulse">
                Typing...
            </div>
        </div>
    </div>

    <div id="fileUploadPreview" class="p-2 border-t border-gray-200 hidden bg-white">
        <div class="flex items-center space-x-2 text-sm text-gray-600">
            <span id="previewFileName" class="truncate max-w-[calc(100%-40px)]"></span>
            <button id="removeFileButton" class="text-red-500 hover:text-red-700 text-xs font-semibold">Remove</button>
        </div>
    </div>

    <div id="quickReplyButtons" class="p-2 border-t border-gray-200 bg-white flex flex-wrap gap-2 justify-center hidden">
        </div>

    <div class="p-4 border-t border-gray-200 bg-white flex items-center">
        <label for="mediaFileInput" class="cursor-pointer text-gray-500 hover:text-blue-600 mr-2">
            <i class="fas fa-paperclip text-xl"></i>
            <input type="file" id="mediaFileInput" name="media_files[]" accept="image/*,video/*" class="hidden">
        </label>
        <input type="text" id="chatInput" placeholder="Type your message..." class="flex-1 p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
        <button id="sendMessage" class="ml-2 px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
            <svg class="w-5 h-5 transform rotate-90" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path></svg>
        </button>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const chatWidget = document.getElementById('aiChatWidget');
        // const openChatButton = document.getElementById('openChat'); // No longer needed as button is now global via window.showAIChat
        const closeChatButton = document.getElementById('closeChat');
        const chatMessages = document.getElementById('chatMessages');
        const chatInput = document.getElementById('chatInput');
        const sendMessageButton = document.getElementById('sendMessage');
        const typingIndicator = document.getElementById('typingIndicator');
        const mediaFileInput = document.getElementById('mediaFileInput');
        const fileUploadPreview = document.getElementById('fileUploadPreview');
        const previewFileName = document.getElementById('previewFileName');
        const removeFileButton = document.getElementById('removeFileButton');
        const quickReplyButtonsContainer = document.getElementById('quickReplyButtons');

        let isChatOpen = false;
        let selectedFile = null;
        let currentConversationId = null;

        // Determine if user is logged in (passed from PHP)
        const isUserLoggedIn = <?php echo json_encode($isUserLoggedIn); ?>;

        // --- Session Reset on Page Load for Non-Logged-in Users ---
        // This ensures a clean slate when a non-logged-in user refreshes the page.
        if (!isUserLoggedIn) {
            sessionStorage.removeItem('conversation_id');
            // Optionally, you might clear chatMessages.innerHTML here if you want absolutely no greeting
            // before the showAIChat is explicitly called. But currently, the showAIChat handles it.
        } else {
            // For logged-in users, try to retrieve previous conversation ID
            const storedId = sessionStorage.getItem('conversation_id');
            if (storedId) {
                currentConversationId = storedId;
                // In a full implementation, you'd load past messages here.
                // For now, we just ensure the ID is set for subsequent server calls.
            }
        }
        // --- END Session Reset Logic ---

        // Function to open the chat widget
        window.showAIChat = function(initialServiceType = 'general') {
            chatWidget.classList.remove('translate-y-full', 'md:translate-x-full');
            chatWidget.style.transform = 'translateY(0) translateX(0)'; // Ensure direct transform is applied

            isChatOpen = true;
            document.body.style.overflow = 'hidden'; // Prevent scrolling background
            chatInput.focus();

            // Clear chat and send initial message only if starting a new chat (no current ID or explicitly 'general')
            const storedConversationId = sessionStorage.getItem('conversation_id');
            if (!storedConversationId || initialServiceType === 'general') {
                sessionStorage.removeItem('conversation_id'); // Ensure it's truly new
                currentConversationId = null; // Reset JS variable
                chatMessages.innerHTML = `
                    <div class="flex justify-start mb-2">
                        <div class="bg-blue-200 text-blue-800 rounded-lg p-3 max-w-[80%]">
                            Hi! I'm your AI assistant from <?php echo htmlspecialchars($companyName); ?>. How can I help you with your project today? You can tell me what you need, or even upload a photo of your project or junk.
                        </div>
                    </div>
                `;
                // Send an empty message to trigger the AI's first response with suggested replies
                sendUserMessageToAI('', initialServiceType);
            } else {
                // If an existing conversation, update currentConversationId from sessionStorage
                currentConversationId = storedConversationId;
                // No need to send an empty message if continuing existing chat, AI will pick up.
            }
        };

        // Function to close the chat widget
        closeChatButton.addEventListener('click', function() {
            chatWidget.classList.add('translate-y-full', 'md:translate-x-full');
            chatWidget.style.transform = ''; // Clear inline style set by draggable or showAIChat
            isChatOpen = false;
            document.body.style.overflow = ''; // Allow scrolling background
            quickReplyButtonsContainer.classList.add('hidden'); // Hide buttons on close
            quickReplyButtonsContainer.innerHTML = ''; // Clear buttons
        });

        // Function to add a message to the chat display
        function addMessage(sender, message, isHtml = false) {
            const messageElement = document.createElement('div');
            messageElement.classList.add('flex', 'mb-2', sender === 'user' ? 'justify-end' : 'justify-start');
            
            const contentElement = document.createElement('div');
            contentElement.classList.add('rounded-lg', 'p-3', 'max-w-[80%]');
            if (sender === 'user') {
                contentElement.classList.add('bg-blue-500', 'text-white');
            } else {
                contentElement.classList.add('bg-gray-200', 'text-gray-800');
            }

            if (isHtml) {
                contentElement.innerHTML = message;
            } else {
                // Use marked.js for markdown parsing in AI responses
                contentElement.innerHTML = sender === 'assistant' ? marked.parse(message) : message;
            }
            
            messageElement.appendChild(contentElement);
            chatMessages.appendChild(messageElement);
            chatMessages.scrollTop = chatMessages.scrollHeight; // Scroll to bottom
        }

        // Function to display quick reply buttons
        function displayQuickReplyButtons(buttons) {
            quickReplyButtonsContainer.innerHTML = ''; // Clear existing buttons
            if (buttons && buttons.length > 0) {
                quickReplyButtonsContainer.classList.remove('hidden');
                buttons.forEach(buttonData => {
                    const button = document.createElement('button');
                    button.classList.add('px-4', 'py-2', 'bg-gray-200', 'text-gray-800', 'rounded-full', 'hover:bg-gray-300', 'focus:outline-none', 'focus:ring-2', 'focus:ring-gray-400', 'text-sm');
                    button.textContent = buttonData.text;
                    button.onclick = () => {
                        chatInput.value = buttonData.value;
                        sendMessageButton.click(); // Simulate sending the message
                    };
                    quickReplyButtonsContainer.appendChild(button);
                });
            } else {
                quickReplyButtonsContainer.classList.add('hidden');
            }
        }

        // Function to send message to AI API
        async function sendUserMessageToAI(message, initialServiceType = null) {
            // Only add user message to display if it's not an empty string for initial chat trigger
            if (message.trim() !== '') {
                addMessage('user', message);
            }
            chatInput.value = ''; // Clear input field
            typingIndicator.classList.remove('hidden'); // Show typing indicator
            quickReplyButtonsContainer.classList.add('hidden'); // Hide quick reply buttons
            quickReplyButtonsContainer.innerHTML = ''; // Clear quick reply buttons

            const formData = new FormData();
            formData.append('message', message);
            if (initialServiceType) {
                formData.append('initial_service_type', initialServiceType);
            }
            if (selectedFile) {
                formData.append('media_files[]', selectedFile);
                selectedFile = null; // Clear selected file after adding to form data
                fileUploadPreview.classList.add('hidden'); // Hide preview
                previewFileName.textContent = ''; // Clear preview text
            }

            // Always send currentConversationId if available
            if (currentConversationId) {
                formData.append('conversation_id', currentConversationId);
            }

            try {
                const response = await fetch('/api/openai_chat.php', {
                    method: 'POST',
                    body: formData
                });

                const data = await response.json();

                typingIndicator.classList.add('hidden'); // Hide typing indicator

                if (data.success) {
                    addMessage('assistant', data.ai_response);
                    // Update currentConversationId and sessionStorage based on server response
                    if (data.conversation_id) {
                        sessionStorage.setItem('conversation_id', data.conversation_id);
                        currentConversationId = data.conversation_id;
                    } else if (data.conversation_id === null) { // Server explicitly reset conversation
                        sessionStorage.removeItem('conversation_id');
                        currentConversationId = null;
                    }

                    // Handle suggested replies
                    if (data.suggested_replies && data.suggested_replies.length > 0) {
                        displayQuickReplyButtons(data.suggested_replies);
                    }

                    // Handle redirects
                    if (data.redirect_url) {
                        setTimeout(() => {
                            window.location.href = data.redirect_url;
                        }, 1000); // Redirect after a short delay
                    }
                } else {
                    addMessage('assistant', 'Error: ' + (data.message || 'Something went wrong.'));
                    displayQuickReplyButtons([
                        {text: "Try again", value: "Please try that again."},
                        {text: "Start over", value: "I'd like to start a new project."}
                    ]);
                }
            } catch (error) {
                console.error('API Error:', error);
                typingIndicator.classList.add('hidden');
                addMessage('assistant', 'Sorry, I\'m having trouble connecting right now. Please try again in a moment.');
                 displayQuickReplyButtons([
                    {text: "Try again", value: "Please try that again."},
                    {text: "Start over", value: "I'd like to start a new project."}
                ]);
            }
        }

        // Event Listeners for sending messages
        sendMessageButton.addEventListener('click', function() {
            sendUserMessageToAI(chatInput.value);
        });

        chatInput.addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                e.preventDefault(); // Prevent new line in input
                sendUserMessageToAI(chatInput.value);
            }
        });

        // File input change handler
        mediaFileInput.addEventListener('change', function(e) {
            if (e.target.files.length > 0) {
                selectedFile = e.target.files[0];
                previewFileName.textContent = selectedFile.name;
                fileUploadPreview.classList.remove('hidden');
            } else {
                selectedFile = null;
                previewFileName.textContent = '';
                fileUploadPreview.classList.add('hidden');
            }
        });

        // Remove file button handler
        removeFileButton.addEventListener('click', function() {
            selectedFile = null;
            mediaFileInput.value = ''; // Clear the file input
            previewFileName.textContent = '';
            fileUploadPreview.classList.add('hidden');
        });

        // Make chat widget draggable for desktop
        if (window.innerWidth >= 768) {
            const chatHeader = chatWidget.querySelector('.p-4:first-child');
            let isDragging = false;
            let currentX;
            let currentY;
            let initialX;
            let initialY;
            let xOffset = 0;
            let yOffset = 0;

            chatHeader.addEventListener("mousedown", dragStart);
            chatWidget.addEventListener("mouseup", dragEnd);
            chatWidget.addEventListener("mousemove", drag);

            function dragStart(e) {
                initialX = e.clientX - xOffset;
                initialY = e.clientY - yOffset;

                // Ensure dragging only starts from the header itself, not its children
                if (e.target.closest('#aiChatWidget > div:first-child') === chatHeader) {
                    isDragging = true;
                }
            }

            function dragEnd(e) {
                initialX = currentX;
                initialY = currentY;
                isDragging = false;
            }

            function drag(e) {
                if (isDragging) {
                    e.preventDefault();
                    currentX = e.clientX - initialX;
                    currentY = e.clientY - initialY;

                    xOffset = currentX;
                    yOffset = currentY;

                    setTranslate(currentX, currentY, chatWidget);
                }
            }

            function setTranslate(xPos, yPos, el) {
                el.style.transform = "translate3d(" + xPos + "px, " + yPos + "px, 0)";
            }
        }
    });
</script>