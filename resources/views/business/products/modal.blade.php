<!-- Product Modal -->
<div class="modal" id="productModal">
    <div class="modal-content">
        <div class="modal-header">
            <h2 class="modal-title">Add New Product</h2>
            <button class="close-modal">&times;</button>
        </div>
        <form id="product-form">
            <input type="hidden" id="product_id" name="product_id">
            <div class="form-group">
                <label class="form-label">Product Name</label>
                <input type="text" class="form-control" id="product-name" required name="product_name">
            </div>
            <div class="form-group">
                <label class="form-label">Description</label>
                <textarea class="form-control" id="product-description" rows="3" required name="description"></textarea>
            </div>
            <div class="flex" style="gap: 20px; flex-wrap: wrap;">
                <div class="form-group" style="flex: 1; min-width: 200px;">
                    <label class="form-label">SKU</label>
                    <input type="text" class="form-control" id="product-sku" required name="sku">
                </div>
                <div class="form-group" style="flex: 1; min-width: 200px;">
                    <label class="form-label">Category</label>
                    <select class="form-control" id="product-category" required name="category_id">
                        <option value="">Select Category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>                                
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="flex" style="gap: 20px; flex-wrap: wrap;">
                <div class="form-group" style="flex: 1; min-width: 200px;">
                    <label class="form-label">Price ($)</label>
                    <input type="number" class="form-control" id="product-price" step="0.01" required name="price">
                </div>
                <div class="form-group" style="flex: 1; min-width: 200px;">
                    <label class="form-label">Quantity in Stock</label>
                    <input type="number" class="form-control" id="product-quantity" required name="quantity">
                </div>
            </div>
            <div class="form-group">
                <label class="form-label">Product Image</label>
                <input type="file" class="form-control" id="product-image" name="image" accept="image/*">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn" style="background-color: #f0f0f0; flex: 1;">Cancel</button>
                <button type="submit" class="btn btn-primary" style="flex: 1;">Save Product</button>
            </div>
        </form>
    </div>
</div>


<!-- Service Modal -->
<div class="modal" id="service-modal">
    <div class="modal-content">
        <div class="modal-header">
            <h2 class="modal-title">Add New Service</h2>
            <button class="close-modal">&times;</button>
        </div>
        <form id="service-form">
            <div class="form-group">
                <label class="form-label">Service Name</label>
                <input type="text" class="form-control" id="service-name" required name="service_name">
            </div>
            <div class="form-group">
                <label class="form-label">Description</label>
                <textarea class="form-control" id="service-description" rows="3" required name="description"></textarea>
            </div>
            <div class="form-group">
                <label class="form-label">Price</label>
                <input type="text" class="form-control" id="service-price" required name="price">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn" style="background-color: #f0f0f0; flex: 1;">Cancel</button>
                <button type="submit" class="btn btn-primary" style="flex: 1;">Save Service</button>
            </div>
        </form>
    </div>
</div>