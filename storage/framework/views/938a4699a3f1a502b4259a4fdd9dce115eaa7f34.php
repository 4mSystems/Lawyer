<div id="add_new_mokel_modal" aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1"
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
                <form method="post" id="addMokelForm">
                    <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                    <input type="hidden" name="clientId" id="clientId">
                    <div class="row">
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group<?php echo e($errors->has('mokel')?' has-error':''); ?>">
                                <label for="form-field-select-4">
                                    اسم الموكل
                                </label>
                                <select multiple="multiple" id="form-field-select-4"
                                          name="mokel_name[]"
                                        class="form-control search-select">

                                </select>
                                <span class="text-danger" id="mokel_error"></span>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
            <div class="modal-footer">
                <button data-dismiss="modal" class="btn btn-default" type="button">
                    Close
                </button>
                <input type="submit" class="btn btn-primary" id="add_mokel" name="add_mokel" value="Add"/>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<?php /**PATH C:\xampp\htdocs\Lawyer\resources\views/cases/add_new_mokel_modal.blade.php ENDPATH**/ ?>