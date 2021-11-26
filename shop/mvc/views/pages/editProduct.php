<?php
if(isset($data["productInfo"])) {
    $info = json_decode($data["productInfo"], true);
}
?>

<div class="block-add_user">
	<div class="panel panel-primary">
		<div class="man-header panel-heading">
			<h2 class="man-heading text-left">Sửa sản phẩm</h2>
		</div>
        <div class="nav-page-admin">
            <a href="<?=DOMAIN?>/admin/product" class="btn-link">
                <button class="btn btn-outline-danger" name="goto-prev">Trở về</button>
            </a>
        </div>
		<div class="panel-body mygrid">
            <div class="myrow">
                <?php
                if(isset($data["msg"])) {
                    echo '<p class="msg-error text-center mycol c-12">
                        '.$data["msg"].'
                    </p>';
                }
                ?>
            </div>
			<form action="<?=DOMAIN?>/admin/processProduct/edit/id=<?=$info["id"]?>" method="post" class="myrow" enctype="multipart/form-data">
				<div class="mycol c-9">
                    <div class="form-group">
                        <label class="form-item-lable" for="title">Tiêu đề (Bắt buộc):</label>
                        <input required="true" type="text" name="title" class="form-control" value="<?=$info["title"]?>" id="title" placeholder="Nhập tiêu đề zô thằng ngu" >
                    </div>
                    <div class="form-group">
                        <label class="form-item-lable" for="describe">Mô tả:</label>

                        <textarea name="describe" class="form-control" id="summernote" cols="30" rows="12"><?=$info["description"]?></textarea>
                    </div>
                    <button class="btn btn-success width-100" name="btnVerify">Lưu</button>
                </div>

                <div class="mycol c-3">
                    <div class="form-group">
                        <label class="form-item-lable" for="thumbnail">Thumbnail:</label>
                        <input type="file" name="thumbnail" class="form-control margin-bot" id="thumbnail" accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|image/*">
                        <div class="frame-preview-img">
                            <img src="<?=$info["thumbnail"]?>" alt="Preview" class="width-150px" id="preview-img">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-item-lable" for="category">Danh mục (Bắt buộc):</label>
                        <?php
                        if(isset($data["listCategory"])) {
                            $listCategory = json_decode($data["listCategory"], true);
                            echo '<select name="category" class="form-control" id="category">
                                    <option value="-1">--Chọn danh mục--</option>';
                            foreach($listCategory as $category) {
                                if($category["id"] == $info["category_id"]) {
                                    echo '<option value="'.$category["id"].'" selected>'.$category["name"].'</option>';
                                }
                                else {
                                    echo '<option value="'.$category["id"].'">'.$category["name"].'</option>';
                                }
                            }
                            echo '</select>';
                        }
                        ?>
                    </div>
                    <div class="form-group">
                        <label class="form-item-lable" for="price">Giá (Bắt buộc):</label>
                        <input required="true" type="number" name="price" class="form-control" id="price" value="<?=$info["price"]?>" placeholder="VND">
                    </div>
                    <div class="form-group">
                        <label class="form-item-lable" for="discount">Discount:</label>
                        <input type="number" name="discount" class="form-control" id="discount" value="<?=$info["discount"]?>" placeholder="Đơn vị %">
                    </div>
                </div>
			</form>
		</div>
	</div>
</div>