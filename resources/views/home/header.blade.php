<header class="sticky top-0 z-50 bg-white shadow-md">
    <nav class="container mx-auto px-4 py-3 flex justify-between items-center">
        <div class="flex items-center">
            <a href="#" class="text-xl md:text-2xl font-bold"><img src="{{ asset('build/images/logo.jpg') }}" alt="logo"
                    width="200" height="300"></a>
        </div>

        <div class="hidden md:flex items-center space-x-6 lg:space-x-8">
            <a href="{{ url('/') }}" class="text-gray-700 hover:text-blue-600 transition-all text-sm lg:text-base">Home</a>
            <a href="{{ route('categories') }}"
                class="text-gray-700 hover:text-blue-600 transition-all text-sm lg:text-base">Categories</a>
            <a href="{{ route('blogs') }}"
                class="text-gray-700 hover:text-blue-600 transition-all text-sm lg:text-base">Blog</a>
            <a href="{{ route('about.us') }}"
                class="text-gray-700 hover:text-blue-600 transition-all text-sm lg:text-base">About Us</a>
            <a href="{{ route('contact') }}"
                class="text-gray-700 hover:text-blue-600 transition-all text-sm lg:text-base">Contact</a>
        </div>

        <div class="flex items-center space-x-3 md:space-x-4">
            <a href="{{route('business.auth.show')}}">
                <button
                    class="hidden md:block bg-blue-600 text-white px-3 py-1.5 md:px-4 md:py-2 rounded-full hover:bg-blue-700 transition-all text-sm md:text-base">
                    Business Login
                </button>
            </a>
            <a href="{{route('customer.auth.show')}}">
                <button
                    class="hidden md:block bg-blue-600 text-white px-3 py-1.5 md:px-4 md:py-2 rounded-full hover:bg-blue-700 transition-all text-sm md:text-base">
                    User Login
                </button>
            </a>
            <button id="mobile-menu-button" class="md:hidden text-gray-700">
                <i class="fas fa-bars text-xl md:text-2xl"></i>
            </button>
        </div>
    </nav>

    <!-- Mobile Menu - Enhanced for better mobile experience -->
    <div id="mobile-menu" class="hidden md:hidden bg-white py-2 px-4 shadow-lg">
        <a href="#" class="block py-3 text-gray-700 hover:text-blue-600 border-b border-gray-100">Home</a>
        <a href="categories.html"
            class="block py-3 text-gray-700 hover:text-blue-600 border-b border-gray-100">Categories</a>
        <a href="blog.html" class="block py-3 text-gray-700 hover:text-blue-600 border-b border-gray-100">Blog</a>
        <a href="aboutus.html" class="block py-3 text-gray-700 hover:text-blue-600 border-b border-gray-100">About
            Us</a>
        <a href="contactus.html"
            class="block py-3 text-gray-700 hover:text-blue-600 border-b border-gray-100">Contact</a>
        <button
            class="w-full mt-3 mb-2 bg-blue-600 text-white px-4 py-2.5 rounded-full hover:bg-blue-700 transition-all">
            Login
        </button>
    </div>
</header>