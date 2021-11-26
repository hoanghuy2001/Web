<?php

class order extends db {
    use tool;

    public function processOrder($id, $value) {
        if($value == -1) {
            $sql = "DELETE FROM orders WHERE id = '$id'";
            return $this->excute($sql);
        }
        $sql = "UPDATE orders SET status = '$value' WHERE id = '$id'";
        return $this->excute($sql);
    }
}

?>