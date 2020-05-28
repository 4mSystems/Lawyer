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
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

    <style>
        body {
            font-family: 'Cairo';
            font-size: 22px;
        }
    </style>
    <![endif]-->
</head>

<body>
<div class="container">
    <div class="row">
        <div class="col-md-12">

            <div style="text-align:center;font-size: 30px;background-color: #8E9AA2;color: white;">

                <hl class="center">ملاحظات الجلسة</hl>

            </div>
            <br>
            <table class="table table-striped table-bordered table-hover table-full-width"
                   style="font-family: 'Cairo';font-size: 13px;text-align: center;" id="PrintdailyTable">
                <thead>
                <tr>
                    <th style="font-family: 'Cairo';font-size: 17px;text-align: center;">ملاحظات</th>
                    <th style="font-family: 'Cairo';font-size: 17px;text-align: center;">التاريخ</th>
                    <th style="font-family: 'Cairo';font-size: 17px;text-align: center;width: 5%;">م</th>
                </tr>
                </thead>

                <tbody>
                @php
                    $i=1;
                @endphp

                @foreach($data as $row)
                    <tr>

                        <td class="hidden-xs center">{{$row->note}}</td>
                        <td class="hidden-xs center">{{$row->created_at->format('Y-m-d')}}</td>

                        <td class="hidden-xs center">
                            {{$i}}
                        </td>


                    </tr>
                    @php
                        $i=$i+1;
                    @endphp
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
