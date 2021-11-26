<?php

class register extends controller {

    private $User;
    
    function __construct() {
        $this->User = $this->model('user');
    }
    // http://localhost/shop/register
    public function init() {
        $this->view('login', [
            "footer" => "footer",
            "page" => "register",
        ]);
    }
    
    public function processRegister() {
        // get data typed by the user
        if(isset($_POST)) {
            $name = $this->get_POST('name');
            $email = $this->get_POST('email');
            $pwd = $this->get_POST('pwd');

            // insert into database user
            $result = $this->User->addUser($name, $email, $pwd);
            
            // show Success/Fail
            if($result == "true"){
				$toast = [
					"type" => 'toast-success',
					"icon" => 'fas fa-check-circle',
					"heading" => 'Thành công',
					"msg" => 'Đăng ký thành công!',
				];
			}
			else if($result == "false") {
				$toast = [
					"type" => 'toast-error',
					"icon" => 'fas fa-times',
					"heading" => 'Thất bại',
					"msg" => 'Email đã được đăng ký!',
				];
			}
            $this->view('login', [
                "footer" => "footer",
                "page" => "register",
                "toast" => $toast
            ]);

        }
    }
}
?>