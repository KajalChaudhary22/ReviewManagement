<script>
    $(document).ready(function () {
        // Update Email
        $('#update-email-form').on('submit', function (e) {
            e.preventDefault();

            $.ajax({

                url: "/api/customer/update-email",
                method: "POST",
                data: $(this).serialize(),
                success: function (response) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: response.message,
                        timer: 2000,
                        showConfirmButton: false
                    });
                },
                error: function (xhr) {
                    if (xhr.responseJSON && xhr.responseJSON.errors) {
                        let errors = Object.values(xhr.responseJSON.errors).flat().join("\n");
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: errors
                        });
                    }
                }
            });
        });

        // Update Password
        $('#update-password-form').on('submit', function (e) {
            e.preventDefault();

            $.ajax({
                url: "/api/customer/update-password",
                method: "POST",
                data: $(this).serialize(),
                success: function (response) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: response.message,
                        timer: 2000,
                        showConfirmButton: false
                    });
                    $('#update-password-form')[0].reset(); // clear form
                },
                error: function (xhr) {
                    if (xhr.responseJSON) {
                        // Check if custom message (like incorrect password)
                        if (xhr.responseJSON.message) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: xhr.responseJSON.message
                            });
                        }
                        // Validation errors (Laravel)
                        else if (xhr.responseJSON.errors) {
                            let errors = Object.values(xhr.responseJSON.errors).flat().join("\n");
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: errors
                            });
                        }
                    }
                }
            });
        });
        
        // Update Email Notifications
        $('#email-notifications').on('change', function () {
            let isChecked = $(this).is(':checked') ? 1 : 0;

            $.ajax({
                url: "/api/customer/update-notifications",
                method: "POST",
                data: {
                    email_notifications: isChecked,
                    _token: $('meta[name="csrf-token"]').attr('content') // CSRF token
                },
                success: function (response) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Updated',
                        text: response.message,
                        timer: 2000,
                        showConfirmButton: false
                    });
                },
                error: function (xhr) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: xhr.responseJSON?.message || 'Something went wrong!'
                    });
                }
            });
        });

    });
</script>