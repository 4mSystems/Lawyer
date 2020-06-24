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
                <div class="toolbar row" style="direction:rtl;">
                    <div class="col-sm-12 hidden-xs">
                        <div class="page-header">
                            <h3 class="text-bold">{{trans('site_lang.attachments_edit_attach')}}</h3>
                        </div>
                    </div>
                </div>
                <!-- end: TOOLBAR -->
                <!-- end: PAGE HEADER -->
                <br>
                <!-- start: PAGE CONTENT -->
                <div class="row">
                    <div class="col-md-12">
                        <!-- start: TABLE WITH IMAGES PANEL -->
                        <div class="panel panel-white">
                            <div class="panel-body">
                                {!! Form::model($attachment, ['url' => ['attachment/'.$attachment->id.'/update'] , 'method'=>'post' ,'files'=> true]) !!}
                                {!! csrf_field() !!}
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        {{ Form::label('img_Description',trans('site_lang.attachments_desc_attach')) }}
                                        {{ Form::textarea('img_Description',$attachment->img_Description,["class"=>"form-control"]) }}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        {{ Form::label('img_Url',trans('site_lang.attachments_file_attach')) }}
                                        {{ Form::file('img_Url', ["class"=>"form-control"]) }}

                                        <img
                                            src="{{url('uploads/attachments/'.$attachment->img_Url) }}"
                                            style="width:150px;height:150px;"/>
                                    </div>
                                </div>
                                {{ Form::submit( trans('site_lang.public_edit_btn_text') ,['class'=>'btn btn-primary center-block']) }}
                                {{ Form::close() }}
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


@endsection
@section('scripts')
    <script src="{{url('/plugins/toastr/toastr.js') }}"></script>

    <script>


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
