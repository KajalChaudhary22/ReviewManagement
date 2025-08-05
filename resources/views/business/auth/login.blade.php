<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SCIZORA - Pharmaceutical Marketplace</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8fafc;
        }
        .form-container {
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05), 0 2px 4px -1px rgba(0, 0, 0, 0.03);
        }
        /* Added custom purple color styles */
        .text-purple-primary { color: #1544da; }
        .bg-purple-primary { background-color: #1544da; }
        .hover\:bg-purple-700:hover { background-color: #5a0a9d; }
        .ring-purple-primary { --tw-ring-color: rgba(106, 13, 173, var(--tw-ring-opacity)); }
        .border-purple-primary { border-color: #1544da; }
        .focus\:ring-purple-primary:focus { --tw-ring-color: rgba(106, 13, 173, var(--tw-ring-opacity)); }
    </style>
   @include('layouts.token')
</head>
<body class="min-h-screen flex flex-col">
    <!-- Top Navigation Bar -->
    @include('business.auth.navbar')

    <!-- Main Content -->
    <main class="flex-grow container mx-auto px-4 py-8 md:py-12">
        <div class="flex flex-col lg:flex-row gap-8">
            <!-- Left Side - Registration Form -->
            @include('business.auth.registration')
            
            <!-- Right Side - Login Form -->
            <div class="w-full lg:w-1/2 bg-white form-container rounded-lg p-6 md:p-8 border border-gray-100">
                <div class="mb-6">
                    <h2 class="text-2xl md:text-3xl font-bold mb-2 text-gray-800">Welcome Back</h2>
                    <p class="text-gray-600">Login to your business account</p>
                </div>
                
                <form id="loginForm" class="space-y-4">
                    <div>
                        <label for="loginEmail" class="block text-sm font-medium mb-1 text-gray-700">Email Address</label>
                        <input type="email" id="loginEmail" name="loginEmail" 
                            class="w-full bg-white border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-purple-primary focus:border-transparent transition text-gray-700"
                            required>
                        <p class="text-red-500 text-xs mt-1 hidden" id="loginEmailError">Please enter a valid email address</p>
                    </div>
                    
                    <div>
                        <label for="loginPassword" class="block text-sm font-medium mb-1 text-gray-700">Password</label>
                        <input type="password" id="loginPassword" name="loginPassword" 
                            class="w-full bg-white border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-purple-primary focus:border-transparent transition text-gray-700"
                            required>
                        <p class="text-red-500 text-xs mt-1 hidden" id="loginPasswordError">Password is required</p>
                    </div>
                    
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <input type="checkbox" id="rememberMe" name="rememberMe" class="h-4 w-4 text-purple-primary focus:ring-purple-primary border-gray-300 rounded">
                            <label for="rememberMe" class="ml-2 block text-sm text-gray-600">Remember me</label>
                        </div>
                        <a href="{{ route('password.request',['ty' => custom_encrypt('ResetPasswordEmail')]) }}" class="text-sm text-purple-primary hover:underline">Forgot Password?</a>
                    </div>
                    
                    <button type="submit" 
                        class="w-full bg-purple-primary hover:bg-purple-700 text-white font-medium py-2 px-4 rounded-md transition duration-300 transform hover:scale-105 shadow-sm">
                        Login
                    </button>
                    
                    <p class="text-center text-sm text-gray-500 mt-4">
                        <a href="#" class="text-purple-primary hover:underline">Need Help? Contact Support</a>
                    </p>
                </form>
            </div>
        </div>
    </main>

    <!-- Footer -->
    @include('business.auth.footer')
    @include('layouts.commonjs')
    <!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> -->
    <script>
        // Registration Form Validation
        const registrationForm = document.getElementById('registrationForm');
        const loginForm = document.getElementById('loginForm');

        if (registrationForm) {
            registrationForm.addEventListener('submit', function(e) {
                e.preventDefault();
                let isValid = true;

                // Validate Business Name
                const businessName = document.getElementById('businessName');
                const businessNameError = document.getElementById('businessNameError');
                if (!businessName.value.trim()) {
                    businessNameError.classList.remove('hidden');
                    isValid = false;
                } else {
                    businessNameError.classList.add('hidden');
                }

                // Validate Email
                const email = document.getElementById('email');
                const emailError = document.getElementById('emailError');
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (!emailRegex.test(email.value)) {
                    emailError.classList.remove('hidden');
                    isValid = false;
                } else {
                    emailError.classList.add('hidden');
                }

                // Validate Phone
                const phone = document.getElementById('phone');
                const phoneError = document.getElementById('phoneError');
                const phoneRegex = /^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/;
                if (!phoneRegex.test(phone.value)) {
                    phoneError.classList.remove('hidden');
                    isValid = false;
                } else {
                    phoneError.classList.add('hidden');
                }

                // Validate Industry
                const industry = document.getElementById('industry');
                const industryError = document.getElementById('industryError');
                if (!industry.value) {
                    industryError.classList.remove('hidden');
                    isValid = false;
                } else {
                    industryError.classList.add('hidden');
                }

                // Validate Password
                const password = document.getElementById('password');
                const passwordError = document.getElementById('passwordError');
                if (password.value.length < 8) {
                    passwordError.classList.remove('hidden');
                    isValid = false;
                } else {
                    passwordError.classList.add('hidden');
                }

                // Validate Confirm Password
                const confirmPassword = document.getElementById('confirmPassword');
                const confirmPasswordError = document.getElementById('confirmPasswordError');
                if (confirmPassword.value !== password.value) {
                    confirmPasswordError.classList.remove('hidden');
                    isValid = false;
                } else {
                    confirmPasswordError.classList.add('hidden');
                }

                if (isValid) {
                    // Form is valid, submit it
                    const formData = {
                        name: businessName.value,
                        email: email.value,
                        contact_number: phone.value,
                        industry_id: industry.value,
                        password: password.value,
                        password_confirmation: confirmPassword.value
                    };

                    fetch('/api/business/register', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'Accept': 'application/json',
                        },
                        body: JSON.stringify(formData)
                    })
                    .then(async response => {
                        const data = await response.json();
                        if (response.ok) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Registration Successful!',
                                text: 'You can now log in.',
                            });
                            registrationForm.reset();
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Registration Failed',
                                text: data.message || 'Please check your inputs and try again.',
                            });
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops!',
                            text: 'Something went wrong. Please try again later.',
                        });
                    });
                    //  alert('Registration form submitted successfully!');
                    //  registrationForm.reset();
                }
                
            });
        }

        // Login Form Validation
        if (loginForm) {
            loginForm.addEventListener('submit', function(e) {
                e.preventDefault();
                let isValid = true;

                // Validate Email
                const loginEmail = document.getElementById('loginEmail');
                const loginEmailError = document.getElementById('loginEmailError');
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (!emailRegex.test(loginEmail.value)) {
                    loginEmailError.classList.remove('hidden');
                    isValid = false;
                } else {
                    loginEmailError.classList.add('hidden');
                }

                // Validate Password
                const loginPassword = document.getElementById('loginPassword');
                const loginPasswordError = document.getElementById('loginPasswordError');
                if (!loginPassword.value) {
                    loginPasswordError.classList.remove('hidden');
                    isValid = false;
                } else {
                    loginPasswordError.classList.add('hidden');
                }

                if (isValid) {
                    // Form is valid, submit it
                    const loginData = {
                        email: loginEmail.value,
                        password: loginPassword.value
                    };
                    fetch('/api/business/login', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'Accept': 'application/json'
                        },
                        body: JSON.stringify(loginData)
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.status === true) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Login Successful',
                                text: data.message || 'Welcome!',
                                timer: 2000,
                                showConfirmButton: false
                            }).then(() => {
                                localStorage.setItem('token', data.token);
                                window.location.href = data.route; // adjust URL as needed
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Login Failed',
                                text: data.message || 'Invalid credentials'
                            });
                        }
                    })
                    .catch(error => {
                        console.error('Login error:', error);
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'Something went wrong. Please try again.'
                        });
                    });
                    // alert('Login form submitted successfully!');
                    // loginForm.reset();
                }
            });
        }
    </script>
</body>
</html>