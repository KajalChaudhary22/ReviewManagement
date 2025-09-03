<div class="sidebar">
    <div class="sidebar-header">
        <a href="#" class="text-xl md:text-2xl font-bold"><img src="{{ asset('build/images/logo.jpg') }}" alt="logo" width="200" height="60"></a>
    </div>
    <div class="menu">
        <a href="{{ route('business.dashboard.show',['ty'=>custom_encrypt('BusinessDashboard')]) }}"><div class="menu-item {{ Route::is('business.dashboard.show') ? 'active' : '' }}" data-content="dashboard">
            <i class="icon">📊</i>
            <span class="menu-text">Dashboard</span>
        </div></a>
        <a href="{{route('business.profile.edit',['ty'=> custom_encrypt('UpdateBusinessProfile')])}}"><div class="menu-item {{ Route::is('business.profile.edit') ? 'active' : '' }}" data-content="profile">
            <i class="icon">👤</i>
            <span class="menu-text">Profile Management</span>
        </div></a>
        <a href="{{ route('business.product.list',['ty'=> custom_encrypt('BusinessProductList')]) }}"><div class="menu-item {{ Route::is('business.product.list') ? 'active' : '' }}" data-content="products">
            <i class="icon">💊</i>
            <span class="menu-text">Products & Services</span>
        </div></a>
        <a href="{{ route('business.inquiries.list',['ty'=> custom_encrypt('InquiriesProductList')]) }}"><div class="menu-item {{ Route::is('business.inquiries.list') ? 'active' : '' }}" data-content="inquiries">
            <i class="icon">📩</i>
            <span class="menu-text">Inquiries</span>
        </div></a>
        <a href="{{ route('business.reviews.list',['ty'=> custom_encrypt('ReviewsList')]) }}"><div class="menu-item {{ Route::is('business.reviews.list') ? 'active' : '' }}" data-content="reviews">
            <i class="icon">⭐</i>
            <span class="menu-text">Reviews</span>
        </div></a>
        <a href="{{ route('business.analytics',['ty'=> custom_encrypt('AnalyticsList')]) }}"><div class="menu-item {{ Route::is('business.analytics') ? 'active' : '' }}" data-content="analytics">
            <i class="icon">📈</i>
            <span class="menu-text">Analytics</span>
        </div></a>
        <a href="{{ route('business.settings',['ty'=> custom_encrypt('BusinessSetting')]) }}"><div class="menu-item {{ Route::is('business.settings') ? 'active' : '' }}" data-content="settings">
            <i class="icon">⚙️</i>
            <span class="menu-text">Settings</span>
        </div></a>
    </div>
</div>