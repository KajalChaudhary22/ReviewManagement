<div class="table-container">
    <div class="table-header">
        <h2 class="section-title">Recent User Signups</h2>
        <a href="{{ route('user.management.index', ['ty' => custom_encrypt('UserManagement')]) }}"
            class="action-link">View
            All</a>
    </div>
    <table id="usersTable" class="table">
        <thead>
            <tr>
                <th>User Name</th>
                <th>Email</th>
                <th>Registration Date</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($customers as $customer)
                <tr>
                    <td>{{ $customer->name }}</td>
                    <td>{{ $customer->email }}</td>
                    <td>{{ $customer->created_at->format('M d, Y') }}</td>
                    <td>
                        @if ($customer->userDetails?->status == 'Active')
                            <span class="status-badge status-active">Active</span>
                        @elseif($customer->userDetails?->status == 'Pending')
                            <span class="status-badge status-pending">Pending</span>
                        @else
                            <span class="status-badge status-suspended">Suspended</span>
                        @endif
                    </td>
                    <td>
                        <div class="action-buttons">
                            <button class="action-btn view" data-id="{{ custom_encrypt($customer?->id) }}">View</button>
                            @if ($customer->userDetails?->status == 'Active')
                                <button class="action-btn status" data-id="{{ custom_encrypt($customer?->id) }}"
                                    data-status="Suspended">Suspend</button>
                            @elseif($customer->userDetails?->status == 'Pending')
                                <button class="action-btn status" data-id="{{ custom_encrypt($customer?->id) }}"
                                    data-status="Rejected">Reject</button>
                            @else
                                <button class="action-btn status" data-id="{{ custom_encrypt($customer?->id) }}"
                                    data-status="Active">Activate</button>
                            @endif
                        </div>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
</div>
<script>
    @include('admin.dashboard.modalJS')
    $(document).ready(function() {
        // STATUS CHANGE
        $('#usersTable').on('click', '.action-btn.status', function() {
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
                                // ✅ Update row instantly
                                let row = $(
                                    `#usersTable .action-btn.status[data-id="${id}"]`
                                ).closest('tr');

                                // Update status badge
                                let statusBadge = '';
                                if (newStatus.toLowerCase() === 'active') {
                                    statusBadge =
                                        '<span class="status-badge status-active">Active</span>';
                                } else if (newStatus.toLowerCase() === 'pending') {
                                    statusBadge =
                                        '<span class="status-badge status-pending">Pending</span>';
                                } else {
                                    statusBadge =
                                        '<span class="status-badge status-suspended">' +
                                        newStatus + '</span>';
                                }
                                row.find('td:eq(3)').html(statusBadge);

                                // Update action buttons
                                let actionBtns = '<div class="action-buttons">';
                                actionBtns +=
                                    '<button class="action-btn view" data-id="' +
                                    id + '">View</button>';

                                if (newStatus.toLowerCase() === 'active') {
                                    actionBtns +=
                                        '<button class="action-btn status" data-id="' +
                                        id +
                                        '" data-status="Suspended">Suspend</button>';
                                } else if (newStatus.toLowerCase() === 'pending') {
                                    actionBtns +=
                                        '<button class="action-btn status" data-id="' +
                                        id +
                                        '" data-status="Rejected">Reject</button>';
                                } else {
                                    actionBtns +=
                                        '<button class="action-btn status" data-id="' +
                                        id +
                                        '" data-status="Active">Activate</button>';
                                }
                                actionBtns += '</div>';

                                row.find('td:eq(4)').html(actionBtns);
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
        // VIEW USER DETAILS
        $('#usersTable').on('click', '.action-btn.view', function() {
            let id = $(this).data('id');

            $.get(`/api/admin/user-view/${id}`, function(user) {
                console.log('Fetched User:', user);

                // Fill Avatar
                $('#userAvatar').text(user.name ? user.name.charAt(0).toUpperCase() : 'U');

                // Fill Basic Info
                $('#customerName').text(user.name || 'N/A');
                $('#customerEmail').text(user.email || 'N/A');

                // Status badge
                let statusClass = 'status-suspended';
                if (user?.status?.toLowerCase() === 'active') {
                    statusClass = 'status-active';
                } else if (user?.status?.toLowerCase() === 'pending') {
                    statusClass = 'status-pending';
                }

                $('#customerStatusBadge')
                    .removeClass('status-active status-pending status-suspended')
                    .addClass(statusClass)
                    .text(user.status || 'Unknown');

                // Fill Other Details
                $('#customerPhone').text(user.contact_number || 'N/A');
                $('#customerType').text(user.customer_type || 'Customer');

                // Registration Date
                $('#customerRegistrationDate').text(
                    user.created_at ?
                    new Date(user.created_at).toLocaleDateString('en-US', {
                        month: 'short',
                        day: 'numeric',
                        year: 'numeric',
                    }) :
                    'N/A'
                );

                // Last Active
                $('#customerLastActive').text(
                    user.last_active ?
                    new Date(user.last_active).toLocaleDateString('en-US', {
                        month: 'short',
                        day: 'numeric',
                        year: 'numeric',
                    }) :
                    'NA'
                );

                // Show modal
                openModal('detailsModal');
            }).fail(function() {
                showAlert('error', 'Failed to fetch user details.');
            });
        });

    });
</script>
