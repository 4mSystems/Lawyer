<tr id="userRow{{$mohdar->moh_Id}}">
    <td class="center">
        <div class="visible-md visible-lg hidden-sm hidden-xs">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <a id="editMohdar" class="btn btn-xs btn-blue tooltips" data-placement="top"
               data-original-title="Edit" data-moh-Id="{{$mohdar->moh_Id}}"><i class="fa fa-edit"></i></a>
            <a id="deleteMohadr" data-moh-Id="{{$mohdar->moh_Id}}" class="btn btn-xs btn-red tooltips"
               data-placement="top"
               data-original-title="Remove"><i class="fa fa-times fa fa-white"></i></a>
            <a id="showMohdar" class="btn btn-xs btn-blue tooltips" data-placement="top"
               data-original-title="show" data-moh-Id="{{$mohdar->moh_Id}}"><i class="fa fa-eye-slash"></i></a>
        </div>
        <div class="visible-xs visible-sm hidden-md hidden-lg">
            <div class="btn-group">
                <a class="btn btn-green dropdown-toggle btn-sm"
                   data-toggle="dropdown" href="#">
                    <i class="fa fa-cog"></i> <span class="caret"></span>
                </a>
                <ul role="menu" class="dropdown-menu pull-right dropdown-dark">
                    <li>
                        <a role="menuitem" tabindex="-1">
                            <i class="fa fa-edit"></i> Edit
                        </a>
                    </li>

                    <li>
                        <a role="menuitem" tabindex="-1" href="#">
                            <i class="fa fa-times"></i> Remove
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </td>
    @if($mohdar->status =='لا')
        <td class="hidden-xs">
            <p class="btn btn-lg" data-moh-Id="{{$mohdar->moh_Id}}">
                <span class="label label-danger" id="status{{$mohdar->moh_Id}}"> {{$mohdar->status}}</span>

            </p>
        </td>
    @else
        <td class="hidden-xs">
            <p class="btn btn-lg" data-moh-Id="{{$mohdar->moh_Id}}" >
                    <span class="label label-success" id="status{{$mohdar->moh_Id}}"> {{$mohdar->status}}</span>
                </p>

        </td>
    @endif
    <td class="hidden-xs"><p id="session_Date{{$mohdar->moh_Id}}">{{$mohdar->session_Date}}</p></td>
    <td class="hidden-xs"><p id="paper_Number{{$mohdar->moh_Id}}">{{$mohdar->paper_Number}}</p></td>
    <td class="hidden-xs"><p id="deliver_data{{$mohdar->moh_Id}}">{{$mohdar->deliver_data}}</p></td>
    <td><p id="paper_type{{$mohdar->moh_Id}}">{{$mohdar->paper_type}}</p></td>
    <td><p id="court_mohdareen{{$mohdar->moh_Id}}">{{$mohdar->court_mohdareen}}</p></td>
    <td class="center"><p id="moh_Id{{$mohdar->moh_Id}}">{{$mohdar->moh_Id}}</p></td>


</tr>

