<tr class="text-dark" id="userRow{{$client->id}}">
    <td class="hidden-xs center" id="id{{$client->id}}">{{$client->id}}</td>
    <td class="hidden-xs center" id="client_name{{$client->id}}">{{$client->client_Name}}</td>
    <td class="hidden-xs center">
        <div class="visible-md visible-lg hidden-sm hidden-xs">

            <a class="btn btn-red tooltips" data-placement="top" id="deleteSession"
               data-mokel-id="{{$client->id}}"
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
                            <i class="fa fa-times"></i> Remove
                        </a>
                    </li>

                </ul>
            </div>
        </div>
    </td>
</tr>
