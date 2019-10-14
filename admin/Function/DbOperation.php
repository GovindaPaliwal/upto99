<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class DbOperation{
    
    public  $con;
    

   function __construct(){

        include_once("db.php");

        $db = new DbConnect;

        $this->con = $db->Connect();
        
    }

    function Login($email,$password){
        
        $rol = "Admin";
        $sql = $this->con->prepare("SELECT u_id,u_password,u_role FROM tbl_user WHERE u_email=? and u_role=?");
        $sql->bind_param("ss",$email,$rol);
        $sql->bind_result($id,$pass,$role);
        $sql->execute();
        $sql->store_result();
        
        if($sql->num_rows > 0){
            $sql->fetch();
            if(password_verify($password,$pass)){

                $_SESSION['admin'] = $id;

                return $role;
            }
            else{
                return "1";
            }
        }
        
        else{
            return "1";
        }
    }

    
    function addTag($tagName, $tagDefault){

        $user = $_SESSION['admin'];
        $qry = $this->con->prepare("SELECT * FROM tbl_tags WHERE t_name=?");
        $qry->bind_param("s",$tagName);
        $qry->execute();
        $qry->store_result();
        if($qry->num_rows > 0){
            return "2";
        }
        else{
        $sql = $this->con->prepare("INSERT INTO tbl_tags (t_name,t_is_default,t_user) VALUES (?,?,?)");
        $sql->bind_param("sii",$tagName,$tagDefault,$user);
        if($sql->execute()){
            return "0";
        }
        else{
            return "1";
        }

        }
    }

    function Record_insert($table,$fields,$f){

        $sql = "";
        $sql .= "INSERT INTO ".$table."";
        $sql .= " (".implode(",",array_keys($fields)).") VALUES (".implode(",",array_values($fields)).")";
        $stmt = $this->con->prepare($sql);
        $stmt->bind_param(str_repeat("s", count($f)), ...$f);
        if($stmt->execute()){
            return true;
        }
    }

    function Update_record($table,$fields,$val){

        $sql = "";
        $sql .= "UPDATE ".current($table)." SET ";
        $sql .= implode(",",$fields). " WHERE " .end($table). " = ?";
        $stmt = $this->con->prepare($sql);
        $stmt->bind_param(str_repeat("s",count($val)),...$val);
        if($stmt->execute()){
            return true;
        }
       
    }

    function Delete_record($del_tab,$del_id){
        $sql = "";
        $sql .= "DELETE FROM ".current($del_tab)." WHERE ".end($del_tab)." = ?";
        $stmt = $this->con->prepare($sql);
        $stmt->bind_param("s",$del_id);
        if($stmt->execute()){
            
            return true;
    }
    $stmt->close();

    }

    function Check_record($test,$word){

        $sql = "";
        $sql .= "SELECT ".current($test)." FROM ".end($test)." WHERE ".$test[0]." = ?";
        $stmt = $this->con->prepare($sql);
        $stmt->bind_param("s",$word);
        $stmt->execute();
        $stmt->store_result();
        if($stmt->num_rows > 0){
            return 1;
        }

    }
    


}

?>


