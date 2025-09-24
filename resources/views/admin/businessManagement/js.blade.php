<script>
    @include('admin.dashboard.modalJS')
    $(document).ready(function () {
        let defaultPageLength = {{ $adminPreferences->results_per_page ?? 10 }};
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
                data: function (d) {
                    d.status = $('#businessStatusFilter').val();
                    d.date_range = $('#businessDateFilter').val();
                    d.search_input = $('#businessSearch').val();
                }
            },
            pageLength: defaultPageLength,
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
                data: 'industry',
                name: 'industry'
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

        $('#applyBusinessFilters').on('click', function () {
            table.ajax.reload();
        });
        // VIEW BUSINESS DETAILS
        $('#businessesTable').on('click', '.action-btn.view', function () {
            let id = $(this).data('id');

            $.get(`/api/admin/business-view/${id}`, function (business) {
                // Fill Avatar
                $('#businessAvatar').text(business.name ? business.name.charAt(0) : 'U');

                // Fill Basic Info
                $('#businessName').text(business.name || 'N/A');
                $('#businessEmail').text(business.email || 'N/A');

                // Status badge
                let statusClass = 'status-suspended';
                if (business.status && business.status.toLowerCase() === 'active') statusClass =
                    'status-active';
                else if (business.status && business.status.toLowerCase() === 'pending') statusClass =
                    'status-pending';
                $('#businessStatusBadge')
                    .removeClass('status-active status-pending status-suspended')
                    .addClass(statusClass)
                    .text(business.status || 'Unknown');

                // Fill Other Details
                $('#businessPhone').text(business.contact_number || 'N/A');
                $('#businessType').text(business.type || 'N/A');
                $('#businessRegistrationDate').text(
                    business.created_at ? new Date(business.created_at).toLocaleDateString(
                        'en-US', {
                        month: 'short',
                        day: 'numeric',
                        year: 'numeric'
                    }) : 'N/A'
                );
                $('#businessLastActive').text(
                    business.last_active ? new Date(business.last_active).toLocaleDateString(
                        'en-US', {
                        month: 'short',
                        day: 'numeric',
                        year: 'numeric'
                    }) : 'Unknown'
                );

                // Show modal
                $('#detailsModal').fadeIn();
            }).fail(function () {
                showAlert('error', 'Failed to fetch business details.');
            });
        });


        // ADD
        $('#saveBusiness').on('click', function () {
            let formData = $('#businessForm').serialize();

            $.ajax({
                url: '/api/admin/business-add',
                type: 'POST',
                data: formData,
                success: function (res) {
                    if (res.success) {
                        showAlert('success', res.message);
                        $('#addBusinessModal').hide();
                        $('#businessForm')[0].reset();
                        table.ajax.reload();
                    } else {
                        showAlert('error', res.message || 'Something went wrong.');
                    }
                },
                error: function (xhr) {
                    let res = xhr.responseJSON;
                    if (res?.errors) {
                        Object.values(res.errors).flat().forEach(msg => showAlert('error',
                            msg));
                    } else if (res?.message) {
                        showAlert('error', res.message);
                    } else {
                        showAlert('error', 'Failed to create business.');
                    }
                }
            });
        });


        // EDIT
        $('#businessesTable').on('click', '.action-btn.edit', function () {
            let id = $(this).data('id');
            $.get(`/api/admin/business-view/${id}`, function (business) {
                let form = $('#businessEditForm');
                form.find('[name=id]').val(id);
                form.find('[name=name]').val(business.name);
                form.find('[name=email]').val(business.email);
                form.find('[name=contact_number]').val(business.contact_number);
                form.find('[name=description]').val(business.description);
                form.find('[name=category]').val(business.master_id);
                form.find('[name=location]').val(business.location_id);
                openModal('editBusinessModal');
            }).fail(function () {
                showAlert('error', 'Failed to fetch business details.');
            });
        });

        // UPDATE
        $('#updateBusiness').on('click', function () {
            let id = $('#editBusinessForm [name=id]').val();
            let formData = $('#editBusinessForm').serialize();
            $.ajax({
                url: `/api/admin/business-update/${id}`,
                type: 'PUT',
                data: formData,
                success: function () {
                    showAlert('success', 'Business updated successfully!');
                    table.ajax.reload();
                    closeModal('editBusinessModal');
                },
                error: function () {
                    showAlert('error', 'Failed to update business.');
                }
            });
        });

        // DELETE
        $('#businessesTable').on('click', '.action-btn.delete', function () {
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
                        success: function () {
                            showAlert('success', 'Business deleted successfully!');
                            table.ajax.reload();
                        },
                        error: function () {
                            showAlert('error', 'Failed to delete business.');
                        }
                    });
                }
            });
        });
        // STATUS CHANGE
        $('#businessesTable').on('click', '.action-btn.status', function () {
            let id = $(this).data('id');
            let newStatus = $(this).data('status');

            Swal.fire({
                title: "Are you sure?",
                text: `This will change the business's status to ${newStatus}!`,
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: `Yes, change to ${newStatus}`
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: `/api/admin/business-status/${id}`,
                        type: 'POST',
                        data: {
                            status: newStatus
                        },
                        success: function (res) {
                            if (res.success) {
                                showAlert('success', res.message);
                                table.ajax.reload();
                            } else {
                                showAlert('error', res.message ||
                                    'Status change failed.');
                            }
                        },
                        error: function (xhr) {
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
        // Open "Add Business" modal
        $('#addBusinessBtn').on('click', function () {
            $('#businessForm')[0].reset();
            // Show modal
            openModal('addBusinessModal');
            // $('#addBusinessModal').show();
        });
    });
</script>