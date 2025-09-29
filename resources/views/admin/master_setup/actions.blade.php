<div class="action-buttons">
    <a href="{{ route('admin.masterSetup.Add',['ty'=>custom_encrypt('MasterSetupAdd'),'id' => custom_encrypt($row?->id)]) }}" ><button class="action-btn edit">Edit</button></a>
    <button class="action-btn delete-master" data-id="{{ custom_encrypt($row?->id) }}">Delete</button>
</div>