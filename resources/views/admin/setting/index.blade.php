<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Settings - SCIZORA-Admin</title>
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
            <div id="settings-content" class="content-section">
                <div class="content-header">
                    <h1 class="page-title">System Settings</h1>
                </div>

                <div class="table-container">
                    <div style="padding: 15px;">
                        <h2 style="margin-bottom: 15px; color: var(--black);">Admin Preferences</h2>

                        <div style="display: grid; grid-template-columns: 1fr; gap: 20px;">
                            <div>
                                <input type="hidden" id="setting_id" value="{{ isset($adminPreferences) ? $adminPreferences->id : '' }}" name="id">


                                <div class="form-group">
                                    <label class="form-label">Results Per Page</label>
                                    <select class="form-control" id="resultsPerPage" name="results_per_page">
                                        <option value="10" {{ (isset($adminPreferences) && $adminPreferences->results_per_page == 10) ? 'selected' : '' }}>10</option>
                                        <option value="25" {{ (!isset($adminPreferences) || $adminPreferences->results_per_page == 25) ? 'selected' : '' }}>25 (Default)</option>
                                        <option value="50" {{ (isset($adminPreferences) && $adminPreferences->results_per_page == 50) ? 'selected' : '' }}>50</option>
                                        <option value="100" {{ (isset($adminPreferences) && $adminPreferences->results_per_page == 100) ? 'selected' : '' }}>100</option>
                                    </select>
                                </div>
                            </div>

                            <div>
                                <div class="form-group">
                                    <label class="form-label">Notification Preferences</label>
                                    <div style="display: flex; flex-direction: column; gap: 8px;">
                                        <label>
                                            <input type="checkbox" id="notifUser"
                                                {{ (isset($adminPreferences) && $adminPreferences->notif_user) ? 'checked' : '' }}>
                                            New User Signups
                                        </label>
                                        <label>
                                            <input type="checkbox" id="notifBusiness"
                                                {{ (isset($adminPreferences) && $adminPreferences->notif_business) ? 'checked' : '' }}>
                                            Business Approvals
                                        </label>
                                        <label>
                                            <input type="checkbox" id="notifReview"
                                                {{ (isset($adminPreferences) && $adminPreferences->notif_review) ? 'checked' : '' }}>
                                            Pending Reviews
                                        </label>
                                    </div>
                                </div>
                                

                                <div class="form-group">
                                    <label class="form-label">Notification Method</label>
                                    <div style="display: flex; flex-direction: column; gap: 8px;">
                                        <label>
                                            <input type="radio" name="notification" id="notifEmail" value="email"
                                                {{ (isset($adminPreferences) && $adminPreferences->notification_method == 1) ? 'checked' : '' }}>
                                            Email Notifications
                                        </label>
                                
                                       
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div
                            style="margin-top: 20px; display: flex; justify-content: flex-end; gap: 8px; flex-wrap: wrap;">
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


    @include('layouts.commonjs')
    <script>
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
                    sidebar.classList.remove('active');
                }
            }

            checkScreenSize();
            window.addEventListener('resize', checkScreenSize);


            document.getElementById('saveSettings').addEventListener('click', function() {
                let payload = {
                    results_per_page: document.getElementById("resultsPerPage").value,
                    notif_user: document.getElementById("notifUser").checked ? 1 : 0,
                    notif_business: document.getElementById("notifBusiness").checked ? 1 : 0,
                    notif_review: document.getElementById("notifReview").checked ? 1 : 0,
                    notification_method: document.getElementById("notifEmail").checked ? 1 : 0,
                    id: document.getElementById("setting_id").value,
                };

                fetch("/api/admin/save-setting", {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                            "Authorization": "Bearer " + localStorage.getItem(
                                "token") // if you’re using Sanctum/JWT
                        },
                        body: JSON.stringify(payload)
                    })
                    .then(res => res.json())
                    .then(res => {
                        if (res.status) {
                            Swal.fire("Saved!", res.message, "success");
                        } else {
                            Swal.fire("Error", res.message, "error");
                        }
                    })
                    .catch(() => {
                        Swal.fire("Error", "Server not reachable.", "error");
                    });
            });


        });
    </script>
</body>

</html>
