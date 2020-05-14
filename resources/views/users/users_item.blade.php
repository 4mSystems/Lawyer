<tr id="userRow{{$user->id}}" >
    <td class="center"><p id="userId{{$user->id}}">{{$user->id}}</p></td>
    </td>
    <td ><p id="userName{{$user->id}}">{{$user->name}}</p></td>
    <td ><p id="userEmail{{$user->id}}">{{$user->email}}</p></td>
    <td class="hidden-xs" ><p id="userType{{$user->id}}">{{$user->type}}</p></td>

    <td class="center">
        <div class="visible-md visible-lg hidden-sm hidden-xs">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <a id="editUser" class="btn btn-xs btn-blue tooltips" data-placement="top"
               data-original-title="Edit" data-user-id="{{$user->id}}"><i class="fa fa-edit"></i></a>
            <a id="deleteUser" data-user-id="{{$user->id}}" class="btn btn-xs btn-red tooltips" data-placement="top"
               data-original-title="Remove"><i class="fa fa-times fa fa-white"></i></a>
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
</tr>

