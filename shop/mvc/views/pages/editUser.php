<?php
if(isset($data["userInfo"])) {
	$info = json_decode($data["userInfo"], true);
}
?>

<div class="block-add_user">
	<div class="panel panel-primary">
		<div class="man-header panel-heading">
			<h2 class="man-heading text-left">Sửa thông tin người dùng</h2>
		</div>
        <div class="nav-page-admin">
            <a href="<?=DOMAIN?>/admin/user" class="btn-link">
                <button class="btn btn-outline-danger" name="goto-prev">Trở về</button>
            </a>
        </div>
		<div class="panel-body panel-form">
            <?php
            if(isset($data["msg"])) {
                echo '<p class="msg-error text-center">
                    '.$data["msg"].'
                </p>';
            }
            ?>
			<form action="<?=DOMAIN?>/admin/processUser/edit/id=<?=$info["id"]?>" method="post" onsubmit="return validateForm()">
				<div class="form-group">
					<label class="form-item-lable" for="usr">Họ tên:</label>
					<input required="true" type="text" name="name" class="form-control" id="usr" minlength="2" maxlength="50" value="<?=$info["fullname"]?>" placeholder="2 - 50 ký tự">
				</div>
				<div class="form-group">
					<label class="form-item-lable" for="role">Quyền:</label>
                    <select class="form-control" name="role" id="role">
                        <?php
                        if($info["role_id"] == 3) {
                            echo '
                            <option value="3" selected>User</option>
                            <option value="4">Admin</option>
                            ';
                        }
                        else {
                            echo '
                            <option value="3">User</option>
                            <option value="4" selected>Admin</option>
                            ';    
                        }
                        ?>
                    </select>
                </div>
				<div class="form-group">
					<label class="form-item-lable" for="email">Email:</label>
					<input required="true" type="email" name="email" class="form-control" id="email" value="<?=$info["email"]?>" placeholder="<sth>@<sth>.<sth>">
				</div>
				<div class="form-group">
					<label class="form-item-lable" for="phone_num">Số Điện Thoại:</label>
					<input type="text" name="phone_num" class="form-control" id="phone_num" value="<?=$info["phone_number"]?>">
				</div>
				<div class="form-group">
					<label class="form-item-lable" for="addr">Địa chỉ:</label>
					<input type="text" name="addr" class="form-control" id="addr" value="<?=$info["addr"]?>">
				</div>
				<div class="form-group">
					<label class="form-item-lable" for="pwd">Password:</label>
					<input type="password" name="pwd" class="form-control" id="pwd">
				</div>
				<div class="form-group">
					<label class="form-item-lable" for="confirmation_pwd">Confirmation Password:</label>
					<input type="password" class="form-control" id="confirmation_pwd">
				</div>
                <button class="btn btn-success width-100" name="btnConfirm">Cập nhật</button>
			</form>
		</div>
	</div>
</div>