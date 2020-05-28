@extends('welcome')
@section('styles')
    <link href="{{url('/plugins/bootstrap-modal/css/bootstrap-modal-bs3patch.css') }}" rel="stylesheet"
          type="text/css"/>
    <link rel="stylesheet" href="{{url('/plugins/jQuery-Tags-Input/jquery.tagsinput.css')}}">
    <link rel="stylesheet" href="{{url('/plugins/select2/select2.css')}}">
    <link rel="stylesheet" href="{{url('/plugins/bootstrap-select/bootstrap-select.min.css')}}">
    <link rel="stylesheet" href="{{url('/plugins/datepicker/css/datepicker.css')}}">
    <link rel="stylesheet" href="{{url('/plugins/DataTables/media/css/DT_bootstrap.css')}}">
    <link rel="stylesheet" href="{{url('/plugins/ladda-bootstrap/dist/ladda-themeless.min.css')}}">
    <link rel="stylesheet" href="{{url('/plugins/ladda-bootstrap/dist/ladda.min.css')}}">
    <link rel="stylesheet" href="{{url('/plugins/bootstrap-social-buttons/bootstrap-social.css')}}">

    <link href="{{url('/plugins/bootstrap-modal/css/bootstrap-modal.css') }}" rel="stylesheet" type="text/css"/>

@endsection

@section('content')
    <div class="main-container inner">
        <!-- start: PAGE -->
        <div class="main-content">
            <!-- start: PANEL CONFIGURATION MODAL FORM -->
            <div class="modal fade" id="panel-config" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                &times;
                            </button>
                            <h4 class="modal-title">Panel Configuration</h4>
                        </div>
                        <div class="modal-body">
                            Here will be a configuration form
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">
                                Close
                            </button>
                            <button type="button" class="btn btn-primary">
                                Save changes
                            </button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->
            <!-- end: SPANEL CONFIGURATION MODAL FORM -->
            <div class="container">
                <!-- start: PAGE HEADER -->
                <!-- start: TOOLBAR -->
                <div class="toolbar row" style="direction:rtl;">
                    <div class="col-sm-12 hidden-xs">
                        <div class="page-header">
                            <h1>{{trans('site_lang.side_home')}} <small>{{trans('site_lang.side_welcome')}}</small></h1>
                        </div>
                    </div>
                </div>
                <!-- end: TOOLBAR -->
                <!-- end: PAGE HEADER -->
                <br>
                <!-- start: PAGE CONTENT -->
                <div class="row">
                    <div class="col-md-6 col-lg-3 col-sm-6">
                        <div class="panel panel-default panel-white core-box">
                            <div class="panel-body no-padding">
                                <div class="partition-blue padding-20 text-center core-icon">
                                    <i class="fa fa-users fa-2x icon-big"></i>
                                </div>
                                <div class="padding-20 core-content">
                                    <h3 class="text-bold">{{trans('site_lang.side_users')}}</h3>
                                    <span
                                        class="text-bold"> # {{$users->count()}} </span>
                                </div>
                            </div>
                            <div class="panel-footer clearfix no-padding">
                                <a href="{{url('users')}}"
                                   class="col-xs-4 padding-10 text-center text-white tooltips partition-green"
                                   data-toggle="tooltip" data-placement="top"
                                   title="{{trans('site_lang.home_more_options')}}"><i
                                        class="fa fa-cog"></i></a>
                                <a href="{{url('users')}}"
                                   class="col-xs-4 padding-10 text-center text-white tooltips partition-blue"
                                   data-toggle="tooltip" data-placement="top"
                                   title="{{trans('site_lang.home_add_user')}}"><i
                                        class="fa fa-plus"></i></a>
                                <a href="{{url('users')}}"
                                   class="col-xs-4 padding-10 text-center text-white tooltips partition-red"
                                   data-toggle="tooltip" data-placement="top"
                                   title="{{trans('site_lang.home_see_more')}}"><i
                                        class="fa fa-chevron-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3 col-sm-6">
                        <div class="panel panel-default panel-white core-box">
                            <div class="panel-body no-padding">
                                <div class="partition-red padding-20 text-center core-icon">
                                    <i class="fa fa-desktop fa-2x icon-big"></i>
                                </div>
                                <div class="padding-20 core-content">
                                    <h3 class="text-bold">{{trans('site_lang.side_cases')}}</h3>
                                    <span
                                        class="text-bold"> #{{$cases->count()}} </span>
                                </div>
                            </div>
                            <div class="panel-footer clearfix no-padding">
                                <a href="{{url('caseDetails')}}"
                                   class="col-xs-4 padding-10 text-center text-white tooltips partition-green"
                                   data-toggle="tooltip" data-placement="top"
                                   title="{{trans('site_lang.home_more_options')}}"><i
                                        class="fa fa-cog"></i></a>
                                <a href="{{url('addCase')}}"
                                   class="col-xs-4 padding-10 text-center text-white tooltips partition-blue"
                                   data-toggle="tooltip" data-placement="top"
                                   title="{{trans('site_lang.side_add_case')}}"><i
                                        class="fa fa-plus"></i></a>
                                <a href="{{url('caseDetails')}}"
                                   class="col-xs-4 padding-10 text-center text-white tooltips partition-red"
                                   data-toggle="tooltip" data-placement="top"
                                   title="{{trans('site_lang.home_see_more')}}"><i
                                        class="fa fa-chevron-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3 col-sm-6">
                        <div class="panel panel-default panel-white core-box">

                            <div class="panel-body no-padding">
                                <div class="partition-azure padding-20 text-center core-icon">
                                    <i class="fa fa-shopping-cart fa-2x icon-big"></i>
                                </div>
                                <div class="padding-20 core-content">
                                    <h3 class="text-bold">{{trans('site_lang.side_mohdar')}}</h3>
                                    <span
                                        class="text-bold">#{{$mohdreen->count()}}</span>
                                </div>
                            </div>
                            <div class="panel-footer clearfix no-padding">
                                <a href="{{url('mohdareen')}}"
                                   class="col-xs-4 padding-10 text-center text-white tooltips partition-green"
                                   data-toggle="tooltip" data-placement="top"
                                   title="{{trans('site_lang.home_more_options')}}"><i
                                        class="fa fa-cog"></i></a>
                                <a href="{{url('mohdareen')}}"
                                   class="col-xs-4 padding-10 text-center text-white tooltips partition-blue"
                                   data-toggle="tooltip" data-placement="top"
                                   title="{{trans('site_lang.mohdar_add_mohdar')}}"><i
                                        class="fa fa-plus"></i></a>
                                <a href="{{url('mohdareen')}}"
                                   class="col-xs-4 padding-10 text-center text-white tooltips partition-red"
                                   data-toggle="tooltip" data-placement="top"
                                   title="{{trans('site_lang.home_see_more')}}"><i
                                        class="fa fa-chevron-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3 col-sm-6">
                        <div class="panel panel-default panel-white core-box">

                            <div class="panel-body no-padding">
                                <div class="partition-azure padding-20 text-center core-icon">
                                    <i class="fa fa-shopping-cart fa-2x icon-big"></i>
                                </div>
                                <div class="padding-20 core-content">
                                    <h3 class="text-bold">{{trans('site_lang.side_mohdar')}}</h3>
                                    <span
                                        class="text-bold">#{{$mohdreen->count()}}</span>
                                </div>
                            </div>
                            <div class="panel-footer clearfix no-padding">
                                <a href="{{url('mohdareen')}}"
                                   class="col-xs-4 padding-10 text-center text-white tooltips partition-green"
                                   data-toggle="tooltip" data-placement="top"
                                   title="{{trans('site_lang.home_more_options')}}"><i
                                        class="fa fa-cog"></i></a>
                                <a href="{{url('mohdareen')}}"
                                   class="col-xs-4 padding-10 text-center text-white tooltips partition-blue"
                                   data-toggle="tooltip" data-placement="top"
                                   title="{{trans('site_lang.mohdar_add_mohdar')}}"><i
                                        class="fa fa-plus"></i></a>
                                <a href="{{url('mohdareen')}}"
                                   class="col-xs-4 padding-10 text-center text-white tooltips partition-red"
                                   data-toggle="tooltip" data-placement="top"
                                   title="{{trans('site_lang.home_see_more')}}"><i
                                        class="fa fa-chevron-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <!-- start: TABLE WITH IMAGES PANEL -->
                            <div class="panel panel-white">
                                <div class="panel-heading">
                                    <h5 class="text-bold">{{trans('site_lang.home_sessions_coming')}}</h5>
                                </div>
                                <div class="panel-body">
                                    <table class="table table-striped table-bordered table-hover table-full-width"
                                           id="sample_1">
                                        <thead class="black white-text">
                                        <tr>
                                            <th scope="col" class="hidden-xs center">#</th>
                                            <th scope="col"
                                                class="hidden-xs center">{{trans('site_lang.home_session_date')}}</th>
                                            <th scope="col"
                                                class="hidden-xs center">{{trans('site_lang.home_session_status')}}</th>
                                            <th scope="col"
                                                class="hidden-xs center">{{trans('site_lang.home_session_month')}}</th>
                                            <th scope="col"
                                                class="hidden-xs center">{{trans('site_lang.home_session_case_number')}}</th>
                                            <th scope="col" class="hidden-xs center"></th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($session as $session)
                                            <tr>
                                                <th scope="row" class="hidden-xs center">{{$session->id}}</th>
                                                <td class="hidden-xs center">{{$session->session_date}}</td>
                                                <td class="hidden-xs center">{{$session->status}}</td>
                                                <td class="hidden-xs center">{{$session->month}}</td>
                                                <td class="hidden-xs center">{{$session->case_Id}}</td>
                                                <td class="hidden-xs center"><a id="shownotes"
                                                                                class="btn btn-xs btn-blue tooltips"
                                                                                data-placement="top"
                                                                                data-original-title="show"
                                                                                data-session-Id="{{$session->id}}"><i
                                                            class="fa fa-eye"></i></a></td>


                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- end: TABLE WITH IMAGES PANEL -->
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-12">
                            <!-- start: TABLE WITH IMAGES PANEL -->
                            <div class="panel panel-white">
                                <div class="panel-heading">
                                    <h5 class="text-bold">{{trans('site_lang.home_session_missing')}}</h5>
                                </div>
                                <div class="panel-body">

                                    <table class="table table-striped table-bordered table-hover table-full-width"
                                           id="sample_2">

                                        <thead class="black white-text">
                                        <tr>
                                            <th scope="col" class="hidden-xs center">#</th>
                                            <th scope="col"
                                                class="hidden-xs center">{{trans('site_lang.home_session_date')}}</th>
                                            <th scope="col"
                                                class="hidden-xs center">{{trans('site_lang.home_session_status')}}</th>
                                            <th scope="col"
                                                class="hidden-xs center">{{trans('site_lang.home_session_month')}}</th>
                                            <th scope="col"
                                                class="hidden-xs center">{{trans('site_lang.home_session_case_number')}}</th>
                                            <th scope="col" class="hidden-xs center"></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($sessionNo as $sessionNo)
                                            <tr>
                                                <th scope="row" class="hidden-xs center">{{$sessionNo->id}}</th>
                                                <td class="hidden-xs center">{{$sessionNo->session_date}}</td>
                                                <td class="hidden-xs center">{{$sessionNo->status}}</td>
                                                <td class="hidden-xs center">{{$sessionNo->month}}</td>
                                                <td class="hidden-xs center">{{$sessionNo->case_Id}}</td>


                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                            <!-- end: TABLE WITH IMAGES PANEL -->
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-12">
                            <!-- start: TABLE WITH IMAGES PANEL -->
                            <div class="panel panel-white">
                                <div class="panel-heading">
                                    <h5 class="text-bold">{{trans('site_lang.side_mohdar')}}</h5>
                                </div>
                                <div class="panel-body">

                                    <table class="table table-striped table-bordered table-hover table-full-width"
                                           id="sample_3">
                                        <thead class="black white-text">
                                        <tr>
                                            <th scope="col" class="hidden-xs center">#</th>
                                            <th scope="col"
                                                class="hidden-xs center">{{trans('site_lang.mohdar_court')}}</th>
                                            <th scope="col"
                                                class="hidden-xs center">{{trans('site_lang.mohdar_paper_type')}}</th>
                                            <th scope="col"
                                                class="hidden-xs center">{{trans('site_lang.home_session_date')}}</th>
                                            <th scope="col"
                                                class="hidden-xs center">{{trans('site_lang.home_session_case_number')}}</th>
                                            <th scope="col"
                                                class="hidden-xs center">{{trans('site_lang.home_see_more')}}</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($mohder as $mohder)
                                            <tr>
                                                <th scope="row" class="hidden-xs center">{{$mohder->moh_Id}}</th>
                                                <td class="hidden-xs center">{{$mohder->court_mohdareen}}</td>
                                                <td class="hidden-xs center">{{$mohder->paper_type}}</td>
                                                <td class="hidden-xs center">{{$mohder->session_Date}}</td>
                                                <td class="hidden-xs center">{{$mohder->case_number}}</td>
                                                <td class="hidden-xs center"><a id="showMohdar"
                                                                                class="btn btn-xs btn-blue tooltips"
                                                                                data-placement="top"
                                                                                data-original-title="show"
                                                                                data-moh-Id="{{$mohder->moh_Id}}"><i
                                                            class="fa fa-eye"></i></a></td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- end: TABLE WITH IMAGES PANEL -->
                        </div>
                    </div>


                </div>
                <!-- end: PAGE CONTENT-->
            </div>

        </div>
        <!-- end: PAGE -->
    </div>


    <!-- modal mohder -->
    <div id="show_mohdar_model" aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1"
         class="modal bs-example-modal-basic fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button aria-hidden="true" data-dismiss="modal" class="close" type="button">
                        ×
                    </button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">

                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>محضرين محكمة</strong>
                                <div class="well well-sm">
                                    <span id="court_mohdareen_show"></span>
                                </div>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>نوع الورقة</strong>
                                <div class="well well-sm">
                                    <span id="paper_type_show"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>تاريخ تسليم الورقة</strong>
                                <p id="deliver_data">
                                <div class="well well-sm">
                                    <span id="deliver_data_show"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>رقم الورقة</strong>
                                <div class="well well-sm">
                                    <span id="paper_Number_show"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>تاريخ الجلسة</strong>
                                <div class="well well-sm">
                                    <span id="session_Date_show"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>إسم الموكل</strong>
                                <div class="well well-sm">
                                    <span id="mokel_Name_show"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12" id="khesm_container">
                            <div class="form-group">
                                <strong for="khesm_Name">
                                    إسم الخصم
                                </strong>
                                <div class="well well-sm">
                                    <span id="khesm_Name_show"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>
                                    رقم القضية
                                </strong>
                                <div class="well well-sm">
                                    <span id="case_number_show"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group{{$errors->has('notes')?' has-error':''}}">
                                <strong>
                                    الملاحظات
                                </strong>
                                <div class="well well-sm">
                                    <span id="notes_show"></span>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button data-dismiss="modal" class="btn btn-default" type="button">
                            Close
                        </button>

                    </div>
                </div>
                <!-- /.modal-content -->
            </div>


            <!-- /.modal-dialog -->
        </div>
    </div>

    <!-- modal session note -->
    <div id="show_note_model" aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1"
         class="modal bs-example-modal-basic fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">الملاحظات</h4>

                </div>
                <div class="modal-body">
                </div>
                <div class="panel-body">
                    <table class="table table-striped table-bordered table-hover table-full-width"
                           id="sessions-notes-table">
                        <thead>
                        <tr>

                            <th class="hidden-xs center">الحالة</th>
                            <th class="hidden-xs center">الملاحظات</th>
                            <th class="hidden-xs center">م</th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>

                    <div class="modal-footer">
                        <button data-dismiss="modal" class="btn btn-default" type="button">
                            Close
                        </button>

                    </div>
                </div>
                <!-- /.modal-content -->
            </div>


            <!-- /.modal-dialog -->
        </div>
    </div>

@endsection
@section('scripts')
    <script src="{{url('/plugins/toastr/toastr.js') }}"></script>

    <script>

        $(document).ready(function () {
            $(document).on('click', '#showMohdar', function () {
                var id = $(this).data('moh-Id');

                $.ajax({
                    url: "mohdareendata/" + id,
                    dataType: "json",
                    success: function (html) {
                        $('#court_mohdareen_show').html(html.data.court_mohdareen);
                        $('#paper_type_show').html(html.data.paper_type);
                        $('#deliver_data_show').html(html.data.deliver_data);
                        $('#session_Date_show').html(html.data.session_Date);
                        $('#case_number_show').html(html.data.case_number);
                        $('#paper_Number_show').html(html.data.paper_Number);
                        $('#mokel_Name_show').html(html.data.mokel_Name);
                        $('#khesm_Name_show').html(html.data.khesm_Name);
                        $('#notes_show').html(html.data.notes);
                        $('.modal-title').text("المحضر");
                        $('#show_mohdar_model').modal('show');

                    }
                })
            });


            //   $(document).on('click', '#shownotes', function () {
            //        var id = $(this).data('session-Id');
            //        $.ajax({
            //            url: "sessionnotes/"+id,
            //            dataType: "json",
            //            success: function (html) {
            //                $('#note_show').html(html.data.note);
            //                $('.modal-title').text("ملاحظات الجلسة");
            //                $('#show_note_model').modal('show');

            //            }
            //        })
            //    });

            //get notes for one session
            $(document).on('click', '#shownotes', function () {
                $('#sessions-notes-table tbody tr').remove();
                var id = $(this).data('session-Id');
                $.ajax({
                    url: "sessionnotes/" + id,
                    dataType: "json",
                    success: function (html) {
                        $('#sessions-notes-table tbody').prepend(html.result);

                        $('#show_note_model').modal('show');
                    }
                })
            });

        });

    </script>
    <script src="{{url('/plugins/bootstrap-modal/js/bootstrap-modal.js') }}" type="text/javascript"></script>
    <script src="{{url('/plugins/bootstrap-modal/js/bootstrap-modalmanager.js') }}"
            type="text/javascript"></script>
    <script src="{{url('/plugins/select2/select2.min.js') }}"></script>
    <script src="{{url('/plugins/bootstrap-select/bootstrap-select.min.js') }}"></script>
    <script src="{{url('/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js') }}"></script>
    <script src="{{url('/plugins/jQuery-Tags-Input/jquery.tagsinput.js') }}"></script>
    <script src="{{url('/plugins/DataTables/media/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{url('/plugins/DataTables/media/js/DT_bootstrap.js') }}"></script>
    <script src="{{url('/plugins/ladda-bootstrap/dist/ladda.min.js') }}"></script>
    <script src="{{url('/plugins/ladda-bootstrap/dist/spin.min.js') }}"></script>
    <script src="{{url('/js/ui-modals.js') }}" type="text/javascript"></script>
    <script src="{{url('/js/form-elements.js') }}"></script>
    <script src="{{url('/js/table-data.js') }}" type="text/javascript"></script>
    <script src="{{url('/js/ui-buttons.js') }}" type="text/javascript"></script>
    <script src="{{url('/js/main.js') }}" type="text/javascript"></script>
{{--    <script type="text/javascript">--}}
{{--        $('#mohdar_table').DataTable();--}}
{{--    </script>--}}
@endsection
@section('scriptDocument')
    TableData.init();
    UIModals.init();
    FormElements.init();
    UIButtons.init();
@endsection
