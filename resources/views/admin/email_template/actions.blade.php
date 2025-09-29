<td>
    <div class="action-buttons">
        {{-- <button class="action-btn view" data-id="{{ $row->id }}">View</button> --}}
        <button class="action-btn edit" data-id="{{ encrypt($row->id) }}" data-eventname="{{ $row?->event_name }}" data-subject="{{ $row?->subject }}"
            data-body="{{ $row?->body }}" data-variables="{{ $row?->variables }}">Edit</button>
        {{-- <button class="action-btn suspend" data-id="{{ $row->id }}">Delete</button> --}}
    </div>
</td>