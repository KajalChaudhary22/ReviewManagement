<div class="w-full lg:w-1/2 bg-white form-container rounded-lg p-6 md:p-8 border border-gray-100">
    <div class="mb-6">
        <h2 class="text-2xl md:text-3xl font-bold mb-2 text-gray-800">Register Your Business</h2>
        <p class="text-gray-600">Join the leading pharmaceutical marketplace</p>
    </div>
    
    <form id="registrationForm" class="space-y-4">
        <div>
            <label for="businessName" class="block text-sm font-medium mb-1 text-gray-700">Business Name</label>
            <input type="text" id="businessName" name="businessName" 
                class="w-full bg-white border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-purple-primary focus:border-transparent transition text-gray-700"
                required>
            <p class="text-red-500 text-xs mt-1 hidden" id="businessNameError">Business name is required</p>
        </div>
        
        <div>
            <label for="email" class="block text-sm font-medium mb-1 text-gray-700">Email Address</label>
            <input type="email" id="email" name="email" 
                class="w-full bg-white border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-purple-primary focus:border-transparent transition text-gray-700"
                required>
            <p class="text-red-500 text-xs mt-1 hidden" id="emailError">Please enter a valid email address</p>
        </div>
        
        <div>
            <label for="phone" class="block text-sm font-medium mb-1 text-gray-700">Phone Number</label>
            <input type="tel" id="phone" name="phone" 
                class="w-full bg-white border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-purple-primary focus:border-transparent transition text-gray-700"
                required>
            <p class="text-red-500 text-xs mt-1 hidden" id="phoneError">Please enter a valid phone number</p>
        </div>
        
        <div>
            <label for="industry" class="block text-sm font-medium mb-1 text-gray-700">Industry Category</label>
            <select id="industry" name="industry" 
                class="w-full bg-white border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-purple-primary focus:border-transparent transition appearance-none text-gray-700"
                required>
                <option value="" disabled selected>{{__('common.Select category')}}</option>
                @foreach ($industries as $industry)
                    <option value="{{ $industry?->id }}">{{ $industry?->name }}</option>
                @endforeach
                
            </select>
            <p class="text-red-500 text-xs mt-1 hidden" id="industryError">Please select an industry category</p>
        </div>
        <div>
            <label for="industry" class="block text-sm font-medium mb-1 text-gray-700">Location</label>
            <select id="location" name="location" 
                class="w-full bg-white border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-purple-primary focus:border-transparent transition appearance-none text-gray-700"
                required>
                <option value="" disabled selected>{{__('common.Select location')}}</option>
                @foreach ($locations as $location)
                    <option value="{{ $location?->id }}">{{ $location?->name }}</option>
                @endforeach
                
            </select>
            <p class="text-red-500 text-xs mt-1 hidden" id="locationError">Please select a location</p>
        </div>
        
        <div>
            <label for="password" class="block text-sm font-medium mb-1 text-gray-700">Password</label>
            <input type="password" id="password" name="password" 
                class="w-full bg-white border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-purple-primary focus:border-transparent transition text-gray-700"
                required minlength="8">
            <p class="text-red-500 text-xs mt-1 hidden" id="passwordError">Password must be at least 8 characters</p>
        </div>
        
        <div>
            <label for="confirmPassword" class="block text-sm font-medium mb-1 text-gray-700">Confirm Password</label>
            <input type="password" id="confirmPassword" name="confirmPassword" 
                class="w-full bg-white border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-purple-primary focus:border-transparent transition text-gray-700"
                required>
            <p class="text-red-500 text-xs mt-1 hidden" id="confirmPasswordError">Passwords do not match</p>
        </div>
        
        <button type="submit" 
            class="w-full bg-purple-primary hover:bg-purple-700 text-white font-medium py-2 px-4 rounded-md transition duration-300 transform hover:scale-105 shadow-sm">
            Create Account
        </button>
        
        <p class="text-xs text-gray-500 text-center mt-4">
            By registering, you agree to our <a href="#" class="text-purple-primary hover:underline">Terms of Service</a> and <a href="#" class="text-purple-primary hover:underline">Privacy Policy</a>
        </p>
    </form>
    
    <div class="mt-8 pt-6 border-t border-gray-200">
        <div class="flex flex-wrap justify-center gap-4 md:gap-6 mb-4">
            <div class="flex items-center space-x-2">
                <i class="fas fa-shield-alt text-purple-primary"></i>
                <span class="text-xs text-gray-600">Secure Platform</span>
            </div>
            <div class="flex items-center space-x-2">
                <i class="fas fa-check-circle text-purple-primary"></i>
                <span class="text-xs text-gray-600">Verified Businesses</span>
            </div>
            <div class="flex items-center space-x-2">
                <i class="fas fa-certificate text-purple-primary"></i>
                <span class="text-xs text-gray-600">Industry Compliance</span>
            </div>
        </div>
        <p class="text-center text-sm text-gray-500">Trusted by 1000+ pharmaceutical companies</p>
    </div>
</div>