<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - SCIZORA</title>
    <style>
        /* General Body Styles */
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #F8F9FA;
            color: #333333;
            line-height: 1.6;
        }

        /* Utility Class for Containers */
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 5%;
        }

        /* Header Styles */
        header {
            background-color: #FFFFFF;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
            padding: 1rem 5%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .logo {
            font-size: 1.8rem;
            font-weight: bold;
            color: #0A47A9;
            text-decoration: none;
        }

        .nav-menu a {
            margin: 0 15px;
            text-decoration: none;
            color: #555555;
            font-weight: 500;
            transition: color 0.3s ease;
        }

        .nav-menu a:hover, .nav-menu a.active {
            color: #0A47A9;
        }

        /* Hamburger Menu Icon */
        .hamburger {
            display: none;
            flex-direction: column;
            cursor: pointer;
            z-index: 1010; /* Ensure it's above the mobile menu */
        }

        .hamburger .bar {
            width: 25px;
            height: 3px;
            background-color: #333;
            margin: 4px 0;
            transition: 0.4s;
        }
        
        /* Hamburger animation */
        .hamburger.active .bar:nth-child(1) {
            transform: rotate(-45deg) translate(-5px, 6px);
        }

        .hamburger.active .bar:nth-child(2) {
            opacity: 0;
        }

        .hamburger.active .bar:nth-child(3) {
            transform: rotate(45deg) translate(-5px, -6px);
        }


        .profile-dropdown {
            position: relative;
        }

        .profile-icon {
            font-size: 2rem;
            color: #0A47A9;
            cursor: pointer;
            transition: color 0.3s ease;
        }

        .profile-icon:hover {
            color: #083a8d;
        }

        .dropdown-content {
            display: none; /* Changed to be controlled by JS */
            position: absolute;
            right: 0;
            background-color: #FFFFFF;
            min-width: 180px;
            box-shadow: 0 8px 16px rgba(0,0,0,0.1);
            z-index: 1;
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

        /* Responsive styles for navigation */
        @media (max-width: 768px) {
            .nav-menu {
                position: fixed;
                left: -100%;
                top: 0;
                flex-direction: column;
                background-color: #fff;
                width: 70%;
                height: 100vh;
                text-align: center;
                transition: 0.3s;
                box-shadow: 0 10px 27px rgba(0, 0, 0, 0.05);
                padding-top: 5rem;
            }

            .nav-menu.active {
                left: 0;
            }

            .nav-menu a {
                margin: 1.5rem 0;
                display: block;
                font-size: 1.2rem;
            }

            .hamburger {
                display: flex;
            }
        }


        /* Hero Section */
        .hero {
            background-image:
                linear-gradient(rgba(248, 249, 250, 0.85), rgba(248, 249, 250, 0.85)),
                url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 80 40"><defs><linearGradient id="g" x1="0" y1="0" x2="0" y2="1"><stop offset="0%" stop-color="%230A47A9" stop-opacity="0.1"/><stop offset="100%" stop-color="%230A47A9" stop-opacity="0"/></linearGradient></defs><path d="M0 40L80 0H40L0 40Z" fill="url(%23g)"/><path d="M40 40L80 0H80L40 40Z" fill="url(%23g)"/></svg>');
            background-size: 100px;
            text-align: center;
            padding: 50px 20px; /* Reduced padding */
            position: relative;
        }

        .hero h1 {
            color: #0A47A9;
            font-size: 3rem;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .hero p {
            color: #555555;
            font-size: 1.2rem;
            max-width: 700px;
            margin: 0 auto;
        }

        /* Contact Information Section */
        .contact-info {
            display: flex;
            justify-content: center;
            gap: 25px;
            padding: 50px 5%;
            flex-wrap: wrap;
            background-color: #FFFFFF;
        }

        .info-card {
            background: #FFFFFF;
            padding: 25px;
            border-radius: 10px;
            border: 1px solid #e9ecef;
            text-align: center;
            width: 100%;
            max-width: 260px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .info-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 8px 20px rgba(0,0,0,0.1);
        }

        .info-card i {
            font-size: 2.2rem; color: #0A47A9; margin-bottom: 15px;
        }
        .info-card h3 {
            margin-bottom: 10px; color: #333333; font-size: 1.2rem;
        }
        .info-card p {
            color: #555555; font-size: 0.95rem;
        }

        /* Contact Form Section */
        .contact-form-section {
            padding: 60px 5%;
            background-color: #F8F9FA;
        }

        .form-container {
            max-width: 800px; margin: 0 auto; background: #FFFFFF; padding: 40px; border-radius: 10px; box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }
        .form-container h2 {
            text-align: center; margin-bottom: 10px; color: #0A47A9;
        }
        .form-container .form-intro {
            text-align: center; color: #555555; margin-bottom: 30px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-group label {
            display: block; margin-bottom: 5px; font-weight: 500; color: #555555;
        }
        .form-group input, .form-group select, .form-group textarea {
            width: 100%; padding: 12px; border: 1px solid #ccc; border-radius: 5px; font-size: 1rem; box-sizing: border-box;
        }
        .form-group textarea {
            resize: vertical; min-height: 120px;
        }
        .error-message {
            color: #e74c3c; font-size: 0.875rem; display: none; margin-top: 5px;
        }
        .form-buttons {
            display: flex; justify-content: center; gap: 20px; margin-top: 30px;
        }
        .form-buttons button {
            padding: 12px 30px; border-radius: 5px; font-size: 1rem; cursor: pointer; transition: all 0.3s ease; font-weight: 500;
        }
        .submit-btn {
            background-color: #0A47A9; color: #FFFFFF; border: none;
        }
        .submit-btn:hover {
            background-color: #083a8d; transform: scale(1.05);
        }
        .reset-btn {
            background-color: transparent; color: #555555; border: 1px solid #ccc;
        }
        .reset-btn:hover {
            background-color: #e9e9e9;
        }
        #success-message {
            display: none; background-color: #d4edda; color: #155724; padding: 20px; border-radius: 5px; text-align: center; margin-top: 20px;
        }
        
        /* Testimonials Section */
        .testimonials-section {
            padding: 60px 0;
            background-color: #FFFFFF;
        }
        .testimonials-section h2 {
            text-align: center;
            color: #0A47A9;
            margin-bottom: 40px;
            font-size: 2rem;
        }

        .testimonial-slider-container {
            position: relative;
            max-width: 1200px;
            margin: 0 auto;
        }
        
        .testimonial-slider-wrapper {
            overflow: hidden;
        }

        .testimonials-grid {
            display: flex;
            overflow-x: auto;
            scroll-snap-type: x mandatory;
            scroll-behavior: smooth;
            padding-bottom: 20px; /* Space for scrollbar if visible */
            margin-bottom: -20px; /* Hide scrollbar visually */
            gap: 30px;
            padding-left: 5%;
            padding-right: 5%;
            scrollbar-width: none; /* For Firefox */
        }
        
        .testimonials-grid::-webkit-scrollbar {
            display: none; /* For Chrome, Safari, and Opera */
        }

        .testimonial-card {
            flex: 0 0 80%;
            background-color: #F8F9FA;
            border: 1px solid #e9ecef;
            border-radius: 10px;
            padding: 30px;
            text-align: center;
            scroll-snap-align: center;
        }
        
        @media (min-width: 768px) {
            .testimonial-card {
                flex-basis: 45%;
            }
        }
        
        @media (min-width: 1024px) {
            .testimonial-card {
                flex-basis: 31%;
            }
        }

        .testimonial-text { font-style: italic; color: #555555; margin-bottom: 20px; }
        .testimonial-author { font-weight: bold; color: #333333; }
        .testimonial-title { font-size: 0.9rem; color: #777777; }
        .star-rating .fas { color: #f1c40f; }
        .testimonial-card .fa-quote-left { font-size: 1.5rem; color: #0A47A9; margin-bottom: 15px; }
        
        .slider-nav {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            width: 40px;
            height: 40px;
            background-color: #FFFFFF;
            border: 1px solid #ddd;
            border-radius: 50%;
            color: #0A47A9;
            font-size: 1.2rem;
            cursor: pointer;
            z-index: 10;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
        }

        .slider-nav:hover {
            background-color: #0A47A9;
            color: #FFFFFF;
        }
        
        .slider-nav:disabled {
            opacity: 0.4;
            cursor: not-allowed;
            background-color: #e9ecef;
        }

        #prevBtn {
            left: 2%;
        }
        #nextBtn {
            right: 2%;
        }

        /* Map Section */
        .map-section { padding: 60px 5%; background: #F8F9FA; }
        .map-section iframe { width: 100%; height: 400px; border-radius: 10px; border: 0; }

        /* Call-to-Action Banner */
        .cta-banner { background-color: #0A47A9; color: #FFFFFF; padding: 50px 20px; text-align: center; }
        .cta-banner h2 { margin: 0 0 20px 0; font-size: 2rem; }
        .cta-banner .cta-btn { background-color: #FFFFFF; color: #0A47A9; padding: 12px 30px; border-radius: 5px; text-decoration: none; font-weight: bold; transition: background-color 0.3s ease, color 0.3s ease; }
        .cta-banner .cta-btn:hover { background-color: #e9e9e9; }

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
    </style>
    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
</head>
<body>

    <!-- Header -->
    <header>
        <a href="index.html" class="logo"><img src="logo.jpg" alt="logo" width="150" height="50"></a>
        <nav class="nav-menu">
            <a href="index.html">Home</a>
            <a href="categories.html">Categories</a>
            <a href="blog.html">Blog</a>
            <a href="aboutus.html">About Us</a>
            <a href="contactus.html" class="active">Contact</a>
        </nav>
        <div class="header-right">
             <div class="profile-dropdown">
                <i class="fas fa-user-circle profile-icon" id="profileIcon"></i>
                <div class="dropdown-content" id="dropdownContent">
                    <a href="User Pages\Dashboard seperate pages\My-Profile.html"><i class="fas fa-user"></i> My Profile</a>
                    <a href="Business Pages\notification.html"><i class="fas fa-bell"></i> Notifications</a>
                    <a href="#"><i class="fas fa-sign-out-alt"></i> Logout</a>
                </div>
            </div>
        </div>
        <div class="hamburger">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="hero">
        <h1>Contact Us</h1>
        <p>We’re here to help. Reach out to SCIZORA for any queries, collaborations, or support.</p>
    </section>

    <!-- Contact Information Section -->
    <section class="contact-info">
        <div class="info-card">
            <i class="fas fa-map-marker-alt"></i>
            <h3>Our Address</h3>
            <p>123 Science Park, Innovation Drive, Tech City, 12345</p>
        </div>
        <div class="info-card">
            <i class="fas fa-phone-alt"></i>
            <h3>Phone Number</h3>
            <p>+1 (234) 567-8900</p>
        </div>
        <div class="info-card">
            <i class="fas fa-envelope"></i>
            <h3>Email Address</h3>
            <p>support@scizora.com</p>
        </div>
        <div class="info-card">
            <i class="fas fa-clock"></i>
            <h3>Business Hours</h3>
            <p>Mon - Fri: 9 AM - 6 PM</p>
        </div>
    </section>

    <!-- Contact Form Section -->
    <section class="contact-form-section">
        <div class="form-container">
            <h2>Send us a Message</h2>
            <p class="form-intro">Have a question or a proposal? A member of our team will get back to you within 24 hours.</p>
            <form id="contactForm" novalidate>
                <div class="form-group">
                    <label for="fullName">Full Name</label>
                    <input type="text" id="fullName" name="fullName" required>
                    <div class="error-message" id="fullNameError">Full Name is required.</div>
                </div>
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" id="email" name="email" required>
                    <div class="error-message" id="emailError">Please enter a valid email address.</div>
                </div>
                <div class="form-group">
                    <label for="phone">Phone Number</label>
                    <input type="tel" id="phone" name="phone" required>
                    <div class="error-message" id="phoneError">Please enter a valid phone number (digits only).</div>
                </div>
                <div class="form-group">
                    <label for="subject">Subject</label>
                    <select id="subject" name="subject">
                        <option value="General Inquiry">General Inquiry</option>
                        <option value="Support">Support</option>
                        <option value="Partnership">Partnership</option>
                        <option value="Other">Other</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea id="message" name="message" required></textarea>
                    <div class="error-message" id="messageError">Message is required.</div>
                </div>
                <div class="form-buttons">
                    <button type="submit" class="submit-btn">Submit Message</button>
                    <button type="reset" class="reset-btn">Reset</button>
                </div>
            </form>
            <div id="success-message">
                <strong>Thank You!</strong> Your message has been sent successfully. We will be in touch soon.
            </div>
        </div>
    </section>
    
    <!-- Testimonials Section -->
    <section class="testimonials-section">
        <div class="container">
            <h2>Trusted by Innovators</h2>
            <div class="testimonial-slider-container">
                <button id="prevBtn" class="slider-nav" aria-label="Previous testimonial"><i class="fas fa-chevron-left"></i></button>
                <div class="testimonial-slider-wrapper">
                    <div class="testimonials-grid" id="testimonialsGrid">
                        <div class="testimonial-card">
                            <i class="fas fa-quote-left"></i>
                            <div class="star-rating">
                                <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                            </div>
                            <p class="testimonial-text">"SCIZORA has revolutionized our procurement process. We save countless hours every month, allowing our team to focus more on research."</p>
                            <p class="testimonial-author">Dr. Alisha Vance</p>
                            <p class="testimonial-title">Lead Researcher, BioGen Labs</p>
                        </div>
                        <div class="testimonial-card">
                            <i class="fas fa-quote-left"></i>
                            <div class="star-rating">
                                <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                            </div>
                            <p class="testimonial-text">"The platform's vast catalog and transparent pricing are unmatched. Their customer support is incredibly responsive and knowledgeable."</p>
                            <p class="testimonial-author">Mark Chen</p>
                            <p class="testimonial-title">Procurement Manager, PharmaCorp</p>
                        </div>
                        <div class="testimonial-card">
                            <i class="fas fa-quote-left"></i>
                            <div class="star-rating">
                                <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                            </div>
                            <p class="testimonial-text">"As a startup, finding reliable suppliers quickly is critical. SCIZORA gave us access to a global network that was previously out of reach."</p>
                            <p class="testimonial-author">Dr. Samuel Ito</p>
                            <p class="testimonial-title">Founder, NanoSolutions</p>
                        </div>
                         <div class="testimonial-card">
                            <i class="fas fa-quote-left"></i>
                            <div class="star-rating">
                                <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i>
                            </div>
                            <p class="testimonial-text">"The user interface is intuitive and easy to navigate. Tracking orders and managing budgets has never been simpler for our institution."</p>
                            <p class="testimonial-author">Dr. Emily Roscoe</p>
                            <p class="testimonial-title">University Dept. Head</p>
                        </div>
                    </div>
                </div>
                <button id="nextBtn" class="slider-nav" aria-label="Next testimonial"><i class="fas fa-chevron-right"></i></button>
            </div>
        </div>
    </section>

    <!-- Map Section -->
    <section class="map-section">
        <div class="container">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3022.219595702288!2d-73.985428!3d40.758895!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25855c6434223%3A0x830497b777a8a1a9!2sTimes%20Square!5e0!3m2!1sen!2sus!4v1616161616161!5m2!1sen!2sus" allowfullscreen="" loading="lazy"></iframe>
        </div>
    </section>

    <!-- Call-to-Action Banner -->
    <section class="cta-banner">
        <h2>Looking for partnerships or collaborations?</h2>
        <a href="#" class="cta-btn">Work With Us</a>
    </section>

    <!-- Footer -->
<footer class="scizora-main-footer">
    <div class="container scizora-footer-container">
        <!-- Footer Content Grid -->
        <div class="scizora-footer-grid">
            <!-- Column 1: About -->
            <div class="scizora-footer-column">
                <h3 class="scizora-footer-logo-heading"><a href="#"><img src="logo.jpg" alt="logo" width="200" height="100"></a></h3>
                <p class="scizora-footer-description">SCIZORA helps consumers find trustworthy businesses through verified reviews and ratings from real customers.</p>
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
                    <li><a href="#" class="scizora-footer-link">Home</a></li>
                    <li><a href="categories.html" class="scizora-footer-link">Categories</a></li>
                    <li><a href="blog.html" class="scizora-footer-link">Blogs</a></li>
                    <li><a href="aboutus.html" class="scizora-footer-link">About Us</a></li>
                    <li><a href="contactus.html" class="scizora-footer-link">Contact Us</a></li>
                </ul>
            </div>
            
            <!-- Column 3: Legal -->
            <div class="scizora-footer-column">
                <h3 class="scizora-footer-heading">Legal</h3>
                <ul class="scizora-footer-list">
                    <li><a href="terms.html" class="scizora-footer-link">Terms of Service</a></li>
                    <li><a href="privacy.html" class="scizora-footer-link">Privacy Policy</a></li>
                </ul>
            </div>
            
            <!-- Column 4: Newsletter -->
            <div class="scizora-footer-column">
                <h3 class="scizora-footer-heading">Newsletter</h3>
                <p class="scizora-footer-description">Subscribe to our newsletter for the latest updates and featured companies.</p>
                <div class="scizora-newsletter-form">
                    <input type="email" placeholder="Your email" class="scizora-newsletter-input">
                    <button class="scizora-newsletter-button">
                        <i class="fas fa-paper-plane"></i>
                    </button>
                </div>
            </div>
        </div>
        
        <!-- Footer Bottom/Copyright -->
        <div class="scizora-footer-bottom">
            <p>&copy; 2025 SCIZORA. All rights reserved.</p>
        </div>
    </div>
</footer>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // --- Hamburger Menu Logic ---
            const hamburger = document.querySelector('.hamburger');
            const navMenu = document.querySelector('.nav-menu');

            hamburger.addEventListener('click', () => {
                hamburger.classList.toggle('active');
                navMenu.classList.toggle('active');
            });

            // --- Profile Dropdown Logic ---
            const profileIcon = document.getElementById('profileIcon');
            const dropdownContent = document.getElementById('dropdownContent');

            profileIcon.addEventListener('click', function(event) {
                event.stopPropagation(); // Prevents the window click listener from firing immediately
                dropdownContent.classList.toggle('show');
            });

            window.addEventListener('click', function(event) {
                if (!profileIcon.contains(event.target) && !dropdownContent.contains(event.target)) {
                    dropdownContent.classList.remove('show');
                }
            });

            // --- Contact Form Validation Logic ---
            const form = document.getElementById('contactForm');
            const successMessage = document.getElementById('success-message');

            form.addEventListener('submit', function(event) {
                event.preventDefault();
                if (validateForm()) {
                    form.style.display = 'none';
                    successMessage.style.display = 'block';
                }
            });

            function validateForm() {
                let isValid = true;
                const fullName = document.getElementById('fullName'), email = document.getElementById('email'), phone = document.getElementById('phone'), message = document.getElementById('message');
                const fullNameError = document.getElementById('fullNameError'), emailError = document.getElementById('emailError'), phoneError = document.getElementById('phoneError'), messageError = document.getElementById('messageError');
                
                resetErrors();

                if (fullName.value.trim() === '') { fullNameError.style.display = 'block'; isValid = false; }
                if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email.value.trim())) { emailError.style.display = 'block'; isValid = false; }
                if (!/^\d{7,}$/.test(phone.value.trim())) { phoneError.style.display = 'block'; isValid = false; }
                if (message.value.trim() === '') { messageError.style.display = 'block'; isValid = false; }

                return isValid;
            }

            function resetErrors() {
                document.querySelectorAll('.error-message').forEach(msg => msg.style.display = 'none');
            }
            
            // --- Testimonial Slider Logic ---
            const grid = document.getElementById('testimonialsGrid');
            const prevBtn = document.getElementById('prevBtn');
            const nextBtn = document.getElementById('nextBtn');
            
            const updateSliderButtons = () => {
                const maxScrollLeft = grid.scrollWidth - grid.clientWidth;
                // Use a small tolerance for floating point inaccuracies
                prevBtn.disabled = grid.scrollLeft < 1;
                nextBtn.disabled = grid.scrollLeft > maxScrollLeft - 1;
            };

            prevBtn.addEventListener('click', () => {
                const cardWidth = grid.querySelector('.testimonial-card').offsetWidth;
                grid.scrollLeft -= cardWidth + 30; // 30 is the gap
            });

            nextBtn.addEventListener('click', () => {
                const cardWidth = grid.querySelector('.testimonial-card').offsetWidth;
                grid.scrollLeft += cardWidth + 30; // 30 is the gap
            });
            
            // Update buttons when the user scrolls manually (e.g., swiping)
            grid.addEventListener('scroll', updateSliderButtons);
            // Initial check
            updateSliderButtons();
        });
    </script>

</body>
</html>