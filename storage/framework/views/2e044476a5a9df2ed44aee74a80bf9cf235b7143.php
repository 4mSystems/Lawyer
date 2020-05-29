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

        #customers tr:nth-child(even){background-color: #f2f2f2;}

        #customers tr:hover {background-color: #ddd;}

        #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: center;
            background-color: #4CAF50;
            color: white;
        }
    </style>
</head>
<body>
<table id="customers">
    <thead>
    <tr>
        <th class="hidden-xs">الحالة</th>
        <th class="hidden-xs">تاريخ الجلسة</th>
        <th class="hidden-xs">رقم الورقة</th>
        <th class="hidden-xs">تاريخ تسليم الورقة</th>
        <th class="hidden-xs">نوع الورقة</th>
        <th>محضرين المحكمه</th>
        <th class="center">#</th>
    </tr>
    </thead>
    <tbody>
    <?php $__currentLoopData = $mohdareen; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mohdar): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td >
                <p><?php echo e($mohdar->status); ?></p>

            </td>
            <td><p
                    id="session_Date<?php echo e($mohdar->moh_Id); ?>"><?php echo e($mohdar->session_Date); ?></p></td>
            <td ><p><?php echo e($mohdar->paper_Number); ?></p></td>
            <td ><p
                    id="deliver_data<?php echo e($mohdar->moh_Id); ?>"><?php echo e($mohdar->deliver_data); ?></p></td>
            <td><p id="paper_type<?php echo e($mohdar->moh_Id); ?>"><?php echo e($mohdar->paper_type); ?></p></td>
            <td><p id="court_mohdareen<?php echo e($mohdar->moh_Id); ?>"><?php echo e($mohdar->court_mohdareen); ?></p></td>
            <td ><p id="moh_Id<?php echo e($mohdar->moh_Id); ?>"><?php echo e($mohdar->moh_Id); ?></p></td>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </tbody>
</table>



</body>
<!-- end: BODY -->

<!-- Mirrored from www.cliptheme.com/demo/rapido/ by HTTrack Website Copier/3.x [XR&CO'2013], Sat, 01 Nov 2014 18:50:59 GMT -->
</html>
<?php /**PATH C:\xampp\htdocs\Lawyer\resources\views/exports/mohdar_export.blade.php ENDPATH**/ ?>