<?php $__env->startSection('styles'); ?>
    <link rel="stylesheet" href="<?php echo e(url('/plugins/jQuery-Tags-Input/jquery.tagsinput.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(url('/plugins/select2/select2.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(url('/plugins/bootstrap-select/bootstrap-select.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(url('/plugins/datepicker/css/datepicker.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(url('/plugins/DataTables/media/css/DT_bootstrap.css')); ?>">
    <link href="<?php echo e(url('/plugins/bootstrap-modal/css/bootstrap-modal.css')); ?>" rel="stylesheet" type="text/css"/>

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
                            <h1>New Case <small>البحث عن الدعاوى</small></h1>
                        </div>
                    </div>
                    <div class="toolbar-tools pull-right">
                        <!-- start: TOP NAVIGATION MENU -->
                        <ul class="nav navbar-right">
                            <!-- start: TO-DO DROPDOWN -->
                            <li class="menu-search">
                                <a href="#">
                                    <i class="fa fa-search"></i> SEARCH
                                </a>
                                <!-- start: SEARCH POPOVER -->
                                <div class="popover bottom search-box transition-all">
                                    <div class="arrow"></div>
                                    <div class="popover-content">
                                        <!-- start: SEARCH FORM -->
                                        <form class="" id="searchform" action="#">
                                            <div class="input-group">
                                                <input type="text" class="form-control" placeholder="Search"
                                                       id="search">
                                                <span class="input-group-btn">
																<button class="btn btn-main-color btn-squared"
                                                                        type="button">
																	<i class="fa fa-search"></i>
																</button> </span>
                                            </div>
                                        </form>
                                        <!-- end: SEARCH FORM -->
                                    </div>
                                </div>
                                <!-- end: SEARCH POPOVER -->
                            </li>
                        </ul>
                        <!-- end: TOP NAVIGATION MENU -->
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
                                Search for case
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- end: BREADCRUMB -->
                <div class="row">

                    <div class="col-sm-12">
                        <div class="panel bg-white" id="searchContainer">
                            <table class="table table-striped table-bordered table-hover" id="cases">
                                <thead>
                                <tr>
                                    <th class="hidden-xs center"></th>
                                    <th class="hidden-xs center">المحكمة</th>
                                    <th class="hidden-xs center">رقم الدعوى</th>
                                    <th class="hidden-xs center">إسم الخصم</th>
                                    <th class="hidden-xs center">إسم الموكل</th>
                                    <th class="hidden-xs center">#</th>
                                </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>

                        </div>
                        <div class="tabbable">
                            <ul class="nav nav-tabs tab-padding tab-space-3 tab-blue" id="myTab4">
                                <li class="active" style="float: right">
                                    <a data-toggle="tab" href="#panel_overview"
                                       class="text-large"><p class="text-bold">نظرة عامة</p>
                                    </a>
                                </li>
                                <li style="float: right">
                                    <a data-toggle="tab" href="#panel_edit_account" class="text-large"><p
                                            class="text-bold">تعديل الدعوى</p>
                                    </a>
                                </li>
                                <li style="float: right">
                                    <a data-toggle="tab" href="#panel_sessions" class="text-large"><p class="text-bold">
                                            الجلسات</p>

                                    </a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div id="panel_overview" class="tab-pane fade in active">
                                    <div class="row">
                                        <div class="col-sm-7 col-md-8">

                                            <div class="row space20">
                                                <div class="col-sm-4">
                                                    <button class="btn btn-icon btn-block pulsate">
                                                        <i class="clip-bubble-2"></i>
                                                        الملحقات <span class="badge badge-info"
                                                                       id="attach_count"> </span>
                                                    </button>
                                                </div>
                                                <div class="col-sm-4">
                                                    <button class="btn btn-icon btn-block">
                                                        <i class="clip-calendar"></i>
                                                        الملاحظات <span class="badge badge-info"
                                                                        id="notes_count"></span>
                                                    </button>
                                                </div>
                                                <div class="col-sm-4">
                                                    <button class="btn btn-icon btn-block">
                                                        <i class="clip-list-3"></i>
                                                        الجلسات <span class="badge badge-info"
                                                                      id="sessions_count"></span>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="panel panel-white space20" style="direction: rtl">
                                                <div class="panel-heading">
                                                    <i class="clip-menu"></i>
                                                    <h3>الموكلين</h3>
                                                    <div class="panel-tools">
                                                        <a class="btn btn-xs btn-link panel-close" href="#">
                                                            <i class="fa fa-times"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="panel-body">
                                                    <div class="alert alert-warning">
                                                        <strong>إنتبه!</strong><b class="font-italic">
                                                            يجب الضغط على<p class="btn btn-blue tooltips"
                                                                            style="margin-right: 8px;margin-left: 8px;">
                                                                <i
                                                                    class="fa fa-eye-slash"></i></p> لاظهار الملاحظات
                                                            الخاصه بكل
                                                            جلسة
                                                        </b>
                                                    </div>














                                                </div>
                                            </div>

                                            <div class="panel panel-white space20">
                                                <div class="panel-heading">
                                                    <i class="clip-checkmark-2"></i>
                                                    الخصوم
                                                    <div class="panel-tools">
                                                        <a class="btn btn-xs btn-link panel-close" href="#">
                                                            <i class="fa fa-times"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="panel-body panel-scroll height-300">

                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-sm-5 col-md-4">

                                            <div class="user-right">

                                                <table class="table table-condensed table-hover">
                                                    <thead>
                                                    <tr>
                                                        <h4 style="text-align: right">معلومات عن القضية</h4>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <td><a href="#panel_edit_account" class="show-tab"><i
                                                                    class="fa fa-pencil edit-user-info"></i></a></td>
                                                        <td>
                                                            <a id="invetation_num">

                                                            </a></td>
                                                        <td>رقم الدعوى</td>

                                                    </tr>
                                                    <tr>
                                                        <td><a href="#panel_edit_account" class="show-tab"><i
                                                                    class="fa fa-pencil edit-user-info"></i></a></td>
                                                        <td>
                                                            <a id="inventation_type">

                                                            </a></td>
                                                        <td>نوع الدعوى</td>
                                                    </tr>
                                                    <tr>
                                                        <td><a href="#panel_edit_account" class="show-tab"><i
                                                                    class="fa fa-pencil edit-user-info"></i></a></td>
                                                        <td>
                                                            <a id="circle_num">

                                                            </a></td>
                                                        <td>رقم الدائرة</td>
                                                    </tr>
                                                    <tr>
                                                        <td><a href="#panel_edit_account" class="show-tab"><i
                                                                    class="fa fa-pencil edit-user-info"></i></a></td>
                                                        <td>
                                                            <a id="court">

                                                            </a></td>
                                                        <td>المحكمة</td>
                                                    </tr>
                                                    <tr>
                                                        <td><a href="#panel_edit_account" class="show-tab"><i
                                                                    class="fa fa-pencil edit-user-info"></i></a></td>
                                                        <td>
                                                            <a id="first_session_date">
                                                            </a></td>
                                                        <td>تاريخ اول جلسة</td>
                                                    </tr>
                                                    <tr>
                                                        <td><a href="#panel_edit_account" class="show-tab"><i
                                                                    class="fa fa-pencil edit-user-info"></i></a></td>
                                                        <td>
                                                            <a id="to_whome">

                                                            </a></td>
                                                        <td>موجهه الى</td>
                                                    </tr>
                                                    </tbody>
                                                </table>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div id="panel_edit_account" class="tab-pane fade" style="direction: rtl">
                                    <form  id="edit_case_form" method="post">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h3>بيانات الدعوى</h3>
                                                <hr>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="control-label">
                                                        رقم الدعوى
                                                    </label>
                                                    <input type="text" placeholder="رقم الدعوى" class="form-control"
                                                           id="input_invetation_num" name="invetation_num">
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">
                                                        رقم الدعوى
                                                    </label>
                                                    <input type="text" placeholder="رقم الدعوى" class="form-control"
                                                           id="input_inventation_type" name="inventation_type">
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">
                                                        رقم الدائرة
                                                    </label>
                                                    <input type="text" placeholder="رقم الدائرة"
                                                           class="form-control" id="input_circle_num" name="circle_num">
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">
                                                        المحكمة
                                                    </label>
                                                    <input type="text" placeholder="المحكمة"
                                                           class="form-control" id="input_court" name="court">
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">
                                                        موجهه الى
                                                    </label>


                                                    <select id="to_whome" name="to_whome"  class="form-control" data-toggle="tooltip" data-trigger="hover" data-placement="top" >

                                                        <option value='private'>private</option>
                                                        <option value='company'>company</option>

                                                    </select>




                                                </div>

                                            </div>

                                        </div>

                                    </form>

                                    <button class="btn btn-green btn-block" type="submit" id="btn_case_update">
                                        Update <i class="fa fa-arrow-circle-right"></i>
                                    </button>
                                </div>
                                <div id="panel_sessions" class="tab-pane fade">
                                    <div class="panel panel">
                                        <div class="panel-heading"><a class="btn btn-primary" id="addSessionModal"><i
                                                    class="fa fa-plus"></i> إضافة جلسة </a></div>
                                        <div class="panel-body" id="session-div-table">
                                            <div class="alert alert-warning" style="text-align: right;">
                                                <strong>إنتبه!</strong><b class="font-italic">
                                                    يجب الضغط على<p class="btn btn-blue tooltips"
                                                                    style="margin-right: 8px;margin-left: 8px;"><i
                                                            class="fa fa-eye-slash"></i></p> لاظهار الملاحظات الخاصه بكل
                                                    جلسة
                                                </b>
                                            </div>
                                            <table
                                                class="table table-striped table-bordered table-hover table-full-width"
                                                id="sessions_table">
                                                <thead>
                                                <tr>
                                                    <th class="hidden-xs center"></th>
                                                    <th class="hidden-xs center">الحالة</th>
                                                    <th class="hidden-xs center">تاريخ الجلسة</th>
                                                    <th class="hidden-xs center">#</th>
                                                </tr>
                                                </thead>
                                                <tbody>

                                                </tbody>
                                            </table>

                                        </div>
                                    </div>

                                    <div class="panel panel space20">
                                        <div class="panel-heading">
                                            <a class="btn btn-green" id="printNotes" target="_blank"><i
                                                    class="fa fa-print"></i> طباعه الملاحظات</a>
                                            <a class="btn btn-primary" id="addNotesModal"><i
                                                    class="fa fa-plus"></i> إضافة ملاحظه </a>
                                            <h4 style="float:right;">الملاحظات</h4>
                                        </div>
                                        <div class="panel-body">
                                            <table class="table table-striped  table-hover" id="session-notes-table">
                                                <thead>
                                                <tr>
                                                    <th class="hidden-xs center"></th>
                                                    <th class="hidden-xs center">الحالة</th>
                                                    <th class="hidden-xs center">المستخدم</th>
                                                    <th class="hidden-xs center">الملاحظة</th>
                                                    <th class="hidden-xs center">#</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                </tbody>
                                            </table>

                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
        <!-- end: PAGE -->
        
        <?php echo $__env->make('cases.add_session_notes_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        
        
        <?php echo $__env->make('cases.add_session_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        
        
        <div id="confirmModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h2 class="modal-title">تأكيد</h2>
                    </div>
                    <div class="modal-body">
                        <h4 align="center" style="margin:0;">هل تريد الحذف ؟</h4>
                    </div>
                    <div class="modal-footer">
                        <button type="button" name="ok_button" id="ok_button" class="btn btn-danger">حذف</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">الفاء</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    
    
    <script src="<?php echo e(url('/plugins/toastr/toastr.js')); ?>"></script>
    <script src="<?php echo e(url('/plugins/select2/select2.min.js')); ?>"></script>
    <script src="<?php echo e(url('/plugins/bootstrap-select/bootstrap-select.min.js')); ?>"></script>
    <script src="<?php echo e(url('/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js')); ?>"></script>
    <script src="<?php echo e(url('/plugins/DataTables/media/js/jquery.dataTables.min.js')); ?>"></script>
    <script src="<?php echo e(url('/plugins/DataTables/media/js/DT_bootstrap.js')); ?>"></script>
    <script src="<?php echo e(url('/plugins/jQuery-Tags-Input/jquery.tagsinput.js')); ?>"></script>
    <script src="<?php echo e(url('/js/form-elements.js')); ?>"></script>
    <script>
        // global app configuration object
        var config = {
            routes: {
                add_session_route: "<?php echo e(route('caseDetails.store')); ?>",
                update_session_route: "<?php echo e(route('caseDetails.update')); ?>",
                add_note_route: "<?php echo e(route('notes.store')); ?>",
                update_note_route: "<?php echo e(route('notes.update')); ?>",
                update_case_data: "<?php echo e(route('cases.update')); ?>",
            }
        };
    </script>
    <script src="<?php echo e(url('/js/cases-details.js')); ?>"></script>
    
    <script src="<?php echo e(url('/js/ui-modals.js')); ?>" type="text/javascript"></script>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('scriptDocument'); ?>
    
    FormElements.init();
    UIModals.init();
    PagesUserProfile.init();
<?php $__env->stopSection(); ?>


<?php echo $__env->make('welcome', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\LawerWeb\resources\views/cases/search_case.blade.php ENDPATH**/ ?>