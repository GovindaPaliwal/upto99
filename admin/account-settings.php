<?php 
include_once("Function/DbOperation.php");

$db = new DbOperation;

if(empty($_SESSION['admin'])){
  header("Location: login");
}


$u = $_SESSION['admin'];
$qry = mysqli_query($db->con,"SELECT * FROM tbl_user WHERE u_id='$u'");
$q = mysqli_fetch_array($qry);

unset($_SESSION['msg']);

if(isset($_POST['btnProfile'])){

  $name = $_POST['name'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $file = "";
  $user = $_SESSION['admin'];
  if(!empty($_FILES['file']['name'])){
    $file_ext = explode(".",$_FILES['file']['name']);
    $file = md5(rand()).'.'.end($file_ext);
    $path = "uploads/user/".$file;
    move_uploaded_file($_FILES['file']['tmp_name'],$path);
  }

  $fields = [
    "u_name = ?",
    "u_phone = ?",
    "u_email = ?",
    "u_img = ?"
  ];
  $val = [$name,$phone,$email,$file,$user];
  $res = $db->Update_record(['tbl_user','u_id'],$fields,$val);

  if($res == 1){
    $_SESSION['msg'] = "Profile Updated!";
  }
  else{
    $_SESSION['msg'] = "Error While Updating Profile";
  }
  
}

if(isset($_POST['btnPass'])){
  $opass = $_POST['opass'];
  $npass = $_POST['npass'];
  $cpass = $_POST['cpass'];

  if(password_verify($opass,$q['u_password'])){

    if($npass == $cpass){

      $options = [
        'cost' => 12,
    ];
    $password = password_hash($npass,PASSWORD_BCRYPT, $options);

      $res = $db->Update_record(['tbl_user','u_id'],["u_password = ?"],[$password,$u]);
      if($res == 1){
        $_SESSION['msg'] = "Password Changed Successfully";
      }
      else{
        $_SESSION['msg'] = "Error While Updating Password";
      }

    }
    else{

      $_SESSION['msg'] = "Both Password Didn't Match";

    }

  }
  else{
    $_SESSION['msg'] = "Invalid Old Password";
  }
}

include_once('include/header.php');
include_once('include/sidebar.php');

?>

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Account Settings
      </h1>
      <?php
        if(isset($_SESSION['msg'])){
      ?>
      <div style="margin:0px auto;width:40%">

      <div class="alert alert-info alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <?php echo $_SESSION['msg']; ?>
              </div>
    </div>
    <?php } ?>


      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Account Settings</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">


    <!--- Horizontal  Form Start -->


     <!-- Default box -->
     <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Profile Setting</h3>

          <!--<div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>-->
        </div>

        <div class="box-body">

        <div class="col-md-12">
        <div class="col-md-6">
        <h3><b>Profile Details</b></h3>
        <form method="post" enctype="multipart/form-data">
        <div class="col-md-12">
            <div class="form-group">
            <label for="exampleInputEmail1">Name</label>
            <input type="text" required class="form-control" name="name" placeholder="Name" value="<?php echo $q['u_name']; ?>">
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group">
            <label for="exampleInputEmail1">Email</label>
            <input type="email" required class="form-control" name="email" placeholder="Email" value="<?php echo $q['u_email']; ?>">
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group">
            <label for="exampleInputEmail1">Phone</label>
            <input type="number" required class="form-control" name="phone" placeholder="Phone" value="<?php echo $q['u_phone']; ?>">
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group">
            <label for="exampleInputEmail1">Profile Image</label>
            <input type="file" class="form-control" name="file">
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group" style="float:right">
            <input type="submit" name="btnProfile" value="Update Profile" class="btn btn-success"/>
            </div>
        </div>
        </form>

        </div>

        <div class="col-md-6">
        <h3><b>Chnage Password</b></h3>
        <form method="post">
        <div class="col-md-12">
            <div class="form-group">
            <label for="exampleInputEmail1">Old Password</label>
            <input type="password" required class="form-control" name="opass" placeholder="********">
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group">
            <label for="exampleInputEmail1">New Password</label>
            <input type="password" required class="form-control" name="npass" placeholder="********">
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group">
            <label for="exampleInputEmail1">Confirm Password</label>
            <input type="password" required class="form-control" name="cpass" placeholder="********">
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group" style="float:right">
            <input type="submit" name="btnPass" value="Update Password" class="btn btn-success"/>
            </div>
        </div>
        </form>
        </div>
        
        </div>


        </div>

        <!-- /.box-body -->
        <div class="box-footer">
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->


    <!--- Horizontal Form End --->



    </section>
    <!-- /.content -->
</div>
      <!-- /.row -->
      <!-- Main row -->
 
    <!-- /.content -->

  <!-- /.content-wrapper -->

  <?php include_once('include/footer.php');?>