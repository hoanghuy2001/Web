<?php

class info extends controller {

    // Model
    private $InfoModel;
    private $InfoBehavior;

    // User info
    private $userToken;
    private $decodeJson;
    function __construct() {
        $this->InfoModel = $this->model('infoModel');
        $this->InfoBehavior = $this->model('infoBehavior');
        $this->userToken = $this->InfoBehavior->getUserToken();
        if($this->userToken == "null") {
            header('Location: '.DOMAIN.'/login');
        }
        $this->decodeJson = json_decode($this->userToken, true);

    }

    public function init() {
        header('Location: '.DOMAIN.'/info/general');
        die();
    }

    public function general() {
        $this->view('info',[
            "title" => "Thông tin tài khoản",
            "header" => "header_main",
            "sidebar" => "sidebar_info",
            "footer" => "footer",
            "page" => "info_general",
            "userInfo" => $this->userToken,
            "listRole" => $this->InfoModel->getListRole(),
            "general" => "active",
        ]);
    }

    public function updateInfo() {
        if(isset($_POST)) {
            $fullname = $this->get_POST('fullname');
            $email = $this->get_POST('email');
            $phone_num = $this->get_POST('phone_num');
            $addr = $this->get_POST('addr');
            $oldpwd = $this->get_POST('old-pwd');
            $pwd = $this->get_POST('pwd');
            $pwdToken = $this->decodeJson["pwd"];
            if($oldpwd != '' && !password_verify($oldpwd, $pwdToken)) {
                echo "false";
            }
            // update token
            // update info
            $result = $this->InfoBehavior->updateInfo($this->decodeJson["id"], $fullname, $email, $pwd, $phone_num, $addr, $this->decodeJson["role_id"]);

            if($result == "true") {
                if($this->userToken = $this->InfoBehavior->updateUserToken($this->decodeJson['id'], $email) != "null") {
                    $this->userToken = $this->InfoBehavior->getUserToken();
                    $this->decodeJson = json_decode($this->userToken, true);
                }
            }
            echo $result;
            die();
        }
    }

    public function logout() {
        echo $this->InfoBehavior->clearUserToken();
    }

    public function delAccount() {

        // Xóa cart, order, feedback của user trước

        // Xóa tài khoản
        $this->InfoBehavior->clearUserToken();
        echo $this->InfoBehavior->deleteUser(json_decode($this->userToken, true)["id"] + 0, true);
    }

    // Phần của Huy
    public function myorder() {

        $this->view('info',[
            "title" => "Đơn hàng của tôi",
            "header" => "header_main",
            "sidebar" => "sidebar_info",
            "footer" => "footer",
            "page" => "info_myorder",
            "userInfo" => $this->userToken,
            "listRole" => $this->InfoModel->getListRole(),
            "myorder" => "active",
        ]);
    }


    // Phần này tui thích thì làm k thì tui bỏ
    public function notice() {

        $this->view('info',[
            "title" => "Thông báo",
            "header" => "header_main",
            "sidebar" => "sidebar_info",
            "footer" => "footer",
            "page" => "info_notice",
            "userInfo" => $this->userToken,
            "listRole" => $this->InfoModel->getListRole(),
            "notice" => "active",
        ]);
    }
}

?>