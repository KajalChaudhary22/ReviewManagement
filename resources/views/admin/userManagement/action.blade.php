
<div class="action-buttons">
    <button class="action-btn view" data-id="{{ custom_encrypt($data?->id) }}">
        <i class="fa fa-eye"></i> View
    </button>
    <button class="action-btn edit" data-id="{{ custom_encrypt($data?->id) }}">
        <i class="fa fa-edit"></i> Edit
    </button>
    @if($data?->userDetails?->status == "Active")
    <button class="action-btn delete" data-id="{{ custom_encrypt($data?->id) }}">
        <i class="fa fa-trash"></i> Delete
    </button>
    @elseif($data?->userDetails?->status == "Suspended")
    <button class="action-btn delete" data-id="{{ custom_encrypt($data?->id) }}">
        <i class="fa fa-trash"></i> Activate
    </button>
    @endif
</div>
