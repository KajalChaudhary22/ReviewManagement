<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SCIZORA | Admin Portal</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    @include('admin.auth.style')
</head>

<body>
    <!-- Header -->
    <header>
        <div class="header-content">
            <div class="logo">

                <h1>SCI<span>ZORA</span></h1>
            </div>
            <nav>
                <ul>
                    <li><a href="#"><i class="fas fa-home"></i> Home</a></li>
                    <li><a href="#"><i class="fas fa-users"></i> About Us</a></li>
                    <li><a href="#"><i class="fas fa-cog"></i> Categories</a></li>
                    <li><a href="#"><i class="fas fa-question-circle"></i> Contact</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- Main Content -->
    <main>
        <!-- Animated Background -->
        <div class="background-shapes">
            <div class="shape shape-1"></div>
            <div class="shape shape-2"></div>
            <div class="shape shape-3"></div>
            <div class="shape shape-4"></div>
        </div>

        <div class="container">
            <div class="login-card">
                <div class="card-header">
                    <h2>Admin Login</h2>
                    <p>Access your SCIZORA administration panel</p>
                </div>

                <form id="loginForm">
                    <div class="input-group">
                        <label for="email">Email Address</label>
                        <input type="email" id="email" class="input-field" placeholder="admin@scizora.com"
                            required>
                    </div>

                    <div class="input-group">
                        <label for="password">Password</label>
                        <div class="password-container">
                            <input type="password" id="password" class="input-field" placeholder="••••••••" required>
                            <button type="button" class="toggle-password" id="togglePassword">
                                <i class="far fa-eye"></i>
                            </button>
                        </div>
                    </div>

                    <div class="options">
                        <div class="remember">
                            <input type="checkbox" id="remember">
                            <label for="remember">Remember me</label>
                        </div>
                        <a href="{{ route('password.request',['ty' => custom_encrypt('ResetPasswordEmail')]) }}" class="forgot-password">Forgot Password?</a>
                    </div>

                    <button type="submit" class="login-btn">LOGIN</button>

                    <div class="divider">
                        <span>OR CONTINUE WITH</span>
                    </div>

                    <div class="social-login">
                        <div class="social-btn google-btn" id="googleLogin">
                            <i class="fab fa-google"></i>
                        </div>
                        <div class="social-btn microsoft-btn" id="microsoftLogin">
                            <i class="fab fa-microsoft"></i>
                        </div>
                        <div class="social-btn apple-btn" id="appleLogin">
                            <i class="fab fa-apple"></i>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer>
        <div class="footer-content">
            <div class="footer-section">
                <h3>About SCIZORA</h3>
                <p>SCIZORA helps consumers find trustworthy businesses through verified reviews and ratings from real
                    customers</p>
            </div>

            <div class="footer-section">
                <h3>Quick Links</h3>
                <ul class="footer-links">
                    <li><a href="#"><i class="fas fa-chevron-right"></i> Home</a></li>
                    <li><a href="#"><i class="fas fa-chevron-right"></i> About Us</a></li>
                    <li><a href="#"><i class="fas fa-chevron-right"></i> Blog</a></li>
                    <li><a href="#"><i class="fas fa-chevron-right"></i> Categories</a></li>
                    <li><a href="#"><i class="fas fa-chevron-right"></i> Contact</a></li>
                </ul>
            </div>

            <div class="footer-section">
                <h3>Contact Us</h3>
                <div class="contact-info">
                    <div class="contact-item">
                        <i class="fas fa-map-marker-alt"></i>
                        <span>123 Tech Park, San Francisco, CA</span>
                    </div>
                    <div class="contact-item">
                        <i class="fas fa-phone"></i>
                        <span>+1 (555) 123-4567</span>
                    </div>
                    <div class="contact-item">
                        <i class="fas fa-envelope"></i>
                        <span>support@scizora.com</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="copyright">
            &copy; 2025 SCIZORA. All rights reserved.
        </div>
    </footer>

    <!-- Social Login Modals -->
    <div class="modal" id="googleModal">
        <div class="modal-content">
            <span class="close-modal">&times;</span>
            <div class="modal-icon">
                <i class="fab fa-google google-icon"></i>
            </div>
            <div class="modal-header">
                <h3>Login with Google</h3>
                <p>Sign in to your SCIZORA account using Google</p>
            </div>
            <input type="email" class="input-field" placeholder="Your Google email" style="margin-bottom: 15px;">
            <input type="password" class="input-field" placeholder="Your Google password">
            <button class="modal-btn" id="googleSignIn">Continue with Google</button>
        </div>
    </div>

    <div class="modal" id="microsoftModal">
        <div class="modal-content">
            <span class="close-modal">&times;</span>
            <div class="modal-icon">
                <i class="fab fa-microsoft microsoft-icon"></i>
            </div>
            <div class="modal-header">
                <h3>Login with Microsoft</h3>
                <p>Sign in to your SCIZORA account using Microsoft</p>
            </div>
            <input type="email" class="input-field" placeholder="Your Microsoft email"
                style="margin-bottom: 15px;">
            <input type="password" class="input-field" placeholder="Your Microsoft password">
            <button class="modal-btn" id="microsoftSignIn">Continue with Microsoft</button>
        </div>
    </div>

    <div class="modal" id="appleModal">
        <div class="modal-content">
            <span class="close-modal">&times;</span>
            <div class="modal-icon">
                <i class="fab fa-apple apple-icon"></i>
            </div>
            <div class="modal-header">
                <h3>Login with Apple</h3>
                <p>Sign in to your SCIZORA account using Apple</p>
            </div>
            <input type="email" class="input-field" placeholder="Your Apple ID" style="margin-bottom: 15px;">
            <input type="password" class="input-field" placeholder="Your Apple password">
            <button class="modal-btn" id="appleSignIn">Continue with Apple</button>
        </div>
    </div>
    @include('layouts.commonjs')
    <script>
        // Toggle password visibility
        const togglePassword = document.getElementById('togglePassword');
        const password = document.getElementById('password');

        togglePassword.addEventListener('click', function() {
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);

            // Toggle eye icon
            this.innerHTML = type === 'password' ? '<i class="far fa-eye"></i>' :
                '<i class="far fa-eye-slash"></i>';
        });

        // Form submission
        const loginForm = document.getElementById('loginForm');

        loginForm.addEventListener('submit', function(e) {
            e.preventDefault();

            const email = document.getElementById('email').value.trim();
            const password = document.getElementById('password').value;

            const loginBtn = document.querySelector('.login-btn');
            loginBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Authenticating...';
            loginBtn.disabled = true;

            fetch('/api/admin/login', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify({
                        email,
                        password
                    })
                })
                .then(response => response.json())
                .then(data => {
                    loginBtn.innerHTML = 'LOGIN';
                    loginBtn.disabled = false;

                    if (data.status) {
                        showAlert('success', data.message);
                        setTimeout(() => {
                            window.location.href = data.route; // Redirect
                        }, 2000);
                    } else {
                        showAlert('error', data.message);
                    }
                })
                .catch(error => {
                    showAlert('error', 'Server error occurred.');
                    loginBtn.innerHTML = 'LOGIN';
                    loginBtn.disabled = false;
                });
        });

        // Modal functionality
        const googleModal = document.getElementById('googleModal');
        const microsoftModal = document.getElementById('microsoftModal');
        const appleModal = document.getElementById('appleModal');

        const googleBtn = document.getElementById('googleLogin');
        const microsoftBtn = document.getElementById('microsoftLogin');
        const appleBtn = document.getElementById('appleLogin');

        const closeButtons = document.querySelectorAll('.close-modal');

        // Open modals
        googleBtn.addEventListener('click', () => {
            googleModal.style.display = 'flex';
        });

        microsoftBtn.addEventListener('click', () => {
            microsoftModal.style.display = 'flex';
        });

        appleBtn.addEventListener('click', () => {
            appleModal.style.display = 'flex';
        });

        // Close modals
        closeButtons.forEach(button => {
            button.addEventListener('click', function() {
                this.closest('.modal').style.display = 'none';
            });
        });

        // Close modals when clicking outside
        window.addEventListener('click', function(event) {
            if (event.target.classList.contains('modal')) {
                event.target.style.display = 'none';
            }
        });

        // Social sign in functionality
        document.getElementById('googleSignIn').addEventListener('click', function() {
            this.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Signing in...';
            setTimeout(() => {
                alert('Successfully signed in with Google!');
                googleModal.style.display = 'none';
                this.innerHTML = 'Continue with Google';
            }, 1500);
        });

        document.getElementById('microsoftSignIn').addEventListener('click', function() {
            this.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Signing in...';
            setTimeout(() => {
                alert('Successfully signed in with Microsoft!');
                microsoftModal.style.display = 'none';
                this.innerHTML = 'Continue with Microsoft';
            }, 1500);
        });

        document.getElementById('appleSignIn').addEventListener('click', function() {
            this.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Signing in...';
            setTimeout(() => {
                alert('Successfully signed in with Apple!');
                appleModal.style.display = 'none';
                this.innerHTML = 'Continue with Apple';
            }, 1500);
        });
    </script>
</body>

</html>
