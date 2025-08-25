<div class="sidebar">
    <div class="sidebar-header">
        <div class="brand-name"><a href="dashboard-overview.html" class="text-xl md:text-2xl font-bold"><img src="{{ asset('build/images/logo.jpg') }}" alt="logo" width="200" height="60"></a></div>
        <div class="brand-subtitle">Management Portal</div>
    </div>
    <div class="menu">
        <a href="{{ route('admin.dashboard.show',['ty'=>custom_encrypt('AdminDashboard')]) }}" class="menu-item {{ Route::is('admin.dashboard.show') ? 'active' : '' }}">
            <i class="icon">📊</i>
            <span class="menu-text">Dashboard Overview</span>
        </a>
        <a href="{{ route('user.management.index',['ty'=>custom_encrypt('UserManagement')]) }}" class="menu-item {{ Route::is('user.management.index') ? 'active' : '' }}">
            <i class="icon">👥</i>
            <span class="menu-text">User Management</span>
        </a>
        <a href="{{ route('business.management.index',['ty'=>custom_encrypt('BusinessManagement')]) }}" class="menu-item {{ Route::is('business.management.index') ? 'active' : '' }}">
            <i class="icon">🏢</i>
            <span class="menu-text">Business Management</span>
        </a>
        <a href="{{ route('review.moderation.index',['ty'=>custom_encrypt('ReviewModeration')]) }}" class="menu-item">
            <i class="icon">⭐</i>
            <span class="menu-text">Review Moderation</span>
        </a>
        {{-- <a href="{{ route('campaigns.index',['ty'=>custom_encrypt('Campaigns')]) }}" class="menu-item {{ Route::is('campaigns.index') ? 'active' : '' }}">
            <i class="icon">📢</i>
            <span class="menu-text">Campaigns</span>
        </a>  --}}
        <a href="{{ route('campaigns.index',['ty'=>custom_encrypt('Campaigns')]) }}" class="menu-item {{ Route::is('campaigns.index') ? 'active' : '' }}">
            <i class="icon">📢</i>
            <span class="menu-text">Master Setup</span>
        </a> 
        <a href="{{ route('admin.settings',['ty'=>custom_encrypt('Settings')]) }}" class="menu-item">
            <i class="icon">⚙️</i>
            <span class="menu-text">Settings</span>
        </a>
      
         {{-- <a href="{{ route('business.management.index',['ty'=>custom_encrypt('BusinessManagement')]) }}" class="menu-item">
            <i class="icon">📈</i>
            <span class="menu-text">Analytics & Reports</span>
        </a>
        <a href="{{ route('business.management.index',['ty'=>custom_encrypt('BusinessManagement')]) }}" class="menu-item">
            <i class="icon">🏆</i>
            <span class="menu-text">Points System</span>
        </a>
        
        <a href="{{ route('business.management.index',['ty'=>custom_encrypt('BusinessManagement')]) }}" class="menu-item">
            <i class="icon">📩</i>
            <span class="menu-text">Queries</span>
        </a>
        
        <a href="{{ route('business.management.index',['ty'=>custom_encrypt('BusinessManagement')]) }}" class="menu-item">
            <i class="icon">📢</i>
            <span class="menu-text">Master</span>
        </a> --}}
        {{-- <a href="review-moderation.html" class="menu-item">
            <i class="icon">⭐</i>
            <span class="menu-text">Review Moderation</span>
        </a>
        <a href="analytics-&-reports.html" class="menu-item">
            <i class="icon">📈</i>
            <span class="menu-text">Analytics & Reports</span>
        </a>
        <a href="points-system.html" class="menu-item">
            <i class="icon">🏆</i>
            <span class="menu-text">Points System</span>
        </a>
       
        <a href="queries.html" class="menu-item">
            <i class="icon">📩</i>
            <span class="menu-text">Queries</span>
        </a>--}}
        
    </div>
    <div class="user-profile">
        <div class="user-avatar">
            <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="John Smith">
        </div>
        <div class="user-info">
            <div class="user-name">{{Auth::user()?->name}}</div>
            <div class="user-role">{{Auth::user()?->type}}</div>
        </div>
    </div>
</div>