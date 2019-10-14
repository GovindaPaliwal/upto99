<?php
include_once("admin/Function/DbOperation.php");
$db = new DbOperation;

?>
<!doctype html>
<html>


<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
<meta charset="utf-8">
<title>Upto99% | Search</title>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
<link rel="stylesheet" type="text/css" href="assets/css/style.css" />
<link rel="stylesheet" type="text/css" href="assets/css/responsive.css" /></head>
<style>
/*    
input[type=text] {
  width: 100%;
  box-sizing: border-box;
  border: 2px solid #f7941d ;
  
  border-radius: 15px;
  font-size: 18px;
  background-color: white;
 
  background-position: 10px 10px; 
  background-repeat: no-repeat;
  padding: 12px 20px 12px 40px;
} */
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
<div class="text-center mt-40">
<h1><b>Blogs </b></h1>
</div>

<div class="col-md-12 mt-30">

<?php 

$sql = $db->con->prepare("SELECT * From tbl_blog");
    $sql->bind_result($id,$title,$image,$content,$user,$date,$ad1,$ad2,$mtitle,$mkeyword,$mdes);
    $sql->execute();
    $sql->store_result();
    if(!$sql->num_rows > 0){
        echo "<script>window.location.href='view-blog'</script>";
    }
    while($sql->fetch()){

?>
<div class="col-md-6">
<a href="blog?blog=<?php echo rand(10,100).$id.uniqid(); ?>">
<div class="panel panel-default">

      <div class="panel-body">
      <img src="admin/uploads/blogfeatured/<?php echo $image; ?>" style="width:100%; height:250px;"/>
      </div>

      <div class="panel-footer">
      <h4><b><?php echo $title; ?></b></h4>
      <!--<div style="font-size:8px;"><?php //echo substr($content,0,170).".....Read More"; ?></div>-->
       <div class="row" style="padding-left:10px; padding-right:10px; margin-bottom:-20px;">
       <p style="float:left; font-size:12px; font-weight:600">Author : Admin</p>
       <p style="float:right; font-size:12px; font-weight:600"><?php echo $date; ?></p>
       </div>
      </div>

    </div>
    </a>
</div>

    <?php } ?>


</div>

</div>

<!-- ========FOOTER START======== -->
<?php 
include_once("inc/footer.php");
?>
<!-- ========FOOTER END======== -->