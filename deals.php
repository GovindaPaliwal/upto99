<?php
include_once("admin/Function/DbOperation.php");
$db = new DbOperation;

$s = "Enable";
$d = date("Y-m-d");
$qry = "";
$qry .= "SELECT count(*) as total FROM tbl_coupens WHERE c_status=? and schedule_status=? and c_expirydate >= ? ";
if(isset($_GET['filter'])){
  $qry .= "and c_type=?";
  $filter = $_GET['filter'];
}
$query = $db->con->prepare($qry);
if(isset($_GET['filter'])){
  $query->bind_param("ssss",$s,$s,$d,$filter);  
}
else{
$query->bind_param("sss",$s,$s,$d);
}
$query->bind_result($total);
$query->execute();
$query->fetch();
$query->close();

$rec_per_page = 10;
$total_record = $total;
$total_pages = ceil($total_record/$rec_per_page);
$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
$start = $rec_per_page*($page-1);

$p = "Deals";
$sql = $db->con->prepare("SELECT ad1,ad2,mtitle,mkeyword,mdescription FROM tbl_settings WHERE page=?");
$sql->bind_param("s",$p);
$sql->bind_result($ad1,$ad2,$mtitle,$mkeyword,$mdescription);
$sql->execute();
$sql->fetch();


?>
<!DOCTYPE HTML>
<html>

    <head>
        <style>
            #ad_frame{ height:800px; width:100%; }
            body{ margin:0; border: 0; padding: 0; }
        </style>
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
        
       <link rel="stylesheet" type="text/css" href="assets/css/customslider.css"/>
      <!-- <link href="https://node1.sdccdn.com/dist/shared.chunk.min.css?v=2a8d3f63" rel="preload" as="style" onload="this.onload=null;this.rel='stylesheet'">
       <link href="https://node1.sdccdn.com/dist/common.bundle.min.css?v=1be553a5" rel="preload" as="style" onload="this.onload=null;this.rel='stylesheet'"> -->
       <link href="https://node1.sdccdn.com/dist/merchant.bundle.min.css?v=457f7530" rel="preload" as="style" onload="this.onload=null;this.rel='stylesheet'">
        <!-- Style.css-->
        <link rel="stylesheet" type="text/css" href="assets/css/style.css" />
        <link rel="stylesheet" type="text/css" href="assets/css/responsive.css" />
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
 
        <!--<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">-->
            
    </head>
  
    <body>
<!-- ========HTML HEAD END======== -->

<!-- ========HEADER START======== -->
<?php 
include_once("inc/header.php");
?>
<!-- ========HEADER END======== -->


<div class="row  ">
    <div class="col-xs-12" style="padding:20px">
            <h1 class="text-center text-uppercase" style="font-weight:bold"> 
                    promo code and coupons</h1>
    </div>
      
      </div>

        <div class="container-fluid " style="background-color:#f8f8f8">
           <div class="row">
           <?php
                    $s = ["1","1","8"];
                    $query = "SELECT s_id,s_name,s_image FROM tbl_stores where s_status = ? and s_popular = ? Limit ?";
                    $qry = $db->con->prepare($query);
                    $qry->bind_param("sss",...$s);
                    $qry->bind_result($sim_id,$sim_name,$sim_image);
                    $qry->execute();
                    $qry->store_result();
                    if($qry->num_rows > 0){
                        ?>
            <div class="row ">
                <h1 class="text-center font-600 text-uppercase "> <span class="secondary-color"> Featured</span> <span class="primary-color"> Stores</span></h1>
              </div>
              <div class="container">
                    <div class="row">
                            <div class="row">
                                    <div class="col-md-12 col-xs-12">
                                            <div id="Carousel" class="carousel slide">
                                             
                                            <!-- <ol class="carousel-indicators">
                                                <li data-target="#Carousel" data-slide-to="0" class="active"></li>
                                                <li data-target="#Carousel" data-slide-to="1"></li>
                                                <li data-target="#Carousel" data-slide-to="2"></li>
                                            </ol>
                                              -->
                                            <!-- Carousel items -->
                                            <div class="carousel-inner">
                                                
                                            <div class="item active">
                                                <div class="row center-block">
                  <?php
                    while($qry->fetch()){
                        $simg = "";
                        if($sim_image == ""){
                        $simg = "admin/uploads/no.png";
                        }
                        else{
                        $simg = "admin/uploads/storeImage/".$sim_image;
                        } 
                  ?>
                                                  <div class="col-md-3 col-xs-12">
                                                  <a href="store?store=<?php echo rand(10,100).$sim_id.uniqid(); ?>" class="thumbnail" style="width:275px; height:150px;">
                                                  <img src="<?php echo $simg; ?>" alt="Image" style="width:100%; height:150px; max-width:100%; padding:30px;"></a>
                                                  </div>
                    <?php } ?>
                                                </div><!--.row-->
                                            </div><!--.item-->
                                             
                                             
                                            </div><!--.carousel-inner-->
                                                   <!-- <div class="row">
                                                       <dv class="col-md-2 col-lg-2">
                                                            <a class="left " href="#Carousel" data-slide="prev">
                                                                    <span class="glyphicon glyphicon-chevron-left"></span>
                                                                    <span class="sr-only">Previous</span>
                                                                  </a>
                                                                  <a class="right " href="#Carousel" data-slide="next">
                                                                    <span class="glyphicon glyphicon-chevron-right"></span>
                                                                    <span class="sr-only">Next</span>
                                                                  </a>
                                                       </dv>
                                                  
                                                   </div> -->
                                            
                                              <!-- <a data-slide="prev" href="#Carousel" class="left carousel-control">‹</a>
                                              <a data-slide="next" href="#Carousel" class="right carousel-control">›</a> -->
                                            </div><!--.Carousel-->
                                             
                                    </div>
                                </div>
                      </div>
              </div>
              
           </div>
               
           </div>
    
                    <?php } ?>
<section class=" best-products " style="background-color:#ffffff">
        <div class="container" >
        <div class="row text-center">
      <div class="col-md-12">
      <?php
      if($ad2 != ""){
        echo $ad2; 
      }
        ?>
      
      </div>
    </div><br>  
          <div class="row ">
                <div class="col-md-3  col-xs-12">
                
                      
                      <div class="row mr-20">
                        
                           
                                <a href="deals?filter=Coupon" class="btn btn-default btn-sm btn-block">Coupon <i class="fa ml-10 fa-arrow-down" aria-hidden="true"></i></a>
                                <a href="deals?filter=Deal" class="btn btn-default btn-sm btn-block">Deal <i class="fa fa-arrow-down ml-10" aria-hidden="true"></i></a>
                                <a href="deals" class="btn btn-default btn-sm btn-block">All <i class="fa fa-arrow-down ml-10" aria-hidden="true"></i></a>
                           
                          
           
                                          
                      
                      </div>
                 
                  <h3 class="secondary-color text-center">JOIN OUR NEWSLETTER</h3>
                          
                 
                  <h4 class="text-center black-color">Join our newsletter to see all the new products and sale specials. 
                  </h3>
                      <div class="row text-center">
                      <form id="sub">
                            <div class="form-group">
                                    <input class="form-control input-lg border-radius-0 mt-15" required type="text" placeholder="Enter your email address" name="email">
                                  </div>
                                  <input type="submit" class="btn  btn-skin-outline full-width border-radius-5" value="Subscribe"/> 
                                  <div class="col-md-4 text-center  col-sm-3">
                                      
                                    </div>
                                    </form>
                      </div>
                          
                      <?php
                    if(!$ad2 == ""){
                      echo $ad2;
                    }
                    else{
                  ?>
                  <br>
              <img src="assets/images/add2.jpg" style="width:100%;">
                    <?php } ?> 
                
                 
                </div>
                <div class="col-md-1"></div>
            <div class="col-md-8 col-xs-12">
            
                <?php
               /* }
                else{*/
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
                $q = "";
                $q .= "SELECT c_id,c_title,c_url,c_description,c_type,c_expirydate,
                c_code,c_urllink,c_like,c_dis,c_featured
                FROM tbl_coupens WHERE c_status=? and c_expirydate >= ? and schedule_status=? ";
                if(isset($_GET['filter'])){
                    $q .= " and c_type = ? ";
                }
                $q .= " LIMIT ?,?";
                $qry = $db->con->prepare($q);
                if(isset($_GET['filter'])){
                    $t = $_GET['filter'];
                    $qry->bind_param("ssssss",$sta,$date,$sta,$t,$start, $rec_per_page);    
                }
                else{
                $qry->bind_param("sssss",$sta,$date,$sta,$start, $rec_per_page);
            }
                $qry->bind_result($cid,$title,$curl,$cdesc,$ctype,$cexpiry,$ccode,$curllink,$clike,$cdis,$featured);
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
                <?php echo ($featured == "1") ? 
                "<div class='label-top-deal upper rnd-3 f-14'><i class='icon fa fa-star '></i> Featured</div>" : ""; ?>

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
                <div class="btn"><a href="javascript:void(0)" style="color:white;" class="btn-text coup" id="<?php echo rand(10,100).$cid.uniqid(); ?>" value="<?php echo $curllink; ?>">Get Code</a></div>
                </div>
                </div>
                <?php
                }
                else{
                ?>
                <a href="<?php echo $curl; ?>" target="blank" style="width:100%; margin-top:-2%" class="btn orange" title="<?php echo $title; ?>">Get Deal</a>
                <?php
                }
                ?> 
                </div>
                </div>
                
                <div class="footer clearfix" style="border-top:1px solid">
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
              //}
                $a = 1;

                ?>
                

              

                <div class="savings-center section module text-center">

<?php 
if($qry->num_rows > 0){
        ?>
<nav aria-label="">
  <ul class="pagination pagination-lg justify-content-center">
    <li class="page-item ">
      <a  href="deals?page=<?php echo ($a == 0) ? $a++ : $a--; ?>" 
      class="page-link <?php echo ($a == 0) ? 'disabled' : '' ?>" >Previous</a>
    </li>
    <?php
    $i = "";
        for($i=1; $i <=$total_pages; $i++){
                if($i <= 6){ 
     ?>
    <li class="page-item"><a class="page-link" href="deals?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
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
      <a class="page-link" href="deals?page=<?php echo $i-1; ?>">Next</a>
    </li>
  </ul>
</nav>
<?php } ?>


        </div>
      </section>

<!-- ========FOOTER START======== -->
<?php 
include_once("inc/footer.php");
?>
<!-- ========FOOTER END======== -->