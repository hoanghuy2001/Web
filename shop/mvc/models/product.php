<?php

class product extends db {
    use tool;

    public function addProduct($title, $category_id, $price, $discount, $thumbnail, $description) {
        $created_at = $updated_at = date('Y-m-d H:m:s');
        $sql = "INSERT INTO product VALUES (null, '$category_id', '$title', '$price', '$discount', '$thumbnail', '$description', '$created_at', '$updated_at', 0)";
        return $this->excute($sql);
    }
    public function updateProduct($id, $title, $category_id, $price, $discount, $thumbnail, $description) {
        $updated_at = date('Y-m-d H:m:s');
        if($thumbnail == '') {
            $sql = "UPDATE product SET title = '$title', category_id = '$category_id', price = '$price', discount = '$discount', description = '$description', updated_at = '$updated_at' WHERE id = '$id'";
        }
        else {
            $sql = "UPDATE product SET title = '$title', category_id = '$category_id', price = '$price', discount = '$discount', thumbnail = '$thumbnail', description = '$description', updated_at = '$updated_at' WHERE id = '$id'";
        }
        return $this->excute($sql);    
    }
    public function deleteProduct($id, $isDeleted = false) {
        if($isDeleted) {
            $sql = "DELETE FROM product WHERE id = '$id'";
        }
        else {
            $updated_at = date('Y-m-d H:m:s');
            $sql = "UPDATE product SET updated_at = '$updated_at', is_deleted = 1 WHERE id = '$id'";
        }
        return $this->excute($sql);
    }
    public function deleteProductOfCategoryId($category_id, $isDeleted = false) {
        if($isDeleted) {
            $sql = "DELETE FROM product WHERE category_id = '$category_id'";
        }
        else {
            $updated_at = date('Y-m-d H:m:s');
            $sql = "UPDATE product SET updated_at = '$updated_at', is_deleted = 1 WHERE category_id = '$category_id'";
        }
        return $this->excute($sql);
    }

}

?>