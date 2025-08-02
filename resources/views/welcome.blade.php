<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Added proper viewport meta tag for mobile responsiveness -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>SCIZORA - Find Trusted Companies</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                    primary: '#1544da',   // NEW: Main Blue
                    secondary: '#1124aa',  // NEW: Dark Blue
                    dark: '#1A202C',
                    blue: {
                        100: '#eaf0ff',   // NEW: Very Light Blue for backgrounds
                        400: '#5669bc',   // NEW: Light Blue
                        600: '#1544da',   // NEW: Main Blue
                        700: '#1124aa',   // NEW: Dark Blue
                    }
                    }
                }
            }
        }
    </script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');
        
        body {
            font-family: 'Inter', sans-serif;
            scroll-behavior: smooth;
        }
        
        .hero-bg {
            background-image: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80');
            background-size: cover;
            background-position: center;
        }
        
        .mobile-mockup {
            background-image: url('https://images.unsplash.com/photo-1555774698-0b77e0d5fac6?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80');
            background-size: cover;
            background-position: center;
        }
        
        .transition-all {
            transition: all 0.3s ease;
        }
        
        /* Custom styles for new features */
        .categories-container {
            transition: height 0.3s ease;
            overflow: hidden;
        }
        
        .scrollable-companies {
            scroll-behavior: smooth;
            -webkit-overflow-scrolling: touch;
        }
        
        .scrollable-companies::-webkit-scrollbar {
            display: none;
        }

        .grayscale {
            filter: grayscale(100%);
        }
        
        .grayscale:hover {
            filter: grayscale(0%);
        }
        
        /* Custom purple accent styles */
        .btn-primary {
            background-color: #1544da;
            color: white;
        }
        
        .btn-primary:hover {
            background-color: #1124aa;
        }
        
        .text-accent {
            color: #1544da;
        }
        
        .border-accent {
            border-color: #1544da;
        }
        
        .bg-accent {
            background-color: #1544da;
        }

        /* Added mobile-specific styles */
        @media (max-width: 767px) {
            /* Adjust hero section padding and font sizes */
            .hero-section {
                padding-top: 6rem;
                padding-bottom: 6rem;
            }
            
            /* Make search input more mobile-friendly */
            .search-input {
                padding: 0.75rem 1rem;
                font-size: 0.9rem;
            }
            
            /* Adjust category grid for mobile */
            .category-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 0.75rem;
            }
            
            /* Make company cards take full width on mobile */
            .company-card {
                width: 85%;
                min-width: 85%;
            }
            
            /* Adjust review grid for mobile */
            .review-grid {
                grid-template-columns: 1fr;
            }
            
            /* Make mobile mockup smaller on small screens */
            .mobile-mockup {
                width: 80%;
                height: 20rem;
            }
            
            /* Adjust footer layout for mobile */
            .footer-grid {
                grid-template-columns: 1fr;
                gap: 2rem;
            }
            
            /* Make newsletter input full width */
            .newsletter-input {
                width: 100%;
            }
            
            /* Adjust article grid for mobile */
            .article-grid {
                grid-template-columns: 1fr;
            }
            
            /* Adjust trusted logos for mobile */
            .trusted-logos {
                justify-content: center;
                gap: 1rem;
            }
        }

        /* Added tablet-specific styles */
        @media (min-width: 768px) and (max-width: 1023px) {
            /* Adjust category grid for tablets */
            .category-grid {
                grid-template-columns: repeat(3, 1fr);
            }
            
            /* Make company cards slightly wider on tablets */
            .company-card {
                width: 45%;
                min-width: 45%;
            }
            
            /* Adjust review grid for tablets */
            .review-grid {
                grid-template-columns: repeat(2, 1fr);
            }
            
            /* Adjust article grid for tablets */
            .article-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }
		        /* Custom scrollbar for the articles container */
        .custom-scrollbar::-webkit-scrollbar {
            width: 8px;
        }

        .custom-scrollbar::-webkit-scrollbar-track {
            background: #f1f5f9; /* gray-100 */
            border-radius: 10px;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: #cbd5e1; /* gray-300 */
            border-radius: 10px;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb:hover {
            background: #94a3b8; /* gray-400 */
        }
    </style>
</head>
<body class="bg-gray-50">
    <!-- Sticky Header - Made more compact for mobile -->
    <header class="sticky top-0 z-50 bg-white shadow-md">
        <nav class="container mx-auto px-4 py-3 flex justify-between items-center">
            <div class="flex items-center">
                <a href="#" class="text-xl md:text-2xl font-bold"><img src="{{ asset('build/images/logo.jpg') }}" alt="logo" width="200" height="300"></a>
            </div>
            
            <div class="hidden md:flex items-center space-x-6 lg:space-x-8">
                <a href="#" class="text-gray-700 hover:text-blue-600 transition-all text-sm lg:text-base">{{ __('common.Dashboard') }}</a>
                <a href="#" class="text-gray-700 hover:text-blue-600 transition-all text-sm lg:text-base">{{ __('common.Categories') }}</a>
                <a href="#" class="text-gray-700 hover:text-blue-600 transition-all text-sm lg:text-base">{{ __('common.Blog') }}</a>
                <a href="#" class="text-gray-700 hover:text-blue-600 transition-all text-sm lg:text-base">{{ __('common.About Us') }}</a>
                <a href="#" class="text-gray-700 hover:text-blue-600 transition-all text-sm lg:text-base">{{ __('common.Contact') }}</a>
            </div>
            
            
            <div class="flex items-center space-x-3 md:space-x-4">
                <a href="{{route('admin.dashboard.show')}}">
                    <button class="hidden md:block bg-blue-600 text-white px-3 py-1.5 md:px-4 md:py-2 rounded-full hover:bg-blue-700 transition-all text-sm md:text-base">
                       Admin Dashboard
                    </button>
                </a>
                <a href="{{route('business.auth.show')}}">
                    <button class="hidden md:block bg-blue-600 text-white px-3 py-1.5 md:px-4 md:py-2 rounded-full hover:bg-blue-700 transition-all text-sm md:text-base">
                       {{__('common.Business Login')}}
                    </button>
                </a>
                <a href="{{route('customer.auth.show')}}">
                    <button class="hidden md:block bg-blue-600 text-white px-3 py-1.5 md:px-4 md:py-2 rounded-full hover:bg-blue-700 transition-all text-sm md:text-base">
                        Login
                    </button>
                </a>
                <button id="mobile-menu-button" class="md:hidden text-gray-700">
                    <i class="fas fa-bars text-xl md:text-2xl"></i>
                </button>
            </div>
        </nav>
        
        <!-- Mobile Menu - Enhanced for better mobile experience -->
        <div id="mobile-menu" class="hidden md:hidden bg-white py-2 px-4 shadow-lg">
            <a href="#" class="block py-3 text-gray-700 hover:text-blue-600 border-b border-gray-100">Dashboard</a>
            <a href="#" class="block py-3 text-gray-700 hover:text-blue-600 border-b border-gray-100">Categories</a>
            <a href="#" class="block py-3 text-gray-700 hover:text-blue-600 border-b border-gray-100">Blog</a>
            <a href="#" class="block py-3 text-gray-700 hover:text-blue-600 border-b border-gray-100">About Us</a>
            <a href="#" class="block py-3 text-gray-700 hover:text-blue-600 border-b border-gray-100">Contact</a>
            <button class="w-full mt-3 mb-2 bg-blue-600 text-white px-4 py-2.5 rounded-full hover:bg-blue-700 transition-all">
                Login
            </button>
        </div>
    </header>


    <!-- Hero Section - Optimized for mobile -->
    <section class="hero-bg text-white py-16 md:py-32 hero-section">
        <div class="container mx-auto px-4 text-center">
            <h1 class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-bold mb-4 px-2">The Future of AI-Powered Scientific Procurement</h1>
            <p class="text-base sm:text-lg md:text-xl lg:text-2xl mb-6 md:mb-8 max-w-2xl mx-auto px-2">Connecting innovators, buyers, and suppliers through the world's most intelligent life sciences network.</p>
            
            <button class="bg-blue-600 text-white px-8 py-3 md:px-10 md:py-4 rounded-full font-semibold hover:bg-blue-700 transition-all text-sm md:text-base">
                Get Started
            </button>
        </div>
    </section>
	 <!-- Ad Banner -->
    <div class="container mx-auto px-4 py-2">
        <img src="https://tpc.googlesyndication.com/simgad/13265185988757716340" alt="Advertisement" class="w-full h-auto mx-auto">
    </div>
	
	<!-- Trusted By Section -->
	<section class="py-10 bg-gray-100">
        <div class="container mx-auto px-4">
            <h2 class="text-xl md:text-2xl font-bold text-center mb-8">Trusted by Leading Brands</h2>
            <div class="flex flex-wrap justify-center items-center gap-6 md:gap-10 trusted-logos">
                <img src="https://logo.clearbit.com/pfizer.com" alt="Pfizer" class="h-8 md:h-12 grayscale hover:grayscale transition-all">
                <img src="https://logo.clearbit.com/roche.com" alt="Roche" class="h-8 md:h-12 grayscale hover:grayscale transition-all">
                <img src="https://logo.clearbit.com/novartis.com" alt="Novartis" class="h-8 md:h-12 grayscale hover:grayscale transition-all">
                <img src="https://logo.clearbit.com/thermofisher.com" alt="Thermo Fisher" class="h-8 md:h-12 grayscale hover:grayscale transition-all">
                <img src="https://logo.clearbit.com/bayer.com" alt="Bayer" class="h-8 md:h-12 grayscale hover:grayscale transition-all">
            </div>
        </div>
    </section>

   

	<!-- Browse by Category - Made responsive for mobile -->
	<section class="py-12 md:py-16 bg-white">
        <div class="container mx-auto px-4">
            <h2 class="text-2xl md:text-3xl font-bold text-center mb-8 md:mb-12">Browse by Category</h2>
            
            <div class="categories-container" id="categoriesContainer" style="height: auto;">
                <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-3 lg:grid-cols-6 gap-3 sm:gap-4 md:gap-6 mb-8 md:mb-10 category-grid">
                    <!-- Life Sciences -->
                    <div class="bg-gray-50 p-4 sm:p-6 rounded-lg text-center hover:shadow-md transition-all cursor-pointer">
                        <div class="bg-blue-100 w-12 h-12 sm:w-14 sm:h-14 md:w-16 md:h-16 mx-auto rounded-full flex items-center justify-center mb-2 sm:mb-3">
                            <i class="fas fa-dna text-blue-600 text-xl sm:text-2xl"></i>
                        </div>
                        <h3 class="font-semibold text-sm sm:text-base">Life Sciences</h3>
                    </div>
                    
                    <!-- Drug Discovery & Development -->
                    <div class="bg-gray-50 p-4 sm:p-6 rounded-lg text-center hover:shadow-md transition-all cursor-pointer">
                        <div class="bg-blue-100 w-12 h-12 sm:w-14 sm:h-14 md:w-16 md:h-16 mx-auto rounded-full flex items-center justify-center mb-2 sm:mb-3">
                            <i class="fas fa-pills text-blue-600 text-xl sm:text-2xl"></i>
                        </div>
                        <h3 class="font-semibold text-sm sm:text-base">Drug Discovery & Development</h3>
                    </div>
                    
                    <!-- Clinical Diagnostics -->
                    <div class="bg-gray-50 p-4 sm:p-6 rounded-lg text-center hover:shadow-md transition-all cursor-pointer">
                        <div class="bg-blue-100 w-12 h-12 sm:w-14 sm:h-14 md:w-16 md:h-16 mx-auto rounded-full flex items-center justify-center mb-2 sm:mb-3">
                            <i class="fas fa-microscope text-blue-600 text-xl sm:text-2xl"></i>
                        </div>
                        <h3 class="font-semibold text-sm sm:text-base">Clinical Diagnostics</h3>
                    </div>
                    
                    <!-- Environmental -->
                    <div class="bg-gray-50 p-4 sm:p-6 rounded-lg text-center hover:shadow-md transition-all cursor-pointer">
                        <div class="bg-blue-100 w-12 h-12 sm:w-14 sm:h-14 md:w-16 md:h-16 mx-auto rounded-full flex items-center justify-center mb-2 sm:mb-3">
                            <i class="fas fa-leaf text-blue-600 text-xl sm:text-2xl"></i>
                        </div>
                        <h3 class="font-semibold text-sm sm:text-base">Environmental</h3>
                    </div>
                    
                    <!-- Materials -->
                    <div class="bg-gray-50 p-4 sm:p-6 rounded-lg text-center hover:shadow-md transition-all cursor-pointer">
                        <div class="bg-blue-100 w-12 h-12 sm:w-14 sm:h-14 md:w-16 md:h-16 mx-auto rounded-full flex items-center justify-center mb-2 sm:mb-3">
                            <i class="fas fa-cubes text-blue-600 text-xl sm:text-2xl"></i>
                        </div>
                        <h3 class="font-semibold text-sm sm:text-base">Materials</h3>
                    </div>
                    
                    <!-- Food & Beverage -->
                    <div class="bg-gray-50 p-4 sm:p-6 rounded-lg text-center hover:shadow-md transition-all cursor-pointer">
                        <div class="bg-blue-100 w-12 h-12 sm:w-14 sm:h-14 md:w-16 md:h-16 mx-auto rounded-full flex items-center justify-center mb-2 sm:mb-3">
                            <i class="fas fa-wine-glass-alt text-blue-600 text-xl sm:text-2xl"></i>
                        </div>
                        <h3 class="font-semibold text-sm sm:text-base">Food & Beverage</h3>
                    </div>
                    
                    <!-- Additional Categories (hidden by default) -->
                    <div class="additional-category hidden bg-gray-50 p-4 sm:p-6 rounded-lg text-center hover:shadow-md transition-all cursor-pointer">
                        <div class="bg-blue-100 w-12 h-12 sm:w-14 sm:h-14 md:w-16 md:h-16 mx-auto rounded-full flex items-center justify-center mb-2 sm:mb-3">
                            <i class="fas fa-flask text-blue-600 text-xl sm:text-2xl"></i>
                        </div>
                        <h3 class="font-semibold text-sm sm:text-base">General Lab</h3>
                    </div>
                    
                    <div class="additional-category hidden bg-gray-50 p-4 sm:p-6 rounded-lg text-center hover:shadow-md transition-all cursor-pointer">
                        <div class="bg-blue-100 w-12 h-12 sm:w-14 sm:h-14 md:w-16 md:h-16 mx-auto rounded-full flex items-center justify-center mb-2 sm:mb-3">
                            <i class="fas fa-robot text-blue-600 text-xl sm:text-2xl"></i>
                        </div>
                        <h3 class="font-semibold text-sm sm:text-base">Lab Automation</h3>
                    </div>
                    
                    <div class="additional-category hidden bg-gray-50 p-4 sm:p-6 rounded-lg text-center hover:shadow-md transition-all cursor-pointer">
                        <div class="bg-blue-100 w-12 h-12 sm:w-14 sm:h-14 md:w-16 md:h-16 mx-auto rounded-full flex items-center justify-center mb-2 sm:mb-3">
                            <i class="fas fa-database text-blue-600 text-xl sm:text-2xl"></i>
                        </div>
                        <h3 class="font-semibold text-sm sm:text-base">Lab Informatics</h3>
                    </div>
                    
                    <div class="additional-category hidden bg-gray-50 p-4 sm:p-6 rounded-lg text-center hover:shadow-md transition-all cursor-pointer">
                        <div class="bg-blue-100 w-12 h-12 sm:w-14 sm:h-14 md:w-16 md:h-16 mx-auto rounded-full flex items-center justify-center mb-2 sm:mb-3">
                            <i class="fas fa-filter text-blue-600 text-xl sm:text-2xl"></i>
                        </div>
                        <h3 class="font-semibold text-sm sm:text-base">Separations</h3>
                    </div>
                    
                    <div class="additional-category hidden bg-gray-50 p-4 sm:p-6 rounded-lg text-center hover:shadow-md transition-all cursor-pointer">
                        <div class="bg-blue-100 w-12 h-12 sm:w-14 sm:h-14 md:w-16 md:h-16 mx-auto rounded-full flex items-center justify-center mb-2 sm:mb-3">
                            <i class="fas fa-chart-line text-blue-600 text-xl sm:text-2xl"></i>
                        </div>
                        <h3 class="font-semibold text-sm sm:text-base">Spectroscopy</h3>
                    </div>
                    
                    <div class="additional-category hidden bg-gray-50 p-4 sm:p-6 rounded-lg text-center hover:shadow-md transition-all cursor-pointer">
                        <div class="bg-blue-100 w-12 h-12 sm:w-14 sm:h-14 md:w-16 md:h-16 mx-auto rounded-full flex items-center justify-center mb-2 sm:mb-3">
                            <i class="fas fa-fingerprint text-blue-600 text-xl sm:text-2xl"></i>
                        </div>
                        <h3 class="font-semibold text-sm sm:text-base">Forensics</h3>
                    </div>
                    
                    <div class="additional-category hidden bg-gray-50 p-4 sm:p-6 rounded-lg text-center hover:shadow-md transition-all cursor-pointer">
                        <div class="bg-blue-100 w-12 h-12 sm:w-14 sm:h-14 md:w-16 md:h-16 mx-auto rounded-full flex items-center justify-center mb-2 sm:mb-3">
                            <i class="fas fa-cannabis text-blue-600 text-xl sm:text-2xl"></i>
                        </div>
                        <h3 class="font-semibold text-sm sm:text-base">Cannabis Testing</h3>
                    </div>
                </div>
            </div>
            
            <div class="text-center">
                <button id="toggleCategories" class="border border-blue-600 text-blue-600 px-5 py-1.5 sm:px-6 sm:py-2 rounded-full hover:bg-blue-600 hover:text-white transition-all text-sm sm:text-base">
                    Browse All Categories
                </button>
            </div>
        </div>
    </section>

    <!-- Top Rated Companies - Made scrollable on mobile -->
    <section class="py-12 md:py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <h2 class="text-2xl md:text-3xl font-bold text-center mb-8 md:mb-12">Top Rated Companies</h2>
            
            <div class="relative">
                <button id="scrollLeft" class="absolute left-0 top-1/2 transform -translate-y-1/2 bg-white p-2 rounded-full shadow-md z-10 hover:bg-gray-100 transition-all hidden md:block">
                    <i class="fas fa-chevron-left text-blue-600"></i>
                </button>
                
                <div class="scrollable-companies overflow-x-auto whitespace-nowrap pb-6 -mx-2 px-2" id="companiesContainer">
                    <!-- Company 1 -->
                    <div class="inline-block w-80 mx-2 bg-white p-4 sm:p-6 rounded-lg shadow-sm hover:shadow-md transition-all whitespace-normal company-card">
                        <div class="flex items-center mb-3 sm:mb-4">
                            <div class="w-12 h-12 sm:w-14 sm:h-14 md:w-16 md:h-16 bg-gray-200 rounded-full flex items-center justify-center mr-3 sm:mr-4">
                                <i class="fas fa-building text-gray-500 text-xl sm:text-2xl"></i>
                            </div>
                            <div>
                                <h3 class="font-bold text-base sm:text-lg">TechSolutions Inc.</h3>
                                <div class="flex text-yellow-400 text-sm sm:text-base">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <span class="text-gray-600 ml-2">(128)</span>
                                </div>
                            </div>
                        </div>
                        <p class="text-gray-600 mb-4 sm:mb-6 text-sm sm:text-base">Leading provider of innovative software solutions for businesses of all sizes with excellent customer support.</p>
                        <button class="w-full bg-blue-600 text-white py-1.5 sm:py-2 rounded-lg hover:bg-blue-700 transition-all text-sm sm:text-base">
                            View Profile
                        </button>
                    </div>
                    
                    <!-- Company 2 -->
                    <div class="inline-block w-80 mx-2 bg-white p-4 sm:p-6 rounded-lg shadow-sm hover:shadow-md transition-all whitespace-normal company-card">
                        <div class="flex items-center mb-3 sm:mb-4">
                            <div class="w-12 h-12 sm:w-14 sm:h-14 md:w-16 md:h-16 bg-gray-200 rounded-full flex items-center justify-center mr-3 sm:mr-4">
                                <i class="fas fa-building text-gray-500 text-xl sm:text-2xl"></i>
                            </div>
                            <div>
                                <h3 class="font-bold text-base sm:text-lg">HealthCare Plus</h3>
                                <div class="flex text-yellow-400 text-sm sm:text-base">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                    <span class="text-gray-600 ml-2">(94)</span>
                                </div>
                            </div>
                        </div>
                        <p class="text-gray-600 mb-4 sm:mb-6 text-sm sm:text-base">Comprehensive healthcare services with state-of-the-art facilities and compassionate medical professionals.</p>
                        <button class="w-full bg-blue-600 text-white py-1.5 sm:py-2 rounded-lg hover:bg-blue-700 transition-all text-sm sm:text-base">
                            View Profile
                        </button>
                    </div>
                    
                    <!-- Company 3 -->
                    <div class="inline-block w-80 mx-2 bg-white p-4 sm:p-6 rounded-lg shadow-sm hover:shadow-md transition-all whitespace-normal company-card">
                        <div class="flex items-center mb-3 sm:mb-4">
                            <div class="w-12 h-12 sm:w-14 sm:h-14 md:w-16 md:h-16 bg-gray-200 rounded-full flex items-center justify-center mr-3 sm:mr-4">
                                <i class="fas fa-building text-gray-500 text-xl sm:text-2xl"></i>
                            </div>
                            <div>
                                <h3 class="font-bold text-base sm:text-lg">EduFuture Academy</h3>
                                <div class="flex text-yellow-400 text-sm sm:text-base">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <span class="text-gray-600 ml-2">(76)</span>
                                </div>
                            </div>
                        </div>
                        <p class="text-gray-600 mb-4 sm:mb-6 text-sm sm:text-base">Innovative educational programs that prepare students for the future with hands-on learning experiences.</p>
                        <button class="w-full bg-blue-600 text-white py-1.5 sm:py-2 rounded-lg hover:bg-blue-700 transition-all text-sm sm:text-base">
                            View Profile
                        </button>
                    </div>
                    
                    <!-- Company 4 -->
                    <div class="inline-block w-80 mx-2 bg-white p-4 sm:p-6 rounded-lg shadow-sm hover:shadow-md transition-all whitespace-normal company-card">
                        <div class="flex items-center mb-3 sm:mb-4">
                            <div class="w-12 h-12 sm:w-14 sm:h-14 md:w-16 md:h-16 bg-gray-200 rounded-full flex items-center justify-center mr-3 sm:mr-4">
                                <i class="fas fa-building text-gray-500 text-xl sm:text-2xl"></i>
                            </div>
                            <div>
                                <h3 class="font-bold text-base sm:text-lg">GreenTech Solutions</h3>
                                <div class="flex text-yellow-400 text-sm sm:text-base">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="far fa-star"></i>
                                    <span class="text-gray-600 ml-2">(64)</span>
                                </div>
                            </div>
                        </div>
                        <p class="text-gray-600 mb-4 sm:mb-6 text-sm sm:text-base">Sustainable technology solutions that help businesses reduce their environmental impact while improving efficiency.</p>
                        <button class="w-full bg-blue-600 text-white py-1.5 sm:py-2 rounded-lg hover:bg-blue-700 transition-all text-sm sm:text-base">
                            View Profile
                        </button>
                    </div>
                    
                    <!-- Company 5 -->
                    <div class="inline-block w-80 mx-2 bg-white p-4 sm:p-6 rounded-lg shadow-sm hover:shadow-md transition-all whitespace-normal company-card">
                        <div class="flex items-center mb-3 sm:mb-4">
                            <div class="w-12 h-12 sm:w-14 sm:h-14 md:w-16 md:h-16 bg-gray-200 rounded-full flex items-center justify-center mr-3 sm:mr-4">
                                <i class="fas fa-building text-gray-500 text-xl sm:text-2xl"></i>
                            </div>
                            <div>
                                <h3 class="font-bold text-base sm:text-lg">Foodie Delights</h3>
                                <div class="flex text-yellow-400 text-sm sm:text-base">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                    <span class="text-gray-600 ml-2">(52)</span>
                                </div>
                            </div>
                        </div>
                        <p class="text-gray-600 mb-4 sm:mb-6 text-sm sm:text-base">Premium food delivery service offering gourmet meals from top-rated restaurants with exceptional service.</p>
                        <button class="w-full bg-blue-600 text-white py-1.5 sm:py-2 rounded-lg hover:bg-blue-700 transition-all text-sm sm:text-base">
                            View Profile
                        </button>
                    </div>
                    
                    <!-- Company 6 -->
                    <div class="inline-block w-80 mx-2 bg-white p-4 sm:p-6 rounded-lg shadow-sm hover:shadow-md transition-all whitespace-normal company-card">
                        <div class="flex items-center mb-3 sm:mb-4">
                            <div class="w-12 h-12 sm:w-14 sm:h-14 md:w-16 md:h-16 bg-gray-200 rounded-full flex items-center justify-center mr-3 sm:mr-4">
                                <i class="fas fa-building text-gray-500 text-xl sm:text-2xl"></i>
                            </div>
                            <div>
                                <h3 class="font-bold text-base sm:text-lg">TravelEase</h3>
                                <div class="flex text-yellow-400 text-sm sm:text-base">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <span class="text-gray-600 ml-2">(48)</span>
                                </div>
                            </div>
                        </div>
                        <p class="text-gray-600 mb-4 sm:mb-6 text-sm sm:text-base">Your one-stop travel agency offering customized vacation packages with 24/7 customer support worldwide.</p>
                        <button class="w-full bg-blue-600 text-white py-1.5 sm:py-2 rounded-lg hover:bg-blue-700 transition-all text-sm sm:text-base">
                            View Profile
                        </button>
                    </div>
                </div>
                
                <button id="scrollRight" class="absolute right-0 top-1/2 transform -translate-y-1/2 bg-white p-2 rounded-full shadow-md z-10 hover:bg-gray-100 transition-all hidden md:block">
                    <i class="fas fa-chevron-right text-blue-600"></i>
                </button>
            </div>
        </div>
    </section>

    <!-- Share Your Experience - Adjusted padding and font sizes -->
    <section class="py-12 md:py-16 bg-blue-600 text-white">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-2xl md:text-3xl font-bold mb-4 md:mb-6">Share Your Experience</h2>
            <p class="text-lg md:text-xl mb-6 md:mb-8 max-w-2xl mx-auto">Help others make informed decisions by sharing your honest reviews</p>
            <button class="bg-white text-blue-600 px-6 py-2 md:px-8 md:py-3 rounded-full font-semibold hover:bg-gray-100 transition-all text-sm md:text-base">
                Write a Review
            </button>
        </div>
    </section>

 <!-- Latest Articles Section -->
    <section class="py-12 md:py-16 bg-white">
        <div class="container mx-auto px-4">
            <!-- The main container with border and padding -->
            <div class="border border-gray-200 rounded-lg p-6 md:p-8 bg-white shadow-sm">
                <h2 class="text-2xl font-bold mb-6 border-b border-gray-200 pb-4">Latest Blogs</h2>
                
                <!-- Scrollable content area with a fixed height -->
                <div id="scrollable-articles" class="h-[450px] overflow-y-auto custom-scrollbar pr-4 -mr-4">
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-x-8 gap-y-8">
                        
                        <!-- Article 1 -->
                        <div class="flex items-start gap-4">
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSz7HvAkabgV6d_K0cCV2nqHIzwCiq6fnJXIw&s" alt="3D Organoids" class="w-40 h-24 object-cover rounded-md flex-shrink-0">
                            <div>
                                <a href="#" class="text-lg font-semibold text-blue-600 hover:underline">2D Cell Lines vs 3D Organoids</a>
                                <p class="text-sm text-gray-600 mt-1">Comparing the strengths and limitations of each approach.</p>
                            </div>
                        </div>
                        
                        <!-- Article 2 -->
                        <div class="flex items-start gap-4">
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQfRljrKpxGjwb96o1cuPb60xN2IV_109eXtQ&s" alt="Primary Cell Culture" class="w-40 h-24 object-cover rounded-md flex-shrink-0">
                            <div>
                                <a href="#" class="text-lg font-semibold text-blue-600 hover:underline">Perfecting Primary Cell Culture</a>
                                <p class="text-sm text-gray-600 mt-1">Key steps, best practices, and troubleshooting tips.</p>
                            </div>
                        </div>
        
                        <!-- Article 3 -->
                        <div class="flex items-start gap-4">
                            <img src="https://images.unsplash.com/photo-1576091160399-112ba8d25d1d?w=200" alt="Protein Quantification" class="w-40 h-24 object-cover rounded-md flex-shrink-0">
                            <div>
                                <a href="#" class="text-lg font-semibold text-blue-600 hover:underline">Protein Quantification Overview</a>
                                <p class="text-sm text-gray-600 mt-1">Considerations for selecting the best assay for your applications.</p>
                            </div>
                        </div>
        
                        <!-- Article 4 -->
                        <div class="flex items-start gap-4">
                            <img src="data:image/jpeg;base64,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" alt="Ferroptosis Markers" class="w-40 h-24 object-cover rounded-md flex-shrink-0">
                            <div>
                                <a href="#" class="text-lg font-semibold text-blue-600 hover:underline">A Guide to Ferroptosis Markers</a>
                                <p class="text-sm text-gray-600 mt-1">Hallmarks of ferroptosis and common detection methods.</p>
                            </div>
                        </div>
                        
                        <!-- Article 5 -->
                        <div class="flex items-start gap-4">
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSjYM2alVhohIws2rGAemqguuO_lxpzuINOpg&s" alt="Laboratory Cold Storage" class="w-40 h-24 object-cover rounded-md flex-shrink-0">
                            <div>
                                <a href="#" class="text-lg font-semibold text-blue-600 hover:underline">Guide to Laboratory Cold Storage</a>
                                <p class="text-sm text-gray-600 mt-1">Best practices for maintaining sample integrity in freezers.</p>
                            </div>
                        </div>
        
                        <!-- Article 6 -->
                        <div class="flex items-start gap-4">
                            <img src="https://images.unsplash.com/photo-1576091160399-112ba8d25d1d?w=200" alt="Gel Imaging" class="w-40 h-24 object-cover rounded-md flex-shrink-0">
                            <div>
                                <a href="#" class="text-lg font-semibold text-blue-600 hover:underline">A Brief Guide to Gel Imaging</a>
                                <p class="text-sm text-gray-600 mt-1">Choosing the right system for your western blot analysis.</p>
                            </div>
                        </div>

                        <!-- Article 7 -->
                        <div class="flex items-start gap-4">
                            <img src="data:image/jpeg;base64,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" alt="Microscopy" class="w-40 h-24 object-cover rounded-md flex-shrink-0">
                            <div>
                                <a href="#" class="text-lg font-semibold text-blue-600 hover:underline">Advanced Microscopy Techniques</a>
                                <p class="text-sm text-gray-600 mt-1">Exploring confocal, multiphoton, and super-resolution imaging.</p>
                            </div>
                        </div>
        
                        <!-- Article 8 -->
                        <div class="flex items-start gap-4">
                            <img src="data:image/jpeg;base64,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" alt="Genomics" class="w-40 h-24 object-cover rounded-md flex-shrink-0">
                            <div>
                                <a href="#" class="text-lg font-semibold text-blue-600 hover:underline">The Rise of Single-Cell Genomics</a>
                                <p class="text-sm text-gray-600 mt-1">Unraveling cellular heterogeneity one cell at a time.</p>
                            </div>
                        </div>

                        <!-- Add more articles here as needed -->

                    </div>
                </div>
				<!-- View All Button -->
            <div class="mt-8 flex justify-center">
                <a href="#" class="bg-blue-600 text-white font-semibold py-2 px-6 rounded-md hover:bg-blue-700 transition-colors">
                    View all
                </a>
            </div>
            </div>
        </div>
    </section>

    <!-- Recent Reviews - Made responsive for mobile -->
    <section class="py-12 md:py-16 bg-white">
        <div class="container mx-auto px-4">
            <h2 class="text-2xl md:text-3xl font-bold text-center mb-8 md:mb-12">Recent Reviews</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8 review-grid" id="reviewsContainer">
                <!-- Review 1 -->
                <div class="bg-gray-50 p-4 sm:p-6 rounded-lg">
                    <div class="flex items-center mb-3 sm:mb-4">
                        <div class="w-10 h-10 sm:w-12 sm:h-12 bg-gray-300 rounded-full mr-3 sm:mr-4"></div>
                        <div>
                            <h3 class="font-semibold text-sm sm:text-base">GreenTech Solutions</h3>
                            <div class="flex text-yellow-400 text-xs sm:text-sm">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="far fa-star"></i>
                            </div>
                        </div>
                    </div>
                    <p class="text-gray-600 mb-3 sm:mb-4 text-sm sm:text-base">"Their eco-friendly products are high quality and the customer service is exceptional. Highly recommend for sustainable solutions."</p>
                    <p class="text-gray-400 text-xs sm:text-sm">Posted on May 15, 2023</p>
                </div>
                
                <!-- Review 2 -->
                <div class="bg-gray-50 p-4 sm:p-6 rounded-lg">
                    <div class="flex items-center mb-3 sm:mb-4">
                        <div class="w-10 h-10 sm:w-12 sm:h-12 bg-gray-300 rounded-full mr-3 sm:mr-4"></div>
                        <div>
                            <h3 class="font-semibold text-sm sm:text-base">Foodie Delights</h3>
                            <div class="flex text-yellow-400 text-xs sm:text-sm">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                        </div>
                    </div>
                    <p class="text-gray-600 mb-3 sm:mb-4 text-sm sm:text-base">"Amazing food quality and delivery was super fast. The packaging was eco-friendly which I really appreciate."</p>
                    <p class="text-gray-400 text-xs sm:text-sm">Posted on May 12, 2023</p>
                </div>
                
                <!-- Review 3 -->
                <div class="bg-gray-50 p-4 sm:p-6 rounded-lg">
                    <div class="flex items-center mb-3 sm:mb-4">
                        <div class="w-10 h-10 sm:w-12 sm:h-12 bg-gray-300 rounded-full mr-3 sm:mr-4"></div>
                        <div>
                            <h3 class="font-semibold text-sm sm:text-base">TravelEase</h3>
                            <div class="flex text-yellow-400 text-xs sm:text-sm">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                        </div>
                    </div>
                    <p class="text-gray-600 mb-3 sm:mb-4 text-sm sm:text-base">"Booked a last-minute vacation package and everything was perfect. Great value for money and excellent customer support."</p>
                    <p class="text-gray-400 text-xs sm:text-sm">Posted on May 8, 2023</p>
                </div>
                
                <!-- Additional Reviews (hidden by default) -->
                <div class="additional-review hidden bg-gray-50 p-4 sm:p-6 rounded-lg">
                    <div class="flex items-center mb-3 sm:mb-4">
                        <div class="w-10 h-10 sm:w-12 sm:h-12 bg-gray-300 rounded-full mr-3 sm:mr-4"></div>
                        <div>
                            <h3 class="font-semibold text-sm sm:text-base">TechSolutions Inc.</h3>
                            <div class="flex text-yellow-400 text-xs sm:text-sm">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                        </div>
                    </div>
                    <p class="text-gray-600 mb-3 sm:mb-4 text-sm sm:text-base">"Their software has transformed our business operations. The implementation team was professional and the training was excellent."</p>
                    <p class="text-gray-400 text-xs sm:text-sm">Posted on May 5, 2023</p>
                </div>
                
                <div class="additional-review hidden bg-gray-50 p-4 sm:p-6 rounded-lg">
                    <div class="flex items-center mb-3 sm:mb-4">
                        <div class="w-10 h-10 sm:w-12 sm:h-12 bg-gray-300 rounded-full mr-3 sm:mr-4"></div>
                        <div>
                            <h3 class="font-semibold text-sm sm:text-base">HealthCare Plus</h3>
                            <div class="flex text-yellow-400 text-xs sm:text-sm">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                        </div>
                    </div>
                    <p class="text-gray-600 mb-3 sm:mb-4 text-sm sm:text-base">"The doctors here are very knowledgeable and caring. The facilities are clean and modern. Highly recommended for family healthcare."</p>
                    <p class="text-gray-400 text-xs sm:text-sm">Posted on May 3, 2023</p>
                </div>
                
                <div class="additional-review hidden bg-gray-50 p-4 sm:p-6 rounded-lg">
                    <div class="flex items-center mb-3 sm:mb-4">
                        <div class="w-10 h-10 sm:w-12 sm:h-12 bg-gray-300 rounded-full mr-3 sm:mr-4"></div>
                        <div>
                            <h3 class="font-semibold text-sm sm:text-base">EduFuture Academy</h3>
                            <div class="flex text-yellow-400 text-xs sm:text-sm">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                        </div>
                    </div>
                    <p class="text-gray-600 mb-3 sm:mb-4 text-sm sm:text-base">"My child has improved significantly since joining. The teachers are dedicated and the curriculum is well-structured."</p>
                    <p class="text-gray-400 text-xs sm:text-sm">Posted on April 28, 2023</p>
                </div>
                
                <div class="additional-review hidden bg-gray-50 p-4 sm:p-6 rounded-lg">
                    <div class="flex items-center mb-3 sm:mb-4">
                        <div class="w-10 h-10 sm:w-12 sm:h-12 bg-gray-300 rounded-full mr-3 sm:mr-4"></div>
                        <div>
                            <h3 class="font-semibold text-sm sm:text-base">Global Finance</h3>
                            <div class="flex text-yellow-400 text-xs sm:text-sm">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="far fa-star"></i>
                            </div>
                        </div>
                    </div>
                    <p class="text-gray-600 mb-3 sm:mb-4 text-sm sm:text-base">"Excellent financial advice and investment options. My portfolio has grown steadily with their guidance."</p>
                    <p class="text-gray-400 text-xs sm:text-sm">Posted on April 25, 2023</p>
                </div>
                
                <div class="additional-review hidden bg-gray-50 p-4 sm:p-6 rounded-lg">
                    <div class="flex items-center mb-3 sm:mb-4">
                        <div class="w-10 h-10 sm:w-12 sm:h-12 bg-gray-300 rounded-full mr-3 sm:mr-4"></div>
                        <div>
                            <h3 class="font-semibold text-sm sm:text-base">ShopEasy</h3>
                            <div class="flex text-yellow-400 text-xs sm:text-sm">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                        </div>
                    </div>
                    <p class="text-gray-600 mb-3 sm:mb-4 text-sm sm:text-base">"Great selection of products and competitive prices. Delivery is always on time and customer service is responsive."</p>
                    <p class="text-gray-400 text-xs sm:text-sm">Posted on April 22, 2023</p>
                </div>
                
                <div class="additional-review hidden bg-gray-50 p-4 sm:p-6 rounded-lg">
                    <div class="flex items-center mb-3 sm:mb-4">
                        <div class="w-10 h-10 sm:w-12 sm:h-12 bg-gray-300 rounded-full mr-3 sm:mr-4"></div>
                        <div>
                            <h3 class="font-semibold text-sm sm:text-base">Luxury Stays</h3>
                            <div class="flex text-yellow-400 text-xs sm:text-sm">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                        </div>
                    </div>
                    <p class="text-gray-600 mb-3 sm:mb-4 text-sm sm:text-base">"Beautiful properties with top-notch amenities. The concierge service went above and beyond to make our stay memorable."</p>
                    <p class="text-gray-400 text-xs sm:text-sm">Posted on April 18, 2023</p>
                </div>
            </div>
            
            <div class="text-center">
                <button id="viewAllReviews" class="border border-blue-600 text-blue-600 px-5 py-1.5 sm:px-6 sm:py-2 rounded-full hover:bg-blue-600 hover:text-white transition-all text-sm sm:text-base">
                    View All Reviews
                </button>
            </div>
        </div>
    </section>

    <!-- Info Section - Made responsive for mobile -->
    <section class="py-10 px-4 sm:px-6 md:px-16 bg-gray-50">
        <div class="container mx-auto">
            <div class="flex flex-col md:flex-row gap-6 md:gap-8 lg:gap-12">
                <!-- Left Column - Icon List -->
                <div class="md:w-1/2 space-y-4 sm:space-y-6">
                    <!-- Item 1 -->
                    <div class="flex items-start gap-3 sm:gap-4">
                        <div class="bg-blue-100 p-2 sm:p-3 rounded-full flex-shrink-0">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 sm:h-6 sm:w-6 text-blue-600" viewBox="0 0 24 24" fill="currentColor">
                                <path fill-rule="evenodd" d="M8.603 3.799A4.49 4.49 0 0112 2.25c1.357 0 2.573.6 3.397 1.549a4.49 4.49 0 013.498 1.307 4.491 4.491 0 011.307 3.497A4.49 4.49 0 0121.75 12a4.49 4.49 0 01-1.549 3.397 4.491 4.491 0 01-1.307 3.497 4.491 4.491 0 01-3.497 1.307A4.49 4.49 0 0112 21.75a4.49 4.49 0 01-3.397-1.549 4.49 4.49 0 01-3.498-1.306 4.491 4.491 0 01-1.307-3.498A4.49 4.49 0 012.25 12c0-1.357.6-2.573 1.549-3.397a4.49 4.49 0 011.307-3.497 4.49 4.49 0 013.497-1.307zm7.007 6.387a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-base sm:text-lg font-bold text-gray-900">Verified Reviews</h3>
                            <p class="text-gray-600 mt-1 text-sm sm:text-base">Every review goes through our verification process to ensure authenticity.</p>
                        </div>
                    </div>
                    
                    <!-- Item 2 -->
                    <div class="flex items-start gap-3 sm:gap-4">
                        <div class="bg-blue-100 p-2 sm:p-3 rounded-full flex-shrink-0">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 sm:h-6 sm:w-6 text-blue-600" viewBox="0 0 24 24" fill="currentColor">
                                <path fill-rule="evenodd" d="M12.516 2.17a.75.75 0 00-1.032 0 11.209 11.209 0 01-7.877 3.08.75.75 0 00-.722.515A12.74 12.74 0 002.25 9.75c0 5.942 4.064 10.933 9.563 12.348a.749.749 0 00.374 0c5.499-1.415 9.563-6.406 9.563-12.348 0-1.39-.223-2.73-.635-3.985a.75.75 0 00-.722-.516l-.143.001c-2.996 0-5.717-1.17-7.734-3.08zm3.094 8.016a.75.75 0 10-1.22-.872l-2.871 4.028-.87-.99a.75.75 0 10-1.14.974l1.5 1.714a.75.75 0 001.14-.043l3.5-4.811z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-base sm:text-lg font-bold text-gray-900">Trusted Platform</h3>
                            <p class="text-gray-600 mt-1 text-sm sm:text-base">We maintain transparency with both positive and negative feedback.</p>
                        </div>
                    </div>
                </div>
                
                <!-- Right Column - Text Block -->
                <div class="md:w-1/2">
                    <h2 class="text-xl sm:text-2xl md:text-3xl font-bold text-gray-900 mb-3 sm:mb-4">Trust & Transparency</h2>
                    <p class="text-gray-700 mb-4 sm:mb-6 text-sm sm:text-base">
                        At SCIZORA, we're committed to helping you make informed decisions by providing authentic, 
                        verified reviews from real customers. Our platform ensures complete transparency so you can 
                        trust the information you find here.
                    </p>
                    <a href="#" class="text-blue-600 hover:text-blue-700 transition-all inline-flex items-center group text-sm sm:text-base">
                        Learn more about our review process
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 sm:h-4 sm:w-4 ml-1 group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </section>
   

    <!-- Mobile App Download - Made responsive for mobile -->
    <section class="py-12 md:py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="flex flex-col md:flex-row items-center">
                <div class="md:w-1/2 mb-8 md:mb-0">
                    <h2 class="text-2xl md:text-3xl font-bold mb-4 sm:mb-6">Download Our App</h2>
                    <p class="text-gray-600 mb-6 sm:mb-8 max-w-md text-sm sm:text-base">Get instant access to company reviews, submit your own feedback, and receive personalized recommendations - all from the palm of your hand.</p>
                    
                    <div class="flex flex-col sm:flex-row space-y-3 sm:space-y-0 sm:space-x-4">
                        <button class="bg-black text-white px-4 py-2 sm:px-6 sm:py-3 rounded-lg flex items-center justify-center">
                            <i class="fab fa-apple text-xl sm:text-2xl mr-2 sm:mr-3"></i>
                            <div class="text-left">
                                <div class="text-xs">Download on the</div>
                                <div class="font-semibold text-sm sm:text-base">App Store</div>
                            </div>
                        </button>
                        
                        <button class="bg-black text-white px-4 py-2 sm:px-6 sm:py-3 rounded-lg flex items-center justify-center">
                            <i class="fab fa-google-play text-xl sm:text-2xl mr-2 sm:mr-3"></i>
                            <div class="text-left">
                                <div class="text-xs">Get it on</div>
                                <div class="font-semibold text-sm sm:text-base">Google Play</div>
                            </div>
                        </button>
                    </div>
                </div>
                
                <div class="md:w-1/2 flex justify-center">
                    <div class="mobile-mockup w-48 h-72 sm:w-56 sm:h-84 md:w-64 md:h-96 rounded-2xl sm:rounded-3xl border-6 sm:border-8 border-black shadow-xl overflow-hidden"></div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer Ad Banner -->
    <div class="container mx-auto px-4 py-6">
        <img src="https://tpc.googlesyndication.com/simgad/13265185988757716340" alt="Advertisement" class="w-full h-auto mx-auto">
    </div>

    <!-- Footer - Made responsive for mobile -->
    <footer class="bg-gray-900 text-white pt-12 pb-6 md:pt-16 md:pb-8">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 md:gap-8 mb-8 md:mb-12 footer-grid">
                <!-- About SCIZORA -->
                <div>
                    <h3 class="text-lg md:text-xl font-bold mb-3 md:mb-4"><a href="#" class="text-xl md:text-2xl font-bold"><img src="logo.jpg" alt="logo" width="200" height="300"></a></h3>
                    <p class="text-gray-400 mb-3 md:mb-4 text-sm sm:text-base">SCIZORA helps consumers find trustworthy businesses through verified reviews and ratings from real customers.</p>
                    <div class="flex space-x-3 md:space-x-4">
                        <a href="#" class="text-gray-400 hover:text-white transition-all"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="text-gray-400 hover:text-white transition-all"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="text-gray-400 hover:text-white transition-all"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="text-gray-400 hover:text-white transition-all"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                
                <!-- Quick Links -->
                <div>
                    <h3 class="text-lg md:text-xl font-bold mb-3 md:mb-4">Quick Links</h3>
                    <ul class="space-y-1 md:space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-white transition-all text-sm sm:text-base">Dashboard</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-all text-sm sm:text-base">Categories</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-all text-sm sm:text-base">Top Companies</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-all text-sm sm:text-base">Recent Reviews</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-all text-sm sm:text-base">Write a Review</a></li>
                    </ul>
                </div>
                
                <!-- Legal -->
                <div>
                    <h3 class="text-lg md:text-xl font-bold mb-3 md:mb-4">Legal</h3>
                    <ul class="space-y-1 md:space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-white transition-all text-sm sm:text-base">Terms of Service</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-all text-sm sm:text-base">Privacy Policy</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-all text-sm sm:text-base">Cookie Policy</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-all text-sm sm:text-base">GDPR Compliance</a></li>
                    </ul>
                </div>
                
                <!-- Newsletter -->
                <div>
                    <h3 class="text-lg md:text-xl font-bold mb-3 md:mb-4">Newsletter</h3>
                    <p class="text-gray-400 mb-3 md:mb-4 text-sm sm:text-base">Subscribe to our newsletter for the latest updates and featured companies.</p>
                    <div class="flex">
                        <input type="email" placeholder="Your email" class="bg-gray-800 text-white px-3 py-1.5 sm:px-4 sm:py-2 rounded-l-lg focus:outline-none w-full text-sm sm:text-base newsletter-input">
                        <button class="bg-blue-600 text-white px-3 py-1.5 sm:px-4 sm:py-2 rounded-r-lg hover:bg-blue-700 transition-all">
                            <i class="fas fa-paper-plane text-sm sm:text-base"></i>
                        </button>
                    </div>
                </div>
            </div>
            
            <div class="border-t border-gray-800 pt-6 md:pt-8 text-center text-gray-400 text-sm sm:text-base">
                <p>&copy; 2025 SCIZORA. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script>
        // Mobile menu toggle
        document.getElementById('mobile-menu-button').addEventListener('click', function() {
            const menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
        });
        
        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                
                const targetId = this.getAttribute('href');
                if (targetId === '#') return;
                
                const targetElement = document.querySelector(targetId);
                if (targetElement) {
                    targetElement.scrollIntoView({
                        behavior: 'smooth'
                    });
                }
            });
        });
        
        // Expandable Categories Section
        const toggleCategoriesBtn = document.getElementById('toggleCategories');
        const categoriesContainer = document.getElementById('categoriesContainer');
        const additionalCategories = document.querySelectorAll('.additional-category');
        let categoriesExpanded = false;
        
        toggleCategoriesBtn.addEventListener('click', function() {
            categoriesExpanded = !categoriesExpanded;
            
            if (categoriesExpanded) {
                // Expand
                additionalCategories.forEach(cat => cat.classList.remove('hidden'));
                categoriesContainer.style.height = 'auto';
                toggleCategoriesBtn.textContent = 'Show Less Categories';
            } else {
                // Collapse
                additionalCategories.forEach(cat => cat.classList.add('hidden'));
                categoriesContainer.style.height = 'auto';
                toggleCategoriesBtn.textContent = 'Browse All Categories';
            }
        });
        
        // Horizontal Navigation for Top Rated Companies
        const scrollLeftBtn = document.getElementById('scrollLeft');
        const scrollRightBtn = document.getElementById('scrollRight');
        const companiesContainer = document.getElementById('companiesContainer');
        
        scrollLeftBtn.addEventListener('click', function() {
            companiesContainer.scrollBy({
                left: -300,
                behavior: 'smooth'
            });
        });
        
        scrollRightBtn.addEventListener('click', function() {
            companiesContainer.scrollBy({
                left: 300,
                behavior: 'smooth'
            });
        });
        
        // Show/hide arrows based on scroll position
        companiesContainer.addEventListener('scroll', function() {
            const scrollLeft = companiesContainer.scrollLeft;
            const maxScroll = companiesContainer.scrollWidth - companiesContainer.clientWidth;
            
            scrollLeftBtn.style.display = scrollLeft > 0 ? 'block' : 'none';
            scrollRightBtn.style.display = scrollLeft < maxScroll - 10 ? 'block' : 'none';
        });
        
        // Initial check for arrows
        companiesContainer.dispatchEvent(new Event('scroll'));
        
        // Expandable Recent Reviews
        const viewAllReviewsBtn = document.getElementById('viewAllReviews');
        const reviewsContainer = document.getElementById('reviewsContainer');
        const additionalReviews = document.querySelectorAll('.additional-review');
        let reviewsExpanded = false;
        
        viewAllReviewsBtn.addEventListener('click', function() {
            reviewsExpanded = !reviewsExpanded;
            
            if (reviewsExpanded) {
                // Expand
                additionalReviews.forEach(review => review.classList.remove('hidden'));
                reviewsContainer.classList.add('grid-cols-1', 'md:grid-cols-2', 'lg:grid-cols-3');
                viewAllReviewsBtn.textContent = 'Show Less Reviews';
            } else {
                // Collapse
                additionalReviews.forEach(review => review.classList.add('hidden'));
                reviewsContainer.classList.add('grid-cols-1', 'md:grid-cols-2');
                viewAllReviewsBtn.textContent = 'View All Reviews';
            }
        });
		
    </script>
</body>
</html>