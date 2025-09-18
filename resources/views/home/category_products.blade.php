<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SCIZORA - Life Sciences</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

        .active-filter {
            background-color: #1544da;
            color: white;
        }

        .business-card {
            transition: all 0.3s ease;
        }

        .business-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
        }

        .rating-star {
            color: #FBBF24;
        }

        .verified-badge {
            background-color: #10B981;
        }

        /* -- New Blue Theme -- */
        .text-primary {
            color: #1544da;
        }

        .bg-primary {
            background-color: #1544da;
        }

        .border-primary {
            border-color: #1544da;
        }

        .bg-blue-100 {
            background-color: #EBF0FF;
            /* Lighter blue for backgrounds */
        }

        .text-blue-700 {
            color: #1544da;
        }

        .hover\:bg-blue-100:hover {
            background-color: #EBF0FF;
        }

        .hover\:bg-blue-200:hover {
            background-color: #DDE5FA;
            /* Slightly darker light blue for hover */
        }

        .prominent-search-container {
            background-color: #EBF0FF;
            /* Using light blue for this container */
            padding: 1.5rem;
            border-radius: 0.5rem;
            margin-bottom: 1.5rem;
        }

        .prominent-search-container .search-button {
            background-color: #1544da;
            color: white;
            padding: 0.5rem 1.5rem;
            border-radius: 0.375rem;
            transition: background-color 0.3s;
        }

        .prominent-search-container .search-button:hover {
            background-color: #1137ad;
            /* A slightly darker blue for hover */
        }

        /* Ensure form elements use the primary color */
        .form-checkbox.text-primary,
        .form-radio.text-primary {
            color: #1544da;
        }

        /* List view styles */
        .list-view .business-card {
            width: 100%;
            display: flex;
            /* Keep flex for overall structure */
            flex-direction: column;
            /* Stack main content and button on small screens */
            align-items: flex-start;
            /* Align content to the start */
        }

        .list-view .business-card>div {
            display: flex;
            /* Keep flex for inner content */
            flex-direction: column;
            /* Stack image and text content on small screens */
            width: 100%;
        }

        .list-view .business-card img {
            width: 100px;
            /* Adjust image size for mobile list view */
            height: 100px;
            object-fit: cover;
            /* Use cover to fill the space better */
            margin-right: 0;
            /* Remove right margin, will add bottom margin */
            margin-bottom: 1rem;
            /* Add space below image */
            border-radius: 0.375rem;
            /* Make image corners slightly rounded */
        }

        .list-view .card-content {
            flex: 1;
        }

        /* New responsive adjustments for list view */
        @media (min-width: 640px) {

            /* Tailwind's 'sm' breakpoint */
            .list-view .business-card {
                flex-direction: row;
                /* Go back to row layout on larger screens */
                align-items: center;
                /* Vertically center items */
            }

            .list-view .business-card>div {
                flex-direction: row;
                /* Image and text content side-by-side */
            }

            .list-view .business-card img {
                width: 120px;
                /* Original size for larger screens */
                height: 120px;
                margin-right: 20px;
                /* Original margin */
                margin-bottom: 0;
                /* Remove bottom margin */
            }

            .list-view .business-card .list-view-button-container {
                margin-left: auto;
                /* Push button to the right on larger screens */
            }
        }

        .view-toggle-active {
            background-color: #1544da !important;
            color: white !important;
        }

        .category-header {
            background: linear-gradient(90deg, #1544da, #0b2b8a);
            color: white;
            padding: 2rem;
            border-radius: 0.5rem;
            margin-bottom: 1.5rem;
        }
    </style>
</head>

<body class="bg-gray-50">
    <!-- Header/Navigation -->
    {{-- <header class="bg-white shadow-sm">
        <div class="container mx-auto px-4 py-4 flex justify-between items-center">
            <div class="flex items-center">
			<a href="../index.html">
               
                <a href="#" class="text-xl md:text-2xl font-bold"><img src="logo.jpg" alt="logo" width="200" height="60"></a></span>
            </a>
            </div>
            <nav class="hidden md:flex items-center space-x-8">
                <a href="#" class="text-gray-600 hover:text-primary">Home</a>
                <a href="#" class="text-primary font-medium">Directory</a>
				<a href="#" class="text-gray-600 hover:text-primary">Blog</a>
                <a href="#" class="text-gray-600 hover:text-primary">About</a>
                <a href="#" class="text-gray-600 hover:text-primary">Contact</a>
                <button class="ml-4 px-4 py-2 border border-primary text-primary rounded-md hover:bg-purple-100 transition">
                    List Your Business
                </button>
            </nav>
            <button class="md:hidden text-gray-600">
                <i class="fas fa-bars text-xl"></i>
            </button>
        </div>
    </header> --}}
    @include('home.header')

    <!-- Horizontal Ad Banner -->
    <div class="container mx-auto px-4 my-4">
        <img src="https://tpc.googlesyndication.com/simgad/13265185988757716340" alt="Advertisement"
            class="w-full h-auto">
    </div>

    <!-- Main Content -->
    <main class="container mx-auto px-4 py-8 flex flex-col md:flex-row">
        <!-- Filters Sidebar -->
        <aside class="w-full md:w-64 flex-shrink-0 mb-8 md:mb-0 md:mr-8">
            <div class="bg-white p-6 rounded-lg shadow-sm sticky top-4">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="font-bold text-lg">Filters</h2>
                    <button class="text-primary text-sm" id="reset-filters">Reset All</button>
                </div>

                <!-- Location Filter -->
                <div class="mb-6">
                    <h3 class="font-medium mb-2">Location</h3>
                    {{-- <select id="continent" class="w-full p-2 border border-gray-300 rounded-md mb-2">
                        <option value="">Select Continent</option>
                        <option value="Asia">Asia</option>
                        <option value="Europe">Europe</option>
                        <option value="North America">North America</option>
                        <option value="South America">South America</option>
                        <option value="Africa">Africa</option>
                        <option value="Australia">Australia</option>
                    </select> --}}
                    <select id="country" class="w-full p-2 border border-gray-300 rounded-md">
                        <option value="">Select Country</option>
                        @foreach ($locations as $location)
                            <option value="{{ $location->id }}">{{ $location->name }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Certifications Filter -->
                <div class="mb-6">
                    <h3 class="font-medium mb-2">Certifications</h3>
                    <div class="space-y-2">
                        <label class="flex items-center">
                            <input type="checkbox" class="form-checkbox text-primary" value="GMP">
                            <span class="ml-2">GMP</span>
                        </label>
                        <label class="flex items-center">
                            <input type="checkbox" class="form-checkbox text-primary" value="ISO 9001">
                            <span class="ml-2">ISO 9001</span>
                        </label>
                        <label class="flex items-center">
                            <input type="checkbox" class="form-checkbox text-primary" value="FDA Approved">
                            <span class="ml-2">FDA Approved</span>
                        </label>
                        <label class="flex items-center">
                            <input type="checkbox" class="form-checkbox text-primary" value="WHO-GMP">
                            <span class="ml-2">WHO-GMP</span>
                        </label>
                    </div>
                </div>

                <!-- Rating Filter -->
                <div>
                    <h3 class="font-medium mb-2">Rating</h3>
                    <div class="space-y-2">
                        <label class="flex items-center">
                            <input type="radio" name="rating" class="form-radio text-primary" value="4">
                            <span class="ml-2 flex">
                                <i class="fas fa-star rating-star"></i>
                                <i class="fas fa-star rating-star"></i>
                                <i class="fas fa-star rating-star"></i>
                                <i class="fas fa-star rating-star"></i>
                                <span class="text-gray-600 ml-1">★★★★& up</span>
                            </span>
                        </label>
                        <label class="flex items-center">
                            <input type="radio" name="rating" class="form-radio text-primary" value="3">
                            <span class="ml-2 flex">
                                <i class="fas fa-star rating-star"></i>
                                <i class="fas fa-star rating-star"></i>
                                <i class="fas fa-star rating-star"></i>
                                <span class="text-gray-600 ml-1">★★★& up</span>
                            </span>
                        </label>
                        <label class="flex items-center">
                            <input type="radio" name="rating" class="form-radio text-primary" value="2">
                            <span class="ml-2 flex">
                                <i class="fas fa-star rating-star"></i>
                                <i class="fas fa-star rating-star"></i>
                                <span class="text-gray-600 ml-1">★★& up</span>
                            </span>
                        </label>
                        <label class="flex items-center">
                            <input type="radio" name="rating" class="form-radio text-primary" value="1">
                            <span class="ml-2 flex">
                                <i class="fas fa-star rating-star"></i>
                                <span class="text-gray-600 ml-1">★& up</span>
                            </span>
                        </label>
                        <label class="flex items-center">
                            <input type="radio" name="rating" class="form-radio text-primary" value="0" checked>
                            <span class="ml-2">All Ratings</span>
                        </label>
                    </div>
                </div>


            </div>
        </aside>

        <!-- Main Content Area -->
        <div class="flex-1">
            <!-- Single Category Header -->
            <div class="category-header">
                <h1 class="text-2xl md:text-3xl font-bold">Life Sciences</h1>
                <p class="mt-2">Discover trusted pharmaceutical companies, manufacturers, and suppliers worldwide</p>
            </div>

            <!-- Prominent Search Section -->
            <div class="prominent-search-container">
                <div class="flex flex-col md:flex-row gap-4">
                    <div class="flex-1 relative">
                        <i class="fas fa-search absolute left-3 top-3.5 text-gray-400"></i>
                        <input type="text" id="prominent-search-input"
                            placeholder="Search pharmaceutical companies, products, or keywords..."
                            class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-primary focus:border-transparent">
                    </div>
                    <button id="prominent-search-button" class="search-button flex items-center justify-center">
                        <i class="fas fa-search mr-2"></i> Search
                    </button>
                </div>
            </div>

            <!-- Existing Search Bar -->
            <div class="bg-white p-6 rounded-lg shadow-sm mb-6">
                <div class="relative">
                    <input type="text" id="search-input"
                        placeholder="Search by business name, product, or keyword"
                        class="w-full p-3 pl-10 border border-gray-300 rounded-md focus:ring-2 focus:ring-primary focus:border-transparent">
                    <i class="fas fa-search absolute left-3 top-3.5 text-gray-400"></i>
                </div>
            </div>

            <!-- Results Header -->
            <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6">
                <h2 class="text-lg font-bold mb-2 md:mb-0">Life Sciences</h2>
                <div class="flex items-center space-x-4">
                    <div class="flex items-center">
                        <span class="text-sm text-gray-600 mr-2">Sort by:</span>
                        <select id="sort-by" class="p-2 border border-gray-300 rounded-md text-sm">
                            <option value="relevance">Relevance</option>
                            <option value="rating">Rating</option>
                            <option value="a-z">A-Z</option>
                            <option value="z-a">Z-A</option>
                            <option value="newest">Newest</option>
                        </select>
                    </div>
                    <div class="flex items-center space-x-1">
                        <button id="grid-view-btn"
                            class="p-2 text-gray-600 bg-gray-100 rounded-md view-toggle-active">
                            <i class="fas fa-th"></i>
                        </button>
                        <button id="list-view-btn" class="p-2 text-gray-400 bg-white rounded-md">
                            <i class="fas fa-list"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Business Cards Grid -->
            <div id="business-results" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
                <!-- Business cards will be dynamically inserted here -->
            </div>

            <!-- Pagination -->
            <div class="flex flex-col sm:flex-row items-center justify-between border-t border-gray-200 pt-6">
                <div class="mb-4 sm:mb-0">
                    <p class="text-sm text-gray-600" id="results-count">Showing 1-6 of 24 results</p>
                </div>
                <div class="flex items-center space-x-2">
                    <button id="prev-page"
                        class="px-3 py-1 border border-gray-300 rounded-md text-sm disabled:opacity-50"
                        disabled>Previous</button>
                    <div class="flex space-x-1">
                        <button class="page-number px-3 py-1 bg-primary text-white rounded-md text-sm">1</button>
                        <button
                            class="page-number px-3 py-1 border border-gray-300 rounded-md text-sm hover:bg-gray-50">2</button>
                        <button
                            class="page-number px-3 py-1 border border-gray-300 rounded-md text-sm hover:bg-gray-50">3</button>
                        <button
                            class="page-number px-3 py-1 border border-gray-300 rounded-md text-sm hover:bg-gray-50">4</button>
                    </div>
                    <button id="next-page" class="px-3 py-1 border border-gray-300 rounded-md text-sm">Next</button>
                </div>
            </div>
            <!-- Ad Banner -->
            <div class="container mx-auto px-4 py-6">
                <img src="https://tpc.googlesyndication.com/simgad/13265185988757716340" alt="Advertisement"
                    class="w-full h-auto mx-auto">
            </div>
        </div>
    </main>

    <script>
        const businessData = @json($businessData);


        // ===================================
        // CHANGE #1: Add a 'url' property to each object
        // ===================================
        
        // const businessData = [{
        //         id: 1,
        //         name: "PharmaTech Solutions",
        //         logo: "https://via.placeholder.com/80",
        //         rating: 4.5,
        //         reviews: 156,
        //         description: "Leading provider of Third Party manufacturing and custom synthesis services for the pharmaceutical industry.",
        //         categories: ["Third Party Manufacturing", "Custom Synthesis"],
        //         certifications: ["GMP", "ISO 9001", "FDA Approved"],
        //         location: {
        //             continent: "North America",
        //             country: "USA"
        //         },
        //         verified: true,
        //         dateAdded: "2023-05-15",
        //         url: "product.html" // Added URL
        //     },
        //     {
        //         id: 2,
        //         name: "BioPharm Contractors",
        //         logo: "https://via.placeholder.com/80",
        //         rating: 4.2,
        //         reviews: 89,
        //         description: "Specialized in contract manufacturing of biologics and sterile injectables with WHO-GMP facilities.",
        //         categories: ["Contract Manufacturing"],
        //         certifications: ["GMP", "WHO-GMP"],
        //         location: {
        //             continent: "Europe",
        //             country: "Germany"
        //         },
        //         verified: true,
        //         dateAdded: "2023-03-22",
        //         url: "product.html" // Added URL
        //     },

        // ];

        // DOM elements
        const businessResults = document.getElementById('business-results');
        const searchInput = document.getElementById('search-input');
        const resetFiltersBtn = document.getElementById('reset-filters');
        // const continentSelect = document.getElementById('continent');
        const countrySelect = document.getElementById('country');
        const certificationCheckboxes = document.querySelectorAll(
            'input[type="checkbox"][value^="GMP"], input[type="checkbox"][value^="ISO"], input[type="checkbox"][value^="FDA"], input[type="checkbox"][value^="WHO"]'
            );
        const ratingRadios = document.querySelectorAll('input[type="radio"][name="rating"]');
        const sortBySelect = document.getElementById('sort-by');
        const prevPageBtn = document.getElementById('prev-page');
        const nextPageBtn = document.getElementById('next-page');
        const pageNumbers = document.querySelectorAll('.page-number');
        const resultsCount = document.getElementById('results-count');

        // New prominent search elements
        const prominentSearchInput = document.getElementById('prominent-search-input');
        const prominentSearchButton = document.getElementById('prominent-search-button');

        // View toggle elements
        const gridViewBtn = document.getElementById('grid-view-btn');
        const listViewBtn = document.getElementById('list-view-btn');

        // Pagination variables
        let currentPage = 1;
        const itemsPerPage = 6;
        let totalPages = Math.ceil(businessData.length / itemsPerPage);

        // View mode state
        let currentView = 'grid'; // 'grid' or 'list'

        // Filter state
        let filters = {
            searchTerm: '',
            // continent: '',
            country: '',
            certifications: [],
            minRating: 0,
            sortBy: 'relevance'
        };

        // Initialize the page
        document.addEventListener('DOMContentLoaded', function() {
            renderBusinessCards();
            setupEventListeners();
            updatePagination();
        });

        // Set up event listeners
        function setupEventListeners() {
            // Existing search input
            searchInput.addEventListener('input', function() {
                filters.searchTerm = this.value.toLowerCase();
                currentPage = 1;
                renderBusinessCards();
                updatePagination();
            });

            // Prominent search input
            prominentSearchInput.addEventListener('input', function() {
                filters.searchTerm = this.value.toLowerCase();
                currentPage = 1;
                renderBusinessCards();
                updatePagination();
            });

            // Prominent search button
            prominentSearchButton.addEventListener('click', function() {
                filters.searchTerm = prominentSearchInput.value.toLowerCase();
                currentPage = 1;
                renderBusinessCards();
                updatePagination();
            });

            // Reset filters
            resetFiltersBtn.addEventListener('click', function() {
                // Reset all filter inputs
                searchInput.value = '';
                prominentSearchInput.value = '';
                // continentSelect.value = '';
                countrySelect.value = '';
                countrySelect.disabled = true;

                certificationCheckboxes.forEach(checkbox => {
                    checkbox.checked = false;
                });

                document.querySelector('input[type="radio"][name="rating"][value="0"]').checked = true;
                sortBySelect.value = 'relevance';

                // Reset filter state
                filters = {
                    searchTerm: '',
                    continent: '',
                    country: '',
                    certifications: [],
                    minRating: 0,
                    sortBy: 'relevance'
                };

                currentPage = 1;
                renderBusinessCards();
                updatePagination();
            });

            // Continent filter
            // continentSelect.addEventListener('change', function() {
            //     filters.continent = this.value;
            //     countrySelect.disabled = !this.value;

            //     // Update country options based on continent
            //     updateCountryOptions();

            //     currentPage = 1;
            //     renderBusinessCards();
            //     updatePagination();
            // });

            // Country filter
            countrySelect.addEventListener('change', function() {
                filters.country = this.value;
                currentPage = 1;
                renderBusinessCards();
                updatePagination();
            });

            // Certification checkboxes
            certificationCheckboxes.forEach(checkbox => {
                checkbox.addEventListener('change', updateCertificationFilters);
            });

            // Rating radios
            ratingRadios.forEach(radio => {
                radio.addEventListener('change', function() {
                    filters.minRating = parseInt(this.value);
                    currentPage = 1;
                    renderBusinessCards();
                    updatePagination();
                });
            });

            // Sort by
            sortBySelect.addEventListener('change', function() {
                filters.sortBy = this.value;
                currentPage = 1;
                renderBusinessCards();
                updatePagination();
            });

            // Pagination
            prevPageBtn.addEventListener('click', function() {
                if (currentPage > 1) {
                    currentPage--;
                    renderBusinessCards();
                    updatePagination();
                }
            });

            nextPageBtn.addEventListener('click', function() {
                if (currentPage < totalPages) {
                    currentPage++;
                    renderBusinessCards();
                    updatePagination();
                }
            });

            // Page numbers
            pageNumbers.forEach((number, index) => {
                number.addEventListener('click', function() {
                    currentPage = index + 1;
                    renderBusinessCards();
                    updatePagination();
                });
            });

            // View toggle buttons
            gridViewBtn.addEventListener('click', function() {
                if (currentView !== 'grid') {
                    currentView = 'grid';
                    updateViewToggleButtons();
                    renderBusinessCards();
                }
            });

            listViewBtn.addEventListener('click', function() {
                if (currentView !== 'list') {
                    currentView = 'list';
                    updateViewToggleButtons();
                    renderBusinessCards();
                }
            });
        }

        // Update view toggle buttons appearance
        function updateViewToggleButtons() {
            if (currentView === 'grid') {
                gridViewBtn.classList.add('view-toggle-active');
                gridViewBtn.classList.remove('text-gray-400', 'bg-white');
                gridViewBtn.classList.add('text-gray-600', 'bg-gray-100');

                listViewBtn.classList.remove('view-toggle-active');
                listViewBtn.classList.remove('text-gray-600', 'bg-gray-100');
                listViewBtn.classList.add('text-gray-400', 'bg-white');
            } else {
                listViewBtn.classList.add('view-toggle-active');
                listViewBtn.classList.remove('text-gray-400', 'bg-white');
                listViewBtn.classList.add('text-gray-600', 'bg-gray-100');

                gridViewBtn.classList.remove('view-toggle-active');
                gridViewBtn.classList.remove('text-gray-600', 'bg-gray-100');
                gridViewBtn.classList.add('text-gray-400', 'bg-white');
            }
        }

        // Update country options based on selected continent
        function updateCountryOptions() {
            countrySelect.innerHTML = '<option value="">Select Country</option>';

            if (!filters.continent) return;

            // Get unique countries in the selected continent from our data
            const countriesInContinent = [...new Set(
                businessData
                .filter(business => business.location.continent === filters.continent)
                .map(business => business.location.country)
            )];

            // Add country options
            countriesInContinent.forEach(country => {
                const option = document.createElement('option');
                option.value = country;
                option.textContent = country;
                countrySelect.appendChild(option);
            });
        }

        // Update certification filters
        function updateCertificationFilters() {
            filters.certifications = Array.from(certificationCheckboxes)
                .filter(checkbox => checkbox.checked)
                .map(checkbox => checkbox.value);

            currentPage = 1;
            renderBusinessCards();
            updatePagination();
        }

        // Filter and sort businesses based on current filters
        function getFilteredBusinesses() {
            let filtered = [...businessData];

            // Apply search filter
            if (filters.searchTerm) {
                filtered = filtered.filter(business =>
                    business.name.toLowerCase().includes(filters.searchTerm) ||
                    business.description.toLowerCase().includes(filters.searchTerm) ||
                    business.categories.some(cat => cat.toLowerCase().includes(filters.searchTerm))
                );
            }

            // Apply location filters
            if (filters.continent) {
                filtered = filtered.filter(business =>
                    business.location.continent === filters.continent
                );

                if (filters.country) {
                    filtered = filtered.filter(business =>
                        business.location.country === filters.country
                    );
                }
            }

            // Apply certification filters
            if (filters.certifications.length > 0) {
                filtered = filtered.filter(business =>
                    filters.certifications.some(cert => business.certifications.includes(cert))
                );
            }

            // Apply rating filter
            if (filters.minRating > 0) {
                filtered = filtered.filter(business =>
                    business.rating >= filters.minRating
                );
            }

            // Apply sorting
            switch (filters.sortBy) {
                case 'rating':
                    filtered.sort((a, b) => b.rating - a.rating);
                    break;
                case 'a-z':
                    filtered.sort((a, b) => a.name.localeCompare(b.name));
                    break;
                case 'z-a':
                    filtered.sort((a, b) => b.name.localeCompare(a.name));
                    break;
                case 'newest':
                    filtered.sort((a, b) => new Date(b.dateAdded) - new Date(b.dateAdded));
                    break;
                case 'relevance':
                default:
                    // Default sorting (by relevance - could be by rating or other metric)
                    filtered.sort((a, b) => b.rating - a.rating);
            }

            return filtered;
        }

        // ==============================================================
        // CHANGE #2: Modify the 'renderBusinessCards' function
        // The <button> is replaced with an <a> tag with an href
        // ==============================================================
        function renderBusinessCards() {
            const filteredBusinesses = getFilteredBusinesses();
            totalPages = Math.ceil(filteredBusinesses.length / itemsPerPage);

            const startIndex = (currentPage - 1) * itemsPerPage;
            const endIndex = startIndex + itemsPerPage;
            const paginatedBusinesses = filteredBusinesses.slice(startIndex, endIndex);

            businessResults.innerHTML = '';

            if (currentView === 'grid') {
                businessResults.className = 'grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-8';
            } else {
                businessResults.className = 'grid grid-cols-1 gap-6 mb-8 list-view';
            }

            paginatedBusinesses.forEach(business => {
                const card = document.createElement('div');
                card.className =
                    'business-card bg-white rounded-lg shadow-sm overflow-hidden border border-gray-100';

                const fullStars = Math.floor(business.rating);
                const hasHalfStar = business.rating % 1 >= 0.5;
                let starsHtml = '';

                for (let i = 0; i < fullStars; i++) {
                    starsHtml += '<i class="fas fa-star rating-star"></i>';
                }

                if (hasHalfStar) {
                    starsHtml += '<i class="fas fa-star-half-alt rating-star"></i>';
                }

                for (let i = 0; i < 5 - Math.ceil(business.rating); i++) {
                    starsHtml += '<i class="far fa-star rating-star"></i>';
                }

                const categoriesHtml = business.categories.map(cat =>
                    `<span class="px-2 py-1 bg-blue-100 text-blue-700 rounded-full text-xs">${cat}</span>`
                ).join(' ');

                const verifiedBadge = business.verified ?
                    '<span class="verified-badge text-white text-xs px-2 py-1 rounded-full ml-2">Verified</span>' :
                    '';

                if (currentView === 'grid') {
                    card.innerHTML = `
                        <div class="p-6">
                            <div class="flex items-start">
                                <img src="${business.logo}" alt="${business.name} logo" class="w-16 h-16 object-contain border border-gray-200 rounded-md mr-4 flex-shrink-0">
                                <div class="flex-1 min-w-0">
                                    <div class="flex items-center">
                                        <h3 class="font-bold text-lg truncate">${business.name}</h3>
                                        ${verifiedBadge}
                                    </div>
                                    <div class="flex items-center mt-1">
                                        ${starsHtml}
                                        <span class="text-gray-600 text-sm ml-1">(${business.reviews})</span>
                                    </div>
                                </div>
                            </div>
                            <p class="mt-4 text-gray-600 line-clamp-2">${business.description}</p>
                            <div class="mt-4 flex flex-wrap gap-2">
                                ${categoriesHtml}
                            </div>
                            <!-- MODIFIED LINE: Changed button to 'a' tag -->
                            <a href="${business.url}" class="block text-center mt-6 w-full py-2 border border-primary text-primary rounded-md hover:bg-blue-100 transition">
                                View Details
                            </a>
                        </div>
                    `;
                } else {
                    card.innerHTML = `
                        <div class="p-6 flex flex-col sm:flex-row items-start sm:items-center">
                            <img src="${business.logo}" alt="${business.name} logo" class="w-24 h-24 object-contain border border-gray-200 rounded-md mb-4 sm:mb-0 sm:mr-6 flex-shrink-0">
                            <div class="flex-1 min-w-0">
                                <div class="flex items-center">
                                    <h3 class="font-bold text-lg">${business.name}</h3>
                                    ${verifiedBadge}
                                </div>
                                <div class="flex items-center mt-1">
                                    ${starsHtml}
                                    <span class="text-gray-600 text-sm ml-1">(${business.reviews})</span>
                                </div>
                                <p class="mt-2 text-gray-600">${business.description}</p>
                                <div class="mt-3 flex flex-wrap gap-2">
                                    ${categoriesHtml}
                                </div>
                            </div>
                            <div class="list-view-button-container mt-4 sm:mt-0 w-full sm:w-auto">
                                <!-- MODIFIED LINE: Changed button to 'a' tag -->
                                <a href="${business.url}" class="block sm:inline-block text-center w-full sm:w-auto px-6 py-2 border border-primary text-primary rounded-md hover:bg-blue-100 transition">
                                    View Details
                                </a>
                            </div>
                        </div>
                    `;
                }

                businessResults.appendChild(card);
            });

            const startCount = filteredBusinesses.length > 0 ? startIndex + 1 : 0;
            const endCount = Math.min(endIndex, filteredBusinesses.length);
            resultsCount.textContent = `Showing ${startCount}-${endCount} of ${filteredBusinesses.length} results`;
        }


        // Update pagination controls
        function updatePagination() {
            const filteredBusinesses = getFilteredBusinesses();
            totalPages = Math.ceil(filteredBusinesses.length / itemsPerPage);

            // Disable/enable previous/next buttons
            prevPageBtn.disabled = currentPage === 1;
            nextPageBtn.disabled = currentPage === totalPages || totalPages === 0;

            // Update page numbers
            pageNumbers.forEach((number, index) => {
                number.classList.remove('bg-primary', 'text-white');
                number.classList.add('border', 'border-gray-300', 'hover:bg-gray-50');

                if (index + 1 === currentPage) {
                    number.classList.add('bg-primary', 'text-white');
                    number.classList.remove('border', 'border-gray-300', 'hover:bg-gray-50');
                }

                // Hide page numbers beyond total pages
                if (index + 1 > totalPages) {
                    number.style.display = 'none';
                } else {
                    number.style.display = 'inline-block';
                }
            });
        }
    </script>
</body>

</html>
