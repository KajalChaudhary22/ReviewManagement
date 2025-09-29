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

        /* Form styling */
        .form-group {
            margin-bottom: 28px;
            position: relative;
        }

        .form-group label {
            display: block;
            margin-bottom: 10px;
            font-weight: 600;
            color: #343a40;
            font-size: 0.95rem;
            padding-left: 5px;
        }

        .input-container {
            position: relative;
        }

        .input-container input {
            width: 100%;
            padding: 16px 50px 16px 18px;
            border: 1px solid #dde4f1;
            /* TWEAKED: Softer border color */
            border-radius: 12px;
            font-size: 1rem;
            transition: all 0.3s;
            background: #fdfdff;
            /* CHANGED: Cleaner input background */
            color: #343a40;
            box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.02);
        }

        .input-container input:focus {
            outline: none;
            border-color: #0066ff;
            /* Use accent color for focus */
            box-shadow: 0 0 0 4px rgba(0, 102, 255, 0.15);
            background: #fff;
        }

        .input-container input::placeholder {
            /* Improved placeholder readability */
            color: #a0aec0;
        }

        .toggle-password {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: #adb5bd;
            cursor: pointer;
            font-size: 1.2rem;
            transition: all 0.3s;
            width: 36px;
            height: 36px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .toggle-password:hover {
            color: #0066ff;
            background: rgba(0, 102, 255, 0.08);
        }

        .error {
            color: #ff4d6d;
            font-size: 0.85rem;
            margin-top: 8px;
            height: 20px;
            display: block;
            padding-left: 5px;
        }

        .requirements {
            background: #f7faff;
            /* CHANGED: Subtle light blue background */
            border-radius: 12px;
            padding: 20px;
            margin-bottom: 25px;
            border-left: 4px solid #00a3ff;
            /* Use accent color for border */
        }

        .requirements h3 {
            font-size: 1rem;
            margin-bottom: 12px;
            color: #0052cc;
            /* CHANGED: Darker blue for readability */
            font-weight: 600;
        }

        .requirements ul {
            list-style: none;
            padding-left: 20px;
        }

        .requirements li {
            font-size: 0.9rem;
            color: #495057;
            /* CHANGED: Dark grey text for readability */
            margin-bottom: 8px;
            position: relative;
            display: flex;
            align-items: center;
        }

        .requirements li::before {
            content: '•';
            position: absolute;
            left: -15px;
            color: #0066ff;
            font-size: 1.4rem;
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
                    <h2>Reset Your Password</h2>
                    <p>Secure your account with a new password</p>
                </div>

                <form id="passwordForm">
                    <div class="requirements">
                        <h3>Password Requirements:</h3>
                        <ul>
                            <li>At least 8 characters long</li>
                            <li>Contains at least 1 uppercase letter</li>
                            <li>Contains at least 1 lowercase letter</li>
                            <li>Contains at least 1 number</li>
                            <li>Contains at least 1 special character</li>
                        </ul>
                    </div>

                    <div class="form-group">
                        <label for="newPassword">New Password</label>
                        <div class="input-container">
                            <input type="password" id="newPassword" placeholder="Enter your new password"
                                autocomplete="new-password">
                            <button type="button" class="toggle-password" data-target="newPassword">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                        <div class="strength-meter" data-strength="0"></div>
                        <div class="strength-labels">
                            <span>Weak</span>
                            <span>Medium</span>
                            <span>Strong</span>
                            <span>Very Strong</span>
                        </div>
                        <span class="error" id="newPasswordError"></span>
                    </div>

                    <div class="form-group">
                        <label for="confirmPassword">Confirm Password</label>
                        <div class="input-container">
                            <input type="password" id="confirmPassword" placeholder="Confirm your new password"
                                autocomplete="new-password">
                            <button type="button" class="toggle-password" data-target="confirmPassword">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                        <span class="error" id="confirmPasswordError"></span>
                    </div>

                    <button type="submit" class="submit-btn">
                        <i class="fas fa-lock"></i> Update Password
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
        // Javascript remains the same
        document.addEventListener('DOMContentLoaded', function() {
            // Password toggle functionality
            document.querySelectorAll('.toggle-password').forEach(button => {
                button.addEventListener('click', function() {
                    const targetId = this.getAttribute('data-target');
                    const passwordInput = document.getElementById(targetId);
                    const icon = this.querySelector('i');

                    if (passwordInput.type === 'password') {
                        passwordInput.type = 'text';
                        icon.classList.remove('fa-eye');
                        icon.classList.add('fa-eye-slash');
                    } else {
                        passwordInput.type = 'password';
                        icon.classList.remove('fa-eye-slash');
                        icon.classList.add('fa-eye');
                    }
                });
            });

            // Password strength calculation
            const newPasswordInput = document.getElementById('newPassword');
            const strengthMeter = document.querySelector('.strength-meter');

            newPasswordInput.addEventListener('input', function() {
                const password = this.value;
                let strength = 0;

                if (password.length >= 8) strength++;
                if (/[A-Z]/.test(password)) strength++;
                if (/[a-z]/.test(password)) strength++;
                if (/[0-9]/.test(password)) strength++;
                if (/[^A-Za-z0-9]/.test(password)) strength++;

                strength = Math.min(strength, 4);
                strengthMeter.setAttribute('data-strength', strength > 0 ? (strength < 2 ? 1 : (strength <
                    4 ? strength - 1 : strength)) : 0);
            });

            // Form validation and submission
            const form = document.getElementById('passwordForm');
            const newPasswordError = document.getElementById('newPasswordError');
            const confirmPasswordError = document.getElementById('confirmPasswordError');

            form.addEventListener('submit', function(e) {
                e.preventDefault();

                const newPassword = document.getElementById('newPassword').value;
                const confirmPassword = document.getElementById('confirmPassword').value;

                let isValid = true;

                newPasswordError.textContent = '';
                confirmPasswordError.textContent = '';

                if (newPassword.length < 8) {
                    newPasswordError.textContent = 'Password must be at least 8 characters';
                    isValid = false;
                } else if (!/[A-Z]/.test(newPassword)) {
                    newPasswordError.textContent = 'Password must contain at least one uppercase letter';
                    isValid = false;
                } else if (!/[a-z]/.test(newPassword)) {
                    newPasswordError.textContent = 'Password must contain at least one lowercase letter';
                    isValid = false;
                } else if (!/[0-9]/.test(newPassword)) {
                    newPasswordError.textContent = 'Password must contain at least one number';
                    isValid = false;
                } else if (!/[^A-Za-z0-9]/.test(newPassword)) {
                    newPasswordError.textContent = 'Password must contain at least one special character';
                    isValid = false;
                }

                if (newPassword !== confirmPassword) {
                    confirmPasswordError.textContent = 'Passwords do not match';
                    isValid = false;
                }

                if (isValid) {
                    const urlParams = new URLSearchParams(window.location.search);
                    const token = window.location.pathname.split('/').pop(); // Get from path
                    const encryptedEmail = urlParams.get('email'); // Get email from query param
                    fetch('/api/reset-password/${token}', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'Accept': 'application/json',
                            },
                            body: JSON.stringify({
                                token: token,
                                email: encryptedEmail,
                                password: newPassword,
                                password_confirmation: confirmPassword
                            }),
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.status) {
                                Swal.fire('Success', data.message, 'success');
                                window.location.href = '/';
                                strengthMeter.setAttribute('data-strength', 0);
                            } else {
                                Swal.fire('Error', data.message, 'error');
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            Swal.fire('Error', 'Something went wrong!', 'error');
                        });
                    const submitBtn = document.querySelector('.submit-btn');
                    submitBtn.innerHTML = '<i class="fas fa-check-circle"></i> Password Updated!';
                    submitBtn.classList.add('success-animation');

                    setTimeout(() => {
                        submitBtn.innerHTML = '<i class="fas fa-lock"></i> Update Password';
                        submitBtn.classList.remove('success-animation');

                        // form.reset();
                        strengthMeter.setAttribute('data-strength', 0);
                    }, 3000);
                }
            });

            document.getElementById('confirmPassword').addEventListener('input', function() {
                const newPassword = document.getElementById('newPassword').value;
                const confirmPassword = this.value;

                if (newPassword && confirmPassword && newPassword !== confirmPassword) {
                    confirmPasswordError.textContent = 'Passwords do not match';
                } else {
                    confirmPasswordError.textContent = '';
                }
            });
        });
    </script>
</body>

</html>
