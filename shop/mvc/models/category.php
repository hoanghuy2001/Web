<?php

class category extends db {
    use tool;

    public function addCategory($name) {
        $sql = "SELECT * FROM category WHERE name = '$name'";
        $cateExisted = $this->excuteResult($sql, true, false);
        if($cateExisted != null && $cateExisted["is_deleted"] == 0) {
            return "false";
        }
        else if($cateExisted != null && $cateExisted["is_deleted"] == 1) {
            $id = $cateExisted["id"];
            $sql = "UPDATE category SET is_deleted = 0 WHERE id = '$id'";
        }
        else {
            $sql = "INSERT INTO category VALUES(null, '$name', 0)";
        }
        return $this->excute($sql);
    }

    public function updateCategory($id, $name) {
        $sql = "SELECT * FROM category WHERE name = '$name'";
        $cateExisted = $this->excuteResult($sql, true, false);
        if($cateExisted != null && $cateExisted["is_deleted"] == 0) {
            return "false";
        }
        $sql = "UPDATE category SET name = '$name' WHERE id = '$id'";
        return $this->excute($sql);
    }
    
    public function deleteCategory($id) {
        $sql = "UPDATE category SET is_deleted = 1 WHERE id = '$id'";
        return $this->excute($sql);
    }

}

?>