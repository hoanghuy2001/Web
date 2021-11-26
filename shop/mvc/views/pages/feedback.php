<div class="block-manage">

    <div class="man-header">
        <h2 class="man-heading">Quản lý phản hồi</h2>
    </div>
    <div class="mygrid man-body">
        <div class="myrow">
            <div class="mycol c-12">
                <table class="table-bordered table-hover table-user">
                    <thead>
                        <tr>
                            <th class="td-center">STT</th>
                            <th class="td-center">Tài khoản</th>
                            <th class="td-center">Tiêu đề</th>
                            <th class="td-center">Nội dung</th>
                            <th class="td-center">Ngày cập nhật</th>
                            <th class="td-shorter td-center">Trạng thái</th>
                            <th class="td-shorter td-center">Nổi bật</th>
                        </tr>
                    </thead>
                    <tbody id="list-feedback">
                        <?php 
                        $index = 1;
                        $output = '';
                        $data["listFeedback"] = json_decode($data["listFeedback"], true);
                        foreach($data["listFeedback"] as $item) {
                            $id = $item["id"];
                            $fullname = $item["user_name"];
                            if($item["is_seen"] == 1) {
                                $output = '<tr id="tr-'.$index.'">
                                    <td class="td-shorter td-center">'.$index.'</td>
                                    <td id="item-'.$index.'">'.$fullname.'</td>
                                    <td class="td-normal">'.$item["subject"].'</td>
                                    <td class="width-400px">'.$item["content"].'</td>
                                    <td class="width-100px td-right">'.$item["updated_at"].'</td>
                                    <td class="width-100px text-center" id="btn-edit-'.$index.'">
                                        <div class="color-white bg-green btn-radius" onclick="ajaxSeenFeedback('.$item["id"].', '.$item["is_seen"].')">
                                            Đã xem
                                        </div>
                                    </td>
                                    <td class="td-shorter text-center">
                                        <div class="btn-radius btn-yellow" onclick="ajaxMarkingFeedback('.$item["id"].', '.$item["marked"].')">';
                                        if($item["marked"] == 1) {
                                            $output .= '<i class="fas fa-star"></i>
                                        </div>
                                    </td>
                                </tr>';
                                        }
                                        else {
                                            $output .= '<i class="far fa-star"></i>
                                        </div>
                                    </td>
                                </tr>';
                                        }
                            }
                            else {
                                $output = '<tr class="bg-gray" id="tr-'.$index.'">
                                    <td class="td-shorter td-center">'.$index.'</td>
                                    <td id="item-'.$index.'">'.$fullname.'</td>
                                    <td class="td-normal">'.$item["subject"].'</td>
                                    <td class="width-400px">'.$item["content"].'</td>
                                    <td class="width-100px td-right">'.$item["updated_at"].'</td>
                                    <td class="width-100px text-center" id="btn-edit-'.$index.'">
                                        <div class="color-white btn-radius bg-error" onclick="ajaxSeenFeedback('.$item["id"].', '.$item["is_seen"].')">
                                            Chưa xem
                                        </div>
                                    </td>
                                    <td class="td-shorter text-center">
                                        <div class="btn-radius btn-yellow" onclick="ajaxMarkingFeedback('.$item["id"].', '.$item["marked"].')">';
                                        if($item["marked"] == 1) {
                                            $output .= '<i class="fas fa-star"></i>
                                        </div>
                                    </td>
                                </tr>';
                                        }
                                        else {
                                            $output .= '<i class="far fa-star"></i>
                                        </div>
                                    </td>
                                </tr>';
                                        }
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