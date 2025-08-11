<script>
    function openModal(id) {
        $(`#${id}`).fadeIn();
    }

    function closeModal(id) {
        $(`#${id}`).fadeOut();
    }

    $(document).on('click', '[data-close]', function() {
        closeModal($(this).data('close'));
    });
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        let table = $('#businessesTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: '/api/admin/business-list',
                data: function(d) {
                    d.status = $('#userStatusFilter').val();
                    d.date_range = $('#userDateFilter').val();
                    d.search_input = $('#userSearch').val();
                }
            },
            columns: [{
                    data: 'code',
                    name: 'code'
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'email',
                    name: 'email'
                },
                {
                    data: 'contact_number',
                    name: 'contact_number'
                },
                {
                    data: 'status_badge',
                    name: 'status',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'actions',
                    orderable: false,
                    searchable: false
                }
            ]
        });

        $('#applyBusinessFilters').on('click', function() {
            table.ajax.reload();
        });
        // VIEW USER DETAILS
        $('#businessesTable').on('click', '.action-btn.view', function() {
            let id = $(this).data('id');

            $.get(`/api/admin/user-view/${id}`, function(user) {
                // Fill Avatar
                $('#userAvatar').text(user.name ? user.name.charAt(0) : 'U');

                // Fill Basic Info
                $('#userName').text(user.name || 'N/A');
                $('#userEmail').text(user.email || 'N/A');

                // Status badge
                let statusClass = 'status-suspended';
                if (user.status && user.status.toLowerCase() === 'active') statusClass =
                    'status-active';
                else if (user.status && user.status.toLowerCase() === 'pending') statusClass =
                    'status-pending';
                $('#userStatusBadge')
                    .removeClass('status-active status-pending status-suspended')
                    .addClass(statusClass)
                    .text(user.status || 'Unknown');

                // Fill Other Details
                $('#userPhone').text(user.contact_number || 'N/A');
                $('#userType').text(user.type || 'N/A');
                $('#userRegistrationDate').text(
                    user.created_at ? new Date(user.created_at).toLocaleDateString(
                        'en-US', {
                            month: 'short',
                            day: 'numeric',
                            year: 'numeric'
                        }) : 'N/A'
                );
                $('#userLastActive').text(
                    user.last_active ? new Date(user.last_active).toLocaleDateString(
                        'en-US', {
                            month: 'short',
                            day: 'numeric',
                            year: 'numeric'
                        }) : 'Unknown'
                );

                // Show modal
                $('#detailsModal').fadeIn();
            }).fail(function() {
                showAlert('error', 'Failed to fetch user details.');
            });
        });



        $('#saveUser').on('click', function() {
            let formData = $('#userForm').serialize();

            $.ajax({
                url: '/api/admin/user-add',
                type: 'POST',
                data: formData,
                success: function(res) {
                    if (res.success) {
                        showAlert('success', res.message);
                        $('#addUserModal').hide();
                        $('#userForm')[0].reset();
                        table.ajax.reload();
                    } else {
                        showAlert('error', res.message || 'Something went wrong.');
                    }
                },
                error: function(xhr) {
                    let res = xhr.responseJSON;
                    if (res?.errors) {
                        Object.values(res.errors).flat().forEach(msg => showAlert('error',
                            msg));
                    } else if (res?.message) {
                        showAlert('error', res.message);
                    } else {
                        showAlert('error', 'Failed to create user.');
                    }
                }
            });
        });


        // EDIT
        $('#businessesTable').on('click', '.action-btn.edit', function() {
            let id = $(this).data('id');
            $.get(`/api/admin/user-view/${id}`, function(user) {
                let form = $('#editUserForm');
                form.find('[name=id]').val(id);
                form.find('[name=name]').val(user.name);
                form.find('[name=email]').val(user.email);
                form.find('[name=phone]').val(user.contact_number);
                openModal('editUserModal');
            }).fail(function() {
                showAlert('error', 'Failed to fetch user details.');
            });
        });

        // UPDATE
        $('#updateUser').on('click', function() {
            let id = $('#editUserForm [name=id]').val();
            let formData = $('#editUserForm').serialize();
            $.ajax({
                url: `/api/admin/business-update/${id}`,
                type: 'PUT',
                data: formData,
                success: function() {
                    showAlert('success', 'User updated successfully!');
                    table.ajax.reload();
                    closeModal('editUserModal');
                },
                error: function() {
                    showAlert('error', 'Failed to update user.');
                }
            });
        });

        // DELETE
        $('#businessesTable').on('click', '.action-btn.delete', function() {
            let id = $(this).data('id');
            Swal.fire({
                title: "Are you sure?",
                text: "This action cannot be undone!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#d33",
                cancelButtonColor: "#3085d6",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: `/api/admin/business-delete/${id}`,
                        type: 'DELETE',
                        success: function() {
                            showAlert('success', 'Business deleted successfully!');
                            table.ajax.reload();
                        },
                        error: function() {
                            showAlert('error', 'Failed to delete user.');
                        }
                    });
                }
            });
        });
        // STATUS CHANGE
        $('#businessesTable').on('click', '.action-btn.status', function() {
            let id = $(this).data('id');
            let newStatus = $(this).data('status');

            Swal.fire({
                title: "Are you sure?",
                text: `This will change the user's status to ${newStatus}!`,
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: `Yes, change to ${newStatus}`
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: `/api/admin/user-status/${id}`,
                        type: 'POST',
                        data: {
                            status: newStatus
                        },
                        success: function(res) {
                            if (res.success) {
                                showAlert('success', res.message);
                                table.ajax.reload();
                            } else {
                                showAlert('error', res.message ||
                                    'Status change failed.');
                            }
                        },
                        error: function(xhr) {
                            let errors = xhr.responseJSON?.errors;
                            if (errors) {
                                Object.values(errors).forEach(msgArray => {
                                    msgArray.forEach(msg => showAlert(
                                        'error', msg));
                                });
                            } else {
                                showAlert('error', 'Failed to change status.');
                            }
                        }
                    });
                }
            });
        });
        // Open "Add User" modal
        $('#addBusinessBtn').on('click', function() {
            $('#userForm')[0].reset();
            $('#addUserModal').show();
        });
    });
</script>
