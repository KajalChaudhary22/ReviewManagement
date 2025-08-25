<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <!-- Added proper viewport meta tag for mobile devices -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Profile</title>
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


            <!-- Profile Management Content -->
            <div id="profile-content" class="content-section">
                <div class="content-header">
                    <h1 class="welcome-text">Profile Management</h1>
                    <p class="date-text">{{ \Carbon\Carbon::now()->format('l, d F Y') }}</p>
                </div>

                <div class="table-container">
                    <h2 class="section-title mb-20">Company Information</h2>

                    <div class="flex" style="gap: 30px; margin-bottom: 30px;">
                        <div style="flex: 1;">
                            <div class="form-group">
                                <label class="form-label">Company Name</label>
                                <input type="text" class="form-control" value="PharmaCorp Inc">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Business Type</label>
                                <input type="text" class="form-control" value="Pharmaceutical Manufacturer">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Year Established</label>
                                <input type="text" class="form-control" value="2005">
                            </div>
                        </div>
                        <div style="flex: 1;">
                            <div class="form-group">
                                <label class="form-label">Company Logo</label>
                                <div style="display: flex; align-items: center; gap: 20px;">
                                    <div
                                        style="width: 80px; height: 80px; border-radius: 8px; background-color: #f0f0f0; overflow: hidden;">
                                        <img src="https://via.placeholder.com/80x80?text=PC" alt="Company Logo"
                                            style="width: 100%; height: 100%; object-fit: cover;">
                                    </div>
                                    <button class="btn btn-primary">Upload New</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <h2 class="section-title mb-20">Contact Information</h2>

                    <div class="flex" style="gap: 30px; margin-bottom: 30px;">
                        <div style="flex: 1;">
                            <div class="form-group">
                                <label class="form-label">Primary Contact</label>
                                <input type="text" class="form-control" value="John Doe">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Email Address</label>
                                <input type="email" class="form-control" value="john.doe@pharmacorp.com">
                            </div>
                        </div>
                        <div style="flex: 1;">
                            <div class="form-group">
                                <label class="form-label">Phone Number</label>
                                <input type="tel" class="form-control" value="+1 (555) 123-4567">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Website</label>
                                <input type="url" class="form-control" value="https://www.pharmacorp.com">
                            </div>
                        </div>
                    </div>

                    <h2 class="section-title mb-20">Business Address</h2>

                    <div class="form-group">
                        <label class="form-label">Street Address</label>
                        <input type="text" class="form-control" value="123 Pharma Street">
                    </div>

                    <div class="flex" style="gap: 30px; margin-bottom: 30px;">
                        <div style="flex: 1;">
                            <div class="form-group">
                                <label class="form-label">City</label>
                                <input type="text" class="form-control" value="Boston">
                            </div>
                        </div>
                        <div style="flex: 1;">
                            <div class="form-group">
                                <label class="form-label">State/Province</label>
                                <input type="text" class="form-control" value="Massachusetts">
                            </div>
                        </div>
                        <div style="flex: 1;">
                            <div class="form-group">
                                <label class="form-label">ZIP/Postal Code</label>
                                <input type="text" class="form-control" value="02108">
                            </div>
                        </div>
                        <div style="flex: 1;">
                            <div class="form-group">
                                <label class="form-label">Country</label>
                                <input type="text" class="form-control" value="United States">
                            </div>
                        </div>
                    </div>

                    <h2 class="section-title mb-20">Business Description</h2>

                    <div class="form-group">
                        <textarea class="form-control" rows="5">PharmaCorp Inc is a leading manufacturer of high-quality pharmaceutical products with over 15 years of experience in the industry. We specialize in antibiotics, pain relievers, and vitamin supplements, serving clients across North America and Europe.</textarea>
                    </div>

                    <div class="flex justify-between" style="margin-top: 30px;">
                        <button class="btn" style="background-color: #f0f0f0;">Cancel</button>
                        <button class="btn btn-primary">Save Changes</button>
                    </div>
                </div>
            </div>


        </div>
    </div>

    <!-- Mobile Menu Toggle (Hidden on Desktop) -->
    <div class="menu-toggle hidden">
        <i class="icon">≡</i>
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


        });
    </script>
</body>

</html>
