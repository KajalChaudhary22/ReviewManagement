<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SCIZORA | Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        .sidebar {
            transition: all 0.3s ease;
        }

        .content-section {
            display: none;
        }

        .content-section.active {
            display: block;
            animation: fadeIn 0.5s;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        .status-badge {
            padding: 0.25rem 0.5rem;
            border-radius: 9999px;
            font-size: 0.75rem;
            font-weight: 600;
        }

        .status-pending {
            background-color: #FEF3C7;
            color: #92400E;
        }

        .status-replied {
            background-color: #D1FAE5;
            color: #065F46;
        }

        .status-closed {
            background-color: #E5E7EB;
            color: #4B5563;
        }

        .status-verified {
            background-color: #DBEAFE;
            color: #1E40AF;
        }

        .hamburger {
            display: none;
        }

        @media (max-width: 768px) {
            .hamburger {
                display: block;
            }

            .sidebar {
                transform: translateX(-100%);
                position: fixed;
                z-index: 50;
                height: 100vh;
                background-color: white;
            }

            .sidebar.open {
                transform: translateX(0);
            }

            .overlay {
                display: none;
                position: fixed;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background-color: rgba(0, 0, 0, 0.5);
                z-index: 40;
            }

            .overlay.open {
                display: block;
            }
        }

        /* Modal styles */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 100;
            justify-content: center;
            align-items: center;
        }

        .modal-content {
            background-color: white;
            border-radius: 0.5rem;
            width: 90%;
            max-width: 600px;
            max-height: 90vh;
            overflow-y: auto;
            animation: modalFadeIn 0.3s;
        }

        @keyframes modalFadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .modal-header {
            padding: 1rem;
            border-bottom: 1px solid #e5e7eb;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .modal-body {
            padding: 1.5rem;
        }

        .modal-footer {
            padding: 1rem;
            border-top: 1px solid #e5e7eb;
            display: flex;
            justify-content: flex-end;
        }

        /* Message styles */
        .message-container {
            height: 400px;
            overflow-y: auto;
        }

        .message-received {
            background-color: #f3f4f6;
            border-radius: 1rem 1rem 1rem 0;
        }

        .message-sent {
            background-color: #3b82f6;
            color: white;
            border-radius: 1rem 1rem 0 1rem;
        }

        /* Additional content styles */
        .additional-content {
            display: none;
        }

        .additional-content.visible {
            display: block;
            animation: fadeIn 0.5s;
        }

        /* Styles for the new Profile + Logout container */
        .profile-container {
            display: flex;
            align-items: center;
        }


        /* Styles for the Logout Button */
        .logout-btn {
            /* CHANGED THIS LINE - Increased the margin for more space */
            margin-left: 25px;
            color: var(--text-light);
            /* Sets the initial icon color */
            cursor: pointer;
            transition: color 0.2s ease;
            display: flex;
            align-items: center;
        }

        .logout-btn:hover {
            color: var(--primary-color);
            /* Changes color on hover */
        }

        /* Make sure the original user-profile cursor is default */
        .user-profile {
            display: flex;
            align-items: center;
            cursor: default;
        }
        
    </style>
</head>

<body class="bg-gray-100 font-sans">
    <div class="flex h-screen overflow-hidden">
        <!-- Sidebar Navigation -->
        @include('customer.layouts.sidebar')

        <!-- Main Content Area -->
        <div class="flex-1 overflow-auto">
            <!-- Top Navigation Bar -->
           @include('customer.layouts.navbar')

            <!-- Main Content Sections -->
            <main class="p-6">


                <!-- Profile Section -->
                <section id="profile" class="content-section active">
                    <h2 class="text-2xl font-bold text-gray-800 mb-6">My Profile</h2>
                    <div class="bg-white rounded-lg shadow-md p-6">
                        <div class="flex flex-col md:flex-row">
                            <div class="md:w-1/3 mb-6 md:mb-0 md:pr-6">
                                <div class="flex flex-col items-center">
                                    <img src="{{$myProfile?->profile ? asset($myProfile?->profile) : 'https://randomuser.me/api/portraits/men/32.jpg'}}" alt="Profile"
                                        class="w-32 h-32 rounded-full mb-4">
                                    <button class="text-blue-600 hover:text-blue-800 mb-6"></button>
                                </div>
                            </div>
                            <div class="md:w-2/3">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                                    <div>
                                        <label class="block text-gray-700 mb-1">Full Name</label>
                                        <p class="font-medium">{{ $myProfile?->name }}</p>
                                    </div>
                                    <div>
                                        <label class="block text-gray-700 mb-1">Email</label>
                                        <p class="font-medium">{{ $myProfile?->email }}</p>
                                    </div>
                                    <div>
                                        <label class="block text-gray-700 mb-1">Company</label>
                                        <p class="font-medium">{{ $myProfile?->company }}</p>
                                    </div>
                                    <div>
                                        <label class="block text-gray-700 mb-1">Location</label>
                                        <p class="font-medium">{{ $myProfile?->locationDetails?->name }}</p>
                                    </div>
                                    <div>
                                        <label class="block text-gray-700 mb-1">Phone</label>
                                        <p class="font-medium">{{ $myProfile?->contact_number }}</p>
                                    </div>
                                </div>
                                <div class="mb-6">
                                    <label class="block text-gray-700 mb-1">Bio</label>
                                    <p class="font-medium">{{ $myProfile?->about }}</p>
                                </div>
                                <a href="edit-profile.html"><button
                                        class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg transition duration-200">
                                        Edit Profile
                                    </button></a>
                            </div>
                        </div>
                    </div>
                </section>


            </main>
        </div>
    </div>

    <!-- Mobile Overlay -->
    <div class="overlay"></div>


    <script>
        document.addEventListener('DOMContentLoaded', function() {


            // Hamburger menu for mobile
            const hamburger = document.querySelector('.hamburger');
            const sidebar = document.querySelector('.sidebar');
            const overlay = document.querySelector('.overlay');

            hamburger.addEventListener('click', function() {
                sidebar.classList.toggle('open');
                overlay.classList.toggle('open');
            });

            overlay.addEventListener('click', function() {
                sidebar.classList.remove('open');
                this.classList.remove('open');
            });

            // Notification toggle functionality
            const toggleSwitches = document.querySelectorAll('.notification-toggle');
            toggleSwitches.forEach(toggle => {
                toggle.addEventListener('change', function() {
                    const isChecked = this.checked;
                    // You would typically save this preference to a database here
                    console.log(`Toggle ${this.id} is now ${isChecked ? 'on' : 'off'}`);

                    // Visual feedback
                    const toggleContainer = this.nextElementSibling;
                    if (isChecked) {
                        toggleContainer.classList.remove('bg-gray-200');
                        toggleContainer.classList.add('bg-blue-600');
                    } else {
                        toggleContainer.classList.remove('bg-blue-600');
                        toggleContainer.classList.add('bg-gray-200');
                    }
                });
            });


            // Business Quick View Modal
            const quickViewButtons = document.querySelectorAll('.quick-view-btn');
            const businessModal = document.getElementById('businessModal');

            quickViewButtons.forEach(button => {
                button.addEventListener('click', function() {
                    document.getElementById('modalBusinessTitle').textContent = this.getAttribute(
                        'data-title');
                    document.getElementById('modalBusinessType').textContent = this.getAttribute(
                        'data-type');
                    document.getElementById('modalBusinessDescription').textContent = this
                        .getAttribute('data-description');
                    document.getElementById('modalBusinessContact').textContent = this.getAttribute(
                        'data-contact');

                    businessModal.style.display = 'flex';
                });
            });

            // Inquiry Details Modal
            const viewDetailsButtons = document.querySelectorAll('.view-details-btn');
            const inquiryModal = document.getElementById('inquiryModal');

            viewDetailsButtons.forEach(button => {
                button.addEventListener('click', function() {
                    document.getElementById('modalInquiryTitle').textContent = this.getAttribute(
                        'data-title');
                    document.getElementById('modalInquiryDate').textContent = this.getAttribute(
                        'data-date');

                    const status = this.getAttribute('data-status');
                    const statusElement = document.getElementById('modalInquiryStatus');
                    statusElement.textContent = status;
                    statusElement.className = '';

                    if (status === 'Pending') {
                        statusElement.classList.add('status-badge', 'status-pending');
                    } else if (status === 'Replied') {
                        statusElement.classList.add('status-badge', 'status-replied');
                    } else if (status === 'Closed') {
                        statusElement.classList.add('status-badge', 'status-closed');
                    }

                    document.getElementById('modalInquiryContent').textContent = this.getAttribute(
                        'data-content');

                    inquiryModal.style.display = 'flex';
                });
            });

            // Close Modal
            const closeModalButtons = document.querySelectorAll('.close-modal');

            closeModalButtons.forEach(button => {
                button.addEventListener('click', function() {
                    businessModal.style.display = 'none';
                    inquiryModal.style.display = 'none';
                    deleteAccountModal.style.display = 'none';
                });
            });

            // Close modal when clicking outside
            window.addEventListener('click', function(e) {
                if (e.target === businessModal) {
                    businessModal.style.display = 'none';
                }
                if (e.target === inquiryModal) {
                    inquiryModal.style.display = 'none';
                }
                if (e.target === deleteAccountModal) {
                    deleteAccountModal.style.display = 'none';
                }
            });

            // View All Buttons Functionality
            document.getElementById('viewAllBusinesses').addEventListener('click', function() {
                const additionalContent = document.getElementById('additionalBusinesses');
                additionalContent.classList.toggle('visible');
                this.textContent = additionalContent.classList.contains('visible') ? 'View Less' :
                    'View All';
            });

            document.getElementById('viewAllInquiries').addEventListener('click', function() {
                const additionalContent = document.getElementById('additionalInquiries');
                additionalContent.classList.toggle('visible');
                this.textContent = additionalContent.classList.contains('visible') ? 'View Less' :
                    'View All';
            });

            document.getElementById('viewAllReviews').addEventListener('click', function() {
                const additionalContent = document.getElementById('additionalReviews');
                additionalContent.classList.toggle('visible');
                this.textContent = additionalContent.classList.contains('visible') ? 'View Less' :
                    'View All';
            });

            // Messaging Functionality
            const messageInput = document.getElementById('messageInput');
            const sendMessageBtn = document.getElementById('sendMessageBtn');
            const messageContainer = document.getElementById('messageContainer');

            sendMessageBtn.addEventListener('click', sendMessage);
            messageInput.addEventListener('keypress', function(e) {
                if (e.key === 'Enter') {
                    sendMessage();
                }
            });

            function sendMessage() {
                const messageText = messageInput.value.trim();
                if (messageText) {
                    const now = new Date();
                    const hours = now.getHours();
                    const minutes = now.getMinutes();
                    const ampm = hours >= 12 ? 'PM' : 'AM';
                    const formattedHours = hours % 12 || 12;
                    const formattedMinutes = minutes < 10 ? '0' + minutes : minutes;
                    const timeString = `${formattedHours}:${formattedMinutes} ${ampm}`;

                    const messageDiv = document.createElement('div');
                    messageDiv.className = 'flex justify-end mb-4';
                    messageDiv.innerHTML = `
                        <div class="text-right">
                            <div class="bg-blue-600 text-white rounded-lg p-3 max-w-xs md:max-w-md ml-auto message-sent">
                                <p>${messageText}</p>
                            </div>
                            <p class="text-xs text-gray-500 mt-1">${timeString}</p>
                        </div>
                        <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="User" class="w-8 h-8 rounded-full ml-3">
                    `;

                    messageContainer.appendChild(messageDiv);
                    messageInput.value = '';
                    messageContainer.scrollTop = messageContainer.scrollHeight;

                    // Simulate reply after 1-3 seconds
                    setTimeout(simulateReply, 1000 + Math.random() * 2000);
                }
            }

            function simulateReply() {
                const replies = [
                    "We'll check on that and get back to you shortly.",
                    "Thanks for your message. Our team is looking into your request.",
                    "Can you provide more details about what you need?",
                    "We've noted your request and will update you soon.",
                    "Your message has been forwarded to the relevant department."
                ];

                const randomReply = replies[Math.floor(Math.random() * replies.length)];
                const now = new Date();
                const hours = now.getHours();
                const minutes = now.getMinutes();
                const ampm = hours >= 12 ? 'PM' : 'AM';
                const formattedHours = hours % 12 || 12;
                const formattedMinutes = minutes < 10 ? '0' + minutes : minutes;
                const timeString = `${formattedHours}:${formattedMinutes} ${ampm}`;

                const messageDiv = document.createElement('div');
                messageDiv.className = 'flex mb-4';
                messageDiv.innerHTML = `
                    <img src="https://randomuser.me/api/portraits/men/22.jpg" alt="User" class="w-8 h-8 rounded-full mr-3">
                    <div>
                        <div class="bg-gray-100 rounded-lg p-3 max-w-xs md:max-w-md message-received">
                            <p>${randomReply}</p>
                        </div>
                        <p class="text-xs text-gray-500 mt-1">${timeString}</p>
                    </div>
                `;

                messageContainer.appendChild(messageDiv);
                messageContainer.scrollTop = messageContainer.scrollHeight;
            }

            // Conversation switching
            const conversationItems = document.querySelectorAll('.conversation-item');
            conversationItems.forEach(item => {
                item.addEventListener('click', function() {
                    // Remove active class from all conversations
                    conversationItems.forEach(conv => {
                        conv.classList.remove('bg-blue-50');
                    });

                    // Add active class to clicked conversation
                    this.classList.add('bg-blue-50');

                    // Here you would typically load the conversation messages from your backend
                    // For demo purposes, we'll just show a loading message and then simulate loading
                    messageContainer.innerHTML = `
                        <div class="flex justify-center items-center h-full">
                            <div class="text-gray-500">Loading conversation...</div>
                        </div>
                    `;

                    setTimeout(() => {
                        const conversationId = this.getAttribute('data-conversation');
                        loadConversation(conversationId);
                    }, 800);
                });
            });

            function loadConversation(conversationId) {
                // In a real app, you would fetch the conversation from your backend
                // For demo purposes, we'll just show some sample messages
                const conversations = {
                    '1': [{
                            sender: 'them',
                            avatar: 'https://randomuser.me/api/portraits/women/44.jpg',
                            text: 'Hello Dr. Smith, thank you for your inquiry about our new oncology drugs. How can we assist you today?',
                            time: '9:15 AM'
                        },
                        {
                            sender: 'me',
                            avatar: 'https://randomuser.me/api/portraits/men/32.jpg',
                            text: "I'm interested in learning more about your XZ-450 drug for our clinical trials. Can you send me the trial data and pricing information?",
                            time: '9:20 AM'
                        },
                        {
                            sender: 'them',
                            avatar: 'https://randomuser.me/api/portraits/women/44.jpg',
                            text: 'Certainly! I\'ve attached the Phase II trial data and our pricing sheet. Let me know if you need any additional information.',
                            time: '9:25 AM'
                        }
                    ],
                    '2': [{
                            sender: 'them',
                            avatar: 'https://randomuser.me/api/portraits/men/22.jpg',
                            text: 'Hello Dr. Smith, your order #12345 has been shipped and will arrive on June 20th.',
                            time: '10:30 AM'
                        },
                        {
                            sender: 'me',
                            avatar: 'https://randomuser.me/api/portraits/men/32.jpg',
                            text: 'Thank you for the update. Could you provide the tracking number?',
                            time: '10:35 AM'
                        },
                        {
                            sender: 'them',
                            avatar: 'https://randomuser.me/api/portraits/men/22.jpg',
                            text: 'Of course! The tracking number is GPS123456789. You can track it on our website.',
                            time: '10:38 AM'
                        }
                    ],
                    '3': [{
                            sender: 'them',
                            avatar: 'https://randomuser.me/api/portraits/women/33.jpg',
                            text: 'Thank you for your recent review of our clinical trial services and research facilities.',
                            time: '2:15 PM'
                        },
                        {
                            sender: 'me',
                            avatar: 'https://randomuser.me/api/portraits/men/32.jpg',
                            text: 'You\'re welcome. Your team did an excellent job on the recent study. I especially appreciated Dr. Johnson\'s attention to detail.',
                            time: '2:30 PM'
                        },
                        {
                            sender: 'them',
                            avatar: 'https://randomuser.me/api/portraits/women/33.jpg',
                            text: 'We appreciate your feedback! Would you be interested in collaborating on our upcoming pancreatic cancer study?',
                            time: '3:45 PM'
                        }
                    ],
                    '4': [{
                            sender: 'them',
                            avatar: 'https://randomuser.me/api/portraits/men/55.jpg',
                            text: 'Your recent order has been processed and is ready for pickup at our warehouse.',
                            time: '11:05 AM'
                        },
                        {
                            sender: 'me',
                            avatar: 'https://randomuser.me/api/portraits/men/32.jpg',
                            text: 'Great! What are your warehouse hours this week?',
                            time: '11:15 AM'
                        }
                    ],
                    '5': [{
                        sender: 'them',
                        avatar: 'https://randomuser.me/api/portraits/women/66.jpg',
                        text: 'We\'ve reviewed your proposal and would like to schedule a meeting to discuss next steps.',
                        time: '1:20 PM'
                    }]
                };

                const messages = conversations[conversationId] || [];

                let messagesHTML = '';
                messages.forEach(msg => {
                    if (msg.sender === 'me') {
                        messagesHTML += `
                            <div class="flex justify-end mb-4">
                                <div class="text-right">
                                    <div class="bg-blue-600 text-white rounded-lg p-3 max-w-xs md:max-w-md ml-auto message-sent">
                                        <p>${msg.text}</p>
                                    </div>
                                    <p class="text-xs text-gray-500 mt-1">${msg.time}</p>
                                </div>
                                <img src="${msg.avatar}" alt="User" class="w-8 h-8 rounded-full ml-3">
                            </div>
                        `;
                    } else {
                        messagesHTML += `
                            <div class="flex mb-4">
                                <img src="${msg.avatar}" alt="User" class="w-8 h-8 rounded-full mr-3">
                                <div>
                                    <div class="bg-gray-100 rounded-lg p-3 max-w-xs md:max-w-md message-received">
                                        <p>${msg.text}</p>
                                    </div>
                                    <p class="text-xs text-gray-500 mt-1">${msg.time}</p>
                                </div>
                            </div>
                        `;
                    }
                });

                messageContainer.innerHTML = messagesHTML;
                messageContainer.scrollTop = messageContainer.scrollHeight;
            }

            // Load more conversations
            document.getElementById('loadMoreConversations').addEventListener('click', function() {
                const additionalConversations = document.querySelectorAll('.additional-conversation');
                additionalConversations.forEach(conv => {
                    conv.style.display = 'flex';
                });
                this.style.display = 'none';
            });

            // Notification functionality
            document.getElementById('clearAllNotifications').addEventListener('click', function() {
                const notificationItems = document.querySelectorAll('.notification-item');
                notificationItems.forEach(item => {
                    item.remove();
                });
            });

            document.querySelectorAll('.remove-notification').forEach(button => {
                button.addEventListener('click', function(e) {
                    e.stopPropagation();
                    this.closest('.notification-item').remove();
                });
            });

            // Load more notifications
            document.getElementById('loadMoreNotifications').addEventListener('click', function() {
                const additionalNotifications = document.querySelectorAll('.additional-notification');
                additionalNotifications.forEach(notif => {
                    notif.style.display = 'flex';
                });
                this.style.display = 'none';
            });

            // Delete account functionality
            const deleteAccountBtn = document.getElementById('deleteAccountBtn');
            const deleteAccountModal = document.getElementById('deleteAccountModal');
            const confirmDelete = document.getElementById('confirmDelete');
            const confirmDeleteBtn = document.getElementById('confirmDeleteBtn');

            deleteAccountBtn.addEventListener('click', function() {
                deleteAccountModal.style.display = 'flex';
            });

            confirmDelete.addEventListener('change', function() {
                confirmDeleteBtn.disabled = !this.checked;
            });

            confirmDeleteBtn.addEventListener('click', function() {
                if (confirmDelete.checked) {
                    alert(
                        'Account deletion requested. In a real application, this would delete your account.');
                    deleteAccountModal.style.display = 'none';
                }
            });
        });
    </script>
</body>

</html>
