<?php
include_once("admin/Function/DbOperation.php");
$db = new DbOperation;
$p = "Category";
$sql = $db->con->prepare("SELECT ad1,ad2,mtitle,mkeyword,mdescription FROM tbl_settings WHERE page=?");
$sql->bind_param("s",$p);
$sql->bind_result($ad1,$ad2,$mtitle,$mkeyword,$mdescription);
$sql->execute();
$sql->fetch();


?>
<!doctype html>
<html>


<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
<meta charset="utf-8">
<meta name="google" content="notranslate">
<meta http-equiv="Content-Language" content="en">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title><?php echo $mtitle; ?></title>
<meta name="description" content="<?php echo $mdescription; ?>">
<meta name="keywords" content="<?php echo $mkeyword; ?>">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge" />

<link rel="shortcut icon" href="assets/images/favicon.ico" type="image/x-icon">
<link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
<!-- Style.css-->
<link rel="stylesheet" type="text/css" href="assets/css/style.css" />
<link rel="stylesheet" type="text/css" href="assets/css/responsive.css" /></head>

<body>
<!-- ========HTML HEAD END======== -->

<!-- ========HEADER START======== -->
<?php 
include_once("inc/header.php");

$db = new DbOperation;
?>
<!-- ========HEADER END======== -->

<section class="cover container-fluid">
</section>

<section>
<div class="row text-center">
      <div class="col-md-12">
      <?php
      if($ad1 == ""){
        echo $ad1; 
      }
        ?>
      </div>
    </div>  

<section class="container  ">
        <h1 class="text-center font-900 mb-50  text-uppercase"> <span class="secondary-color"> our</span> <span class="primary-color"> category</span></h1>

    <?php
    $qry = $db->con->prepare("SELECT ct_id,ct_name,ct_iconSel FROM tbl_categories");
    $qry->bind_result($id,$name,$icon);
    $qry->execute();
    $qry->store_result();
    if($qry->num_rows > 0){
        while($qry->fetch()){
            
    ?>
            <div class="col-xs-12 col-md-2">
                <a href="category-details?category=<?php echo rand(10,100).$id.uniqid(); ?>">
                    <div class="row text-center">
                            <i class="icons <?php echo $icon; ?>"> </i>
                    </div>
                    <div class="row text-center">
                            <p class="icontext mt-10" style="font-size:14px; font-weight:600"><?php echo $name; ?></p>
                    </div>
            </a>
            </div>
  <?php 
}
}
else{
    echo "<center><h3><b>No Categories Found</b></h3></center>";
}
?>
                <!--<div class="col-md-12 center-block text-center">
                        <a href="#" class="btn btn-skin mt-30 ">View All</a>
                </div>-->  

</section>
<div class="row text-center">
      <div class="col-md-12">
      <?php
      if($ad2 == ""){
        echo $ad2; 
      }
       ?>
      </div>
    </div><br><Br>
<!-- ========FOOTER START======== -->
<?php 
include_once("inc/footer.php");
?>
<!-- ========FOOTER END======== -->