@extends('welcome')
@section('styles')
    <link rel="stylesheet" href="{{url('/plugins/jQuery-Tags-Input/jquery.tagsinput.css')}}">
    <link rel="stylesheet" href="{{url('/plugins/select2/select2.css')}}">
    <link rel="stylesheet" href="{{url('/plugins/bootstrap-select/bootstrap-select.min.css')}}">
    <link rel="stylesheet" href="{{url('/plugins/datepicker/css/datepicker.css')}}">
    <link rel="stylesheet" href="{{url('/plugins/DataTables/media/css/DT_bootstrap.css')}}">
    <link href="{{url('/plugins/bootstrap-modal/css/bootstrap-modal.css') }}" rel="stylesheet" type="text/css"/>

@endsection
@section('content')
    <div class="main-container inner">
        <!-- start: PAGE -->
        <div class="main-content">
            <div class="container">
                <!-- start: PAGE HEADER -->
                <!-- start: TOOLBAR -->
                <div class="toolbar row">
                    <div class="toolbar-tools pull-right">
                        <!-- start: TOP NAVIGATION MENU -->
                        <ul class="nav navbar-right">
                            <!-- start: TO-DO DROPDOWN -->
                            <li class="menu-search">
                                <a href="#">
                                    <i class="fa fa-search"></i> {{trans('site_lang.search_case_search')}}
                                </a>
                                <!-- start: SEARCH POPOVER -->
                                <div class="popover bottom search-box transition-all">
                                    <div class="arrow"></div>
                                    <div class="popover-content">

                                    </div>
                                </div>
                                <!-- end: SEARCH POPOVER -->
                            </li>
                        </ul>
                        <!-- end: TOP NAVIGATION MENU -->
                    </div>
                </div>
                <!-- end: TOOLBAR -->
                <!-- end: PAGE HEADER -->
                <!-- start: BREADCRUMB -->
                <div class="row">
                    <div class="col-md-12">
                        <ol class="breadcrumb">
                            <li>
                                <a href="{{route('home')}}">
                                    {{trans('site_lang.side_home')}}
                                </a>
                            </li>
                            <li class="active">
                                {{trans('site_lang.side_search_case')}}
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- end: BREADCRUMB -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="panel panel-white" id="searchContainer">
                            <div class="panel-body">
                                <table class="table table-striped table-bordered table-hover" id="cases">
                                    <thead>
                                    <tr>
                                        <th class="hidden-xs center">#</th>
                                        <th class="hidden-xs center">اسم الموكل \ اسم الخصم</th>
                                        <th class="hidden-xs center">رقم الدعوى</th>
                                        <th class="hidden-xs center">المحكمة</th>
                                        <th class="hidden-xs center"></th>
                                    </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                        <div class="tabbable" id="mainContainer">
                            <ul class="nav nav-tabs tab-padding tab-space-3 tab-blue" id="myTab4">
                                <li class="active" style="float: right">
                                    <a data-toggle="tab" href="#panel_overview"
                                       class="text-large"><p
                                            class="text-bold">{{trans('site_lang.search_case_quick_view')}}</p>
                                    </a>
                                </li>
                                <li style="float: right">
                                    <a data-toggle="tab" href="#panel_edit_account" class="text-large"><p
                                            class="text-bold">{{trans('site_lang.search_case_edit')}}</p>
                                    </a>
                                </li>
                                <li style="float: right" id="session_note_tab">
                                    <a data-toggle="tab" href="#panel_sessions" class="text-large"><p class="text-bold">
                                            {{trans('site_lang.search_case_sessions')}}</p>
                                    </a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div id="panel_overview" class="tab-pane fade in active">
                                    <div class="row">
                                        <div class="col-sm-7 col-md-8">

                                            <div class="row space20">

                                                <div class="col-sm-3">
                                                    <a class="btn btn-icon btn-block pulsate" style="padding: 30px;"
                                                       id="btnPrintCase" href="" target="_blank">
                                                        <i class="clip-bubble-2"></i> {{trans('site_lang.search_case_print')}}
                                                    </a>
                                                </div>
                                                <div class="col-sm-3">
                                                    <a href="" id="attachment" class="btn btn-icon btn-block pulsate"
                                                       style="padding: 30px;">
                                                        <i class="clip-bubble-2"></i>

                                                        {{trans('site_lang.search_case_attachments')}} <span
                                                            class="badge badge-info"
                                                            id="attach_count"> </span>
                                                    </a>
                                                </div>
                                                <div class="col-sm-3">
                                                    <button class="btn btn-icon btn-block">
                                                        <i class="clip-calendar"></i>
                                                        {{trans('site_lang.mohdar_notes')}} <span
                                                            class="badge badge-info"
                                                            id="notes_count"></span>
                                                    </button>
                                                </div>
                                                <div class="col-sm-3">
                                                    <button class="btn btn-icon btn-block">
                                                        <i class="clip-list-3"></i>
                                                        {{trans('site_lang.search_case_sessions')}} <span
                                                            class="badge badge-info"
                                                            id="sessions_count"></span>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="panel panel-white" style="direction: rtl">
                                                <div class="panel-heading">
                                                    <h3 class="text-bold">{{trans('site_lang.search_case_clients')}}</h3>
                                                    <div class="btn-group pull-left">

                                                        <a class="btn btn-primary" id="addMokelModal"><i
                                                                class="fa
                                                            fa-plus">&nbsp;&nbsp;</i>{{trans('site_lang.search_case_add_client')}}
                                                        </a>
                                                    </div>
                                                    <br>
                                                </div>
                                                <div class="panel-body">
                                                    <table
                                                        class="table table-striped table-bordered table-hover table-full-width"
                                                        id="mokel_table">
                                                        <thead>
                                                        <tr>
                                                            <th class="hidden-xs center">#</th>
                                                            <th class="hidden-xs center">{{trans('site_lang.clients_client_name')}}</th>
                                                            <th class="hidden-xs center"></th>

                                                        </tr>
                                                        </thead>
                                                        <tbody>

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>

                                            <div class="panel panel-white" style="direction: rtl">
                                                <div class="panel-heading">
                                                    <div class="panel-heading">
                                                        <h3 class="text-bold">{{trans('site_lang.search_case_khesms')}}</h3>
                                                        <div class="btn-group pull-left">
                                                            <a class="btn btn-success" id="addKhesmModal"><i

                                                                    class="fa fa-plus">
                                                                    &nbsp;&nbsp;</i>{{trans('site_lang.search_case_add_khesm')}}
                                                            </a>
                                                        </div>
                                                        <br>
                                                    </div>
                                                </div>
                                                <div class="panel-body">
                                                    <table
                                                        class="table table-striped table-bordered table-hover table-full-width"
                                                        id="khesm_table">
                                                        <thead>
                                                        <tr>
                                                            <th class="hidden-xs center">#</th>
                                                            <th class="hidden-xs center">{{trans('site_lang.clients_client_name')}}</th>
                                                            <th class="hidden-xs center"></th>

                                                        </tr>
                                                        </thead>
                                                        <tbody>

                                                        </tbody>
                                                    </table>

                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-sm-5 col-md-4">

                                            <div class="user-right">

                                                <table class="table table-condensed table-hover">
                                                    <thead>
                                                    <tr>
                                                        <h4 style="text-align: right">{{trans('site_lang.search_case_info_head')}}</h4>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <td>{{trans('site_lang.home_session_case_number')}}</td>
                                                        <td><a id="invetation_num"></a></td>
                                                        <td><a href="#panel_edit_account" class="show-tab"><i

                                                                    class="fa fa-pencil edit-user-info"></i></a>
                                                        </td>

                                                        </td>

                                                    </tr>
                                                    <tr>
                                                        <td>{{trans('site_lang.add_case_inventation_type')}}</td>
                                                        <td><a id="inventation_type"></a></td>
                                                        <td><a href="#panel_edit_account" class="show-tab"><i
                                                                    class="fa fa-pencil edit-user-info"></i></a>
                                                        </td>

                                                    </tr>
                                                    <tr>
                                                        <td>{{trans('site_lang.add_case_circle_num')}}</td>
                                                        <td><a id="circle_num"></a></td>
                                                        <td><a href="#panel_edit_account" class="show-tab"><i

                                                                    class="fa fa-pencil edit-user-info"></i></a>

                                                        </td>
                                                        <td>
                                                            <a id="circle_num">

                                                            </a></td>

                                                    </tr>
                                                    <tr>
                                                        <td>{{trans('site_lang.add_case_court')}}</td>
                                                        <td><a id="court"></a></td>
                                                        <td><a href="#panel_edit_account" class="show-tab"><i

                                                                    class="fa fa-pencil edit-user-info"></i></a>
                                                        </td>

                                                        <td>
                                                            <a id="court">

                                                            </a></td>

                                                    </tr>
                                                    <tr>
                                                        <td>{{trans('site_lang.search_case_first_session_date')}}</td>
                                                        <td><a id="first_session_date"></a></td>
                                                        <td><a href="#panel_edit_account" class="show-tab"><i

                                                                    class="fa fa-pencil edit-user-info"></i></a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>{{trans('site_lang.add_case_to_whom')}}</td>
                                                        <td><a id="to_whome"></a></td>
                                                        <td><a href="#panel_edit_account" class="show-tab"><i

                                                                    class="fa fa-pencil edit-user-info"></i></a></td>

                                                    </tr>
                                                    </tbody>
                                                </table>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div id="panel_edit_account" class="tab-pane fade" style="direction: rtl">
                                    <form id="edit_case_form" method="post">
                                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                                        <input type="hidden" name="to_whome" id="to_whome">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h3 class="text-bold">{{trans('site_lang.search_case_data')}}</h3>
                                                <hr>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="control-label">
                                                        {{trans('site_lang.home_session_case_number')}}
                                                    </label>
                                                    <input type="text"
                                                           placeholder="{{trans('site_lang.home_session_case_number')}}"
                                                           class="form-control"
                                                           id="input_invetation_num" name="invetation_num">
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">
                                                        {{trans('site_lang.add_case_inventation_type')}}
                                                    </label>
                                                    <input type="text"
                                                           placeholder="{{trans('site_lang.add_case_inventation_type')}}"
                                                           class="form-control"
                                                           id="input_inventation_type" name="inventation_type">
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label">
                                                        {{trans('site_lang.add_case_circle_num')}}
                                                    </label>
                                                    <input type="text"
                                                           placeholder="{{trans('site_lang.add_case_circle_num')}}"
                                                           class="form-control" id="input_circle_num" name="circle_num">
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">
                                                        {{trans('site_lang.add_case_court')}}
                                                    </label>
                                                    <input type="text"
                                                           placeholder="{{trans('site_lang.add_case_court')}}"
                                                           class="form-control" id="input_court" name="court">
                                                </div>

                                            </div>

                                        </div>

                                    </form>

                                    <button class="btn btn-green btn-block" type="submit" id="btn_case_update">
                                        {{trans('site_lang.public_edit_btn_text')}} &nbsp;&nbsp;<i
                                            class="fa fa-arrow-circle-right"></i>
                                    </button>
                                </div>
                                <div id="panel_sessions" class="tab-pane fade">
                                    <div class="panel panel">
                                        <div class="panel-heading">

                                            <a class="btn btn-primary" id="addSessionModal"><i
                                                    class="fa
                                                fa-plus">&nbsp;&nbsp;</i> {{trans('site_lang.search_case_case_add_session')}}
                                            </a>

                                        </div>
                                        <div class="panel-body" id="session-div-table">
                                            <div class="alert alert-warning" style="text-align: right;">
                                                {!!trans('site_lang.public_warn_text')!!}
                                            </div>
                                            <table
                                                class="table table-striped table-bordered table-hover table-full-width"
                                                id="sessions_table">
                                                <thead>
                                                <tr>
                                                    <th class="hidden-xs center">#</th>
                                                    <th class="hidden-xs center">{{trans('site_lang.home_session_date')}}</th>
                                                    <th class="hidden-xs center">{{trans('site_lang.home_session_status')}}</th>
                                                    <th class="hidden-xs center"></th>
                                                </tr>
                                                </thead>
                                            </table>

                                        </div>
                                    </div>
                                    <div class="panel panel space20">
                                        <div class="panel-heading">
                                            <h4 class="text-bold">{{trans('site_lang.mohdar_notes')}}</h4>
                                            <a class="btn btn-green" id="btnPrintNotes" target="_blank"><i

                                                    class="fa
                                                    fa-print"></i>&nbsp;&nbsp;{{trans('site_lang.search_case_case_print_notes')}}
                                            </a>

                                            <a class="btn btn-primary" id="addNotesModal"><i
                                                    class="fa fa-plus"></i>&nbsp;&nbsp;{{trans('site_lang.search_case_case_add_note')}}
                                            </a>
                                        </div>

                                        <div class="panel-body">
                                            <table
                                                class="table table-striped table-bordered table-hover table-full-width"
                                                id="session-notes-table">
                                                <thead>
                                                <tr>
                                                    <th class="hidden-xs center">#</th>
                                                    <th class="hidden-xs center">{{trans('site_lang.search_case_session_note')}}</th>
                                                    <th class="hidden-xs center">{{trans('site_lang.home_session_status')}}</th>
                                                    <th class="hidden-xs center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                                </tr>
                                                </thead>

                                            </table>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
        <!-- end: PAGE -->
        {{--        start notes Modal--}}
        @include('cases.add_session_notes_modal')
        {{--        End notes Modal--}}
        {{--Start Session Modal--}}
        @include('cases.add_session_modal')

        {{--        End Session Modal--}}
        {{--        start add mokel to case--}}
        @include('cases.add_new_mokel_modal')
        {{--        end add mokel to case--}}
        {{--confirm modal--}}
        <div id="confirmModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <h4 align="center" style="margin:0;">{{trans('site_lang.public_delete_modal_text')}}</h4>
                    </div>
                    <div class="modal-footer">
                        <button type="button" name="ok_button" id="ok_button"
                                class="btn btn-danger">{{trans('site_lang.public_accept_btn_text')}}</button>
                        <button type="button" class="btn btn-default"
                                data-dismiss="modal">{{trans('site_lang.public_close_btn_text')}}</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

                                                <!-- confirm delete modal -->

    <div id="confirmModala" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">

                    <div class="modal-body">
                        <h4 align="center" style="margin:0;">{{trans('site_lang.public_delete_modal_text')}}</h4>
                    </div>
                    <div class="modal-footer">
                        <button type="button" name="okbutton" id="okbutton"
                                class="btn btn-danger">{{trans('site_lang.public_accept_btn_text')}}</button>
                        <button type="button" class="btn btn-default"
                                data-dismiss="modal">{{trans('site_lang.public_close_btn_text')}}</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    {{--    <script src="{{url('/plugins/jquery.pulsate/jquery.pulsate.min.js) }}"></script>--}}
    {{--    <script src="{{url('/js/pages-user-profile.js) }}"></script>--}}
    <script src="{{url('/plugins/toastr/toastr.js') }}"></script>
    <script src="{{url('/plugins/select2/select2.min.js') }}"></script>
    <script src="{{url('/plugins/bootstrap-select/bootstrap-select.min.js') }}"></script>
    <script src="{{url('/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js') }}"></script>
    <script src="{{url('/plugins/DataTables/media/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{url('/plugins/DataTables/media/js/DT_bootstrap.js') }}"></script>
    <script src="{{url('/plugins/jQuery-Tags-Input/jquery.tagsinput.js') }}"></script>
    <script src="{{url('/js/form-elements.js') }}"></script>
    <script>
        // global app configuration object
        var config = {
            routes: {
                get_cases_route: "{{route('caseDetails.index')}}",
                add_session_route: "{{route('caseDetails.store')}}",
                update_session_route: "{{route('caseDetails.update')}}",
                add_note_route: "{{route('notes.store')}}",
                update_note_route: "{{ route('notes.update') }}",
                update_case_data: "{{ route('caseDetails.updateCase') }}",
                add_new_client: "{{ route('caseDetails.addNewClient') }}",
            }, trans: {
                select2_place_holder: "{{trans('site_lang.clients_client_type_client_hint')}}",
                select1_place_holder: "{{trans('site_lang.clients_client_type_khesm_hint')}}",
                add_session_btn: "{{trans('site_lang.search_case_case_add_session')}}",
                search_case_session_waiting: "{{trans('site_lang.search_case_session_waiting')}}",
                add_session_modal_title: "{{trans('site_lang.search_case_session_modal_title')}}",
                edit_session_modal_title: "{{trans('site_lang.search_case_session_modal_title_edit')}}",
                public_continue_delete_modal_text: "{{trans('site_lang.public_continue_delete_modal_text')}}",
                public_delete_modal_text: "{{trans('site_lang.public_delete_modal_text')}}",
                public_delete_text: "{{trans('site_lang.public_delete_text')}}",
                search_case_case_add_note: "{{trans('site_lang.search_case_case_add_note')}}",
                public_add_btn_text: "{{trans('site_lang.public_add_btn_text')}}",
                edit_public: "{{trans('site_lang.public_edit_btn_text')}}",
                search_case_session_id_warning_text: "{{trans('site_lang.search_case_session_id_warning_text')}}",
                search_case_session_modal_title_edit: "{{trans('site_lang.search_case_session_modal_title_edit')}}",
                public_edit_btn_text: "{{trans('site_lang.public_edit_btn_text')}}",
                clients_add_new_client_text: "{{trans('site_lang.clients_add_new_client_text')}}",
                clients_add_new_khesm_text: "{{trans('site_lang.clients_add_new_khesm_text')}}",
                search_case_add_client: "{{trans('site_lang.search_case_add_client')}}",
                search_case_add_khesm: "{{trans('site_lang.search_case_add_khesm')}}",
                search_case_case_warning_text: "{{trans('site_lang.search_case_case_warning_text')}}",
                search_case_delete_session_text: "{{trans('site_lang.search_case_delete_session_text')}}",
            }
        };

        var casee_id ;
    $(document).on('click', '#deletecase', function () {
        casee_id = $(this).data('case-id');

                $('#confirmModala').modal('show');
            });
            $('#okbutton').click(function () {

                $.ajax({
                    url: "/caseDetails/delete/" + casee_id,
                    success: function (data) {
                        toastr.success(data.msg);
                        setTimeout(function () {
                            $('#confirmModala').modal('hide');
                            $('#cases').DataTable().ajax.reload();
                            location.reload();
                        }, 100);
                    }
                })
            });
    </script>

    <script src="{{url('/js/cases-details.js') }}"></script>
    {{--    <script src="{{url('/js/table-data.js') }}" type="text/javascript"></script>--}}
    <script src="{{url('/js/ui-modals.js') }}" type="text/javascript"></script>

@endsection
@section('scriptDocument')
    {{--    TableData.init();--}}
    FormElements.init();
    UIModals.init();
    PagesUserProfile.init();
@endsection
