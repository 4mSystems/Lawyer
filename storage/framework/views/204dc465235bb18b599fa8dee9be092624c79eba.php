<tr id="userRow<?php echo e($client->id); ?>">
    <td class="center"><p id="clientId<?php echo e($client->id); ?>"><?php echo e($client->id); ?></p></td>
    </td>
    <td class="center"><p
            id="clientName<?php echo e($client->id); ?>"><?php echo e($client->client_Name); ?></p></td>
    <td class="center"><p
            id="clientUnit<?php echo e($client->id); ?>"><?php echo e($client->client_Unit); ?></p></td>
    <td class="center"><p
            id="clientAddress<?php echo e($client->id); ?>"><?php echo e($client->client_Address); ?></p>
    </td>
    <td class="center"><p
            id="clientNotes<?php echo e($client->id); ?>"><?php echo e($client->notes); ?></p></td>

    <td class="center"><p
            id="clientType<?php echo e($client->id); ?>"> <?php if($client->type=='client'): ?>
                <?php echo e(trans('site_lang.clients_client_type_client')); ?>

            <?php else: ?>
                <?php echo e(trans('site_lang.clients_client_type_khesm')); ?>

            <?php endif; ?></p></td>
    <td class="center">
        <div class="visible-md visible-lg hidden-sm hidden-xs">
            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
            <a id="editClient" class="btn btn-xs btn-blue tooltips"
               data-placement="top"
               data-original-title="<?php echo e(trans('site_lang.public_edit_btn_text')); ?>" data-client-id="<?php echo e($client->id); ?>"><i
                    class="fa fa-edit"></i></a>
            <a id="deleteClient" data-client-id="<?php echo e($client->id); ?>"
               class="btn btn-xs btn-red tooltips" data-placement="top"
               data-original-title="<?php echo e(trans('site_lang.public_delete_text')); ?>"><i
                    class="fa fa-times fa fa-white"></i></a>
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
                            <i class="fa fa-edit"></i> <?php echo e(trans('site_lang.public_edit_btn_text')); ?>

                        </a>
                    </li>

                    <li>
                        <a role="menuitem" tabindex="-1" href="#">
                            <i class="fa fa-times"></i> <?php echo e(trans('site_lang.public_delete_text')); ?>

                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </td>
</tr>
<?php /**PATH C:\xampp\htdocs\Lawyer\resources\views/clients/clients_item.blade.php ENDPATH**/ ?>