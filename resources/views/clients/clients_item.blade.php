<tr id="userRow{{$client->id}}">
    <td class="center"><p id="clientId{{$client->id}}">{{$client->id}}</p></td>
    </td>
    <td class="center"><p
            id="clientName{{$client->id}}">{{$client->client_Name}}</p></td>
    <td class="center"><p
            id="clientUnit{{$client->id}}">{{$client->client_Unit}}</p></td>
    <td class="center"><p
            id="clientAddress{{$client->id}}">{{$client->client_Address}}</p>
    </td>
    <td class="center"><p
            id="clientNotes{{$client->id}}">{{$client->notes}}</p></td>

             <td class="center"><p
            id="clientType{{$client->id}}">{{$client->type}}</p></td>
    <td class="center">
        <div class="visible-md visible-lg hidden-sm hidden-xs">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <a id="editClient" class="btn btn-xs btn-blue tooltips"
               data-placement="top"
               data-original-title="Edit" data-client-id="{{$client->id}}"><i
                    class="fa fa-edit"></i></a>
            <a id="deleteClient" data-client-id="{{$client->id}}"
               class="btn btn-xs btn-red tooltips" data-placement="top"
               data-original-title="Remove"><i
                    class="fa fa-times fa fa-white"></i></a>
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
