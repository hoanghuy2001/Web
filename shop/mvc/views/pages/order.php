<div class="block-manage">

    <div class="man-header">
        <h2 class="man-heading">Quản lý đơn hàng</h2>
    </div>
    <div class="mygrid man-body">
        <div class="myrow">
            <div class="mycol c-12">
                <table class="table-bordered table-hover table-user">
                    <thead>
                        <tr>
                            <th class="td-center">STT</th>
                            <th class="td-center">Email</th>
                            <th class="td-center">Số ĐT</th>
                            <th class="td-center">Địa chỉ</th>
                            <th class="td-center">Mã ĐH</th>
                            <th class="td-center">Ngày đặt hàng</th>
                            <th class="td-center">Tổng tiền</th>
                            <th class="td-shorter td-center">Trạng thái</th>
                            <th class="td-shorter td-center"></th>
                        </tr>
                    </thead>
                    <tbody id="list-order">
                        <?php 
                        $index = 1;
                        $output = '';
                        $data["listOrder"] = json_decode($data["listOrder"], true);
                        foreach($data["listOrder"] as $item) {
                            $output = '<tr id="tr-'.$index.'">
                                <td class="width-50px td-center">'.$index.'</td>
                                <td class="width-200px" id="item-'.$index.'">'.$item["user_email"].'</td>
                                <td class="width-100px">'.$item["phone_number"].'</td>
                                <td class="width-200px">'.$item["address"].'</td>
                                <td class="td-shorter td-center">'.$item["id"].'</td>
                                <td class="width-100px td-right">'.$item["order_date"].'</td>
                                <td class="td-right">'.$item["total_money"].'</td>
                                <td class="width-100px text-center" id="btn-edit-'.$index.'">';
                                if($item["status"] == 0) {
                                    $output .= '<div class="color-white bg-error btn-radius" onclick="ajaxOrder(`accept` , '.$item["id"].')">
                                        Đã hủy
                                    </div>
                                </td>';
                                $output .= '<td class="width-100px text-center" id="btn-edit-'.$index.'">
                                    <div class="color-white bg-error btn-radius" onclick="ajaxOrder(`delete` ,'.$item["id"].')">
                                        Xóa đơn
                                    </div>
                                </td>
                            </tr>';
                                }
                                else if($item["status"] == 1) {
                                    $output .= '<div class="color-white bg-yellow btn-radius" onclick="ajaxOrder(`accept`, '.$item["id"].')">
                                        Chờ duyệt
                                    </div>
                                </td>';
                                $output .= '<td class="width-100px text-center" id="btn-edit-'.$index.'">
                                    <div class="color-white bg-yellow btn-radius" onclick="ajaxOrder(`reject` , '.$item["id"].')">
                                        Hủy đơn
                                    </div>
                                </td>
                            </tr>';
                                }
                                else if($item["status"] == 2) {
                                    $output .= '<div class="color-white bg-green btn-radius">
                                        Đã duyệt
                                    </div>
                                </td>';
                                $output .= '<td class="width-100px text-center" id="btn-edit-'.$index.'">
                                    <div class="color-white bg-yellow btn-radius" onclick="ajaxOrder(`reject`, '.$item["id"].')">
                                        Hủy đơn
                                    </div>
                                </td>
                            </tr>';
                                }
                            echo $output;
                            $index++;
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>