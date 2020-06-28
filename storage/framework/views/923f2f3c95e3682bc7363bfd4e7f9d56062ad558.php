<tr class="text-dark" id="userRow<?php echo e($client->id); ?>">
    <td class="hidden-xs center" id="id<?php echo e($client->id); ?>"><?php echo e($client->id); ?></td>
    <td class="hidden-xs center" id="client_name<?php echo e($client->id); ?>"><?php echo e($client->client_Name); ?></td>
    <td class="hidden-xs center">
        <div class="visible-md visible-lg hidden-sm hidden-xs">
            <?php
                $user_type = auth()->user()->type;
                if($user_type == 'admin'){
            ?>
            <a class="btn btn-red tooltips" data-placement="top" id="deleteClient"
               data-mokel-id="<?php echo e($client->id); ?>"
               data-original-title="Remove"><i
                    class="fa fa-times fa fa-white"></i></a>
            <?php
                }
            ?>

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
                            <i class="fa fa-times"></i> Remove
                        </a>
                    </li>

                </ul>
            </div>
        </div>

    </td>
</tr>
<?php /**PATH C:\xampp\htdocs\Lawyer\resources\views/cases/mokel_item.blade.php ENDPATH**/ ?>