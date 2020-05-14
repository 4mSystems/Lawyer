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
            <div class="container" style="direction:rtl;">
                <!-- start: PAGE HEADER -->
                <!-- start: TOOLBAR -->
                <div class="toolbar row">
                    <div class="col-sm-6 hidden-xs">
                        <div class="page-header">
                            <h1>Dashboard <small>overview &amp; stats </small></h1>
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
                                <a href="#">
                                    Dashboard
                                </a>
                            </li>
                            <li class="active">
                                Dashboard
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- end: BREADCRUMB -->
                <!-- start: PAGE CONTENT -->
                <div class="row">
                   
                    <div class="col-md-6 col-lg-3 col-sm-6">
                        <div class="panel panel-default panel-white core-box">
                            <div class="panel-body no-padding">
                                <div class="partition-blue padding-20 text-center core-icon">
                                    <i class="fa fa-users fa-2x icon-big"></i>
                                </div>
                                <div class="padding-20 core-content">
                                    <h3 class="title block no-margin">Users</h3>
                                    <span
                                        class="subtitle"> #  {{$users->count()}} </span>
                                </div>
                            </div>
                            <div class="panel-footer clearfix no-padding">
                                <a href="{{url('users')}}"
                                   class="col-xs-4 padding-10 text-center text-white tooltips partition-green"
                                   data-toggle="tooltip" data-placement="top" title="More Options"><i
                                        class="fa fa-cog"></i></a>
                                <a href="{{url('users')}}"
                                   class="col-xs-4 padding-10 text-center text-white tooltips partition-blue"
                                   data-toggle="tooltip" data-placement="top" title="Add user"><i
                                        class="fa fa-plus"></i></a>
                                <a href="{{url('users')}}"
                                   class="col-xs-4 padding-10 text-center text-white tooltips partition-red"
                                   data-toggle="tooltip" data-placement="top" title="View More"><i
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
                                    <h3 class="title block no-margin"># Cases</h3>
                                    <span
                                        class="subtitle"> {{$cases->count()}} </span>
                                </div>
                            </div>
                            <div class="panel-footer clearfix no-padding">
                                <a href="{{url('caseDetails')}}"
                                   class="col-xs-4 padding-10 text-center text-white tooltips partition-green"
                                   data-toggle="tooltip" data-placement="top" title="More Options"><i
                                        class="fa fa-cog"></i></a>
                                <a href="{{url('addCase')}}"
                                   class="col-xs-4 padding-10 text-center text-white tooltips partition-blue"
                                   data-toggle="tooltip" data-placement="top" title="Add Content"><i
                                        class="fa fa-plus"></i></a>
                                <a href="{{url('caseDetails')}}"
                                   class="col-xs-4 padding-10 text-center text-white tooltips partition-red"
                                   data-toggle="tooltip" data-placement="top" title="View More"><i
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
                                    <h3 class="title block no-margin"> # mohdareen</h3>
                                    <span
                                        class="subtitle">  {{$mohdreen->count()}}     </span>
                                </div>
                            </div>
                            <div class="panel-footer clearfix no-padding">
                                <a href="{{url('mohdareen')}}"
                                   class="col-xs-4 padding-10 text-center text-white tooltips partition-green"
                                   data-toggle="tooltip" data-placement="top" title="More Options"><i
                                        class="fa fa-cog"></i></a>
                                <a href="{{url('mohdareen')}}"
                                   class="col-xs-4 padding-10 text-center text-white tooltips partition-blue"
                                   data-toggle="tooltip" data-placement="top" title="Add Content"><i
                                        class="fa fa-plus"></i></a>
                                <a href="{{url('mohdareen')}}"
                                   class="col-xs-4 padding-10 text-center text-white tooltips partition-red"
                                   data-toggle="tooltip" data-placement="top" title="View More"><i
                                        class="fa fa-chevron-right"></i></a>
                            </div>
                        </div>
                    </div>

                    <!--  <div class="col-lg-4 col-md-5">
                        <div class="panel panel-red panel-calendar">
                            <div class="panel-heading border-light">
                                <h4 class="panel-title">Appointments</h4>
                            </div>
                            <div class="panel-body">
                                <div class="height-300">
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <div class="actual-date">
                                                <span class="actual-day"></span>
                                                <span class="actual-month"></span>
                                            </div>
                                        </div>
                                        <div class="col-xs-6">
                                            <div class="row">
                                                <div class="col-xs-12">
                                                    <div class="clock-wrapper">
                                                        <div class="clock">
                                                            <div class="circle">
                                                                <div class="face">
                                                                    <div id="hour"></div>
                                                                    <div id="minute"></div>
                                                                    <div id="second"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xs-12">
                                                    <div class="weather text-light">
                                                        <i class="wi-day-sunny"></i>
                                                        25°
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <div class="row">
                                                <div
                                                    class="appointments border-top border-bottom border-light space15">
                                                    <a class="btn btn-sm owl-prev text-light">
                                                        <i class="fa fa-chevron-left"></i>
                                                    </a>
                                                    <div class="e-slider owl-carousel owl-theme"
                                                         data-plugin-options='{"transitionStyle": "goDown", "pagination": false}'>
                                                        <div class="item">
                                                            <div
                                                                class="inline-block padding-10 border-right border-light">
                                                                    <span class="bold-text text-small"><i
                                                                            class="fa fa-clock-o"></i> 17:00</span>
                                                                <span
                                                                    class="text-light text-extra-small">1 hour</span>
                                                            </div>
                                                            <div class="inline-block padding-10">
                                                                <span class="bold-text text-small">NETWORKING</span>
                                                                <span class="text-light text-small">Out to design conference</span>
                                                            </div>
                                                        </div>
                                                        <div class="item">
                                                            <div
                                                                class="inline-block padding-10 border-right border-light">
                                                                    <span class="bold-text text-small"><i
                                                                            class="fa fa-clock-o"></i> 18:30</span>
                                                                <span
                                                                    class="text-light text-extra-small">30 mins</span>
                                                            </div>
                                                            <div class="inline-block padding-10">
                                                                    <span
                                                                        class="bold-text text-small">BOOTSTRAP SEMINAR</span>
                                                                <span
                                                                    class="text-light text-small">Problem Solving</span>
                                                            </div>
                                                        </div>
                                                        <div class="item">
                                                            <div
                                                                class="inline-block padding-10 border-right border-light">
                                                                    <span class="bold-text text-small"><i
                                                                            class="fa fa-clock-o"></i> 20:00</span>
                                                                <span
                                                                    class="text-light text-extra-small">2 hour</span>
                                                            </div>
                                                            <div class="inline-block padding-10">
                                                                    <span
                                                                        class="bold-text text-small">Lunch with Nicole</span>
                                                                <span
                                                                    class="text-light text-small">Next on Tuesday</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <a class="btn btn-sm owl-next text-light"><i
                                                            class="fa fa-chevron-right"></i> </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                </div> -->
                <div class="row" >
                    <div class="col-md-12">
                        <!-- start: TABLE WITH IMAGES PANEL -->
                        <div class="panel panel-white">
                            <div class="panel-heading">
                               الجلسات
                                    </div>
                 <div class="panel-body">
                            <table class="table table-striped table-bordered table-hover table-full-width"
                                                id="sample_1" >
                            <thead class="black white-text"  >
                                <tr>
                                <th scope="col">م</th>
                                <th scope="col">تاريخ الجلسة</th>
                                <th scope="col">الحاله</th> 
                                <th scope="col">الشهر</th> 
                                <th scope="col">رقم القضيه</th> 
                                <th scope="col"></th>  
                                
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($session as $session)
                                <tr>
                                <th scope="row">{{$session->id}}</th> 
                                <td>{{$session->session_date}}</td>
                                <td>{{$session->status}}</td>
                                <td>{{$session->month}}</td>
                                <td>{{$session->case_Id}}</td>  
                            <td>   <a id="shownotes" class="btn btn-xs btn-blue tooltips" data-placement="top"
                           data-original-title="show" data-session-Id="{{$session->id}}"><i class="fa fa-eye"></i></a></td>
                                   

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

                                الجلسات الفائته                                   
                                </div>
                          <div class="panel-body">

                          <table class="table table-striped table-bordered table-hover table-full-width"
                                                id="sample_2">

                        <thead class="black white-text">
                            <tr>
                              <th scope="col">م</th>
                              <th scope="col">تاريخ الجلسة</th>
                              <th scope="col">الحاله</th> 
                              <th scope="col">الشهر</th> 
                              <th scope="col">رقم القضيه</th>  
                              
                            </tr>
                          </thead>
                          <tbody>
                          @foreach($sessionNo as $sessionNo)
                            <tr>
                              <th scope="row">{{$sessionNo->id}}</th> 
                              <td>{{$sessionNo->session_date}}</td>
                              <td>{{$sessionNo->status}}</td>
                              <td>{{$sessionNo->month}}</td>
                              <td>{{$sessionNo->case_Id}}</td>  
                             


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

                               المحضرين                                 
                                </div>
                          <div class="panel-body">

                          <table class="table table-striped table-bordered table-hover table-full-width"
                                                id="">


                        <thead class="black white-text">
                            <tr>
                              <th scope="col">م</th>
                              <th scope="col">محضرين المحكمه</th>
                              <th scope="col">نوع الورقه</th> 
                              <th scope="col">تاريخ الجلسة</th> 
                              <th scope="col">رقم القضيه</th>  
                              <th scope="col">عرض كل البيانات</th>  
                              
                            </tr>
                          </thead>
                          <tbody>
                          @foreach($mohder as $mohder)
                            <tr>
                              <th scope="row">{{$mohder->moh_Id}}</th> 
                              <td>{{$mohder->court_mohdareen}}</td>
                              <td>{{$mohder->paper_type}}</td>
                              <td>{{$mohder->session_Date}}</td>
                              <td>{{$mohder->case_number}}</td>  
                              <td>   <a id="showMohdar" class="btn btn-xs btn-blue tooltips" data-placement="top"
                           data-original-title="show" data-moh-Id="{{$mohder->moh_Id}}"><i class="fa fa-eye"></i></a></td>
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
                    <div class="modal-header" >
                    <h4 class="modal-title">الملاحظات</h4>
                       
                    </div>
                    <div class="modal-body">
                                        </div>
                                        <div class="panel-body">
                                         <table class="table table-striped table-bordered table-hover table-full-width" id="sessions-notes-table">
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
                   url: "mohdareendata/"+id,
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
            url: "sessionnotes/"+id,
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
@endsection
@section('scriptDocument')
    TableData.init();
    UIModals.init();
    FormElements.init();
    UIButtons.init();
@endsection