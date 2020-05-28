<tr>
    <?php if($result->notes ==null): ?>
        <td class="hidden-xs center">----</td>
    <?php else: ?>
        <td class="hidden-xs center"><?php echo e($result->printnotes->note); ?></td>
    <?php endif; ?>
    <td class="hidden-xs center"><?php echo e($result->session_date); ?></td>
    <td class="hidden-xs center"><?php echo e($result->cases->inventation_type); ?></td>
    <td class="hidden-xs center"><?php echo e($result->cases->circle_num); ?></td>
    <td class="hidden-xs center"><?php echo e($result->cases->invetation_num); ?></td>
    <td class="hidden-xs center"><?php echo e($khesm->client_Name); ?></td>
    <td class="hidden-xs center"><?php echo e($clients->client_Name); ?></td>
</tr><?php /**PATH C:\xampp\htdocs\Lawyer\resources\views/Reports/reports_daily_item.blade.php ENDPATH**/ ?>