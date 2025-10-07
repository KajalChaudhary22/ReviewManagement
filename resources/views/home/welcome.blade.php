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
                        primary: '#1544da', // NEW: Main Blue
                        secondary: '#1124aa', // NEW: Dark Blue
                        dark: '#1A202C',
                        blue: {
                            100: '#eaf0ff', // NEW: Very Light Blue for backgrounds
                            400: '#5669bc', // NEW: Light Blue
                            600: '#1544da', // NEW: Main Blue
                            700: '#1124aa', // NEW: Dark Blue
                        }
                    }
                }
            }
        }
    </script>
    @include('home.styles')
</head>

<body class="bg-gray-50">
    <!-- Sticky Header - Made more compact for mobile -->
    @include('home.header')


    <!-- Hero Section - Optimized for mobile -->
    <section class="hero-bg text-white py-16 md:py-32 hero-section">
        <div class="container mx-auto px-4 text-center">
            <h1 class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-bold mb-4 px-2">The Future of AI-Powered
                Scientific Procurement</h1>
            <p class="text-base sm:text-lg md:text-xl lg:text-2xl mb-6 md:mb-8 max-w-2xl mx-auto px-2">Connecting
                innovators, buyers, and suppliers through the world's most intelligent life sciences network.</p>

            <button
                class="bg-blue-600 text-white px-8 py-3 md:px-10 md:py-4 rounded-full font-semibold hover:bg-blue-700 transition-all text-sm md:text-base">
                Get Started
            </button>
        </div>
    </section>
    <!-- Ad Banner -->
    <div class="container mx-auto px-4 py-2">
        <img src="https://tpc.googlesyndication.com/simgad/13265185988757716340" alt="Advertisement"
            class="w-full h-auto mx-auto">
    </div>

    <!-- Trusted By Section -->
    <section class="py-10 bg-gray-100">
        <div class="container mx-auto px-4">
            <h2 class="text-xl md:text-2xl font-bold text-center mb-8">Trusted by Leading Brands</h2>
            <div class="flex flex-wrap justify-center items-center gap-6 md:gap-10 trusted-logos">
                <img src="https://logo.clearbit.com/pfizer.com" alt="Pfizer"
                    class="h-8 md:h-12 grayscale hover:grayscale transition-all">
                <img src="https://logo.clearbit.com/roche.com" alt="Roche"
                    class="h-8 md:h-12 grayscale hover:grayscale transition-all">
                <img src="https://logo.clearbit.com/novartis.com" alt="Novartis"
                    class="h-8 md:h-12 grayscale hover:grayscale transition-all">
                <img src="https://logo.clearbit.com/thermofisher.com" alt="Thermo Fisher"
                    class="h-8 md:h-12 grayscale hover:grayscale transition-all">
                <img src="https://logo.clearbit.com/bayer.com" alt="Bayer"
                    class="h-8 md:h-12 grayscale hover:grayscale transition-all">
            </div>
        </div>
    </section>



    <!-- Browse by Category - Made responsive for mobile -->
    <section class="py-12 md:py-16 bg-white">
        <div class="container mx-auto px-4">
            <h2 class="text-2xl md:text-3xl font-bold text-center mb-8 md:mb-12">Browse by Category</h2>

            <div class="categories-container" id="categoriesContainer" style="height: auto;">
                <div
                    class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-3 lg:grid-cols-6 gap-3 sm:gap-4 md:gap-6 mb-8 md:mb-10 category-grid">
                    @forelse ($productCategoies as $productCat)
                        <a
                            href="{{ route('category.products', ['ty' => custom_encrypt('CategoryProducts'), 'id' => custom_encrypt($productCat?->id)]) }}">
                            <div
                                class="bg-gray-50 p-4 sm:p-6 rounded-lg text-center hover:shadow-md transition-all cursor-pointer">
                                <div
                                    class="bg-blue-100 w-12 h-12 sm:w-14 sm:h-14 md:w-16 md:h-16 mx-auto rounded-full flex items-center justify-center mb-2 sm:mb-3">
                                    {{-- <i class="fas fa-dna text-blue-600 text-xl sm:text-2xl"></i> --}}
                                    <img src="{{ asset($productCat?->images?->path) }}">
                                </div>
                                <h3 class="font-semibold text-sm sm:text-base">{{ $productCat?->name }}</h3>
                            </div>
                        </a>
                    @empty
                        <p>No Categories Found</p>
                    @endforelse
                </div>
            </div>

            {{-- <div class="text-center">
                <button id="toggleCategories"
                    class="border border-blue-600 text-blue-600 px-5 py-1.5 sm:px-6 sm:py-2 rounded-full hover:bg-blue-600 hover:text-white transition-all text-sm sm:text-base">
                    Browse All Categories
                </button>
            </div> --}}
        </div>
    </section>

    <!-- Top Rated Companies - Made scrollable on mobile -->
    <section class="py-12 md:py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <h2 class="text-2xl md:text-3xl font-bold text-center mb-8 md:mb-12">Top Rated Companies</h2>

            <div class="relative">
                <button id="scrollLeft"
                    class="absolute left-0 top-1/2 transform -translate-y-1/2 bg-white p-2 rounded-full shadow-md z-10 hover:bg-gray-100 transition-all hidden md:block">
                    <i class="fas fa-chevron-left text-blue-600"></i>
                </button>

                <div class="scrollable-companies overflow-x-auto whitespace-nowrap pb-6 -mx-2 px-2"
                    id="companiesContainer">
                    <!-- Company 1 -->
                    <a href="">
                        @foreach($companies as $company)
                            <div
                                class="inline-block w-80 mx-2 bg-white p-4 sm:p-6 rounded-lg shadow-sm hover:shadow-md transition-all whitespace-normal company-card">
                                <div class="flex items-center mb-3 sm:mb-4">
                                    <div
                                        class="w-12 h-12 sm:w-14 sm:h-14 md:w-16 md:h-16 bg-gray-200 rounded-full flex items-center justify-center mr-3 sm:mr-4">
                                        <i class="fas fa-building text-gray-500 text-xl sm:text-2xl"></i>
                                    </div>
                                    <div>
                                        <h3 class="font-bold text-base sm:text-lg">{{ $company->name }}</h3>
                                         @php
                                            $avgRating = $company->reviews->avg('rating');
                                            $totalReviews = $company->reviews->count();
                                        @endphp
                                        <div class="flex text-yellow-400 text-sm sm:text-base">
                                            @for($i = 1; $i <= 5; $i++)
                                                <i class="fas fa-star {{ $i <= round($avgRating) ? '' : 'text-gray-300' }}"></i>
                                            @endfor
                                            <span class="text-gray-600 ml-2">({{ $totalReviews }})</span>
                                        </div>
                                    </div>
                                </div>
                                <p class="text-gray-600 mb-4 sm:mb-6 text-sm sm:text-base">
                                    @foreach($company->reviews->take(2) as $review)
                                        {{ $review->comment }} .
                                    @endforeach
                                </p>
                                <a href="{{ route('business.profile.home', ['id' => custom_encrypt($company->id)]) }}">
                                    <button
                                        class="w-full bg-blue-600 text-white py-1.5 sm:py-2 rounded-lg hover:bg-blue-700 transition-all text-sm sm:text-base">
                                        View Profile
                                    </button>
                                </a>
                            </div>
                        @endforeach
                    </a>
                </div>

                <button id="scrollRight"
                    class="absolute right-0 top-1/2 transform -translate-y-1/2 bg-white p-2 rounded-full shadow-md z-10 hover:bg-gray-100 transition-all hidden md:block">
                    <i class="fas fa-chevron-right text-blue-600"></i>
                </button>
            </div>
        </div>
    </section>

    <!-- Share Your Experience - Adjusted padding and font sizes -->
    <section class="py-12 md:py-16 bg-blue-600 text-white">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-2xl md:text-3xl font-bold mb-4 md:mb-6">Share Your Experience</h2>
            <p class="text-lg md:text-xl mb-6 md:mb-8 max-w-2xl mx-auto">Help others make informed decisions by sharing
                your honest reviews</p>
            <button id="write-review-btn"
                class="bg-white text-blue-600 px-6 py-2 md:px-8 md:py-3 rounded-full font-semibold hover:bg-gray-100 transition-all text-sm md:text-base">
                Write a Review
            </button>
        </div>
    </section>

    <!-- Popup Review Form -->
    <div id="review-popup" class="fixed inset-0 bg-gray-900 bg-opacity-75 flex items-center justify-center z-50 hidden">
        <div class="bg-white rounded-lg shadow-2xl p-6 md:p-8 w-11/12 md:w-2/3 lg:w-1/2 transform transition-all scale-95 opacity-0">
            <!-- Popup Header -->
            <div class="flex justify-between items-center border-b border-gray-200 pb-4 mb-4">
                <h2 class="text-xl md:text-2xl font-bold">Write a Review</h2>
                <button id="close-popup" class="text-gray-500 hover:text-gray-800">
                    <i class="fas fa-times text-xl"></i>
                </button>
            </div>
    
            <!-- Popup Body -->
            <div class="space-y-4">
                <!-- Company Name -->
                <div>
                    <label for="company-name" class="block text-sm font-medium text-gray-700">Company Name</label>
                    <input type="text" id="company-name" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                </div>
    
                <!-- Star Rating -->
                <div>
                    <label class="block text-sm font-medium text-gray-700">Your Rating</label>
                    <div class="flex items-center mt-1">
                        <i class="fas fa-star text-gray-300 text-2xl cursor-pointer star" data-value="1"></i>
                        <i class="fas fa-star text-gray-300 text-2xl cursor-pointer star" data-value="2"></i>
                        <i class="fas fa-star text-gray-300 text-2xl cursor-pointer star" data-value="3"></i>
                        <i class="fas fa-star text-gray-300 text-2xl cursor-pointer star" data-value="4"></i>
                        <i class="fas fa-star text-gray-300 text-2xl cursor-pointer star" data-value="5"></i>
                    </div>
                </div>
    
                <!-- Review Text -->
                <div>
                    <label for="review-text" class="block text-sm font-medium text-gray-700">Your Review</label>
                    <textarea id="review-text" rows="5" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500"></textarea>
                </div>
    
                <!-- Submit Button -->
                <button class="w-full bg-blue-600 text-white py-2.5 rounded-lg font-semibold hover:bg-blue-700 transition-all">
                    Submit Review
                </button>
            </div>
        </div>
    </div>

    <!-- Latest Articles Section -->


    <!-- Recent Reviews - Made responsive for mobile -->
    <section class="py-12 md:py-16 bg-white">
        <div class="container mx-auto px-4">
            <h2 class="text-2xl md:text-3xl font-bold text-center mb-8 md:mb-12">Recent Reviews</h2>

            @if ($latestReviews?->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8 review-grid"
                    id="reviewsContainer">
                    @foreach ($latestReviews as $index => $review)
                        <div
                            class="bg-gray-50 p-4 sm:p-6 rounded-lg {{ $index >= 3 ? 'additional-review hidden' : '' }}">
                            <div class="flex items-center mb-3 sm:mb-4">
                                <div class="w-10 h-10 sm:w-12 sm:h-12 bg-gray-300 rounded-full mr-3 sm:mr-4"></div>
                                <div>
                                    <h3 class="font-semibold text-sm sm:text-base">
                                        {{ $review?->customerDetails?->name ?? 'Unknown User' }}
                                    </h3>
                                    <div class="flex text-yellow-400 text-xs sm:text-sm">
                                        @for ($i = 1; $i <= 5; $i++)
                                            @if ($i <= floor($review->rating))
                                                <i class="fas fa-star"></i>
                                            @elseif($i - $review->rating < 1)
                                                <i class="fas fa-star-half-alt"></i>
                                            @else
                                                <i class="far fa-star"></i>
                                            @endif
                                        @endfor
                                    </div>
                                </div>
                            </div>
                            <p class="text-gray-600 mb-3 sm:mb-4 text-sm sm:text-base">
                                "{{ $review?->comment }}"
                            </p>
                            <p class="text-gray-400 text-xs sm:text-sm">
                                Posted on {{ \Carbon\Carbon::parse($review?->created_at)->format('M d, Y') }}
                            </p>
                        </div>
                    @endforeach
                </div>

                @if ($latestReviews?->count() > 3)
                    <div class="text-center">
                        <button id="viewAllReviews"
                            class="border border-blue-600 text-blue-600 px-5 py-1.5 sm:px-6 sm:py-2 rounded-full hover:bg-blue-600 hover:text-white transition-all text-sm sm:text-base">
                            View All Reviews
                        </button>
                    </div>
                @endif
            @else
                <p class="text-center text-gray-500 text-base">No reviews available</p>
            @endif
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
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 sm:h-6 sm:w-6 text-blue-600"
                                viewBox="0 0 24 24" fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M8.603 3.799A4.49 4.49 0 0112 2.25c1.357 0 2.573.6 3.397 1.549a4.49 4.49 0 013.498 1.307 4.491 4.491 0 011.307 3.497A4.49 4.49 0 0121.75 12a4.49 4.49 0 01-1.549 3.397 4.491 4.491 0 01-1.307 3.497 4.491 4.491 0 01-3.497 1.307A4.49 4.49 0 0112 21.75a4.49 4.49 0 01-3.397-1.549 4.49 4.49 0 01-3.498-1.306 4.491 4.491 0 01-1.307-3.498A4.49 4.49 0 012.25 12c0-1.357.6-2.573 1.549-3.397a4.49 4.49 0 011.307-3.497 4.49 4.49 0 013.497-1.307zm7.007 6.387a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-base sm:text-lg font-bold text-gray-900">Verified Reviews</h3>
                            <p class="text-gray-600 mt-1 text-sm sm:text-base">Every review goes through our
                                verification process to ensure authenticity.</p>
                        </div>
                    </div>

                    <!-- Item 2 -->
                    <div class="flex items-start gap-3 sm:gap-4">
                        <div class="bg-blue-100 p-2 sm:p-3 rounded-full flex-shrink-0">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 sm:h-6 sm:w-6 text-blue-600"
                                viewBox="0 0 24 24" fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M12.516 2.17a.75.75 0 00-1.032 0 11.209 11.209 0 01-7.877 3.08.75.75 0 00-.722.515A12.74 12.74 0 002.25 9.75c0 5.942 4.064 10.933 9.563 12.348a.749.749 0 00.374 0c5.499-1.415 9.563-6.406 9.563-12.348 0-1.39-.223-2.73-.635-3.985a.75.75 0 00-.722-.516l-.143.001c-2.996 0-5.717-1.17-7.734-3.08zm3.094 8.016a.75.75 0 10-1.22-.872l-2.871 4.028-.87-.99a.75.75 0 10-1.14.974l1.5 1.714a.75.75 0 001.14-.043l3.5-4.811z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-base sm:text-lg font-bold text-gray-900">Trusted Platform</h3>
                            <p class="text-gray-600 mt-1 text-sm sm:text-base">We maintain transparency with both
                                positive and negative feedback.</p>
                        </div>
                    </div>
                </div>

                <!-- Right Column - Text Block -->
                <div class="md:w-1/2">
                    <h2 class="text-xl sm:text-2xl md:text-3xl font-bold text-gray-900 mb-3 sm:mb-4">Trust &
                        Transparency</h2>
                    <p class="text-gray-700 mb-4 sm:mb-6 text-sm sm:text-base">
                        At SCIZORA, we're committed to helping you make informed decisions by providing authentic,
                        verified reviews from real customers. Our platform ensures complete transparency so you can
                        trust the information you find here.
                    </p>
                    <a href="User Pages\review-program.html"
                        class="text-blue-600 hover:text-blue-700 transition-all inline-flex items-center group text-sm sm:text-base">
                        Learn more about our review process
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="h-3 w-3 sm:h-4 sm:w-4 ml-1 group-hover:translate-x-1 transition-transform"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M14 5l7 7m0 0l-7 7m7-7H3" />
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
                    <p class="text-gray-600 mb-6 sm:mb-8 max-w-md text-sm sm:text-base">Get instant access to company
                        reviews, submit your own feedback, and receive personalized recommendations - all from the palm
                        of your hand.</p>

                    <div class="flex flex-col sm:flex-row space-y-3 sm:space-y-0 sm:space-x-4">
                        <button
                            class="bg-black text-white px-4 py-2 sm:px-6 sm:py-3 rounded-lg flex items-center justify-center">
                            <i class="fab fa-apple text-xl sm:text-2xl mr-2 sm:mr-3"></i>
                            <div class="text-left">
                                <div class="text-xs">Download on the</div>
                                <div class="font-semibold text-sm sm:text-base">App Store</div>
                            </div>
                        </button>

                        <button
                            class="bg-black text-white px-4 py-2 sm:px-6 sm:py-3 rounded-lg flex items-center justify-center">
                            <i class="fab fa-google-play text-xl sm:text-2xl mr-2 sm:mr-3"></i>
                            <div class="text-left">
                                <div class="text-xs">Get it on</div>
                                <div class="font-semibold text-sm sm:text-base">Google Play</div>
                            </div>
                        </button>
                    </div>
                </div>

                <div class="md:w-1/2 flex justify-center">
                    <div
                        class="mobile-mockup w-48 h-72 sm:w-56 sm:h-84 md:w-64 md:h-96 rounded-2xl sm:rounded-3xl border-6 sm:border-8 border-black shadow-xl overflow-hidden">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer Ad Banner -->
    <div class="container mx-auto px-4 py-6">
        <img src="https://tpc.googlesyndication.com/simgad/13265185988757716340" alt="Advertisement"
            class="w-full h-auto mx-auto">
    </div>

    <!-- Footer - Made responsive for mobile -->
    @include('home.footer')

    @include('home.scripts')
</body>

</html>