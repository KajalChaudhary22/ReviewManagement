<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
    :root {
        --primary-color: #1544da;
        --primary-hover: #1034a6;
        --primary-light: #edf2ff;
        --bg-color: #ffffff;
        --panel-bg: #f8f9fa;
        --card-bg: #ffffff;
        --text-color: #212529;
        --light-text: #6c757d;
        --border-color: #dee2e6;
        --highlight: rgba(21, 68, 218, 0.08);
        --shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'Inter', sans-serif;
        color: var(--text-color);
        background-color: var(--bg-color);
        line-height: 1.6;
        /* Prevent horizontal scrolling on mobile */
        overflow-x: hidden;
    }

    .container {
        display: flex;
        min-height: 100vh;
    }

    /* Left Panel - Professional Design */
    .left-panel {
        flex: 1;
        padding: 3rem;
        background-color: var(--panel-bg);
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        position: relative;
        overflow: hidden;
    }

    .left-panel::before {
        content: '';
        position: absolute;
        bottom: -50px;
        right: -50px;
        width: 200px;
        height: 200px;
        background-color: var(--primary-light);
        border-radius: 50%;
        z-index: 0;
        opacity: 0.6;
    }

    .logo {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        font-weight: 700;
        font-size: 1.5rem;
        margin-bottom: 3rem;
        position: relative;
        z-index: 1;
        color: var(--primary-color);
    }

    .logo-icon {
        font-size: 1.75rem;
    }

    .welcome-section {
        position: relative;
        z-index: 1;
    }

    .welcome-section h1 {
        font-size: 2.5rem;
        font-weight: 700;
        margin-bottom: 1.5rem;
        color: var(--text-color);
        line-height: 1.2;
    }

    .welcome-section p {
        color: var(--light-text);
        margin-bottom: 2.5rem;
        max-width: 80%;
        font-size: 1.1rem;
    }

    .features {
        display: flex;
        flex-direction: column;
        gap: 1.75rem;
        margin-bottom: 2rem;
        position: relative;
        z-index: 1;
    }

    .feature-item {
        display: flex;
        align-items: flex-start;
        gap: 1.25rem;
        padding: 1.25rem;
        background-color: var(--card-bg);
        border-radius: 0.75rem;
        box-shadow: var(--shadow);
        transition: var(--transition);
    }

    .feature-item:hover {
        transform: translateY(-3px);
        box-shadow: 0 6px 16px rgba(0, 0, 0, 0.1);
    }

    .feature-icon {
        color: var(--primary-color);
        font-size: 1.5rem;
        margin-top: 0.2rem;
        flex-shrink: 0;
    }

    .feature-text h3 {
        font-weight: 600;
        margin-bottom: 0.5rem;
        font-size: 1.1rem;
        color: var(--text-color);
    }

    .feature-text p {
        color: var(--light-text);
        font-size: 0.95rem;
    }

    .panel-image {
        width: 100%;
        max-width: 500px;
        border-radius: 0.75rem;
        align-self: center;
        box-shadow: var(--shadow);
        border: 1px solid rgba(0, 0, 0, 0.05);
        transition: var(--transition);
    }

    .panel-image:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.12);
    }

    /* Right Panel - Professional Form */
    .right-panel {
        flex: 1;
        padding: 3rem;
        display: flex;
        flex-direction: column;
        justify-content: center;
        background-color: var(--bg-color);
    }

    .form-container {
        max-width: 450px;
        width: 100%;
        margin: 0 auto;
        background-color: var(--card-bg);
        padding: 2.5rem;
        border-radius: 1rem;
        box-shadow: var(--shadow);
        position: relative;
        border: 1px solid var(--border-color);
        transition: var(--transition);
    }

    .form-container:hover {
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.12);
    }

    .form-tabs {
        display: flex;
        border-bottom: 1px solid var(--border-color);
        margin-bottom: 2rem;
        position: relative;
    }

    .tab {
        padding: 1rem 1.5rem;
        cursor: pointer;
        font-weight: 500;
        color: var(--light-text);
        position: relative;
        flex: 1;
        text-align: center;
        transition: var(--transition);
        font-size: 1.1rem;
    }

    .tab:hover {
        color: var(--text-color);
    }

    .tab.active {
        color: var(--primary-color);
        font-weight: 600;
    }

    .tab.active::after {
        content: '';
        position: absolute;
        bottom: -1px;
        left: 0;
        width: 100%;
        height: 3px;
        background-color: var(--primary-color);
    }

    .form {
        display: none;
    }

    .form.active {
        display: block;
        animation: fadeIn 0.4s cubic-bezier(0.4, 0, 0.2, 1);
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

    .social-login {
        width: 100%;
        padding: 0.9rem;
        border: 1px solid var(--border-color);
        border-radius: 0.5rem;
        background-color: transparent;
        color: var(--text-color);
        font-weight: 500;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.75rem;
        cursor: pointer;
        transition: var(--transition);
        margin-bottom: 1.5rem;
        font-size: 1rem;
    }

    .social-login:hover {
        background-color: var(--highlight);
        border-color: var(--primary-color);
    }

    .social-icon {
        color: #0a66c2;
        font-size: 1.25rem;
    }

    .divider {
        display: flex;
        align-items: center;
        margin: 1.75rem 0;
        color: var(--light-text);
        font-size: 0.9rem;
    }

    .divider::before,
    .divider::after {
        content: '';
        flex: 1;
        border-bottom: 1px solid var(--border-color);
    }

    .divider::before {
        margin-right: 1.25rem;
    }

    .divider::after {
        margin-left: 1.25rem;
    }

    .form-group {
        margin-bottom: 1.5rem;
        position: relative;
    }

    label {
        display: block;
        margin-bottom: 0.75rem;
        font-weight: 500;
        font-size: 0.95rem;
        color: var(--text-color);
    }

    .input-field {
        width: 100%;
        padding: 1rem 1.25rem;
        border: 1px solid var(--border-color);
        border-radius: 0.5rem;
        font-size: 1rem;
        transition: var(--transition);
        background-color: var(--bg-color);
        color: var(--text-color);
    }

    .input-field:focus {
        outline: none;
        border-color: var(--primary-color);
        box-shadow: 0 0 0 3px rgba(21, 68, 218, 0.1);
    }

    .input-field::placeholder {
        color: var(--light-text);
    }

    .password-wrapper {
        position: relative;
    }

    .toggle-password {
        position: absolute;
        right: 15px;
        top: 50%;
        transform: translateY(-50%);
        cursor: pointer;
        color: var(--light-text);
        transition: var(--transition);
    }

    .toggle-password:hover {
        color: var(--primary-color);
    }

    .remember-forgot {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 2rem;
    }

    .checkbox-group {
        display: flex;
        align-items: center;
    }

    .checkbox-group input {
        margin-right: 0.75rem;
        width: 1.1rem;
        height: 1.1rem;
        accent-color: var(--primary-color);
        cursor: pointer;
    }

    .checkbox-group label {
        margin-bottom: 0;
        cursor: pointer;
        color: var(--text-color);
    }

    .forgot-password {
        color: var(--primary-color);
        font-size: 0.95rem;
        text-decoration: none;
        font-weight: 500;
        transition: var(--transition);
    }

    .forgot-password:hover {
        text-decoration: underline;
    }

    .submit-btn {
        width: 100%;
        padding: 1rem;
        background-color: var(--primary-color);
        color: white;
        border: none;
        border-radius: 0.5rem;
        font-weight: 600;
        cursor: pointer;
        transition: var(--transition);
        margin-bottom: 1.5rem;
        font-size: 1.05rem;
    }

    .submit-btn:hover {
        background-color: var(--primary-hover);
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(21, 68, 218, 0.2);
    }

    .form-footer {
        text-align: center;
        font-size: 0.85rem;
        color: var(--light-text);
        margin-top: 2rem;
    }

    .security-badge {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.75rem;
        margin-bottom: 1rem;
        color: var(--primary-color);
    }

    .security-badge i {
        font-size: 1.1rem;
    }

    .terms {
        margin-top: 1rem;
        line-height: 1.6;
    }

    .terms a {
        color: var(--primary-color);
        text-decoration: none;
        font-weight: 500;
        transition: var(--transition);
    }

    .terms a:hover {
        text-decoration: underline;
    }

    /* Success Message */
    .success-message {
        display: none;
        padding: 1rem;
        background-color: rgba(40, 167, 69, 0.1);
        color: #28a745;
        border-radius: 0.5rem;
        margin-bottom: 1.5rem;
        text-align: center;
        border: 1px solid rgba(40, 167, 69, 0.2);
    }

    /* ================================= */
    /* MOBILE-SPECIFIC STYLES ONLY BELOW */
    /* ================================= */

    @media (max-width: 1024px) {

        /* Switch to single column layout on tablet/mobile */
        .container {
            flex-direction: column;
            min-height: auto;
        }

        /* Maintain desktop padding on tablets */
        .left-panel,
        .right-panel {
            padding: 2.5rem;
        }

        .welcome-section h1 {
            font-size: 2.25rem;
        }

        .welcome-section p {
            max-width: 100%;
        }

        .panel-image {
            margin-top: 3rem;
            max-width: 400px;
        }

        .form-container {
            max-width: 500px;
        }
    }

    @media (max-width: 768px) {

        /* Tablet adjustments */
        .left-panel,
        .right-panel {
            padding: 2rem;
        }

        .logo {
            font-size: 1.4rem;
            margin-bottom: 2.5rem;
        }

        .welcome-section h1 {
            font-size: 2rem;
            margin-bottom: 1.25rem;
        }

        .welcome-section p {
            font-size: 1rem;
            margin-bottom: 2rem;
        }

        .form-container {
            padding: 2rem;
        }

        .tab {
            padding: 0.9rem;
            font-size: 1rem;
        }

        .input-field {
            padding: 0.9rem 1.1rem;
        }

        .submit-btn {
            padding: 0.9rem;
        }
    }

    @media (max-width: 576px) {

        /* Mobile phone adjustments */
        .left-panel,
        .right-panel {
            padding: 1.5rem;
        }

        .logo {
            font-size: 1.3rem;
            margin-bottom: 2rem;
        }

        .logo-icon {
            font-size: 1.5rem;
        }

        .welcome-section h1 {
            font-size: 1.75rem;
            margin-bottom: 1rem;
        }

        .welcome-section p {
            font-size: 0.95rem;
            margin-bottom: 1.5rem;
        }

        .features {
            gap: 1.25rem;
            margin-bottom: 1.5rem;
        }

        .feature-item {
            padding: 0.9rem;
            gap: 0.75rem;
        }

        .feature-icon {
            font-size: 1.3rem;
        }

        .feature-text h3 {
            font-size: 1rem;
        }

        .feature-text p {
            font-size: 0.85rem;
        }

        .panel-image {
            margin-top: 2rem;
        }

        .form-container {
            padding: 1.5rem;
            border-radius: 0.75rem;
        }

        .tab {
            padding: 0.75rem 0.5rem;
            font-size: 0.95rem;
        }

        .input-field {
            padding: 0.8rem 1rem;
            font-size: 0.95rem;
        }

        label {
            font-size: 0.9rem;
            margin-bottom: 0.5rem;
        }

        .submit-btn {
            padding: 0.85rem;
            font-size: 1rem;
        }

        .social-login {
            padding: 0.8rem;
            font-size: 0.95rem;
        }

        .divider {
            margin: 1.5rem 0;
            font-size: 0.85rem;
        }

        .form-footer {
            font-size: 0.8rem;
            margin-top: 1.5rem;
        }

        .terms {
            font-size: 0.8rem;
        }

        /* Stack remember me and forgot password on small screens */
        .remember-forgot {
            flex-direction: column;
            align-items: flex-start;
            gap: 0.75rem;
        }

        /* Increase tap target size for password toggle */
        .toggle-password {
            padding: 10px;
        }

        /* Hide decorative circle on mobile */
        .left-panel::before {
            display: none;
        }
    }

    @media (max-width: 400px) {

        /* Extra small devices */
        .left-panel,
        .right-panel {
            padding: 1.25rem;
        }

        .logo {
            font-size: 1.25rem;
        }

        .welcome-section h1 {
            font-size: 1.6rem;
        }

        .form-container {
            padding: 1.25rem;
        }

        .tab {
            font-size: 0.9rem;
        }

        .input-field {
            padding: 0.75rem;
        }

        .submit-btn {
            padding: 0.8rem;
        }
    }
    </style>