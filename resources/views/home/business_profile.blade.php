<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <!-- Enhanced mobile viewport settings -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>SCIZORA | Pharmaceutical Company</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

        .rating-progress::-webkit-progress-value {
            background-color: #FACC15;
        }

        .rating-progress::-moz-progress-bar {
            background-color: #FACC15;
        }

        .company-logo-container {
            background: linear-gradient(135deg, #000000 0%, #4B5563 100%);
        }

        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7);
            z-index: 1000;
            overflow-y: auto;
        }

        .modal-content {
            background-color: white;
            margin: 5% auto;
            width: 90%;
            max-width: 800px;
            border-radius: 8px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
            animation: modalFadeIn 0.3s;
        }

        @keyframes modalFadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .carousel {
            position: relative;
            overflow: hidden;
        }

        .carousel-inner {
            display: flex;
            transition: transform 0.5s ease;
        }

        .carousel-item {
            min-width: 100%;
            position: relative;
        }

        .carousel-control {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background-color: rgba(0, 0, 0, 0.5);
            color: white;
            border: none;
            padding: 10px;
            cursor: pointer;
            z-index: 10;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .carousel-control.prev {
            left: 15px;
        }

        .carousel-control.next {
            right: 15px;
        }

        .carousel-indicators {
            position: absolute;
            bottom: 15px;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            gap: 8px;
            z-index: 10;
        }

        .carousel-indicator {
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background-color: rgba(255, 255, 255, 0.5);
            cursor: pointer;
        }

        .carousel-indicator.active {
            background-color: white;
        }

        .review-form {
            display: none;
        }

        .all-reviews {
            display: none;
        }

        .expanded .all-reviews {
            display: block;
        }

        .products-grid {
            transition: all 0.3s ease;
        }

        /* Mobile menu styles */
        .mobile-menu {
            display: none;
            position: fixed;
            top: 70px;
            left: 0;
            width: 100%;
            background: white;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            z-index: 100;
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease-out;
        }

        .mobile-menu.active {
            display: block;
            max-height: 100vh;
            transition: max-height 0.5s ease-in;
            overflow-y: auto;
        }

        .mobile-menu a {
            display: block;
            padding: 12px 20px;
            border-bottom: 1px solid #eee;
            color: #333;
            text-decoration: none;
        }

        .mobile-menu a:hover {
            background-color: #f5f5f5;
        }

        .mobile-menu .p-4 {
            padding: 1rem;
        }

        /* Mobile-specific adjustments */
        @media (max-width: 767px) {

            /* Adjust header padding for mobile */
            header {
                padding: 10px 0;
            }

            /* Make buttons more touch-friendly */
            button,
            .button {
                min-height: 44px;
                /* Minimum touch target size */
                padding: 12px 16px;
            }

            /* Adjust modal for mobile */
            .modal-content {
                margin: 2% auto;
                width: 95%;
            }

            /* Make carousel images fit better on mobile */
            .carousel-item img {
                height: 250px;
                object-fit: contain;
            }

            /* Adjust product grid for mobile */
            .products-grid {
                grid-template-columns: 1fr;
                gap: 16px;
            }

            /* Make review section single column on mobile */
            .reviews-grid {
                grid-template-columns: 1fr !important;
            }

            /* Adjust font sizes for mobile */
            h1 {
                font-size: 1.5rem;
            }

            h2 {
                font-size: 1.3rem;
            }

            h3 {
                font-size: 1.1rem;
            }

            /* Make form inputs more mobile-friendly */
            input,
            textarea,
            select {
                font-size: 16px;
                /* Prevent iOS zoom on focus */
                min-height: 44px;
                /* Minimum touch target size */
            }

            /* Adjust spacing for mobile */
            .section-spacing {
                padding: 1.5rem 0;
            }

            /* Make company logo banner more compact */
            .company-logo-container {
                padding: 2rem 0;
            }

            /* Adjust footer layout for mobile */
            footer .grid {
                grid-template-columns: 1fr;
                gap: 2rem;
            }
        }

        /* Tablet-specific adjustments */
        @media (min-width: 768px) and (max-width: 1023px) {

            /* Adjust product grid for tablets */
            .products-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            /* Make review section single column on tablets */
            .reviews-grid {
                grid-template-columns: 1fr !important;
            }
        }

        /* Hero Banner Styles */
        .hero-banner {
            position: relative;
            background-image: url('https://images.unsplash.com/photo-1618494957589-e1aa24f15598?w=1200');
            background-size: cover;
            background-position: center;
            height: 450px;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            padding: 20px;
        }

        .hero-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
        }

        .hero-content {
            position: relative;
            z-index: 2;
            max-width: 800px;
            color: white;
        }

        .hero-logo {
            width: 150px;
            height: 150px;
            background-color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
        }

        .hero-logo-inner {
            background: linear-gradient(135deg, #000000 0%, #4B5563 100%);
            width: 130px;
            height: 130px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .hero-title {
            font-size: 3rem;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .hero-tagline {
            font-size: 1.5rem;
            font-weight: 300;
            margin-bottom: 20px;
        }

        /* Purple accent color for brand */
        .text-purple {
            color: #1544da;
        }

        .bg-purple {
            background-color: #1544da;
        }

        .hover\:bg-purple:hover {
            background-color: #1137b0;
            /* A darker blue for hover */
        }

        .border-purple {
            border-color: #1544da;
        }

        .hover\:bg-purple-light:hover {
            background-color: rgba(21, 68, 218, 0.1);
        }

        .bg-purple-light {
            background-color: rgba(21, 68, 218, 0.1);
        }
    </style>
</head>

<body class="bg-gray-50">
    <!-- Header with mobile menu toggle -->
    <header class="bg-white shadow-sm sticky top-0 z-50">
        <div class="container mx-auto px-4 py-3 flex justify-between items-center">
            <div class="flex items-center">
                <a href="#" class="text-xl md:text-2xl font-bold"><img src="logo.jpg" alt="logo" width="200"
                        height="60"></a>
            </div>

            <!-- Desktop Navigation -->
            <nav class="hidden md:flex space-x-6">
                <a href="#" class="text-gray-700 hover:text-purple font-medium">Home</a>
                <a href="#" class="text-gray-700 hover:text-purple font-medium">Products</a>
                <a href="#" class="text-gray-700 hover:text-purple font-medium">Reviews</a>
                <a href="#" class="text-gray-700 hover:text-purple font-medium">Blog</a>
                <a href="#" class="text-gray-700 hover:text-purple font-medium">About</a>
                <a href="#" class="text-gray-700 hover:text-purple font-medium">Contact</a>
            </nav>

            <div class="flex items-center space-x-3">
                <button
                    class="hidden sm:inline-block px-3 py-1.5 text-gray-700 font-medium rounded-md hover:bg-gray-100">Login</button>
                <button
                    class="hidden sm:inline-block px-3 py-1.5 bg-purple text-white font-medium rounded-md hover:bg-purple transition">Register</button>
                <button
                    class="hidden sm:inline-block px-3 py-1.5 bg-green-600 text-white font-medium rounded-md hover:bg-green-700 transition">Get
                    a Quote</button>
                <!-- Mobile menu button -->
                <button id="mobileMenuButton" class="md:hidden text-gray-700 focus:outline-none">
                    <i class="fas fa-bars text-xl"></i>
                </button>
            </div>
        </div>

        <!-- Mobile Menu (hidden by default) -->
        <div id="mobileMenu" class="mobile-menu">
            <a href="#" class="text-gray-700 hover:bg-gray-100">Home</a>
            <a href="#" class="text-gray-700 hover:bg-gray-100">Products</a>
            <a href="#" class="text-gray-700 hover:bg-gray-100">Reviews</a>
            <a href="#" class="text-gray-700 hover:bg-gray-100">Blogs</a>
            <a href="#" class="text-gray-700 hover:bg-gray-100">About</a>
            <a href="#" class="text-gray-700 hover:bg-gray-100">Contact</a>
            <div class="p-4 border-t border-gray-200">
                <button
                    class="w-full mb-2 px-3 py-2 text-gray-700 font-medium rounded-md hover:bg-gray-100">Login</button>
                <button
                    class="w-full mb-2 px-3 py-2 bg-purple text-white font-medium rounded-md hover:bg-purple transition">Register</button>
                <button
                    class="w-full px-3 py-2 bg-green-600 text-white font-medium rounded-md hover:bg-green-700 transition">Get
                    a Quote</button>
            </div>
        </div>
    </header>

    <!-- Hero Banner Section -->
    <div class="hero-banner">
        <div class="hero-overlay"></div>
        <div class="hero-content">
            <div class="hero-logo">
                <div class="hero-logo-inner">
                    <span class="text-white text-2xl font-bold">SCI</span>
                </div>
            </div>
            <h1 class="hero-title">
                <span class="text-purple">
                    @if(!empty($businessDetails->name))
                        {{ $businessDetails->name }}
                    @endif
                </span>
            </h1>
            <p class="hero-tagline">"Innovating Healthcare Through Quality Pharmaceuticals"</p>
            <div class="mt-4 flex items-center justify-center">
                <div class="flex text-yellow-400 mr-3">
                    @php
                        $avgRating = $businessDetails->reviews->avg('rating'); // Average rating
                        $roundedRating = floor($avgRating);
                    @endphp

                    @for($i = 1; $i <= 5; $i++)
                        <i class="fas fa-star {{ $i <= $roundedRating ? '' : 'text-gray-300' }}"></i>
                    @endfor

                    {{-- Half star if needed --}}
                    @if($avgRating - $roundedRating >= 0.5)
                        <i class="fas fa-star-half-alt"></i>
                    @endif
                </div>
                <span class="text-white">
                    {{ number_format($avgRating, 1) }} · {{ $businessDetails->reviews->count() }} reviews · Verified
                    <i class="fas fa-check-circle ml-1"></i>
                </span>
            </div>
        </div>
    </div>

    <!-- About & Contact Section -->
    <div class="container mx-auto px-4 py-8">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- About Section -->
            <div class="bg-white rounded-lg shadow-sm p-6">
                <h2 class="text-xl font-semibold text-gray-800 mb-4">About Our Company</h2>
                <p class="text-gray-600 mb-4">
                    SCIZORA is a leading pharmaceutical company dedicated to improving global health through innovative
                    medicines and healthcare solutions. Founded in 2005, we have grown to become a trusted name in the
                    industry.
                </p>
                <p class="text-gray-600 mb-4">
                    Our state-of-the-art manufacturing facilities are WHO-GMP and ISO 9001 certified, ensuring the
                    highest quality standards for all our products. We specialize in generic medicines, vaccines, and
                    specialty pharmaceuticals.
                </p>
                <div class="mt-6">
                    <h3 class="font-semibold text-gray-800 mb-2">Certifications</h3>
                    <div class="flex flex-wrap gap-2">
                        <span class="px-3 py-1 bg-purple-light text-purple rounded-full text-sm">WHO-GMP</span>
                        <span class="px-3 py-1 bg-purple-light text-purple rounded-full text-sm">ISO 9001:2015</span>
                        <span class="px-3 py-1 bg-purple-light text-purple rounded-full text-sm">FDA Approved</span>
                        <span class="px-3 py-1 bg-purple-light text-purple rounded-full text-sm">EU-GMP</span>
                    </div>
                </div>
            </div>

            <!-- Contact Section -->
            <div class="bg-white rounded-lg shadow-sm p-6">
                <h3 class="text-xl font-semibold text-gray-800 mb-4">Contact Information</h3>
                <ul class="space-y-3">
                    @if(!empty($businessDetails->contact_number))
                        <li class="flex items-start">
                            <i class="fas fa-phone-alt text-purple mt-1 mr-3"></i>
                            <span class="text-gray-600">{{ $businessDetails->contact_number }}</span>
                        </li>
                    @endif

                    @if(!empty($businessDetails->email))
                        <li class="flex items-start">
                            <i class="fas fa-envelope text-purple mt-1 mr-3"></i>
                            <span class="text-gray-600">{{ $businessDetails->email }}</span>
                        </li>
                    @endif
                    <li class="flex items-start">
                        <i class="fas fa-globe text-purple mt-1 mr-3"></i>
                        <a href="#" class="text-purple hover:underline">www.SCIZORA.com</a>
                    </li>
                    {{-- @if(!empty($businessDetails->website))
                    <li class="flex items-start">
                        <i class="fas fa-globe text-purple mt-1 mr-3"></i>
                        <a href="{{ $businessDetails->website }}" target="_blank" class="text-purple hover:underline">
                            {{ $businessDetails->website }}
                        </a>
                    </li>
                    @endif --}}
                    @if(!empty($businessDetails->locationDetails->address ?? ''))
                        <li class="flex items-start">
                            <i class="fas fa-map-marker-alt text-purple mt-1 mr-3"></i>
                            <span class="text-gray-600">{{ $businessDetails->locationDetails->address }}</span>,
                            <span class="text-gray-600">{{ $businessDetails->locationDetails->city }}</span>,
                            <span class="text-gray-600">{{ $businessDetails->locationDetails->state }}</span>,
                            <span class="text-gray-600">{{ $businessDetails->locationDetails->country }}</span>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </div>

    <!-- Main Content Area -->
    <div class="container mx-auto px-4 py-6 md:py-8 flex flex-col lg:flex-row gap-6 md:gap-8">
        <!-- Main Content -->
        <main class="w-full lg:w-2/3">
            <!-- Products & Services Section -->
            <section class="bg-white rounded-lg shadow-sm p-4 md:p-6 mb-6">
                <h2 class="text-lg md:text-xl font-semibold text-gray-800 mb-4 md:mb-6">Our Products & Services</h2>

                <div id="productsContainer"
                    class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 md:gap-6 products-grid">
                    <!-- Initial products will be loaded here by JavaScript -->
                </div>

                <div class="mt-4 md:mt-6 text-center">
                    <button id="loadMoreProductsBtn"
                        class="px-4 py-2 border border-purple text-purple rounded-md hover:bg-purple-light transition">
                        View All Products
                    </button>
                </div>
            </section>

            <!-- Ratings & Reviews Section -->
            <section class="bg-white rounded-lg shadow-sm p-4 md:p-6 mb-6">
                <h2 class="text-lg md:text-xl font-semibold text-gray-800 mb-4 md:mb-6">Customer Reviews</h2>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 md:gap-8 reviews-grid">
                    <div>
                        <div class="flex items-center mb-3 md:mb-4">
                            <div class="text-3xl md:text-4xl font-bold text-gray-800 mr-3 md:mr-4">4.8</div>
                            <div>
                                <div class="flex text-yellow-400 mb-1">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                </div>
                                <div class="text-gray-600">150 reviews</div>
                            </div>
                        </div>

                        <div class="space-y-2 md:space-y-3">
                            <div class="flex items-center">
                                <span class="w-10 text-gray-600 text-sm md:text-base">5 star</span>
                                <progress class="rating-progress flex-1 h-2" value="60" max="100"></progress>
                                <span class="w-10 text-right text-gray-600 text-sm md:text-base">60%</span>
                            </div>
                            <div class="flex items-center">
                                <span class="w-10 text-gray-600 text-sm md:text-base">4 star</span>
                                <progress class="rating-progress flex-1 h-2" value="25" max="100"></progress>
                                <span class="w-10 text-right text-gray-600 text-sm md:text-base">25%</span>
                            </div>
                            <div class="flex items-center">
                                <span class="w-10 text-gray-600 text-sm md:text-base">3 star</span>
                                <progress class="rating-progress flex-1 h-2" value="10" max="100"></progress>
                                <span class="w-10 text-right text-gray-600 text-sm md:text-base">10%</span>
                            </div>
                            <div class="flex items-center">
                                <span class="w-10 text-gray-600 text-sm md:text-base">2 star</span>
                                <progress class="rating-progress flex-1 h-2" value="3" max="100"></progress>
                                <span class="w-10 text-right text-gray-600 text-sm md:text-base">3%</span>
                            </div>
                            <div class="flex items-center">
                                <span class="w-10 text-gray-600 text-sm md:text-base">1 star</span>
                                <progress class="rating-progress flex-1 h-2" value="2" max="100"></progress>
                                <span class="w-10 text-right text-gray-600 text-sm md:text-base">2%</span>
                            </div>
                        </div>

                        <button id="writeReviewBtn"
                            class="mt-4 md:mt-6 px-4 py-2 bg-purple text-white rounded-md hover:bg-purple transition">
                            <i class="fas fa-pen mr-2"></i> Write a Review
                        </button>
                    </div>

                    <div class="space-y-4 md:space-y-6">
                        <!-- Review 1 -->
                        <div class="border-b border-gray-200 pb-4 md:pb-6">
                            <div class="flex justify-between items-start mb-2">
                                <div class="flex items-center">
                                    <div
                                        class="h-8 w-8 md:h-10 md:w-10 rounded-full bg-gray-300 flex items-center justify-center mr-2 md:mr-3">
                                        <i class="fas fa-user text-gray-500"></i>
                                    </div>
                                    <div>
                                        <h4 class="font-medium text-gray-800 text-sm md:text-base">John D.</h4>
                                        <div class="flex text-yellow-400 text-xs md:text-sm">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                    </div>
                                </div>
                                <span class="text-gray-500 text-xs md:text-sm">2 weeks ago</span>
                            </div>
                            <p class="text-gray-600 text-sm md:text-base">
                                Excellent products and fast delivery. The antibiotics were effective and exactly as
                                described. Will definitely order again from SCIZORA.
                            </p>
                        </div>

                        <!-- Review 2 -->
                        <div class="border-b border-gray-200 pb-4 md:pb-6">
                            <div class="flex justify-between items-start mb-2">
                                <div class="flex items-center">
                                    <div
                                        class="h-8 w-8 md:h-10 md:w-10 rounded-full bg-gray-300 flex items-center justify-center mr-2 md:mr-3">
                                        <i class="fas fa-user text-gray-500"></i>
                                    </div>
                                    <div>
                                        <h4 class="font-medium text-gray-800 text-sm md:text-base">Sarah M.</h4>
                                        <div class="flex text-yellow-400 text-xs md:text-sm">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="far fa-star"></i>
                                        </div>
                                    </div>
                                </div>
                                <span class="text-gray-500 text-xs md:text-sm">1 month ago</span>
                            </div>
                            <p class="text-gray-600 text-sm md:text-base">
                                Good quality products overall. The pain relief tablets worked well, though shipping took
                                a bit longer than expected. Customer service was responsive when I inquired.
                            </p>
                        </div>

                        <!-- Review 3 -->
                        <div class="pb-2">
                            <div class="flex justify-between items-start mb-2">
                                <div class="flex items-center">
                                    <div
                                        class="h-8 w-8 md:h-10 md:w-10 rounded-full bg-gray-300 flex items-center justify-center mr-2 md:mr-3">
                                        <i class="fas fa-user text-gray-500"></i>
                                    </div>
                                    <div>
                                        <h4 class="font-medium text-gray-800 text-sm md:text-base">Robert T.</h4>
                                        <div class="flex text-yellow-400 text-xs md:text-sm">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star-half-alt"></i>
                                        </div>
                                    </div>
                                </div>
                                <span class="text-gray-500 text-xs md:text-sm">2 months ago</span>
                            </div>
                            <p class="text-gray-600 text-sm md:text-base">
                                Impressed with the vitamin supplements. They seem to be high quality and the packaging
                                was professional. The website was easy to navigate for reordering.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Review Form (Hidden by default) -->
                <div id="reviewForm" class="review-form mt-6 md:mt-8 bg-gray-50 p-4 md:p-6 rounded-lg">
                    <h3 class="text-md md:text-lg font-semibold text-gray-800 mb-3 md:mb-4">Write a Review</h3>
                    <form id="submitReviewForm" class="space-y-3 md:space-y-4">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-3 md:gap-4">
                            <div>
                                <label for="reviewName"
                                    class="block text-sm font-medium text-gray-700 mb-1">Name</label>
                                <input type="text" id="reviewName" name="reviewName" required
                                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-purple focus:border-purple">
                            </div>
                            <div>
                                <label for="reviewEmail" class="block text-sm font-medium text-gray-700 mb-1">Email
                                    (Optional)</label>
                                <input type="email" id="reviewEmail" name="reviewEmail"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-purple focus:border-purple">
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Rating</label>
                            <div class="flex space-x-1">
                                <button type="button" class="star-rating" data-rating="1"><i
                                        class="far fa-star text-xl md:text-2xl text-gray-400"></i></button>
                                <button type="button" class="star-rating" data-rating="2"><i
                                        class="far fa-star text-xl md:text-2xl text-gray-400"></i></button>
                                <button type="button" class="star-rating" data-rating="3"><i
                                        class="far fa-star text-xl md:text-2xl text-gray-400"></i></button>
                                <button type="button" class="star-rating" data-rating="4"><i
                                        class="far fa-star text-xl md:text-2xl text-gray-400"></i></button>
                                <button type="button" class="star-rating" data-rating="5"><i
                                        class="far fa-star text-xl md:text-2xl text-gray-400"></i></button>
                            </div>
                            <input type="hidden" id="reviewRating" name="reviewRating" value="0">
                        </div>
                        <div>
                            <label for="reviewTitle" class="block text-sm font-medium text-gray-700 mb-1">Review
                                Title</label>
                            <input type="text" id="reviewTitle" name="reviewTitle" required
                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-purple focus:border-purple">
                        </div>
                        <div>
                            <label for="reviewText" class="block text-sm font-medium text-gray-700 mb-1">Your
                                Review</label>
                            <textarea id="reviewText" name="reviewText" rows="4" required
                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-purple focus:border-purple"></textarea>
                        </div>
                        <div class="flex justify-end space-x-2 md:space-x-3">
                            <button type="button" id="cancelReviewBtn"
                                class="px-3 py-2 md:px-4 md:py-2 border border-gray-300 text-gray-700 rounded-md hover:bg-gray-100 transition">
                                Cancel
                            </button>
                            <button type="submit"
                                class="px-3 py-2 md:px-4 md:py-2 bg-purple text-white rounded-md hover:bg-purple transition">
                                Submit Review
                            </button>
                        </div>
                    </form>
                </div>

                <!-- All Reviews (Hidden by default) -->
                <div id="allReviews" class="all-reviews mt-6 md:mt-8">
                    <h3 class="text-md md:text-lg font-semibold text-gray-800 mb-3 md:mb-4">All Reviews</h3>
                    <div class="space-y-4 md:space-y-6">
                        <!-- Additional Review 4 -->
                        <div class="border-b border-gray-200 pb-4 md:pb-6">
                            <div class="flex justify-between items-start mb-2">
                                <div class="flex items-center">
                                    <div
                                        class="h-8 w-8 md:h-10 md:w-10 rounded-full bg-gray-300 flex items-center justify-center mr-2 md:mr-3">
                                        <i class="fas fa-user text-gray-500"></i>
                                    </div>
                                    <div>
                                        <h4 class="font-medium text-gray-800 text-sm md:text-base">Emily R.</h4>
                                        <div class="flex text-yellow-400 text-xs md:text-sm">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                    </div>
                                </div>
                                <span class="text-gray-500 text-xs md:text-sm">3 months ago</span>
                            </div>
                            <p class="text-gray-600 text-sm md:text-base">
                                The antihistamine syrup worked wonders for my seasonal allergies. I've tried many brands
                                but this one provides the fastest relief without drowsiness.
                            </p>
                        </div>

                        <!-- Additional Review 5 -->
                        <div class="border-b border-gray-200 pb-4 md:pb-6">
                            <div class="flex justify-between items-start mb-2">
                                <div class="flex items-center">
                                    <div
                                        class="h-8 w-8 md:h-10 md:w-10 rounded-full bg-gray-300 flex items-center justify-center mr-2 md:mr-3">
                                        <i class="fas fa-user text-gray-500"></i>
                                    </div>
                                    <div>
                                        <h4 class="font-medium text-gray-800 text-sm md:text-base">Michael B.</h4>
                                        <div class="flex text-yellow-400 text-xs md:text-sm">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="far fa-star"></i>
                                        </div>
                                    </div>
                                </div>
                                <span class="text-gray-500 text-xs md:text-sm">4 months ago</span>
                            </div>
                            <p class="text-gray-600 text-sm md:text-base">
                                Good quality first aid kits. Very comprehensive with clear instructions. The only
                                suggestion would be to include a few more adhesive bandages in different sizes.
                            </p>
                        </div>

                        <!-- Additional Review 6 -->
                        <div class="pb-2">
                            <div class="flex justify-between items-start mb-2">
                                <div class="flex items-center">
                                    <div
                                        class="h-8 w-8 md:h-10 md:w-10 rounded-full bg-gray-300 flex items-center justify-center mr-2 md:mr-3">
                                        <i class="fas fa-user text-gray-500"></i>
                                    </div>
                                    <div>
                                        <h4 class="font-medium text-gray-800 text-sm md:text-base">Jennifer K.</h4>
                                        <div class="flex text-yellow-400 text-xs md:text-sm">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star-half-alt"></i>
                                        </div>
                                    </div>
                                </div>
                                <span class="text-gray-500 text-xs md:text-sm">5 months ago</span>
                            </div>
                            <p class="text-gray-600 text-sm md:text-base">
                                The medical consultation service was very helpful. The pharmacist was knowledgeable and
                                took time to answer all my questions about medication interactions.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="mt-4 md:mt-6 text-center">
                    <button id="viewAllReviewsBtn"
                        class="px-4 py-2 border border-purple text-purple rounded-md hover:bg-purple-light transition">
                        View All Reviews
                    </button>
                </div>
            </section>
        </main>

        <!-- Sidebar -->
        <aside class="w-full lg:w-1/3">
            <div class="lg:sticky lg:top-20 space-y-4 md:space-y-6">
                <!-- Inquiry Form -->
                <div class="bg-white rounded-lg shadow-sm p-4 md:p-6">
                    <h3 class="font-semibold text-gray-800 mb-3 md:mb-4">Send Inquiry</h3>
                    <form id="inquiryForm" class="space-y-3 md:space-y-4">
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Full Name</label>
                            <input type="text" id="name" name="name" required
                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-purple focus:border-purple">
                        </div>
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                            <input type="email" id="email" name="email" required
                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-purple focus:border-purple">
                        </div>
                        <div>
                            <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">Phone
                                (Optional)</label>
                            <input type="tel" id="phone" name="phone"
                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-purple focus:border-purple">
                        </div>
                        <div>
                            <label for="message" class="block text-sm font-medium text-gray-700 mb-1">Message</label>
                            <textarea id="message" name="message" rows="4" required
                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-purple focus:border-purple"></textarea>
                        </div>
                        <button type="submit"
                            class="w-full py-2 bg-purple text-white rounded-md hover:bg-purple transition font-medium">
                            Send Message
                        </button>
                    </form>
                </div>

                <!-- Business Hours -->
                <div class="bg-white rounded-lg shadow-sm p-4 md:p-6">
                    <h3 class="font-semibold text-gray-800 mb-3 md:mb-4">Business Hours</h3>
                    <ul class="space-y-2">
                        <li class="flex justify-between">
                            <span class="text-gray-600">Monday - Friday</span>
                            <span class="font-medium">8:00 AM - 6:00 PM</span>
                        </li>
                        <li class="flex justify-between">
                            <span class="text-gray-600">Saturday</span>
                            <span class="font-medium">9:00 AM - 2:00 PM</span>
                        </li>
                        <li class="flex justify-between">
                            <span class="text-gray-600">Sunday</span>
                            <span class="font-medium">Closed</span>
                        </li>
                    </ul>
                </div>

                <!-- Vertical Ad Banner -->
                <div class="bg-white rounded-lg shadow-sm p-4">
                    <h3 class="font-semibold text-gray-800 mb-3">Sponsored</h3>
                    <img src="https://tpc.googlesyndication.com/simgad/13265185988757716340" alt="Advertisement"
                        class="w-full h-auto">
                </div>
            </div>
        </aside>
    </div>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-6 md:py-8">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 md:gap-8">
                <div>
                    <div class="flex items-center mb-3 md:mb-4">
                        <a href="#" class="text-xl md:text-2xl font-bold"><img src="logo.jpg" alt="logo" width="200"
                                height="60"></a>
                    </div>
                    <p class="text-gray-400 italic mb-2">
                        "Innovating Healthcare Through Quality Pharmaceuticals"
                    </p>
                    <p class="text-gray-400 text-sm">
                        Providing high-quality pharmaceutical products and healthcare solutions since 2005.
                    </p>
                </div>
                <div>
                    <h3 class="text-lg font-semibold mb-3 md:mb-4">Quick Links</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-white transition">Home</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition">Products</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition">Blogs</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition">About Us</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition">Contact</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-lg font-semibold mb-3 md:mb-4">Contact Us</h3>
                    <ul class="space-y-2 text-gray-400">
                        <li class="flex items-start">
                            <i class="fas fa-map-marker-alt mt-1 mr-3"></i>
                            <span>123 Pharma Lane, Health City, HC 12345</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-phone-alt mt-1 mr-3"></i>
                            <span>+1 (555) 123-4567</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-envelope mt-1 mr-3"></i>
                            <span>info@SCIZORA.com</span>
                        </li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-lg font-semibold mb-3 md:mb-4">Newsletter</h3>
                    <p class="text-gray-400 mb-3">Subscribe to our newsletter for updates.</p>
                    <form class="flex">
                        <input type="email" placeholder="Your email"
                            class="px-3 py-2 rounded-l-md focus:outline-none text-gray-800 w-full">
                        <button class="px-4 py-2 bg-purple rounded-r-md hover:bg-purple transition">
                            <i class="fas fa-paper-plane"></i>
                        </button>
                    </form>
                </div>
            </div>
            <hr class="border-gray-700 my-4 md:my-6">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <p class="text-gray-400 text-sm md:text-base">© 2025 SCIZORA. All rights reserved.</p>
                <div class="flex space-x-4 mt-4 md:mt-0">
                    <a href="#" class="text-gray-400 hover:text-white transition"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="text-gray-400 hover:text-white transition"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="text-gray-400 hover:text-white transition"><i class="fab fa-linkedin-in"></i></a>
                    <a href="#" class="text-gray-400 hover:text-white transition"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Product Modal -->
    <div id="productModal" class="modal">
        <div class="modal-content">
            <div class="relative">
                <button onclick="closeModal()"
                    class="absolute top-2 right-2 md:top-4 md:right-4 bg-white rounded-full p-2 shadow-md hover:bg-gray-100 z-50">
                    <i class="fas fa-times text-gray-700"></i>
                </button>

                <div class="carousel">
                    <div class="carousel-inner" id="carouselInner">
                        <!-- Carousel items will be added dynamically -->
                    </div>
                    <button class="carousel-control prev" onclick="prevSlide()">
                        <i class="fas fa-chevron-left"></i>
                    </button>
                    <button class="carousel-control next" onclick="nextSlide()">
                        <i class="fas fa-chevron-right"></i>
                    </button>
                    <div class="carousel-indicators" id="carouselIndicators">
                        <!-- Indicators will be added dynamically -->
                    </div>
                </div>
            </div>

            <div class="p-4 md:p-6">
                <h2 id="productTitle" class="text-xl md:text-2xl font-bold text-gray-800 mb-2"></h2>
                <div class="flex items-center mb-3 md:mb-4">
                    <div class="flex text-yellow-400 mr-2">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                    <span class="text-gray-600 text-sm md:text-base">4.7 · 42 reviews</span>
                </div>

                <div class="flex items-center mb-3 md:mb-4">
                    <span id="productCategory"
                        class="px-2 py-1 md:px-3 md:py-1 bg-purple-light text-purple rounded-full text-xs md:text-sm mr-2 md:mr-3"></span>
                    <span class="text-gray-600 text-sm md:text-base">SKU: <span id="productSKU">MP-12345</span></span>
                </div>

                <p id="productDescription" class="text-gray-700 mb-4 md:mb-6"></p>

                <div class="border-t border-gray-200 pt-4 md:pt-6 mb-4 md:mb-6">
                    <h3 class="text-md md:text-lg font-semibold text-gray-800 mb-3 md:mb-4">Key Features</h3>
                    <ul id="productFeatures"
                        class="list-disc pl-5 space-y-1 md:space-y-2 text-gray-700 text-sm md:text-base">
                        <!-- Features will be added dynamically -->
                    </ul>
                </div>

                <div class="flex flex-col sm:flex-row space-y-2 sm:space-y-0 sm:space-x-2 md:space-x-4 mb-4 md:mb-6">
                    <button
                        class="flex-1 py-2 md:py-3 bg-purple text-white rounded-md hover:bg-purple transition font-medium">
                        Buy Now
                    </button>
                    <button
                        class="flex-1 py-2 md:py-3 bg-green-600 text-white rounded-md hover:bg-green-700 transition font-medium">
                        Get a Quote
                    </button>
                </div>

                <div class="border-t border-gray-200 pt-4 md:pt-6">
                    <h3 class="text-md md:text-lg font-semibold text-gray-800 mb-3 md:mb-4">Customer Reviews</h3>
                    <div class="space-y-3 md:space-y-4">
                        <!-- Review 1 -->
                        <div class="border-b border-gray-200 pb-3 md:pb-4">
                            <div class="flex justify-between items-start mb-2">
                                <div class="flex items-center">
                                    <div class="h-8 w-8 rounded-full bg-gray-300 flex items-center justify-center mr-2">
                                        <i class="fas fa-user text-gray-500 text-sm"></i>
                                    </div>
                                    <div>
                                        <h4 class="font-medium text-gray-800 text-sm">Alex Johnson</h4>
                                        <div class="flex text-yellow-400 text-xs">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                    </div>
                                </div>
                                <span class="text-gray-500 text-xs">1 week ago</span>
                            </div>
                            <p class="text-gray-600 text-sm">
                                This product worked exactly as described. The packaging was secure and the delivery was
                                fast. Will definitely purchase again.
                            </p>
                        </div>

                        <!-- Review 2 -->
                        <div class="pb-2">
                            <div class="flex justify-between items-start mb-2">
                                <div class="flex items-center">
                                    <div class="h-8 w-8 rounded-full bg-gray-300 flex items-center justify-center mr-2">
                                        <i class="fas fa-user text-gray-500 text-sm"></i>
                                    </div>
                                    <div>
                                        <h4 class="font-medium text-gray-800 text-sm">Maria Garcia</h4>
                                        <div class="flex text-yellow-400 text-xs">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="far fa-star"></i>
                                        </div>
                                    </div>
                                </div>
                                <span class="text-gray-500 text-xs">3 weeks ago</span>
                            </div>
                            <p class="text-gray-600 text-sm">
                                Effective product, though the taste could be improved. Customer service was very helpful
                                when I had questions about dosage.
                            </p>
                        </div>
                    </div>

                    <div class="mt-4 md:mt-6">
                        <button
                            class="px-4 py-2 border border-purple text-purple rounded-md hover:bg-purple-light transition w-full">
                            View All Reviews for This Product
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Product data
        const products = {
            product1: {
                title: "Antibiotic Capsules",
                category: "Capsules",
                description: "Broad-spectrum antibiotic for bacterial infections. This medication is effective against a wide range of gram-positive and gram-negative bacteria. Each capsule contains 500mg of the active ingredient. Suitable for adults and children over 12 years.",
                features: [
                    "Effective against most common bacterial infections",
                    "500mg per capsule",
                    "30 capsules per pack",
                    "Suitable for adults and children over 12",
                    "Take one capsule every 12 hours"
                ],
                images: [
                    "https://via.placeholder.com/800x500?text=Antibiotic+Capsules+1",
                    "https://via.placeholder.com/800x500?text=Antibiotic+Capsules+2",
                    "https://via.placeholder.com/800x500?text=Antibiotic+Capsules+3"
                ]
            },
            product2: {
                title: "Pain Relief Tablets",
                category: "Tablets",
                description: "Fast-acting pain relief for headaches and muscle pain. These tablets provide effective relief from mild to moderate pain. Each tablet contains 200mg of ibuprofen. Suitable for adults and children over 12 years.",
                features: [
                    "Fast-acting formula",
                    "200mg ibuprofen per tablet",
                    "24 tablets per pack",
                    "Relieves headaches, muscle pain, and fever",
                    "Take one tablet every 4-6 hours as needed"
                ],
                images: [
                    "https://via.placeholder.com/800x500?text=Pain+Relief+Tablets+1",
                    "https://via.placeholder.com/800x500?text=Pain+Relief+Tablets+2"
                ]
            },
            product3: {
                title: "Vitamin D Supplements",
                category: "Supplements",
                description: "High-potency Vitamin D for bone and immune health. Each softgel contains 5000 IU of Vitamin D3, the most bioavailable form. Supports calcium absorption and immune system function.",
                features: [
                    "5000 IU Vitamin D3 per softgel",
                    "120 softgels per bottle",
                    "Supports bone and immune health",
                    "Easy-to-swallow softgels",
                    "Take one softgel daily with food"
                ],
                images: [
                    "https://via.placeholder.com/800x500?text=Vitamin+D+Supplements+1",
                    "https://via.placeholder.com/800x500?text=Vitamin+D+Supplements+2",
                    "https://via.placeholder.com/800x500?text=Vitamin+D+Supplements+3",
                    "https://via.placeholder.com/800x500?text=Vitamin+D+Supplements+4"
                ]
            },
            product4: {
                title: "Antihistamine Syrup",
                category: "Liquid",
                description: "For relief of allergy symptoms and hay fever. This non-drowsy formula provides 24-hour relief from sneezing, runny nose, itchy eyes, and throat. Suitable for adults and children 6 years and older.",
                features: [
                    "Non-drowsy formula",
                    "120ml bottle",
                    "24-hour relief",
                    "For adults and children 6+",
                    "Measure with included dosing cup"
                ],
                images: [
                    "https://via.placeholder.com/800x500?text=Antihistamine+Syrup+1",
                    "https://via.placeholder.com/800x500?text=Antihistamine+Syrup+2"
                ]
            },
            product5: {
                title: "Medical Consultation",
                category: "Service",
                description: "Expert pharmaceutical consultation services. Our licensed pharmacists are available to answer your medication questions, provide dosage guidance, and offer recommendations for over-the-counter products.",
                features: [
                    "30-minute consultations",
                    "Available via phone or video call",
                    "Medication reviews",
                    "Personalized recommendations",
                    "Insurance guidance"
                ],
                images: [
                    "https://via.placeholder.com/800x500?text=Medical+Consultation+1",
                    "https://via.placeholder.com/800x500?text=Medical+Consultation+2",
                    "https://via.placeholder.com/800x500?text=Medical+Consultation+3"
                ]
            },
            product6: {
                title: "First Aid Kits",
                category: "Kits",
                description: "Comprehensive first aid kits for home and workplace. Each kit contains 120 essential items for treating minor injuries, including bandages, antiseptic wipes, gloves, and first aid instructions.",
                features: [
                    "120 essential items",
                    "Compact and portable",
                    "FDA-compliant contents",
                    "Suitable for home or office",
                    "5-year shelf life"
                ],
                images: [
                    "https://via.placeholder.com/800x500?text=First+Aid+Kits+1",
                    "https://via.placeholder.com/800x500?text=First+Aid+Kits+2",
                    "https://via.placeholder.com/800x500?text=First+Aid+Kits+3"
                ]
            },
            // Additional products for "View All" functionality
            product7: {
                title: "Digestive Enzymes",
                category: "Supplements",
                description: "Advanced digestive enzyme formula to support healthy digestion and nutrient absorption. Contains a blend of enzymes to break down proteins, fats, and carbohydrates.",
                features: [
                    "Comprehensive enzyme blend",
                    "90 capsules per bottle",
                    "Supports gut health",
                    "Vegetarian formula",
                    "Take one capsule with meals"
                ],
                images: [
                    "https://via.placeholder.com/800x500?text=Digestive+Enzymes+1",
                    "https://via.placeholder.com/800x500?text=Digestive+Enzymes+2"
                ]
            },
            product8: {
                title: "Sleep Aid Tablets",
                category: "Tablets",
                description: "Natural sleep aid with melatonin and herbal extracts to promote restful sleep. Non-habit forming formula helps you fall asleep faster and stay asleep longer.",
                features: [
                    "Contains melatonin and chamomile",
                    "60 tablets per bottle",
                    "Non-habit forming",
                    "Promotes natural sleep cycle",
                    "Take one tablet 30 minutes before bed"
                ],
                images: [
                    "https://via.placeholder.com/800x500?text=Sleep+Aid+Tablets+1",
                    "https://via.placeholder.com/800x500?text=Sleep+Aid+Tablets+2"
                ]
            },
            product9: {
                title: "Hand Sanitizer Gel",
                category: "Liquid",
                description: "Alcohol-based hand sanitizer gel that kills 99.9% of germs. Moisturizing formula with aloe vera to prevent skin dryness. Convenient travel size.",
                features: [
                    "Kills 99.9% of germs",
                    "Contains aloe vera",
                    "60ml travel size",
                    "No sticky residue",
                    "Apply to hands and rub until dry"
                ],
                images: [
                    "https://via.placeholder.com/800x500?text=Hand+Sanitizer+1",
                    "https://via.placeholder.com/800x500?text=Hand+Sanitizer+2"
                ]
            },
            product10: {
                title: "Blood Pressure Monitor",
                category: "Device",
                description: "Digital upper arm blood pressure monitor with clinically validated accuracy. Large display with easy-to-read numbers and irregular heartbeat detection.",
                features: [
                    "Clinically validated accuracy",
                    "Fits arms 22-42cm circumference",
                    "Irregular heartbeat detection",
                    "90-reading memory",
                    "Includes carrying case"
                ],
                images: [
                    "https://via.placeholder.com/800x500?text=BP+Monitor+1",
                    "https://via.placeholder.com/800x500?text=BP+Monitor+2"
                ]
            },
            product11: {
                title: "Multivitamin Gummies",
                category: "Supplements",
                description: "Delicious multivitamin gummies for adults with essential vitamins and minerals. Great-tasting natural flavors with no artificial sweeteners.",
                features: [
                    "12 essential vitamins & minerals",
                    "60 gummies per bottle",
                    "Natural flavors",
                    "No artificial sweeteners",
                    "Take two gummies daily"
                ],
                images: [
                    "https://via.placeholder.com/800x500?text=Multivitamin+Gummies+1",
                    "https://via.placeholder.com/800x500?text=Multivitamin+Gummies+2"
                ]
            },
            product12: {
                title: "Thermometer",
                category: "Device",
                description: "Digital forehead thermometer for quick, non-contact temperature readings. One-second measurement with color-coded fever indicator and memory function.",
                features: [
                    "Non-contact forehead measurement",
                    "One-second reading",
                    "Color-coded fever indicator",
                    "32-reading memory",
                    "Suitable for all ages"
                ],
                images: [
                    "https://via.placeholder.com/800x500?text=Thermometer+1",
                    "https://via.placeholder.com/800x500?text=Thermometer+2"
                ]
            }
        };

        // Carousel variables
        let currentSlide = 0;
        let totalSlides = 0;

        // Track loaded products to avoid duplicates
        let loadedProductIds = [];

        // Initialize the page with initial products
        document.addEventListener('DOMContentLoaded', function () {
            const mobileMenuButton = document.getElementById('mobileMenuButton');
            const mobileMenu = document.getElementById('mobileMenu');

            // Toggle mobile menu
            mobileMenuButton.addEventListener('click', function () {
                mobileMenu.classList.toggle('active');

                // Change icon between bars and times
                const icon = mobileMenuButton.querySelector('i');
                if (mobileMenu.classList.contains('active')) {
                    icon.classList.remove('fa-bars');
                    icon.classList.add('fa-times');
                } else {
                    icon.classList.remove('fa-times');
                    icon.classList.add('fa-bars');
                }
            });

            // Close mobile menu when clicking on a link
            const mobileMenuLinks = mobileMenu.querySelectorAll('a');
            mobileMenuLinks.forEach(link => {
                link.addEventListener('click', () => {
                    mobileMenu.classList.remove('active');
                    const icon = mobileMenuButton.querySelector('i');
                    icon.classList.remove('fa-times');
                    icon.classList.add('fa-bars');
                });
            });

            // Close mobile menu when clicking outside
            document.addEventListener('click', function (e) {
                const isClickInsideMenu = mobileMenu.contains(e.target);
                const isClickOnButton = mobileMenuButton.contains(e.target);

                if (!isClickInsideMenu && !isClickOnButton && mobileMenu.classList.contains('active')) {
                    mobileMenu.classList.remove('active');
                    const icon = mobileMenuButton.querySelector('i');
                    icon.classList.remove('fa-times');
                    icon.classList.add('fa-bars');
                }
            });

            // Load initial products
            loadInitialProducts();

            // Set up event listeners
            document.getElementById('loadMoreProductsBtn').addEventListener('click', loadMoreProducts);
        });

        // Load initial products (first 6)
        function loadInitialProducts() {
            const productsContainer = document.getElementById('productsContainer');

            // Clear any existing products (just in case)
            productsContainer.innerHTML = '';
            loadedProductIds = [];

            // Load first 6 products
            for (let i = 1; i <= 6; i++) {
                const productId = `product${i}`;
                addProductToContainer(productId, productsContainer);
                loadedProductIds.push(productId);
            }
        }

        // Load more products when "View All" is clicked
        function loadMoreProducts() {
            const productsContainer = document.getElementById('productsContainer');
            const loadMoreBtn = document.getElementById('loadMoreProductsBtn');

            // Check if we've already loaded all products
            if (loadedProductIds.length >= Object.keys(products).length) {
                loadMoreBtn.textContent = 'All Products Loaded';
                loadMoreBtn.disabled = true;
                loadMoreBtn.classList.remove('hover:bg-purple-light');
                loadMoreBtn.classList.add('opacity-50', 'cursor-not-allowed');
                return;
            }

            // Load remaining products (3 at a time for better UX)
            let productsLoaded = 0;
            for (let i = loadedProductIds.length + 1; i <= Object.keys(products).length && productsLoaded < 3; i++) {
                const productId = `product${i}`;
                if (!loadedProductIds.includes(productId)) {
                    addProductToContainer(productId, productsContainer);
                    loadedProductIds.push(productId);
                    productsLoaded++;
                }
            }

            // If all products are now loaded, update button
            if (loadedProductIds.length >= Object.keys(products).length) {
                loadMoreBtn.textContent = 'All Products Loaded';
                loadMoreBtn.disabled = true;
                loadMoreBtn.classList.remove('hover:bg-purple-light');
                loadMoreBtn.classList.add('opacity-50', 'cursor-not-allowed');
            }

            // Scroll to the newly loaded products
            setTimeout(() => {
                const lastProduct = productsContainer.lastElementChild;
                lastProduct.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
            }, 100);
        }

        // Helper function to add a product to the container
        function addProductToContainer(productId, container) {
            const product = products[productId];
            if (!product) return;

            const productCard = document.createElement('div');
            productCard.className = 'border border-gray-200 rounded-lg overflow-hidden hover:shadow-md transition duration-300';

            // Special button styling for first two products
            let buyButton = `<button class="w-full py-2 bg-purple text-white rounded-md hover:bg-purple transition text-sm">Buy Now</button>`;

            if (productId === 'product2') {
                buyButton = `<button class="w-full py-2 bg-purple text-white rounded-md hover:bg-purple transition text-sm">Buy Now</button>`;
            }

            productCard.innerHTML = `
                <div class="h-40 bg-blue-50 flex items-center justify-center">
                    <img src="${product.images[0]}" alt="${product.title}" class="h-full object-contain">
                </div>
                <div class="p-4">
                    <div class="flex justify-between items-start">
                        <h3 class="font-medium text-gray-800">${product.title}</h3>
                        <span class="px-2 py-1 bg-purple-light text-purple rounded-full text-xs">${product.category}</span>
                    </div>
                    <p class="text-gray-600 text-sm mt-2">${product.description.substring(0, 80)}...</p>
                    <div class="mt-3 space-y-2">
                        <button onclick="openProductModal('${productId}')" class="w-full py-2 border border-purple text-purple rounded-md hover:bg-purple-light transition text-sm">
                            View Details
                        </button>
                        ${buyButton}
                    </div>
                </div>
            `;

            container.appendChild(productCard);
        }

        // Open product modal
        function openProductModal(productId) {
            const product = products[productId];
            if (!product) return;

            // Set product details
            document.getElementById('productTitle').textContent = product.title;
            document.getElementById('productCategory').textContent = product.category;
            document.getElementById('productDescription').textContent = product.description;

            // Set features
            const featuresList = document.getElementById('productFeatures');
            featuresList.innerHTML = '';
            product.features.forEach(feature => {
                const li = document.createElement('li');
                li.textContent = feature;
                featuresList.appendChild(li);
            });

            // Set up carousel
            const carouselInner = document.getElementById('carouselInner');
            const carouselIndicators = document.getElementById('carouselIndicators');
            carouselInner.innerHTML = '';
            carouselIndicators.innerHTML = '';

            product.images.forEach((image, index) => {
                // Add carousel item
                const item = document.createElement('div');
                item.className = 'carousel-item';
                item.innerHTML = `<img src="${image}" alt="${product.title}" class="w-full h-64 md:h-96 object-contain">`;
                carouselInner.appendChild(item);

                // Add indicator
                const indicator = document.createElement('div');
                indicator.className = 'carousel-indicator';
                if (index === 0) indicator.classList.add('active');
                indicator.onclick = () => goToSlide(index);
                carouselIndicators.appendChild(indicator);
            });

            totalSlides = product.images.length;
            currentSlide = 0;
            updateCarousel();

            // Show modal
            document.getElementById('productModal').style.display = 'block';
            document.body.style.overflow = 'hidden';

            // Close mobile menu if open
            document.getElementById('mobileMenu').classList.remove('active');
            const icon = document.getElementById('mobileMenuButton').querySelector('i');
            icon.classList.remove('fa-times');
            icon.classList.add('fa-bars');
        }

        // Close modal
        function closeModal() {
            document.getElementById('productModal').style.display = 'none';
            document.body.style.overflow = 'auto';
        }

        // Carousel functions
        function updateCarousel() {
            const carouselInner = document.getElementById('carouselInner');
            carouselInner.style.transform = `translateX(-${currentSlide * 100}%)`;

            const indicators = document.querySelectorAll('.carousel-indicator');
            indicators.forEach((indicator, index) => {
                if (index === currentSlide) {
                    indicator.classList.add('active');
                } else {
                    indicator.classList.remove('active');
                }
            });
        }

        function nextSlide() {
            currentSlide = (currentSlide + 1) % totalSlides;
            updateCarousel();
        }

        function prevSlide() {
            currentSlide = (currentSlide - 1 + totalSlides) % totalSlides;
            updateCarousel();
        }

        function goToSlide(index) {
            currentSlide = index;
            updateCarousel();
        }

        // Review system
        document.addEventListener('DOMContentLoaded', function () {
            document.getElementById('writeReviewBtn').addEventListener('click', function () {
                document.getElementById('reviewForm').style.display = 'block';
                this.style.display = 'none';
                window.scrollTo({
                    top: document.getElementById('reviewForm').offsetTop - 20,
                    behavior: 'smooth'
                });
            });

            document.getElementById('cancelReviewBtn').addEventListener('click', function () {
                document.getElementById('reviewForm').style.display = 'none';
                document.getElementById('writeReviewBtn').style.display = 'block';
                document.getElementById('submitReviewForm').reset();
                document.querySelectorAll('.star-rating i').forEach(star => {
                    star.classList.remove('fas');
                    star.classList.add('far');
                    star.classList.remove('text-yellow-400');
                    star.classList.add('text-gray-400');
                });
                document.getElementById('reviewRating').value = '0';
            });

            // Star rating
            document.querySelectorAll('.star-rating').forEach(button => {
                button.addEventListener('click', function () {
                    const rating = parseInt(this.getAttribute('data-rating'));
                    document.getElementById('reviewRating').value = rating;

                    const stars = document.querySelectorAll('.star-rating i');
                    stars.forEach((star, index) => {
                        if (index < rating) {
                            star.classList.remove('far');
                            star.classList.add('fas');
                            star.classList.remove('text-gray-400');
                            star.classList.add('text-yellow-400');
                        } else {
                            star.classList.remove('fas');
                            star.classList.add('far');
                            star.classList.remove('text-yellow-400');
                            star.classList.add('text-gray-400');
                        }
                    });
                });
            });

            // Submit review
            document.getElementById('submitReviewForm').addEventListener('submit', function (e) {
                e.preventDefault();

                const name = document.getElementById('reviewName').value;
                const rating = document.getElementById('reviewRating').value;
                const title = document.getElementById('reviewTitle').value;
                const text = document.getElementById('reviewText').value;

                if (rating === '0') {
                    alert('Please select a rating');
                    return;
                }

                // Here you would typically send the data to a server
                console.log('Review submitted:', { name, rating, title, text });

                // Show success message
                alert('Thank you for your review!');

                // Reset form
                this.reset();
                document.getElementById('reviewForm').style.display = 'none';
                document.getElementById('writeReviewBtn').style.display = 'block';
            });

            // View all reviews
            document.getElementById('viewAllReviewsBtn').addEventListener('click', function () {
                const reviewsSection = document.querySelector('.bg-white.rounded-lg.shadow-sm.p-6.mb-6');
                reviewsSection.classList.toggle('expanded');

                if (reviewsSection.classList.contains('expanded')) {
                    this.textContent = 'Hide Reviews';
                } else {
                    this.textContent = 'View All Reviews';
                }

                window.scrollTo({
                    top: document.getElementById('allReviews').offsetTop - 20,
                    behavior: 'smooth'
                });
            });

            // Form submission handling
            document.getElementById('inquiryForm').addEventListener('submit', function (e) {
                e.preventDefault();

                // Get form values
                const name = document.getElementById('name').value;
                const email = document.getElementById('email').value;
                const message = document.getElementById('message').value;

                // Here you would typically send the data to a server
                console.log('Form submitted:', { name, email, message });

                // Show success message
                alert('Thank you for your inquiry! We will get back to you soon.');

                // Reset form
                this.reset();
            });

            // Close modal when clicking outside
            window.addEventListener('click', function (e) {
                if (e.target === document.getElementById('productModal')) {
                    closeModal();
                }
            });
        });
    </script>
</body>

</html>