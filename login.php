<?php
include_once("admin/Function/DbOperation.php");
if(isset($_SESSION['user'])){
  header("Location: index");
}
?>
<!doctype html>
<html>


<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
<meta charset="utf-8">
<title>UPTO 99% OFF | Login</title>
<meta name="description" content="">
<meta name="keywords" content="">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="node1.sdccdn.com/dist/shared.chunk.min9233.css?v=2a8d3f63" rel="preload" as="style" onload="this.onload=null;this.rel='stylesheet'">
<link href="node1.sdccdn.com/dist/common.bundle.min2489.css?v=5ef2b46a" rel="preload" as="style" onload="this.onload=null;this.rel='stylesheet'">
<link href="node1.sdccdn.com/dist/merchant.bundle.minc39e.css?v=2e86ddf8" rel="preload" as="style" onload="this.onload=null;this.rel='stylesheet'">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

<link rel="stylesheet" type="text/css" href="assets/css/style.css" />
<link rel="stylesheet" type="text/css" href="assets/css/responsive.css" /></head>
<style>
     /* a,body,div,em,fieldset,form,h1,h2,h3,html,i,img,li,p,span,ul{margin:0;padding:0;border:0;font-size:100%;font:inherit;vertical-align:baseline}
    
     */

    </style>
<body>
<!-- ========HTML HEAD END======== -->

<!-- ========HEADER START======== -->
<?php 
include_once("inc/header.php");
?>
<!-- ========HEADER END======== -->


<div class="container">

<div class="row text-center mt-30">
<h2><b>Login Or Register</b></h2>
</div>

<div class="row mt-20 mb-50">

<div class="col-md-6">
<div class="panel panel-success">
      <div class="panel-heading">Sign In To Your Account</div>
      <div class="panel-body">
      <form id="loginForm">
        <div class="form-group">
          <label for="">Email</label>
          <input type="email" class="form-control" name="email" required placeholder="Enter Email">
        </div>

        <div class="form-group">
          <label for="">Password</label>
          <input type="password" class="form-control" name="password" required placeholder="********">
        </div>

        <div class="form-group mt-30">
          <input type="submit" class="btn orange" name="btnLogin" value="Login" style="float:right">
        </div>

        </form>
      </div>
    </div>
    </div>

    <div class="col-md-6">
<div class="panel panel-success">
      <div class="panel-heading">Create Your Account</div>
      <div class="panel-body">
      <form id="signupForm">
      <div class="form-group">
          <label for="">Name</label>
          <input type="text" class="form-control" name="name" required placeholder="Enter Name">
        </div>

        <div class="form-group">
          <label for="">Phone</label>
          <input type="number" class="form-control" name="phone" required placeholder="Enter Phone">
        </div>

      <div class="form-group">
          <label for="">Email</label>
          <input type="email" class="form-control" name="email" required placeholder="Enter Email">
        </div>

        <div class="form-group">
          <label for="">Password</label>
          <input type="password" class="form-control" name="password" required placeholder="********">
        </div>

        <div class="form-group mt-30">
          <input type="submit" class="btn orange" name="btnSign" value="SignUp" style="float:right">
        </div>
        </form>
      </div>
    </div>
    </div>


</div>

</div>

<!-- ========FOOTER START======== -->
<?php 
include_once("inc/footer.php");
?>
<!-- ========FOOTER END======== -->