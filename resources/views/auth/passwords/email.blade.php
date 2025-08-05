<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SCIZORA | Admin Portal</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
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
            margin-bottom: 35px;
        }

        .card-header h2 {
            font-size: 2.2rem;
            font-weight: 700;
            margin-bottom: 8px;
            /* This effect now looks great on a white background */
            background: linear-gradient(135deg, #0066ff 0%, #00a3ff 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .card-header p {
            color: #6c757d;
            font-size: 1.05rem;
            font-weight: 400;
        }

        /* Form Elements */
        .form-group {
            margin-bottom: 28px;
            position: relative;
        }

        .form-group label {
            display: block;
            margin-bottom: 10px;
            color: var(--dark-text);
            font-size: 0.95rem;
            font-weight: 500;
            letter-spacing: 0.3px;
        }

        .input-field {
            position: relative;
        }

        .input-field i {
            position: absolute;
            left: 18px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--secondary-blue);
            font-size: 1.15rem;
        }

        .form-control {
            width: 100%;
            height: 56px;
            padding: 0 20px 0 52px;
            background: #f8fafc;
            border: 1px solid var(--border-color);
            border-radius: 14px;
            color: var(--dark-text);
            font-size: 1.05rem;
            transition: all 0.3s ease;
            outline: none;
            box-shadow: 0 2px 6px rgba(15, 23, 42, 0.03);
        }

        .form-control:focus {
            border-color: var(--secondary-blue);
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.2);
            background: #ffffff;
        }

        .form-control::placeholder {
            color: #94a3b8;
        }

        /* Button styling */
        .submit-btn {
            width: 100%;
            padding: 17px;
            background: linear-gradient(135deg, #0066ff 0%, #00a3ff 100%);
            color: white;
            border: none;
            border-radius: 12px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            position: relative;
            overflow: hidden;
            box-shadow: 0 8px 20px rgba(0, 102, 255, 0.3);
            margin-top: 15px;
            letter-spacing: 0.5px;
        }

        .submit-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
            transition: 0.5s;
        }

        .submit-btn:hover::before {
            left: 100%;
        }

        .submit-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 25px rgba(0, 102, 255, 0.4);
        }

        .submit-btn:active {
            transform: translateY(1px);
        }

        .submit-btn i {
            margin-right: 10px;
        }

        /* Strength meter */
        .strength-meter {
            height: 6px;
            background: #e9ecef;
            border-radius: 3px;
            margin: 12px 0 5px;
            overflow: hidden;
            position: relative;
        }

        .strength-meter::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            height: 100%;
            width: 0;
            background: #ff4d6d;
            transition: width 0.4s ease, background 0.4s;
            border-radius: 3px;
        }

        .strength-meter[data-strength="1"]::before {
            width: 25%;
            background: #ff4d6d;
        }

        .strength-meter[data-strength="2"]::before {
            width: 50%;
            background: #ff9e00;
        }

        .strength-meter[data-strength="3"]::before {
            width: 75%;
            background: #00c2ff;
        }

        .strength-meter[data-strength="4"]::before {
            width: 100%;
            background: #2bd87e;
        }

        .strength-labels {
            display: flex;
            justify-content: space-between;
            font-size: 0.75rem;
            color: #6c757d;
            margin-top: 5px;
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

        .google-icon {
            color: #4285f4;
        }

        .microsoft-icon {
            color: #7fba00;
        }

        .apple-icon {
            color: #000;
        }

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
</head>

<body>
    <!-- Header -->
    <header>
        <div class="header-content">
            <div class="logo">

                <h1>SCI<span>ZORA</span></h1>
            </div>
            <nav>
                <ul>
                    <li><a href="#"><i class="fas fa-home"></i> Home</a></li>
                    <li><a href="#"><i class="fas fa-users"></i> About Us</a></li>
                    <li><a href="#"><i class="fas fa-cog"></i> Categories</a></li>
                    <li><a href="#"><i class="fas fa-question-circle"></i> Contact</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- Main Content -->
    <main>
        <!-- Animated Background -->
        <div class="background-shapes">
            <div class="shape shape-1"></div>
            <div class="shape shape-2"></div>
            <div class="shape shape-3"></div>
            <div class="shape shape-4"></div>
        </div>

        <div class="container">
            <div class="login-card">
                <div class="card-header">
                    <h2>Forgot Password?</h2>
                    <p>Enter your registered email and we'll send you a secure reset link with instructions.</p>
                </div>

                <form id="forgotPasswordForm">

                    <div class="form-group">
                        <div class="form-group">
                            <label for="email">Email Address</label>
                            <div class="input-field">
                                <i class="fas fa-envelope"></i>
                                <input type="email" id="email" class="form-control"
                                    placeholder="your.email@company.com" required>
                            </div>
                        </div>
                    </div>



                    <button type="submit" class="submit-btn">
                        <i class="fas fa-lock"></i> Send Reset Link
                    </button>
                </form>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer>
        <div class="footer-content">
            <div class="footer-section">
                <h3>About SCIZORA</h3>
                <p>SCIZORA helps consumers find trustworthy businesses through verified reviews and ratings from real
                    customers</p>
            </div>

            <div class="footer-section">
                <h3>Quick Links</h3>
                <ul class="footer-links">
                    <li><a href="#"><i class="fas fa-chevron-right"></i> Home</a></li>
                    <li><a href="#"><i class="fas fa-chevron-right"></i> About Us</a></li>
                    <li><a href="#"><i class="fas fa-chevron-right"></i> Blog</a></li>
                    <li><a href="#"><i class="fas fa-chevron-right"></i> Categories</a></li>
                    <li><a href="#"><i class="fas fa-chevron-right"></i> Contact</a></li>
                </ul>
            </div>

            <div class="footer-section">
                <h3>Contact Us</h3>
                <div class="contact-info">
                    <div class="contact-item">
                        <i class="fas fa-map-marker-alt"></i>
                        <span>123 Tech Park, San Francisco, CA</span>
                    </div>
                    <div class="contact-item">
                        <i class="fas fa-phone"></i>
                        <span>+1 (555) 123-4567</span>
                    </div>
                    <div class="contact-item">
                        <i class="fas fa-envelope"></i>
                        <span>support@scizora.com</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="copyright">
            &copy; 2025 SCIZORA. All rights reserved.
        </div>
    </footer>
    @include('layouts.commonjs')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const form = document.getElementById('forgotPasswordForm');
            const emailInput = document.getElementById('email');
    
            if (!form || !emailInput) return; // prevent null errors
    
            form.addEventListener('submit', function (e) {
                e.preventDefault();
    
                const email = emailInput.value.trim();
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    
                if (!emailRegex.test(email)) {
                    showAlert('error', 'Please enter a valid email address');
                    emailInput.focus();
                    return;
                }
    
                fetch('/api/forgot-password', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({ email: email })
                })
                .then(async response => {
                    const data = await response.json();
                    if (response.ok) {
                        showAlert('success', data.message || 'Reset link sent successfully!');
                        form.reset();
                    } else {
                        showAlert('error', data.message || 'Something went wrong.');
                    }
                })
                .catch(error => {
                    showAlert('error', 'Something went wrong. Try again later.');
                });
            });
    
            
        });
    </script>
    

    {{-- <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('forgotPasswordForm');
            const emailInput = document.getElementById('email');
            const statusMessage = document.getElementById('statusMessage');

            form.addEventListener('submit', function(e) {
                e.preventDefault();

                const email = emailInput.value.trim();
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

                if (!emailRegex.test(email)) {
                    showAlert('error', 'Please enter a valid email address');
                    emailInput.focus();
                    return;
                }

                fetch('/api/forgot-password', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify({
                            email: email
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.message) {
                            showAlert('success', data.message);
                            form.reset();
                        } else {
                            showAlert('error', 'Failed to send reset link');
                        }
                    })
                    .catch(error => {
                        showAlert('error', 'Something went wrong. Try again.');
                    });
            });


            function showStatus(message, type) {
                statusMessage.textContent = message;
                statusMessage.className = `status-message ${type}`;
                statusMessage.style.display = 'block';

                // Hide message after 5 seconds
                setTimeout(() => {
                    statusMessage.style.display = 'none';
                }, 5000);
            }

            // Add subtle animation to input on focus
            emailInput.addEventListener('focus', function() {
                this.parentElement.parentElement.style.transform = 'translateY(-2px)';
            });

            emailInput.addEventListener('blur', function() {
                this.parentElement.parentElement.style.transform = 'translateY(0)';
            });
        });
    </script> --}}


</body>

</html>
