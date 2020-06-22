$(document).ready(function () {
    $('#categories_tbl').DataTable();

    $('#addCategoryModal').click(function () {
        $('#modal_title').text(config.trans.add_new_category_text);
        $('#add_category').val(config.trans.public_add_btn_text);
        $('#add_category_model').modal('show');
    });

    $('#add_category').click(function () {
        var form = $('#categories').serialize();
        if ($('#add_category').val() == config.trans.public_add_btn_text) {
            $.ajax({
                url: config.routes.add_category_route,
                dataType: 'json',
                data: form,
                type: 'post',
                beforeSend: function () {
                    $('#category_name_error').empty();
                }, success: function (data) {
                    $('#categories_tbl tbody').append(data.result);
                    $('#categories_tbl').DataTable();
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
                dataType: 'json',
                data: form,
                type: 'post',
                beforeSend: function () {
                    $('#category_name_error').empty();
                }, success: function (data) {
                    $("#categoryId" + data.result.id).html(data.result.id);
                    $("#categoryName" + data.result.id).html(data.result.name);
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
                    $('#confirmModal').modal('hide');
                    $('#userRow' + category_id).remove();
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
