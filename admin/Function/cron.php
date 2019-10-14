<?php
include_once("DbOperation.php");

$db = new DbOperation;

date_default_timezone_set("Asia/Karachi");
$date = date("Y-m-d");
$status = "Enable";
$id = "30";
//$qry = $db->con->prepare("UPDATE tbl_coupens SET schedule_status=? WHERE schedule_date=?");
//$qry->bind_param("ss",$status,$date);
$qry = $db->con->prepare("UPDATE tbl_coupens SET schedule_status=? WHERE c_id=?");
$qry->bind_param("ss",$status,$id);
$qry->execute();


?>