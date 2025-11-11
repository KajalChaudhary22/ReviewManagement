{{-- <script>
    $(document).ready(function() {
        $('#dateRange').on('change', function() {
            if ($(this).val() === 'custom') {
                $('#fromDate, #toDate').prop('disabled', false).attr('required', true);
            } else {
                $('#fromDate, #toDate').prop('disabled', true).removeAttr('required').val('');
            }
        });
        $('#applyAnalyticsFilters').on('click', function() {
            let dateRange = $('#dateRange').val();
            let fromDate = $('#fromDate').val();
            let toDate = $('#toDate').val();

            // validation for custom range
            if (dateRange === 'custom' && (!fromDate || !toDate)) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Missing Dates',
                    text: 'Please select both From Date and To Date.',
                    confirmButtonText: 'OK'
                });
                return;
            }

            $.ajax({
                url: '/api/admin/analytics-data',
                method: 'GET',
                data: {
                    dateRange: dateRange,
                    fromDate: fromDate,
                    toDate: toDate
                },
                beforeSend: function() {
                    Swal.fire({
                        title: 'Loading...',
                        text: 'Fetching analytics data',
                        allowOutsideClick: false,
                        didOpen: () => {
                            Swal.showLoading();
                        }
                    });
                },
                success: function(res) {
                    Swal.close(); // close loader

                    // ✅ Update stats
                    $('.stat-value[data-type="users"]').text(res.totalCustomers);
                    $('.stat-value[data-type="businesses"]').text(res.totalBusinesses);
                    $('.stat-value[data-type="reviews"]').text(res.totalReviews);
                    $('#revenueCount').text(`$${res.totalRevenue}`);

                    // ✅ Update Review Activity
                    updateReviewChart(res.reviewActivity);

                    // ✅ Update Business Metrics
                    updateBusinessChart(res.businessMetrics);

                    Swal.fire({
                        icon: 'success',
                        title: 'Filters Applied',
                        text: 'Analytics updated successfully!',
                        timer: 1500,
                        showConfirmButton: false
                    });
                },
                error: function() {
                    Swal.close();
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Something went wrong while fetching analytics data.'
                    });
                }
            });
        });

        function updateReviewChart(data) {
            // suppose data = { 5:45, 4:20, 3:15, 2:12, 1:8 }
            let total = Object.values(data).reduce((a, b) => a + b, 0);
            $('.pie-chart-center').text(total);

            // update legend dynamically
            let colors = ['#4A89DC', '#5D9CEC', '#48CFAD', '#A0D468', '#FFCE54'];
            let stars = [5, 4, 3, 2, 1];
            $('.chart-legend').empty();

            stars.forEach((s, i) => {
                $('.chart-legend').append(`
            <div class="chart-legend-item">
                <div class="chart-legend-color" style="background:${colors[i]}"></div>
                <span>${s} Stars (${data[s]}%)</span>
            </div>
        `);
            });
        }

        function updateBusinessChart(data) {
            // suppose data = { US:25, UK:42, CA:30, AU:18, IN:12, Other:5 }
            let container = $('#businessChart .chart-bars');
            container.empty();

            Object.entries(data).forEach(([loc, val]) => {
                let height = Math.min(100, val); // scale properly
                container.append(`
            <div class="chart-bar-container">
                <div class="chart-bar" style="height:${height}%; background-color:#4A89DC;">
                    <span class="chart-bar-value">${val}</span>
                </div>
                <div class="chart-bar-label">${loc}</div>
            </div>
        `);
            });
        }


    });
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

        // Logout functionality
        const logoutBtn = document.querySelector('.logout-btn');
        if (logoutBtn) {
            logoutBtn.addEventListener('click', function() {
                if (confirm('Are you sure you want to log out?')) {
                    alert('You have been logged out successfully.');
                    // In a real application, you would redirect to the login page
                    // window.location.href = 'login.html';
                }
            });
        }

        // --- Modal Functionality ---
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

        // --- Add New User/Business Modals ---
        document.querySelectorAll('#addNewUserBtn, #addUserBtn').forEach(button => {
            button.addEventListener('click', () => openModal('addUserModal'));
        });
        document.getElementById('saveUser')?.addEventListener('click', function() {
            const userName = document.getElementById('userName').value;
            alert(`User "${userName}" has been added successfully!`);
            closeModal('addUserModal');
            document.getElementById('userForm').reset();
        });

        document.querySelectorAll('#addNewBusinessBtn, #addBusinessBtn').forEach(button => {
            button.addEventListener('click', () => openModal('addBusinessModal'));
        });
        document.getElementById('saveBusiness')?.addEventListener('click', function() {
            const businessName = document.getElementById('businessName').value;
            alert(`Business "${businessName}" has been added successfully!`);
            closeModal('addBusinessModal');
            document.getElementById('businessForm').reset();
        });

        // View Details Functionality
        document.querySelectorAll('.action-btn.view, .view-business, .view-review').forEach(button => {
            button.addEventListener('click', function() {
                const detailsModalTitle = document.getElementById('detailsModalTitle');
                const detailsModalContent = document.getElementById('detailsModalContent');
                let title = '';
                let content = '';

                const row = this.closest('tr');
                if (row) {
                    const firstCellText = row.querySelector('td:first-child').textContent;
                    let userName, userEmail, userPhone, userType, userStatus;
                    if (firstCellText.startsWith('#USR-')) {
                        userName = row.querySelector('td:nth-child(2)').textContent;
                        userEmail = row.querySelector('td:nth-child(3)').textContent;
                        userPhone = row.querySelector('td:nth-child(4)').textContent;
                        userType = row.querySelector('td:nth-child(5)').textContent;
                    } else {
                        userName = row.querySelector('td:nth-child(1)').textContent;
                        userEmail = row.querySelector('td:nth-child(2)').textContent;
                        userPhone = '(555) 123-4567';
                        userType = 'Customer';
                    }
                    userStatus = row.querySelector('.status-badge').textContent;
                    title = `User: ${userName}`;
                    content =
                        `<div style="display: flex; gap: 15px; align-items: center; margin-bottom: 20px;"><div style="width: 60px; height: 60px; border-radius: 50%; background-color: var(--primary-color); display: flex; align-items: center; justify-content: center; font-size: 1.8rem; color: white; flex-shrink: 0;">${userName.charAt(0)}</div><div><h3 style="margin-bottom: 5px; color: var(--black);">${userName}</h3><p style="color: var(--text-light); margin-bottom: 5px;">${userEmail}</p><span class="status-badge ${userStatus.toLowerCase() === 'active' ? 'status-active' : userStatus.toLowerCase() === 'pending' ? 'status-pending' : 'status-suspended'}">${userStatus}</span></div></div><div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(150px, 1fr)); gap: 15px;"><div><p style="font-size: 0.8rem; color: var(--text-light); margin-bottom: 5px;">Phone</p><p style="font-weight: 500;">${userPhone}</p></div><div><p style="font-size: 0.8rem; color: var(--text-light); margin-bottom: 5px;">User Type</p><p style="font-weight: 500;">${userType}</p></div><div><p style="font-size: 0.8rem; color: var(--text-light); margin-bottom: 5px;">Registration Date</p><p style="font-weight: 500;">Dec ${Math.floor(10 + Math.random() * 10)}, 2023</p></div><div><p style="font-size: 0.8rem; color: var(--text-light); margin-bottom: 5px;">Last Active</p><p style="font-weight: 500;">${Math.random() > 0.3 ? 'Today' : 'Yesterday'}</p></div></div>`;
                }

                if (detailsModalTitle) detailsModalTitle.textContent = title;
                if (detailsModalContent) detailsModalContent.innerHTML = content;
                openModal('detailsModal');
            });
        });

        // Edit Button Functionality
        document.querySelectorAll('.action-btn.edit').forEach(button => {
            button.addEventListener('click', function() {
                const row = this.closest('tr');
                if (row) {
                    const firstCellText = row.querySelector('td:first-child').textContent;
                    let itemName = '';
                    if (firstCellText.startsWith('#USR-') || firstCellText.startsWith(
                            '#BUS-')) {
                        itemName = row.querySelector('td:nth-child(2)').textContent;
                    } else {
                        itemName = row.querySelector('td:nth-child(1)').textContent;
                    }
                    alert(
                        `Edit functionality for "${itemName}" would open an edit form in a real application.`
                    );
                } else {
                    alert('Edit functionality would be here.');
                }
            });
        });

        // --- Status Change Buttons (Suspend, Approve, etc.) ---
        document.querySelectorAll(
            '.action-btn.suspend, .action-btn.activate, .action-btn.reject, .approve-business, .reject-business, .approve-review, .reject-review'
        ).forEach(button => {
            button.addEventListener('click', function() {
                if (confirm('Are you sure you want to perform this action?')) {
                    alert('Action completed successfully!');
                    const card = this.closest('.approval-card, .review-card');
                    if (card) {
                        card.style.opacity = '0';
                        setTimeout(() => card.remove(), 300);
                    }
                }
            });
        });

        // --- Filter Functionality ---
        document.getElementById('applyUserFilters')?.addEventListener('click', function() {
            /* ... filter logic ... */
        });
        document.getElementById('applyBusinessFilters')?.addEventListener('click', function() {
            /* ... filter logic ... */
        });
        document.getElementById('applyReviewFilters')?.addEventListener('click', function() {
            /* ... filter logic ... */
        });

        // Analytics Chart Buttons Functionality
        document.querySelectorAll('.chart-actions button').forEach(button => {
            button.addEventListener('click', function() {
                // Remove primary class from sibling buttons
                this.parentNode.querySelectorAll('button').forEach(btn => {
                    btn.classList.remove('btn-primary');
                    btn.classList.add('btn-secondary');
                });

                // Add primary class to the clicked button
                this.classList.remove('btn-secondary');
                this.classList.add('btn-primary');

                const chartType = this.getAttribute('data-chart');
                console.log(
                    `Switched to ${chartType} view. In a real app, chart data would now be updated.`
                );
                // You would add chart-updating logic here
            });
        });

        // --- Other Functionalities (Export, Report, etc.) ---
        document.querySelectorAll('[id^="export"]').forEach(button => {
            button.addEventListener('click', () => alert('Exporting data...'));
        });
        document.querySelectorAll('[id^="generateReport"]').forEach(button => {
            button.addEventListener('click', () => alert('Generating report...'));
        });
        document.getElementById('saveSettings')?.addEventListener('click', () => alert('Settings saved!'));

    });
</script> --}}


{{-- <script>
    $(document).ready(function() {
        // ------------------------------
        // 📅 Date Range Filter Handling
        // ------------------------------
        $('#dateRange').on('change', function() {
            if ($(this).val() === 'custom') {
                $('#fromDate, #toDate').prop('disabled', false).attr('required', true);
            } else {
                $('#fromDate, #toDate').prop('disabled', true).removeAttr('required').val('');
            }
        });

        // ------------------------------
        // 📊 Apply Analytics Filters (AJAX)
        // ------------------------------
        $('#applyAnalyticsFilters').on('click', function() {
            let dateRange = $('#dateRange').val();
            let fromDate = $('#fromDate').val();
            let toDate = $('#toDate').val();

            // Validate custom range
            if (dateRange === 'custom' && (!fromDate || !toDate)) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Missing Dates',
                    text: 'Please select both From Date and To Date.',
                    confirmButtonText: 'OK'
                });
                return;
            }

            $.ajax({
                url: '/api/admin/analytics-data',
                method: 'GET',
                data: {
                    dateRange,
                    fromDate,
                    toDate
                },
                beforeSend: function() {
                    Swal.fire({
                        title: 'Loading...',
                        text: 'Fetching analytics data',
                        allowOutsideClick: false,
                        didOpen: () => {
                            Swal.showLoading();
                        }
                    });
                },
                success: function(res) {
                    Swal.close();

                    // ✅ Update Stats
                    $('.stat-value[data-type="users"]').text(res.totalCustomers);
                    $('.stat-value[data-type="businesses"]').text(res.totalBusinesses);
                    $('.stat-value[data-type="reviews"]').text(res.totalReviews);
                    $('#revenueCount').text(`$${res.totalRevenue}`);

                    // ✅ Update Charts
                    updateReviewChart(res.reviewActivity);
                    updateBusinessChart(res.businessMetrics);

                    Swal.fire({
                        icon: 'success',
                        title: 'Filters Applied',
                        text: 'Analytics updated successfully!',
                        timer: 1500,
                        showConfirmButton: false
                    });
                },
                error: function() {
                    Swal.close();
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Something went wrong while fetching analytics data.'
                    });
                }
            });
        });

        // ------------------------------
        // 🧩 Review Pie Chart
        // ------------------------------
        function updateReviewChart(data) {
            // Example: data = {5:45, 4:20, 3:15, 2:12, 1:8}
            let total = Object.values(data).reduce((a, b) => a + b, 0);
            $('.pie-chart-center').text(total);

            let colors = ['#4A89DC', '#5D9CEC', '#48CFAD', '#A0D468', '#FFCE54'];
            let stars = [5, 4, 3, 2, 1];
            $('.chart-legend').empty();

            stars.forEach((s, i) => {
                $('.chart-legend').append(`
                    <div class="chart-legend-item">
                        <div class="chart-legend-color" style="background:${colors[i]}"></div>
                        <span>${s} Stars (${data[s] || 0}%)</span>
                    </div>
                `);
            });
        }

        // ------------------------------
        // 🧭 Business Bar Chart
        // ------------------------------
        function updateBusinessChart(data) {
            alert('Updating Business Chart with new data.');
            console.log('Business Chart Data:', data);
            // Example: data = {US:25, UK:42, CA:30, AU:18, IN:12, Other:5}
            let container = $('#businessChart .chart-bars');
            container.empty();

            Object.entries(data).forEach(([loc, val]) => {
                let height = Math.min(100, val);
                container.append(`
                    <div class="chart-bar-container">
                        <div class="chart-bar" style="height:${height}%; background-color:#4A89DC;">
                            <span class="chart-bar-value">${val}</span>
                        </div>
                        <div class="chart-bar-label">${loc}</div>
                    </div>
                `);
            });
        }

        // ------------------------------
        // 🧭 Mobile Menu Toggle
        // ------------------------------
        const menuToggle = document.querySelector('.menu-toggle');
        const sidebar = document.querySelector('.sidebar');

        if (menuToggle) {
            menuToggle.addEventListener('click', function() {
                sidebar.classList.toggle('active');
            });
        }

        function checkScreenSize() {
            if (window.innerWidth <= 576) {
                menuToggle?.classList.remove('hidden');
                sidebar.classList.remove('active');
            } else {
                menuToggle?.classList.add('hidden');
                sidebar.classList.remove('active');
            }
        }

        checkScreenSize();
        window.addEventListener('resize', checkScreenSize);

        // ------------------------------
        // 🚪 Logout
        // ------------------------------
        $('.logout-btn').on('click', function() {
            Swal.fire({
                title: 'Confirm Logout',
                text: 'Are you sure you want to log out?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Yes, Logout'
            }).then(result => {
                if (result.isConfirmed) {
                    Swal.fire('Logged Out', 'You have been logged out successfully.', 'success');
                    // window.location.href = '/login';
                }
            });
        });

        // ------------------------------
        // 🪟 Modal Handling (Generic)
        // ------------------------------
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

        document.querySelectorAll('.modal-close, .btn-secondary[id^="cancel"], .btn-secondary[id^="close"]').forEach(button => {
            button.addEventListener('click', function() {
                const modal = this.closest('.modal');
                if (modal) closeModal(modal.id);
            });
        });

        document.querySelectorAll('.modal').forEach(modal => {
            modal.addEventListener('click', function(e) {
                if (e.target === this) closeModal(this.id);
            });
        });

        // ------------------------------
        // 👤 Add User / Business Modals
        // ------------------------------
        $('#addNewUserBtn, #addUserBtn').on('click', () => openModal('addUserModal'));
        $('#addNewBusinessBtn, #addBusinessBtn').on('click', () => openModal('addBusinessModal'));

        $('#saveUser').on('click', function() {
            const userName = $('#userName').val();
            Swal.fire('User Added', `User "${userName}" has been added successfully!`, 'success');
            closeModal('addUserModal');
            $('#userForm')[0].reset();
        });

        $('#saveBusiness').on('click', function() {
            const businessName = $('#businessName').val();
            Swal.fire('Business Added', `Business "${businessName}" has been added successfully!`, 'success');
            closeModal('addBusinessModal');
            $('#businessForm')[0].reset();
        });

        // ------------------------------
        // ✏️ Edit & Action Buttons
        // ------------------------------
        $('.action-btn.edit').on('click', function() {
            const row = $(this).closest('tr');
            const name = row.find('td:nth-child(2)').text();
            Swal.fire('Edit', `Edit form for "${name}" would appear here.`, 'info');
        });

        $('.action-btn.suspend, .action-btn.activate, .action-btn.reject').on('click', function() {
            Swal.fire({
                title: 'Are you sure?',
                text: 'This action cannot be undone!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, Continue'
            }).then(result => {
                if (result.isConfirmed) {
                    Swal.fire('Done!', 'Action completed successfully.', 'success');
                }
            });
        });

        // ------------------------------
        // 📊 Chart View Toggle
        // ------------------------------
        $('.chart-actions button').on('click', function() {
            $(this).siblings().removeClass('btn-primary').addClass('btn-secondary');
            $(this).removeClass('btn-secondary').addClass('btn-primary');
            const chartType = $(this).data('chart');
            console.log(`Switched to ${chartType} view.`);
        });

        // ------------------------------
        // 📁 Export / Report Buttons
        // ------------------------------
        $('[id^="export"]').on('click', () => Swal.fire('Export', 'Exporting data...', 'info'));
        $('[id^="generateReport"]').on('click', () => Swal.fire('Report', 'Generating report...', 'info'));
        $('#saveSettings').on('click', () => Swal.fire('Saved', 'Settings saved successfully!', 'success'));
    });
</script> --}}
<script>
    document.addEventListener("DOMContentLoaded", function() {

        const applyFiltersBtn = document.getElementById("applyAnalyticsFilters");

        // === UTILITY ===
        function getFilterParams() {
            return {
                dateRange: document.getElementById("dateRange").value,
                fromDate: document.getElementById("fromDate").value,
                toDate: document.getElementById("toDate").value
            };
        }
        // ==================== REVIEW CHART ====================
        function updateReviewChart(response, type) {
    const data = response.data || [];
    const container = document.querySelector(".pie-chart-center");
    const listContainer = document.querySelector(".review-list");

    if (!data.length) {
        container.textContent = "No data";
        if (listContainer) listContainer.innerHTML = "";
        return;
    }

    const total = response.total_reviews || 0;
    container.textContent = total.toLocaleString();

    // 🎨 Color palette for each segment
    const colors = [
        "#4A89DC", // Blue
        "#5D9CEC", // Light Blue
        "#48CFAD", // Teal
        "#A0D468", // Green
        "#FFCE54", // Yellow
        "#ED5565", // Red
        "#AC92EC", // Purple (for extra categories)
    ];

    if (listContainer) {
        listContainer.innerHTML = "";
        data.forEach((item, index) => {
            const label = item.label;
            const percentage = item.percentage || 0;
            const color = colors[index % colors.length];

            // Create legend item
            const legendItem = document.createElement("div");
            legendItem.classList.add("chart-legend-item", "d-flex", "align-items-center", "mb-1");

            legendItem.innerHTML = `
                <div class="chart-legend-color" 
                     style="background-color: ${color}; width: 16px; height: 16px; border-radius: 4px; margin-right: 8px;"></div>
                <span>${label}</span>
                <div class="chart-bar-bg" style="flex:1; height: 8px; background:#eee; margin-left:10px; border-radius:4px;">
                    <div class="chart-bar-fill" style="width:${percentage}%; height:8px; background:${color}; border-radius:4px;"></div>
                </div>
            `;

            listContainer.appendChild(legendItem);
        });
    }
}


        function loadReviewMetrics(type = 'overTime') {
            const dateRange = document.getElementById('dateRange')?.value || 30;
            const fromDate = document.getElementById('fromDate')?.value || '';
            const toDate = document.getElementById('toDate')?.value || '';

            fetch(
                    `/api/admin/analytics/reviews?type=${type}&dateRange=${dateRange}&from=${fromDate}&to=${toDate}`)
                .then(res => res.json())
                .then(response => {
                    console.log('Review Data:', response);
                    updateReviewChart(response, type);
                })
                .catch(err => console.error('Error loading review metrics:', err));
        }

        // === 3️⃣ BUSINESS CHART ===
        let activeBusinessChart = "businessLocation"; // default
        let activeReviewChart = "overTime"; // default



        function loadBusinessChart(type = "businessLocation") {
            const {
                dateRange,
                fromDate,
                toDate
            } = getFilterParams();
            fetch(
                    `/api/admin/analytics/business-metrics?type=${type}&dateRange=${dateRange}&from=${fromDate}&to=${toDate}`
                )
                .then(res => res.json())
                .then(data => updateBusinessChart(data, type))
                .catch(console.error);
        }

        function updateBusinessChart(data, type) {
            const chartBars = document.querySelector("#businessChart .chart-bars");
            chartBars.innerHTML = "";
            if (!data.length) {
                chartBars.innerHTML = `<p style="text-align:center;color:#999;">No business data</p>`;
                return;
            }

            data.forEach(item => {
                const value = item.total || 0;
                const label = type === "businessType" ? item.business_type : item.location_name;
                const barHeight = Math.min((value / data[0].total) * 100, 100);

                chartBars.insertAdjacentHTML("beforeend", `
                    <div class="chart-bar-container">
                        <div class="chart-bar" style="height: ${barHeight}%;">
                            <span class="chart-bar-value">${value}</span>
                        </div>
                        <div class="chart-bar-label">${label}</div>
                    </div>
                `);
            });

            document.getElementById("businessChartLabel").textContent =
                type === "businessType" ? "Businesses by Type" : "Businesses by Location";
        }
        // ==================== BUTTON HANDLERS ====================

        // 🟢 Review Filter Buttons
        document.querySelectorAll(".reviewFilter").forEach(btn => {
            btn.addEventListener("click", function() {
                document.querySelectorAll(".reviewFilter").forEach(b => {
                    b.classList.remove("btn-primary");
                    b.classList.add("btn-secondary");
                });
                this.classList.add("btn-primary");
                this.classList.remove("btn-secondary");
                activeReviewChart = this.dataset.chart;
                loadReviewMetrics(activeReviewChart);
            });
        });
        document.querySelectorAll(".businessFilter").forEach(btn => {
            btn.addEventListener("click", function() {
                document.querySelectorAll(".businessFilter").forEach(b => {
                    b.classList.remove("btn-primary");
                    b.classList.add("btn-secondary");
                });
                this.classList.add("btn-primary");
                this.classList.remove("btn-secondary");
                activeBusinessChart = this.dataset.chart;
                loadBusinessChart(activeBusinessChart);
            });
        });

        // === APPLY FILTERS (global refresh) ===
        applyFiltersBtn.addEventListener("click", function() {
            // loadUserChart();
            loadReviewMetrics(activeReviewChart);
            loadBusinessChart(activeBusinessChart);
        });

        // === DEFAULT LOAD (on page load) ===
        // loadUserChart();
        loadReviewMetrics(activeReviewChart);
        loadBusinessChart(activeBusinessChart);
    });
</script>
