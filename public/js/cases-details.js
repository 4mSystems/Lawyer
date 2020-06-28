$(document).ready(function () {

    var caseId;
    var session_id;
    var client_id;
    var note_id;
    var who_delete;

    $('#cases').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: config.routes.get_cases_route,
        },
        columns: [
            {
                data: 'id',
                name: 'id',
                className: 'center'
            },
            {
                data: 'client_Name',
                name: 'client_Name',
                className: 'center'
            }, {
                data: 'invetation_num',
                name: 'invetation_num',
                className: 'center'
            }, {
                data: 'court',
                name: 'court',
                className: 'center'
            },
            {
                data: 'action',
                name: 'action',
                orderable: false,
                className: 'center'
            }
        ]
    });

    $(document).on('click', '#showCaseData', function () {
        $('#mokel_table tbody').empty();
        $('#khesm_table tbody').empty();
        $('#sessions_table tbody').empty();
        caseId = $(this).data('case-id');
        $('#mainContainer').show();
        var href = "caseDetails/printCase/" + caseId;
        $('#btnPrintCase').attr("href", href);

        $.ajax({
            url: "/caseDetails/" + caseId + "/edit",
            dataType: "json",
            success: function (html) {
                //for case data
                console.log(html.result.case.to_whome);
                $('#to_whome').val(html.result.case.to_whome); //text
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

                //for mokel_table tabel
                $('#mokel_table tbody').prepend(html.result.clients);
                // $('#mokel_table').DataTable();
                //for khesm_table tabel
                $('#khesm_table tbody').prepend(html.result.khesm);
                // $('#khesm_table').DataTable();

                //attachments url
                var attachment_url = "attachment/" + caseId;
                $('#attachment').attr("href", attachment_url);
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
    $(document).on('click', '#session_note_tab', function () {
        if (caseId) {
            $("#sessions_table").dataTable().fnDestroy();
            $('#sessions_table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "caseDetails/getSessions/" + caseId,
                },
                columns: [
                    {
                        data: 'id',
                        name: 'id',
                        className: 'center'
                    },
                    {
                        data: 'session_date',
                        name: 'session_date',
                        className: 'center'
                    }, {
                        data: 'status',
                        name: 'status',
                        className: 'center'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        className: 'center'
                    }
                ]
            });
        }else {
            console.log('eslse');
        }

    });

    //show modal form for adding sessions
    $('#addSessionModal').click(function () {
        if (caseId != null) {

            $('.modal-title').text(config.trans.add_session_btn);
            $('#add_session').val(config.trans.add_session_btn);
            $('#add_session_model').modal('show');
        } else {
            toastr.error(config.trans.search_case_case_warning_text);
        }
    });

    $(document).on('click', '#editSession', function () {
        var id = $(this).data('session-id');
        $.ajax({
            url: "caseDetails/showSessionData/" + id,
            dataType: "json",
            success: function (html) {
                $('#session_date').val(html.data.session_date);
                $('#sessionId').val(html.data.id);
                $('.modal-title').text(config.trans.edit_session_modal_title);
                $('#add_session').val(config.trans.edit_public);
                $('#add_session_model').modal('show');

            }
        })
    });

    //adding /editnew session
    $('#sessionForm').on('submit', function (event) {
        event.preventDefault();
        $('#case_Id').val(caseId);
        if ($('#add_session').val() == config.trans.add_session_btn) {
            $.ajax({
                url: config.routes.add_session_route,
                method: 'post',
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                dataType: "json",
                success: function (data) {
                    $('#sessions_table').DataTable().ajax.reload();
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
                method: 'post',
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                dataType: "json",
                success: function (data) {
                    $('#sessions_table').DataTable().ajax.reload();
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
                $('#sessions_table').DataTable().ajax.reload();
                if (html.status) {
                    toastr.success(html.msg);
                } else {
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
                    $('#ok_button').text(config.trans.public_continue_delete_modal_text);
                },
                success: function (data) {
                    setTimeout(function () {
                        $('#confirmModal').modal('hide');
                        $('#sessions_table').DataTable().ajax.reload();
                        $('#ok_button').text(config.trans.public_delete_text);
                    }, 1000);
                }, error: function (data_error, exception) {
                    var warning = config.trans.search_case_delete_session_text;
                    console.log(warning);
                    $('#confirmModal').modal('hide');
                    $('#ok_button').text(config.trans.public_delete_text);
                    toastr.error(config.trans.search_case_delete_session_text);
                }
            })
        } else if (who_delete == "clients") {
            $.ajax({
                url: "caseDetails/deleteClient/" + caseId + "/" + client_id,
                beforeSend: function () {
                    $('#ok_button').text(config.trans.public_continue_delete_modal_text);
                },
                success: function (data) {
                    setTimeout(function () {
                        $('#confirmModal').modal('hide');
                        $('#userRow' + client_id).remove();
                        $('#ok_button').text(config.trans.public_delete_text);
                    }, 1000);
                }
            })
        } else if (who_delete == "note") {
            $.ajax({
                url: "notes/destroy/" + note_id,
                beforeSend: function () {
                    $('#ok_button').text(config.trans.public_continue_delete_modal_text);
                },
                success: function (data) {
                    setTimeout(function () {
                        $('#confirmModal').modal('hide');
                        $('#session-notes-table').DataTable().ajax.reload();
                        $('#ok_button').text(config.trans.public_delete_text);
                    }, 1000);
                }
            })
        }
    });
    //end sessions

    //start for session notes
    //get notes for one session
    $(document).on('click', '#showSessionNotes', function () {
        // $('#session-notes-table tbody tr').remove();
        $("#session-notes-table").dataTable().fnDestroy();
        session_id = $(this).data('session-id');
        var href = "caseDetails/printSessionNotes/" + session_id;
        $('#btnPrintNotes').attr("href", href);
        $('#session-notes-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "caseDetails/getSessionNotes/" + session_id,
            },
            columns: [
                {
                    data: 'id',
                    name: 'id',
                    className: 'center'
                },
                {
                    data: 'note',
                    name: 'note',
                    className: 'center'
                }, {
                    data: 'status',
                    name: 'status',
                    className: 'center'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    className: 'center'
                }
            ]
        });
    });

    //show modal form for adding notes
    $('#addNotesModal').click(function () {
        if (session_id != null) {
            $('#modal_title').text(config.trans.search_case_case_add_note);
            $('#add_note').val(config.trans.public_add_btn_text);
            $('#add_note_model').modal('show');
        } else {
            toastr.error(config.trans.search_case_session_id_warning_text);
        }
    });
    //add notes
    $('#notesForm').on('submit', function (event) {
        event.preventDefault();
        // var form = $('#notesForm').serialize() + "&session_Id=" + session_id;
        $('#session_Id').val(session_id);
        if ($('#add_note').val() == config.trans.public_add_btn_text) {
            $.ajax({
                url: config.routes.add_note_route,
                method: 'post',
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                dataType: "json",
                success: function (data) {
                    // if (data.status == true) {
                    // $('#sessions-table tbody').append(data.result);
                    $('#session-notes-table').DataTable().ajax.reload();
                    $('#add_note_model').modal('hide');
                    $("#notesForm").trigger('reset');
                    toastr.success(data.msg);
                }, error: function (data_error, exception) {
                    if (exception == 'error') {
                        $('#note_error').html(data_error.responseJSON.errors.note);
                    }
                }
            });
        } else {
            $.ajax({
                url: config.routes.update_note_route,
                method: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                dataType: "json",
                success: function (data) {
                    $('#session-notes-table').DataTable().ajax.reload();
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
                $('.modal-title').text(config.trans.search_case_session_modal_title_edit);
                $('#add_note').val(config.trans.public_edit_btn_text);
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
                $('#session-notes-table').DataTable().ajax.reload();
                if (html.status) {
                    toastr.success(html.msg);
                } else {
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
    $(document).on('click', '#deleteClient', function () {
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
                    $('.modal-title').text(config.trans.clients_add_new_client_text);
                    $('#add_mokel').val(config.trans.search_case_add_client);
                    $('#add_new_mokel_modal').modal('show');

                }
            })

        } else {
            toastr.error(config.trans.search_case_case_warning_text);
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
                    $('.modal-title').text(config.trans.clients_add_new_khesm_text);
                    $('#add_mokel').val(config.trans.search_case_add_khesm);
                    $('#add_new_mokel_modal').modal('show');

                }
            })

        } else {
            toastr.error(config.trans.search_case_case_warning_text);
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
                if ($('#add_mokel').val() == config.trans.search_case_add_client) {
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
