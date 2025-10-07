<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- START: Add these lines for Summernote Editor -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <!-- END: Add these lines for Summernote Editor -->

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Product</title>
    <style>
        /* Global Styles */
        :root {
            --primary-color: #1544da;
            --secondary-color: #5A009D;
            --accent-color: #5669bc;
            --dark-color: #212121;
            --light-color: #FAFAFA;
            --text-color: #424242;
            --text-light: #757575;
            --white: #FFFFFF;
            --black: #000000;
            --shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            --sidebar-width: 250px;
            --sidebar-collapsed-width: 80px;
            --transition: all 0.3s ease;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            display: flex;
            min-height: 100vh;
            background-color: #f5f5f5;
            color: var(--text-color);
            overflow-x: hidden;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        /* Sidebar Styles */
        .sidebar {
            width: var(--sidebar-width);
            background-color: var(--white);
            color: var(--black);
            transition: var(--transition);
            height: 100vh;
            position: fixed;
            overflow-y: auto;
            z-index: 1000;
            transform: translateX(0);
            border-right: 1px solid #e0e0e0;
        }

        .sidebar-header {
            padding: 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-bottom: 1px solid rgba(0, 0, 0, 0.1);
        }

        .logo {
            font-size: 1.5rem;
            font-weight: bold;
            color: var(--white);
        }

        .logo span {
            color: var(--accent-color);
        }

        .menu {
            padding: 20px 0;
        }

        .menu-item {
            padding: 12px 20px;
            display: flex;
            align-items: center;
            cursor: pointer;
            transition: var(--transition);
            margin: 5px 0;
        }

        .menu-item:hover {
            background-color: rgba(0, 0, 0, 0.05);
        }

        .menu-item.active {
            background-color: var(--primary-color);
            color: var(--white);
        }

        .menu-item i {
            margin-right: 15px;
            font-size: 1.2rem;
        }

        .menu-text {
            transition: var(--transition);
        }

        /* Main Content Styles */
        .main-content {
            flex: 1;
            margin-left: var(--sidebar-width);
            transition: var(--transition);
            min-width: 0;
        }

        /* Navbar Styles */
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 30px;
            background-color: var(--white);
            box-shadow: var(--shadow);
            position: sticky;
            top: 0;
            z-index: 100;
            flex-wrap: wrap;
        }

        .search-bar {
            flex: 1;
            max-width: 500px;
            position: relative;
            width: 100%;
            margin-bottom: 15px;
        }

        .search-bar input {
            width: 100%;
            padding: 10px 15px 10px 40px;
            border: 1px solid #ddd;
            border-radius: 30px;
            outline: none;
            transition: var(--transition);
            font-size: 1rem;
        }

        .search-bar input:focus {
            border-color: var(--primary-color);
        }

        .search-bar i {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-light);
        }

        .navbar-right {
            display: flex;
            align-items: center;
            width: 100%;
            justify-content: space-between;
        }

        .notification {
            position: relative;
            margin-right: 25px;
            cursor: pointer;
        }

        .notification-badge {
            position: absolute;
            top: -5px;
            right: -5px;
            background-color: var(--primary-color);
            color: white;
            border-radius: 50%;
            width: 18px;
            height: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.7rem;
        }

        .user-profile {
            display: flex;
            align-items: center;
            cursor: pointer;
            max-width: 60%;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: var(--primary-color);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            margin-right: 10px;
            overflow: hidden;
            flex-shrink: 0;
        }

        .user-avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        /* Content Area Styles */
        .content {
            padding: 30px;
        }

        .content-header {
            margin-bottom: 30px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
        }

        .welcome-text {
            font-size: 1.8rem;
            font-weight: 600;
            margin-bottom: 5px;
        }

        .date-text {
            color: var(--text-light);
            font-size: 0.9rem;
        }

        /* Form Styles */
        .form-container {
            background-color: var(--white);
            border-radius: 10px;
            padding: 30px;
            box-shadow: var(--shadow);
            margin-bottom: 30px;
        }

        .form-group {
            margin-bottom: 25px;
        }

        .form-label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
        }

        .form-control {
            width: 100%;
            padding: 10px 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 1rem;
            transition: var(--transition);
        }

        .form-control:focus {
            border-color: var(--primary-color);
            outline: none;
        }

        .radio-group {
            display: flex;
            gap: 20px;
            margin-top: 10px;
        }

        .radio-option {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .checkbox-group {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
            margin-top: 10px;
        }

        .checkbox-option {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .file-upload {
            border: 2px dashed #ddd;
            border-radius: 5px;
            padding: 20px;
            text-align: center;
            cursor: pointer;
            transition: var(--transition);
        }

        .file-upload:hover {
            border-color: var(--primary-color);
        }

        .file-upload i {
            font-size: 2rem;
            color: var(--text-light);
            margin-bottom: 10px;
        }

        .file-input {
            display: none;
        }

        .btn {
            padding: 10px 20px;
            border-radius: 5px;
            border: none;
            cursor: pointer;
            font-weight: 500;
            transition: var(--transition);
            min-width: 80px;
        }

        .btn-primary {
            background-color: var(--primary-color);
            color: white;
        }

        .btn-primary:hover {
            background-color: var(--secondary-color);
        }

        .btn-secondary {
            background-color: #f0f0f0;
            color: var(--text-color);
        }

        .btn-secondary:hover {
            background-color: #e0e0e0;
        }

        .form-actions {
            display: flex;
            justify-content: space-between;
            margin-top: 30px;
            flex-wrap: wrap;
            gap: 15px;
        }

        /* Summernote Customization */
        .note-editor.note-frame {
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        /* Mobile Menu Toggle */
        .menu-toggle {
            display: none;
            position: fixed;
            top: 15px;
            left: 15px;
            z-index: 1001;
            background-color: var(--primary-color);
            color: white;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: var(--transition);
        }

        /* Overlay for mobile menu */
        .sidebar-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 999;
        }

        /* Responsive Styles */
        @media (max-width: 1200px) {
            .sidebar {
                width: var(--sidebar-collapsed-width);
            }

            .sidebar-header,
            .menu-text {
                display: none;
            }

            .menu-item {
                justify-content: center;
                padding: 12px 0;
            }

            .menu-item i {
                margin-right: 0;
            }

            .main-content {
                margin-left: var(--sidebar-collapsed-width);
            }
        }

        @media (max-width: 992px) {
            .content {
                padding: 20px;
            }

            .welcome-text {
                font-size: 1.5rem;
            }
        }

        @media (max-width: 768px) {
            .navbar {
                flex-direction: column;
                align-items: flex-start;
                padding: 15px;
            }

            .search-bar {
                width: 100%;
                max-width: 100%;
                margin-bottom: 15px;
            }

            .navbar-right {
                width: 100%;
                justify-content: space-between;
            }

            .content {
                padding: 15px;
            }

            .form-container {
                padding: 20px;
            }

            .form-actions {
                flex-direction: column;
            }

            .form-actions .btn {
                width: 100%;
            }
        }

        @media (max-width: 576px) {
            .sidebar {
                width: var(--sidebar-width);
                transform: translateX(-100%);
                position: fixed;
                z-index: 1000;
            }

            .sidebar.active {
                transform: translateX(0);
            }

            .main-content {
                margin-left: 0;
            }

            .menu-toggle {
                display: flex;
            }

            .menu-text {
                display: block;
            }

            .welcome-text {
                font-size: 1.3rem;
            }

            .content {
                padding: 10px;
            }

            .form-container {
                padding: 15px;
            }

            .sidebar-overlay.active {
                display: block;
            }
        }

        /* Logout Button */
        .logout-btn {
            margin-left: 5px;
            color: var(--text-light);
            cursor: pointer;
            transition: color 0.2s ease;
            display: flex;
            align-items: center;
        }

        .logout-btn:hover {
            color: var(--primary-color);
        }

        .user-profile {
            display: flex;
            align-items: center;
            cursor: default;
        }

        .resource-item {
            display: flex;
            align-items: center;
            gap: 15px;
            padding: 15px;
            border: 1px solid var(--border-color);
            border-radius: 6px;
            margin-bottom: 15px;
        }

        .resource-item .form-group {
            flex: 1;
            margin-bottom: 0;
        }

        .resource-item-actions .btn-remove {
            background-color: red;
            color: white;
            border: none;
            width: 38px;
            height: 38px;
            border-radius: 50%;
            cursor: pointer;
            font-size: 16px;
        }

        .btn-add-more {
            background-color: #28a745;
            color: white;
            border: none;
            padding: 10px 20px;
            font-weight: 600;
            border-radius: 4px;
            cursor: pointer;
        }

        .btn-add-more i {
            margin-right: 8px;
        }
    </style>
    {{-- @include('business.layouts.styles') --}}
</head>

<body>
    <!-- Sidebar -->
    {{-- <div class="sidebar">
        <div class="sidebar-header">
            <a href="#" class="text-xl md:text-2xl font-bold"><img src="logo.jpg" alt="logo" width="200"
                    height="60"></a>
        </div>
        <div class="menu">
            <a href="Dashboard.html">
                <div class="menu-item" data-content="dashboard">
                    <i class="icon">📊</i>
                    <span class="menu-text">Dashboard</span>
                </div>
            </a>
            <a href="Profile-Management.html">
                <div class="menu-item" data-content="profile">
                    <i class="icon">👤</i>
                    <span class="menu-text">Profile Management</span>
                </div>
            </a>
            <a href="Products-&-Services.html">
                <div class="menu-item active" data-content="products">
                    <i class="icon">💊</i>
                    <span class="menu-text">Products & Services</span>
                </div>
            </a>
            <a href="Inquiries.html">
                <div class="menu-item" data-content="inquiries">
                    <i class="icon">📩</i>
                    <span class="menu-text">Inquiries</span>
                </div>
            </a>
            <a href="Reviews.html">
                <div class="menu-item" data-content="reviews">
                    <i class="icon">⭐</i>
                    <span class="menu-text">Reviews</span>
                </div>
            </a>
            <a href="Analytics.html">
                <div class="menu-item" data-content="analytics">
                    <i class="icon">📈</i>
                    <span class="menu-text">Analytics</span>
                </div>
            </a>
            <a href="Settings.html">
                <div class="menu-item" data-content="settings">
                    <i class="icon">⚙️</i>
                    <span class="menu-text">Settings</span>
                </div>
            </a>
        </div>
    </div> --}}
    @include('business.layouts.sidebar')

    <!-- Main Content -->
    <div class="main-content">
        <!-- Navbar -->
        {{-- <div class="navbar">
            <div class="navbar-right">
                <div class="search-bar">

                </div>

                <div class="user-profile">
                    <a href="Profile-Management.html">
                        <div class="user-avatar">
                            <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="John Doe">
                        </div>
                    </a>
                    <span>John Doe</span>
                    <a href="#" class="logout-btn" title="Logout">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" align="right"
                            fill="currentColor" viewBox="0 0 16 16">
                            <path d="M8.5 10c-.276 0-.5-.448-.5-1s.224-1 .5-1 .5.448.5 1-.224 1-.5 1z" />
                            <path
                                d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2.5a.5.5 0 0 0 1 0v-2.5a1.5 1.5 0 0 0-1.5-1.5h-8A1.5 1.5 0 0 0 0 4.5v9A1.5 1.5 0 0 0 1.5 15h8a1.5 1.5 0 0 0 1.5-1.5v-2.5a.5.5 0 0 0-1 0v2.5z" />
                            <path
                                d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z" />
                        </svg>
                    </a>
                </div>
            </div>
        </div> --}}
        {{-- @include('business.layouts.navbar') --}}

        <!-- Content Area -->
        @include('sweetalert::alert')
        <div class="content">
            <!-- Products & Services Content -->
            <div id="products-content" class="content-section">
                <div class="content-header">
                    <div>
                        <h1 class="welcome-text">
                            @if ($productData)
                                Edit
                            @else
                                Add New
                            @endif Product / Service
                        </h1>
                        <p class="date-text">{{ \Carbon\Carbon::now()->format('l, d F Y') }}</p>
                    </div>
                    <a href="{{ route('business.product.list', ['ty' => custom_encrypt('BusinessProductList')]) }}"><button
                            class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Back to Products
                        </button></a>
                </div>

                <div class="form-container">
                    <form id="product-service-form" action="{{ route('business.products.store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @if ($productData)
                            <input type="hidden" name="product_id" value="{{ custom_encrypt($productData?->id) }}">
                        @endif
                        <div class="form-group">
                            <label class="form-label">Product / Service Name</label>
                            <input type="text" class="form-control" id="product-name"
                                value="{{ old('product_name', $productData?->name) }}"
                                placeholder="Enter product or service name" required name="product_name">
                            @if (isset($errors) && $errors->has('product_name'))
                                <small class="text-danger">{{ $errors->first('product_name') }}</small>
                            @endif

                        </div>

                        <div class="form-group">
                            <label class="form-label">SKU</label>
                            <input type="text" class="form-control" id="product-sku" placeholder="Enter SKU" required
                                name="sku" value="{{ old('sku', $productData?->sku) }}">
                            @if (isset($errors) && $errors->has('sku'))
                                <small class="text-danger">{{ $errors->first('sku') }}</small>
                            @endif
                            {{-- @error('sku')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror --}}
                        </div>
                        <div class="form-group">
                            <label class="form-label">Category</label>
                            <select class="form-control" id="product-category" required name="product_category">
                                <option value="" disabled selected>Select Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category?->id }}"
                                        {{ $productData?->productCategory_id == $category?->id ? 'selected' : '' }}>
                                        {{ $category?->name }}</option>
                                @endforeach
                            </select>
                            @if (isset($errors) && $errors->has('product_category'))
                                <small class="text-danger">{{ $errors->first('product_category') }}</small>
                            @endif

                        </div>
                        <div class="form-group">
                            <label class="form-label">Sub Category</label>
                            <select class="form-control" id="product-subcategory" name="subcategory_id"
                                data-selected="{{ old('subcategory_id', $product->subcategory_id ?? '') }}">
                                <option value="">Select Subcategory</option>
                                @foreach ($subcategories as $subcategory)
                                    <option value="{{ $subcategory?->id }}"
                                        {{ old('subcategory_id', $productData?->subcategory_id) == $subcategory?->id ? 'selected' : '' }}>
                                        {{ $subcategory?->name }}
                                    </option>
                                @endforeach
                            </select>
                            @if (isset($errors) && $errors->has('subcategory_id'))
                                <small class="text-danger">{{ $errors->first('subcategory_id') }}</small>
                            @endif
                        </div>
                        <div class="form-group">
                            <label class="form-label">Quantity</label>
                            <input type="number" class="form-control" id="product-quantity"
                                placeholder="Enter Quantity" required name="quantity" min="0"
                                value="{{ old('quantity', $productData?->quantity) }}" minlength="1" maxlength="6">
                            @if (isset($errors) && $errors->has('quantity'))
                                <small class="text-danger">{{ $errors->first('quantity') }}</small>
                            @endif
                        </div>
                        <div class="form-group">
                            <label class="form-label">Price</label>
                            <input type="number" class="form-control" id="product-price" placeholder="Enter Price"
                                required name="price" step="0.01" min="0"
                                value="{{ old('price', $productData?->price) }}" minlength="1" maxlength="6">
                            @if (isset($errors) && $errors->has('price'))
                                <small class="text-danger">{{ $errors->first('price') }}</small>
                            @endif
                        </div>

                        <div class="form-group">
                            <label class="form-label">Item Type</label>
                            <div class="radio-group">
                                <div class="radio-option">
                                    <input type="radio" id="product-type" name="item_type" value="Product" checked
                                        {{ old('item_type', $productData?->item_type) == 'Product' ? 'checked' : '' }}>
                                    <label for="product-type">Product</label>
                                </div>
                                <div class="radio-option">
                                    <input type="radio" id="service-type" name="item_type" value="Service"
                                        {{ old('item_type', $productData?->item_type) == 'Service' ? 'checked' : '' }}>
                                    <label for="service-type">Service</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Product Images</label>
                            <div class="file-upload" id="image-upload-area">
                                <i class="fas fa-cloud-upload-alt"></i>
                                <p>Click to upload or drag and drop</p>
                                <p>PNG, JPG, GIF up to 10MB</p>
                                <input type="file" class="file-input" id="product-images" multiple
                                    accept="image/*" name="product_images[]">
                            </div>
                            <div id="file-list" style="margin-top: 10px;">
                                @if ($productData?->images)
                                    @foreach ($productData?->images as $image)
                                        <div class="file-item">
                                            <a href="{{ asset($image?->path) }}" target="_blank"><i
                                                    class="fa fa-eye" aria-hidden="true"></i></a>
                                            <span>{{ basename($image?->path) }}</span>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Pharma Certificates</label>
                            <div class="checkbox-group">
                                <div class="checkbox-option">
                                    <input type="checkbox" id="gmp-cert" name="certificates[]" value="gmp"
                                        {{ in_array('gmp', old('certificates', $existingCerts)) ? 'checked' : '' }}>
                                    <label for="gmp-cert">GMP (Good Manufacturing Practice)</label>
                                </div>
                                <div class="checkbox-option">
                                    <input type="checkbox" id="fda-cert" name="certificates[]" value="fda"
                                        {{ in_array('fda', old('certificates', $existingCerts)) ? 'checked' : '' }}>
                                    <label for="fda-cert">FDA Approved</label>
                                </div>
                                <div class="checkbox-option">
                                    <input type="checkbox" id="iso-cert" name="certificates[]" value="iso"
                                        {{ in_array('iso', old('certificates', $existingCerts)) ? 'checked' : '' }}>
                                    <label for="iso-cert">ISO 9001</label>
                                </div>
                                <div class="checkbox-option">
                                    <input type="checkbox" id="who-cert" name="certificates[]" value="who"
                                        {{ in_array('who', old('certificates', $existingCerts)) ? 'checked' : '' }}>
                                    <label for="who-cert">WHO Certified</label>
                                </div>
                                <div class="checkbox-option">
                                    <input type="checkbox" id="other-cert" name="certificates[]" value="other"
                                        {{ in_array('other', old('certificates', $existingCerts)) ? 'checked' : '' }}>
                                    <label for="other-cert">Other</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Overview</label>
                            <textarea id="overview-editor" class="form-control" name="overview">{!! $productData?->overview !!}</textarea>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Specifications</label>
                            <textarea id="specifications-editor" class="form-control" name="specification">{!! $productData?->specification !!}</textarea>
                        </div>
                        <div class="tab-content" id="resources">
                            <h2 class="section-title">Downloads & Resources</h2>
                            <div id="resource-repeater-container">
                                {{-- @dd($productData?->resources) --}}
                                @if ($productData?->resources)
                                    @foreach ($productData?->resources as $resource)
                                        <div class="resource-item" data-id="{{ $resource->id }}">
                                            <div class="form-group">
                                                <label>Resource Title</label>
                                                <input type="text" class="form-control"
                                                    placeholder="e.g., Product Datasheet" name="resource_title[]"
                                                    value="{{ $resource->resource_name }}" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Upload File</label>
                                                @if ($resource->resource_url)
                                                    <a href="{{ asset($resource->resource_url) }}" target="_blank"><i
                                                            class="fa fa-eye" aria-hidden="true"></i></a>
                                                @endif
                                                <input type="file" class="form-control" name="resource_file[]"
                                                    {{ $resource->resource_url ? '' : 'required' }}>
                                            </div>
                                            <div class="resource-item-actions">
                                                <button type="button" class="btn-remove resource-deleteBtn"
                                                    style=""><i class="fas fa-trash"></i></button>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                <div class="resource-item">
                                    <div class="form-group">
                                        <label>Resource Title</label>
                                        <input type="text" class="form-control"
                                            placeholder="e.g., Product Datasheet" name="resource_title[]"
                                            value="" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Upload File</label>
                                       
                                        <input type="file" class="form-control" name="resource_file[]"
                                            >
                                    </div>
                                    <div class="resource-item-actions">
                                        <button type="button" class="btn-remove"
                                            style="visibility: hidden;"><i class="fas fa-trash"></i></button>
                                    </div>
                                </div>
                                @endif
                            </div>
                            <button type="button" id="add-resource-btn" class="btn-add-more"><i
                                    class="fas fa-plus"></i> Add More Resources</button>
                        </div>

                        {{-- <div class="form-group">
                            <label class="form-label">Resources</label>
                            <textarea id="resources-editor" class="form-control"></textarea>
                        </div> --}}

                        <div class="form-actions">
                            <button type="reset" class="btn btn-secondary" id="cancel-btn">Cancel</button>
                            <button type="submit" class="btn btn-primary" id="save-btn">Save Product /
                                Service</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Mobile Menu Toggle (Hidden on Desktop) -->
    <div class="menu-toggle">
        <i class="icon">≡</i>
    </div>

    <!-- Overlay for mobile menu -->
    <div class="sidebar-overlay"></div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    {{-- @include('layouts.commonjs') --}}
    <script>
        $(document).ready(function() {
            // Resource Repeater Logic
            $('#add-resource-btn').on('click', function() {
                const resourceContainer = $('#resource-repeater-container');
                const firstItem = resourceContainer.find('.resource-item:first');
                const newItem = firstItem.clone();

                newItem.find('input').val('');
                newItem.find('.btn-remove').css('visibility', 'visible');

                resourceContainer.append(newItem);
            });
            $('#resource-repeater-container').on('click', '.resource-deleteBtn', function() {
                let $row = $(this).closest('.resource-item');
                let resourceId = $row.data(
                'id'); // assume you store existing resource ID in data-id attribute

                if ($('#resource-repeater-container .resource-item').length <= 1) {
                    Swal.fire({
                        icon: 'warning',
                        title: 'At least one resource is required',
                    });
                    return;
                }

                if (resourceId) {
                    // 🔹 Existing resource: confirm deletion
                    Swal.fire({
                        title: 'Are you sure?',
                        text: "You won't be able to revert this!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!',
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $.ajax({
                                url: '/api/business/resource/delete/' +
                                resourceId, // your backend route
                                type: 'DELETE',
                                data: {
                                    _token: $('meta[name="csrf-token"]').attr('content')
                                },
                                success: function(response) {
                                    if (response.success) {
                                        $row.remove();
                                        Swal.fire('Deleted!', response.message,
                                            'success');
                                    } else {
                                        Swal.fire('Error!', response.message, 'error');
                                    }
                                },
                                error: function(xhr) {
                                    Swal.fire('Error!', 'Something went wrong.',
                                        'error');
                                }
                            });
                        }
                    });
                } else {
                    // 🔹 New resource row: just remove
                    $row.remove();
                }
            });
            // $('#resource-repeater-container').on('click', '.btn-remove', function() {
            //     if ($('#resource-repeater-container .resource-item').length > 1) {
            //         $(this).closest('.resource-item').remove();
            //     } else {
            //         alert("At least one resource item is required.");
            //     }
            // });

            function loadSubcategories(categoryId, selectedSubcategoryId = null) {
                if (categoryId) {
                    $.ajax({
                        url: `/api/subcategories/${categoryId}`,
                        type: "GET",
                        success: function(response) {
                            let subCategoryInput = $('#product-subcategory');
                            subCategoryInput.empty();
                            subCategoryInput.append('<option value="">Select Subcategory</option>');

                            $.each(response.data, function(key, value) {
                                subCategoryInput.append(
                                    `<option value="${value.id}">${value.name}</option>`);
                            });

                            // ✅ If editing existing product, select saved subcategory
                            if (selectedSubcategoryId) {
                                subCategoryInput.val(selectedSubcategoryId);
                            }
                        },
                        error: function() {
                            Swal.fire('Error', 'Failed to load subcategories', 'error');
                        }
                    });
                }
            }

            // 🔹 On category change
            $('#product-category').on('change', function() {
                let categoryId = $(this).val();
                loadSubcategories(categoryId);
            });
            let categoryId = $('#product-category').val();
            let selectedSubcategoryId = $('#product-subcategory').data('selected');
            // loadSubcategories(categoryId, selectedSubcategoryId);
        });
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize Summernote editors
            $('#overview-editor').summernote({
                height: 200,
                placeholder: 'Enter product/service overview...',
                toolbar: [
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['font', ['strikethrough', 'superscript', 'subscript']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['height', ['height']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ]
            });

            $('#specifications-editor').summernote({
                height: 200,
                placeholder: 'Enter product specifications...',
                toolbar: [
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['font', ['strikethrough', 'superscript', 'subscript']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['height', ['height']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ]
            });

            $('#resources-editor').summernote({
                height: 200,
                placeholder: 'Enter additional resources...',
                toolbar: [
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['font', ['strikethrough', 'superscript', 'subscript']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['height', ['height']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ]
            });

            // File upload handling
            const fileInput = document.getElementById('product-images');
            const fileList = document.getElementById('file-list');
            const uploadArea = document.getElementById('image-upload-area');

            uploadArea.addEventListener('click', function() {
                fileInput.click();
            });

            uploadArea.addEventListener('dragover', function(e) {
                e.preventDefault();
                uploadArea.style.borderColor = 'var(--primary-color)';
                uploadArea.style.backgroundColor = 'rgba(21, 68, 218, 0.05)';
            });

            uploadArea.addEventListener('dragleave', function() {
                uploadArea.style.borderColor = '#ddd';
                uploadArea.style.backgroundColor = 'transparent';
            });

            uploadArea.addEventListener('drop', function(e) {
                e.preventDefault();
                uploadArea.style.borderColor = '#ddd';
                uploadArea.style.backgroundColor = 'transparent';

                if (e.dataTransfer.files.length) {
                    fileInput.files = e.dataTransfer.files;
                    updateFileList();
                }
            });

            fileInput.addEventListener('change', updateFileList);

            function updateFileList() {
                fileList.innerHTML = '';
                if (fileInput.files.length > 0) {
                    const fileCount = document.createElement('p');
                    fileCount.textContent = `${fileInput.files.length} file(s) selected`;
                    fileList.appendChild(fileCount);

                    for (let i = 0; i < fileInput.files.length; i++) {
                        const fileItem = document.createElement('div');
                        fileItem.textContent = fileInput.files[i].name;
                        fileItem.style.marginTop = '5px';
                        fileItem.style.padding = '5px';
                        fileItem.style.backgroundColor = '#f5f5f5';
                        fileItem.style.borderRadius = '3px';
                        fileList.appendChild(fileItem);
                    }
                }
            }

            // Form submission
            // document.getElementById('product-service-form').addEventListener('submit', function(e) {
            //     e.preventDefault();

            //     // Get form data
            //     const productName = document.getElementById('product-name').value;
            //     const productSKU = document.getElementById('product-sku').value;
            //     const itemType = document.querySelector('input[name="item-type"]:checked').value;
            //     const overview = $('#overview-editor').summernote('code');
            //     const specifications = $('#specifications-editor').summernote('code');
            //     const resources = $('#resources-editor').summernote('code');

            //     // Get selected certificates
            //     const selectedCertificates = [];
            //     document.querySelectorAll('input[name="certificates"]:checked').forEach(function(checkbox) {
            //         selectedCertificates.push(checkbox.value);
            //     });

            //     // In a real application, you would send this data to the server
            //     alert(`Product/Service "${productName}" has been saved successfully!`);

            //     // Reset form
            //     this.reset();
            //     $('#overview-editor').summernote('reset');
            //     $('#specifications-editor').summernote('reset');
            //     $('#resources-editor').summernote('reset');
            //     fileList.innerHTML = '';
            // });

            // Back button functionality
            // document.getElementById('back-btn').addEventListener('click', function() {
            //     // In a real application, this would navigate back to the products list
            //     alert('Navigating back to products list...');
            // });

            // Cancel button functionality
            // document.getElementById('cancel-btn').addEventListener('click', function() {
            //     if (confirm('Are you sure you want to cancel? All unsaved changes will be lost.')) {
            //         // In a real application, this would navigate back to the products list
            //         alert('Cancelled. Navigating back to products list...');
            //     }
            // });

            // Mobile Menu Toggle
            const menuToggle = document.querySelector('.menu-toggle');
            const sidebar = document.querySelector('.sidebar');
            const sidebarOverlay = document.querySelector('.sidebar-overlay');

            menuToggle.addEventListener('click', function() {
                sidebar.classList.toggle('active');
                sidebarOverlay.classList.toggle('active');
            });

            sidebarOverlay.addEventListener('click', function() {
                sidebar.classList.remove('active');
                sidebarOverlay.classList.remove('active');
            });

            // Close sidebar when clicking on menu items in mobile view
            const menuItems = document.querySelectorAll('.menu-item');
            menuItems.forEach(item => {
                item.addEventListener('click', function() {
                    if (window.innerWidth <= 576) {
                        sidebar.classList.remove('active');
                        sidebarOverlay.classList.remove('active');
                    }
                });
            });

            // Check screen size and show/hide menu toggle accordingly
            function checkScreenSize() {
                if (window.innerWidth <= 576) {
                    menuToggle.style.display = 'flex';
                } else {
                    menuToggle.style.display = 'none';
                    sidebar.classList.remove('active');
                    sidebarOverlay.classList.remove('active');
                }
            }

            // Initial check
            checkScreenSize();

            // Add resize event listener
            window.addEventListener('resize', checkScreenSize);
        });
    </script>
</body>

</html>
