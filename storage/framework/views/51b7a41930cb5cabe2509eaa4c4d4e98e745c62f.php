<?php $__env->startSection('styles'); ?>
    <link rel="stylesheet" href="<?php echo e(url('/plugins/jQuery-Tags-Input/jquery.tagsinput.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(url('/plugins/select2/select2.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(url('/plugins/bootstrap-select/bootstrap-select.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(url('/plugins/datepicker/css/datepicker.css')); ?>">
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
                            <h1><?php echo e(trans('site_lang.add_case_title')); ?>

                                <small><?php echo e(trans('site_lang.add_case_header')); ?></small></h1>
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
                                <?php echo e(trans('site_lang.add_case_header')); ?>

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

                            </div>
                            <div class="panel-body">
                                <form method="post" id="new_case" >
                                    <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                    <input type="hidden" name="id" id="id">
                                    <div class="row">
                                        <div class="col-xs-6 col-sm-6 col-md-6">
                                            <div class="form-group<?php echo e($errors->has('mokel')?' has-error':''); ?>">

                                                <select multiple="multiple" id="form-field-select-4"
                                                        id="mokel" name="mokel_name[]"
                                                        class="form-control search-select">
                                                    <?php $__currentLoopData = $clients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $client): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option
                                                            value='<?php echo e($client->id); ?>'><?php echo e($client->client_Name); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                </select>
                                                <span class="text-danger" id="mokel_error"></span>
                                            </div>
                                        </div>
                                        <div class="col-xs-6 col-sm-6 col-md-6">
                                            <div class="form-group<?php echo e($errors->has('khesm')?' has-error':''); ?>">

                                                <select multiple="multiple" id="Opponent" name="khesm_name[]"
                                                        class="form-control search-select2">
                                                    <?php $__currentLoopData = $khesm; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $khesm): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option
                                                            value='<?php echo e($khesm->id); ?>'><?php echo e($khesm->client_Name); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                </select>
                                                <span class="text-danger" id="khesm_error"></span>
                                            </div>
                                        </div>
                                        <div class="col-xs-6 col-sm-6 col-md-6">
                                            <div class="form-group<?php echo e($errors->has('invetation_num')?' has-error':''); ?>">
                                                <input type="text" name="invetation_num" class="form-control"
                                                       id="invetation_num"
                                                       placeholder="<?php echo e(trans('site_lang.home_session_case_number')); ?>"
                                                       value="<?php echo e(old('case_Number')); ?>">
                                                <span class="text-danger" id="case_Number_error"></span>
                                            </div>
                                        </div>
                                        <div class="col-xs-6 col-sm-6 col-md-6">
                                            <div class="form-group<?php echo e($errors->has('circle_num')?' has-error':''); ?>">

                                                <input type="text" name="circle_num" class="form-control"
                                                       id="circle_num"
                                                       placeholder="<?php echo e(trans('site_lang.add_case_circle_num')); ?>"
                                                       value="<?php echo e(old('circle_num')); ?>">
                                                <span class="text-danger" id="circle_Number_error"></span>
                                            </div>
                                        </div>
                                        <div class="col-xs-6 col-sm-6 col-md-6">
                                            <div class="form-group<?php echo e($errors->has('court')?' has-error':''); ?>">
                                                <input type="text" name="court" class="form-control"
                                                       id="court"
                                                       placeholder="<?php echo e(trans('site_lang.add_case_court')); ?>"
                                                       value="<?php echo e(old('court')); ?>">
                                                <span class="text-danger" id="court_Name_error"></span>
                                            </div>
                                        </div>
                                        <div class="col-xs-6 col-sm-6 col-md-6">
                                            <div
                                                class="form-group<?php echo e($errors->has('first_session_date')?' has-error':''); ?>">

                                                <div class="input-group">
                                                    <input type="text" data-date-format="yyyy-mm-dd"
                                                           placeholder="<?php echo e(trans('site_lang.home_session_date')); ?>"
                                                           data-date-viewmode="years" class="form-control date-picker"
                                                           id="first_session_date" name="first_session_date"
                                                           value="<?php echo e(old('first_session_date')); ?>">
                                                    <span class="input-group-addon"> <i
                                                            class="fa fa-calendar"></i> </span>
                                                </div>
                                                <span class="text-danger" id="first_date_error"></span>
                                            </div>
                                        </div>
                                        <div class="col-xs-6 col-sm-6 col-md-6">
                                            <div class="form-group<?php echo e($errors->has('inventation_type')?' has-error':''); ?>">
                                                <input type="text" name="inventation_type" id="inventation_type"
                                                       class="form-control"
                                                       placeholder="<?php echo e(trans('site_lang.add_case_inventation_type')); ?>"
                                                       value="<?php echo e(old('inventation_type')); ?>">
                                                <span class="text-danger" id="lawsuit_error"></span>
                                            </div>
                                        </div>
                                        <?php
                                            $user_type = auth()->user()->type;
                                            if($user_type == 'admin'){
                                        ?>
                                         <div class="col-xs-6 col-sm-6 col-md-6">
                                            <div class="form-group<?php echo e($errors->has('to_whome')?' has-error':''); ?>">
                                                <select id="form-field-select-3" class="form-control select2-arrow"
                                                        name="to_whome">
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
                                </form>
                            </div>
                            <div class="panel-footer">
                                <div class="center">
                                    <button type="submit" class="btn btn-success" id="add_case" name="add_case">
                                        <?php echo e(trans('site_lang.add_case_title')); ?>

                                    </button>
                                </div>
                            </div>
                        </div>
                        <!-- end: DYNAMIC TABLE PANEL -->
                    </div>
                </div>

            </div>
        </div>
        <!-- end: PAGE -->

    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <script src="<?php echo e(url('/plugins/toastr/toastr.js')); ?>"></script>
    <script src="<?php echo e(url('/plugins/select2/select2.min.js')); ?>"></script>
    <script src="<?php echo e(url('/plugins/bootstrap-select/bootstrap-select.min.js')); ?>"></script>
    <script src="<?php echo e(url('/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js')); ?>"></script>
    <script src="<?php echo e(url('/plugins/jQuery-Tags-Input/jquery.tagsinput.js')); ?>"></script>
    <script>
        // global app configuration object
        var config = {
            trans: {
                select2_place_holder: "<?php echo e(trans('site_lang.clients_client_type_client_hint')); ?>",
                select1_place_holder: "<?php echo e(trans('site_lang.clients_client_type_khesm_hint')); ?>",

            }
        };
    </script>
    <script src="<?php echo e(url('/js/form-elements.js')); ?>"></script>
    <script type="text/javascript">

        $(document).ready(function () {
            $('#add_case').click(function () {
                var form = $('#new_case').serialize();
                $.ajax({
                    url: "<?php echo e(route('cases.store')); ?>",
                    dataType: 'json',
                    data: form,
                    type: 'post',
                    beforeSend: function () {
                        $('#mokel_error').empty();
                        $('#khesm_error').empty();
                        $('#case_Number_error').empty();
                        $('#circle_Number_error').empty();
                        $('#court_Name_error').empty();
                        $('#first_date_error').empty();
                        $('#lawsuit_error').empty();
                        $('#To_error').empty();
                    }, success: function (data) {
                        if(data.status){
                        toastr.success(data.msg);
                        $("#new_case").trigger('reset');
                    }else{
                        toastr.error(data.msg);
                    }
                    }, error: function (data_error, exception) {
                        if (exception == 'error') {
                            $('#mokel_error').html(data_error.responseJSON.errors.mokel_name);
                            $('#khesm_error').html(data_error.responseJSON.errors.khesm_name);
                            $('#case_Number_error').html(data_error.responseJSON.errors.invetation_num);
                            $('#circle_Number_error').html(data_error.responseJSON.errors.circle_num);
                            $('#court_Name_error').html(data_error.responseJSON.errors.court);
                            $('#first_date_error').html(data_error.responseJSON.errors.first_session_date);
                            $('#lawsuit_error').html(data_error.responseJSON.errors.inventation_type);
                            $('#To_error').html(data_error.responseJSON.errors.to_whome);
                        }
                    }
                });
            });
        });
    </script>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('scriptDocument'); ?>
    FormElements.init();
<?php $__env->stopSection(); ?>


<?php echo $__env->make('welcome', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Lawyer\resources\views/cases/add_case.blade.php ENDPATH**/ ?>