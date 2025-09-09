<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF--8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - SCIZORA</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
        integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        /* --- General Styles --- */
        body {
            font-family: sans-serif;
            margin: 0;
            padding: 0;
            color: #333333;
            line-height: 1.6;
            box-sizing: border-box;
        }

        *,
        *::before,
        *::after {
            box-sizing: inherit;
        }

        a {
            text-decoration: none;
            color: #0A47A9;
        }

        img {
            max-width: 100%;
            height: auto;
        }

        /* --- Colors & Branding --- */
        :root {
            --primary-color: #0A47A9;
            --secondary-color: #FFFFFF;
            --accent-bg: #F8F9FA;
            --text-dark: #333333;
            --text-mid: #555555;
        }

        /* --- Layout Styles --- */
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
            /* Adjusted container padding for responsive spacing */
        }

        section {
            padding: 40px 0;
            /* Reduced vertical padding for all sections */
            overflow: hidden;
            /* For scroll animations */
        }

        h2 {
            text-align: center;
            font-size: 2.2em;
            color: var(--primary-color);
            margin-top: 0;
            margin-bottom: 30px;
            /* Controlled space below section titles */
        }

        .card {
            background-color: var(--secondary-color);
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-bottom: 20px;
        }

        /* --- Header --- */
        header {
            background-color: var(--secondary-color);
            padding: 15px 0;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        header .container {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-size: 24px;
            font-weight: bold;
            color: var(--primary-color);
        }

        nav ul {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
        }

        nav ul li {
            margin-left: 20px;
        }

        nav a {
            color: var(--text-dark);
            transition: color 0.3s ease;
        }

        nav a:hover {
            color: var(--primary-color);
        }

        .profile-dropdown {
            position: relative;
        }

        .profile-dropdown button {
            background: none;
            border: none;
            cursor: pointer;
            font-size: 30px;
            color: var(--text-dark);
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: var(--secondary-color);
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
            right: 0;
            border-radius: 4px;
        }

        .dropdown-content a {
            color: var(--text-dark);
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .dropdown-content a:hover {
            background-color: #ddd;
        }

        .profile-dropdown:hover .dropdown-content {
            display: block;
        }



        /* --- Hero Section --- */
        .hero {
            background-color: var(--accent-bg);
            text-align: center;
            padding: 50px 0;
            /* Reduced padding */
        }

        .hero h1 {
            font-size: 3em;
            color: var(--primary-color);
            margin-bottom: 15px;
            /* Reduced margin */
        }

        .hero p {
            font-size: 1.2em;
            color: var(--text-mid);
        }

        /* --- Our Story Section --- */
        .our-story .container {
            display: flex;
            align-items: center;
            gap: 30px;
        }

        .our-story .image-column {
            flex: 1;
        }

        .our-story .text-column {
            flex: 1;
        }

        /* --- Mission, Vision, Values Section --- */
        .mission-vision-values {
            background-color: var(--accent-bg);
        }

        .mvv-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
        }

        .mvv-grid .card {
            text-align: center;
        }

        .mvv-grid i {
            font-size: 3em;
            color: var(--primary-color);
            margin-bottom: 10px;
        }

        /* --- Why Choose Us Section --- */
        .why-choose-us ul {
            list-style: none;
            padding: 0;
            margin: 0;
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 10px;
        }

        .why-choose-us ul li {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }

        .why-choose-us i {
            margin-right: 10px;
            color: var(--primary-color);
        }

        /* --- Meet Our Team Section --- */
        .meet-our-team {
            background-color: var(--accent-bg);
        }

        .team-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
        }

        .team-card {
            text-align: center;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            background-color: var(--secondary-color);
            transition: transform 0.3s ease;
        }

        .team-card:hover {
            transform: translateY(-5px);
        }

        .team-card img {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 10px;
        }

        .team-card h3 {
            color: var(--text-dark);
            margin-bottom: 5px;
        }

        .team-card:hover h3 {
            color: var(--primary-color);
        }

        .team-card p {
            color: var(--text-mid);
            font-size: 0.9em;
        }

        .social-icons {
            margin-top: 10px;
        }

        .social-icons a {
            display: inline-block;
            margin: 0 5px;
            color: var(--primary-color);
        }

        /* --- Call to Action Section --- */
        .cta {
            background-color: var(--primary-color);
            color: var(--secondary-color);
            text-align: center;
            padding: 40px 0;
            /* Reduced padding */
        }

        .cta h2 {
            font-size: 2em;
            margin-bottom: 20px;
            color: var(--secondary-color);
        }

        .cta a {
            background-color: var(--secondary-color);
            color: var(--primary-color);
            padding: 12px 30px;
            border-radius: 5px;
            display: inline-block;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .cta a:hover {
            background-color: #e2e6ea;
        }

        /* --- Footer (Same as Listing Page) --- */
        .scizora-footer {
            background-color: #0d1d35;
            color: #adb5bd;
            padding: 60px 0 20px 0;
        }

        .footer-content {
            display: grid;
            grid-template-columns: 2fr 1fr 1fr 1fr;
            gap: 40px;
        }

        .footer-about .logo {
            color: var(--secondary-color);
        }

        .footer-about p {
            margin: 20px 0;
            font-size: 0.9rem;
            line-height: 1.7;
        }

        .footer-socials a {
            display: inline-block;
            margin-right: 15px;
        }

        .footer-socials svg {
            width: 24px;
            height: 24px;
            fill: #adb5bd;
            transition: fill 0.3s ease;
        }

        .footer-socials a:hover svg {
            fill: var(--secondary-color);
        }

        .footer-links h4 {
            color: var(--secondary-color);
            margin-bottom: 20px;
            font-size: 1.1rem;
        }

        .footer-links ul {
            list-style: none;
        }

        .footer-links li {
            margin-bottom: 12px;
        }

        .footer-links a {
            color: #adb5bd;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .footer-links a:hover {
            color: var(--secondary-color);
            padding-left: 5px;
        }

        .footer-bottom {
            text-align: center;
            margin-top: 50px;
            padding-top: 20px;
            border-top: 1px solid #2c3e50;
            font-size: 0.85rem;
        }

        /* --- Style 1: Seamless Outline --- */

        .input-group {
            display: flex;
            max-width: 450px;
            /* Adjust width as needed */
            width: 100%;
        }

        /* Visually-hidden class for accessible labels */
        .sr-only {
            position: absolute;
            width: 1px;
            height: 1px;
            padding: 0;
            margin: -1px;
            overflow: hidden;
            clip: rect(0, 0, 0, 0);
            white-space: nowrap;
            border-width: 0;
        }

        .input-group-field {
            /* Layout & Sizing */
            flex-grow: 1;
            width: 100%;
            padding: 12px 16px;
            font-size: 1rem;

            /* Appearance */
            background-color: #FFFFFF;
            color: #333333;
            /* Dark Gray text */
            border: 2px solid #ced4da;
            /* Mid-gray border */
            border-right: none;
            /* Remove right border to connect with button */
            border-radius: 8px 0 0 8px;
            /* Rounded left corners */

            /* Behavior */
            outline: none;
            transition: all 0.3s ease;
        }

        .input-group-field::placeholder {
            color: #999999;
        }

        /* Focus state for the input */
        .input-group:focus-within .input-group-field {
            border-color: #0A47A9;
            /* SCIZORA Primary Blue */
            box-shadow: 0 0 0 3px rgba(10, 71, 169, 0.2);
            z-index: 2;
            /* Bring input to the front on focus */
        }

        /* Base button styles for the group */
        .input-group .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 12px 18px;
            border-radius: 0 8px 8px 0;
            /* Rounded right corners */
            border: 2px solid transparent;
            cursor: pointer;
            transition: all 0.3s ease;
            flex-shrink: 0;
            /* Prevents button from shrinking */
        }

        .input-group .btn svg {
            width: 20px;
            height: 20px;
        }

        /* White button specific styles */
        .input-group .btn-white {
            background-color: #FFFFFF;
            color: #0A47A9;
            /* Blue icon */
            border-color: #ced4da;
        }

        /* Hover state for the button */
        .input-group .btn-white:hover {
            background-color: #0A47A9;
            border-color: #0A47A9;
            color: #FFFFFF;
            /* White icon */
            transform: scale(1.05);
            z-index: 3;
            /* Bring button to the front on hover */
        }

        /* Focus state for the whole group */
        .input-group:focus-within .btn-white {
            border-color: #0A47A9;
            z-index: 2;
        }

        /* --- Responsive Design --- */
        @media (max-width: 768px) {
            .container {
                padding: 0 15px;
            }

            section {
                padding: 30px 0;
            }

            nav ul {
                display: none;
                /* Hide nav on smaller screens. Use JS for a toggle if needed */
            }

            header .container {
                flex-direction: column;
                align-items: center;
            }

            .logo {
                margin-bottom: 10px;
            }

            .our-story .container {
                flex-direction: column;
            }

            .mvv-grid {
                grid-template-columns: 1fr;
            }

            .why-choose-us ul {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>

    <header>
        <div class="container">
            <a href="#" class="text-xl md:text-2xl font-bold"><img src="logo.jpg" alt="logo" width="150"
                    height="50"></a>
            <nav>
                <ul>
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li><a href="{{ route('categories') }}">Categories</a></li>
                    <li><a href="{{ route('blogs') }}">Blog</a></li>
                    <li><a href="{{ route('about.us') }}">About Us</a></li>
                    <li><a href="{{ route('contact') }}">Contact</a></li>
                </ul>
            </nav>
            <div class="profile-dropdown">
                <!-- This is the updated part -->
                <button>
                    <i class="fas fa-user-circle"></i>
                </button>
                <div class="dropdown-content">
                    <a href="User Pages\Dashboard seperate pages\My-Profile.html">My Profile</a>
                    <a href="Business Pages\notification.html">Notifications</a>
                    <a href="#">Logout</a>
                </div>
            </div>
        </div>
    </header>

    <section class="hero">
        <div class="container">
            <h1>About SCIZORA</h1>
            <p>Connecting science, pharma, and innovation with trusted solutions.</p>
        </div>
    </section>

    <section class="our-story">
        <div class="container">
            <div class="image-column fade-in">
                <img src="https://images.unsplash.com/photo-1579154204601-01588f351e67?auto=format&fit=crop&w=1200&q=80"
                    alt="Lab Team">
            </div>
            <div class="text-column fade-in">
                <h2>Our Story</h2>
                <p>SCIZORA was founded with a clear vision: to revolutionize the way pharmaceutical and scientific
                    organizations procure essential resources. We recognized the challenges faced by researchers,
                    scientists, and procurement specialists in accessing reliable suppliers and simplifying the complex
                    procurement process. </p>
                <p>Our journey began with a deep understanding of the industry's needs. We built a platform that offers
                    a streamlined and transparent experience, connecting buyers with a trusted network of suppliers.
                    SCIZORA is more than just a procurement platform; it's a catalyst for innovation, accelerating
                    scientific discovery and pharmaceutical advancements.</p>
            </div>
        </div>
    </section>

    <section class="mission-vision-values">
        <div class="container">
            <h2>Our Guiding Principles</h2>
            <div class="mvv-grid">
                <div class="card">
                    <i class="fas fa-rocket"></i>
                    <h3>Our Mission</h3>
                    <p>To empower scientific and pharmaceutical advancement by providing a seamless and trusted
                        procurement platform.</p>
                </div>
                <div class="card">
                    <i class="fas fa-eye"></i>
                    <h3>Our Vision</h3>
                    <p>To be the global leader in scientific and pharmaceutical procurement, driving efficiency and
                        innovation.</p>
                </div>
                <div class="card">
                    <i class="fas fa-handshake"></i>
                    <h3>Our Values</h3>
                    <p>Integrity, transparency, innovation, and customer-centricity are at the heart of everything we
                        do.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="why-choose-us">
        <div class="container">
            <h2>Why Choose SCIZORA?</h2>
            <ul>
                <li><i class="fas fa-check-circle"></i> Trusted Pharma Partnerships</li>
                <li><i class="fas fa-check-circle"></i> Scientific Integrity</li>
                <li><i class="fas fa-check-circle"></i> Wide Range of Categories</li>
                <li><i class="fas fa-check-circle"></i> Easy Procurement & Lead Generation</li>
                <li><i class="fas fa-check-circle"></i> Transparent Business Model</li>
                <li><i class="fas fa-check-circle"></i> Streamlined Workflow</li>
                <li><i class="fas fa-check-circle"></i> Competitive Pricing</li>
                <li><i class="fas fa-check-circle"></i> Dedicated Support</li>
            </ul>
        </div>
    </section>

    <section class="meet-our-team" id="team">
        <div class="container">
            <h2>Meet Our Leadership Team</h2>
            <div class="team-grid">
                <div class="team-card fade-in">
                    <img src="https://images.unsplash.com/photo-1580852300654-034f03567d13?auto=format&fit=crop&w=800&q=60"
                        alt="Dr. Aris Thorne">
                    <h3>Dr. Aris Thorne</h3>
                    <p class="designation">Founder & CEO</p>
                    <p class="intro">With 20+ years in pharma, Aris leads our mission to revolutionize the industry.
                    </p>
                    <div class="social-icons">
                        <a href="#"><i class="fab fa-linkedin"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                    </div>
                </div>
                <div class="team-card fade-in">
                    <img src="https://images.unsplash.com/photo-1556157382-97eda2d62296?auto=format&fit=crop&w=800&q=60"
                        alt="Kenna Sharma">
                    <h3>Kenna Sharma</h3>
                    <p class="designation">Chief Technology Officer</p>
                    <p class="intro">Kenna is the architectural mastermind behind our secure and scalable platform.</p>
                    <div class="social-icons">
                        <a href="#"><i class="fab fa-linkedin"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                    </div>
                </div>
                <div class="team-card fade-in">
                    <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?auto=format&fit=crop&w=800&q=60"
                        alt="Elena Rodriguez">
                    <h3>Elena Rodriguez</h3>
                    <p class="designation">Head of Partnerships</p>
                    <p class="intro">Elena builds and nurtures the strong relationships we have with our global
                        suppliers.</p>
                    <div class="social-icons">
                        <a href="#"><i class="fab fa-linkedin"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                    </div>
                </div>
                <div class="team-card fade-in">
                    <img src="https://images.unsplash.com/photo-1560250097-0b93528c311a?auto=format&fit=crop&w=800&q=60"
                        alt="David Chen">
                    <h3>David Chen</h3>
                    <p class="designation">Chief Operations Officer</p>
                    <p class="intro">David ensures operational excellence, making our platform seamless and efficient.
                    </p>
                    <div class="social-icons">
                        <a href="#"><i class="fab fa-linkedin"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="cta">
        <div class="container">
            <h2>Partner with SCIZORA to grow in Pharma & Life Sciences</h2>
            <a href="#">Get in Touch</a>
        </div>
    </section>

    
    <footer class="scizora-footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-about">
                    <a href="#" class="text-xl md:text-2xl font-bold"><img src="logo.jpg" alt="logo"
                            width="150" height="50"></a>
                    <p>SCIZORA is the leading procurement platform for the scientific and pharmaceutical industries,
                        connecting labs with trusted suppliers worldwide.</p>
                    <div class="footer-socials">
                        <a href="#" title="LinkedIn"><svg viewBox="0 0 24 24">
                                <path
                                    d="M21.1 2H2.9A.9.9 0 002 2.9v18.2c0 .5.4.9.9.9h18.2a.9.9 0 00.9-.9V2.9A.9.9 0 0021.1 2zM8.3 18.2H5.5V9.7h2.8v8.5zM6.9 8.3a1.5 1.5 0 110-3 1.5 1.5 0 010 3zm11.3 9.9h-2.8v-4.2c0-1 0-2.3-1.4-2.3s-1.6 1.1-1.6 2.2v4.3H9.7V9.7h2.7v1.2h.1c.4-.7 1.2-1.5 2.6-1.5 2.8 0 3.3 1.8 3.3 4.2v4.8z" />
                            </svg></a>
                        <a href="#" title="Twitter"><svg viewBox="0 0 24 24">
                                <path
                                    d="M22.46 6c-.77.35-1.6.58-2.46.67.88-.53 1.56-1.37 1.88-2.38-.83.5-1.75.85-2.72 1.05C18.37 4.5 17.26 4 16 4c-2.35 0-4.27 1.92-4.27 4.29 0 .34.04.67.11.98-3.56-.18-6.73-1.89-8.84-4.48-.37.63-.58 1.37-.58 2.15 0 1.49.75 2.81 1.91 3.56-.71 0-1.37-.22-1.95-.55v.05c0 2.08 1.48 3.82 3.44 4.21a4.22 4.22 0 0 1-1.94.07 4.28 4.28 0 0 0 4 2.98 8.52 8.52 0 0 1-5.33 1.84c-.34 0-.68-.02-1.01-.06A12.03 12.03 0 0 0 8.5 20c7.79 0 12.05-6.45 12.05-12.05 0-.18 0-.37-.01-.55.83-.6 1.56-1.35 2.14-2.22z" />
                            </svg></a>
                    </div>
                </div>
                <div class="footer-links">
                    <h4>Quick Links</h4>
                    <ul>
                        <li><a href="#"
                                class="text-gray-400 hover:text-white transition-all text-sm sm:text-base">Home</a>
                        </li>
                        <li><a href="categories.html"
                                class="text-gray-400 hover:text-white transition-all text-sm sm:text-base">Categories</a>
                        </li>

                        <li><a href="aboutus.html"
                                class="text-gray-400 hover:text-white transition-all text-sm sm:text-base">About Us</a>
                        </li>
                        <li><a href="contactus.html"
                                class="text-gray-400 hover:text-white transition-all text-sm sm:text-base">Contact
                                Us</a></li>
                    </ul>
                </div>

                <div class="footer-links">
                    <h4>Resources</h4>
                    <ul>
                        <li><a href="blog.html">Blog</a></li>
                        <li><a href="contactus.html">Help Center</a></li>
                        <li><a href="privacy.html">Privacy Policy</a></li>
                        <li><a href="terms.html">Terms of Service</a></li>
                    </ul>
                </div>
                <div class="footer-links">
                    <h4>Newsletter</h4>
                    <p class="text-gray-400 mb-3 md:mb-4 text-sm sm:text-base">Subscribe to our newsletter for the
                        latest updates and featured companies.</p>
                    <form class="input-group seamless-outline">
                        <label for="email-input-1" class="sr-only">Your email</label>
                        <input id="email-input-1" type="email" class="input-group-field"
                            placeholder="Enter your email..." required>
                        <button type="submit" class="btn btn-white" aria-label="Submit">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                aria-hidden="true">
                                <path
                                    d="M3.478 2.405a.75.75 0 00-.926.94l2.432 7.905H13.5a.75.75 0 010 1.5H4.984l-2.432 7.905a.75.75 0 00.926.94 60.519 60.519 0 0018.445-8.986.75.75 0 000-1.218A60.517 60.517 0 003.478 2.405z" />
                            </svg>
                        </button>
                    </form>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; 2025 SCIZORA. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script>
        // Scroll Animation
        const fadeInElements = document.querySelectorAll('.fade-in');

        const observer = new IntersectionObserver((entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('active');
                    observer.unobserve(entry.target); // Stop observing after animation
                }
            });
        }, {
            threshold: 0.2, // Trigger when 20% of the element is visible
        });

        fadeInElements.forEach((element) => {
            observer.observe(element);
        });
    </script>
</body>

</html>
