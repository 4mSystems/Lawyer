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
                            <h3 class="text-bold">{{trans('site_lang.side_reports_monthly')}}
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
                                {{trans('site_lang.side_reports_monthly')}}
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
                                            <div>

                                                <label></label>
                                            </div>

                                            <a href="" target="_blank" id="btn_search_monthly"
                                               class="btn btn-success text-bold">
                                                <li class="fa fa-print"></li>&nbsp;&nbsp;&nbsp;{{trans('site_lang.reports_print')}}
                                            </a>
                                        </div>
                                        <div class="col-md-6 col-lg-3 col-sm-6">

                                            <div>

                                                <label>{{trans('site_lang.reports_month')}}</label>
                                            </div>

                                            <div class="input-group">
                                                <select id="Month" name="form-field-select-1"
                                                        class="form-control">
                                                    <option value="01" selected="selected">1</option>
                                                    <option value="02">2</option>
                                                    <option value="03">3</option>
                                                    <option value="04">4</option>
                                                    <option value="05">5</option>
                                                    <option value="06">6</option>
                                                    <option value="07">7</option>
                                                    <option value="08">8</option>
                                                    <option value="09">9</option>
                                                    <option value="10">10</option>
                                                    <option value="11">11</option>
                                                    <option value="12">12</option>
                                                </select>

                                            </div>

                                        </div>
                                        <div class="col-md-6 col-lg-3 col-sm-6">
                                            <div>

                                                <label>{{trans('site_lang.reports_year')}}</label>
                                            </div>
                                            <div class="input-group">
                                                <select id="year" name="form-field-select-1"
                                                        class="form-control">
                                                    <option value="2020" selected="selected">2020</option>
                                                    <option value="2021">2021</option>
                                                    <option value="2022">2022</option>
                                                    <option value="2023">2023</option>
                                                    <option value="2024">2024</option>
                                                    <option value="2025">2025</option>
                                                    <option value="2026">2026</option>
                                                    <option value="2027">2027</option>
                                                    <option value="2028">2028</option>
                                                    <option value="2029">2029</option>
                                                    <option value="2030">2030</option>
                                                    <option value="2031">2031</option>
                                                    <option value="2032">2032</option>
                                                    <option value="2033">2033</option>
                                                    <option value="2034">2034</option>
                                                    <option value="2035">2035</option>
                                                    <option value="2036">2036</option>
                                                    <option value="2037">2037</option>
                                                    <option value="2038">2038</option>
                                                    <option value="2039">2039</option>
                                                    <option value="2040">2040</option>

                                                </select>

                                            </div>
                                            <input id="user_type" type="hidden" value="{{auth()->user()->type}}"/>
                                            <input id="user_cat" type="hidden" value="{{auth()->user()->cat_id}}"/>
                                        </div>
                                        @php
                                            $user_type = auth()->user()->type;
                                            if($user_type == 'admin'){
                                        @endphp
                                        <div class="col-md-6 col-lg-3 col-sm-6">
                                            <div>

                                                <label>{{trans('site_lang.add_case_to_whom')}}</label>
                                            </div>
                                            <div class="input-group">

                                                <select id="type" class="form-control"
                                                        name="type">
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
                                    <br>
                                    <div class="panel bg-white" id="DailyContainer">


                                        <table class="table table-striped table-bordered table-hover table-full-width"
                                               id="MonthlyTable">
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
    </div>
@endsection
@section('scripts')
    <script src="{{url('/plugins/toastr/toastr.js') }}"></script>
    <script type="text/javascript">

    </script>
    <script src="{{url('/plugins/bootstrap-modal/js/bootstrap-modal.js') }}"
            type="text/javascript"></script>
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

