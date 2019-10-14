<?php
class DbConnect{

    private $con;

    Function Connect(){

    include_once("define.php");

        $this->con = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

        if(mysqli_connect_errno()){
            echo "Error Establishing Database Connection";
        }
        else{
            return $this->con;
        }
    }
}
?>
