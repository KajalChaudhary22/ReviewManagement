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

        document.querySelectorAll('#addNewBusinessBtn, #addBusinessBtn').forEach(button => {
            button.addEventListener('click', () => openModal('addBusinessModal'));
        });
        document.getElementById('saveBusiness')?.addEventListener('click', function() {
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

        // ===================================================================
        // FIXED: View Details Functionality (Full Detail Generation)
        // ===================================================================
        document.querySelectorAll('.action-btn.view, .view-business, .view-review').forEach(button => {
            button.addEventListener('click', function() {
                const detailsModalTitle = document.getElementById('detailsModalTitle');
                const detailsModalContent = document.getElementById('detailsModalContent');
                let title = '';
                let content = '';

                // (Logic for generating detailed modal content from previous answer)
                // This part is correct and remains unchanged.
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

        // ===================================================================
        // NEWLY ADDED: Edit Button Functionality
        // ===================================================================
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
                        `Edit functionality for "${itemName}" would open an edit form in a real application.`);
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
        // (Filter logic remains the same)
        document.getElementById('applyUserFilters')?.addEventListener('click', function() {
            /* ... filter logic ... */ });
        document.getElementById('applyBusinessFilters')?.addEventListener('click', function() {
            /* ... filter logic ... */ });
        document.getElementById('applyReviewFilters')?.addEventListener('click', function() {
            /* ... filter logic ... */ });

        // ===================================================================
        // NEWLY ADDED: Analytics Chart Buttons Functionality
        // ===================================================================
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