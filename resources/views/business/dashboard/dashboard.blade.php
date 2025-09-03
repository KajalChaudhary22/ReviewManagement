<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <!-- Added proper viewport meta tag for mobile devices -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Dashboard</title>
    @include('business.layouts.styles')
</head>

<body>
    <!-- Sidebar -->
    @include('business.layouts.sidebar')
    <!-- Sidebar End -->

    <!-- Main Content -->
    <div class="main-content">
        <!-- Navbar -->
        @include('business.layouts.navbar')
        <!-- Navbar End -->

        <!-- Content Area -->
        <div class="content">
            <!-- Dashboard Content (Default) -->
            <div id="dashboard-content" class="content-section">
                <div class="content-header">
                    <h1 class="welcome-text">Welcome back, {{ Auth::user()?->name }}</h1>
                    <p class="date-text">{{ \Carbon\Carbon::now()->format('l, d F Y') }}</p>
                </div>

                <!-- Stats Cards -->
                @include('business.dashboard.statsCard')

                <!-- Recent Inquiries Table -->
                @include('business.dashboard.recentInquiry')


                <!-- Top Performing Products -->
                @include('business.dashboard.topProducts')

                <!-- Profile Completion and Recent Reviews -->
                <div class="flex" style="gap: 20px; margin-bottom: 30px; flex-wrap: wrap;">
                    <!-- Profile Completion Widget -->
                    <div class="profile-widget" style="flex: 1; min-width: 300px;">
                        <h2 class="section-title">Profile Completion</h2>
                        <div class="progress-container">
                            <div class="progress-circle">
                                <svg width="120" height="120" viewBox="0 0 120 120">
                                    <circle class="circle-bg" cx="60" cy="60" r="50"></circle>
                                    <circle class="circle-progress" cx="60" cy="60" r="50"></circle>
                                </svg>
                                <div class="progress-text">85%<span>Complete</span></div>
                            </div>
                            <div class="progress-cta">
                                <h3>Complete your profile</h3>
                                <p>Add more details to your profile to increase visibility and trust among potential
                                    clients.</p>
                                <a
                                    href="{{ route('business.profile.edit', ['ty' => custom_encrypt('UpdateBusinessProfile')]) }}"><button
                                        class="btn btn-primary">Complete Profile</button></a>
                            </div>
                        </div>
                    </div>

                    <!-- Recent Reviews -->
                    @include('business.dashboard.recentReviews')
                </div>

                <!-- Quick Actions -->
                <div class="quick-actions">
                    <div class="action-btn" id="add-product-btn">
                        <i class="icon" >➕</i>
                        <span>Add Product</span>
                    </div>
                    <a href="{{ route('business.inquiries.list', ['ty' => custom_encrypt('InquiriesProductList')]) }}">
                        <div class="action-btn" id="quick-view-inquiries">
                            <i class="icon">📩</i>
                            <span>View Enquiries</span>
                        </div>
                    </a>
                    <a href="{{ route('business.profile.edit', ['ty' => custom_encrypt('UpdateBusinessProfile')]) }}">
                        <div class="action-btn" id="quick-edit-profile">
                            <i class="icon">👤</i>
                            <span>Edit Profile</span>
                        </div>
                    </a>
                    <a href="{{ route('business.analytics', ['ty' => custom_encrypt('AnalyticsList')]) }}">
                        <div class="action-btn" id="quick-view-analytics">
                            <i class="icon">📊</i>
                            <span>View Analytics</span>
                        </div>
                    </a>
                </div>
            </div>


        </div>
    </div>

    <!-- Mobile Menu Toggle (Hidden on Desktop) -->
    <div class="menu-toggle hidden">
        <i class="icon">≡</i>
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

    <div class="modal" id="productModal">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title">Add New Product</h2>
                <button class="close-modal">&times;</button>
            </div>
            <form id="product-form">
                <input type="hidden" id="product_id" name="product_id">
                <div class="form-group">
                    <label class="form-label">Product Name</label>
                    <input type="text" class="form-control" id="product-name" required name="product_name">
                </div>
                <div class="form-group">
                    <label class="form-label">Description</label>
                    <textarea class="form-control" id="product-description" rows="3" required name="description"></textarea>
                </div>
                <div class="flex" style="gap: 20px; flex-wrap: wrap;">
                    <div class="form-group" style="flex: 1; min-width: 200px;">
                        <label class="form-label">SKU</label>
                        <input type="text" class="form-control" id="product-sku" required name="sku">
                    </div>
                    <div class="form-group" style="flex: 1; min-width: 200px;">
                        <label class="form-label">Category</label>
                        <select class="form-control" id="product-category" required name="category_id">
                            <option value="">Select Category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>                                
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="flex" style="gap: 20px; flex-wrap: wrap;">
                    <div class="form-group" style="flex: 1; min-width: 200px;">
                        <label class="form-label">Price ($)</label>
                        <input type="number" class="form-control" id="product-price" step="0.01" required name="price">
                    </div>
                    <div class="form-group" style="flex: 1; min-width: 200px;">
                        <label class="form-label">Quantity in Stock</label>
                        <input type="number" class="form-control" id="product-quantity" required name="quantity">
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-label">Product Image</label>
                    <input type="file" class="form-control" id="product-image" name="image" accept="image/*">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn" style="background-color: #f0f0f0; flex: 1;">Cancel</button>
                    <button type="submit" class="btn btn-primary" style="flex: 1;">Save Product</button>
                </div>
            </form>
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
    @include('business.dashboard.js')
    <script>
        document.addEventListener('DOMContentLoaded', function() {


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

            // // Modal functionality
            // const modals = document.querySelectorAll('.modal');
            // const closeModalButtons = document.querySelectorAll('.close-modal');

            

            // // Close modal when clicking on X or cancel button
            // closeModalButtons.forEach(button => {
            //     button.addEventListener('click', function() {
            //         const modal = this.closest('.modal');
            //         closeModal(modal.id);
            //     });
            // });

            // // Close modal when clicking outside the modal content
            // modals.forEach(modal => {
            //     modal.addEventListener('click', function(e) {
            //         if (e.target === this) {
            //             closeModal(this.id);
            //         }
            //     });
            // });


        });
    </script>
</body>

</html>
