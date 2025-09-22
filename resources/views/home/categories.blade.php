<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Explore Categories - SCIZORA</title>

    <!-- Google Fonts: Poppins -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <style>
        /* ------------------------- */
        /* ---  1. GLOBAL STYLES & VARIABLES --- */
        /* ------------------------- */
        :root {
            --primary-color: #0A47A9;
            --secondary-color: #FFFFFF;
            --accent-bg-color: #F8F9FA;
            --text-dark-color: #333333;
            --text-mid-color: #555555;
            --shadow-color: rgba(0, 0, 0, 0.08);
            --shadow-hover-color: rgba(10, 71, 169, 0.2);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--secondary-color);
            color: var(--text-dark-color);
            line-height: 1.6;
            overflow-x: hidden; /* Prevents horizontal scrollbar */
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        a {
            text-decoration: none;
            color: var(--primary-color);
        }

        img {
            max-width: 100%;
            height: auto; /* Ensures images scale proportionally */
        }
        
        /* ------------------------- */
        /* ---  2. HEADER & NAVIGATION --- */
        /* ------------------------- */
        .site-header {
            background-color: var(--secondary-color);
            padding: 15px 0;
            border-bottom: 1px solid #e0e0e0;
            position: sticky;
            top: 0;
            z-index: 1000;
            box-shadow: 0 2px 10px var(--shadow-color);
        }
        
        .site-header .container {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo img {
            max-height: 35px; /* Control logo height */
            width: auto;
        }

        .main-nav {
            display: flex;
            gap: 25px;
        }

        .main-nav a {
            color: var(--text-mid-color);
            font-weight: 500;
            padding: 5px 0;
            position: relative;
            transition: color 0.3s ease;
        }
        
        .main-nav a:hover, .main-nav a.active {
            color: var(--primary-color);
        }
        
        .main-nav a::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0;
            height: 2px;
            background-color: var(--primary-color);
            transition: width 0.3s ease;
        }
        
        .main-nav a:hover::after, .main-nav a.active::after {
            width: 100%;
        }

        .header-actions {
            display: flex;
            align-items: center;
            gap: 15px; /* Add gap for spacing */
        }
        
        .profile-dropdown {
            position: relative;
        }
        
        .profile-btn {
            background: none;
            border: none;
            cursor: pointer;
            font-size: 1.5rem;
            color: var(--text-mid-color);
        }
        
        .dropdown-content {
            display: none;
            position: absolute;
            right: 0;
            top: 150%;
            background-color: var(--secondary-color);
            min-width: 160px;
            box-shadow: 0 8px 16px var(--shadow-color);
            border-radius: 8px;
            overflow: hidden;
            z-index: 1;
        }
        
        .dropdown-content a {
            color: var(--text-dark-color);
            padding: 12px 16px;
            display: block;
            transition: background-color 0.2s ease;
        }
        
        .dropdown-content a:hover {
            background-color: var(--accent-bg-color);
        }
        
        .profile-dropdown.active .dropdown-content {
            display: block;
        }

        .mobile-toggle {
            display: none;
            font-size: 1.5rem;
            cursor: pointer;
            border: none;
            background: none;
            color: var(--text-dark-color);
        }

        /* ------------------------- */
        /* ---  3. HERO SECTION --- */
        /* ------------------------- */
        .hero-section {
            background-color: var(--accent-bg-color);
            text-align: center;
            padding: 60px 20px; /* Reduced padding for mobile */
        }

        .hero-section h1 {
            font-size: 2.8rem;
            color: var(--primary-color);
            margin-bottom: 10px;
        }

        .hero-section p {
            font-size: 1.1rem;
            color: var(--text-mid-color);
            max-width: 600px;
            margin: 0 auto 30px auto;
        }

        .search-bar {
            position: relative;
            max-width: 700px;
            margin: 0 auto;
        }

        .search-bar input {
            width: 100%;
            padding: 15px 50px 15px 20px;
            font-size: 1rem;
            border: 1px solid #ddd;
            border-radius: 50px;
            outline: none;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }
        
        .search-bar input:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(10, 71, 169, 0.1);
        }

        .search-bar .fa-search {
            position: absolute;
            top: 50%;
            right: 20px;
            transform: translateY(-50%);
            color: var(--text-mid-color);
        }

        /* ------------------------- */
        /* ---  4. CATEGORIES SECTION --- */
        /* ------------------------- */
        .categories-section {
            padding: 60px 0;
        }
        
        .filter-sort-controls {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 20px;
            margin-bottom: 40px;
        }

        .filter-tags {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        .filter-tags button {
            background-color: #e9ecef;
            border: none;
            padding: 8px 15px;
            border-radius: 20px;
            font-size: 0.9rem;
            font-weight: 500;
            color: var(--text-mid-color);
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .filter-tags button:hover {
            background-color: #d8dde2;
        }

        .filter-tags button.active {
            background-color: var(--primary-color);
            color: var(--secondary-color);
        }
        
        .sort-options select {
            padding: 8px 12px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-family: 'Poppins', sans-serif;
            font-size: 0.9rem;
            background-color: var(--secondary-color);
            width: 200px; /* Give a default width */
        }
        
        .category-grid {
            display: grid;
            /* Switched to a more robust responsive grid layout */
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 30px;
        }

        .category-card {
            background-color: var(--secondary-color);
            border-radius: 12px;
            box-shadow: 0 4px 15px var(--shadow-color);
            text-align: center;
            padding: 30px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            cursor: pointer;
        }

        .category-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 8px 30px var(--shadow-hover-color);
        }

        .card-icon {
            font-size: 3rem;
            color: var(--primary-color);
            margin-bottom: 20px;
        }

        .card-title {
            font-size: 1.25rem;
            font-weight: 600;
            margin-bottom: 10px;
            color: var(--text-dark-color);
        }

        .card-description {
            font-size: 0.9rem;
            color: var(--text-mid-color);
            margin-bottom: 25px;
            flex-grow: 1;
        }

        .card-button {
            background-color: var(--primary-color);
            color: var(--secondary-color);
            padding: 10px 20px;
            border-radius: 50px;
            font-weight: 500;
            display: inline-block;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .category-card:hover .card-button {
            background-color: #083a8b;
            transform: scale(1.05);
        }

        /* ------------------------- */
        /* ---  5. CTA BANNER --- */
        /* ------------------------- */
        .cta-banner {
            background-color: var(--primary-color);
            color: var(--secondary-color);
            padding: 50px 0;
            margin: 40px 0;
        }
        
        .cta-banner .container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 20px;
        }
       
        .cta-banner h2 {
            font-size: 1.8rem;
            font-weight: 600;
            flex-grow: 1; /* Allow text to take available space */
        }
        
        .cta-button {
            background-color: var(--secondary-color);
            color: var(--primary-color);
            padding: 12px 25px;
            border-radius: 50px;
            font-weight: 600;
            transition: all 0.3s ease;
            flex-shrink: 0; /* Prevent button from shrinking */
        }

        .cta-button:hover {
            background-color: var(--accent-bg-color);
            transform: scale(1.05);
        }
        
        /* ======================= FOOTER STYLES ======================= */
        .scizora-main-footer {
            background-color: #111827;
            color: #ffffff;
            padding: 4rem 1rem;
        }

        .scizora-footer-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 2.5rem;
        }

        .scizora-footer-column > *:not(:last-child) {
            margin-bottom: 1rem;
        }

        .scizora-footer-heading, .scizora-footer-logo-heading {
            font-size: 1.1rem;
            font-weight: 700;
            margin-bottom: 1rem;
        }
        
        .scizora-footer-logo-heading img {
           max-width: 150px; /* Control logo size in footer */
        }

        .scizora-footer-description {
            color: #9CA3AF;
            font-size: 0.875rem;
            line-height: 1.5;
        }

        .scizora-footer-list {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
        }

        .scizora-footer-bottom {
            border-top: 1px solid #374151;
            padding-top: 2rem;
            margin-top: 2rem;
            text-align: center;
            color: #9CA3AF;
            font-size: 0.8rem;
        }

        .scizora-social-links { display: flex; gap: 1rem; }
        .scizora-social-icon { color: #9CA3AF; font-size: 1.2rem; transition: color 0.2s ease; }
        .scizora-social-icon:hover { color: #ffffff; }
        .scizora-footer-link { color: #9CA3AF; text-decoration: none; font-size: 0.875rem; transition: color 0.2s ease; }
        .scizora-footer-link:hover { color: #ffffff; }
        
        .scizora-newsletter-form { display: flex; max-width: 100%; }
        .scizora-newsletter-input { 
            background-color: #1F2937; 
            color: #ffffff; 
            padding: 8px 12px; 
            border: 1px solid #374151; 
            border-radius: 4px 0 0 4px; 
            outline: none; 
            width: 100%; 
            font-size: 0.875rem; 
        }
        .scizora-newsletter-button { 
            background-color: #2563EB; 
            color: #ffffff; 
            padding: 8px 12px; 
            border: none; 
            border-radius: 0 4px 4px 0; 
            cursor: pointer; 
            transition: background-color 0.2s ease;
        }
        .scizora-newsletter-button:hover { background-color: #1D4ED8; }

        /* ------------------------- */
        /* ---  7. RESPONSIVENESS --- */
        /* ------------------------- */
        
        /* Tablets and Laptops (up to 1024px) */
        @media (min-width: 768px) {
            .scizora-footer-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }
        @media (min-width: 1024px) {
            .scizora-footer-grid {
                grid-template-columns: repeat(4, 1fr);
            }
        }
        
        /* Tablets and below (up to 992px) */
        @media (max-width: 992px) {
            .main-nav {
                display: none;
                flex-direction: column;
                position: absolute;
                top: 100%; /* Position below header */
                left: 0;
                width: 100%;
                background: var(--secondary-color);
                padding: 10px 20px;
                box-shadow: 0 10px 10px var(--shadow-color);
                border-top: 1px solid #e0e0e0;
                gap: 0;
            }
            .main-nav a {
                padding: 12px 0;
                border-bottom: 1px solid #f0f0f0;
            }
            .main-nav a:last-child {
                border-bottom: none;
            }
            .main-nav.active {
                display: flex;
            }
            .mobile-toggle {
                display: block;
            }
            .hero-section h1 {
                font-size: 2.5rem;
            }
            /* .category-grid is handled by auto-fit */
        }
        
        /* Mobile phones (up to 767px) */
        @media (max-width: 767px) {
            .filter-sort-controls {
                flex-direction: column;
                align-items: stretch;
            }
            .sort-options {
                width: 100%;
            }
            .sort-options select {
                width: 100%;
            }
            .cta-banner .container {
                flex-direction: column;
                text-align: center;
            }
             .scizora-footer-grid, .cta-banner .container {
                text-align: center;
            }
             .scizora-social-links {
                justify-content: center;
            }
            .hero-section h1 {
                font-size: 2rem;
            }
            .hero-section p {
                font-size: 1rem;
            }
        }

    </style>
</head>

<body>

    <!-- ======================= HEADER ======================= -->
    <header class="site-header">
        <div class="container">
            <a href="{{ url('/') }}" class="text-xl md:text-2xl font-bold"><img src="{{ asset('build/images/logo.jpg') }}"
                    alt="logo" width="150" height="50"></a>
            <nav class="main-nav" id="mainNav">
                <a href="{{ url('/') }}">Home</a>
                <a href="{{ route('categories') }}" class="active">Categories</a>
                
                <a href="{{ route('about.us') }}">About Us</a>
                <a href="{{ route('contact.us') }}">Contact</a>
            </nav>
            <div class="header-actions">
                <div class="profile-dropdown" id="profileDropdown">
                    <button class="profile-btn"><i class="fa-solid fa-circle-user"></i></button>
                    <div class="dropdown-content">
                        <a href="User Pages\Dashboard seperate pages\My-Profile.html">My Profile</a>
                        <a href="Business Pages\notification.html">Notifications</a>
                        <a href="#">Logout</a>
                    </div>
                </div>
                <button class="mobile-toggle" id="mobileToggle">
                    <i class="fa-solid fa-bars"></i>
                </button>
            </div>
        </div>
    </header>
    {{-- @include('home.header') --}}

    <main>
        <!-- ======================= HERO SECTION ======================= -->
        <section class="hero-section">
            <h1>Explore Categories</h1>
            <p>Find the products and services you need in Pharma, Life Sciences, and beyond.</p>
            <div class="search-bar">
                <input type="text" id="categorySearch" placeholder="Search for a category (e.g., 'Diagnostics')">
                <i class="fa-solid fa-search"></i>
            </div>
        </section>

        <!-- ======================= CATEGORIES SECTION ======================= -->
        <section class="categories-section">
            <div class="container">
                <!-- Filter and Sort Controls -->
                <div class="filter-sort-controls">
                    <div class="filter-tags" id="filterTags">
                        <button class="active" data-filter="all">All</button>
                        <button data-filter="pharma">Pharma</button>
                        <button data-filter="diagnostics">Diagnostics</button>
                        <button data-filter="nutrition">Food & Nutrition</button>
                        <button data-filter="lab">Lab Supplies</button>
                    </div>
                    <div class="sort-options">
                        <select id="sortCategories">
                            <option value="popular">Sort by: Most Popular</option>
                            <option value="alphabetical">Sort by: Alphabetical (A-Z)</option>
                            <option value="recent">Sort by: Recently Added</option>
                        </select>
                    </div>
                </div>

                <!-- Categories Grid -->
                <div class="category-grid" id="categoryGrid">
                    <!-- Category cards will be dynamically inserted here by JavaScript -->
                </div>
            </div>
        </section>

        <!-- ======================= CTA BANNER ======================= -->
        <section class="cta-banner">
            <div class="container">
                <h2>Can’t find what you’re looking for?</h2>
                <a href="#" class="cta-button">Post Your Requirement</a>
            </div>
        </section>
    </main>

    <!-- ======================= FOOTER ======================= -->
    @include('home.footer')


    <script>
        document.addEventListener('DOMContentLoaded', () => {

            // ===================================
            // --- 1. DATA FOR CATEGORIES ---
            // ===================================
            const categoryData = [{
                    id: 1,
                    icon: 'fa-solid fa-pills',
                    title: 'Pharmaceuticals',
                    description: 'Active ingredients, excipients, and finished dosage forms for drug manufacturing.',
                    tags: ['pharma'],
                    popularity: 95,
                    dateAdded: '2023-10-15'
                },
                {
                    id: 2,
                    icon: 'fa-solid fa-microscope',
                    title: 'Diagnostics & Testing',
                    description: 'Reagents, kits, and instruments for clinical diagnostics and research testing.',
                    tags: ['diagnostics', 'lab'],
                    popularity: 92,
                    dateAdded: '2023-11-01'
                },
                {
                    id: 3,
                    icon: 'fa-solid fa-apple-whole',
                    title: 'Food & Nutrition',
                    description: 'Nutraceuticals, food additives, and specialty ingredients for the health industry.',
                    tags: ['nutrition'],
                    popularity: 80,
                    dateAdded: '2023-09-20'
                },
                {
                    id: 4,
                    icon: 'fa-solid fa-flask-vial',
                    title: 'Lab Chemicals',
                    description: 'High-purity solvents, reagents, and standards for analytical and research labs.',
                    tags: ['lab', 'pharma'],
                    popularity: 88,
                    dateAdded: '2024-01-10'
                },
                {
                    id: 5,
                    icon: 'fa-solid fa-dna',
                    title: 'Biotechnology',
                    description: 'Cell culture media, enzymes, and molecular biology tools for biotech innovation.',
                    tags: ['diagnostics', 'pharma'],
                    popularity: 90,
                    dateAdded: '2023-12-05'
                },
                {
                    id: 6,
                    icon: 'fa-solid fa-vials',
                    title: 'Lab Consumables',
                    description: 'Pipettes, vials, gloves, and other essential supplies for daily lab operations.',
                    tags: ['lab'],
                    popularity: 85,
                    dateAdded: '2023-08-11'
                },
                {
                    id: 7,
                    icon: 'fa-solid fa-truck-medical',
                    title: 'Medical Devices',
                    description: 'Surgical instruments, monitoring equipment, and therapeutic devices.',
                    tags: ['diagnostics'],
                    popularity: 75,
                    dateAdded: '2024-02-01'
                },
                {
                    id: 8,
                    icon: 'fa-solid fa-seedling',
                    title: 'Agrochemicals',
                    description: 'Specialty chemicals for crop protection, fertilizers, and agricultural research.',
                    tags: ['nutrition'],
                    popularity: 70,
                    dateAdded: '2023-11-25'
                }
            ];

            let currentCategories = [...categoryData];

            // ===================================
            // --- 2. DOM ELEMENT REFERENCES ---
            // ===================================
            const categoryGrid = document.getElementById('categoryGrid');
            const searchInput = document.getElementById('categorySearch');
            const sortSelect = document.getElementById('sortCategories');
            const filterTagsContainer = document.getElementById('filterTags');
            const mobileToggle = document.getElementById('mobileToggle');
            const mainNav = document.getElementById('mainNav');
            const profileDropdown = document.getElementById('profileDropdown');

            // ===================================
            // --- 3. CORE FUNCTIONS ---
            // ===================================

            /**
             * Renders the category cards into the grid
             * @param {Array} categories - An array of category objects to display
             */
            const displayCategories = (categories) => {
                categoryGrid.innerHTML = ''; // Clear existing grid
                if (categories.length === 0) {
                    categoryGrid.innerHTML = '<p>No categories found matching your criteria.</p>';
                    return;
                }

                categories.forEach(category => {
                    const card = document.createElement('div');
                    card.className = 'category-card';
                    card.innerHTML = `
                    <i class="card-icon ${category.icon}"></i>
                    <div>
                        <h3 class="card-title">${category.title}</h3>
                        <p class="card-description">${category.description}</p>
                    </div>
                    <a href="#" class="card-button">View More</a>
                `;
                    categoryGrid.appendChild(card);
                });
            };

            /**
             * Handles the filtering and sorting logic
             */
            const applyFiltersAndSort = () => {
                const searchTerm = searchInput.value.toLowerCase();
                const sortBy = sortSelect.value;
                const activeFilterTag = filterTagsContainer.querySelector('button.active').dataset.filter;

                // 1. Filter by tag
                let filtered = categoryData.filter(cat => {
                    if (activeFilterTag === 'all') return true;
                    return cat.tags.includes(activeFilterTag);
                });

                // 2. Filter by search term
                filtered = filtered.filter(cat =>
                    cat.title.toLowerCase().includes(searchTerm) ||
                    cat.description.toLowerCase().includes(searchTerm)
                );

                // 3. Sort
                switch (sortBy) {
                    case 'alphabetical':
                        filtered.sort((a, b) => a.title.localeCompare(b.title));
                        break;
                    case 'recent':
                        filtered.sort((a, b) => new Date(b.dateAdded) - new Date(a.dateAdded));
                        break;
                    case 'popular':
                    default:
                        filtered.sort((a, b) => b.popularity - a.popularity);
                        break;
                }

                currentCategories = filtered;
                displayCategories(currentCategories);
            };

            // ===================================
            // --- 4. EVENT LISTENERS ---
            // ===================================

            // Search input listener
            searchInput.addEventListener('input', applyFiltersAndSort);

            // Sort select listener
            sortSelect.addEventListener('change', applyFiltersAndSort);

            // Filter tags listener (using event delegation)
            filterTagsContainer.addEventListener('click', (e) => {
                if (e.target.tagName === 'BUTTON') {
                    // Remove active class from all buttons
                    filterTagsContainer.querySelectorAll('button').forEach(btn => btn.classList.remove(
                        'active'));
                    // Add active class to the clicked button
                    e.target.classList.add('active');
                    applyFiltersAndSort();
                }
            });

            // Mobile navigation toggle
            mobileToggle.addEventListener('click', () => {
                mainNav.classList.toggle('active');
            });

            // Profile dropdown toggle
            profileDropdown.addEventListener('click', (e) => {
                e.stopPropagation(); // Prevents the window click listener from firing immediately
                profileDropdown.classList.toggle('active');
            });

            // Close dropdown when clicking outside
            window.addEventListener('click', () => {
                if (profileDropdown.classList.contains('active')) {
                    profileDropdown.classList.remove('active');
                }
            });

            // ===================================
            // --- 5. INITIAL RENDER ---
            // ===================================
            applyFiltersAndSort();

        });
    </script>

</body>

</html>
