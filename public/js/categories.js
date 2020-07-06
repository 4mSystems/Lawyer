$(document).ready(function () {

    $('#categories_tbl').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: config.routes.get_category_route,
        },
        columns: [
            {
                data: 'id',
                name: 'id',
                className: 'center'
            },
            {
                data: 'name',
                name: 'name',
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
    $('#addCategoryModal').click(function () {
        $('#modal_title').text(config.trans.add_new_category_text);
        $('#add_category').val(config.trans.public_add_btn_text);
        $('#add_category_model').modal('show');
    });
    $('#categories').on('submit', function (event) {
        event.preventDefault();
        if ($('#add_category').val() == config.trans.public_add_btn_text) {
            $.ajax({
                url: config.routes.add_category_route,
                method: 'post',
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                dataType: "json",
                beforeSend: function () {
                    $('#category_name_error').empty();
                }, success: function (data) {
                    $('#categories_tbl').DataTable().ajax.reload();
                    $('#add_category_model').modal('hide');
                    toastr.success(data.msg);
                    $("#categories").trigger('reset');
                }, error: function (data_error, exception) {
                    if (exception == 'error') {
                        $('#category_name_error').html(data_error.responseJSON.errors.name);
                    }
                }
            });
        } else {
            $.ajax({
                url: config.routes.update_category_route,
                method: 'post',
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                dataType: "json",
                beforeSend: function () {
                    $('#category_name_error').empty();
                }, success: function (data) {
                    $('#categories_tbl').DataTable().ajax.reload();
                    toastr.success(data.msg);
                    $('#add_category_model').modal('hide');
                    $("#categories").trigger('reset');
                }, error: function (data_error, exception) {
                    if (exception == 'error') {

                    }
                }
            });
        }
    });
    $(document).on('click', '#editCategory', function () {
        var id = $(this).data('category-id');
        $.ajax({
            url: "/categories/" + id + "/edit",
            dataType: "json",
            success: function (html) {
                $('#name').val(html.data.name);
                $('#id').val(html.data.id);
                $('#modal_title').text(config.trans.edit_category_text);
                $('#add_category').val(config.trans.public_edit_btn_text);
                $('#add_category_model').modal('show');

            }
        })
    });
    var category_id;

    $(document).on('click', '#deleteCategory', function () {
        category_id = $(this).data('category-id');
        $('#confirmModal').modal('show');
    });

    $('#ok_button').click(function () {
        $.ajax({
            url: "categories/destroy/" + category_id,
            beforeSend: function () {
                $('#ok_button').text(config.trans.public_continue_delete_modal_text);
            },
            success: function (data) {
                setTimeout(function () {
                    console.log(data);
                    toastr.error(data.msg);
                    $('#confirmModal').modal('hide');
                    $('#categories_tbl').DataTable().ajax.reload();
                }, 100);
            }
        })
    });
});
$(document).ready(function () {
    $(".modal").on("hidden.bs.modal", function () {
        $("#categories").trigger('reset');
    });
});
