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
    <!-- End of Sidebar -->

    <!-- Main Content -->
    <div class="main-content">
        <!-- Navbar -->
        @include('business.layouts.navbar')
        <!-- End of Navbar -->

        <!-- Content Area -->
        <div class="content">


           <!-- Analytics Content -->
           <div id="analytics-content" class="content-section">
            <div class="content-header">
                <h1 class="welcome-text">Business Analytics</h1>
                <p class="date-text">{{ \Carbon\Carbon::now()->format('l, d F Y') }}</p>
            </div>
            
            <div class="stats-cards">
                <div class="stat-card">
                    <div class="stat-title">Total Revenue</div>
                    <div class="stat-value">$124,580</div>
                    <div class="stat-change">
                        <i class="icon">↑</i> 22% from last month
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-title">Total Orders</div>
                    <div class="stat-value">287</div>
                    <div class="stat-change">
                        <i class="icon">↑</i> 15% from last month
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-title">Avg. Order Value</div>
                    <div class="stat-value">$434</div>
                    <div class="stat-change">
                        <i class="icon">↑</i> 6% from last month
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-title">New Customers</div>
                    <div class="stat-value">42</div>
                    <div class="stat-change">
                        <i class="icon">↑</i> 18% from last month
                    </div>
                </div>
            </div>
            
            <div class="flex" style="gap: 20px; margin-bottom: 30px; flex-wrap: wrap;">
                <div class="chart-container" style="flex: 2; min-width: 300px;">
                    <div class="table-header">
                        <h2 class="section-title">Revenue Overview</h2>
                        <select class="form-control" style="width: 150px;" id="revenue-time-filter">
                            <option>Last 30 Days</option>
                            <option>Last 90 Days</option>
                            <option>This Year</option>
                            <option>Last Year</option>
                        </select>
                    </div>
                    <div class="chart-placeholder">
                        Monthly Revenue Chart (Line Graph)
                    </div>
                </div>
                
                <div class="chart-container" style="flex: 1; min-width: 300px;">
                    <h2 class="section-title">Sales by Category</h2>
                    <div class="chart-placeholder">
                        Product Category Pie Chart
                    </div>
                </div>
            </div>
            
            <div class="flex" style="gap: 20px; margin-bottom: 30px; flex-wrap: wrap;">
                <div class="chart-container" style="flex: 1; min-width: 300px;">
                    <h2 class="section-title">Top Products</h2>
                    <div class="chart-placeholder">
                        Top Selling Products Bar Chart
                    </div>
                </div>
                
                <div class="chart-container" style="flex: 1; min-width: 300px;">
                    <h2 class="section-title">Customer Geography</h2>
                    <div class="chart-placeholder">
                        Customer Location Map
                    </div>
                </div>
            </div>
            
            <div class="table-container">
                <div class="table-header">
                    <h2 class="section-title">Recent Orders</h2>
                    <button class="btn btn-primary" id="export-analytics-btn">Export Data</button>
                </div>
                
                <table>
                    <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>Date</th>
                            <th>Customer</th>
                            <th>Products</th>
                            <th>Amount</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>#PC-10245</td>
                            <td>20 Feb 2024</td>
                            <td>MediLife Inc.</td>
                            <td>Antibiotic X (500)</td>
                            <td>$12,495.00</td>
                            <td><span class="status completed">Completed</span></td>
                        </tr>
                        <tr>
                            <td>#PC-10244</td>
                            <td>19 Feb 2024</td>
                            <td>HealthPlus</td>
                            <td>Pain Reliever Y (1000)</td>
                            <td>$19,990.00</td>
                            <td><span class="status pending">Pending</span></td>
                        </tr>
                        <tr>
                            <td>#PC-10243</td>
                            <td>18 Feb 2024</td>
                            <td>PharmaGlobal</td>
                            <td>Vitamin Complex (2000)</td>
                            <td>$59,980.00</td>
                            <td><span class="status in-progress">Processing</span></td>
                        </tr>
                        <tr>
                            <td>#PC-10242</td>
                            <td>17 Feb 2024</td>
                            <td>CareSolutions</td>
                            <td>Immune Booster (300)</td>
                            <td>$10,497.00</td>
                            <td><span class="status completed">Completed</span></td>
                        </tr>
                        <tr>
                            <td>#PC-10241</td>
                            <td>16 Feb 2024</td>
                            <td>MediCare</td>
                            <td>Antibiotic X (750)</td>
                            <td>$18,742.50</td>
                            <td><span class="status in-progress">Processing</span></td>
                        </tr>
                    </tbody>
                </table>
                
                <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 30px; flex-wrap: wrap; gap: 10px;">
                    <div style="color: var(--text-light);">
                        Showing 1-5 of 287 orders
                    </div>
                    <div style="display: flex; gap: 10px;">
                        <button class="btn" style="background-color: #f0f0f0;" id="prev-orders">Previous</button>
                        <button class="btn btn-primary" id="next-orders">Next</button>
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



            // Reviews Section Functionality
            const reviewRatingFilter = document.getElementById('review-rating-filter');
            const replyReviewBtns = document.querySelectorAll('.reply-review-btn');
            const submitReviewResponse = document.getElementById('submit-review-response');
            const prevReviewsBtn = document.getElementById('prev-reviews');
            const nextReviewsBtn = document.getElementById('next-reviews');

            // Filter Reviews
            reviewRatingFilter.addEventListener('change', function() {
                // In a real app, you would filter reviews by rating
                console.log(`Filtering reviews by rating: ${this.value}`);
            });

            // Reply to Review
            replyReviewBtns.forEach(btn => {
                btn.addEventListener('click', function() {
                    const reviewItem = this.closest('.review-item');
                    const reviewerName = reviewItem.querySelector('.reviewer-name').textContent
                        .split(' ')[0];
                    const stars = reviewItem.querySelector('.stars').textContent;
                    const reviewText = reviewItem.querySelector('.review-text').textContent;

                    document.getElementById('reviewer-name').value = reviewerName;
                    document.getElementById('review-rating').textContent = stars;
                    document.getElementById('review-text').value = reviewText;
                    document.getElementById('review-response').value = '';

                    openModal('reply-review-modal');
                });
            });

            // Submit Review Response
            submitReviewResponse.addEventListener('click', function() {
                const response = document.getElementById('review-response').value;
                if (response.trim() === '') {
                    alert('Please enter a response before submitting.');
                    return;
                }

                alert(`Review response submitted: ${response}`);
                closeModal('reply-review-modal');
            });

            // Pagination for Reviews
            let currentReviewPage = 1;

            prevReviewsBtn.addEventListener('click', function() {
                if (currentReviewPage > 1) {
                    currentReviewPage--;
                    // In a real app, you would fetch the previous page of reviews
                    alert(`Loading page ${currentReviewPage} of reviews...`);
                }
            });

            nextReviewsBtn.addEventListener('click', function() {
                currentReviewPage++;
                // In a real app, you would fetch the next page of reviews
                alert(`Loading page ${currentReviewPage} of reviews...`);
            });


        });
    </script>
</body>

</html>
