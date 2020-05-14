@extends('welcome')
@section('styles')
    <link href="{{url('/plugins/bootstrap-modal/css/bootstrap-modal-bs3patch.css') }}" rel="stylesheet"
          type="text/css"/>
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
                            <h1>Users <small>overview &amp; stats </small></h1>
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
                                Users
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
                                <h4 class="panel-title"><span class="text-bold">All Users</span></h4>
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
                                                <a class="panel-config" href="#panel-config" data-toggle="modal"> <i
                                                        class="fa fa-wrench"></i> <span>Configurations</span></a>
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
                                <div class="btn-group pull-right">
                                    <a class="btn btn-primary" id="addUserModal"><i class="fa fa-plus"></i> Add User</a>
                                </div>
                                <table class="table table-striped table-hover" id="list_users">
                                    <thead>
                                    <tr>
                                        <th class="center">#</th>
                                        {{--                                        <th class="center">Photo</th>--}}
                                        <th>user Name</th>
                                        <th class="hidden-xs">Email</th>
                                        <th class="hidden-xs">type</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($users as $user)
                                        @include('users.users_item')
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
        <div id="add_user_model" aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1"
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
                        <form method="post" id="users">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <input type="hidden" name="id" id="id">
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group{{$errors->has('name')?' has-error':''}}">
                                        <strong>Name:</strong>
                                        <input type="text" name="name" class="form-control" id="name" placeholder="Name"
                                               value="{{ old('name') }}">
                                        <span class="text-danger" id="name_error"></span>
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group{{$errors->has('email')?' has-error':''}}">
                                        <strong>Detail:</strong>
                                        <input name="email" id="email" rows="10" placeholder="email"
                                               class="form-control"
                                               value="{{ old('email') }}"/>
                                        <span class="text-danger" id="email_error"></span>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group{{$errors->has('password')?' has-error':''}}">
                                        <strong>Password:</strong>
                                        <input type="password" name="password" id="password" class="form-control"
                                               placeholder="password"
                                               value="{{ old('password') }}">
                                        <span class="text-danger" id="password_error"></span>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group{{$errors->has('type')?' has-error':''}}">
                                        <select id="form-field-select-1" name="form-field-select-1"
                                                class="form-control">
                                            <option value="" selected="selected">&nbsp;</option>
                                            <option value="Admin">ِAdmin</option>
                                            <option value="User">User</option>
                                        </select>
                                        <span class="text-danger" id=type_error"></span>
                                    </div>
                                </div>
                            </div>
                        </form>

                    </div>
                    <div class="modal-footer">
                        <button data-dismiss="modal" class="btn btn-default" type="button">
                            Close
                        </button>
                        <input type="submit" class="btn btn-primary" id="add_user" name="add_user" value="Add"/>
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
            $('#addUserModal').click(function () {
                $('.modal-title').text("Add New User");
                $('#add_user').val("Add");
                $('#add_user_model').modal('show');
            });

            $('#add_user').click(function () {
                var form = $('#users').serialize() + '&type=' + $('select option:selected').text();
                if ($('#add_user').val() == 'Add') {
                    $.ajax({
                        url: "{{route('users.store')}}",
                        dataType: 'json',
                        data: form,
                        type: 'post',
                        beforeSend: function () {
                            $('#name_error').empty();
                            $('#password_error').empty();
                            $('#email_error').empty();
                        }, success: function (data) {
                            // if (data.status == true) {
                            $('#list_users tbody').append(data.result);
                            $('#add_user_model').modal('hide');
                            toastr.success(data.msg);
                            $("#users").trigger('reset');
                        }, error: function (data_error, exception) {
                            if (exception == 'error') {
                                $('#name_error').html(data_error.responseJSON.errors.name);
                                $('#password_error').html(data_error.responseJSON.errors.password);
                                $('#email_error').html(data_error.responseJSON.errors.email);
                                $('#type_error').html(data_error.responseJSON.errors.type);
                            }
                        }
                    });
                } else {
                    $.ajax({
                        url: "{{ route('users.update') }}",
                        dataType: 'json',
                        data: form,
                        type: 'post',
                        beforeSend: function () {
                            $('#name_error').empty();
                            $('#password_error').empty();
                            $('#email_error').empty();
                        }, success: function (data) {
                            console.log(data);
                            var data_id = data.result.id;
                            console.log(data_id);
                            $("#userId" + data.result.id).html(data.result.id);
                            $("#userName" + data.result.id).html(data.result.name);
                            $("#userEmail" + data.result.id).html(data.result.email);
                            $("#userType" + data.result.id).html(data.result.type);
                            toastr.success(data.msg);
                            $('#add_user_model').modal('hide');
                        }, error: function (data_error, exception) {
                            if (exception == 'error') {
                                $('#name_error').html(data_error.responseJSON.errors.name);
                                $('#password_error').html(data_error.responseJSON.errors.password);
                                $('#email_error').html(data_error.responseJSON.errors.email);
                                $('#type_error').html(data_error.responseJSON.errors.type);
                            }
                        }
                    });
                }
            });
            $(document).on('click', '#editUser', function () {
                var id = $(this).data('user-id');
                $.ajax({
                    url: "/users/" + id + "/edit",
                    dataType: "json",
                    success: function (html) {
                        $('#name').val(html.data.name);
                        $('#email').val(html.data.email);
                        $('#password').val(html.data.password);
                        $('#id').val(html.data.id);
                        if (html.data.type == "Admin") {
                            $('#form-field-select-1 option[value=Admin]').attr('selected', 'selected');
                        } else {
                            $('#form-field-select-1 option[value=User]').attr('selected', 'selected');
                        }
                        $('.modal-title').text("Edit User");
                        $('#add_user').val("Edit");
                        $('#add_user_model').modal('show');

                    }
                })
            });
            var user_id;

            $(document).on('click', '#deleteUser', function () {
                user_id = $(this).data('user-id');
                $('#confirmModal').modal('show');
            });

            $('#ok_button').click(function () {
                $.ajax({
                    url: "users/destroy/" + user_id,
                    beforeSend: function () {
                        $('#ok_button').text('Deleting...');
                    },
                    success: function (data) {
                        setTimeout(function () {
                            $('#confirmModal').modal('hide');
                            $('#userRow' + user_id).remove();
                        }, 2000);
                    }
                })
            });
        });
        $(document).ready(function () {
            $(".modal").on("hidden.bs.modal", function () {
                $("#users").trigger('reset');
            });
        });
    </script>
    <script src="{{url('/plugins/bootstrap-modal/js/bootstrap-modal.js') }}" type="text/javascript"></script>
    <script src="{{url('/plugins/bootstrap-modal/js/bootstrap-modalmanager.js') }}" type="text/javascript"></script>
    <script src="{{url('/js/ui-modals.js') }}" type="text/javascript"></script>

@endsection
@section('scriptDocument')
    UIModals.init();
@endsection

