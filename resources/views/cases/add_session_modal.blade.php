<div id="add_session_model" aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1"
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
                <form method="post" id="sessionForm">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <input type="hidden" name="sessionId" id="sessionId">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group{{$errors->has('session_date')?' has-error':''}}">
                                <div class="input-group">
                                    <input type="text" data-date-format="dd-mm-yyyy"
                                           data-date-viewmode="years" class="form-control date-picker"
                                           id="session_date" name="session_date"
                                           placeholder="تاريخ الجلسة "
                                           value="{{ old('session_date') }}">
                                    <span class="input-group-addon"> <i
                                            class="fa fa-calendar"></i> </span>
                                </div>
                                <span class="text-danger" id="session_date_error"></span>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
            <div class="modal-footer">
                <button data-dismiss="modal" class="btn btn-default" type="button">
                    Close
                </button>
                <input type="submit" class="btn btn-primary" id="add_session" name="add_session" value="Add"/>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
