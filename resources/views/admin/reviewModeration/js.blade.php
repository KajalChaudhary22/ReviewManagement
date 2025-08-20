<script>
    function loadReviews(page = 1) {
        $.get('/api/admin/reviews/list', {
            search: $('#reviewSearch').val(),
            status: $('#reviewStatusFilter').val(),
            rating: $('#reviewRatingFilter').val(),
            page: page
        }, function(res) {
            if (res.status) {
                let html = '';
                res.data.data.forEach(r => {
                    html += `
                        <div class="review-card" data-status="${r.status}" data-rating="${r.rating}">
                            <div class="review-header">
                                <div>
                                    <div class="review-user">${r.customer_name}</div>
                                    <div class="review-time">For: ${r.business_name} • ${r.created_at}</div>
                                </div>
                                <div>
                                    <span class="status-badge status-${r.status.toLowerCase()}">${r.status}</span>
                                </div>
                            </div>
                            <div class="review-stars">${'★'.repeat(r.rating)}${'☆'.repeat(5 - r.rating)}</div>
                            <div class="review-text">${r.comment}</div>
                            <div class="review-actions">
                                <button class="btn btn-success btn-sm approve-review" data-id="${r.id}">Approve</button>
                                <button class="btn btn-danger btn-sm reject-review" data-id="${r.id}">Reject</button>
                                <button class="btn btn-secondary btn-sm view-review" data-id="${r.id}">View Details</button>
                            </div>
                        </div>
                    `;
                });
                $('#reviewsList').html(html);
            }
        });
    }
    
    function updateReviewStatus(id, status) {
        $.post('/api/admin/reviews/update-status', {
            id: id,
            status: status
        }, function(res) {
            Swal.fire({
                icon: res.status ? 'success' : 'error',
                title: res.message
            });
            if (res.status) loadReviews();
        });
    }

    $(document).on('click', '.approve-review', function() {
        updateReviewStatus($(this).data('id'), 'Approved');
    });

    $(document).on('click', '.reject-review', function() {
        updateReviewStatus($(this).data('id'), 'Rejected');
    });
    // For view details
    $(document).on('click', '.view-review', function() {
        let id = $(this).data('id');
        $.get(`/api/admin/reviews/reviews-show/${id}`, function(res) {
            if (res.status) {
                Swal.fire({
                    title: 'Review Details',
                    html: `<p>${res.data.comment}</p>`,
                    icon: 'info'
                });
            }
        });
    });
    
    $('#applyReviewFilters').on('click', function() {
        loadReviews();
    });
    
    $(document).ready(function() {
        loadReviews();
    });
    </script>
    