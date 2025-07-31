<footer class="bg-white text-gray-600 py-8 px-4 md:px-6 border-t border-gray-200">
        <div class="container mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div>
                    <h3 class="text-lg font-semibold text-gray-800 mb-4"><a href="#" class="text-xl md:text-2xl font-bold"><img src="<?php echo e(asset('build/images/logo.jpg')); ?>" alt="logo" width="200" height="60"></a></h3>
                    <p class="text-sm">LabZora is the leading pharmaceutical marketplace connecting businesses across the supply chain. Our platform facilitates secure transactions and partnerships in the global pharmaceutical industry.</p>
                </div>
                
                <div>
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">Quick Links</h3>
                    <ul class="space-y-2 text-sm">
                        <li><a href="#" class="hover:text-purple-primary transition">Home</a></li>
                        <li><a href="#" class="hover:text-purple-primary transition">About Us</a></li>
                        <li><a href="#" class="hover:text-purple-primary transition">Services</a></li>
                        <li><a href="#" class="hover:text-purple-primary transition">Contact</a></li>
                        <li><a href="#" class="hover:text-purple-primary transition">Privacy Policy</a></li>
                        <li><a href="#" class="hover:text-purple-primary transition">Terms of Service</a></li>
                    </ul>
                </div>
                
                <div>
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">Contact</h3>
                    <ul class="space-y-2 text-sm">
                        <li class="flex items-center">
                            <i class="fas fa-envelope mr-2 text-purple-primary"></i>
                            <span>support@LabZora.com</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-phone-alt mr-2 text-purple-primary"></i>
                            <span>+1 (800) 123-4567</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-map-marker-alt mr-2 text-purple-primary"></i>
                            <span>123 Pharma Street, Boston, MA 02115</span>
                        </li>
                    </ul>
                </div>
            </div>
            
            <div class="border-t border-gray-200 mt-8 pt-6 text-center text-sm">
                <p><?php echo $__env->make('layouts.reserved', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?></p>
            </div>
        </div>
    </footer><?php /**PATH D:\Projects\ReviewManagement\resources\views/business/auth/footer.blade.php ENDPATH**/ ?>