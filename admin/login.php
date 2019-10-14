<?php
include_once("Function/DbOperation.php");

$db = new DbOperation;

if(!empty($_SESSION['admin'])){
  echo "<script>location.href='dashboard'</script>";
}

$role = "Admin";
$sql = $db->con->prepare("SELECT * FROM tbl_user WHERE u_role=?");
$sql->bind_param("s",$role);
$sql->execute();
$sql->store_result();
if($sql->num_rows > 0){

}
else{
    $name = "Admin";
    $email = "admin@mail.com";
    $pass = "12345";
    $phone = "5435345345";

    $options = [
        'cost' => 12,
    ];
    $password = password_hash($pass,PASSWORD_BCRYPT, $options);

    $sql = $db->con->prepare("INSERT INTO tbl_USER (u_name,u_password,u_phone,u_email,u_role) VALUES (?,?,?,?,?)");
    $sql->bind_param("sssss",$name,$password,$phone,$email,$role);
    $sql->execute();
}

?>

<!DOCTYPE html>
<html>


<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>UpTp99% | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/square/blue.css">


  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <style>
  .login-page {
    background: #1a2226;
}
  </style>
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="login-box-body">
  <div style="text-align:center">
  <img src="dist/img/logo.png" style="margin-top:8%"/>
    <h3><b>Admin Login</b></h3>
    <p class="login-box-msg">Sign in to start your session</p>

    
    </div>
    <form id="Login">
      <div class="form-group has-feedback">
        <input type="email" class="form-control" placeholder="Email" name="email" required>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password" name="password" required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox"> Remember Me
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-12">
          <input type="submit" class="btn btn-primary btn-block btn-flat" value="Sign In" />
        </div>
        <!-- /.col -->
      </div>
    </form>

   
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>-->

<!-- Ajax -->
<script src="dist/ajax.js"></script>
<script src="bower_components/sweet/sweetalert.min.js"></script>

<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
</body>


</html>
