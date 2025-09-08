<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Analytics & Reports - SCIZORA-Admin</title>

    @include('admin.layouts.styles')
</head>

<body>
    <!-- Sidebar -->
    @include('admin.layouts.sidebar')

    <!-- Main Content -->
    <div class="main-content">
        <!-- Navbar -->
        @include('admin.layouts.navbar')

        <!-- Content Area -->
        <div class="content">
            <!-- Dashboard Content -->
            <div id="analytics-content" class="content-section">
                <div class="content-header">
                    <h1 class="page-title">Analytics & Reports</h1>
                    <div style="display: flex; gap: 10px; flex-wrap: wrap;">
                        <button class="btn btn-primary" id="generateReportBtn2">
                            <i class="icon">📄</i> Generate Report
                        </button>

                    </div>
                </div>

                <!-- Date Range Selector -->
                <div class="table-container mb-20">
                    <div style="padding: 15px; display: grid; grid-template-columns: 1fr; gap: 15px;">
                        <div class="form-group">
                            <label class="form-label">Date Range</label>
                            <select class="form-control" id="dateRange">
                                <option value="7">Last 7 Days</option>
                                <option value="30" selected>Last 30 Days</option>
                                <option value="90">Last 90 Days</option>
                                <option value="365">This Year</option>
                                <option value="custom">Custom Range</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label">From Date</label>
                            <input type="date" class="form-control" id="fromDate" disabled>
                        </div>
                        <div class="form-group">
                            <label class="form-label">To Date</label>
                            <input type="date" class="form-control" id="toDate" disabled>
                        </div>
                    </div>
                    <div class="apply-filters">
                        <button class="btn btn-primary" id="applyAnalyticsFilters">Apply Filters</button>
                    </div>
                </div>

                <!-- Key Metrics -->
                <div class="stats-cards mb-20">
                    <div class="stat-card">
                        <div class="stat-icon">👥</div>
                        <div class="stat-title">New Users</div>
                        <div class="stat-value">{{ $totalCustomers }}</div>
                        <div class="stat-change {{ $customerChange >= 0 ? 'positive' : 'negative' }}">
                            <i class="icon">{{ $customerChange >= 0 ? '↑' : '↓' }}</i>
                            {{ abs($customerChange) }}% from last period
                        </div>
                    </div>

                    <div class="stat-card">
                        <div class="stat-icon">🏢</div>
                        <div class="stat-title">New Businesses</div>
                        <div class="stat-value">{{ $totalBusinesses }}</div>
                        <div class="stat-change {{ $businessChange >= 0 ? 'positive' : 'negative' }}">
                            <i class="icon">{{ $businessChange >= 0 ? '↑' : '↓' }}</i>
                            {{ abs($businessChange) }}% from last period
                        </div>
                    </div>

                    <div class="stat-card">
                        <div class="stat-icon">⭐</div>
                        <div class="stat-title">New Reviews</div>
                        <div class="stat-value">{{ $totalReviews }}</div>
                        <div class="stat-change {{ $reviewChange >= 0 ? 'positive' : 'negative' }}">
                            <i class="icon">{{ $reviewChange >= 0 ? '↑' : '↓' }}</i>
                            {{ abs($reviewChange) }}% from last period
                        </div>
                    </div>

                    <div class="stat-card">
                        <div class="icon">💰</div>
                        <div class="stat-title">Revenue</div>
                        <div class="stat-value" id="revenueCount">$42,380</div>
                        <div class="stat-change positive">
                            <i class="icon">↑</i> <span id="revenueChange">15</span>% from last period
                        </div>
                    </div>
                </div>

                <!-- User Growth Chart -->
                {{-- <div class="chart-container">
                    <div class="chart-header">
                        <h2 class="chart-title">User Growth</h2>
                        <div class="chart-actions">
                            <button class="btn btn-secondary btn-sm" data-chart="user-daily">Daily</button>
                            <button class="btn btn-secondary btn-sm" data-chart="user-weekly">Weekly</button>
                            <button class="btn btn-primary btn-sm" data-chart="user-monthly">Monthly</button>
                        </div>
                    </div>
                    <div class="chart-placeholder">
                        <div class="chart" id="userChart">
                            <div class="chart-bars">
                                <div class="chart-bar-container">
                                    <div class="chart-bar" style="height: 30%;">
                                        <span class="chart-bar-value">75</span>
                                    </div>
                                    <div class="chart-bar-label">Jan</div>
                                </div>
                                <div class="chart-bar-container">
                                    <div class="chart-bar" style="height: 45%;">
                                        <span class="chart-bar-value">112</span>
                                    </div>
                                    <div class="chart-bar-label">Feb</div>
                                </div>
                                <div class="chart-bar-container">
                                    <div class="chart-bar" style="height: 60%;">
                                        <span class="chart-bar-value">150</span>
                                    </div>
                                    <div class="chart-bar-label">Mar</div>
                                </div>
                                <div class="chart-bar-container">
                                    <div class="chart-bar" style="height: 75%;">
                                        <span class="chart-bar-value">187</span>
                                    </div>
                                    <div class="chart-bar-label">Apr</div>
                                </div>
                                <div class="chart-bar-container">
                                    <div class="chart-bar" style="height: 90%;">
                                        <span class="chart-bar-value">225</span>
                                    </div>
                                    <div class="chart-bar-label">May</div>
                                </div>
                                <div class="chart-bar-container">
                                    <div class="chart-bar" style="height: 100%;">
                                        <span class="chart-bar-value">247</span>
                                    </div>
                                    <div class="chart-bar-label">Jun</div>
                                </div>
                            </div>
                            <div class="chart-x-axis">
                                <span>Monthly User Growth (Last 6 Months)</span>
                            </div>
                        </div>
                    </div>
                </div> --}}

                <!-- User Growth Chart -->
                <div class="chart-container">
                    <div class="chart-header">
                        <h2 class="chart-title">User Growth</h2>
                        <div class="chart-actions">
                            <button class="btn btn-secondary btn-sm" data-chart="daily">Daily</button>
                            <button class="btn btn-secondary btn-sm" data-chart="weekly">Weekly</button>
                            <button class="btn btn-primary btn-sm" data-chart="monthly">Monthly</button>
                        </div>
                    </div>
                    <div class="chart-placeholder">
                        <div class="chart" id="userChart">

                            {{-- Monthly (default) --}}
                            <div class="chart-bars" id="chart-monthly">
                                @php $max = collect($customerMonthly)->max('count') ?: 1; @endphp
                                @foreach ($customerMonthly as $row)
                                    <div class="chart-bar-container">
                                        <div class="chart-bar" style="height: {{ ($row['count'] / $max) * 100 }}%;">
                                            <span class="chart-bar-value">{{ $row['count'] }}</span>
                                        </div>
                                        <div class="chart-bar-label">
                                            {{ \Carbon\Carbon::parse($row['month'] . '-01')->format('M') }}
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            {{-- Daily --}}
                            <div class="chart-bars hidden" id="chart-daily">
                                @php $max = $customerDaily->max('count') ?: 1; @endphp
                                @foreach ($customerDaily as $row)
                                    <div class="chart-bar-container">
                                        <div class="chart-bar" style="height: {{ ($row->count / $max) * 100 }}%;">
                                            <span class="chart-bar-value">{{ $row->count }}</span>
                                        </div>
                                        <div class="chart-bar-label">{{ \Carbon\Carbon::parse($row->date)->format('d M') }}
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            {{-- Weekly --}}
                            <div class="chart-bars hidden" id="chart-weekly">
                                @php $max = $customerWeekly->max('count') ?: 1; @endphp
                                @foreach ($customerWeekly as $row)
                                    <div class="chart-bar-container">
                                        <div class="chart-bar" style="height: {{ ($row->count / $max) * 100 }}%;">
                                            <span class="chart-bar-value">{{ $row->count }}</span>
                                        </div>
                                        <div class="chart-bar-label">W{{ $row->week }}</div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Review Activity Chart -->
                <div class="chart-container">
                    <div class="chart-header">
                        <h2 class="chart-title">Review Activity</h2>
                        <div class="chart-actions">
                            <button class="btn btn-secondary btn-sm">By Rating</button>
                            <button class="btn btn-secondary btn-sm">By Category</button>
                            <button class="btn btn-primary btn-sm">Over Time</button>
                        </div>
                    </div>

                    <div class="chart-placeholder flex items-center gap-6">

                        @php
                            // Define colors by rating
                            $ratingColors = [
                                5 => '#4A89DC', // Blue
                                4 => '#5D9CEC', // Light Blue
                                3 => '#48CFAD', // Teal
                                2 => '#A0D468', // Green
                                1 => '#FFCE54', // Yellow/Orange
                            ];

                            // Build gradient dynamically
                            $gradientParts = [];
                            $currentPercent = 0;

                            foreach ($reviewData as $review) {
                                $color = $ratingColors[$review['rating']] ?? '#ccc';
                                $nextPercent = $currentPercent + $review['percentage'];
                                $gradientParts[] = "{$color} {$currentPercent}% {$nextPercent}%";
                                $currentPercent = $nextPercent;
                            }

                            $gradientString = implode(',', $gradientParts);
                        @endphp

                        <!-- CSS Pie -->
                        <div class="pie-chart" style="background: conic-gradient({{ $gradientString }});">
                            <div class="pie-chart-center">{{ $totalReviews }}</div>
                        </div>

                        <!-- Legend -->
                        <div class="chart-legend">
                            @foreach ($reviewData as $review)
                                <div class="chart-legend-item">
                                    <div class="chart-legend-color"
                                        style="background-color: {{ $ratingColors[$review['rating']] ?? '#ccc' }};">
                                    </div>
                                    <span>{{ $review['rating'] }} Stars ({{ $review['percentage'] }}%)</span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Business Metrics -->
                <div class="chart-container">
                    <div class="chart-header">
                        <h2 class="chart-title">Business Metrics</h2>
                        <div class="chart-actions">
                            <button class="btn btn-secondary btn-sm" data-chart="business-type">By Type</button>
                            <button class="btn btn-secondary btn-sm" data-chart="business-location">By Location</button>
                            <button class="btn btn-primary btn-sm" data-chart="business-growth">Growth</button>
                        </div>
                    </div>
                    <div class="chart-placeholder">
                        <div class="chart" id="businessChart">
                            <div class="chart-bars">
                                <div class="chart-bar-container">
                                    <div class="chart-bar" style="height: 20%; background-color: #4A89DC;">
                                        <span class="chart-bar-value">25</span>
                                    </div>
                                    <div class="chart-bar-label">US</div>
                                </div>
                                <div class="chart-bar-container">
                                    <div class="chart-bar" style="height: 35%; background-color: #5D9CEC;">
                                        <span class="chart-bar-value">42</span>
                                    </div>
                                    <div class="chart-bar-label">UK</div>
                                </div>
                                <div class="chart-bar-container">
                                    <div class="chart-bar" style="height: 25%; background-color: #48CFAD;">
                                        <span class="chart-bar-value">30</span>
                                    </div>
                                    <div class="chart-bar-label">CA</div>
                                </div>
                                <div class="chart-bar-container">
                                    <div class="chart-bar" style="height: 15%; background-color: #A0D468;">
                                        <span class="chart-bar-value">18</span>
                                    </div>
                                    <div class="chart-bar-label">AU</div>
                                </div>
                                <div class="chart-bar-container">
                                    <div class="chart-bar" style="height: 10%; background-color: #FFCE54;">
                                        <span class="chart-bar-value">12</span>
                                    </div>
                                    <div class="chart-bar-label">IN</div>
                                </div>
                                <div class="chart-bar-container">
                                    <div class="chart-bar" style="height: 5%; background-color: #ED5565;">
                                        <span class="chart-bar-value">5</span>
                                    </div>
                                    <div class="chart-bar-label">Other</div>
                                </div>
                            </div>
                            <div class="chart-x-axis">
                                <span>New Businesses by Location (Last 30 Days)</span>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>

    <!-- Mobile Menu Toggle (Hidden on Desktop) -->
    <div class="menu-toggle hidden">
        <i class="icon">≡</i>
    </div>



    @include('layouts.commonjs')
    @include('admin.analyticsReports.js')
</body>

</html>
