$(document).ready(function () {
    var caseId;
    var session_id;
    var client_id;
    var note_id;
    var who_delete;

    $('#searchContainer').hide();
    $('#search').on('input', function (e) {
        $('#cases tbody').empty();
        var data = $(this).val();
        if (data != '') {
            $('#searchContainer').show();
        } else {
            $('#searchContainer').hide();
        }
        $.ajax({
            url: "caseDetails/getSearchResult/" + data,
            dataType: 'json',
            type: 'get',
            success: function (data) {
                $.each(data.result, function (i, index) {
                    $('#cases tbody').append(`<tr>
                                    <td class="hidden-xs center">
                                        <div class="visible-md visible-lg hidden-sm hidden-xs">
                                            <a  class="btn btn-light-blue tooltips" data-placement="top" id="showCaseData"
data-case-id="${index.id}"
                                               data-original-title="Edit"><i class="fa fa-edit"></i></a>
                                        </div>
                                        <div class="visible-xs visible-sm hidden-md hidden-lg">
                                            <div class="btn-group">
                                                <a class="btn btn-green dropdown-toggle btn-sm"
                                                   data-toggle="dropdown" href="#" >
                                                    <i class="fa fa-cog"></i> <span class="caret"></span>
                                                </a>
                                                <ul role="menu" class="dropdown-menu dropdown-dark pull-right">
                                                    <li role="presentation">
                                                        <a role="menuitem" tabindex="-1" href="#">
                                                            <i class="fa fa-edit"></i> Edit
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="hidden-xs center">${index.court}</td>
                                    <td class="hidden-xs center">${index.invetation_num}</td> 
                                    <td class="hidden-xs center">${index.id}</td>
                                </tr>`);
                    if (data.status) {
                        $('#searchContainer').show();
                    } else {

                    }
                });
            }

        });
    });
    $(document).on('click', '#showCaseData', function () {
        caseId = $(this).data('case-id');
        $.ajax({
            url: "/caseDetails/" + caseId + "/edit",
            dataType: "json",
            success: function (html) {
                //for case data
                $('#to_whome').html(html.result.case.to_whome); //text
                $('#input_whome').val(html.result.case.to_whome); //input
                $('#invetation_num').html(html.result.case.invetation_num);
                $('#input_invetation_num').val(html.result.case.invetation_num);//input
                $('#inventation_type').html(html.result.case.inventation_type);
                $('#input_inventation_type').val(html.result.case.inventation_type);//input
                $('#court').html(html.result.case.court);
                $('#input_court').val(html.result.case.court);//input
                $('#circle_num').html(html.result.case.circle_num);
                $('#input_circle_num').val(html.result.case.circle_num);//input
                $('#first_session_date').html(html.result.case.first_session_date);
                //for counting
                $('#attach_count').html(html.result.attachments_counts);
                $('#notes_count').html(html.result.sessions_counts);
                $('#sessions_count').html(html.result.sessions_counts);
                //for sessions tabel
                $('#sessions_table tbody').prepend(html.result.sessions);
                $('#sessions_table').DataTable();
                //for mokel_table tabel
                $('#mokel_table tbody').prepend(html.result.clients);
                // $('#mokel_table').DataTable();
                //for khesm_table tabel
                $('#khesm_table tbody').prepend(html.result.khesm);
                // $('#khesm_table').DataTable();

            }
        })
    });
    //Edit Cases data
    $('#btn_case_update').click(function () {
        var form = $('#edit_case_form').serialize() + "&case_Id=" + caseId;
        console.log(form);
        $.ajax({
            url: config.routes.update_case_data,
            dataType: 'json',
            data: form,
            type: 'post',
            success: function (data) {
                toastr.success(data.msg);
            }, error: function (data_error, exception) {
                if (exception == 'error') {
                    $('#session_date_error').html(data_error.responseJSON.errors.session_date);
                }
            }
        });

    });
    //start sessions operations
    //show modal form for adding sessions
    $('#addSessionModal').click(function () {
        $('.modal-title').text("إضافة جلسة جديدة");
        $('#add_session').val("إضافة");
        $('#add_session_model').modal('show');
    });

    $(document).on('click', '#editSession', function () {
        var id = $(this).data('session-id');
        $.ajax({
            url: "caseDetails/showSessionData/" + id,
            dataType: "json",
            success: function (html) {
                $('#session_date').val(html.data.session_date);
                $('#sessionId').val(html.data.id);
                $('.modal-title').text("تعديل تاريخ الجلسة");
                $('#add_session').val("تعديل");
                $('#add_session_model').modal('show');

            }
        })
    });

    //adding /editnew session
    $('#add_session').click(function () {
        var form = $('#sessionForm').serialize() + "&case_Id=" + caseId;
        if ($('#add_session').val() == 'إضافة') {
            $.ajax({
                url: config.routes.add_session_route,
                dataType: 'json',
                data: form,
                type: 'post',
                success: function (data) {
                    // if (data.status == true) {
                    // $('#sessions-table tbody').append(data.result);
                    $('#sessions_table').prepend(data.result);

                    $('#add_session_model').modal('hide');
                    toastr.success(data.msg);
                    $("#sessionForm").trigger('reset');
                }, error: function (data_error, exception) {
                    if (exception == 'error') {
                        $('#session_date_error').html(data_error.responseJSON.errors.session_date);
                    }
                }
            });
        } else {
            $.ajax({
                url: config.routes.update_session_route,
                dataType: 'json',
                data: form,
                type: 'post',
                success: function (data) {
                    $("#session_date" + data.result.id).html(data.result.session_date);
                    toastr.success(data.msg);
                    $('#add_session_model').modal('hide');
                }, error: function (data_error, exception) {
                    if (exception == 'error') {
                        $('#session_date_error').html(data_error.responseJSON.errors.session_date);
                    }
                }
            });
        }
    });
    //update session status
    $(document).on('click', '#change-session-status', function () {
        var id = $(this).data('session-id');
        $.ajax({
            url: "caseDetails/updateStatus/" + id,
            dataType: "json",
            success: function (html) {
                $("#status" + html.result.id).html(html.result.status);

                // var status = html.status;
                if (html.status) {
                    $("#status" + html.result.id).removeClass("label label-danger");
                    $("#status" + html.result.id).addClass("label label-success");
                    toastr.success(html.msg);
                } else {
                    $("#status" + html.result.id).removeClass("label label-success");
                    $("#status" + html.result.id).addClass("label label-danger");
                    toastr.error(html.msg);
                }
            }
        })
    });
    $(document).on('click', '#deleteSession', function () {
        session_id = $(this).data('session-id');
        who_delete = "session";
        $('#confirmModal').modal('show');
    });
    $('#ok_button').click(function () {
        if (who_delete == "session") {
            $.ajax({
                url: "caseDetails/destroy/" + session_id,
                beforeSend: function () {
                    $('#ok_button').text('جارى الحذف ....');
                },
                success: function (data) {
                    setTimeout(function () {
                        $('#confirmModal').modal('hide');
                        $('#userRow' + session_id).remove();
                        $('#ok_button').text('حذف');
                    }, 1000);
                }
            })
        } else if (who_delete == "clients") {
            $.ajax({
                url: "caseDetails/deleteClient/" + caseId + "/" + client_id,
                beforeSend: function () {
                    $('#ok_button').text('جارى الحذف ....');
                },
                success: function (data) {
                    setTimeout(function () {
                        $('#confirmModal').modal('hide');
                        $('#userRow' + client_id).remove();
                        $('#ok_button').text('حذف');
                    }, 1000);
                }
            })
        } else {
            $.ajax({
                url: "notes/destroy/" + note_id,
                beforeSend: function () {
                    $('#ok_button').text('جارى الحذف ....');
                },
                success: function (data) {
                    setTimeout(function () {
                        $('#confirmModal').modal('hide');
                        $('#userRow' + note_id).remove();
                        $('#ok_button').text('حذف');
                    }, 1000);
                }
            })
        }
    });
    //end sessions

    //start for session notes
    //get notes for one session
    $(document).on('click', '#showSessionNotes', function () {
        $('#session-notes-table tbody tr').remove();
        session_id = $(this).data('session-id');
        $.ajax({
            url: "caseDetails/getSessionNotes/" + session_id,
            dataType: "json",
            success: function (html) {
                $('#session-notes-table tbody').prepend(html.result);
                $('#session-notes-table').DataTable();

            }
        })
    });
    //show modal form for adding notes
    $('#addNotesModal').click(function () {
        console.log(session_id);
        if (session_id != null) {
            $('.modal-title').text("إضافة ملاحظة جديدة");
            $('#add_note').val("إضافة");
            $('#add_note_model').modal('show');
        } else {
            toastr.error('يجب إختيار الجلسة اولا');
        }
    });
    //add notes
    $('#add_note').click(function () {
        var form = $('#notesForm').serialize() + "&session_Id=" + session_id;
        if ($('#add_note').val() == 'إضافة') {
            $.ajax({
                url: config.routes.add_note_route,
                dataType: 'json',
                data: form,
                type: 'post',

                success: function (data) {
                    // if (data.status == true) {
                    // $('#sessions-table tbody').append(data.result);
                    $('#session-notes-table').prepend(data.result);

                    $('#add_note_model').modal('hide');
                    toastr.success(data.msg);
                    $("#notesForm").trigger('reset');
                }, error: function (data_error, exception) {
                    if (exception == 'error') {
                        $('#note_error').html(data_error.responseJSON.errors.note);
                    }
                }
            });
        } else {
            $.ajax({
                url: config.routes.update_note_route,
                dataType: 'json',
                data: form,
                type: 'post',
                success: function (data) {
                    $("#note" + data.result.id).html(data.result.note);
                    toastr.success(data.msg);
                    $('#add_note_model').modal('hide');
                    $("#notesForm").trigger('reset');
                }, error: function (data_error, exception) {
                    if (exception == 'error') {
                        $('#note_error').html(data_error.responseJSON.errors.note);
                    }
                }
            });
        }
    });
    //show modal for edit note
    $(document).on('click', '#editNote', function () {
        var id = $(this).data('notes-id');
        $.ajax({
            url: "/notes/" + id + "/edit",
            dataType: "json",
            success: function (html) {
                $('#note').val(html.data.note);
                $('#noteId').val(html.data.id);
                $('.modal-title').text("تعديل الملاحظة ");
                $('#add_note').val("تعديل");
                $('#add_note_model').modal('show');

            }
        })
    });
    $(document).on('click', '#deleteNote', function () {
        note_id = $(this).data('notes-id');
        who_delete = "note";
        $('#confirmModal').modal('show');
    });
    $(document).on('click', '#change-note-status', function () {
        var id = $(this).data('notes-id');
        $.ajax({
            url: "notes/updateStatus/" + id,
            dataType: "json",
            success: function (html) {
                $("#status" + html.result.id).html(html.result.status);
                // var status = html.status;
                if (html.status) {
                    $("#status" + html.result.id).removeClass("label label-danger");
                    $("#status" + html.result.id).addClass("label label-success");
                    toastr.success(html.msg);
                } else {
                    $("#status" + html.result.id).removeClass("label label-success");
                    $("#status" + html.result.id).addClass("label label-danger");
                    toastr.error(html.msg);
                }
            }
        })
    });
    //print session Notes
    $(document).on('click', '#printNotes', function () {
        window.location.href = "notes/exportNotes/" + session_id;
    });

    //clients operations
    // delete mokel
    $(document).on('click', '#deleteSession', function () {
        client_id = $(this).data('mokel-id');
        who_delete = "clients";
        $('#confirmModal').modal('show');
    });
    // show mokel modal
    $('#addMokelModal').click(function () {
        if (caseId != null) {
            $('#form-field-select-4').empty();
            $('#form-field-select-4').val("");
            $.ajax({
                url: "caseDetails/getClientByType/client/" + caseId,
                dataType: "json",
                success: function (html) {
                    $('#form-field-select-4').append(html.result);
                    $('.modal-title').text("إضافة موكلين جدد");
                    $('#add_mokel').val("إضافة الموكل");
                    $('#add_new_mokel_modal').modal('show');

                }
            })

        } else {
            toastr.error('يجب إختيار الدعوى اولا');
        }
    });
    // show khesm modal
    $('#addKhesmModal').click(function () {
        if (caseId != null) {
            $('#form-field-select-4').empty();
            $('#form-field-select-4').val("");
            $.ajax({
                url: "caseDetails/getClientByType/khesm/" + caseId,
                dataType: "json",
                success: function (html) {
                    $('#form-field-select-4').append(html.result);
                    $('.modal-title').text("إضافة خصوم جدد");
                    $('#add_mokel').val("إضافة الخصم");
                    $('#add_new_mokel_modal').modal('show');

                }
            })

        } else {
            toastr.error('يجب إختيار الدعوى اولا');
        }
    });

    $('#add_mokel').click(function () {
        var form = $('#addMokelForm').serialize() + "&case_id=" + caseId;

        $.ajax({
            url: config.routes.add_new_client,
            dataType: 'json',
            data: form,
            type: 'post',
            beforeSend: function () {
                $('#mokel_error').empty();

            }, success: function (data) {
                $('#add_new_mokel_modal').modal('hide');
                if ($('#add_mokel').val() == 'إضافة الموكل') {
                    $('#mokel_table').prepend(data.result);
                } else {
                    $('#khesm_table').prepend(data.result);
                }
                toastr.success(data.msg);
            }, error: function (data_error, exception) {
                if (exception == 'error') {
                    $('#mokel_error').html(data_error.responseJSON.errors.mokel_name);
                }
            }
        });

    });
});
$(document).ready(function () {
    $(".modal").on("hidden.bs.modal", function () {
        $("#sessionForm").trigger('reset');
    });
});
