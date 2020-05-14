<?php $__env->startSection('content'); ?>



 <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Session molahzats</h4>
      </div>
      <div class="modal-body">
        <p>   <?php echo e($data->id); ?> </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>







<?php $__env->stopSection(); ?>
<?php echo $__env->make('welcome', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\LawerWeb\resources\views/session_notes.blade.php ENDPATH**/ ?>