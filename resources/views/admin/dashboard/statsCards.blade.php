

<div class="stats-cards">
    <div class="stat-card">
        <div class="stat-icon">👥</div>
        <div class="stat-title">Total Users</div>
        <div class="stat-value">{{ number_format($total_users) }}</div>
        <div class="stat-change {{ $users_change >= 0 ? 'positive' : 'negative' }}">
            <i class="icon">{{ $users_change >= 0 ? '↑' : '↓' }}</i> {{ abs($users_change) }}% from last month
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon">🏢</div>
        <div class="stat-title">Active Businesses</div>
        <div class="stat-value">{{ number_format($active_businesses) }}</div>
        <div class="stat-change {{ $business_change >= 0 ? 'positive' : 'negative' }}">
            <i class="icon">{{ $business_change >= 0 ? '↑' : '↓' }}</i> {{ abs($business_change) }}% from last month
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon">📝</div>
        <div class="stat-title">Pending Reviews</div>
        <div class="stat-value">{{ number_format($pending_reviews) }}</div>
        <div class="stat-change {{ $reviews_change >= 0 ? 'positive' : 'negative' }}">
            <i class="icon">{{ $reviews_change >= 0 ? '↑' : '↓' }}</i> {{ abs($reviews_change) }}% from last month
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon">💰</div>
        <div class="stat-title">Monthly Revenue</div>
        <div class="stat-value">$128.5K</div>
        <div class="stat-change positive">
            <i class="icon">↑</i> 22% from last month
        </div>
    </div>
</div>
