<tr id="userRow<?php echo e($user->id); ?>" >
    <td class="hidden-xs center"><p id="userId<?php echo e($user->id); ?>"><?php echo e($user->id); ?></p></td>
    </td>
    <td class="hidden-xs center"><p id="userName<?php echo e($user->id); ?>"><?php echo e($user->name); ?></p></td>
    <td class="hidden-xs center"><p id="userEmail<?php echo e($user->id); ?>"><?php echo e($user->email); ?></p></td>
    <td class="hidden-xs center"><p id="userType<?php echo e($user->id); ?>"><?php echo e($user->type); ?></p></td>

    <td class="hidden-xs center">
        <div class="visible-md visible-lg hidden-sm hidden-xs">
            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
            <a id="editUser" class="btn btn-xs btn-blue tooltips" data-placement="top"
               data-original-title="Edit" data-user-id="<?php echo e($user->id); ?>"><i class="fa fa-edit"></i></a>
            <a id="deleteUser" data-user-id="<?php echo e($user->id); ?>" class="btn btn-xs btn-red tooltips" data-placement="top"
               data-original-title="Remove"><i class="fa fa-times fa fa-white"></i></a>

            <a  href="<?php echo e(url('permission/'.$user->id.'/edit')); ?>" class="btn btn-xs btn-green tooltips" data-placement="top"
               ><i class="fa fa-edit fa fa-white"></i><?php echo e(trans('site_lang.permission')); ?></a>
        </div>
        <div class="visible-xs visible-sm hidden-md hidden-lg">
            <div class="btn-group">
                <a class="btn btn-green dropdown-toggle btn-sm"
                   data-toggle="dropdown" href="#">
                    <i class="fa fa-cog"></i> <span class="caret"></span>
                </a>
                <ul role="menu" class="dropdown-menu pull-right dropdown-dark">
                    <li>
                        <a role="menuitem" tabindex="-1">
                            <i class="fa fa-edit"></i> Edit
                        </a>
                    </li>

                    <li>
                        <a role="menuitem" tabindex="-1" href="#">
                            <i class="fa fa-times"></i> Remove
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </td>
</tr>

<?php /**PATH C:\xampp\htdocs\Lawyer\resources\views/users/users_item.blade.php ENDPATH**/ ?>