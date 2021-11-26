<div class="block-manage">

    <div class="man-header">
        <h2 class="man-heading">Thông tin đơn hàng</h2>
    </div>
    <div class="man-body">
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
                </tr>
            </thead>
            <tbody id="list-product">
                <?php 
                $index = 1;
                $data["listOrder"] = json_decode($data["listOrder"], true);
                foreach($data["listOrder"] as $item) {
                    echo '<tr>
                    <td class="td-center" style="width:36px;">'.$index.'</td>
                    <td class="width-100px td-normal">';
                        
                    if($img) {
                        echo '<img src="'.$img.'" alt="Ảnh" class="width-100px">';
                    }
                    
                    echo '</td>
                    <td class="width-150px">'.$item["category_name"].'</td>
                    <td class="width-150px text-right">'.$item["price"].' VND</td>
                    <td class="td-shorter text-right">'.$item["discount"].' %</td>
                    <td class="width-100px text-right">'.$item["updated_at"].'</td>
                    </tr>';
                    $index++;
                }
                ?>
            </tbody>
        </table>
    </div>

</div>