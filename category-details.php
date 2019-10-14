<?php
include_once("admin/Function/DbOperation.php");
$db = new DbOperation;

$s_id = $_GET['category'];
$s_id = substr($s_id,2,-13);
$qry = $db->con->prepare("SELECT * FROM tbl_categories WHERE ct_id=?");
$qry->bind_param("s",$s_id);
$qry->bind_result($ct_id,$ct_name,$ct_heading,$ct_icons,$ct_iconSel,$cat_description,$cat_special,
$cat_m_title,$cat_m_desc,$cat_m_keyword,$disable,$slide,$ad1,$ad2,$style,$cat_user);
//$cat_url replace with $disable
$qry->execute();
$qry->store_result();
if($qry->num_rows > 0){
   $qry->fetch();
   
}
else{
   header("Location: index");
}
$qry->close();

$s = "Enable";
$date = date("Y-m-d");
$r = "^(".$ct_id.",)|(,".$ct_id.")|(".$ct_id.")|(,".$ct_id.",)";
$qr = "SELECT count(*) as total FROM tbl_coupens WHERE c_cat_id REGEXP '$r'
and c_status=? and c_expirydate >= ?";
$query = $db->con->prepare($qr);
$query->bind_param("ss",$s,$date);
$query->bind_result($total);
$query->execute();
$query->fetch();

$rec_per_page = 10;
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
<meta name="google" content="notranslate">
<meta http-equiv="Content-Language" content="en">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title><?php echo $cat_m_title; ?></title>
<meta name="description" content="<?php echo $cat_m_desc; ?>">
<meta name="keywords" content="<?php echo $cat_m_keyword; ?>">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge" />

<link rel="shortcut icon" href="assets/images/favicon.ico" type="image/x-icon">
<link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">

<link href="node1.sdccdn.com/dist/shared.chunk.min9233.css?v=2a8d3f63" rel="preload" as="style" onload="this.onload=null;this.rel='stylesheet'">
        <link href="node1.sdccdn.com/dist/common.bundle.min2489.css?v=5ef2b46a" rel="preload" as="style" onload="this.onload=null;this.rel='stylesheet'">
        <link href="node1.sdccdn.com/dist/merchant.bundle.minc39e.css?v=2e86ddf8" rel="preload" as="style" onload="this.onload=null;this.rel='stylesheet'">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
        <link rel="stylesheet" type="text/css" href="assets/css/style.css" />
        <link rel="stylesheet" type="text/css" href="assets/css/responsive.css" /></head>
        <!--<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">-->
<body>
<!-- ========HTML HEAD END======== -->

<!-- ========HEADER START======== -->
<?php 
include_once("inc/header.php");
?>
<!-- ========HEADER END======== -->


<section class="best-products " style="background-color:#f8f8f8">

        <div class="container ">                            
                <div class="col-md-9 col-xs-12 ">
                <?php
                if($slide == "1"){
     $sql = $db->con->prepare("SELECT img_link from tbl_slider WHERE img_c_id=?");
     $sql->bind_param("s",$ct_id);
     $sql->bind_result($img_link);
     $sql->execute();
     $sql->store_result();
     if($sql->num_rows > 0){
     $slide = 0;
?>
                        <div class="row ">
                                <div class="col-xs-12  hidden-xs">
                                    <div id="myCarousel" class="carousel slide" data-ride="carousel">
                                            <!-- Indicators -->
                                            <ol class="carousel-indicators">
                                              <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                                              <li data-target="#myCarousel" data-slide-to="1"></li>
                                              <li data-target="#myCarousel" data-slide-to="2"></li>
                                            </ol>
                                        
                                            <!-- Wrapper for slides -->
                                            <div class="carousel-inner">
                                            <?php
                                while($sql->fetch()){
?>
                                             <div class="item <?php echo ($slide == 1) ? "active" : ""; ?>">
                      <img src="admin/uploads/sliderImage/<?php echo $img_link; ?>" style="width:100%;height:300px;" alt="Los Angeles" >
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
                              </div>
                              <br><br>
                                <?php } }?>

                                <?php
$reg = "^(".$ct_id.",)|(,".$ct_id.")|(".$ct_id.")|(,".$ct_id.",)$";
$s = "1";
$query = "SELECT s_id,s_name,s_image,s_image_alt FROM tbl_stores where s_cat REGEXP '$reg' and s_status = ?";
$qry = $db->con->prepare($query);
$qry->bind_param("s",$s);
$qry->bind_result($sim_id,$sim_name,$sim_image,$alt);
$qry->execute();
$qry->store_result();
if($qry->num_rows > 0){
    ?>
              <div class="row">
                  
                <div class="section module related-entity-list top-ten ">
                        <div class="section-inner">
                        <h1 class="section-header titles secondary-color text-uppercase" style="background: #602d6c;padding:10px;color:#f8f8f8"> 
                        feature store for <?php echo $ct_name; ?>
                        </h1>
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
                        <span class="img-wrap cell"><img  class=" lazy" style="width:100px; height:100px; padding:20px" src='<?php echo $simg; ?>' alt="<?php echo @$alt; ?>"/></span>
                        </a>
                        <span class="coupon-count">
                        <?php echo $sim_name; ?>
                        </span>
                        </p>
                        </li>    
                        <?php  } ?>
                        
                        
                        </ul>
                        
                        </div>
                        </div>
              </div>
                        <?php } ?>
                        <div class="row center-block mt-5">
                                <h1 class="section-header titles secondary-color text-uppercase" style="background: #602d6c;padding:10px;color:#f8f8f8"> 
                                        top deals
                                        </h1>
                <?php
                if($style == "Grid"){
                ?>
                                        <div class="top-offers">
                <div class="row">
        <?php 
        $r = "^(".$ct_id.",)|(,".$ct_id.")|(".$ct_id.")|(,".$ct_id.",)";
        $q = "SELECT c_id,c_title,c_url,c_description,c_type,c_expirydate,
        c_code,c_urllink,c_like,c_dis,c_image,s_image FROM tbl_coupens
        LEFT JOIN tbl_stores ON tbl_coupens.c_s_id = tbl_stores.s_id
        WHERE c_cat_id REGEXP '$r' and c_status=? and c_expirydate >= ? ORDER BY c_rank ASC LIMIT ?,?";
        $sta = "Enable";
        $date = date("Y-m-d");
        $store = array();
        $sql = $db->con->prepare($q);
        $sql->bind_param("ssss",$sta,$date,$start, $rec_per_page);
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
                <a href="javascript:void(0)" class="coup" id="<?php echo rand(10,100).$cid.uniqid(); ?>" value="<?php echo $curllink; ?>">Get Code</a>
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
$r = "^(".$ct_id.",)|(,".$ct_id.")|(".$ct_id.")|(,".$ct_id.",)";
$q = "SELECT c_id,c_title,c_url,c_description,c_type,c_expirydate,
c_code,c_urllink,c_like,c_dis
FROM tbl_coupens WHERE c_cat_id REGEXP '$r' and c_status=? and c_expirydate >= ? and schedule_status=? ORDER BY c_rank ASC LIMIT ?,?";
                $sta = "Enable";
                $date = date("Y-m-d");
                $store = array();
                $qry = $db->con->prepare($q);
                $qry->bind_param("sssss",$sta,$date,$status,$start, $rec_per_page);
                $qry->bind_result($cid,$title,$curl,$cdesc,$ctype,$cexpiry,$ccode,$curllink,$clike,$cdis);
                $qry->execute();
                $qry->store_result();
                if($qry->num_rows > 0){
                        //foreach($arr as $r){
                while($qry->fetch()){
                
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

                <h3 class="title-wrap title" title="<?php echo $title; ?>"><?php echo $title; ?></h3>

                <div class="details">

                <p class="desc">
                <?php echo $cdesc; ?>
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
                <div class="btn"><a href="javascript:void(0)" style="color:white;" class="btn-text coup" id="<?php echo rand(10,100).$cid.uniqid(); ?>" value="<?php echo $curllink; ?>">Get Code</a></div>
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
                        echo "<center><h2 style='color: red;'><b><u>No Coupons Found.</u></b></h2></center></div>";
                }
              }
                $a = 1;

                ?>
                
                
    </div>


    <?php 
if($qry->num_rows > 0){
        ?>
<nav aria-label="">
  <ul class="pagination pagination-lg justify-content-center">
    <li class="page-item ">
      <a  href="category-details?category=<?php echo rand(10,100).$s_id.uniqid(); ?>&page=<?php echo ($a == 0) ? $a++ : $a--; ?>" 
      class="page-link <?php echo ($a == 0) ? 'disabled' : '' ?>" >Previous</a>
    </li>
    <?php
    $i = "";
        for($i=1; $i <=$total_pages; $i++){
                if($i <= 6){ 
     ?>
    <li class="page-item"><a class="page-link" href="category-details?category=<?php echo rand(10,100).$s_id.uniqid(); ?>&page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
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
      <a class="page-link" href="category-details?category=<?php echo rand(10,100).$s_id.uniqid(); ?>&page=<?php echo $i-1; ?>">Next</a>
    </li>
  </ul>
</nav>
<?php } ?>

                </div>
                
            
            <div class="col-md-3 col-xs-12 ">
                    
                            <h1 class="pt-70 secondary-color text-uppercase " style="background: #602d6c;padding:10px;color:#f8f8f8; font-size:18px"> 
                                   Narrow By Category
                                   </h1>
                           
                           
                           
                                   <div class="row">
                        
                       
                                        <ul class="pill-list scroll" data-more-text="See all 43 mb-20"style="margin-left: 10px">
                                        <?php
                                    $qry = $db->con->prepare("SELECT sc_id,sc_name,sc_ct_id FROM tbl_subcategory WHERE sc_ct_id=?");
                                    $qry->bind_param("s",$ct_id);
                                    $qry->bind_result($sc_id,$sc_name,$sc_ct);
                                    $qry->execute();
                                    $qry->store_result();
                                    if($qry->num_rows > 0){
                                    while($qry->fetch()){
                                        ?>
                                                <li><a href="sub-category?sub=<?php echo rand(10,100).$sc_id.uniqid(); ?>" class="pill"><?php echo $sc_name; ?></a></li>
                                    <?php } } ?>
                                                
                                                </ul>
                                
                              </div>
              <div class="heading">
                    <h3 class="white-color font-600 text-uppercase remove-margin" style="font-size:18px;">ab0ut <?php echo $ct_name; ?> coupons</h3>
                  </div>
                  <div class="row">
                    <div class="list-group">
                      <li>
                          <a href="#" class="list-group-item "><?php echo $cat_description; ?></a>
                      </li>
                     
                      
                      
                    </div>
                  </div>
                  <?php
                    if(!$ad1 == ""){
                      echo $ad1;
                    }
                    else{
                  ?>
              <img src="assets/images/add2.jpg" style="width:100%;">
                    <?php } ?>
                <div class="heading">
                        <h3 class="white-color font-900 text-uppercase remove-margin">t0p <?php echo $ct_name; ?> stories</h3>
                      </div>
                      <div class="row">
                        
                       
                          

<ul class="list-group">
<li>
                          <a href="#" class="list-group-item "><?php echo $cat_special; ?></a>
                      </li>
</ul>
                        
                      </div>
                      
             
                      <?php
                    if(!$ad2 == ""){
                      echo $ad2;
                    }
                    else{
                  ?>
              <img src="assets/images/add2.jpg" style="width:100%;">
                    <?php } ?>
                   
            
             
            </div>
          </div>
        </div>
      </section>



<!-- ========FOOTER START======== -->
<?php 
include_once("inc/footer.php");
?>
<!-- ========FOOTER END======== -->