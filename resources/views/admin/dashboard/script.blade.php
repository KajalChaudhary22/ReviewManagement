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