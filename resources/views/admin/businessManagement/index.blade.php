<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Business Management - SCIZORA-Admin</title>
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
                            <input type="text" class="form-control" id="businessSearch"
                                placeholder="Name, category, location...">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Business Status</label>
                            <select class="form-control" id="businessStatusFilter">
                                <option value="all">All Businesses</option>
                                <option value="Active">Active</option>
                                <option value="Pending">Pending</option>
                                <option value="Suspended">Suspended</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Business Category</label>
                            <select class="form-control" id="businessCategoryFilter">
                                <option value="all">All Categories</option>
                                @foreach ($industries as $industry)
                                    <option value="{{ $industry->id }}">{{ $industry->name }}</option>
                                @endforeach

                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Location</label>
                            <select class="form-control" id="businessLocationFilter">
                                <option value="all">All Locations</option>
                                @foreach ($locations as $location)
                                    <option value="{{ $location->id }}">{{ $location->name }}</option>

                                @endforeach
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
                        <h2 class="section-title">All Businesses</h2>
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
                                <th>Email</th>
                                <th>Category</th>
                                <th>Location</th>
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

    <!-- Add Business Modal -->
    <div class="modal" id="addBusinessModal">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title">Add New Business</h2>
                <button class="modal-close">×</button>
            </div>
            <div class="modal-body">
                <form id="businessForm">
                    <div class="form-group">
                        <label class="form-label">Business Name</label>
                        <input type="text" class="form-control" id="businessName" name="name" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Category</label>
                        <select class="form-control" id="businessCategory" required name="category">
                            <option value="">Select Category</option>
                            @foreach ($industries as $industry)
                                <option value="{{ $industry->id }}">{{ $industry->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Location</label>
                        <select class="form-control" id="businessLocation" name="location" required>
                            <option value="">Select Location</option>
                            @foreach ($locations as $location)
                                <option value="{{ $location->id }}">{{ $location->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" id="businessEmail" name="email" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Phone</label>
                        <input type="number" class="form-control" id="businessPhone" name="contact_number">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control" id="businessPassword" name="password" required>
                    </div>
                    {{-- <div class="form-group">
                        <label class="form-label">Description</label>
                        <textarea class="form-control" id="businessDescription" rows="3"></textarea>
                    </div> --}}
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" id="cancelBusiness">Cancel</button>
                <button class="btn btn-primary" id="saveBusiness">Save Business</button>
            </div>
        </div>
    </div>

    <!-- Edit Business Modal -->
     <div class="modal" id="editBusinessModal">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title">Edit Business</h2>
                <button class="modal-close">×</button>
            </div>
            <div class="modal-body">
                <form id="businessEditForm">
                    <div class="form-group">
                        <label class="form-label">Business Name</label>
                        <input type="text" class="form-control" id="businessEditName" name="name" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Category</label>
                        <select class="form-control" id="businessEditCategory" required name="category">
                            <option value="">Select Category</option>
                            @foreach ($industries as $industry)
                                <option value="{{ $industry->id }}">{{ $industry->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Location</label>
                        <select class="form-control" id="businessEditLocation" name="location" required>
                            <option value="">Select Location</option>
                            @foreach ($locations as $location)
                                <option value="{{ $location->id }}">{{ $location->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" id="businessEditEmail" name="email" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Phone</label>
                        <input type="tel" class="form-control" id="businessEditPhone" name="contact_number">
                    </div>
                    
                    {{-- <div class="form-group">
                        <label class="form-label">Description</label>
                        <textarea class="form-control" id="businessEditDescription" rows="3"></textarea>
                    </div> --}}
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" id="cancelBusiness">Cancel</button>
                <button class="btn btn-primary" id="saveBusiness">Save Business</button>
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

                <!-- BUSINESS INFO HEADER -->
                <div id="businessInfoHeader"
                    style="display: flex; gap: 15px; align-items: center; margin-bottom: 20px;">
                    <div id="businessAvatar"
                        style="width: 60px; height: 60px; border-radius: 50%; background-color: var(--primary-color); display: flex; align-items: center; justify-content: center; font-size: 1.8rem; color: white; flex-shrink: 0;">
                        U
                    </div>
                    <div>
                        <h3 id="businessName" style="margin-bottom: 5px; color: var(--black);">User Name</h3>
                        <p id="businessEmail" style="color: var(--text-light); margin-bottom: 5px;">user@email.com</p>
                        <span id="businessStatusBadge" class="status-badge status-active">Active</span>
                    </div>
                </div>

                <!-- USER DETAILS GRID -->
                <div id="userInfoGrid"
                    style="display: grid; grid-template-columns: repeat(auto-fit, minmax(150px, 1fr)); gap: 15px;">
                    <div>
                        <p style="font-size: 0.8rem; color: var(--text-light); margin-bottom: 5px;">Phone</p>
                        <p id="businessPhone" style="font-weight: 500;">N/A</p>
                    </div>
                    <div>
                        <p style="font-size: 0.8rem; color: var(--text-light); margin-bottom: 5px;">Business Type</p>
                        <p id="businessType" style="font-weight: 500;">N/A</p>
                    </div>
                    <div>
                        <p style="font-size: 0.8rem; color: var(--text-light); margin-bottom: 5px;">Registration Date
                        </p>
                        <p id="businessRegistrationDate" style="font-weight: 500;">N/A</p>
                    </div>
                    <div>
                        <p style="font-size: 0.8rem; color: var(--text-light); margin-bottom: 5px;">Last Active</p>
                        <p id="businessLastActive" style="font-weight: 500;">N/A</p>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" data-close="detailsModal">Close</button>
            </div>
        </div>
    </div>
    @include('layouts.commonjs')
    @include('admin.businessManagement.js')


</body>

</html>