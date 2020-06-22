<tr>
    <td class="hidden-xs center">{{$result->id}}</td>
    <td class="hidden-xs center">{{$result->client_Name}}</td>
    <td class="hidden-xs center">{{$result->invetation_num}}</td>
    <td class="hidden-xs center">{{$result->court}}</td>
    <td class="hidden-xs center">
        <div class="visible-md visible-lg hidden-sm hidden-xs">
            <a class="btn btn-light-blue tooltips" data-placement="top" id="showCaseData"
               data-case-id="{{$result->id}}"
               data-original-title="Edit"><i class="fa fa-edit"></i></a>
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
                </ul>
            </div>
        </div>
    </td>
</tr>
