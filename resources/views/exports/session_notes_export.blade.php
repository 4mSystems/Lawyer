<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: small;
        }

        #customers {
            border-collapse: collapse;
            width: 100%;
            text-align: center;
        }

        #customers td, #customers th {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;

        }

        #customers tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #customers tr:hover {
            background-color: #ddd;
        }

        #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: center;
            background-color: #ffffff;
            color: black;
        }
    </style>
</head>
<body>
<h1></h1>
<table id="customers">
    <thead>
    <tr>
        <th class="hidden-xs center">الحالة</th>
        <th class="hidden-xs center">الملاحظة</th>
        <th class="hidden-xs center">#</th>
    </tr>
    </thead>
    <tbody>
    @foreach($notes as $note)
        <tr>
            <td><p>{{$note->status}}</p></td>
            <td><p>{{$note->note}}</p></td>
            <td><p>{{$note->id}}</p></td>
        </tr>
    @endforeach

    </tbody>
</table>


</body>
<!-- end: BODY -->

<!-- Mirrored from www.cliptheme.com/demo/rapido/ by HTTrack Website Copier/3.x [XR&CO'2013], Sat, 01 Nov 2014 18:50:59 GMT -->
</html>
