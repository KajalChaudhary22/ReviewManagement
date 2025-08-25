<div class="sidebar">
    <div class="sidebar-header">
        <a href="#" class="text-xl md:text-2xl font-bold"><img src="{{ asset('build/images/logo.jpg') }}" alt="logo" width="200" height="60"></a>
    </div>
    <div class="menu">
        <a href="Dashboard.html"><div class="menu-item active" data-content="dashboard">
            <i class="icon">📊</i>
            <span class="menu-text">Dashboard</span>
        </div></a>
        <a href="{{route('business.profile.edit',['ty'=> custom_encrypt('UpdateBusinessProfile')])}}"><div class="menu-item" data-content="profile">
            <i class="icon">👤</i>
            <span class="menu-text">Profile Management</span>
        </div></a>
        <a href="Products-&-Services.html"><div class="menu-item" data-content="products">
            <i class="icon">💊</i>
            <span class="menu-text">Products & Services</span>
        </div></a>
        <a href="Inquiries.html"><div class="menu-item" data-content="inquiries">
            <i class="icon">📩</i>
            <span class="menu-text">Inquiries</span>
        </div></a>
        <a href="Reviews.html"><div class="menu-item" data-content="reviews">
            <i class="icon">⭐</i>
            <span class="menu-text">Reviews</span>
        </div></a>
        <a href="Analytics.html"><div class="menu-item" data-content="analytics">
            <i class="icon">📈</i>
            <span class="menu-text">Analytics</span>
        </div></a>
        <a href="Settings.html"><div class="menu-item" data-content="settings">
            <i class="icon">⚙️</i>
            <span class="menu-text">Settings</span>
        </div></a>
    </div>
</div>