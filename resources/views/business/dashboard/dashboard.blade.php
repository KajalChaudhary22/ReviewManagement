<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Added proper viewport meta tag for mobile devices -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>LabZora Dashboard</title>
    <style>
        /* Global Styles */
        :root {
            --primary-color: #1544da;
            --secondary-color: #5A009D;
            --accent-color: #5669bc;
            --dark-color: #212121;
            --light-color: #FAFAFA;
            --text-color: #424242;
            --text-light: #757575;
            --white: #FFFFFF;
            --black: #000000;
            --shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            --sidebar-width: 250px;
            --sidebar-collapsed-width: 80px;
            --transition: all 0.3s ease;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            display: flex;
            min-height: 100vh;
            background-color: #f5f5f5;
            color: var(--text-color);
            /* Added overflow-x hidden to prevent horizontal scrolling on mobile */
            overflow-x: hidden;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        /* Sidebar Styles - Updated for mobile */
        .sidebar {
            width: var(--sidebar-width);
            background-color: var(--dark-color);
            color: var(--white);
            transition: var(--transition);
            height: 100vh;
            position: fixed;
            overflow-y: auto;
            /* Added z-index to ensure sidebar appears above content on mobile */
            z-index: 1000;
            /* Changed to transform for smoother mobile animations */
            transform: translateX(0);
        }

        .sidebar-header {
            padding: 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .logo {
            font-size: 1.5rem;
            font-weight: bold;
            color: var(--white);
        }

        .logo span {
            color: var(--accent-color);
        }

        .menu {
            padding: 20px 0;
        }

        .menu-item {
            padding: 12px 20px;
            display: flex;
            align-items: center;
            cursor: pointer;
            transition: var(--transition);
            margin: 5px 0;
        }

        .menu-item:hover {
            background-color: rgba(255, 255, 255, 0.1);
        }

        .menu-item.active {
            background-color: var(--primary-color);
        }

        .menu-item i {
            margin-right: 15px;
            font-size: 1.2rem;
        }

        .menu-text {
            transition: var(--transition);
        }

        /* Main Content Styles - Updated for mobile */
        .main-content {
            flex: 1;
            margin-left: var(--sidebar-width);
            transition: var(--transition);
            /* Added min-width to prevent content squishing on mobile */
            min-width: 0;
        }

        /* Navbar Styles - Updated for mobile */
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 30px;
            background-color: var(--white);
            box-shadow: var(--shadow);
            position: sticky;
            top: 0;
            z-index: 100;
            /* Added flex-wrap for mobile */
            flex-wrap: wrap;
        }

        .search-bar {
            flex: 1;
            max-width: 500px;
            position: relative;
            /* Full width on mobile */
            width: 100%;
            margin-bottom: 15px;
        }

        .search-bar input {
            width: 100%;
            padding: 10px 15px 10px 40px;
            border: 1px solid #ddd;
            border-radius: 30px;
            outline: none;
            transition: var(--transition);
            /* Larger font size for mobile */
            font-size: 1rem;
        }

        .search-bar input:focus {
            border-color: var(--primary-color);
        }

        .search-bar i {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-light);
        }

        .navbar-right {
            display: flex;
            align-items: center;
            /* Full width on mobile */
            width: 100%;
            justify-content: space-between;
        }

        .notification {
            position: relative;
            margin-right: 25px;
            cursor: pointer;
        }

        .notification-badge {
            position: absolute;
            top: -5px;
            right: -5px;
            background-color: var(--primary-color);
            color: white;
            border-radius: 50%;
            width: 18px;
            height: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.7rem;
        }

        .user-profile {
            display: flex;
            align-items: center;
            cursor: pointer;
            /* Added max-width for mobile */
            max-width: 60%;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: var(--primary-color);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            margin-right: 10px;
            overflow: hidden;
            flex-shrink: 0;
        }

        .user-avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        /* Content Area Styles - Updated for mobile */
        .content {
            padding: 30px;
            /* Reduced padding on mobile */
        }

        .content-header {
            margin-bottom: 30px;
        }

        .welcome-text {
            font-size: 1.8rem;
            font-weight: 600;
            margin-bottom: 5px;
            /* Smaller font size on mobile */
        }

        .date-text {
            color: var(--text-light);
            font-size: 0.9rem;
        }

        /* Stats Cards - Updated for mobile */
        .stats-cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .stat-card {
            background-color: var(--white);
            border-radius: 10px;
            padding: 20px;
            box-shadow: var(--shadow);
            transition: var(--transition);
            /* Full width on smallest screens */
            min-width: 0;
        }

        .stat-card:hover {
            transform: translateY(-5px);
        }

        .stat-title {
            color: var(--text-light);
            font-size: 0.9rem;
            margin-bottom: 10px;
        }

        .stat-value {
            font-size: 1.8rem;
            font-weight: 700;
            margin-bottom: 5px;
        }

        .stat-change {
            display: flex;
            align-items: center;
            color: var(--primary-color);
            font-size: 0.9rem;
            /* Wrap text on small screens */
            flex-wrap: wrap;
        }

        .stat-change i {
            margin-right: 5px;
        }

        /* Tables - Updated for mobile */
        .table-container {
            background-color: var(--white);
            border-radius: 10px;
            padding: 20px;
            box-shadow: var(--shadow);
            margin-bottom: 30px;
            /* Allow horizontal scrolling on mobile */
            overflow-x: auto;
        }

        .table-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            /* Stack on mobile */
            flex-wrap: wrap;
            gap: 10px;
        }

        .section-title {
            font-size: 1.3rem;
            font-weight: 600;
            /* Smaller font on mobile */
        }

        .view-all {
            color: var(--primary-color);
            font-size: 0.9rem;
            cursor: pointer;
            /* Ensure it doesn't wrap */
            white-space: nowrap;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            /* Ensure table doesn't overflow on mobile */
            min-width: 600px;
        }

        th {
            text-align: left;
            padding: 12px 15px;
            color: var(--text-light);
            font-weight: 500;
            border-bottom: 1px solid #eee;
            /* Smaller padding on mobile */
            padding: 8px 10px;
        }

        td {
            padding: 15px;
            border-bottom: 1px solid #eee;
            /* Smaller padding on mobile */
            padding: 10px;
        }

        .status {
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 500;
            /* Prevent status from wrapping */
            white-space: nowrap;
        }

        .status.in-progress {
            background-color: #FFF3E0;
            color: #EF6C00;
        }

        .status.completed {
            background-color: #E8F5E9;
            color: #2E7D32;
        }

        .status.pending {
            background-color: #E3F2FD;
            color: #1565C0;
        }

        /* Product Cards - Updated for mobile */
        .products-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .product-card {
            background-color: var(--white);
            border-radius: 10px;
            padding: 15px;
            box-shadow: var(--shadow);
            transition: var(--transition);
            /* Full width on smallest screens */
            min-width: 0;
        }

        .product-card:hover {
            transform: translateY(-5px);
        }

        .product-image {
            width: 100%;
            height: 120px;
            background-color: #f0f0f0;
            border-radius: 8px;
            margin-bottom: 15px;
            overflow: hidden;
        }

        .product-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .product-name {
            font-weight: 600;
            margin-bottom: 5px;
            /* Prevent text overflow */
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .product-meta {
            display: flex;
            justify-content: space-between;
            color: var(--text-light);
            font-size: 0.9rem;
            margin-bottom: 15px;
            /* Wrap on small screens */
            flex-wrap: wrap;
            gap: 5px;
        }

        .product-chart {
            height: 40px;
            background-color: #f5f5f5;
            border-radius: 5px;
            position: relative;
            overflow: hidden;
        }

        .chart-line {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 70%;
            background-color: var(--primary-color);
            border-radius: 5px;
            animation: chartAnimation 1.5s ease-out;
        }

        @keyframes chartAnimation {
            from { height: 0; }
            to { height: 70%; }
        }

        /* Profile Completion Widget - Updated for mobile */
        .profile-widget {
            background-color: var(--white);
            border-radius: 10px;
            padding: 20px;
            box-shadow: var(--shadow);
            margin-bottom: 30px;
            /* Full width on mobile */
            width: 100%;
        }

        .progress-container {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-top: 20px;
            /* Stack on mobile */
            flex-direction: column;
        }

        .progress-circle {
            position: relative;
            width: 120px;
            height: 120px;
            /* Center on mobile */
            margin: 0 auto;
        }

        .circle-bg {
            fill: none;
            stroke: #eee;
            stroke-width: 8;
        }

        .circle-progress {
            fill: none;
            stroke: var(--primary-color);
            stroke-width: 8;
            stroke-linecap: round;
            transform: rotate(-90deg);
            transform-origin: 50% 50%;
            stroke-dasharray: 314;
            stroke-dashoffset: 47.1; /* 85% of 314 */
            animation: circleAnimation 1.5s ease-out;
        }

        @keyframes circleAnimation {
            from { stroke-dashoffset: 314; }
            to { stroke-dashoffset: 47.1; }
        }

        .progress-text {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 1.5rem;
            font-weight: 600;
        }

        .progress-text span {
            font-size: 0.8rem;
            color: var(--text-light);
            display: block;
            text-align: center;
        }

        .progress-cta {
            flex: 1;
            padding-left: 30px;
            /* Remove left padding on mobile */
            padding-left: 0;
            padding-top: 20px;
            text-align: center;
        }

        .progress-cta h3 {
            margin-bottom: 15px;
        }

        .progress-cta p {
            color: var(--text-light);
            margin-bottom: 20px;
            line-height: 1.5;
        }

        .btn {
            padding: 10px 20px;
            border-radius: 5px;
            border: none;
            cursor: pointer;
            font-weight: 500;
            transition: var(--transition);
            /* Larger tap target for mobile */
            min-width: 80px;
        }

        .btn-primary {
            background-color: var(--primary-color);
            color: white;
        }

        .btn-primary:hover {
            background-color: var(--secondary-color);
        }

        /* Reviews Section - Updated for mobile */
        .reviews-container {
            background-color: var(--white);
            border-radius: 10px;
            padding: 20px;
            box-shadow: var(--shadow);
            margin-bottom: 30px;
            /* Full width on mobile */
            width: 100%;
        }

        .review-item {
            display: flex;
            padding: 15px 0;
            border-bottom: 1px solid #eee;
            /* Stack on smallest screens */
            flex-wrap: wrap;
        }

        .review-item:last-child {
            border-bottom: none;
        }

        .reviewer-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: #f0f0f0;
            margin-right: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--text-light);
            font-weight: 600;
            /* Center on mobile */
            margin: 0 auto 10px;
        }

        .review-content {
            flex: 1;
            /* Full width on mobile */
            min-width: 0;
        }

        .reviewer-name {
            font-weight: 600;
            margin-bottom: 5px;
            /* Center text on mobile */
            text-align: center;
        }

        .stars {
            color: #FFC107;
            margin-bottom: 5px;
            /* Center stars on mobile */
            text-align: center;
        }

        .review-text {
            color: var(--text-light);
            font-size: 0.9rem;
            line-height: 1.5;
        }

        /* Quick Actions - Updated for mobile */
        .quick-actions {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 15px;
            margin-bottom: 30px;
        }

        .action-btn {
            background-color: var(--white);
            border-radius: 10px;
            padding: 20px;
            box-shadow: var(--shadow);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            cursor: pointer;
            transition: var(--transition);
        }

        .action-btn:hover {
            transform: translateY(-5px);
            background-color: var(--primary-color);
            color: white;
        }

        .action-btn i {
            font-size: 1.5rem;
            margin-bottom: 10px;
        }

        .action-btn span {
            font-weight: 500;
        }

        /* Form Elements - Updated for mobile */
        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
        }

        .form-control {
            width: 100%;
            padding: 10px 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 1rem;
            transition: var(--transition);
        }

        .form-control:focus {
            border-color: var(--primary-color);
            outline: none;
        }

        /* Analytics Charts - Updated for mobile */
        .chart-container {
            background-color: var(--white);
            border-radius: 10px;
            padding: 20px;
            box-shadow: var(--shadow);
            margin-bottom: 30px;
            /* Full width on mobile */
            width: 100%;
        }

        .chart-placeholder {
            width: 100%;
            height: 300px;
            background-color: #f9f9f9;
            border-radius: 5px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--text-light);
            font-size: 1.1rem;
        }

        /* Settings Tabs - Updated for mobile */
        .settings-tabs {
            display: flex;
            border-bottom: 1px solid #eee;
            margin-bottom: 20px;
            /* Allow horizontal scrolling on mobile */
            overflow-x: auto;
            white-space: nowrap;
            -webkit-overflow-scrolling: touch;
        }

        .tab {
            padding: 10px 20px;
            cursor: pointer;
            border-bottom: 3px solid transparent;
            transition: var(--transition);
            /* Prevent tabs from shrinking */
            flex-shrink: 0;
        }

        .tab.active {
            border-bottom-color: var(--primary-color);
            color: var(--primary-color);
            font-weight: 500;
        }

        .tab-content {
            display: none;
        }

        .tab-content.active {
            display: block;
        }

        /* Modal Styles - Updated for mobile */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 1000;
            justify-content: center;
            align-items: center;
            /* Added padding for mobile */
            padding: 15px;
        }

        .modal-content {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            width: 90%;
            max-width: 600px;
            max-height: 90vh;
            overflow-y: auto;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
            /* Smaller padding on mobile */
        }

        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .modal-title {
            font-size: 1.5rem;
            font-weight: 600;
            /* Smaller font on mobile */
        }

        .close-modal {
            background: none;
            border: none;
            font-size: 1.5rem;
            cursor: pointer;
            color: var(--text-light);
            /* Larger tap target */
            padding: 5px;
        }

        .modal-footer {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
            margin-top: 20px;
            /* Stack buttons on mobile */
            flex-wrap: wrap;
        }

        /* Switch Toggle - Updated for mobile */
        .switch {
            position: relative;
            display: inline-block;
            width: 50px;
            height: 24px;
        }

        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            transition: .4s;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 16px;
            width: 16px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            transition: .4s;
        }

        input:checked + .slider {
            background-color: var(--primary-color);
        }

        input:focus + .slider {
            box-shadow: 0 0 1px var(--primary-color);
        }

        input:checked + .slider:before {
            transform: translateX(26px);
        }

        .slider.round {
            border-radius: 24px;
        }

        .slider.round:before {
            border-radius: 50%;
        }

        /* Mobile Menu Toggle */
        .menu-toggle {
            display: none;
            position: fixed;
            top: 15px;
            left: 15px;
            z-index: 1001;
            background-color: var(--primary-color);
            color: white;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            /* Smooth transition */
            transition: var(--transition);
        }

        /* Responsive Styles - Updated for better mobile experience */
        @media (max-width: 1200px) {
            /* Adjustments for tablet sizes */
            .sidebar {
                width: var(--sidebar-collapsed-width);
            }
            .sidebar-header, .menu-text {
                display: none;
            }
            .menu-item {
                justify-content: center;
                padding: 12px 0;
            }
            .menu-item i {
                margin-right: 0;
            }
            .main-content {
                margin-left: var(--sidebar-collapsed-width);
            }
        }

        @media (max-width: 992px) {
            /* Adjustments for smaller tablets */
            .content {
                padding: 20px;
            }
            
            .welcome-text {
                font-size: 1.5rem;
            }
            
            .section-title {
                font-size: 1.1rem;
            }
            
            .progress-container {
                flex-direction: column;
                text-align: center;
            }
            
            .progress-cta {
                padding-left: 0;
                padding-top: 20px;
            }
            
            .reviewer-avatar {
                margin: 0 auto 10px;
            }
            
            .reviewer-name,
            .stars {
                text-align: center;
            }
        }

        @media (max-width: 768px) {
			
            /* Adjustments for large phones */
            .navbar {
                flex-direction: column;
                align-items: flex-start;
                padding: 15px;
            }
            
            .search-bar {
                width: 100%;
                max-width: 100%;
                margin-bottom: 15px;
            }
            
            .navbar-right {
                width: 100%;
                justify-content: space-between;
            }
            
            .content {
                padding: 15px;
            }
            
            .quick-actions {
                grid-template-columns: repeat(2, 1fr);
            }
            
            .stats-cards {
                grid-template-columns: repeat(2, 1fr);
            }
            
            .flex {
                flex-direction: column;
            }
            
            .flex > div {
                width: 100%;
            }
            
            .profile-widget,
            .reviews-container {
                width: 100%;
            }
            
            .modal-content {
                padding: 20px;
            }
        }

        @media (max-width: 576px) {
            /* Mobile-specific styles */
            .sidebar {
                width: 0;
                overflow: hidden;
                position: fixed;
                z-index: 1000;
                transform: translateX(-100%);
            }
            
            .sidebar.active {
                width: var(--sidebar-width);
                transform: translateX(0);
            }
            
            .main-content {
                margin-left: 0;
            }
            
            .menu-toggle {
                display: flex;
            }
            
            .menu-text {
                display: block;
            }
            
            .stats-cards {
                grid-template-columns: 1fr;
            }
            
            .quick-actions {
                grid-template-columns: 1fr;
            }
            
            .welcome-text {
                font-size: 1.3rem;
            }
            
            .section-title {
                font-size: 1rem;
            }
            
            .content {
                padding: 10px;
            }
            
            .table-header {
                flex-direction: column;
                align-items: flex-start;
            }
            
            .view-all {
                margin-top: 10px;
            }
            
            /* Form adjustments for mobile */
            .flex {
                flex-direction: column;
            }
            
            .flex > div {
                width: 100%;
                margin-bottom: 15px;
            }
            
            .flex > div:last-child {
                margin-bottom: 0;
            }
            
            /* Button adjustments */
            .btn {
                padding: 12px 20px;
                width: 100%;
                margin-bottom: 10px;
            }
            
            .modal-footer .btn {
                width: auto;
                flex: 1;
            }
            
            /* Table cell adjustments */
            td, th {
                padding: 8px 5px;
                font-size: 0.9rem;
            }
        }

        /* Utility Classes */
        .hidden {
            display: none !important;
        }

        .flex {
            display: flex;
        }

        .flex-column {
            flex-direction: column;
        }

        .align-center {
            align-items: center;
        }

        .justify-between {
            justify-content: space-between;
        }

        .mb-20 {
            margin-bottom: 20px;
        }

        /* Icons - Using Unicode characters as placeholders */
        .icon {
            font-style: normal;
            font-family: 'Segoe UI Symbol', sans-serif;
        }
        
        /* Added for mobile overflow scrolling */
        .scrollable {
            -webkit-overflow-scrolling: touch;
        }
        
        /* Added for form fields on mobile */
        input, select, textarea {
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            font-size: 1rem;
        }
        
        /* Prevent zooming on input focus on mobile */
        @media screen and (max-width: 768px) {
            input, select, textarea {
                font-size: 16px;
            }
        }

    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="sidebar-header">
            <a href="#" class="text-xl md:text-2xl font-bold"><img src="{{ asset('build/images/logo.jpg')}}" alt="logo" width="200" height="60"></a>
        </div>
        <div class="menu">
            <div class="menu-item active" data-content="dashboard">
                <i class="icon">📊</i>
                <span class="menu-text">Dashboard</span>
            </div>
            <div class="menu-item" data-content="profile">
                <i class="icon">👤</i>
                <span class="menu-text">Profile Management</span>
            </div>
            <div class="menu-item" data-content="products">
                <i class="icon">💊</i>
                <span class="menu-text">Products & Services</span>
            </div>
            <div class="menu-item" data-content="inquiries">
                <i class="icon">📩</i>
                <span class="menu-text">Inquiries</span>
            </div>
            <div class="menu-item" data-content="reviews">
                <i class="icon">⭐</i>
                <span class="menu-text">Reviews</span>
            </div>
            <div class="menu-item" data-content="analytics">
                <i class="icon">📈</i>
                <span class="menu-text">Analytics</span>
            </div>
            <div class="menu-item" data-content="settings">
                <i class="icon">⚙️</i>
                <span class="menu-text">Settings</span>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Navbar -->
        <div class="navbar">
            
            <div class="navbar-right">
			<div class="search-bar">
                <i class="icon">🔍</i>
                <input type="text" placeholder="Search...">
            </div>
                
                <div class="user-profile">

                    <div class="user-avatar">
                        <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="John Doe">
                    </div>
                    <span>John Doe</span>
                </div>
            </div>
        </div>

        <!-- Content Area -->
        <div class="content">
            <!-- Dashboard Content (Default) -->
            <div id="dashboard-content" class="content-section">
                <div class="content-header">
                    <h1 class="welcome-text">Welcome back, PharmaCorp Inc</h1>
                    <p class="date-text">Tuesday, 20 February 2024</p>
                </div>

                <!-- Stats Cards -->
                <div class="stats-cards">
                    <div class="stat-card">
                        <div class="stat-title">Total Products</div>
                        <div class="stat-value">124</div>
                        <div class="stat-change">
                            <i class="icon">↑</i> 12% from last month
                        </div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-title">Active Inquiries</div>
                        <div class="stat-value">35</div>
                        <div class="stat-change">
                            <i class="icon">↑</i> 5% from last month
                        </div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-title">New Reviews</div>
                        <div class="stat-value">28</div>
                        <div class="stat-change">
                            <i class="icon">↑</i> 8% from last month
                        </div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-title">Profile Views</div>
                        <div class="stat-value">1,254</div>
                        <div class="stat-change">
                            <i class="icon">↑</i> 22% from last month
                        </div>
                    </div>
                </div>

                <!-- Recent Inquiries Table -->
                <div class="table-container">
                    <div class="table-header">
                        <h2 class="section-title">Recent Inquiries</h2>
                        <a href="#" class="view-all">View All</a>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Company</th>
                                <th>Product</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>20 Feb 2024</td>
                                <td>MediLife Inc.</td>
                                <td>Antibiotic X</td>
                                <td><span class="status in-progress">In Progress</span></td>
                            </tr>
                            <tr>
                                <td>18 Feb 2024</td>
                                <td>HealthPlus</td>
                                <td>Pain Reliever Y</td>
                                <td><span class="status completed">Completed</span></td>
                            </tr>
                            <tr>
                                <td>15 Feb 2024</td>
                                <td>PharmaGlobal</td>
                                <td>Vitamin Complex</td>
                                <td><span class="status in-progress">In Progress</span></td>
                            </tr>
                            <tr>
                                <td>12 Feb 2024</td>
                                <td>CareSolutions</td>
                                <td>Antibiotic X</td>
                                <td><span class="status completed">Completed</span></td>
                            </tr>
                            <tr>
                                <td>10 Feb 2024</td>
                                <td>MediCare</td>
                                <td>Immune Booster</td>
                                <td><span class="status in-progress">In Progress</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Top Performing Products -->
                <div class="table-container">
                    <div class="table-header">
                        <h2 class="section-title">Top Performing Products</h2>
                        <a href="#" class="view-all">View All</a>
                    </div>
                    <div class="products-grid">
                        <div class="product-card">
                            <div class="product-image">
                                <img src="https://via.placeholder.com/300x200?text=Antibiotic+X" alt="Antibiotic X">
                            </div>
                            <h3 class="product-name">Antibiotic X</h3>
                            <div class="product-meta">
                                <span>Last month</span>
                                <span>1,240 units</span>
                            </div>
                            <div class="product-chart">
                                <div class="chart-line" style="width: 80%;"></div>
                            </div>
                        </div>
                        <div class="product-card">
                            <div class="product-image">
                                <img src="https://via.placeholder.com/300x200?text=Pain+Reliever+Y" alt="Pain Reliever Y">
                            </div>
                            <h3 class="product-name">Pain Reliever Y</h3>
                            <div class="product-meta">
                                <span>Last month</span>
                                <span>980 units</span>
                            </div>
                            <div class="product-chart">
                                <div class="chart-line" style="width: 65%;"></div>
                            </div>
                        </div>
                        <div class="product-card">
                            <div class="product-image">
                                <img src="https://via.placeholder.com/300x200?text=Vitamin+Complex" alt="Vitamin Complex">
                            </div>
                            <h3 class="product-name">Vitamin Complex</h3>
                            <div class="product-meta">
                                <span>Last month</span>
                                <span>750 units</span>
                            </div>
                            <div class="product-chart">
                                <div class="chart-line" style="width: 50%;"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Profile Completion and Recent Reviews -->
                <div class="flex" style="gap: 20px; margin-bottom: 30px; flex-wrap: wrap;">
                    <!-- Profile Completion Widget -->
                    <div class="profile-widget" style="flex: 1; min-width: 300px;">
                        <h2 class="section-title">Profile Completion</h2>
                        <div class="progress-container">
                            <div class="progress-circle">
                                <svg width="120" height="120" viewBox="0 0 120 120">
                                    <circle class="circle-bg" cx="60" cy="60" r="50"></circle>
                                    <circle class="circle-progress" cx="60" cy="60" r="50"></circle>
                                </svg>
                                <div class="progress-text">85%<span>Complete</span></div>
                            </div>
                            <div class="progress-cta">
                                <h3>Complete your profile</h3>
                                <p>Add more details to your profile to increase visibility and trust among potential clients.</p>
                                <button class="btn btn-primary">Complete Profile</button>
                            </div>
                        </div>
                    </div>

                    <!-- Recent Reviews -->
                    <div class="reviews-container" style="flex: 1; min-width: 300px;">
                        <div class="table-header">
                            <h2 class="section-title">Recent Reviews</h2>
                            <a href="#" class="view-all">View All</a>
                        </div>
                        <div class="review-item">
                            <div class="reviewer-avatar">SM</div>
                            <div class="review-content">
                                <div class="reviewer-name">Sarah Miller</div>
                                <div class="stars">★★★★★</div>
                                <div class="review-text">Excellent product quality and fast delivery. Will definitely order again!</div>
                            </div>
                        </div>
                        <div class="review-item">
                            <div class="reviewer-avatar">JD</div>
                            <div class="review-content">
                                <div class="reviewer-name">John Davis</div>
                                <div class="stars">★★★★☆</div>
                                <div class="review-text">Good service but packaging could be improved.</div>
                            </div>
                        </div>
                        <div class="review-item">
                            <div class="reviewer-avatar">AP</div>
                            <div class="review-content">
                                <div class="reviewer-name">Amanda Patel</div>
                                <div class="stars">★★★★★</div>
                                <div class="review-text">The best pharmaceutical supplier we've worked with!</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Quick Actions -->
                <div class="quick-actions">
                    <div class="action-btn" id="quick-add-product">
                        <i class="icon">➕</i>
                        <span>Add Product</span>
                    </div>
                    <div class="action-btn" id="quick-view-inquiries">
                        <i class="icon">📩</i>
                        <span>View Enquiries</span>
                    </div>
                    <div class="action-btn" id="quick-edit-profile">
                        <i class="icon">👤</i>
                        <span>Edit Profile</span>
                    </div>
                    <div class="action-btn" id="quick-view-analytics">
                        <i class="icon">📊</i>
                        <span>View Analytics</span>
                    </div>
                </div>
            </div>

            <!-- Profile Management Content -->
            <div id="profile-content" class="content-section hidden">
                <div class="content-header">
                    <h1 class="welcome-text">Profile Management</h1>
                    <p class="date-text">Tuesday, 20 February 2024</p>
                </div>
                
                <div class="table-container">
                    <h2 class="section-title mb-20">Company Information</h2>
                    
                    <div class="flex" style="gap: 30px; margin-bottom: 30px;">
                        <div style="flex: 1;">
                            <div class="form-group">
                                <label class="form-label">Company Name</label>
                                <input type="text" class="form-control" value="PharmaCorp Inc">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Business Type</label>
                                <input type="text" class="form-control" value="Pharmaceutical Manufacturer">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Year Established</label>
                                <input type="text" class="form-control" value="2005">
                            </div>
                        </div>
                        <div style="flex: 1;">
                            <div class="form-group">
                                <label class="form-label">Company Logo</label>
                                <div style="display: flex; align-items: center; gap: 20px;">
                                    <div style="width: 80px; height: 80px; border-radius: 8px; background-color: #f0f0f0; overflow: hidden;">
                                        <img src="https://via.placeholder.com/80x80?text=PC" alt="Company Logo" style="width: 100%; height: 100%; object-fit: cover;">
                                    </div>
                                    <button class="btn btn-primary">Upload New</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <h2 class="section-title mb-20">Contact Information</h2>
                    
                    <div class="flex" style="gap: 30px; margin-bottom: 30px;">
                        <div style="flex: 1;">
                            <div class="form-group">
                                <label class="form-label">Primary Contact</label>
                                <input type="text" class="form-control" value="John Doe">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Email Address</label>
                                <input type="email" class="form-control" value="john.doe@pharmacorp.com">
                            </div>
                        </div>
                        <div style="flex: 1;">
                            <div class="form-group">
                                <label class="form-label">Phone Number</label>
                                <input type="tel" class="form-control" value="+1 (555) 123-4567">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Website</label>
                                <input type="url" class="form-control" value="https://www.pharmacorp.com">
                            </div>
                        </div>
                    </div>
                    
                    <h2 class="section-title mb-20">Business Address</h2>
                    
                    <div class="form-group">
                        <label class="form-label">Street Address</label>
                        <input type="text" class="form-control" value="123 Pharma Street">
                    </div>
                    
                    <div class="flex" style="gap: 30px; margin-bottom: 30px;">
                        <div style="flex: 1;">
                            <div class="form-group">
                                <label class="form-label">City</label>
                                <input type="text" class="form-control" value="Boston">
                            </div>
                        </div>
                        <div style="flex: 1;">
                            <div class="form-group">
                                <label class="form-label">State/Province</label>
                                <input type="text" class="form-control" value="Massachusetts">
                            </div>
                        </div>
                        <div style="flex: 1;">
                            <div class="form-group">
                                <label class="form-label">ZIP/Postal Code</label>
                                <input type="text" class="form-control" value="02108">
                            </div>
                        </div>
                        <div style="flex: 1;">
                            <div class="form-group">
                                <label class="form-label">Country</label>
                                <input type="text" class="form-control" value="United States">
                            </div>
                        </div>
                    </div>
                    
                    <h2 class="section-title mb-20">Business Description</h2>
                    
                    <div class="form-group">
                        <textarea class="form-control" rows="5">PharmaCorp Inc is a leading manufacturer of high-quality pharmaceutical products with over 15 years of experience in the industry. We specialize in antibiotics, pain relievers, and vitamin supplements, serving clients across North America and Europe.</textarea>
                    </div>
                    
                    <div class="flex justify-between" style="margin-top: 30px;">
                        <button class="btn" style="background-color: #f0f0f0;">Cancel</button>
                        <button class="btn btn-primary">Save Changes</button>
                    </div>
                </div>
            </div>

            <!-- Products & Services Content -->
            <div id="products-content" class="content-section hidden">
                <div class="content-header">
                    <h1 class="welcome-text">Products & Services</h1>
                    <p class="date-text">Tuesday, 20 February 2024</p>
                </div>
                
                <div class="table-container">
                    <div class="table-header">
                        <h2 class="section-title">Your Products (124)</h2>
                        <button class="btn btn-primary" id="add-product-btn">Add New Product</button>
                    </div>
                    
                    <div style="display: flex; gap: 15px; margin-bottom: 20px; flex-wrap: wrap;">
                        <div style="flex: 1; min-width: 200px;">
                            <input type="text" class="form-control" placeholder="Search products..." id="product-search">
                        </div>
                        <select class="form-control" style="width: 200px; min-width: 150px;" id="product-category-filter">
                            <option>All Categories</option>
                            <option>Antibiotics</option>
                            <option>Pain Relievers</option>
                            <option>Vitamins</option>
                            <option>Supplements</option>
                        </select>
                        <select class="form-control" style="width: 150px; min-width: 120px;" id="product-sort">
                            <option>Sort by: Newest</option>
                            <option>Sort by: Oldest</option>
                            <option>Sort by: Name</option>
                            <option>Sort by: Popularity</option>
                        </select>
                    </div>
                    
                    <div class="products-grid" style="grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));" id="products-grid">
                        <div class="product-card">
                            <div class="product-image">
                                <img src="https://via.placeholder.com/400x300?text=Antibiotic+X" alt="Antibiotic X">
                            </div>
                            <h3 class="product-name">Antibiotic X</h3>
                            <div class="product-meta">
                                <span>SKU: PC-ABX-500</span>
                                <span>In Stock: 1,240</span>
                            </div>
                            <div style="display: flex; justify-content: space-between; margin-top: 15px;">
                                <span style="color: var(--primary-color); font-weight: 600;">$24.99</span>
                                <div>
                                    <button class="edit-product-btn" style="background: none; border: none; cursor: pointer; margin-right: 10px;">✏️</button>
                                    <button class="delete-product-btn" style="background: none; border: none; cursor: pointer;">🗑️</button>
                                </div>
                            </div>
                        </div>
                        <div class="product-card">
                            <div class="product-image">
                                <img src="https://via.placeholder.com/400x300?text=Pain+Reliever+Y" alt="Pain Reliever Y">
                            </div>
                            <h3 class="product-name">Pain Reliever Y</h3>
                            <div class="product-meta">
                                <span>SKU: PC-PRY-200</span>
                                <span>In Stock: 980</span>
                            </div>
                            <div style="display: flex; justify-content: space-between; margin-top: 15px;">
                                <span style="color: var(--primary-color); font-weight: 600;">$19.99</span>
                                <div>
                                    <button class="edit-product-btn" style="background: none; border: none; cursor: pointer; margin-right: 10px;">✏️</button>
                                    <button class="delete-product-btn" style="background: none; border: none; cursor: pointer;">🗑️</button>
                                </div>
                            </div>
                        </div>
                        <div class="product-card">
                            <div class="product-image">
                                <img src="https://via.placeholder.com/400x300?text=Vitamin+Complex" alt="Vitamin Complex">
                            </div>
                            <h3 class="product-name">Vitamin Complex</h3>
                            <div class="product-meta">
                                <span>SKU: PC-VTC-100</span>
                                <span>In Stock: 750</span>
                            </div>
                            <div style="display: flex; justify-content: space-between; margin-top: 15px;">
                                <span style="color: var(--primary-color); font-weight: 600;">$29.99</span>
                                <div>
                                    <button class="edit-product-btn" style="background: none; border: none; cursor: pointer; margin-right: 10px;">✏️</button>
                                    <button class="delete-product-btn" style="background: none; border: none; cursor: pointer;">🗑️</button>
                                </div>
                            </div>
                        </div>
                        <div class="product-card">
                            <div class="product-image">
                                <img src="https://via.placeholder.com/400x300?text=Immune+Booster" alt="Immune Booster">
                            </div>
                            <h3 class="product-name">Immune Booster</h3>
                            <div class="product-meta">
                                <span>SKU: PC-IMB-300</span>
                                <span>In Stock: 420</span>
                            </div>
                            <div style="display: flex; justify-content: space-between; margin-top: 15px;">
                                <span style="color: var(--primary-color); font-weight: 600;">$34.99</span>
                                <div>
                                    <button class="edit-product-btn" style="background: none; border: none; cursor: pointer; margin-right: 10px;">✏️</button>
                                    <button class="delete-product-btn" style="background: none; border: none; cursor: pointer;">🗑️</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 30px; flex-wrap: wrap; gap: 10px;">
                        <div style="color: var(--text-light);">
                            Showing 1-4 of 124 products
                        </div>
                        <div style="display: flex; gap: 10px;">
                            <button class="btn" style="background-color: #f0f0f0;" id="prev-products">Previous</button>
                            <button class="btn btn-primary" id="next-products">Next</button>
                        </div>
                    </div>
                </div>
                
                <div class="table-container" style="margin-top: 30px;">
                    <div class="table-header">
                        <h2 class="section-title">Services (3)</h2>
                        <button class="btn btn-primary" id="add-service-btn">Add New Service</button>
                    </div>
                    
                    <table>
                        <thead>
                            <tr>
                                <th>Service Name</th>
                                <th>Description</th>
                                <th>Price</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Custom Formulation</td>
                                <td>Tailored pharmaceutical solutions for specific needs</td>
                                <td>$1,500+</td>
                                <td>
                                    <button class="edit-service-btn" style="background: none; border: none; cursor: pointer; margin-right: 10px;">✏️</button>
                                    <button class="delete-service-btn" style="background: none; border: none; cursor: pointer;">🗑️</button>
                                </td>
                            </tr>
                            <tr>
                                <td>Private Labeling</td>
                                <td>Brand our products with your own label and packaging</td>
                                <td>$500+</td>
                                <td>
                                    <button class="edit-service-btn" style="background: none; border: none; cursor: pointer; margin-right: 10px;">✏️</button>
                                    <button class="delete-service-btn" style="background: none; border: none; cursor: pointer;">🗑️</button>
                                </td>
                            </tr>
                            <tr>
                                <td>Bulk Discounts</td>
                                <td>Special pricing for large quantity orders</td>
                                <td>20-50% off</td>
                                <td>
                                    <button class="edit-service-btn" style="background: none; border: none; cursor: pointer; margin-right: 10px;">✏️</button>
                                    <button class="delete-service-btn" style="background: none; border: none; cursor: pointer;">🗑️</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Inquiries Content -->
            <div id="inquiries-content" class="content-section hidden">
                <div class="content-header">
                    <h1 class="welcome-text">Inquiries</h1>
                    <p class="date-text">Tuesday, 20 February 2024</p>
                </div>
                
                <div class="stats-cards">
                    <div class="stat-card">
                        <div class="stat-title">Total Inquiries</div>
                        <div class="stat-value">87</div>
                        <div class="stat-change">
                            <i class="icon">↑</i> 15% from last month
                        </div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-title">Active Inquiries</div>
                        <div class="stat-value">35</div>
                        <div class="stat-change">
                            <i class="icon">↑</i> 5% from last month
                        </div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-title">Completed</div>
                        <div class="stat-value">42</div>
                        <div class="stat-change">
                            <i class="icon">↑</i> 22% from last month
                        </div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-title">Avg. Response Time</div>
                        <div class="stat-value">6.2h</div>
                        <div class="stat-change">
                            <i class="icon">↓</i> 1.3h faster
                        </div>
                    </div>
                </div>
                
                <div class="table-container">
                    <div class="table-header">
                        <h2 class="section-title">Recent Inquiries</h2>
                        <div style="display: flex; gap: 10px; flex-wrap: wrap;">
                            <select class="form-control" style="width: 150px; min-width: 120px;" id="inquiry-status-filter">
                                <option>All Statuses</option>
                                <option>Pending</option>
                                <option>In Progress</option>
                                <option>Completed</option>
                            </select>
                            <button class="btn btn-primary" id="export-inquiries-btn">Export</button>
                        </div>
                    </div>
                    
                    <table>
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Company</th>
                                <th>Contact</th>
                                <th>Product</th>
                                <th>Quantity</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>20 Feb 2024</td>
                                <td>MediLife Inc.</td>
                                <td>sarah.miller@medilife.com</td>
                                <td>Antibiotic X</td>
                                <td>500 units</td>
                                <td><span class="status in-progress">In Progress</span></td>
                                <td>
                                    <button class="reply-inquiry-btn" style="background: none; border: none; cursor: pointer;">✉️</button>
                                    <button class="view-inquiry-btn" style="background: none; border: none; cursor: pointer;">👁️</button>
                                </td>
                            </tr>
                            <tr>
                                <td>19 Feb 2024</td>
                                <td>HealthPlus</td>
                                <td>john.davis@healthplus.com</td>
                                <td>Pain Reliever Y</td>
                                <td>1,000 units</td>
                                <td><span class="status pending">Pending</span></td>
                                <td>
                                    <button class="reply-inquiry-btn" style="background: none; border: none; cursor: pointer;">✉️</button>
                                    <button class="view-inquiry-btn" style="background: none; border: none; cursor: pointer;">👁️</button>
                                </td>
                            </tr>
                            <tr>
                                <td>18 Feb 2024</td>
                                <td>PharmaGlobal</td>
                                <td>amanda.patel@pharmaglobal.com</td>
                                <td>Vitamin Complex</td>
                                <td>2,000 units</td>
                                <td><span class="status completed">Completed</span></td>
                                <td>
                                    <button class="reply-inquiry-btn" style="background: none; border: none; cursor: pointer;">✉️</button>
                                    <button class="view-inquiry-btn" style="background: none; border: none; cursor: pointer;">👁️</button>
                                </td>
                            </tr>
                            <tr>
                                <td>17 Feb 2024</td>
                                <td>CareSolutions</td>
                                <td>michael.brown@caresolutions.com</td>
                                <td>Immune Booster</td>
                                <td>300 units</td>
                                <td><span class="status in-progress">In Progress</span></td>
                                <td>
                                    <button class="reply-inquiry-btn" style="background: none; border: none; cursor: pointer;">✉️</button>
                                    <button class="view-inquiry-btn" style="background: none; border: none; cursor: pointer;">👁️</button>
                                </td>
                            </tr>
                            <tr>
                                <td>15 Feb 2024</td>
                                <td>MediCare</td>
                                <td>jennifer.wilson@medicare.com</td>
                                <td>Antibiotic X</td>
                                <td>750 units</td>
                                <td><span class="status pending">Pending</span></td>
                                <td>
                                    <button class="reply-inquiry-btn" style="background: none; border: none; cursor: pointer;">✉️</button>
                                    <button class="view-inquiry-btn" style="background: none; border: none; cursor: pointer;">👁️</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 30px; flex-wrap: wrap; gap: 10px;">
                        <div style="color: var(--text-light);">
                            Showing 1-5 of 35 active inquiries
                        </div>
                        <div style="display: flex; gap: 10px;">
                            <button class="btn" style="background-color: #f0f0f0;" id="prev-inquiries">Previous</button>
                            <button class="btn btn-primary" id="next-inquiries">Next</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Reviews Content -->
            <div id="reviews-content" class="content-section hidden">
                <div class="content-header">
                    <h1 class="welcome-text">Customer Reviews</h1>
                    <p class="date-text">Tuesday, 20 February 2024</p>
                </div>
                
                <div class="stats-cards">
                    <div class="stat-card">
                        <div class="stat-title">Total Reviews</div>
                        <div class="stat-value">156</div>
                        <div class="stat-change">
                            <i class="icon">↑</i> 18% from last month
                        </div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-title">Average Rating</div>
                        <div class="stat-value">4.7</div>
                        <div class="stat-change">
                            <i class="icon">↑</i> 0.2 from last month
                        </div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-title">5-Star Reviews</div>
                        <div class="stat-value">112</div>
                        <div class="stat-change">
                            <i class="icon">↑</i> 24 from last month
                        </div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-title">Response Rate</div>
                        <div class="stat-value">92%</div>
                        <div class="stat-change">
                            <i class="icon">↑</i> 5% from last month
                        </div>
                    </div>
                </div>
                
                <div class="flex" style="gap: 20px; margin-bottom: 30px; flex-wrap: wrap;">
                    <div class="table-container" style="flex: 2; min-width: 300px;">
                        <div class="table-header">
                            <h2 class="section-title">Recent Reviews</h2>
                            <div style="display: flex; gap: 10px;">
                                <select class="form-control" style="width: 150px; min-width: 120px;" id="review-rating-filter">
                                    <option>All Ratings</option>
                                    <option>5 Stars</option>
                                    <option>4 Stars</option>
                                    <option>3 Stars</option>
                                    <option>2 Stars</option>
                                    <option>1 Star</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="review-item">
                            <div class="reviewer-avatar">SM</div>
                            <div class="review-content">
                                <div class="reviewer-name">Sarah Miller <span style="color: var(--text-light); font-weight: normal;">- MediLife Inc.</span></div>
                                <div class="stars">★★★★★ <span style="color: var(--text-light); font-size: 0.9rem;">20 Feb 2024</span></div>
                                <div class="review-text">We've been working with PharmaCorp for over 3 years now and their products have consistently exceeded our expectations. The Antibiotic X is particularly effective with minimal side effects reported by our patients.</div>
                                <div style="margin-top: 10px;">
                                    <span style="font-size: 0.9rem; color: var(--text-light);">Product: Antibiotic X</span>
                                </div>
                                <button class="btn reply-review-btn" style="padding: 5px 10px; font-size: 0.8rem; margin-top: 10px;">Reply</button>
                            </div>
                        </div>
                        
                        <div class="review-item">
                            <div class="reviewer-avatar">JD</div>
                            <div class="review-content">
                                <div class="reviewer-name">John Davis <span style="color: var(--text-light); font-weight: normal;">- HealthPlus</span></div>
                                <div class="stars">★★★★☆ <span style="color: var(--text-light); font-size: 0.9rem;">18 Feb 2024</span></div>
                                <div class="review-text">The Pain Reliever Y works well for most of our patients, though we've had a few reports of mild stomach discomfort. Packaging could be more eco-friendly.</div>
                                <div style="margin-top: 10px;">
                                    <span style="font-size: 0.9rem; color: var(--text-light);">Product: Pain Reliever Y</span>
                                </div>
                                <div style="background-color: #f9f9f9; padding: 10px; border-radius: 5px; margin-top: 10px;">
                                    <div style="font-weight: 500; margin-bottom: 5px;">Your Response:</div>
                                    <div>Thank you for your feedback, John. We're currently developing a new formulation to reduce stomach discomfort and will be introducing eco-friendly packaging options next quarter.</div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="review-item">
                            <div class="reviewer-avatar">AP</div>
                            <div class="review-content">
                                <div class="reviewer-name">Amanda Patel <span style="color: var(--text-light); font-weight: normal;">- PharmaGlobal</span></div>
                                <div class="stars">★★★★★ <span style="color: var(--text-light); font-size: 0.9rem;">15 Feb 2024</span></div>
                                <div class="review-text">The Vitamin Complex is our best-selling supplement! Customers report increased energy levels and overall wellbeing. Delivery is always prompt.</div>
                                <div style="margin-top: 10px;">
                                    <span style="font-size: 0.9rem; color: var(--text-light);">Product: Vitamin Complex</span>
                                </div>
                                <button class="btn reply-review-btn" style="padding: 5px 10px; font-size: 0.8rem; margin-top: 10px;">Reply</button>
                            </div>
                        </div>
                        
                        <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 30px; flex-wrap: wrap; gap: 10px;">
                            <div style="color: var(--text-light);">
                                Showing 1-3 of 28 new reviews
                            </div>
                            <div style="display: flex; gap: 10px;">
                                <button class="btn" style="background-color: #f0f0f0;" id="prev-reviews">Previous</button>
                                <button class="btn btn-primary" id="next-reviews">Next</button>
                            </div>
                        </div>
                    </div>
                    
                    <div class="table-container" style="flex: 1; min-width: 300px;">
                        <h2 class="section-title">Rating Distribution</h2>
                        
                        <div style="margin-top: 20px;">
                            <div style="display: flex; align-items: center; margin-bottom: 10px;">
                                <div style="width: 80px;">5 Stars</div>
                                <div style="flex: 1; height: 20px; background-color: #f0f0f0; border-radius: 10px; margin: 0 10px; overflow: hidden;">
                                    <div style="width: 72%; height: 100%; background-color: var(--primary-color);"></div>
                                </div>
                                <div>112</div>
                            </div>
                            <div style="display: flex; align-items: center; margin-bottom: 10px;">
                                <div style="width: 80px;">4 Stars</div>
                                <div style="flex: 1; height: 20px; background-color: #f0f0f0; border-radius: 10px; margin: 0 10px; overflow: hidden;">
                                    <div style="width: 18%; height: 100%; background-color: var(--primary-color);"></div>
                                </div>
                                <div>28</div>
                            </div>
                            <div style="display: flex; align-items: center; margin-bottom: 10px;">
                                <div style="width: 80px;">3 Stars</div>
                                <div style="flex: 1; height: 20px; background-color: #f0f0f0; border-radius: 10px; margin: 0 10px; overflow: hidden;">
                                    <div style="width: 6%; height: 100%; background-color: var(--primary-color);"></div>
                                </div>
                                <div>9</div>
                            </div>
                            <div style="display: flex; align-items: center; margin-bottom: 10px;">
                                <div style="width: 80px;">2 Stars</div>
                                <div style="flex: 1; height: 20px; background-color: #f0f0f0; border-radius: 10px; margin: 0 10px; overflow: hidden;">
                                    <div style="width: 3%; height: 100%; background-color: var(--primary-color);"></div>
                                </div>
                                <div>4</div>
                            </div>
                            <div style="display: flex; align-items: center; margin-bottom: 10px;">
                                <div style="width: 80px;">1 Star</div>
                                <div style="flex: 1; height: 20px; background-color: #f0f0f0; border-radius: 10px; margin: 0 10px; overflow: hidden;">
                                    <div style="width: 1%; height: 100%; background-color: var(--primary-color);"></div>
                                </div>
                                <div>3</div>
                            </div>
                        </div>
                        
                        <h2 style="margin-top: 30px; font-size: 1.2rem;">Review Highlights</h2>
                        
                        <div style="margin-top: 15px;">
                            <div style="font-weight: 500; margin-bottom: 5px;">Most Mentioned Positive</div>
                            <div style="display: flex; flex-wrap: wrap; gap: 5px; margin-bottom: 15px;">
                                <span style="background-color: #E8F5E9; color: #2E7D32; padding: 3px 8px; border-radius: 20px; font-size: 0.8rem;">Quality (87)</span>
                                <span style="background-color: #E8F5E9; color: #2E7D32; padding: 3px 8px; border-radius: 20px; font-size: 0.8rem;">Delivery (65)</span>
                                <span style="background-color: #E8F5E9; color: #2E7D32; padding: 3px 8px; border-radius: 20px; font-size: 0.8rem;">Effectiveness (58)</span>
                                <span style="background-color: #E8F5E9; color: #2E7D32; padding: 3px 8px; border-radius: 20px; font-size: 0.8rem;">Customer Service (42)</span>
                            </div>
                            
                            <div style="font-weight: 500; margin-bottom: 5px;">Most Mentioned Negative</div>
                            <div style="display: flex; flex-wrap: wrap; gap: 5px;">
                                <span style="background-color: #FFEBEE; color: #5A009D; padding: 3px 8px; border-radius: 20px; font-size: 0.8rem;">Packaging (12)</span>
                                <span style="background-color: #FFEBEE; color: #5A009D; padding: 3px 8px; border-radius: 20px; font-size: 0.8rem;">Side Effects (8)</span>
                                <span style="background-color: #FFEBEE; color: #5A009D; padding: 3px 8px; border-radius: 20px; font-size: 0.8rem;">Price (5)</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Analytics Content -->
            <div id="analytics-content" class="content-section hidden">
                <div class="content-header">
                    <h1 class="welcome-text">Business Analytics</h1>
                    <p class="date-text">Tuesday, 20 February 2024</p>
                </div>
                
                <div class="stats-cards">
                    <div class="stat-card">
                        <div class="stat-title">Total Revenue</div>
                        <div class="stat-value">$124,580</div>
                        <div class="stat-change">
                            <i class="icon">↑</i> 22% from last month
                        </div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-title">Total Orders</div>
                        <div class="stat-value">287</div>
                        <div class="stat-change">
                            <i class="icon">↑</i> 15% from last month
                        </div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-title">Avg. Order Value</div>
                        <div class="stat-value">$434</div>
                        <div class="stat-change">
                            <i class="icon">↑</i> 6% from last month
                        </div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-title">New Customers</div>
                        <div class="stat-value">42</div>
                        <div class="stat-change">
                            <i class="icon">↑</i> 18% from last month
                        </div>
                    </div>
                </div>
                
                <div class="flex" style="gap: 20px; margin-bottom: 30px; flex-wrap: wrap;">
                    <div class="chart-container" style="flex: 2; min-width: 300px;">
                        <div class="table-header">
                            <h2 class="section-title">Revenue Overview</h2>
                            <select class="form-control" style="width: 150px;" id="revenue-time-filter">
                                <option>Last 30 Days</option>
                                <option>Last 90 Days</option>
                                <option>This Year</option>
                                <option>Last Year</option>
                            </select>
                        </div>
                        <div class="chart-placeholder">
                            Monthly Revenue Chart (Line Graph)
                        </div>
                    </div>
                    
                    <div class="chart-container" style="flex: 1; min-width: 300px;">
                        <h2 class="section-title">Sales by Category</h2>
                        <div class="chart-placeholder">
                            Product Category Pie Chart
                        </div>
                    </div>
                </div>
                
                <div class="flex" style="gap: 20px; margin-bottom: 30px; flex-wrap: wrap;">
                    <div class="chart-container" style="flex: 1; min-width: 300px;">
                        <h2 class="section-title">Top Products</h2>
                        <div class="chart-placeholder">
                            Top Selling Products Bar Chart
                        </div>
                    </div>
                    
                    <div class="chart-container" style="flex: 1; min-width: 300px;">
                        <h2 class="section-title">Customer Geography</h2>
                        <div class="chart-placeholder">
                            Customer Location Map
                        </div>
                    </div>
                </div>
                
                <div class="table-container">
                    <div class="table-header">
                        <h2 class="section-title">Recent Orders</h2>
                        <button class="btn btn-primary" id="export-analytics-btn">Export Data</button>
                    </div>
                    
                    <table>
                        <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>Date</th>
                                <th>Customer</th>
                                <th>Products</th>
                                <th>Amount</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>#PC-10245</td>
                                <td>20 Feb 2024</td>
                                <td>MediLife Inc.</td>
                                <td>Antibiotic X (500)</td>
                                <td>$12,495.00</td>
                                <td><span class="status completed">Completed</span></td>
                            </tr>
                            <tr>
                                <td>#PC-10244</td>
                                <td>19 Feb 2024</td>
                                <td>HealthPlus</td>
                                <td>Pain Reliever Y (1000)</td>
                                <td>$19,990.00</td>
                                <td><span class="status pending">Pending</span></td>
                            </tr>
                            <tr>
                                <td>#PC-10243</td>
                                <td>18 Feb 2024</td>
                                <td>PharmaGlobal</td>
                                <td>Vitamin Complex (2000)</td>
                                <td>$59,980.00</td>
                                <td><span class="status in-progress">Processing</span></td>
                            </tr>
                            <tr>
                                <td>#PC-10242</td>
                                <td>17 Feb 2024</td>
                                <td>CareSolutions</td>
                                <td>Immune Booster (300)</td>
                                <td>$10,497.00</td>
                                <td><span class="status completed">Completed</span></td>
                            </tr>
                            <tr>
                                <td>#PC-10241</td>
                                <td>16 Feb 2024</td>
                                <td>MediCare</td>
                                <td>Antibiotic X (750)</td>
                                <td>$18,742.50</td>
                                <td><span class="status in-progress">Processing</span></td>
                            </tr>
                        </tbody>
                    </table>
                    
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 30px; flex-wrap: wrap; gap: 10px;">
                        <div style="color: var(--text-light);">
                            Showing 1-5 of 287 orders
                        </div>
                        <div style="display: flex; gap: 10px;">
                            <button class="btn" style="background-color: #f0f0f0;" id="prev-orders">Previous</button>
                            <button class="btn btn-primary" id="next-orders">Next</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Settings Content -->
            <div id="settings-content" class="content-section hidden">
                <div class="content-header">
                    <h1 class="welcome-text">Account Settings</h1>
                    <p class="date-text">Tuesday, 20 February 2024</p>
                </div>
                
                <div class="settings-tabs">
                    <div class="tab active" data-tab="account">Account</div>
                    <div class="tab" data-tab="security">Security</div>
                    <div class="tab" data-tab="notifications">Notifications</div>
                    <div class="tab" data-tab="billing">Billing</div>
                </div>
                
                <div id="account-tab" class="tab-content active">
                    <div class="table-container">
                        <h2 class="section-title mb-20">Profile Information</h2>
                        
                        <div class="flex" style="gap: 30px; margin-bottom: 30px; flex-wrap: wrap;">
                            <div style="flex: 1; min-width: 250px;">
                                <div class="form-group">
                                    <label class="form-label">First Name</label>
                                    <input type="text" class="form-control" value="John">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Email Address</label>
                                    <input type="email" class="form-control" value="john.doe@pharmacorp.com">
                                </div>
                            </div>
                            <div style="flex: 1; min-width: 250px;">
                                <div class="form-group">
                                    <label class="form-label">Last Name</label>
                                    <input type="text" class="form-control" value="Doe">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Phone Number</label>
                                    <input type="tel" class="form-control" value="+1 (555) 123-4567">
                                </div>
                            </div>
                        </div>
                        
                        <h2 class="section-title mb-20">Profile Picture</h2>
                        
                        <div style="display: flex; align-items: center; gap: 20px; margin-bottom: 30px; flex-wrap: wrap;">
                            <div class="user-avatar" style="width: 80px; height: 80px;">
                                <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="John Doe">
                            </div>
                            <div style="display: flex; gap: 10px;">
                                <button class="btn btn-primary">Upload New</button>
                                <button class="btn" style="background-color: #f0f0f0;">Remove</button>
                            </div>
                        </div>
                        
                        <div class="flex justify-between" style="margin-top: 30px; flex-wrap: wrap; gap: 10px;">
                            <button class="btn" style="background-color: #f0f0f0; flex: 1;">Cancel</button>
                            <button class="btn btn-primary" style="flex: 1;">Save Changes</button>
                        </div>
                    </div>
                </div>
                
                <div id="security-tab" class="tab-content">
                    <div class="table-container">
                        <h2 class="section-title mb-20">Password</h2>
                        
                        <div class="form-group">
                            <label class="form-label">Current Password</label>
                            <input type="password" class="form-control" placeholder="Enter current password">
                        </div>
                        
                        <div class="flex" style="gap: 30px; margin-bottom: 30px; flex-wrap: wrap;">
                            <div style="flex: 1; min-width: 250px;">
                                <div class="form-group">
                                    <label class="form-label">New Password</label>
                                    <input type="password" class="form-control" placeholder="Enter new password">
                                </div>
                            </div>
                            <div style="flex: 1; min-width: 250px;">
                                <div class="form-group">
                                    <label class="form-label">Confirm New Password</label>
                                    <input type="password" class="form-control" placeholder="Confirm new password">
                                </div>
                            </div>
                        </div>
                        
                        <h2 class="section-title mb-20">Two-Factor Authentication</h2>
                        
                        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px; flex-wrap: wrap;">
                            <div style="flex: 1; min-width: 200px;">
                                <div style="font-weight: 500; margin-bottom: 5px;">SMS Authentication</div>
                                <div style="color: var(--text-light);">Add your phone number to receive security codes via SMS</div>
                            </div>
                            <button class="btn" style="background-color: #f0f0f0;">Enable</button>
                        </div>
                        
                        <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap;">
                            <div style="flex: 1; min-width: 200px;">
                                <div style="font-weight: 500; margin-bottom: 5px;">Authenticator App</div>
                                <div style="color: var(--text-light);">Use an authenticator app to generate security codes</div>
                            </div>
                            <button class="btn" style="background-color: #f0f0f0;">Enable</button>
                        </div>
                        
                        <div class="flex justify-between" style="margin-top: 30px; flex-wrap: wrap; gap: 10px;">
                            <button class="btn" style="background-color: #f0f0f0; flex: 1;">Cancel</button>
                            <button class="btn btn-primary" style="flex: 1;">Save Changes</button>
                        </div>
                    </div>
                </div>
                
                <div id="notifications-tab" class="tab-content">
                    <div class="table-container">
                        <h2 class="section-title mb-20">Notification Preferences</h2>
                        
                        <h3 style="margin-bottom: 15px; font-weight: 500;">Email Notifications</h3>
                        
                        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 15px; flex-wrap: wrap;">
                            <div style="flex: 1; min-width: 200px;">
                                <div style="font-weight: 500; margin-bottom: 5px;">New Orders</div>
                                <div style="color: var(--text-light);">Receive notifications when new orders are placed</div>
                            </div>
                            <label class="switch">
                                <input type="checkbox" checked>
                                <span class="slider round"></span>
                            </label>
                        </div>
                        
                        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 15px; flex-wrap: wrap;">
                            <div style="flex: 1; min-width: 200px;">
                                <div style="font-weight: 500; margin-bottom: 5px;">Inquiries</div>
                                <div style="color: var(--text-light);">Receive notifications for new inquiries</div>
                            </div>
                            <label class="switch">
                                <input type="checkbox" checked>
                                <span class="slider round"></span>
                            </label>
                        </div>
                        
                        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 15px; flex-wrap: wrap;">
                            <div style="flex: 1; min-width: 200px;">
                                <div style="font-weight: 500; margin-bottom: 5px;">Reviews</div>
                                <div style="color: var(--text-light);">Receive notifications for new reviews</div>
                            </div>
                            <label class="switch">
                                <input type="checkbox" checked>
                                <span class="slider round"></span>
                            </label>
                        </div>
                        
                        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px; flex-wrap: wrap;">
                            <div style="flex: 1; min-width: 200px;">
                                <div style="font-weight: 500; margin-bottom: 5px;">Promotions</div>
                                <div style="color: var(--text-light);">Receive promotional emails and offers</div>
                            </div>
                            <label class="switch">
                                <input type="checkbox">
                                <span class="slider round"></span>
                            </label>
                        </div>
                        
                        <h3 style="margin-bottom: 15px; font-weight: 500;">Push Notifications</h3>
                        
                        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 15px; flex-wrap: wrap;">
                            <div style="flex: 1; min-width: 200px;">
                                <div style="font-weight: 500; margin-bottom: 5px;">Order Updates</div>
                                <div style="color: var(--text-light);">Receive push notifications for order status changes</div>
                            </div>
                            <label class="switch">
                                <input type="checkbox" checked>
                                <span class="slider round"></span>
                            </label>
                        </div>
                        
                        <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap;">
                            <div style="flex: 1; min-width: 200px;">
                                <div style="font-weight: 500; margin-bottom: 5px;">Important Alerts</div>
                                <div style="color: var(--text-light);">Receive important system alerts and notifications</div>
                            </div>
                            <label class="switch">
                                <input type="checkbox" checked>
                                <span class="slider round"></span>
                            </label>
                        </div>
                        
                        <div class="flex justify-between" style="margin-top: 30px; flex-wrap: wrap; gap: 10px;">
                            <button class="btn" style="background-color: #f0f0f0; flex: 1;">Cancel</button>
                            <button class="btn btn-primary" style="flex: 1;">Save Changes</button>
                        </div>
                    </div>
                </div>
                
                <div id="billing-tab" class="tab-content">
                    <div class="table-container">
                        <h2 class="section-title mb-20">Billing Information</h2>
                        
                        <div class="flex" style="gap: 30px; margin-bottom: 30px; flex-wrap: wrap;">
                            <div style="flex: 1; min-width: 250px;">
                                <div class="form-group">
                                    <label class="form-label">Card Number</label>
                                    <input type="text" class="form-control" value="•••• •••• •••• 4242">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Name on Card</label>
                                    <input type="text" class="form-control" value="John Doe">
                                </div>
                            </div>
                            <div style="flex: 1; min-width: 250px;">
                                <div class="form-group">
                                    <label class="form-label">Expiration Date</label>
                                    <input type="text" class="form-control" value="12/25">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Security Code</label>
                                    <input type="text" class="form-control" placeholder="•••">
                                </div>
                            </div>
                        </div>
                        
                        <h2 class="section-title mb-20">Billing History</h2>
                        
                        <table>
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Description</th>
                                    <th>Amount</th>
                                    <th>Status</th>
                                    <th>Invoice</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>15 Feb 2024</td>
                                    <td>Premium Subscription</td>
                                    <td>$99.00</td>
                                    <td><span class="status completed">Paid</span></td>
                                    <td><a href="#" style="color: var(--primary-color);">Download</a></td>
                                </tr>
                                <tr>
                                    <td>15 Jan 2024</td>
                                    <td>Premium Subscription</td>
                                    <td>$99.00</td>
                                    <td><span class="status completed">Paid</span></td>
                                    <td><a href="#" style="color: var(--primary-color);">Download</a></td>
                                </tr>
                                <tr>
                                    <td>15 Dec 2023</td>
                                    <td>Premium Subscription</td>
                                    <td>$99.00</td>
                                    <td><span class="status completed">Paid</span></td>
                                    <td><a href="#" style="color: var(--primary-color);">Download</a></td>
                                </tr>
                            </tbody>
                        </table>
                        
                        <div class="flex justify-between" style="margin-top: 30px; flex-wrap: wrap; gap: 10px;">
                            <button class="btn" style="background-color: #f0f0f0; flex: 1;">Cancel</button>
                            <button class="btn btn-primary" style="flex: 1;">Save Changes</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Mobile Menu Toggle (Hidden on Desktop) -->
    <div class="menu-toggle hidden">
        <i class="icon">≡</i>
    </div>

    <!-- Product Modal -->
    <div class="modal" id="product-modal">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title">Add New Product</h2>
                <button class="close-modal">&times;</button>
            </div>
            <form id="product-form">
                <div class="form-group">
                    <label class="form-label">Product Name</label>
                    <input type="text" class="form-control" id="product-name" required>
                </div>
                <div class="form-group">
                    <label class="form-label">Description</label>
                    <textarea class="form-control" id="product-description" rows="3" required></textarea>
                </div>
                <div class="flex" style="gap: 20px; flex-wrap: wrap;">
                    <div class="form-group" style="flex: 1; min-width: 200px;">
                        <label class="form-label">SKU</label>
                        <input type="text" class="form-control" id="product-sku" required>
                    </div>
                    <div class="form-group" style="flex: 1; min-width: 200px;">
                        <label class="form-label">Category</label>
                        <select class="form-control" id="product-category" required>
                            <option value="">Select Category</option>
                            <option>Antibiotics</option>
                            <option>Pain Relievers</option>
                            <option>Vitamins</option>
                            <option>Supplements</option>
                        </select>
                    </div>
                </div>
                <div class="flex" style="gap: 20px; flex-wrap: wrap;">
                    <div class="form-group" style="flex: 1; min-width: 200px;">
                        <label class="form-label">Price ($)</label>
                        <input type="number" class="form-control" id="product-price" step="0.01" required>
                    </div>
                    <div class="form-group" style="flex: 1; min-width: 200px;">
                        <label class="form-label">Quantity in Stock</label>
                        <input type="number" class="form-control" id="product-quantity" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-label">Product Image</label>
                    <input type="file" class="form-control" id="product-image">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn" style="background-color: #f0f0f0; flex: 1;">Cancel</button>
                    <button type="submit" class="btn btn-primary" style="flex: 1;">Save Product</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Service Modal -->
    <div class="modal" id="service-modal">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title">Add New Service</h2>
                <button class="close-modal">&times;</button>
            </div>
            <form id="service-form">
                <div class="form-group">
                    <label class="form-label">Service Name</label>
                    <input type="text" class="form-control" id="service-name" required>
                </div>
                <div class="form-group">
                    <label class="form-label">Description</label>
                    <textarea class="form-control" id="service-description" rows="3" required></textarea>
                </div>
                <div class="form-group">
                    <label class="form-label">Price</label>
                    <input type="text" class="form-control" id="service-price" required>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn" style="background-color: #f0f0f0; flex: 1;">Cancel</button>
                    <button type="submit" class="btn btn-primary" style="flex: 1;">Save Service</button>
                </div>
            </form>
        </div>
    </div>

    <!-- View Inquiry Modal -->
    <div class="modal" id="view-inquiry-modal">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title">Inquiry Details</h2>
                <button class="close-modal">&times;</button>
            </div>
            <div class="form-group">
                <label class="form-label">Company</label>
                <input type="text" class="form-control" id="inquiry-company" readonly>
            </div>
            <div class="form-group">
                <label class="form-label">Contact Email</label>
                <input type="text" class="form-control" id="inquiry-email" readonly>
            </div>
            <div class="form-group">
                <label class="form-label">Product</label>
                <input type="text" class="form-control" id="inquiry-product" readonly>
            </div>
            <div class="form-group">
                <label class="form-label">Quantity</label>
                <input type="text" class="form-control" id="inquiry-quantity" readonly>
            </div>
            <div class="form-group">
                <label class="form-label">Message</label>
                <textarea class="form-control" id="inquiry-message" rows="4" readonly></textarea>
            </div>
            <div class="form-group">
                <label class="form-label">Status</label>
                <select class="form-control" id="inquiry-status">
                    <option value="pending">Pending</option>
                    <option value="in-progress">In Progress</option>
                    <option value="completed">Completed</option>
                </select>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn" style="background-color: #f0f0f0; flex: 1;">Cancel</button>
                <button type="button" class="btn btn-primary" style="flex: 1;" id="save-inquiry-btn">Save Changes</button>
            </div>
        </div>
    </div>

    <!-- Reply Review Modal -->
    <div class="modal" id="reply-review-modal">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title">Reply to Review</h2>
                <button class="close-modal">&times;</button>
            </div>
            <div class="form-group">
                <label class="form-label">Reviewer</label>
                <input type="text" class="form-control" id="reviewer-name" readonly>
            </div>
            <div class="form-group">
                <label class="form-label">Rating</label>
                <div id="review-rating" style="color: #FFC107; font-size: 1.2rem;"></div>
            </div>
            <div class="form-group">
                <label class="form-label">Review</label>
                <textarea class="form-control" id="review-text" rows="3" readonly></textarea>
            </div>
            <div class="form-group">
                <label class="form-label">Your Response</label>
                <textarea class="form-control" id="review-response" rows="4" required></textarea>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn" style="background-color: #f0f0f0; flex: 1;">Cancel</button>
                <button type="button" class="btn btn-primary" style="flex: 1;" id="submit-review-response">Submit Response</button>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Menu Navigation
            const menuItems = document.querySelectorAll('.menu-item');
            const contentSections = document.querySelectorAll('.content-section');
            
            menuItems.forEach(item => {
                item.addEventListener('click', function() {
                    // Remove active class from all menu items
                    menuItems.forEach(i => i.classList.remove('active'));
                    // Add active class to clicked item
                    this.classList.add('active');
                    
                    // Hide all content sections
                    contentSections.forEach(section => section.classList.add('hidden'));
                    
                    // Show the selected content section
                    const contentId = this.getAttribute('data-content') + '-content';
                    document.getElementById(contentId).classList.remove('hidden');
                    
                    // Close mobile sidebar if open
                    document.querySelector('.sidebar').classList.remove('active');
                });
            });
            
            // Settings Tabs
            const settingsTabs = document.querySelectorAll('.settings-tabs .tab');
            const tabContents = document.querySelectorAll('.tab-content');
            
            settingsTabs.forEach(tab => {
                tab.addEventListener('click', function() {
                    // Remove active class from all tabs
                    settingsTabs.forEach(t => t.classList.remove('active'));
                    // Add active class to clicked tab
                    this.classList.add('active');
                    
                    // Hide all tab contents
                    tabContents.forEach(content => content.classList.remove('active'));
                    
                    // Show the selected tab content
                    const tabId = this.getAttribute('data-tab') + '-tab';
                    document.getElementById(tabId).classList.add('active');
                });
            });
            
            // Mobile Menu Toggle
            const menuToggle = document.querySelector('.menu-toggle');
            const sidebar = document.querySelector('.sidebar');
            
            menuToggle.addEventListener('click', function() {
                sidebar.classList.toggle('active');
            });
            
            // Check screen size and show/hide menu toggle accordingly
            function checkScreenSize() {
                if (window.innerWidth <= 576) {
                    menuToggle.classList.remove('hidden');
                    sidebar.classList.remove('active');
                } else {
                    menuToggle.classList.add('hidden');
                }
            }
            
            // Initial check
            checkScreenSize();
            
            // Add resize event listener
            window.addEventListener('resize', checkScreenSize);
            
            // Simulate chart animations when they come into view
            const animateOnScroll = function() {
                const charts = document.querySelectorAll('.chart-line');
                
                charts.forEach(chart => {
                    const chartPosition = chart.getBoundingClientRect().top;
                    const screenPosition = window.innerHeight / 1.3;
                    
                    if (chartPosition < screenPosition) {
                        chart.style.animation = 'chartAnimation 1.5s ease-out';
                    }
                });
            };
            
            window.addEventListener('scroll', animateOnScroll);
            
            // Initial animation trigger
            animateOnScroll();

            // Modal functionality
            const modals = document.querySelectorAll('.modal');
            const closeModalButtons = document.querySelectorAll('.close-modal');
            
            function openModal(modalId) {
                document.getElementById(modalId).style.display = 'flex';
                document.body.style.overflow = 'hidden';
            }
            
            function closeModal(modalId) {
                document.getElementById(modalId).style.display = 'none';
                document.body.style.overflow = 'auto';
            }
            
            // Close modal when clicking on X or cancel button
            closeModalButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const modal = this.closest('.modal');
                    closeModal(modal.id);
                });
            });
            
            // Close modal when clicking outside the modal content
            modals.forEach(modal => {
                modal.addEventListener('click', function(e) {
                    if (e.target === this) {
                        closeModal(this.id);
                    }
                });
            });
            
            // Products & Services Section Functionality
            const addProductBtn = document.getElementById('add-product-btn');
            const addServiceBtn = document.getElementById('add-service-btn');
            const editProductBtns = document.querySelectorAll('.edit-product-btn');
            const deleteProductBtns = document.querySelectorAll('.delete-product-btn');
            const editServiceBtns = document.querySelectorAll('.edit-service-btn');
            const deleteServiceBtns = document.querySelectorAll('.delete-service-btn');
            const productForm = document.getElementById('product-form');
            const serviceForm = document.getElementById('service-form');
            const prevProductsBtn = document.getElementById('prev-products');
            const nextProductsBtn = document.getElementById('next-products');
            
            // Add Product
            addProductBtn.addEventListener('click', function() {
                document.getElementById('product-form').reset();
                document.querySelector('#product-modal .modal-title').textContent = 'Add New Product';
                openModal('product-modal');
            });
            
            // Edit Product
            editProductBtns.forEach(btn => {
                btn.addEventListener('click', function() {
                    const productCard = this.closest('.product-card');
                    const productName = productCard.querySelector('.product-name').textContent;
                    const productMeta = productCard.querySelectorAll('.product-meta span');
                    const productPrice = productCard.querySelector('span[style*="color: var(--primary-color)"]').textContent.replace('$', '');
                    
                    document.getElementById('product-name').value = productName;
                    document.getElementById('product-sku').value = productMeta[0].textContent.replace('SKU: ', '');
                    document.getElementById('product-price').value = productPrice;
                    document.getElementById('product-quantity').value = productMeta[1].textContent.replace('In Stock: ', '').replace(',', '');
                    
                    document.querySelector('#product-modal .modal-title').textContent = 'Edit Product';
                    openModal('product-modal');
                });
            });
            
            // Delete Product
            deleteProductBtns.forEach(btn => {
                btn.addEventListener('click', function() {
                    if (confirm('Are you sure you want to delete this product?')) {
                        const productCard = this.closest('.product-card');
                        productCard.remove();
                        // In a real app, you would also make an API call to delete from the database
                        alert('Product deleted successfully!');
                    }
                });
            });
            
            // Save Product
            productForm.addEventListener('submit', function(e) {
                e.preventDefault();
                
                const productName = document.getElementById('product-name').value;
                const productSku = document.getElementById('product-sku').value;
                const productPrice = document.getElementById('product-price').value;
                const productQuantity = document.getElementById('product-quantity').value;
                const productCategory = document.getElementById('product-category').value;
                
                // In a real app, you would save this to your database
                // For demo purposes, we'll just show a success message
                alert(`Product ${productName} saved successfully!`);
                closeModal('product-modal');
            });
            
            // Add Service
            addServiceBtn.addEventListener('click', function() {
                document.getElementById('service-form').reset();
                document.querySelector('#service-modal .modal-title').textContent = 'Add New Service';
                openModal('service-modal');
            });
            
            // Edit Service
            editServiceBtns.forEach(btn => {
                btn.addEventListener('click', function() {
                    const serviceRow = this.closest('tr');
                    const serviceName = serviceRow.cells[0].textContent;
                    const serviceDescription = serviceRow.cells[1].textContent;
                    const servicePrice = serviceRow.cells[2].textContent;
                    
                    document.getElementById('service-name').value = serviceName;
                    document.getElementById('service-description').value = serviceDescription;
                    document.getElementById('service-price').value = servicePrice;
                    
                    document.querySelector('#service-modal .modal-title').textContent = 'Edit Service';
                    openModal('service-modal');
                });
            });
            
            // Delete Service
            deleteServiceBtns.forEach(btn => {
                btn.addEventListener('click', function() {
                    if (confirm('Are you sure you want to delete this service?')) {
                        const serviceRow = this.closest('tr');
                        serviceRow.remove();
                        // In a real app, you would also make an API call to delete from the database
                        alert('Service deleted successfully!');
                    }
                });
            });
            
            // Save Service
            serviceForm.addEventListener('submit', function(e) {
                e.preventDefault();
                
                const serviceName = document.getElementById('service-name').value;
                const serviceDescription = document.getElementById('service-description').value;
                const servicePrice = document.getElementById('service-price').value;
                
                // In a real app, you would save this to your database
                alert(`Service ${serviceName} saved successfully!`);
                closeModal('service-modal');
            });
            
            // Pagination for Products
            let currentProductPage = 1;
            
            prevProductsBtn.addEventListener('click', function() {
                if (currentProductPage > 1) {
                    currentProductPage--;
                    // In a real app, you would fetch the previous page of products
                    alert(`Loading page ${currentProductPage} of products...`);
                }
            });
            
            nextProductsBtn.addEventListener('click', function() {
                currentProductPage++;
                // In a real app, you would fetch the next page of products
                alert(`Loading page ${currentProductPage} of products...`);
            });
            
            // Filter Products
            const productSearch = document.getElementById('product-search');
            const productCategoryFilter = document.getElementById('product-category-filter');
            const productSort = document.getElementById('product-sort');
            
            productSearch.addEventListener('input', function() {
                // In a real app, you would filter products based on search term
                console.log(`Searching for: ${this.value}`);
            });
            
            productCategoryFilter.addEventListener('change', function() {
                // In a real app, you would filter products by category
                console.log(`Filtering by category: ${this.value}`);
            });
            
            productSort.addEventListener('change', function() {
                // In a real app, you would sort products
                console.log(`Sorting by: ${this.value}`);
            });
            
            // Inquiries Section Functionality
            const inquiryStatusFilter = document.getElementById('inquiry-status-filter');
            const exportInquiriesBtn = document.getElementById('export-inquiries-btn');
            const replyInquiryBtns = document.querySelectorAll('.reply-inquiry-btn');
            const viewInquiryBtns = document.querySelectorAll('.view-inquiry-btn');
            const saveInquiryBtn = document.getElementById('save-inquiry-btn');
            const prevInquiriesBtn = document.getElementById('prev-inquiries');
            const nextInquiriesBtn = document.getElementById('next-inquiries');
            
            // Filter Inquiries
            inquiryStatusFilter.addEventListener('change', function() {
                // In a real app, you would filter inquiries by status
                console.log(`Filtering inquiries by status: ${this.value}`);
            });
            
            // Export Inquiries
            exportInquiriesBtn.addEventListener('click', function() {
                // In a real app, you would generate and download an Excel file
                // For demo purposes, we'll simulate a download
                alert('Exporting inquiries to Excel file...');
                
                // Simulate file download
                const data = [
                    ['Date', 'Company', 'Contact', 'Product', 'Quantity', 'Status'],
                    ['20 Feb 2024', 'MediLife Inc.', 'sarah.miller@medilife.com', 'Antibiotic X', '500 units', 'In Progress'],
                    ['19 Feb 2024', 'HealthPlus', 'john.davis@healthplus.com', 'Pain Reliever Y', '1,000 units', 'Pending'],
                    ['18 Feb 2024', 'PharmaGlobal', 'amanda.patel@pharmaglobal.com', 'Vitamin Complex', '2,000 units', 'Completed']
                ];
                
                let csvContent = "data:text/csv;charset=utf-8,";
                data.forEach(row => {
                    csvContent += row.join(",") + "\r\n";
                });
                
                const encodedUri = encodeURI(csvContent);
                const link = document.createElement("a");
                link.setAttribute("href", encodedUri);
                link.setAttribute("download", "inquiries_export.csv");
                document.body.appendChild(link);
                link.click();
                document.body.removeChild(link);
            });
            
            // View Inquiry
            viewInquiryBtns.forEach(btn => {
                btn.addEventListener('click', function() {
                    const inquiryRow = this.closest('tr');
                    const inquiryDate = inquiryRow.cells[0].textContent;
                    const inquiryCompany = inquiryRow.cells[1].textContent;
                    const inquiryContact = inquiryRow.cells[2].textContent;
                    const inquiryProduct = inquiryRow.cells[3].textContent;
                    const inquiryQuantity = inquiryRow.cells[4].textContent;
                    const inquiryStatus = inquiryRow.cells[5].querySelector('.status').textContent;
                    
                    document.getElementById('inquiry-company').value = `${inquiryCompany} (${inquiryDate})`;
                    document.getElementById('inquiry-email').value = inquiryContact;
                    document.getElementById('inquiry-product').value = inquiryProduct;
                    document.getElementById('inquiry-quantity').value = inquiryQuantity;
                    document.getElementById('inquiry-message').value = `Sample message about ${inquiryProduct} from ${inquiryCompany}.`;
                    document.getElementById('inquiry-status').value = inquiryStatus.toLowerCase().replace(' ', '-');
                    
                    openModal('view-inquiry-modal');
                });
            });
            
            // Reply to Inquiry
            replyInquiryBtns.forEach(btn => {
                btn.addEventListener('click', function() {
                    const inquiryRow = this.closest('tr');
                    const inquiryCompany = inquiryRow.cells[1].textContent;
                    const inquiryContact = inquiryRow.cells[2].textContent;
                    
                    alert(`Opening email client to reply to ${inquiryCompany} at ${inquiryContact}`);
                });
            });
            
            // Save Inquiry Changes
            saveInquiryBtn.addEventListener('click', function() {
                const newStatus = document.getElementById('inquiry-status').value;
                alert(`Inquiry status updated to: ${newStatus}`);
                closeModal('view-inquiry-modal');
            });
            
            // Pagination for Inquiries
            let currentInquiryPage = 1;
            
            prevInquiriesBtn.addEventListener('click', function() {
                if (currentInquiryPage > 1) {
                    currentInquiryPage--;
                    // In a real app, you would fetch the previous page of inquiries
                    alert(`Loading page ${currentInquiryPage} of inquiries...`);
                }
            });
            
            nextInquiriesBtn.addEventListener('click', function() {
                currentInquiryPage++;
                // In a real app, you would fetch the next page of inquiries
                alert(`Loading page ${currentInquiryPage} of inquiries...`);
            });
            
            // Reviews Section Functionality
            const reviewRatingFilter = document.getElementById('review-rating-filter');
            const replyReviewBtns = document.querySelectorAll('.reply-review-btn');
            const submitReviewResponse = document.getElementById('submit-review-response');
            const prevReviewsBtn = document.getElementById('prev-reviews');
            const nextReviewsBtn = document.getElementById('next-reviews');
            
            // Filter Reviews
            reviewRatingFilter.addEventListener('change', function() {
                // In a real app, you would filter reviews by rating
                console.log(`Filtering reviews by rating: ${this.value}`);
            });
            
            // Reply to Review
            replyReviewBtns.forEach(btn => {
                btn.addEventListener('click', function() {
                    const reviewItem = this.closest('.review-item');
                    const reviewerName = reviewItem.querySelector('.reviewer-name').textContent.split(' ')[0];
                    const stars = reviewItem.querySelector('.stars').textContent;
                    const reviewText = reviewItem.querySelector('.review-text').textContent;
                    
                    document.getElementById('reviewer-name').value = reviewerName;
                    document.getElementById('review-rating').textContent = stars;
                    document.getElementById('review-text').value = reviewText;
                    document.getElementById('review-response').value = '';
                    
                    openModal('reply-review-modal');
                });
            });
            
            // Submit Review Response
            submitReviewResponse.addEventListener('click', function() {
                const response = document.getElementById('review-response').value;
                if (response.trim() === '') {
                    alert('Please enter a response before submitting.');
                    return;
                }
                
                alert(`Review response submitted: ${response}`);
                closeModal('reply-review-modal');
            });
            
            // Pagination for Reviews
            let currentReviewPage = 1;
            
            prevReviewsBtn.addEventListener('click', function() {
                if (currentReviewPage > 1) {
                    currentReviewPage--;
                    // In a real app, you would fetch the previous page of reviews
                    alert(`Loading page ${currentReviewPage} of reviews...`);
                }
            });
            
            nextReviewsBtn.addEventListener('click', function() {
                currentReviewPage++;
                // In a real app, you would fetch the next page of reviews
                alert(`Loading page ${currentReviewPage} of reviews...`);
            });
            
            // Analytics Section Functionality
            const revenueTimeFilter = document.getElementById('revenue-time-filter');
            const exportAnalyticsBtn = document.getElementById('export-analytics-btn');
            const prevOrdersBtn = document.getElementById('prev-orders');
            const nextOrdersBtn = document.getElementById('next-orders');
            
            // Filter Revenue Data
            revenueTimeFilter.addEventListener('change', function() {
                // In a real app, you would filter revenue data by time period
                console.log(`Filtering revenue data by: ${this.value}`);
            });
            
            // Export Analytics Data
            exportAnalyticsBtn.addEventListener('click', function() {
                // In a real app, you would generate and download an Excel file
                // For demo purposes, we'll simulate a download
                alert('Exporting analytics data to Excel file...');
                
                // Simulate file download
                const data = [
                    ['Order ID', 'Date', 'Customer', 'Products', 'Amount', 'Status'],
                    ['#PC-10245', '20 Feb 2024', 'MediLife Inc.', 'Antibiotic X (500)', '$12,495.00', 'Completed'],
                    ['#PC-10244', '19 Feb 2024', 'HealthPlus', 'Pain Reliever Y (1000)', '$19,990.00', 'Pending'],
                    ['#PC-10243', '18 Feb 2024', 'PharmaGlobal', 'Vitamin Complex (2000)', '$59,980.00', 'Processing']
                ];
                
                let csvContent = "data:text/csv;charset=utf-8,";
                data.forEach(row => {
                    csvContent += row.join(",") + "\r\n";
                });
                
                const encodedUri = encodeURI(csvContent);
                const link = document.createElement("a");
                link.setAttribute("href", encodedUri);
                link.setAttribute("download", "analytics_export.csv");
                document.body.appendChild(link);
                link.click();
                document.body.removeChild(link);
            });
            
            // Pagination for Orders
            let currentOrderPage = 1;
            
            prevOrdersBtn.addEventListener('click', function() {
                if (currentOrderPage > 1) {
                    currentOrderPage--;
                    // In a real app, you would fetch the previous page of orders
                    alert(`Loading page ${currentOrderPage} of orders...`);
                }
            });
            
            nextOrdersBtn.addEventListener('click', function() {
                currentOrderPage++;
                // In a real app, you would fetch the next page of orders
                alert(`Loading page ${currentOrderPage} of orders...`);
            });
            
            // Quick Actions
            document.getElementById('quick-add-product').addEventListener('click', function() {
                // Navigate to products section and trigger add product
                menuItems.forEach(i => i.classList.remove('active'));
                document.querySelector('.menu-item[data-content="products"]').classList.add('active');
                
                contentSections.forEach(section => section.classList.add('hidden'));
                document.getElementById('products-content').classList.remove('hidden');
                
                // Trigger add product
                addProductBtn.click();
            });
            
            document.getElementById('quick-view-inquiries').addEventListener('click', function() {
                // Navigate to inquiries section
                menuItems.forEach(i => i.classList.remove('active'));
                document.querySelector('.menu-item[data-content="inquiries"]').classList.add('active');
                
                contentSections.forEach(section => section.classList.add('hidden'));
                document.getElementById('inquiries-content').classList.remove('hidden');
            });
            
            document.getElementById('quick-edit-profile').addEventListener('click', function() {
                // Navigate to profile section
                menuItems.forEach(i => i.classList.remove('active'));
                document.querySelector('.menu-item[data-content="profile"]').classList.add('active');
                
                contentSections.forEach(section => section.classList.add('hidden'));
                document.getElementById('profile-content').classList.remove('hidden');
            });
            
            document.getElementById('quick-view-analytics').addEventListener('click', function() {
                // Navigate to analytics section
                menuItems.forEach(i => i.classList.remove('active'));
                document.querySelector('.menu-item[data-content="analytics"]').classList.add('active');
                
                contentSections.forEach(section => section.classList.add('hidden'));
                document.getElementById('analytics-content').classList.remove('hidden');
            });
        });
    </script>
</body>
</html>