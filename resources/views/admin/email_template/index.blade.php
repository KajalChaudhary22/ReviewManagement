<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Email Template - SCIZORA-Admin</title>
    @include('admin.layouts.styles')
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
            <!-- Dashboard Content -->
            <div id="campaigns-content" class="content-section">
                <div class="content-header">
                    <h1 class="page-title">Email Template</h1>
                    {{-- <button class="btn btn-primary" id="createCampaignBtn">
                        <i class="icon">➕</i> Create Campaign
                    </button> --}}
                </div>

                <!-- Campaign Filters -->
                {{-- <div class="table-container mb-20">
                    <div style="padding: 15px; display: grid; grid-template-columns: 1fr; gap: 15px;">
                        <div class="form-group">
                            <label class="form-label">Search Campaigns</label>
                            <input type="text" class="form-control" id="campaignSearch" placeholder="Name, subject...">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Status</label>
                            <select class="form-control" id="campaignStatusFilter">
                                <option value="all">All Campaigns</option>
                                <option value="draft">Draft</option>
                                <option value="scheduled">Scheduled</option>
                                <option value="sent">Sent</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Date Range</label>
                            <select class="form-control" id="campaignDateFilter">
                                <option value="all">All Time</option>
                                <option value="7">Last 7 Days</option>
                                <option value="30">Last 30 Days</option>
                            </select>
                        </div>
                    </div>
                    <div class="apply-filters">
                        <button class="btn btn-primary" id="applyCampaignFilters">Apply Filters</button>
                    </div>
                </div> --}}

                <!-- Campaigns Table -->
                <div class="table-container">
                    <div class="table-header">
                        <h2 class="section-title">All Email Templates</h2>

                    </div>
                    <table id="emailTemplatesTable">
                        <thead>
                            <tr>
                                <th>Event Name</th>
                                <th>Email Master</th>
                                <th>Variables</th>
                                <th>Subject</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Template Edit Modal -->
    <div class="modal" id="edit-template-modal">
        <div class="template-modal-content">

            <div class="modal-header">
                <h2 class="modal-title">Edit Template</h2>
                <button class="close-modal">&times;</button>
            </div>
            <form id="editTemplateForm" class="reply-form">
                @csrf
                <input type="hidden" id="edit-emailId" name="id">
                <div class="form-group">
                    <label for="edit-eventName"><i class="fas fa-calendar-alt"></i> Event Name</label>
                    <input type="text" id="edit-eventName" class="form-control" placeholder="Enter event name"
                        disabled>
                </div>
                <div class="form-group">
                    <label for="edit-emailSubject"><i class="fas fa-tag"></i> Email Variables</label>
                    <input type="text" id="edit-emailVariables" class="form-control"
                        placeholder="Enter email variables" disabled>
                </div>
                <div class="form-group">
                    <label for="edit-emailSubject"><i class="fas fa-tag"></i> Email Subject</label>
                    <input type="text" id="edit-emailSubject" name="subject" class="form-control"
                        placeholder="Enter email subject">
                </div>

                <div class="form-group">
                    <label for="edit-emailBody"><i class="fas fa-align-left"></i> Email Body</label>
                    <textarea id="edit-emailBody" class="form-control" name="body" placeholder="Compose your email content..."
                        rows="8"></textarea>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn close-modal" style="background-color: #f0f0f0;"
                        id="cancel-edit-template">Cancel</button>
                    <button type="submit" class="btn btn-primary" id="save-edited-template">Save Changes</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Mobile Menu Toggle (Hidden on Desktop) -->
    <div class="menu-toggle hidden">
        <i class="icon">≡</i>
    </div>
    @include('layouts.commonjs')
    <script>
        @include('admin.layouts.modalJS')
        $(document).ready(function() {
            let defaultPageLength = {{ $adminPreferences->results_per_page ?? 10 }};
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            let table = $('#emailTemplatesTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '/api/admin/email-templates',

                },
                pageLength: defaultPageLength,
                columns: [{
                        data: 'event_name',
                        name: 'event_name'
                    },
                    {
                        data: 'variables',
                        name: 'variables'
                    },
                    {
                        data: 'subject',
                        name: 'subject'
                    },
                    {
                        data: 'content',
                        name: 'content'
                    },

                    {
                        data: 'actions',
                        orderable: false,
                        searchable: false
                    }
                ]
            });
            $(document).on('click', '.action-btn.edit', function() {
                let id = $(this).data('id');
                let eventName = $(this).data('eventname');
                let subject = $(this).data('subject');
                let body = $(this).data('body');
                let variables = $(this).data('variables');
                // Fill modal inputs
                $('#edit-eventName').val(eventName);
                $('#edit-emailSubject').val(subject);
                $('#edit-emailVariables').val(variables);
                $('#edit-emailBody').val(body);
                $('#edit-emailId').val(id);

                // Store id for save later
                // $('#save-edited-template').data('id', id);

                // Show modal
                openModal('edit-template-modal');
                // $('#edit-template-modal').show();
            });
            // Save (AJAX form submit)
            $('#editTemplateForm').on('submit', function(e) {
                e.preventDefault();

                let id = $('#edit-emailId').val();
                let formData = $(this).serialize(); // serialize all fields with name=""

                $.ajax({
                    url: '/api/admin/update/email-templates/' + id, // adjust route if needed
                    method: 'PUT',
                    data: formData,
                    success: function(res) {
                        closeModal('edit-template-modal');
                        $('#emailTemplatesTable').DataTable().ajax.reload();
                        showAlert('success', res.message);
                    },
                    error: function(xhr) {
                        showAlert('error', xhr.responseJSON.message || 'Something went wrong');
                    }
                });
            });
        });
    </script>

</body>

</html>
