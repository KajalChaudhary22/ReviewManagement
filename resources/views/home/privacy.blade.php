<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Privacy Policy - SCIZORA</title>
    <style>
        :root {
            --primary-color: #0A47A9;
            --secondary-color: #FFFFFF;
            --background-accent: #F8F9FA;
            --text-dark: #333333;
            --text-mid: #555555;
            --warning-yellow: #ffc107;
            --warning-yellow-bg: #fff8e1;
            --info-blue-bg: #e7f0fd;
            --header-height: 70px;
        }

        /* General Styles */
        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
            margin: 0;
            color: var(--text-mid);
            line-height: 1.6;
            background-color: var(--secondary-color);
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        /* Header */
        .site-header {
            background-color: var(--secondary-color);
            padding: 0;
            height: var(--header-height);
            border-bottom: 1px solid #e0e0e0;
            position: sticky;
            top: 0;
            z-index: 1000;
            display: flex;
            align-items: center;
        }

        .site-header .container {
            display: flex;
            align-items: center;
            width: 100%;
        }

        .logo {
            display: flex;
            align-items: center;
            text-decoration: none;
            font-size: 2rem;
            font-weight: 700;
            gap: 1px;
        }

        .logo-text-black {
            color: var(--text-dark);
            letter-spacing: -1px;
        }

        .logo-text-blue {
            color: var(--primary-color);
            letter-spacing: -1px;
        }

        .logo-icon {
            width: 0.9em;
            height: 0.9em;
            color: var(--primary-color);
            margin: 0 1px;
            vertical-align: middle;
        }

        .logo .tm {
            font-size: 0.8rem;
            font-weight: normal;
            color: var(--text-dark);
            align-self: flex-start;
            margin-left: 2px;
            margin-top: 5px;
        }

        .nav-wrapper {
            display: flex;
            align-items: center;
            gap: 30px;
        }

        .main-nav {
            display: flex;
            gap: 25px;
        }

        .main-nav a {
            color: var(--text-mid);
            text-decoration: none;
            font-weight: 500;
        }

        .main-nav a:hover {
            color: var(--primary-color);
        }

        .auth-buttons {
            display: flex;
            gap: 10px;
        }

        .auth-buttons .btn {
            padding: 8px 24px;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 500;
            background-color: var(--primary-color);
            color: var(--secondary-color);
            border: 2px solid transparent;
            transition: background-color 0.3s, color 0.3s;
        }
        
        .auth-buttons .btn:hover {
            background-color: #083a8d;
        }

        .menu-toggle {
            display: none;
            cursor: pointer;
            border: none;
            background: none;
            padding: 0;
            z-index: 1001;
        }

        .menu-toggle .bar {
            display: block;
            width: 25px;
            height: 3px;
            margin: 5px auto;
            transition: all 0.3s ease-in-out;
            background-color: var(--text-dark);
        }
        
        /* Hero Section */
        .hero {
            background-color: var(--background-accent);
            padding: 60px 0;
            text-align: center;
            background-image:
                linear-gradient(rgba(248, 249, 250, 0.95), rgba(248, 249, 250, 0.95)),
                url('data:image/svg+xml,%3Csvg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 100 100"%3E%3Cg fill-rule="evenodd"%3E%3Cg fill="%230A47A9" fill-opacity="0.04"%3E%3Cpath opacity=".5" d="M96 95h4v1h-4v4h-1v-4h-9v4h-1v-4h-9v4h-1v-4h-9v4h-1v-4h-9v4h-1v-4h-9v4h-1v-4h-9v4h-1v-4h-9v4h-1v-4h-9v4h-1v-4H0v-1h15v-9H0v-1h15v-9H0v-1h15v-9H0v-1h15v-9H0v-1h15v-9H0v-1h15v-9H0v-1h15v-9H0v-1h15v-9H0v-1h15V0h1v15h9V0h1v15h9V0h1v15h9V0h1v15h9V0h1v15h9V0h1v15h9V0h1v15h9V0h1v15h4v1h-4v9h4v1h-4v9h4v1h-4v9h4v1h-4v9h4v1h-4v9h4v1h-4v9h4v1h-4v9h4v1h-4v9zm-1 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-9-10h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm9-10v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-9-10h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm9-10v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-9-10h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm9-10v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-9-10h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9z"/%3E%3Cpath d="M6 5V0h1v5h9V0h1v5h9V0h1v5h9V0h1v5h9V0h1v5h9V0h1v5h9V0h1v5h9V0h1v5h4v1h-4v9h4v1h-4v9h4v1h-4v9h4v1h-4v9h4v1h-4v9h4v1h-4v9h4v1h-4v9h4v1h-4v9h4v1h-4v5h-1v-5h-9v5h-1v-5h-9v5h-1v-5h-9v5h-1v-5h-9v5h-1v-5h-9v5h-1v-5h-9v5h-1v-5h-9v5H0v-1h5v-9H0v-1h5v-9H0v-1h5v-9H0v-1h5v-9H0v-1h5v-9H0v-1h5v-9H0v-1h5v-9H0v-1h5V0h1v5h9V0h1v5h9V0h1v5h9V0h1v5h9V0h1v5h9V0h1v5h9V0h1v5h9V0h1v5h5v1h-5v9h5v1h-5v9h5v1h-5v9h5v1h-5v9h5v1h-5v9h5v1h-5v9h5v1h-5v9h5v1h-5v9zm-1 5v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-9-10h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm9-10v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-9-10h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm9-10v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-9-10h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm9-10v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-9-10h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9z"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');
        }

        .hero h1 {
            color: var(--primary-color);
            font-size: 3rem;
            margin-bottom: 10px;
        }

        .hero p {
            font-size: 1.25rem;
            color: var(--text-mid);
        }

        /* Main Content Layout */
        .main-layout {
            display: flex;
            padding: 40px 0;
            gap: 40px;
        }

        .sidebar {
            width: 25%;
            flex-shrink: 0;
        }

        .sidebar h3 {
            color: var(--text-dark);
            border-bottom: 2px solid var(--primary-color);
            padding-bottom: 10px;
        }

        .toc {
            list-style: none;
            padding: 0;
            position: sticky;
            top: calc(var(--header-height) + 40px);
        }

        .toc li a {
            color: var(--text-mid);
            text-decoration: none;
            display: block;
            padding: 10px 0;
            border-bottom: 1px solid #eee;
            transition: color 0.2s;
        }

        .toc li a:hover, .toc li a.active {
            color: var(--primary-color);
            font-weight: 500;
        }

        .content-area {
            width: 75%;
        }

        .content-area section {
            margin-bottom: 20px;
        }

        .content-area h2 {
            color: var(--primary-color);
            border-bottom: 1px solid #ddd;
            padding-bottom: 10px;
            margin-top: 40px;
            scroll-margin-top: calc(var(--header-height) + 20px);
        }

        .content-area h2:first-of-type {
            margin-top: 0;
        }

        .content-area h3 {
            color: var(--text-dark);
        }

        .content-area p, .content-area ul {
            margin-bottom: 20px;
        }

        .content-area ul {
            padding-left: 20px;
        }

        /* Highlighted Info Boxes */
        .info-box {
            padding: 20px;
            margin: 20px 0;
            border-radius: 5px;
            border-left: 5px solid;
        }

        .info-box.blue {
            background-color: var(--info-blue-bg);
            border-color: var(--primary-color);
        }

        .info-box.yellow {
            background-color: var(--warning-yellow-bg);
            border-color: var(--warning-yellow);
        }

        /* CTA Banner */
        .cta-banner {
            background-color: var(--primary-color);
            color: var(--secondary-color);
            padding: 50px 0;
            text-align: center;
        }

        .cta-banner h2 {
            margin: 0 0 20px;
            font-size: 1.5rem;
        }

        .cta-banner .btn {
            background-color: var(--secondary-color);
            color: var(--primary-color);
            padding: 15px 30px;
            text-decoration: none;
            font-weight: bold;
            border-radius: 5px;
            transition: background-color 0.3s, color 0.3s;
        }
        
        .cta-banner .btn:hover {
            background-color: #f1f1f1;
        }

        /* Main Footer Container */
.scizora-main-footer {
    background-color: #111827;
    color: #ffffff;
    padding: 2rem 1rem 1.5rem 1rem; /* IMPORTANT: Reduced top/bottom padding */
}

/* Footer Grid Layout */
.scizora-footer-grid {
    display: grid;
    grid-template-columns: 1fr;
    gap: 1.5rem; /* Reduced gap */
    margin-bottom: 1.5rem; /* Reduced margin */
}

/* IMPORTANT: Removes extra space below elements in each column */
.scizora-footer-column > * {
    margin-bottom: 0.5rem;
}
.scizora-footer-column > *:last-child {
    margin-bottom: 0;
}

.scizora-footer-heading, .scizora-footer-logo-heading {
    font-size: 1.1rem;
    font-weight: 700;
    margin-bottom: 0.5rem; /* Reduced margin */
}

.scizora-footer-description {
    color: #9CA3AF;
    font-size: 0.875rem;
    line-height: 1.4; /* Controls text height */
}

/* Footer Link Lists */
.scizora-footer-list {
    list-style: none;
    padding: 0;
    margin: 0;
    display: flex;
    flex-direction: column;
    gap: 0.2rem; /* Reduced gap between links */
}

/* Footer Bottom Section */
.scizora-footer-bottom {
    border-top: 1px solid #374151;
    padding-top: 1rem; /* Reduced padding */
    margin-top: 1.5rem; /* Reduced margin */
    text-align: center;
    color: #9CA3AF;
    font-size: 0.8rem;
}

/* Other styles remain mostly the same */
.scizora-social-links { display: flex; gap: 1rem; }
.scizora-social-icon { color: #9CA3AF; transition: color 0.2s ease; }
.scizora-social-icon:hover { color: #ffffff; }
.scizora-footer-link { color: #9CA3AF; text-decoration: none; font-size: 0.875rem; }
.scizora-footer-link:hover { color: #ffffff; }
.scizora-newsletter-form { display: flex; }
.scizora-newsletter-input { background-color: #1F2937; color: #ffffff; padding: 6px 12px; border: none; border-radius: 4px 0 0 4px; outline: none; width: 100%; font-size: 0.875rem; }
.scizora-newsletter-button { background-color: #2563EB; color: #ffffff; padding: 6px 12px; border: none; border-radius: 0 4px 4px 0; cursor: pointer; }
.scizora-newsletter-button:hover { background-color: #1D4ED8; }


/* Responsive adjustments */
@media (min-width: 768px) {
    .scizora-footer-grid {
        grid-template-columns: repeat(2, 1fr);
        gap: 2rem;
    }
}
@media (min-width: 1024px) {
    .scizora-footer-grid {
        grid-template-columns: repeat(4, 1fr);
    }
}

        /* Back to Top Button */
        #backToTopBtn {
            display: none;
            position: fixed;
            bottom: 20px;
            right: 30px;
            z-index: 99;
            border: none;
            outline: none;
            background-color: var(--primary-color);
            color: white;
            cursor: pointer;
            padding: 10px 15px;
            border-radius: 50%;
            font-size: 24px;
            line-height: 1;
            transition: background-color 0.3s, opacity 0.3s;
        }

        #backToTopBtn:hover {
            background-color: #083a8d;
        }

        /* Responsive Design */

        /* DESKTOP NAV CENTERING (NEW) */
        @media (min-width: 993px) {
            .site-header .container {
                justify-content: space-between;
                position: relative;
            }
            .main-nav {
                position: absolute;
                left: 50%;
                top: 50%;
                transform: translate(-50%, -50%);
            }
            .logo, .nav-wrapper {
                position: static;
                transform: none;
            }
        }

        /* TABLET & MOBILE NAV */
        @media (max-width: 992px) {
            .site-header .container {
                justify-content: space-between;
            }
            .menu-toggle {
                display: block;
            }
            .nav-wrapper {
                position: absolute;
                top: var(--header-height);
                left: 0;
                width: 100%;
                background-color: var(--secondary-color);
                flex-direction: column;
                align-items: center;
                padding: 20px;
                transform: translateY(-150%);
                transition: transform 0.3s ease-in-out;
                border-bottom: 1px solid #e0e0e0;
                gap: 25px;
            }
            .nav-wrapper.active {
                transform: translateY(0);
            }
            /* Reset absolute positioning for mobile nav */
            .main-nav {
                position: static;
                transform: none;
                flex-direction: column;
                align-items: center;
                width: 100%;
                gap: 15px;
            }
            .auth-buttons {
                flex-direction: column;
                width: 100%;
                max-width: 250px;
                align-items: stretch;
            }
            .auth-buttons .btn {
                text-align: center;
            }
            .main-layout {
                flex-direction: column;
            }
            .sidebar, .content-area {
                width: 100%;
            }
            .toc {
                position: static;
            }
        }

        /* MOBILE-ONLY ACCORDION */
        @media (max-width: 768px) {
            .sidebar {
                display: none;
            }
            .content-area h2 {
                cursor: pointer;
                position: relative;
                display: flex;
                justify-content: space-between;
                align-items: center;
            }
            .content-area h2::after {
                content: '+';
                font-size: 2rem;
                font-weight: bold;
                color: var(--primary-color);
                transition: transform 0.3s ease;
            }
            .content-area .accordion-content {
                max-height: 0;
                overflow: hidden;
                transition: max-height 0.3s ease-out;
            }
            .content-area .section-active h2::after {
                transform: rotate(45deg);
            }
            .footer-column {
                width: 100%;
                margin-bottom: 20px;
            }
        }
    </style>
    @include('home.styles')
</head>
<body>

    @include('home.header')

    <section class="hero">
        <div class="container">
            <h1>Privacy Policy</h1>
            <p>We value your privacy and are committed to protecting your data.</p>
        </div>
    </section>

    <div class="container main-layout">
        <aside class="sidebar">
            <h3>Table of Contents</h3>
            <ul class="toc" id="toc-menu">
                <li><a href="#introduction">Introduction</a></li>
                <li><a href="#information-we-collect">Information We Collect</a></li>
                <li><a href="#how-we-use-your-information">How We Use Your Information</a></li>
                <li><a href="#cookies-tracking">Cookies & Tracking Technologies</a></li>
                <li><a href="#data-security">Data Security</a></li>
                <li><a href="#sharing-of-information">Sharing of Information</a></li>
                <li><a href="#your-rights-choices">Your Rights & Choices</a></li>
                <li><a href="#third-party-services">Third-Party Services</a></li>
                <li><a href="#childrens-privacy">Children’s Privacy</a></li>
                <li><a href="#changes-to-policy">Changes to This Privacy Policy</a></li>
                <li><a href="#contact-us">Contact Us</a></li>
            </ul>
        </aside>

        <main class="content-area" id="mainContent">
            <section id="introduction">
                <h2>1. Introduction</h2>
                <div class="accordion-content">
                    <p>Welcome to SCIZORA. This Privacy Policy explains how we collect, use, disclose, and safeguard your information when you visit our platform. We respect your privacy and are committed to protecting it through our compliance with this policy.</p>
                    <p>This policy applies to information we collect on this platform and in email, text, and other electronic messages between you and this platform. Please read this policy carefully to understand our policies and practices regarding your information and how we will treat it.</p>
                </div>
            </section>
            <section id="information-we-collect">
                <h2>2. Information We Collect</h2>
                <div class="accordion-content">
                    <p>We may collect several types of information from and about users of our platform, including:</p>
                    <ul>
                        <li><strong>Personal Data:</strong> Personally identifiable information, such as your name, shipping address, email address, and telephone number, and demographic information, such as your age, gender, hometown, and interests, that you voluntarily give to us when you register with the platform.</li>
                        <li><strong>Derivative Data:</strong> Information our servers automatically collect when you access the platform, such as your IP address, your browser type, your operating system, your access times, and the pages you have viewed directly before and after accessing the platform.</li>
                        <li><strong>Financial Data:</strong> Financial information, such as data related to your payment method (e.g., valid credit card number, card brand, expiration date) that we may collect when you purchase, order, return, exchange, or request information about our services from the platform.</li>
                    </ul>
                </div>
            </section>
            <section id="how-we-use-your-information">
                <h2>3. How We Use Your Information</h2>
                <div class="accordion-content">
                    <p>Having accurate information about you permits us to provide you with a smooth, efficient, and customized experience. Specifically, we may use information collected about you via the platform to:</p>
                    <ul>
                        <li>Create and manage your account.</li>
                        <li>Email you regarding your account or order.</li>
                        <li>Fulfill and manage purchases, orders, payments, and other transactions related to the platform.</li>
                        <li>Increase the efficiency and operation of the platform.</li>
                        <li>Monitor and analyze usage and trends to improve your experience with the platform.</li>
                    </ul>
                    <div class="info-box blue">
                        🔒 <strong>We Do Not Sell Your Data.</strong> Your personal information is not and will not be sold to third parties.
                    </div>
                </div>
            </section>
            <section id="cookies-tracking">
                <h2>4. Cookies & Tracking Technologies</h2>
                <div class="accordion-content">
                    <p>We may use cookies, web beacons, tracking pixels, and other tracking technologies on the platform to help customize the platform and improve your experience. When you access the platform, your personal information is not collected through the use of tracking technology.</p>
                    <p>Most browsers are set to accept cookies by default. You can remove or reject cookies, but be aware that such action could affect the availability and functionality of the platform.</p>
                </div>
            </section>
            <section id="data-security">
                <h2>5. Data Security</h2>
                <div class="accordion-content">
                    <p>We use administrative, technical, and physical security measures to help protect your personal information. While we have taken reasonable steps to secure the personal information you provide to us, please be aware that despite our efforts, no security measures are perfect or impenetrable, and no method of data transmission can be guaranteed against any interception or other type of misuse.</p>
                </div>
            </section>
            <section id="sharing-of-information">
                <h2>6. Sharing of Information</h2>
                <div class="accordion-content">
                    <p>We may share information we have collected about you in certain situations. Your information may be disclosed as follows:</p>
                    <ul>
                        <li><strong>By Law or to Protect Rights:</strong> If we believe the release of information about you is necessary to respond to legal process, to investigate or remedy potential violations of our policies, or to protect the rights, property, and safety of others, we may share your information as permitted or required by any applicable law, rule, or regulation.</li>
                        <li><strong>Third-Party Service Providers:</strong> We may share your information with third parties that perform services for us or on our behalf, including payment processing, data analysis, email delivery, hosting services, customer service, and marketing assistance.</li>
                    </ul>
                    <div class="info-box yellow">
                        ⚠️ <strong>Important:</strong> Please review this policy regularly to stay informed of our updates.
                    </div>
                </div>
            </section>
            <section id="your-rights-choices">
                <h2>7. Your Rights & Choices</h2>
                <div class="accordion-content">
                    <p>You have certain rights regarding the personal information we maintain about you. You may, at any time, review or change the information in your account or terminate your account by:</p>
                    <ul>
                        <li>Logging into your account settings and updating your account</li>
                        <li>Contacting us using the contact information provided below</li>
                    </ul>
                </div>
            </section>
            <section id="third-party-services">
                <h2>8. Third-Party Services</h2>
                <div class="accordion-content">
                    <p>Our platform may contain links to third-party websites and applications of interest, including advertisements and external services, that are not affiliated with us. Once you have used these links to leave the platform, any information you provide to these third parties is not covered by this Privacy Policy, and we cannot guarantee the safety and privacy of your information.</p>
                </div>
            </section>
            <section id="childrens-privacy">
                <h2>9. Children’s Privacy</h2>
                <div class="accordion-content">
                    <p>We do not knowingly solicit information from or market to children under the age of 13. If you become aware of any data we have collected from children under age 13, please contact us using the contact information provided below.</p>
                </div>
            </section>
            <section id="changes-to-policy">
                <h2>10. Changes to This Privacy Policy</h2>
                <div class="accordion-content">
                    <p>We may update this Privacy Policy from time to time in order to reflect, for example, changes to our practices or for other operational, legal, or regulatory reasons. We will notify you of any changes by posting the new Privacy Policy on this page.</p>
                </div>
            </section>
            <section id="contact-us">
                <h2>11. Contact Us</h2>
                <div class="accordion-content">
                    <p>If you have questions or comments about this Privacy Policy, please contact us at:</p>
                    <p><strong>SCIZORA Inc.</strong><br>123 Science Avenue<br>Innovation City, 12345<br>Email: privacy@scizora.com</p>
                </div>
            </section>
        </main>
    </div>

    <section class="cta-banner">
        <div class="container">
            <h2>Your trust is important to us. For any privacy-related questions, reach out to our support team.</h2>
            <a href="contactus.html" class="btn">Contact Support</a>
        </div>
    </section>

   @include('home.footer')

    <button id="backToTopBtn" title="Go to top">&uarr;</button>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const backToTopBtn = document.getElementById("backToTopBtn");
            const menuToggle = document.getElementById('menuToggle');
            const navWrapper = document.getElementById('navWrapper');

            // --- Back to Top Button ---
            window.onscroll = function() {
                if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
                    backToTopBtn.style.display = "block";
                } else {
                    backToTopBtn.style.display = "none";
                }
            };

            backToTopBtn.addEventListener('click', function() {
                window.scrollTo({ top: 0, behavior: 'smooth' });
            });

            // --- Mobile Menu Toggle ---
            menuToggle.addEventListener('click', function() {
                navWrapper.classList.toggle('active');
            });

            // --- Accordion for Mobile ---
            function setupAccordion() {
                if (window.innerWidth <= 768) {
                    const sections = document.querySelectorAll('.content-area section');
                    sections.forEach(section => {
                        const h2 = section.querySelector('h2');
                        const content = section.querySelector('.accordion-content');
                        
                        if (!h2.accordionInitialized) {
                            h2.accordionInitialized = true;
                             h2.onclick = () => {
                                const isActive = section.classList.contains('section-active');
                                sections.forEach(s => {
                                    s.classList.remove('section-active');
                                    s.querySelector('.accordion-content').style.maxHeight = null;
                                });
                                if (!isActive) {
                                    section.classList.add('section-active');
                                    content.style.maxHeight = content.scrollHeight + "px";
                                }
                            };
                        }
                    });
                } else {
                    const contents = document.querySelectorAll('.content-area .accordion-content');
                    contents.forEach(content => {
                        content.style.maxHeight = 'none';
                    });
                     const sections = document.querySelectorAll('.content-area section');
                     sections.forEach(section => {
                        const h2 = section.querySelector('h2');
                        if(h2.accordionInitialized){
                           h2.onclick = null;
                           h2.accordionInitialized = false;
                        }
                     });
                }
            }
            
            setupAccordion();
            window.addEventListener('resize', setupAccordion);
        });
    </script>

</body>
</html>