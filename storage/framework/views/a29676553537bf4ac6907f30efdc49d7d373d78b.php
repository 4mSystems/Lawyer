<div id="add_session_model" aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1"
     class="modal bs-example-modal-basic fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal_title"></h4>
            </div>
            <div class="modal-body">
                <form method="post" id="sessionForm">
                    <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                    <input type="hidden" name="sessionId" id="sessionId">
                    <input type="hidden" name="case_Id" id="case_Id">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group<?php echo e($errors->has('session_date')?' has-error':''); ?>">
                                <div class="input-group">
                                    <input type="text" data-date-format="yyyy-mm-dd"
                                           data-date-viewmode="years" class="form-control date-picker"
                                           id="session_date" name="session_date"
                                           placeholder="<?php echo e(trans('site_lang.home_session_date')); ?>"
                                           value="<?php echo e(old('session_date')); ?>">
                                    <span class="input-group-addon"> <i
                                            class="fa fa-calendar"></i> </span>
                                </div>
                                <span class="text-danger" id="session_date_error"></span>
                            </div>
                        </div>

                    </div>
                    <div class="form-group right">
                        <button data-dismiss="modal" class="btn btn-default" type="button">
                            <?php echo e(trans('site_lang.public_close_btn_text')); ?>

                        </button>
                        <input type="submit" class="btn btn-primary" id="add_session" name="add_session"
                               value="<?php echo e(trans('site_lang.search_case_case_add_session')); ?>"/>
                    </div>
                </form>

            </div>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<?php /**PATH C:\xampp\htdocs\Lawyer\resources\views/cases/add_session_modal.blade.php ENDPATH**/ ?>