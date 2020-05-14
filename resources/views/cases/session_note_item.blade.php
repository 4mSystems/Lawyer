<tr class="text-dark" id="userRow{{$note->id}}">
    <td class="hidden-xs center">
        <div class="visible-md visible-lg hidden-sm hidden-xs">
            <a class="btn btn-light-blue tooltips" data-placement$note="top" id="editNote"
               data-notes-id="{{$note->id}}"
               data-original-title="Edit"><i class="fa fa-edit"></i></a>
            <a class="btn btn-red tooltips" data-placement="top" id="deleteNote"
               data-notes-id="{{$note->id}}"
               data-original-title="Remove"><i
                    class="fa fa-times fa fa-white"></i></a>

        </div>
        <div class="visible-xs visible-sm hidden-md hidden-lg">
            <div class="btn-group">
                <a class="btn btn-green dropdown-toggle btn-sm"
                   data-toggle="dropdown" href="#">
                    <i class="fa fa-cog"></i> <span class="caret"></span>
                </a>
                <ul role="menu" class="dropdown-menu dropdown-dark pull-right">
                    <li role="presentation">
                        <a role="menuitem" tabindex="-1" href="#">
                            <i class="fa fa-edit"></i> Edit
                        </a>
                    </li>
                    <li role="presentation">
                        <a role="menuitem" tabindex="-1" href="#">
                            <i class="fa fa-times"></i> Remove
                        </a>
                    </li>

                </ul>
            </div>
        </div>
    </td>
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
    <td class="hidden-xs center" id="updatedBy{{$note->id}}">{{$note->updated_by}}</td>
    <td class="hidden-xs center" id="note{{$note->id}}">{{$note->note}}</td>
    <td class="hidden-xs center" id="id{{$note->id}}">{{$note->id}}</td>
</tr>
