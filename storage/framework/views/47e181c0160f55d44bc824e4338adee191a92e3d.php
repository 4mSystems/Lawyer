<div id="add_note_model" aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1"
     class="modal bs-example-modal-basic fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal_title"></h4>
            </div>
            <div class="modal-body">
                <form method="post" id="notesForm">
                    <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                    <input type="hidden" name="noteId" id="noteId">
                    <input type="hidden" name="session_Id" id="session_Id">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group<?php echo e($errors->has('note')?' has-error':''); ?>">
                                 <textarea type="text" name="note" id="note" class="form-control"
                                           placeholder="<?php echo e(trans('site_lang.search_case_session_note')); ?>"
                                           value="<?php echo e(old('note')); ?>" rows="3"></textarea>
                                <span class="text-danger" id="note_error"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group right">
                        <button data-dismiss="modal" class="btn btn-default" type="button">
                            <?php echo e(trans('site_lang.public_close_btn_text')); ?>

                        </button>
                        <input type="submit" class="btn btn-dark-blue" id="add_note" name="add_note"
                               value=" <?php echo e(trans('site_lang.public_add_btn_text')); ?>"/>
                    </div>
                </form>

            </div>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<?php /**PATH C:\xampp\htdocs\Lawyer\resources\views/cases/add_session_notes_modal.blade.php ENDPATH**/ ?>