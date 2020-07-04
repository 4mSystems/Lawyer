 
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
                    <div class="toolbar-tools pull-right">
                        <!-- start: TOP NAVIGATION MENU -->
                        <ul class="nav navbar-right">
                            <!-- start: TO-DO DROPDOWN -->
                            <li class="menu-search">
                                 
                                <!-- start: SEARCH POPOVER -->
                                <div class="popover bottom search-box transition-all">
                                    <div class="arrow"></div>
                                    <div class="popover-content">
                                        <!-- start: SEARCH FORM -->
                                        <form class="" id="searchform" action="#">
                                            <div class="input-group">
                                                <input type="text" class="form-control"
                                                       placeholder="<?php echo e(trans('site_lang.search_case_search_hint')); ?>"
                                                       id="search">
                                                <span class="input-group-btn">
																<button class="btn btn-main-color btn-squared"
                                                                        type="button" id="search_case_btn">
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
                                    <?php echo e(trans('site_lang.side_home')); ?>

                                </a>
                            </li>
                            <li class="active">
                                <?php echo e(trans('site_lang.public_view_btn_text')); ?>

                            </li>
                        </ol>
                    </div>
                </div>
                <!-- end: BREADCRUMB -->
                <div class="row">
                    <div class="col-sm-12"> 
                        <div class="tabbable" id="mainContainer">
                           
                            <div class="tab-content">
                                <div id="panel_overview" class="tab-pane fade in active">
                                    <div class="row">
                                        <div class="col-sm-7 col-md-8">

                                            <div class="row space20">

                                                
                                                 
                                                 
                                               
                                            </div>
                                            <div class="panel panel-white" style="direction: rtl">
                                                <div class="panel-heading">
                                                    <h3 class="text-bold"><?php echo e(trans('site_lang.notes')); ?></h3>
                                                    <div class="btn-group pull-left">
                                                    <?php 
                                                    $user_type = auth()->user()->type;
                                                    if($user_type != 'admin'){
                                                    ?>
                                                        <a class="btn btn-primary" id="createnote"><i 
                                                                class="fa
                                                            fa-plus">&nbsp;&nbsp;</i><?php echo e(trans('site_lang.add_notes')); ?>

                                                        </a>
                                                        <?php
                                                    }
                                                    ?>
                                                    </div>
                                                    <br>
                                                </div>
                                                <div class="panel-body"> 
                                                <table class="table table-striped table-bordered table-hover table-full-width"
                                       id="clientnotes_tbl">
                                       <thead>
                                    <tr>
                                        <th class="center">#</th> 
                                        <th class="center"><?php echo e(trans('site_lang.notes')); ?></th> 
                                        
                                        <th class="center"><?php echo e(trans('site_lang.emp')); ?></th> 
                                        
                                        <th class="center"><?php echo e(trans('site_lang.createdAt')); ?></th> 
                                        <th class="center"></th>
                                    </tr>
                                  
                                    </thead>
                                </table>
                                                </div>
                                            </div>

                                            <div class="panel panel-white" style="direction: rtl">
                                                <div class="panel-heading">
                                                    <div class="panel-heading">
                                                        <h3 class="text-bold"><?php echo e(trans('site_lang.cases')); ?></h3>
                                                        <div class="btn-group pull-left">
                                                            
                                                        </div>
                                                        <br>
                                                    </div>
                                                </div>
                                                <div class="panel-body">

                                                <!-- table here -->
                                                <table class="table table-striped table-bordered table-hover table-full-width"
                                       id="clientcases_tbl">
                                       <thead>
                                    <tr>
                                    <th class="center">#</th> 
                                        <th class="center"> رقم الدعوى</th> 
                                        <th class="center">نوع الدعوى</th>
                                        <th class="center">رقم الدائرة</th>
                                        <th class="center">المحكمة</th>
                                        <th class="center">تاريخ اول جلسة</th>
                                        <th class="center">موجهه الى</th> 


                                    </tr>
                                  
                                    </thead>
                                </table>

                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-sm-5 col-md-4">

                                            <div class="user-right">
                                        <input type="hidden" id='client_id' value='<?php echo e($client_data->id); ?>'/>
                                                <table class="table table-condensed table-hover">
                                                    <thead>
                                                    <tr>
                                                        <h4 style="text-align: right"><?php echo e(trans('site_lang.client_info')); ?></h4>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <td><?php echo e(trans('site_lang.Client_name')); ?></td>
                                                        <td><?php echo e($client_data->client_Name); ?> </td>
                                                         

                                                        </td>

                                                    </tr>
                                                    <tr>
                                                        <td><?php echo e(trans('site_lang.client_Unit')); ?></td>
                                                        <td><?php echo e($client_data->client_Unit); ?> </td>
                                                         
                                                    </tr>
                                                    <tr>
                                                        <td><?php echo e(trans('site_lang.type')); ?></td>
                                                        
                                                        <td><?php echo e($client_data->type); ?>   </td>
                                                         

                                                    </tr>
                                                    <tr>
                                                        <td><?php echo e(trans('site_lang.client_Address')); ?></td>
                                                        <td> <?php echo e($client_data->client_Address); ?></td>
                                                         

                                                    </tr>
                                                    <tr>
                                                        <td><?php echo e(trans('site_lang.notes')); ?></td>
                                                        <td><?php echo e($client_data->notes); ?> </td>
                                                        
                                                    </tr>
                                                    
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

            </div>
        </div>
      
    </div>

        <!-- //confirm delele -->
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
<!-- create new note --> 
        <div id="createModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">

                    <div class="modal-body">
                        <h4 align="center" style="margin:0;"><?php echo e(trans('site_lang.add_notes')); ?></h4>
                    </div>
                    <div class="card-body">
                    <form method="post" id="client_note" enctype="multipart/form-data">
                            <input type="hidden" id="token" name="_token" value="<?php echo e(csrf_token()); ?>">
            
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group"> 
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                               <textarea style="width:100%;" name="notes" id="notes"
                                               placeholder="<?php echo e(trans('site_lang.notes')); ?>"
                                               value="<?php echo e(old('notes')); ?>" form="client_note"></textarea> 
                                    </div>
                                    </div>
                                </div>
                             </div> 
                             <div class="modal-footer">
                             <input type="submit" class="btn btn-primary" id="add" name="add"
                                       value="<?php echo e(trans('site_lang.public_add_btn_text')); ?>"/>
                                       <button data-dismiss="modal" class="btn btn-default" type="button">
                                    <?php echo e(trans('site_lang.public_close_btn_text')); ?>

                                </button>
                                       </div>
                    </form>

                   
             
            </div>
                </div>
            </div>
        </div>
    </div>



    <div id="edit_note_model" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">

                    <div class="modal-body">
                        <h4 align="center" style="margin:0;"><?php echo e(trans('site_lang.edit_notes')); ?></h4>
                    </div>
                    <div class="card-body">
                    <form method="post" id="client_notes" enctype="multipart/form-data">
                            <input type="hidden" id="token" name="_token" value="<?php echo e(csrf_token()); ?>">
            
                            
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group"> 
                                               <textarea style="width:100%;" name="notes" id="note"
                                               placeholder="<?php echo e(trans('site_lang.notes')); ?>"
                                                 form="client_notes"></textarea> 

                                    </div>
                                </div>
                                <div class="modal-footer">
                             <input type="submit" class="btn btn-primary" id="edit" name="edit"
                                       value="<?php echo e(trans('site_lang.public_edit_btn_text')); ?>"/>
                                       <button data-dismiss="modal" class="btn btn-default" type="button">
                                    <?php echo e(trans('site_lang.public_close_btn_text')); ?>

                                </button>

                                       </div>
                    </form>

                   
             
            </div>
                </div>
            </div>
        </div>
    </div>


 
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <!-- 
     -->
    <script src="<?php echo e(url('/plugins/toastr/toastr.js')); ?>"></script>
    <script src="<?php echo e(url('/plugins/select2/select2.min.js')); ?>"></script>
    <script src="<?php echo e(url('/plugins/bootstrap-select/bootstrap-select.min.js')); ?>"></script>
    <script src="<?php echo e(url('/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js')); ?>"></script>
    <script src="<?php echo e(url('/plugins/DataTables/media/js/jquery.dataTables.min.js')); ?>"></script>
    <script src="<?php echo e(url('/plugins/DataTables/media/js/DT_bootstrap.js')); ?>"></script>
    <script src="<?php echo e(url('/plugins/jQuery-Tags-Input/jquery.tagsinput.js')); ?>"></script>
  
    

    <script src="<?php echo e(url('/js/form-elements.js')); ?>"></script> 
     <script src="<?php echo e(url('/js/ui-modals.js')); ?>" type="text/javascript"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).ready(function () {
            var id = $('#client_id').val();  
            $('#clientnotes_tbl').DataTable({
                processing: true,
                serverSide: true,
                
                            //

                ajax: {
                    url: "/profile/"+ id ,
                },
                columns: [
                    {
                        data: 'id',
                        name: 'id',
                        
                        className: 'center'
                    },
                    {
                        data: 'notes',
                        name: 'notes',
                        className: 'center'
                    },
                    {
                        data: 'user_id.name',
                        name: 'user_id.name',
                        className: 'center'
                    },  
                    {
                        data: 'created_at',
                        name: 'created_at',
                        className: 'center'
                    },    
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        className: 'center'
                    }
                ],
          
        });
        
    });
     

$.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).ready(function () {

            var id = $('#client_id').val();  
            $('#clientcases_tbl').DataTable({
                processing: true,
                serverSide: true,
                
                ajax: { 
                    url: "/profile/client_cases/"+ id ,
                },
                columns: [
                    {
                        data: 'id',
                        name: 'id', 
                        className: 'center'
                    },
                    {
                        data: 'invetation_num',
                        name: 'invetation_num',
                        className: 'center'
                    }, {
                        data: 'inventation_type',
                        name: 'inventation_type',
                        className: 'center'
                    },{
                        data: 'circle_num',
                        name: 'circle_num',
                        className: 'center'
                    },{
                        data: 'court',
                        name: 'court',
                        className: 'center'
                    },{
                        data: 'first_session_date',
                        name: 'first_session_date',
                        className: 'center'
                    },{
                        data: 'to_whome.name',
                        name: 'to_whome.name',
                        
                        className: 'center'
                    },      
   
                ]
            
        });
    });






    // 

    var client_id ;
    

            $('#createnote').click(function () { 
                $('#createModal').modal('show');
                  client_id = $('#client_id').val(); 
            });
            $('#client_note').on('submit', function (event) {
                event.preventDefault();
                    $.ajax({
                        url: "/profile/store/" + client_id ,
                        method: 'post',
                        data: new FormData(this),
                        contentType: false,
                        cache: false,
                        processData: false,
                        dataType: "json",
                       
                        success: function (data) {
                            $('#createModal').modal('hide');
                            toastr.success(data.success);
                            $("#client_note").trigger('reset');
                            $('#clientnotes_tbl').DataTable().ajax.reload();
                        } 
                    })
                });
            


    var note_id ;
    $(document).on('click', '#deletenote', function () {
                 note_id = $(this).data('client-id');
                
                $('#confirmModal').modal('show');
            });
            $('#ok_button').click(function () {
                $.ajax({ 
                    url: "/profile/deletenote/" + note_id, 
                    success: function (data) {
                        setTimeout(function () {
                            $('#confirmModal').modal('hide');
                            $('#clientnotes_tbl').DataTable().ajax.reload();
                        }, 100);
                    }
                })
            });
 
            $(document).on('click', '#editnote', function () {
                note_id = $(this).data('client-id');
                $.ajax({
                    url: "/profile/" + note_id + "/edit_note",
                    dataType: "json",
                    success: function (html) {  
                        $('#note').val(html.data.notes);
                        $('#id').val(html.data.id);  
                        $('#edit_note_model').modal('show');

                    }
                })
            }); 
            $('#client_notes').on('submit', function (event) {
                //  note_ids = $(this).data('id');  
                console.log(note_id);
                event.preventDefault();
                    $.ajax({
                        url:  "/profile/" + note_id + "/edit_notes" ,
                        method: 'post',
                        data: new FormData(this),
                        contentType: false,
                        cache: false,
                        processData: false,
                        dataType: "json",
                       
                        success: function (data) {
                            $('#edit_note_model').modal('hide');
                            toastr.success(data.success);
                            $("#client_notes").trigger('reset');
                            $('#clientnotes_tbl').DataTable().ajax.reload();
                        } 
                    })
                });




            </script>
            
            

<?php $__env->stopSection(); ?>
<?php $__env->startSection('scriptDocument'); ?>

    UIModals.init(); 
<?php $__env->stopSection(); ?>

<?php echo $__env->make('welcome', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Lawyer\resources\views/clients/profile.blade.php ENDPATH**/ ?>