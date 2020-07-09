<tr>
    <td class="hidden-xs center"><?php echo e($clients->client_Name); ?></td>
    <td class="hidden-xs center"><?php echo e($khesm->client_Name); ?></td>
    <td class="hidden-xs center"><?php echo e($result->cases->invetation_num); ?></td>
    <td class="hidden-xs center"><?php echo e($result->cases->circle_num); ?></td>
    <td class="hidden-xs center"><?php echo e($result->cases->inventation_type); ?></td>
    <td class="hidden-xs center"><?php echo e($result->cases->court); ?></td>
    <td class="hidden-xs center"><?php echo e($result->session_date); ?></td>
    <?php if($result->printnotes ==null): ?>
        <td class="hidden-xs center">----</td>
    <?php else: ?>
        <td class="hidden-xs center"><?php echo e($result->printnotes->note); ?></td>
    <?php endif; ?>
</tr>
<?php /**PATH C:\xampp\htdocs\Lawyer\resources\views/Reports/reports_daily_item.blade.php ENDPATH**/ ?>