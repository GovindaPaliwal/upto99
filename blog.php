<?php
include_once("admin/Function/DbOperation.php");
$db = new DbOperation;

$blog = $_GET['blog'];
$blog = substr($blog,2,-13);
$sql = $db->con->prepare("SELECT * From tbl_blog WHERE b_id=?");
$sql->bind_param("s",$blog);
    $sql->bind_result($id,$title,$image,$content,$user,$date,$ad1,$ad2,$mtitle,$mkeyword,$mdes);
    $sql->execute();
    $sql->store_result();
    if(!$sql->num_rows > 0){
        echo "<script>window.location.href='index'</script>";
    }
    $sql->fetch();
?>
<!doctype html>
<html>


<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
<meta charset="utf-8">
<title><?php echo $mtitle; ?></title>
<meta name="description" content="<?php echo $mdes; ?>">
<meta name="keywords" content="<?php echo $mkeyword; ?>">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="node1.sdccdn.com/dist/shared.chunk.min9233.css?v=2a8d3f63" rel="preload" as="style" onload="this.onload=null;this.rel='stylesheet'">
<link href="node1.sdccdn.com/dist/common.bundle.min2489.css?v=5ef2b46a" rel="preload" as="style" onload="this.onload=null;this.rel='stylesheet'">
<link href="node1.sdccdn.com/dist/merchant.bundle.minc39e.css?v=2e86ddf8" rel="preload" as="style" onload="this.onload=null;this.rel='stylesheet'">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
<link rel="stylesheet" type="text/css" href="assets/css/style.css" />
<link rel="stylesheet" type="text/css" href="assets/css/responsive.css" /></head>
<style>
   
input[type=text] {
  width: 100%;
  box-sizing: border-box;
  border: 2px solid white ;

  border-radius: 15px;
  font-size: 18px;
  background-color: white;
 
  background-position: 10px 10px; 
  background-repeat: no-repeat;
  padding: 12px 20px 12px 40px;
}
.intro-header {
	color: #f8f8f8;
	text-align: center;
}


.custom-tab-content{
color:#fff;
font-family: 'Open Sans', sans-serif;
}

    </style>
</head>
<body>
<!-- ========HTML HEAD END======== -->

<!-- ========HEADER START======== -->
<?php 
include_once("inc/header.php");
?>
<!-- ========HEADER END======== -->

<div class="container">

<div class="row text-center mt-30">
      <div class="col-md-12">
      <?php
      if($ad1 == ""){
        ?>
      <img src="assets/images/add1.jpg">
      <?php
      }
      else{
        echo $ad1; 
      }
      ?>
      </div>
    </div>
<div class="col-md-12 mt-30">
<div class="panel panel-default">

      <div class="panel-body">
      <img src="admin/uploads/blogfeatured/<?php echo $image; ?>" style="width:100%; height:350px;"/>
      </div>

      <div class="panel-footer">
      <center><h2><b><u><?php echo $title; ?></u></b></h2></center><br>
      <div style="font-size:8px;"><?php echo $content; ?></div><br>
       <div class="row" style="padding-left:10px; padding-right:10px; margin-bottom:-20px;">
       <p style="float:left; font-size:12px; font-weight:600">Author : Admin</p>
       <p style="float:right; font-size:12px; font-weight:600"><?php echo $date; ?></p>
       </div>
       <br>
      </div>

    </div>
</div>




</div>

<!-- ========FOOTER START======== -->
<?php 
include_once("inc/footer.php");
?>
<!-- ========FOOTER END======== -->