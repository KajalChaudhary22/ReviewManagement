<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <!-- Enhanced mobile viewport settings -->
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>SCIZORA | Secure Access Portal</title>

    <!-- Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap">

    <!-- Font Awesome Icons (from new header) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <style>
        :root {
            --primary-color: #0A47A9;
            /* Main blue for links and highlights */
            --primary-color-main: #1544da;
            /* Original primary color from body */
            --primary-hover: #1034a6;
            --primary-light: #edf2ff;
            --bg-color: #ffffff;
            --panel-bg: #f8f9fa;
            --card-bg: #ffffff;
            --text-color: #212529;
            --text-mid: #555555;
            /* A mid-tone grey for text */
            --light-text: #6c757d;
            --border-color: #dee2e6;
            --highlight: rgba(21, 68, 218, 0.08);
            --shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        /* =================================================================
           NEW HEADER CSS START
        ================================================================== */


        /* --- Right Section of the Header --- */
        .header-right {
            display: flex;
            align-items: center;
            gap: 15px;
            /* Space between buttons and profile icon */
        }

        /* --- Login/Signup Button Styles --- */
        .login-btn {
            padding: 8px 22px;
            border-radius: 999px;
            text-decoration: none;
            font-weight: 500;
            font-size: 0.9rem;
            transition: all 0.3s ease;
            border: none;
            text-align: center;
            background-color: #1544da;
            color: #FFFFFF;
        }

        /* This keeps the secondary button style from your original code if needed elsewhere, but the new header overrides it for header buttons */
        .login-btn.secondary {
            background-color: #F8F9FA;
            color: #333333;
            border: 1px solid #DEE2E6;
        }

        .login-btn.secondary:hover {
            background-color: #e9ecef;
        }

        .login-btn:hover {
            opacity: 0.9;
        }

        /* --- Mobile-Only Buttons (Hidden on Desktop) --- */
        .mobile-auth-buttons {
            display: none;
        }

        /* --- Hamburger Icon (Hidden on Desktop) --- */
        .hamburger {
            display: none;
            background: none;
            border: none;
            font-size: 1.8rem;
            cursor: pointer;
            color: #0A47A9;
            z-index: 1002;
        }

        /* --- Profile Dropdown --- */
        .profile-dropdown {
            position: relative;
        }

        .profile-icon {
            font-size: 2.2rem;
            color: #0A47A9;
            cursor: pointer;
            transition: color 0.3s ease;
        }

        .profile-icon:hover {
            color: #083a8d;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            right: 0;
            background-color: #FFFFFF;
            min-width: 180px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
            z-index: 1001;
            border-radius: 8px;
            overflow: hidden;
            margin-top: 10px;
            opacity: 0;
            transform: translateY(-10px);
            transition: opacity 0.3s ease, transform 0.3s ease;
        }

        .dropdown-content.show {
            display: block;
            opacity: 1;
            transform: translateY(0);
        }

        .dropdown-content a {
            color: #333333;
            padding: 12px 16px;
            text-decoration: none;
            display: flex;
            align-items: center;
            transition: background-color 0.3s ease;
        }

        .dropdown-content a i {
            margin-right: 10px;
            color: #555555;
            width: 20px;
            text-align: center;
        }

        .dropdown-content a:hover {
            background-color: #F8F9FA;
        }

        /* --- Responsive Styles for Mobile Header --- */
        @media (max-width: 992px) {

            /* Hide desktop nav menu and show it vertically when active */
            .nav-menu {
                display: none;
                flex-direction: column;
                position: absolute;
                top: 70px;
                /* Position below the header */
                left: 0;
                width: 100%;
                background-color: #FFFFFF;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
                padding: 1rem 0;
                gap: 0;
            }

            .nav-menu.active {
                display: flex;
                /* Show the menu when hamburger is clicked */
            }

            /* Style mobile navigation links */
            .nav-menu a:not(.login-btn) {
                width: 100%;
                text-align: center;
                padding: 15px 5%;
                border-bottom: 1px solid #f0f0f0;
            }

            .nav-menu a:not(.login-btn):last-of-type {
                border-bottom: 1px solid #f0f0f0;
            }

            .nav-menu a:not(.login-btn)::after {
                display: none;
                /* Hide underline effect on mobile */
            }

            /* Hide desktop login buttons */
            .header-right>.login-btn {
                display: none;
            }

            /* Show and style mobile login buttons inside the nav menu */
            .mobile-auth-buttons {
                display: flex;
                flex-direction: column;
                gap: 10px;
                width: 100%;
                padding: 15px 5% 10px 5%;
                box-sizing: border-box;
            }

            /* Show hamburger icon on mobile */
            .hamburger {
                display: block;
            }
        }

        /* =================================================================
           NEW HEADER CSS END
        ================================================================== */


        /* --- Newsletter Form --- */
        .scizora-newsletter-form {
            display: flex;
        }

        .scizora-newsletter-input {
            background-color: #F8F9FA;
            color: #333;
            padding: 6px 12px;
            border: 1px solid #DEE2E6;
            border-radius: 4px 0 0 4px;
            outline: none;
            width: 100%;
            font-size: 0.875rem;
        }

        .scizora-newsletter-button {
            background-color: var(--primary-color);
            color: #ffffff;
            padding: 6px 12px;
            border: 1px solid var(--primary-color);
            border-radius: 0 4px 4px 0;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .scizora-newsletter-button:hover {
            background-color: #083a8d;
        }

        /* =================================================================
           NEW FOOTER CSS END
        ================================================================== */

        /* =================================================================
           ORIGINAL PAGE CSS START
        ================================================================== */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            color: var(--text-color);
            background-color: var(--bg-color);
            line-height: 1.6;
            overflow-x: hidden;
        }

        .login-container {
            display: flex;
            min-height: calc(100vh - 70px);
            /* Adjust for header height */
        }

        /* Left Panel - Professional Design */
        .left-panel {
            flex: 1;
            padding: 3rem;
            background-color: var(--panel-bg);
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            position: relative;
            overflow: hidden;
        }

        .left-panel::before {
            content: '';
            position: absolute;
            bottom: -50px;
            right: -50px;
            width: 200px;
            height: 200px;
            background-color: var(--primary-light);
            border-radius: 50%;
            z-index: 0;
            opacity: 0.6;
        }

        .left-panel .logo {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            font-weight: 700;
            font-size: 1.5rem;
            margin-bottom: 3rem;
            position: relative;
            z-index: 1;
            color: var(--primary-color-main);
        }

        .logo-icon {
            font-size: 1.75rem;
        }

        .welcome-section {
            position: relative;
            z-index: 1;
        }

        .welcome-section h1 {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
            color: var(--text-color);
            line-height: 1.2;
        }

        .welcome-section p {
            color: var(--light-text);
            margin-bottom: 2.5rem;
            max-width: 80%;
            font-size: 1.1rem;
        }

        .features {
            display: flex;
            flex-direction: column;
            gap: 1.75rem;
            margin-bottom: 2rem;
            position: relative;
            z-index: 1;
        }

        .feature-item {
            display: flex;
            align-items: flex-start;
            gap: 1.25rem;
            padding: 1.25rem;
            background-color: var(--card-bg);
            border-radius: 0.75rem;
            box-shadow: var(--shadow);
            transition: var(--transition);
        }

        .feature-item:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 16px rgba(0, 0, 0, 0.1);
        }

        .feature-icon {
            color: var(--primary-color-main);
            font-size: 1.5rem;
            margin-top: 0.2rem;
            flex-shrink: 0;
        }

        .feature-text h3 {
            font-weight: 600;
            margin-bottom: 0.5rem;
            font-size: 1.1rem;
            color: var(--text-color);
        }

        .feature-text p {
            color: var(--light-text);
            font-size: 0.95rem;
        }

        .panel-image {
            width: 100%;
            max-width: 500px;
            border-radius: 0.75rem;
            align-self: center;
            box-shadow: var(--shadow);
            border: 1px solid rgba(0, 0, 0, 0.05);
            transition: var(--transition);
        }

        .panel-image:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.12);
        }

        /* Right Panel - Professional Form */
        .right-panel {
            flex: 1;
            padding: 3rem;
            display: flex;
            flex-direction: column;
            justify-content: center;
            background-color: var(--bg-color);
        }

        .form-container {
            max-width: 450px;
            width: 100%;
            margin: 0 auto;
            background-color: var(--card-bg);
            padding: 2.5rem;
            border-radius: 1rem;
            box-shadow: var(--shadow);
            position: relative;
            border: 1px solid var(--border-color);
            transition: var(--transition);
        }

        .form-container:hover {
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.12);
        }

        .form-tabs {
            display: flex;
            border-bottom: 1px solid var(--border-color);
            margin-bottom: 2rem;
            position: relative;
        }

        .tab {
            padding: 1rem 1.5rem;
            cursor: pointer;
            font-weight: 500;
            color: var(--light-text);
            position: relative;
            flex: 1;
            text-align: center;
            transition: var(--transition);
            font-size: 1.1rem;
        }

        .tab:hover {
            color: var(--text-color);
        }

        .tab.active {
            color: var(--primary-color-main);
            font-weight: 600;
        }

        .tab.active::after {
            content: '';
            position: absolute;
            bottom: -1px;
            left: 0;
            width: 100%;
            height: 3px;
            background-color: var(--primary-color-main);
        }

        .form {
            display: none;
        }

        .form.active {
            display: block;
            animation: fadeIn 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .social-login {
            width: 100%;
            padding: 0.9rem;
            border: 1px solid var(--border-color);
            border-radius: 0.5rem;
            background-color: transparent;
            color: var(--text-color);
            font-weight: 500;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.75rem;
            cursor: pointer;
            transition: var(--transition);
            margin-bottom: 1.5rem;
            font-size: 1rem;
        }

        .social-login:hover {
            background-color: var(--highlight);
            border-color: var(--primary-color-main);
        }

        .social-icon {
            color: #0a66c2;
            font-size: 1.25rem;
        }

        .divider {
            display: flex;
            align-items: center;
            margin: 1.75rem 0;
            color: var(--light-text);
            font-size: 0.9rem;
        }

        .divider::before,
        .divider::after {
            content: '';
            flex: 1;
            border-bottom: 1px solid var(--border-color);
        }

        .divider::before {
            margin-right: 1.25rem;
        }

        .divider::after {
            margin-left: 1.25rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
            position: relative;
        }

        label {
            display: block;
            margin-bottom: 0.75rem;
            font-weight: 500;
            font-size: 0.95rem;
            color: var(--text-color);
        }

        .input-field {
            width: 100%;
            padding: 1rem 1.25rem;
            border: 1px solid var(--border-color);
            border-radius: 0.5rem;
            font-size: 1rem;
            transition: var(--transition);
            background-color: var(--bg-color);
            color: var(--text-color);
        }

        .input-field:focus {
            outline: none;
            border-color: var(--primary-color-main);
            box-shadow: 0 0 0 3px rgba(21, 68, 218, 0.1);
        }

        .input-field::placeholder {
            color: var(--light-text);
        }

        .password-wrapper {
            position: relative;
        }

        .toggle-password {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: var(--light-text);
            transition: var(--transition);
        }

        .toggle-password:hover {
            color: var(--primary-color-main);
        }

        .remember-forgot {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
        }

        .checkbox-group {
            display: flex;
            align-items: center;
        }

        .checkbox-group input {
            margin-right: 0.75rem;
            width: 1.1rem;
            height: 1.1rem;
            accent-color: var(--primary-color-main);
            cursor: pointer;
        }

        .checkbox-group label {
            margin-bottom: 0;
            cursor: pointer;
            color: var(--text-color);
        }

        .forgot-password {
            color: var(--primary-color-main);
            font-size: 0.95rem;
            text-decoration: none;
            font-weight: 500;
            transition: var(--transition);
        }

        .forgot-password:hover {
            text-decoration: underline;
        }

        .submit-btn {
            width: 100%;
            padding: 1rem;
            background-color: var(--primary-color-main);
            color: white;
            border: none;
            border-radius: 0.5rem;
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition);
            margin-bottom: 1.5rem;
            font-size: 1.05rem;
        }

        .submit-btn:hover {
            background-color: var(--primary-hover);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(21, 68, 218, 0.2);
        }

        .form-footer {
            text-align: center;
            font-size: 0.85rem;
            color: var(--light-text);
            margin-top: 2rem;
        }

        .security-badge {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.75rem;
            margin-bottom: 1rem;
            color: var(--primary-color-main);
        }

        .security-badge i {
            font-size: 1.1rem;
        }

        .terms a {
            color: var(--primary-color-main);
            text-decoration: none;
            font-weight: 500;
            transition: var(--transition);
        }

        .terms a:hover {
            text-decoration: underline;
        }

        /* Success Message */
        .success-message {
            display: none;
            padding: 1rem;
            background-color: rgba(40, 167, 69, 0.1);
            color: #28a745;
            border-radius: 0.5rem;
            margin-bottom: 1.5rem;
            text-align: center;
            border: 1px solid rgba(40, 167, 69, 0.2);
        }

        @media (max-width: 1024px) {
            .login-container {
                flex-direction: column;
                min-height: auto;
            }

            .left-panel,
            .right-panel {
                padding: 2.5rem;
            }

            .welcome-section h1 {
                font-size: 2.25rem;
            }

            .welcome-section p {
                max-width: 100%;
            }

            .panel-image {
                margin-top: 3rem;
                max-width: 400px;
            }

            .form-container {
                max-width: 500px;
            }
        }

        @media (max-width: 768px) {

            .left-panel,
            .right-panel {
                padding: 2rem;
            }

            .left-panel .logo {
                font-size: 1.4rem;
                margin-bottom: 2.5rem;
            }

            .welcome-section h1 {
                font-size: 2rem;
                margin-bottom: 1.25rem;
            }

            .welcome-section p {
                font-size: 1rem;
                margin-bottom: 2rem;
            }

            .form-container {
                padding: 2rem;
            }

            .tab {
                padding: 0.9rem;
                font-size: 1rem;
            }

            .input-field {
                padding: 0.9rem 1.1rem;
            }

            .submit-btn {
                padding: 0.9rem;
            }
        }

        @media (max-width: 576px) {

            .left-panel,
            .right-panel {
                padding: 1.5rem;
            }

            .left-panel .logo {
                font-size: 1.3rem;
                margin-bottom: 2rem;
            }

            .logo-icon {
                font-size: 1.5rem;
            }

            .welcome-section h1 {
                font-size: 1.75rem;
                margin-bottom: 1rem;
            }

            .welcome-section p {
                font-size: 0.95rem;
                margin-bottom: 1.5rem;
            }

            .features {
                gap: 1.25rem;
                margin-bottom: 1.5rem;
            }

            .feature-item {
                padding: 0.9rem;
                gap: 0.75rem;
            }

            .feature-icon {
                font-size: 1.3rem;
            }

            .feature-text h3 {
                font-size: 1rem;
            }

            .feature-text p {
                font-size: 0.85rem;
            }

            .panel-image {
                margin-top: 2rem;
            }

            .form-container {
                padding: 1.5rem;
                border-radius: 0.75rem;
            }

            .tab {
                padding: 0.75rem 0.5rem;
                font-size: 0.95rem;
            }

            .input-field {
                padding: 0.8rem 1rem;
                font-size: 0.95rem;
            }

            label {
                font-size: 0.9rem;
                margin-bottom: 0.5rem;
            }

            .submit-btn {
                padding: 0.85rem;
                font-size: 1rem;
            }

            .social-login {
                padding: 0.8rem;
                font-size: 0.95rem;
            }

            .divider {
                margin: 1.5rem 0;
                font-size: 0.85rem;
            }

            .form-footer {
                font-size: 0.8rem;
                margin-top: 1.5rem;
            }

            .terms {
                font-size: 0.8rem;
            }

            .remember-forgot {
                flex-direction: column;
                align-items: flex-start;
                gap: 0.75rem;
            }

            .toggle-password {
                padding: 10px;
            }

            .left-panel::before {
                display: none;
            }
        }

        @media (max-width: 400px) {

            .left-panel,
            .right-panel {
                padding: 1.25rem;
            }

            .left-panel .logo {
                font-size: 1.25rem;
            }

            .welcome-section h1 {
                font-size: 1.6rem;
            }

            .form-container {
                padding: 1.25rem;
            }

            .tab {
                font-size: 0.9rem;
            }

            .input-field {
                padding: 0.75rem;
            }

            .submit-btn {
                padding: 0.8rem;
            }
        }

        /* =================================================================
           ORIGINAL PAGE CSS END
        ================================================================== */
    </style>
    @include('home.styles')
</head>

<body>

    <!-- =================================================================
         NEW HEADER START
    ================================================================== -->
   
    @include('home.header')
    <!-- =================================================================
         NEW HEADER END
    ================================================================== -->

    <div class="login-container">
        <!-- Left Panel -->
        <section class="left-panel">
            <div>

                <div class="welcome-section">
                    <h1>Welcome to SCIZORA</h1>
                    <p>Your trusted platform for pharmaceutical manufacturing connections. Join thousands of verified
                        manufacturers worldwide.</p>
                    <div class="features">
                        <div class="feature-item">
                            <span class="feature-icon">✅</span>
                            <div class="feature-text">
                                <h3>5000+ Verified Manufacturers</h3>
                                <p>Quality-verified partners</p>
                            </div>
                        </div>
                        <div class="feature-item">
                            <span class="feature-icon">🌍</span>
                            <div class="feature-text">
                                <h3>100+ Countries</h3>
                                <p>Global distribution coverage</p>
                            </div>
                        </div>
                        <div class="feature-item">
                            <span class="feature-icon">💬</span>
                            <div class="feature-text">
                                <h3>24/7 Support</h3>
                                <p>Always here to help</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Ad Banner -->
                <div style="padding: 24px 0; text-align: center;">
                    <img src="https://tpc.googlesyndication.com/simgad/13265185988757716340" alt="Advertisement"
                        style="max-width: 100%; height: auto; margin: 0 auto;">
                </div>

        </section>

        <!-- Right Panel -->
        <section class="right-panel">
            <div class="form-container">
                <div class="form-tabs">
                    <div class="tab active" id="login-tab">Log In</div>
                    <div class="tab" id="signup-tab">Register Now</div>
                </div>

                <div class="success-message" id="success-message">
                    <i class="fas fa-check-circle"></i> Form submitted successfully!
                </div>

                <!-- Login Form -->
                <form id="login-form" class="form active">
                    {{-- <button type="button" class="social-login" id="linkedin-login">
                        <i class="fab fa-linkedin social-icon"></i>
                        Continue with LinkedIn
                    </button>
                    <div class="divider">or</div> --}}
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
                    <div style="text-align: left; margin-bottom: 2rem;">
                        <h2 style="font-size: 2rem; font-weight: 700; color: #212529; margin-bottom: 0.5rem;">
                            Register Your Business</h2>
                        <p style="color: var(--light-text); font-size: 1.1rem; margin:0;">Join the leading
                            pharmaceutical marketplace</p>
                    </div>
                    <div class="form-group">
                        <label for="business-name">Business Name</label>
                        <input type="text" id="business-name" class="input-field" required>
                    </div>
                    <div class="form-group">
                        <label for="signup-email">Email Address</label>
                        <input type="email" id="signup-email" class="input-field" required>
                    </div>
                    <div class="form-group">
                        <label for="phone-number">Phone Number</label>
                        <input type="tel" id="phone-number" class="input-field" required>
                    </div>
                    <div class="form-group">
                        <label for="industry-category">Industry Category</label>
                        <select id="industry-category" class="input-field" required>
                            <option value="" disabled selected>Select category</option>
                            @foreach ($industries as $industry)
                                <option value="{{ $industry?->id }}">{{ $industry?->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="industry-category">Location</label>
                        <select id="location" class="input-field" required>
                            <option value="" disabled selected>Select location</option>
                            @foreach ($locations as $location)
                                <option value="{{ $location?->id }}">{{ $location?->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="signup-password">Password</label>
                        <div class="password-wrapper">
                            <input type="password" id="signup-password" class="input-field" required>
                            <i class="far fa-eye toggle-password" id="toggle-signup-password"></i>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="signup-confirm-password">Confirm Password</label>
                        <div class="password-wrapper">
                            <input type="password" id="signup-confirm-password" class="input-field" required>
                            <i class="far fa-eye toggle-password" id="toggle-signup-confirm-password"></i>
                        </div>
                    </div>
                    <button type="submit" class="submit-btn"
                        style="background-color: #3366FF; margin-bottom: 0;">Create Account</button>
                    <div class="form-footer" style="margin-top: 1.5rem; text-align:center;">
                        <p class="terms" style="font-size: 0.9rem;">By registering, you agree to our <a
                                href="#">Terms of Service</a> and <a href="#">Privacy Policy</a>.</p>
                    </div>
                </form>
            </div>
        </section>
    </div>

    <!-- =================================================================
         NEW FOOTER START
    ================================================================== -->
    @include('home.footer')
    <!-- =================================================================
         NEW FOOTER END
    ================================================================== -->
    @include('layouts.commonjs')
    <script>
        $(document).ready(function() {

            // =================================================================
            //   NEW HEADER JAVASCRIPT (jQuery Version)
            // =================================================================
            const $hamburger = $('#hamburger');
            const $navMenu = $('#nav-menu');

            if ($hamburger.length && $navMenu.length) {
                $hamburger.on('click', function() {
                    $hamburger.toggleClass('active');
                    $navMenu.toggleClass('active');
                });
            }

            const $profileIcon = $('#profileIcon');
            const $dropdownContent = $('#dropdownContent');

            if ($profileIcon.length && $dropdownContent.length) {
                $profileIcon.on('click', function(e) {
                    e.stopPropagation();
                    $dropdownContent.toggleClass('show');
                });

                $(window).on('click', function(e) {
                    if (!$(e.target).closest('#profileIcon, #dropdownContent').length) {
                        $dropdownContent.removeClass('show');
                    }
                });
            }


            // =================================================================
            //   ORIGINAL PAGE JAVASCRIPT (jQuery Version)
            // =================================================================
            const $loginTab = $('#login-tab');
            const $signupTab = $('#signup-tab');
            const $loginForm = $('#login-form');
            const $signupForm = $('#signup-form');
            const $successMessage = $('#success-message');

            // Switch Login Tab
            $loginTab.on('click', function() {
                $loginTab.addClass('active');
                $signupTab.removeClass('active');
                $loginForm.addClass('active');
                $signupForm.removeClass('active');
                $successMessage.hide();
            });

            // Switch Signup Tab
            $signupTab.on('click', function() {
                $signupTab.addClass('active');
                $loginTab.removeClass('active');
                $signupForm.addClass('active');
                $loginForm.removeClass('active');
                $successMessage.hide();
            });

            // LinkedIn Login Simulation
            $('#linkedin-login').on('click', function() {
                Swal.fire({
                    icon: 'info',
                    title: 'LinkedIn Login',
                    text: 'Simulating LinkedIn login...'
                });
            });


            // Password Toggle Function
            function setupPasswordToggle(toggleSelector, passwordFieldId) {
                const $toggle = $(toggleSelector);
                if (!$toggle.length) return;

                const $passwordField = $('#' + passwordFieldId);

                $toggle.on('click', function() {
                    const type = $passwordField.attr('type') === 'password' ? 'text' : 'password';
                    $passwordField.attr('type', type);
                    $toggle.toggleClass('fa-eye fa-eye-slash');
                });
            }

            setupPasswordToggle('#toggle-login-password', 'login-password');
            setupPasswordToggle('#toggle-signup-password', 'signup-password');
            setupPasswordToggle('#toggle-signup-confirm-password', 'signup-confirm-password');


            // Login Submit
            $loginForm.on('submit', function(e) {
                e.preventDefault();

                const email = $('#login-email').val().trim();
                const password = $('#login-password').val().trim();
                const remember = $('#remember-me').is(':checked');

                // Validate email
                if (!validateEmail(email)) {
                    showError('Please enter a valid email address');
                    return;
                }

                // Validate password
                if (password === '') {
                    showError('Password is required');
                    return;
                }

                const loginData = {
                    email: email,
                    password: password,
                    remember: remember ? 1 : 0
                };

                // Send request to Laravel API
                $.ajax({
                    url: '/api/business/login',
                    method: 'POST',
                    contentType: 'application/json',
                    data: JSON.stringify(loginData),

                    success: function(data) {
                        // Backend returns: status = true | false
                        if (data.status === true) {

                            showSuccessMessage(data.message || 'Login successful');

                            setTimeout(() => {
                                localStorage.setItem('token', data.token);

                                if (data.route) {
                                    window.location.href = data.route;
                                }
                            }, 1500);

                        } else {
                            showError(data.message || 'Invalid credentials');
                        }
                    },

                    error: function(xhr) {
                        // Display backend exception message
                        let message = 'Something went wrong';

                        if (xhr.responseJSON && xhr.responseJSON.message) {
                            message = xhr.responseJSON.message; // <-- get message thrown by PHP
                        }

                        showError(message);
                    }
                });
            });

            // Signup Submit
            $signupForm.on('submit', function(e) {
                e.preventDefault();

                const businessName = $('#business-name').val();
                const email = $('#signup-email').val();
                const phone = $('#phone-number').val();
                const industry = $('#industry-category').val();
                const location = $('#location').val();
                const password = $('#signup-password').val();
                const confirmPassword = $('#signup-confirm-password').val();

                // -------------------------------
                // Validation
                // -------------------------------
                if (!validateEmail(email)) {
                    showError('Please enter a valid email address');
                    return;
                }
                if (password !== confirmPassword) {
                    showError('Passwords do not match');
                    return;
                }

                // -------------------------------
                // API Payload (same keys as backend)
                // -------------------------------
                const formData = {
                    name: businessName,
                    email: email,
                    contact_number: phone,
                    industry_id: industry,
                    location_id: location,
                    password: password,
                    password_confirmation: confirmPassword
                };

                // Disable button to prevent multiple clicks
                const $btn = $signupForm.find('button[type="submit"]');
                $btn.prop('disabled', true).text('Please wait...');

                // -------------------------------
                // API Request
                // -------------------------------
                fetch('/api/business/register', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'Accept': 'application/json',
                        },
                        body: JSON.stringify(formData)
                    })
                    .then(async response => {
                        const data = await response.json();

                        if (response.ok) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Registration Successful!',
                                text: 'You can now log in.',
                            });

                            $signupForm[0].reset();
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Registration Failed',
                                text: data.message ||
                                    'Please check your inputs and try again.',
                            });
                        }
                    })
                    .catch(error => {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops!',
                            text: 'Something went wrong. Please try again later.',
                        });
                    })
                    .finally(() => {
                        $btn.prop('disabled', false).text('Create Account');
                    });

            });


            // Email Validation
            function validateEmail(email) {
                const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                return re.test(email);
            }


            // =================================================================
            //  SWEET ALERT MESSAGES
            // =================================================================
            function showSuccessMessage(message) {
                Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text: message,
                    timer: 3000,
                    showConfirmButton: false
                });
            }

            function showError(message) {
                Swal.fire({
                    icon: 'error',
                    title: 'Error!',
                    text: message,
                    confirmButtonText: 'OK'
                });
            }

        });
    </script>


</body>

</html>
