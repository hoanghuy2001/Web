<div class="block-manage">

    <div class="man-header">
        <h2 class="man-heading">Quản lý sản phẩm</h2>
    </div>
    <div class="man-body">
        <a href="<?=DOMAIN?>/admin/product/add" class="btn-link color-green">
            <button class="btn btn-outline-success margin-bot">
                <i class="fas fa-user-plus icon-green"></i>
                Thêm sản phẩm
            </button>
        </a>
        <table class="table-bordered table-hover table-user">
            <thead>
                <tr>
                    <th class="td-center">STT</th>
                    <th class="td-center">Hình ảnh</th>
                    <th class="td-center">Tiêu đề</th>
                    <th class="td-center">Danh mục</th>
                    <th class="td-center">Giá gốc</th>
                    <th class="td-shorter td-center">Discount</th>
                    <th class="td-shorter td-center">Ngày cập nhật</th>
                    <th class="td-shorter td-center"></th>
                    <th class="td-shorter td-center"></th>
                </tr>
            </thead>
            <tbody id="list-product">
                <?php 
                $index = 1;
                $data["listProduct"] = json_decode($data["listProduct"], true);
                foreach($data["listProduct"] as $item) {
                    $img = $item["thumbnail"];
                    echo '<tr>
                    <td class="td-center" style="width:36px;">'.$index.'</td>
                    <td class="width-100px td-normal">';
                        
                    if($img) {
                        echo '<img src="'.$img.'" alt="Ảnh" class="width-100px">';
                    }
                    
                    echo '</td>
                    <td>'.$item["title"].'</td>
                    <td class="width-150px">'.$item["category_name"].'</td>
                    <td class="width-150px text-right">'.$item["price"].' VND</td>
                    <td class="td-shorter text-right">'.$item["discount"].' %</td>
                    <td class="width-100px text-right">'.$item["updated_at"].'</td>
                    <td class="td-shorter text-center">
                            <a href="'.DOMAIN.'/admin/product/edit/id='.$item["id"].'">
                                <button type="button" class="btn btn-outline-warning">
                                    <i class="fas fa-pen-nib"></i>
                                </button>
                            </a>
                        </td>
                        <td class="td-shorter text-center">
                            <button type="button" class="btn btn-outline-danger" onclick="ajaxProduct(`delete`, '.$item["id"].')">
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