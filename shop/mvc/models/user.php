<?php

class user extends db {
    use tool;

    // INSERT USER
    public function addUser($fullname, $email, $pwd, $phone = null, $addr = null, $role = 3) {  
        $sql = "SELECT * FROM user WHERE email = '$email'";
        $usrExisted = $this->excuteResult($sql, true);
        if($usrExisted != 'null') {
            return "false";
        }
        else {
            $pwd = $this->getScurityHash($pwd);
            $created_at = $updated_at = date('Y-m-d H:m:s');
            $sql = "INSERT INTO user VALUES (null, '$fullname', '$email', '$phone', '$addr', '$pwd', '$role', '$created_at', '$updated_at', 0)";
            return $this->excute($sql);
        }
    }

    // Update user
    public function updateUser($id, $fullname, $email, $pwd, $phone, $addr, $role) {
        $sql = "SELECT * FROM user WHERE email = '$email' AND id != '$id'";
        $usrExisted = $this->excuteResult($sql, true);
        if($usrExisted != 'null') {
            return "false";
        }
        else {
            $updated_at = date('Y-m-d H:m:s');
            $sql = "UPDATE user SET fullname = '$fullname', email = '$email', phone_number = '$phone', addr = '$addr', role_id = '$role', updated_at = '$updated_at'";
            if($pwd != '') {
                $pwd = $this->getScurityHash($pwd);
                $sql = $sql.", pwd = '$pwd'";
            }
            $sql = $sql." WHERE id = '$id'";
            return $this->excute($sql);
        }
    }

    // delete user
    public function deleteUser($id, $isDeleted = false) {
        $sql = "SELECT user.*, role.name as role_name FROM user LEFT JOIN role
        ON user.role_id = role.id WHERE user.id = '$id' AND user.is_deleted = 0";
        $userExisted = $this->excuteResult($sql, true, false);
        if($userExisted["role_name"] == "Admin") {
            return "false";
        }
        if($isDeleted) {
            $sql = "DELETE FROM user WHERE id = '$id'";
        }
        else {
            $updated_at = date('Y-m-d H:m:s');
            $sql = "UPDATE user SET updated_at = '$updated_at', is_deleted = 1 WHERE id = '$id'";
        }
        $userToken = $this->getUserToken();
        if($id == $userToken["id"]) {
            return "false";
        }
        return $this->excute($sql);
    }

    // CHECK EXIST EMAIL BY AJAX nhung chua biet dung nhu nao
    public function checkEmail($email) {
        $sql = "SELECT email FROM user WHERE email = '$email'";
        $usrExisted = $this->excuteResult($sql, true);
        $result = false;
        if($usrExisted != 'null') {
            $result = true;
        }
        return json_encode($result);
    }

    // CHECK EXIST ACCOUNT
    public function verifyAccount($email, $pwd) {
        $sql = "SELECT * FROM user WHERE email = '$email' AND is_deleted = 0";
        $usrExisted = $this->excuteResult($sql, true, false);
        $result = false;
        if($usrExisted != null && password_verify($pwd,  $usrExisted["pwd"])) {
            $result = true;
            $token = $this->getScurityMD5($usrExisted["email"]);
            setcookie('token', $token, time() + 7 * 24 * 60 * 60, '/');
            
            $userId = $usrExisted["id"];
            $created_at = date('Y-m-d H:m:s');
            $sql = "INSERT INTO token VALUES ('$userId', '$token', '$created_at')";
            $this->excute($sql);    
        }
        return json_encode($result);
    }

    // GET TOKEN TO AUTO LOGIN
    public function getUserToken() {
        if(isset($_SESSION['user'])) {
            return $_SESSION['user'];
        }
        $token = $this->get_COOKIE('token');
        $sql = "SELECT * FROM token WHERE token = '$token'";
        $item = $this->excuteResult($sql, true);
        if($item != "null") {
            $userId = json_decode($item, true)['user_id'];
            $sql = "SELECT * FROM user WHERE id = '$userId'";
            $item = $this->excuteResult($sql, true);
            if($item != "null") {
                $_SESSION['user'] = $item;
                return $item;
            }
        }
        return "null";
    }
    
    // CLEAR COOKIE & SESSION
    public function clearUserToken() {
        setcookie('token', '', time() - 1, '/');
        $sql = "DELETE FROM token";
        $this->excute($sql);
        session_destroy();
        return 'true';
    }
}
?>
