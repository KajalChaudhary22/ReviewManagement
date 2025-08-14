<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Review Moderation - SCIZORA-Admin</title>
    @include('admin.layouts.styles')
</head>

<body>
    <!-- Sidebar -->
    @include('admin.layouts.sidebar')

    <!-- Main Content -->
    <div class="main-content">
        <!-- Navbar -->
        @include('admin.layouts.navbar')

        <!-- Content Area -->
        <div class="content">
            <div id="reviews-content" class="content-section">
                <div class="content-header">
                    <h1 class="page-title">Review Moderation</h1>
                    
                </div>

                <!-- Review Filters -->
                <div class="table-container mb-20">
                    <div style="padding: 15px; display: grid; grid-template-columns: 1fr; gap: 15px;">
                        <div class="form-group">
                            <label class="form-label">Search Reviews</label>
                            <input type="text" class="form-control" id="reviewSearch"
                                placeholder="User, business, content...">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Review Status</label>
                            <select class="form-control" id="reviewStatusFilter">
                                <option value="">All Reviews</option>
                                <option value="Pending">Pending Approval</option>
                                <option value="Approved">Approved</option>
                                <option value="Rejected">Rejected</option>
                                <option value="Flagged">Flagged</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Rating</label>
                            <select class="form-control" id="reviewRatingFilter">
                                <option value="all">All Ratings</option>
                                <option value="5">★★★★★</option>
                                <option value="4">★★★★☆</option>
                                <option value="3">★★★☆☆</option>
                                <option value="2">★★☆☆☆</option>
                                <option value="1">★☆☆☆☆</option>
                            </select>
                        </div>
                    </div>
                    <div class="apply-filters">
                        <button class="btn btn-primary" id="applyReviewFilters">Apply Filters</button>
                    </div>
                </div>

                <!-- Reviews List -->
                <div class="table-container">
                    <div class="table-header">
                        <h2 class="section-title">Reviews to Moderate </h2>
                        <div>
                            <button class="btn btn-secondary btn-sm" id="exportReviewsBtn">
                                <i class="icon">📄</i> Export
                            </button>
                        </div>
                    </div>
                    <div class="review-cards" id="reviewsList">
                        {{-- <div class="review-card" data-status="pending" data-rating="5">
                            <div class="review-header">
                                <div>
                                    <div class="review-user">David Lee</div>
                                    <div class="review-time">For: MediCare Pharmaceuticals • 2 hours ago</div>
                                </div>
                                <div>
                                    <span class="status-badge status-pending">Pending</span>
                                </div>
                            </div>
                            <div class="review-stars">★★★★★</div>
                            <div class="review-text">
                                Excellent service and fast delivery. The medication was exactly as described and arrived
                                in perfect condition. The staff was very helpful and knowledgeable. I would definitely
                                recommend this pharmacy to others.
                            </div>
                            <div class="review-actions">
                                <button class="btn btn-success btn-sm approve-review">Approve</button>
                                <button class="btn btn-danger btn-sm reject-review">Reject</button>
                                <button class="btn btn-secondary btn-sm view-review">View Details</button>
                            </div>
                        </div>
                        <div class="review-card" data-status="pending" data-rating="3">
                            <div class="review-header">
                                <div>
                                    <div class="review-user">Rachel Green</div>
                                    <div class="review-time">For: BioTech Solutions • 5 hours ago</div>
                                </div>
                                <div>
                                    <span class="status-badge status-pending">Pending</span>
                                </div>
                            </div>
                            <div class="review-stars">★★★☆☆</div>
                            <div class="review-text">
                                The product quality was good but the delivery took longer than expected. Customer
                                service was helpful though and resolved my issue promptly. The packaging could be
                                improved to prevent damage during shipping.
                            </div>
                            <div class="review-actions">
                                <button class="btn btn-success btn-sm approve-review">Approve</button>
                                <button class="btn btn-danger btn-sm reject-review">Reject</button>
                                <button class="btn btn-secondary btn-sm view-review">View Details</button>
                            </div>
                        </div>
                        <div class="review-card negative" data-status="pending" data-rating="1">
                            <div class="review-header">
                                <div>
                                    <div class="review-user">Tom Wilson</div>
                                    <div class="review-time">For: City General Hospital • 1 day ago</div>
                                </div>
                                <div>
                                    <span class="status-badge status-pending">Pending</span>
                                </div>
                            </div>
                            <div class="review-stars">★☆☆☆☆</div>
                            <div class="review-text">
                                Very disappointed with my experience. The staff was rude and unprofessional. I waited
                                for over two hours past my appointment time. The facilities were not clean and the
                                equipment looked outdated. Would not recommend.
                            </div>
                            <div class="review-actions">
                                <button class="btn btn-success btn-sm approve-review">Approve</button>
                                <button class="btn btn-danger btn-sm reject-review">Reject</button>
                                <button class="btn btn-secondary btn-sm view-review">View Details</button>
                            </div>
                        </div>
                        <div class="review-card positive" data-status="pending" data-rating="5">
                            <div class="review-header">
                                <div>
                                    <div class="review-user">Lisa Brown</div>
                                    <div class="review-time">For: Wellness Clinic • 2 days ago</div>
                                </div>
                                <div>
                                    <span class="status-badge status-pending">Pending</span>
                                </div>
                            </div>
                            <div class="review-stars">★★★★★</div>
                            <div class="review-text">
                                Outstanding service! Dr. Smith was very thorough and took the time to explain everything
                                clearly. The clinic was clean and modern. The reception staff was friendly and
                                efficient. Best healthcare experience I've had in years.
                            </div>
                            <div class="review-actions">
                                <button class="btn btn-success btn-sm approve-review">Approve</button>
                                <button class="btn btn-danger btn-sm reject-review">Reject</button>
                                <button class="btn btn-secondary btn-sm view-review">View Details</button>
                            </div>
                        </div> --}}
                    </div>
                    
                </div>
            </div>
        </div>
    </div>

    <!-- Mobile Menu Toggle (Hidden on Desktop) -->
    <div class="menu-toggle hidden">
        <i class="icon">≡</i>
    </div>

    <!-- View Details Modal -->
    <div class="modal" id="detailsModal">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="detailsModalTitle">Details</h2>
                <button class="modal-close">×</button>
            </div>
            <div class="modal-body" id="detailsModalContent">
                <!-- Content will be loaded dynamically -->
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" id="closeDetails">Close</button>
            </div>
        </div>
    </div>

    {{-- <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Mobile Menu Toggle
            const menuToggle = document.querySelector('.menu-toggle');
            const sidebar = document.querySelector('.sidebar');

            if (menuToggle) {
                menuToggle.addEventListener('click', function() {
                    sidebar.classList.toggle('active');
                });
            }

            function checkScreenSize() {
                if (window.innerWidth <= 576) {
                    if (menuToggle) menuToggle.classList.remove('hidden');
                    sidebar.classList.remove('active');
                } else {
                    if (menuToggle) menuToggle.classList.add('hidden');
                    if (window.innerWidth <= 992) {
                        sidebar.classList.add('active');
                    } else {
                        sidebar.classList.remove('active');
                    }
                }
            }

            checkScreenSize();
            window.addEventListener('resize', checkScreenSize);

            // Modal functionality
            const modals = document.querySelectorAll('.modal');
            const modalCloseButtons = document.querySelectorAll(
                '.modal-close, .btn-secondary[id^="cancel"], .btn-secondary[id^="close"]');

            function openModal(modalId) {
                const modal = document.getElementById(modalId);
                if (modal) {
                    modal.style.display = 'flex';
                    document.body.style.overflow = 'hidden';
                }
            }

            function closeModal(modalId) {
                const modal = document.getElementById(modalId);
                if (modal) {
                    modal.style.display = 'none';
                    document.body.style.overflow = 'auto';
                }
            }

            modalCloseButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const modal = this.closest('.modal');
                    if (modal) closeModal(modal.id);
                });
            });

            modals.forEach(modal => {
                modal.addEventListener('click', function(e) {
                    if (e.target === this) {
                        closeModal(this.id);
                    }
                });
            });



            // ===================================================================
            // FIXED: View Details functionality (with full detail generation)
            // ===================================================================
            const viewButtons = document.querySelectorAll('.action-btn.view, .view-business, .view-review');
            const detailsModal = document.getElementById('detailsModal');
            const detailsModalTitle = document.getElementById('detailsModalTitle');
            const detailsModalContent = document.getElementById('detailsModalContent');

            viewButtons.forEach(button => {
                button.addEventListener('click', function() {
                    let title = '';
                    let content = '';

                    if (this.classList.contains('view-business')) {
                        const card = this.closest('.approval-card');
                        const businessName = card.querySelector('.approval-title').textContent;
                        const businessMeta = card.querySelector('.approval-meta').textContent;

                        title = `Business: ${businessName}`;
                        content = `
                        <div style="margin-bottom: 15px;">
                            <h3 style="margin-bottom: 8px;">${businessName}</h3>
                            <p style="color: var(--text-light); margin-bottom: 12px;">${businessMeta}</p>
                            <p>This is a pending business approval request. Review all provided documentation before approving or rejecting. Ensure the business category and location are correct.</p>
                        </div>
                        <div>
                            <h4 style="margin-bottom: 8px;">Contact Information</h4>
                            <p><strong>Email:</strong> contact@${businessName.toLowerCase().replace(/\s+/g, '')}.com</p>
                            <p><strong>Phone:</strong> (555) 123-4567</p>
                            <p><strong>Address:</strong> 123 Business St, City, Country</p>
                        </div>
                    `;
                    } else if (this.classList.contains('view-review')) {
                        const card = this.closest('.review-card');
                        const reviewUser = card.querySelector('.review-user').textContent;
                        const reviewTime = card.querySelector('.review-time').textContent;
                        const reviewStars = card.querySelector('.review-stars').innerHTML;
                        const reviewText = card.querySelector('.review-text').textContent.trim();

                        title = `Review by ${reviewUser}`;
                        content = `
                        <div style="margin-bottom: 15px;">
                            <p style="color: var(--text-light); margin-bottom: 5px;">${reviewTime}</p>
                            <div style="color: #FFC107; font-size: 1.1rem; margin-bottom: 8px;">${reviewStars}</div>
                            <p style="line-height: 1.6;">${reviewText}</p>
                        </div>
                        <div>
                            <h4 style="margin-bottom: 8px;">Moderation Info</h4>
                            <p><strong>Review ID:</strong> #REV-${Math.floor(1000 + Math.random() * 9000)}</p>
                            <p><strong>Current Status:</strong> Pending Approval</p>
                        </div>
                    `;
                    } else {
                        // Regular user view from a table row
                        const row = this.closest('tr');
                        let userName, userEmail, userPhone, userType, userStatus;

                        // This logic handles both dashboard table and user management table structures
                        const firstCellText = row.querySelector('td:first-child').textContent;
                        if (firstCellText.startsWith('#USR-')) {
                            // User Management Page (has User ID first)
                            userName = row.querySelector('td:nth-child(2)').textContent;
                            userEmail = row.querySelector('td:nth-child(3)').textContent;
                            userPhone = row.querySelector('td:nth-child(4)').textContent;
                            userType = row.querySelector('td:nth-child(5)').textContent;
                        } else {
                            // Dashboard Page (has User Name first)
                            userName = row.querySelector('td:nth-child(1)').textContent;
                            userEmail = row.querySelector('td:nth-child(2)').textContent;
                            userPhone =
                            '(555) 123-4567'; // Placeholder as it's not in the dashboard table
                            userType = 'Customer'; // Placeholder
                        }
                        userStatus = row.querySelector('.status-badge').textContent;

                        title = `User: ${userName}`;
                        content = `
                        <div style="display: flex; gap: 15px; align-items: center; margin-bottom: 20px;">
                            <div style="width: 60px; height: 60px; border-radius: 50%; background-color: var(--primary-color); display: flex; align-items: center; justify-content: center; font-size: 1.8rem; color: white; flex-shrink: 0;">
                                ${userName.charAt(0)}
                            </div>
                            <div>
                                <h3 style="margin-bottom: 5px; color: var(--black);">${userName}</h3>
                                <p style="color: var(--text-light); margin-bottom: 5px;">${userEmail}</p>
                                <span class="status-badge ${userStatus.toLowerCase() === 'active' ? 'status-active' : userStatus.toLowerCase() === 'pending' ? 'status-pending' : 'status-suspended'}">${userStatus}</span>
                            </div>
                        </div>
                        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(150px, 1fr)); gap: 15px;">
                            <div>
                                <p style="font-size: 0.8rem; color: var(--text-light); margin-bottom: 5px;">Phone</p>
                                <p style="font-weight: 500;">${userPhone}</p>
                            </div>
                            <div>
                                <p style="font-size: 0.8rem; color: var(--text-light); margin-bottom: 5px;">User Type</p>
                                <p style="font-weight: 500;">${userType}</p>
                            </div>
                            <div>
                                <p style="font-size: 0.8rem; color: var(--text-light); margin-bottom: 5px;">Registration Date</p>
                                <p style="font-weight: 500;">Dec ${Math.floor(10 + Math.random() * 10)}, 2023</p>
                            </div>
                            <div>
                                <p style="font-size: 0.8rem; color: var(--text-light); margin-bottom: 5px;">Last Active</p>
                                <p style="font-weight: 500;">${Math.random() > 0.3 ? 'Today' : 'Yesterday'}</p>
                            </div>
                        </div>
                    `;
                    }

                    if (detailsModalTitle) detailsModalTitle.textContent = title;
                    if (detailsModalContent) detailsModalContent.innerHTML = content;
                    openModal('detailsModal');
                });
            });

            // Status change functionality
            const statusButtons = document.querySelectorAll(
                '.action-btn.suspend, .action-btn.activate, .action-btn.reject, .approve-business, .reject-business, .approve-review, .reject-review'
                );

            statusButtons.forEach(button => {
                button.addEventListener('click', function() {
                    let itemName = 'this item';
                    const card = this.closest('.approval-card, .review-card');
                    const row = this.closest('tr');
                    if (card) {
                        itemName = card.querySelector('.approval-title, .review-user')
                            ?.textContent || 'this card';
                    } else if (row) {
                        itemName = row.querySelector('td:nth-child(1), td:nth-child(2)')
                            ?.textContent || 'this user';
                    }

                    if (confirm(`Are you sure you want to perform this action on ${itemName}?`)) {
                        alert(`Action completed successfully!`);
                        if (card) {
                            card.style.opacity = '0';
                            setTimeout(() => card.remove(), 300);
                        }
                    }
                });
            });

            // Filter functionality
            function applyTableFilters(tableId, searchId, filters) {
                const table = document.getElementById(tableId);
                if (!table) return;
                const searchInput = document.getElementById(searchId).value.toLowerCase();
                const rows = table.querySelectorAll('tbody tr');

                rows.forEach(row => {
                    let showRow = true;
                    const rowText = row.textContent.toLowerCase();
                    if (searchInput && !rowText.includes(searchInput)) showRow = false;
                    for (const [filterName, filterValue] of Object.entries(filters)) {
                        if (filterValue && filterValue !== 'all') {
                            const rowValue = row.getAttribute(`data-${filterName}`);
                            if (rowValue && rowValue !== filterValue) showRow = false;
                        }
                    }
                    row.style.display = showRow ? '' : 'none';
                });
            }

            document.getElementById('applyUserFilters')?.addEventListener('click', function() {
                applyTableFilters('usersTable', 'userSearch', {
                    status: document.getElementById('userStatusFilter').value
                });
            });

            document.getElementById('applyBusinessFilters')?.addEventListener('click', function() {
                applyTableFilters('businessesTable', 'businessSearch', {
                    status: document.getElementById('businessStatusFilter').value,
                    category: document.getElementById('businessCategoryFilter').value,
                    location: document.getElementById('businessLocationFilter').value
                });
            });

            document.getElementById('applyReviewFilters')?.addEventListener('click', function() {
                const searchInput = document.getElementById('reviewSearch').value.toLowerCase();
                const statusFilter = document.getElementById('reviewStatusFilter').value;
                const ratingFilter = document.getElementById('reviewRatingFilter').value;
                const reviews = document.querySelectorAll('#reviewsList .review-card');

                reviews.forEach(review => {
                    let showReview = true;
                    if (searchInput && !review.textContent.toLowerCase().includes(searchInput))
                        showReview = false;
                    if (statusFilter !== 'all' && review.getAttribute('data-status') !==
                        statusFilter) showReview = false;
                    if (ratingFilter !== 'all' && review.getAttribute('data-rating') !==
                        ratingFilter) showReview = false;
                    review.style.display = showReview ? '' : 'none';
                });
            });



        });
    </script> --}}
    @include('layouts.commonjs')
    @include('admin.reviewModeration.js')
</body>

</html>
