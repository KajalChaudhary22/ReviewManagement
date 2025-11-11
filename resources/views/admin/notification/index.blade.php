<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin Notifications</title>
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
        <div class="sidebar bg-white w-64 border-r border-gray-200 flex-shrink-0">
            <div class="p-4 border-b border-gray-200">
                <a href="#" class="text-xl md:text-2xl font-bold"><img src="{{ asset('build/images/logo.jpg') }}"
                        alt="SCIZORA logo" width="200" height="60"></a>
            </div>
            <nav class="p-4">
                <ul>
                    <li class="mb-2">
                        <a href="dashboard.html"
                            class="flex items-center p-3 rounded-lg text-gray-700 hover:bg-gray-100">
                            <i class="fas fa-tachometer-alt mr-3"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="My-Profile.html"
                            class="flex items-center p-3 rounded-lg text-gray-700 hover:bg-gray-100">
                            <i class="fas fa-user mr-3"></i>
                            <span>My Profile</span>
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="Messages.html"
                            class="flex items-center p-3 rounded-lg text-gray-700 hover:bg-gray-100">
                            <i class="fas fa-envelope mr-3"></i>
                            <span>Messages</span>
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="Notifications.html"
                            class="flex items-center p-3 rounded-lg text-blue-600 font-medium bg-blue-50"
                            data-section="notifications">
                            <i class="fas fa-bell mr-3"></i>
                            <span>Notifications</span>
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="Settings.html"
                            class="flex items-center p-3 rounded-lg text-gray-700 hover:bg-gray-100">
                            <i class="fas fa-cog mr-3"></i>
                            <span>Settings</span>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- Ad Banner -->
            <div class="container mx-auto px-4 py-6">
                <img src="https://tpc.googlesyndication.com/simgad/13265185988757716340" alt="Advertisement"
                    class="w-full h-auto mx-auto">
            </div>
        </div>

        <!-- Main Content Area -->
        <div class="flex-1 overflow-auto">
            <!-- Top Navigation Bar -->
            <header class="bg-white border-b border-gray-200 p-4 flex items-center justify-between sticky top-0 z-10">
                <button
                    class="hamburger p-2 rounded-md text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500 md:hidden">
                    <i class="fas fa-bars text-xl"></i>
                </button>
                <div class="flex-1 max-w-md mx-4">
                    <div class="relative">
                        <input type="text" placeholder="Search..."
                            class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
                    </div>
                </div>

                <div class="flex items-center space-x-4">
                    <button class="relative p-2 text-gray-600 hover:text-gray-900 focus:outline-none">
                        <a href="notification.html"><i class="fas fa-bell text-xl"></i>
                            <span class="absolute top-0 right-0 h-2 w-2 rounded-full bg-[#1544da]"></span></a>
                    </button>
                    <div class="flex items-center">
                        <a href="edit-profile.html"><img src="https://randomuser.me/api/portraits/men/32.jpg"
                                alt="User" class="w-10 h-10 rounded-full"></a>
                        <span class="ml-2 font-medium hidden md:inline">Dr. John Smith</span>
                        <!-- The Logout Button -->
                        <a href="#" class="logout-btn" title="Logout">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" align="right"
                                fill="currentColor" viewBox="0 0 16 16">
                                <path d="M8.5 10c-.276 0-.5-.448-.5-1s.224-1 .5-1 .5.448.5 1-.224 1-.5 1z" />
                                <path
                                    d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2.5a.5.5 0 0 0 1 0v-2.5a1.5 1.5 0 0 0-1.5-1.5h-8A1.5 1.5 0 0 0 0 4.5v9A1.5 1.5 0 0 0 1.5 15h8a1.5 1.5 0 0 0 1.5-1.5v-2.5a.5.5 0 0 0-1 0v2.5z" />
                                <path
                                    d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z" />
                            </svg>
                        </a>
                    </div>
                    <!-- END: Profile and Logout Button Group -->
                </div>
            </header>

            <!-- Main Content Sections -->
            <main class="p-6">


                <!-- Notifications Section -->
                <section id="notifications" class="content-section active">
                    <h2 class="text-2xl font-bold text-gray-800 mb-6">Notifications</h2>
                    <div class="bg-white rounded-lg shadow-md overflow-hidden">
                        <div class="p-4 border-b border-gray-200 flex justify-between items-center">
                            <h3 class="font-bold">Recent Notifications</h3>
                            <button class="text-blue-600 hover:text-blue-800" id="clearAllNotifications">Clear
                                All</button>
                        </div>
                        
                        <div class="divide-y divide-gray-200">
                            @forelse($notifications as $notification)
                                <div class="p-4 hover:bg-gray-50 cursor-pointer notification-item 
                                    {{ $notification->is_read ? 'opacity-60' : '' }}"
                                    data-id="{{ $notification->id }}">
                                    <div class="flex items-start">
                                        <div class="p-2 rounded-full bg-blue-100 text-blue-600 mr-4">
                                            <i class="fas fa-envelope"></i>
                                        </div>
                                        <div class="flex-1">
                                            <h4 class="font-medium">{{ $notification->title ?? 'Notification' }}</h4>
                                            <p class="text-gray-600">{{ $notification->message ?? '' }}</p>
                                            <p class="text-sm text-gray-500 mt-1">
                                                {{ $notification?->created_at?->diffForHumans() }}</p>
                                        </div>
                                        <button class="text-gray-400 hover:text-gray-600 remove-notification">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                </div>
                            @empty
                                <p class="p-4 text-gray-500 text-center">No notifications found.</p>
                            @endforelse
                        </div>

                        <div class="p-3 border-t border-gray-200 text-center">
                            <button id="loadMoreNotifications" class="text-blue-600 hover:text-blue-800 text-sm">Load
                                More Notifications</button>
                        </div>
                    </div>
                </section>


            </main>
        </div>
    </div>

    <!-- Mobile Overlay -->
    <div class="overlay"></div>

    
    @include('layouts.commonjs')
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
            // document.getElementById('viewAllBusinesses').addEventListener('click', function() {
            //     const additionalContent = document.getElementById('additionalBusinesses');
            //     additionalContent.classList.toggle('visible');
            //     this.textContent = additionalContent.classList.contains('visible') ? 'View Less' :
            //         'View All';
            // });

            // document.getElementById('viewAllInquiries').addEventListener('click', function() {
            //     const additionalContent = document.getElementById('additionalInquiries');
            //     additionalContent.classList.toggle('visible');
            //     this.textContent = additionalContent.classList.contains('visible') ? 'View Less' :
            //         'View All';
            // });

            // document.getElementById('viewAllReviews').addEventListener('click', function() {
            //     const additionalContent = document.getElementById('additionalReviews');
            //     additionalContent.classList.toggle('visible');
            //     this.textContent = additionalContent.classList.contains('visible') ? 'View Less' :
            //         'View All';
            // });

            // Messaging Functionality
            //     const messageInput = document.getElementById('messageInput');
            //     const sendMessageBtn = document.getElementById('sendMessageBtn');
            //     const messageContainer = document.getElementById('messageContainer');

            //     sendMessageBtn.addEventListener('click', sendMessage);
            //     messageInput.addEventListener('keypress', function(e) {
            //         if (e.key === 'Enter') {
            //             sendMessage();
            //         }
            //     });

            //     function sendMessage() {
            //         const messageText = messageInput.value.trim();
            //         if (messageText) {
            //             const now = new Date();
            //             const hours = now.getHours();
            //             const minutes = now.getMinutes();
            //             const ampm = hours >= 12 ? 'PM' : 'AM';
            //             const formattedHours = hours % 12 || 12;
            //             const formattedMinutes = minutes < 10 ? '0' + minutes : minutes;
            //             const timeString = `${formattedHours}:${formattedMinutes} ${ampm}`;

            //             const messageDiv = document.createElement('div');
            //             messageDiv.className = 'flex justify-end mb-4';
            //             messageDiv.innerHTML = `
        //                 <div class="text-right">
        //                     <div class="bg-blue-600 text-white rounded-lg p-3 max-w-xs md:max-w-md ml-auto message-sent">
        //                         <p>${messageText}</p>
        //                     </div>
        //                     <p class="text-xs text-gray-500 mt-1">${timeString}</p>
        //                 </div>
        //                 <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="User" class="w-8 h-8 rounded-full ml-3">
        //             `;

            //             messageContainer.appendChild(messageDiv);
            //             messageInput.value = '';
            //             messageContainer.scrollTop = messageContainer.scrollHeight;

            //             // Simulate reply after 1-3 seconds
            //             setTimeout(simulateReply, 1000 + Math.random() * 2000);
            //         }
            //     }

            //     function simulateReply() {
            //         const replies = [
            //             "We'll check on that and get back to you shortly.",
            //             "Thanks for your message. Our team is looking into your request.",
            //             "Can you provide more details about what you need?",
            //             "We've noted your request and will update you soon.",
            //             "Your message has been forwarded to the relevant department."
            //         ];

            //         const randomReply = replies[Math.floor(Math.random() * replies.length)];
            //         const now = new Date();
            //         const hours = now.getHours();
            //         const minutes = now.getMinutes();
            //         const ampm = hours >= 12 ? 'PM' : 'AM';
            //         const formattedHours = hours % 12 || 12;
            //         const formattedMinutes = minutes < 10 ? '0' + minutes : minutes;
            //         const timeString = `${formattedHours}:${formattedMinutes} ${ampm}`;

            //         const messageDiv = document.createElement('div');
            //         messageDiv.className = 'flex mb-4';
            //         messageDiv.innerHTML = `
        //             <img src="https://randomuser.me/api/portraits/men/22.jpg" alt="User" class="w-8 h-8 rounded-full mr-3">
        //             <div>
        //                 <div class="bg-gray-100 rounded-lg p-3 max-w-xs md:max-w-md message-received">
        //                     <p>${randomReply}</p>
        //                 </div>
        //                 <p class="text-xs text-gray-500 mt-1">${timeString}</p>
        //             </div>
        //         `;

            //         messageContainer.appendChild(messageDiv);
            //         messageContainer.scrollTop = messageContainer.scrollHeight;
            //     }

            //     // Conversation switching
            //     const conversationItems = document.querySelectorAll('.conversation-item');
            //     conversationItems.forEach(item => {
            //         item.addEventListener('click', function() {
            //             // Remove active class from all conversations
            //             conversationItems.forEach(conv => {
            //                 conv.classList.remove('bg-blue-50');
            //             });

            //             // Add active class to clicked conversation
            //             this.classList.add('bg-blue-50');

            //             // Here you would typically load the conversation messages from your backend
            //             // For demo purposes, we'll just show a loading message and then simulate loading
            //             messageContainer.innerHTML = `
        //                 <div class="flex justify-center items-center h-full">
        //                     <div class="text-gray-500">Loading conversation...</div>
        //                 </div>
        //             `;

            //             setTimeout(() => {
            //                 const conversationId = this.getAttribute('data-conversation');
            //                 loadConversation(conversationId);
            //             }, 800);
            //         });
            //     });

            //     function loadConversation(conversationId) {
            //         // In a real app, you would fetch the conversation from your backend
            //         // For demo purposes, we'll just show some sample messages
            //         const conversations = {
            //             '1': [{
            //                     sender: 'them',
            //                     avatar: 'https://randomuser.me/api/portraits/women/44.jpg',
            //                     text: 'Hello Dr. Smith, thank you for your inquiry about our new oncology drugs. How can we assist you today?',
            //                     time: '9:15 AM'
            //                 },
            //                 {
            //                     sender: 'me',
            //                     avatar: 'https://randomuser.me/api/portraits/men/32.jpg',
            //                     text: "I'm interested in learning more about your XZ-450 drug for our clinical trials. Can you send me the trial data and pricing information?",
            //                     time: '9:20 AM'
            //                 },
            //                 {
            //                     sender: 'them',
            //                     avatar: 'https://randomuser.me/api/portraits/women/44.jpg',
            //                     text: 'Certainly! I\'ve attached the Phase II trial data and our pricing sheet. Let me know if you need any additional information.',
            //                     time: '9:25 AM'
            //                 }
            //             ],
            //             '2': [{
            //                     sender: 'them',
            //                     avatar: 'https://randomuser.me/api/portraits/men/22.jpg',
            //                     text: 'Hello Dr. Smith, your order #12345 has been shipped and will arrive on June 20th.',
            //                     time: '10:30 AM'
            //                 },
            //                 {
            //                     sender: 'me',
            //                     avatar: 'https://randomuser.me/api/portraits/men/32.jpg',
            //                     text: 'Thank you for the update. Could you provide the tracking number?',
            //                     time: '10:35 AM'
            //                 },
            //                 {
            //                     sender: 'them',
            //                     avatar: 'https://randomuser.me/api/portraits/men/22.jpg',
            //                     text: 'Of course! The tracking number is GPS123456789. You can track it on our website.',
            //                     time: '10:38 AM'
            //                 }
            //             ],
            //             '3': [{
            //                     sender: 'them',
            //                     avatar: 'https://randomuser.me/api/portraits/women/33.jpg',
            //                     text: 'Thank you for your recent review of our clinical trial services and research facilities.',
            //                     time: '2:15 PM'
            //                 },
            //                 {
            //                     sender: 'me',
            //                     avatar: 'https://randomuser.me/api/portraits/men/32.jpg',
            //                     text: 'You\'re welcome. Your team did an excellent job on the recent study. I especially appreciated Dr. Johnson\'s attention to detail.',
            //                     time: '2:30 PM'
            //                 },
            //                 {
            //                     sender: 'them',
            //                     avatar: 'https://randomuser.me/api/portraits/women/33.jpg',
            //                     text: 'We appreciate your feedback! Would you be interested in collaborating on our upcoming pancreatic cancer study?',
            //                     time: '3:45 PM'
            //                 }
            //             ],
            //             '4': [{
            //                     sender: 'them',
            //                     avatar: 'https://randomuser.me/api/portraits/men/55.jpg',
            //                     text: 'Your recent order has been processed and is ready for pickup at our warehouse.',
            //                     time: '11:05 AM'
            //                 },
            //                 {
            //                     sender: 'me',
            //                     avatar: 'https://randomuser.me/api/portraits/men/32.jpg',
            //                     text: 'Great! What are your warehouse hours this week?',
            //                     time: '11:15 AM'
            //                 }
            //             ],
            //             '5': [{
            //                 sender: 'them',
            //                 avatar: 'https://randomuser.me/api/portraits/women/66.jpg',
            //                 text: 'We\'ve reviewed your proposal and would like to schedule a meeting to discuss next steps.',
            //                 time: '1:20 PM'
            //             }]
            //         };

            //         const messages = conversations[conversationId] || [];

            //         let messagesHTML = '';
            //         messages.forEach(msg => {
            //             if (msg.sender === 'me') {
            //                 messagesHTML += `
        //                     <div class="flex justify-end mb-4">
        //                         <div class="text-right">
        //                             <div class="bg-blue-600 text-white rounded-lg p-3 max-w-xs md:max-w-md ml-auto message-sent">
        //                                 <p>${msg.text}</p>
        //                             </div>
        //                             <p class="text-xs text-gray-500 mt-1">${msg.time}</p>
        //                         </div>
        //                         <img src="${msg.avatar}" alt="User" class="w-8 h-8 rounded-full ml-3">
        //                     </div>
        //                 `;
            //             } else {
            //                 messagesHTML += `
        //                     <div class="flex mb-4">
        //                         <img src="${msg.avatar}" alt="User" class="w-8 h-8 rounded-full mr-3">
        //                         <div>
        //                             <div class="bg-gray-100 rounded-lg p-3 max-w-xs md:max-w-md message-received">
        //                                 <p>${msg.text}</p>
        //                             </div>
        //                             <p class="text-xs text-gray-500 mt-1">${msg.time}</p>
        //                         </div>
        //                     </div>
        //                 `;
            //             }
            //         });

            //         messageContainer.innerHTML = messagesHTML;
            //         messageContainer.scrollTop = messageContainer.scrollHeight;
            //     }

            //     // Load more conversations
            //     document.getElementById('loadMoreConversations').addEventListener('click', function() {
            //         const additionalConversations = document.querySelectorAll('.additional-conversation');
            //         additionalConversations.forEach(conv => {
            //             conv.style.display = 'flex';
            //         });
            //         this.style.display = 'none';
            //     });

            // Clear all notifications
            document.getElementById('clearAllNotifications')?.addEventListener('click', function() {
                fetch('/admin/notifications/mark-all-read', {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                        }
                    })
                    .then(res => res.json())
                    .then(res => {
                        if (res.success) {
                            document.querySelectorAll('.notification-item').forEach(item => {
                                item.classList.add('opacity-60');
                            });
                            showAlert('success', res.message || 'All notifications marked as read.');
                        } else {
                            showAlert('error', res.message || 'Something went wrong.');
                        }
                    })
                    .catch(() => showAlert('error', 'Server error. Please try again later.'));
            });

            // Mark single notification as read (❌ icon)
            // Mark single notification as read
            document.querySelectorAll('.remove-notification').forEach(button => {
                button.addEventListener('click', function(e) {
                    e.stopPropagation();
                    const item = this.closest('.notification-item');
                    const id = item.dataset.id;

                    fetch(`/admin/notifications/mark-read/${id}`, {
                            method: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': document.querySelector(
                                    'meta[name="csrf-token"]').content
                            }
                        })
                        .then(res => res.json())
                        .then(res => {
                            if (res.success) {
                                item.classList.add('opacity-60');
                                showAlert('success', res.message ||
                                    'Notification marked as read.');
                            } else {
                                showAlert('error', res.message || 'Notification not found.');
                            }
                        })
                        .catch(() => showAlert('error', 'Server error. Please try again later.'));
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

            //     // Delete account functionality
            //     const deleteAccountBtn = document.getElementById('deleteAccountBtn');
            //     const deleteAccountModal = document.getElementById('deleteAccountModal');
            //     const confirmDelete = document.getElementById('confirmDelete');
            //     const confirmDeleteBtn = document.getElementById('confirmDeleteBtn');

            //     deleteAccountBtn.addEventListener('click', function() {
            //         deleteAccountModal.style.display = 'flex';
            //     });

            //     confirmDelete.addEventListener('change', function() {
            //         confirmDeleteBtn.disabled = !this.checked;
            //     });

            //     confirmDeleteBtn.addEventListener('click', function() {
            //         if (confirmDelete.checked) {
            //             alert(
            //                 'Account deletion requested. In a real application, this would delete your account.');
            //             deleteAccountModal.style.display = 'none';
            //         }
            //     });
        });
    </script>
</body>

</html>
