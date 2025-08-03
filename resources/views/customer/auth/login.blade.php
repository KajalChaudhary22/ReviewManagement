<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <!-- Enhanced mobile viewport settings -->
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>SCIZORA | Secure Access Portal</title>

    @include('customer.auth.style')
    @include('layouts.token')
</head>

<body>
    <div class="container">
        <!-- Left Panel -->
        @include('customer.auth.leftpanel')

        <!-- Right Panel -->
        <section class="right-panel">
            <div class="form-container">
                <div class="form-tabs">
                    <div class="tab active" id="login-tab">Log In</div>
                    <div class="tab" id="signup-tab">Sign Up</div>
                </div>

                <div class="success-message" id="success-message">
                    <i class="fas fa-check-circle"></i> Form submitted successfully!
                </div>

                <!-- Login Form -->
                <form id="login-form" class="form active">
                    <button type="button" class="social-login" id="linkedin-login">
                        <i class="fab fa-linkedin social-icon"></i>
                        Continue with LinkedIn
                    </button>

                    <div class="divider">or</div>

                    <div class="form-group">
                        <label for="login-email">Email</label>
                        <input type="email" id="login-email" class="input-field" placeholder="Enter your email"
                            required>
                    </div>

                    <div class="form-group">
                        <label for="login-password">Password</label>
                        <div class="password-wrapper">
                            <input type="password" id="login-password" class="input-field"
                                placeholder="Enter your password" required>
                            <i class="far fa-eye toggle-password" id="toggle-login-password"></i>
                        </div>
                    </div>

                    <div class="remember-forgot">
                        <div class="checkbox-group">
                            <input type="checkbox" id="remember-me">
                            <label for="remember-me">Remember me</label>
                        </div>
                        <a href="#" class="forgot-password">Forgot password?</a>
                    </div>

                    <button type="submit" class="submit-btn">Log In</button>

                    <div class="form-footer">
                        <div class="security-badge">
                            <i class="fas fa-shield-alt"></i>
                            <span>ISO 27001 Certified Security</span>
                        </div>
                        <p class="terms">By continuing, you agree to our <a href="#">Terms of Service</a> and <a
                                href="#">Privacy Policy</a>.</p>
                    </div>
                    <!-- Ad Banner -->
                    <div style="padding: 24px 0; text-align: center;">
                        <img src="https://tpc.googlesyndication.com/simgad/13265185988757716340" alt="Advertisement"
                            style="max-width: 100%; height: auto; margin: 0 auto;">
                    </div>
                </form>

                <!-- Signup Form -->
                @include('customer.auth.registration')
            </div>
        </section>
    </div>

    @include('customer.auth.js')
    @include('layouts.commonjs')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Tab switching functionality
            const loginTab = document.getElementById('login-tab');
            const signupTab = document.getElementById('signup-tab');
            const loginForm = document.getElementById('login-form');
            const signupForm = document.getElementById('signup-form');
            const successMessage = document.getElementById('success-message');

            // LinkedIn login button
            const linkedinLogin = document.getElementById('linkedin-login');

            // Password toggles
            const toggleLoginPassword = document.getElementById('toggle-login-password');
            const toggleSignupPassword = document.getElementById('toggle-signup-password');
            const toggleSignupConfirmPassword = document.getElementById('toggle-signup-confirm-password');

            // Switch to login form
            loginTab.addEventListener('click', function () {
                loginTab.classList.add('active');
                signupTab.classList.remove('active');
                loginForm.classList.add('active');
                signupForm.classList.remove('active');
                successMessage.style.display = 'none';
            });

            // Switch to signup form
            signupTab.addEventListener('click', function () {
                signupTab.classList.add('active');
                loginTab.classList.remove('active');
                signupForm.classList.add('active');
                loginForm.classList.remove('active');
                successMessage.style.display = 'none';
            });

            // LinkedIn login simulation
            linkedinLogin.addEventListener('click', function () {
                alert(
                    'Simulating LinkedIn login. In a real implementation, this would redirect to LinkedIn OAuth.'
                );
            });

            // Toggle password visibility
            function setupPasswordToggle(toggleElement, passwordFieldId) {
                const passwordField = document.getElementById(passwordFieldId);
                toggleElement.addEventListener('click', function () {
                    const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
                    passwordField.setAttribute('type', type);
                    toggleElement.classList.toggle('fa-eye');
                    toggleElement.classList.toggle('fa-eye-slash');
                });
            }

            setupPasswordToggle(toggleLoginPassword, 'login-password');
            setupPasswordToggle(toggleSignupPassword, 'signup-password');
            setupPasswordToggle(toggleSignupConfirmPassword, 'signup-confirm-password');

            // Form validation and submission
            loginForm.addEventListener('submit', function (e) {
                e.preventDefault();
                const email = document.getElementById('login-email').value;
                const password = document.getElementById('login-password').value;

                if (!validateEmail(email)) {
                    showError('Please enter a valid email address');
                    return;
                }

                if (password.length < 6) {
                    showError('Password must be at least 6 characters');
                    return;
                }

                // Simulate successful login
                submitLogin({
                    email,
                    password,
                });
            });
            function submitLogin(data) {
                fetch('/api/customer/login', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify(data)
                })
                    .then(async (response) => {
                        const res = await response.json();
                        if (!response.ok) {
                            if (res.errors) {
                                const firstError = Object.values(res.errors)[0][0];
                                showError(firstError);
                            } else {
                                showError(res.message || 'Login failed.');
                            }
                        } else {
                            showSuccess('Login successful!');
                            // Save token if needed
                            localStorage.setItem('customerToken', res.token);

                            // Optional: redirect after success
                            setTimeout(() => {
                                window.location.href = res.route; // change to your actual dashboard route
                            }, 3000);
                        }
                    })
                    .catch(error => {
                        console.error('Login error:', error);
                        showError('Something went wrong.');
                    });
            }

            signupForm.addEventListener('submit', function (e) {
                e.preventDefault();

                const name = document.getElementById('signup-name').value.trim();
                const email = document.getElementById('signup-email').value.trim();
                const password = document.getElementById('signup-password').value;
                const confirmPassword = document.getElementById('signup-confirm-password').value;

                if (name === '') {
                    return showError('Please enter your full name');
                }

                if (!validateEmail(email)) {
                    return showError('Please enter a valid email address');
                }

                if (password.length < 6) {
                    return showError('Password must be at least 6 characters');
                }

                if (password !== confirmPassword) {
                    return showError('Passwords do not match');
                }

                // All validations passed, send request
                submitSignup({
                    name,
                    email,
                    password,
                    password_confirmation: confirmPassword
                });
            });

            function validateEmail(email) {
                const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                return re.test(email);
            }

            function showError(message) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: message
                });
            }

            function showSuccess(message) {
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: message,
                    timer: 3000,
                    showConfirmButton: false
                });
            }

            function submitSignup(data) {
                fetch('/api/customer/register', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify(data)
                })
                    .then(async (response) => {
                        const res = await response.json();
                        if (!response.ok) {
                            // handle Laravel validation errors
                            if (res.errors) {
                                const firstError = Object.values(res.errors)[0][0];
                                showError(firstError);
                            } else {
                                showError(res.message || 'Registration failed.');
                            }
                        } else {
                            showSuccess('Signup successful!');
                            // Optional: redirect after success
                            setTimeout(() => {
                                window.location.href = '/customer/login'; // or any route you want
                            }, 3000);
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        showError('Something went wrong.');
                    });
            }



        });
    </script>
</body>

</html>