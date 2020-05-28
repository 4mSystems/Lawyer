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

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
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
                            <h1><?php echo e(trans('site_lang.side_home')); ?> <small><?php echo e(trans('site_lang.side_welcome')); ?></small></h1>
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
                            <div class="panel-heading">
                                <h5 class="text-bold"><?php echo e(trans('site_lang.add_new_attachments')); ?></h5>
                            </div>

                            <div class="card-body">
                                <?php echo Form::model($attachment, ['url' => ['attachment/'.$attachment->id.'/update'] , 'method'=>'post' ,'files'=> true]); ?>

                                <?php echo csrf_field(); ?>


                                <div class="form-group">
                                    <?php echo e(Form::label('img_Description','Description ')); ?>

                                    <?php echo e(Form::textarea('img_Description',$attachment->img_Description,["class"=>"form-control"])); ?>

                                </div>

                                <div class="form-group">
                                    <?php echo e(Form::label('img_Url','attachments Files')); ?>

                                    <?php echo e(Form::file('img_Url', ["class"=>"form-control"])); ?>


                                    <img
                                        src="<?php echo e(url('uploads/attachments/'.$attachment->img_Url)); ?>"
                                        style="width:150px;height:150px;"/>
                                </div>

                                <?php echo e(Form::submit( trans('admin.edit') ,['class'=>'btn btn-primary'])); ?>

                                <?php echo e(Form::close()); ?>

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


<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <script src="<?php echo e(url('/plugins/toastr/toastr.js')); ?>"></script>

    <script>



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

<?php echo $__env->make('welcome', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Lawyer\resources\views/attachment/edit.blade.php ENDPATH**/ ?>