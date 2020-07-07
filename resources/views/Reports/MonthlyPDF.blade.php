<!DOCTYPE html>
<html lang="en">
<head>
<!-- <style>
 @page { size: 500pt 500pt; }  
 </style> -->
    <!-- <meta charset="utf-8"> -->
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

    
</head>

<body>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div style="text-align:center;font-size: 30px;background-color: #8E9AA2;color: white;">
                <hl class="center">{{$year}}&nbsp; {{trans('site_lang.reports_print_month_1')}}</hl>
                <hl class="center">{{$month}}&nbsp;{{trans('site_lang.reports_print_month_2')}}</hl>
            </div>
            <br>
            <table class="table table-striped table-bordered table-hover table-full-width"
                   id="PrintdailyTable">
                <thead>
                <tr>
                    <th style="text-align: center;">{{trans('site_lang.mohdar_notes')}}</th>
                    <th style="text-align: center;">{{trans('site_lang.home_session_date')}}</th>
                    <th style="text-align: center;">{{trans('site_lang.add_case_court')}}</th>
                    <th style="text-align: center;">{{trans('site_lang.add_case_inventation_type')}}</th>
                    <th style="text-align: center;">{{trans('site_lang.add_case_circle_num')}}</th>
                    <th style="text-align: center;">{{trans('site_lang.home_session_case_number')}}</th>
                    <th style="text-align: center;">{{trans('site_lang.clients_client_type_khesm')}}</th>
                    <th style="text-align: center;">{{trans('site_lang.clients_client_type_client')}}</th>
                    <th style="text-align: center;">#</th>
                </tr>
                </thead>

                <tbody>

                {{--                @foreach($data as $caseSession)--}}
                @php
                    $i=1;
                @endphp

                @foreach($data as $row)
                    <tr>
                        @if ($row->Printnotes ==null)
                            <td style="text-align: center;">----</td>
                        @else
                            <td style="text-align: center;">{{$row->Printnotes->note}}</td>
                        @endif
                        <td style="text-align: center;">{{$row->session_date}}</td>
                        <td style="text-align: center;">{{$row->cases->court}}</td>
                        <td style="text-align: center;">{{$row->cases->inventation_type}}</td>
                        <td style="text-align: center;">{{$row->cases->circle_num}}</td>
                        <td style="text-align: center;">{{$row->cases->invetation_num}}</td>
                        <td style="text-align: center;">{{$khesm->client_Name}}</td>
                        <td style="text-align: center;">{{$clients->client_Name}}</td>
                        <td style="text-align: center;">
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
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> -->
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
</body>
</html>
