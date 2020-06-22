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
                            <h1><?php echo e(trans('site_lang.side_home')); ?> <small><?php echo e(trans('site_lang.side_welcome')); ?></small></h1>
                        </div>
                    </div>
                </div>
                <!-- end: TOOLBAR -->
                <!-- end: PAGE HEADER -->
                <br>
                <!-- start: PAGE CONTENT -->
                <div class="row">
                    <div class="col-md-6 col-lg-3 col-sm-6">
                        <div class="panel panel-default panel-white core-box">
                            <div class="panel-body no-padding">
                                <div class="partition-blue padding-20 text-center core-icon">
                                    <i class="fa fa-users fa-2x icon-big"></i>
                                </div>
                                <div class="padding-20 core-content">
                                    <h3 class="text-bold"><?php echo e(trans('site_lang.side_users')); ?></h3>
                                    <span
                                        class="text-bold"> # <?php echo e($users->count()); ?> </span>
                                </div>
                            </div>
                            <div class="panel-footer clearfix no-padding">
                                <a href="<?php echo e(url('users')); ?>"
                                   class="col-xs-4 padding-10 text-center text-white tooltips partition-green"
                                   data-toggle="tooltip" data-placement="top"
                                   title="<?php echo e(trans('site_lang.home_more_options')); ?>"><i
                                        class="fa fa-cog"></i></a>
                                <a href="<?php echo e(url('users')); ?>"
                                   class="col-xs-4 padding-10 text-center text-white tooltips partition-blue"
                                   data-toggle="tooltip" data-placement="top"
                                   title="<?php echo e(trans('site_lang.home_add_user')); ?>"><i
                                        class="fa fa-plus"></i></a>
                                <a href="<?php echo e(url('users')); ?>"
                                   class="col-xs-4 padding-10 text-center text-white tooltips partition-red"
                                   data-toggle="tooltip" data-placement="top"
                                   title="<?php echo e(trans('site_lang.home_see_more')); ?>"><i
                                        class="fa fa-chevron-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3 col-sm-6">
                        <div class="panel panel-default panel-white core-box">
                            <div class="panel-body no-padding">
                                <div class="partition-red padding-20 text-center core-icon">
                                    <i class="fa fa-desktop fa-2x icon-big"></i>
                                </div>
                                <div class="padding-20 core-content">
                                    <h3 class="text-bold"><?php echo e(trans('site_lang.side_cases')); ?></h3>
                                    <span
                                        class="text-bold"> #<?php echo e($cases->count()); ?> </span>
                                </div>
                            </div>
                            <div class="panel-footer clearfix no-padding">
                                <a href="<?php echo e(url('caseDetails')); ?>"
                                   class="col-xs-4 padding-10 text-center text-white tooltips partition-green"
                                   data-toggle="tooltip" data-placement="top"
                                   title="<?php echo e(trans('site_lang.home_more_options')); ?>"><i
                                        class="fa fa-cog"></i></a>
                                <a href="<?php echo e(url('addCase')); ?>"
                                   class="col-xs-4 padding-10 text-center text-white tooltips partition-blue"
                                   data-toggle="tooltip" data-placement="top"
                                   title="<?php echo e(trans('site_lang.side_add_case')); ?>"><i
                                        class="fa fa-plus"></i></a>
                                <a href="<?php echo e(url('caseDetails')); ?>"
                                   class="col-xs-4 padding-10 text-center text-white tooltips partition-red"
                                   data-toggle="tooltip" data-placement="top"
                                   title="<?php echo e(trans('site_lang.home_see_more')); ?>"><i
                                        class="fa fa-chevron-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3 col-sm-6">
                        <div class="panel panel-default panel-white core-box">

                            <div class="panel-body no-padding">
                                <div class="partition-azure padding-20 text-center core-icon">
                                    <i class="fa fa-shopping-cart fa-2x icon-big"></i>
                                </div>
                                <div class="padding-20 core-content">
                                    <h3 class="text-bold"><?php echo e(trans('site_lang.search_case_sessions')); ?></h3>
                                    <span
                                        class="text-bold">#<?php echo e($sessions->count()); ?></span>
                                </div>
                            </div>
                            <div class="panel-footer clearfix no-padding">
                                <a href="<?php echo e(url('caseDetails')); ?>"
                                   class="col-xs-4 padding-10 text-center text-white tooltips partition-green"
                                   data-toggle="tooltip" data-placement="top"
                                   title="<?php echo e(trans('site_lang.home_more_options')); ?>"><i
                                        class="fa fa-cog"></i></a>
                                <a href="<?php echo e(url('caseDetails')); ?>"
                                   class="col-xs-4 padding-10 text-center text-white tooltips partition-blue"
                                   data-toggle="tooltip" data-placement="top"
                                   title="<?php echo e(trans('site_lang.mohdar_add_mohdar')); ?>"><i
                                        class="fa fa-plus"></i></a>
                                <a href="<?php echo e(url('caseDetails')); ?>"
                                   class="col-xs-4 padding-10 text-center text-white tooltips partition-red"
                                   data-toggle="tooltip" data-placement="top"
                                   title="<?php echo e(trans('site_lang.home_see_more')); ?>"><i
                                        class="fa fa-chevron-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3 col-sm-6">
                        <div class="panel panel-default panel-white core-box">

                            <div class="panel-body no-padding">
                                <div class="partition-azure padding-20 text-center core-icon">
                                    <i class="fa fa-shopping-cart fa-2x icon-big"></i>
                                </div>
                                <div class="padding-20 core-content">
                                    <h3 class="text-bold"><?php echo e(trans('site_lang.side_mohdar')); ?></h3>
                                    <span
                                        class="text-bold">#<?php echo e($mohdreen->count()); ?></span>
                                </div>
                            </div>
                            <div class="panel-footer clearfix no-padding">
                                <a href="<?php echo e(url('mohdareen')); ?>"
                                   class="col-xs-4 padding-10 text-center text-white tooltips partition-green"
                                   data-toggle="tooltip" data-placement="top"
                                   title="<?php echo e(trans('site_lang.home_more_options')); ?>"><i
                                        class="fa fa-cog"></i></a>
                                <a href="<?php echo e(url('mohdareen')); ?>"
                                   class="col-xs-4 padding-10 text-center text-white tooltips partition-blue"
                                   data-toggle="tooltip" data-placement="top"
                                   title="<?php echo e(trans('site_lang.mohdar_add_mohdar')); ?>"><i
                                        class="fa fa-plus"></i></a>
                                <a href="<?php echo e(url('mohdareen')); ?>"
                                   class="col-xs-4 padding-10 text-center text-white tooltips partition-red"
                                   data-toggle="tooltip" data-placement="top"
                                   title="<?php echo e(trans('site_lang.home_see_more')); ?>"><i
                                        class="fa fa-chevron-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <!-- start: TABLE WITH IMAGES PANEL -->
                            <div class="panel panel-white">
                                <div class="panel-heading">
                                    <h5 class="text-bold"><?php echo e(trans('site_lang.home_sessions_coming')); ?></h5>
                                </div>
                                <div class="panel-body">
                                    <table class="table table-striped table-bordered table-hover table-full-width"
                                           id="sample_1">
                                        <thead class="black white-text">
                                        <tr>
                                            <th scope="col" class="hidden-xs center">#</th>
                                            <th scope="col"
                                                class="hidden-xs center"><?php echo e(trans('site_lang.home_session_date')); ?></th>
                                            <th scope="col"
                                                class="hidden-xs center"><?php echo e(trans('site_lang.home_session_status')); ?></th>
                                            <th scope="col"
                                                class="hidden-xs center"><?php echo e(trans('site_lang.home_session_month')); ?></th>
                                            <th scope="col"
                                                class="hidden-xs center"><?php echo e(trans('site_lang.home_session_case_number')); ?></th>


                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $__currentLoopData = $session; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $session): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <th scope="row" class="hidden-xs center"><?php echo e($session->id); ?></th>
                                                <td class="hidden-xs center"><?php echo e($session->session_date); ?></td>
                                                <td class="hidden-xs center"><?php echo e($session->status); ?></td>
                                                <td class="hidden-xs center"><?php echo e($session->month); ?></td>
                                                <td class="hidden-xs center"><?php echo e($session->case_Id); ?></td>

                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- end: TABLE WITH IMAGES PANEL -->
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-12">
                            <!-- start: TABLE WITH IMAGES PANEL -->
                            <div class="panel panel-white">
                                <div class="panel-heading">
                                    <h5 class="text-bold"><?php echo e(trans('site_lang.home_session_missing')); ?></h5>
                                </div>
                                <div class="panel-body">

                                    <table class="table table-striped table-bordered table-hover table-full-width"
                                           id="sample_2">

                                        <thead class="black white-text">
                                        <tr>
                                            <th scope="col" class="hidden-xs center">#</th>
                                            <th scope="col"
                                                class="hidden-xs center"><?php echo e(trans('site_lang.home_session_date')); ?></th>
                                            <th scope="col"
                                                class="hidden-xs center"><?php echo e(trans('site_lang.home_session_status')); ?></th>
                                            <th scope="col"
                                                class="hidden-xs center"><?php echo e(trans('site_lang.home_session_month')); ?></th>
                                            <th scope="col"
                                                class="hidden-xs center"><?php echo e(trans('site_lang.home_session_case_number')); ?></th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $__currentLoopData = $sessionNo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sessionNo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <th scope="row" class="hidden-xs center"><?php echo e($sessionNo->id); ?></th>
                                                <td class="hidden-xs center"><?php echo e($sessionNo->session_date); ?></td>
                                                <td class="hidden-xs center"><?php echo e($sessionNo->status); ?></td>
                                                <td class="hidden-xs center"><?php echo e($sessionNo->month); ?></td>
                                                <td class="hidden-xs center"><?php echo e($sessionNo->case_Id); ?></td>


                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                            <!-- end: TABLE WITH IMAGES PANEL -->
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-12">
                            <!-- start: TABLE WITH IMAGES PANEL -->
                            <div class="panel panel-white">
                                <div class="panel-heading">
                                    <h5 class="text-bold"><?php echo e(trans('site_lang.side_mohdar')); ?></h5>
                                </div>
                                <div class="panel-body">

                                    <table class="table table-striped table-bordered table-hover table-full-width"
                                           id="sample_3">
                                        <thead class="black white-text">
                                        <tr>
                                            <th scope="col" class="hidden-xs center">#</th>
                                            <th scope="col"
                                                class="hidden-xs center"><?php echo e(trans('site_lang.mohdar_court')); ?></th>
                                            <th scope="col"
                                                class="hidden-xs center"><?php echo e(trans('site_lang.mohdar_paper_type')); ?></th>
                                            <th scope="col"
                                                class="hidden-xs center"><?php echo e(trans('site_lang.home_session_date')); ?></th>
                                            <th scope="col"
                                                class="hidden-xs center"><?php echo e(trans('site_lang.home_session_case_number')); ?></th>
                                            <th scope="col"
                                                class="hidden-xs center"><?php echo e(trans('site_lang.home_see_more')); ?></th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $__currentLoopData = $mohder; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mohder): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <th scope="row" class="hidden-xs center"><?php echo e($mohder->moh_Id); ?></th>
                                                <td class="hidden-xs center"><?php echo e($mohder->court_mohdareen); ?></td>
                                                <td class="hidden-xs center"><?php echo e($mohder->paper_type); ?></td>
                                                <td class="hidden-xs center"><?php echo e($mohder->session_Date); ?></td>
                                                <td class="hidden-xs center"><?php echo e($mohder->case_number); ?></td>
                                                <td class="hidden-xs center"><a id="showMohdar"
                                                                                class="btn btn-xs btn-blue tooltips"
                                                                                data-placement="top"
                                                                                data-original-title="show"
                                                                                data-moh-Id="<?php echo e($mohder->moh_Id); ?>"><i
                                                            class="fa fa-eye"></i></a></td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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


    <!-- modal mohder -->
    <div id="show_mohdar_model" aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1"
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

                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>محضرين محكمة</strong>
                                <div class="well well-sm">
                                    <span id="court_mohdareen_show"></span>
                                </div>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>نوع الورقة</strong>
                                <div class="well well-sm">
                                    <span id="paper_type_show"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>تاريخ تسليم الورقة</strong>
                                <p id="deliver_data">
                                <div class="well well-sm">
                                    <span id="deliver_data_show"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>رقم الورقة</strong>
                                <div class="well well-sm">
                                    <span id="paper_Number_show"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>تاريخ الجلسة</strong>
                                <div class="well well-sm">
                                    <span id="session_Date_show"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>إسم الموكل</strong>
                                <div class="well well-sm">
                                    <span id="mokel_Name_show"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12" id="khesm_container">
                            <div class="form-group">
                                <strong for="khesm_Name">
                                    إسم الخصم
                                </strong>
                                <div class="well well-sm">
                                    <span id="khesm_Name_show"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>
                                    رقم القضية
                                </strong>
                                <div class="well well-sm">
                                    <span id="case_number_show"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group<?php echo e($errors->has('notes')?' has-error':''); ?>">
                                <strong>
                                    الملاحظات
                                </strong>
                                <div class="well well-sm">
                                    <span id="notes_show"></span>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button data-dismiss="modal" class="btn btn-default" type="button">
                            Close
                        </button>

                    </div>
                </div>
                <!-- /.modal-content -->
            </div>


            <!-- /.modal-dialog -->
        </div>
    </div>

    <!-- modal session note -->

<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <script src="<?php echo e(url('public/plugins/toastr/toastr.js')); ?>"></script>

    <script>

        $(document).ready(function () {
            $(document).on('click', '#showMohdar', function () {
                var id = $(this).data('moh-Id');

                $.ajax({
                    url: "mohdareendata/" + id,
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
                        $('.modal-title').text("المحضر");
                        $('#show_mohdar_model').modal('show');

                    }
                })
            });

        });

        </script>

<?php echo $__env->make('welcome', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Lawyer\resources\views/home.blade.php ENDPATH**/ ?>