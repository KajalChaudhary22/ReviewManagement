<td>
    <div class="action-buttons">
        {{-- <button class="action-btn edit" data-id="{{ custom_encrypt($row->id) }}" data-eventname="{{ $row?->event_name }}" data-subject="{{ $row?->subject }}"
            data-body="{{ $row?->body }}" data-variables="{{ $row?->variables }}">Edit</button> --}}
            <a href="{{ route("admin.emailTemplate.edit",['id'=> custom_encrypt($row->id),'ty' => custom_encrypt('EmailTemplateEdit')]) }}"><button class="action-btn">Edit </button></a>
        
    </div>
</td>