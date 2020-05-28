<?php $__env->startSection('styles'); ?>
    <link href="<?php echo e(url('/plugins/bootstrap-modal/css/bootstrap-modal-bs3patch.css')); ?>" rel="stylesheet"
          type="text/css"/>
    <link href="<?php echo e(url('/plugins/bootstrap-modal/css/bootstrap-modal.css')); ?>" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo e(url('/plugins/select2/select2.css')); ?>"/>

    <link rel="stylesheet" href="<?php echo e(url('/plugins/jQuery-Tags-Input/jquery.tagsinput.css')); ?>">
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
                    <div class="col-sm-6 hidden-xs">
                        <div class="page-header">
                            <h1>Reports
                                <small>overview</small>
                            </h1>
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
                                    Home
                                </a>
                            </li>
                            <li class="active">
                                Reports
                            </li>
                            <li class="active">
                                Daily report
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
                                <div class="m-lg-4">
                                    <div class="row">
                                        <div class="col-md-6 col-lg-3 col-sm-6">
                                            <a href="" target="_blank" id="btn_search_daily" class="btn btn-warning">Print</a>
                                        </div>

                                        <div class="col-md-6 col-lg-5 col-sm-6">

                                            <div class="input-group" style="padding-bottom: 20px">
                                                <input type="text" data-date-format="dd-mm-yyyy"
                                                       data-date-viewmode="years" class="form-control date-picker"
                                                       id="search_daily" name="search_daily"
                                                >
                                                <span class="input-group-addon"> <i
                                                            class="fa fa-calendar"></i> </span>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-lg-3 col-sm-6">
                                            <div class="input-group">
                                                <select id="Dailytype" name="Dailytype"
                                                        class="form-control">
                                                    <option value="all" selected="selected">الكل</option>
                                                    <option value="company">شركات</option>
                                                    <option value="private">خاص</option>
                                                </select>
                                            </div>
                                        </div>

                                    </div>


                                </div>
                                <div class="panel bg-white" id="DailyContainer">


                                    <table class="table table-striped table-bordered table-hover table-full-width"
                                           id="dailyTable">
                                        <thead>
                                        <tr>
                                            <th class="center">ملاحظات</th>
                                            <th class="center">تاريخ الجلسة</th>
                                            <th class="center">نوع الدعوى</th>
                                            <th class="center">الدائرة</th>
                                            <th class="center">رقم الدعوى</th>
                                            <th class="center">اسم الخصم</th>
                                            <th class="center">اسم الموكل</th>
                                        </tr>
                                        </thead>
                                        <tbody>

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


        </div>
        <?php $__env->stopSection(); ?>
        <?php $__env->startSection('scripts'); ?>
            <script src="<?php echo e(url('/plugins/toastr/toastr.js')); ?>"></script>
            <script type="text/javascript">

            </script>
            <script src="<?php echo e(url('/plugins/bootstrap-modal/js/bootstrap-modal.js')); ?>" type="text/javascript"></script>
            <script src="<?php echo e(url('/plugins/bootstrap-modal/js/bootstrap-modalmanager.js')); ?>"
                    type="text/javascript"></script>
            <script src="<?php echo e(url('/js/ui-modals.js')); ?>" type="text/javascript"></script>
            <script type="text/javascript" src="<?php echo e(url('/plugins/select2/select2.min.js')); ?>"></script>
            <script type="text/javascript" src="<?php echo e(url('/js/table-data.js')); ?>"></script>
            <script src="<?php echo e(url('/plugins/DataTables/media/js/DT_bootstrap.js')); ?>"></script>
            <script src="<?php echo e(url('/plugins/DataTables/media/js/jquery.dataTables.min.js')); ?>"></script>

            <script src="<?php echo e(url('/plugins/bootstrap-select/bootstrap-select.min.js')); ?>"></script>
            <script src="<?php echo e(url('/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js')); ?>"></script>
            <script src="<?php echo e(url('/plugins/jQuery-Tags-Input/jquery.tagsinput.js')); ?>"></script>
            <script src="<?php echo e(url('/js/form-elements.js')); ?>"></script>
            <script src="<?php echo e(url('/js/daily_search.js')); ?>"></script>


        <?php $__env->stopSection(); ?>
        <?php $__env->startSection('scriptDocument'); ?>
            UIModals.init();
            TableData.init();
            FormElements.init();

<?php $__env->stopSection(); ?>


<?php echo $__env->make('welcome', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Lawyer\resources\views/Reports/CasesDailyReport.blade.php ENDPATH**/ ?>