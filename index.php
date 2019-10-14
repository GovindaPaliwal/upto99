<?php
include_once("admin/Function/ebay.php");
include_once("admin/Function/DbOperation.php");

$db = new DbOperation;
$p = "Home";
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

<!-- Style.css-->
<link rel="stylesheet" type="text/css" href="assets/css/style.css" />
<link rel="stylesheet" type="text/css" href="assets/css/responsive.css" /></head>

<body>
<!-- ========HTML HEAD END======== -->

<!-- ========HEADER START======== -->
<?php 
include_once("inc/header.php");
?>
<!-- ========HEADER END======== -->

<section class="slider pt-0 pb-0"> 
  <!-- =====================FLEX SLIDER===================== -->
  <div class="slider-bg flexslider">
    <ul class="slides center">
      <?php
      $page = "Home-Slider";
      $sql = $db->con->prepare("SELECT ad2,mtitle,mkeyword,mdescription FROM tbl_settings WHERE page=?");
      $sql->bind_param("s",$page);
      $sql->bind_result($ad2,$txt1,$txt2,$txt3);
      $sql->execute();
      $sql->store_result();
      if($sql->num_rows > 0){
        while($sql->fetch()){
      ?>
      <!-- SLIDE 1 -->
      <li> <img src="admin/uploads/homeslider/<?php echo $ad2; ?>" class="img-responsive">
        <div class="slide-text playfair-display white-color wow animated bounceInDown" data-wow-delay="0.2s">
          <p class="remove-margin"><?php echo $txt1; ?></p>
          <h1 class="remove-margin"><?php echo $txt2; ?></h1>
          <p class="text-right"><?php echo $txt3; ?></p>
        </div>
      </li>
      <?php
      }
    }
      ?>
    </ul>
  </div>
  
  <!-- =====================END FLEX SLIDER===================== --> 
</section>

<section class="design-your-room">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="design-room relative">
          <div class="image"><img src="assets/images/design-room-img1.jpg" alt="" class="img-responsive"></div>
          <div class="text-main text-center">
            <h1 class="font-800 white-color remove-margin">PRICE</h1>
            <h2 class="font-600 white-color remove-margin">COMPARE</h2>
            <a href="compare" class="btn btn-outline">view all</a> </div>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="featured-product pt-40 pb-40">
  <div class="container-fluid">
    <div class="owl-carousel featured-slider">

    <?php 

echo homeItem(null,10); 
?>


  </div>
</section>

<section class="best-products pt-70 pb-70">
  <div class="container">
    <div class="row text-center">
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
    <div class="row">
      <div class="col-md-8 mt-30">
        <h1 class="font-600 text-center"><span class="secondary-color">BEST</span> <span class="primary-color">DEALS</span></h1>
        <div class="row">

        <?php
            $qry = $db->con->prepare("SELECT ct_id,ct_name,ct_heading,ct_icons FROM tbl_categories LIMIT 9");
            $qry->bind_result($ct_id,$name,$heading,$image);
            $qry->execute();
            $qry->store_result();
            if($qry->num_rows > 0){
            while($qry->fetch()){
                $img = "";
                if($image == ""){
                    $img = "admin/uploads/no.png";
                }
                else{
                    $img = "admin/uploads/categoryImage/".$image;
                }
        ?>

          <div class="col-md-4 col-sm-4">
            <div class="best-product-box relative"> 
              <a href="category-details?category=<?php echo rand(10,100).$ct_id.uniqid(); ?>">
              <img src="<?php echo $img; ?>" style="width:250px; height:240px;" alt="" class="img-responsive">
              <div class="text">
                <p class="remove-margin"><?php echo $name; ?></p>
                <h4 class="remove-margin"><?php echo $heading; ?></h4>
              </div>
              </a>
            </div>
          </div>
    <?php    
            }
        }
        else{
            echo "<center><p><b>No Categories Found</b></p></center>";
        }
        $qry->close();
?>
        </div>
        <a href="category" class="btn">View All</a>
        
        <h1 class="font-600 text-center mt-40"><span class="primary-color">TOP OFFER</span> <span class="secondary-color">COUPONS</span></h1>
        <div class="top-offers">
          <div class="row">
        <?php 
        $status = "Enable";
        $featured = "1";
        $daa = date("Y-m-d");
        $sql = $db->con->prepare("SELECT c_id,c_title,c_image,c_expirydate,c_type,c_code,c_url,s_image,s_image_alt from tbl_coupens
        LEFT JOIN tbl_stores ON tbl_coupens.c_s_id = tbl_stores.s_id
         WHERE c_status=? and c_expirydate >= ? and c_featured = ? and schedule_status=? ORDER BY RAND() LIMIT 9");
        $sql->bind_param("ssss",$status,$daa,$featured,$status);
        $sql->bind_result($id,$title,$image,$expiry,$c_type,$c_code,$c_url,$simg,$alt);
        $sql->execute();
        $sql->store_result();
        if($sql->num_rows > 0){
            while($sql->fetch()){
                $img = "";
                if($image == ""){
                   $img = "admin/uploads/storeImage/".$simg;
                }
                else{
                    $img = "admin/uploads/couponimage/".$image;
                }
        ?>
            <div class="col-md-4 col-sm-4" style="margin-top:10px;">
              <div class="box"> <img src="<?php echo $img; ?>" <?php echo @$alt; ?> style="width:100%; height:180px; padding:10px">
                <div class="box-bot">
                  <p><?php echo substr($title,0,27)."..."; ?></p>
                  <h4>Expire: <?php echo $expiry; ?></h4>
                </div>
                <?php
                if($c_type == "Coupon"){
                ?>
                <a href="javascript:void(0)" class="cop" id="<?php echo rand(10,100).$id.uniqid(); ?>">Get Code</a>
                <?php
                }
                else{
                ?> 
              <a href="<?php echo $c_url; ?>">Get Deal</a>
                <?php } ?>
              </div>
            </div>
<?php
    }
        }
        else{
            echo "<center><p><b>No Coupons Found</b></p></center>";
        }
        ?>
          </div>
        <!--<a href="#" class="btn">BROWSE ALL COUPONS</a>-->
       </div>
      </div>
      <div class="col-md-4 margin-top"> 
      <!-- ==== adSense 360px Start Here ==== -->
      <?php
      if($ad1 == ""){
        ?>
      <img src="assets/images/add2.jpg" style="width:100%;">
      <?php
      }
      else{
        echo $ad1; 
      }
      ?>
      <!-- ==== adSense 360px End Here ==== -->
      <?php 
        $status = "Enable";
        $fea = "1";
        $sql = $db->con->prepare("SELECT c_id,c_title,c_image,c_description,c_type,c_code,c_url,s_image,s_image_alt from tbl_coupens
        LEFT JOIN tbl_stores ON tbl_coupens.c_s_id = tbl_stores.s_id
        WHERE c_status=? and c_featured=? and schedule_status=? ORDER BY RAND() LIMIT 3");
        $sql->bind_param("sss",$status,$fea,$status);
        $sql->bind_result($id,$title,$image,$expiry,$c_type,$c_code,$c_url,$simg,$alt);
        $sql->execute();
        $sql->store_result();
        if($sql->num_rows > 0){
           ?>

        <div class="heading">
          <h3 class="white-color font-900 text-uppercase remove-margin">FEATURED COUPONS</h3>
        </div>
            <?php
             while($sql->fetch()){
                $img = "";
                if($image == ""){
                    $img = "admin/uploads/storeImage/".$simg;
                }
                else{
                    $img = "admin/uploads/couponimage/".$image;
                }
        ?>
        <div class="row">
          <div class="grey-box" style="width:100%;">
            <div class="col-md-5 col-sm-4"><img src="<?php echo $img; ?>" alt="<?php echo @$alt; ?>" style="width:146px; height:142px;" alt="" class="img-responsive"></div>
            <div class="col-md-7 col-sm-8">
              <h5 class="secondary-color font-600"><?php echo substr($title,0,25)."..."; ?></h5>
              <p><?php echo substr($expiry,0,85)."..."; ?></p>
              <?php
                if($c_type == "Coupon"){
                ?>
                <a href="javascript:void(0)" class="cop" id="<?php echo rand(10,100).$id.uniqid(); ?>" value="<?php echo $c_url; ?>">Get Code</a>
                <?php
                }
                else{
                ?> 
              <a href="<?php echo $c_url; ?>">Get Deal</a>
                <?php } ?>
            </div>
          </div>
        </div>
    <?php
             } } 
        ?>

<?php 
        $status = "1";
        $fea = "1";
        $sql = $db->con->prepare("SELECT s_id,s_name,s_image,s_image_alt from tbl_stores WHERE s_status=? and s_popular=? ORDER BY s_id DESC LIMIT 6");
        $sql->bind_param("ss",$status,$fea);
        $sql->bind_result($id,$title,$image,$alt);
        $sql->execute();
        $sql->store_result();
        if($sql->num_rows > 0){
           ?>

        <div class="heading">
          <h3 class="white-color font-900 text-uppercase remove-margin">POPULAR STORES</h3>
        </div>
        <div class="col-md-12" style="background-color:#ebebeb">
        <?php
             while($sql->fetch()){
                $img = "";
                if($image == ""){
                    $img = "admin/uploads/no.png";
                }
                else{
                    $img = "admin/uploads/storeImage/".$image;
                }
        ?>

              <div class="col-md-6 pt-20 text-center" style="">
              <a href="store?store=<?php echo rand(10,100).$id.uniqid(); ?>">
              <img src="<?php echo $img; ?>" alt="<?php echo @$alt; ?>" style="width:158px; height:140px;"><br>
                <p><?php echo $title; ?></p></a>
              </div>

            
        

        <?php
        } 
    } 
        ?>
        
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php 
        $status = "1";
        $sql = $db->con->prepare("SELECT s_id,s_image,s_image_alt from tbl_stores WHERE s_status=? ORDER BY s_id DESC LIMIT 6");
        $sql->bind_param("s",$status);
        $sql->bind_result($id,$image,$alt);
        $sql->execute();
        $sql->store_result();
        if($sql->num_rows > 0){
           ?>

<section class="client-logos">
  <div class="container-fluid remove-padding">
    <div class="row">
      <div class="col-md-3 bg">
        <h2>STORE </h2>
        <a href="allstore">VIEW ALL STORE</a> </div>
      <div class="col-md-9">
        <div class="owl-carousel client-slider">
        <?php
             while($sql->fetch()){
                $img = "";
                if($image == ""){
                    $img = "admin/uploads/no.png";
                }
                else{
                    $img = "admin/uploads/storeImage/".$image;
                }
        ?>
          <div class="item text-center"><a href="store?store=<?php echo rand(10,100).$id.uniqid(); ?>">
          <img src="<?php echo $img; ?>" alt="<?php echo @$alt; ?>" style="width:174px; height:86px;"></a></div>
    <?php } ?>      
        </div>
      </div>
    </div>
  </div>
</section>
<?php
    
}
?>
<?php 

$sql = $db->con->prepare("SELECT * From tbl_blog LIMIT 6");
    $sql->bind_result($id,$title,$image,$content,$user,$date,$ad1,$ad2,$mtitle,$mkeyword,$mdes);
    $sql->execute();
    $sql->store_result();
    if($sql->num_rows > 0){
    
    
?>
<section class="trending-product pt-40 pb-40">
  <div class="container">
    <div class="row text-center">
      <div class="col-md-12">
        <h1 class="font-600 text-center"><span class="primary-color">READ OUR</span> <span class="secondary-color">BLOG</span></h1>
      </div>
    </div>
  </div>
  <div class="container mt-40">
    <div class="owl-carousel blog-slider">
<?php 
  while($sql->fetch()){   
    ?>

    <a href="blog?blog=<?php echo rand(10,100).$id.uniqid(); ?>">
      <div class="item text-center"> <img src="admin/uploads/blogfeatured/<?php echo $image; ?>" class="img-responsive" style="width:250px; height:200px;">
        <h4 class="font-400 mt-20"><b><?php echo $title; ?></b></h4>
      </div>
      </a>
<?php } ?>

    </div>
  </div>
</section>
    <?php } ?>
<!-- ========FOOTER START======== -->

<?php 
include_once("inc/footer.php");
?>
<!-- ========FOOTER END======== -->