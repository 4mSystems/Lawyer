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
                            <h3 class="text-bold">{{trans('site_lang.search_case_attachments')}}</h3>
                        </div>
                    </div>
                </div>
                <!-- end: TOOLBAR -->
                <!-- end: PAGE HEADER -->
                <br>
                <!-- start: PAGE CONTENT -->


                <div class="row">
                    <div class="col-md-12"><br>
                        <!-- start: TABLE WITH IMAGES PANEL -->
                        <div class="panel panel-white">
                            <div class="panel-heading">
                                <a href="{{url('attachment/'.$case_id.'/create')}}"
                                   class="btn btn-primary text-bold">{{trans('site_lang.attachments_new_attach')}}</a>
                            </div>
                            <div class="panel-body">
                                <table class="table table-striped table-bordered table-hover table-full-width"
                                       id="sample_1">
                                    <thead class="black white-text">
                                    <tr>
                                        <th scope="col" class="hidden-xs center">#</th>

                                        <th scope="col"
                                            class="hidden-xs center">{{trans('site_lang.attachments_file_attach')}}
                                        </th>
                                        <th scope="col"
                                            class="hidden-xs center">{{trans('site_lang.attachments_desc_attach')}}</th>
                                        <th scope="col">
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($case_attachment as $case_attachment)
                                        <tr>
                                            <th scope="row" class="hidden-xs center">{{$case_attachment->id}}</th>

                                            <td class="hidden-xs center">
                                                @if(!empty($case_attachment->img_Url))
                                                    @php
                                                        $allowedMimeTypes = ['image/jpeg','image/gif','image/png','image/bmp','image/svg+xml'];
                                                    @endphp
                                                    @if(! in_array( mime_content_type('uploads/attachments/'.$case_attachment->img_Url), $allowedMimeTypes))
                                                        <a href="{{url('uploads/attachments/'.$case_attachment->img_Url) }}"
                                                           target="_blank"> <img
                                                                src="{{url('uploads/attachments/file.jpg') }}"
                                                                style="width:75px;height:50px;"/>
                                                        </a>
                                                    @else
                                                        <a href="{{url('uploads/attachments/'.$case_attachment->img_Url) }}"
                                                           target="_blank"> <img
                                                                src="{{url('uploads/attachments/'.$case_attachment->img_Url) }}"
                                                                style="width:50px;height:50px;"/>
                                                        </a>
                                                    @endif
                                                @endif

                                            </td>
                                            <td class="hidden-xs center">{{$case_attachment->img_Description}}</td>
                                            <td class="hidden-xs center"><a class='btn btn-raised btn-primary btn-sml'
                                                                            href=" {{url('attachment/'.$case_attachment->id.'/edit')}}"><i
                                                        class="fa fa-edit"></i></a>


                                                <form method="get" id='delete-form'
                                                      action="{{url('attachment/'.$case_attachment->id.'/delete')}}"
                                                      style='display: none;'>
                                                {{csrf_field()}}
                                                <!-- {{method_field('delete')}} -->
                                                </form>
                                                <button type="submit" class='btn btn-danger btn-primary btn-sml'
                                                        form="delete-form">

                                                    <i
                                                        class="fa fa-trash"></i>
                                                </button>

                                            </td>


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

    <script src="{{url('/js/history-stealer.js')}} " type="text/javascript"></script>
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
