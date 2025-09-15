<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SCIZORA Blog - All Articles</title>
    <style>
        /* --- General & Theme Styles --- */
        :root {
            --primary-color: #0A47A9;
            --secondary-color: #FFFFFF;
            --background-accent: #F8F9FA;
            --text-dark: #333333;
            --text-mid: #555555;
            --border-color: #dee2e6;
            --shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
            --shadow-hover: 0 6px 20px rgba(0, 0, 0, 0.12);
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
            background-color: var(--background-accent);
            color: var(--text-dark);
            line-height: 1.6;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        a {
            color: var(--primary-color);
            text-decoration: none;
            transition: color 0.3s ease;
        }

        a:hover {
            text-decoration: underline;
        }

        .btn {
            display: inline-block;
            background-color: var(--primary-color);
            color: var(--secondary-color);
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        .btn:hover {
            background-color: #083a87;
            text-decoration: none;
            transform: translateY(-2px);
        }
        
        img {
            max-width: 100%;
            height: auto;
        }

        /* --- Header --- */
        .scizora-header {
            background-color: var(--secondary-color);
            padding: 15px 0;
            border-bottom: 1px solid var(--border-color);
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .header-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-size: 1.8rem;
            font-weight: 800;
            color: var(--primary-color);
        }

        .nav-menu ul {
            list-style: none;
            display: flex;
            gap: 30px;
        }

        .nav-menu a {
            color: var(--text-mid);
            font-weight: 600;
            text-decoration: none;
        }
        
        .nav-menu a:hover, .nav-menu a.active {
            color: var(--primary-color);
        }

        .profile-dropdown {
            display: flex;
            align-items: center;
            gap: 10px;
            cursor: pointer;
        }
        
        .profile-dropdown svg {
            width: 24px;
            height: 24px;
            fill: var(--text-mid);
        }

        /* --- Main Blog Listing Section --- */
        .blog-listing-section {
            padding: 60px 0;
        }

        .blog-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 40px;
            flex-wrap: wrap;
            gap: 20px;
        }

        .blog-header h1 {
            font-size: 2.5rem;
            color: var(--text-dark);
        }

        .filter-controls {
            display: flex;
            gap: 15px;
        }

        .search-bar input, .category-filter select {
            padding: 10px 15px;
            border: 1px solid var(--border-color);
            border-radius: 5px;
            font-size: 1rem;
        }
        .search-bar input:focus, .category-filter select:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 2px rgba(10, 71, 169, 0.2);
        }

        /* Blog Card Grid */
        .blog-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 30px;
        }

        .blog-card {
            background-color: var(--secondary-color);
            border-radius: 10px;
            overflow: hidden;
            box-shadow: var(--shadow);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            display: flex;
            flex-direction: column;
        }

        .blog-card:hover {
            transform: translateY(-5px) scale(1.02);
            box-shadow: var(--shadow-hover);
        }
        
        .card-image img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }
        
        .card-content {
            padding: 25px;
            display: flex;
            flex-direction: column;
            flex-grow: 1;
        }
        
        .card-content h2 {
            font-size: 1.4rem;
            margin-bottom: 10px;
        }
        .card-content h2 a {
            color: var(--text-dark);
            text-decoration: none;
        }
        .card-content h2 a:hover {
            color: var(--primary-color);
        }
        
        .blog-meta {
            font-size: 0.85rem;
            color: var(--text-mid);
            margin-bottom: 15px;
        }
        
        .card-description {
            color: var(--text-mid);
            flex-grow: 1;
            margin-bottom: 20px;
        }

        /* --- Pagination --- */
        .pagination {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 60px;
            list-style: none;
        }
        
        .pagination li a {
            color: var(--primary-color);
            padding: 10px 15px;
            margin: 0 5px;
            border: 1px solid var(--border-color);
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s ease, color 0.3s ease;
        }
        
        .pagination li a:hover, .pagination li.active a {
            background-color: var(--primary-color);
            color: var(--secondary-color);
            border-color: var(--primary-color);
        }
		/* --- Style 1: Seamless Outline --- */

.input-group {
    display: flex;
    max-width: 450px; /* Adjust width as needed */
    width: 100%;
}

/* Visually-hidden class for accessible labels */
.sr-only {
    position: absolute; width: 1px; height: 1px; padding: 0; margin: -1px;
    overflow: hidden; clip: rect(0, 0, 0, 0); white-space: nowrap; border-width: 0;
}

.input-group-field {
    /* Layout & Sizing */
    flex-grow: 1;
    width: 100%;
    padding: 12px 16px;
    font-size: 1rem;
    
    /* Appearance */
    background-color: #FFFFFF;
    color: #333333; /* Dark Gray text */
    border: 2px solid #ced4da; /* Mid-gray border */
    border-right: none; /* Remove right border to connect with button */
    border-radius: 8px 0 0 8px; /* Rounded left corners */

    /* Behavior */
    outline: none;
    transition: all 0.3s ease;
}

.input-group-field::placeholder {
    color: #999999;
}

/* Focus state for the input */
.input-group:focus-within .input-group-field {
    border-color: #0A47A9; /* SCIZORA Primary Blue */
    box-shadow: 0 0 0 3px rgba(10, 71, 169, 0.2);
    z-index: 2; /* Bring input to the front on focus */
}

/* Base button styles for the group */
.input-group .btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    padding: 12px 18px;
    border-radius: 0 8px 8px 0; /* Rounded right corners */
    border: 2px solid transparent;
    cursor: pointer;
    transition: all 0.3s ease;
    flex-shrink: 0; /* Prevents button from shrinking */
}

.input-group .btn svg {
    width: 20px;
    height: 20px;
}

/* White button specific styles */
.input-group .btn-white {
    background-color: #FFFFFF;
    color: #0A47A9; /* Blue icon */
    border-color: #ced4da;
}

/* Hover state for the button */
.input-group .btn-white:hover {
    background-color: #0A47A9;
    border-color: #0A47A9;
    color: #FFFFFF; /* White icon */
    transform: scale(1.05);
    z-index: 3; /* Bring button to the front on hover */
}

/* Focus state for the whole group */
.input-group:focus-within .btn-white {
    border-color: #0A47A9;
    z-index: 2;
}
		
		/* --- Footer (Same as Listing Page) --- */
        .scizora-footer { background-color: #0d1d35; color: #adb5bd; padding: 60px 0 20px 0; }
        .footer-content { display: grid; grid-template-columns: 2fr 1fr 1fr 1fr; gap: 40px; }
        .footer-about .logo { color: var(--secondary-color); }
        .footer-about p { margin: 20px 0; font-size: 0.9rem; line-height: 1.7; }
        .footer-socials a { display: inline-block; margin-right: 15px; }
        .footer-socials svg { width: 24px; height: 24px; fill: #adb5bd; transition: fill 0.3s ease; }
        .footer-socials a:hover svg { fill: var(--secondary-color); }
        .footer-links h4 { color: var(--secondary-color); margin-bottom: 20px; font-size: 1.1rem; }
        .footer-links ul { list-style: none; }
        .footer-links li { margin-bottom: 12px; }
        .footer-links a { color: #adb5bd; text-decoration: none; transition: color 0.3s ease; }
        .footer-links a:hover { color: var(--secondary-color); padding-left: 5px; }
        .footer-bottom { text-align: center; margin-top: 50px; padding-top: 20px; border-top: 1px solid #2c3e50; font-size: 0.85rem; }


        /* --- Responsive Design --- */
        @media (max-width: 992px) {
            .blog-grid {
                grid-template-columns: repeat(2, 1fr);
            }
            .nav-menu { display: none; } /* Simplified for demo */
        }
        
        @media (max-width: 768px) {
            .blog-header {
                flex-direction: column;
                align-items: flex-start;
            }
            .blog-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>

    <header class="scizora-header">
        <div class="container header-content">
            <a href="index.html" class="text-xl md:text-2xl font-bold"><img src="{{ asset('build/images/logo.jpg') }}" alt="logo" width="150" height="50"></a>
            <nav class="nav-menu">
                <ul>
                    <li><a href="{{ url('/') }}">Home</a></li>
                <li><a href="{{ route('categories') }}">Categories</a></li>
                <li><a href="{{ route('blogs') }}" class="active">Blog</a></li>
                <li><a href="{{ route('about.us') }}">About Us</a></li>
                <li><a href="{{ route('contact') }}">Contact</a></li>
                  
                </ul>
            </nav>
            <div class="profile-dropdown">
                <span>Jane Doe</span>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/></svg>
            </div>
        </div>
    </header>

    <main>
        <section class="blog-listing-section">
            <div class="container">
                <div class="blog-header">
                    <h1>SCIZORA Scientific Insights</h1>
                    <div class="filter-controls">
                        <div class="search-bar">
                            <input type="text" id="searchInput" placeholder="Search articles...">
                        </div>
                        <div class="category-filter">
                            <select id="categoryFilter">
                                <option value="all">All Categories</option>
                                <option value="pharma">Pharma</option>
                                <option value="diagnostics">Diagnostics</option>
                                <option value="life-sciences">Life Sciences</option>
                                <option value="materials">Materials</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="blog-grid">
                    <!-- Blog Card 1 -->
                    <article class="blog-card" data-category="pharma">
                        <a href="single-blog.html" class="card-image"><img src="https://plus.unsplash.com/premium_photo-1676642738234-9394f47ed153?q=80&w=1000&auto=format&fit=crop" alt="Pharmaceutical Research"></a>
                        <div class="card-content">
                            <h2><a href="single-blog.html">The Future of AI in Pharmaceutical Drug Discovery</a></h2>
                            <p class="blog-meta">By Dr. Alex Chen | Published on Oct 26, 2023</p>
                            <p class="card-description">Exploring how artificial intelligence is accelerating research, reducing costs, and revolutionizing the pharma industry.</p>
                            <a href="single-blog.html" class="btn">Read More</a>
                        </div>
                    </article>

                    <!-- Blog Card 2 -->
                    <article class="blog-card" data-category="diagnostics">
                        <a href="single-blog.html" class="card-image"><img src="https://images.unsplash.com/photo-1579154230350-fd405dde4664?q=80&w=1000&auto=format&fit=crop" alt="Diagnostics Lab"></a>
                        <div class="card-content">
                            <h2><a href="single-blog.html">Next-Gen Sequencing: A New Era for Diagnostics</a></h2>
                            <p class="blog-meta">By Dr. Maria Rodriguez | Published on Oct 22, 2023</p>
                            <p class="card-description">A deep dive into how NGS technologies are changing the landscape of genetic testing and personalized medicine.</p>
                            <a href="single-blog.html" class="btn">Read More</a>
                        </div>
                    </article>

                    <!-- Blog Card 3 -->
                    <article class="blog-card" data-category="life-sciences">
                        <a href="single-blog.html" class="card-image"><img src="https://images.unsplash.com/photo-1532187643623-dbf267341857?q=80&w=1000&auto=format&fit=crop" alt="Lab Research"></a>
                        <div class="card-content">
                            <h2><a href="single-blog.html">5 Key Procurement Strategies for Life Science Labs</a></h2>
                            <p class="blog-meta">By John Carter | Published on Oct 18, 2023</p>
                            <p class="card-description">Optimize your lab's supply chain with these five proven strategies for efficient and cost-effective procurement.</p>
                            <a href="single-blog.html" class="btn">Read More</a>
                        </div>
                    </article>

                    <!-- Blog Card 4 -->
                    <article class="blog-card" data-category="materials">
                        <a href="single-blog.html" class="card-image"><img src="https://images.unsplash.com/photo-1628862507388-5893a6755498?q=80&w=1000&auto=format&fit=crop" alt="Advanced Materials"></a>
                        <div class="card-content">
                            <h2><a href="single-blog.html">Innovations in Biomaterials for Medical Implants</a></h2>
                            <p class="blog-meta">By Dr. Emily White | Published on Oct 15, 2023</p>
                            <p class="card-description">Discover the latest advancements in biocompatible materials that are improving patient outcomes and device longevity.</p>
                            <a href="single-blog.html" class="btn">Read More</a>
                        </div>
                    </article>

                    <!-- Blog Card 5 -->
                    <article class="blog-card" data-category="pharma">
                        <a href="single-blog.html" class="card-image"><img src="https://images.unsplash.com/photo-1581093450021-4a7360aa9a23?q=80&w=1000&auto=format&fit=crop" alt="Lab Equipment"></a>
                        <div class="card-content">
                            <h2><a href="single-blog.html">Streamlining Clinical Trial Supply Chains</a></h2>
                            <p class="blog-meta">By Dr. Alex Chen | Published on Oct 11, 2023</p>
                            <p class="card-description">Effective management of clinical trial logistics is crucial for success. Here’s how technology is making it easier.</p>
                            <a href="single-blog.html" class="btn">Read More</a>
                        </div>
                    </article>

                    <!-- Blog Card 6 -->
                    <article class="blog-card" data-category="diagnostics">
                        <a href="single-blog.html" class="card-image"><img src="https://images.unsplash.com/photo-1576091160399-112ba8d25d1d?q=80&w=1000&auto=format&fit=crop" alt="Medical Technology"></a>
                        <div class="card-content">
                            <h2><a href="single-blog.html">The Rise of Point-of-Care Diagnostic Testing</a></h2>
                            <p class="blog-meta">By Dr. Maria Rodriguez | Published on Oct 05, 2023</p>
                            <p class="card-description">How rapid diagnostic tests are empowering clinicians and improving patient care outside of traditional lab settings.</p>
                            <a href="single-blog.html" class="btn">Read More</a>
                        </div>
                    </article>
                </div>

                <nav aria-label="Page navigation">
                    <ul class="pagination">
                        <li><a href="#">&laquo; Previous</a></li>
                        <li class="active"><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">Next &raquo;</a></li>
                    </ul>
                </nav>

            </div>
        </section>
    </main>
<!-- Footer HTML is identical to listing page -->
    @include('home.footer')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const searchInput = document.getElementById('searchInput');
            const categoryFilter = document.getElementById('categoryFilter');
            const blogCards = document.querySelectorAll('.blog-card');

            function filterBlogs() {
                const searchTerm = searchInput.value.toLowerCase();
                const selectedCategory = categoryFilter.value;

                blogCards.forEach(card => {
                    const title = card.querySelector('h2 a').textContent.toLowerCase();
                    const description = card.querySelector('.card-description').textContent.toLowerCase();
                    const cardCategory = card.dataset.category;

                    const matchesSearch = title.includes(searchTerm) || description.includes(searchTerm);
                    const matchesCategory = selectedCategory === 'all' || cardCategory === selectedCategory;

                    if (matchesSearch && matchesCategory) {
                        card.style.display = 'flex';
                    } else {
                        card.style.display = 'none';
                    }
                });
            }

            searchInput.addEventListener('keyup', filterBlogs);
            categoryFilter.addEventListener('change', filterBlogs);
        });
    </script>
</body>
</html>