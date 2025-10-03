<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <!-- Added proper viewport meta tag for mobile devices -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Products & Services</title>
    @include('business.layouts.styles')
</head>

<body>
    <!-- Sidebar -->
    @include('business.layouts.sidebar')

    <!-- Main Content -->
    <div class="main-content">
        <!-- Navbar -->
       @include('business.layouts.navbar')

        <!-- Content Area -->
        <div class="content">


            <!-- Products & Services Content -->
            <div id="products-content" class="content-section">
                <div class="content-header">
                    <h1 class="welcome-text">Products & Services</h1>
                    <p class="date-text">{{ \Carbon\Carbon::now()->format('l, d F Y') }}</p>
                </div>

                <div class="table-container">
                    <div class="table-header">
                        <h2 class="section-title">Your Products </h2>
                       <a href="{{ route('business.product.add',['ty' => custom_encrypt('BusinessProductAdd')]) }}"> <button class="btn btn-primary">Add New Product</button></a>
                        {{-- <button class="btn btn-primary" id="add-product-btn">Add New Product</button> --}}
                    </div>

                    <div style="display: flex; gap: 15px; margin-bottom: 20px; flex-wrap: wrap;">
                        <div style="flex: 1; min-width: 200px;">
                            <input type="text" class="form-control" placeholder="Search products..."
                                id="product-search">
                        </div>
                        <select class="form-control" style="width: 200px; min-width: 150px;"
                            id="product-category-filter">
                            <option value="All">All Categories</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>                                
                            @endforeach
                            
                        </select>
                        <select class="form-control" style="width: 150px; min-width: 120px;" id="product-sort">
                            <option>Sort by: Newest</option>
                            <option>Sort by: Oldest</option>
                            <option>Sort by: Name</option>
                            <option>Sort by: Popularity</option>
                        </select>
                    </div>

                    <div class="products-grid" style="grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));"
                        id="products-grid">
                        
                    </div>

                    {{-- <div
                        style="display: flex; justify-content: space-between; align-items: center; margin-top: 30px; flex-wrap: wrap; gap: 10px;">
                        <div style="color: var(--text-light);">
                            Showing 1-4 of 124 products
                        </div>
                        <div style="display: flex; gap: 10px;">
                            <button class="btn" style="background-color: #f0f0f0;"
                                id="prev-products">Previous</button>
                            <button class="btn btn-primary" id="next-products">Next</button>
                        </div>
                    </div> --}}
                </div>

                <div class="table-container" style="margin-top: 30px;">
                    <div class="table-header">
                        <h2 class="section-title">Services </h2>
                        <button class="btn btn-primary" id="add-service-btn">Add New Service</button>
                    </div>

                    <table id="services-table">
                        <thead>
                            <tr>
                                <th>Service Name</th>
                                <th>Description</th>
                                <th>Price</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- <tr>
                                <td>Custom Formulation</td>
                                <td>Tailored pharmaceutical solutions for specific needs</td>
                                <td>$1,500+</td>
                                <td>
                                    <button class="edit-service-btn"
                                        style="background: none; border: none; cursor: pointer; margin-right: 10px;">✏️</button>
                                    <button class="delete-service-btn"
                                        style="background: none; border: none; cursor: pointer;">🗑️</button>
                                </td>
                            </tr>
                            <tr>
                                <td>Private Labeling</td>
                                <td>Brand our products with your own label and packaging</td>
                                <td>$500+</td>
                                <td>
                                    <button class="edit-service-btn"
                                        style="background: none; border: none; cursor: pointer; margin-right: 10px;">✏️</button>
                                    <button class="delete-service-btn"
                                        style="background: none; border: none; cursor: pointer;">🗑️</button>
                                </td>
                            </tr>
                            <tr>
                                <td>Bulk Discounts</td>
                                <td>Special pricing for large quantity orders</td>
                                <td>20-50% off</td>
                                <td>
                                    <button class="edit-service-btn"
                                        style="background: none; border: none; cursor: pointer; margin-right: 10px;">✏️</button>
                                    <button class="delete-service-btn"
                                        style="background: none; border: none; cursor: pointer;">🗑️</button>
                                </td>
                            </tr> --}}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Mobile Menu Toggle (Hidden on Desktop) -->
    <div class="menu-toggle hidden">
        <i class="icon">≡</i>
    </div>

   @include('business.products.modal') 

    

    

   
@include('business.products.js')

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Settings Tabs
            const settingsTabs = document.querySelectorAll('.settings-tabs .tab');
            const tabContents = document.querySelectorAll('.tab-content');

            settingsTabs.forEach(tab => {
                tab.addEventListener('click', function() {
                    // Remove active class from all tabs
                    settingsTabs.forEach(t => t.classList.remove('active'));
                    // Add active class to clicked tab
                    this.classList.add('active');

                    // Hide all tab contents
                    tabContents.forEach(content => content.classList.remove('active'));

                    // Show the selected tab content
                    const tabId = this.getAttribute('data-tab') + '-tab';
                    document.getElementById(tabId).classList.add('active');
                });
            });

            // Mobile Menu Toggle
            const menuToggle = document.querySelector('.menu-toggle');
            const sidebar = document.querySelector('.sidebar');

            menuToggle.addEventListener('click', function() {
                sidebar.classList.toggle('active');
            });

            // Check screen size and show/hide menu toggle accordingly
            function checkScreenSize() {
                if (window.innerWidth <= 576) {
                    menuToggle.classList.remove('hidden');
                    sidebar.classList.remove('active');
                } else {
                    menuToggle.classList.add('hidden');
                }
            }

            // Initial check
            checkScreenSize();

            // Add resize event listener
            window.addEventListener('resize', checkScreenSize);

            // Simulate chart animations when they come into view
            const animateOnScroll = function() {
                const charts = document.querySelectorAll('.chart-line');

                charts.forEach(chart => {
                    const chartPosition = chart.getBoundingClientRect().top;
                    const screenPosition = window.innerHeight / 1.3;

                    if (chartPosition < screenPosition) {
                        chart.style.animation = 'chartAnimation 1.5s ease-out';
                    }
                });
            };

            window.addEventListener('scroll', animateOnScroll);

            // Initial animation trigger
            animateOnScroll();

            // Modal functionality
            const modals = document.querySelectorAll('.modal');
            const closeModalButtons = document.querySelectorAll('.close-modal');

            

            

            // Close modal when clicking on X or cancel button
            closeModalButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const modal = this.closest('.modal');
                    closeModal(modal.id);
                });
            });

            // Close modal when clicking outside the modal content
            modals.forEach(modal => {
                modal.addEventListener('click', function(e) {
                    if (e.target === this) {
                        closeModal(this.id);
                    }
                });
            });

            // Products & Services Section Functionality
            // const addProductBtn = document.getElementById('add-product-btn');
            const addServiceBtn = document.getElementById('add-service-btn');
            // const editProductBtns = document.querySelectorAll('.edit-product-btn');
            // const deleteProductBtns = document.querySelectorAll('.delete-product-btn');
            const editServiceBtns = document.querySelectorAll('.edit-service-btn');
            const deleteServiceBtns = document.querySelectorAll('.delete-service-btn');
            // const productForm = document.getElementById('product-form');
            
            // const prevProductsBtn = document.getElementById('prev-products');
            // const nextProductsBtn = document.getElementById('next-products');

            // Add Product
            // addProductBtn.addEventListener('click', function() {
            //     document.getElementById('product-form').reset();
            //     document.querySelector('#product-modal .modal-title').textContent = 'Add New Product';
            //     openModal('product-modal');
            // });

            // // Edit Product
            // editProductBtns.forEach(btn => {
            //     btn.addEventListener('click', function() {
            //         const productCard = this.closest('.product-card');
            //         const productName = productCard.querySelector('.product-name').textContent;
            //         const productMeta = productCard.querySelectorAll('.product-meta span');
            //         const productPrice = productCard.querySelector(
            //             'span[style*="color: var(--primary-color)"]').textContent.replace('$',
            //             '');

            //         document.getElementById('product-name').value = productName;
            //         document.getElementById('product-sku').value = productMeta[0].textContent
            //             .replace('SKU: ', '');
            //         document.getElementById('product-price').value = productPrice;
            //         document.getElementById('product-quantity').value = productMeta[1].textContent
            //             .replace('In Stock: ', '').replace(',', '');

            //         document.querySelector('#product-modal .modal-title').textContent =
            //             'Edit Product';
            //         openModal('product-modal');
            //     });
            // });

            // // Delete Product
            // deleteProductBtns.forEach(btn => {
            //     btn.addEventListener('click', function() {
            //         if (confirm('Are you sure you want to delete this product?')) {
            //             const productCard = this.closest('.product-card');
            //             productCard.remove();
            //             // In a real app, you would also make an API call to delete from the database
            //             alert('Product deleted successfully!');
            //         }
            //     });
            // });

            // // Save Product
            // productForm.addEventListener('submit', function(e) {
            //     e.preventDefault();

            //     const productName = document.getElementById('product-name').value;
            //     const productSku = document.getElementById('product-sku').value;
            //     const productPrice = document.getElementById('product-price').value;
            //     const productQuantity = document.getElementById('product-quantity').value;
            //     const productCategory = document.getElementById('product-category').value;

            //     // In a real app, you would save this to your database
            //     // For demo purposes, we'll just show a success message
            //     alert(`Product ${productName} saved successfully!`);
            //     closeModal('product-modal');
            // });

            // Add Service
            addServiceBtn.addEventListener('click', function() {
                document.getElementById('service-form').reset();
                document.querySelector('#service-modal .modal-title').textContent = 'Add New Service';
                openModal('service-modal');
            });

            // Edit Service
            editServiceBtns.forEach(btn => {
                btn.addEventListener('click', function() {
                    const serviceRow = this.closest('tr');
                    const serviceName = serviceRow.cells[0].textContent;
                    const serviceDescription = serviceRow.cells[1].textContent;
                    const servicePrice = serviceRow.cells[2].textContent;

                    document.getElementById('service-name').value = serviceName;
                    document.getElementById('service-description').value = serviceDescription;
                    document.getElementById('service-price').value = servicePrice;

                    document.querySelector('#service-modal .modal-title').textContent =
                        'Edit Service';
                    openModal('service-modal');
                });
            });

            // Delete Service
            deleteServiceBtns.forEach(btn => {
                btn.addEventListener('click', function() {
                    if (confirm('Are you sure you want to delete this service?')) {
                        const serviceRow = this.closest('tr');
                        serviceRow.remove();
                        // In a real app, you would also make an API call to delete from the database
                        alert('Service deleted successfully!');
                    }
                });
            });

           
            // Pagination for Products
            let currentProductPage = 1;

            // prevProductsBtn.addEventListener('click', function() {
            //     if (currentProductPage > 1) {
            //         currentProductPage--;
            //         // In a real app, you would fetch the previous page of products
            //         alert(`Loading page ${currentProductPage} of products...`);
            //     }
            // });

            // nextProductsBtn.addEventListener('click', function() {
            //     currentProductPage++;
            //     // In a real app, you would fetch the next page of products
            //     alert(`Loading page ${currentProductPage} of products...`);
            // });

            // Filter Products
            // const productSearch = document.getElementById('product-search');
            // const productCategoryFilter = document.getElementById('product-category-filter');
            // const productSort = document.getElementById('product-sort');

            // productSearch.addEventListener('input', function() {
            //     // In a real app, you would filter products based on search term
            //     console.log(`Searching for: ${this.value}`);
            // });

            // productCategoryFilter.addEventListener('change', function() {
            //     // In a real app, you would filter products by category
            //     console.log(`Filtering by category: ${this.value}`);
            // });

            // productSort.addEventListener('change', function() {
            //     // In a real app, you would sort products
            //     console.log(`Sorting by: ${this.value}`);
            // });


        });
    </script>
</body>

</html>
