<?php $__env->startSection('styles'); ?>
    <link href="<?php echo e(url('/plugins/bootstrap-modal/css/bootstrap-modal-bs3patch.css')); ?>" rel="stylesheet"
          type="text/css"/>
    <link href="<?php echo e(url('/plugins/bootstrap-modal/css/bootstrap-modal.css')); ?>" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo e(url('/plugins/select2/select2.css')); ?>"/>
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
                            <h3 class="text-bold"><?php echo e(trans('site_lang.side_categories')); ?> </h3>
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
                                <?php echo e(trans('site_lang.side_categories')); ?>

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
                                <a class="btn btn-primary" id="addCategoryModal"><i
                                        class="fa fa-plus"></i><?php echo e(trans('site_lang.add_new_category_text')); ?> </a>
                            </div>
                            <div class="panel-body">

                                <table class="table table-striped table-bordered table-hover table-full-width"
                                       id="categories_tbl">
                                    <thead>
                                    <tr>
                                        <th class="center">#</th>
                                        <th class="center"><?php echo e(trans('site_lang.clients_client_name')); ?></th>
                                        <th class="center"></th>
                                    </tr>
                                    </thead>

                                </table>
                            </div>
                        </div>
                        <!-- end: DYNAMIC TABLE PANEL -->
                    </div>
                </div>

            </div>
        </div>
        <!-- end: PAGE -->
        <div id="add_category_model" aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1"
             class="modal bs-example-modal-basic fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="modal_title"></h4>
                    </div>
                    <div class="modal-body">
                        <form method="post" id="categories">
                            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                            <input type="hidden" name="id" id="id">
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group<?php echo e($errors->has('name')?' has-error':''); ?>">
                                        <input type="text" name="name" class="form-control" id="name"
                                               placeholder="<?php echo e(trans('site_lang.category_name')); ?>"
                                               value="<?php echo e(old('name')); ?>">
                                        <span class="text-danger" id="category_name_error"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group right">
                                <button data-dismiss="modal" class="btn btn-default" type="button">
                                    <?php echo e(trans('site_lang.public_close_btn_text')); ?>

                                </button>
                                <input type="submit" class="btn btn-primary" id="add_category" name="add_category"
                                       value="<?php echo e(trans('site_lang.public_add_btn_text')); ?>"/>
                            </div>
                        </form>

                    </div>

                </div>
                <!-- /.modal-content -->
            </div>


            <!-- /.modal-dialog -->
        </div>
        
        <div id="confirmModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">

                    <div class="modal-body">
                        <h4 align="center" style="margin:0;"><?php echo e(trans('site_lang.public_delete_modal_text')); ?></h4>
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
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        // global app configuration object
        var config = {
            routes: {
                get_category_route: "<?php echo e(route('categories.index')); ?>",
                add_category_route: "<?php echo e(route('categories.store')); ?>",
                update_category_route: "<?php echo e(route('categories.update')); ?>",
                add_note_route: "<?php echo e(route('notes.store')); ?>",
                update_note_route: "<?php echo e(route('notes.update')); ?>",
                update_case_data: "<?php echo e(route('caseDetails.updateCase')); ?>",
                add_new_client: "<?php echo e(route('caseDetails.addNewClient')); ?>",
            }, trans: {

                add_new_category_text: "<?php echo e(trans('site_lang.add_new_category_text')); ?>",
                edit_category_text: "<?php echo e(trans('site_lang.edit_category_text')); ?>",
                public_continue_delete_modal_text: "<?php echo e(trans('site_lang.public_continue_delete_modal_text')); ?>",
                public_delete_modal_text: "<?php echo e(trans('site_lang.public_delete_modal_text')); ?>",
                public_delete_text: "<?php echo e(trans('site_lang.public_delete_text')); ?>",
                public_add_btn_text: "<?php echo e(trans('site_lang.public_add_btn_text')); ?>",
                edit_public: "<?php echo e(trans('site_lang.public_edit_btn_text')); ?>",
                search_case_session_modal_title_edit: "<?php echo e(trans('site_lang.search_case_session_modal_title_edit')); ?>",
                public_edit_btn_text: "<?php echo e(trans('site_lang.public_edit_btn_text')); ?>",
                search_case_add_client: "<?php echo e(trans('site_lang.search_case_add_client')); ?>",
            }

        };

    </script>
    <script src="<?php echo e(url('/js/categories.js')); ?>"></script>
    <script src="<?php echo e(url('/plugins/bootstrap-modal/js/bootstrap-modal.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(url('/plugins/bootstrap-modal/js/bootstrap-modalmanager.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(url('/js/ui-modals.js')); ?>" type="text/javascript"></script>
    <script type="text/javascript" src="<?php echo e(url('/plugins/select2/select2.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(url('/js/table-data.js')); ?>"></script>
    <script src="<?php echo e(url('/plugins/DataTables/media/js/DT_bootstrap.js')); ?>"></script>
    <script src="<?php echo e(url('/plugins/DataTables/media/js/jquery.dataTables.min.js')); ?>"></script>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('scriptDocument'); ?>
    UIModals.init();
    TableData.init();

<?php $__env->stopSection(); ?>


<?php echo $__env->make('welcome', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Lawyer\resources\views/categories/categories.blade.php ENDPATH**/ ?>