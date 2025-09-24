<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <title>Terms of Service - SCIZORA</title>
    <style>
        :root {
            --primary-color: #0A47A9;
            --secondary-color: #FFFFFF;
            --background-accent: #F8F9FA;
            --text-dark: #333333;
            --text-mid: #555555;
            --light-gray: #E9ECEF;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
            margin: 0;
            line-height: 1.6;
            color: var(--text-dark);
            background-color: var(--secondary-color);
        }

        .container {
            width: 90%;
            max-width: 1200px;
            margin: 0 auto;
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

        .header-right {
            display: flex;
            align-items: center;
            gap: 20px;
        }
        
        .hamburger {
            display: none;
            background: none;
            border: none;
            font-size: 1.8rem;
            cursor: pointer;
            color: var(--primary-color);
            z-index: 1002;
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
            display: none; 
            position: absolute;
            right: 0;
            background-color: #FFFFFF;
            min-width: 180px;
            box-shadow: 0 8px 16px rgba(0,0,0,0.1);
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


        /* Hero Section */
        .hero {
            background-color: var(--background-accent);
            padding: 2rem 0;
            text-align: center;
            background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23d3dce3' fill-opacity='0.4'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        }

        .hero h1 {
            font-size: 3rem;
            color: var(--primary-color);
            margin-bottom: 0.5rem;
        }

        .hero p {
            font-size: 1.2rem;
            color: var(--text-mid);
        }

        /* Main Content */
        .main-content {
            padding: 4rem 0;
        }

        .main-content .container {
            display: flex;
            gap: 2rem;
        }

        /* Sidebar */
        .sidebar {
            flex: 0 0 250px;
            position: sticky;
            top: 100px;
            height: calc(100vh - 120px);
            overflow-y: auto;
        }
        
        #toc-toggle {
            display: none;
            width: 100%;
            background-color: var(--primary-color);
            color: var(--secondary-color);
            padding: 1rem;
            border: none;
            font-size: 1.2rem;
            cursor: pointer;
            margin-bottom: 1rem;
            text-align: left;
        }

        #toc {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        #toc li a {
            display: block;
            padding: 0.75rem 1rem;
            text-decoration: none;
            color: var(--text-mid);
            border-left: 3px solid transparent;
            transition: all 0.3s ease;
        }

        #toc li a:hover, #toc li a.active {
            color: var(--primary-color);
            background-color: var(--background-accent);
            border-left-color: var(--primary-color);
            font-weight: 500;
        }

        /* Content Area */
        .content-area {
            flex: 1;
        }

        .content-area section {
            margin-bottom: 3rem;
            scroll-margin-top: 80px; 
        }

        .content-area h2 {
            font-size: 2rem;
            color: var(--primary-color);
            border-bottom: 2px solid var(--light-gray);
            padding-bottom: 0.5rem;
            margin-bottom: 1.5rem;
        }

        .content-area h3 {
            font-size: 1.5rem;
            color: var(--text-dark);
            margin-top: 2rem;
            margin-bottom: 1rem;
        }

        .content-area p {
            color: var(--text-mid);
            margin-bottom: 1rem;
        }
        
        .content-area ul {
            padding-left: 20px;
        }
        
        .content-area ul li {
            margin-bottom: 0.5rem;
        }

        /* CTA Banner */
        .cta-banner {
            background-color: var(--primary-color);
            color: var(--secondary-color);
            padding: 3rem 0;
            text-align: center;
        }

        .cta-banner h2 {
            margin-top: 0;
            font-size: 1.8rem;
        }

        .cta-button {
            background-color: var(--secondary-color);
            color: var(--primary-color);
            padding: 0.8rem 2rem;
            text-decoration: none;
            font-weight: bold;
            border-radius: 5px;
            transition: all 0.3s ease;
            border: 2px solid var(--secondary-color);
            display: inline-block;
            margin-top: 1rem;
        }

        .cta-button:hover {
            background-color: var(--primary-color);
            color: var(--secondary-color);
        }

        /* Main Footer Container */
        .scizora-main-footer {
            background-color: #111827;
            color: #ffffff;
            padding: 2rem 1rem 1.5rem 1rem;
        }

        .scizora-footer-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 1.5rem;
            margin-bottom: 1.5rem;
        }

        .scizora-footer-column > * {
            margin-bottom: 0.5rem;
        }
        .scizora-footer-column > *:last-child {
            margin-bottom: 0;
        }

        .scizora-footer-heading, .scizora-footer-logo-heading {
            font-size: 1.1rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
        }

        .scizora-footer-description {
            color: #9CA3AF;
            font-size: 0.875rem;
            line-height: 1.4;
        }

        .scizora-footer-list {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            flex-direction: column;
            gap: 0.2rem;
        }

        .scizora-footer-bottom {
            border-top: 1px solid #374151;
            padding-top: 1rem;
            margin-top: 1.5rem;
            text-align: center;
            color: #9CA3AF;
            font-size: 0.8rem;
        }

        .scizora-social-links { display: flex; gap: 1rem; }
        .scizora-social-icon { color: #9CA3AF; transition: color 0.2s ease; }
        .scizora-social-icon:hover { color: #ffffff; }
        .scizora-footer-link { color: #9CA3AF; text-decoration: none; font-size: 0.875rem; }
        .scizora-footer-link:hover { color: #ffffff; }
        .scizora-newsletter-form { display: flex; }
        .scizora-newsletter-input { background-color: #1F2937; color: #ffffff; padding: 6px 12px; border: none; border-radius: 4px 0 0 4px; outline: none; width: 100%; font-size: 0.875rem; }
        .scizora-newsletter-button { background-color: #2563EB; color: #ffffff; padding: 6px 12px; border: none; border-radius: 0 4px 4px 0; cursor: pointer; }
        .scizora-newsletter-button:hover { background-color: #1D4ED8; }


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
        #back-to-top {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background-color: var(--primary-color);
            color: var(--secondary-color);
            width: 50px;
            height: 50px;
            text-align: center;
            line-height: 50px;
            font-size: 24px;
            border-radius: 50%;
            display: none;
            cursor: pointer;
            transition: opacity 0.3s, visibility 0.3s;
            z-index: 100;
        }

        #back-to-top.show {
            display: block;
        }

        /* Responsive Styles */
        @media (max-width: 992px) {
            .main-content .container {
                flex-direction: column;
            }

            .sidebar {
                position: static;
                height: auto;
                overflow-y: visible;
                margin-bottom: 2rem;
            }
        }
        
        @media (max-width: 768px) {
            .nav-menu {
                position: fixed;
                left: -100%;
                top: 0;
                flex-direction: column;
                background-color: var(--secondary-color);
                width: 80%;
                max-width: 300px;
                height: 100vh;
                text-align: left;
                transition: 0.3s;
                box-shadow: 2px 0 5px rgba(0,0,0,0.1);
                padding-top: 60px;
                z-index: 1001;
            }

            .nav-menu.active {
                left: 0;
            }

            .nav-menu a {
                margin: 1rem 1.5rem;
                display: block;
            }
            
            .hamburger {
                display: block;
            }

            header .nav-menu {
                display: none;
            }

            header nav.nav-menu {
                display: flex;
            }

             #toc-toggle {
                display: block;
             }
             
             #toc {
                display: none;
                flex-direction: column;
             }
             
             #toc.active {
                display: flex;
             }

            .hero h1 {
                font-size: 2.2rem;
            }
        }

    </style>
    @include('home.styles')
</head>
<body>

    <!-- Header -->
   @include('home.header')

    <section class="hero">
        <div class="container">
            <h1>Terms of Service</h1>
            <p>Please read our Terms of Service carefully before using SCIZORA.</p>
        </div>
    </section>

    <main class="main-content">
        <div class="container">
            <aside class="sidebar">
                <button id="toc-toggle">Table of Contents &#9662;</button>
                <ul id="toc">
                    <li><a href="#introduction" class="active">Introduction</a></li>
                    <li><a href="#eligibility">Eligibility</a></li>
                    <li><a href="#user-responsibilities">User Responsibilities</a></li>
                    <li><a href="#account-security">Account & Security</a></li>
                    <li><a href="#services-provided">Services Provided</a></li>
                    <li><a href="#intellectual-property">Intellectual Property</a></li>
                    <li><a href="#privacy-policy">Privacy Policy</a></li>
                    <li><a href="#payments-transactions">Payments & Transactions</a></li>
                    <li><a href="#prohibited-activities">Prohibited Activities</a></li>
                    <li><a href="#limitation-of-liability">Limitation of Liability</a></li>
                    <li><a href="#termination">Termination of Account</a></li>
                    <li><a href="#governing-law">Governing Law</a></li>
                    <li><a href="#contact">Contact Information</a></li>
                </ul>
            </aside>
            <div class="content-area">
                <section id="introduction">
                    <h2>1. Introduction</h2>
                    <p>Welcome to SCIZORA. These Terms of Service ("Terms") govern your use of the SCIZORA website, applications, and services (collectively, the "Services"). By accessing or using our Services, you agree to be bound by these Terms and our Privacy Policy. If you do not agree to these Terms, you may not use our Services.</p>
                    <p>SCIZORA provides a procurement platform for pharmaceutical and scientific products, connecting buyers and sellers in a regulated and efficient marketplace. These terms outline the rules and expectations for all users of the platform to ensure a safe, fair, and reliable environment for all participants.</p>
                    <p>We may amend these Terms at any time by posting the amended terms on our site. We may or may not post notices on the homepage when such changes occur. We refer to this agreement, our Privacy Policy accessible, and any other terms, rules, or guidelines on our Website collectively as our "Legal Terms."</p>
                </section>

                <section id="eligibility">
                    <h2>2. Eligibility</h2>
                    <p>To use our Services, you must be at least 18 years old and capable of forming a binding contract. You must also be a professional in the pharmaceutical or scientific research field, or an authorized representative of a qualified institution. By creating an account, you represent and warrant that you meet these eligibility requirements.</p>
                    <p>SCIZORA reserves the right to refuse service to anyone for any reason at any time. We may, in our sole discretion, refuse to offer the Services to any person or entity and change its eligibility criteria at any time. This provision is void where prohibited by law and the right to access the Service is revoked in such jurisdictions.</p>
                    <p>You are solely responsible for ensuring that your use of the Services is in compliance with all laws, rules, and regulations applicable to you. If your use of the Services is prohibited by any applicable laws, then you aren't authorized to use the Services.</p>
                </section>

                 <section id="user-responsibilities">
                    <h2>3. User Responsibilities</h2>
                    <p>As a user of SCIZORA, you agree to provide accurate, current, and complete information during the registration process and to update such information to keep it accurate, current, and complete. You are responsible for all activities that occur under your account.</p>
                    <h3>Compliance with Laws</h3>
                    <p>You agree to comply with all applicable local, state, national, and international laws and regulations regarding your use of our Services, including those related to data privacy, international communications, and the transmission of technical or personal data.</p>
                    <h3>Professional Conduct</h3>
                    <p>You must conduct yourself in a professional manner. Any form of harassment, abuse, or discrimination towards other users or SCIZORA staff is strictly prohibited and may result in immediate account termination. You are expected to communicate respectfully and transact with integrity.</p>
                </section>

                <section id="account-security">
                    <h2>4. Account & Security</h2>
                    <p>You are responsible for safeguarding your password and for any activities or actions under your account. SCIZORA cannot and will not be liable for any loss or damage arising from your failure to comply with this security obligation. We encourage you to use a "strong" password (passwords that use a combination of upper and lower case letters, numbers, and symbols) with your account.</p>
                    <p>You must notify SCIZORA immediately upon becoming aware of any breach of security or unauthorized use of your account. Do not share your account credentials with anyone else. Each account is for a single user or entity, and you are not permitted to allow any other person to use your account.</p>
                </section>
                
                <section id="services-provided">
                    <h2>5. Services Provided</h2>
                    <p>SCIZORA provides an online platform that connects buyers and sellers of pharmaceutical and scientific products. Our services include, but are not limited to, product listings, search functionalities, order management, and secure communication tools. We facilitate transactions but are not a party to any agreement between a buyer and a seller.</p>
                    <p>We strive to maintain the highest standards of quality and reliability. However, we do not guarantee the quality, safety, or legality of the items advertised, the truth or accuracy of the listings, the ability of sellers to sell items, or the ability of buyers to pay for items. All transactions are at your own risk.</p>
                    <p>SCIZORA may, without prior notice, change the Services; stop providing the Services or features of the Services, to you or to users generally; or create usage limits for the Services.</p>
                </section>
                
                <section id="intellectual-property">
                    <h2>6. Intellectual Property</h2>
                    <p>All content included on the SCIZORA platform, such as text, graphics, logos, images, as well as the compilation thereof, and any software used on the site, is the property of SCIZORA or its suppliers and protected by copyright and other laws that protect intellectual property and proprietary rights. You agree to observe and abide by all copyright and other proprietary notices.</p>
                    <p>You are granted a non-exclusive, non-transferable, revocable license to access and use SCIZORA strictly in accordance with these terms of use. As a condition of your use of the Site, you warrant to SCIZORA that you will not use the Site for any purpose that is unlawful or prohibited by these Terms.</p>
                    <p><b>Your Content:</b> By submitting content to our platform, you grant SCIZORA a worldwide, non-exclusive, royalty-free license to use, copy, reproduce, process, adapt, modify, publish, transmit, display, and distribute such content in any and all media or distribution methods.</p>
                </section>
                
                <section id="privacy-policy">
                    <h2>7. Privacy Policy</h2>
                    <p>Our Privacy Policy describes how we handle the information you provide to us when you use our Services. You understand that through your use of the Services you consent to the collection and use (as set forth in the Privacy Policy) of this information, including the transfer of this information for storage, processing, and use by SCIZORA and its affiliates.</p>
                    <p>We are committed to protecting your personal information and your right to privacy. If you have any questions or concerns about our policy, or our practices with regards to your personal information, please contact us.</p>
                </section>
                
                <section id="payments-transactions">
                    <h2>8. Payments & Transactions</h2>
                    <p>SCIZORA facilitates payments between buyers and sellers through integrated third-party payment processors. By conducting transactions on the platform, you agree to abide by the terms and conditions of our payment partners. SCIZORA is not responsible for any issues arising from the payment process.</p>
                    <p>Buyers are obligated to complete the payment for items purchased. Sellers are obligated to deliver the items for which payment has been received. All financial information is stored and processed securely by our third-party payment processors.</p>
                    <ul>
                        <li><b>Fees:</b> SCIZORA may charge fees for certain services. Any applicable fees will be clearly disclosed to you prior to you incurring the charge.</li>
                        <li><b>Taxes:</b> You are responsible for paying all fees and applicable taxes associated with your use of our Services.</li>
                        <li><b>Disputes:</b> Any disputes regarding payments or transactions should first be addressed between the buyer and seller. SCIZORA may provide mediation services but is not obligated to resolve disputes.</li>
                    </ul>
                </section>
                
                <section id="prohibited-activities">
                    <h2>9. Prohibited Activities</h2>
                    <p>You agree not to engage in any of the following prohibited activities:</p>
                    <ul>
                        <li>Violating any laws, third-party rights, or our policies.</li>
                        <li>Using our Services if you are not able to form legally binding contracts, are under the age of 18, or are temporarily or indefinitely suspended from using our sites, services, applications, or tools.</li>
                        <li>Posting false, inaccurate, misleading, defamatory, or libelous content.</li>
                        <li>Distributing or posting spam, unsolicited or bulk electronic communications, chain letters, or pyramid schemes.</li>
                        <li>Using any robot, spider, scraper, or other automated means to access our Services for any purpose without our express written permission.</li>
                    </ul>
                </section>

                <section id="limitation-of-liability">
                    <h2>10. Limitation of Liability</h2>
                    <p>To the maximum extent permitted by applicable law, in no event shall SCIZORA, its affiliates, agents, directors, employees, suppliers or licensors be liable for any indirect, punitive, incidental, special, consequential or exemplary damages, including without limitation damages for loss of profits, goodwill, use, data or other intangible losses, arising out of or relating to the use of, or inability to use, this service.</p>
                    <p>SCIZORA assumes no liability or responsibility for any (i) errors, mistakes, or inaccuracies of content; (ii) personal injury or property damage, of any nature whatsoever, resulting from your access to or use of our service; and (iii) any unauthorized access to or use of our secure servers and/or any and all personal information stored therein.</p>
                </section>

                <section id="termination">
                    <h2>11. Termination of Account</h2>
                    <p>We may terminate or suspend your account and bar access to the Services immediately, without prior notice or liability, under our sole discretion, for any reason whatsoever and without limitation, including but not limited to a breach of the Terms.</p>
                    <p>If you wish to terminate your account, you may simply discontinue using the Services. All provisions of the Terms which by their nature should survive termination shall survive termination, including, without limitation, ownership provisions, warranty disclaimers, indemnity and limitations of liability.</p>
                </section>

                <section id="governing-law">
                    <h2>12. Governing Law</h2>
                    <p>These Terms shall be governed and construed in accordance with the laws of the jurisdiction in which our company is established, without regard to its conflict of law provisions. Our failure to enforce any right or provision of these Terms will not be considered a waiver of those rights.</p>
                </section>

                <section id="contact">
                    <h2>13. Contact Information</h2>
                    <p>If you have any questions about these Terms, please contact us at:</p>
                    <p><strong>SCIZORA Inc.</strong><br>
                    123 Science Avenue,<br>
                    Innovation City, 12345<br>
                    Email: support@scizora.com</p>
                </section>

            </div>
        </div>
    </main>

    <section class="cta-banner">
        <div class="container">
            <h2>By using SCIZORA, you agree to these Terms of Service. For questions, contact us.</h2>
            <a href="#" class="cta-button">Contact Support</a>
        </div>
    </section>

    @include('home.footer')

    <a id="back-to-top" title="Back to Top">&#8679;</a>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // All interactive elements
            const tocLinks = document.querySelectorAll('#toc a');
            const sections = document.querySelectorAll('.content-area section');
            const backToTopButton = document.getElementById('back-to-top');
            const tocToggle = document.getElementById('toc-toggle');
            const toc = document.getElementById('toc');
            const profileIcon = document.getElementById('profileIcon');
            const dropdownContent = document.getElementById('dropdownContent');
            const hamburger = document.getElementById('hamburger');
            const navMenu = document.getElementById('nav-menu');

            // --- Hamburger Menu Logic ---
            hamburger.addEventListener('click', () => {
                navMenu.classList.toggle('active');
                const icon = hamburger.querySelector('i');
                if (navMenu.classList.contains('active')) {
                    icon.classList.remove('fa-bars');
                    icon.classList.add('fa-times');
                } else {
                    icon.classList.remove('fa-times');
                    icon.classList.add('fa-bars');
                }
            });

            // --- Profile Dropdown Logic ---
            profileIcon.addEventListener('click', function (event) {
                event.stopPropagation();
                dropdownContent.classList.toggle('show');
            });

            // Close dropdown if clicked outside
            window.addEventListener('click', function (event) {
                if (!profileIcon.contains(event.target) && !dropdownContent.contains(event.target)) {
                    if (dropdownContent.classList.contains('show')) {
                        dropdownContent.classList.remove('show');
                    }
                }
            });

            // --- Table of Contents Logic ---
            tocLinks.forEach(link => {
                link.addEventListener('click', function (e) {
                    e.preventDefault();
                    document.querySelector(this.getAttribute('href')).scrollIntoView({
                        behavior: 'smooth'
                    });
                    
                    if (window.innerWidth <= 768 && toc.classList.contains('active')) {
                        toc.classList.remove('active');
                    }
                });
            });

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        tocLinks.forEach(link => {
                            link.classList.remove('active');
                            if (`#${entry.target.id}` === link.getAttribute('href')) {
                                link.classList.add('active');
                            }
                        });
                    }
                });
            }, { rootMargin: '-30% 0px -70% 0px' });

            sections.forEach(section => {
                observer.observe(section);
            });

            tocToggle.addEventListener('click', () => {
                toc.classList.toggle('active');
            });


            // --- Back to Top Button Logic ---
            window.addEventListener('scroll', () => {
                if (window.pageYOffset > 300) {
                    backToTopButton.classList.add('show');
                } else {
                    backToTopButton.classList.remove('show');
                }
            });

            backToTopButton.addEventListener('click', () => {
                window.scrollTo({ top: 0, behavior: 'smooth' });
            });
        });
    </script>
</body>
</html>