<nav class="bg-white py-4 px-6 border-b border-gray-200">
        <div class="container mx-auto flex justify-between items-center">
            <div class="flex items-center">
                <a href="../index.html">
                    <h1 class="text-2xl font-bold">
                        <a href="#" class="text-xl md:text-2xl font-bold"><img src="<?php echo e(asset('build/images/logo.jpg')); ?>" alt="logo" width="200" height="60"></a>
                    </h1>
                </a>
            </div>
            <div class="flex items-center space-x-6">
                <div class="relative">
                   <?php echo $__env->make('layouts.language', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <i class="fas fa-chevron-down absolute right-3 top-1/2 transform -translate-y-1/2 text-xs text-gray-500 pointer-events-none"></i>
                </div>
                <a href="#" class="text-gray-700 hover:text-purple-primary text-sm font-medium transition">Contact Support</a>
            </div>
        </div>
    </nav><?php /**PATH D:\Projects\ReviewManagement\resources\views/business/auth/navbar.blade.php ENDPATH**/ ?>