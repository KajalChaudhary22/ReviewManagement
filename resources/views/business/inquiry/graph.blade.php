<div class="stats-cards">
    <div class="stat-card">
        <div class="stat-title">Total Inquiries</div>
        <div class="stat-value">{{ $total }}</div>
        <div class="stat-change">
            <i class="icon">↑</i> {{ $growthTotal }}% from last month
        </div>
    </div>

    <div class="stat-card">
    <div class="stat-title">Active Inquiries</div>
    <div class="stat-value">{{ $active }}</div>
    <div class="stat-change">
        <i class="icon">{{ $growthActive >= 0 ? '↑' : '↓' }}</i>
        {{ abs($growthActive) }}% from last month
    </div>
</div>

<div class="stat-card">
    <div class="stat-title">Completed</div>
    <div class="stat-value">{{ $completed }}</div>
    <div class="stat-change">
        <i class="icon">{{ $growthCompleted >= 0 ? '↑' : '↓' }}</i>
        {{ abs($growthCompleted) }}% from last month
    </div>
</div>

    <div class="stat-card">
        <div class="stat-title">Avg. Response Time</div>
        {{-- <div class="stat-value">{{ $avgResponseHours }}h</div> --}}
        <div class="stat-change">
            <i class="icon">↓</i> 1.3h faster
        </div>
    </div>
</div>
