{{-- <div class="stats-cards">
    <div class="stat-card">
        <div class="stat-title">Total Products</div>
        <div class="stat-value">124</div>
        <div class="stat-change">
            <i class="icon">↑</i> 12% from last month
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-title">Active Inquiries</div>
        <div class="stat-value">35</div>
        <div class="stat-change">
            <i class="icon">↑</i> 5% from last month
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-title">New Reviews</div>
        <div class="stat-value">28</div>
        <div class="stat-change">
            <i class="icon">↑</i> 8% from last month
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-title">Profile Views</div>
        <div class="stat-value">1,254</div>
        <div class="stat-change">
            <i class="icon">↑</i> 22% from last month
        </div>
    </div>
</div> --}}


<div class="stats-cards">
    <div class="stat-card">
        <div class="stat-title">Total Products</div>
        <div class="stat-value">{{ $data['products']['total'] }}</div>
        <div class="stat-change {{ $data['products']['change'] >= 0 ? 'text-green' : 'text-red' }}">
            <i class="icon">{{ $data['products']['change'] >= 0 ? '↑' : '↓' }}</i>
            {{ abs($data['products']['change']) }}% from last month
        </div>
    </div>

    <div class="stat-card">
        <div class="stat-title">Active Inquiries</div>
        <div class="stat-value">{{ $data['inquiries']['total'] }}</div>
        <div class="stat-change {{ $data['inquiries']['change'] >= 0 ? 'text-green' : 'text-red' }}">
            <i class="icon">{{ $data['inquiries']['change'] >= 0 ? '↑' : '↓' }}</i>
            {{ abs($data['inquiries']['change']) }}% from last month
        </div>
    </div>

    <div class="stat-card">
        <div class="stat-title">New Reviews</div>
        <div class="stat-value">{{ $data['reviews']['total'] }}</div>
        <div class="stat-change {{ $data['reviews']['change'] >= 0 ? 'text-green' : 'text-red' }}">
            <i class="icon">{{ $data['reviews']['change'] >= 0 ? '↑' : '↓' }}</i>
            {{ abs($data['reviews']['change']) }}% from last month
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-title">Profile Views</div>
        <div class="stat-value">1,254</div>
        <div class="stat-change">
            <i class="icon">↑</i> 22% from last month
        </div>
    </div>

    {{-- <div class="stat-card">
        <div class="stat-title">Profile Views</div>
        <div class="stat-value">{{ $data['views']['total'] }}</div>
        <div class="stat-change {{ $data['views']['change'] >= 0 ? 'text-green' : 'text-red' }}">
            <i class="icon">{{ $data['views']['change'] >= 0 ? '↑' : '↓' }}</i>
            {{ abs($data['views']['change']) }}% from last month
        </div>
    </div> --}}
</div>
