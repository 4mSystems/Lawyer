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

            <div class="container">
                <!-- start: PAGE HEADER -->
                <!-- start: TOOLBAR -->
                <div class="toolbar row" style="direction:rtl;">
                    <div class="col-sm-12 hidden-xs">
                        <div class="page-header">
                            <h3 class="text-bold"><?php echo e(trans('site_lang.attachments_edit_attach')); ?></h3>
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
                                <?php echo Form::model($attachment, ['url' => ['clientattachment/'.$attachment->id.'/update'] , 'method'=>'post' ,'files'=> true]); ?>

                                <?php echo csrf_field(); ?>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <?php echo e(Form::label('img_Description',trans('site_lang.attachments_desc_attach'))); ?>

                                        <?php echo e(Form::textarea('img_Description',$attachment->img_Description,["class"=>"form-control"])); ?>

                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <?php echo e(Form::label('img_Url',trans('site_lang.attachments_file_attach'))); ?>

                                        <?php echo e(Form::file('img_Url', ["class"=>"form-control"])); ?>



                                        <!-- <img
                                            src="<?php echo e(url('uploads/client/attachments/'.$attachment->img_Url)); ?>"
                                            style="width:150px;height:150px;"/> -->


                                            <?php if(!empty($attachment->img_Url)): ?>
                                                    <?php
                                                        $allowedMimeTypes = ['image/jpeg','image/gif','image/png','image/bmp','image/svg+xml'];
                                                    ?>
                                                    <?php if(! in_array( mime_content_type('uploads/client/attachments/'.$attachment->img_Url), $allowedMimeTypes)): ?>
                                                        <a href="<?php echo e(url('uploads/client/attachments/'.$attachment->img_Url)); ?>"
                                                           target="_blank"> <img
                                                                src="<?php echo e(url('uploads/attachments/file.jpg')); ?>"
                                                                style="width:75px;height:50px;"/>
                                                        </a>
                                                    <?php else: ?>
                                                        <a href="<?php echo e(url('uploads/client/attachments/'.$attachment->img_Url)); ?>"
                                                           target="_blank"> <img
                                                                src="<?php echo e(url('uploads/client/attachments/'.$attachment->img_Url)); ?>"
                                                                style="width:50px;height:50px;"/>
                                                        </a>
                                                    <?php endif; ?>
                                                <?php endif; ?>


                                    </div>
                                </div>
                                <?php echo e(Form::submit( trans('site_lang.public_edit_btn_text') ,['class'=>'btn btn-primary center-block'])); ?>

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

<?php echo $__env->make('welcome', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/elnagar/php projects/Lawyer/resources/views/clientattachment/edit.blade.php ENDPATH**/ ?>