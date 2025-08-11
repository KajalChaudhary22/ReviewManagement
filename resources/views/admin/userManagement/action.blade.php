
<div class="action-buttons">
    <button class="action-btn view" data-id="{{ custom_encrypt($data?->id) }}">
        <i class="fa fa-eye"></i> View
    </button>
    <button class="action-btn edit" data-id="{{ custom_encrypt($data?->id) }}">
        <i class="fa fa-edit"></i> Edit
    </button>
    {!! \App\Helpers\Helpers::statusActionButton($data?->id, $data?->userDetails?->status) !!}
    {{-- @if($data?->userDetails?->status == "Active")
    <button class="action-btn delete" data-id="{{ custom_encrypt($data?->id) }}" data-status="Suspended">
        <i class="fa fa-trash"></i> Suspend
    </button>
    @elseif($data?->userDetails?->status == "Suspended")
    <button class="action-btn delete" data-id="{{ custom_encrypt($data?->id) }}" data-status="Active">
        <i class="fa fa-trash"></i> Activate
    </button>
    @elseif($data?->userDetails?->status == "Pending")
    <button class="action-btn delete" data-id="{{ custom_encrypt($data?->id) }}" data-status="Rejected">
        <i class="fa fa-trash"></i> Rejected
    </button>
    @endif --}}
</div>
