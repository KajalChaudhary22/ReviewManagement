
<div class="action-buttons">
    <button class="action-btn view" data-id="{{ custom_encrypt($data?->id) }}">
        <i class="fa fa-eye"></i> View
    </button>
    <button class="action-btn edit" data-id="{{ custom_encrypt($data?->id) }}">
        <i class="fa fa-edit"></i> Edit
    </button>
    {!! \App\Helpers\Helpers::statusActionButton($data?->id, $data?->userDetails?->status) !!}
   
</div>
