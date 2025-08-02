<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <!-- Enhanced mobile viewport settings -->
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>SCIZORA | Secure Access Portal</title>

    @include('customer.auth.style')
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
                <form id="signup-form" class="form">
                    <div class="form-group">
                        <label for="signup-name">Full Name</label>
                        <input type="text" id="signup-name" class="input-field" placeholder="Enter your full name"
                            required>
                    </div>

                    <div class="form-group">
                        <label for="signup-email">Email</label>
                        <input type="email" id="signup-email" class="input-field" placeholder="Enter your email"
                            required>
                    </div>

                    <div class="form-group">
                        <label for="signup-password">Password</label>
                        <div class="password-wrapper">
                            <input type="password" id="signup-password" class="input-field"
                                placeholder="Create a password" required>
                            <i class="far fa-eye toggle-password" id="toggle-signup-password"></i>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="signup-confirm-password">Confirm Password</label>
                        <div class="password-wrapper">
                            <input type="password" id="signup-confirm-password" class="input-field"
                                placeholder="Confirm your password" required>
                            <i class="far fa-eye toggle-password" id="toggle-signup-confirm-password"></i>
                        </div>
                    </div>

                    <button type="submit" class="submit-btn">Sign Up</button>

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
            </div>
        </section>
    </div>

    @include('customer.auth.js')
</body>

</html>