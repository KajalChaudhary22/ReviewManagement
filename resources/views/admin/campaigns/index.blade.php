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

    
</body>
</html>