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

<body style="direction: rtl;">
<div class="container">
    <div class="row">
        <div class="col-md-12">

            <hr>
            <table class="table table-striped  table-hover table-full-width"
                   style="font-family: 'Cairo';font-size: 13px;text-align: center;" id="PrintdailyTable">
                <thead>
                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <th style="text-align: center;">محكمة</th>
                    <th style="text-align: center;"><?php echo e($row->court); ?></th>
                    <th style="text-align: center;"> </th>
                    <th style="text-align: center;"></th>
                    <th style="text-align: center;">رقم الدائرة</th>
                    <th style="text-align: center;"><?php echo e($row->circle_num); ?></th>
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
                        <td class="hidden-xs center"><?php echo e($row->invetation_num); ?></td>
                        <td class="hidden-xs center">لسنة</td>
                        <td class="hidden-xs center"><?php echo e($row->year); ?></td>
                        <td style="text-align: center;">نوع الدعوى</td>
                        <td style="text-align: center;"><?php echo e($row->inventation_type); ?></td>


                    </tr>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


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
                <?php $__currentLoopData = $clients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $client): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <tr>

                    <td class="hidden-xs center"><?php echo e($client->client_Name); ?> </td>
                    <td class="hidden-xs center"> </td>

                </tr>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

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
                <?php $__currentLoopData = $khesm; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kh): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <tr>

                        <td class="hidden-xs center"><?php echo e($kh->client_Name); ?> </td>
                        <td class="hidden-xs center"> </td>

                    </tr>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

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
                <?php $__currentLoopData = $Sessions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td class="hidden-xs center"><?php echo e($row->session_date); ?></td>
                        <td class="hidden-xs center">
                        <?php $__currentLoopData = $row->notes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $note): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <?php echo e($note->note); ?>

<br>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </td>


                    </tr>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

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
<?php /**PATH C:\xampp\htdocs\Lawyer\resources\views/Reports/CasePDF.blade.php ENDPATH**/ ?>