<?php
include_once('DbOperation.php');

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$db = new DbOperation;

switch ($_GET['form']) {

case 'Login':


$email = $db->con->real_escape_string($_POST['email']);
$password = $_POST['password'];
$role = "Admin";

$res = $db->Login($email,$password);

echo json_encode($res);

break;

case 'addTag':

$tagName = $db->con->real_escape_string($_POST['tagName']);
$tagDefault = 0;

if(isset($_POST['tagDefault'])){
$tagDefault = $db->con->real_escape_string($_POST['tagDefault']);
}

$res = $db->addTag($tagName, $tagDefault);

echo json_encode($res);

break;


case 'slider':

    $img = $_POST['img'];
    $id = $_POST['id'];

    unlink("../uploads/sliderImage/".$img);
    $res = $db->Delete_record(['tbl_slider','img_id'],$id);
    if($res == true){
        echo json_encode("1");
    }
    

    break;


case 'userLogin':

    $email = $db->con->real_escape_string($_POST['email']);
    $password = $db->con->real_escape_string($_POST['password']);
    $role = "user";
    $qry = $db->con->prepare("SELECT u_id,u_password,u_name FROM tbl_user WHERE u_email=? and u_role=?");
    $qry->bind_param("ss",$email,$role);
    $qry->bind_result($id,$pass,$name);
    $qry->execute();
    $qry->store_result();
    if($qry->num_rows > 0){
    $qry->fetch();

        if(password_verify($password,$pass)){
            $_SESSION['user'] = $id;
            $_SESSION['name'] = $name;
            echo json_encode("1");
        }
        else{
            echo json_encode("2");
        }
    }
    else{
        echo json_encode("0");
    }

break;

case 'userSignup':

    $name = $db->con->real_escape_string($_POST['name']);
    $phone = $db->con->real_escape_string($_POST['phone']);
    $email = $db->con->real_escape_string($_POST['email']);
    $password = $db->con->real_escape_string($_POST['password']);
    $options = [
        'cost' => 12,
    ];
    $pass = password_hash($password,PASSWORD_BCRYPT, $options);
    $check = $db->Check_record(['u_email','tbl_user'],$email);
    if($check == 1){
        echo json_encode("2");
    }
    else{
        
        $fields = array(
        "u_name" => "?",
        "u_phone" => "?",
        "u_email" => "?",
        "u_password" => "?",
        "u_role" => "?"
    );
    $f = [$name,$phone,$email,$pass,"user"];
    $res = $db->Record_insert("tbl_user",$fields,$f);
    if($res == true){

        $sql = $db->con->prepare("SELECT u_id,u_name FROM tbl_user ORDER BY u_id DESC LIMIT 1");
        $sql->bind_result($uid,$uname);
        $sql->execute();
        $sql->fetch();
        $_SESSION['user'] = $uid;
        $_SESSION['name'] = $uname;
        $sql->close();

        $ch = $db->Check_record(['su_email','tbl_subscriber'],$email);
        if($check == 1){
        }
        else{
        $sub = $db->Record_insert("tbl_subscriber",["su_email"=>"?"],[$email]);
        }

        echo json_encode("1");

    }
    else{
        echo json_encode("0");
    }

}

break;


case 'likeCoupon':

    $like = $_POST['like'];
    $like = explode("-",$like);
    
    if(empty($_SESSION['user'])){
        echo json_encode("0");
    }
    else{
    $user = $_SESSION['user'];
    $coup = $like[1];

    $sql = $db->con->prepare("SELECT c_like,c_dis FROM tbl_coupens WHERE c_id=?");
    $sql->bind_param("s",$coup);
    $sql->bind_result($no_of_like,$no_of_dis);
    $sql->execute();
    $sql->fetch();
    $sql->close();

    $qry = $db->con->prepare("SELECT * FROM tbl_like WHERE l_coupon_id=? and l_user=?");
    $qry->bind_param("ss",$coup,$user);
    $qry->bind_result($lid,$llike,$ldis,$lcoupon,$luser);
    $qry->execute();
    $qry->store_result();
    if($qry->num_rows > 0){
    $qry->fetch();

        if($llike == "0"){
            $fields = [
                "l_like = ?",
                "l_dis = ?"
            ];
            $res = $db->Update_record(['tbl_like','l_id'],$fields,['1','0',$lid]);
            if($res == true){
                $val = $no_of_like + 1;
                $r = $db->Update_record(['tbl_coupens','c_id'],["c_like = ?"],[$val,$coup]);
                echo json_encode("1");
            }
        }
        else{
            $fields = [
                "l_like = ?",
                "l_dis = ?"
            ];
            $res = $db->Update_record(['tbl_like','l_id'],$fields,['0','0',$lid]);
            if($res == true){
                $v = $no_of_like + 0;
                $db->Update_record(['tbl_coupens','c_id'],["c_like = ?"],[$v,$coup]);
                echo json_encode("2");
            }
        }

    }
    else{
        $fields = array(
            "l_like" => "?",
            "l_dis" => "?",
            "l_coupon_id" => "?",
            "l_user" => "?"
        );
        $f = ['1','0',$coup,$user];
        $sql = $db->Record_insert("tbl_like",$fields,$f);
        if($sql == true){
            $val = $no_of_like + 1;
            $r = $db->Update_record(['tbl_coupens','c_id'],["c_like = ?"],[$val,$coup]);
            echo json_encode("3");
        }
        else{
            echo json_encode("4");
        }

    }

    }
    

break;


case 'homeAd':

$ad1 = $_POST['homead1'];
$ad2 = $_POST['homead2'];
$page = $_POST['page'];
$qry = $db->con->prepare("SELECT * FROM tbl_settings WHERE page=?");
$qry->bind_param("s",$page);
$qry->execute();
$qry->store_result();
if($qry->num_rows > 0){

$res = $db->Update_record(['tbl_settings','page'],['ad1 = ?','ad2 = ?'],[$ad1,$ad2,$page]);
if($res == true){
    echo json_encode("update");
}
}
else{

    $fields = array(
        "ad1" => "?",
        "ad2" => "?",
        "page" => "?"
    );
$res = $db->Record_insert("tbl_settings",$fields,[$ad1,$ad2,$page]);
if($res == true){
    echo json_encode("update");
}

}

break;

case 'homeMeta':

$mtitle = $_POST['homemtitle'];
$mkeyword = $_POST['homemkeyword'];
$mdescription = $_POST['homemdescription'];
$page = $_POST['page'];

$qry = $db->con->prepare("SELECT * FROM tbl_settings WHERE page=?");
$qry->bind_param("s",$page);
$qry->execute();
$qry->store_result();
if($qry->num_rows > 0){

$res = $db->Update_record(['tbl_settings','page'],['mtitle = ?','mkeyword = ?','mdescription = ?'],[$mtitle,$mkeyword,$mdescription,$page]);
if($res == true){
    echo json_encode("update");
}
}
else{

    $fields = array(
        "mtitle" => "?",
        "mkeyword" => "?",
        "mdescription" => "?",
        "page" => "?"
    );
$res = $db->Record_insert("tbl_settings",$fields,[$mtitle,$mkeyword,$mdescription,$page]);
if($res == true){
    echo json_encode("update");
}

}

break;

case 'homeSlider':

$text1 = $_POST['text1'];
$text2 = $_POST['text2'];
$text3 = $_POST['text3'];
$val = $_POST['slide'];

$page = "Home-Slider";
$qry = $db->con->prepare("SELECT ad1,ad2 FROM tbl_settings WHERE page=? and ad1=?");
$qry->bind_param("ss",$page,$val);
$qry->bind_result($slide0,$slide1);
$qry->execute();
$qry->store_result();
if($qry->num_rows > 0){
$qry->fetch();
if(!empty($_FILES['image']['name'])){

    unlink("../uploads/homeslider/".$slide1);
    $file_name = explode(".",$_FILES['image']['name']);
    $file = md5(rand()).'.'.end($file_name);
    $path = "../uploads/homeslider/".$file;
    move_uploaded_file($_FILES['image']['tmp_name'],$path);

    $res = $db->Update_record(['tbl_settings','ad1'],['mtitle = ?','mkeyword = ?','mdescription = ?','ad2 = ?'],[$text1,$text2,$text3,$file,$val]);

if($res == true){
    echo json_encode("update");
}

}
else{

    $res = $db->Update_record(['tbl_settings','ad1'],['mtitle = ?','mkeyword = ?','mdescription = ?'],[$text1,$text2,$text3,$val]);

if($res == true){
    echo json_encode("update");
}

}

}
else{

    if(!empty($_FILES['image']['name'])){ 

        $file_name = explode(".",$_FILES['image']['name']);
        $file = md5(rand()).'.'.end($file_name);
        $path = "../uploads/homeslider/".$file;
        move_uploaded_file($_FILES['image']['tmp_name'],$path);
    
     
    $fields = array(
        "mtitle" => "?",
        "mkeyword" => "?",
        "mdescription" => "?",
        "ad2" => "?",
        "ad1" => "?",
        "page" => "?"
    );
$r = $db->Record_insert("tbl_settings",$fields,[$text1,$text2,$text3,$file,$val,$page]);
    

if($r == true){
    echo json_encode("update");
}
}
}

break;

case 'sliderDetails':

$p = "Home-Slider";
$sql = $db->con->prepare("SELECT * FROM tbl_settings WHERE page=?");
$sql->bind_param("s",$p);
$sql->bind_result($id,$ad1,$ad2,$text1,$text2,$text3,$page);
$sql->execute();
$sql->store_result();
if($sql->num_rows > 0){
while($sql->fetch()){
?>

<tr>
<td><?php echo $ad1; ?></td>
<td><img src="uploads/homeslider/<?php echo $ad2; ?>" style="width:150px; height:100px"></td>
<td><?php echo $text1; ?></td>
<td><?php echo $text2; ?></td>
<td><?php echo $text3; ?></td>
<td><Button value="<?php echo $ad2; ?>" id="<?php echo $id; ?>" class="btn btn-danger slideDelete" >Delete</Button></td>
</tr>

<?php
}
}
else{

}

break;
   

case 'SlideDelete':

$id = $_POST['id'];
$val = $_POST['val'];

$qry = $db->Delete_record(['tbl_settings','id'],$id);
if($qry == true){
    unlink("../uploads/homeslider/".$val);
    echo json_encode("Deleted");
}

break;

case 'subscriber':

$email = $db->con->real_escape_string($_POST['email']);

    $res = $db->Check_record(['su_email','tbl_subscriber'],$email);
    if($res == 1){
        echo json_encode("1");
    }
    else{
    $arr = array(
        "su_email" => "?"
    );
    $r = $db->Record_insert("tbl_subscriber",$arr,[$email]);
    if($r == true){
        echo json_encode("0");
    }
    }

break;


case 'logout':

if(session_destroy()){
    echo json_encode("0");
}
    break;


case 'imageLink':

$file = explode(".",$_FILES['image']['name']);
$file_name = md5(rand()).'.'.end($file);
$file_path = "../uploads/blogimage/".$file_name;

if(move_uploaded_file($_FILES['image']['tmp_name'],$file_path)){
    $arr = array(
        "message" => "1",
        "path" => "/admin/uploads/blogimage/".$file_name
    );
    echo json_encode($arr);
}
else{
    echo json_encode("0");
}

break;

case 'imageLinkForm':

$cat = $_POST['cat'];
$file = explode(".",$_FILES['file']['name']);
$file_name = md5(rand()).'.'.end($file);
$path = '';

if($cat == 1){
    $path = "couponimage/";
}
elseif($cat == 2){
    $path = "storeImage/";
}
elseif($cat == 3){
    $path = "categoryImage/";
}

$file_path = '../uploads/'.$path.$file_name;

if(move_uploaded_file($_FILES['file']['tmp_name'],$file_path)){
    $arr = array(
        "message" => "1",
        "path" => $file_name
    );
    echo json_encode($arr);
}
else{
    echo json_encode("0");
}

break;


default:
echo "Something Went Wrong";
break;


}

?>