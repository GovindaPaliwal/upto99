<?php
include_once("admin/Function/DbOperation.php");
$db = new DbOperation;

if(isset($_POST['search'])){

if(!$_POST['txtsearch'] == ""){

$search = $db->con->real_escape_string($_POST['txtsearch']);

$qry = "SELECT ct_name,ct_id,ct_heading,ct_icons,ct_iconSel,cat_description,cat_sp_content FROM tbl_categories where ct_name Like '%$search%'
UNION
SELECT c_title,c_id,c_type,c_image,c_url,c_code,c_expirydate FROM tbl_coupens WHERE c_title LIKE '%$search%'
UNION 
SELECT s_name,s_id,s_popular,s_image,s_disablelink,s_link,s_country FROM tbl_stores WHERE s_name LIKE '%$search%'";

$sql = $db->con->prepare($qry);
$sql->bind_result($name,$id,$type,$image,$txt1,$txt2,$txt3);
$sql->execute();
$sql->store_result();


}
else{
    echo "<script>window.loaction='index'</script>";
}

}
else{
    echo "<script>window.loaction='index'</script>";
}

?>
<!doctype html>
<html>


<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
<meta charset="utf-8">
<title>Upto99% | Search</title>
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
  border: 2px solid #f7941d ;
  border-style: dashed;
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
<div class="text-center mt-40">
<h1><b>Search Result <?php echo (isset($_POST['txtsearch'])) ? "For <span style='color:green'>".$_POST['txtsearch']."</span>" : ""; ?></b></h1>
</div>

<?php
$i = 0;
if(@$sql->num_rows > 0){
while($sql->fetch()){

if($type == "Coupon" || $type == "Deals"){
?>


<div class="top-offers">

        <?php 
//echo ($i == 1) ? "<h3><b><u>Deals & Coupons</u></b></h3>" : "";       

                $img = "";
                if($image == ""){
                    $img = "admin/uploads/no.png";
                }
                else{
                    $img = "admin/uploads/couponimage/".$image;
                }

        ?>
            <div class="col-md-3 col-sm-4" style="margin-top:10px;">
              <div class="box"> <img src="<?php echo $img; ?>" style="width:100%; height:180px">
                <div class="box-bot">
                  <p><?php echo substr($name,0,25)."..."; ?></p>
                  <h4>Expire: <?php echo $txt3; ?></h4>
                </div>
                <?php
                if($type == "Coupon"){
                ?>
                <a href="javascript:void(0)" class="cop" id="<?php echo rand(10,100).$id.uniqid(); ?>" value="<?php echo $txt1; ?>">Get Code</a>
                <?php
                }
                else{
                ?> 
              <a href="<?php echo $txt1; ?>">Get Deal</a>
                <?php } ?>
              </div> 
            </div>
           
          </div>



<?php
}
else if($type == "1" || $type == "0"){
?>

<div class="top-offers">

        <?php 
//echo ($i == 1) ? "<h3><b><u>Store</u></b></h3>" : "";       

                $img = "";
                if($image == ""){
                    $img = "admin/uploads/no.png";
                }
                else{
                    $img = "admin/uploads/storeImage/".$image;
                }

        ?>
            <div class="col-md-3 col-sm-4" style="margin-top:10px;">
              <div class="box"> <img src="<?php echo $img; ?>" style="width:100%; height:180px; padding:10px">
                <div class="box-bot">
                  <p><?php echo substr($name,0,25)."..."; ?></p>
                </div>
                <a href="store?store=<?php echo rand(10,100).$id.uniqid(); ?>" >Go To Store</a>
                
              </div> <br><br><br>
            </div>
           
          </div>

<?php
}
else{
?>


<div class="top-offers">

        <?php 
//echo ($i == 1) ? "<h3><b><u>Categories</u></b></h3>" : "";       

                $img = "";
                if($image == ""){
                    $img = "admin/uploads/no.png";
                }
                else{
                    $img = "admin/uploads/categoryImage/".$image;
                }

        ?>
            <div class="col-md-3 col-sm-4" style="margin-top:10px;">
              <div class="box"> <img src="<?php echo $img; ?>" style="width:100%; height:180px; padding:10px">
                <div class="box-bot">
                  <p><?php echo substr($name,0,25)."..."; ?></p>
                </div>
                <a href="category-details?category=<?php echo rand(10,100).$id.uniqid(); ?>" >Go To Category</a>
                
              </div> <br><br><br>
            </div>
           
          </div>

<?php
}


$i++;
}
}
else{
    echo '<div class="savings-center section module text-center" style="padding:40px">';
    echo "<center><h2 style='color: red;'><b><u>Sorry No Result Found</u></b></h2></center></div>";
}
?>

</div>

<!-- ========FOOTER START======== -->
<?php 
include_once("inc/footer.php");
?>
<!-- ========FOOTER END======== -->