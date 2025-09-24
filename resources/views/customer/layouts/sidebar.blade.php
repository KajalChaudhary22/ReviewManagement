<div class="sidebar bg-white w-64 border-r border-gray-200 flex-shrink-0">
    <div class="p-4 border-b border-gray-200">
        <a href="#" class="text-xl md:text-2xl font-bold"><img src="{{ asset('build/images/logo.jpg') }}" alt="SCIZORA logo"
                width="200" height="60"></a>
    </div>
    <nav class="p-4">
        <ul>
            <li class="mb-2">
                <a href="{{ route('customer.dashboard.show',['ty'=>custom_encrypt('CustomerDashboard')]) }}"
                    class="flex items-center p-3 rounded-lg {{ Route::is('customer.dashboard.show') ? 'text-blue-600 font-medium bg-blue-50' : 'text-gray-700 hover:bg-gray-100' }} "
                    data-section="dashboard">
                    <i class="fas fa-tachometer-alt mr-3"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="mb-2">
                <a href="{{ route('customer.show.profile',['ty'=>custom_encrypt('CustomerProfileShow')]) }}"
                    class="flex items-center p-3 rounded-lg {{ Route::is('customer.show.profile') ? 'text-blue-600 font-medium bg-blue-50' : 'text-gray-700 hover:bg-gray-100' }}">
                    <i class="fas fa-user mr-3"></i>
                    <span>My Profile</span>
                </a>
            </li>
            {{-- <li class="mb-2">
                <a href="Messages.html"
                    class="flex items-center p-3 rounded-lg text-gray-700 hover:bg-gray-100">
                    <i class="fas fa-envelope mr-3"></i>
                    <span>Messages</span>
                </a>
            </li> --}}
            <li class="mb-2">
                <a href="{{ route('customer.show.notifications',['ty'=>custom_encrypt('CustomerNotificationsShow')]) }}"
                    class="flex items-center p-3 rounded-lg {{ Route::is('customer.show.notifications') ? 'text-blue-600 font-medium bg-blue-50' : 'text-gray-700 hover:bg-gray-100' }}">
                    <i class="fas fa-bell mr-3"></i>
                    <span>Notifications</span>
                </a>
            </li>
            <li class="mb-2">
                <a href="{{ route('customer.settings',['ty'=>custom_encrypt('CustomerSettingsShow')]) }}"
                    class="flex items-center p-3 rounded-lg {{ Route::is('customer.settings') ? 'text-blue-600 font-medium bg-blue-50' : 'text-gray-700 hover:bg-gray-100' }}">
                    <i class="fas fa-cog mr-3"></i>
                    <span>Settings</span>
                </a>
            </li>
        </ul>
    </nav>
    <!-- Ad Banner -->
    {{-- <div class="container mx-auto px-4 py-6">
        <img src="https://tpc.googlesyndication.com/simgad/13265185988757716340" alt="Advertisement"
            class="w-full h-auto mx-auto">
    </div> --}}
</div>