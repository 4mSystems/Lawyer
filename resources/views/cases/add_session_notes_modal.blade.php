<div id="add_note_model" aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1"
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
                <form method="post" id="notesForm">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <input type="hidden" name="noteId" id="noteId">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group{{$errors->has('note')?' has-error':''}}">
                                 <textarea type="text" name="note" id="note" class="form-control"
                                           placeholder="يرجى إدخال الملاحظة"
                                           value="{{ old('note') }}" rows="3"></textarea>
                                <span class="text-danger" id="note_error"></span>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
            <div class="modal-footer">
                <button data-dismiss="modal" class="btn btn-default" type="button">
                    Close
                </button>
                <input type="submit" class="btn btn-dark-blue" id="add_note" name="add_note" value="Add"/>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
