<?php

class login extends controller {
    
    private $User;

    public function __construct() {
        $this->User = $this->model('user');
    }

    // http://localhost/shop/login
    public function init() {
        $this->User->clearUserToken();
        $this->view('login', [
            "footer" => "footer",
            "page" => "login",
        ]);
    }

    public function processLogin() {
        // get data typed by the user
        if(isset($_POST["pwd-login"])) {
            $email = $this->get_POST('email-login');
            $pwd = $this->get_POST('pwd-login');
            
            $result = $this->User->verifyAccount($email, $pwd);

            if($result == "true") {
                header('Location: '.DOMAIN.'/admin');
            }
            else {
                $toast = [
					"type" => 'toast-error',
					"icon" => 'fas fa-times',
					"heading" => 'Thất bại',
					"msg" => 'Sai email hoặc mất khẩu!',
				];
                $this->view("login", [
                    "footer" => "footer",
                    "page" => "login",
                    "toast" => $toast
                ]);
            }
        }
    }
}

?>