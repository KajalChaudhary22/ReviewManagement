<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Business Management - SCIZORA-Admin</title>
    <style>
        /* Global Styles */
        :root {
            --primary-color: #1544da;
            --primary-hover: #1124aa;
            --secondary-color: #1A1A1A;
            --secondary-hover: #333333;
            --success-color: #28A745;
            --success-hover: #218838;
            --danger-color: #DC3545;
            --danger-hover: #C82333;
            --warning-color: #FFC107;
            --warning-hover: #E0A800;
            --sidebar-color: #1A1A1A;
            --text-color: #333333;
            --text-light: #777777;
            --border-color: #E5E5E5;
            --bg-color: #F5F5F5;
            --white: #FFFFFF;
            --black: #000000;
            --card-shadow: 0 2px 8px rgba(0, 0, 0, 0.15);
            --sidebar-width: 280px;
            --sidebar-collapsed-width: 80px;
            --transition: all 0.3s ease;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            -webkit-tap-highlight-color: transparent; /* Remove tap highlight on mobile */
        }

        body {
            display: flex;
            min-height: 100vh;
            background-color: var(--bg-color);
            color: var(--text-color);
            overflow-x: hidden; /* Prevent horizontal scroll */
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        /* Sidebar Styles - Enhanced for mobile */
        .sidebar {
            width: var(--sidebar-width);
            background-color: var(--sidebar-color);
            color: var(--white);
            height: 100vh;
            position: fixed;
            transition: var(--transition);
            overflow-y: auto;
            display: flex;
            flex-direction: column;
            border-right: 1px solid rgba(255, 255, 255, 0.1);
            z-index: 1000; /* Ensure sidebar stays above content */
            transform: translateX(0);
        }

        .sidebar-header {
            padding: 25px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            background-color: rgba(0, 0, 0, 0.2);
        }

        .brand-name {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 5px;
            color: var(--white);
        }

        .brand-subtitle {
            font-size: 0.8rem;
            color: rgba(255, 255, 255, 0.7);
        }

        .menu {
            padding: 20px 0;
            flex: 1;
            overflow-y: auto;
        }

        .menu-item {
            padding: 12px 25px;
            display: flex;
            align-items: center;
            cursor: pointer;
            transition: var(--transition);
            margin: 2px 0;
            color: rgba(255, 255, 255, 0.8);
            min-height: 48px; /* Better touch target */
        }

        .menu-item:hover {
            background-color: rgba(209, 0, 0, 0.2);
            color: var(--white);
        }

        .menu-item.active {
            background-color: var(--primary-color);
            color: var(--white);
        }

        .menu-item i {
            margin-right: 12px;
            font-size: 1.1rem;
            min-width: 24px; /* Ensure consistent icon spacing */
        }

        .menu-text {
            transition: var(--transition);
            font-weight: 500;
        }

        .user-profile {
            padding: 20px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            display: flex;
            align-items: center;
            background-color: rgba(0, 0, 0, 0.2);
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
            margin-right: 12px;
            overflow: hidden;
        }

        .user-avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .user-info {
            flex: 1;
        }

        .user-name {
            font-weight: 500;
            margin-bottom: 2px;
            color: var(--white);
        }

        .user-role {
            font-size: 0.8rem;
            color: rgba(255, 255, 255, 0.7);
        }

        /* Main Content Styles */
        .main-content {
            flex: 1;
            margin-left: var(--sidebar-width);
            transition: var(--transition);
            min-width: 0; /* Prevent overflow issues */
            width: 100%; /* Ensure full width */
        }

        /* Navbar Styles - Enhanced for mobile */
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 20px;
            background-color: var(--white);
            border-bottom: 1px solid var(--border-color);
            position: sticky;
            top: 0;
            z-index: 100;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            flex-wrap: wrap; /* Allow items to wrap on mobile */
            gap: 10px; /* Space between items when wrapped */
        }

        .search-bar {
            flex: 1;
            min-width: 0; /* Allow shrinking */
            max-width: 100%; /* Prevent overflow */
            position: relative;
            margin-right: 10px; /* Space between search and icons */
        }

        .search-bar input {
            width: 100%;
            padding: 10px 15px 10px 40px;
            border: 1px solid var(--border-color);
            border-radius: 6px;
            outline: none;
            transition: var(--transition);
            background-color: var(--bg-color);
            font-size: 16px; /* Better mobile input */
        }

        .search-bar input:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 2px rgba(209, 0, 0, 0.2);
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
            gap: 15px;
            flex-wrap: wrap; /* Allow icons to wrap */
            justify-content: flex-end; /* Align to the right */
        }

        .nav-icon {
            font-size: 1.2rem;
            color: var(--text-light);
            cursor: pointer;
            transition: var(--transition);
            position: relative;
            min-width: 24px; /* Better touch target */
            text-align: center;
        }

        .nav-icon:hover {
            color: var(--primary-color);
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
            font-weight: bold;
        }

        .nav-avatar {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background-color: var(--primary-color);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            overflow: hidden;
            cursor: pointer;
            border: 2px solid var(--primary-color);
        }

        .nav-avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        /* Content Area Styles - Enhanced for mobile */
        .content {
            padding: 20px;
            width: 100%;
            max-width: 100%;
            box-sizing: border-box;
        }

        .content-section {
            display: block; /* MODIFIED: Always show content section */
            width: 100%;
        }

        .content-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            flex-wrap: wrap; /* Allow items to wrap */
            gap: 10px;
            width: 100%;
        }

        .page-title {
            font-size: clamp(1.5rem, 4vw, 1.8rem); /* Responsive font size */
            color: var(--black);
            font-weight: 700;
            margin-right: 10px;
        }

        /* Stats Cards - Enhanced for mobile */
        .stats-cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 15px;
            margin-bottom: 25px;
            width: 100%;
        }

        .stat-card {
            background-color: var(--white);
            border-radius: 8px;
            padding: 15px;
            box-shadow: var(--card-shadow);
            transition: var(--transition);
            border-top: 4px solid var(--primary-color);
            min-width: 0; /* Prevent overflow */
            width: 100%;
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .stat-icon {
            font-size: 1.5rem;
            margin-bottom: 10px;
            color: var(--primary-color);
        }

        .stat-title {
            color: var(--text-light);
            font-size: 0.85rem;
            margin-bottom: 5px;
        }

        .stat-value {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 5px;
            color: var(--black);
        }

        .stat-change {
            display: flex;
            align-items: center;
            font-size: 0.85rem;
        }

        .stat-change.positive {
            color: var(--success-color);
        }

        .stat-change.negative {
            color: var(--danger-color);
        }

        .stat-change i {
            margin-right: 5px;
        }

        /* Dashboard Layout - Enhanced for mobile */
        .dashboard-grid {
            display: grid;
            grid-template-columns: 1fr; /* Changed to single column for mobile */
            gap: 15px;
            width: 100%;
        }

        .dashboard-main {
            display: flex;
            flex-direction: column;
            gap: 15px;
            width: 100%;
        }

        .dashboard-sidebar {
            display: flex;
            flex-direction: column;
            gap: 15px;
            width: 100%;
        }

        /* Tables - Enhanced for mobile scrolling */
        .table-container {
            background-color: var(--white);
            border-radius: 8px;
            box-shadow: var(--card-shadow);
            overflow: hidden;
            margin-bottom: 25px;
            border: 1px solid var(--border-color);
            width: 100%;
            overflow-x: auto; /* Enable horizontal scrolling */
            -webkit-overflow-scrolling: touch; /* Smooth scrolling on iOS */
        }

        .table-header {
            padding: 15px;
            border-bottom: 1px solid var(--border-color);
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #FAFAFA;
            min-width: fit-content; /* Prevent header from shrinking */
            flex-wrap: wrap; /* Allow header items to wrap */
            gap: 10px;
        }

        .section-title {
            font-size: 1.1rem;
            font-weight: 600;
            color: var(--black);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 600px; /* Minimum table width */
        }

        th {
            text-align: left;
            padding: 12px 15px;
            background-color: #F5F5F5;
            color: var(--text-color);
            font-weight: 600;
            font-size: 0.8rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            border-bottom: 1px solid var(--border-color);
        }

        td {
            padding: 12px 15px;
            border-bottom: 1px solid var(--border-color);
            font-size: 0.9rem;
        }

        tr:last-child td {
            border-bottom: none;
        }

        tr:hover td {
            background-color: rgba(209, 0, 0, 0.05);
        }

        .status-badge {
            display: inline-block;
            padding: 4px 8px;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 500;
        }

        .status-active {
            background-color: #E6F7EB;
            color: var(--success-color);
        }

        .status-pending {
            background-color: #FFF8E6;
            color: var(--warning-color);
        }

        .status-suspended {
            background-color: #FFEEEE;
            color: var(--danger-color);
        }

        /* Enhanced Action Buttons - Better mobile layout */
        .action-buttons {
            display: flex;
            gap: 6px;
            flex-wrap: wrap;
        }

        .action-btn {
            padding: 6px 10px;
            border-radius: 4px;
            font-size: 0.75rem;
            font-weight: 500;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 4px;
            cursor: pointer;
            transition: var(--transition);
            border: none;
            min-width: 60px;
            min-height: 32px;
            white-space: nowrap; /* Prevent button text from wrapping */
        }

        .action-btn.view {
            background-color: #4A89DC;
            color: white;
        }

        .action-btn.view:hover {
            background-color: #3B7DDD;
        }

        .action-btn.edit {
            background-color: #5D9CEC;
            color: white;
        }

        .action-btn.edit:hover {
            background-color: #4A8FE7;
        }

        .action-btn.suspend {
            background-color: #ED5565;
            color: white;
        }

        .action-btn.suspend:hover {
            background-color: #DA4453;
        }

        .action-btn.activate {
            background-color: #48CFAD;
            color: white;
        }

        .action-btn.activate:hover {
            background-color: #37BC9B;
        }

        .action-btn.reject {
            background-color: #FC6E51;
            color: white;
        }

        .action-btn.reject:hover {
            background-color: #E9573F;
        }

        /* Filter Apply Button */
        .apply-filters {
            display: flex;
            justify-content: flex-end;
            padding: 12px 15px;
            background-color: #FAFAFA;
            border-top: 1px solid var(--border-color);
        }

        /* Approval Cards - Enhanced for mobile */
        .approval-cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 15px;
            margin-bottom: 25px;
            width: 100%;
        }

        .approval-card {
            background-color: var(--white);
            border-radius: 8px;
            padding: 15px;
            box-shadow: var(--card-shadow);
            border-left: 4px solid var(--warning-color);
            min-width: 0;
            width: 100%;
        }

        .approval-title {
            font-weight: 600;
            margin-bottom: 5px;
            color: var(--black);
            font-size: 1rem;
        }

        .approval-meta {
            color: var(--text-light);
            font-size: 0.85rem;
            margin-bottom: 12px;
        }

        .approval-actions {
            display: flex;
            gap: 8px;
            flex-wrap: wrap;
        }

        .btn {
            padding: 8px 14px;
            border-radius: 6px;
            border: none;
            cursor: pointer;
            font-weight: 500;
            transition: var(--transition);
            font-size: 0.85rem;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 5px;
            min-height: 36px;
        }

        .btn-sm {
            padding: 6px 10px;
            font-size: 0.75rem;
            min-height: 32px;
        }

        .btn-primary {
            background-color: var(--primary-color);
            color: white;
        }

        .btn-primary:hover {
            background-color: var(--primary-hover);
        }

        .btn-success {
            background-color: var(--success-color);
            color: white;
        }

        .btn-success:hover {
            background-color: var(--success-hover);
        }

        .btn-danger {
            background-color: var(--danger-color);
            color: white;
        }

        .btn-danger:hover {
            background-color: var(--danger-hover);
        }

        .btn-secondary {
            background-color: var(--white);
            color: var(--text-color);
            border: 1px solid var(--border-color);
        }

        .btn-secondary:hover {
            background-color: var(--bg-color);
        }

        .btn-black {
            background-color: var(--secondary-color);
            color: white;
        }

        .btn-black:hover {
            background-color: var(--secondary-hover);
        }

        /* Review Cards - Enhanced for mobile */
        .review-cards {
            display: flex;
            flex-direction: column;
            gap: 12px;
            width: 100%;
        }

        .review-card {
            background-color: var(--white);
            border-radius: 8px;
            padding: 15px;
            box-shadow: var(--card-shadow);
            border-left: 4px solid var(--warning-color);
            min-width: 0;
            width: 100%;
        }

        .review-card.positive {
            border-left-color: var(--success-color);
        }

        .review-card.negative {
            border-left-color: var(--danger-color);
        }

        .review-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 12px;
            flex-wrap: wrap;
            gap: 8px;
            width: 100%;
        }

        .review-user {
            font-weight: 600;
            color: var(--black);
            font-size: 1rem;
        }

        .review-time {
            color: var(--text-light);
            font-size: 0.75rem;
        }

        .review-stars {
            color: #FFC107;
            margin-bottom: 8px;
            font-size: 1rem;
        }

        .review-text {
            margin-bottom: 12px;
            line-height: 1.5;
            color: var(--text-color);
            font-size: 0.9rem;
        }

        .review-actions {
            display: flex;
            gap: 8px;
            flex-wrap: wrap;
        }

        /* Form Elements - Enhanced for mobile */
        .form-group {
            margin-bottom: 15px;
            width: 100%;
        }

        .form-label {
            display: block;
            margin-bottom: 6px;
            font-weight: 500;
            color: var(--text-color);
            font-size: 0.9rem;
        }

        .form-control {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid var(--border-color);
            border-radius: 6px;
            background-color: var(--white);
            transition: var(--transition);
            font-size: 16px;
            box-sizing: border-box;
        }

        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 2px rgba(209, 0, 0, 0.2);
            outline: none;
        }

        /* Modal Styles - Enhanced for mobile */
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
            box-sizing: border-box;
        }

        .modal-content {
            background-color: var(--white);
            border-radius: 8px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 600px;
            max-height: 90vh;
            overflow-y: auto;
            animation: modalFadeIn 0.3s ease;
        }

        @keyframes modalFadeIn {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .modal-header {
            padding: 15px;
            border-bottom: 1px solid var(--border-color);
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: sticky;
            top: 0;
            background: var(--white);
            z-index: 1;
        }

        .modal-title {
            font-size: 1.3rem;
            font-weight: 600;
            color: var(--black);
        }

        .modal-close {
            background: none;
            border: none;
            font-size: 1.5rem;
            cursor: pointer;
            color: var(--text-light);
            padding: 5px;
            margin-left: 10px;
        }

        .modal-body {
            padding: 15px;
        }

        .modal-footer {
            padding: 12px 15px;
            border-top: 1px solid var(--border-color);
            display: flex;
            justify-content: flex-end;
            gap: 8px;
            position: sticky;
            bottom: 0;
            background: var(--white);
            z-index: 1;
            flex-wrap: wrap;
        }

        /* Analytics Charts - Enhanced for mobile */
        .chart-container {
            background-color: var(--white);
            border-radius: 8px;
            padding: 15px;
            box-shadow: var(--card-shadow);
            margin-bottom: 25px;
            width: 100%;
        }

        .chart-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
            flex-wrap: wrap;
            gap: 10px;
        }

        .chart-title {
            font-weight: 600;
            color: var(--black);
            font-size: 1.1rem;
        }

        .chart-actions {
            display: flex;
            gap: 8px;
            flex-wrap: wrap;
        }

        .chart-placeholder {
            height: 250px;
            background-color: #F9F9F9;
            border-radius: 4px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--text-light);
            font-size: 1.1rem;
            position: relative;
            overflow: hidden;
            width: 100%;
        }

        /* Chart Styles */
        .chart {
            width: 100%;
            height: 100%;
            display: flex;
            flex-direction: column;
            padding: 8px;
        }

        .chart-bars {
            display: flex;
            height: 180px;
            align-items: flex-end;
            gap: 15px;
            padding: 15px 0;
            border-bottom: 1px solid var(--border-color);
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
            width: 100%;
        }

        .chart-bar-container {
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
            height: 100%;
            min-width: 40px;
        }

        .chart-bar {
            width: 30px;
            background-color: var(--primary-color);
            border-radius: 4px 4px 0 0;
            transition: height 0.5s ease;
            position: relative;
        }

        .chart-bar-label {
            margin-top: 5px;
            font-size: 0.75rem;
            color: var(--text-light);
            white-space: nowrap;
        }

        .chart-bar-value {
            position: absolute;
            top: -25px;
            left: 50%;
            transform: translateX(-50%);
            font-size: 0.75rem;
            font-weight: 600;
        }

        .chart-x-axis {
            display: flex;
            justify-content: space-between;
            padding: 8px 0;
            font-size: 0.75rem;
            color: var(--text-light);
            width: 100%;
        }

        /* Pie Chart */
        .pie-chart {
            width: 180px;
            height: 180px;
            border-radius: 50%;
            background: conic-gradient(
                #4A89DC 0% 25%,
                #5D9CEC 25% 45%,
                #48CFAD 45% 65%,
                #A0D468 65% 85%,
                #FFCE54 85% 100%
            );
            margin: 0 auto;
            position: relative;
        }

        .pie-chart-center {
            position: absolute;
            width: 60%;
            height: 60%;
            background-color: white;
            border-radius: 50%;
            top: 20%;
            left: 20%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            font-size: 1.1rem;
        }

        .chart-legend {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 12px;
            margin-top: 15px;
            width: 100%;
        }

        .chart-legend-item {
            display: flex;
            align-items: center;
            font-size: 0.75rem;
        }

        .chart-legend-color {
            width: 12px;
            height: 12px;
            border-radius: 3px;
            margin-right: 5px;
        }

        /* Points System Styles - Enhanced for mobile */
        .points-container {
            background-color: var(--white);
            border-radius: 8px;
            box-shadow: var(--card-shadow);
            padding: 15px;
            margin-bottom: 25px;
            width: 100%;
        }

        .points-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }

        .points-title {
            font-size: 1.3rem;
            font-weight: 600;
            color: var(--black);
        }

        .points-summary {
            display: flex;
            align-items: center;
            gap: 12px;
            background-color: #F5F5F5;
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 20px;
            flex-wrap: wrap;
            width: 100%;
        }

        .points-level {
            background-color: var(--primary-color);
            color: white;
            padding: 6px 12px;
            border-radius: 20px;
            font-weight: 600;
            font-size: 0.85rem;
        }

        .points-progress {
            flex: 1;
            min-width: 150px;
        }

        .progress-bar {
            height: 8px;
            background-color: #E5E5E5;
            border-radius: 5px;
            overflow: hidden;
            margin-bottom: 5px;
            width: 100%;
        }

        .progress-fill {
            height: 100%;
            background-color: var(--primary-color);
            border-radius: 5px;
            width: 65%;
        }

        .progress-text {
            font-size: 0.75rem;
            color: var(--text-light);
            text-align: center;
        }

        .points-total {
            font-size: 1.1rem;
            font-weight: 600;
            color: var(--black);
        }

        .points-tasks {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 15px;
            margin-top: 15px;
            width: 100%;
        }

        .task-card {
            background-color: var(--white);
            border-radius: 8px;
            padding: 12px;
            box-shadow: var(--card-shadow);
            border-left: 4px solid var(--primary-color);
            width: 100%;
        }

        .task-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 8px;
            flex-wrap: wrap;
            gap: 8px;
        }

        .task-title {
            font-weight: 600;
            color: var(--black);
            font-size: 0.95rem;
        }

        .task-points {
            background-color: var(--primary-color);
            color: white;
            padding: 3px 8px;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 600;
        }

        .task-description {
            color: var(--text-light);
            font-size: 0.85rem;
            margin-bottom: 8px;
        }

        .task-status {
            font-size: 0.75rem;
            color: var(--success-color);
            font-weight: 500;
        }

        .levels-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 25px;
            min-width: 600px;
        }

        .levels-table th {
            background-color: var(--primary-color);
            color: white;
            text-align: center;
            padding: 10px;
            font-size: 0.8rem;
        }

        .levels-table td {
            text-align: center;
            padding: 10px;
            font-size: 0.85rem;
        }

        .levels-table tr:nth-child(even) {
            background-color: #FAFAFA;
        }

        .current-level {
            background-color: rgba(209, 0, 0, 0.1) !important;
            font-weight: 600;
        }

        /* Responsive Styles */
        @media (max-width: 1200px) {
            .dashboard-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 992px) {
            .sidebar {
                width: var(--sidebar-collapsed-width);
            }
            .sidebar-header, .menu-text, .user-info, .brand-subtitle {
                display: none;
            }
            .menu-item {
                justify-content: center;
                padding: 12px 0;
            }
            .menu-item i {
                margin-right: 0;
                font-size: 1.3rem;
            }
            .user-profile {
                justify-content: center;
                padding: 15px 0;
            }
            .user-avatar {
                margin-right: 0;
            }
            .main-content {
                margin-left: var(--sidebar-collapsed-width);
            }
            
            /* Adjust table layouts */
            .table-container {
                overflow-x: auto;
            }
        }

        @media (max-width: 768px) {
            .dashboard-grid {
    grid-template-columns: 1fr;
    overflow-x: hidden;
  }
  
  .dashboard-main, .dashboard-sidebar {
    width: 100%;
    max-width: 100%;
    overflow-x: hidden;
  }
  
  .table-container {
    overflow-x: auto;
    -webkit-overflow-scrolling: touch;
  }
  
  .approval-cards {
    grid-template-columns: 1fr;
  }
  
  .stats-cards {
    grid-template-columns: 1fr;
  }
  
  .points-container {
    overflow-x: hidden;
  }
  
  .points-summary {
    flex-direction: column;
    align-items: stretch;
  }
  
  .points-progress {
    width: 100%;
    margin: 10px 0;
  }
  
  .points-tasks {
    grid-template-columns: 1fr;
  }
  
  .levels-table {
    min-width: 100%;
    overflow-x: auto;
    display: block;
  }
  
  .levels-table th, 
  .levels-table td {
    white-space: nowrap;
  }
}
			
			.navbar {
                flex-direction: column;
                align-items: stretch;
                padding: 12px;
                gap: 12px;
            }
            .search-bar {
                width: 100%;
                max-width: 100%;
                margin-bottom: 0;
                margin-right: 0;
            }
            .navbar-right {
                justify-content: flex-end;
                width: 100%;
            }
            .content {
                padding: 15px;
            }
            .content-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 12px;
            }
            .action-buttons {
                flex-direction: row;
                gap: 6px;
            }
            .action-btn {
                width: auto;
            }
            .points-summary {
                flex-direction: row;
                align-items: center;
            }
            .points-progress {
                width: auto;
            }
            
            /* Adjust form layouts */
            .form-group {
                margin-bottom: 12px;
            }
            
            /* Adjust modal padding */
            .modal-body {
                padding: 12px;
            }
            
            /* Ensure tables don't overflow */
            table {
                min-width: 100%;
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
                box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
                border: none;
            }
            .menu-text, .user-info {
                display: block;
            }
            .content {
                padding: 12px;
            }
            .stats-cards {
                grid-template-columns: 1fr;
            }
            .approval-cards {
                grid-template-columns: 1fr;
            }
            .modal-content {
                width: 100%;
                max-width: 100%;
                border-radius: 0;
            }
            
            /* Stack action buttons vertically on small screens */
            .action-buttons {
                flex-direction: column;
                gap: 5px;
            }
            .action-btn {
                width: 100%;
            }
            
            /* Adjust form layouts for mobile */
            .form-group {
                margin-bottom: 10px;
            }
            
            /* Make buttons full width on mobile */
            .btn {
                width: 100%;
            }
            
            /* Adjust points summary layout */
            .points-summary {
                flex-direction: column;
                align-items: flex-start;
            }
            .points-progress {
                width: 100%;
            }
            
            /* Ensure no horizontal scrolling */
            html, body {
                overflow-x: hidden;
            }
            
            /* Fix for iOS viewport */
            @supports (-webkit-touch-callout: none) {
                body {
                    position: fixed;
                    width: 100%;
                    height: 100%;
                }
            }
			html, body {
    overflow-x: hidden;
    width: 100%;
  }
  
  .content {
    padding: 15px;
    width: 100%;
    max-width: 100%;
    box-sizing: border-box;
  }
}
        }

        /* Utility Classes */
        .hidden {
            display: none !important;
        }

        .text-red {
            color: var(--primary-color);
        }

        .text-black {
            color: var(--black);
        }

        .mb-20 {
            margin-bottom: 20px;
        }

        .mt-20 {
            margin-top: 20px;
        }

        /* Icons - Using Unicode characters as placeholders */
        .icon {
            font-style: normal;
            font-family: 'Segoe UI Symbol', sans-serif;
        }
        
        /* Queries Tab Styles */
        .queries-tab-content {
            display: none;
        }
        
        .queries-tab-content.active {
            display: block;
        }
        
        /* Campaign Form Styles */
        #categorySelection {
            display: none;
        }
        
        #scheduleDateGroup {
            display: none;
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
            <div id="business-content" class="content-section">
                <div class="content-header">
                    <h1 class="page-title">Business Management</h1>
                    <button class="btn btn-primary" id="addBusinessBtn">
                        <i class="icon">➕</i> Add Business
                    </button>
                </div>
                
                <!-- Business Filters -->
                <div class="table-container mb-20">
                    <div style="padding: 15px; display: grid; grid-template-columns: 1fr; gap: 15px;">
                        <div class="form-group">
                            <label class="form-label">Search Businesses</label>
                            <input type="text" class="form-control" id="businessSearch" placeholder="Name, category, location...">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Business Status</label>
                            <select class="form-control" id="businessStatusFilter">
                                <option value="all">All Businesses</option>
                                <option value="active">Active</option>
                                <option value="pending">Pending Approval</option>
                                <option value="suspended">Suspended</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Business Category</label>
                            <select class="form-control" id="businessCategoryFilter">
                                <option value="all">All Categories</option>
                                @foreach ($industries as $industry)
                                    <option value="{{ $industry->id }}">{{ $industry->name }}</option>
                                    
                                @endforeach
                    
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Location</label>
                            <select class="form-control" id="businessLocationFilter">
                                <option value="all">All Locations</option>
                                @foreach ($locations as $location)
                                    <option value="{{ $location->id }}">{{ $location->name }}</option>
                                    
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="apply-filters">
                        <button class="btn btn-primary" id="applyBusinessFilters">Apply Filters</button>
                    </div>
                </div>
                
                <!-- Businesses Table -->
                <div class="table-container">
                    <div class="table-header">
                        <h2 class="section-title">All Businesses</h2>
                        <div>
                            <button class="btn btn-secondary btn-sm" id="exportBusinessesBtn">
                                <i class="icon">📄</i> Export
                            </button>
                        </div>
                    </div>
                    <table id="businessesTable">
                        <thead>
                            <tr>
                                <th>Business ID</th>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Location</th>
                                <th>Owner</th>
                                <th>Status</th>
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

    <!-- Mobile Menu Toggle (Hidden on Desktop) -->
    <div class="menu-toggle hidden">
        <i class="icon">≡</i>
    </div>

    <!-- Add Business Modal -->
    <div class="modal" id="addBusinessModal">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title">Add New Business</h2>
                <button class="modal-close">×</button>
            </div>
            <div class="modal-body">
                <form id="businessForm">
                    <div class="form-group">
                        <label class="form-label">Business Name</label>
                        <input type="text" class="form-control" id="businessName" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Category</label>
                        <select class="form-control" id="businessCategory" required>
                            <option value="">Select Category</option>
                            <option value="pharmacy">Pharmacy</option>
                            <option value="hospital">Hospital</option>
                            <option value="clinic">Clinic</option>
                            <option value="laboratory">Laboratory</option>
                            <option value="distributor">Distributor</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Location</label>
                        <select class="form-control" id="businessLocation" required>
                            <option value="">Select Location</option>
                            <option value="us">United States</option>
                            <option value="uk">United Kingdom</option>
                            <option value="ca">Canada</option>
                            <option value="au">Australia</option>
                            <option value="in">India</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Owner</label>
                        <select class="form-control" id="businessOwner" required>
                            <option value="">Select Owner</option>
                            <option value="1002">Michael Chen</option>
                            <option value="1004">David Kim</option>
                            <option value="1005">Robert Taylor</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Description</label>
                        <textarea class="form-control" id="businessDescription" rows="3"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" id="cancelBusiness">Cancel</button>
                <button class="btn btn-primary" id="saveBusiness">Save Business</button>
            </div>
        </div>
    </div>

    <!-- View Details Modal -->
    <div class="modal" id="detailsModal">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="detailsModalTitle">Details</h2>
                <button class="modal-close">×</button>
            </div>
            <div class="modal-body" id="detailsModalContent">
                <!-- Content will be loaded dynamically -->
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" id="closeDetails">Close</button>
            </div>
        </div>
    </div>

   
</body>
</html>