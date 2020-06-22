<tr id="userRow<?php echo e($category->id); ?>">
    <td class="center"><p id="categoryId<?php echo e($category->id); ?>"><?php echo e($category->id); ?></p></td>
    <td class="center"><p
            id="categoryName<?php echo e($category->id); ?>"><?php echo e($category->name); ?></p></td>
    <td class="center">
        <div class="visible-md visible-lg hidden-sm hidden-xs">
            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
            <a id="editCategory" class="btn btn-xs btn-blue tooltips"
               data-placement="top"
               data-original-title="<?php echo e(trans('site_lang.public_edit_btn_text')); ?>" data-category-id="<?php echo e($category->id); ?>"><i
                    class="fa fa-edit"></i></a>
            <a id="deleteCategory" data-category-id="<?php echo e($category->id); ?>"
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
<?php /**PATH C:\xampp\htdocs\Lawyer\resources\views/categories/category_item.blade.php ENDPATH**/ ?>