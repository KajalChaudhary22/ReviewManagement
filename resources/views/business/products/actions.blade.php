<div class="btn-group">
    <a href="{{ route('business.product.add',['ty' => custom_encrypt('BusinessProductAdd'),'id'=>custom_encrypt($row?->id)]) }}"><button class="btn btn-sm btn-primary edit-btn" data-id="{{ $row?->id }}">
        <i class="fas fa-edit"></i> Edit
    </button></a>
    @if ($row?->status == 'Active')
        <button class="btn btn-sm btn-danger change_status" data-id="{{ custom_encrypt($row?->id) }}">
            <i class="fas fa-trash"></i> Deactivate
        </button>
    @elseif ($row?->status == 'Inactive')
        <button class="btn btn-sm btn-success change_status" data-id="{{ custom_encrypt($row?->id) }}">
            <i class="fas fa-undo"></i> Activate
        </button>
    @endif
</div>
