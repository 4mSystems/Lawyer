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
                                {{trans('site_lang.side_users')}}
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
                                <h4 class="panel-title"><span class="text-bold">{{trans('site_lang.users_all')}}</span>
                                </h4>
                            </div>
                            <div class="panel-body">
                                <div class="btn-group pull-right">
                                    <a class="btn btn-primary" id="addUserModal"><i
                                            class="fa fa-plus"></i>{{trans('site_lang.home_add_user')}}</a>
                                    <br>

                                </div>
                                <table class="table table-striped table-hover" id="list_users">
                                    <thead>
                                    <tr>
                                        <th class="hidden-xs center">#</th>
                                        {{--                                        <th class="center">Photo</th>--}}
                                        <th class="hidden-xs center">{{trans('site_lang.users_username')}}</th>
                                        <th class="hidden-xs center">{{trans('site_lang.users_email')}}</th>
                                        <th class="hidden-xs center">{{trans('site_lang.users_type')}}</th>
                                        <th class="hidden-xs center"></th>
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
                        <h4 class="modal-title" id="user_modal_title"></h4>
                    </div>
                    <div class="modal-body">
                        <form method="post" id="users">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <input type="hidden" name="id" id="id">
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group{{$errors->has('name')?' has-error':''}}">
                                        <input type="text" name="name" class="form-control" id="name" required
                                               placeholder="{{trans('site_lang.users_username')}}"
                                               value="{{ old('name') }}">
                                        <span class="text-danger" id="name_error"></span>
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group{{$errors->has('email')?' has-error':''}}">
                                        <input name="email" id="email" placeholder="{{trans('site_lang.users_email')}}"
                                               required
                                               class="form-control"
                                               value="{{ old('email') }}"/>
                                        <span class="text-danger" id="email_error"></span>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group{{$errors->has('password')?' has-error':''}}">
                                        <input type="password" name="password" id="password" class="form-control"
                                               required
                                               placeholder="{{trans('site_lang.auth_password')}}"
                                               value="{{ old('password') }}">
                                        <span class="text-danger" id="password_error"></span>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group{{$errors->has('type')?' has-error':''}}">
                                        <select id="type" name="type" required
                                                class="form-control">
                                            <option value="" selected="selected">&nbsp;</option>
                                            <option value="Admin">ِAdmin</option>
                                            <option value="User">User</option>
                                        </select>
                                        <span class="text-danger" id=type_error"></span>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group{{$errors->has('cat_id')?' has-error':''}}">
                                        <select id="form-field-select-3" class="form-control select2-arrow"
                                                name="cat_id">
                                            <option value="">
                                                &nbsp;{{trans('site_lang.add_case_to_whom')}}</option>
                                            @foreach($categories as $category)
                                                <option
                                                    value='{{$category->id}}'>{{$category->name}}</option>
                                            @endforeach
                                        </select>
                                        <span class="text-danger" id="cat_id"></span>
                                    </div>
                                </div>
                            </div>
                        </form>

                    </div>
                    <div class="modal-footer">
                        <button data-dismiss="modal" class="btn btn-default" type="button">
                            {{trans('site_lang.public_close_btn_text')}}
                        </button>
                        <input type="submit" class="btn btn-primary" id="add_user" name="add_user"
                               value="{{trans('site_lang.public_add_btn_text')}}"/>
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
                    <div class="modal-body">
                        <h4 align="center" style="margin:0;">{{trans('site_lang.public_delete_modal_text')}}</h4>
                    </div>
                    <div class="modal-footer">
                        <button type="button" name="ok_button" id="ok_button"
                                class="btn btn-danger">{{trans('site_lang.public_accept_btn_text')}}</button>
                        <button type="button" class="btn btn-default"
                                data-dismiss="modal">{{trans('site_lang.public_close_btn_text')}}</button>
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
                $('#user_modal_title').text("{{trans('site_lang.users_add_new')}}");
                $('#add_user').val("{{trans('site_lang.public_add_btn_text')}}");
                $('#add_user_model').modal('show');
            });

            $('#add_user').click(function () {
                var form = $('#users').serialize();
                if ($('#add_user').val() == '{{trans('site_lang.public_add_btn_text')}}') {
                    $.ajax({
                        url: "{{route('users.store')}}",
                        dataType: 'json',
                        data: form,
                        type: 'post',
                        beforeSend: function () {
                            $('#name_error').empty();
                            $('#password_error').empty();
                            $('#email_error').empty();
                            $('#cat_id').empty();
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
                                $('#cat_id').html(data_error.responseJSON.errors.cat_id);
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
                        $('#user_modal_title').text("{{trans('site_lang.users_edit_user')}}");
                        $('#add_user').val("{{trans('site_lang.public_edit_btn_text')}}");
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
                        $('#ok_button').text('{{trans('site_lang.public_continue_delete_modal_text')}}');
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

