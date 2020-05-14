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
            <div class="container">
                <!-- start: PAGE HEADER -->
                <!-- start: TOOLBAR -->
                <div class="toolbar row">
                    <div class="col-sm-6 hidden-xs">
                        <div class="page-header">
                            <h1>المحضرين <small>overview &amp; stats </small></h1>
                        </div>
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
                                    الرئيسية
                                </a>
                            </li>
                            <li class="active">
                                المحضرين
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- end: BREADCRUMB -->

                <div class="row">
                    <div class="col-md-12">
                        <!-- start: TABLE WITH IMAGES PANEL -->
                        <div class="panel panel-white">
                            <div class="panel-heading">
                                <a class="btn btn-primary" id="addMohdarModal"><i class="fa fa-plus"></i> إضافة
                                    محضر</a>
                                <div class="panel-tools">
                                    <div class="dropdown">
                                        <a data-toggle="dropdown"
                                           class="btn btn-xs dropdown-toggle btn-transparent-grey">
                                            <i class="fa fa-cog"></i>
                                        </a>
                                        <ul class="dropdown-menu dropdown-light pull-right" role="menu">
                                            <li>
                                                <a class="panel-collapse collapses" href="#"><i
                                                        class="fa fa-angle-up"></i> <span>Collapse</span> </a>
                                            </li>
                                            <li>
                                                <a class="panel-refresh" href="#"> <i class="fa fa-refresh"></i> <span>Refresh</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="panel-config" href="{{url('/mohdareen-export')}}"
                                                   data-toggle="modal"> <i
                                                        class="fa fa-wrench"></i> <span>Export</span></a>
                                            </li>
                                            <li>
                                                <a class="panel-expand" href="#"> <i class="fa fa-expand"></i> <span>Fullscreen</span></a>
                                            </li>
                                        </ul>
                                    </div>
                                    <a class="btn btn-xs btn-link panel-close" href="#"> <i class="fa fa-times"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="panel-body">
                                <table class="table table-striped table-bordered table-hover table-full-width"
                                       id="sample_1">
                                    <thead>
                                    <tr>
                                        <th></th>
                                        <th class="hidden-xs">الحالة</th>
                                        <th class="hidden-xs">تاريخ الجلسة</th>
                                        <th class="hidden-xs">رقم الورقة</th>
                                        <th class="hidden-xs">تاريخ تسليم الورقة</th>
                                        <th class="hidden-xs">نوع الورقة</th>
                                        <th>محضرين المحكمه</th>
                                        <th class="center">#</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($mohdareen as $mohdar)
                                        @include('mohdareen.mohdareen_item')
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- end: TABLE WITH IMAGES PANEL -->
                    </div>
                </div>
            </div>
        </div>
        <!-- end: PAGE -->
        <div id="add_mohdar_model" aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1"
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
                        <form method="post" id="mohdars">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <input type="hidden" name="id" id="id">
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group{{$errors->has('court_mohdareen')?' has-error':''}}">

                                        <input type="text" name="court_mohdareen" class="form-control"
                                               id="court_mohdareen" placeholder="محضرين محكمة"
                                               value="{{ old('court_mohdareen') }}">
                                        <span class="text-danger" id="court_mohdareen_error"></span>
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group{{$errors->has('paper_type')?' has-error':''}}">

                                        <input name="paper_type" id="paper_type" placeholder="نوع الورقة"
                                               class="form-control"
                                               value="{{ old('paper_type') }}"/>
                                        <span class="text-danger" id="paper_type_error"></span>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group{{$errors->has('paper_type')?' has-error':''}}">
                                        <div class="input-group">
                                            <input type="text" data-date-format="dd-mm-yyyy"
                                                   data-date-viewmode="years" class="form-control date-picker"
                                                   id="deliver_data" name="deliver_data"
                                                   placeholder="تاريخ تسليم الورقة"
                                                   value="{{ old('deliver_data') }}">
                                            <span class="input-group-addon"> <i
                                                    class="fa fa-calendar"></i> </span>
                                        </div>
                                        <span class="text-danger" id="deliver_data_error"></span>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group{{$errors->has('paper_Number')?' has-error':''}}">
                                        <input name="paper_Number" id="paper_Number" placeholder="رقم الورقة"
                                               class="form-control"
                                               value="{{ old('paper_Number') }}"/>
                                        <span class="text-danger" id="paper_Number_error"></span>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group{{$errors->has('session_Date')?' has-error':''}}">
                                        <div class="input-group">
                                            <input type="text" data-date-format="dd-mm-yyyy" placeholder="تاريخ الجلسة"
                                                   data-date-viewmode="years" class="form-control date-picker"
                                                   id="session_Date" name="session_Date"
                                                   value="{{ old('session_Date') }}">
                                            <span class="input-group-addon"> <i
                                                    class="fa fa-calendar"></i> </span>
                                        </div>
                                        <span class="text-danger" id="session_Date_error"></span>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12" id="mokel_container">
                                    <div class="form-group{{$errors->has('mokel_Name')?' has-error':''}}">
                                        <strong for="mokel">
                                            إسم الموكل
                                        </strong>
                                        <select multiple="multiple"
                                                id="mokel_Name" name="mokel_Name[]"
                                                class="form-control search-select">
                                        </select>
                                        <span class="text-danger" id="mokel_Name_error"></span>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12" id="khesm_container">
                                    <div class="form-group{{$errors->has('khesm_Name')?' has-error':''}}">
                                        <strong for="khesm_Name">
                                            إسم الخصم
                                        </strong>
                                        <select multiple="multiple"
                                                id="khesm_Name" name="khesm_Name[]"
                                                class="form-control search-select">

                                        </select>
                                        <span class="text-danger" id="khesm_Name_error"></span>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group{{$errors->has('case_number')?' has-error':''}}">

                                        <input name="case_number" id="case_number" placeholder="رقم القضية"
                                               class="form-control"
                                               value="{{ old('case_number') }}"/>
                                        <span class="text-danger" id="case_number_error"></span>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group{{$errors->has('notes')?' has-error':''}}">

                                        <input name="notes" id="notes" placeholder="الملاحظات"
                                               class="form-control"
                                               value="{{ old('notes') }}"/>
                                        <span class="text-danger" id="notes_error"></span>
                                    </div>
                                </div>

                            </div>
                        </form>

                    </div>
                    <div class="modal-footer">
                        <button data-dismiss="modal" class="btn btn-default" type="button">
                            Close
                        </button>
                        <input type="submit" class="btn btn-primary" id="add_mohdar" name="add_mohdar" value="Add"/>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>


            <!-- /.modal-dialog -->
        </div>
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
        {{--confirm modal--}}
        <div id="confirmModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h2 class="modal-title">تأكيد</h2>
                    </div>
                    <div class="modal-body">
                        <h4 align="center" style="margin:0;">هل تريد الحذف ؟</h4>
                    </div>
                    <div class="modal-footer">
                        <button type="button" name="ok_button" id="ok_button" class="btn btn-danger">حذف</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">الفاء</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{url('/plugins/toastr/toastr.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#addMohdarModal').click(function () {
                $('#mokel_Name').empty();
                $('#khesm_Name').empty();
                $.ajax({
                    url: "{{route('getClients')}}",
                    dataType: 'json',
                    type: 'get',
                    success: function (data) {
                        $.each(data.result, function (i, index) {
                            $('#mokel_Name').append(`<option value="${index.client_Name}">${index.client_Name}</option>`);
                            $('#khesm_Name').append(`<option value="${index.client_Name}">${index.client_Name}</option>`);
                        });

                    }
                });
                $('.modal-title').text("إضافة محضر جديد");
                $('#add_mohdar').val("إضافة");
                $('#add_mohdar_model').modal('show');
            });
            $('#add_mohdar').click(function () {
                var form = $('#mohdars').serialize();
                if ($('#add_mohdar').val() == 'إضافة') {
                    $.ajax({
                        url: "{{route('mohdareen.store')}}",
                        dataType: 'json',
                        data: form,
                        type: 'post',
                        success: function (data) {
                            // if (data.status == true) {
                            $('#sample_1 tbody').append(data.result);
                            $('#add_mohdar_model').modal('hide');
                            toastr.success(data.msg);
                            $("#mohdars").trigger('reset');
                            jQuery('#mokel_Name').selectedIndex = 0;
                            jQuery('#khesm_Name').selectedIndex = 0;
                        }, error: function (data_error, exception) {
                            if (exception == 'error') {
                                $('#court_mohdareen_error').html(data_error.responseJSON.errors.court_mohdareen);
                                $('#paper_type_error').html(data_error.responseJSON.errors.paper_type);
                                $('#deliver_data_error').html(data_error.responseJSON.errors.deliver_data);
                                $('#session_Date_error').html(data_error.responseJSON.errors.session_Date);
                                $('#mokel_Name_error').html(data_error.responseJSON.errors.mokel_Name);
                                $('#khesm_Name_error').html(data_error.responseJSON.errors.khesm_Name);
                                $('#case_number_error').html(data_error.responseJSON.errors.case_number);
                            }
                        }
                    });
                } else {
                    $.ajax({
                        url: "{{ route('mohdareen.update') }}",
                        dataType: 'json',
                        data: form,
                        type: 'post',
                        success: function (data) {
                            $("#moh_Id" + data.result.moh_Id).html(data.result.moh_Id);
                            $("#court_mohdareen" + data.result.moh_Id).html(data.result.court_mohdareen);
                            $("#paper_type" + data.result.moh_Id).html(data.result.paper_type);
                            $("#deliver_data" + data.result.moh_Id).html(data.result.deliver_data);
                            $("#paper_Number" + data.result.moh_Id).html(data.result.paper_Number);
                            $("#session_Date" + data.result.moh_Id).html(data.result.session_Date);
                            toastr.success(data.msg);
                            $('#add_mohdar_model').modal('hide');
                        }, error: function (data_error, exception) {
                            if (exception == 'error') {
                                $('#court_mohdareen_error').html(data_error.responseJSON.errors.court_mohdareen);
                                $('#paper_type_error').html(data_error.responseJSON.errors.paper_type);
                                $('#deliver_data_error').html(data_error.responseJSON.errors.deliver_data);
                                $('#session_Date_error').html(data_error.responseJSON.errors.session_Date);
                                $('#mokel_Name_error').html(data_error.responseJSON.errors.mokel_Name);
                                $('#khesm_Name_error').html(data_error.responseJSON.errors.khesm_Name);
                                $('#case_number_error').html(data_error.responseJSON.errors.case_number);
                            }
                        }
                    });
                }
            });
            $(document).on('click', '#editMohdar', function () {
                var id = $(this).data('moh-Id');
                $.ajax({
                    url: "/mohdareen/" + id + "/edit",
                    dataType: "json",
                    success: function (html) {
                        $('#court_mohdareen').val(html.data.court_mohdareen);
                        $('#paper_type').val(html.data.paper_type);
                        $('#deliver_data').val(html.data.deliver_data);
                        $('#session_Date').val(html.data.session_Date);
                        $('#case_number').val(html.data.case_number);
                        $('#paper_Number').val(html.data.paper_Number);
                        $('#notes').val(html.data.notes);
                        $('#id').val(html.data.moh_Id);
                        $('#mokel_container').hide();
                        $('#khesm_container').hide();
                        $('.modal-title').text("تعديل المحضر");
                        $('#add_mohdar').val("تعديل");
                        $('#add_mohdar_model').modal('show');

                    }
                })
            });
            $(document).on('click', '#showMohdar', function () {
                var id = $(this).data('moh-Id');
                $.ajax({
                    url: "/mohdareen/" + id + "/edit",
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
            $(document).on('click', '.btn-lg', function () {
                var id = $(this).data('moh-Id');
                $.ajax({
                    url: "mohdareen/updateStatus/" + id,
                    dataType: "json",
                    success: function (html) {
                        $("#status" + html.result.moh_Id).html(html.result.status);
                        // var status = html.status;
                        if (html.status) {
                            $("#status" + html.result.moh_Id).removeClass("label label-danger");
                            $("#status" + html.result.moh_Id).addClass("label label-success");
                            toastr.success(html.msg);
                        } else {
                            $("#status" + html.result.moh_Id).removeClass("label label-success");
                            $("#status" + html.result.moh_Id).addClass("label label-danger");
                            toastr.error(html.msg);
                        }
                    }
                })
            });

            var user_id;

            $(document).on('click', '#deleteMohadr', function () {
                user_id = $(this).data('moh-Id');
                $('#confirmModal').modal('show');
            });

            $('#ok_button').click(function () {
                $.ajax({
                    url: "mohdareen/destroy/" + user_id,
                    beforeSend: function () {
                        $('#ok_button').text('جارى الحذف ....');
                    },
                    success: function (data) {
                        setTimeout(function () {
                            $('#confirmModal').modal('hide');
                            $('#userRow' + user_id).remove();
                            $('#ok_button').text('حذف');
                        }, 1000);
                    }
                })
            });
        });
        $(document).ready(function () {
            $(".modal").on("hidden.bs.modal", function () {
                $("#mohdars").trigger('reset');
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
@endsection
@section('scriptDocument')
    TableData.init();
    UIModals.init();
    FormElements.init();
    UIButtons.init();
@endsection

