@extends('welcome')
@section('styles')
    <link href="{{url('/plugins/bootstrap-modal/css/bootstrap-modal-bs3patch.css') }}" rel="stylesheet"
          type="text/css"/>
    <link href="{{url('/plugins/bootstrap-modal/css/bootstrap-modal.css') }}" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" type="text/css" href="{{url('/plugins/select2/select2.css') }}"/>

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
                            <h1>Clients <small>overview &amp; stats </small></h1>
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
                                    Home
                                </a>
                            </li>
                            <li class="active">
                                Clients
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
                                <a class="btn btn-primary" id="addClientModal"><i
                                        class="fa fa-plus"></i> Add Client</a>

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
                                                <a class="panel-refresh" href="#">
                                                    <i class="fa fa-refresh"></i> <span>Refresh</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="panel-config" href="#panel-config" data-toggle="modal">
                                                    <i class="fa fa-wrench"></i> <span>Configurations</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="panel-expand" href="#">
                                                    <i class="fa fa-expand"></i> <span>Fullscreen</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="panel-body">

                                <table class="table table-striped table-bordered table-hover table-full-width"
                                       id="sample_1">
                                    <thead>
                                    <tr>
                                        <th class="center">#</th>
                                        <th class="center">Client Name</th>
                                        <th class="center">Client Unit</th>
                                        <th class="center"> Client Address</th>
                                        <th class="center">Notes</th>
                                        <th class="center">type</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($clients as $client)
                                        @include('clients.clients_item')
                                    @endforeach
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
        <div id="add_client_model" aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1"
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
                        <form method="post" id="clients">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <input type="hidden" name="id" id="id">
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group{{$errors->has('client_Name')?' has-error':''}}">
                                        <strong>Client Name:</strong>
                                        <input type="text" name="client_Name" class="form-control" id="client_Name"
                                               placeholder="Client Name"
                                               value="{{ old('client_Name') }}">
                                        <span class="text-danger" id="client_Name_error"></span>
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group{{$errors->has('client_Unit')?' has-error':''}}">
                                        <strong>Client Unit:</strong>
                                        <input name="client_Unit" id="client_Unit" placeholder="Client Unit"
                                               class="form-control"
                                               value="{{ old('client_Unit') }}"/>
                                        <span class="text-danger" id="client_Unit_error"></span>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group{{$errors->has('client_Address')?' has-error':''}}">
                                        <strong>Client Address:</strong>
                                        <input type="text" name="client_Address" id="client_Address"
                                               class="form-control"
                                               placeholder="Client Address"
                                               value="{{ old('client_Address') }}">
                                        <span class="text-danger" id="client_Address_error"></span>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group{{$errors->has('notes')?' has-error':''}}">
                                        <strong>Notes:</strong>
                                        <textarea type="text" name="notes" id="notes" class="form-control"
                                                  placeholder="Notes"
                                                  value="{{ old('notes') }}" rows="10"></textarea>
                                        <span class="text-danger" id="notes_error"></span>
                                    </div>
                                </div>


                                   <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group{{$errors->has('notes')?' has-error':''}}">
                                        <strong>type:</strong>
                                        <select type="select" name="type" id="type" class="form-control"
                                                  
                                                  value="{{ old('type') }}" rows="10">
                                                      

                                          <option value="" selected data-default>select type  </option>
                                          <option value="client">client</option>
                                          <option value="khesm">khesm</option>
                                         


                                                  </select>
                                         
                                    </div>
                                </div>



                            </div>
                        </form>

                    </div>
                    <div class="modal-footer">
                        <button data-dismiss="modal" class="btn btn-default" type="button">
                            Close
                        </button>
                        <input type="submit" class="btn btn-primary" id="add_client" name="add_client" value="Add"/>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>


            <!-- /.modal-dialog -->
        </div>
        {{--confirm modal--}}
        <div id="confirmModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h2 class="modal-title">Confirmation</h2>
                    </div>
                    <div class="modal-body">
                        <h4 align="center" style="margin:0;">Are you sure you want to remove this data?</h4>
                    </div>
                    <div class="modal-footer">
                        <button type="button" name="ok_button" id="ok_button" class="btn btn-danger">OK</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
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

            $('#addClientModal').click(function () {
                $('.modal-title').text("Add New Client");
                $('#add_client').val("Add");
                $('#add_client_model').modal('show');
            });

            $('#add_client').click(function () {
                var form = $('#clients').serialize();
                if ($('#add_client').val() == 'Add') {
                    $.ajax({
                        url: "{{route('clients.store')}}",
                        dataType: 'json',
                        data: form,
                        type: 'post',
                        beforeSend: function () {
                            $('#client_Name_error').empty();
                            $('#client_Unit_error').empty();
                            $('#client_Address_error').empty();
                            $('#notes_error').empty();
                        }, success: function (data) {
                            // if (data.status == true) {
                            console.log(data);
                            $('#sample_1 tbody').append(data.result);
                            $('#add_client_model').modal('hide');
                            toastr.success(data.msg);
                            $("#clients").trigger('reset');
                        }, error: function (data_error, exception) {
                            if (exception == 'error') {
                                $('#client_Name_error').html(data_error.responseJSON.errors.client_Name);
                                $('#client_Unit_error').html(data_error.responseJSON.errors.client_Unit);
                                $('#client_Address_error').html(data_error.responseJSON.errors.client_Address);
                                $('#notes_error').html(data_error.responseJSON.errors.notes);
                            }
                        }
                    });
                } else {
                    $.ajax({
                        url: "{{ route('clients.update') }}",
                        dataType: 'json',
                        data: form,
                        type: 'post',
                        beforeSend: function () {
                            $('#client_Name_error').empty();
                            $('#client_Unit_error').empty();
                            $('#client_Address_error').empty();
                            $('#notes_error').empty();
                        }, success: function (data) {
                            var data_id = data.result.id;
                            $("#clientId" + data.result.id).html(data.result.id);
                            $("#clientName" + data.result.id).html(data.result.client_Name);
                            $("#clientUnit" + data.result.id).html(data.result.client_Unit);
                            $("#clientAddress" + data.result.id).html(data.result.client_Address);
                            $("#clientNotes" + data.result.id).html(data.result.notes);
                             $("#clientType" + data.result.id).html(data.result.type);
                            toastr.success(data.msg);
                            $('#add_client_model').modal('hide');
                            $("#clients").trigger('reset');
                        }, error: function (data_error, exception) {
                            if (exception == 'error') {
                                $('#client_Name_error').html(data_error.responseJSON.errors.client_Name);
                                $('#client_Unit_error').html(data_error.responseJSON.errors.client_Unit);
                                $('#client_Address_error').html(data_error.responseJSON.errors.client_Address);
                                $('#notes_error').html(data_error.responseJSON.errors.notes);
                            }
                        }
                    });
                }
            });
            $(document).on('click', '#editClient', function () {
                var id = $(this).data('client-id');
                $.ajax({
                    url: "/clients/" + id + "/edit",
                    dataType: "json",
                    success: function (html) {
                        $('#client_Name').val(html.data.client_Name);
                        $('#client_Unit').val(html.data.client_Unit);
                        $('#client_Address').val(html.data.client_Address);
                        $('#notes').val(html.data.notes);
                         $('#type').val(html.data.type);
                        $('#id').val(html.data.id);
                        $('#add_client_model').modal('show');

                    }
                })
            });
            var client_id;

            $(document).on('click', '#deleteClient', function () {
                client_id = $(this).data('client-id');
                $('#confirmModal').modal('show');
            });

            $('#ok_button').click(function () {
                $.ajax({
                    url: "clients/destroy/" + client_id,
                    beforeSend: function () {
                        $('#ok_button').text('Deleting...');
                    },
                    success: function (data) {
                        setTimeout(function () {
                            $('#confirmModal').modal('hide');
                            $('#userRow' + client_id).remove();
                        }, 100);
                    }
                })
            });
        });
        $(document).ready(function () {
            $(".modal").on("hidden.bs.modal", function () {
                $("#clients").trigger('reset');
            });
        });
    </script>
    <script src="{{url('/plugins/bootstrap-modal/js/bootstrap-modal.js') }}" type="text/javascript"></script>
    <script src="{{url('/plugins/bootstrap-modal/js/bootstrap-modalmanager.js') }}" type="text/javascript"></script>
    <script src="{{url('/js/ui-modals.js') }}" type="text/javascript"></script>
    <script type="text/javascript" src="{{url('/plugins/select2/select2.min.js') }}"></script>
    <script type="text/javascript" src="{{url('/js/table-data.js') }}"></script>
    <script src="{{url('/plugins/DataTables/media/js/DT_bootstrap.js') }}"></script>
    <script src="{{url('/plugins/DataTables/media/js/jquery.dataTables.min.js') }}"></script>

@endsection
@section('scriptDocument')
    UIModals.init();
    TableData.init();

@endsection

