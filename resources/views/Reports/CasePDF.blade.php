<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Report</title>

    <!-- Bootstrap -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href='https://fonts.googleapis.com/css2?family=Cairo' rel='stylesheet'>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!-- [if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

    <!-- <style>
        body {
            font-family: 'Cairo';
            font-size: 22px;
        }
    </style> -->
    <![endif]-->
</head>

<body style="direction: rtl;">
<div class="container">
    <div class="row">
        <div class="col-md-12">

            <hr>
            <table class="table table-striped  table-hover table-full-width"
                   style="font-family: 'Cairo';font-size: 13px;text-align: center;" id="PrintdailyTable">
                <thead>
                @foreach($data as $row)
                <tr>
                    <th style="text-align: center;">محكمة</th>
                    <th style="text-align: center;">{{$row->court}}</th>
                    <th style="text-align: center;"> </th>
                    <th style="text-align: center;"></th>
                    <th style="text-align: center;">رقم الدائرة</th>
                    <th style="text-align: center;">{{$row->circle_num}}</th>
                </tr>
                </thead>
                <tbody>

                <tr>

                    <td ></td>
                    <td ></td>
                    <td class="hidden-xs center"></td>
                    <td class="hidden-xs center"></td>
                    <td style="text-align: center;"></td>
                    <td style="text-align: center;"> &nbsp;&nbsp; </td>


                </tr>

                    <tr>

                        <td class="hidden-xs center">رقم القضية </td>
                        <td class="hidden-xs center">{{$row->invetation_num}}</td>
                        <td class="hidden-xs center">لسنة</td>
                        <td class="hidden-xs center">{{$row->year}}</td>
                        <td style="text-align: center;">نوع الدعوى</td>
                        <td style="text-align: center;">{{$row->inventation_type}}</td>


                    </tr>

                @endforeach


                </tbody>
            </table>
            <hr>


        </div>
        <div class="col-md-12">
            <label style="text-decoration: underline;">اسماء الموكلين :</label>
            &nbsp;&nbsp;
            <table class="table table-striped table-bordered table-hover table-full-width"
                   style="font-family: 'Cairo';font-size: 13px;text-align: center;" id="PrintdailyTable">
                <thead>

                    <tr>
                        <th style="text-align: center;">الاسم</th>
                        <th style="text-align: center;width: 350px;">ملاحظة</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($clients as $client)

                <tr>

                    <td class="hidden-xs center">{{$client->client_Name}} </td>
                    <td class="hidden-xs center"> </td>

                </tr>

                @endforeach

                </tbody>
            </table>

        </div>
        <hr>


        <div class="col-md-12">
            <label style="text-decoration: underline;">اسماء الخصوم :</label>
            &nbsp;&nbsp;
            <table class="table table-striped table-bordered table-hover table-full-width"
                   style="font-family: 'Cairo';font-size: 13px;text-align: center;" id="PrintdailyTable">
                <thead>

                <tr>
                    <th style="text-align: center;">الاسم</th>
                    <th style="text-align: center;width: 350px;">ملاحظة</th>
                </tr>
                </thead>
                <tbody>
                @foreach($khesm as $kh)

                    <tr>

                        <td class="hidden-xs center">{{$kh->client_Name}} </td>
                        <td class="hidden-xs center"> </td>

                    </tr>

                @endforeach

                </tbody>
            </table>

        </div>
        <hr>
        <div class="col-md-12">
            <label style="text-decoration: underline;">الجلسات و الملاحظات  :</label>
            &nbsp;&nbsp;
            <table class="table table-striped table-bordered table-hover table-full-width"
                   style="font-family: 'Cairo';font-size: 13px;text-align: center;" id="PrintdailyTable">
                <thead>

                <tr>
                    <th style="text-align: center;">تاريخ الجلسة</th>
                    <th style="text-align: center;width: 350px;">الملاحظة</th>
                </tr>
                </thead>
                <tbody>
                @endphp
                @foreach($Sessions as $row)
                    <tr>
                        <td class="hidden-xs center">{{$row->session_date}}</td>
                        <td class="hidden-xs center">
                        @foreach($row->notes as $note)

                                {{$note->note}}
<br>
                            @endforeach
                        </td>


                    </tr>

                @endforeach

                </tbody>
            </table>

        </div>
    </div>
</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
</body>
</html>
