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


            <!-- Reviews Content -->
            <div id="reviews-content" class="content-section">
                <div class="content-header">
                    <h1 class="welcome-text">Customer Reviews</h1>
                    <p class="date-text">{{ \Carbon\Carbon::now()->format('l, d F Y') }}</p>
                </div>

                @include('business.reviews.stats')

                <div class="flex" style="gap: 20px; margin-bottom: 30px; flex-wrap: wrap;">
                    <div class="table-container" style="flex: 2; min-width: 300px;">
                        <div class="table-header">
                            <h2 class="section-title">Recent Reviews</h2>
                            <div style="display: flex; gap: 10px;">
                                <select class="form-control" style="width: 150px; min-width: 120px;"
                                    id="review-rating-filter">
                                    <option value="All">All Ratings</option>
                                    <option value="5">5 Stars</option>
                                    <option value="4">4 Stars</option>
                                    <option value="3">3 Stars</option>
                                    <option value="2">2 Stars</option>
                                    <option value="1">1 Star</option>
                                </select>
                            </div>
                        </div>
                        <!-- Reviews will be appended here -->
    <div id="reviews-list"></div>

                        {{-- <div class="review-item">
                            <div class="reviewer-avatar">SM</div>
                            <div class="review-content">
                                <div class="reviewer-name">Sarah Miller <span
                                        style="color: var(--text-light); font-weight: normal;">- MediLife Inc.</span>
                                </div>
                                <div class="stars">★★★★★ <span
                                        style="color: var(--text-light); font-size: 0.9rem;">20 Feb 2024</span></div>
                                <div class="review-text">We've been working with PharmaCorp for over 3 years now and
                                    their products have consistently exceeded our expectations. The Antibiotic X is
                                    particularly effective with minimal side effects reported by our patients.</div>
                                <div style="margin-top: 10px;">
                                    <span style="font-size: 0.9rem; color: var(--text-light);">Product: Antibiotic
                                        X</span>
                                </div>
                                <button class="btn reply-review-btn"
                                    style="padding: 5px 10px; font-size: 0.8rem; margin-top: 10px;">Reply</button>
                            </div>
                        </div>

                        <div class="review-item">
                            <div class="reviewer-avatar">JD</div>
                            <div class="review-content">
                                <div class="reviewer-name">John Davis <span
                                        style="color: var(--text-light); font-weight: normal;">- HealthPlus</span>
                                </div>
                                <div class="stars">★★★★☆ <span
                                        style="color: var(--text-light); font-size: 0.9rem;">18 Feb 2024</span></div>
                                <div class="review-text">The Pain Reliever Y works well for most of our patients,
                                    though we've had a few reports of mild stomach discomfort. Packaging could be more
                                    eco-friendly.</div>
                                <div style="margin-top: 10px;">
                                    <span style="font-size: 0.9rem; color: var(--text-light);">Product: Pain Reliever
                                        Y</span>
                                </div>
                                <div
                                    style="background-color: #f9f9f9; padding: 10px; border-radius: 5px; margin-top: 10px;">
                                    <div style="font-weight: 500; margin-bottom: 5px;">Your Response:</div>
                                    <div>Thank you for your feedback, John. We're currently developing a new formulation
                                        to reduce stomach discomfort and will be introducing eco-friendly packaging
                                        options next quarter.</div>
                                </div>
                            </div>
                        </div>

                        <div class="review-item">
                            <div class="reviewer-avatar">AP</div>
                            <div class="review-content">
                                <div class="reviewer-name">Amanda Patel <span
                                        style="color: var(--text-light); font-weight: normal;">- PharmaGlobal</span>
                                </div>
                                <div class="stars">★★★★★ <span
                                        style="color: var(--text-light); font-size: 0.9rem;">15 Feb 2024</span></div>
                                <div class="review-text">The Vitamin Complex is our best-selling supplement! Customers
                                    report increased energy levels and overall wellbeing. Delivery is always prompt.
                                </div>
                                <div style="margin-top: 10px;">
                                    <span style="font-size: 0.9rem; color: var(--text-light);">Product: Vitamin
                                        Complex</span>
                                </div>
                                <button class="btn reply-review-btn"
                                    style="padding: 5px 10px; font-size: 0.8rem; margin-top: 10px;">Reply</button>
                            </div>
                        </div> --}}

                        <div
                            style="display: flex; justify-content: space-between; align-items: center; margin-top: 30px; flex-wrap: wrap; gap: 10px;">
                            <div style="color: var(--text-light);">
                                Showing 1-3 of 28 new reviews
                            </div>
                            <div style="display: flex; gap: 10px;">
                                <button class="btn" style="background-color: #f0f0f0;"
                                    id="prev-reviews">Previous</button>
                                <button class="btn btn-primary" id="next-reviews">Next</button>
                            </div>
                        </div>
                    </div>

                    <div class="table-container" style="flex: 1; min-width: 300px;">
                        <h2 class="section-title">Rating Distribution</h2>

                        <div style="margin-top: 20px;">
                            <div style="display: flex; align-items: center; margin-bottom: 10px;">
                                <div style="width: 80px;">5 Stars</div>
                                <div
                                    style="flex: 1; height: 20px; background-color: #f0f0f0; border-radius: 10px; margin: 0 10px; overflow: hidden;">
                                    <div style="width: 72%; height: 100%; background-color: var(--primary-color);">
                                    </div>
                                </div>
                                <div>112</div>
                            </div>
                            <div style="display: flex; align-items: center; margin-bottom: 10px;">
                                <div style="width: 80px;">4 Stars</div>
                                <div
                                    style="flex: 1; height: 20px; background-color: #f0f0f0; border-radius: 10px; margin: 0 10px; overflow: hidden;">
                                    <div style="width: 18%; height: 100%; background-color: var(--primary-color);">
                                    </div>
                                </div>
                                <div>28</div>
                            </div>
                            <div style="display: flex; align-items: center; margin-bottom: 10px;">
                                <div style="width: 80px;">3 Stars</div>
                                <div
                                    style="flex: 1; height: 20px; background-color: #f0f0f0; border-radius: 10px; margin: 0 10px; overflow: hidden;">
                                    <div style="width: 6%; height: 100%; background-color: var(--primary-color);">
                                    </div>
                                </div>
                                <div>9</div>
                            </div>
                            <div style="display: flex; align-items: center; margin-bottom: 10px;">
                                <div style="width: 80px;">2 Stars</div>
                                <div
                                    style="flex: 1; height: 20px; background-color: #f0f0f0; border-radius: 10px; margin: 0 10px; overflow: hidden;">
                                    <div style="width: 3%; height: 100%; background-color: var(--primary-color);">
                                    </div>
                                </div>
                                <div>4</div>
                            </div>
                            <div style="display: flex; align-items: center; margin-bottom: 10px;">
                                <div style="width: 80px;">1 Star</div>
                                <div
                                    style="flex: 1; height: 20px; background-color: #f0f0f0; border-radius: 10px; margin: 0 10px; overflow: hidden;">
                                    <div style="width: 1%; height: 100%; background-color: var(--primary-color);">
                                    </div>
                                </div>
                                <div>3</div>
                            </div>
                        </div>

                        <h2 style="margin-top: 30px; font-size: 1.2rem;">Review Highlights</h2>

                        <div style="margin-top: 15px;">
                            <div style="font-weight: 500; margin-bottom: 5px;">Most Mentioned Positive</div>
                            <div style="display: flex; flex-wrap: wrap; gap: 5px; margin-bottom: 15px;">
                                <span
                                    style="background-color: #E8F5E9; color: #2E7D32; padding: 3px 8px; border-radius: 20px; font-size: 0.8rem;">Quality
                                    (87)</span>
                                <span
                                    style="background-color: #E8F5E9; color: #2E7D32; padding: 3px 8px; border-radius: 20px; font-size: 0.8rem;">Delivery
                                    (65)</span>
                                <span
                                    style="background-color: #E8F5E9; color: #2E7D32; padding: 3px 8px; border-radius: 20px; font-size: 0.8rem;">Effectiveness
                                    (58)</span>
                                <span
                                    style="background-color: #E8F5E9; color: #2E7D32; padding: 3px 8px; border-radius: 20px; font-size: 0.8rem;">Customer
                                    Service (42)</span>
                            </div>

                            <div style="font-weight: 500; margin-bottom: 5px;">Most Mentioned Negative</div>
                            <div style="display: flex; flex-wrap: wrap; gap: 5px;">
                                <span
                                    style="background-color: #FFEBEE; color: #5A009D; padding: 3px 8px; border-radius: 20px; font-size: 0.8rem;">Packaging
                                    (12)</span>
                                <span
                                    style="background-color: #FFEBEE; color: #5A009D; padding: 3px 8px; border-radius: 20px; font-size: 0.8rem;">Side
                                    Effects (8)</span>
                                <span
                                    style="background-color: #FFEBEE; color: #5A009D; padding: 3px 8px; border-radius: 20px; font-size: 0.8rem;">Price
                                    (5)</span>
                            </div>
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

    @include('business.reviews.js')

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
            // const reviewRatingFilter = document.getElementById('review-rating-filter');
            // const replyReviewBtns = document.querySelectorAll('.reply-review-btn');
            // const submitReviewResponse = document.getElementById('submit-review-response');
            // const prevReviewsBtn = document.getElementById('prev-reviews');
            // const nextReviewsBtn = document.getElementById('next-reviews');

            // // Filter Reviews
            // reviewRatingFilter.addEventListener('change', function() {
            //     // In a real app, you would filter reviews by rating
            //     console.log(`Filtering reviews by rating: ${this.value}`);
            // });

            // // Reply to Review
            // replyReviewBtns.forEach(btn => {
            //     btn.addEventListener('click', function() {
            //         const reviewItem = this.closest('.review-item');
            //         const reviewerName = reviewItem.querySelector('.reviewer-name').textContent
            //             .split(' ')[0];
            //         const stars = reviewItem.querySelector('.stars').textContent;
            //         const reviewText = reviewItem.querySelector('.review-text').textContent;

            //         document.getElementById('reviewer-name').value = reviewerName;
            //         document.getElementById('review-rating').textContent = stars;
            //         document.getElementById('review-text').value = reviewText;
            //         document.getElementById('review-response').value = '';

            //         openModal('reply-review-modal');
            //     });
            // });

            // // Submit Review Response
            // submitReviewResponse.addEventListener('click', function() {
            //     const response = document.getElementById('review-response').value;
            //     if (response.trim() === '') {
            //         alert('Please enter a response before submitting.');
            //         return;
            //     }

            //     alert(`Review response submitted: ${response}`);
            //     closeModal('reply-review-modal');
            // });

            // // Pagination for Reviews
            // let currentReviewPage = 1;

            // prevReviewsBtn.addEventListener('click', function() {
            //     if (currentReviewPage > 1) {
            //         currentReviewPage--;
            //         // In a real app, you would fetch the previous page of reviews
            //         alert(`Loading page ${currentReviewPage} of reviews...`);
            //     }
            // });

            // nextReviewsBtn.addEventListener('click', function() {
            //     currentReviewPage++;
            //     // In a real app, you would fetch the next page of reviews
            //     alert(`Loading page ${currentReviewPage} of reviews...`);
            // });


        });
    </script>
</body>

</html>
