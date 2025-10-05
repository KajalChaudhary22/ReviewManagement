<script>
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
</script>
