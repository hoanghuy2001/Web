<?php

class admin extends controller {
    
    private $Admin;
    private $User;
    private $Category;
    private $Product;
    private $Feedback;
    private $Order;

    public function __construct() {
        $this->Admin = $this->model('adminModel');
        $this->User = $this->model('user');
        $this->Category = $this->model('category');
        $this->Product = $this->model('product');
        $this->Feedback = $this->model('feedback');
        $this->Order = $this->model('order');


        $userToken = $this->User->getUserToken();
        if($userToken == "null") {
            header('Location: '.DOMAIN.'/login');
        }
    }
    
    // http://localhost/shop/(home)
    public function init() {
        // model

        // view
        $this->view('admin', [
            "title" => "Dashboard",
            "header" => "header",
            "sidebar" => "sidebar",
            "footer" => "footer",
            "page" => "dashboard",
            "dashboard" => "active",
        ]);
    }

    // http://localhost/shop/admin/user
    public function user($action = '', $id = '') {
        if($action == 'get') {
            echo $this->Admin->getListUser();
            die();
        }
        $title = "Quản lý tài khoản người dùng";
        $header = "header";
        $sidebar = "sidebar";
        $page = "user";
        $listUser = "";
        $userInfo = "";
        // hien thi danh sach tai khoan

        // them nguoi dung
        if($action == 'add') {
            $title = "Thêm tài khoản";
            $page = "addUser";
        }
        else if($action == 'edit') {
            $id = str_replace('id=', '', $id) + 0;
            $userInfo = $this->Admin->getListUser($id);
            $title = "Sửa thông tin tài khoản";
            $page = "editUser";
        }
        else if($action == 'del') {
            $id = str_replace('id=', '', $id) + 0;
            $this->processUser($action, $id);
        }
        $listUser = $this->Admin->getListUser();
        $this->view('admin', [
            "title" => $title,
            "header" => $header,
            "sidebar" => $sidebar,
            "footer" => "footer",
            "page" => $page,
            "listUser" => $listUser,
            "userInfo" => $userInfo,
            "user" => "active",
        ]);
    }

    // xu ly them/sua tai khoan
    public function processUser($action,  $id = null) {
        
        if($id != null) {
            $id = str_replace('id=', '', $id) + 0;
        }
        
        $title = "Quản lý tài khoản người dùng";
        $header = "header";
        $sidebar = "sidebar";
        $page = "user";
        $listUser = "";
        $userInfo = "";
        $toast = [];
        $msg = "";
        // them tai khoan
        if($action == 'add') {
            if(isset($_POST)) {
                $name = $this->get_POST('name');
                $email = $this->get_POST('email');
                $pwd = $this->get_POST('pwd');
                $phone = $this->get_POST('phone_num');
                $addr = $this->get_POST('addr');
                $role = $this->get_POST('role');
    
                // insert into database user
                $result = $this->User->addUser($name, $email, $pwd, $phone, $addr, $role);

                // show Success/Fail
                if($result == "true"){
                    header("Location: ".DOMAIN."/admin/user");
                }
                else if($result == "false") {
                    $title = 'Thêm tài khoản';
                    $page = 'addUser';
                    $msg = 'Thông tin chưa phù hợp hoặc email đã được đăng ký, vui lòng kiểm tra lại!';
                    $toast = [
                        "type" => 'toast-error',
                        "icon" => 'fas fa-times',
                        "heading" => 'Thất bại',
                        "msg" => 'Email đã được đăng ký!',
                    ];
                }
            }
        }
        // sua tai khoan
        else if($action == 'edit') {
            if(isset($_POST)) {
                $name = $this->get_POST('name');
                $email = $this->get_POST('email');
                $pwd = $this->get_POST('pwd');
                $phone = $this->get_POST('phone_num');
                $addr = $this->get_POST('addr');
                $role = $this->get_POST('role');
    
                // insert into database user
                $result = $this->User->updateUser($id, $name, $email, $pwd, $phone, $addr, $role);

                // show Success/Fail
                if($result == "true"){
                    header("Location: ".DOMAIN."/admin/user");
                }
                else if($result == "false") {
                    $userInfo = $this->Admin->getListUser($id);
                    $title = 'Sửa thông tin tài khoản';
                    $page = 'editUser';
                    $msg = 'Thông tin chưa phù hợp, vui lòng kiểm tra lại!';
                    $toast = [
                        "type" => 'toast-error',
                        "icon" => 'fas fa-times',
                        "heading" => 'Thất bại',
                        "msg" => 'Cập nhật thất bại!',
                    ];
                }
            }
        }
        // xoa tai khoan
        else {
            echo $this->User->deleteUser($id, true);
            die();
        }

        // lay lai danh sach user
        $listUser = $this->Admin->getListUser();

        $this->view('admin', [
            "title" => $title,
            "header" => $header,
            "sidebar" => $sidebar,
            "footer" => "footer",
            "page" => $page,
            "msg" => $msg,
            "user" => "active",
            "listUser" => $listUser,
            "userInfo" => $userInfo,
            "toast" => $toast,
        ]);
    }

    // http://localhost/shop/admin/category
    public function category($action = '') {
        
        $listCate = $this->Admin->getListCategory();

        if($action == '') {
            $this->view('admin', [
                "title" => "Quản lý danh mục sản phẩm",
                "header" => "header",
                "sidebar" => "sidebar",
                "footer" => "footer",
                "page" =>"category",
                "listCate" => $listCate,
                "category" => "active",
            ]);
        }
        else if($action == 'get') {
            echo $listCate;
        }
    }

    public function processCategory($action, $id = null) {
        if($id != null) {
            $id = str_replace('id=', '', $id) + 0;
        }
        if(isset($_POST)) {
            $name = $this->get_POST('name');
        }
        if($action == 'add') {
            echo $this->Category->addCategory($name);
        }
        else if($action == 'edit') {
            echo $this->Category->updateCategory($id, $name);
        }
        else if($action == 'del') {
            echo $this->Category->deleteCategory($id);
        }
    }

    // http://localhost/shop/admin/product
    public function product($action = '', $id = '') {
        if($action == 'get') {
            echo $this->Admin->getListProduct();
            die();
        }
        else {
            $title = "Quản lý sản phẩm";
            $header = "header";
            $sidebar = "sidebar";
            $page = "product";
            $listProduct = "";
            $productInfo = "";
            $listCategory = "";
            // hien thi danh sach tai khoan
    
            // them nguoi dung
            if($action == 'add') {
                $title = "Thêm sản phẩm";
                $page = "addProduct";
                $listCategory = $this->Admin->getListCategory();
            }
            else if($action == 'edit') {
                $id = str_replace('id=', '', $id) + 0;
                $productInfo = $this->Admin->getListProduct($id);
                $listCategory = $this->Admin->getListCategory();
                $title = "Sửa thông tin sản phẩm";
                $page = "editProduct";
            }
            else if($action == 'del') {
                $id = str_replace('id=', '', $id) + 0;
                $this->processProduct($action, $id);
            }
            $listProduct = $this->Admin->getListProduct();
            $this->view('admin', [
                "title" => $title,
                "header" => $header,
                "sidebar" => $sidebar,
                "footer" => "footer",
                "page" => $page,
                "listProduct" => $listProduct,
                "productInfo" => $productInfo,
                "listCategory" => $listCategory,
                "product" => "active",
            ]);
        }
    }

    // xu ly them/sua tai khoan
    public function processProduct($action,  $id = null) {
        if($id != null) {
            $id = str_replace('id=', '', $id) + 0;
        }
        $title = "Quản lý sản phẩm";
        $header = "header";
        $sidebar = "sidebar";
        $page = "product";
        $listProduct = "";
        $listCategory = "";
        $productInfo = "";
        $toast = [];
        $msg = "";
        // them tai khoan
        if($action == 'add') {
            if(isset($_POST)) {
                $titProduct = $this->get_POST('title');
                $category = $this->get_POST('category');
                $price = $this->get_POST('price');
                $discount = $this->get_POST('discount');
                $describe = $this->get_POST('describe');
                
                $category_name = $this->Admin->getListCategory($category);
                $category_name = json_decode($category_name, true);
                $folder = $this->getScurityMD5($category_name[0]["name"]);

                if(!file_exists('http://localhost/shop/mvc/views/assets/thumbnail/product/'.$folder)) {
                    mkdir('./mvc/views/assets/thumbnail/product/'.$folder);
                }
                $thumbnail = $this->moveFile('thumbnail', 'product/'.$folder.'/');

                // insert into database product
                $result = $this->Product->addProduct($titProduct, $category, $price, $discount, $thumbnail, $describe);

                // show Success/Fail
                if($result == "true"){
                    header('Location: http://localhost/shop/admin/product');
                    die();
                }
                else if($result == "false") {
                    $title = 'Thêm sản phẩm';
                    $page = 'addProduct';
                    $listCategory = $this->Admin->getListCategory();
                    $msg = 'Thông tin chưa phù hợp, vui lòng kiểm tra lại!';
                    $toast = [
                        "type" => 'toast-error',
                        "icon" => 'fas fa-times',
                        "heading" => 'Thất bại',
                        "msg" => 'Xem lại thông tin nội dung!',
                    ];
                }
            }
        }
        // sua tai khoan
        else if($action == 'edit') {
            if(isset($_POST)) {
                $titProduct = $this->get_POST('title');
                $category = $this->get_POST('category');
                $price = $this->get_POST('price');
                $discount = $this->get_POST('discount');
                $describe = $this->get_POST('describe');
                
                $category_name = $this->Admin->getListCategory($category);
                $category_name = json_decode($category_name, true);
                $folder = $this->getScurityMD5($category_name["name"]);
                
                if(!file_exists('http://localhost/shop/mvc/views/assets/thumbnail/product/'.$folder)) {
                    mkdir('./mvc/views/assets/thumbnail/product/'.$folder);
                }
                $thumbnail = $this->moveFile('thumbnail', 'product/'.$folder.'/');

                // insert into database product
                $result = $this->Product->updateProduct($id, $titProduct, $category, $price, $discount, $thumbnail, $describe);

                // show Success/Fail
                if($result == "true"){
                    header('Location: http://localhost/shop/admin/product');
                    die();
                }
                else if($result == "false") {
                    $productInfo = $this->Admin->getListProduct($id);
                    $title = 'Sửa thông tin sản phẩm';
                    $page = 'editProduct';
                    $msg = 'Thông tin chưa phù hợp, vui lòng kiểm tra lại!';
                    $toast = [
                        "type" => 'toast-error',
                        "icon" => 'fas fa-times',
                        "heading" => 'Thất bại',
                        "msg" => 'Cập nhật thất bại!',
                    ];
                }
            }
        }
        // xoa sản phẩm
        else {
            echo $this->Product->deleteProduct($id, true);
            die();
        }

        // lay lai danh sach product
        $listProduct = $this->Admin->getListProduct();

        $this->view('admin', [
            "title" => $title,
            "header" => $header,
            "sidebar" => $sidebar,
            "footer" => "footer",
            "page" => $page,
            "msg" => $msg,
            "product" => "active",
            "listProduct" => $listProduct,
            "listCategory" => $listCategory,
            "productInfo" => $productInfo,
            "toast" => $toast,
        ]);
    }

    // http://localhost/shop/admin/feedback
    public function feedback($action = '') {
        $listFeedback = $this->Admin->getListFeedback();
        
        if($action == '') {
            $this->view('admin', [
                "title" => "Quản lý phản hồi",
                "header" => "header",
                "sidebar" => "sidebar",
                "footer" => "footer",
                "page" => "feedback",
                "listFeedback" => $listFeedback,
                "feedback" => "active"
            ]);
        }
        else if($action == 'get') {
            echo $listFeedback;
        }
    }
    
    public function processFeedback($action, $id) {
        $id = str_replace('id=', '', $id) + 0;
        if(isset($_POST)) {
            $value = $this->get_POST('value');
            $result = "false";
            $result = $this->Feedback->processFeedback($action, $id, $value);
            echo $result;
        }
    }


    // http://localhost/shop/admin/order
    public function order($action = '') {

        if($action == 'get') {
            echo $this->Admin->getListOrder();
            die();
        }

        $this->view('admin', [
            "title" => "Quản lý đơn hàng",
            "header" => "header",
            "sidebar" => "sidebar",
            "footer" => "footer",
            "page" => "order",
            "order" => "active",
            "listOrder" => $this->Admin->getListOrder(),
        ]);
    }

    public function processOrder($id = null) {
        if($id != null) {
            $id = str_replace('id=', '', $id) + 0;
        }

        if(isset($_POST)) {
            $value = $this->get_POST('value') + 0;
            echo $this->Order->processOrder($id, $value);
        }
    }
}

?>