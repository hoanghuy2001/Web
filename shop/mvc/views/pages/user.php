<div class="block-manage">

    <div class="man-header">
        <h2 class="man-heading">Quản lý tài khoản người dùng</h2>
    </div>
    <div class="man-body">
        <a href="<?=DOMAIN?>/admin/user/add" class="btn-link color-green">
            <button class="btn btn-outline-success margin-bot">
                <i class="fas fa-user-plus icon-green"></i>
                Thêm tài khoản
            </button>
        </a>
        <table class="table-bordered table-hover table-user">
            <thead>
                <tr>
                    <th class="td-center">STT</th>
                    <th class="td-center">Họ tên</th>
                    <th class="td-center">Email</th>
                    <th class="td-center">Số điện thoại</th>
                    <th class="td-shorter td-center">Quyền</th>
                    <th class="td-shorter td-center"></th>
                    <th class="td-shorter td-center"></th>
                </tr>
            </thead>
            <tbody id="list-user">
            <?php 
            $index = 1;
            $data["listUser"] = json_decode($data["listUser"], true);
            foreach($data["listUser"] as $item) {
                echo '<tr>
                    <td class="td-center">'.$index.'</td>
                    <td class="td-normal">'.$item["fullname"].'</td>
                    <td>'.$item["email"].'</td>
                    <td class="td-normal text-right">'.$item["phone_number"].'</td>
                    <td class="td-shorter text-center">'.$item["role_name"].'</td>
                    <td class="td-shorter text-center">
                    <a href="'.DOMAIN.'/admin/user/edit/id='.$item["id"].'">
                        <button type="button" class="btn btn-outline-warning">
                            <i class="fas fa-pen-nib"></i>
                        </button>
                    </a>
                    </td>
                    <td class="td-shorter text-center">
                        <button type="button" class="btn btn-outline-danger" onclick="ajaxUser(`delete`, '.$item["id"].')">
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