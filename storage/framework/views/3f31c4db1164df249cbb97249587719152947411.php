<tr class="text-dark" id="userRow<?php echo e($session->id); ?>">
    <td class="hidden-xs center" id="id<?php echo e($session->id); ?>"><?php echo e($session->id); ?></td>
    <td class="hidden-xs center" id="session_date<?php echo e($session->id); ?>"><?php echo e($session->session_date); ?></td>
    <?php if($session->status == "waiting"): ?>
        <td class="hidden-xs center">
            <p class="btn btn-lg" data-session-id="<?php echo e($session->id); ?>" id="change-session-status">
                <span class="label label-danger" id="status<?php echo e($session->id); ?>"> <?php echo e(trans('site_lang.search_case_session_waiting')); ?></span>
            </p>
        </td>
    <?php else: ?>
        <td class="hidden-xs center">
            <p class="btn btn-lg" data-session-id="<?php echo e($session->id); ?>" id="change-session-status">
                <span class="label label-success" id="status<?php echo e($session->id); ?>"> <?php echo e(trans('site_lang.search_case_session_done')); ?></span>

            </p>
        </td>
    <?php endif; ?>

    <td class="hidden-xs center">
        <div class="visible-md visible-lg hidden-sm hidden-xs">
            <a class="btn btn-light-blue tooltips" data-placement="top" id="editSession"
               data-session-id="<?php echo e($session->id); ?>"
               data-original-title="<?php echo e(trans('site_lang.public_edit_btn_text')); ?>"><i class="fa fa-edit"></i></a>
            <a class="btn btn-red tooltips" data-placement="top" id="deleteSession"
               data-session-id="<?php echo e($session->id); ?>"
               data-original-title="<?php echo e(trans('site_lang.public_delete_text')); ?>"><i
                    class="fa fa-times fa fa-white"></i></a>
            <a class="btn btn-blue tooltips" data-placement="top" id="showSessionNotes"
               data-session-id="<?php echo e($session->id); ?>"
               data-original-title="<?php echo e(trans('site_lang.home_see_more')); ?>"><i
                    class="fa fa-eye-slash"></i></a>
        </div>
        <div class="visible-xs visible-sm hidden-md hidden-lg">
            <div class="btn-group">
                <a class="btn btn-green dropdown-toggle btn-sm"
                   data-toggle="dropdown" href="#">
                    <i class="fa fa-cog"></i> <span class="caret"></span>
                </a>
                <ul role="menu" class="dropdown-menu dropdown-dark pull-right">
                    <li role="presentation">
                        <a role="menuitem" tabindex="-1" href="#">
                            <i class="fa fa-edit"></i> <?php echo e(trans('site_lang.public_edit_btn_text')); ?>

                        </a>
                    </li>
                    <li role="presentation">
                        <a role="menuitem" tabindex="-1" href="#">
                            <i class="fa fa-times"></i> <?php echo e(trans('site_lang.public_delete_text')); ?>

                        </a>
                    </li>
                    <li role="presentation">
                        <a role="menuitem" tabindex="-1" href="#">
                            <i class="fa fa-eye-slash"></i> <?php echo e(trans('site_lang.home_see_more')); ?>

                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </td>
</tr>
<?php /**PATH C:\xampp\htdocs\Lawyer\resources\views/cases/session_item.blade.php ENDPATH**/ ?>