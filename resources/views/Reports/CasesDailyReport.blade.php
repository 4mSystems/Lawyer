@extends('welcome')
@section('styles')
    <link href="{{url('/plugins/bootstrap-modal/css/bootstrap-modal-bs3patch.css') }}" rel="stylesheet"
          type="text/css"/>
    <link href="{{url('/plugins/bootstrap-modal/css/bootstrap-modal.css') }}" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" type="text/css" href="{{url('/plugins/select2/select2.css') }}"/>

    <link rel="stylesheet" href="{{url('/plugins/jQuery-Tags-Input/jquery.tagsinput.css')}}">
    <link rel="stylesheet" href="{{url('/plugins/bootstrap-select/bootstrap-select.min.css')}}">
    <link rel="stylesheet" href="{{url('/plugins/datepicker/css/datepicker.css')}}">
@endsection
@section('content')
    <div class="main-container inner">
        <!-- start: PAGE -->
        <div class="main-content">
            <div class="container">
                <!-- start: PAGE HEADER -->
                <!-- start: TOOLBAR -->
                <div class="toolbar row">
                    <div class="col-sm-12 hidden-xs">
                        <div class="page-header">
                            <h3 class="text-bold">{{trans('site_lang.side_reports_daily')}}
                            </h3>
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
                                    {{trans('site_lang.side_home')}}
                                </a>
                            </li>
                            <li class="active">
                                {{trans('site_lang.side_reports')}}
                            </li>
                            <li class="active">
                                {{trans('site_lang.side_reports_daily')}}
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- end: BREADCRUMB -->
                <div class="row">
                    <div class="col-md-12">
                        <!-- start: DYNAMIC TABLE PANEL -->
                        <div class="panel panel-white">
                            <div class="panel-heading">
                                <div class="m-lg-4">
                                    <div class="row">
                                        <div class="col-md-6 col-lg-3 col-sm-6">
                                            <a href="" target="_blank" id="btn_search_daily"
                                               class="btn btn-warning text-bold">
                                                <li class="fa fa-print"></li>&nbsp;&nbsp;&nbsp;{{trans('site_lang.reports_print')}}
                                            </a>
                                        </div>

                                        <div class="col-md-6 col-lg-5 col-sm-6">

                                            <div class="input-group" style="padding-bottom: 20px">
                                                <input type="text" data-date-format="yyyy-mm-dd"
                                                       data-date-viewmode="years" class="form-control date-picker"
                                                       id="search_daily" name="search_daily"
                                                >
                                                <span class="input-group-addon"> <i
                                                        class="fa fa-calendar"></i> </span>
                                            </div>
                                            <input id="user_type" type="hidden" value="{{auth()->user()->type}}"/>
                                            <input id="user_cat" type="hidden" value="{{auth()->user()->cat_id}}"/>
                                        </div>
                                        @php
                                            $user_type = auth()->user()->type;
                                            if($user_type == 'admin'){
                                        @endphp
                                        <div class="col-md-6 col-lg-3 col-sm-6">
                                            <div class="input-group">

                                                <select id="Dailytype" class="form-control"
                                                        name="Dailytype">
                                                    <option value="">
                                                        &nbsp;{{trans('site_lang.add_case_to_whom')}}</option>

                                                    <option value="all"
                                                            selected="selected">{{trans('site_lang.reports_all')}}</option>
                                                    @foreach($categories as $category)
                                                        <option
                                                            value='{{$category->id}}'>{{$category->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        @php
                                            }
                                        @endphp
                                    </div>


                                </div>
                                <div class="panel bg-white" id="DailyContainer">


                                    <table class="table table-striped table-bordered table-hover table-full-width"
                                           id="dailyTable">
                                        <thead>
                                        <tr>
                                            <th class="center">{{trans('site_lang.clients_client_type_client')}}</th>
                                            <th class="center">{{trans('site_lang.clients_client_type_khesm')}}</th>
                                            <th class="center">{{trans('site_lang.home_session_case_number')}}</th>
                                            <th class="center">{{trans('site_lang.add_case_circle_num')}}</th>
                                            <th class="center">{{trans('site_lang.add_case_inventation_type')}}</th>
                                            <th class="center">{{trans('site_lang.add_case_court')}}</th>
                                            <th class="center">{{trans('site_lang.home_session_date')}}</th>
                                            <th class="center">{{trans('site_lang.mohdar_notes')}}</th>

                                        </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>
                                </div>


                            </div>
                            <!-- end: DYNAMIC TABLE PANEL -->
                        </div>
                    </div>

                </div>
            </div>
            <!-- end: PAGE -->


        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{url('/plugins/toastr/toastr.js') }}"></script>
    <script type="text/javascript">

    </script>
    <script src="{{url('/plugins/bootstrap-modal/js/bootstrap-modal.js') }}" type="text/javascript"></script>
    <script src="{{url('/plugins/bootstrap-modal/js/bootstrap-modalmanager.js') }}"
            type="text/javascript"></script>
    <script src="{{url('/js/ui-modals.js') }}" type="text/javascript"></script>
    <script type="text/javascript" src="{{url('/plugins/select2/select2.min.js') }}"></script>
    <script type="text/javascript" src="{{url('/js/table-data.js') }}"></script>
    <script src="{{url('/plugins/DataTables/media/js/DT_bootstrap.js') }}"></script>
    <script src="{{url('/plugins/DataTables/media/js/jquery.dataTables.min.js') }}"></script>

    <script src="{{url('/plugins/bootstrap-select/bootstrap-select.min.js') }}"></script>
    <script src="{{url('/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js') }}"></script>
    <script src="{{url('/plugins/jQuery-Tags-Input/jquery.tagsinput.js') }}"></script>
    <script src="{{url('/js/form-elements.js') }}"></script>
    <script src="{{url('/js/daily_search.js') }}"></script>


@endsection
@section('scriptDocument')
    UIModals.init();
    TableData.init();
    FormElements.init();

@endsection

