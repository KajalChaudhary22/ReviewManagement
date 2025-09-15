<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Campaigns - SCIZORA-Admin</title>
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
            <div id="campaigns-content" class="content-section">
                <div class="content-header">
                    <h1 class="page-title">Master Setup</h1>
                    <a href="{{ route('admin.masterSetup.Add',['ty'=>custom_encrypt('MasterSetupAdd')]) }}"><button class="btn btn-primary" id="createCampaignBtn">
                        <i class="icon">➕</i> Create Master
                    </button></a>
                </div>

                <!-- Campaign Filters -->
                <div class="table-container mb-20">
                    <div style="padding: 15px; display: grid; grid-template-columns: 1fr; gap: 15px;">
                        <div class="form-group">
                            <label class="form-label">Search Name</label>
                            <input type="text" class="form-control" id="nameSearch" placeholder="Name">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Status</label>
                            <select class="form-control" id="StatusFilter">
                                <option value="All">All Status</option>
                                <option value="Active">Active</option>
                                <option value="Inactive">Inactive</option>
                            </select>
                        </div>
                        
                    </div>
                    <div class="apply-filters">
                        <button class="btn btn-primary" id="applyMasterFilters">Apply Filters</button>
                    </div>
                </div>

                <!-- Master Table -->
                <div class="table-container">
                    <div class="table-header">
                        <h2 class="section-title">All Master</h2>
                        
                    </div>
                    <table id="masterSetupTable">
                        <thead>
                            <tr>
                                <th>NAME</th>
                                <th>MASTER TYPE</th>
                                <th>DESCRIPTION</th>
                                <th>PARENT NAME</th>
                                <th>STATUS</th>
                                <th>ACTION</th>
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

    
</body>
</html>