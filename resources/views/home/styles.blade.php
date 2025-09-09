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
</style>