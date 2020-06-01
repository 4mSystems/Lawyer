<!-- start: HEAD -->
<?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- end: HEAD -->
<!-- start: TOPBAR -->
<?php echo $__env->make('layouts.topbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- end: TOPBAR -->
<!-- start: PAGESLIDE LEFT -->
<?php echo $__env->make('layouts.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- end: PAGESLIDE LEFT -->

<!-- start: MAIN CONTAINER -->
<?php echo $__env->yieldContent('content'); ?>


<?php echo $__env->make('layouts.modals', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- end: MAIN CONTAINER -->
<?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH C:\xampp\htdocs\Lawyer\resources\views/welcome.blade.php ENDPATH**/ ?>