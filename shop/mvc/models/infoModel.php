<?php

class infoModel extends db {
    use tool;

    public function getListRole($id = null) {
        $sql = "SELECT * FROM role";
        if($id) {
            $sql .= " WHERE id = '$id'";
            return $this->excuteResult($sql, true);
        }
        return $this->excuteResult($sql);

    }

    public function getListUser($id = null) {
        $sql = "SELECT user.*, role.name as role_name FROM user LEFT JOIN role
        ON user.role_id = role.id WHERE user.is_deleted = 0";
        if($id != null) {
            $sql = $sql." AND user.id = '$id'";
            return $this->excuteResult($sql, true);
        }
        return $this->excuteResult($sql);
    }

    public function getListCategory($id = null) {
        $sql = "SELECT * FROM category WHERE is_deleted = 0";
        if($id != null) {
            $sql = $sql." AND id = '$id'";
            return $this->excuteResult($sql, true);
        }
        $sql = $sql." ORDER BY name ASC";
        return $this->excuteResult($sql);
    }

    public function getListProduct($id = null) {
        $sql = "SELECT product.*, category.name as category_name FROM product LEFT JOIN category
        ON product.category_id = category.id WHERE product.is_deleted = 0";
        if($id != null) {
            $sql = $sql." AND product.id = '$id'";
            return $this->excuteResult($sql, true);
        }
        $sql = $sql." ORDER BY category.name ASC";
        return $this->excuteResult($sql);
    }

    public function getListFeedback($id = null) {
        $sql = "SELECT feedback.*, user.fullname as user_name, user.email as user_email FROM feedback LEFT JOIN user
        ON feedback.user_id = user.id";
        if($id != null) {
            $sql = $sql." WHERE feedback.id = '$id'";
        }
        $sql = $sql." ORDER BY feedback.created_at DESC";
        return $this->excuteResult($sql);
    }
    
    public function getListOrder($id = null) {
        $sql = "SELECT orders.*, user.email as user_email FROM orders LEFT JOIN user ON user_id = user.id";
        if($id != null) {
            $sql .= " WHERE orders.id = '$id'";
            return $this->excuteResult($sql, true);
        }
        $sql .= " ORDER BY orders.order_date DESC";
        return $this->excuteResult($sql);
    }
    public function getListOrderdetail($id = NULL){
        $sql = "SELECT * FROM orderdetail where order_id = '?' ";
        if($id != null) {
            $sql .= " WHERE orderdetail.order_id = '$id'";
            return $this->excuteResult($sql, true);
        }
        return $this->excuteResult($sql, true);
    }
}

?>