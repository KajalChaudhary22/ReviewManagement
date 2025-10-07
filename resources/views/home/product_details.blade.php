<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SCIZORA</title>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Inter:wght@300;400;500;600&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-blue: #1544da;
            --accent-blue: #E6F0F8;
            --text-dark: #333333;
            --text-black: #000000;
            --text-light: #666666;
            --border-color: #e0e0e0;
            --white: #ffffff;
            --gold: #FFC107;
            --shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            --transition: all 0.3s ease;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            color: var(--text-dark);
            background-color: var(--white);
            line-height: 1.6;
            overflow-x: hidden;
        }

        h1,
        h2,
        h3,
        h4,
        h5 {
            font-family: 'Poppins', sans-serif;
            color: var(--text-black);
            font-weight: 600;
        }

        .container {
            max-width: 1280px;
            margin: 0 auto;
            padding: 0 20px;
        }

        /* Header Styles */
        /* header {
            background-color: #FFFFFF;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
            padding: 1rem 5%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: sticky;
            top: 0;
            z-index: 1000;
        } */

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

        .nav-menu a:hover,
        .nav-menu a.active {
            color: #0A47A9;
        }

        .header-right {
            display: flex;
            align-items: center;
            gap: 20px;
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
            /* Changed to be controlled by JS */
            position: absolute;
            right: 0;
            background-color: #FFFFFF;
            min-width: 180px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
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

        /* Mobile Navigation */
        .hamburger {
            display: none;
            background: none;
            border: none;
            font-size: 24px;
            color: var(--primary-blue);
            cursor: pointer;
            z-index: 1001;
        }

        .mobile-nav {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: var(--white);
            z-index: 1002;
            display: flex;
            flex-direction: column;
            padding: 80px 30px 30px;
            transform: translateX(-100%);
            transition: transform 0.4s ease;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        .mobile-nav.active {
            transform: translateX(0);
        }

        .mobile-nav-header {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            padding: 15px 20px;
            background: var(--white);
            border-bottom: 1px solid var(--border-color);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .mobile-nav-links {
            list-style: none;
            padding: 0;
            margin-top: 20px;
        }

        .mobile-nav-links li {
            margin-bottom: 15px;
            padding: 10px 0;
            border-bottom: 1px solid var(--border-color);
        }

        .mobile-nav-links a {
            text-decoration: none;
            color: var(--text-dark);
            font-size: 18px;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 15px;
            padding: 10px;
            border-radius: 4px;
            transition: background-color 0.3s;
        }

        .mobile-nav-links a:hover {
            background-color: var(--accent-blue);
            color: var(--primary-blue);
        }

        .close-mobile-nav {
            background: none;
            border: none;
            font-size: 24px;
            color: var(--primary-blue);
            cursor: pointer;
        }

        /* Breadcrumbs */
        .breadcrumbs {
            padding: 20px 0;
            font-size: 14px;
            color: var(--text-light);
        }

        .breadcrumbs a {
            color: var(--primary-blue);
            text-decoration: none;
            transition: var(--transition);
        }

        .breadcrumbs a:hover {
            text-decoration: underline;
        }

        .breadcrumbs span {
            margin: 0 8px;
            color: var(--text-light);
        }

        /* Product Header */
        .product-header {
            margin-bottom: 30px;
        }

        .product-title {
            font-size: 36px;
            margin-bottom: 8px;
            color: var(--text-black);
            line-height: 1.2;
        }

        .vendor {
            font-size: 18px;
            color: var(--text-light);
            margin-bottom: 20px;
        }

        .summary-bar {
            display: flex;
            align-items: center;
            padding: 15px 0;
            border-top: 1px solid var(--border-color);
            border-bottom: 1px solid var(--border-color);
        }

        .rating {
            display: flex;
            align-items: center;
            margin-right: 30px;
        }

        .stars {
            color: var(--gold);
            margin-right: 10px;
        }

        .stars i {
            font-size: 18px;
            margin-right: 2px;
        }

        .rating-value {
            font-weight: 600;
            margin-right: 10px;
        }

        .reviews-link {
            color: var(--primary-blue);
            text-decoration: none;
            font-weight: 500;
            transition: var(--transition);
            cursor: pointer;
        }

        .reviews-link:hover {
            text-decoration: underline;
        }

        .sku {
            margin-left: auto;
            font-size: 14px;
            color: var(--text-light);
        }

        /* Main Content Layout */
        .main-content {
            display: flex;
            margin: 40px 0;
            gap: 40px;
        }

        .left-column {
            flex: 0 0 68%;
        }

        .right-column {
            flex: 0 0 28%;
        }

        /* Image Carousel */
        .carousel {
            position: relative;
            margin-bottom: 40px;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: var(--shadow);
        }

        .main-image {
            width: 100%;
            height: 450px;
            background-color: #f8f9fa;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
        }

        .main-image img {
            max-width: 80%;
            max-height: 80%;
            object-fit: contain;
        }

        .carousel-nav {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            width: 100%;
            display: flex;
            justify-content: space-between;
            padding: 0 15px;
            opacity: 0;
            transition: var(--transition);
        }

        .carousel:hover .carousel-nav {
            opacity: 1;
        }

        .carousel-btn {
            background-color: rgba(255, 255, 255, 0.8);
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary-blue);
            font-size: 18px;
            cursor: pointer;
            transition: var(--transition);
            border: none;
        }

        .carousel-btn:hover {
            background-color: var(--white);
            transform: scale(1.1);
        }

        .thumbnails {
            display: flex;
            justify-content: center;
            padding: 15px 0;
            gap: 10px;
            flex-wrap: wrap;
        }

        .thumbnail {
            width: 70px;
            height: 70px;
            border: 2px solid transparent;
            border-radius: 4px;
            overflow: hidden;
            cursor: pointer;
            transition: var(--transition);
            background-color: #f8f9fa;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .thumbnail img {
            max-width: 90%;
            max-height: 90%;
            object-fit: contain;
        }

        .thumbnail.active,
        .thumbnail:hover {
            border-color: var(--primary-blue);
        }

        /* Tabs */
        .tabs {
            margin-bottom: 40px;
        }

        .tab-header {
            display: flex;
            border-bottom: 1px solid var(--border-color);
            margin-bottom: 25px;
            flex-wrap: wrap;
        }

        .tab-btn {
            padding: 12px 25px;
            font-size: 16px;
            font-weight: 500;
            background: none;
            border: none;
            cursor: pointer;
            position: relative;
            color: var(--text-light);
            transition: var(--transition);
        }

        .tab-btn.active {
            color: var(--primary-blue);
        }

        .tab-btn.active::after {
            content: '';
            position: absolute;
            bottom: -1px;
            left: 0;
            width: 100%;
            height: 3px;
            background-color: var(--primary-blue);
        }

        .tab-content {
            display: none;
        }

        .tab-content.active {
            display: block;
            animation: fadeIn 0.5s ease;
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

        .section-title {
            font-size: 24px;
            margin-bottom: 20px;
            color: var(--text-black);
        }

        .overview-text {
            margin-bottom: 20px;
            font-size: 16px;
            line-height: 1.7;
        }

        /* Specifications */
        .specs-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
        }

        .spec-item {
            padding: 15px 0;
            border-bottom: 1px solid var(--border-color);
        }

        .spec-label {
            font-weight: 600;
            color: var(--text-black);
            margin-bottom: 5px;
        }

        /* Reviews */
        .reviews-summary {
            background-color: var(--accent-blue);
            border-radius: 8px;
            padding: 25px;
            margin-bottom: 30px;
        }

        .summary-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
            flex-wrap: wrap;
            gap: 20px;
        }

        .overall-rating {
            display: flex;
            align-items: center;
        }

        .big-rating {
            font-size: 48px;
            font-weight: 700;
            margin-right: 20px;
            color: var(--text-black);
        }

        .rating-breakdown {
            flex: 1;
        }

        .rating-bar {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }

        .stars-label {
            width: 80px;
            font-size: 14px;
        }

        .bar-container {
            flex: 1;
            height: 10px;
            background-color: #e0e0e0;
            border-radius: 5px;
            margin: 0 15px;
            overflow: hidden;
        }

        .bar {
            height: 100%;
            background-color: var(--gold);
            border-radius: 5px;
        }

        .percentage {
            width: 40px;
            text-align: right;
            font-size: 14px;
        }

        .write-review-btn {
            background-color: var(--primary-blue);
            color: var(--white);
            border: none;
            padding: 12px 25px;
            font-size: 16px;
            font-weight: 600;
            border-radius: 6px;
            cursor: pointer;
            transition: var(--transition);
            display: inline-flex;
            align-items: center;
            white-space: nowrap;
        }

        .write-review-btn i {
            margin-right: 8px;
        }

        .write-review-btn:hover {
            background-color: #1137b0;
            transform: translateY(-2px);
        }

        .reviews-controls {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
            flex-wrap: wrap;
            gap: 15px;
        }

        .sort-select {
            padding: 8px 15px;
            border: 1px solid var(--border-color);
            border-radius: 4px;
            background-color: var(--white);
            font-family: 'Inter', sans-serif;
            font-size: 14px;
        }

        /* Review Cards */
        .review-card {
            border: 1px solid var(--border-color);
            border-radius: 8px;
            padding: 25px;
            margin-bottom: 25px;
            background-color: var(--white);
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 0.5s ease, transform 0.5s ease;
        }

        .review-card.visible {
            opacity: 1;
            transform: translateY(0);
        }

        .review-header {
            display: flex;
            justify-content: space-between;
            margin-bottom: 15px;
            flex-wrap: wrap;
            gap: 10px;
        }

        .reviewer {
            font-weight: 600;
            color: var(--text-black);
        }

        .verified-badge {
            background-color: var(--accent-blue);
            color: var(--primary-blue);
            font-size: 12px;
            font-weight: 600;
            padding: 3px 8px;
            border-radius: 4px;
            margin-left: 10px;
        }

        .review-stars {
            color: var(--gold);
            margin-bottom: 10px;
        }

        .review-title {
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 15px;
            color: var(--text-black);
        }

        .pros-cons {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            margin-bottom: 15px;
        }

        .pros,
        .cons {
            display: flex;
        }

        .pros i {
            color: #28a745;
            margin-right: 10px;
            font-size: 18px;
        }

        .cons i {
            color: #dc3545;
            margin-right: 10px;
            font-size: 18px;
        }

        .review-text {
            margin-bottom: 20px;
            line-height: 1.7;
        }

        .review-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: var(--text-light);
            font-size: 14px;
            flex-wrap: wrap;
            gap: 15px;
        }

        .helpful-section {
            display: flex;
            align-items: center;
            flex-wrap: wrap;
            gap: 8px;
        }

        .helpful-text {
            margin-right: 10px;
        }

        .helpful-btn {
            background: none;
            border: 1px solid var(--border-color);
            padding: 5px 15px;
            border-radius: 4px;
            cursor: pointer;
            transition: var(--transition);
        }

        .helpful-btn:hover {
            background-color: var(--accent-blue);
            border-color: var(--primary-blue);
        }

        /* Resources */
        .resource-list {
            list-style: none;
        }

        .resource-item {
            padding: 15px 0;
            border-bottom: 1px solid var(--border-color);
            display: flex;
            align-items: center;
        }

        .resource-item:last-child {
            border-bottom: none;
        }

        .resource-icon {
            color: var(--primary-blue);
            font-size: 20px;
            margin-right: 15px;
            width: 24px;
            text-align: center;
        }

        .resource-link {
            color: var(--primary-blue);
            text-decoration: none;
            font-weight: 500;
            transition: var(--transition);
        }

        .resource-link:hover {
            text-decoration: underline;
        }

        /* Sidebar */
        .sidebar {
            position: sticky;
            top: 100px;
        }

        .sidebar-card {
            background-color: var(--white);
            border-radius: 8px;
            box-shadow: var(--shadow);
            padding: 30px;
            margin-bottom: 30px;
        }

        .testimonial-card {
            background-color: var(--accent-blue);
            position: relative;
            overflow: hidden;
        }

        .testimonial-card::before {
            content: "\201C";
            position: absolute;
            top: 20px;
            left: 20px;
            font-family: Georgia, serif;
            font-size: 100px;
            color: rgba(0, 90, 156, 0.1);
            line-height: 1;
        }

        .testimonial-card::after {
            content: "\201D";
            position: absolute;
            bottom: -30px;
            right: 20px;
            font-family: Georgia, serif;
            font-size: 100px;
            color: rgba(0, 90, 156, 0.1);
            line-height: 1;
            transform: rotate(180deg);
        }

        .testimonial-text {
            font-style: italic;
            font-size: 18px;
            line-height: 1.6;
            margin-bottom: 20px;
            position: relative;
            z-index: 1;
        }

        .testimonial-author {
            font-weight: 600;
            position: relative;
            z-index: 1;
        }

        .cta-title {
            text-align: center;
            margin-bottom: 20px;
            color: var(--primary-blue);
        }

        .cta-buttons {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .cta-btn {
            padding: 14px 20px;
            border-radius: 6px;
            font-weight: 600;
            font-size: 16px;
            text-align: center;
            text-decoration: none;
            transition: var(--transition);
            display: block;
        }

        .cta-primary {
            background-color: var(--primary-blue);
            color: var(--white);
        }

        .cta-primary:hover {
            background-color: #1137b0;
            transform: translateY(-2px);
        }

        .cta-secondary {
            background-color: var(--white);
            color: var(--primary-blue);
            border: 2px solid var(--primary-blue);
        }

        .cta-secondary:hover {
            background-color: var(--accent-blue);
            transform: translateY(-2px);
        }

        .why-title {
            color: var(--primary-blue);
            margin-bottom: 20px;
            text-align: center;
        }

        .benefits-list {
            list-style: none;
        }

        .benefit-item {
            display: flex;
            align-items: flex-start;
            margin-bottom: 15px;
        }

        .benefit-item i {
            color: var(--primary-blue);
            font-size: 18px;
            margin-right: 12px;
            margin-top: 4px;
        }
        .submit-btn {
            background-color: var(--primary-blue);
            color: var(--white);
            border: none;
            padding: 14px 25px;
            font-size: 16px;
            font-weight: 600;
            border-radius: 6px;
            cursor: pointer;
            transition: var(--transition);
            display: block;
            width: 100%;
            margin-top: 20px;
        }

        .submit-btn:hover {
            background-color: #1137b0;
        }

        .required-field::after {
            content: " *";
            color: red;
        }

        /* Review Modal */
        .modal-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.6);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 2000;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
        }

        .modal-overlay.active {
            opacity: 1;
            visibility: visible;
        }

        .review-modal {
            background-color: var(--white);
            border-radius: 8px;
            width: 90%;
            max-width: 600px;
            max-height: 90vh;
            overflow-y: auto;
            padding: 30px;
            position: relative;
            transform: translateY(-20px);
            transition: transform 0.3s ease;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        }

        .modal-overlay.active .review-modal {
            transform: translateY(0);
        }
        .modal-overlay.active {
            opacity: 1;
            visibility: visible;
        }

        .quote-modal, .specialist-modal {
            background-color: var(--white);
            border-radius: 8px;
            width: 90%;
            max-width: 500px;
            max-height: 90vh;
            overflow-y: auto;
            padding: 30px;
            position: relative;
            transform: translateY(-20px);
            transition: transform 0.3s ease;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        }

        .modal-overlay.active .quote-modal,
        .modal-overlay.active .specialist-modal {
            transform: translateY(0);
        }

        .close-modal {
            position: absolute;
            top: 15px;
            right: 15px;
            background: none;
            border: none;
            font-size: 24px;
            color: var(--text-light);
            cursor: pointer;
            transition: color 0.3s;
            z-index: 10;
        }

        .close-modal:hover {
            color: var(--primary-blue);
        }

        .modal-title {
            font-size: 24px;
            margin-bottom: 25px;
            color: var(--primary-blue);
            text-align: center;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: var(--text-black);
        }

        .form-group input,
        .form-group textarea,
        .form-group select {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid var(--border-color);
            border-radius: 4px;
            font-family: 'Inter', sans-serif;
            font-size: 16px;
            transition: border-color 0.3s;
        }

        .form-group input:focus,
        .form-group textarea:focus,
        .form-group select:focus {
            outline: none;
            border-color: var(--primary-blue);
        }

        .form-group textarea {
            min-height: 120px;
            resize: vertical;
        }

        .star-rating {
            display: flex;
            gap: 5px;
            margin-bottom: 10px;
        }

        .star-rating i {
            font-size: 24px;
            color: #ddd;
            cursor: pointer;
            transition: color 0.3s;
        }

        .star-rating i.active {
            color: var(--gold);
        }

        .submit-review-btn {
            background-color: var(--primary-blue);
            color: var(--white);
            border: none;
            padding: 14px 25px;
            font-size: 16px;
            font-weight: 600;
            border-radius: 6px;
            cursor: pointer;
            transition: var(--transition);
            display: block;
            width: 100%;
            margin-top: 20px;
        }

        .submit-review-btn:hover {
            background-color: #004a83;
        }

        /* Footer */
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

        .scizora-footer-column>* {
            margin-bottom: 0.5rem;
        }

        .scizora-footer-column>*:last-child {
            margin-bottom: 0;
        }

        .scizora-footer-heading,
        .scizora-footer-logo-heading {
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

        .scizora-social-links {
            display: flex;
            gap: 1rem;
        }

        .scizora-social-icon {
            color: #9CA3AF;
            transition: color 0.2s ease;
        }

        .scizora-social-icon:hover {
            color: #ffffff;
        }

        .scizora-footer-link {
            color: #9CA3AF;
            text-decoration: none;
            font-size: 0.875rem;
        }

        .scizora-footer-link:hover {
            color: #ffffff;
        }

        .scizora-newsletter-form {
            display: flex;
        }

        .scizora-newsletter-input {
            background-color: #1F2937;
            color: #ffffff;
            padding: 6px 12px;
            border: none;
            border-radius: 4px 0 0 4px;
            outline: none;
            width: 100%;
            font-size: 0.875rem;
        }

        .scizora-newsletter-button {
            background-color: #2563EB;
            color: #ffffff;
            padding: 6px 12px;
            border: none;
            border-radius: 0 4px 4px 0;
            cursor: pointer;
        }

        .scizora-newsletter-button:hover {
            background-color: #1D4ED8;
        }

        /* Responsive Design */
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

        @media (max-width: 1100px) {
            .main-content {
                flex-direction: column;
            }

            .left-column,
            .right-column {
                flex: 1;
                width: 100%;
            }

            .sidebar {
                position: static;
            }

            .pros-cons {
                grid-template-columns: 1fr;
                gap: 15px;
            }
        }

        @media (max-width: 768px) {
            .specs-grid {
                grid-template-columns: 1fr;
            }

            .nav-menu {
                display: none;
            }

            .hamburger {
                display: block;
            }

            .summary-bar {
                flex-direction: column;
                align-items: flex-start;
                gap: 12px;
            }

            .rating {
                margin-right: 0;
            }

            .sku {
                margin-left: 0;
            }

            .main-image {
                height: 300px;
            }

            .summary-header {
                flex-direction: column;
                align-items: flex-start;
            }

            .overall-rating {
                margin-bottom: 20px;
            }

            .product-title {
                font-size: 28px;
            }

            .big-rating {
                font-size: 36px;
            }

            .review-footer {
                flex-direction: column;
                align-items: flex-start;
            }

            .helpful-section {
                margin-top: 10px;
            }
        }

        @media (max-width: 480px) {
            .breadcrumbs {
                font-size: 12px;
            }
            
            .tab-header {
                gap: 5px;
            }
            
            .tab-btn {
                padding: 8px 12px;
                font-size: 14px;
            }
            
            .reviews-controls {
                flex-direction: column;
                align-items: flex-start;
            }
            
            .review-modal, .quote-modal, .specialist-modal {
                padding: 20px;
            }
        }
    </style>
    @include('home.styles')
</head>

<body>
    <!-- Header -->
    {{-- <header>
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
            <button class="hamburger" id="hamburger">
                <i class="fas fa-bars"></i>
            </button>
        </div>
    </header> --}}
    @include('home.header')

    <!-- Mobile Navigation -->
    <div class="mobile-nav" id="mobile-nav">
        <div class="mobile-nav-header">
            <a href="index.html" class="logo"><img src="logo.jpg" alt="SCIZORA Logo" width="150"
                    height="50"></a>
            <button class="close-mobile-nav" id="close-mobile-nav">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <ul class="mobile-nav-links">
            <li><a href="index.html"><i class="fas fa-home"></i> Home</a></li>
            <li><a href="categories.html"><i class="fas fa-th-large"></i> Categories</a></li>
            <li><a href="blog.html"><i class="fas fa-newspaper"></i> Blog</a></li>
            <li><a href="aboutus.html"><i class="fas fa-info-circle"></i> About Us</a></li>
            <li><a href="contactus.html"><i class="fas fa-envelope"></i> Contact</a></li>
        </ul>
    </div>

    <div class="container">
        <!-- Breadcrumbs -->
        <div class="breadcrumbs">
            <a href="#"><i class="fas fa-home"></i> Home</a> <span>></span>
            <a href="#">Products</a> <span>></span>
            <a href="#">{{ $productDetails?->categoryDetails?->name }}</a> <span>></span>
            <span>{{ $productDetails?->name }}</span>
        </div>

        <!-- Product Header -->
        <div class="product-header">
            <h1 class="product-title">{{ $productDetails?->name }}</h1>
            <div class="vendor">From: {{ $productDetails?->businessDetails?->name }}</div>
            <div class="summary-bar">
                @php
                    $averageRating = $productDetails?->ratingData?->avg('rating') ?? 0;
                    $fullStars = floor($averageRating);
                    $halfStar = $averageRating - $fullStars >= 0.5 ? 1 : 0;
                    $emptyStars = 5 - $fullStars - $halfStar;
                @endphp
                <div class="rating">
                    <div class="stars">
                        {{-- Full Stars --}}
                        @for ($i = 0; $i < $fullStars; $i++)
                            <i class="fas fa-star"></i>
                        @endfor

                        {{-- Half Star --}}
                        @if ($halfStar)
                            <i class="fas fa-star-half-alt"></i>
                        @endif

                        {{-- Empty Stars --}}
                        @for ($i = 0; $i < $emptyStars; $i++)
                            <i class="far fa-star"></i>
                        @endfor
                    </div>
                    <span class="rating-value">{{ number_format($averageRating, 1) }}</span>
                    <a class="reviews-link" id="reviews-link">{{ $productDetails?->reviewsData?->count() }} Reviews</a>
                </div>
                <div class="sku">{{ $productDetails?->code }}</div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="main-content">
            <!-- Left Column -->
            <div class="left-column">
                <!-- Image Carousel -->
                <div class="carousel">
                    <div class="main-image">
                        <img src="{{ asset($productDetails->images->first()?->path) }}"
                            alt="{{ $productDetails?->name }}" id="main-img">
                        <div class="carousel-nav">
                            <button class="carousel-btn" id="prev-btn"><i class="fas fa-chevron-left"></i></button>
                            <button class="carousel-btn" id="next-btn"><i class="fas fa-chevron-right"></i></button>
                        </div>
                    </div>
                    <div class="thumbnails">
                        @foreach ($productDetails->images as $index => $image)
                            <div class="thumbnail {{ $index == 0 ? 'active' : '' }}"
                                data-img="{{ asset($image?->path) }}">
                                <img src="{{ asset($image?->path) }}" alt="Thumbnail {{ $index + 1 }}">
                            </div>
                        @endforeach
                        {{-- <div class="thumbnail active" data-img="https://via.placeholder.com/800x600/005A9C/FFFFFF?text=SCIZORA+Hematology+Pro">
                            <img src="https://via.placeholder.com/100x75/005A9C/FFFFFF?text=Thumb+1" alt="Thumbnail 1">
                        </div>
                        <div class="thumbnail" data-img="https://via.placeholder.com/800x600/1a6db1/FFFFFF?text=Product+Front+View">
                            <img src="https://via.placeholder.com/100x75/1a6db1/FFFFFF?text=Thumb+2" alt="Thumbnail 2">
                        </div>
                        <div class="thumbnail" data-img="https://via.placeholder.com/800x600/0d4a7e/FFFFFF?text=Product+Side+View">
                            <img src="https://via.placeholder.com/100x75/0d4a7e/FFFFFF?text=Thumb+3" alt="Thumbnail 3">
                        </div>
                        <div class="thumbnail" data-img="https://via.placeholder.com/800x600/2c7cba/FFFFFF?text=Product+In+Use">
                            <img src="https://via.placeholder.com/100x75/2c7cba/FFFFFF?text=Thumb+4" alt="Thumbnail 4">
                        </div> --}}
                    </div>
                </div>

                <!-- Tabbed Content -->
                <div class="tabs">
                    <div class="tab-header">
                        <button class="tab-btn active" data-tab="overview"><b>Overview</b></button>
                        <button class="tab-btn" data-tab="specifications"><b>Specifications</b></button>
                        <button class="tab-btn" data-tab="reviews"><b>Ratings & Reviews</b></button>
                        <button class="tab-btn" data-tab="resources"><b>Resources</b></button>
                    </div>

                    <div class="tab-content active" id="overview">
                        <h2 class="section-title">Product Overview</h2>
                        {!! $productDetails?->overview !!}
                        {{-- <p class="overview-text">The Aerospray® Hematology Pro is a state-of-the-art slide stainer and cytocentrifuge designed for modern clinical laboratories. This innovative instrument combines rapid staining with precise cytocentrifugation, streamlining your hematology workflow.</p>
                        <p class="overview-text">Featuring advanced automation and intuitive controls, the Aerospray Pro delivers consistent, high-quality slides with minimal operator intervention. Its dual functionality reduces the need for multiple instruments, saving valuable bench space and improving laboratory efficiency.</p>
                        <p class="overview-text">With programmable protocols and remote monitoring capabilities, the Aerospray Pro ensures standardization across all procedures while providing the flexibility needed for specialized testing requirements.</p>
                        
                        <div class="overview-text">
                            <h3>Key Benefits:</h3>
                            <ul>
                                <li><strong>Increased Efficiency:</strong> Process up to 48 slides simultaneously</li>
                                <li><strong>Consistent Results:</strong> Automated protocols ensure standardization</li>
                                <li><strong>Space Saving Design:</strong> Combines two essential lab functions in one instrument</li>
                                <li><strong>Remote Monitoring:</strong> Track progress from anywhere in the lab</li>
                                <li><strong>Reduced Reagent Consumption:</strong> Optimized systems minimize waste</li>
                            </ul>
                        </div> --}}
                    </div>

                    <div class="tab-content" id="specifications">
                        <h2 class="section-title">Product Specifications</h2>
                        {!! $productDetails?->specification !!}
                        {{-- <div class="specs-grid">
                            <div class="spec-item">
                                <div class="spec-label">Dimensions</div>
                                <div>45cm (W) × 60cm (D) × 40cm (H)</div>
                            </div>
                            <div class="spec-item">
                                <div class="spec-label">Weight</div>
                                <div>42kg</div>
                            </div>
                            <div class="spec-item">
                                <div class="spec-label">Power Requirements</div>
                                <div>100-240V AC, 50/60Hz</div>
                            </div>
                            <div class="spec-item">
                                <div class="spec-label">Slide Capacity</div>
                                <div>Up to 48 slides per run</div>
                            </div>
                            <div class="spec-item">
                                <div class="spec-label">Staining Time</div>
                                <div>3-15 minutes (programmable)</div>
                            </div>
                            <div class="spec-item">
                                <div class="spec-label">Reagent Consumption</div>
                                <div>0.5-1.2mL per slide</div>
                            </div>
                            <div class="spec-item">
                                <div class="spec-label">Centrifugation Speed</div>
                                <div>500-1500 RPM (adjustable)</div>
                            </div>
                            <div class="spec-item">
                                <div class="spec-label">Connectivity</div>
                                <div>Ethernet, USB, Wi-Fi</div>
                            </div>
                            <div class="spec-item">
                                <div class="spec-label">Temperature Range</div>
                                <div>15°C - 30°C (operation)</div>
                            </div>
                            <div class="spec-item">
                                <div class="spec-label">Humidity Range</div>
                                <div>20% - 80% RH (non-condensing)</div>
                            </div>
                        </div> --}}
                    </div>

                    <div class="tab-content" id="reviews">
                        <div id="reviews">
                            <h2 class="section-title">Ratings & Reviews</h2>

                            <div class="reviews-summary">
                                <div class="summary-header">
                                    <div class="overall-rating">
                                        <div class="big-rating">4.9</div>
                                        <div>
                                            <div class="stars">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                            </div>
                                            <div>Based on 158 reviews</div>
                                        </div>
                                    </div>
                                    <button class="write-review-btn" id="write-review-btn"><i class="fas fa-pen"></i>
                                        Write a Review</button>
                                </div>

                                <div class="rating-breakdown">
                                    <div class="rating-bar">
                                        <div class="stars-label">5 star</div>
                                        <div class="bar-container">
                                            <div class="bar" style="width: 85%"></div>
                                        </div>
                                        <div class="percentage">85%</div>
                                    </div>
                                    <div class="rating-bar">
                                        <div class="stars-label">4 star</div>
                                        <div class="bar-container">
                                            <div class="bar" style="width: 10%"></div>
                                        </div>
                                        <div class="percentage">10%</div>
                                    </div>
                                    <div class="rating-bar">
                                        <div class="stars-label">3 star</div>
                                        <div class="bar-container">
                                            <div class="bar" style="width: 3%"></div>
                                        </div>
                                        <div class="percentage">3%</div>
                                    </div>
                                    <div class="rating-bar">
                                        <div class="stars-label">2 star</div>
                                        <div class="bar-container">
                                            <div class="bar" style="width: 1%"></div>
                                        </div>
                                        <div class="percentage">1%</div>
                                    </div>
                                    <div class="rating-bar">
                                        <div class="stars-label">1 star</div>
                                        <div class="bar-container">
                                            <div class="bar" style="width: 1%"></div>
                                        </div>
                                        <div class="percentage">1%</div>
                                    </div>
                                </div>
                            </div>

                            <div class="reviews-controls">
                                <div>158 reviews</div>
                                <div>
                                    <label for="sort-select">Sort by:</label>
                                    <select class="sort-select" id="sort-select">
                                        <option>Most Recent</option>
                                        <option>Highest Rated</option>
                                        <option>Most Helpful</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Review Cards -->
                            @if($productDetails?->reviewsData)
                                @foreach ($productDetails?->reviewsData as $review)
                                    @php
                                        $fullStars = floor($review?->rating);
                                        $halfStar = $review?->rating - $fullStars >= 0.5 ? 1 : 0;
                                        $emptyStars = 5 - $fullStars - $halfStar;
                                    @endphp
                                    <div class="review-card">
                                        <div class="review-header">
                                            <div>
                                                <span class="reviewer">{{ $review?->customerDetails?->name }}</span>
                                                <span class="verified-badge">Verified Purchaser</span>
                                            </div>
                                        </div>
                                        <div class="review-stars">
                                            {{-- Full Stars --}}
                                            @for ($i = 0; $i < $fullStars; $i++)
                                                <i class="fas fa-star"></i>
                                            @endfor

                                            {{-- Half Star --}}
                                            @if ($halfStar)
                                                <i class="fas fa-star-half-alt"></i>
                                            @endif

                                            {{-- Empty Stars --}}
                                            @for ($i = 0; $i < $emptyStars; $i++)
                                                <i class="far fa-star"></i>
                                            @endfor
                                        </div>
                                        <h3 class="review-title">{{ $review?->title }}</h3>
                                        <div class="pros-cons">
                                            <div class="pros">
                                                <i class="fas fa-thumbs-up"></i>
                                                <div>{{ $review->pros }}</div>
                                            </div>
                                            <div class="cons">
                                                <i class="fas fa-thumbs-down"></i>
                                                <div>{{ $review->cons }}</div>
                                            </div>
                                        </div>
                                        <p class="review-text">{{ $review?->comment }}</p>
                                        <div class="review-footer">
                                            <div class="date">Reviewed on: {{ \Carbon\Carbon::parse($review->created_at)->format('M d, Y') }}</div>
                                            <div class="helpful-section">
                                                <span class="helpful-text">Helpful?</span>
                                                <button class="helpful-btn">Yes ({{ $review->helpful_count }})</button>
                                                <button class="helpful-btn">No ({{ $review->not_helpful_count }})</button>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                            <!-- Sample Review Cards -->
                            <div class="review-card">
                                <div class="review-header">
                                    <div>
                                        <span class="reviewer">Dr. Michael Chen</span>
                                        <span class="verified-badge">Verified Purchaser</span>
                                    </div>
                                </div>
                                <div class="review-stars">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <h3 class="review-title">Revolutionized our lab's workflow</h3>
                                <div class="pros-cons">
                                    <div class="pros">
                                        <i class="fas fa-thumbs-up"></i>
                                        <div>Time-saving, consistent results, easy maintenance</div>
                                    </div>
                                    <div class="cons">
                                        <i class="fas fa-thumbs-down"></i>
                                        <div>Initial setup took longer than expected</div>
                                    </div>
                                </div>
                                <p class="review-text">The Aerospray Pro has transformed our hematology department. The
                                    dual functionality has reduced processing time by nearly 40%, and the staining
                                    quality is consistently excellent. The remote monitoring feature allows our
                                    technicians to multitask efficiently. After 6 months of daily use, we've had zero
                                    downtime.</p>
                                <div class="review-footer">
                                    <div class="date">Reviewed on: Oct 26, 2023</div>
                                    <div class="helpful-section">
                                        <span class="helpful-text">Helpful?</span>
                                        <button class="helpful-btn">Yes (42)</button>
                                        <button class="helpful-btn">No (1)</button>
                                    </div>
                                </div>
                            </div>

                            <div class="review-card">
                                <div class="review-header">
                                    <div>
                                        <span class="reviewer">Pathology Solutions Inc.</span>
                                        <span class="verified-badge">Verified Purchaser</span>
                                    </div>
                                </div>
                                <div class="review-stars">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <h3 class="review-title">Worth every penny for high-volume labs</h3>
                                <div class="pros-cons">
                                    <div class="pros">
                                        <i class="fas fa-thumbs-up"></i>
                                        <div>High throughput, minimal reagent waste, reliable</div>
                                    </div>
                                    <div class="cons">
                                        <i class="fas fa-thumbs-down"></i>
                                        <div>Requires proprietary reagents</div>
                                    </div>
                                </div>
                                <p class="review-text">We operate a central lab processing 500+ samples daily. The
                                    Aerospray Pro has handled our volume without issue for 9 months. The programmable
                                    protocols ensure standardization across shifts, and the maintenance alerts prevent
                                    unexpected downtime. Reagent consumption is significantly lower than our previous
                                    system.</p>
                                <div class="review-footer">
                                    <div class="date">Reviewed on: Sep 15, 2023</div>
                                    <div class="helpful-section">
                                        <span class="helpful-text">Helpful?</span>
                                        <button class="helpful-btn">Yes (38)</button>
                                        <button class="helpful-btn">No (0)</button>
                                    </div>
                                </div>
                            </div>

                            <div class="review-card">
                                <div class="review-header">
                                    <div>
                                        <span class="reviewer">Dr. Sarah Johnson</span>
                                        <span class="verified-badge">Verified Purchaser</span>
                                    </div>
                                </div>
                                <div class="review-stars">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                </div>
                                <h3 class="review-title">Excellent results with minor learning curve</h3>
                                <div class="pros-cons">
                                    <div class="pros">
                                        <i class="fas fa-thumbs-up"></i>
                                        <div>Superior slide quality, space-saving design, quiet operation</div>
                                    </div>
                                    <div class="cons">
                                        <i class="fas fa-thumbs-down"></i>
                                        <div>Interface could be more intuitive</div>
                                    </div>
                                </div>
                                <p class="review-text">The slide quality from the Aerospray Pro is exceptional -
                                    well-defined cellular morphology with consistent staining. The compact design freed
                                    up bench space in our crowded lab. It operates much quieter than comparable systems.
                                    The touchscreen interface is functional but could be more user-friendly during
                                    protocol setup.</p>
                                <div class="review-footer">
                                    <div class="date">Reviewed on: Aug 7, 2023</div>
                                    <div class="helpful-section">
                                        <span class="helpful-text">Helpful?</span>
                                        <button class="helpful-btn">Yes (29)</button>
                                        <button class="helpful-btn">No (2)</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-content" id="resources">
                        <h2 class="section-title">Downloads & Resources</h2>
                        <ul class="resource-list">
                            @foreach ($productDetails?->resources as $resource)
                                @php
                                    $fileType = strtolower(pathinfo($resource->resource_url, PATHINFO_EXTENSION));
                                    $iconClass = 'fas fa-file'; // default

                                    switch ($fileType) {
                                        case 'pdf':
                                            $iconClass = 'fas fa-file-pdf text-danger';
                                            break;
                                        case 'doc':
                                        case 'docx':
                                            $iconClass = 'fas fa-file-word text-primary';
                                            break;
                                        case 'xls':
                                        case 'xlsx':
                                            $iconClass = 'fas fa-file-excel text-success';
                                            break;
                                        case 'ppt':
                                        case 'pptx':
                                            $iconClass = 'fas fa-file-powerpoint text-warning';
                                            break;
                                        case 'jpg':
                                        case 'jpeg':
                                        case 'png':
                                        case 'gif':
                                        case 'webp':
                                            $iconClass = 'fas fa-image text-info';
                                            break;
                                        case 'mp4':
                                        case 'mov':
                                        case 'avi':
                                            $iconClass = 'fas fa-play-circle text-purple';
                                            break;
                                        default:
                                            $iconClass = 'fas fa-file-alt text-secondary';
                                    }
                                @endphp

                                <li class="resource-item d-flex align-items-center mb-2">
                                    <div class="resource-icon me-2"><i class="{{ $iconClass }}"></i></div>
                                    <a href="{{ asset($resource?->resource_url) }}" target="_blank"
                                        class="resource-link">
                                        {{ $resource?->resource_name }} ({{ strtoupper($fileType) }})
                                    </a>
                                </li>
                            @endforeach
                        </ul>

                        {{-- <ul class="resource-list">
                            <li class="resource-item">
                                <div class="resource-icon"><i class="fas fa-file-pdf"></i></div>
                                <a href="#" class="resource-link">Product Datasheet (PDF, 1.2MB)</a>
                            </li>
                            <li class="resource-item">
                                <div class="resource-icon"><i class="fas fa-book"></i></div>
                                <a href="#" class="resource-link">User Manual (PDF, 3.4MB)</a>
                            </li>
                            <li class="resource-item">
                                <div class="resource-icon"><i class="fas fa-file-alt"></i></div>
                                <a href="#" class="resource-link">Application Notes: Hematology Workflow (PDF, 0.8MB)</a>
                            </li>
                            <li class="resource-item">
                                <div class="resource-icon"><i class="fas fa-vial"></i></div>
                                <a href="#" class="resource-link">Compatible Reagents List (PDF, 0.5MB)</a>
                            </li>
                            <li class="resource-item">
                                <div class="resource-icon"><i class="fas fa-play-circle"></i></div>
                                <a href="#" class="resource-link">Operation & Maintenance Video Series</a>
                            </li>
                            <li class="resource-item">
                                <div class="resource-icon"><i class="fas fa-file-medical"></i></div>
                                <a href="#" class="resource-link">Quality Control Guidelines (PDF, 0.7MB)</a>
                            </li>
                            <li class="resource-item">
                                <div class="resource-icon"><i class="fas fa-chart-line"></i></div>
                                <a href="#" class="resource-link">Performance Validation Report (PDF, 1.1MB)</a>
                            </li>
                        </ul> --}}
                    </div>
                </div>
            </div>

            <!-- Right Column -->
            <div class="right-column">
                <div class="sidebar">
                    <!-- Testimonial Card -->
                    <div class="sidebar-card testimonial-card">
                        <p class="testimonial-text">"The Aerospray Pro has significantly improved our lab's efficiency
                            and slide quality. A game-changer for high-volume hematology departments."</p>
                        <div class="testimonial-author">Dr. Jane Doe, Head of Hematology, University of Southampton
                        </div>
                    </div>

                    <!-- CTA Card -->
                    <div class="sidebar-card">
                        <h2 class="cta-title">Get More Information</h2>
                        <div class="cta-buttons">
                            <a href="#" class="cta-btn cta-primary" id="request-quote-btn">Request a Quote</a>
                            <a href="#" class="cta-btn cta-secondary" id="contact-specialist-btn">Contact a
                                Specialist</a>
                        </div>
                    </div>

                    <!-- Benefits Card -->
                    <div class="sidebar-card">
                        <h3 class="why-title">Why Choose SCIZORA?</h3>
                        <ul class="benefits-list">
                            <li class="benefit-item">
                                <i class="fas fa-headset"></i>
                                <div>
                                    <strong>Expert Support</strong>
                                    <div>Access our team of product specialists</div>
                                </div>
                            </li>
                            <li class="benefit-item">
                                <i class="fas fa-shipping-fast"></i>
                                <div>
                                    <strong>Fast Delivery</strong>
                                    <div>Get your products on time, every time</div>
                                </div>
                            </li>
                            <li class="benefit-item">
                                <i class="fas fa-university"></i>
                                <div>
                                    <strong>Trusted by Leaders</strong>
                                    <div>Supplying top research institutions globally</div>
                                </div>
                            </li>
                            <li class="benefit-item">
                                <i class="fas fa-lock"></i>
                                <div>
                                    <strong>Secure & Simple</strong>
                                    <div>Easy and secure quoting process</div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    {{-- <footer class="scizora-main-footer">
        <div class="container scizora-footer-container">
            <div class="scizora-footer-grid">
                <div class="scizora-footer-column">
                    <h3 class="scizora-footer-logo-heading"><a href="#"><img src="logo.jpg" alt="logo"
                                width="200" height="100"></a></h3>
                    <p class="scizora-footer-description">SCIZORA helps consumers find trustworthy businesses through
                        verified reviews and ratings from real customers.</p>
                    <div class="scizora-social-links">
                        <a href="#" class="scizora-social-icon"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="scizora-social-icon"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="scizora-social-icon"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="scizora-social-icon"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
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
                <div class="scizora-footer-column">
                    <h3 class="scizora-footer-heading">Legal</h3>
                    <ul class="scizora-footer-list">
                        <li><a href="terms.html" class="scizora-footer-link">Terms of Service</a></li>
                        <li><a href="privacy.html" class="scizora-footer-link">Privacy Policy</a></li>
                    </ul>
                </div>
                <div class="scizora-footer-column">
                    <h3 class="scizora-footer-heading">Newsletter</h3>
                    <p class="scizora-footer-description">Subscribe to our newsletter for the latest updates and
                        featured companies.</p>
                    <div class="scizora-newsletter-form">
                        <input type="email" placeholder="Your email" class="scizora-newsletter-input">
                        <button class="scizora-newsletter-button">
                            <i class="fas fa-paper-plane"></i>
                        </button>
                    </div>
                </div>
            </div>
            <div class="scizora-footer-bottom">
                <p>&copy; 2025 SCIZORA. All rights reserved.</p>
            </div>
        </div>
    </footer> --}}
    @include('home.footer')
    <!-- Quote Request Modal -->
    <div class="modal-overlay" id="quote-modal-overlay">
        <div class="quote-modal">
            <button class="close-modal" id="close-quote-modal">
                <i class="fas fa-times"></i>
            </button>
            <h2 class="modal-title">Request a Quote</h2>

            <form id="quote-form">
                <div class="form-group">
                    <label for="quote-name" class="required-field">Name</label>
                    <input type="text" id="quote-name" placeholder="Your full name" required>
                </div>

                <div class="form-group">
                    <label for="quote-email" class="required-field">Email Address</label>
                    <input type="email" id="quote-email" placeholder="your.email@example.com" required>
                </div>

                <div class="form-group">
                    <label for="quote-phone" class="required-field">Contact Number</label>
                    <input type="tel" id="quote-phone" placeholder="Your phone number" required>
                </div>

                <div class="form-group">
                    <label for="quote-quantity" class="required-field">Quantity</label>
                    <input type="number" id="quote-quantity" placeholder="Number of units" min="1" required>
                </div>

                <div class="form-group">
                    <label for="quote-organization">Organization/Institution</label>
                    <input type="text" id="quote-organization" placeholder="Your organization name">
                </div>

                <div class="form-group">
                    <label for="quote-message">Additional Information</label>
                    <textarea id="quote-message" placeholder="Any specific requirements or questions"></textarea>
                </div>

                <button type="submit" class="submit-btn">Request Quote</button>
            </form>
        </div>
    </div>

    <!-- Contact Specialist Modal -->
    <div class="modal-overlay" id="specialist-modal-overlay">
        <div class="specialist-modal">
            <button class="close-modal" id="close-specialist-modal">
                <i class="fas fa-times"></i>
            </button>
            <h2 class="modal-title">Contact a Specialist</h2>

            <form id="specialist-form">
                <div class="form-group">
                    <label for="specialist-name" class="required-field">Name</label>
                    <input type="text" id="specialist-name" placeholder="Your full name" required>
                </div>

                <div class="form-group">
                    <label for="specialist-email" class="required-field">Email Address</label>
                    <input type="email" id="specialist-email" placeholder="your.email@example.com" required>
                </div>

                <div class="form-group">
                    <label for="specialist-phone" class="required-field">Contact Number</label>
                    <input type="tel" id="specialist-phone" placeholder="Your phone number" required>
                </div>

                <div class="form-group">
                    <label for="specialist-organization" class="required-field">Organization/Institution</label>
                    <input type="text" id="specialist-organization" placeholder="Your organization name" required>
                </div>

                <div class="form-group">
                    <label for="specialist-department">Department</label>
                    <input type="text" id="specialist-department" placeholder="Your department">
                </div>

                <div class="form-group">
                    <label for="specialist-subject" class="required-field">Subject</label>
                    <select id="specialist-subject" required>
                        <option value="">Select a subject</option>
                        <option value="product-inquiry">Product Inquiry</option>
                        <option value="technical-support">Technical Support</option>
                        <option value="training-request">Training Request</option>
                        <option value="service-request">Service Request</option>
                        <option value="other">Other</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="specialist-message" class="required-field">Message</label>
                    <textarea id="specialist-message" placeholder="How can our specialist help you?" required></textarea>
                </div>

                <div class="form-group">
                    <label for="specialist-urgency">Urgency</label>
                    <select id="specialist-urgency">
                        <option value="low">Low - General inquiry</option>
                        <option value="medium" selected>Medium - Need information within a week</option>
                        <option value="high">High - Need immediate assistance</option>
                    </select>
                </div>

                <button type="submit" class="submit-btn">Contact Specialist</button>
            </form>
        </div>
    </div>
    <!-- Review Modal -->
    <div class="modal-overlay" id="review-modal">
        <div class="review-modal">
            <button class="close-modal" id="close-modal">
                <i class="fas fa-times"></i>
            </button>
            <h2 class="modal-title">Write a Review</h2>

            <form id="review-form">
                <div class="form-group">
                    <label for="reviewer-name">Your Name</label>
                    <input type="text" id="reviewer-name" placeholder="Dr. John Smith" required>
                </div>

                <div class="form-group">
                    <label for="reviewer-email">Email Address</label>
                    <input type="email" id="reviewer-email" placeholder="john.smith@example.com" required>
                </div>

                <div class="form-group">
                    <label>Your Rating</label>
                    <div class="star-rating" id="star-rating">
                        <i class="far fa-star" data-rating="1"></i>
                        <i class="far fa-star" data-rating="2"></i>
                        <i class="far fa-star" data-rating="3"></i>
                        <i class="far fa-star" data-rating="4"></i>
                        <i class="far fa-star" data-rating="5"></i>
                    </div>
                    <input type="hidden" id="rating-value" value="0" name="rating">
                </div>

                <div class="form-group">
                    <label for="review-title">Review Title</label>
                    <input type="text" id="review-title" placeholder="Great product for our lab" required>
                </div>

                <div class="form-group">
                    <label for="pros">Pros</label>
                    <textarea id="pros" placeholder="What did you like about this product?"></textarea>
                </div>

                <div class="form-group">
                    <label for="cons">Cons</label>
                    <textarea id="cons" placeholder="What could be improved?"></textarea>
                </div>

                <div class="form-group">
                    <label for="review-text">Your Review</label>
                    <textarea id="review-text" required placeholder="Share your experience with this product"></textarea>
                </div>

                <div class="form-group">
                    <label for="verified">Are you a verified purchaser?</label>
                    <select id="verified">
                        <option value="yes">Yes, I purchased this product</option>
                        <option value="no">No, I haven't purchased it</option>
                    </select>
                </div>

                <button type="submit" class="submit-review-btn">Submit Review</button>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // DOM Elements
            const mainImg = document.getElementById('main-img');
            const thumbnails = document.querySelectorAll('.thumbnail');
            const prevBtn = document.getElementById('prev-btn');
            const nextBtn = document.getElementById('next-btn');
            const tabBtns = document.querySelectorAll('.tab-btn');
            const tabContents = document.querySelectorAll('.tab-content');
            const reviewsLink = document.getElementById('reviews-link');
            const reviewsSection = document.getElementById('reviews');
            const sortSelect = document.getElementById('sort-select');
            const reviewCards = document.querySelectorAll('.review-card');
            const hamburger = document.getElementById('hamburger');
            const mobileNav = document.getElementById('mobile-nav');
            const closeMobileNav = document.getElementById('close-mobile-nav');
            const writeReviewBtn = document.getElementById('write-review-btn');
            const reviewModal = document.getElementById('review-modal');
            const closeModal = document.getElementById('close-modal');
            const starRating = document.querySelectorAll('#star-rating i');
            const ratingValue = document.getElementById('rating-value');
            const reviewForm = document.getElementById('review-form');
            const profileIcon = document.getElementById('profileIcon');
            const dropdownContent = document.getElementById('dropdownContent');
            const requestQuoteBtn = document.getElementById('request-quote-btn');
            const contactSpecialistBtn = document.getElementById('contact-specialist-btn');
            const quoteModalOverlay = document.getElementById('quote-modal-overlay');
            const specialistModalOverlay = document.getElementById('specialist-modal-overlay');
            const closeQuoteModal = document.getElementById('close-quote-modal');
            const closeSpecialistModal = document.getElementById('close-specialist-modal');
            const quoteForm = document.getElementById('quote-form');
            const specialistForm = document.getElementById('specialist-form');

            // Profile Dropdown Logic
            if (profileIcon) {
                profileIcon.addEventListener('click', function(event) {
                    event.stopPropagation();
                    dropdownContent.classList.toggle('show');
                });
            }

            window.addEventListener('click', function(event) {
                if (dropdownContent && !profileIcon.contains(event.target) && !dropdownContent.contains(
                        event.target)) {
                    dropdownContent.classList.remove('show');
                }
            });

            // Image Carousel
            if (thumbnails.length > 0) {
                thumbnails.forEach(thumb => {
                    thumb.addEventListener('click', () => {
                        thumbnails.forEach(t => t.classList.remove('active'));
                        thumb.classList.add('active');
                        mainImg.src = thumb.getAttribute('data-img');
                    });
                });

                if (prevBtn) {
                    prevBtn.addEventListener('click', () => {
                        const activeThumb = document.querySelector('.thumbnail.active');
                        let prevThumb = activeThumb.previousElementSibling;
                        if (!prevThumb) {
                            prevThumb = thumbnails[thumbnails.length - 1];
                        }
                        prevThumb.click();
                    });
                }

                if (nextBtn) {
                    nextBtn.addEventListener('click', () => {
                        const activeThumb = document.querySelector('.thumbnail.active');
                        let nextThumb = activeThumb.nextElementSibling;
                        if (!nextThumb) {
                            nextThumb = thumbnails[0];
                        }
                        nextThumb.click();
                    });
                }
            }

            // Tab Switching
            if (tabBtns.length > 0) {
                tabBtns.forEach(btn => {
                    btn.addEventListener('click', () => {
                        tabBtns.forEach(b => b.classList.remove('active'));
                        tabContents.forEach(c => c.classList.remove('active'));

                        btn.classList.add('active');
                        const tabId = btn.getAttribute('data-tab');
                        document.getElementById(tabId).classList.add('active');

                        if (tabId === 'reviews') {
                            setTimeout(() => {
                                reviewsSection.scrollIntoView({
                                    behavior: 'smooth',
                                    block: 'start'
                                });
                            }, 300);
                        }
                    });
                });
            }

            // Smooth Scroll to Reviews
            if (reviewsLink) {
                reviewsLink.addEventListener('click', () => {
                    document.querySelector('.tab-btn[data-tab="reviews"]').click();
                });
            }

            // Sort Reviews (placeholder)
            if (sortSelect) {
                sortSelect.addEventListener('change', () => {
                    alert(`Reviews sorted by: ${sortSelect.value}`);
                });
            }

            // Review Card Animation
            if (reviewCards.length > 0 && 'IntersectionObserver' in window) {
                const observer = new IntersectionObserver((entries, observer) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            entry.target.classList.add('visible');
                            observer.unobserve(entry.target);
                        }
                    });
                }, {
                    threshold: 0.1
                });

                reviewCards.forEach(card => observer.observe(card));
            }

            // Helpful buttons
            document.querySelectorAll('.helpful-btn').forEach(btn => {
                btn.addEventListener('click', function() {
                    const textNode = this.childNodes[0];
                    const currentText = textNode.textContent;
                    const match = currentText.match(/\((\d+)\)/);
                    if (match) {
                        const count = parseInt(match[1]) + 1;
                        textNode.textContent = currentText.replace(/\(\d+\)/, `(${count})`);
                    }
                });
            });

            // Mobile Navigation
            if (hamburger && mobileNav) {
                const openMenu = () => {
                    mobileNav.classList.add('active');
                    document.body.style.overflow = 'hidden';
                };

                const closeMenu = () => {
                    mobileNav.classList.remove('active');
                    document.body.style.overflow = '';
                };

                hamburger.addEventListener('click', openMenu);
                closeMobileNav.addEventListener('click', closeMenu);
                document.querySelectorAll('.mobile-nav-links a').forEach(link => {
                    link.addEventListener('click', closeMenu);
                });
            }
            // Quote Request Modal Functionality
            if (requestQuoteBtn && quoteModalOverlay) {
                const openQuoteModal = () => {
                    quoteModalOverlay.classList.add('active');
                    document.body.style.overflow = 'hidden';
                };

                const closeQuoteModalHandler = () => {
                    quoteModalOverlay.classList.remove('active');
                    document.body.style.overflow = '';
                };

                requestQuoteBtn.addEventListener('click', openQuoteModal);
                closeQuoteModal.addEventListener('click', closeQuoteModalHandler);
                quoteModalOverlay.addEventListener('click', (e) => {
                    if (e.target === quoteModalOverlay) {
                        closeQuoteModalHandler();
                    }
                });

                // Quote Form Submission
                quoteForm.addEventListener('submit', (e) => {
                    e.preventDefault();

                    const formData = new FormData(quoteForm);
                    const quoteData = Object.fromEntries(formData.entries());
                    console.log('Quote Request Submitted:', quoteData);

                    alert('Thank you for your quote request! Our team will contact you shortly.');

                    quoteForm.reset();
                    closeQuoteModalHandler();
                });
            }

            // Contact Specialist Modal Functionality
            if (contactSpecialistBtn && specialistModalOverlay) {
                const openSpecialistModal = () => {
                    specialistModalOverlay.classList.add('active');
                    document.body.style.overflow = 'hidden';
                };

                const closeSpecialistModalHandler = () => {
                    specialistModalOverlay.classList.remove('active');
                    document.body.style.overflow = '';
                };

                contactSpecialistBtn.addEventListener('click', openSpecialistModal);
                closeSpecialistModal.addEventListener('click', closeSpecialistModalHandler);
                specialistModalOverlay.addEventListener('click', (e) => {
                    if (e.target === specialistModalOverlay) {
                        closeSpecialistModalHandler();
                    }
                });

                // Specialist Form Submission
                specialistForm.addEventListener('submit', (e) => {
                    e.preventDefault();

                    const formData = new FormData(specialistForm);
                    const specialistData = Object.fromEntries(formData.entries());
                    console.log('Specialist Contact Submitted:', specialistData);

                    alert('Thank you for contacting us! A specialist will reach out to you soon.');

                    specialistForm.reset();
                    closeSpecialistModalHandler();
                });
            }

            // Review Modal
            if (writeReviewBtn && reviewModal) {
                const openModal = () => {
                    reviewModal.classList.add('active');
                    document.body.style.overflow = 'hidden';
                };

                const closeModalHandler = () => {
                    reviewModal.classList.remove('active');
                    document.body.style.overflow = '';
                };

                writeReviewBtn.addEventListener('click', openModal);
                closeModal.addEventListener('click', closeModalHandler);
                reviewModal.addEventListener('click', (e) => {
                    if (e.target === reviewModal) {
                        closeModalHandler();
                    }
                });

                // Star Rating
                starRating.forEach(star => {
                    star.addEventListener('click', () => {
                        const rating = parseInt(star.getAttribute('data-rating'));
                        ratingValue.value = rating;
                        starRating.forEach((s, index) => {
                            s.classList.toggle('fas', index < rating);
                            s.classList.toggle('far', index >= rating);
                            s.classList.toggle('active', index < rating);
                        });
                    });
                });

                // Review Form Submission
                reviewForm.addEventListener('submit', (e) => {
                    e.preventDefault();

                    const formData = new FormData(reviewForm);
                    const reviewData = Object.fromEntries(formData.entries());
                    console.log('Review Submitted:', reviewData);

                    alert('Thank you for your review! It has been submitted successfully.');

                    reviewForm.reset();
                    starRating.forEach(star => {
                        star.classList.remove('fas', 'active');
                        star.classList.add('far');
                    });
                    ratingValue.value = 0;

                    closeModalHandler();
                });
            }
        });
    </script>
</body>

</html>
