<?php

class ajax extends controller {
    use tool;
    public $user;

    public function __construct() {
        $this->user = $this->model('user');
    }

    public function checkEmail() {
        $email = $this->get_POST("email");
        echo $this->user->checkEmail($email);
    }
}

?>