@include('layouts.commonjs')
<script>
    // $(document).ready(function() {
    //     let page = 1;

    //     function loadReviews(rating = '', pageNumber = 1) {
    //         $.ajax({
    //             url: "{{ route('business.reviews.data') }}", // Laravel API endpoint
    //             type: "GET",
    //             data: {
    //                 rating: rating,
    //                 page: pageNumber
    //             },
    //             success: function(res) {
    //                 if (res.status) {
    //                     let reviewsHtml = "";

    //                     if (res.data.reviews.length > 0) {
    //                         $.each(res.data.reviews, function(i, review) {
    //                             let stars = "★★★★★".slice(0, review.rating) + "☆☆☆☆☆".slice(
    //                                 review.rating);
    //                             reviewsHtml += `
    //                             <div class="review-item">
    //                                 <div class="reviewer-avatar">${review.initials}</div>
    //                                 <div class="review-content">
    //                                     <div class="reviewer-name">${review.name} 
    //                                         <span style="color: var(--text-light); font-weight: normal;">- ${review.company}</span>
    //                                     </div>
    //                                     <div class="stars">${stars} 
    //                                         <span style="color: var(--text-light); font-size: 0.9rem;">${review.date}</span>
    //                                     </div>
    //                                     <div class="review-text">${review.comment}</div>
    //                                     <div style="margin-top: 10px;">
    //                                         <span style="font-size: 0.9rem; color: var(--text-light);">Product: ${review.product}</span>
    //                                     </div>
    //                                     ${review.response ? `
    //                                         <div style="background-color: #f9f9f9; padding: 10px; border-radius: 5px; margin-top: 10px;">
    //                                             <div style="font-weight: 500; margin-bottom: 5px;">Your Response:</div>
    //                                             <div>${review.response}</div>
    //                                         </div>
    //                                     ` : `
    //                                         <button class="btn reply-review-btn" style="padding: 5px 10px; font-size: 0.8rem; margin-top: 10px;">Reply</button>
    //                                     `}
    //                                 </div>
    //                             </div>
    //                         `;
    //                         });
    //                     } else {
    //                         reviewsHtml = `<p>No reviews found.</p>`;
    //                     }

    //                     $("#reviews-list").html(reviewsHtml);
    //                     $("#pagination-info").text(
    //                         `Showing ${res.data.from}-${res.data.to} of ${res.data.total} reviews`
    //                         );

    //                     page = res.data.current_page;
    //                 }
    //             }
    //         });
    //     }

    //     // Initial load
    //     loadReviews();

    //     // Filter by rating
    //     $("#review-rating-filter").on("change", function() {
    //         page = 1; // reset to first page
    //         loadReviews($(this).val(), page);
    //     });

    //     // Pagination buttons
    //     $("#prev-reviews").on("click", function() {
    //         if (page > 1) {
    //             loadReviews($("#review-rating-filter").val(), page - 1);
    //         }
    //     });

    //     $("#next-reviews").on("click", function() {
    //         loadReviews($("#review-rating-filter").val(), page + 1);
    //     });
    // });
    $(document).ready(function () {
    function loadReviews(rating = '') {
        $.ajax({
            url: "{{ route('business.reviews.data') }}",
            type: "GET",
            data: { rating: rating },
            success: function (res) {
                if (res.status) {
                    let reviewsHtml = '';
                    if (res.data.length > 0) {
                        res.data.forEach(review => {
                            reviewsHtml += `
                                <div class="review-card">
                                    <div class="review-header">
                                        <strong>${review.customer_name ?? 'Anonymous'}</strong>
                                        <span>⭐ ${review.rating}</span>
                                    </div>
                                    <div class="review-body">
                                        <p>${review.comment ?? ''}</p>
                                    </div>
                                    <div class="review-footer">
                                        <small>${new Date(review.created_at).toLocaleDateString()}</small>
                                    </div>
                                </div>
                            `;
                        });
                    } else {
                        reviewsHtml = `<p>No reviews found</p>`;
                    }
                    $('#reviewsList').html(reviewsHtml);
                }
            }
        });
    }

    // Load initial data
    loadReviews();

    // Filter by rating
    $('#ratingFilter').on('change', function () {
        loadReviews($(this).val());
    });
});

</script>
