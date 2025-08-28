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

                <div class="stats-cards">
                    <div class="stat-card">
                        <div class="stat-title">Total Inquiries</div>
                        <div class="stat-value">87</div>
                        <div class="stat-change">
                            <i class="icon">↑</i> 15% from last month
                        </div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-title">Active Inquiries</div>
                        <div class="stat-value">35</div>
                        <div class="stat-change">
                            <i class="icon">↑</i> 5% from last month
                        </div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-title">Completed</div>
                        <div class="stat-value">42</div>
                        <div class="stat-change">
                            <i class="icon">↑</i> 22% from last month
                        </div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-title">Avg. Response Time</div>
                        <div class="stat-value">6.2h</div>
                        <div class="stat-change">
                            <i class="icon">↓</i> 1.3h faster
                        </div>
                    </div>
                </div>

                <div class="table-container">
                    <div class="table-header">
                        <h2 class="section-title">Recent Inquiries</h2>
                        <div style="display: flex; gap: 10px; flex-wrap: wrap;">
                            <select class="form-control" style="width: 150px; min-width: 120px;"
                                id="inquiry-status-filter">
                                <option>All Statuses</option>
                                <option>Pending</option>
                                <option>In Progress</option>
                                <option>Completed</option>
                            </select>
                            <button class="btn btn-primary" id="export-inquiries-btn">Export</button>
                        </div>
                    </div>

                    <table>
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
                            <tr>
                                <td>20 Feb 2024</td>
                                <td>MediLife Inc.</td>
                                <td>sarah.miller@medilife.com</td>
                                <td>Antibiotic X</td>
                                <td>500 units</td>
                                <td><span class="status in-progress">In Progress</span></td>
                                <td>
                                    <button class="reply-inquiry-btn"
                                        style="background: none; border: none; cursor: pointer;">✉️</button>
                                    <button class="view-inquiry-btn"
                                        style="background: none; border: none; cursor: pointer;">👁️</button>
                                </td>
                            </tr>
                            <tr>
                                <td>19 Feb 2024</td>
                                <td>HealthPlus</td>
                                <td>john.davis@healthplus.com</td>
                                <td>Pain Reliever Y</td>
                                <td>1,000 units</td>
                                <td><span class="status pending">Pending</span></td>
                                <td>
                                    <button class="reply-inquiry-btn"
                                        style="background: none; border: none; cursor: pointer;">✉️</button>
                                    <button class="view-inquiry-btn"
                                        style="background: none; border: none; cursor: pointer;">👁️</button>
                                </td>
                            </tr>
                            <tr>
                                <td>18 Feb 2024</td>
                                <td>PharmaGlobal</td>
                                <td>amanda.patel@pharmaglobal.com</td>
                                <td>Vitamin Complex</td>
                                <td>2,000 units</td>
                                <td><span class="status completed">Completed</span></td>
                                <td>
                                    <button class="reply-inquiry-btn"
                                        style="background: none; border: none; cursor: pointer;">✉️</button>
                                    <button class="view-inquiry-btn"
                                        style="background: none; border: none; cursor: pointer;">👁️</button>
                                </td>
                            </tr>
                            <tr>
                                <td>17 Feb 2024</td>
                                <td>CareSolutions</td>
                                <td>michael.brown@caresolutions.com</td>
                                <td>Immune Booster</td>
                                <td>300 units</td>
                                <td><span class="status in-progress">In Progress</span></td>
                                <td>
                                    <button class="reply-inquiry-btn"
                                        style="background: none; border: none; cursor: pointer;">✉️</button>
                                    <button class="view-inquiry-btn"
                                        style="background: none; border: none; cursor: pointer;">👁️</button>
                                </td>
                            </tr>
                            <tr>
                                <td>15 Feb 2024</td>
                                <td>MediCare</td>
                                <td>jennifer.wilson@medicare.com</td>
                                <td>Antibiotic X</td>
                                <td>750 units</td>
                                <td><span class="status pending">Pending</span></td>
                                <td>
                                    <button class="reply-inquiry-btn"
                                        style="background: none; border: none; cursor: pointer;">✉️</button>
                                    <button class="view-inquiry-btn"
                                        style="background: none; border: none; cursor: pointer;">👁️</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <div
                        style="display: flex; justify-content: space-between; align-items: center; margin-top: 30px; flex-wrap: wrap; gap: 10px;">
                        <div style="color: var(--text-light);">
                            Showing 1-5 of 35 active inquiries
                        </div>
                        <div style="display: flex; gap: 10px;">
                            <button class="btn" style="background-color: #f0f0f0;"
                                id="prev-inquiries">Previous</button>
                            <button class="btn btn-primary" id="next-inquiries">Next</button>
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


            // Inquiries Section Functionality
            const inquiryStatusFilter = document.getElementById('inquiry-status-filter');
            const exportInquiriesBtn = document.getElementById('export-inquiries-btn');
            const replyInquiryBtns = document.querySelectorAll('.reply-inquiry-btn');
            const viewInquiryBtns = document.querySelectorAll('.view-inquiry-btn');
            const saveInquiryBtn = document.getElementById('save-inquiry-btn');
            const prevInquiriesBtn = document.getElementById('prev-inquiries');
            const nextInquiriesBtn = document.getElementById('next-inquiries');

            // Filter Inquiries
            inquiryStatusFilter.addEventListener('change', function() {
                // In a real app, you would filter inquiries by status
                console.log(`Filtering inquiries by status: ${this.value}`);
            });

            // Export Inquiries
            exportInquiriesBtn.addEventListener('click', function() {
                // In a real app, you would generate and download an Excel file
                // For demo purposes, we'll simulate a download
                alert('Exporting inquiries to Excel file...');

                // Simulate file download
                const data = [
                    ['Date', 'Company', 'Contact', 'Product', 'Quantity', 'Status'],
                    ['20 Feb 2024', 'MediLife Inc.', 'sarah.miller@medilife.com', 'Antibiotic X',
                        '500 units', 'In Progress'
                    ],
                    ['19 Feb 2024', 'HealthPlus', 'john.davis@healthplus.com', 'Pain Reliever Y',
                        '1,000 units', 'Pending'
                    ],
                    ['18 Feb 2024', 'PharmaGlobal', 'amanda.patel@pharmaglobal.com', 'Vitamin Complex',
                        '2,000 units', 'Completed'
                    ]
                ];

                let csvContent = "data:text/csv;charset=utf-8,";
                data.forEach(row => {
                    csvContent += row.join(",") + "\r\n";
                });

                const encodedUri = encodeURI(csvContent);
                const link = document.createElement("a");
                link.setAttribute("href", encodedUri);
                link.setAttribute("download", "inquiries_export.csv");
                document.body.appendChild(link);
                link.click();
                document.body.removeChild(link);
            });

            // View Inquiry
            viewInquiryBtns.forEach(btn => {
                btn.addEventListener('click', function() {
                    const inquiryRow = this.closest('tr');
                    const inquiryDate = inquiryRow.cells[0].textContent;
                    const inquiryCompany = inquiryRow.cells[1].textContent;
                    const inquiryContact = inquiryRow.cells[2].textContent;
                    const inquiryProduct = inquiryRow.cells[3].textContent;
                    const inquiryQuantity = inquiryRow.cells[4].textContent;
                    const inquiryStatus = inquiryRow.cells[5].querySelector('.status').textContent;

                    document.getElementById('inquiry-company').value =
                        `${inquiryCompany} (${inquiryDate})`;
                    document.getElementById('inquiry-email').value = inquiryContact;
                    document.getElementById('inquiry-product').value = inquiryProduct;
                    document.getElementById('inquiry-quantity').value = inquiryQuantity;
                    document.getElementById('inquiry-message').value =
                        `Sample message about ${inquiryProduct} from ${inquiryCompany}.`;
                    document.getElementById('inquiry-status').value = inquiryStatus.toLowerCase()
                        .replace(' ', '-');

                    openModal('view-inquiry-modal');
                });
            });

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

            // Save Inquiry Changes
            saveInquiryBtn.addEventListener('click', function() {
                const newStatus = document.getElementById('inquiry-status').value;
                alert(`Inquiry status updated to: ${newStatus}`);
                closeModal('view-inquiry-modal');
            });

            // Pagination for Inquiries
            let currentInquiryPage = 1;

            prevInquiriesBtn.addEventListener('click', function() {
                if (currentInquiryPage > 1) {
                    currentInquiryPage--;
                    // In a real app, you would fetch the previous page of inquiries
                    alert(`Loading page ${currentInquiryPage} of inquiries...`);
                }
            });

            nextInquiriesBtn.addEventListener('click', function() {
                currentInquiryPage++;
                // In a real app, you would fetch the next page of inquiries
                alert(`Loading page ${currentInquiryPage} of inquiries...`);
            });


        });
    </script>
</body>

</html>
