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
            margin: 0;
            border-bottom: 1px solid #eeeeee;
        }

        .menu-item:hover {
            background-color: rgba(0, 0, 0, 0.05);
        }

        .menu-item.active {
            background-color: var(--primary-color);
            color: var(--white);
            /* Changed text color to white for active item */
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

        .form-card {
            background: white;
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0, 123, 255, 0.15);
            padding: 40px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .form-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(0, 123, 255, 0.2);
        }

        .form-row {
            display: flex;
            flex-wrap: wrap;
            margin: 0 -15px;
        }

        .form-group {
            flex: 1 0 100%;
            padding: 0 15px;
            margin-bottom: 25px;
        }

        .half-width {
            flex: 1 0 calc(50% - 30px);
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: #2d3748;
            font-size: 15px;
        }

        .required::after {
            content: " *";
            color: #e53e3e;
        }

        .input-control {
            width: 100%;
            padding: 14px 16px;
            border: 1px solid #cbd5e0;
            border-radius: 10px;
            font-size: 15px;
            color: #2d3748;
            background-color: #f8fafc;
            transition: all 0.3s ease;
        }

        .input-control:focus {
            outline: none;
            border-color: #007BFF;
            box-shadow: 0 0 0 3px rgba(0, 123, 255, 0.2);
            background-color: white;
        }

        .input-control::placeholder {
            color: #a0aec0;
        }

        select.input-control {
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='%23007BFF' viewBox='0 0 16 16'%3E%3Cpath d='M8 11L3 6h10l-5 5z'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 15px center;
            background-size: 14px;
            padding-right: 40px;
        }

        textarea.input-control {
            min-height: 120px;
            resize: vertical;
        }

        .button-group {
            display: flex;
            gap: 15px;
            margin-top: 15px;
        }

        .btn {
            padding: 14px 28px;
            border-radius: 10px;
            font-size: 16px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
            border: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        .btn-primary {
            background: #007BFF;
            color: white;
            box-shadow: 0 4px 10px rgba(0, 123, 255, 0.3);
        }

        .btn-primary:hover {
            background: #0069d9;
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(0, 123, 255, 0.4);
        }

        .btn-secondary {
            background: transparent;
            color: #007BFF;
            border: 1px solid #007BFF;
        }

        .btn-secondary:hover {
            background: #f0f7ff;
            transform: translateY(-2px);
        }

        .btn-icon {
            margin-right: 8px;
            font-size: 18px;
        }

        .form-footer {
            margin-top: 30px;
            text-align: center;
            color: #718096;
            font-size: 14px;
            padding-top: 20px;
            border-top: 1px solid #edf2f7;
        }

        .form-footer a {
            color: #007BFF;
            text-decoration: none;
        }

        .error-message {
            color: #e53e3e;
            font-size: 13px;
            margin-top: 6px;
            display: none;
        }

        .input-error {
            border-color: #e53e3e;
        }

        @media (max-width: 768px) {
            .half-width {
                flex: 1 0 100%;
            }

            .form-card {
                padding: 30px 20px;
            }

            .header h1 {
                font-size: 24px;
            }

            .btn {
                padding: 12px 20px;
                font-size: 15px;
            }

            .button-group {
                flex-direction: column;
            }
        }

        @media (max-width: 480px) {
            .header h1 {
                font-size: 22px;
            }

            .logo {
                font-size: 28px;
            }

            .btn {
                width: 100%;
            }
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
            /* Hidden by default */
            position: fixed;
            top: 15px;
            left: 15px;
            z-index: 1001;
            background-color: var(--primary-color);
            color: white;
            width: 40px;
            height: 40px;
            border-radius: 50%;
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
                /* Show the hamburger menu */
            }

            .menu-text {
                display: block;
            }

            sidebar.active .menu-item {
                justify-content: flex-start;
                padding: 12px 20px;
            }

            .sidebar.active .menu-item i {
                margin-right: 15px;
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

        /* Custom style for the All Queries table header */
        #table-view-container .table-container th {
            background-color: #007BFF;
            color: var(--white);
            font-weight: 600;
        }
    </style>
    {{-- @include('admin.layouts.styles') --}}
</head>

<body>
    <!-- Sidebar -->
    {{-- <div class="sidebar">
        <div class="sidebar-header">
            <a href="#" class="text-xl md:text-2xl font-bold"><img src="logo.jpg" alt="logo" width="200"
                    height="60"></a>
        </div>
        <div class="menu">
            <div class="menu-item active" data-content="dashboard">
                <i class="icon">📊</i>
                <span class="menu-text">Master Setup Form</span>
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
    </div> --}}
    @include('admin.layouts.sidebar')

    <!-- Main Content -->
    <div class="main-content">
        <!-- Navbar -->
        {{-- <div class="navbar">

            <div class="navbar-right">
                <div class="search-bar">
                    <i class="icon">🔍</i>
                    <input type="text" placeholder="Search...">
                </div>

                <div class="user-profile">
                    <a href="">
                        <div class="user-avatar">
                            <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="John Doe">
                        </div>
                    </a>
                    <span>John Doe</span>
                    <!-- The Logout Button -->
                    <a href="#" class="logout-btn" title="Logout">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" align="right"
                            fill="currentColor" viewBox="0 0 16 16">
                            <path d="M8.5 10c-.276 0-.5-.448-.5-1s.224-1 .5-1 .5.448.5 1-.224 1-.5 1z" />
                            <path
                                d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2.5a.5.5 0 0 0 1 0v-2.5a1.5 1.5 0 0 0-1.5-1.5h-8A1.5 1.5 0 0 0 0 4.5v9A1.5 1.5 0 0 0 1.5 15h8a1.5 1.5 0 0 0 1.5-1.5v-2.5a.5.5 0 0 0-1 0v2.5z" />
                            <path
                                d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z" />
                        </svg>
                    </a>
                </div>
            </div>
        </div> --}}
        @include('admin.layouts.navbar')

        <!-- Content Area -->
        <div class="content">
            <!-- Dashboard Content (Default) -->
            <div id="dashboard-content" class="content-section">
                <!-- Form View -->
                <div id="form-view-container">
                    <div class="container">
                        <div class="header"
                            style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 1rem;">
                            <div>
                                <h1>Master Setup Form</h1>
                                <p>Configure master settings for your SCIZORA platform. All fields marked with * are
                                    required.</p>
                            </div>
                            <a href="{{ route('admin.master.setup', ['ty' => custom_encrypt('MasterSetup')]) }}"><button
                                    id="" class="btn btn-primary" style="padding: 12px 24px;">View
                                    All Records</button></a>
                        </div>

                        <div class="form-card">
                            <form id="masterSetupForm" action="{{ route('master.setup.save') }}" method="POST">
                                @csrf
                                @if($masterData)
                                <input type="hidden" name="master_id" value="{{ custom_encrypt($masterData?->id) }}">
                                @endif
                                <div class="form-row">
                                    <div class="form-group half-width">
                                        <label for="name" class="required">Name</label>
                                        <input type="text" id="name" class="input-control"
                                            placeholder="Enter master name" required name="name" value="{{ $masterData?->name ?? '' }}">
                                        <div class="error-message" id="name-error" style="display:none;color:red;">
                                        </div>
                                    </div>

                                    <div class="form-group half-width">
                                        <label for="masterType" class="required">Master Type</label>
                                        <select id="masterType" class="input-control" required name="masterType"
                                            onchange="fetchMasters(this.value)">
                                            <option value="" disabled selected>Select master type</option>
                                            @foreach ($masterTypes as $masterType)
                                                <option value="{{ $masterType->id }}" {{ $masterData?->master_type_id == $masterType->id ? 'selected' : ''  }}>{{ $masterType->name }}</option>
                                            @endforeach
                                        </select>
                                        <div class="error-message" id="masterType-error"
                                            style="display:none;color:red;"></div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea id="description" name="description" class="input-control" placeholder="Enter detailed description...">{{$masterData?->description}}</textarea>
                                </div>

                                <div class="form-row">
                                    <div class="form-group half-width">
                                        <label for="parentName">Parent Name</label>
                                        <select id="parentName" class="input-control" @if(!$masterData) disabled @endif name="parentName">
                                            <option value="" disabled selected>Select parent</option>
                                            @if($masterData)
                                                @foreach ($parentMasters as $parentMaster)
                                                    <option value="{{ $parentMaster?->id }}" {{ $masterData?->parent_id == $parentMaster?->id ? 'selected' : ''  }}>{{ $parentMaster?->name }}</option>
                                                @endforeach
                                                @endif
                                        </select>
                                    </div>

                                    <div class="form-group half-width">
                                        <label for="status" class="required">Status</label>
                                        <select id="status" class="input-control" name="status">
                                            <option value="" disabled selected>Select status</option>
                                            <option value="Active" {{$masterData?->status == "Active" ? 'selected' : ''}}>Active</option>
                                            <option value="Inactive" {{$masterData?->status == "Inactive" ? 'selected' : ''}}>Inactive</option>
                                        </select>
                                        <div class="error-message" id="status-error" style="display:none;color:red;">
                                        </div>
                                    </div>
                                </div>

                                <div class="button-group">
                                    <button type="submit" class="btn btn-primary">
                                        <span class="btn-icon">✓</span> Submit
                                    </button>
                                    <button type="reset" class="btn btn-secondary">
                                        <span class="btn-icon">↺</span> Reset
                                    </button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>

    <!-- Mobile Menu Toggle -->
    <div class="menu-toggle">
        <i class="icon">≡</i>
    </div>

    <!-- Master Setup Form Preview Modal -->
    <div class="modal" id="preview-modal">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title">Confirm Your Details</h2>
                <button class="close-modal" id="close-preview-modal">&times;</button>
            </div>
            <div id="preview-content-area" style="padding: 10px 0;">
                <!-- Data will be injected here by JavaScript -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" id="edit-details-btn">
                    Edit
                </button>
                <button type="button" class="btn btn-primary" id="confirm-submit-btn">
                    Confirm & Submit
                </button>
            </div>
        </div>
    </div>
    @include('layouts.commonjs')
    <script>
        function fetchMasters(masterTypeId) {
            const parentSelect = $('#parentName');

            if (!masterTypeId) {
                parentSelect.html('<option value="" disabled selected>Select parent</option>').prop('disabled', true);
                return;
            }

            $.ajax({
                url: '/api/get-master-parent', // your route
                method: 'GET',
                data: {
                    masterType_id: masterTypeId
                },
                success: function(response) {
                    parentSelect.empty(); // clear previous options

                    if (response.data.length > 0) {
                        parentSelect.append('<option value="" disabled selected>Select parent</option>');
                        response.data.forEach(item => {
                            parentSelect.append(`<option value="${item.id}">${item.name}</option>`);
                        });
                        parentSelect.prop('disabled', false);
                    } else {
                        parentSelect.append('<option value="" disabled selected>No parents found</option>');
                        parentSelect.prop('disabled', true);
                    }
                },
                error: function(err) {
                    console.error(err);
                    parentSelect.html('<option value="" disabled selected>Error loading data</option>').prop(
                        'disabled', true);
                }
            });
        }
        $(document).ready(function() {

            $('#masterSetupForm').on('submit', function(e) {
                e.preventDefault();

                let form = $(this);
                let url = form.attr('action');
                let formData = form.serialize();

                // hide previous errors
                $('.error-message').hide();

                try {
                    $.ajax({
                        url: url,
                        type: 'POST',
                        data: formData,
                        success: function(response) {
                            if (response.status) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Success!',
                                    text: response.message,
                                    timer: 2000,
                                    showConfirmButton: false
                                });

                                form.trigger('reset');
                                $('#parentName').html(
                                    '<option value="" disabled selected>Select parent</option>'
                                    ).prop('disabled', true);
                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Error!',
                                    text: response.message || 'Something went wrong'
                                });
                            }
                        },
                        error: function(xhr) {
                            if (xhr.status === 422) { // validation error
                                let errors = xhr.responseJSON.errors;
                                let errorMessages = '';
                                for (let key in errors) {
                                    if (errors.hasOwnProperty(key)) {
                                        errorMessages += errors[key].join(' ') + '\n';
                                        $('#' + key + '-error').text(errors[key][0]).show();
                                    }
                                }
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Validation Error',
                                    text: errorMessages
                                });
                            } else {
                                console.error(xhr.responseText);
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Error!',
                                    text: 'An unexpected error occurred.'
                                });
                            }
                        }
                    });
                } catch (err) {
                    console.error('Try-Catch Error:', err);
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: 'An unexpected exception occurred.'
                    });
                }

            });

        });



        document.addEventListener('DOMContentLoaded', function() {
            // Reusable modal functions
            window.openModal = function(modalId) {
                const modal = document.getElementById(modalId);
                if (modal) {
                    modal.style.display = 'flex';
                }
            }

            window.closeModal = function(modalId) {
                const modal = document.getElementById(modalId);
                if (modal) {
                    modal.style.display = 'none';
                }
            }

            // Sidebar and Navigation
            const menuItems = document.querySelectorAll('.menu-item');
            const contentSections = document.querySelectorAll('.content-section');
            const sidebar = document.querySelector('.sidebar');
            const menuToggle = document.querySelector('.menu-toggle');

            // Mobile menu toggle functionality
            if (menuToggle && sidebar) {
                menuToggle.addEventListener('click', function() {
                    sidebar.classList.toggle('active');
                });
            }

            // Main menu navigation
            menuItems.forEach(item => {
                item.addEventListener('click', function() {
                    menuItems.forEach(i => i.classList.remove('active'));
                    this.classList.add('active');

                    contentSections.forEach(section => section.classList.add('hidden'));

                    const contentId = this.getAttribute('data-content') + '-content';
                    document.getElementById(contentId).classList.remove('hidden');

                    // Close sidebar after selection in mobile view
                    if (window.innerWidth <= 576) {
                        sidebar.classList.remove('active');
                    }
                });
            });

            // Master Setup Form with Preview Functionality
            // const form = document.getElementById('masterSetupForm');
            const previewModal = document.getElementById('preview-modal');
            const previewContentArea = document.getElementById('preview-content-area');
            const confirmSubmitBtn = document.getElementById('confirm-submit-btn');
            const editDetailsBtn = document.getElementById('edit-details-btn');
            const closePreviewModalBtn = document.getElementById('close-preview-modal');

            

            // --- View Toggling for Master Setup Form ---
            const formViewContainer = document.getElementById('form-view-container');
            const tableViewContainer = document.getElementById('table-view-container');
            const viewRecordsBtn = document.getElementById('view-records-btn');
            const backToFormBtn = document.getElementById('back-to-form-btn');

            if (viewRecordsBtn && backToFormBtn && formViewContainer && tableViewContainer) {
                viewRecordsBtn.addEventListener('click', () => {
                    formViewContainer.classList.add('hidden');
                    tableViewContainer.classList.remove('hidden');
                });

                backToFormBtn.addEventListener('click', () => {
                    tableViewContainer.classList.add('hidden');
                    formViewContainer.classList.remove('hidden');
                });
            }


            // Modal close functionality
            document.querySelectorAll('.close-modal').forEach(btn => {
                btn.addEventListener('click', function() {
                    // Check if the specific preview modal button was clicked, as its listener is separate
                    if (this.id !== 'close-preview-modal') {
                        this.closest('.modal').style.display = 'none';
                    }
                });
            });

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

            // Product and Service Modals
            document.getElementById('add-product-btn')?.addEventListener('click', () => openModal('product-modal'));
            document.getElementById('add-service-btn')?.addEventListener('click', () => openModal('service-modal'));

            // Reply and View Inquiry Modals
            document.querySelectorAll('.reply-inquiry-btn').forEach(btn => {
                btn.addEventListener('click', function() {
                    document.getElementById('reply-company').value = this.dataset.company;
                    document.getElementById('reply-to').value = this.dataset.email;
                    openModal('reply-inquiry-modal');
                });
            });
            document.querySelectorAll('.view-inquiry-btn').forEach(btn => btn.addEventListener('click', () =>
                openModal('view-inquiry-modal')));

            // Added listeners for the inquiry modal cancel buttons
            document.getElementById('cancel-reply')?.addEventListener('click', () => closeModal(
                'reply-inquiry-modal'));
            document.getElementById('cancel-view-inquiry')?.addEventListener('click', () => closeModal(
                'view-inquiry-modal'));

            // Reply Review Modals
            document.querySelectorAll('.reply-review-btn').forEach(btn => {
                btn.addEventListener('click', function() {
                    const reviewItem = this.closest('.review-item');
                    document.getElementById('reviewer-name').value = reviewItem.querySelector(
                        '.reviewer-name').textContent.split('-')[0].trim();
                    document.getElementById('review-rating').textContent = reviewItem.querySelector(
                        '.stars').textContent.split(' ')[0];
                    document.getElementById('review-text').value = reviewItem.querySelector(
                        '.review-text').textContent;
                    openModal('reply-review-modal');
                });
            });
        });
    </script>
</body>

</html>
