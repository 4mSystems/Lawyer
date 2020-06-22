<tr id="userRow{{$mohdar->moh_Id}}">
    <td class="hidden-xs center"><p id="moh_Id{{$mohdar->moh_Id}}">{{$mohdar->moh_Id}}</p></td>
    <td class="hidden-xs center"><p id="paper_type{{$mohdar->moh_Id}}">{{$mohdar->mokel_Name}}</p></td>
    <td class="hidden-xs center"><p id="deliver_data{{$mohdar->moh_Id}}">{{$mohdar->khesm_Name}}</p></td>
    <td class="hidden-xs center"><p id="paper_Number{{$mohdar->moh_Id}}">{{$mohdar->paper_Number}}</p></td>
    <td class="hidden-xs center"><p id="court_mohdareen{{$mohdar->moh_Id}}">{{$mohdar->court_mohdareen}}</p></td>
    <td class="hidden-xs center"><p id="session_Date{{$mohdar->moh_Id}}">{{$mohdar->session_Date}}</p></td>
    @if($mohdar->status =='لا')
        <td class="hidden-xs center">
            <p class="btn btn-lg" data-moh-Id="{{$mohdar->moh_Id}}">
                <span class="label label-danger" id="status{{$mohdar->moh_Id}}"> {{$mohdar->status}}</span>

            </p>
        </td>
    @else
        <td class="hidden-xs center">
            <p class="btn btn-lg" data-moh-Id="{{$mohdar->moh_Id}}">
                <span class="label label-success" id="status{{$mohdar->moh_Id}}"> {{$mohdar->status}}</span>
            </p>

        </td>
    @endif
    <td class="center">
        <div class="visible-md visible-lg hidden-sm hidden-xs">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <a id="editMohdar" class="btn btn-xs btn-blue tooltips" data-placement="top"
               data-original-title="{{trans('site_lang.public_edit_btn_text')}}" data-moh-Id="{{$mohdar->moh_Id}}"><i
                    class="fa fa-edit"></i></a>
            <a id="deleteMohadr" data-moh-Id="{{$mohdar->moh_Id}}" class="btn btn-xs btn-red tooltips"
               data-placement="top"
               data-original-title="{{trans('site_lang.public_delete_text')}}"><i
                    class="fa fa-times fa fa-white"></i></a>
            <a id="showMohdar" class="btn btn-xs btn-blue tooltips" data-placement="top"
               data-original-title="{{trans('site_lang.home_see_more')}}" data-moh-Id="{{$mohdar->moh_Id}}"><i
                    class="fa fa-eye-slash"></i></a>
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
                            <i class="fa fa-edit"></i> {{trans('site_lang.public_edit_btn_text')}}
                        </a>
                    </li>

                    <li>
                        <a role="menuitem" tabindex="-1" href="#">
                            <i class="fa fa-times"></i> {{trans('site_lang.public_delete_text')}}
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </td>
</tr>

