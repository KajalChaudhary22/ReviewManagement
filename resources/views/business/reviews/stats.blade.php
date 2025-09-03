{{-- <div class="stats-cards">
    <div class="stat-card">
        <div class="stat-title">Total Reviews</div>
        <div class="stat-value">156</div>
        <div class="stat-change">
            <i class="icon">↑</i> 18% from last month
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-title">Average Rating</div>
        <div class="stat-value">4.7</div>
        <div class="stat-change">
            <i class="icon">↑</i> 0.2 from last month
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-title">5-Star Reviews</div>
        <div class="stat-value">112</div>
        <div class="stat-change">
            <i class="icon">↑</i> 24 from last month
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-title">Response Rate</div>
        <div class="stat-value">92%</div>
        <div class="stat-change">
            <i class="icon">↑</i> 5% from last month
        </div>
    </div>
</div> --}}

<div class="stats-cards">
    <div class="stat-card">
        <div class="stat-title">Total Reviews</div>
        <div class="stat-value">{{ $stats['total']['value'] }}</div>
        <div class="stat-change">
            <i class="icon">{{ $stats['total']['change'] >= 0 ? '↑' : '↓' }}</i>
            {{ $stats['total']['change'] }}% from last month
        </div>
    </div>

    <div class="stat-card">
        <div class="stat-title">Average Rating</div>
        <div class="stat-value">{{ $stats['average']['value'] }}</div>
        <div class="stat-change">
            <i class="icon">{{ $stats['average']['change'] >= 0 ? '↑' : '↓' }}</i>
            {{ $stats['average']['change'] }} from last month
        </div>
    </div>

    <div class="stat-card">
        <div class="stat-title">5-Star Reviews</div>
        <div class="stat-value">{{ $stats['fiveStar']['value'] }}</div>
        <div class="stat-change">
            <i class="icon">{{ $stats['fiveStar']['change'] >= 0 ? '↑' : '↓' }}</i>
            {{ $stats['fiveStar']['change'] }} from last month
        </div>
    </div>

    <div class="stat-card">
        <div class="stat-title">Response Rate</div>
        <div class="stat-value">{{ $stats['responseRate']['value'] }}%</div>
        <div class="stat-change">
            <i class="icon">{{ $stats['responseRate']['change'] >= 0 ? '↑' : '↓' }}</i>
            {{ $stats['responseRate']['change'] }}% from last month
        </div>
    </div>
</div>
