<style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');

    body {
        font-family: 'Inter', sans-serif;
        scroll-behavior: smooth;
    }

    .hero-bg {
        background-image: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80');
        background-size: cover;
        background-position: center;
    }

    .mobile-mockup {
        background-image: url('https://images.unsplash.com/photo-1555774698-0b77e0d5fac6?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80');
        background-size: cover;
        background-position: center;
    }

    .transition-all {
        transition: all 0.3s ease;
    }

    /* Custom styles for new features */
    .categories-container {
        transition: height 0.3s ease;
        overflow: hidden;
    }

    .scrollable-companies {
        scroll-behavior: smooth;
        -webkit-overflow-scrolling: touch;
    }

    .scrollable-companies::-webkit-scrollbar {
        display: none;
    }

    .grayscale {
        filter: grayscale(100%);
    }
 
    .grayscale:hover {
        filter: grayscale(0%);
    }

    /* Custom purple accent styles */
    .btn-primary {
        background-color: #1544da;
        color: white;
    }

    .btn-primary:hover {
        background-color: #1124aa;
    }

    .text-accent {
        color: #1544da;
    }

    .border-accent {
        border-color: #1544da;
    }

    .bg-accent {
        background-color: #1544da;
    }

    /* Added mobile-specific styles */
    @media (max-width: 767px) {

        /* Adjust hero section padding and font sizes */
        .hero-section {
            padding-top: 6rem;
            padding-bottom: 6rem;
        }

        /* Make search input more mobile-friendly */
        .search-input {
            padding: 0.75rem 1rem;
            font-size: 0.9rem;
        }

        /* Adjust category grid for mobile */
        .category-grid {
            grid-template-columns: repeat(2, 1fr);
            gap: 0.75rem;
        }

        /* Make company cards take full width on mobile */
        .company-card {
            width: 85%;
            min-width: 85%;
        }

        /* Adjust review grid for mobile */
        .review-grid {
            grid-template-columns: 1fr;
        }

        /* Make mobile mockup smaller on small screens */
        .mobile-mockup {
            width: 80%;
            height: 20rem;
        }

        /* Adjust footer layout for mobile */
        .footer-grid {
            grid-template-columns: 1fr;
            gap: 2rem;
        }

        /* Make newsletter input full width */
        .newsletter-input {
            width: 100%;
        }

        /* Adjust article grid for mobile */
        .article-grid {
            grid-template-columns: 1fr;
        }

        /* Adjust trusted logos for mobile */
        .trusted-logos {
            justify-content: center;
            gap: 1rem;
        }
    }

    /* Added tablet-specific styles */
    @media (min-width: 768px) and (max-width: 1023px) {

        /* Adjust category grid for tablets */
        .category-grid {
            grid-template-columns: repeat(3, 1fr);
        }

        /* Make company cards slightly wider on tablets */
        .company-card {
            width: 45%;
            min-width: 45%;
        }

        /* Adjust review grid for tablets */
        .review-grid {
            grid-template-columns: repeat(2, 1fr);
        }

        /* Adjust article grid for tablets */
        .article-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    /* Custom scrollbar for the articles container */
    .custom-scrollbar::-webkit-scrollbar {
        width: 8px;
    }

    .custom-scrollbar::-webkit-scrollbar-track {
        background: #f1f5f9;
        /* gray-100 */
        border-radius: 10px;
    }

    .custom-scrollbar::-webkit-scrollbar-thumb {
        background: #cbd5e1;
        /* gray-300 */
        border-radius: 10px;
    }

    .custom-scrollbar::-webkit-scrollbar-thumb:hover {
        background: #94a3b8;
        /* gray-400 */
    }

    /* Styles for Popup Review Form */
    #review-popup.active {
        display: flex;
    }

    #review-popup.active>div {
        transform: scale(1);
        opacity: 1;
    }

    /* Star Rating Styles */
    .star.selected,
    .star:hover,
    .star:hover~.star {
        color: #f59e0b;
        /* Tailwind yellow-500 */
    }
    /* Main Footer Container */
    .scizora-main-footer {
            background-color: #ffffff;
            color: #111827;
            padding: 2rem 0;
            width: 100%;
        }

        .scizora-footer-inner-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 1rem;
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
            color: #111827;
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
            color: #0000FF;
            font-size: 0.8rem;
        }

        .scizora-social-links { display: flex; gap: 1rem; }
        .scizora-social-icon { color: #0000FF; transition: color 0.2s ease; }
        .scizora-social-icon:hover { color: #111827; }
        .scizora-footer-link { color: #0000FF; text-decoration: none; font-size: 0.875rem; }
        .scizora-footer-link:hover { color: #111827; }
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
        body {
      margin: 0;
      padding: 0;
    }
	
    .scizora-header {
      width: 100%;
      background: #fff;
      border-bottom: 1px solid #e5e5e5;
      position: relative;
      z-index: 1000;
      font-family: 'Inter', sans-serif;
    }

    .scizora-header-container {
      margin: 0 auto;
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 8px 12px;
    }

    .scizora-logo img {
      max-height: 50px;
      width: auto;
      height: auto;
    }

    .scizora-nav {
      display: flex;
      gap: 28px;
      align-items: center;
    }

    .scizora-nav a {
      text-decoration: none;
      color: #333;
      font-size: 18px;
      transition: color 0.3s;
    }

    .scizora-nav a:hover {
      color: #0d47ff;
    }

    .scizora-buttons {
      display: flex;
      gap: 10px;
    }

    .scizora-btn {
      background: #0d47ff;
      color: #fff;
      padding: 10px 20px;
      border-radius: 25px;
      text-decoration: none;
      font-size: 17px;
      font-weight: 500;
      transition: background 0.3s;
    }

    .scizora-btn:hover {
      background: #0b3cd1;
    }

    /* ===== Mobile Menu Toggle ===== */
    .scizora-menu-toggle {
      display: none;
      flex-direction: column;
      cursor: pointer;
      gap: 5px;
      position: relative;
      width: 30px;
      height: 22px;
      justify-content: center;
    }

    .scizora-menu-toggle span {
      width: 100%;
      height: 3px;
      background: #333;
      border-radius: 2px;
      transition: all 0.3s ease;
    }

    /* Transform into X when active */
    .scizora-menu-toggle.active span:nth-child(1) {
      transform: rotate(45deg) translate(5px, 5px);
    }
    .scizora-menu-toggle.active span:nth-child(2) {
      opacity: 0;
    }
    .scizora-menu-toggle.active span:nth-child(3) {
      transform: rotate(-45deg) translate(6px, -6px);
    }

    /* ===== Mobile Navigation ===== */
    .scizora-mobile-nav {
      display: none;
      flex-direction: column;
      background: #fff;
      padding: 15px;
    }

    .scizora-mobile-nav a {
      text-decoration: none;
      color: black;
      padding: 12px 0;
      font-size: 17px;
      border-bottom: 1px solid #e5e5e5;
      transition: color 0.3s;
    }

    .scizora-mobile-nav a:hover {
      color: #1a0dab;
    }
    
    .scizora-mobile-nav a.scizora-btn {
        border-bottom: none;
    }

    .scizora-mobile-nav .scizora-btn {
      display: block;
      text-align: center;
      margin-top: 15px;
      border-radius: 28px;
      font-size: 16px;
      padding: 10px 24px;
      background: #1a0dab;
      color: white;
      transition: background 0.3s; 
    }
    
    /* RULE FOR HOVER EFFECT */
    .scizora-mobile-nav .scizora-btn:hover {
      background: #160b8a; /* Darker blue on hover */
      color: #fff;
    }

    /* ===== Responsive ===== */
    @media screen and (max-width: 768px) {
      .scizora-nav,
      .scizora-buttons {
        display: none;
      }

      .scizora-menu-toggle {
        display: flex;
      }

      .scizora-mobile-nav.active {
        display: flex;
      }
    }
</style>