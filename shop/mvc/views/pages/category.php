<div class="block-manage">

    <div class="man-header">
        <h2 class="man-heading">Quản lý danh mục sản phẩm</h2>
    </div>
    <div class="mygrid man-body">
        <div class="myrow">
            <div class="mycol c-4">
                <form id=form-addcategory>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" id="category-name" name="add-cate" value="" placeholder="Tên danh mục">
                        <button class="btn btn-outline-success" type="button" id="btn-add-cate" onclick="ajaxCategory('add')">Thêm</button>
                    </div>
                </form>
            </div>
            <div class="mycol c-5">
                <table class="table-bordered table-hover table-user">
                    <thead>
                        <tr>
                            <th class="td-center">STT</th>
                            <th class="td-center">Tên danh mục</th>
                            <th class="td-shorter td-center"></th>
                            <th class="td-shorter td-center"></th>
                        </tr>
                    </thead>
                    <tbody id="list-category">
                        <?php 
                        $index = 1;
                        $data["listCate"] = json_decode($data["listCate"], true);
                        foreach($data["listCate"] as $item) {
                            $id = $item["id"];
                            $name = $item["name"];
                            echo '<tr>
                            <td class="td-shorter td-center">'.$index.'</td>
                                <td id="item-'.$index.'">'.$name.'</td>
                                <td class="td-shorter text-center" id="btn-edit-'.$index.'">
                                    <button onclick="editCategory('.$index.', '.$id.', `'.$name.'`)" class="btn btn-outline-warning">
                                    <i class="fas fa-pen-nib"></i>
                                    </button>
                                    </td>
                                    <td class="td-shorter text-center">
                                    <button type="button" class="btn btn-outline-danger" onclick="ajaxCategory(`delete`, '.$id.')">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                    </td>
                                    </tr>';
                            $index++;
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>