<div class="navbar">
    {{-- <div class="search-bar">
        <i class="icon">🔍</i>
        <input type="text" placeholder="Search users, businesses, reviews...">
    </div> --}}
    <div class="navbar-right">
        <div class="nav-icon">
            🔔
            <span class="notification-badge">5</span>
        </div>
        <a href="{{ route('admin.settings',['ty'=>custom_encrypt('Settings')]) }}"><div class="nav-icon">⚙️</div></a>
        <div class="nav-avatar">
            <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="John Smith">
            <!-- The Logout Button -->
            
        </div>
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
</div>
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
                    window.location.href = '/';
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