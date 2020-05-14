<tr class="text-dark" id="userRow<?php echo e($note->id); ?>">
   
    <?php if($note->status == "لا"): ?>
        <td class="hidden-xs center">
            <p class="btn btn-lg" data-notes-id="<?php echo e($note->id); ?>" id="change-note-status">
                <span class="label label-danger" id="status<?php echo e($note->id); ?>"> <?php echo e($note->status); ?></span>

            </p>
        </td>
    <?php else: ?>
        <td class="hidden-xs center">
            <p class="btn btn-lg" data-notes-id="<?php echo e($note->id); ?>" id="change-note-status">
                <span class="label label-success" id="status<?php echo e($note->id); ?>"> <?php echo e($note->status); ?></span>

            </p>
        </td>
    <?php endif; ?>
     <td class="hidden-xs center" id="note<?php echo e($note->id); ?>"><?php echo e($note->note); ?></td>
    <td class="hidden-xs center" id="id<?php echo e($note->id); ?>"><?php echo e($note->id); ?></td>
</tr>
<?php /**PATH C:\xampp\htdocs\LawerWeb\resources\views/cases/session_note_home_item.blade.php ENDPATH**/ ?>