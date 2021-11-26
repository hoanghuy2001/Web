<?php
if(isset($data["userInfo"])) {
	$info = json_decode($data["userInfo"], true);
}
?>

<div class="block-add_user">
	<div class="panel panel-primary">
		<div class="man-header panel-heading">
			<h2 class="man-heading text-left">Thông tin tài khoản</h2>
		</div>
		<div class="panel-body mygrid">
            <div class="myrow">
            <?php
            if(isset($data["msg"])) {
                echo '<p class="msg-error text-center">
                    '.$data["msg"].'
                </p>';
            }
            ?>
            </div>
			<form method="post" class="myrow">
                <div class="mycol c-6">
                    <div class="form-group">
                        <label class="form-item-lable" for="usr">Họ tên:</label>
                        <input required="true" type="text" name="name" class="form-control" id="usr" minlength="2" maxlength="50" value="<?=$info["fullname"]?>" placeholder="2 - 50 ký tự">
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
                </div>
                <div class="mycol c-6">
                    <div class="form-group">
                        <label class="form-item-lable" for="old-pwd">Mật khẩu cũ:</label>
                        <input type="password" name="old-pwd" class="form-control" id="old-pwd">
                    </div>
                    <div class="form-group">
                        <label class="form-item-lable" for="pwd">Mật khẩu mới:</label>
                        <input type="password" name="pwd" class="form-control" id="pwd">
                    </div>
                    <div class="form-group">
                        <label class="form-item-lable" for="confirmation_pwd">Xác nhận Mật khẩu:</label>
                        <input type="password" class="form-control" id="confirmation_pwd">
                    </div>
                </div>
                <button type="button" class="btn btn-success margin-top-28px width-100" onclick="ajaxInfo('update')">Cập nhật</button>
			</form>
		</div>
	</div>
</div>