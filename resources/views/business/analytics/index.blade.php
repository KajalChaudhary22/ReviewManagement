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
            background-color: var(--white);
            color: var(--black);
            transition: var(--transition);
            height: 100vh;
            position: fixed;
            overflow-y: auto;
            z-index: 1000;
            transform: translateX(0);
            border-right: 1px solid #e0e0e0;
        }

        .sidebar-header {
            padding: 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-bottom: 1px solid rgba(0, 0, 0, 0.1);
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
            background-color: rgba(0, 0, 0, 0.05);
        }

        .menu-item.active {
            background-color: var(--primary-color);
            color: var(--white);
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
            from {
                height: 0;
            }

            to {
                height: 70%;
            }
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
            stroke-dashoffset: 47.1;
            /* 85% of 314 */
            animation: circleAnimation 1.5s ease-out;
        }

        @keyframes circleAnimation {
            from {
                stroke-dashoffset: 314;
            }

            to {
                stroke-dashoffset: 47.1;
            }
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

        input:checked+.slider {
            background-color: var(--primary-color);
        }

        input:focus+.slider {
            box-shadow: 0 0 1px var(--primary-color);
        }

        input:checked+.slider:before {
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

            .sidebar-header,
            .menu-text {
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

            .flex>div {
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

            .flex>div {
                width: 100%;
                margin-bottom: 15px;
            }

            .flex>div:last-child {
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
            td,
            th {
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
        input,
        select,
        textarea {
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            font-size: 1rem;
        }

        /* Prevent zooming on input focus on mobile */
        @media screen and (max-width: 768px) {

            input,
            select,
            textarea {
                font-size: 16px;
            }
        }

        /* Styles for the Logout Button */
        .logout-btn {
            /* CHANGED THIS LINE - Increased the margin for more space */
            margin-left: 5px;
            color: var(--text-light);
            /* Sets the initial icon color */
            cursor: pointer;
            transition: color 0.2s ease;
            display: flex;
            align-items: right;
        }

        .logout-btn:hover {
            color: var(--primary-color);
            /* Changes color on hover */
        }

        /* Make sure the original user-profile cursor is default */
        .user-profile {
            display: flex;
            align-items: center;
            cursor: default;
        }

        /* START: CSS FOR CHARTS */
        /* ----- 1. Revenue Overview (Line Chart) ----- */
        .line-chart-container {
            width: 100%;
            height: 300px;
            /* Or adjust as needed */
            position: relative;
        }

        .line-chart-svg {
            width: 100%;
            height: 100%;
            position: absolute;
            top: 0;
            left: 0;
        }

        .line-chart-svg .grid-line {
            stroke: #eee;
            stroke-dasharray: 2, 2;
        }

        .line-chart-svg .axis-label {
            font-size: 10px;
            fill: var(--text-light);
        }

        .line-chart-svg .line {
            fill: none;
            stroke: var(--primary-color);
            stroke-width: 2.5;
            stroke-linecap: round;
            stroke-linejoin: round;
            animation: draw-line 2s ease-out forwards;
        }

        .line-chart-svg .area {
            fill: var(--primary-color);
            opacity: 0.1;
            animation: fill-area 2s ease-out forwards;
        }

        .line-chart-svg .data-point {
            fill: var(--primary-color);
            stroke: white;
            stroke-width: 2;
            opacity: 0;
            animation: show-points 0.5s 1.5s ease-out forwards;
        }

        @keyframes draw-line {
            from {
                stroke-dasharray: 1000;
                stroke-dashoffset: 1000;
            }

            to {
                stroke-dasharray: 1000;
                stroke-dashoffset: 0;
            }
        }

        @keyframes fill-area {
            from {
                opacity: 0;
            }

            to {
                opacity: 0.1;
            }
        }

        @keyframes show-points {
            to {
                opacity: 1;
            }
        }

        /* ----- 2. Sales by Category (Donut Chart) ----- */
        .donut-chart-container {
            width: 100%;
            height: 300px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 20px;
        }

        .donut-chart {
            width: 180px;
            height: 180px;
            border-radius: 50%;
            position: relative;
            background: conic-gradient(#1544da 0% 40%,
                    #5669bc 40% 70%,
                    #8a9ef1 70% 90%,
                    #c1cbf5 90% 100%);
            animation: spin-in 1.5s cubic-bezier(0.68, -0.55, 0.27, 1.55);
        }

        .donut-chart::before {
            content: '';
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            width: 60%;
            height: 60%;
            background: var(--white);
            border-radius: 50%;
        }

        @keyframes spin-in {
            from {
                transform: rotate(-180deg);
                opacity: 0;
            }

            to {
                transform: rotate(0deg);
                opacity: 1;
            }
        }

        .chart-legend {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 15px;
            list-style: none;
        }

        .legend-item {
            display: flex;
            align-items: center;
            font-size: 0.9rem;
        }

        .legend-color {
            width: 12px;
            height: 12px;
            border-radius: 3px;
            margin-right: 8px;
        }

        /* ----- 3. Top Products (Bar Chart) ----- */
        .h-bar-chart-container {
            width: 100%;
            height: 300px;
            display: flex;
            flex-direction: column;
            justify-content: space-around;
            padding: 20px 0;
        }

        .h-bar-item {
            display: flex;
            align-items: center;
            width: 100%;
            margin-bottom: 15px;
        }

        .h-bar-label {
            width: 120px;
            /* Adjust as needed */
            font-size: 0.9rem;
            color: var(--text-light);
            padding-right: 15px;
            text-align: right;
            flex-shrink: 0;
        }

        .h-bar-wrapper {
            flex-grow: 1;
            height: 20px;
            background-color: #f0f0f0;
            border-radius: 10px;
            overflow: hidden;
        }

        .h-bar {
            height: 100%;
            background-color: var(--primary-color);
            border-radius: 10px;
            transform: scaleX(0);
            transform-origin: left;
            animation: grow-h-bar 1.5s ease-out forwards;
        }

        @keyframes grow-h-bar {
            from {
                transform: scaleX(0);
            }

            to {
                transform: scaleX(1);
            }
        }

        /* ----- 4. Customer Geography (Map) ----- */
        .location-chart-container {
            width: 100%;
            height: 300px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 10px;
        }

        .location-item {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .location-label {
            width: 90px;
            /* Adjust as needed */
            font-size: 0.9rem;
            color: var(--text-color);
            flex-shrink: 0;
        }

        .location-bar-wrapper {
            flex-grow: 1;
            height: 12px;
            background-color: #f0f2f5;
            border-radius: 6px;
            overflow: hidden;
        }

        .location-bar {
            height: 100%;
            background-color: var(--accent-color);
            border-radius: 6px;
            transform-origin: left;
            animation: grow-location-bar 1.5s ease-out forwards;
        }

        @keyframes grow-location-bar {
            from {
                width: 0%;
            }

            /* 'to' width is set via inline style */
        }

        /* END: CSS FOR CHARTS */
    </style>
    @include('business.layouts.styles')
</head>

<body>
    <!-- Sidebar -->
    @include('business.layouts.sidebar')

    <!-- Main Content -->
    <div class="main-content">
        <!-- Navbar -->
        @include('business.layouts.navbar')

        <!-- Content Area -->
        <div class="content">


            <!-- Analytics Content -->
            <div id="analytics-content" class="content-section">
                <div class="content-header">
                    <h1 class="welcome-text">Business Analytics</h1>
                    <p class="date-text">{{ \Carbon\Carbon::now()->format('l, d F Y') }}</p>
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
                    <div class="chart-container" style="width: 65%; min-width: 300px;">
                        <div class="table-header">
                            <h2 class="section-title">Revenue Overview</h2>
                            <select class="form-control" style="width: 150px;" id="revenue-time-filter">
                                <option>Last 30 Days</option>
                                <option>Last 90 Days</option>
                                <option>This Year</option>
                                <option>Last Year</option>
                            </select>
                        </div>
                        <!-- START: REVENUE OVERVIEW CHART HTML -->
                        <div class="line-chart-container">
                            <svg class="line-chart-svg" viewBox="0 0 500 300" preserveAspectRatio="xMidYMid meet">
                                <!-- Grid Lines and Axis Labels -->
                                <g class="grid">
                                    <line x1="40" x2="480" y1="250" y2="250" class="grid-line">
                                    </line>
                                    <line x1="40" x2="480" y1="187.5" y2="187.5" class="grid-line">
                                    </line>
                                    <line x1="40" x2="480" y1="125" y2="125" class="grid-line">
                                    </line>
                                    <line x1="40" x2="480" y1="62.5" y2="62.5" class="grid-line">
                                    </line>
                                    <text x="30" y="255" class="axis-label" text-anchor="end">0k</text>
                                    <text x="30" y="192.5" class="axis-label" text-anchor="end">25k</text>
                                    <text x="30" y="130" class="axis-label" text-anchor="end">50k</text>
                                    <text x="30" y="67.5" class="axis-label" text-anchor="end">75k</text>
                                    <text x="60" y="270" class="axis-label">Jan</text>
                                    <text x="140" y="270" class="axis-label">Feb</text>
                                    <text x="220" y="270" class="axis-label">Mar</text>
                                    <text x="300" y="270" class="axis-label">Apr</text>
                                    <text x="380" y="270" class="axis-label">May</text>
                                    <text x="460" y="270" class="axis-label">Jun</text>
                                </g>
                                <!-- Data Line -->
                                <path class="area"
                                    d="M 60 200 L 140 150 L 220 170 L 300 100 L 380 120 L 460 80 V 250 H 60 Z" />
                                <path class="line" d="M 60 200 L 140 150 L 220 170 L 300 100 L 380 120 L 460 80" />
                                <!-- Data Points -->
                                <circle class="data-point" cx="60" cy="200" r="4"></circle>
                                <circle class="data-point" cx="140" cy="150" r="4"></circle>
                                <circle class="data-point" cx="220" cy="170" r="4"></circle>
                                <circle class="data-point" cx="300" cy="100" r="4"></circle>
                                <circle class="data-point" cx="380" cy="120" r="4"></circle>
                                <circle class="data-point" cx="460" cy="80" r="4"></circle>
                            </svg>
                        </div>
                        <!-- END: REVENUE OVERVIEW CHART HTML -->
                    </div>

                    <div class="chart-container" style="flex: 1; min-width: 300px;">
                        <h2 class="section-title">Sales by Category</h2>
                        <!-- START: SALES BY CATEGORY CHART HTML -->
                        <div class="donut-chart-container">
                            <div class="donut-chart"></div>
                            <ul class="chart-legend">
                                <li class="legend-item"><span class="legend-color"
                                        style="background-color: #1544da;"></span>Antibiotics</li>
                                <li class="legend-item"><span class="legend-color"
                                        style="background-color: #5669bc;"></span>Pain Relievers</li>
                                <li class="legend-item"><span class="legend-color"
                                        style="background-color: #8a9ef1;"></span>Vitamins</li>
                                <li class="legend-item"><span class="legend-color"
                                        style="background-color: #c1cbf5;"></span>Supplements</li>
                            </ul>
                        </div>
                        <!-- END: SALES BY CATEGORY CHART HTML -->
                    </div>
                </div>

                <div class="flex" style="gap: 20px; margin-bottom: 30px; flex-wrap: wrap;">
                    <div class="chart-container" style="flex: 1; min-width: 300px;">
                        <h2 class="section-title">Top Products</h2>
                        <!-- START: TOP PRODUCTS CHART HTML -->
                        <div class="h-bar-chart-container">
                            <div class="h-bar-item">
                                <div class="h-bar-label">Antibiotic X</div>
                                <div class="h-bar-wrapper">
                                    <div class="h-bar" style="width: 95%; background-color: #1544da;"></div>
                                </div>
                            </div>
                            <div class="h-bar-item">
                                <div class="h-bar-label">Vitamin C</div>
                                <div class="h-bar-wrapper">
                                    <div class="h-bar"
                                        style="width: 80%; background-color: #5669bc; animation-delay: 0.2s;"></div>
                                </div>
                            </div>
                            <div class="h-bar-item">
                                <div class="h-bar-label">Pain Reliever Y</div>
                                <div class="h-bar-wrapper">
                                    <div class="h-bar"
                                        style="width: 65%; background-color: #8a9ef1; animation-delay: 0.4s;"></div>
                                </div>
                            </div>
                            <div class="h-bar-item">
                                <div class="h-bar-label">Immune Booster</div>
                                <div class="h-bar-wrapper">
                                    <div class="h-bar"
                                        style="width: 50%; background-color: #c1cbf5; animation-delay: 0.6s;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END: TOP PRODUCTS CHART HTML -->
                </div>

                <div class="chart-container" style="flex: 1; min-width: 300px;">
                    <h2 class="section-title">Customer Geography</h2>
                    <!-- START: CUSTOMER GEOGRAPHY CHART HTML -->
                    <div class="location-chart-container">
                        <div class="location-item">
                            <div class="location-label">USA</div>
                            <div class="location-bar-wrapper">
                                <div class="location-bar" style="width: 75%; background-color: #5669bc;"></div>
                            </div>
                        </div>
                        <div class="location-item">
                            <div class="location-label">Germany</div>
                            <div class="location-bar-wrapper">
                                <div class="location-bar" style="width: 58%; background-color: #788bce;"></div>
                            </div>
                        </div>
                        <div class="location-item">
                            <div class="location-label">UK</div>
                            <div class="location-bar-wrapper">
                                <div class="location-bar" style="width: 45%; background-color: #8a9ef1;"></div>
                            </div>
                        </div>
                        <div class="location-item">
                            <div class="location-label">Australia</div>
                            <div class="location-bar-wrapper">
                                <div class="location-bar" style="width: 30%; background-color: #acbaf5;"></div>
                            </div>
                        </div>
                        <div class="location-item">
                            <div class="location-label">Canada</div>
                            <div class="location-bar-wrapper">
                                <div class="location-bar" style="width: 22%; background-color: #c1cbf5;"></div>
                            </div>
                        </div>
                    </div>
                    <!-- END: CUSTOMER GEOGRAPHY CHART HTML -->
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

                <div
                    style="display: flex; justify-content: space-between; align-items: center; margin-top: 30px; flex-wrap: wrap; gap: 10px;">
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
                <button type="button" class="btn btn-primary" style="flex: 1;" id="save-inquiry-btn">Save
                    Changes</button>
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
                <button type="button" class="btn btn-primary" style="flex: 1;" id="submit-review-response">Submit
                    Response</button>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {


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
                    ['#PC-10245', '20 Feb 2024', 'MediLife Inc.', 'Antibiotic X (500)', '$12,495.00',
                        'Completed'
                    ],
                    ['#PC-10244', '19 Feb 2024', 'HealthPlus', 'Pain Reliever Y (1000)', '$19,990.00',
                        'Pending'
                    ],
                    ['#PC-10243', '18 Feb 2024', 'PharmaGlobal', 'Vitamin Complex (2000)', '$59,980.00',
                        'Processing'
                    ]
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
