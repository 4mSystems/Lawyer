<tr id="userRow{{$category->id}}">
    <td class="center"><p id="categoryId{{$category->id}}">{{$category->id}}</p></td>
    <td class="center"><p
            id="categoryName{{$category->id}}">{{$category->name}}</p></td>
    <td class="center">
        <div class="visible-md visible-lg hidden-sm hidden-xs">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <a id="editCategory" class="btn btn-xs btn-blue tooltips"
               data-placement="top"
               data-original-title="{{trans('site_lang.public_edit_btn_text')}}" data-category-id="{{$category->id}}"><i
                    class="fa fa-edit"></i></a>
            <a id="deleteCategory" data-category-id="{{$category->id}}"
               class="btn btn-xs btn-red tooltips" data-placement="top"
               data-original-title="{{trans('site_lang.public_delete_text')}}"><i
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
                            <i class="fa fa-edit"></i> {{trans('site_lang.public_edit_btn_text')}}
                        </a>
                    </li>

                    <li>
                        <a role="menuitem" tabindex="-1" href="#">
                            <i class="fa fa-times"></i> {{trans('site_lang.public_delete_text')}}
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </td>
</tr>
