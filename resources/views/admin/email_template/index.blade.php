<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>LabZora Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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
            overflow-x: hidden;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        /* Sidebar Styles */
        .sidebar {
            width: var(--sidebar-width);
            background-color: var(--dark-color);
            color: var(--white);
            transition: var(--transition);
            height: 100vh;
            position: fixed;
            overflow-y: auto;
            z-index: 1000;
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

        /* Main Content Styles */
        .main-content {
            flex: 1;
            margin-left: var(--sidebar-width);
            transition: var(--transition);
            min-width: 0;
        }

        /* Navbar Styles */
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
            flex-wrap: wrap;
        }

        .search-bar {
            flex: 1;
            max-width: 500px;
            position: relative;
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

        /* Content Area Styles */
        .content {
            padding: 30px;
        }

        .content-header {
            margin-bottom: 30px;
        }

        .welcome-text {
            font-size: 1.8rem;
            font-weight: 600;
            margin-bottom: 5px;
        }

        .date-text {
            color: var(--text-light);
            font-size: 0.9rem;
        }

        /* Stats Cards */
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
            flex-wrap: wrap;
        }

        .stat-change i {
            margin-right: 5px;
        }

        /* Tables */
        .table-container {
            background-color: var(--white);
            border-radius: 10px;
            padding: 20px;
            box-shadow: var(--shadow);
            margin-bottom: 30px;
            overflow-x: auto;
        }

        .table-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            flex-wrap: wrap;
            gap: 10px;
        }

        .section-title {
            font-size: 1.3rem;
            font-weight: 600;
        }

        .view-all {
            color: var(--primary-color);
            font-size: 0.9rem;
            cursor: pointer;
            white-space: nowrap;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 600px;
        }

        th {
            text-align: left;
            padding: 12px 15px;
            color: var(--text-light);
            font-weight: 500;
            border-bottom: 1px solid #eee;
            padding: 8px 10px;
        }

        td {
            padding: 15px;
            border-bottom: 1px solid #eee;
            padding: 10px;
        }

        .status {
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 500;
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

        /* Product Cards */
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

        /* Profile Completion Widget */
        .profile-widget {
            background-color: var(--white);
            border-radius: 10px;
            padding: 20px;
            box-shadow: var(--shadow);
            margin-bottom: 30px;
            width: 100%;
        }

        .progress-container {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-top: 20px;
            flex-direction: column;
        }

        .progress-circle {
            position: relative;
            width: 120px;
            height: 120px;
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
            min-width: 80px;
        }

        .btn-primary {
            background-color: var(--primary-color);
            color: white;
        }

        .btn-primary:hover {
            background-color: var(--secondary-color);
        }

        /* Reviews Section */
        .reviews-container {
            background-color: var(--white);
            border-radius: 10px;
            padding: 20px;
            box-shadow: var(--shadow);
            margin-bottom: 30px;
            width: 100%;
        }

        .review-item {
            display: flex;
            padding: 15px 0;
            border-bottom: 1px solid #eee;
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
            margin: 0 auto 10px;
        }

        .review-content {
            flex: 1;
            min-width: 0;
        }

        .reviewer-name {
            font-weight: 600;
            margin-bottom: 5px;
            text-align: center;
        }

        .stars {
            color: #FFC107;
            margin-bottom: 5px;
            text-align: center;
        }

        .review-text {
            color: var(--text-light);
            font-size: 0.9rem;
            line-height: 1.5;
        }

        /* Quick Actions */
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

        /* Form Elements */
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

        /* Analytics Charts */
        .chart-container {
            background-color: var(--white);
            border-radius: 10px;
            padding: 20px;
            box-shadow: var(--shadow);
            margin-bottom: 30px;

        }

        .chart.chart-bottom-aligned {
            justify-content: flex-end;
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

        /* Settings Tabs */
        .settings-tabs {
            display: flex;
            border-bottom: 1px solid #eee;
            margin-bottom: 20px;
            overflow-x: auto;
            white-space: nowrap;
            -webkit-overflow-scrolling: touch;
        }

        .tab {
            padding: 10px 20px;
            cursor: pointer;
            border-bottom: 3px solid transparent;
            transition: var(--transition);
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

        /* Modal Styles */
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
        }

        .close-modal {
            background: none;
            border: none;
            font-size: 1.5rem;
            cursor: pointer;
            color: var(--text-light);
            padding: 5px;
        }

        .modal-footer {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
            margin-top: 20px;
            flex-wrap: wrap;
        }

        /* Switch Toggle */
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
            transition: var(--transition);
        }

        /* Responsive Styles */
        @media (max-width: 1200px) {
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

            .btn {
                padding: 12px 20px;
                width: 100%;
                margin-bottom: 10px;
            }

            .modal-footer .btn {
                width: auto;
                flex: 1;
            }

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

        /* Icons */
        .icon {
            font-style: normal;
            font-family: 'Segoe UI Symbol', sans-serif;
        }

        .scrollable {
            -webkit-overflow-scrolling: touch;
        }

        input,
        select,
        textarea {
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            font-size: 1rem;
        }

        @media screen and (max-width: 768px) {

            input,
            select,
            textarea {
                font-size: 16px;
            }
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        :root {
            --primary-blue: #0066ff;
            --secondary-blue: #00a8ff;
            --accent-blue: #0044cc;
            --light-blue: #e6f0ff;
            --dark-blue: #003399;
            --white: #ffffff;
            --light-gray: #f8f9fa;
            --medium-gray: #e9ecef;
            --dark-gray: #6c757d;
            --text-dark: #212529;
            --glass-bg: rgba(255, 255, 255, 0.7);
            --glass-border: rgba(0, 102, 255, 0.15);
            --shadow: 0 8px 24px rgba(0, 51, 153, 0.08);
            --glow: 0 0 15px rgba(0, 168, 255, 0.4);
            --transition: all 0.3s ease;
        }

        .container {
            width: 100%;
            max-width: 900px;
            display: flex;
            flex-direction: column;
            gap: 2rem;
        }

        .card {
            background: var(--glass-bg);
            backdrop-filter: blur(10px);
            border-radius: 16px;
            border: 1px solid var(--glass-border);
            box-shadow: var(--shadow);
            padding: 2rem;
            transition: var(--transition);
            animation: fadeInUp 0.8s ease-out;
            position: relative;
            overflow: hidden;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow), var(--glow);
        }

        .card::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(0, 168, 255, 0.05) 0%, rgba(0, 168, 255, 0) 70%);
            pointer-events: none;
        }

        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
            padding-bottom: 1.25rem;
            border-bottom: 1px solid var(--glass-border);
        }

        .card-title {
            font-size: 1.5rem;
            font-weight: 600;
            color: var(--text-dark);
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .card-title i {
            color: var(--primary-blue);
            font-size: 1.3rem;
        }

        .form-group {
            margin-bottom: 1.75rem;
            position: relative;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.75rem;
            font-weight: 500;
            color: var(--text-dark);
            font-size: 1rem;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .form-control {
            width: 100%;
            padding: 1rem 1.25rem;
            background: var(--white);
            border: 1px solid var(--medium-gray);
            border-radius: 12px;
            color: var(--text-dark);
            font-size: 1rem;
            transition: var(--transition);
            outline: none;
            box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.05);
        }

        .form-control:focus {
            border-color: var(--primary-blue);
            box-shadow: 0 0 0 3px rgba(0, 102, 255, 0.15);
        }

        textarea.form-control {
            min-height: 150px;
            resize: vertical;
            line-height: 1.6;
        }

        .btn-group {
            display: flex;
            gap: 1rem;
            margin-top: 1.5rem;
            flex-wrap: wrap;
        }

        .btn {
            padding: 0.9rem 1.8rem;
            border-radius: 12px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.75rem;
            border: 2px solid transparent;
        }

        .btn-preview {
            background: transparent;
            color: var(--primary-blue);
            border: 2px solid var(--primary-blue);
        }

        .btn-preview:hover {
            background: rgba(0, 102, 255, 0.05);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 102, 255, 0.1);
        }

        .btn-save {
            background: linear-gradient(135deg, var(--primary-blue), var(--accent-blue));
            color: var(--white);
            box-shadow: 0 4px 15px rgba(0, 102, 255, 0.3);
            position: relative;
            overflow: hidden;
        }

        .btn-save:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(0, 102, 255, 0.4), var(--glow);
        }

        .btn-save::after {
            content: "";
            position: absolute;
            top: -50%;
            left: -60%;
            width: 20px;
            height: 200%;
            background: rgba(255, 255, 255, 0.3);
            transform: rotate(25deg);
            transition: all 0.6s;
        }

        .btn-save:hover::after {
            left: 120%;
        }

        .btn-discard {
            background: transparent;
            color: var(--dark-gray);
            border: 2px solid var(--medium-gray);
        }

        .btn-discard:hover {
            color: #ff4d4d;
            transform: translateY(-2px);
            border-color: #ffb3b3;
        }

        .preview-section {
            margin-top: 2rem;
            padding-top: 2rem;
            border-top: 1px solid var(--glass-border);
        }

        .preview-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1rem;
        }

        .preview-content {
            background: var(--white);
            border-radius: 12px;
            padding: 1.5rem;
            min-height: 200px;
            border: 1px solid var(--medium-gray);
            box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.05);
        }

        .template-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 1.5rem;
            margin-top: 1.5rem;
        }

        .template-card {
            background: var(--white);
            border-radius: 16px;
            overflow: hidden;
            border: 1px solid var(--medium-gray);
            transition: var(--transition);
            cursor: pointer;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        }

        .template-card:hover {
            transform: translateY(-5px);
            border-color: var(--primary-blue);
            box-shadow: 0 8px 20px rgba(0, 102, 255, 0.15), var(--glow);
        }

        .template-preview {
            height: 150px;
            background: linear-gradient(135deg, var(--light-blue), var(--white));
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            border-bottom: 1px solid var(--medium-gray);
        }

        .template-preview::before {
            content: "";
            position: absolute;
            top: 20px;
            left: 20px;
            right: 20px;
            bottom: 20px;
            border: 1px dashed var(--medium-gray);
            border-radius: 8px;
        }

        .template-info {
            padding: 1.25rem;
        }

        .template-name {
            font-weight: 600;
            margin-bottom: 0.5rem;
            color: var(--text-dark);
        }

        .template-date {
            font-size: 0.85rem;
            color: var(--dark-gray);
        }

        .template-actions {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
            margin-top: 10px;
        }

        .template-actions button {
            background: none;
            border: none;
            cursor: pointer;
            font-size: 1rem;
            padding: 5px;
            border-radius: 5px;
            transition: var(--transition);
        }

        .template-actions button:hover {
            background-color: var(--light-gray);
        }

        .edit-btn {
            color: var(--primary-blue);
        }

        .delete-btn {
            color: #dc3545;
        }

        /* Styles for the new Profile + Logout container */
        .profile-container {
            display: flex;
            align-items: center;
        }

        /* Styles for the Logout Button */
        .logout-btn {
            margin-left: 25px;
            color: var(--text-light);
            cursor: pointer;
            transition: color 0.2s ease;
            display: flex;
            align-items: center;
        }

        .logout-btn:hover {
            color: var(--primary-color);
        }

        /* Make sure the original user-profile cursor is default */
        .user-profile {
            display: flex;
            align-items: center;
            cursor: default;
        }

        /* Analytics Charts */
        .chart {
            width: 100%;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .bar-chart {
            display: flex;
            align-items: flex-end;
            height: 250px;
            padding: 20px 0 30px;
            gap: 15px;
        }

        .bar {
            flex: 1;
            background: linear-gradient(to top, var(--primary-blue), var(--secondary-blue));
            border-radius: 5px 5px 0 0;
            position: relative;
            transition: height 0.5s ease;

        }

        .bar-label {
            position: absolute;
            bottom: -25px;
            left: 0;
            right: 0;
            text-align: center;
            font-size: 0.8rem;
            color: var(--text-light);
        }

        .bar-value {
            position: absolute;
            top: -25px;
            left: 0;
            right: 0;
            text-align: center;
            font-weight: 600;
            color: var(--primary-blue);
        }

        .pie-chart {
            width: 200px;
            height: 200px;
            border-radius: 50%;
            background: conic-gradient(#4e73df 0% 30%,
                    #1cc88a 30% 55%,
                    #36b9cc 55% 75%,
                    #f6c23e 75% 90%,
                    #e74a3b 90% 100%);
            margin: 0 auto;
            position: relative;

        }

        .pie-center {
            position: absolute;
            width: 100px;
            height: 100px;
            background: white;
            border-radius: 50%;
            top: 50px;
            left: 50px;

        }

        .pie-legend {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-top: 20px;
            justify-content: center;
        }

        .pie-legend-item {
            display: flex;
            align-items: center;
            gap: 5px;
            font-size: 0.8rem;
        }

        .pie-color {
            width: 15px;
            height: 15px;
            border-radius: 3px;
        }

        .line-chart {
            height: 250px;
            position: relative;
            padding: 20px 0;

        }

        .line-point {
            position: absolute;
            width: 10px;
            height: 10px;
            background-color: var(--primary-blue);
            border-radius: 50%;
            transform: translate(-50%, -50%);
        }

        .line-connector {
            position: absolute;
            height: 3px;
            background-color: var(--primary-blue);
            transform-origin: left center;
        }

        .line-value {
            position: absolute;
            font-size: 0.8rem;
            color: var(--text-light);
        }

        .map-chart {
            height: 250px;
            background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 800 500"><path d="M200,100 Q300,50 400,150 T600,100" stroke="%230066ff" stroke-width="3" fill="none" /><path d="M250,200 Q350,150 450,250 T650,200" stroke="%2300a8ff" stroke-width="3" fill="none" /><circle cx="200" cy="100" r="8" fill="%230066ff" /><circle cx="400" cy="150" r="8" fill="%230066ff" /><circle cx="600" cy="100" r="8" fill="%230066ff" /><circle cx="250" cy="200" r="8" fill="%2300a8ff" /><circle cx="450" cy="250" r="8" fill="%2300a8ff" /><circle cx="650" cy="200" r="8" fill="%2300a8ff" /></svg>');
            background-repeat: no-repeat;
            background-position: center;
            background-size: contain;
        }

        /* Modal Styles for Template Editing */
        .template-modal-content {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            width: 90%;
            max-width: 800px;
            max-height: 90vh;
            overflow-y: auto;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        }

        /* Reply Form Styles */
        .reply-form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .reply-form .form-group {
            margin-bottom: 0;
        }
    </style>
    {{-- @include('admin.layouts.styles') --}}
</head>

<body>
    <!-- Sidebar -->
    @include('admin.layouts.sidebar')

    <!-- Main Content -->
    <div class="main-content">
        <!-- Navbar -->
        @include('admin.layouts.navbar')

        <!-- Content Area -->
        <div class="content">
            <!-- Dashboard Content (Default) -->
            <div id="dashboard-content" class="content-section">
                <div class="header">
                    <div class="subtitle">EMAIL TEMPLATE MANAGER</div>
                    <br>
                </div>
                <div class="container">
                    <div class="card">
                        <div class="card-header">
                            <h2 class="card-title"><i class="fas fa-plus-circle"></i> Create New Template</h2>
                        </div>

                        <div class="form-group">
                            <label for="eventName"><i class="fas fa-calendar-alt"></i> Event Name</label>
                            <input type="text" id="eventName" class="form-control"
                                placeholder="Enter event name">
                        </div>

                        <div class="form-group">
                            <label for="emailSubject"><i class="fas fa-tag"></i> Email Subject</label>
                            <input type="text" id="emailSubject" class="form-control"
                                placeholder="Enter email subject">
                        </div>

                        <div class="form-group">
                            <label for="emailBody"><i class="fas fa-align-left"></i> Email Body</label>
                            <textarea id="emailBody" class="form-control" placeholder="Compose your email content..."></textarea>
                        </div>

                        <div class="btn-group">
                            <button class="btn btn-preview" id="preview-template"><i class="fas fa-eye"></i>
                                Preview</button>
                            <button class="btn btn-save" id="save-template"><i class="fas fa-save"></i> Save
                                Template</button>
                            <button class="btn btn-discard" id="discard-template"><i class="fas fa-times"></i>
                                Discard</button>
                        </div>

                        <div class="preview-section">
                            <div class="preview-header">
                                <h3 class="card-title"><i class="fas fa-desktop"></i> Live Preview</h3>
                            </div>
                            <div class="preview-content">
                                <div class="preview-placeholder">
                                    <h3 style="color: var(--primary-blue); margin-bottom: 15px;">Event Announcement
                                    </h3>
                                    <p>Dear valued customer,</p>
                                    <p>We're excited to announce our upcoming event. This is a great opportunity to
                                        learn about our latest products and services.</p>
                                    <p>Key Details:</p>
                                    <ul style="margin-left: 20px; margin-bottom: 15px;">
                                        <li>Date: [Event Date]</li>
                                        <li>Time: [Event Time]</li>
                                        <li>Location: [Event Venue]</li>
                                    </ul>
                                    <p>Register now to secure your spot!</p>
                                    <p style="margin-top: 20px;">Best regards,<br>The SCIZORA Team</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h2 class="card-title"><i class="fas fa-folder"></i> Saved Templates</h2>
                            <button class="btn btn-preview" style="padding: 0.5rem 1rem;" id="refresh-templates"><i
                                    class="fas fa-sync-alt"></i> Refresh</button>
                        </div>

                        <div class="template-grid" id="saved-templates-container">
                            <!-- Templates will be dynamically added here -->
                        </div>
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
                                    <div
                                        style="width: 80px; height: 80px; border-radius: 8px; background-color: #f0f0f0; overflow: hidden;">
                                        <img src="https://via.placeholder.com/80x80?text=PC" alt="Company Logo"
                                            style="width: 100%; height: 100%; object-fit: cover;">
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
                        <button id="cancel-profile-changes" class="btn"
                            style="background-color: #f0f0f0;">Cancel</button>
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
                            <input type="text" class="form-control" placeholder="Search products..."
                                id="product-search">
                        </div>
                        <select class="form-control" style="width: 200px; min-width: 150px;"
                            id="product-category-filter">
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

                    <div class="products-grid" style="grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));"
                        id="products-grid">
                        <div class="product-card">
                            <div class="product-image">
                                <img src="https://via.placeholder.com/400x300?text=Antibiotic+X" alt="Antibiotic X">
                            </div>
                            <h3 class="product-name">Antibiotic</h3>
                            <div class="product-meta">
                                <span>SKU: PC-ABX-500</span>
                                <span>In Stock: 1,240</span>
                            </div>
                            <div style="display: flex; justify-content: space-between; margin-top: 15px;">
                                <span style="color: var(--primary-color); font-weight: 600;">$24.99</span>
                                <div>
                                    <button class="edit-product-btn"
                                        style="background: none; border: none; cursor: pointer; margin-right: 10px;">✏️</button>
                                    <button class="delete-product-btn"
                                        style="background: none; border: none; cursor: pointer;">🗑️</button>
                                </div>
                            </div>
                        </div>
                        <div class="product-card">
                            <div class="product-image">
                                <img src="https://via.placeholder.com/400x300?text=Pain+Reliever+Y"
                                    alt="Pain Reliever Y">
                            </div>
                            <h3 class="product-name">Pain Reliever</h3>
                            <div class="product-meta">
                                <span>SKU: PC-PRY-200</span>
                                <span>In Stock: 980</span>
                            </div>
                            <div style="display: flex; justify-content: space-between; margin-top: 15px;">
                                <span style="color: var(--primary-color); font-weight: 600;">$19.99</span>
                                <div>
                                    <button class="edit-product-btn"
                                        style="background: none; border: none; cursor: pointer; margin-right: 10px;">✏️</button>
                                    <button class="delete-product-btn"
                                        style="background: none; border: none; cursor: pointer;">🗑️</button>
                                </div>
                            </div>
                        </div>
                        <div class="product-card">
                            <div class="product-image">
                                <img src="https://via.placeholder.com/400x300?text=Vitamin+Complex"
                                    alt="Vitamin Complex">
                            </div>
                            <h3 class="product-name">Vitamin Complex</h3>
                            <div class="product-meta">
                                <span>SKU: PC-VTC-100</span>
                                <span>In Stock: 750</span>
                            </div>
                            <div style="display: flex; justify-content: space-between; margin-top: 15px;">
                                <span style="color: var(--primary-color); font-weight: 600;">$29.99</span>
                                <div>
                                    <button class="edit-product-btn"
                                        style="background: none; border: none; cursor: pointer; margin-right: 10px;">✏️</button>
                                    <button class="delete-product-btn"
                                        style="background: none; border: none; cursor: pointer;">🗑️</button>
                                </div>
                            </div>
                        </div>
                        <div class="product-card">
                            <div class="product-image">
                                <img src="https://via.placeholder.com/400x300?text=Immune+Booster"
                                    alt="Immune Booster">
                            </div>
                            <h3 class="product-name">Immune Booster</h3>
                            <div class="product-meta">
                                <span>SKU: PC-IMB-300</span>
                                <span>In Stock: 420</span>
                            </div>
                            <div style="display: flex; justify-content: space-between; margin-top: 15px;">
                                <span style="color: var(--primary-color); font-weight: 600;">$34.99</span>
                                <div>
                                    <button class="edit-product-btn"
                                        style="background: none; border: none; cursor: pointer; margin-right: 10px;">✏️</button>
                                    <button class="delete-product-btn"
                                        style="background: none; border: none; cursor: pointer;">🗑️</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div
                        style="display: flex; justify-content: space-between; align-items: center; margin-top: 30px; flex-wrap: wrap; gap: 10px;">
                        <div style="color: var(--text-light);">
                            Showing 1-4 of 124 products
                        </div>
                        <div style="display: flex; gap: 10px;">
                            <button class="btn" style="background-color: #f0f0f0;"
                                id="prev-products">Previous</button>
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
                                    <button class="edit-service-btn"
                                        style="background: none; border: none; cursor: pointer; margin-right: 10px;">✏️</button>
                                    <button class="delete-service-btn"
                                        style="background: none; border: none; cursor: pointer;">🗑️</button>
                                </td>
                            </tr>
                            <tr>
                                <td>Private Labeling</td>
                                <td>Brand our products with your own label and packaging</td>
                                <td>$500+</td>
                                <td>
                                    <button class="edit-service-btn"
                                        style="background: none; border: none; cursor: pointer; margin-right: 10px;">✏️</button>
                                    <button class="delete-service-btn"
                                        style="background: none; border: none; cursor: pointer;">🗑️</button>
                                </td>
                            </tr>
                            <tr>
                                <td>Bulk Discounts</td>
                                <td>Special pricing for large quantity orders</td>
                                <td>20-50% off</td>
                                <td>
                                    <button class="edit-service-btn"
                                        style="background: none; border: none; cursor: pointer; margin-right: 10px;">✏️</button>
                                    <button class="delete-service-btn"
                                        style="background: none; border: none; cursor: pointer;">🗑️</button>
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
                            <select class="form-control" style="width: 150px; min-width: 120px;"
                                id="inquiry-status-filter">
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
                                    <button class="reply-inquiry-btn" data-company="MediLife Inc."
                                        data-email="sarah.miller@medilife.com"
                                        style="background: none; border: none; cursor: pointer;">✉️</button>
                                    <button class="view-inquiry-btn"
                                        style="background: none; border: none; cursor: pointer;">👁️</button>
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
                                    <button class="reply-inquiry-btn" data-company="HealthPlus"
                                        data-email="john.davis@healthplus.com"
                                        style="background: none; border: none; cursor: pointer;">✉️</button>
                                    <button class="view-inquiry-btn"
                                        style="background: none; border: none; cursor: pointer;">👁️</button>
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
                                    <button class="reply-inquiry-btn" data-company="PharmaGlobal"
                                        data-email="amanda.patel@pharmaglobal.com"
                                        style="background: none; border: none; cursor: pointer;">✉️</button>
                                    <button class="view-inquiry-btn"
                                        style="background: none; border: none; cursor: pointer;">👁️</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <div
                        style="display: flex; justify-content: space-between; align-items: center; margin-top: 30px; flex-wrap: wrap; gap: 10px;">
                        <div style="color: var(--text-light);">
                            Showing 1-3 of 35 active inquiries
                        </div>
                        <div style="display: flex; gap: 10px;">
                            <button class="btn" style="background-color: #f0f0f0;"
                                id="prev-inquiries">Previous</button>
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
                                <select class="form-control" style="width: 150px; min-width: 120px;"
                                    id="review-rating-filter">
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
                                <div class="reviewer-name">Sarah Miller <span
                                        style="color: var(--text-light); font-weight: normal;">- MediLife Inc.</span>
                                </div>
                                <div class="stars">★★★★★ <span
                                        style="color: var(--text-light); font-size: 0.9rem;">20 Feb 2024</span></div>
                                <div class="review-text">We've been working with PharmaCorp for over 3 years now and
                                    their products have consistently exceeded our expectations. The Antibiotic X is
                                    particularly effective with minimal side effects reported by our patients.</div>
                                <div style="margin-top: 10px;">
                                    <span style="font-size: 0.9rem; color: var(--text-light);">Product: Antibiotic
                                        X</span>
                                </div>
                                <button class="btn reply-review-btn"
                                    style="padding: 5px 10px; font-size: 0.8rem; margin-top: 10px;">Reply</button>
                            </div>
                        </div>

                        <div class="review-item">
                            <div class="reviewer-avatar">JD</div>
                            <div class="review-content">
                                <div class="reviewer-name">John Davis <span
                                        style="color: var(--text-light); font-weight: normal;">- HealthPlus</span>
                                </div>
                                <div class="stars">★★★★☆ <span
                                        style="color: var(--text-light); font-size: 0.9rem;">18 Feb 2024</span></div>
                                <div class="review-text">The Pain Reliever Y works well for most of our patients,
                                    though we've had a few reports of mild stomach discomfort. Packaging could be more
                                    eco-friendly.</div>
                                <div style="margin-top: 10px;">
                                    <span style="font-size: 0.9rem; color: var(--text-light);">Product: Pain Reliever
                                        Y</span>
                                </div>
                                <div
                                    style="background-color: #f9f9f9; padding: 10px; border-radius: 5px; margin-top: 10px;">
                                    <div style="font-weight: 500; margin-bottom: 5px;">Your Response:</div>
                                    <div>Thank you for your feedback, John. We're currently developing a new formulation
                                        to reduce stomach discomfort and will be introducing eco-friendly packaging
                                        options next quarter.</div>
                                </div>
                            </div>
                        </div>

                        <div class="review-item">
                            <div class="reviewer-avatar">AP</div>
                            <div class="review-content">
                                <div class="reviewer-name">Amanda Patel <span
                                        style="color: var(--text-light); font-weight: normal;">- PharmaGlobal</span>
                                </div>
                                <div class="stars">★★★★★ <span
                                        style="color: var(--text-light); font-size: 0.9rem;">15 Feb 2024</span></div>
                                <div class="review-text">The Vitamin Complex is our best-selling supplement! Customers
                                    report increased energy levels and overall wellbeing. Delivery is always prompt.
                                </div>
                                <div style="margin-top: 10px;">
                                    <span style="font-size: 0.9rem; color: var(--text-light);">Product: Vitamin
                                        Complex</span>
                                </div>
                                <button class="btn reply-review-btn"
                                    style="padding: 5px 10px; font-size: 0.8rem; margin-top: 10px;">Reply</button>
                            </div>
                        </div>

                        <div
                            style="display: flex; justify-content: space-between; align-items: center; margin-top: 30px; flex-wrap: wrap; gap: 10px;">
                            <div style="color: var(--text-light);">
                                Showing 1-3 of 28 new reviews
                            </div>
                            <div style="display: flex; gap: 10px;">
                                <button class="btn" style="background-color: #f0f0f0;"
                                    id="prev-reviews">Previous</button>
                                <button class="btn btn-primary" id="next-reviews">Next</button>
                            </div>
                        </div>
                    </div>

                    <div class="table-container" style="flex: 1; min-width: 300px;">
                        <h2 class="section-title">Rating Distribution</h2>

                        <div style="margin-top: 20px;">
                            <div style="display: flex; align-items: center; margin-bottom: 10px;">
                                <div style="width: 80px;">5 Stars</div>
                                <div
                                    style="flex: 1; height: 20px; background-color: #f0f0f0; border-radius: 10px; margin: 0 10px; overflow: hidden;">
                                    <div style="width: 72%; height: 100%; background-color: var(--primary-color);">
                                    </div>
                                </div>
                                <div>112</div>
                            </div>
                            <div style="display: flex; align-items: center; margin-bottom: 10px;">
                                <div style="width: 80px;">4 Stars</div>
                                <div
                                    style="flex: 1; height: 20px; background-color: #f0f0f0; border-radius: 10px; margin: 0 10px; overflow: hidden;">
                                    <div style="width: 18%; height: 100%; background-color: var(--primary-color);">
                                    </div>
                                </div>
                                <div>28</div>
                            </div>
                            <div style="display: flex; align-items: center; margin-bottom: 10px;">
                                <div style="width: 80px;">3 Stars</div>
                                <div
                                    style="flex: 1; height: 20px; background-color: #f0f0f0; border-radius: 10px; margin: 0 10px; overflow: hidden;">
                                    <div style="width: 6%; height: 100%; background-color: var(--primary-color);">
                                    </div>
                                </div>
                                <div>9</div>
                            </div>
                            <div style="display: flex; align-items: center; margin-bottom: 10px;">
                                <div style="width: 80px;">2 Stars</div>
                                <div
                                    style="flex: 1; height: 20px; background-color: #f0f0f0; border-radius: 10px; margin: 0 10px; overflow: hidden;">
                                    <div style="width: 3%; height: 100%; background-color: var(--primary-color);">
                                    </div>
                                </div>
                                <div>4</div>
                            </div>
                            <div style="display: flex; align-items: center; margin-bottom: 10px;">
                                <div style="width: 80px;">1 Star</div>
                                <div
                                    style="flex: 1; height: 20px; background-color: #f0f0f0; border-radius: 10px; margin: 0 10px; overflow: hidden;">
                                    <div style="width: 1%; height: 100%; background-color: var(--primary-color);">
                                    </div>
                                </div>
                                <div>3</div>
                            </div>
                        </div>

                        <h2 style="margin-top: 30px; font-size: 1.2rem;">Review Highlights</h2>

                        <div style="margin-top: 15px;">
                            <div style="font-weight: 500; margin-bottom: 5px;">Most Mentioned Positive</div>
                            <div style="display: flex; flex-wrap: wrap; gap: 5px; margin-bottom: 15px;">
                                <span
                                    style="background-color: #E8F5E9; color: #2E7D32; padding: 3px 8px; border-radius: 20px; font-size: 0.8rem;">Quality
                                    (87)</span>
                                <span
                                    style="background-color: #E8F5E9; color: #2E7D32; padding: 3px 8px; border-radius: 20px; font-size: 0.8rem;">Delivery
                                    (65)</span>
                                <span
                                    style="background-color: #E8F5E9; color: #2E7D32; padding: 3px 8px; border-radius: 20px; font-size: 0.8rem;">Effectiveness
                                    (58)</span>
                                <span
                                    style="background-color: #E8F5E9; color: #2E7D32; padding: 3px 8px; border-radius: 20px; font-size: 0.8rem;">Customer
                                    Service (42)</span>
                            </div>

                            <div style="font-weight: 500; margin-bottom: 5px;">Most Mentioned Negative</div>
                            <div style="display: flex; flex-wrap: wrap; gap: 5px;">
                                <span
                                    style="background-color: #FFEBEE; color: #5A009D; padding: 3px 8px; border-radius: 20px; font-size: 0.8rem;">Packaging
                                    (12)</span>
                                <span
                                    style="background-color: #FFEBEE; color: #5A009D; padding: 3px 8px; border-radius: 20px; font-size: 0.8rem;">Side
                                    Effects (8)</span>
                                <span
                                    style="background-color: #FFEBEE; color: #5A009D; padding: 3px 8px; border-radius: 20px; font-size: 0.8rem;">Price
                                    (5)</span>
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
                        <div class="chart">
                            <div class="bar-chart">
                                <div class="bar" style="height: 70%;">
                                    <div class="bar-value">$42K</div>
                                    <div class="bar-label">Jan</div>
                                </div>
                                <div class="bar" style="height: 85%;">
                                    <div class="bar-value">$51K</div>
                                    <div class="bar-label">Feb</div>
                                </div>
                                <div class="bar" style="height: 65%;">
                                    <div class="bar-value">$39K</div>
                                    <div class="bar-label">Mar</div>
                                </div>
                                <div class="bar" style="height: 90%;">
                                    <div class="bar-value">$54K</div>
                                    <div class="bar-label">Apr</div>
                                </div>
                                <div class="bar" style="height: 75%;">
                                    <div class="bar-value">$45K</div>
                                    <div class="bar-label">May</div>
                                </div>
                                <div class="bar" style="height: 95%;">
                                    <div class="bar-value">$57K</div>
                                    <div class="bar-label">Jun</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="chart-container" style="flex: 1; min-width: 300px;">
                        <h2 class="section-title">Sales by Category</h2>
                        <div class="chart">
                            <div class="pie-chart">
                                <div class="pie-center"></div>
                            </div>
                            <div class="pie-legend">
                                <div class="pie-legend-item">
                                    <div class="pie-color" style="background-color: #4e73df;"></div>
                                    <span>Antibiotics (30%)</span>
                                </div>
                                <div class="pie-legend-item">
                                    <div class="pie-color" style="background-color: #1cc88a;"></div>
                                    <span>Pain Relievers (25%)</span>
                                </div>
                                <div class="pie-legend-item">
                                    <div class="pie-color" style="background-color: #36b9cc;"></div>
                                    <span>Vitamins (20%)</span>
                                </div>
                                <div class="pie-legend-item">
                                    <div class="pie-color" style="background-color: #f6c23e;"></div>
                                    <span>Supplements (15%)</span>
                                </div>
                                <div class="pie-legend-item">
                                    <div class="pie-color" style="background-color: #e74a3b;"></div>
                                    <span>Other (10%)</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex" style="gap: 20px; margin-bottom: 30px; flex-wrap: wrap;">
                    <div class="chart-container" style="flex: 1; min-width: 300px;">
                        <h2 class="section-title">Top Products</h2>

                        <div class="chart chart-bottom-aligned">
                            <div class="bar-chart">
                                <div class="bar" style="height: 95%;">
                                    <div class="bar-value">$57K</div>
                                    <div class="bar-label">Antibiotic</div>
                                </div>
                                <div class="bar" style="height: 85%;">
                                    <div class="bar-value">$51K</div>
                                    <div class="bar-label">Pain Reliever</div>
                                </div>
                                <div class="bar" style="height: 75%;">
                                    <div class="bar-value">$45K</div>
                                    <div class="bar-label">Vitamin</div>
                                </div>
                                <div class="bar" style="height: 65%;">
                                    <div class="bar-value">$39K</div>
                                    <div class="bar-label">Immune</div>
                                </div>
                                <div class="bar" style="height: 55%;">
                                    <div class="bar-value">$33K</div>
                                    <div class="bar-label">Sleep Aid</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="chart-container" style="flex: 1; min-width: 300px;">
                        <h2 class="section-title">Customer Geography</h2>
                        <div class="chart">
                            <div class="map-chart"></div>
                            <div class="pie-legend">
                                <div class="pie-legend-item">
                                    <div class="pie-color" style="background-color: #0066ff;"></div>
                                    <span>North America (45%)</span>
                                </div>
                                <div class="pie-legend-item">
                                    <div class="pie-color" style="background-color: #00a8ff;"></div>
                                    <span>Europe (35%)</span>
                                </div>
                                <div class="pie-legend-item">
                                    <div class="pie-color" style="background-color: #0044cc;"></div>
                                    <span>Asia (15%)</span>
                                </div>
                                <div class="pie-legend-item">
                                    <div class="pie-color" style="background-color: #003399;"></div>
                                    <span>Other (5%)</span>
                                </div>
                            </div>
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
                        </tbody>
                    </table>

                    <div
                        style="display: flex; justify-content: space-between; align-items: center; margin-top: 30px; flex-wrap: wrap; gap: 10px;">
                        <div style="color: var(--text-light);">
                            Showing 1-3 of 287 orders
                        </div>
                        <div style="display: flex; gap: 10px;">
                            <button class="btn" style="background-color: #f0f0f0;"
                                id="prev-orders">Previous</button>
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

                        <div
                            style="display: flex; align-items: center; gap: 20px; margin-bottom: 30px; flex-wrap: wrap;">
                            <div class="user-avatar" style="width: 80px; height: 80px;">
                                <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="John Doe">
                            </div>
                            <div style="display: flex; gap: 10px;">
                                <button class="btn btn-primary">Upload New</button>
                                <button class="btn" style="background-color: #f0f0f0;">Remove</button>
                            </div>
                        </div>

                        <div class="flex justify-between" style="margin-top: 30px; flex-wrap: wrap; gap: 10px;">
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

                        <div
                            style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px; flex-wrap: wrap;">
                            <div style="flex: 1; min-width: 200px;">
                                <div style="font-weight: 500; margin-bottom: 5px;">SMS Authentication</div>
                                <div style="color: var(--text-light);">Add your phone number to receive security codes
                                    via SMS</div>
                            </div>
                            <button class="btn" style="background-color: #f0f0f0;">Enable</button>
                        </div>

                        <div
                            style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap;">
                            <div style="flex: 1; min-width: 200px;">
                                <div style="font-weight: 500; margin-bottom: 5px;">Authenticator App</div>
                                <div style="color: var(--text-light);">Use an authenticator app to generate security
                                    codes</div>
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

                        <div
                            style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 15px; flex-wrap: wrap;">
                            <div style="flex: 1; min-width: 200px;">
                                <div style="font-weight: 500; margin-bottom: 5px;">New Orders</div>
                                <div style="color: var(--text-light);">Receive notifications when new orders are placed
                                </div>
                            </div>
                            <label class="switch">
                                <input type="checkbox" checked>
                                <span class="slider round"></span>
                            </label>
                        </div>

                        <div
                            style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 15px; flex-wrap: wrap;">
                            <div style="flex: 1; min-width: 200px;">
                                <div style="font-weight: 500; margin-bottom: 5px;">Inquiries</div>
                                <div style="color: var(--text-light);">Receive notifications for new inquiries</div>
                            </div>
                            <label class="switch">
                                <input type="checkbox" checked>
                                <span class="slider round"></span>
                            </label>
                        </div>

                        <div
                            style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 15px; flex-wrap: wrap;">
                            <div style="flex: 1; min-width: 200px;">
                                <div style="font-weight: 500; margin-bottom: 5px;">Reviews</div>
                                <div style="color: var(--text-light);">Receive notifications for new reviews</div>
                            </div>
                            <label class="switch">
                                <input type="checkbox" checked>
                                <span class="slider round"></span>
                            </label>
                        </div>

                        <div
                            style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px; flex-wrap: wrap;">
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

                        <div
                            style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 15px; flex-wrap: wrap;">
                            <div style="flex: 1; min-width: 200px;">
                                <div style="font-weight: 500; margin-bottom: 5px;">Order Updates</div>
                                <div style="color: var(--text-light);">Receive push notifications for order status
                                    changes</div>
                            </div>
                            <label class="switch">
                                <input type="checkbox" checked>
                                <span class="slider round"></span>
                            </label>
                        </div>

                        <div
                            style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap;">
                            <div style="flex: 1; min-width: 200px;">
                                <div style="font-weight: 500; margin-bottom: 5px;">Important Alerts</div>
                                <div style="color: var(--text-light);">Receive important system alerts and
                                    notifications</div>
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

    <!-- Template Edit Modal -->
    <div class="modal" id="edit-template-modal">
        <div class="template-modal-content">
            <div class="modal-header">
                <h2 class="modal-title">Edit Template</h2>
                <button class="close-modal">&times;</button>
            </div>
            <div class="form-group">
                <label for="edit-eventName"><i class="fas fa-calendar-alt"></i> Event Name</label>
                <input type="text" id="edit-eventName" class="form-control" placeholder="Enter event name">
            </div>

            <div class="form-group">
                <label for="edit-emailSubject"><i class="fas fa-tag"></i> Email Subject</label>
                <input type="text" id="edit-emailSubject" class="form-control" placeholder="Enter email subject">
            </div>

            <div class="form-group">
                <label for="edit-emailBody"><i class="fas fa-align-left"></i> Email Body</label>
                <textarea id="edit-emailBody" class="form-control" placeholder="Compose your email content..." rows="8"></textarea>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn" style="background-color: #f0f0f0;"
                    id="cancel-edit-template">Cancel</button>
                <button type="button" class="btn btn-primary" id="save-edited-template">Save Changes</button>
            </div>
        </div>
    </div>

    <!-- Reply Inquiry Modal -->
    <div class="modal" id="reply-inquiry-modal">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title">Reply to Inquiry</h2>
                <button class="close-modal">&times;</button>
            </div>
            <form class="reply-form">
                <div class="form-group">
                    <label class="form-label">To</label>
                    <input type="text" class="form-control" id="reply-to" readonly>
                </div>
                <div class="form-group">
                    <label class="form-label">Company</label>
                    <input type="text" class="form-control" id="reply-company" readonly>
                </div>
                <div class="form-group">
                    <label class="form-label">Subject</label>
                    <input type="text" class="form-control" id="reply-subject" value="Re: Your Inquiry">
                </div>
                <div class="form-group">
                    <label class="form-label">Message</label>
                    <textarea class="form-control" id="reply-message" rows="6" placeholder="Type your response here..."></textarea>
                </div>
            </form>
            <div class="modal-footer">
                <button type="button" class="btn" style="background-color: #f0f0f0;"
                    id="cancel-reply">Cancel</button>
                <button type="button" class="btn btn-primary" id="send-reply">Send Reply</button>
            </div>
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
                <button type="button" class="btn" style="background-color: #f0f0f0;"
                    id="cancel-view-inquiry">Cancel</button>
                <button type="button" class="btn btn-primary" id="save-inquiry-btn">Save Changes</button>
            </div>
        </div>
    </div>

    <script>
        
        function openModal(modalId) {
            const modal = document.getElementById(modalId);
            if (modal) {
                modal.style.display = 'flex';
            }
        }

        function closeModal(modalId) {
            const modal = document.getElementById(modalId);
            if (modal) {
                modal.style.display = 'none';
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            // Menu Navigation
            const menuItems = document.querySelectorAll('.menu-item');
            const contentSections = document.querySelectorAll('.content-section');

            menuItems.forEach(item => {
                item.addEventListener('click', function() {
                    menuItems.forEach(i => i.classList.remove('active'));
                    this.classList.add('active');

                    contentSections.forEach(section => section.classList.add('hidden'));

                    const contentId = this.getAttribute('data-content') + '-content';
                    document.getElementById(contentId).classList.remove('hidden');

                    document.querySelector('.sidebar').classList.remove('active');
                });
            });

            // Template Management
            let templates = JSON.parse(localStorage.getItem('emailTemplates')) || [];
            let currentEditId = null;

            // Initialize with sample templates if none exist
            if (templates.length === 0) {
                templates = [{
                        id: Date.now(),
                        name: "Product Launch Announcement",
                        subject: "New Product Launch",
                        body: "Dear valued customer,\n\nWe are thrilled to announce the launch of our revolutionary new product line!\n\nAfter months of development, we're proud to introduce innovations that will transform your experience.\n\nKey features:\n- Cutting-edge technology\n- User-friendly design\n- Enhanced performance\n\nJoin us for the virtual launch event on [Date] at [Time].\n\nBest regards,\nThe SCIZORA Team",
                        date: "15 Jun 2023"
                    },
                    {
                        id: Date.now() + 1,
                        name: "Monthly Newsletter",
                        subject: "Monthly Newsletter",
                        body: "Hello Subscriber,\n\nWelcome to our monthly newsletter! Here's what's new this month:\n\n1. Industry insights and trends\n2. Exclusive offers for our subscribers\n3. Upcoming events and webinars\n4. Customer success stories\n\nRead the full newsletter on our website.\n\nThank you for being part of our community!\n\nSincerely,\nThe SCIZORA Team",
                        date: "02 May 2023"
                    },
                    {
                        id: Date.now() + 2,
                        name: "Event Invitation",
                        subject: "You're Invited!",
                        body: "Dear Guest,\n\nYou are cordially invited to our exclusive event!\n\nEvent Details:\n- Date: [Event Date]\n- Time: [Event Time]\n- Venue: [Event Location]\n- Dress Code: [Dress Code]\n\nPlease RSVP by [RSVP Date] to secure your spot.\n\nWe look forward to seeing you there!\n\nWarm regards,\nThe SCIZORA Team",
                        date: "28 Apr 2023"
                    }
                ];
                localStorage.setItem('emailTemplates', JSON.stringify(templates));
            }

            // Render templates
            function renderTemplates() {
                const container = document.getElementById('saved-templates-container');
                container.innerHTML = '';

                templates.forEach(template => {
                    const templateCard = document.createElement('div');
                    templateCard.className = 'template-card';
                    templateCard.innerHTML = `
                        <div class="template-preview">
                            <i class="fas fa-envelope" style="font-size: 2.5rem; color: var(--primary-blue);"></i>
                        </div>
                        <div class="template-info">
                            <div class="template-name">${template.name}</div>
                            <div class="template-date">Created: ${template.date}</div>
                            <div class="template-actions">
                                <button class="edit-btn" data-id="${template.id}"><i class="fas fa-edit"></i></button>
                                <button class="delete-btn" data-id="${template.id}"><i class="fas fa-trash"></i></button>
                            </div>
                        </div>
                    `;
                    container.appendChild(templateCard);
                });

                // Add event listeners to edit and delete buttons
                document.querySelectorAll('.edit-btn').forEach(btn => {
                    btn.addEventListener('click', function() {
                        const templateId = this.getAttribute('data-id');
                        editTemplate(templateId);
                    });
                });

                document.querySelectorAll('.delete-btn').forEach(btn => {
                    btn.addEventListener('click', function() {
                        const templateId = this.getAttribute('data-id');
                        deleteTemplate(templateId);
                    });
                });
            }

            // Save template
            document.getElementById('save-template').addEventListener('click', function() {
                const eventName = document.getElementById('eventName').value;
                const emailSubject = document.getElementById('emailSubject').value;
                const emailBody = document.getElementById('emailBody').value;

                if (!eventName || !emailSubject || !emailBody) {
                    alert('Please fill in all fields');
                    return;
                }

                const newTemplate = {
                    id: Date.now(),
                    name: eventName,
                    subject: emailSubject,
                    body: emailBody,
                    date: new Date().toLocaleDateString('en-GB', {
                        day: '2-digit',
                        month: 'short',
                        year: 'numeric'
                    })
                };

                templates.push(newTemplate);
                localStorage.setItem('emailTemplates', JSON.stringify(templates));

                renderTemplates();

                // Reset form
                document.getElementById('eventName').value = '';
                document.getElementById('emailSubject').value = '';
                document.getElementById('emailBody').value = '';

                alert('Template saved successfully!');
            });

            // Edit template
            function editTemplate(templateId) {
                const template = templates.find(t => t.id == templateId);
                if (!template) return;

                currentEditId = templateId;

                document.getElementById('edit-eventName').value = template.name;
                document.getElementById('edit-emailSubject').value = template.subject;
                document.getElementById('edit-emailBody').value = template.body;

                document.getElementById('edit-template-modal').style.display = 'flex';
            }

            // Save edited template
            document.getElementById('save-edited-template').addEventListener('click', function() {
                if (currentEditId === null) return;

                const templateIndex = templates.findIndex(t => t.id == currentEditId);
                if (templateIndex === -1) return;

                templates[templateIndex].name = document.getElementById('edit-eventName').value;
                templates[templateIndex].subject = document.getElementById('edit-emailSubject').value;
                templates[templateIndex].body = document.getElementById('edit-emailBody').value;

                localStorage.setItem('emailTemplates', JSON.stringify(templates));
                renderTemplates();

                document.getElementById('edit-template-modal').style.display = 'none';
                currentEditId = null;

                alert('Template updated successfully!');
            });

            // Delete template
            function deleteTemplate(templateId) {
                if (!confirm('Are you sure you want to delete this template?')) return;

                templates = templates.filter(t => t.id != templateId);
                localStorage.setItem('emailTemplates', JSON.stringify(templates));

                renderTemplates();
                alert('Template deleted successfully!');
            }

            // Preview template
            document.getElementById('preview-template').addEventListener('click', function() {
                const eventName = document.getElementById('eventName').value || 'Event Announcement';
                const emailBody = document.getElementById('emailBody').value;

                const preview = document.querySelector('.preview-placeholder');

                if (emailBody.trim() !== '') {
                    preview.innerHTML = `
                        <h3 style="color: var(--primary-blue); margin-bottom: 15px;">${eventName}</h3>
                        ${emailBody.replace(/\n/g, '<br>')}
                    `;
                } else {
                    preview.innerHTML = `
                        <p>Your email preview will appear here</p>
                        <p style="color: var(--dark-gray); margin-top: 10px;">
                            <i class="fas fa-info-circle"></i> Start typing in the email body field to see a live preview
                        </p>
                    `;
                }
            });

            // Discard template
            document.getElementById('discard-template').addEventListener('click', function() {
                if (confirm('Are you sure you want to discard your changes?')) {
                    document.getElementById('eventName').value = '';
                    document.getElementById('emailSubject').value = '';
                    document.getElementById('emailBody').value = '';

                    const preview = document.querySelector('.preview-placeholder');
                    preview.innerHTML = `
                        <h3 style="color: var(--primary-blue); margin-bottom: 15px;">Event Announcement</h3>
                        <p>Dear valued customer,</p>
                        <p>We're excited to announce our upcoming event. This is a great opportunity to learn about our latest products and services.</p>
                        <p>Key Details:</p>
                        <ul style="margin-left: 20px; margin-bottom: 15px;">
                            <li>Date: [Event Date]</li>
                            <li>Time: [Event Time]</li>
                            <li>Location: [Event Venue]</li>
                        </ul>
                        <p>Register now to secure your spot!</p>
                        <p style="margin-top: 20px;">Best regards,<br>The SCIZORA Team</p>
                    `;
                }
            });

            // Refresh templates
            document.getElementById('refresh-templates').addEventListener('click', function() {
                renderTemplates();
                alert('Templates refreshed!');
            });

            // Cancel edit template
            document.getElementById('cancel-edit-template').addEventListener('click', function() {
                document.getElementById('edit-template-modal').style.display = 'none';
                currentEditId = null;
            });

            // Initialize templates on page load
            renderTemplates();

            // Inquiries Reply Functionality
            document.querySelectorAll('.reply-inquiry-btn').forEach(btn => {
                btn.addEventListener('click', function() {
                    const company = this.getAttribute('data-company');
                    const email = this.getAttribute('data-email');

                    document.getElementById('reply-company').value = company;
                    document.getElementById('reply-to').value = email;

                    document.getElementById('reply-inquiry-modal').style.display = 'flex';
                });
            });

            // Send reply
            document.getElementById('send-reply').addEventListener('click', function() {
                const message = document.getElementById('reply-message').value;

                if (!message) {
                    alert('Please enter a message');
                    return;
                }

                // In a real application, you would send the email here
                alert('Reply sent successfully!');
                document.getElementById('reply-inquiry-modal').style.display = 'none';
                document.getElementById('reply-message').value = '';
            });

            // Cancel reply
            document.getElementById('cancel-reply').addEventListener('click', function() {
                document.getElementById('reply-inquiry-modal').style.display = 'none';
                document.getElementById('reply-message').value = '';
            });

            // View inquiry
            document.querySelectorAll('.view-inquiry-btn').forEach(btn => {
                btn.addEventListener('click', function() {
                    const row = this.closest('tr');
                    const cells = row.querySelectorAll('td');

                    document.getElementById('inquiry-company').value = cells[1].textContent;
                    document.getElementById('inquiry-email').value = cells[2].textContent;
                    document.getElementById('inquiry-product').value = cells[3].textContent;
                    document.getElementById('inquiry-quantity').value = cells[4].textContent;
                    document.getElementById('inquiry-message').value =
                        `Inquiry about ${cells[3].textContent} from ${cells[1].textContent}.`;

                    // Set status based on current status
                    const status = cells[5].querySelector('.status').textContent.toLowerCase();
                    document.getElementById('inquiry-status').value = status.includes('progress') ?
                        'in-progress' :
                        status.includes('pending') ? 'pending' : 'completed';

                    document.getElementById('view-inquiry-modal').style.display = 'flex';
                });
            });

            // Cancel view inquiry
            document.getElementById('cancel-view-inquiry').addEventListener('click', function() {
                document.getElementById('view-inquiry-modal').style.display = 'none';
            });

            // Save inquiry changes
            document.getElementById('save-inquiry-btn').addEventListener('click', function() {
                // In a real application, you would save the status change here
                alert('Inquiry status updated successfully!');
                document.getElementById('view-inquiry-modal').style.display = 'none';
            });

            // Modal close functionality
            document.querySelectorAll('.close-modal').forEach(btn => {
                btn.addEventListener('click', function() {
                    this.closest('.modal').style.display = 'none';
                });
            });

            // Close modal when clicking outside
            document.querySelectorAll('.modal').forEach(modal => {
                modal.addEventListener('click', function(e) {
                    if (e.target === this) {
                        this.style.display = 'none';
                    }
                });
            });

            // Settings Tabs
            const settingsTabs = document.querySelectorAll('.settings-tabs .tab');
            const tabContents = document.querySelectorAll('.tab-content');

            settingsTabs.forEach(tab => {
                tab.addEventListener('click', function() {
                    settingsTabs.forEach(t => t.classList.remove('active'));
                    this.classList.add('active');

                    tabContents.forEach(content => content.classList.remove('active'));

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

            function openModal(modalId) {
                document.getElementById(modalId).style.display = 'flex';
            }

            function closeModal(modalId) {
                document.getElementById(modalId).style.display = 'none';
            }
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
                    const productPrice = productCard.querySelector(
                        'span[style*="color: var(--primary-color)"]').textContent.replace('$',
                        '');

                    document.getElementById('product-name').value = productName;
                    document.getElementById('product-sku').value = productMeta[0].textContent
                        .replace('SKU: ', '');
                    document.getElementById('product-price').value = productPrice;
                    document.getElementById('product-quantity').value = productMeta[1].textContent
                        .replace('In Stock: ', '').replace(',', '');

                    document.querySelector('#product-modal .modal-title').textContent =
                        'Edit Product';
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

                    document.querySelector('#service-modal .modal-title').textContent =
                        'Edit Service';
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
                    ['20 Feb 2024', 'MediLife Inc.', 'sarah.miller@medilife.com', 'Antibiotic X',
                        '500 units', 'In Progress'
                    ],
                    ['19 Feb 2024', 'HealthPlus', 'john.davis@healthplus.com', 'Pain Reliever Y',
                        '1,000 units', 'Pending'
                    ],
                    ['18 Feb 2024', 'PharmaGlobal', 'amanda.patel@pharmaglobal.com', 'Vitamin Complex',
                        '2,000 units', 'Completed'
                    ]
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
                    const reviewerName = reviewItem.querySelector('.reviewer-name').textContent
                        .split(' ')[0];
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
