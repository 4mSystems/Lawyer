<tr class="text-dark" id="userRow{{$note->id}}">
   
    @if ($note->status == "لا")
        <td class="hidden-xs center">
            <p class="btn btn-lg" data-notes-id="{{$note->id}}" id="change-note-status">
                <span class="label label-danger" id="status{{$note->id}}"> {{$note->status}}</span>

            </p>
        </td>
    @else
        <td class="hidden-xs center">
            <p class="btn btn-lg" data-notes-id="{{$note->id}}" id="change-note-status">
                <span class="label label-success" id="status{{$note->id}}"> {{$note->status}}</span>

            </p>
        </td>
    @endif
     <td class="hidden-xs center" id="note{{$note->id}}">{{$note->note}}</td>
    <td class="hidden-xs center" id="id{{$note->id}}">{{$note->id}}</td>
</tr>
