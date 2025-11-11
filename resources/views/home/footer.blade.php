
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
     $(document).ready(function() {
        $("#subscribeForm").on("submit", function(e) {
            alert("hello");
            e.preventDefault();

            let formData = $(this).serialize();

            $.ajax({
                url: "/api/contact/subscribe",
                method: "POST",
                data: formData,
                success: function(data) {
                    if (data.status === "success") {
                        Swal.fire({
                            icon: "success",
                            title: "Subscribed",
                            text: data.message
                        });
                        $("#subscribeForm")[0].reset();
                    }
                },
                error: function(xhr) {
                    Swal.fire({
                        icon: "error",
                        title: "Error",
                        text: xhr.responseJSON?.message || "Something went wrong!"
                    });
                }
            });
        });
    });
</script>