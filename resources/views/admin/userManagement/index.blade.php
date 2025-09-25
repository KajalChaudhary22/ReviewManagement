<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>User Management - SCIZORA-Admin</title>
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
            <!-- Dashboard Content -->
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
                            <input type="text" class="form-control" id="userSearch"
                                placeholder="Name, email, phone...">
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
                        <h2 class="section-title">All Users</h2>
                        {{-- <div>
                            <button class="btn btn-secondary btn-sm" id="exportUsersBtn">
                                <i class="icon">📄</i> Export
                            </button>
                        </div> --}}
                    </div>
                    <table id="usersTable">
                        <thead>
                            <tr>
                                <th>User ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
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
                        <input type="text" class="form-control" id="userName" name="name" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" id="userEmail" name="email" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Phone</label>
                        <input type="number" class="form-control" id="userPhone" name="contact_number">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control" id="userPassword" name="password" required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" id="cancelUser">Cancel</button>
                <button class="btn btn-primary" id="saveUser">Save User</button>
            </div>
        </div>
    </div>

    <!-- Edit User Modal -->
    <div class="modal" id="editUserModal">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title">Edit User</h2>
                <button class="modal-close" data-close="editUserModal">×</button>
            </div>
            <div class="modal-body">
                <form id="editUserForm">
                    <input type="hidden" name="id">
                    <div class="form-group">
                        <label class="form-label">Full Name</label>
                        <input type="text" class="form-control" name="name" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Phone</label>
                        <input type="number" class="form-control" name="phone">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" data-close="editUserModal">Cancel</button>
                <button class="btn btn-primary" id="updateUser">Update User</button>
            </div>
        </div>
    </div>

    <!-- View Details Modal -->
    <div class="modal" id="detailsModal">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="detailsModalTitle">User Details</h2>
                <button class="modal-close" data-close="detailsModal">×</button>
            </div>
            <div class="modal-body" id="detailsModalContent">

                <!-- USER INFO HEADER -->
                <div id="userInfoHeader" style="display: flex; gap: 15px; align-items: center; margin-bottom: 20px;">
                    <div id="userViewAvatar"
                        style="width: 60px; height: 60px; border-radius: 50%; background-color: var(--primary-color); display: flex; align-items: center; justify-content: center; font-size: 1.8rem; color: white; flex-shrink: 0;">
                        U
                    </div>
                    <div>
                        <h3 id="userViewName" style="margin-bottom: 5px; color: var(--black);">User Name</h3>
                        <p id="userViewEmail" style="color: var(--text-light); margin-bottom: 5px;">user@email.com</p>
                        <span id="userViewStatusBadge" class="status-badge status-active">Active</span>
                    </div>
                </div>

                <!-- USER DETAILS GRID -->
                <div id="userInfoGrid"
                    style="display: grid; grid-template-columns: repeat(auto-fit, minmax(150px, 1fr)); gap: 15px;">
                    <div>
                        <p style="font-size: 0.8rem; color: var(--text-light); margin-bottom: 5px;">Phone</p>
                        <p id="userViewPhone" style="font-weight: 500;">N/A</p>
                    </div>
                    <div>
                        <p style="font-size: 0.8rem; color: var(--text-light); margin-bottom: 5px;">User Type</p>
                        <p id="userViewType" style="font-weight: 500;">N/A</p>
                    </div>
                    <div>
                        <p style="font-size: 0.8rem; color: var(--text-light); margin-bottom: 5px;">Registration Date
                        </p>
                        <p id="userViewRegistrationDate" style="font-weight: 500;">N/A</p>
                    </div>
                    <div>
                        <p style="font-size: 0.8rem; color: var(--text-light); margin-bottom: 5px;">Last Active</p>
                        <p id="userViewLastActive" style="font-weight: 500;">N/A</p>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" data-close="detailsModal">Close</button>
            </div>
        </div>
    </div>

    @include('layouts.commonjs')
    @include('admin.userManagement.js')

</body>

</html>
