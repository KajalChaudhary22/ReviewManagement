<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <!-- Added proper viewport meta tag for mobile devices -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>LabZora Dashboard</title>
   @include('business.layouts.styles')
</head>

<body>
    <!-- Sidebar -->
    @include('business.layouts.sidebar')

    <!-- Main Content -->
    <div class="main-content">
        <!-- Navbar -->
        @include('business.layouts.navbar')

        <!-- Content Area -->
        <div class="content">


            <!-- Settings Content -->
            <div id="settings-content" class="content-section">
                <div class="content-header">
                    <h1 class="welcome-text">Account Settings</h1>
                    <p class="date-text">{{ \Carbon\Carbon::now()->format('l, d F Y') }}</p>
                </div>

                <div class="settings-tabs">
                    <div class="tab active" data-tab="account">Account</div>
                    <div class="tab" data-tab="security">Security</div>
                    <div class="tab" data-tab="notifications">Notifications</div>
                    <div class="tab" data-tab="billing">Billing</div>
                </div>

                <div id="account-tab" class="tab-content active">
                    <div class="table-container">
                        <h2 class="section-title mb-20">Profile Information</h2>

                        <div class="flex" style="gap: 30px; margin-bottom: 30px; flex-wrap: wrap;">
                            <div style="flex: 1; min-width: 250px;">
                                <div class="form-group">
                                    <label class="form-label">First Name</label>
                                    <input type="text" class="form-control" value="John">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Email Address</label>
                                    <input type="email" class="form-control" value="john.doe@pharmacorp.com">
                                </div>
                            </div>
                            <div style="flex: 1; min-width: 250px;">
                                <div class="form-group">
                                    <label class="form-label">Last Name</label>
                                    <input type="text" class="form-control" value="Doe">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Phone Number</label>
                                    <input type="tel" class="form-control" value="+1 (555) 123-4567">
                                </div>
                            </div>
                        </div>

                        <h2 class="section-title mb-20">Profile Picture</h2>

                        <div
                            style="display: flex; align-items: center; gap: 20px; margin-bottom: 30px; flex-wrap: wrap;">
                            <div class="user-avatar" style="width: 80px; height: 80px;">
                                <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="John Doe">
                            </div>
                            <div style="display: flex; gap: 10px;">
                                <button class="btn btn-primary">Upload New</button>
                                <button class="btn" style="background-color: #f0f0f0;">Remove</button>
                            </div>
                        </div>

                        <div class="flex justify-between" style="margin-top: 30px; flex-wrap: wrap; gap: 10px;">
                            <button class="btn" style="background-color: #f0f0f0; flex: 1;">Cancel</button>
                            <button class="btn btn-primary" style="flex: 1;">Save Changes</button>
                        </div>
                    </div>
                </div>

                <div id="security-tab" class="tab-content">
                    <div class="table-container">
                        <h2 class="section-title mb-20">Password</h2>

                        <div class="form-group">
                            <label class="form-label">Current Password</label>
                            <input type="password" class="form-control" placeholder="Enter current password">
                        </div>

                        <div class="flex" style="gap: 30px; margin-bottom: 30px; flex-wrap: wrap;">
                            <div style="flex: 1; min-width: 250px;">
                                <div class="form-group">
                                    <label class="form-label">New Password</label>
                                    <input type="password" class="form-control" placeholder="Enter new password">
                                </div>
                            </div>
                            <div style="flex: 1; min-width: 250px;">
                                <div class="form-group">
                                    <label class="form-label">Confirm New Password</label>
                                    <input type="password" class="form-control" placeholder="Confirm new password">
                                </div>
                            </div>
                        </div>

                        <h2 class="section-title mb-20">Two-Factor Authentication</h2>

                        <div
                            style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px; flex-wrap: wrap;">
                            <div style="flex: 1; min-width: 200px;">
                                <div style="font-weight: 500; margin-bottom: 5px;">SMS Authentication</div>
                                <div style="color: var(--text-light);">Add your phone number to receive security codes
                                    via SMS</div>
                            </div>
                            <button class="btn" style="background-color: #f0f0f0;">Enable</button>
                        </div>

                        <div
                            style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap;">
                            <div style="flex: 1; min-width: 200px;">
                                <div style="font-weight: 500; margin-bottom: 5px;">Authenticator App</div>
                                <div style="color: var(--text-light);">Use an authenticator app to generate security
                                    codes</div>
                            </div>
                            <button class="btn" style="background-color: #f0f0f0;">Enable</button>
                        </div>

                        <div class="flex justify-between" style="margin-top: 30px; flex-wrap: wrap; gap: 10px;">
                            <button class="btn" style="background-color: #f0f0f0; flex: 1;">Cancel</button>
                            <button class="btn btn-primary" style="flex: 1;">Save Changes</button>
                        </div>
                    </div>
                </div>

                <div id="notifications-tab" class="tab-content">
                    <div class="table-container">
                        <h2 class="section-title mb-20">Notification Preferences</h2>

                        <h3 style="margin-bottom: 15px; font-weight: 500;">Email Notifications</h3>

                        <div
                            style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 15px; flex-wrap: wrap;">
                            <div style="flex: 1; min-width: 200px;">
                                <div style="font-weight: 500; margin-bottom: 5px;">New Orders</div>
                                <div style="color: var(--text-light);">Receive notifications when new orders are placed
                                </div>
                            </div>
                            <label class="switch">
                                <input type="checkbox" checked>
                                <span class="slider round"></span>
                            </label>
                        </div>

                        <div
                            style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 15px; flex-wrap: wrap;">
                            <div style="flex: 1; min-width: 200px;">
                                <div style="font-weight: 500; margin-bottom: 5px;">Inquiries</div>
                                <div style="color: var(--text-light);">Receive notifications for new inquiries</div>
                            </div>
                            <label class="switch">
                                <input type="checkbox" checked>
                                <span class="slider round"></span>
                            </label>
                        </div>

                        <div
                            style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 15px; flex-wrap: wrap;">
                            <div style="flex: 1; min-width: 200px;">
                                <div style="font-weight: 500; margin-bottom: 5px;">Reviews</div>
                                <div style="color: var(--text-light);">Receive notifications for new reviews</div>
                            </div>
                            <label class="switch">
                                <input type="checkbox" checked>
                                <span class="slider round"></span>
                            </label>
                        </div>

                        <div
                            style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px; flex-wrap: wrap;">
                            <div style="flex: 1; min-width: 200px;">
                                <div style="font-weight: 500; margin-bottom: 5px;">Promotions</div>
                                <div style="color: var(--text-light);">Receive promotional emails and offers</div>
                            </div>
                            <label class="switch">
                                <input type="checkbox">
                                <span class="slider round"></span>
                            </label>
                        </div>

                        <h3 style="margin-bottom: 15px; font-weight: 500;">Push Notifications</h3>

                        <div
                            style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 15px; flex-wrap: wrap;">
                            <div style="flex: 1; min-width: 200px;">
                                <div style="font-weight: 500; margin-bottom: 5px;">Order Updates</div>
                                <div style="color: var(--text-light);">Receive push notifications for order status
                                    changes</div>
                            </div>
                            <label class="switch">
                                <input type="checkbox" checked>
                                <span class="slider round"></span>
                            </label>
                        </div>

                        <div
                            style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap;">
                            <div style="flex: 1; min-width: 200px;">
                                <div style="font-weight: 500; margin-bottom: 5px;">Important Alerts</div>
                                <div style="color: var(--text-light);">Receive important system alerts and
                                    notifications</div>
                            </div>
                            <label class="switch">
                                <input type="checkbox" checked>
                                <span class="slider round"></span>
                            </label>
                        </div>

                        <div class="flex justify-between" style="margin-top: 30px; flex-wrap: wrap; gap: 10px;">
                            <button class="btn" style="background-color: #f0f0f0; flex: 1;">Cancel</button>
                            <button class="btn btn-primary" style="flex: 1;">Save Changes</button>
                        </div>
                    </div>
                </div>

                <div id="billing-tab" class="tab-content">
                    <div class="table-container">
                        <h2 class="section-title mb-20">Billing Information</h2>

                        <div class="flex" style="gap: 30px; margin-bottom: 30px; flex-wrap: wrap;">
                            <div style="flex: 1; min-width: 250px;">
                                <div class="form-group">
                                    <label class="form-label">Card Number</label>
                                    <input type="text" class="form-control" value="•••• •••• •••• 4242">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Name on Card</label>
                                    <input type="text" class="form-control" value="John Doe">
                                </div>
                            </div>
                            <div style="flex: 1; min-width: 250px;">
                                <div class="form-group">
                                    <label class="form-label">Expiration Date</label>
                                    <input type="text" class="form-control" value="12/25">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Security Code</label>
                                    <input type="text" class="form-control" placeholder="•••">
                                </div>
                            </div>
                        </div>

                        <h2 class="section-title mb-20">Billing History</h2>

                        <table>
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Description</th>
                                    <th>Amount</th>
                                    <th>Status</th>
                                    <th>Invoice</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>15 Feb 2024</td>
                                    <td>Premium Subscription</td>
                                    <td>$99.00</td>
                                    <td><span class="status completed">Paid</span></td>
                                    <td><a href="#" style="color: var(--primary-color);">Download</a></td>
                                </tr>
                                <tr>
                                    <td>15 Jan 2024</td>
                                    <td>Premium Subscription</td>
                                    <td>$99.00</td>
                                    <td><span class="status completed">Paid</span></td>
                                    <td><a href="#" style="color: var(--primary-color);">Download</a></td>
                                </tr>
                                <tr>
                                    <td>15 Dec 2023</td>
                                    <td>Premium Subscription</td>
                                    <td>$99.00</td>
                                    <td><span class="status completed">Paid</span></td>
                                    <td><a href="#" style="color: var(--primary-color);">Download</a></td>
                                </tr>
                            </tbody>
                        </table>

                        <div class="flex justify-between" style="margin-top: 30px; flex-wrap: wrap; gap: 10px;">
                            <button class="btn" style="background-color: #f0f0f0; flex: 1;">Cancel</button>
                            <button class="btn btn-primary" style="flex: 1;">Save Changes</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Mobile Menu Toggle (Hidden on Desktop) -->
    <div class="menu-toggle hidden">
        <i class="icon">≡</i>
    </div>

    <!-- Product Modal -->
    <div class="modal" id="product-modal">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title">Add New Product</h2>
                <button class="close-modal">&times;</button>
            </div>
            <form id="product-form">
                <div class="form-group">
                    <label class="form-label">Product Name</label>
                    <input type="text" class="form-control" id="product-name" required>
                </div>
                <div class="form-group">
                    <label class="form-label">Description</label>
                    <textarea class="form-control" id="product-description" rows="3" required></textarea>
                </div>
                <div class="flex" style="gap: 20px; flex-wrap: wrap;">
                    <div class="form-group" style="flex: 1; min-width: 200px;">
                        <label class="form-label">SKU</label>
                        <input type="text" class="form-control" id="product-sku" required>
                    </div>
                    <div class="form-group" style="flex: 1; min-width: 200px;">
                        <label class="form-label">Category</label>
                        <select class="form-control" id="product-category" required>
                            <option value="">Select Category</option>
                            <option>Antibiotics</option>
                            <option>Pain Relievers</option>
                            <option>Vitamins</option>
                            <option>Supplements</option>
                        </select>
                    </div>
                </div>
                <div class="flex" style="gap: 20px; flex-wrap: wrap;">
                    <div class="form-group" style="flex: 1; min-width: 200px;">
                        <label class="form-label">Price ($)</label>
                        <input type="number" class="form-control" id="product-price" step="0.01" required>
                    </div>
                    <div class="form-group" style="flex: 1; min-width: 200px;">
                        <label class="form-label">Quantity in Stock</label>
                        <input type="number" class="form-control" id="product-quantity" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-label">Product Image</label>
                    <input type="file" class="form-control" id="product-image">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn" style="background-color: #f0f0f0; flex: 1;">Cancel</button>
                    <button type="submit" class="btn btn-primary" style="flex: 1;">Save Product</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Service Modal -->
    <div class="modal" id="service-modal">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title">Add New Service</h2>
                <button class="close-modal">&times;</button>
            </div>
            <form id="service-form">
                <div class="form-group">
                    <label class="form-label">Service Name</label>
                    <input type="text" class="form-control" id="service-name" required>
                </div>
                <div class="form-group">
                    <label class="form-label">Description</label>
                    <textarea class="form-control" id="service-description" rows="3" required></textarea>
                </div>
                <div class="form-group">
                    <label class="form-label">Price</label>
                    <input type="text" class="form-control" id="service-price" required>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn" style="background-color: #f0f0f0; flex: 1;">Cancel</button>
                    <button type="submit" class="btn btn-primary" style="flex: 1;">Save Service</button>
                </div>
            </form>
        </div>
    </div>

    <!-- View Inquiry Modal -->
    <div class="modal" id="view-inquiry-modal">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title">Inquiry Details</h2>
                <button class="close-modal">&times;</button>
            </div>
            <div class="form-group">
                <label class="form-label">Company</label>
                <input type="text" class="form-control" id="inquiry-company" readonly>
            </div>
            <div class="form-group">
                <label class="form-label">Contact Email</label>
                <input type="text" class="form-control" id="inquiry-email" readonly>
            </div>
            <div class="form-group">
                <label class="form-label">Product</label>
                <input type="text" class="form-control" id="inquiry-product" readonly>
            </div>
            <div class="form-group">
                <label class="form-label">Quantity</label>
                <input type="text" class="form-control" id="inquiry-quantity" readonly>
            </div>
            <div class="form-group">
                <label class="form-label">Message</label>
                <textarea class="form-control" id="inquiry-message" rows="4" readonly></textarea>
            </div>
            <div class="form-group">
                <label class="form-label">Status</label>
                <select class="form-control" id="inquiry-status">
                    <option value="pending">Pending</option>
                    <option value="in-progress">In Progress</option>
                    <option value="completed">Completed</option>
                </select>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn" style="background-color: #f0f0f0; flex: 1;">Cancel</button>
                <button type="button" class="btn btn-primary" style="flex: 1;" id="save-inquiry-btn">Save
                    Changes</button>
            </div>
        </div>
    </div>

    <!-- Reply Review Modal -->
    <div class="modal" id="reply-review-modal">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title">Reply to Review</h2>
                <button class="close-modal">&times;</button>
            </div>
            <div class="form-group">
                <label class="form-label">Reviewer</label>
                <input type="text" class="form-control" id="reviewer-name" readonly>
            </div>
            <div class="form-group">
                <label class="form-label">Rating</label>
                <div id="review-rating" style="color: #FFC107; font-size: 1.2rem;"></div>
            </div>
            <div class="form-group">
                <label class="form-label">Review</label>
                <textarea class="form-control" id="review-text" rows="3" readonly></textarea>
            </div>
            <div class="form-group">
                <label class="form-label">Your Response</label>
                <textarea class="form-control" id="review-response" rows="4" required></textarea>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn" style="background-color: #f0f0f0; flex: 1;">Cancel</button>
                <button type="button" class="btn btn-primary" style="flex: 1;" id="submit-review-response">Submit
                    Response</button>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {


            // Settings Tabs
            const settingsTabs = document.querySelectorAll('.settings-tabs .tab');
            const tabContents = document.querySelectorAll('.tab-content');

            settingsTabs.forEach(tab => {
                tab.addEventListener('click', function() {
                    // Remove active class from all tabs
                    settingsTabs.forEach(t => t.classList.remove('active'));
                    // Add active class to clicked tab
                    this.classList.add('active');

                    // Hide all tab contents
                    tabContents.forEach(content => content.classList.remove('active'));

                    // Show the selected tab content
                    const tabId = this.getAttribute('data-tab') + '-tab';
                    document.getElementById(tabId).classList.add('active');
                });
            });

            // Mobile Menu Toggle
            const menuToggle = document.querySelector('.menu-toggle');
            const sidebar = document.querySelector('.sidebar');

            menuToggle.addEventListener('click', function() {
                sidebar.classList.toggle('active');
            });

            // Check screen size and show/hide menu toggle accordingly
            function checkScreenSize() {
                if (window.innerWidth <= 576) {
                    menuToggle.classList.remove('hidden');
                    sidebar.classList.remove('active');
                } else {
                    menuToggle.classList.add('hidden');
                }
            }

            // Initial check
            checkScreenSize();

            // Add resize event listener
            window.addEventListener('resize', checkScreenSize);

            // Simulate chart animations when they come into view
            const animateOnScroll = function() {
                const charts = document.querySelectorAll('.chart-line');

                charts.forEach(chart => {
                    const chartPosition = chart.getBoundingClientRect().top;
                    const screenPosition = window.innerHeight / 1.3;

                    if (chartPosition < screenPosition) {
                        chart.style.animation = 'chartAnimation 1.5s ease-out';
                    }
                });
            };

            window.addEventListener('scroll', animateOnScroll);

            // Initial animation trigger
            animateOnScroll();

            // Modal functionality
            const modals = document.querySelectorAll('.modal');
            const closeModalButtons = document.querySelectorAll('.close-modal');

            function openModal(modalId) {
                document.getElementById(modalId).style.display = 'flex';
                document.body.style.overflow = 'hidden';
            }

            function closeModal(modalId) {
                document.getElementById(modalId).style.display = 'none';
                document.body.style.overflow = 'auto';
            }

            // Close modal when clicking on X or cancel button
            closeModalButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const modal = this.closest('.modal');
                    closeModal(modal.id);
                });
            });

            // Close modal when clicking outside the modal content
            modals.forEach(modal => {
                modal.addEventListener('click', function(e) {
                    if (e.target === this) {
                        closeModal(this.id);
                    }
                });
            });



            // Export Analytics Data
            exportAnalyticsBtn.addEventListener('click', function() {
                // In a real app, you would generate and download an Excel file
                // For demo purposes, we'll simulate a download
                alert('Exporting analytics data to Excel file...');

                // Simulate file download
                const data = [
                    ['Order ID', 'Date', 'Customer', 'Products', 'Amount', 'Status'],
                    ['#PC-10245', '20 Feb 2024', 'MediLife Inc.', 'Antibiotic X (500)', '$12,495.00',
                        'Completed'
                    ],
                    ['#PC-10244', '19 Feb 2024', 'HealthPlus', 'Pain Reliever Y (1000)', '$19,990.00',
                        'Pending'
                    ],
                    ['#PC-10243', '18 Feb 2024', 'PharmaGlobal', 'Vitamin Complex (2000)', '$59,980.00',
                        'Processing'
                    ]
                ];

                let csvContent = "data:text/csv;charset=utf-8,";
                data.forEach(row => {
                    csvContent += row.join(",") + "\r\n";
                });

                const encodedUri = encodeURI(csvContent);
                const link = document.createElement("a");
                link.setAttribute("href", encodedUri);
                link.setAttribute("download", "analytics_export.csv");
                document.body.appendChild(link);
                link.click();
                document.body.removeChild(link);
            });

            // Pagination for Orders
            let currentOrderPage = 1;

            prevOrdersBtn.addEventListener('click', function() {
                if (currentOrderPage > 1) {
                    currentOrderPage--;
                    // In a real app, you would fetch the previous page of orders
                    alert(`Loading page ${currentOrderPage} of orders...`);
                }
            });

            nextOrdersBtn.addEventListener('click', function() {
                currentOrderPage++;
                // In a real app, you would fetch the next page of orders
                alert(`Loading page ${currentOrderPage} of orders...`);
            });

            // Quick Actions
            document.getElementById('quick-add-product').addEventListener('click', function() {
                // Navigate to products section and trigger add product
                menuItems.forEach(i => i.classList.remove('active'));
                document.querySelector('.menu-item[data-content="products"]').classList.add('active');

                contentSections.forEach(section => section.classList.add('hidden'));
                document.getElementById('products-content').classList.remove('hidden');

                // Trigger add product
                addProductBtn.click();
            });

            document.getElementById('quick-view-inquiries').addEventListener('click', function() {
                // Navigate to inquiries section
                menuItems.forEach(i => i.classList.remove('active'));
                document.querySelector('.menu-item[data-content="inquiries"]').classList.add('active');

                contentSections.forEach(section => section.classList.add('hidden'));
                document.getElementById('inquiries-content').classList.remove('hidden');
            });

            document.getElementById('quick-edit-profile').addEventListener('click', function() {
                // Navigate to profile section
                menuItems.forEach(i => i.classList.remove('active'));
                document.querySelector('.menu-item[data-content="profile"]').classList.add('active');

                contentSections.forEach(section => section.classList.add('hidden'));
                document.getElementById('profile-content').classList.remove('hidden');
            });

            document.getElementById('quick-view-analytics').addEventListener('click', function() {
                // Navigate to analytics section
                menuItems.forEach(i => i.classList.remove('active'));
                document.querySelector('.menu-item[data-content="analytics"]').classList.add('active');

                contentSections.forEach(section => section.classList.add('hidden'));
                document.getElementById('analytics-content').classList.remove('hidden');
            });
        });
    </script>
</body>

</html>
