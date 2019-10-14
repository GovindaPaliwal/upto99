<?php
include_once("admin/Function/DbOperation.php");
$db = new DbOperation;

$s_id = $_GET['store'];
$s_id = substr($s_id,2,-13);
$qry = $db->con->prepare("SELECT * FROM tbl_stores WHERE s_id=?");
$qry->bind_param("s",$s_id);
$qry->bind_result($id,$name,$popular,$disable,$link,$country,$cat,$scat,$tags,$image,$alt,$heading,$desc,$special,$mtitle,$mdes,$keyword,$status,$slide,$style,$ad1,$ad2,$c1,$c2,$user);
$qry->execute();
$qry->store_result();
if($qry->num_rows > 0){
   $qry->fetch();
}
else{
   header("Location: index");
}

$s = "Enable";
$query = $db->con->prepare("SELECT count(*) as total FROM tbl_coupens WHERE c_s_id=? and c_status=?");
$query->bind_param("ss",$id,$s);
$query->bind_result($total);
$query->execute();
$query->fetch();

$rec_per_page = 15;
$total_record = $total;
$total_pages = ceil($total_record/$rec_per_page);
$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
$start = $rec_per_page*($page-1);

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
<!-- <link href="node1.sdccdn.com/dist/shared.chunk.min9233.css?v=2a8d3f63" rel="preload" as="style" onload="this.onload=null;this.rel='stylesheet'"> -->
<link href="node1.sdccdn.com/dist/common.bundle.min2489.css?v=5ef2b46a" rel="preload" as="style" onload="this.onload=null;this.rel='stylesheet'">
<link href="node1.sdccdn.com/dist/merchant.bundle.minc39e.css?v=2e86ddf8" rel="preload" as="style" onload="this.onload=null;this.rel='stylesheet'">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
<link rel="stylesheet" type="text/css" href="assets/css/style.css" />
<link rel="stylesheet" type="text/css" href="assets/css/responsive.css" /></head>
<style>
   

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
$img = "";
if($image == ""){
   $img = "admin/uploads/no.png";
}
else{
   $img = "admin/uploads/storeImage/".$image;
}

?>
<!-- ========HEADER END======== -->



<section class="merchant  locale-us" style="background:rgb(245, 245, 245)" >

<?php
if($slide == "1"){
$sql = $db->con->prepare("SELECT img_link from tbl_slider WHERE img_s_id=?");
$sql->bind_param("s",$s_id);
$sql->bind_result($img_link);
$sql->execute();
$sql->store_result();
if($sql->num_rows > 0){
$slide = 0;
?>
<div class="container">
                
                <div id="myCarousel" class="carousel slide hidden-xs" data-ride="carousel">
              
                  <!-- Wrapper for slides -->
                  <div class="carousel-inner">
              <?php
                while($sql->fetch()){
              ?>
                    <div class="item <?php echo ($slide == 1) ? "active" : ""; ?>">
                      <img src="admin/uploads/sliderImage/<?php echo $img_link; ?>" style="width:100%;height:300px;" alt="Los Angeles" style="width:100%;">
                      <div class="carousel-caption">
                        <!--<h3>Los Angeles</h3>
                        <p>LA is always so much fun!</p>-->
                      </div>
                    </div>
              
                <?php $slide++; } ?>
                  </div>
              
                  <!-- Left and right controls -->
                  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                    <span class="sr-only">Previous</span>
                  </a>
                  <a class="right carousel-control" href="#myCarousel" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                    <span class="sr-only">Next</span>
                  </a>
                </div>
              </div>  
<?php } }?>

<div class="row text-center">
      <div class="col-md-12">
      <?php
      if($ad1 != ""){
        echo $ad1; 
      }
        ?>
        
     </div>
    </div>

        <div id="layout">
  
                <div id="wrapper-top" class="clearfix">
                </div>
                <div id="shell" class="layout-right gap">
                <div class="grid-container">
                	

                <div class="column-right">
                <div class="tbl">
                <div class="entity-logo cell v-top"><a href="javascript:void(0)" class="logo featured" ><img style="width:140px; height:120px" src="<?php echo $img; ?>" alt="<?php echo @$alt; ?>"/></a></div>
                <div class="cell">
                <h1 class="page-title secondary-color" style="font-size:40px"><?php echo $name; ?> Coupons &amp; Promo Codes</h1>
                <div class="wrapper-rating">
                <span class=""><h4><b><?php echo $name; ?></b></h4></span>
                </div>
                </div>
                </div>
                </div>

                <div id="column-left" class="sidebar clearfix" style="margin-top:35px;">
                <div id="deal-filter-strip" data-page-type="seo_merchant" data-count="true">
                </div>
                </div>

                <div class="column-right">
                <div id="filter-empty" class="section" style="display: none;"></div>
                <div class="section clearfix list-deals">
                <?php
                if($style == "Grid"){
                ?>
                <div class="top-offers">
                <div class="row">
        <?php 
        $sta = "Enable";
        $date = date("Y-m-d");
        $store = array();
        $sql = $db->con->prepare("SELECT c_id,c_title,c_url,c_description,c_type,c_expirydate,
        c_code,c_urllink,c_like,c_dis,c_image,s_image FROM tbl_coupens 
        LEFT JOIN tbl_stores ON tbl_coupens.c_s_id = tbl_stores.s_id
        WHERE c_status=? and c_s_id=? AND c_expirydate >= ? ORDER BY c_rank ASC LIMIT ?,?");
        $sql->bind_param("sssss",$sta,$id,$date,$start, $rec_per_page);
        $sql->bind_result($cid,$title,$curl,$cdesc,$ctype,$cexpiry,$ccode,$curllink,$clike,$cdis,$image,$simg);
        $sql->execute();
        $sql->store_result();

/*
        $status = "Enable";
        $daa = date("Y-m-d");
        $sql = $db->con->prepare("SELECT c_id,c_title,c_image,c_expirydate,c_type,c_code,c_url from tbl_coupens WHERE c_status=? 
        and c_expirydate >= ? ORDER BY c_rank ASC LIMIT 9");
        $sql->bind_param("ss",$status,$daa);
        $sql->bind_result($id,$title,$image,$expiry,$c_type,$c_code,$c_url);
        $sql->execute();
        $sql->store_result();*/
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
              <div class="box"> <img src="<?php echo $img; ?>" style="width:100%; height:180px">
                <div class="box-bot">
                  <p><?php echo substr($title,0,25)."..."; ?></p>
                  <h4>Expire: <?php echo $cexpiry; ?></h4>
                </div>
                <?php
                if($ctype == "Coupon"){
                ?>
                <a href="javascript:void(0)" class="cop" id="<?php echo rand(10,100).$cid.uniqid(); ?>" value="<?php echo $curllink; ?>">Get Code</a>
                <?php
                }
                else{
                ?> 
              <a href="<?php echo $curl; ?>">Get Deal</a>
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
      </div>

                <?php
                }
                else{
                $arr = array();
                $sql = $db->con->prepare("SELECT * FROM tbl_like WHERE l_user=?");
                $sql->bind_param("s",$_SESSION['user']);
                $sql->bind_result($like_id,$like_like,$like_dis,$like_coupon,$like_user);
                $sql->execute();
                $sql->store_result();
                if($sql->num_rows > 0){
                   while($sql->fetch()){
                        $array = array(
                            "like_id" => $like_id,
                            "like_like" => $like_like,
                            "like_dis" => $like_dis,
                            "like_coupon" => $like_coupon,
                            "like_user" => $like_user
                        );
                        array_push($arr,$array);
                   }
                }
                $sta = "Enable";
                $date = date("Y-m-d");
                $store = array();
                $qry = $db->con->prepare("SELECT c_id,c_title,c_url,c_description,c_type,c_expirydate,
                c_code,c_urllink,c_like,c_dis
                FROM tbl_coupens WHERE c_status=? and c_s_id=? AND c_expirydate >= ? AND schedule_status=? ORDER BY c_rank ASC LIMIT ?,?");
                $qry->bind_param("ssssss",$sta,$id,$date,$status,$start, $rec_per_page);
                $qry->bind_result($cid,$title,$curl,$cdesc,$ctype,$cexpiry,$ccode,$curllink,$clike,$cdis);
                $qry->execute();
                $qry->store_result();
                if($qry->num_rows > 0){
                        //foreach($arr as $r){
                while($qry->fetch()){
                
                $aa = "";//($r['like_user'] == @$_SESSION['user'] && $r['like_like'] > "0" && $cid == $r['like_coupon']) ? "background-color:black" : "";
                $cc = "";//($r['like_user'] == @$_SESSION['user'] && $r['like_dis'] > "0" && $cid == $r['like_coupon']) ? "background-color:black" : "";
                //echo @$_SESSION['user']." - ".$cid." - ";//.$r['like_user']," - ".$r['like_like'];
                ?>

                <div id="d-6389386" class="module-deal clearfix hasCode clearance codePeek hasVoting">
                <div class="primary">
                <div class="inner-padding">
                <div class="votePanel">
                <div class="vote-content clearfix">
                <ul class="vote ">
                
                <li class="vote-up" title="Get more deals like this.">
                
                <span class="op fa-stack like" title="Worked" style="<?php echo $aa; ?>" id="<?php echo "like-".$cid; ?>">
                <i class="icon fa fa-circle fa-stack-2x"></i><i class="icon fa fa-thumbs-up thumb fa-stack-1x "></i>
                </span>
                <span class="count"><?php echo $clike; ?></span>
                </li>

                <li class="vote-down" title="Don't like it? Doesn't work? Let us know.">
                <span class="op fa-stack dis" title="Didn't Work" style="<?php echo $cc; ?>" id="<?php echo "dis-".$lid; ?>">
                <i class="icon fa fa-circle fa-stack-2x"></i><i class="icon fa fa-thumbs-down thumb fa-stack-1x "></i></span>
                <span class="count"><?php echo $cdis; ?></span>
                </li>

                </ul>
                </div>
                </div>
                <div class="content clearfix">
                <div class="label-top-deal upper rnd-3 f-14"><i class="icon fa fa-star "></i> Top Deal</div>

                <h2 class="title-wrap title" title="<?php echo $title; ?>"><b><?php echo $title; ?></b></h2>
                  <br>
                <div class="details">

                <p class="desc">
                <?php echo substr($cdesc,0,200)."....."; ?>
              </p>
              
                </div>
                <div class="action">
                <?php
                if($ctype == "Coupon"){
                ?>
                <div class="wrapper-code-reveal orange">
                <div class="code-border clearfix">
                <button type="button" class="code" value="Code">Get Code</button>
                </div>
                </div>
                <div class="wrapper-button action-button orange" title="<?php echo $title; ?>">
                <div class="peel">
                <div class="btn"><a href="javascript:void(0)" style="color:white;" class="btn-text coup" id="<?php echo rand(10,100).$cid.uniqid(); ?>" ping="?store=<?php echo rand(10,100).$id.uniqid(); ?>"  value="<?php echo $curllink; ?>">Get Code</a></div>
                </div>
                </div>
                <?php
                }
                else{
                ?>
                <a href="<?php echo $curl; ?>" target="blank" style="width:100%;" class="btn orange" title="<?php echo $title; ?>">Get Deal</a>
                <?php
                }
                ?> 
                </div>
                </div>
                
                <div class="footer clearfix">
                <p class="footer-text">
                <span class="usage">
                Expiry Date <em><?php echo $cexpiry; ?></em>
                </span>
                <span class="sep">&mdash;</span>
                <?php
                $now = time(); // or your date as well
                $your_date = strtotime($cexpiry);
                $datediff = $your_date - $now;
                
                $rem = round($datediff / (60 * 60 * 24));
                ?>
                <span class="expire">Expires in <?php echo $rem; ?> days</span>
                </p>
                </div>
                </div> 
                </div> 
                </div>
                <?php
                }
                        //}
                }
                else{   
                        echo '<div class="savings-center section module text-center" style="padding:40px">';
                        echo "<center><h2 style='color: red;'><b><u>No Coupons Found In This Store.</u></b></h2></center></div>";
                }
              }
                $a = 1;

                ?>
                

                </div>

                <div class="savings-center section module text-center">

<?php 
if($qry->num_rows > 0){
        ?>
<nav aria-label="">
  <ul class="pagination pagination-lg justify-content-center">
    <li class="page-item ">
      <a  href="store?store=<?php echo rand(10,100).$s_id.uniqid(); ?>&page=<?php echo ($a == 0) ? $a++ : $a--; ?>" 
      class="page-link <?php echo ($a == 0) ? 'disabled' : '' ?>" >Previous</a>
    </li>
    <?php
    $i = "";
        for($i=1; $i <=$total_pages; $i++){
                if($i <= 6){ 
     ?>
    <li class="page-item"><a class="page-link" href="store?store=<?php echo rand(10,100).$s_id.uniqid(); ?>&page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
    <?php
                }
        else{
        if($i == 7){
                ?>
        <li class="page-item disabled">
      <a class="page-link" href="javascript:void(0)" >...</a>
    </li>
        <?php        
        }
        }
        }
     ?>
    <li class="page-item">
      <a class="page-link" href="store?store=<?php echo rand(10,100).$s_id.uniqid(); ?>&page=<?php echo $i-1; ?>">Next</a>
    </li>
  </ul>
</nav>
<?php } ?>
                </div>

          <?php 
          if($c1 != ""){
            ?>
                <div class="savings-center section module blue">
                <div id="savings-center-top-tips" class="section-inner">
                <div class="markdown">
                <p><?php echo $c1; ?></p></div>
                </div>
                </div>
          <?php } ?>

          <?php
          if($c2 != ""){
            ?>

<div class="savings-center section module ">
                <div id="savings-center-merchant-info" class="section-inner merchant-info">
                <h2 class="section-header">
                <?php echo $name; ?> Info &amp; Tips
                </h2>
                <div class="markdown">
                  <p><?php echo $c2; ?></p>
                </div>
                </div>
                
                </div>


          <?php } ?>

                <?php

                $sta = "Enable";
                $c = 0;
                $qry = $db->con->prepare("SELECT c_id,c_title,c_url,c_description,c_type,c_expirydate,c_code,c_urllink,
                l_id,sum(tbl_like.l_like),sum(tbl_like.l_dis) FROM tbl_coupens 
                LEFT JOIN tbl_like on tbl_coupens.c_id = tbl_like.l_coupon_id
                WHERE c_status=? and c_s_id=? AND c_expirydate <= ? GROUP BY tbl_like.l_coupon_id LIMIT ?,?");
                $qry->bind_param("sssss",$sta,$id,$date,$start, $rec_per_page);
                $qry->bind_result($cid,$title,$curl,$cdesc,$ctype,$cexpiry,$ccode,
                $curllink,$lid,$like,$ldis);
                $qry->execute();
                $qry->store_result();
                if($qry->num_rows > 0){
                        ?>
                 <div class="list-deals expired-deals section">
                <h1 class="section-header secondary-color "style="font-size:40px" >
                Recently Expired <?php echo $name; ?> Coupons
                </h1>
                <?php
                while($qry->fetch()){
                $cyear = date("Y"); $cmonth = date("m"); $cday = date("d");   
                        if($c <= 4){
?>
                <div id="d-6387639" class="module-deal expired revealCode " data-offer-id="10880783">
                        <input type="hidden" name="property-popup-url" value="/popup/detail/coupon-6387639.html"/>
                        <div class="inner-padding clearfix">
                        <div class="action">
                        <div class="wrapper-code-reveal">
                        <div class="code-border clearfix">
                        <input class="code" type="text" value="FLASH" onclick="this.select()" readonly="readonly" aria-label="Coupon Code"/>
                        </div>
                        </div>
                        </div>
                        <div class="content clearfix">
                        <h1 style="font-size:30px"><span class="title"><?php echo $title; ?></span>
                        </h1></div>
                        </div>
                        </div>
<?php
}
        $c++;
        }
        ?>
</div>
<?php        
}
?>
               
                
                        
                  
                <!--</div>-->
                </div>
                <div class="column-left sidebar hasBg shadow clearfix">
                <div class="savings-center section module ">
                <div id="savings-center-online-tips" class="section-inner">
                <h2 class="section-header">
                <?php echo $heading; ?>
                </h2>
                <div class="markdown">
                  <?php echo $special; ?>
                </div>
                
                </div>
                </div>
                
                <?php
                    if(!$ad2 == ""){
                      echo $ad2;
                    }
                    else{
                  ?>
              <img src="assets/images/add2.jpg" style="width:100%; padding:20px;">
                    <?php } ?> 

                <div class="section module related-entity-list top-ten" style="margin-bottom:-15%;">
                        <div class="section-inner">
                        <?php
                        $array = [];
                        $reg = "^[".$cat."]([,.][".$cat."])?$";
                        $s = "1";
                        $query = "SELECT s_id,s_name,s_image FROM tbl_stores where s_cat REGEXP '$reg' and s_status = ?";
                        $qry = $db->con->prepare($query);
                        $qry->bind_param("s",$s);
                        $qry->bind_result($sim_id,$sim_name,$sim_image);
                        $qry->execute();
                        $qry->store_result();
                        if($qry->num_rows > 0){
                        /*while($qry->fetch()){

                                $simg = "";
                                if($sim_image == ""){
                                $simg = "admin/uploads/no.png";
                                }
                                else{
                                $simg = "admin/uploads/storeImage/".$sim_image;
                                }
                        if($sim_name != $name){
                                $arr = array( 
                                "sim_id" => $sim_id,
                                "sim_name" => $sim_name,
                                "sim_img" => $simg
                        ); 
                                array_push($array,$arr);
                        }*/ 
                        
                        //}
                        ?>


                         <h2 class="section-header">
                         Similar Stores
                        </h2>
                        <ul class="type-square clearfix featured-grid ">
                        <?php
                         while($qry->fetch()){
                               
                        $simg = "";
                        if($sim_image == ""){
                        $simg = "admin/uploads/no.png";
                        }
                        else{
                        $simg = "admin/uploads/storeImage/".$sim_image;
                        } 
                           
                        //if($sim_name != $name){           
                        ?>
                        <li>
                        <p>
                        <a href="store?store=<?php echo rand(10,100).$sim_id.uniqid(); ?>" class="logo tbl m-0">
                        <span class="img-wrap cell"><img  class=" lazy" width="100" height="100" src='<?php echo $simg; ?>'/></span>
                        </a>
                        <span class="coupon-count">
                        <?php echo $name; ?>
                        </span>
                        </p>
                        </li>    
                        <?php   //}
                        
                         }
                         ?>
                        
                        </ul>
                        <?php
                }
        ?>              
                        </div>
                        </div>
                <div class="savings-center section module m-b-0">
                <div class="section-inner">
                <h2 class="section-header">
                About <?php echo $name; ?>
                </h2>
                <div id="entity-description">
                <div class="markdown">
                <p><?php echo $desc; ?></p>
                </p>
                </div>
                
                </div>
                </div>
                </div>
                <div class="section module">
                <div class="section-inner">
                <ul class="icon-list">
                <li><a href="<?php echo $disable; ?>" target="_blank" itemprop="url"><i class="icon fa fa-globe "></i> Go to <?php echo $link; ?></a></li>
                
                <li><a href="javascript:void(0)" rel="nofollow noopener" target="_blank"><i class="icon fa fa-flag "></i> Country <b><?php echo $country; ?></b></a></li>
                </ul>
                </div>
                </div>
                <?php
                        $query = "SELECT so_facebook,so_twitter,so_instagram,so_linkdin,so_pintrest,so_google
                        FROM tbl_social WHERE so_store=?";
                        $qry = $db->con->prepare($query);
                        $qry->bind_param("s",$id);
                        $qry->bind_result($sfb,$stw,$sin,$sli,$spi,$sgo);
                        $qry->execute();
                        $qry->store_result();
                        if($qry->num_rows > 0){
                          $qry->fetch()
                        ?>
                 <div class="section module">
                <div class="section-inner">
                <h2 class="section-header">
                Follow <?php echo $name; ?>
                </h2>
                <ul class="icon-list">
                <?php
                echo ($sfb != "") ? "<li class='iblock'><a href='".$sfb."' target='Blank' style='padding-left:10px'><i class='icon fab fa-facebook-square' style='font-size:24px'></i></a></li>" : "";
                echo ($sin != "") ? "<li class='iblock'><a href='".$sin."' target='Blank' style='padding-left:10px'><i class='icon fab fa-instagram' style='font-size:24px'></i></a></li>" : "";
                echo ($stw != "") ? "<li class='iblock'><a href='".$stw."' target='Blank' style='padding-left:10px'><i class='icon fab fa-twitter' style='font-size:24px'></i></a></li>" : "";
                echo ($spi != "") ? "<li class='iblock'><a href='".$spi."' target='Blank' style='padding-left:10px'><i class='icon fab fa-pinterest' style='font-size:24px'></i></a></li>" : "";
                echo ($sgo != "") ? "<li class='iblock'><a href='".$sgo."' target='Blank' style='padding-left:10px'><i class='icon fab fa-google-plus' style='font-size:24px'></i></a></li>" : "";
                echo ($sli != "") ? "<li class='iblock'><a href='".$sli."' target='Blank' style='padding-left:10px'><i class='icon fab fa-linkedin' style='font-size:24px'></i></a></li>" : "";
                ?>
                </ul>
                </div>
                </div>
                        <?php } ?>


                        <div class="section module">
                <div class="section-inner">
                <h2 class="section-header">
                <?php echo $name; ?> Related Categories
                </h2>
                <ul class="pill-list">
                <?php
                $pcat = explode(",",$cat);
                        foreach ($pcat as $p) {
                                $qry = $db->con->prepare("SELECT ct_id,ct_name FROM tbl_categories WHERE ct_id=?");
                                $qry->bind_param("s",$p);
                                $qry->bind_result($ct_id,$pname);
                                $qry->execute();
                                while($qry->fetch()){
                                  echo '<li><a href="category-details?category='.rand(10,100).$ct_id.uniqid().'" class="pill">'.$pname.'</a></li>';
                                }
                              }
                ?>   
                </ul>
                </div>
                </div>   


                </div>

                
                </div>
                </div>
                </div>
        </div>
        
</section>




<!-- ========FOOTER START======== -->
<?php 
include_once("inc/footer.php");
?>
<!-- ========FOOTER END======== -->