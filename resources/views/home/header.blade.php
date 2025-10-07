<header class="scizora-header">
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
        <a href="{{route('business.auth.show')}}" class="scizora-btn">Business Login</a>
        <a href="{{route('customer.auth.show')}}" class="scizora-btn"> User Login</a>
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
      <a href="{{route('business.auth.show')}}" class="scizora-btn">Business Login</a>
      <a href="{{route('customer.auth.show')}}" class="scizora-btn"> User Login</a>
    </div>
  </header>