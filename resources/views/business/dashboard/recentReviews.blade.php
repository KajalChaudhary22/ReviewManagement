<div class="reviews-container" style="flex: 1; min-width: 300px;">
    <div class="table-header">
        <h2 class="section-title">Recent Reviews</h2>
        <a href="{{ route('business.reviews.list',['ty'=> custom_encrypt('ReviewsList')]) }}" class="view-all">View All</a>
    </div>
    @foreach ($latestreviews as $review)
        <div class="review-item">
            {{-- Reviewer Avatar (first letters of name) --}}
            <div class="reviewer-avatar">
                {{ strtoupper(substr($review->customerDetails?->name, 0, 2)) }}
            </div>

            <div class="review-content">
                <div class="reviewer-name">{{ $review->customerDetails?->name }}</div>

                {{-- Stars --}}
                <div class="stars">
                    @for ($i = 1; $i <= 5; $i++)
                        @if ($i <= $review->rating)
                            ★
                        @else
                            ☆
                        @endif
                    @endfor
                </div>

                <div class="review-text">{{ $review->comment }}</div>
            </div>
        </div>
    @endforeach
    {{-- <div class="review-item">
        <div class="reviewer-avatar">SM</div>
        <div class="review-content">
            <div class="reviewer-name">Sarah Miller</div>
            <div class="stars">★★★★★</div>
            <div class="review-text">Excellent product quality and fast delivery. Will definitely
                order again!</div>
        </div>
    </div>
    <div class="review-item">
        <div class="reviewer-avatar">JD</div>
        <div class="review-content">
            <div class="reviewer-name">John Davis</div>
            <div class="stars">★★★★☆</div>
            <div class="review-text">Good service but packaging could be improved.</div>
        </div>
    </div>
    <div class="review-item">
        <div class="reviewer-avatar">AP</div>
        <div class="review-content">
            <div class="reviewer-name">Amanda Patel</div>
            <div class="stars">★★★★★</div>
            <div class="review-text">The best pharmaceutical supplier we've worked with!</div>
        </div>
    </div> --}}
</div>