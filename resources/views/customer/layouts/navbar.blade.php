<header class="bg-white border-b border-gray-200 p-4 flex items-center justify-between sticky top-0 z-10">
    <button
        class="hamburger p-2 rounded-md text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500 md:hidden">
        <i class="fas fa-bars text-xl"></i>
    </button>
    <div class="flex-1 max-w-md mx-4">
        <div class="relative">
            <input type="text" placeholder="Search..."
                class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
        </div>
    </div>

    <div class="flex items-center space-x-4">
        <button class="relative p-2 text-gray-600 hover:text-gray-900 focus:outline-none">
            <a href="notification.html"><i class="fas fa-bell text-xl"></i>
                <span class="absolute top-0 right-0 h-2 w-2 rounded-full bg-[#1544da]"></span></a>
        </button>
        <div class="flex items-center">
            <a href="edit-profile.html"><img src="https://randomuser.me/api/portraits/men/32.jpg"
                    alt="User" class="w-10 h-10 rounded-full"></a>
            <span class="ml-2 font-medium hidden md:inline">{{Auth::user()?->name}}</span>
            <!-- The Logout Button -->
            <a href="#" class="logout-btn" title="Logout" id="logoutBtn">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" align="right"
                    fill="currentColor" viewBox="0 0 16 16">
                    <path d="M8.5 10c-.276 0-.5-.448-.5-1s.224-1 .5-1 .5.448.5 1-.224 1-.5 1z" />
                    <path
                        d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2.5a.5.5 0 0 0 1 0v-2.5a1.5 1.5 0 0 0-1.5-1.5h-8A1.5 1.5 0 0 0 0 4.5v9A1.5 1.5 0 0 0 1.5 15h8a1.5 1.5 0 0 0 1.5-1.5v-2.5a.5.5 0 0 0-1 0v2.5z" />
                    <path
                        d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z" />
                </svg>
            </a>
        </div>
        <!-- END: Profile and Logout Button Group -->
    </div>
</header>

@include('layouts.commonjs')
<script>
    $('#logoutBtn').on('click', function() {
        $.ajax({
            url: '/api/logout',
            type: 'POST',
            headers: {
                'Authorization': 'Bearer ' + localStorage.getItem('token'), // your saved token
                'Accept': 'application/json'
            },
            success: function(response) {
                if (response.status) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Logged out!',
                        text: response.message,
                        timer: 1500,
                        showConfirmButton: false
                    });
                    // remove token and redirect
                    localStorage.removeItem('token');
                    window.location.href = '/customer/login';
                } else {
                    Swal.fire('Error', response.message, 'error');
                }
            },
            error: function() {
                Swal.fire('Error', 'Unable to logout, please try again.', 'error');
            }
        });
    });
</script>