@include('layouts.commonjs')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Menu Navigation
        const menuItems = document.querySelectorAll('.menu-item');
        const contentSections = document.querySelectorAll('.content-section');

        menuItems.forEach(item => {
            item.addEventListener('click', function () {
                // Remove active class from all menu items
                menuItems.forEach(i => i.classList.remove('active'));
                // Add active class to clicked item
                this.classList.add('active');

                // Hide all content sections
                contentSections.forEach(section => section.classList.remove('active'));

                // Show the selected content section
                const contentId = this.getAttribute('data-content') + '-content';
                document.getElementById(contentId).classList.add('active');

                // Close mobile sidebar if open
                document.querySelector('.sidebar').classList.remove('active');

                // Scroll to top of content
                document.querySelector('.content').scrollTo(0, 0);
            });
        });

        // Mobile Menu Toggle
        const menuToggle = document.querySelector('.menu-toggle');
        const sidebar = document.querySelector('.sidebar');

        menuToggle.addEventListener('click', function () {
            sidebar.classList.toggle('active');
        });

        // Check screen size and show/hide menu toggle accordingly
        function checkScreenSize() {
            if (window.innerWidth <= 576) {
                menuToggle.classList.remove('hidden');
                sidebar.classList.remove('active');
            } else {
                menuToggle.classList.add('hidden');
                if (window.innerWidth <= 992) {
                    sidebar.classList.add('active');
                } else {
                    sidebar.classList.remove('active');
                }
            }
        }

        // Initial check
        checkScreenSize();

        // Add resize event listener
        window.addEventListener('resize', checkScreenSize);

        // Modal functionality
        const modals = document.querySelectorAll('.modal');
        const modalCloseButtons = document.querySelectorAll('.modal-close, .btn-secondary[id^="cancel"], .btn-secondary[id^="close"]');

        function openModal(modalId) {
            document.getElementById(modalId).style.display = 'flex';
            document.body.style.overflow = 'hidden';
        }

        function closeModal(modalId) {
            document.getElementById(modalId).style.display = 'none';
            document.body.style.overflow = 'auto';
        }

        // Close modal when clicking on X or cancel button
        modalCloseButtons.forEach(button => {
            button.addEventListener('click', function () {
                const modal = this.closest('.modal');
                closeModal(modal.id);
            });
        });

        // Close modal when clicking outside modal content
        modals.forEach(modal => {
            modal.addEventListener('click', function (e) {
                if (e.target === this) {
                    closeModal(this.id);
                }
            });
        });

        // Add New User functionality
        const addUserButtons = document.querySelectorAll('#addNewUserBtn, #addUserBtn');
        const addUserModal = document.getElementById('addUserModal');
        const saveUserBtn = document.getElementById('saveUser');

        addUserButtons.forEach(button => {
            button.addEventListener('click', function () {
                openModal('addUserModal');
            });
        });

        saveUserBtn.addEventListener('click', function () {
            // In a real app, you would validate and save the user
            const userName = document.getElementById('userName').value;
            const userEmail = document.getElementById('userEmail').value;
            const userPhone = document.getElementById('userPhone').value;
            // const userType = document.getElementById('userType').value;
            const userPassword = document.getElementById('userPassword').value;

            // if (!userName || !userEmail || !userType || !userPassword) {
            if (!userName || !userEmail || !userPassword) {
                Swal.fire({
                    icon: 'error',
                    title: 'Validation Error',
                    text: 'Please fill out all required fields.'
                });
                return;
            }

            const endpoint = `/api/admin/addUser`; // Adjust endpoint based on user type

            fetch(endpoint, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json'
                },
                body: JSON.stringify({
                    name: userName,
                    email: userEmail,
                    phone: userPhone,
                    password: userPassword,
                    // user_type: userType // Assuming userType is a string like 'customer', 'business', or 'admin'
                })
            })
                .then(async (response) => {
                    const res = await response.json();
                    if (!response.ok) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Registration Failed',
                            text: res.message || 'Something went wrong.'
                        });
                    } else {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: res.message || 'User add successfully!',
                            timer: 2500,
                            showConfirmButton: false
                        });

                        // Reset form and close modal
                        document.getElementById('userForm').reset();
                        closeModal('addUserModal');
                    }
                })
                .catch((error) => {
                    console.error('API Error:', error);
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Failed to connect to server.'
                    });
                });


            closeModal('addUserModal');
            document.getElementById('userForm').reset();
        });


        // Add New Business functionality
        const addBusinessButtons = document.querySelectorAll('#addNewBusinessBtn, #addBusinessBtn');
        const addBusinessModal = document.getElementById('addBusinessModal');
        const saveBusinessBtn = document.getElementById('saveBusiness');

        addBusinessButtons.forEach(button => {
            button.addEventListener('click', function () {
                openModal('addBusinessModal');
            });
        });

        saveBusinessBtn.addEventListener('click', function () {
            // In a real app, you would validate and save the business
            const businessName = document.getElementById('businessName').value;
            const businessCategory = document.getElementById('businessCategory').value;
            const businessLocation = document.getElementById('businessLocation').value;
            const businessEmail = document.getElementById('businessEmail').value;
            const businessPhone = document.getElementById('businessPhone').value;

            if (!businessName || !businessEmail || !businessPhone || !businessCategory || !businessLocation) {
                Swal.fire({
                    icon: 'error',
                    title: 'Validation Error',
                    text: 'Please fill out all required fields.'
                });
                return;
            }

            const endpoint = `/api/admin/addBusiness`;

            fetch(endpoint, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json'
                },
                body: JSON.stringify({
                    name: businessName,
                    email: businessEmail,
                    phone: businessPhone,
                })
            })
                .then(async (response) => {
                    const res = await response.json();
                    if (!response.ok) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Registration Failed',
                            text: res.message || 'Something went wrong.'
                        });
                    } else {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: res.message || 'User add successfully!',
                            timer: 2500,
                            showConfirmButton: false
                        });

                        // Reset form and close modal
                        document.getElementById('userForm').reset();
                        closeModal('addUserModal');
                    }
                })
                .catch((error) => {
                    console.error('API Error:', error);
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Failed to connect to server.'
                    });
                });

            closeModal('addBusinessModal');
            document.getElementById('businessForm').reset();
        });

        // View Details functionality
        const viewButtons = document.querySelectorAll('.action-btn.view, .view-business, .view-review');
        const detailsModal = document.getElementById('detailsModal');
        const detailsModalTitle = document.getElementById('detailsModalTitle');
        const detailsModalContent = document.getElementById('detailsModalContent');

        viewButtons.forEach(button => {
            button.addEventListener('click', function () {
                let title = '';
                let content = '';

                if (this.classList.contains('view-business')) {
                    const businessName = this.closest('.approval-card').querySelector('.approval-title').textContent;
                    const businessMeta = this.closest('.approval-card').querySelector('.approval-meta').textContent;

                    title = `Business: ${businessName}`;
                    content = `
                            <div style="margin-bottom: 15px;">
                                <h3 style="margin-bottom: 8px;">${businessName}</h3>
                                <p style="color: var(--text-light); margin-bottom: 12px;">${businessMeta}</p>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam auctor, nisl eget ultricies tincidunt, nisl nisl aliquam nisl, eget ultricies nisl nisl eget nisl.</p>
                            </div>
                            <div>
                                <h4 style="margin-bottom: 8px;">Contact Information</h4>
                                <p><strong>Email:</strong> contact@${businessName.toLowerCase().replace(/\s+/g, '')}.com</p>
                                <p><strong>Phone:</strong> (555) 123-4567</p>
                                <p><strong>Address:</strong> 123 Business St, City, Country</p>
                            </div>
                        `;
                } else if (this.classList.contains('view-review')) {
                    const reviewUser = this.closest('.review-card').querySelector('.review-user').textContent;
                    const reviewTime = this.closest('.review-card').querySelector('.review-time').textContent;
                    const reviewStars = this.closest('.review-card').querySelector('.review-stars').textContent;
                    const reviewText = this.closest('.review-card').querySelector('.review-text').textContent;

                    title = `Review by ${reviewUser}`;
                    content = `
                            <div style="margin-bottom: 15px;">
                                <p style="color: var(--text-light); margin-bottom: 5px;">${reviewTime}</p>
                                <div style="color: #FFC107; font-size: 1.1rem; margin-bottom: 8px;">${reviewStars}</div>
                                <p style="line-height: 1.6;">${reviewText}</p>
                            </div>
                            <div>
                                <h4 style="margin-bottom: 8px;">Additional Information</h4>
                                <p><strong>Business:</strong> ${reviewTime.split('For: ')[1].split(' • ')[0]}</p>
                                <p><strong>Review ID:</strong> #REV-${Math.floor(1000 + Math.random() * 9000)}</p>
                            </div>
                        `;
                } else {
                    // Regular user view
                    const userName = this.closest('tr').querySelector('td:nth-child(2)').textContent;
                    const userEmail = this.closest('tr').querySelector('td:nth-child(3)').textContent;
                    const userPhone = this.closest('tr').querySelector('td:nth-child(4)').textContent;
                    const userType = this.closest('tr').querySelector('td:nth-child(5)').textContent;
                    const userStatus = this.closest('tr').querySelector('.status-badge').textContent;

                    title = `User: ${userName}`;
                    content = `
                            <div style="display: flex; gap: 15px; margin-bottom: 15px;">
                                <div style="width: 60px; height: 60px; border-radius: 50%; background-color: #f0f0f0; display: flex; align-items: center; justify-content: center; font-size: 1.5rem;">
                                    ${userName.charAt(0)}
                                </div>
                                <div>
                                    <h3 style="margin-bottom: 5px;">${userName}</h3>
                                    <p style="color: var(--text-light); margin-bottom: 5px;">${userEmail}</p>
                                    <span class="status-badge ${userStatus.toLowerCase() === 'active' ? 'status-active' : userStatus.toLowerCase() === 'pending' ? 'status-pending' : 'status-suspended'}">${userStatus}</span>
                                </div>
                            </div>
                            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 12px; margin-bottom: 15px;">
                                <div>
                                    <p style="color: var(--text-light); margin-bottom: 5px;">Phone</p>
                                    <p>${userPhone}</p>
                                </div>
                                <div>
                                    <p style="color: var(--text-light); margin-bottom: 5px;">User Type</p>
                                    <p>${userType}</p>
                                </div>
                                <div>
                                    <p style="color: var(--text-light); margin-bottom: 5px;">Registration Date</p>
                                    <p>Dec ${Math.floor(10 + Math.random() * 10)}, 2023</p>
                                </div>
                                <div>
                                    <p style="color: var(--text-light); margin-bottom: 5px;">Last Active</p>
                                    <p>${Math.random() > 0.3 ? 'Today' : 'Yesterday'}</p>
                                </div>
                            </div>
                        `;
                }

                detailsModalTitle.textContent = title;
                detailsModalContent.innerHTML = content;
                openModal('detailsModal');
            });
        });

        // Edit functionality
        const editButtons = document.querySelectorAll('.action-btn.edit');

        editButtons.forEach(button => {
            button.addEventListener('click', function () {
                const userName = this.closest('tr').querySelector('td:nth-child(2)').textContent;
                alert(`Edit functionality for "${userName}" would open an edit form in a real application.`);
            });
        });

        // Status change functionality (Suspend/Activate/Reject)
        const statusButtons = document.querySelectorAll('.action-btn.suspend, .action-btn.activate, .action-btn.reject, .approve-business, .reject-business, .approve-review, .reject-review');

        statusButtons.forEach(button => {
            button.addEventListener('click', function () {
                let itemName = '';
                let action = '';

                if (this.classList.contains('approve-business') || this.classList.contains('reject-business')) {
                    itemName = this.closest('.approval-card').querySelector('.approval-title').textContent;
                    action = this.classList.contains('approve-business') ? 'approve' : 'reject';
                } else if (this.classList.contains('approve-review') || this.classList.contains('reject-review')) {
                    itemName = this.closest('.review-card').querySelector('.review-user').textContent + "'s review";
                    action = this.classList.contains('approve-review') ? 'approve' : 'reject';
                } else {
                    itemName = this.closest('tr').querySelector('td:nth-child(2)').textContent;
                    action = this.classList.contains('suspend') ? 'suspend' :
                        this.classList.contains('activate') ? 'activate' : 'reject';
                }

                if (confirm(`Are you sure you want to ${action} ${itemName}?`)) {
                    alert(`Successfully ${action}d ${itemName}`);

                    // In a real app, you would update the UI or make an API call
                    if (this.classList.contains('approve-business') || this.classList.contains('reject-business') ||
                        this.classList.contains('approve-review') || this.classList.contains('reject-review')) {
                        this.closest('.approval-card, .review-card').style.opacity = '0';
                        setTimeout(() => {
                            this.closest('.approval-card, .review-card').remove();
                        }, 300);
                    }
                }
            });
        });

        // Filter functionality
        function applyFilters(tableId, searchId, filters) {
            const table = document.getElementById(tableId);
            const searchInput = document.getElementById(searchId).value.toLowerCase();
            const rows = table.querySelectorAll('tbody tr');

            rows.forEach(row => {
                let showRow = true;
                const rowText = row.textContent.toLowerCase();

                // Apply search filter
                if (searchInput && !rowText.includes(searchInput)) {
                    showRow = false;
                }

                // Apply other filters
                for (const [filterName, filterValue] of Object.entries(filters)) {
                    if (filterValue && filterValue !== 'all') {
                        const rowValue = row.getAttribute(`data-${filterName}`);
                        if (rowValue && rowValue !== filterValue) {
                            showRow = false;
                        }
                    }
                }

                row.style.display = showRow ? '' : 'none';
            });
        }

        // User filters
        document.getElementById('applyUserFilters').addEventListener('click', function () {
            const filters = {
                status: document.getElementById('userStatusFilter').value,
                date: document.getElementById('userDateFilter').value
            };
            applyFilters('usersTable', 'userSearch', filters);
        });

        // Business filters
        document.getElementById('applyBusinessFilters').addEventListener('click', function () {
            const filters = {
                status: document.getElementById('businessStatusFilter').value,
                category: document.getElementById('businessCategoryFilter').value,
                location: document.getElementById('businessLocationFilter').value
            };
            applyFilters('businessesTable', 'businessSearch', filters);
        });

        // Review filters
        document.getElementById('applyReviewFilters').addEventListener('click', function () {
            const searchInput = document.getElementById('reviewSearch').value.toLowerCase();
            const statusFilter = document.getElementById('reviewStatusFilter').value;
            const ratingFilter = document.getElementById('reviewRatingFilter').value;
            const reviews = document.querySelectorAll('#reviewsList .review-card');

            reviews.forEach(review => {
                let showReview = true;
                const reviewText = review.textContent.toLowerCase();

                // Apply search filter
                if (searchInput && !reviewText.includes(searchInput)) {
                    showReview = false;
                }

                // Apply status filter
                if (statusFilter !== 'all' && review.getAttribute('data-status') !== statusFilter) {
                    showReview = false;
                }

                // Apply rating filter
                if (ratingFilter !== 'all' && review.getAttribute('data-rating') !== ratingFilter) {
                    showReview = false;
                }

                review.style.display = showReview ? '' : 'none';
            });
        });

        // Analytics filters
        document.getElementById('applyAnalyticsFilters').addEventListener('click', function () {
            const dateRange = document.getElementById('dateRange').value;

            // These values would normally come from an API
            const data = {
                '7': { users: 85, businesses: 42, reviews: 320, revenue: 12500, change: 5 },
                '30': { users: 247, businesses: 132, reviews: 1245, revenue: 42380, change: 15 },
                '90': { users: 685, businesses: 342, reviews: 3520, revenue: 118500, change: 22 },
                '365': { users: 2543, businesses: 1832, reviews: 12450, revenue: 485200, change: 35 }
            };

            const selectedData = data[dateRange] || data['30'];

            document.getElementById('newUsersCount').textContent = selectedData.users;
            document.getElementById('newBusinessesCount').textContent = selectedData.businesses;
            document.getElementById('newReviewsCount').textContent = selectedData.reviews.toLocaleString();
            document.getElementById('revenueCount').textContent = '$' + selectedData.revenue.toLocaleString();

            document.querySelectorAll('.stat-change span').forEach(span => {
                span.textContent = selectedData.change;
            });
        });

        // Analytics chart buttons
        const chartButtons = document.querySelectorAll('.chart-actions button');
        chartButtons.forEach(button => {
            button.addEventListener('click', function () {
                // Remove primary class from all buttons in this group
                this.parentNode.querySelectorAll('button').forEach(btn => {
                    btn.classList.remove('btn-primary');
                    btn.classList.add('btn-secondary');
                });

                // Add primary class to clicked button
                this.classList.remove('btn-secondary');
                this.classList.add('btn-primary');

                // In a real app, you would update the chart here
                const chartType = this.getAttribute('data-chart');
                console.log(`Switched to ${chartType} view`);
            });
        });

        // Export buttons
        const exportButtons = document.querySelectorAll('[id^="export"]');
        exportButtons.forEach(button => {
            button.addEventListener('click', function () {
                const exportType = this.id.includes('Users') ? 'Users' :
                    this.id.includes('Businesses') ? 'Businesses' :
                        this.id.includes('Reviews') ? 'Reviews' :
                            this.id.includes('Queries') ? 'Queries' : 'Campaigns';
                alert(`Exporting ${exportType} data as CSV`);
            });
        });

        // Generate Report buttons
        const generateReportButtons = document.querySelectorAll('[id^="generateReport"]');
        generateReportButtons.forEach(button => {
            button.addEventListener('click', function () {
                alert('Generating comprehensive report... This would download a PDF in a real application.');
            });
        });

        // Settings functionality
        const saveSettingsBtn = document.getElementById('saveSettings');
        const cancelSettingsBtn = document.getElementById('cancelSettings');

        saveSettingsBtn.addEventListener('click', function () {
            const theme = document.getElementById('dashboardTheme').value;
            const defaultPage = document.getElementById('defaultPage').value;
            const resultsPerPage = document.getElementById('resultsPerPage').value;

            // Apply theme (simplified example)
            if (theme === 'dark') {
                document.body.style.backgroundColor = '#1A1A1A';
                document.body.style.color = '#FFFFFF';
            } else if (theme === 'light') {
                document.body.style.backgroundColor = '#FFFFFF';
                document.body.style.color = '#333333';
            } else {
                // Reset to default
                document.body.style.backgroundColor = '';
                document.body.style.color = '';
            }

            // Show success message
            alert('Settings saved successfully!');

            // In a real app, you would save these to localStorage or send to server
            console.log('Saved settings:', {
                theme,
                defaultPage,
                resultsPerPage,
                notifications: {
                    user: document.getElementById('notifUser').checked,
                    business: document.getElementById('notifBusiness').checked,
                    review: document.getElementById('notifReview').checked,
                    system: document.getElementById('notifSystem').checked,
                    method: document.getElementById('notifEmail').checked ? 'email' : 'in-app'
                }
            });
        });

        cancelSettingsBtn.addEventListener('click', function () {
            // Reset form to default values
            document.getElementById('dashboardTheme').value = 'red-black';
            document.getElementById('defaultPage').value = 'dashboard';
            document.getElementById('resultsPerPage').value = '25';
            document.getElementById('notifUser').checked = true;
            document.getElementById('notifBusiness').checked = true;
            document.getElementById('notifReview').checked = true;
            document.getElementById('notifSystem').checked = false;
            document.getElementById('notifInApp').checked = true;
        });

        // Queries Tab Switching
        document.querySelectorAll('[data-tab]').forEach(tab => {
            tab.addEventListener('click', function () {
                const tabId = this.getAttribute('data-tab');

                // Update active tab button
                document.querySelectorAll('[data-tab]').forEach(t => {
                    t.classList.remove('btn-primary');
                    t.classList.add('btn-secondary');
                });
                this.classList.remove('btn-secondary');
                this.classList.add('btn-primary');

                // Show selected tab content
                document.querySelectorAll('.queries-tab-content').forEach(content => {
                    content.classList.remove('active');
                });
                document.getElementById(`${tabId}-tab`).classList.add('active');
            });
        });

        // Campaign Modal Toggle
        document.getElementById('createCampaignBtn').addEventListener('click', function () {
            openModal('createCampaignModal');
        });

        // Recipient Type Toggle
        document.getElementById('recipientType').addEventListener('change', function () {
            document.getElementById('categorySelection').style.display =
                this.value === 'category' ? 'block' : 'none';
        });

        // Schedule Toggle
        document.getElementById('campaignSchedule').addEventListener('change', function () {
            document.getElementById('scheduleDateGroup').style.display =
                this.value === 'schedule' ? 'block' : 'none';
        });

        // Save Campaign
        document.getElementById('saveCampaign').addEventListener('click', function () {
            alert('Campaign saved successfully!');
            closeModal('createCampaignModal');
        });

        // Send Campaign
        document.getElementById('sendCampaign').addEventListener('click', function () {
            if (confirm('Are you sure you want to send this campaign now?')) {
                alert('Campaign sent successfully!');
                closeModal('createCampaignModal');
            }
        });

        // Campaign filters
        document.getElementById('applyCampaignFilters').addEventListener('click', function () {
            const searchInput = document.getElementById('campaignSearch').value.toLowerCase();
            const statusFilter = document.getElementById('campaignStatusFilter').value;
            const dateFilter = document.getElementById('campaignDateFilter').value;
            const rows = document.querySelectorAll('#campaignsTable tbody tr');

            rows.forEach(row => {
                let showRow = true;
                const rowText = row.textContent.toLowerCase();

                // Apply search filter
                if (searchInput && !rowText.includes(searchInput)) {
                    showRow = false;
                }

                // Apply status filter
                if (statusFilter !== 'all') {
                    const status = row.querySelector('.status-badge').textContent.toLowerCase();
                    if (statusFilter === 'sent' && status !== 'sent') {
                        showRow = false;
                    } else if (statusFilter === 'scheduled' && status !== 'scheduled') {
                        showRow = false;
                    } else if (statusFilter === 'draft' && status !== 'draft') {
                        showRow = false;
                    }
                }

                // Apply date filter (simplified example)
                if (dateFilter !== 'all') {
                    // In a real app, you would compare dates
                }

                row.style.display = showRow ? '' : 'none';
            });
        });
    });
</script>