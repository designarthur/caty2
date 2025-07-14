<?php
// includes/ai_chat_widget.php - Global AI Chat Widget Modal and JavaScript

// This file is designed to be included at the end of the <body> tag
// in any page where the AI chat functionality is desired.
// It relies on global functions like showModal, hideModal, showToast, marked.parse (for markdown).
// Ensure these functions are available in the parent scope.

// No direct PHP logic here, as it's a UI component.
// It will utilize JavaScript to interact with /api/openai_chat.php.
?>

<div id="ai-chat-modal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
    <div class="modal-content">
        <div class="flex items-center justify-between p-3 sm:p-4 bg-gray-100 border-b sticky top-0 z-10">
            <h3 class="text-base sm:text-xl font-bold text-gray-800" id="ai-chat-title">AI Assistant</h3>
            <button class="text-gray-500 hover:text-gray-700 text-lg sm:text-2xl" onclick="hideModal('ai-chat-modal')">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <div id="ai-chat-messages" class="flex-1 p-3 sm:p-4 overflow-y-auto custom-scroll bg-gray-50">
            </div>
        <div id="ai-chat-file-upload-section" class="hidden sm:block p-3 sm:p-4 border-t bg-gray-50">
            <label for="ai-chat-file-input" class="block text-xs sm:text-sm font-medium text-gray-700 mb-2">Attach Files (Images/Videos for Junk Removal)</label>
            <input type="file" id="ai-chat-file-input" name="media_files[]" multiple class="w-full text-xs sm:text-sm text-gray-500 file:mr-2 sm:mr-4 file:py-2 file:px-3 sm:file:px-4 file:rounded-full file:border-0 file:text-xs sm:file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
            <div id="ai-chat-selected-files" class="mt-2 text-xs text-gray-600"></div>
        </div>
        <div class="p-2 sm:p-4 bg-white border-t sticky bottom-0">
            <div class="flex items-center">
                <button id="ai-chat-camera-btn" class="p-2 sm:p-3 bg-gray-200 hover:bg-gray-300 text-lg sm:text-xl text-gray-600 min-w-[40px] rounded-l-lg hidden">
                    <i class="fas fa-camera"></i>
                </button>
                <input type="text" id="ai-chat-input" placeholder="Type your message..." class="flex-1 p-2 sm:p-3 border-y border-gray-300 focus:ring-blue-500 focus:border-blue-500 text-sm sm:text-base">
                <button id="ai-chat-send-btn" class="px-3 sm:px-4 py-2 sm:py-3 bg-blue-600 text-white hover:bg-blue-700 min-w-[40px] rounded-r-lg">
                    <i class="fas fa-paper-plane"></i>
                </button>
            </div>
        </div>
    </div>
</div>

<div id="camera-upload-choice-modal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
    <div class="bg-white w-full h-full sm:w-11/12 sm:max-w-sm sm:h-auto sm:my-8 rounded-t-lg sm:rounded-lg shadow-xl flex flex-col">
        <div class="flex items-center justify-between p-4 bg-gray-100 sm:bg-white border-b sm:border-b-0">
            <h3 class="text-lg sm:text-xl font-bold text-gray-800">Choose Media Source</h3>
            <button class="text-gray-500 hover:text-gray-700 text-xl" onclick="hideModal('camera-upload-choice-modal')">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <div class="flex-1 p-4 sm:p-6 text-gray-800 flex flex-col space-y-3 sm:space-y-4">
            <button id="choose-file-btn" class="px-4 py-3 bg-blue-500 text-white rounded-lg hover:bg-blue-600 text-sm sm:text-base">Upload File</button>
            <button id="take-photo-btn" class="px-4 py-3 bg-green-500 text-white rounded-lg hover:bg-green-600 text-sm sm:text-base">Take Photo</button>
            <button id="shoot-video-btn" class="px-4 py-3 bg-red-500 text-white rounded-lg hover:bg-red-600 text-sm sm:text-base">Shoot Video</button>
            <button class="px-4 py-3 bg-gray-300 text-gray-800 rounded-lg hover:bg-gray-400 text-sm sm:text-base" onclick="hideModal('camera-upload-choice-modal')">Cancel</button>
        </div>
    </div>
</div>

<video id="hiddenVideo" style="display:none;" controls></video>
<canvas id="hiddenCanvas" style="display:none;"></canvas>

<style>
    /* AI Chat Modal Specific Styles */
    #ai-chat-modal .modal-content {
        width: 100%;
        max-width: 500px;
        height: 70vh; /* Fixed height for desktop */
        max-height: 600px;
        display: flex;
        flex-direction: column;
        transition: all 0.3s ease-in-out;
        background-color: #ffffff;
        border-radius: 1rem;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
    }
    /* Full screen on small devices */
    @media (max-width: 767px) {
        #ai-chat-modal .modal-content {
            width: 100vw;
            height: 100vh;
            margin: 0;
            border-radius: 0;
            max-width: none;
            max-height: none;
        }
    }
    #ai-chat-messages {
        flex-grow: 1;
        overflow-y: auto;
    }
    #ai-chat-modal .chat-bubble {
        padding: 0.75rem 1.25rem;
        border-radius: 1.25rem;
        max-width: 80%;
        line-height: 1.5;
        word-wrap: break-word;
        box-shadow: 0 2px 5px rgba(0,0,0,0.05);
    }
    #ai-chat-modal .ai-bubble {
        background-color: #e2e8f0; /* Light gray */
        color: #2d3748;
        border-bottom-left-radius: 0.25rem;
        align-self: flex-start;
    }
    #ai-chat-modal .user-bubble {
        background-color: #3b82f6; /* Blue */
        color: white;
        border-bottom-right-radius: 0.25rem;
        align-self: flex-end;
    }
    #ai-chat-modal .typing-indicator {
        display: flex;
        align-items: center;
        gap: 0.25rem;
        padding: 0.75rem 1.25rem;
        background-color: #e2e8f0;
        border-bottom-left-radius: 0.25rem;
        align-self: flex-start;
    }
    #ai-chat-modal .typing-indicator span {
        height: 8px;
        width: 8px;
        background-color: #a0aec0;
        border-radius: 50%;
        animation: bounce 1.4s infinite both;
    }
    #ai-chat-modal .typing-indicator span:nth-child(2) { animation-delay: 0.2s; }
    #ai-chat-modal .typing-indicator span:nth-child(3) { animation-delay: 0.4s; }
    @keyframes bounce {
        0%, 80%, 100% { transform: scale(0); }
        40% { transform: scale(1.0); }
    }
</style>

<script>
    // Ensure marked.js is loaded for markdown parsing in chat
    if (typeof marked === 'undefined') {
        const script = document.createElement('script');
        script.src = 'https://cdn.jsdelivr.net/npm/marked/marked.min.js';
        document.head.appendChild(script);
    }

    // Global references for chat elements
    const aiChatModal = document.getElementById('ai-chat-modal');
    const aiChatTitle = document.getElementById('ai-chat-title');
    const aiChatMessagesDiv = document.getElementById('ai-chat-messages');
    const aiChatInput = document.getElementById('ai-chat-input');
    const aiChatSendBtn = document.getElementById('ai-chat-send-btn');
    const aiChatFileInput = document.getElementById('ai-chat-file-input');
    const aiChatSelectedFilesDisplay = document.getElementById('ai-chat-selected-files');
    const aiChatCameraBtn = document.getElementById('ai-chat-camera-btn');
    const cameraUploadChoiceModal = document.getElementById('camera-upload-choice-modal');
    const chooseFileBtn = document.getElementById('choose-file-btn');
    const takePhotoBtn = document.getElementById('take-photo-btn');
    const shootVideoBtn = document.getElementById('shoot-video-btn');
    const fileUploadSection = document.getElementById('ai-chat-file-upload-section');

    /**
     * Shows the AI chat modal with a specific service type and initial message.
     * @param {string} serviceType - 'create-booking' or 'junk-removal-service'.
     */
    window.showAIChat = function(serviceType) {
        if (!aiChatModal) {
            console.error('AI Chat Modal elements not found.');
            return;
        }

        aiChatMessagesDiv.innerHTML = ''; // Clear previous messages
        aiChatInput.value = '';
        aiChatInput.disabled = false;
        aiChatSendBtn.disabled = false;
        if (aiChatFileInput) aiChatFileInput.value = null; // Clear selected files
        if (aiChatSelectedFilesDisplay) aiChatSelectedFilesDisplay.textContent = ''; // Clear selected files display
        if (aiChatFileInput) aiChatFileInput.processedFiles = []; // Clear processed files

        // Conditionally show/hide camera button and file upload section
        if (serviceType === 'junk-removal-service') {
            aiChatCameraBtn.classList.remove('hidden');
            // Only show file upload section on desktop (width >= 768px)
            if (window.innerWidth >= 768) {
                fileUploadSection.classList.remove('hidden');
            } else {
                fileUploadSection.classList.add('hidden'); // Hide on mobile if not camera triggered
            }
            if (aiChatFileInput) aiChatFileInput.setAttribute('accept', 'image/*,video/*');
        } else {
            aiChatCameraBtn.classList.add('hidden');
            fileUploadSection.classList.add('hidden');
            if (aiChatFileInput) aiChatFileInput.removeAttribute('accept');
        }

        let initialAIMessage = "";
        if (serviceType === 'create-booking') {
            aiChatTitle.textContent = 'AI Assistant - Equipment Rental';
            initialAIMessage = "Hello! I can help you create a new equipment booking. What equipment do you need (e.g., a 20-yard dumpster, two portable toilets), for how long, and for what location? Is this for residential or commercial use?";
        } else if (serviceType === 'junk-removal-service') {
            aiChatTitle.textContent = 'AI Assistant - Junk Removal';
            initialAIMessage = "Hello! I can help you with junk removal. Please describe the items you need removed, or even better, upload some images or a short video!";
        } else {
            aiChatTitle.textContent = 'AI Assistant';
            initialAIMessage = "Hello! How can I assist you today?";
        }
        addAIChatMessage(initialAIMessage, 'ai', aiChatMessagesDiv);

        // Remove existing listener to prevent duplicates
        aiChatSendBtn.onclick = null;
        aiChatInput.onkeydown = null;

        // Add event listener for AI chat modal's send button
        aiChatSendBtn.onclick = () => {
            const message = aiChatInput.value.trim();
            const filesToSend = aiChatFileInput && aiChatFileInput.files ? aiChatFileInput.processedFiles || Array.from(aiChatFileInput.files) : [];

            if (message || filesToSend.length > 0) {
                addAIChatMessage(message, 'user', aiChatMessagesDiv);
                aiChatInput.value = '';
                if (aiChatFileInput) {
                    aiChatFileInput.value = null; // Clear native input
                    aiChatFileInput.processedFiles = []; // Clear custom processed list
                }
                if (aiChatSelectedFilesDisplay) aiChatSelectedFilesDisplay.textContent = ''; // Clear selected files display

                sendAIChatMessageToApi(message, serviceType, filesToSend);
            }
        };
        aiChatInput.onkeydown = (event) => {
            if (event.key === 'Enter' && !event.shiftKey) {
                event.preventDefault();
                aiChatSendBtn.click();
            }
        };

        // Event listener for main file input change (for direct file selection)
        if (aiChatFileInput) {
            aiChatFileInput.onchange = async () => {
                if (aiChatFileInput.files.length > 0) {
                    const files = Array.from(aiChatFileInput.files);
                    let fileNames = files.map(f => f.name).join(', ');
                    if (aiChatSelectedFilesDisplay) aiChatSelectedFilesDisplay.textContent = `Selected: ${fileNames}`;

                    const processedFiles = [];
                    for (const file of files) {
                        if (file.type.startsWith('video/')) {
                            window.showToast(`Processing video: ${file.name}...`, 'info');
                            try {
                                const frames = await extractFramesFromVideo(file, 10);
                                frames.forEach((frame, index) => {
                                    const blob = dataURLtoBlob(frame);
                                    processedFiles.push(new File([blob], `frame_${file.name}_${index}.jpeg`, { type: 'image/jpeg' }));
                                });
                                window.showToast(`Extracted ${frames.length} frames from ${file.name}.`, 'success');
                            } catch (error) {
                                console.error('Error extracting frames:', error);
                                window.showToast(`Failed to extract frames from ${file.name}.`, 'error');
                                processedFiles.push(file); // Send original video if frame extraction fails
                            }
                        } else {
                            processedFiles.push(file);
                        }
                    }
                    aiChatFileInput.processedFiles = processedFiles;
                } else {
                    if (aiChatSelectedFilesDisplay) aiChatSelectedFilesDisplay.textContent = '';
                    aiChatFileInput.processedFiles = [];
                }
            };
        }

        showModal('ai-chat-modal');
    };

    /**
     * Adds a message bubble to the chat interface.
     * @param {string} message - The message text (can include markdown).
     * @param {string} sender - 'user' or 'ai'.
     * @param {HTMLElement} container - The div element to add the message to.
     */
    function addAIChatMessage(message, sender, container) {
        const messageDiv = document.createElement('div');
        messageDiv.classList.add('chat-bubble', sender === 'user' ? 'user-bubble' : 'ai-bubble');
        messageDiv.innerHTML = marked.parse(message); // Use marked.js for markdown
        container.appendChild(messageDiv);
        container.scrollTop = container.scrollHeight; // Scroll to bottom
    }


    function hideTypingIndicator(container) {
        const typingIndicator = container.querySelector('.typing-indicator');
        if (typingIndicator) {
            container.removeChild(typingIndicator);
        }
    }
    /**
     * Sends the user's message and any attached files to the OpenAI API endpoint.
     * @param {string} message - The user's text message.
     * @param {string} serviceType - The current service type ('create-booking' or 'junk-removal-service').
     * @param {File[]} files - Array of File objects (or Blobs from video frames).
     */
    async function sendAIChatMessageToApi(message, serviceType, files = []) {
        // Show loading dots
        const loadingDiv = document.createElement('div');
        loadingDiv.classList.add('chat-bubble', 'ai-bubble', 'typing-indicator'); // Use typing indicator for loading
        loadingDiv.innerHTML = '<span></span><span></span><span></span>';
        aiChatMessagesDiv.appendChild(loadingDiv);
        aiChatMessagesDiv.scrollTop = aiChatMessagesDiv.scrollHeight;
        aiChatInput.disabled = true;
        aiChatSendBtn.disabled = true;

        const formData = new FormData();
        formData.append('message', message);
        formData.append('initial_service_type', serviceType);

        if (files.length > 0) {
            files.forEach((file, index) => {
                formData.append(`media_files[${index}]`, file);
            });
        }

        try {
            const response = await fetch('/api/openai_chat.php', {
                method: 'POST',
                body: formData
            });
            const data = await response.json();

            // Remove loading dots
            hideTypingIndicator(aiChatMessagesDiv);

            addAIChatMessage(data.ai_response, 'ai', aiChatMessagesDiv);

        } catch (error) {
            console.error('Error fetching AI response:', error);
            hideTypingIndicator(aiChatMessagesDiv);
            addAIChatMessage("Oops! There was an error connecting to the AI. Please try again later.", 'ai', aiChatMessagesDiv);
        } finally {
            aiChatInput.disabled = false;
            aiChatSendBtn.disabled = false;
        }
    }

    // General helper function to open camera input (reusable)
    function openCameraInput(acceptType, captureMode) {
        const input = document.createElement('input');
        input.type = 'file';
        input.accept = acceptType;
        input.capture = captureMode;
        input.style.display = 'none'; // Hide the input element
        document.body.appendChild(input);

        input.addEventListener('change', async (event) => {
            if (event.target.files.length > 0) {
                const file = event.target.files[0];
                const aiChatFileInput = document.getElementById('ai-chat-file-input');
                const aiChatSelectedFilesDisplay = document.getElementById('ai-chat-selected-files');

                // Create a DataTransfer object to manage files
                const dataTransfer = new DataTransfer();
                // Add existing files from aiChatFileInput if any
                if (aiChatFileInput.files.length > 0) {
                    Array.from(aiChatFileInput.files).forEach(f => dataTransfer.items.add(f));
                }

                // Add the newly captured file
                dataTransfer.items.add(file);
                aiChatFileInput.files = dataTransfer.files;

                // Update selected files display
                let fileNames = Array.from(aiChatFileInput.files).map(f => f.name).join(', ');
                aiChatSelectedFilesDisplay.textContent = `Selected: ${fileNames}`;

                // Process video frames if it's a video
                if (file.type.startsWith('video/')) {
                    window.showToast(`Processing video: ${file.name}...`, 'info');
                    try {
                        const frames = await extractFramesFromVideo(file, 10); // Extract 10 frames
                        const processedFiles = [];
                        frames.forEach((frame, index) => {
                            const blob = dataURLtoBlob(frame);
                            processedFiles.push(new File([blob], `frame_${file.name}_${index}.jpeg`, { type: 'image/jpeg' }));
                        });
                        aiChatFileInput.processedFiles = processedFiles; // Attach to input element for later retrieval
                        window.showToast(`Extracted ${frames.length} frames from ${file.name}.`, 'success');
                    } catch (error) {
                        console.error('Error extracting frames:', error);
                        window.showToast(`Failed to extract frames from ${file.name}.`, 'error');
                        processedFiles.push(file); // Send original video if frame extraction fails
                    }
                } else {
                    processedFiles.push(file); // For images, just push the original file
                }
            }
            document.body.removeChild(input); // Clean up the temporary input
            hideModal('camera-upload-choice-modal'); // Hide the choice modal
        });

        input.click(); // Programmatically click the hidden input to open camera/file picker
    }

    // AI Chat modal specific JavaScript (re-scoped to be an IIFE if it wasn't already)
    (function() {
        const aiChatModal = document.getElementById('ai-chat-modal');
        const aiChatCameraBtn = document.getElementById('ai-chat-camera-btn');
        const cameraUploadChoiceModal = document.getElementById('camera-upload-choice-modal');
        const chooseFileBtn = document.getElementById('choose-file-btn');
        const takePhotoBtn = document.getElementById('take-photo-btn');
        const shootVideoBtn = document.getElementById('shoot-video-btn');
        const aiChatFileInput = document.getElementById('ai-chat-file-input');
        const aiChatSelectedFilesDisplay = document.getElementById('ai-chat-selected-files');
        const aiChatSendBtn = document.getElementById('ai-chat-send-btn');

        // Event listener for camera button (to show choice modal)
        if (aiChatCameraBtn) {
            aiChatCameraBtn.addEventListener('click', () => {
                showModal('camera-upload-choice-modal');
            });
        }

        // Event listeners for choice buttons
        if (chooseFileBtn) {
            chooseFileBtn.addEventListener('click', () => {
                aiChatFileInput.click(); // Trigger the original file input
                hideModal('camera-upload-choice-modal');
            });
        }

        if (takePhotoBtn) {
            takePhotoBtn.addEventListener('click', () => {
                openCameraInput('image/*', 'user'); // Open camera for photo
            });
        }

        if (shootVideoBtn) {
            shootVideoBtn.addEventListener('click', () => {
                openCameraInput('video/*', 'user'); // Open camera for video
            });
        }

        // Override default file input change to also update processedFiles
        if (aiChatFileInput) {
            aiChatFileInput.addEventListener('change', async () => {
                if (aiChatFileInput.files.length > 0) {
                    const files = Array.from(aiChatFileInput.files);
                    let fileNames = files.map(f => f.name).join(', ');
                    aiChatSelectedFilesDisplay.textContent = `Selected: ${fileNames}`;

                    const processedFiles = [];
                    for (const file of files) {
                        if (file.type.startsWith('video/')) {
                            window.showToast(`Processing video: ${file.name}...`, 'info');
                            try {
                                const frames = await extractFramesFromVideo(file, 10);
                                frames.forEach((frame, index) => {
                                    const blob = dataURLtoBlob(frame);
                                    processedFiles.push(new File([blob], `frame_${file.name}_${index}.jpeg`, { type: 'image/jpeg' }));
                                });
                                window.showToast(`Extracted ${frames.length} frames from ${file.name}.`, 'success');
                            } catch (error) {
                                console.error('Error extracting frames:', error);
                                window.showToast(`Failed to extract frames from ${file.name}.`, 'error');
                                processedFiles.push(file);
                            }
                        } else {
                            processedFiles.push(file);
                        }
                    }
                    aiChatFileInput.processedFiles = processedFiles;
                } else {
                    aiChatSelectedFilesDisplay.textContent = '';
                    aiChatFileInput.processedFiles = [];
                }
            });
        }
        
        // Enhance send button with loading state
        const originalSendAIChatMessageToApi = window.sendAIChatMessageToApi;
        window.sendAIChatMessageToApi = async function(...args) {
            aiChatSendBtn.classList.add('loading'); // Add loading class
            aiChatSendBtn.disabled = true; // Disable button during loading
            try {
                await originalSendAIChatMessageToApi(...args);
            } finally {
                aiChatSendBtn.classList.remove('loading'); // Remove loading class
                aiChatSendBtn.disabled = false; // Re-enable button
            }
        };

        // Modify showAIChat to conditionally display camera button and file upload section
        const originalShowAIChat = window.showAIChat;
        window.showAIChat = function(serviceType) {
            originalShowAIChat(serviceType); // Call original function

            const fileUploadSection = document.getElementById('ai-chat-file-upload-section');
            // Show camera button for junk removal, file upload section only on desktop
            if (serviceType === 'junk-removal-service') {
                aiChatCameraBtn.classList.remove('hidden');
                // Only show file upload section on desktop (width >= 768px)
                if (window.innerWidth >= 768) {
                    fileUploadSection.classList.remove('hidden');
                } else {
                    fileUploadSection.classList.add('hidden');
                }
            } else {
                aiChatCameraBtn.classList.add('hidden');
                fileUploadSection.classList.add('hidden');
            }
        };

    })();
</script>

<style>
    /* Custom scroll for better mobile experience */
    .custom-scroll {
        scrollbar-width: thin;
        scrollbar-color: #a0aec0 #edf2f7;
    }
    .custom-scroll::-webkit-scrollbar {
        width: 6px;
    }
    .custom-scroll::-webkit-scrollbar-track {
        background: #edf2f7;
    }
    .custom-scroll::-webkit-scrollbar-thumb {
        background-color: #a0aec0;
        border-radius: 3px;
    }
</style>