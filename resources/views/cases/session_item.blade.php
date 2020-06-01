<tr class="text-dark" id="userRow{{$session->id}}">
    <td class="hidden-xs center" id="id{{$session->id}}">{{$session->id}}</td>
    <td class="hidden-xs center" id="session_date{{$session->id}}">{{$session->session_date}}</td>
    @if ($session->status == "waiting")
        <td class="hidden-xs center">
            <p class="btn btn-lg" data-session-id="{{$session->id}}" id="change-session-status">
                <span class="label label-danger" id="status{{$session->id}}"> {{trans('site_lang.search_case_session_waiting')}}</span>
            </p>
        </td>
    @else
        <td class="hidden-xs center">
            <p class="btn btn-lg" data-session-id="{{$session->id}}" id="change-session-status">
                <span class="label label-success" id="status{{$session->id}}"> {{trans('site_lang.search_case_session_done')}}</span>

            </p>
        </td>
    @endif

    <td class="hidden-xs center">
        <div class="visible-md visible-lg hidden-sm hidden-xs">
            <a class="btn btn-light-blue tooltips" data-placement="top" id="editSession"
               data-session-id="{{$session->id}}"
               data-original-title="{{trans('site_lang.public_edit_btn_text')}}"><i class="fa fa-edit"></i></a>
            <a class="btn btn-red tooltips" data-placement="top" id="deleteSession"
               data-session-id="{{$session->id}}"
               data-original-title="{{trans('site_lang.public_delete_text')}}"><i
                    class="fa fa-times fa fa-white"></i></a>
            <a class="btn btn-blue tooltips" data-placement="top" id="showSessionNotes"
               data-session-id="{{$session->id}}"
               data-original-title="{{trans('site_lang.home_see_more')}}"><i
                    class="fa fa-eye-slash"></i></a>
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
                            <i class="fa fa-edit"></i> {{trans('site_lang.public_edit_btn_text')}}
                        </a>
                    </li>
                    <li role="presentation">
                        <a role="menuitem" tabindex="-1" href="#">
                            <i class="fa fa-times"></i> {{trans('site_lang.public_delete_text')}}
                        </a>
                    </li>
                    <li role="presentation">
                        <a role="menuitem" tabindex="-1" href="#">
                            <i class="fa fa-eye-slash"></i> {{trans('site_lang.home_see_more')}}
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </td>
</tr>
