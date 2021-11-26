<?php

class feedback extends db {
    use tool;
    public function processFeedback($action, $id, $value) {
        if($action == 'seen') {
            $sql = "UPDATE feedback SET is_seen = '$value' WHERE id = '$id'";
        }
        else if($action == 'marked') {
            $sql = "UPDATE feedback SET marked = '$value' WHERE id = '$id'";
        }
        return $this->excute($sql);
    }

}

?>