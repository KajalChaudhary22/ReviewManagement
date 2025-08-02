<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Enhanced viewport meta tag for better mobile rendering -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>SCIZORA-Admin - Management Portal</title>
    @include('admin.dashboard.styles')
</head>
<body>
   
@include('admin.layouts.sidebar')
    <!-- Main Content -->
    <div class="main-content">
       @include('admin.layouts.navbar')

        <!-- Content Area -->
        <div class="content">
            <!-- Dashboard Content -->
            <div id="dashboard-content" class="content-section active">
                <!-- Stats Cards -->
                <div class="stats-cards">
                    <div class="stat-card">
                        <div class="stat-icon">👥</div>
                        <div class="stat-title">Total Users</div>
                        <div class="stat-value">2,543</div>
                        <div class="stat-change positive">
                            <i class="icon">↑</i> 12% from last month
                        </div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-icon">🏢</div>
                        <div class="stat-title">Active Businesses</div>
                        <div class="stat-value">1,832</div>
                        <div class="stat-change positive">
                            <i class="icon">↑</i> 8% from last month
                        </div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-icon">📝</div>
                        <div class="stat-title">Pending Reviews</div>
                        <div class="stat-value">342</div>
                        <div class="stat-change negative">
                            <i class="icon">↓</i> 5% from last month
                        </div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-icon">💰</div>
                        <div class="stat-title">Monthly Revenue</div>
                        <div class="stat-value">$128.5K</div>
                        <div class="stat-change positive">
                            <i class="icon">↑</i> 22% from last month
                        </div>
                    </div>
                </div>

                <div class="dashboard-grid">
                    <div class="dashboard-main">
                        <!-- Recent User Signups -->
                        <div class="table-container">
                            <div class="table-header">
                                <h2 class="section-title">Recent User Signups</h2>
                                <a href="#" class="action-link">View All</a>
                            </div>
                            <table>
                                <thead>
                                    <tr>
                                        <th>User Name</th>
                                        <th>Email</th>
                                        <th>Registration Date</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Sarah Johnson</td>
                                        <td>sarah@example.com</td>
                                        <td>Dec 12, 2023</td>
                                        <td><span class="status-badge status-active">Active</span></td>
                                        <td>
                                            <div class="action-buttons">
                                                <button class="action-btn view">View</button>
                                                <button class="action-btn suspend">Suspend</button>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Michael Chen</td>
                                        <td>michael@example.com</td>
                                        <td>Dec 11, 2023</td>
                                        <td><span class="status-badge status-pending">Pending</span></td>
                                        <td>
                                            <div class="action-buttons">
                                                <button class="action-btn view">View</button>
                                                <button class="action-btn reject">Reject</button>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Emma Wilson</td>
                                        <td>emma@example.com</td>
                                        <td>Dec 11, 2023</td>
                                        <td><span class="status-badge status-active">Active</span></td>
                                        <td>
                                            <div class="action-buttons">
                                                <button class="action-btn view">View</button>
                                                <button class="action-btn suspend">Suspend</button>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>David Kim</td>
                                        <td>david@example.com</td>
                                        <td>Dec 10, 2023</td>
                                        <td><span class="status-badge status-suspended">Suspended</span></td>
                                        <td>
                                            <div class="action-buttons">
                                                <button class="action-btn view">View</button>
                                                <button class="action-btn activate">Activate</button>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <!-- Pending Business Approvals -->
                        <div class="table-container">
                            <div class="table-header">
                                <h2 class="section-title">Pending Business Approvals</h2>
                                <a href="#" class="action-link">View All</a>
                            </div>
                            <div class="approval-cards">
                                <div class="approval-card">
                                    <div class="approval-title">MediCare Pharmaceuticals</div>
                                    <div class="approval-meta">New York, USA • Marketing • Submitted: Dec 10, 2023</div>
                                    <div class="approval-actions">
                                        <button class="btn btn-success btn-sm approve-business">Approve</button>
                                        <button class="btn btn-danger btn-sm reject-business">Reject</button>
                                        <button class="btn btn-secondary btn-sm view-business">View Details</button>
                                    </div>
                                </div>
                                <div class="approval-card">
                                    <div class="approval-title">BioTech Solutions</div>
                                    <div class="approval-meta">London, UK • Research • Submitted: Dec 9, 2023</div>
                                    <div class="approval-actions">
                                        <button class="btn btn-success btn-sm approve-business">Approve</button>
                                        <button class="btn btn-danger btn-sm reject-business">Reject</button>
                                        <button class="btn btn-secondary btn-sm view-business">View Details</button>
                                    </div>
                                </div>
                                <div class="approval-card">
                                    <div class="approval-title">PharmaPlus Distributors</div>
                                    <div class="approval-meta">Chicago, USA • Distribution • Submitted: Dec 8, 2023</div>
                                    <div class="approval-actions">
                                        <button class="btn btn-success btn-sm approve-business">Approve</button>
                                        <button class="btn btn-danger btn-sm reject-business">Reject</button>
                                        <button class="btn btn-secondary btn-sm view-business">View Details</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="dashboard-sidebar">
                        <!-- Latest Reviews -->
                        <div class="table-container">
                            <div class="table-header">
                                <h2 class="section-title">Latest Reviews</h2>
                                <a href="#" class="action-link">View All</a>
                            </div>
                            <div class="review-cards">
                                <div class="review-card positive">
                                    <div class="review-header">
                                        <div class="review-user">David Lee</div>
                                        <div class="review-time">2 hours ago</div>
                                    </div>
                                    <div class="review-stars">★★★★★</div>
                                    <div class="review-text">
                                        Excellent service and fast delivery. The medication was exactly as described and arrived in perfect condition.
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
                                        The product quality was good but the delivery took longer than expected. Customer service was helpful though.
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
                                        Very disappointed with my purchase. The product arrived damaged and customer service was unresponsive.
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

            <!-- User Management Content -->
            <div id="users-content" class="content-section">
                <div class="content-header">
                    <h1 class="page-title">User Management</h1>
                    <button class="btn btn-primary" id="addUserBtn">
                        <i class="icon">➕</i> Add User
                    </button>
                </div>
                
                <!-- User Search and Filters -->
                <div class="table-container mb-20">
                    <div style="padding: 15px; display: grid; grid-template-columns: 1fr; gap: 15px;">
                        <div class="form-group">
                            <label class="form-label">Search Users</label>
                            <input type="text" class="form-control" id="userSearch" placeholder="Name, email, phone...">
                        </div>
                        <div class="form-group">
                            <label class="form-label">User Status</label>
                            <select class="form-control" id="userStatusFilter">
                                <option value="all">All Users</option>
                                <option value="active">Active</option>
                                <option value="pending">Pending</option>
                                <option value="suspended">Suspended</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Registration Date</label>
                            <select class="form-control" id="userDateFilter">
                                <option value="all">All Time</option>
                                <option value="7">Last 7 Days</option>
                                <option value="30">Last 30 Days</option>
                                <option value="90">Last 90 Days</option>
                            </select>
                        </div>
                    </div>
                    <div class="apply-filters">
                        <button class="btn btn-primary" id="applyUserFilters">Apply Filters</button>
                    </div>
                </div>
                
                <!-- Users Table -->
                <div class="table-container">
                    <div class="table-header">
                        <h2 class="section-title">All Users (2,543)</h2>
                        <div>
                            <button class="btn btn-secondary btn-sm" id="exportUsersBtn">
                                <i class="icon">📄</i> Export
                            </button>
                        </div>
                    </div>
                    <table id="usersTable">
                        <thead>
                            <tr>
                                <th>User ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Type</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr data-status="active" data-date="2023-12-12">
                                <td>#USR-1001</td>
                                <td>Sarah Johnson</td>
                                <td>sarah@example.com</td>
                                <td>(555) 123-4567</td>
                                <td>Customer</td>
                                <td><span class="status-badge status-active">Active</span></td>
                                <td>
                                    <div class="action-buttons">
                                        <button class="action-btn view">View</button>
                                        <button class="action-btn edit">Edit</button>
                                        <button class="action-btn suspend">Suspend</button>
                                    </div>
                                </td>
                            </tr>
                            <tr data-status="pending" data-date="2023-12-11">
                                <td>#USR-1002</td>
                                <td>Michael Chen</td>
                                <td>michael@example.com</td>
                                <td>(555) 987-6543</td>
                                <td>Business Owner</td>
                                <td><span class="status-badge status-pending">Pending</span></td>
                                <td>
                                    <div class="action-buttons">
                                        <button class="action-btn view">View</button>
                                        <button class="action-btn edit">Edit</button>
                                        <button class="action-btn reject">Reject</button>
                                    </div>
                                </td>
                            </tr>
                            <tr data-status="active" data-date="2023-12-11">
                                <td>#USR-1003</td>
                                <td>Emma Wilson</td>
                                <td>emma@example.com</td>
                                <td>(555) 456-7890</td>
                                <td>Customer</td>
                                <td><span class="status-badge status-active">Active</span></td>
                                <td>
                                    <div class="action-buttons">
                                        <button class="action-btn view">View</button>
                                        <button class="action-btn edit">Edit</button>
                                        <button class="action-btn suspend">Suspend</button>
                                    </div>
                                </td>
                            </tr>
                            <tr data-status="suspended" data-date="2023-12-10">
                                <td>#USR-1004</td>
                                <td>David Kim</td>
                                <td>david@example.com</td>
                                <td>(555) 789-0123</td>
                                <td>Business Owner</td>
                                <td><span class="status-badge status-suspended">Suspended</span></td>
                                <td>
                                    <div class="action-buttons">
                                        <button class="action-btn view">View</button>
                                        <button class="action-btn edit">Edit</button>
                                        <button class="action-btn activate">Activate</button>
                                    </div>
                                </td>
                            </tr>
                            <tr data-status="active" data-date="2023-12-09">
                                <td>#USR-1005</td>
                                <td>Robert Taylor</td>
                                <td>robert@example.com</td>
                                <td>(555) 234-5678</td>
                                <td>Admin</td>
                                <td><span class="status-badge status-active">Active</span></td>
                                <td>
                                    <div class="action-buttons">
                                        <button class="action-btn view">View</button>
                                        <button class="action-btn edit">Edit</button>
                                        <button class="action-btn suspend">Suspend</button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div style="padding: 12px 15px; border-top: 1px solid var(--border-color); display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 10px;">
                        <div>Showing 1 to 5 of 2,543 entries</div>
                        <div style="display: flex; gap: 5px; flex-wrap: wrap;">
                            <button class="btn btn-secondary btn-sm">Previous</button>
                            <button class="btn btn-primary btn-sm">1</button>
                            <button class="btn btn-secondary btn-sm">2</button>
                            <button class="btn btn-secondary btn-sm">3</button>
                            <button class="btn btn-secondary btn-sm">Next</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Business Management Content -->
            <div id="business-content" class="content-section">
                <div class="content-header">
                    <h1 class="page-title">Business Management</h1>
                    <button class="btn btn-primary" id="addBusinessBtn">
                        <i class="icon">➕</i> Add Business
                    </button>
                </div>
                
                <!-- Business Filters -->
                <div class="table-container mb-20">
                    <div style="padding: 15px; display: grid; grid-template-columns: 1fr; gap: 15px;">
                        <div class="form-group">
                            <label class="form-label">Search Businesses</label>
                            <input type="text" class="form-control" id="businessSearch" placeholder="Name, category, location...">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Business Status</label>
                            <select class="form-control" id="businessStatusFilter">
                                <option value="all">All Businesses</option>
                                <option value="active">Active</option>
                                <option value="pending">Pending Approval</option>
                                <option value="suspended">Suspended</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Business Category</label>
                            <select class="form-control" id="businessCategoryFilter">
                                <option value="all">All Categories</option>
                                <option value="pharmacy">Pharmacy</option>
                                <option value="hospital">Hospital</option>
                                <option value="clinic">Clinic</option>
                                <option value="laboratory">Laboratory</option>
                                <option value="distributor">Distributor</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Location</label>
                            <select class="form-control" id="businessLocationFilter">
                                <option value="all">All Locations</option>
                                <option value="us">United States</option>
                                <option value="uk">United Kingdom</option>
                                <option value="ca">Canada</option>
                                <option value="au">Australia</option>
                                <option value="in">India</option>
                            </select>
                        </div>
                    </div>
                    <div class="apply-filters">
                        <button class="btn btn-primary" id="applyBusinessFilters">Apply Filters</button>
                    </div>
                </div>
                
                <!-- Businesses Table -->
                <div class="table-container">
                    <div class="table-header">
                        <h2 class="section-title">All Businesses (1,832)</h2>
                        <div>
                            <button class="btn btn-secondary btn-sm" id="exportBusinessesBtn">
                                <i class="icon">📄</i> Export
                            </button>
                        </div>
                    </div>
                    <table id="businessesTable">
                        <thead>
                            <tr>
                                <th>Business ID</th>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Location</th>
                                <th>Owner</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr data-status="active" data-category="pharmacy" data-location="us">
                                <td>#BUS-5001</td>
                                <td>MediCare Pharmaceuticals</td>
                                <td>Pharmacy</td>
                                <td>New York, USA</td>
                                <td>Sarah Johnson</td>
                                <td><span class="status-badge status-active">Active</span></td>
                                <td>
                                    <div class="action-buttons">
                                        <button class="action-btn view">View</button>
                                        <button class="action-btn edit">Edit</button>
                                        <button class="action-btn suspend">Suspend</button>
                                    </div>
                                </td>
                            </tr>
                            <tr data-status="pending" data-category="laboratory" data-location="uk">
                                <td>#BUS-5002</td>
                                <td>BioTech Solutions</td>
                                <td>Laboratory</td>
                                <td>London, UK</td>
                                <td>Michael Chen</td>
                                <td><span class="status-badge status-pending">Pending</span></td>
                                <td>
                                    <div class="action-buttons">
                                        <button class="action-btn view">View</button>
                                        <button class="action-btn edit">Edit</button>
                                        <button class="action-btn reject">Reject</button>
                                    </div>
                                </td>
                            </tr>
                            <tr data-status="active" data-category="hospital" data-location="us">
                                <td>#BUS-5003</td>
                                <td>City General Hospital</td>
                                <td>Hospital</td>
                                <td>Chicago, USA</td>
                                <td>Emma Wilson</td>
                                <td><span class="status-badge status-active">Active</span></td>
                                <td>
                                    <div class="action-buttons">
                                        <button class="action-btn view">View</button>
                                        <button class="action-btn edit">Edit</button>
                                        <button class="action-btn suspend">Suspend</button>
                                    </div>
                                </td>
                            </tr>
                            <tr data-status="suspended" data-category="distributor" data-location="ca">
                                <td>#BUS-5004</td>
                                <td>PharmaPlus Distributors</td>
                                <td>Distributor</td>
                                <td>Toronto, Canada</td>
                                <td>David Kim</td>
                                <td><span class="status-badge status-suspended">Suspended</span></td>
                                <td>
                                    <div class="action-buttons">
                                        <button class="action-btn view">View</button>
                                        <button class="action-btn edit">Edit</button>
                                        <button class="action-btn activate">Activate</button>
                                    </div>
                                </td>
                            </tr>
                            <tr data-status="active" data-category="clinic" data-location="au">
                                <td>#BUS-5005</td>
                                <td>Wellness Clinic</td>
                                <td>Clinic</td>
                                <td>Sydney, Australia</td>
                                <td>Robert Taylor</td>
                                <td><span class="status-badge status-active">Active</span></td>
                                <td>
                                    <div class="action-buttons">
                                        <button class="action-btn view">View</button>
                                        <button class="action-btn edit">Edit</button>
                                        <button class="action-btn suspend">Suspend</button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div style="padding: 12px 15px; border-top: 1px solid var(--border-color); display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 10px;">
                        <div>Showing 1 to 5 of 1,832 entries</div>
                        <div style="display: flex; gap: 5px; flex-wrap: wrap;">
                            <button class="btn btn-secondary btn-sm">Previous</button>
                            <button class="btn btn-primary btn-sm">1</button>
                            <button class="btn btn-secondary btn-sm">2</button>
                            <button class="btn btn-secondary btn-sm">3</button>
                            <button class="btn btn-secondary btn-sm">Next</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Review Moderation Content -->
            <div id="reviews-content" class="content-section">
                <div class="content-header">
                    <h1 class="page-title">Review Moderation</h1>
                    <div style="display: flex; gap: 10px; flex-wrap: wrap;">
                        <button class="btn btn-secondary" id="reviewSettingsBtn">
                            <i class="icon">⚙️</i> Settings
                        </button>
                    </div>
                </div>
                
                <!-- Review Filters -->
                <div class="table-container mb-20">
                    <div style="padding: 15px; display: grid; grid-template-columns: 1fr; gap: 15px;">
                        <div class="form-group">
                            <label class="form-label">Search Reviews</label>
                            <input type="text" class="form-control" id="reviewSearch" placeholder="User, business, content...">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Review Status</label>
                            <select class="form-control" id="reviewStatusFilter">
                                <option value="all">All Reviews</option>
                                <option value="pending">Pending Approval</option>
                                <option value="approved">Approved</option>
                                <option value="rejected">Rejected</option>
                                <option value="flagged">Flagged</option>
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
                        <h2 class="section-title">Reviews to Moderate (342)</h2>
                        <div>
                            <button class="btn btn-secondary btn-sm" id="exportReviewsBtn">
                                <i class="icon">📄</i> Export
                            </button>
                        </div>
                    </div>
                    <div class="review-cards" id="reviewsList">
                        <div class="review-card" data-status="pending" data-rating="5">
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
                                Excellent service and fast delivery. The medication was exactly as described and arrived in perfect condition. The staff was very helpful and knowledgeable. I would definitely recommend this pharmacy to others.
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
                                The product quality was good but the delivery took longer than expected. Customer service was helpful though and resolved my issue promptly. The packaging could be improved to prevent damage during shipping.
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
                                Very disappointed with my experience. The staff was rude and unprofessional. I waited for over two hours past my appointment time. The facilities were not clean and the equipment looked outdated. Would not recommend.
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
                                Outstanding service! Dr. Smith was very thorough and took the time to explain everything clearly. The clinic was clean and modern. The reception staff was friendly and efficient. Best healthcare experience I've had in years.
                            </div>
                            <div class="review-actions">
                                <button class="btn btn-success btn-sm approve-review">Approve</button>
                                <button class="btn btn-danger btn-sm reject-review">Reject</button>
                                <button class="btn btn-secondary btn-sm view-review">View Details</button>
                            </div>
                        </div>
                    </div>
                    <div style="padding: 12px 15px; border-top: 1px solid var(--border-color); display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 10px;">
                        <div>Showing 1 to 4 of 342 entries</div>
                        <div style="display: flex; gap: 5px; flex-wrap: wrap;">
                            <button class="btn btn-secondary btn-sm">Previous</button>
                            <button class="btn btn-primary btn-sm">1</button>
                            <button class="btn btn-secondary btn-sm">2</button>
                            <button class="btn btn-secondary btn-sm">3</button>
                            <button class="btn btn-secondary btn-sm">Next</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Analytics & Reports Content -->
            <div id="analytics-content" class="content-section">
                <div class="content-header">
                    <h1 class="page-title">Analytics & Reports</h1>
                    <div style="display: flex; gap: 10px; flex-wrap: wrap;">
                        <button class="btn btn-primary" id="generateReportBtn2">
                            <i class="icon">📄</i> Generate Report
                        </button>
                        <button class="btn btn-secondary" id="analyticsSettingsBtn">
                            <i class="icon">⚙️</i> Settings
                        </button>
                    </div>
                </div>
                
                <!-- Date Range Selector -->
                <div class="table-container mb-20">
                    <div style="padding: 15px; display: grid; grid-template-columns: 1fr; gap: 15px;">
                        <div class="form-group">
                            <label class="form-label">Date Range</label>
                            <select class="form-control" id="dateRange">
                                <option value="7">Last 7 Days</option>
                                <option value="30" selected>Last 30 Days</option>
                                <option value="90">Last 90 Days</option>
                                <option value="365">This Year</option>
                                <option value="custom">Custom Range</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label">From Date</label>
                            <input type="date" class="form-control" id="fromDate" disabled>
                        </div>
                        <div class="form-group">
                            <label class="form-label">To Date</label>
                            <input type="date" class="form-control" id="toDate" disabled>
                        </div>
                    </div>
                    <div class="apply-filters">
                        <button class="btn btn-primary" id="applyAnalyticsFilters">Apply Filters</button>
                    </div>
                </div>
                
                <!-- Key Metrics -->
                <div class="stats-cards mb-20">
                    <div class="stat-card">
                        <div class="stat-icon">👥</div>
                        <div class="stat-title">New Users</div>
                        <div class="stat-value" id="newUsersCount">247</div>
                        <div class="stat-change positive">
                            <i class="icon">↑</i> <span id="userChange">18</span>% from last period
                        </div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-icon">🏢</div>
                        <div class="stat-title">New Businesses</div>
                        <div class="stat-value" id="newBusinessesCount">132</div>
                        <div class="stat-change positive">
                            <i class="icon">↑</i> <span id="businessChange">7</span>% from last period
                        </div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-icon">⭐</div>
                        <div class="stat-title">New Reviews</div>
                        <div class="stat-value" id="newReviewsCount">1,245</div>
                        <div class="stat-change positive">
                            <i class="icon">↑</i> <span id="reviewChange">22</span>% from last period
                        </div>
                    </div>
                    <div class="stat-card">
                        <div class="icon">💰</div>
                        <div class="stat-title">Revenue</div>
                        <div class="stat-value" id="revenueCount">$42,380</div>
                        <div class="stat-change positive">
                            <i class="icon">↑</i> <span id="revenueChange">15</span>% from last period
                        </div>
                    </div>
                </div>
                
                <!-- User Growth Chart -->
                <div class="chart-container">
                    <div class="chart-header">
                        <h2 class="chart-title">User Growth</h2>
                        <div class="chart-actions">
                            <button class="btn btn-secondary btn-sm" data-chart="user-daily">Daily</button>
                            <button class="btn btn-secondary btn-sm" data-chart="user-weekly">Weekly</button>
                            <button class="btn btn-primary btn-sm" data-chart="user-monthly">Monthly</button>
                        </div>
                    </div>
                    <div class="chart-placeholder">
                        <div class="chart" id="userChart">
                            <div class="chart-bars">
                                <div class="chart-bar-container">
                                    <div class="chart-bar" style="height: 30%;">
                                        <span class="chart-bar-value">75</span>
                                    </div>
                                    <div class="chart-bar-label">Jan</div>
                                </div>
                                <div class="chart-bar-container">
                                    <div class="chart-bar" style="height: 45%;">
                                        <span class="chart-bar-value">112</span>
                                    </div>
                                    <div class="chart-bar-label">Feb</div>
                                </div>
                                <div class="chart-bar-container">
                                    <div class="chart-bar" style="height: 60%;">
                                        <span class="chart-bar-value">150</span>
                                    </div>
                                    <div class="chart-bar-label">Mar</div>
                                </div>
                                <div class="chart-bar-container">
                                    <div class="chart-bar" style="height: 75%;">
                                        <span class="chart-bar-value">187</span>
                                    </div>
                                    <div class="chart-bar-label">Apr</div>
                                </div>
                                <div class="chart-bar-container">
                                    <div class="chart-bar" style="height: 90%;">
                                        <span class="chart-bar-value">225</span>
                                    </div>
                                    <div class="chart-bar-label">May</div>
                                </div>
                                <div class="chart-bar-container">
                                    <div class="chart-bar" style="height: 100%;">
                                        <span class="chart-bar-value">247</span>
                                    </div>
                                    <div class="chart-bar-label">Jun</div>
                                </div>
                            </div>
                            <div class="chart-x-axis">
                                <span>Monthly User Growth (Last 6 Months)</span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Review Activity Chart -->
                <div class="chart-container">
                    <div class="chart-header">
                        <h2 class="chart-title">Review Activity</h2>
                        <div class="chart-actions">
                            <button class="btn btn-secondary btn-sm" data-chart="review-rating">By Rating</button>
                            <button class="btn btn-secondary btn-sm" data-chart="review-category">By Category</button>
                            <button class="btn btn-primary btn-sm" data-chart="review-time">Over Time</button>
                        </div>
                    </div>
                    <div class="chart-placeholder">
                        <div class="pie-chart">
                            <div class="pie-chart-center">1,245</div>
                        </div>
                        <div class="chart-legend">
                            <div class="chart-legend-item">
                                <div class="chart-legend-color" style="background-color: #4A89DC;"></div>
                                <span>5 Stars (45%)</span>
                            </div>
                            <div class="chart-legend-item">
                                <div class="chart-legend-color" style="background-color: #5D9CEC;"></div>
                                <span>4 Stars (20%)</span>
                            </div>
                            <div class="chart-legend-item">
                                <div class="chart-legend-color" style="background-color: #48CFAD;"></div>
                                <span>3 Stars (15%)</span>
                            </div>
                            <div class="chart-legend-item">
                                <div class="chart-legend-color" style="background-color: #A0D468;"></div>
                                <span>2 Stars (12%)</span>
                            </div>
                            <div class="chart-legend-item">
                                <div class="chart-legend-color" style="background-color: #FFCE54;"></div>
                                <span>1 Star (8%)</span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Business Metrics -->
                <div class="chart-container">
                    <div class="chart-header">
                        <h2 class="chart-title">Business Metrics</h2>
                        <div class="chart-actions">
                            <button class="btn btn-secondary btn-sm" data-chart="business-type">By Type</button>
                            <button class="btn btn-secondary btn-sm" data-chart="business-location">By Location</button>
                            <button class="btn btn-primary btn-sm" data-chart="business-growth">Growth</button>
                        </div>
                    </div>
                    <div class="chart-placeholder">
                        <div class="chart" id="businessChart">
                            <div class="chart-bars">
                                <div class="chart-bar-container">
                                    <div class="chart-bar" style="height: 20%; background-color: #4A89DC;">
                                        <span class="chart-bar-value">25</span>
                                    </div>
                                    <div class="chart-bar-label">US</div>
                                </div>
                                <div class="chart-bar-container">
                                    <div class="chart-bar" style="height: 35%; background-color: #5D9CEC;">
                                        <span class="chart-bar-value">42</span>
                                    </div>
                                    <div class="chart-bar-label">UK</div>
                                </div>
                                <div class="chart-bar-container">
                                    <div class="chart-bar" style="height: 25%; background-color: #48CFAD;">
                                        <span class="chart-bar-value">30</span>
                                    </div>
                                    <div class="chart-bar-label">CA</div>
                                </div>
                                <div class="chart-bar-container">
                                    <div class="chart-bar" style="height: 15%; background-color: #A0D468;">
                                        <span class="chart-bar-value">18</span>
                                    </div>
                                    <div class="chart-bar-label">AU</div>
                                </div>
                                <div class="chart-bar-container">
                                    <div class="chart-bar" style="height: 10%; background-color: #FFCE54;">
                                        <span class="chart-bar-value">12</span>
                                    </div>
                                    <div class="chart-bar-label">IN</div>
                                </div>
                                <div class="chart-bar-container">
                                    <div class="chart-bar" style="height: 5%; background-color: #ED5565;">
                                        <span class="chart-bar-value">5</span>
                                    </div>
                                    <div class="chart-bar-label">Other</div>
                                </div>
                            </div>
                            <div class="chart-x-axis">
                                <span>New Businesses by Location (Last 30 Days)</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Points System Content -->
            <div id="points-content" class="content-section">
                <div class="content-header">
                    <h1 class="page-title">Points System</h1>
                </div>

                <div class="points-container">
                    <div class="points-header">
                        <h2 class="points-title">Your Points Summary</h2>
                    </div>
                    
                    <div class="points-summary">
                        <div class="points-level">Level 2: TechNovice</div>
                        <div class="points-progress">
                            <div class="progress-bar">
                                <div class="progress-fill" style="width: 65%;"></div>
                            </div>
                            <div class="progress-text">65 points earned (35 more to reach Level 3)</div>
                        </div>
                        <div class="points-total">Total: 65 points</div>
                    </div>
                    
                    <h3 style="margin-bottom: 15px;">Ways to Earn Points</h3>
                    
                    <div class="points-tasks">
                        <div class="task-card">
                            <div class="task-header">
                                <div class="task-title">Add LinkedIn Account</div>
                                <div class="task-points">+10 to +50 points</div>
                            </div>
                            <div class="task-description">
                                Connect your LinkedIn profile to verify your professional identity. Higher verification levels earn more points.
                            </div>
                            <div class="task-status">Completed: +30 points</div>
                        </div>
                        
                        <div class="task-card">
                            <div class="task-header">
                                <div class="task-title">Post Reviews with Images</div>
                                <div class="task-points">+5 to +15 points</div>
                            </div>
                            <div class="task-description">
                                Earn points for posting detailed reviews with images. Higher quality reviews earn more points.
                            </div>
                            <div class="task-status">Completed 3 times: +30 points</div>
                        </div>
                        
                        <div class="task-card">
                            <div class="task-header">
                                <div class="task-title">Post Reviews without Images</div>
                                <div class="task-points">+0 to +10 points</div>
                            </div>
                            <div class="task-description">
                                Earn points for posting text reviews. Points depend on review length and quality.
                            </div>
                            <div class="task-status">Completed 2 times: +10 points</div>
                        </div>
                        
                        <div class="task-card">
                            <div class="task-header">
                                <div class="task-title">Reply to Other User Reviews</div>
                                <div class="task-points">+0 to +5 points</div>
                            </div>
                            <div class="task-description">
                                Earn points for engaging with other users by replying to their reviews.
                            </div>
                            <div class="task-status">Not completed yet</div>
                        </div>
                        
                        <div class="task-card">
                            <div class="task-header">
                                <div class="task-title">Invite Users Who Post Reviews</div>
                                <div class="task-points">+2 points per review</div>
                            </div>
                            <div class="task-description">
                                Earn points when users you invite post approved reviews.
                            </div>
                            <div class="task-status">Earned: +10 points (5 reviews)</div>
                        </div>
                        
                        <div class="task-card">
                            <div class="task-header">
                                <div class="task-title">Get Replies to Your Reviews</div>
                                <div class="task-points">+0 to +5 points</div>
                            </div>
                            <div class="task-description">
                                Earn points when other users engage with your reviews by replying to them.
                            </div>
                            <div class="task-status">Earned: +5 points</div>
                        </div>
                    </div>
                    
                    <h3 style="margin-top: 25px; margin-bottom: 15px;">Level Benefits</h3>
                    
                    <table class="levels-table">
                        <thead>
                            <tr>
                                <th>Level</th>
                                <th>Points Required</th>
                                <th>Reply Access</th>
                                <th>Max Invites</th>
                                <th>Publishing Time</th>
                                <th>Other Benefits</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>0: APPRENTIX</td>
                                <td>0</td>
                                <td>No</td>
                                <td>0</td>
                                <td>24h</td>
                                <td>Basic features</td>
                            </tr>
                            <tr>
                                <td>1: TechStarter</td>
                                <td>10</td>
                                <td>Limited</td>
                                <td>5</td>
                                <td>12h</td>
                                <td>Basic analytics</td>
                            </tr>
                            <tr class="current-level">
                                <td>2: TechNovice</td>
                                <td>50</td>
                                <td>Yes</td>
                                <td>10</td>
                                <td>6h</td>
                                <td>Advanced analytics</td>
                            </tr>
                            <tr>
                                <td>3: TechPro</td>
                                <td>100</td>
                                <td>Yes</td>
                                <td>20</td>
                                <td>3h</td>
                                <td>Priority support</td>
                            </tr>
                            <tr>
                                <td>4: TechMaster</td>
                                <td>200</td>
                                <td>Yes</td>
                                <td>50</td>
                                <td>1h</td>
                                <td>Featured listings</td>
                            </tr>
                            <tr>
                                <td>5: TechVivo</td>
                                <td>500</td>
                                <td>Yes</td>
                                <td>Unlimited</td>
                                <td>Immediate</td>
                                <td>VIP features</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Queries Content -->
            <div id="queries-content" class="content-section">
                <div class="content-header">
                    <h1 class="page-title">Customer Queries</h1>
                    <div style="display: flex; gap: 10px; flex-wrap: wrap;">
                        <button class="btn btn-secondary" id="exportQueriesBtn">
                            <i class="icon">📄</i> Export All
                        </button>
                        <button class="btn btn-secondary" id="refreshQueriesBtn">
                            <i class="icon">🔄</i> Refresh
                        </button>
                    </div>
                </div>

                <!-- Queries Tabs -->
                <div class="table-container mb-20">
                    <div style="padding: 15px; border-bottom: 1px solid var(--border-color);">
                        <div style="display: flex; gap: 10px; flex-wrap: wrap;">
                            <button class="btn btn-primary btn-md active" data-tab="orders">
                                <i class="icon">🛒</i> Orders
                            </button>
                            <button class="btn btn-secondary btn-md" data-tab="enquiries">
                                <i class="icon">✉️</i> Enquiries
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Orders Tab Content -->
                <div class="table-container queries-tab-content active" id="orders-tab">
                    <div class="table-header">
                        <h2 class="section-title">Recent Orders</h2>
                        <div style="display: flex; gap: 8px; flex-wrap: wrap;">
                            <button class="btn btn-secondary btn-sm">
                                <i class="icon">📅</i> Filter by Date
                            </button>
                        </div>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>Product</th>
                                <th>Customer</th>
                                <th>Date/Time</th>
                                <th>Amount</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>#ORD-1001</td>
                                <td>Pharma Software License</td>
                                <td>Sarah Johnson</td>
                                <td>Dec 15, 2023 10:30 AM</td>
                                <td>$499.00</td>
                                <td><span class="status-badge status-active">Completed</span></td>
                                <td>
                                    <div class="action-buttons" style="gap: 6px;">
                                        <button class="action-btn view" style="padding: 6px 10px;">
                                            <i class="icon">👁️</i> View
                                        </button>
                                        <button class="action-btn edit" style="padding: 6px 10px;">
                                            <i class="icon">🖨️</i> Invoice
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>#ORD-1002</td>
                                <td>Annual Subscription</td>
                                <td>Michael Chen</td>
                                <td>Dec 14, 2023 02:45 PM</td>
                                <td>$1,299.00</td>
                                <td><span class="status-badge status-pending">Processing</span></td>
                                <td>
                                    <div class="action-buttons" style="gap: 6px;">
                                        <button class="action-btn view" style="padding: 6px 10px;">
                                            <i class="icon">👁️</i> View
                                        </button>
                                        <button class="action-btn edit" style="padding: 6px 10px;">
                                            <i class="icon">🖨️</i> Invoice
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Enquiries Tab Content -->
                <div class="table-container queries-tab-content" id="enquiries-tab">
                    <div class="table-header">
                        <h2 class="section-title">Recent Enquiries</h2>
                        <div style="display: flex; gap: 8px; flex-wrap: wrap;">
                            <button class="btn btn-secondary btn-sm">
                                <i class="icon">📅</i> Filter by Date
                            </button>
                            <button class="btn btn-secondary btn-sm">
                                <i class="icon">⚡</i> Show Urgent Only
                            </button>
                        </div>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th>Enquiry ID</th>
                                <th>Subject</th>
                                <th>Customer</th>
                                <th>Date/Time</th>
                                <th>Response Time</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>#ENQ-2001</td>
                                <td>Bulk Order Inquiry</td>
                                <td>David Kim</td>
                                <td>Dec 15, 2023 09:15 AM</td>
                                <td><span class="text-success">2 hours</span></td>
                                <td><span class="status-badge status-active">Responded</span></td>
                                <td>
                                    <div class="action-buttons" style="gap: 6px;">
                                        <button class="action-btn view" style="padding: 6px 10px;">
                                            <i class="icon">👁️</i> View
                                        </button>
                                        <button class="action-btn edit" style="padding: 6px 10px;">
                                            <i class="icon">✏️</i> Edit
                                        </button>
                                        <button class="action-btn activate" style="padding: 6px 10px;">
                                            <i class="icon">🔄</i> Resend
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>#ENQ-2002</td>
                                <td>Custom Solution Query</td>
                                <td>Emma Wilson</td>
                                <td>Dec 14, 2023 04:30 PM</td>
                                <td><span class="text-danger">Pending</span></td>
                                <td><span class="status-badge status-pending">Pending</span></td>
                                <td>
                                    <div class="action-buttons" style="gap: 6px;">
                                        <button class="action-btn view" style="padding: 6px 10px;">
                                            <i class="icon">👁️</i> View
                                        </button>
                                        <button class="action-btn edit" style="padding: 6px 10px;">
                                            <i class="icon">✏️</i> Reply
                                        </button>
                                        <button class="action-btn suspend" style="padding: 6px 10px;">
                                            <i class="icon">⏸️</i> Mark Pending
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Campaigns Content -->
            <div id="campaigns-content" class="content-section">
                <div class="content-header">
                    <h1 class="page-title">Email Campaigns</h1>
                    <button class="btn btn-primary" id="createCampaignBtn">
                        <i class="icon">➕</i> Create Campaign
                    </button>
                </div>

                <!-- Campaign Filters -->
                <div class="table-container mb-20">
                    <div style="padding: 15px; display: grid; grid-template-columns: 1fr; gap: 15px;">
                        <div class="form-group">
                            <label class="form-label">Search Campaigns</label>
                            <input type="text" class="form-control" id="campaignSearch" placeholder="Name, subject...">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Status</label>
                            <select class="form-control" id="campaignStatusFilter">
                                <option value="all">All Campaigns</option>
                                <option value="draft">Draft</option>
                                <option value="scheduled">Scheduled</option>
                                <option value="sent">Sent</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Date Range</label>
                            <select class="form-control" id="campaignDateFilter">
                                <option value="all">All Time</option>
                                <option value="7">Last 7 Days</option>
                                <option value="30">Last 30 Days</option>
                            </select>
                        </div>
                    </div>
                    <div class="apply-filters">
                        <button class="btn btn-primary" id="applyCampaignFilters">Apply Filters</button>
                    </div>
                </div>

                <!-- Campaigns Table -->
                <div class="table-container">
                    <div class="table-header">
                        <h2 class="section-title">All Campaigns</h2>
                        <div>
                            <button class="btn btn-secondary btn-sm" id="exportCampaignsBtn">
                                <i class="icon">📄</i> Export
                            </button>
                        </div>
                    </div>
                    <table id="campaignsTable">
                        <thead>
                            <tr>
                                <th>Campaign ID</th>
                                <th>Name</th>
                                <th>Subject</th>
                                <th>Recipients</th>
                                <th>Status</th>
                                <th>Sent Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>#CMP-3001</td>
                                <td>New Year Promotion</td>
                                <td>Special Discount for 2024</td>
                                <td>All Businesses</td>
                                <td><span class="status-badge status-active">Sent</span></td>
                                <td>Dec 1, 2023</td>
                                <td>
                                    <div class="action-buttons">
                                        <button class="action-btn view">View</button>
                                        <button class="action-btn edit">Edit</button>
                                        <button class="action-btn suspend">Delete</button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>#CMP-3002</td>
                                <td>Product Update</td>
                                <td>New Features Available</td>
                                <td>Pharmacy Category</td>
                                <td><span class="status-badge status-pending">Scheduled</span></td>
                                <td>Dec 20, 2023</td>
                                <td>
                                    <div class="action-buttons">
                                        <button class="action-btn view">View</button>
                                        <button class="action-btn edit">Edit</button>
                                        <button class="action-btn suspend">Delete</button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Create Campaign Modal -->
            <div class="modal" id="createCampaignModal">
                <div class="modal-content" style="max-width: 100%;">
                    <div class="modal-header">
                        <h2 class="modal-title">Create New Campaign</h2>
                        <button class="modal-close">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form id="campaignForm">
                            <div class="form-group">
                                <label class="form-label">Campaign Name</label>
                                <input type="text" class="form-control" id="campaignName" required>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Email Subject</label>
                                <input type="text" class="form-control" id="campaignSubject" required>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Recipient Type</label>
                                <select class="form-control" id="recipientType" required>
                                    <option value="">Select Recipient Type</option>
                                    <option value="all">All Businesses</option>
                                    <option value="category">Specific Category</option>
                                    <option value="custom">Custom List</option>
                                </select>
                            </div>
                            <div class="form-group" id="categorySelection" style="display: none;">
                                <label class="form-label">Business Category</label>
                                <select class="form-control" id="businessCategory">
                                    <option value="pharmacy">Pharmacy</option>
                                    <option value="hospital">Hospital</option>
                                    <option value="clinic">Clinic</option>
                                    <option value="laboratory">Laboratory</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Email Content</label>
                                <textarea class="form-control" id="emailContent" rows="6" required></textarea>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Attachments</label>
                                <input type="file" class="form-control" id="campaignAttachment">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Schedule</label>
                                <select class="form-control" id="campaignSchedule">
                                    <option value="now">Send Immediately</option>
                                    <option value="schedule">Schedule for Later</option>
                                </select>
                            </div>
                            <div class="form-group" id="scheduleDateGroup" style="display: none;">
                                <label class="form-label">Schedule Date/Time</label>
                                <input type="datetime-local" class="form-control" id="scheduleDateTime">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" id="cancelCampaign">Cancel</button>
                        <button class="btn btn-primary" id="saveCampaign">Save Campaign</button>
                        <button class="btn btn-success" id="sendCampaign">Send Now</button>
                    </div>
                </div>
            </div>

            <!-- Settings Content -->
            <div id="settings-content" class="content-section">
                <div class="content-header">
                    <h1 class="page-title">System Settings</h1>
                </div>
                
                <div class="table-container">
                    <div style="padding: 15px;">
                        <h2 style="margin-bottom: 15px; color: var(--black);">Admin Preferences</h2>
                        
                        <div style="display: grid; grid-template-columns: 1fr; gap: 20px;">
                            <div>
                                <div class="form-group">
                                    <label class="form-label">Dashboard Theme</label>
                                    <select class="form-control" id="dashboardTheme">
                                        <option value="red-black">Red & Black (Default)</option>
                                        <option value="blue-white">Blue & White</option>
                                        <option value="dark">Dark Mode</option>
                                        <option value="light">Light Mode</option>
                                    </select>
                                </div>
                                
                                <div class="form-group">
                                    <label class="form-label">Default Page</label>
                                    <select class="form-control" id="defaultPage">
                                        <option value="dashboard">Dashboard Overview</option>
                                        <option value="users">User Management</option>
                                        <option value="business">Business Management</option>
                                        <option value="reviews">Review Moderation</option>
                                        <option value="analytics">Analytics & Reports</option>
                                        <option value="points">Points System</option>
                                    </select>
                                </div>
                                
                                <div class="form-group">
                                    <label class="form-label">Results Per Page</label>
                                    <select class="form-control" id="resultsPerPage">
                                        <option value="10">10</option>
                                        <option value="25" selected>25 (Default)</option>
                                        <option value="50">50</option>
                                        <option value="100">100</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div>
                                <div class="form-group">
                                    <label class="form-label">Notification Preferences</label>
                                    <div style="display: flex; flex-direction: column; gap: 8px;">
                                        <label style="display: flex; align-items: center; gap: 10px;">
                                            <input type="checkbox" id="notifUser" checked> New User Signups
                                        </label>
                                        <label style="display: flex; align-items: center; gap: 10px;">
                                            <input type="checkbox" id="notifBusiness" checked> Business Approvals
                                        </label>
                                        <label style="display: flex; align-items: center; gap: 10px;">
                                            <input type="checkbox" id="notifReview" checked> Pending Reviews
                                        </label>
                                        <label style="display: flex; align-items: center; gap: 10px;">
                                            <input type="checkbox" id="notifSystem"> System Updates
                                        </label>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="form-label">Notification Method</label>
                                    <div style="display: flex; flex-direction: column; gap: 8px;">
                                        <label style="display: flex; align-items: center; gap: 10px;">
                                            <input type="radio" name="notification" id="notifInApp" checked> In-App Only
                                        </label>
                                        <label style="display: flex; align-items: center; gap: 10px;">
                                            <input type="radio" name="notification" id="notifEmail"> Email Notifications
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div style="margin-top: 20px; display: flex; justify-content: flex-end; gap: 8px; flex-wrap: wrap;">
                            <button class="btn btn-secondary" id="cancelSettings">Cancel</button>
                            <button class="btn btn-primary" id="saveSettings">Save Changes</button>
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
    @include('admin.dashboard.addUser')

    <!-- Add Business Modal -->
   @include('admin.dashboard.addBusiness')

    <!-- View Details Modal -->
    <div class="modal" id="detailsModal">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="detailsModalTitle">Details</h2>
                <button class="modal-close">&times;</button>
            </div>
            <div class="modal-body" id="detailsModalContent">
                <!-- Content will be loaded dynamically -->
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" id="closeDetails">Close</button>
            </div>
        </div>
    </div>
    @include('admin.dashboard.script')
</body>
</html>