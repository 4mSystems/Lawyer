$(document).ready(function () {
    var data;
    var month;
    var year;
    var type;

    $('#search_daily').datepicker({

        autoclose: true,

    }).on('changeDate', function (ev) {
        data = $(this).val();
        if ($('#user_type').val() == 'User') {
            type = $('#user_cat').val();
        } else
            type = $('#Dailytype').val();
        $('#dailyTable tbody').empty();
        var href = "dailyPdf/" + data + "/" + type;
        $('#btn_search_daily').attr("href", href);

        $.ajax({
            url: "dailyReport/" + data + "/" + type,
            dataType: 'json',
            type: 'get',
            success: function (data) {
                $('#dailyTable tbody').prepend(data.result);
                $('#dailyTable').DataTable();

            }

        });
    });


    $("#Month").change(function () {
        month = $('#Month').val();
        year = $('#year').val();
        // type = $('#type').val();
        if ($('#user_type').val() == 'User') {
            type = $('#user_cat').val();
        } else
            type = $('#type').val();
        $('#MonthlyTable tbody').empty();

        var hrefMonthly = "monthlyPdf/" + month + "/" + year + "/" + type;
        $('#btn_search_monthly').attr("href", hrefMonthly);

        $.ajax({
            url: "dailyReport/searchMonthly/" + month + "/" + year + "/" + type,
            dataType: 'json',
            type: 'get',
            success: function (data) {

                $('#MonthlyTable tbody').prepend(data.result);
                $('#MonthlyTable').DataTable();

            }
        });
    });

    $("#year").change(function () {
        month = $('#Month').val();
        year = $('#year').val();
        // type = $('#type').val();
        if ($('#user_type').val() == 'User') {
            type = $('#user_cat').val();
        } else
            type = $('#type').val();
        $('#MonthlyTable tbody').empty();

        var hrefMonthly = "monthlyPdf/" + month + "/" + year + "/" + type;
        $('#btn_search_monthly').attr("href", hrefMonthly);

        $.ajax({
            url: "dailyReport/searchMonthly/" + month + "/" + year + "/" + type,
            dataType: 'json',
            type: 'get',
            success: function (data) {

                $('#MonthlyTable tbody').prepend(data.result);
                $('#MonthlyTable').DataTable();

            }
        });
    });

    $("#type").change(function () {
        month = $('#Month').val();
        year = $('#year').val();
        // type = $('#type').val();
        if ($('#user_type').val() == 'User') {
            type = $('#user_cat').val();
        } else
            type = $('#type').val();
        $('#MonthlyTable tbody').empty();

        var hrefMonthly = "monthlyPdf/" + month + "/" + year + "/" + type;
        $('#btn_search_monthly').attr("href", hrefMonthly);

        $.ajax({
            url: "dailyReport/searchMonthly/" + month + "/" + year + "/" + type,
            dataType: 'json',
            type: 'get',
            success: function (data) {

                $('#MonthlyTable tbody').prepend(data.result);
                $('#MonthlyTable').DataTable();

            }
        });
    });

    $("#Dailytype").change(function () {

        // type = $('#Dailytype').val();
        if ($('#user_type').val() == 'User') {
            type = $('#user_cat').val();
        } else
            type = $('#Dailytype').val();
        $('#dailyTable tbody').empty();
        var href = "dailyPdf/" + data + "/" + type;
        $('#btn_search_daily').attr("href", href);

        $.ajax({
            url: "dailyReport/" + data + "/" + type,
            dataType: 'json',
            type: 'get',
            success: function (data) {

                $('#dailyTable tbody').prepend(data.result);
                $('#dailyTable').DataTable();

            }
        });
    });
});


