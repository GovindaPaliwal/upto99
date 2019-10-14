<?php
include_once('DbOperation.php');

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$db = new DbOperation;

switch ($_GET['form']) {

case 'slide1':

$a = "slide1";
$sql = $db->con->prepare("SELECT ad2,mtitle,mkeyword,mdescription FROM tbl_settings WHERE ad1=?");
$sql->bind_param("s",$a);
$sql->bind_result($img,$txt1,$txt2,$txt3);
$sql->execute();
$sql->store_result();
if($sql->num_rows > 0){
    $sql->fetch();
    $arr = array(
        "image" => $img,
        "txt1" => $txt1,
        "txt2" => $txt2,
        "txt3" => $txt3
    );
    echo json_encode($arr);
}

break;


case 'slide2':

$a = "slide2";
$sql = $db->con->prepare("SELECT ad2,mtitle,mkeyword,mdescription FROM tbl_settings WHERE ad1=?");
$sql->bind_param("s",$a);
$sql->bind_result($img,$txt1,$txt2,$txt3);
$sql->execute();
$sql->store_result();
if($sql->num_rows > 0){
    $sql->fetch();
    $arr = array(
        "image" => $img,
        "txt1" => $txt1,
        "txt2" => $txt2,
        "txt3" => $txt3
    );
    echo json_encode($arr);
}

break;

case 'slide3':

$a = "slide3";
$sql = $db->con->prepare("SELECT ad2,mtitle,mkeyword,mdescription FROM tbl_settings WHERE ad1=?");
$sql->bind_param("s",$a);
$sql->bind_result($img,$txt1,$txt2,$txt3);
$sql->execute();
$sql->store_result();
if($sql->num_rows > 0){
    $sql->fetch();
    $arr = array(
        "image" => $img,
        "txt1" => $txt1,
        "txt2" => $txt2,
        "txt3" => $txt3
    );
    echo json_encode($arr);
}

break;

case 'adsenseFetch':

$page = $_POST['page'];

$sql = $db->con->prepare("SELECT ad1,ad2 FROM tbl_settings WHERE page=?");
$sql->bind_param("s",$page);
$sql->bind_result($ad1,$ad2);
$sql->execute();
$sql->store_result();
if($sql->num_rows > 0){
    $sql->fetch();

    $arr = array(
        "txt1" => $ad1,
        "txt2" => $ad2
    );
    echo json_encode($arr);
}

break;

case 'metaFetch':

$page = $_POST['page'];
$sql = $db->con->prepare("SELECT mtitle,mkeyword,mdescription FROM tbl_settings WHERE page=?");
$sql->bind_param("s",$page);
$sql->bind_result($ad1,$ad2,$ad3);
$sql->execute();
$sql->store_result();
if($sql->num_rows > 0){
    $sql->fetch();

    $arr = array(
        "txt1" => $ad1,
        "txt2" => $ad2,
        "txt3" => $ad3
    );
    echo json_encode($arr);
}

break;

    
default:
echo "Something Went Wrong";
break;
}


?>