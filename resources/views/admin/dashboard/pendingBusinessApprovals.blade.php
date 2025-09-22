<div class="table-container">
    <div class="table-header">
        <h2 class="section-title">Pending Business Approvals</h2>
        <a href="{{ route('business.management.index',['ty'=>custom_encrypt('BusinessManagement')]) }}" class="action-link">View All</a>
    </div>
    <div class="approval-cards" id="pendingBusinessApprovals">
        @foreach ($pendingBusiness as $business)
            <div class="approval-card">
                <div class="approval-title">{{ $business?->name }}</div>
                <div class="approval-meta">{{ $business?->locationDetails?->name }} • {{ $business?->masterType?->name }}
                    • Submitted: {{ $business?->created_at->format('M d, Y') }}</div>
                <div class="approval-actions">
                    <button class="btn btn-success btn-sm approval" data-id="{{ custom_encrypt($business?->id) }}"
                        data-status="Approved">Approve</button>
                    <button class="btn btn-danger btn-sm approval" data-id="{{ custom_encrypt($business?->id) }}"
                        data-status="Reject">Reject</button>
                    <button class="btn btn-secondary btn-sm view-business"
                        data-id="{{ custom_encrypt($business?->id) }}">View Details</button>
                </div>
            </div>
        @endforeach
    </div>
</div>
<script>
    $(document).ready(function() {
        // APPROVAL ACTIONS
        // Approve / Reject
        $(document).on('click', '.approval', function() {
            let id = $(this).data('id');
            let status = $(this).data('status');

            Swal.fire({
                title: `Are you sure?`,
                text: `This will mark the business as ${status}`,
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: `Yes, ${status}`
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: `/api/admin/business-approval/${id}`,
                        type: 'POST',
                        data: {
                            status: status
                        },
                        success: function(res) {
                            if (res.success) {
                                showAlert('success', res.message);
                                $('#pendingBusinessApprovals').load(location.href +
                                    " #pendingBusinessApprovals");
                            } else {
                                showAlert('error', res.message || 'Action failed.');
                            }
                        },
                        error: function(xhr) {
                            let errors = xhr.responseJSON?.errors;
                            if (errors) {
                                Object.values(errors).forEach(msgArr => {
                                    msgArr.forEach(msg => showAlert('error',
                                        msg));
                                });
                            } else {
                                showAlert('error', 'Something went wrong.');
                            }
                        }
                    });
                }
            });
        });

        // View Business
        $(document).on('click', '.view-business', function() {
            let id = $(this).data('id');
            $.get(`/api/admin/business/${id}`, function(res) {
                if (res.success) {
                    let business = res.data;
                    Swal.fire({
                        title: business.name,
                        html: `
                    <p><b>Location:</b> ${business.locationDetails?.name ?? ''}</p>
                    <p><b>Type:</b> ${business.masterType?.name ?? ''}</p>
                    <p><b>Submitted:</b> ${business.created_at}</p>
                `,
                        icon: "info"
                    });
                } else {
                    showAlert('error', res.message);
                }
            });
        });

    });
    </script>
