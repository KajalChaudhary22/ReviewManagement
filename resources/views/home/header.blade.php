<header class="scizora-header">
    @if (Auth::check())
        <div class="scizora-header-container">

            <!-- Logo -->
            <div class="scizora-logo">
                <a href="index.html"><img src="{{ asset('build/images/logo.jpg') }}" alt="SCIZORA Logo"></a>
            </div>

            <!-- Desktop Navigation -->
            <nav class="scizora-nav">
                <a href="{{ url('/') }}">Home</a>
                <a href="{{ route('categories') }}">Categories</a>
                {{-- <a href="#">Blog</a> --}}
                <a href="{{ route('about.us') }}">About Us</a>
                <a href="{{ route('contact.us') }}">Contact</a>
            </nav>

            <!-- Right Content: Contains controls for both views -->
            <div class="scizora-right-content">

                <!-- Desktop Profile Dropdown -->
                <div class="profile-dropdown">
                    <button class="profile-icon-btn" id="profileBtn">
                        <i class="fas fa-user-circle"></i>
                    </button>
                    <div class="dropdown-content" id="profileDropdown">
                        <a href="{{ route('customer.show.profile',['ty'=>custom_encrypt('CustomerProfileShow')]) }}"><i class="fas fa-user"></i> My Profile</a>
                        <a href="#"><i class="fas fa-bell"></i> Notifications</a>
                        <a href="#"><i class="fas fa-sign-out-alt"></i> Logout</a>
                    </div>
                </div>

                <!-- Mobile Controls (Icon and Hamburger) -->
                <div class="scizora-mobile-controls">
                    <!-- Mobile Profile Dropdown -->
                    <div class="profile-dropdown-mobile">
                        <button class="profile-icon-btn-mobile" id="profileBtnMobile">
                            <i class="fas fa-user-circle"></i>
                        </button>
                        <div class="dropdown-content" id="profileDropdownMobile">
                            <a href="{{ route('customer.show.profile',['ty'=>custom_encrypt('CustomerProfileShow')]) }}"><i class="fas fa-user"></i> My Profile</a>
                            <a href="#"><i class="fas fa-bell"></i> Notifications</a>
                            <a href="#"><i class="fas fa-sign-out-alt"></i> Logout</a>
                        </div>
                    </div>
                    <!-- Hamburger Menu Toggle -->
                    <div class="scizora-menu-toggle" id="scizoraMenuToggle">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </div>

            </div>
        </div>

        <!-- Mobile Navigation (Slide-out menu) -->
        <div class="scizora-mobile-nav" id="scizoraMobileNav">
            <a href="{{ url('/') }}">Home</a>
            <a href="{{ route('categories') }}">Categories</a>
            {{-- <a href="#">Blog</a> --}}
            <a href="{{ route('about.us') }}">About Us</a>
            <a href="{{ route('contact.us') }}">Contact</a>
        </div>
    @else
        <div class="scizora-header-container">

            <!-- Logo -->
            <div class="scizora-logo">
                <a href="index.html"><img src="{{ asset('build/images/logo.jpg') }}" alt="SCIZORA Logo"></a>
            </div>

            <!-- Desktop Navigation -->
            <nav class="scizora-nav">
                <a href="{{ url('/') }}">Home</a>
                <a href="{{ route('categories') }}">Categories</a>
                {{-- <a href="#">Blog</a> --}}
                <a href="{{ route('about.us') }}">About Us</a>
                <a href="{{ route('contact.us') }}">Contact</a>
            </nav>

            <!-- Desktop Buttons -->
            <div class="scizora-buttons">
                <a href="{{ route('business.auth.show') }}" class="scizora-btn">Business Login</a>
                <a href="{{ route('customer.auth.show') }}" class="scizora-btn"> User Login</a>
            </div>

            <!-- Hamburger Icon -->
            <div class="scizora-menu-toggle" id="scizoraMenuToggle">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>

        <!-- Mobile Navigation -->
        <div class="scizora-mobile-nav" id="scizoraMobileNav">
            <a href="{{ url('/') }}">Home</a>
            <a href="{{ route('categories') }}">Categories</a>
            {{-- <a href="#">Blog</a> --}}
            <a href="{{ route('about.us') }}">About Us</a>
            <a href="{{ route('contact.us') }}">Contact</a>
            <a href="{{ route('business.auth.show') }}" class="scizora-btn">Business Login</a>
            <a href="{{ route('customer.auth.show') }}" class="scizora-btn"> User Login</a>
        </div>
    @endif
</header>
