{{-- <footer class="bg-gray-900 text-white pt-12 pb-6 md:pt-16 md:pb-8">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 md:gap-8 mb-8 md:mb-12 footer-grid">
            <!-- About SCIZORA -->
            <div>
                <h3 class="text-lg md:text-xl font-bold mb-3 md:mb-4"><a href="#"
                        class="text-xl md:text-2xl font-bold"><img src="{{ asset('build/images/logo.jpg') }}" alt="logo"
                            width="200" height="300"></a></h3>
                <p class="text-gray-400 mb-3 md:mb-4 text-sm sm:text-base">SCIZORA helps consumers find trustworthy
                    businesses through verified reviews and ratings from real customers.</p>
                <div class="flex space-x-3 md:space-x-4">
                    <a href="#" class="text-gray-400 hover:text-white transition-all"><i
                            class="fab fa-facebook-f"></i></a>
                    <a href="#" class="text-gray-400 hover:text-white transition-all"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="text-gray-400 hover:text-white transition-all"><i
                            class="fab fa-instagram"></i></a>
                    <a href="#" class="text-gray-400 hover:text-white transition-all"><i
                            class="fab fa-linkedin-in"></i></a>
                </div>
            </div>

            <!-- Quick Links -->
            <div>
                <h3 class="text-lg md:text-xl font-bold mb-3 md:mb-4">Quick Links</h3>
                <ul class="space-y-1 md:space-y-2">
                    <li><a href="#" class="text-gray-400 hover:text-white transition-all text-sm sm:text-base">Home</a>
                    </li>
                    <li><a href="categories.html"
                            class="text-gray-400 hover:text-white transition-all text-sm sm:text-base">Categories</a>
                    </li>
                    <li><a href="blog.html"
                            class="text-gray-400 hover:text-white transition-all text-sm sm:text-base">Blogs</a>
                    </li>
                    <li><a href="aboutus.html"
                            class="text-gray-400 hover:text-white transition-all text-sm sm:text-base">About Us</a>
                    </li>
                    <li><a href="contactus.html"
                            class="text-gray-400 hover:text-white transition-all text-sm sm:text-base">Contact
                            Us</a></li>
                </ul>
            </div>

            <!-- Legal -->
            <div>
                <h3 class="text-lg md:text-xl font-bold mb-3 md:mb-4">Legal</h3>
                <ul class="space-y-1 md:space-y-2">
                    <li><a href="terms.html"
                            class="text-gray-400 hover:text-white transition-all text-sm sm:text-base">Terms of
                            Service</a></li>
                    <li><a href="privacy.html"
                            class="text-gray-400 hover:text-white transition-all text-sm sm:text-base">Privacy
                            Policy</a></li>

                </ul>
            </div>

            <!-- Newsletter -->
            <div>
                <h3 class="text-lg md:text-xl font-bold mb-3 md:mb-4">Newsletter</h3>
                <p class="text-gray-400 mb-3 md:mb-4 text-sm sm:text-base">Subscribe to our newsletter for the
                    latest updates and featured companies.</p>
                <div class="flex">
                    <input type="email" placeholder="Your email"
                        class="bg-gray-800 text-white px-3 py-1.5 sm:px-4 sm:py-2 rounded-l-lg focus:outline-none w-full text-sm sm:text-base newsletter-input">
                    <button
                        class="bg-blue-600 text-white px-3 py-1.5 sm:px-4 sm:py-2 rounded-r-lg hover:bg-blue-700 transition-all">
                        <i class="fas fa-paper-plane text-sm sm:text-base"></i>
                    </button>
                </div>
            </div>
        </div>

        <div class="border-t border-gray-800 pt-6 md:pt-8 text-center text-gray-400 text-sm sm:text-base">
            <p>&copy; 2025 SCIZORA. All rights reserved.</p>
        </div>
    </div>
</footer> --}}


<footer class="scizora-main-footer">
    <div class="scizora-footer-inner-container"> <!-- Changed to new class -->
        <!-- Footer Content Grid -->
        <div class="scizora-footer-grid">
            <!-- Column 1: About -->
            <div class="scizora-footer-column">
                <h3 class="scizora-footer-logo-heading"><a href="{{ url('/') }}"><img
                            src="{{ asset('build/images/logo.jpg') }}" alt="logo" width="200" height="100"></a></h3>
                <p class="scizora-footer-description">SCIZORA helps consumers find trustworthy businesses through
                    verified reviews and ratings from real customers.</p>
                <div class="scizora-social-links">
                    <a href="#" class="scizora-social-icon"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="scizora-social-icon"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="scizora-social-icon"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="scizora-social-icon"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>

            <!-- Column 2: Quick Links -->
            <div class="scizora-footer-column">
                <h3 class="scizora-footer-heading">Quick Links</h3>
                <ul class="scizora-footer-list">
                    <li><a href="{{ url('/') }}" class="scizora-footer-link">Home</a></li>
                    <li><a href="{{ route('categories') }}" class="scizora-footer-link">Categories</a></li>
                    {{-- <li><a href="{{ route('about.us') }}" class="scizora-footer-link">Blogs</a></li> --}}
                    <li><a href="{{ route('about.us') }}" class="scizora-footer-link">About Us</a></li>
                    <li><a href="{{ route('contact.us') }}" class="scizora-footer-link">Contact Us</a></li>
                </ul>
            </div>

            <!-- Column 3: Legal -->
            <div class="scizora-footer-column">
                <h3 class="scizora-footer-heading">Legal</h3>
                <ul class="scizora-footer-list">
                    <li><a href="{{ route('show.termsCondition') }}" class="scizora-footer-link">Terms of Service</a>
                    </li>
                    <li><a href="{{ route('show.privacyPolicy') }}" class="scizora-footer-link">Privacy Policy</a></li>
                </ul>
            </div>

            <!-- Column 4: Newsletter -->
            <div class="scizora-footer-column">
                <form id="subscribeForm">
                    <h3 class="scizora-footer-heading">Newsletter</h3>
                    <p class="scizora-footer-description">Subscribe to our newsletter for the latest updates and
                        featured companies.</p>
                    <div class="scizora-newsletter-form">
                        <input type="email" name="email" placeholder="Your email" class="scizora-newsletter-input">
                        <button class="scizora-newsletter-button">
                            <i class="fas fa-paper-plane"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Footer Bottom/Copyright -->
        <div class="scizora-footer-bottom">
            <p>&copy; 2025 SCIZORA. All rights reserved.</p>
        </div>
    </div>
</footer>