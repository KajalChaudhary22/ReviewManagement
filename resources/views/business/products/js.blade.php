@include('layouts.commonjs')
<script>
    function openModal(modalId) {
        document.getElementById(modalId).style.display = 'flex';
        document.body.style.overflow = 'hidden';
    }

    function closeModal(modalId) {
        document.getElementById(modalId).style.display = 'none';
        document.body.style.overflow = 'auto';
    }
    $(document).ready(function() {
        let currentPage = 1;

        function loadProducts() {
            $.ajax({
                url: "{{ route('business.product.data') }}",
                data: {
                    page: currentPage,
                    search: $('#product-search').val(),
                    category_id: $('#product-category-filter').val(),
                    sort: $('#product-sort').val(),
                },
                success: function(res) {
                    let html = '';
                    if (res.data.length === 0) {
                        html = '<p>No products found</p>';
                    } else {
                        res.data.forEach(p => {
                            html += `
                        <div class="product-card">
                            <div class="product-image">
                                <img src="${p.image_url ?? 'https://via.placeholder.com/400x300?text='+p.name}" alt="${p.name}">
                            </div>
                            <h3 class="product-name">${p.name}</h3>
                            <div class="product-meta">
                                <span>SKU: ${p.sku}</span>
                                <span>In Stock: ${p.quantity}</span>
                            </div>
                            <div style="display:flex; justify-content:space-between; margin-top:15px;">
                                <span style="color:var(--primary-color); font-weight:600;">$${p.price}</span>
                                <div>
                                    <button class="edit-product-btn" data-id="${p.enc_id}">✏️</button>
                                    <button class="delete-product-btn" data-id="${p.enc_id}">🗑️</button>
                                </div>
                            </div>
                        </div>`;
                        });
                    }
                    $('#products-grid').html(html);

                    // Pagination info
                    $('#pagination-info').text(`Page ${res.current_page} of ${res.last_page}`);

                    // Enable/disable prev/next
                    $('#prev-products').prop('disabled', res.prev_page_url === null);
                    $('#next-products').prop('disabled', res.next_page_url === null);
                }
            });
        }

        // Load first time
        loadProducts();

        // Pagination
        $('#prev-products').click(() => {
            if (currentPage > 1) {
                currentPage--;
                loadProducts();
            }
        });
        $('#next-products').click(() => {
            currentPage++;
            loadProducts();
        });

        // Filters
        $('#product-search, #product-category-filter, #product-sort').on('keyup change', function() {
            currentPage = 1;
            loadProducts();
        });
        // Edit (fetch product and open modal)
        $(document).on('click', '.edit-product-btn', function() {
            let encryptedId = $(this).data('id');

            Swal.fire({
                title: 'Loading...',
                text: 'Fetching product details...',
                allowOutsideClick: false,
                didOpen: () => {
                    Swal.showLoading();
                }
            });

            $.ajax({
                url: `/api/business/products/${encryptedId}`, // send encrypted id
                type: "GET",
                success: function(p) {
                    Swal.close();
                    console.log(p);
                    if (p) {
                        $('#product_id').val(p
                            .id); // here `p.id` can be original (decrypted in backend)
                        $('#product-name').val(p.name);
                        $('#product-sku').val(p.sku);
                        $('#product-quantity').val(p.quantity);
                        $('#product-price').val(p.price);
                        $('#product-category').val(p.productCategory_id);
                        $('#product-description').val(p.description);
                        openModal('productModal');
                        // $('#productModal').modal('show');
                    } else {
                        Swal.fire("Error", "Product not found!", "error");
                    }
                },
                error: function() {
                    Swal.close();
                    Swal.fire("Error", "Unable to fetch product details.", "error");
                }
            });
        });
        $('#product-form').on('submit', function(e) {
            e.preventDefault();

            let formData = new FormData(this);

            $.ajax({
                url: "/api/business/products/store",
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                success: function(res) {
                    if (res.status) {
                        Swal.fire({
                            icon: 'success',
                            title: res.message,
                            showConfirmButton: false,
                            timer: 1500
                        });

                        $('#product-form')[0].reset();
                        $('#productModal').hide(); // hide custom modal
                        loadProducts(); // reload products
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: res.message
                        });
                    }
                },
                error: function() {
                    Swal.fire({
                        icon: 'error',
                        title: 'Server Error',
                        text: 'Something went wrong!'
                    });
                }
            });
        });

        // Delete
        $(document).on('click', '.delete-product-btn', function() {
            let id = $(this).data('id');
            if (confirm("Are you sure to delete this product?")) {
                $.ajax({
                    url: `/business/products/${id}`,
                    method: 'DELETE',
                    success: function(res) {
                        alert(res.message);
                        loadProducts();
                    }
                });
            }
        });



        // Add product button
        $('#add-product-btn').click(function() {
            $('#product_id').val('');
            $('#product-form')[0].reset();
            openModal('productModal');
        });


    });
    $(document).ready(function() {
        let table = $('#services-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "/api/business/get-service-data",
            columns: [
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'description',
                    name: 'description'
                },
                {
                    data: 'price',
                    name: 'price'
                },
                {
                    data: 'actions',
                    name: 'actions',
                    orderable: false,
                    searchable: false
                }
            ]
        });
    });
</script>
