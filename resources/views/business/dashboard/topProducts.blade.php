<div class="table-container">
    <div class="table-header">
        <h2 class="section-title">Top Performing Products</h2>
        <a href="{{ route('business.product.list',['ty'=> custom_encrypt('BusinessProductList')]) }}" class="view-all">View All</a>
    </div>
    <div class="products-grid">
        @foreach ($topProducts as $product)
        <div class="product-card">
            <div class="product-image">
                <img src="{{ asset($product?->product_image) }}" alt="Antibiotic X">
            </div>
            <h3 class="product-name">{{ $product?->name }}</h3>
            <div class="product-meta">
                <span>Last month</span>
                <span>1,240 units</span>
            </div>
            <div class="product-chart">
                <div class="chart-line" style="width: 80%;"></div>
            </div>
        </div>
        @endforeach
    </div>
</div>