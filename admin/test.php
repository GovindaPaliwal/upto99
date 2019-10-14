<?php
session_start();

class DbOperation{

    public $con;

    function __construct(){

        $this->con = mysqli_connect("localhost","root","","upto99");

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
        $stmt->close();
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

    function Fetch_record($table){
        
        $sql = "";
        $sql .= "SELECT * FROM ".current($table)." ORDER BY ".end($table)." DESC";
        $stmt = $this->con->prepare($sql);
        $stmt->execute();
        $row = $stmt->get_result();
        $arr = array();
        while($result = $row->fetch_assoc()){

            array_push($arr,$result);
        }
        $stmt->close();

        return $arr;
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

$db = new DbOperation;

/*
$row = array();
//$s = 1;
$sql = $db->con->prepare("SELECT ct_id,ct_name FROM tbl_categories");
$sql->bind_result($cid,$cname);
$sql->execute();
while($sql->fetch()){
    $rows['cid'] = $cid;
    $rows['cname'] = $cname;
   $row[] = $rows;
}

*/

/*

foreach ($row as $r) {
    
    echo "<ul> <li style='list-style: none;'><input type='checkbox' name='category[]' value='".$r['cid']."'/> <label>".$r['cname']."</label>";
    $a = $r['cid'];
    $qry = $db->con->prepare("SELECT sc_id,sc_name FROM tbl_subcategory WHERE sc_ct_id=?");
    $qry->bind_param("s",$a);
    $qry->bind_result($sid,$sname);
    $qry->execute();
    while($qry->fetch()){
        echo "<ul><li style='list-style: none; margin-left:-15px;margin-top:5px;'><input type='checkbox' name='subcategory[]' value='".$sid."'/> <label>".$sname."</label></li></ul>";
    }
    
    echo "</li></ul>";
}

*/

$a = [1,2];
$s = [2,4,3];
$array = array();
/*
foreach ($a as $r) {
    
    $qry = $db->con->prepare("SELECT ct_id,ct_name FROM tbl_categories WHERE ct_id=?");
    $qry->bind_param("s",$r);
    $qry->bind_result($id,$name);
    $qry->execute();
    while($qry->fetch()){
        
        $row['id'] = $id;
        $row['name'] = $name;

        $array[] = $row;
        
    }

}
*/
/*
print_r($array);
*/

//foreach($array as $ar){
    
    foreach($s as $t){
        //print_r($ar);
        $sql = $db->con->prepare("SELECT sc_name FROM tbl_subcategory WHERE sc_id=?");
        $sql->bind_param("s",$t);
        $sql->bind_result($sname);
        while($sql->fetch()){

            
            echo $sname."<br>";
        }

    //}
}


?>

