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
</style>
