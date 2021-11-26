<?php
// Phần của Hoàng
class home extends controller {

    private $Admin;

    function __construct() {
        $this->Admin = $this->model('adminModel');
    }
    // http://localhost/shop/(home)
    public function init() {
        // model

        // view
        // header("Location: ".DOMAIN."/info");
        $this->view('home', [
            "header" => "header_main",
            "footer" => "footer",
            "page" => "dashboard",
        ]);
    }
    public function product($id = null) {
        if($id != null) {
            $id = str_replace('id=', '', $id) + 0;
        }
        $listProduct = $this->Admin->getListProduct($id);
    }
}

?>