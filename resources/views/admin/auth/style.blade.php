<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Poppins', sans-serif;
    }

    body {
        display: flex;
        flex-direction: column;
        min-height: 100vh;
        background: linear-gradient(135deg, #f5f9ff 0%, #e6f0ff 100%);
        color: #2c3e50;
        overflow-x: hidden;
    }

    /* Header Styles */
    header {
        background: linear-gradient(90deg, #1a3a7f 0%, #2a56c6 100%);
        color: white;
        padding: 1rem 2rem;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        z-index: 100;
    }

    .header-content {
        display: flex;
        justify-content: space-between;
        align-items: center;
        max-width: 1200px;
        margin: 0 auto;
    }

    .logo {
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .logo i {
        font-size: 2rem;
        color: #4dabf7;
    }

    .logo h1 {
        font-weight: 700;
        font-size: 1.8rem;
        letter-spacing: 0.5px;
    }

    .logo span {
        color: #4dabf7;
    }

    nav ul {
        display: flex;
        list-style: none;
        gap: 2rem;
    }

    nav a {
        color: rgba(255, 255, 255, 0.9);
        text-decoration: none;
        font-weight: 500;
        font-size: 1rem;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        gap: 6px;
    }

    nav a:hover {
        color: #4dabf7;
    }

    /* Main Content */
    main {
        flex: 1;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 2rem;
        position: relative;
        overflow: hidden;
    }

    /* Animated Background */
    .background-shapes {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 1;
        overflow: hidden;
    }

    .shape {
        position: absolute;
        border-radius: 50%;
        opacity: 0.1;
    }

    .shape-1 {
        width: 300px;
        height: 300px;
        background: #2a56c6;
        top: -100px;
        left: -100px;
    }

    .shape-2 {
        width: 200px;
        height: 200px;
        background: #1a3a7f;
        bottom: -80px;
        right: 15%;
    }

    .shape-3 {
        width: 150px;
        height: 150px;
        background: #2a56c6;
        top: 30%;
        right: -50px;
    }

    .shape-4 {
        width: 100px;
        height: 100px;
        background: #1a3a7f;
        bottom: 20%;
        left: 10%;
    }

    /* Login Card */
    .container {
        position: relative;
        width: 100%;
        max-width: 450px;
        z-index: 10;
    }

    .login-card {
        background: rgba(255, 255, 255, 0.95);
        border-radius: 16px;
        box-shadow: 0 10px 30px rgba(42, 86, 198, 0.15);
        padding: 40px 35px;
        position: relative;
        overflow: hidden;
        border: 1px solid rgba(234, 239, 253, 0.8);
    }

    .login-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 6px;
        background: linear-gradient(90deg, #2a56c6, #4dabf7);
    }

    .card-header {
        text-align: center;
        margin-bottom: 32px;
    }

    .card-header h2 {
        font-size: 1.8rem;
        color: #1a3a7f;
        margin-bottom: 8px;
    }

    .card-header p {
        color: #6c757d;
        font-size: 1rem;
    }

    .input-group {
        margin-bottom: 24px;
        position: relative;
    }

    .input-group label {
        display: block;
        color: #495057;
        margin-bottom: 8px;
        font-weight: 500;
        font-size: 0.95rem;
    }

    .input-field {
        width: 100%;
        padding: 14px 20px;
        background: #f8f9fe;
        border: 1px solid #e2e8f9;
        border-radius: 10px;
        color: #2c3e50;
        font-size: 1rem;
        transition: all 0.3s ease;
    }

    .input-field:focus {
        outline: none;
        border-color: #4dabf7;
        box-shadow: 0 0 0 3px rgba(77, 171, 247, 0.2);
    }

    .password-container {
        position: relative;
    }

    .toggle-password {
        position: absolute;
        right: 15px;
        top: 50%;
        transform: translateY(-50%);
        color: #6c757d;
        cursor: pointer;
        background: none;
        border: none;
        font-size: 1.1rem;
        transition: color 0.3s;
    }

    .toggle-password:hover {
        color: #2a56c6;
    }

    .options {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 30px;
    }

    .remember {
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .remember input {
        accent-color: #2a56c6;
    }

    .remember label {
        color: #495057;
        font-size: 0.9rem;
        cursor: pointer;
    }

    .forgot-password {
        color: #2a56c6;
        font-size: 0.9rem;
        text-decoration: none;
        font-weight: 500;
        transition: all 0.3s ease;
    }

    .forgot-password:hover {
        color: #1a3a7f;
        text-decoration: underline;
    }

    .login-btn {
        width: 100%;
        padding: 14px;
        background: linear-gradient(90deg, #2a56c6 0%, #4dabf7 100%);
        border: none;
        border-radius: 10px;
        color: white;
        font-size: 1.1rem;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
        box-shadow: 0 4px 15px rgba(42, 86, 198, 0.3);
    }

    .login-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(42, 86, 198, 0.4);
    }

    .login-btn:active {
        transform: translateY(0);
    }

    .login-btn::after {
        content: '';
        position: absolute;
        top: -50%;
        left: -60%;
        width: 20px;
        height: 200%;
        background: rgba(255, 255, 255, 0.3);
        transform: rotate(25deg);
        transition: all 0.6s;
    }

    .login-btn:hover::after {
        left: 120%;
    }

    .divider {
        display: flex;
        align-items: center;
        margin: 30px 0;
        color: #6c757d;
    }

    .divider::before,
    .divider::after {
        content: '';
        flex: 1;
        height: 1px;
        background: #e9ecef;
    }

    .divider span {
        padding: 0 15px;
        font-size: 0.9rem;
    }

    .social-login {
        display: flex;
        justify-content: center;
        gap: 15px;
        margin-bottom: 20px;
    }

    .social-btn {
        width: 45px;
        height: 45px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #f8f9fe;
        border: 1px solid #e2e8f9;
        color: #2a56c6;
        font-size: 1.2rem;
        transition: all 0.3s ease;
        cursor: pointer;
    }

    .social-btn:hover {
        background: #eaf0ff;
        transform: translateY(-3px);
        box-shadow: 0 4px 10px rgba(42, 86, 198, 0.15);
    }

    /* Social Brand Colors */
    .google-btn:hover {
        background: #f1f8ff;
        border-color: #4285f4;
        color: #4285f4;
    }

    .microsoft-btn:hover {
        background: #f5f9ff;
        border-color: #7fba00;
        color: #7fba00;
    }

    .apple-btn:hover {
        background: #f9f9f9;
        border-color: #000;
        color: #000;
    }

    /* Footer Styles */
    footer {
        background: #1a3a7f;
        color: rgba(255, 255, 255, 0.8);
        padding: 2rem;
        margin-top: auto;
    }

    .footer-content {
        display: flex;
        justify-content: space-between;
        max-width: 1200px;
        margin: 0 auto;
    }

    .footer-section {
        flex: 1;
    }

    .footer-section h3 {
        color: white;
        font-size: 1.2rem;
        margin-bottom: 1.2rem;
        position: relative;
        padding-bottom: 10px;
    }

    .footer-section h3::after {
        content: '';
        position: absolute;
        left: 0;
        bottom: 0;
        width: 40px;
        height: 2px;
        background: #4dabf7;
    }

    .footer-links {
        list-style: none;
    }

    .footer-links li {
        margin-bottom: 10px;
    }

    .footer-links a {
        color: rgba(255, 255, 255, 0.7);
        text-decoration: none;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .footer-links a:hover {
        color: #4dabf7;
        transform: translateX(5px);
    }

    .contact-info {
        display: flex;
        flex-direction: column;
        gap: 12px;
    }

    .contact-item {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .copyright {
        text-align: center;
        padding-top: 2rem;
        margin-top: 2rem;
        border-top: 1px solid rgba(255, 255, 255, 0.1);
        color: rgba(255, 255, 255, 0.6);
        font-size: 0.9rem;
    }

    /* Modal Styles */
    .modal {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.7);
        z-index: 1000;
        justify-content: center;
        align-items: center;
    }

    .modal-content {
        background: white;
        border-radius: 16px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
        width: 90%;
        max-width: 450px;
        padding: 30px;
        position: relative;
        animation: modalAppear 0.4s ease;
    }

    @keyframes modalAppear {
        from {
            opacity: 0;
            transform: translateY(-50px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .close-modal {
        position: absolute;
        top: 15px;
        right: 20px;
        font-size: 1.8rem;
        cursor: pointer;
        color: #6c757d;
        transition: color 0.3s;
    }

    .close-modal:hover {
        color: #2a56c6;
    }

    .modal-header {
        text-align: center;
        margin-bottom: 25px;
    }

    .modal-header h3 {
        color: #1a3a7f;
        font-size: 1.5rem;
        margin-bottom: 10px;
    }

    .modal-header p {
        color: #6c757d;
        font-size: 1rem;
    }

    .modal-icon {
        font-size: 3rem;
        margin-bottom: 20px;
        display: flex;
        justify-content: center;
    }

    .google-icon { color: #4285f4; }
    .microsoft-icon { color: #7fba00; }
    .apple-icon { color: #000; }

    .modal-btn {
        width: 100%;
        padding: 14px;
        background: linear-gradient(90deg, #2a56c6 0%, #4dabf7 100%);
        border: none;
        border-radius: 10px;
        color: white;
        font-size: 1.1rem;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        margin-top: 20px;
    }

    .modal-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(42, 86, 198, 0.4);
    }

    /* Responsive design */
    @media (max-width: 900px) {
        .footer-content {
            flex-direction: column;
            gap: 2rem;
        }
    }

    @media (max-width: 768px) {
        header {
            padding: 1rem;
        }
        
        nav ul {
            gap: 1.2rem;
        }
        
        .login-card {
            padding: 30px 25px;
        }
    }

    @media (max-width: 600px) {
        .header-content {
            flex-direction: column;
            gap: 1rem;
            text-align: center;
        }
        
        nav ul {
            justify-content: center;
        }
        
        .logo {
            justify-content: center;
        }
        
        .options {
            flex-direction: column;
            align-items: flex-start;
            gap: 15px;
        }
    }

    @media (max-width: 480px) {
        main {
            padding: 1.5rem;
        }
        
        .login-card {
            padding: 25px 20px;
        }
        
        .card-header h2 {
            font-size: 1.5rem;
        }
        
        .input-field {
            padding: 12px 16px;
        }
        
        .login-btn {
            padding: 12px;
        }
    }
</style>