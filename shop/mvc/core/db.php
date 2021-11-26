<?php

class db {
    public $con;
    protected $HOST = "localhost";
    protected $USERNAME = "root";
    protected $PASSWORD = "";
    protected $DBNAME = "technology_shop";

    public function __construct() {
        $this->con = mysqli_connect($this->HOST, $this->USERNAME, $this->PASSWORD, $this->DBNAME);
        mysqli_query($this->con, "SET NAMES 'utf8");
    }

    // insert, delete, update
    public function excute($sql) {
        $result = false;
        if(mysqli_query($this->con, $sql)) {
            $result = true;
        }
        return json_encode($result);
    }
    
    // SELECT lay du lieu
    public function excuteResult($sql, $isSingle = false, $isJson = true) {
        $result = mysqli_query($this->con, $sql);
        if($isSingle) {
            $data = mysqli_fetch_array($result, 1);
        }
        else {
            $data = [];
            while ( ($row = mysqli_fetch_array($result, 1)) != null ) {
                $data[] = $row;
            }
        }
        if($isJson) {
            return json_encode($data);
        }
        return $data;
    }
}
?>