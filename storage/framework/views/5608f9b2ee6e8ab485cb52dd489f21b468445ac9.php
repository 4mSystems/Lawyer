<?php $__env->startSection('styles'); ?>
    <link href="<?php echo e(url('/plugins/bootstrap-modal/css/bootstrap-modal-bs3patch.css')); ?>" rel="stylesheet"
          type="text/css"/>
    <link rel="stylesheet" href="<?php echo e(url('/plugins/jQuery-Tags-Input/jquery.tagsinput.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(url('/plugins/select2/select2.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(url('/plugins/bootstrap-select/bootstrap-select.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(url('/plugins/datepicker/css/datepicker.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(url('/plugins/DataTables/media/css/DT_bootstrap.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(url('/plugins/ladda-bootstrap/dist/ladda-themeless.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(url('/plugins/ladda-bootstrap/dist/ladda.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(url('/plugins/bootstrap-social-buttons/bootstrap-social.css')); ?>">

    <link href="<?php echo e(url('/plugins/bootstrap-modal/css/bootstrap-modal.css')); ?>" rel="stylesheet" type="text/css"/>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>"/>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="main-container inner">
        <!-- start: PAGE -->
        <div class="main-content">
            <div class="container">
                <!-- start: PAGE HEADER -->
                <!-- start: TOOLBAR -->
                <div class="toolbar row">
                    <div class="col-sm-12 hidden-xs">
                        <div class="page-header">
                            <h3 class="text-bold"><?php echo e(trans('site_lang.side_mohdar')); ?> </h3>

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
                                <a href="<?php echo e(route('home')); ?>">
                                    <?php echo e(trans('site_lang.side_home')); ?>

                                </a>
                            </li>
                            <li class="active">
                                <?php echo e(trans('site_lang.side_mohdar')); ?>

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
                                <a class="btn btn-primary" id="addMohdarModal"><i
                                        class="fa fa-plus"></i><?php echo e(trans('site_lang.mohdar_add_mohdar')); ?>

                                </a>
                            </div>
                            <div class="panel-body">
                                <table class="table table-striped table-bordered table-hover table-full-width"
                                       id="mohdar_tbl">
                                    <thead>
                                    <tr>

                                        <th class="hidden-xs center">#</th>
                                        <th class="hidden-xs center"><?php echo e(trans('site_lang.clients_client_type_client')); ?></th>
                                        <th class="hidden-xs center"><?php echo e(trans('site_lang.clients_client_type_khesm')); ?></th>
                                        <th class="hidden-xs center"><?php echo e(trans('site_lang.mohdar_paper_num')); ?></th>
                                        <th class="hidden-xs center"><?php echo e(trans('site_lang.mohdar_court')); ?></th>
                                        <th class="hidden-xs center"><?php echo e(trans('site_lang.home_session_date')); ?></th>
                                        <th class="hidden-xs center"><?php echo e(trans('site_lang.home_session_status')); ?></th>
                                        <th class="hidden-xs center"></th>
                                    </tr>
                                    </thead>
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

                        <h4 class="modal-title" id="modal_title"></h4>
                    </div>
                    <div class="modal-body">
                        <form method="post" id="mohdars">
                            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                            <input type="hidden" name="id" id="id">
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group<?php echo e($errors->has('court_mohdareen')?' has-error':''); ?>">

                                        <input type="text" name="court_mohdareen" class="form-control"
                                               id="court_mohdareen" placeholder="<?php echo e(trans('site_lang.mohdar_court')); ?>"
                                               value="<?php echo e(old('court_mohdareen')); ?>">
                                        <span class="text-danger" id="court_mohdareen_error"></span>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group<?php echo e($errors->has('paper_type')?' has-error':''); ?>">

                                        <input name="paper_type" id="paper_type"
                                               placeholder="<?php echo e(trans('site_lang.mohdar_paper_type')); ?>"
                                               class="form-control"
                                               value="<?php echo e(old('paper_type')); ?>"/>
                                        <span class="text-danger" id="paper_type_error"></span>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group<?php echo e($errors->has('paper_type')?' has-error':''); ?>">
                                        <div class="input-group">
                                            <input type="text" data-date-format="yyyy-mm-dd"
                                                   data-date-viewmode="years" class="form-control date-picker"
                                                   id="deliver_data" name="deliver_data"
                                                   placeholder="<?php echo e(trans('site_lang.mohdar_paper_deliver')); ?>"
                                                   value="<?php echo e(old('deliver_data')); ?>">
                                            <span class="input-group-addon"> <i
                                                    class="fa fa-calendar"></i> </span>
                                        </div>
                                        <span class="text-danger" id="deliver_data_error"></span>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group<?php echo e($errors->has('paper_Number')?' has-error':''); ?>">
                                        <input name="paper_Number" id="paper_Number"
                                               placeholder="<?php echo e(trans('site_lang.mohdar_paper_num')); ?>"
                                               class="form-control"
                                               value="<?php echo e(old('paper_Number')); ?>"/>
                                        <span class="text-danger" id="paper_Number_error"></span>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group<?php echo e($errors->has('session_Date')?' has-error':''); ?>">
                                        <div class="input-group">
                                            <input type="text" data-date-format="yyyy-mm-dd"
                                                   placeholder="<?php echo e(trans('site_lang.home_session_date')); ?>"
                                                   data-date-viewmode="years" class="form-control date-picker"
                                                   id="session_Date" name="session_Date"
                                                   value="<?php echo e(old('session_Date')); ?>">
                                            <span class="input-group-addon"> <i
                                                    class="fa fa-calendar"></i> </span>
                                        </div>
                                        <span class="text-danger" id="session_Date_error"></span>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12" id="mokel_container">
                                    <div class="form-group<?php echo e($errors->has('mokel_Name')?' has-error':''); ?>">
                                        <select multiple="multiple"
                                                id="mokel_Name" name="mokel_Name[]"
                                                class="form-control search-select">
                                        </select>
                                        <span class="text-danger" id="mokel_Name_error"></span>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12" id="khesm_container">
                                    <div class="form-group<?php echo e($errors->has('khesm_Name')?' has-error':''); ?>">
                                        <select multiple="multiple"
                                                id="Opponent" name="khesm_Name[]"
                                                class="form-control search-select2">

                                        </select>
                                        <span class="text-danger" id="khesm_Name_error"></span>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group<?php echo e($errors->has('case_number')?' has-error':''); ?>">

                                        <input name="case_number" id="case_number"
                                               placeholder="<?php echo e(trans('site_lang.home_session_case_number')); ?>"
                                               class="form-control"
                                               value="<?php echo e(old('case_number')); ?>"/>
                                        <span class="text-danger" id="case_number_error"></span>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group<?php echo e($errors->has('notes')?' has-error':''); ?>">

                                        <input name="notes" id="notes" placeholder="<?php echo e(trans('site_lang.mohdar_notes')); ?>"
                                               class="form-control"
                                               value="<?php echo e(old('notes')); ?>"/>
                                        <span class="text-danger" id="notes_error"></span>
                                    </div>
                                </div>

                                <?php
                                    $user_type = auth()->user()->type;
                                    if($user_type == 'admin'){
                                ?>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group<?php echo e($errors->has('cat_id')?' has-error':''); ?>">
                                        <select id="form-field-select-3" class="form-control select2-arrow"
                                                name="cat_id">
                                            <option value="">
                                                &nbsp;<?php echo e(trans('site_lang.add_case_to_whom')); ?></option>
                                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option
                                                    value='<?php echo e($category->id); ?>'><?php echo e($category->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <span class="text-danger" id="To_error"></span>
                                    </div>
                                </div>
                                <?php
                                    }
                                ?>
                            </div>
                            <div class="form-group right">
                                <button data-dismiss="modal" class="btn btn-default" type="button">
                                    <?php echo e(trans('site_lang.public_close_btn_text')); ?>

                                </button>
                                <input type="submit" class="btn btn-primary" id="add_mohdar" name="add_mohdar"
                                       value="<?php echo e(trans('site_lang.public_add_btn_text')); ?>"/>
                            </div>
                        </form>

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
                        <h4 class="modal-title" id="modal_title"></h4>
                    </div>
                    <div class="modal-body">

                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong><?php echo e(trans('site_lang.mohdar_court')); ?></strong>
                                    <div class="well well-sm">
                                        <span id="court_mohdareen_show"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong><?php echo e(trans('site_lang.mohdar_paper_type')); ?></strong>
                                    <div class="well well-sm">
                                        <span id="paper_type_show"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong><?php echo e(trans('site_lang.mohdar_paper_deliver')); ?></strong>
                                    <p id="deliver_data">
                                    <div class="well well-sm">
                                        <span id="deliver_data_show"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong><?php echo e(trans('site_lang.mohdar_paper_num')); ?></strong>
                                    <div class="well well-sm">
                                        <span id="paper_Number_show"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong><?php echo e(trans('site_lang.home_session_date')); ?></strong>
                                    <div class="well well-sm">
                                        <span id="session_Date_show"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong><?php echo e(trans('site_lang.clients_client_type_client')); ?></strong>
                                    <div class="well well-sm">
                                        <span id="mokel_Name_show"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12" id="khesm_container">
                                <div class="form-group">
                                    <strong for="khesm_Name">
                                        <?php echo e(trans('site_lang.clients_client_type_khesm')); ?>

                                    </strong>
                                    <div class="well well-sm">
                                        <span id="khesm_Name_show"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>
                                        <?php echo e(trans('site_lang.home_session_case_number')); ?>

                                    </strong>
                                    <div class="well well-sm">
                                        <span id="case_number_show"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group<?php echo e($errors->has('notes')?' has-error':''); ?>">
                                    <strong>
                                        <?php echo e(trans('site_lang.mohdar_notes')); ?>

                                    </strong>
                                    <div class="well well-sm">
                                        <span id="notes_show"></span>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button data-dismiss="modal" class="btn btn-default" type="button">
                                <?php echo e(trans('site_lang.public_close_btn_text')); ?>

                            </button>

                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>


                <!-- /.modal-dialog -->
            </div>
        </div>
        
        <div id="confirmModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <h4 align="center" style="margin:0;"> <?php echo e(trans('site_lang.public_delete_modal_text')); ?></h4>
                    </div>
                    <div class="modal-footer">
                        <button type="button" name="ok_button" id="ok_button"
                                class="btn btn-danger"><?php echo e(trans('site_lang.public_accept_btn_text')); ?></button>
                        <button type="button" class="btn btn-default"
                                data-dismiss="modal"><?php echo e(trans('site_lang.public_close_btn_text')); ?></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>

    <script src="<?php echo e(url('/plugins/toastr/toastr.js')); ?>"></script>

    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).ready(function () {
            $('#mohdar_tbl').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "<?php echo e(route('mohdareen.index')); ?>",
                },
                columns: [
                    {
                        data: 'moh_Id',
                        name: 'moh_Id',
                        className: 'center'
                    },
                    {
                        data: 'mokel_Name',
                        name: 'mokel_Name',
                        className: 'center'
                    },
                    {
                        data: 'khesm_Name',
                        name: 'khesm_Name',
                        className: 'center'
                    },
                    {
                        data: 'paper_Number',
                        name: 'paper_Number',
                        className: 'center'
                    },
                    {
                        data: 'court_mohdareen',
                        name: 'court_mohdareen',
                        className: 'center'
                    },
                    {
                        data: 'session_Date',
                        name: 'session_Date',
                        className: 'center'
                    },
                    {
                        data: 'status',
                        name: 'status',
                        className: 'center'
                    },

                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        className: 'center'
                    }
                ]
            });
            $('#addMohdarModal').click(function () {
                $('#mokel_Name').empty();
                $('#Opponent').empty();
                $.ajax({
                    url: "<?php echo e(route('getClients')); ?>",
                    dataType: 'json',
                    type: 'get',
                    success: function (data) {
                        $.each(data.khesm, function (i, index) {
                            $('#Opponent').append(`<option value="${index.client_Name}">${index.client_Name}</option>`);
                        });
                        $.each(data.clients, function (i, index) {
                            $('#mokel_Name').append(`<option value="${index.client_Name}">${index.client_Name}</option>`);
                        });
                    }
                });

                $('#modal_title').text("<?php echo e(trans('site_lang.mohdar_add_mohdar')); ?>");
                $('#add_mohdar').val("<?php echo e(trans('site_lang.public_add_btn_text')); ?>");
                $('#add_mohdar_model').modal('show');
            });
            $('#mohdars').on('submit', function (event) {
                event.preventDefault();
                if ($('#add_mohdar').val() == '<?php echo e(trans('site_lang.public_add_btn_text')); ?>') {
                    $.ajax({
                        url: "<?php echo e(route('mohdareen.store')); ?>",
                        method: 'post',
                        data: new FormData(this),
                        contentType: false,
                        cache: false,
                        processData: false,
                        dataType: "json",
                        beforeSend: function () {
                            $('#court_mohdareen_error').empty();
                            $('#paper_type_error').empty();
                            $('#deliver_data_error').empty();
                            $('#session_Date_error').empty();
                            $('#mokel_Name_error').empty();
                            $('#khesm_Name_error').empty();
                            $('#case_number_error').empty();
                        },
                        success: function (data) {
                            $('#add_mohdar_model').modal('hide');
                            toastr.success(data.success);
                            $("#mohdars").trigger('reset');
                            $('#mohdar_tbl').DataTable().ajax.reload();
                        }, error: function (data_error, exception) {
                            if (exception == 'error') {
                                $('#court_mohdareen_error').html(data_error.responseJSON.errors.court_mohdareen);
                                $('#paper_type_error').html(data_error.responseJSON.errors.paper_type);
                                $('#deliver_data_error').html(data_error.responseJSON.errors.deliver_data);
                                $('#session_Date_error').html(data_error.responseJSON.errors.session_Date);
                                $('#mokel_Name_error').html(data_error.responseJSON.errors.mokel_Name);
                                $('#khesm_Name_error').html(data_error.responseJSON.errors.khesm_Name);
                                $('#case_number_error').html(data_error.responseJSON.errors.case_number);
                                $('#To_error').html(data_error.responseJSON.errors.cat_id);

                            }
                        }
                    });
                } else {
                    $.ajax({
                        url: "<?php echo e(route('mohdareen.update')); ?>",
                        method: "POST",
                        data: new FormData(this),
                        contentType: false,
                        cache: false,
                        processData: false,
                        dataType: "json",
                        beforeSend: function () {
                            $('#court_mohdareen_error').empty();
                            $('#paper_type_error').empty();
                            $('#deliver_data_error').empty();
                            $('#session_Date_error').empty();
                            $('#mokel_Name_error').empty();
                            $('#khesm_Name_error').empty();
                            $('#case_number_error').empty();
                            $('#cat_id').empty();
                        }, success: function (data) {
                            $('#add_mohdar_model').modal('hide');
                            toastr.success(data.msg);
                            $("#mohdars").trigger('reset');
                            $('#mohdar_tbl').DataTable().ajax.reload();
                        }, error: function (data_error, exception) {
                            if (exception == 'error') {
                                $('#court_mohdareen_error').html(data_error.responseJSON.errors.court_mohdareen);
                                $('#paper_type_error').html(data_error.responseJSON.errors.paper_type);
                                $('#deliver_data_error').html(data_error.responseJSON.errors.deliver_data);
                                $('#session_Date_error').html(data_error.responseJSON.errors.session_Date);
                                $('#mokel_Name_error').html(data_error.responseJSON.errors.mokel_Name);
                                $('#khesm_Name_error').html(data_error.responseJSON.errors.khesm_Name);
                                $('#case_number_error').html(data_error.responseJSON.errors.case_number);
                                 $('#To_error').html(data_error.responseJSON.errors.cat_id);

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
                        $("#form-field-select-3").val(html.data.cat_id);
                        $('#id').val(html.data.moh_Id);
                        $('#mokel_container').hide();
                        $('#khesm_container').hide();
                        $('#modal_title').text("<?php echo e(trans('site_lang.mohdar_edit_mohdar')); ?>");
                        $('#add_mohdar').val("<?php echo e(trans('site_lang.public_edit_btn_text')); ?>");
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
                        $('.modal-title').text("<?php echo e(trans('site_lang.mohdar_edit_mohdar')); ?>");
                        $('#show_mohdar_model').modal('show');
                    }
                })
            });
            $(document).on('click', '.btn-sm', function () {
                var id = $(this).data('moh-Id');
                $.ajax({
                    url: "mohdareen/updateStatus/" + id,
                    dataType: "json",
                    success: function (html) {
                        toastr.error(html.msg);
                        $('#mohdar_tbl').DataTable().ajax.reload();
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
                            $('#mohdar_tbl').DataTable().ajax.reload();
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
    <script>
        // global app configuration object
        var config = {
            trans: {
                select2_place_holder: "<?php echo e(trans('site_lang.clients_client_type_client_hint')); ?>",
                select1_place_holder: "<?php echo e(trans('site_lang.clients_client_type_khesm_hint')); ?>",

            }
        };
    </script>
    <script src="<?php echo e(url('/plugins/bootstrap-modal/js/bootstrap-modal.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(url('/plugins/bootstrap-modal/js/bootstrap-modalmanager.js')); ?>"
            type="text/javascript"></script>
    <script src="<?php echo e(url('/plugins/select2/select2.min.js')); ?>"></script>
    <script src="<?php echo e(url('/plugins/bootstrap-select/bootstrap-select.min.js')); ?>"></script>
    <script src="<?php echo e(url('/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js')); ?>"></script>
    <script src="<?php echo e(url('/plugins/jQuery-Tags-Input/jquery.tagsinput.js')); ?>"></script>
    <script src="<?php echo e(url('/plugins/DataTables/media/js/jquery.dataTables.min.js')); ?>"></script>
    <script src="<?php echo e(url('/plugins/DataTables/media/js/DT_bootstrap.js')); ?>"></script>
    <script src="<?php echo e(url('/plugins/ladda-bootstrap/dist/ladda.min.js')); ?>"></script>
    <script src="<?php echo e(url('/plugins/ladda-bootstrap/dist/spin.min.js')); ?>"></script>
    <script src="<?php echo e(url('/js/ui-modals.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(url('/js/form-elements.js')); ?>"></script>
    <script src="<?php echo e(url('/js/table-data.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(url('/js/ui-buttons.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(url('/js/main.js')); ?>" type="text/javascript"></script>


<?php $__env->stopSection(); ?>
<?php $__env->startSection('scriptDocument'); ?>
    TableData.init();
    UIModals.init();
    FormElements.init();
    UIButtons.init();
<?php $__env->stopSection(); ?>

<?php echo $__env->make('welcome', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Lawyer\resources\views/mohdareen/mohdareen.blade.php ENDPATH**/ ?>