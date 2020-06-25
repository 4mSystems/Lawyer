@extends('welcome')
@section('styles')
    <link href="{{url('/plugins/bootstrap-modal/css/bootstrap-modal-bs3patch.css') }}" rel="stylesheet"
          type="text/css"/>
    <link href="{{url('/plugins/bootstrap-modal/css/bootstrap-modal.css') }}" rel="stylesheet" type="text/css"/>

    <style>
        .switch {
            position: relative;
            display: inline-block;
            width: 60px;
            height: 34px;
        }

        /* Hide default HTML checkbox */
        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        /* The slider */
        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            -webkit-transition: .4s;
            transition: .4s;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 26px;
            width: 26px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            -webkit-transition: .4s;
            transition: .4s;
        }

        input:checked + .slider {
            background-color: #2196F3;
        }

        input:focus + .slider {
            box-shadow: 0 0 1px #2196F3;
        }

        input:checked + .slider:before {
            -webkit-transform: translateX(26px);
            -ms-transform: translateX(26px);
            transform: translateX(26px);
        }

        /* Rounded sliders */
        .slider.round {
            border-radius: 34px;
        }

        .slider.round:before {
            border-radius: 50%;
        }

    </style>

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
                            <h3 class="text-bold">{{trans('site_lang.side_users')}}</h3>
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
                                {{trans('site_lang.permission')}}
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
                                <h4 class="panel-title"><span class="text-bold">{{trans('site_lang.permission')}}</span>
                                </h4>
                            </div>
                            <div class="panel-body">
                                <div class="btn-group pull-right">
                                    <br>

                                    <div class="card-body" style=' padding-top: 10px;
                            padding-right: 15px;
                             padding-left: 20px;
                             '>


                                        {!! Form::model($permission, ['route' => ['permission.update',$permission->id] , 'method'=>'put' ,'files'=> true]) !!}
                                        {{ csrf_field() }}


                                        <div class="form-group">
                                            <strong>{{trans('site_lang.empName')}}</strong>
                                              {{ Form::label('user_id',$permission->getUser->name,
                                                $permission->getUser->name
                                            ,["class"=>"form-control " ]) }} 
                                        </div>


                                        <div class="form-group">


                                            <div class="table-responsive">
                                                <table class="table mb-0">
                                                    <tbody>
                                                    <tr>
                                                        <th>{{trans('site_lang.users')}}</th>
                                                        <td>


                                                            <label class="switch">
                                                                <input type="hidden" name="users" id='users' value="no">
                                                                {{ Form::checkbox('users', 'yes',  $permission->users=="yes"?true:false) }}

                                                                <span class="slider round"></span>
                                                            </label>
                                                        </td>
                                                    </tr>


                                                    <div class="form-group">
                                                        <tr>
                                                            <th>{{trans('site_lang.clients')}}</th>
                                                            <td>


                                                                <label class="switch">

                                                                    <input type="hidden" name="clients" id='clients'
                                                                           value="no">
                                                                    {{ Form::checkbox('clients', 'yes',  $permission->clients=="yes"?true:false) }}
                                                                    <span class="slider round"></span>
                                                                </label>
                                                            </td>
                                                        </tr>
                                                    </div>


                                                    <div class="form-group">
                                                        <tr>
                                                            <th>{{trans('site_lang.addcases')}}</th>
                                                            <td>

                                                                <label class="switch">
                                                                    <input type="hidden" name="addcases" id='addcases'
                                                                           value="no">
                                                                    {{ Form::checkbox('addcases', 'yes',  $permission->addcases=="yes"?true:false) }}
                                                                    <span class="slider round"></span>
                                                                </label>
                                                            </td>
                                                        </tr>
                                                    </div>


                                                    <div class="form-group">
                                                        <tr>
                                                            <th>{{trans('site_lang.search_case')}}</th>
                                                            <td>
                                                                <label class="switch">

                                                                    <input type="hidden" name="search_case"
                                                                           id='search_case' value="no">
                                                                    {{ Form::checkbox('search_case', 'yes',  $permission->search_case=="yes"?true:false) }}
                                                                    <span class="slider round"></span>
                                                                </label>

                                                            </td>
                                                        </tr>
                                                    </div>


                                                    <div class="form-group">
                                                        <tr>
                                                            <th>{{trans('site_lang.mohdreen')}}</th>
                                                            <td>
                                                                <label class="switch">

                                                                    <input type="hidden" name="mohdreen" id='mohdreen'
                                                                           value="no">
                                                                    {{ Form::checkbox('mohdreen', 'yes',  $permission->mohdreen=="yes"?true:false) }}
                                                                    <span class="slider round"></span>
                                                                </label>

                                                            </td>
                                                        </tr>
                                                    </div>

                                                    <div class="form-group">
                                                        <tr>
                                                            <th>{{trans('site_lang.daily_report')}}</th>
                                                            <td>
                                                                <label class="switch">

                                                                    <input type="hidden" name="daily_report" id='daily_report'
                                                                           value="no">
                                                                    {{ Form::checkbox('daily_report', 'yes',  $permission->daily_report=="yes"?true:false) }}
                                                                    <span class="slider round"></span>
                                                                </label>

                                                            </td>
                                                        </tr>
                                                    </div>


                                                    <div class="form-group">
                                                        <tr>
                                                            <th>{{trans('site_lang.monthly_report')}}</th>
                                                            <td>
                                                                <label class="switch">

                                                                    <input type="hidden" name="monthly_report" id='monthly_report'
                                                                           value="no">
                                                                    {{ Form::checkbox('monthly_report', 'yes',  $permission->monthly_report=="yes"?true:false) }}
                                                                    <span class="slider round"></span>
                                                                </label>

                                                            </td>
                                                        </tr>
                                                    </div>
                                                    </tbody>
                                                </table>

                                            </div>

                                        </div>
                                    </div>


                                    <!-- test -->


                                    <!-- Rounded switch -->


                                    <!-- end test -->
                                    <div style=' padding-top: 10px;
                            padding-right: 15px;
                             padding-left: 20px;
                             '>
                                        {{ Form::submit( trans('site_lang.edit') ,['class'=>'btn btn-primary']) }}
                                    </div>
                                    {{ Form::close() }}
                                </div>


                            </div>

                        </div>
                    </div>
                    <!-- end: TABLE WITH IMAGES PANEL -->
                </div>
            </div>
        </div>
    </div>
    <!-- end: PAGE -->


    </div>
@endsection
@section('scripts')
    <script src="{{url('/plugins/toastr/toastr.js') }}"></script>
    <script src="{{url('/plugins/bootstrap-modal/js/bootstrap-modal.js') }}" type="text/javascript"></script>
    <script src="{{url('/plugins/bootstrap-modal/js/bootstrap-modalmanager.js') }}" type="text/javascript"></script>
    <script src="{{url('/js/ui-modals.js') }}" type="text/javascript"></script>

@endsection
@section('scriptDocument')
    UIModals.init();
@endsection

