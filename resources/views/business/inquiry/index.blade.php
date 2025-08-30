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


            <!-- Inquiries Content -->
            <div id="inquiries-content" class="content-section">
                <div class="content-header">
                    <h1 class="welcome-text">Inquiries</h1>
                    <p class="date-text">{{ \Carbon\Carbon::now()->format('l, d F Y') }}</p>
                </div>

               @include('business.inquiry.graph')

                <div class="table-container">
                    <div class="table-header">
                        <h2 class="section-title">Recent Inquiries</h2>
                        <div style="display: flex; gap: 10px; flex-wrap: wrap;">
                            <select class="form-control" style="width: 150px; min-width: 120px;"
                                id="inquiry-status-filter">
                                <option value="All">All Statuses</option>
                                <option value="Pending">Pending</option>
                                <option value="In Progress">In Progress</option>
                                <option value="Completed">Completed</option>
                            </select>
                            {{-- <button class="btn btn-primary" id="export-inquiries-btn">Export</button> --}}
                        </div>
                    </div>

                    <table id="inquiries-table">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Company</th>
                                <th>Contact</th>
                                <th>Product</th>
                                <th>Quantity</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>

                    
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
                    <option value="Pending">Pending</option>
                    <option value="In Progress">In Progress</option>
                    <option value="Completed">Completed</option>
                </select>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btnCancel" style="background-color: #f0f0f0; flex: 1;">Cancel</button>
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
    
    @include('business.inquiry.js')
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

           


            // Inquiries Section Functionality
            const replyInquiryBtns = document.querySelectorAll('.reply-inquiry-btn');
            const viewInquiryBtns = document.querySelectorAll('.view-inquiry-btn');
            const prevInquiriesBtn = document.getElementById('prev-inquiries');
            const nextInquiriesBtn = document.getElementById('next-inquiries');

            

        

            // View Inquiry
            // viewInquiryBtns.forEach(btn => {
            //     btn.addEventListener('click', function() {
            //         const inquiryRow = this.closest('tr');
            //         const inquiryDate = inquiryRow.cells[0].textContent;
            //         const inquiryCompany = inquiryRow.cells[1].textContent;
            //         const inquiryContact = inquiryRow.cells[2].textContent;
            //         const inquiryProduct = inquiryRow.cells[3].textContent;
            //         const inquiryQuantity = inquiryRow.cells[4].textContent;
            //         const inquiryStatus = inquiryRow.cells[5].querySelector('.status').textContent;

            //         document.getElementById('inquiry-company').value =
            //             `${inquiryCompany} (${inquiryDate})`;
            //         document.getElementById('inquiry-email').value = inquiryContact;
            //         document.getElementById('inquiry-product').value = inquiryProduct;
            //         document.getElementById('inquiry-quantity').value = inquiryQuantity;
            //         document.getElementById('inquiry-message').value =
            //             `Sample message about ${inquiryProduct} from ${inquiryCompany}.`;
            //         document.getElementById('inquiry-status').value = inquiryStatus.toLowerCase()
            //             .replace(' ', '-');

            //         openModal('view-inquiry-modal');
            //     });
            // });

            // Reply to Inquiry
            replyInquiryBtns.forEach(btn => {
                btn.addEventListener('click', function() {
                    const inquiryRow = this.closest('tr');
                    const inquiryCompany = inquiryRow.cells[1].textContent;
                    const inquiryContact = inquiryRow.cells[2].textContent;

                    alert(
                    `Opening email client to reply to ${inquiryCompany} at ${inquiryContact}`);
                });
            });


        });
    </script>
</body>

</html>
