<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Dashboard Overview - SCIZORA-Admin</title>
   @include('admin.layouts.styles')
   @include('layouts.commonjs')
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
            <!-- Dashboard Content -->
            <div id="dashboard-content" class="content-section">
                <!-- Stats Cards -->
                @include('admin.dashboard.statsCards')

                <div class="dashboard-grid">
                    <div class="dashboard-main">
                        <!-- Recent User Signups -->
                        @include('admin.dashboard.recentUsersTable')

                        <!-- Pending Business Approvals -->
                        @include('admin.dashboard.pendingBusinessApprovals')
                    </div>

                    <div class="dashboard-sidebar">
                        <!-- Latest Reviews -->
                        <div class="table-container">
                            <div class="table-header">
                                <h2 class="section-title">Latest Reviews</h2>
                                <a href="{{ route('review.moderation.index',['ty'=>custom_encrypt('ReviewModeration')]) }}" class="action-link">View All</a>
                            </div>
                            <div class="review-cards">
                                <div class="review-card positive">
                                    <div class="review-header">
                                        <div class="review-user">David Lee</div>
                                        <div class="review-time">2 hours ago</div>
                                    </div>
                                    <div class="review-stars">★★★★★</div>
                                    <div class="review-text">
                                        Excellent service and fast delivery. The medication was exactly as described and
                                        arrived in perfect condition.
                                    </div>
                                    <div class="review-actions">
                                        <button class="btn btn-success btn-sm approve-review">Approve</button>
                                        <button class="btn btn-danger btn-sm reject-review">Reject</button>
                                        <button class="btn btn-secondary btn-sm view-review">View</button>
                                    </div>
                                </div>
                                <div class="review-card">
                                    <div class="review-header">
                                        <div class="review-user">Rachel Green</div>
                                        <div class="review-time">5 hours ago</div>
                                    </div>
                                    <div class="review-stars">★★★☆☆</div>
                                    <div class="review-text">
                                        The product quality was good but the delivery took longer than expected.
                                        Customer service was helpful though.
                                    </div>
                                    <div class="review-actions">
                                        <button class="btn btn-success btn-sm approve-review">Approve</button>
                                        <button class="btn btn-danger btn-sm reject-review">Reject</button>
                                        <button class="btn btn-secondary btn-sm view-review">View</button>
                                    </div>
                                </div>
                                <div class="review-card negative">
                                    <div class="review-header">
                                        <div class="review-user">Tom Wilson</div>
                                        <div class="review-time">1 day ago</div>
                                    </div>
                                    <div class="review-stars">★☆☆☆☆</div>
                                    <div class="review-text">
                                        Very disappointed with my purchase. The product arrived damaged and customer
                                        service was unresponsive.
                                    </div>
                                    <div class="review-actions">
                                        <button class="btn btn-success btn-sm approve-review">Approve</button>
                                        <button class="btn btn-danger btn-sm reject-review">Reject</button>
                                        <button class="btn btn-secondary btn-sm view-review">View</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Quick Actions -->
                        <div class="table-container">
                            <div class="table-header">
                                <h2 class="section-title">Quick Actions</h2>
                            </div>
                            <div style="padding: 15px; display: grid; gap: 10px;">
                                <button class="btn btn-primary" id="addNewUserBtn">
                                    <i class="icon">➕</i> Add New User
                                </button>
                                <button class="btn btn-primary" id="addNewBusinessBtn">
                                    <i class="icon">🏢</i> Add Business
                                </button>
                                <button class="btn btn-black" id="generateReportBtn">
                                    <i class="icon">📊</i> Generate Report
                                </button>
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

    <!-- Add User Modal -->
    <div class="modal" id="addUserModal">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title">Add New User</h2>
                <button class="modal-close">×</button>
            </div>
            <div class="modal-body">
                <form id="userForm">
                    <div class="form-group">
                        <label class="form-label">Full Name</label>
                        <input type="text" class="form-control" id="userName" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" id="userEmail" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Phone</label>
                        <input type="tel" class="form-control" id="userPhone">
                    </div>
                    <div class="form-group">
                        <label class="form-label">User Type</label>
                        <select class="form-control" id="userType" required>
                            <option value="">Select User Type</option>
                            <option value="customer">Customer</option>
                            <option value="business">Business Owner</option>
                            <option value="admin">Admin</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control" id="userPassword" required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" id="cancelUser">Cancel</button>
                <button class="btn btn-primary" id="saveUser">Save User</button>
            </div>
        </div>
    </div>

    <!-- Add Business Modal -->
    {{-- <div class="modal" id="addBusinessModal">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title">Add New Business</h2>
                <button class="modal-close">×</button>
            </div>
            <div class="modal-body">
                <form id="businessForm">
                    <div class="form-group">
                        <label class="form-label">Business Name</label>
                        <input type="text" class="form-control" id="businessName" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Category</label>
                        <select class="form-control" id="businessCategory" required>
                            <option value="">Select Category</option>
                            <option value="pharmacy">Pharmacy</option>
                            <option value="hospital">Hospital</option>
                            <option value="clinic">Clinic</option>
                            <option value="laboratory">Laboratory</option>
                            <option value="distributor">Distributor</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Location</label>
                        <select class="form-control" id="businessLocation" required>
                            <option value="">Select Location</option>
                            <option value="us">United States</option>
                            <option value="uk">United Kingdom</option>
                            <option value="ca">Canada</option>
                            <option value="au">Australia</option>
                            <option value="in">India</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Owner</label>
                        <select class="form-control" id="businessOwner" required>
                            <option value="">Select Owner</option>
                            <option value="1002">Michael Chen</option>
                            <option value="1004">David Kim</option>
                            <option value="1005">Robert Taylor</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Description</label>
                        <textarea class="form-control" id="businessDescription" rows="3"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" id="cancelBusiness">Cancel</button>
                <button class="btn btn-primary" id="saveBusiness">Save Business</button>
            </div>
        </div>
    </div> --}}

    <!-- View Details Modal -->
    {{-- <div class="modal" id="detailsModal">
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
    </div> --}}
    <!-- View Details Modal -->
<div class="modal" id="detailsModal">
    <div class="modal-content">
        <div class="modal-header">
            <h2 class="modal-title" id="detailsModalTitle">User Details</h2>
            <button class="modal-close">×</button>
        </div>
        <div class="modal-body">
            <!-- Avatar + Basic Info -->
            <div style="display: flex; gap: 15px; align-items: center; margin-bottom: 20px;">
                <div id="userAvatar"
                     style="width: 60px; height: 60px; border-radius: 50%; background-color: var(--primary-color);
                            display: flex; align-items: center; justify-content: center; font-size: 1.8rem; color: white; flex-shrink: 0;">
                    U
                </div>
                <div>
                    <h3 id="customerName" style="margin-bottom: 5px; color: var(--black);">N/A</h3>
                    <p id="customerEmail" style="color: var(--text-light); margin-bottom: 5px;">N/A</p>
                    <span id="customerStatusBadge" class="status-badge status-suspended">Unknown</span>
                </div>
            </div>

            <!-- Other Details Grid -->
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(150px, 1fr)); gap: 15px;">
                <div>
                    <p style="font-size: 0.8rem; color: var(--text-light); margin-bottom: 5px;">Phone</p>
                    <p id="customerPhone" style="font-weight: 500;">N/A</p>
                </div>
                <div>
                    <p style="font-size: 0.8rem; color: var(--text-light); margin-bottom: 5px;">User Type</p>
                    <p id="customerType" style="font-weight: 500;">N/A</p>
                </div>
                <div>
                    <p style="font-size: 0.8rem; color: var(--text-light); margin-bottom: 5px;">Registration Date</p>
                    <p id="customerRegistrationDate" style="font-weight: 500;">N/A</p>
                </div>
                <div>
                    <p style="font-size: 0.8rem; color: var(--text-light); margin-bottom: 5px;">Last Active</p>
                    <p id="customerLastActive" style="font-weight: 500;">Unknown</p>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button class="btn btn-secondary" id="closeDetails">Close</button>
        </div>
    </div>
</div>
<div class="modal" id="BusinessdetailsModal">
    <div class="modal-content">
        <div class="modal-header">
            <h2 class="modal-title" id="detailsModalTitle">Business Details</h2>
            <button class="modal-close">×</button>
        </div>
        <div class="modal-body">
            <!-- Avatar + Basic Info -->
            <div style="display: flex; gap: 15px; align-items: center; margin-bottom: 20px;">
                <div id="businessAvatar"
                     style="width: 60px; height: 60px; border-radius: 50%; background-color: var(--primary-color);
                            display: flex; align-items: center; justify-content: center; font-size: 1.8rem; color: white; flex-shrink: 0;">
                    U
                </div>
                <div>
                    <h3 id="businessViewName" style="margin-bottom: 5px; color: var(--black);">N/A</h3>
                    <p id="businessEmail" style="color: var(--text-light); margin-bottom: 5px;">N/A</p>
                    <span id="businessStatusBadge" class="status-badge status-suspended">Unknown</span>
                </div>
            </div>

            <!-- Other Details Grid -->
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(150px, 1fr)); gap: 15px;">
                <div>
                    <p style="font-size: 0.8rem; color: var(--text-light); margin-bottom: 5px;">Phone</p>
                    <p id="businessPhone" style="font-weight: 500;">N/A</p>
                </div>
                <div>
                    <p style="font-size: 0.8rem; color: var(--text-light); margin-bottom: 5px;">Business Type</p>
                    <p id="businessType" style="font-weight: 500;">N/A</p>
                </div>
                <div>
                    <p style="font-size: 0.8rem; color: var(--text-light); margin-bottom: 5px;">Location</p>
                    <p id="businessLocation" style="font-weight: 500;">N/A</p>
                </div>
                <div>
                    <p style="font-size: 0.8rem; color: var(--text-light); margin-bottom: 5px;">Registration Date</p>
                    <p id="businessRegistrationDate" style="font-weight: 500;">N/A</p>
                </div>
                <div>
                    <p style="font-size: 0.8rem; color: var(--text-light); margin-bottom: 5px;">Last Active</p>
                    <p id="businessLastActive" style="font-weight: 500;">Unknown</p>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button class="btn btn-secondary" id="closeDetails">Close</button>
        </div>
    </div>
</div>



   @include('admin.dashboard.script')
   
</body>

</html>
