<div class="table-container">
    <div class="table-header">
        <h2 class="section-title">Recent Inquiries</h2>
        <a href="{{ route('business.inquiries.list',['ty'=> custom_encrypt('InquiriesProductList')]) }}" class="view-all">View All</a>
    </div>
    <table>
        <thead>
            <tr>
                <th>Date</th>
                <th>Company</th>
                <th>Product</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($recentInquiries as $inquiry)
            <tr>
                <td>{{ $inquiry->created_at->format('d M Y') }}</td>
                <td>{{ $inquiry->businessDetails?->name }}</td>
                <td>{{ $inquiry->productDetails?->name }}</td>
                <td>{!! App\Helpers\Helpers::showStatus($inquiry?->status) !!}</td>
            </tr>
            @endforeach
            
        </tbody>
    </table>
</div>