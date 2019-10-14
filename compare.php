<?php
include_once("admin/Function/ebay.php");
?>
<!doctype html>
<html>


<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
<meta charset="utf-8">
<title>Upto99% | Compare</title>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<!-- <link href="node1.sdccdn.com/dist/shared.chunk.min9233.css?v=2a8d3f63" rel="preload" as="style" onload="this.onload=null;this.rel='stylesheet'"> -->
 <link href="./node1.sdccdn.com/dist/common.bundle.min2489.css" rel="preload" as="style" onload="this.onload=null;this.rel='stylesheet'"> 
<!-- <link href="node1.sdccdn.com/dist/merchant.bundle.minc39e.css?v=2e86ddf8" rel="preload" as="style" onload="this.onload=null;this.rel='stylesheet'"> -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
<link rel="stylesheet" type="text/css" href="assets/css/style.css" />
<link rel="stylesheet" type="text/css" href="assets/css/responsive.css" /></head>
<style>
   
   .card {
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
    max-width: 300px;
    margin: auto;
    text-align: center;
    font-family: arial;
  }
  
  .price {
    color: grey;
    font-size: 22px;
  }
/*   
  .card button {
    border: none;
    outline: 0;
    padding: 12px;
    color: white;
    background-color: #000;
    text-align: center;
    cursor: pointer;
    width: 100%;
    font-size: 18px;
    display:inline-block;
  }
   */
  .card button:hover {
    opacity: 0.7;
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

<section class="cover container-fluid">


</section>


<section class="container  ">
        <h1 class="text-center font-600  mr-30  text-uppercase "> <span class="secondary-color "> Top</span> <span class="primary-color"> Categories</span></h1>
        <section class="best-product ">
            <div class="container">
             
              <div class="row">
                <div class="col-md-12 col-xs-12">
                 
                  
                <?php
                      $top = "1";
                    $sql = $db->con->prepare("SELECT a_name,a_cat_id,a_image FROM tbl_api_cat WHERE a_top=? ORDER BY a_id ASC LIMIT 5");
                    $sql->bind_param("s",$top);
                    $sql->bind_result($a_name,$a_cat,$a_image);
                    $sql->execute();
                    while($sql->fetch()){
                      ?>
                    <div class="<?php echo ($a_name == "Men" || $a_name == "Women") ? 'col-md-6' : 'col-md-4'; ?>">
                      <div class="best-product-box relative" > 
                        <a href="compare-cat?cat=<?php echo $a_name; ?>&category=<?php echo $a_cat; ?>"> <img src="admin/uploads/category/<?php echo $a_image; ?>" alt="" class="img-responsives" style="width:570px; height:300px;"> </a> 
                        <div class="text">
                          <!--<p class="remove-margin text-center">UPTO 70% OFF</p>-->
                          <h4 class="remove-margin text-center"><?php echo $a_name; ?></h4>
                        </div>
                      </div>
                    </div>

                    <?php } ?>
                    
                  
                  <h1 class="font-600 text-center mt-40 text-uppercase" style="margin-top:5%;">
                  <span class="primary-color">BESt</span> <span class="secondary-color">seller</span></h1> 
                  
                  <div class="top-offers">
                    
                    <div class="row mt-15">
                      <?php echo getItem(null,4); ?>
                    </div>
                  </div>



                  <h1 class="font-600 text-center mt-40 text-uppercase"><span class="primary-color">view our</span> <span class="secondary-color">Categories</span></h1>
                  <div class="top-offers">
                      
                  <?php
                    $sql = $db->con->prepare("SELECT a_name,a_cat_id,a_image FROM tbl_api_cat ORDER BY RAND()");
                    $sql->bind_result($a_name,$a_cat,$a_image);
                    $sql->execute();
                    while($sql->fetch()){
                      ?>
                    <div class="col-md-3">
                      <div class="best-product-box relative" > 
                        <a href="compare-cat?cat=<?php echo $a_name; ?>&category=<?php echo $a_cat; ?>"> <img src="admin/uploads/category/<?php echo $a_image; ?>" alt="" class="img-responsives" style="width:570px; height:200px;"> </a> 
                        <div class="text">
                          <!--<p class="remove-margin text-center">UPTO 70% OFF</p>-->
                          <h4 class="remove-margin text-center"><?php echo $a_name; ?></h4>
                        </div>
                      </div>
                    </div>

                    <?php } ?>
                        
                        
                    
                          
                          
                </div>
                <!--<h1 class="font-600 text-center mt-40 text-uppercase"><span class="primary-color">feature</span> <span class="secondary-color">Categories</span></h1> 
                  
                <div class="top-offers">
                  
                  <div class="row mt-15">
                    <div class="col-md-2 col-sm-4 col-lg-2 col-xs-12">
                      <div class="card">
                        <img src="./assets/images/best-product1.jpg" alt="Denim Jeans" style="width:100%">
                        <h4>Tailored Jeans</h4>
                        <p class="price">$19.99</p>
                      
                        <p><button class="btn btn-skin-outline full-width ">Compare price</button></p>
                      </div>
                    </div> 
                    <div class="col-md-2 col-sm-4 col-lg-2 col-xs-12">
                      <div class="card">
                        <img src="./assets/images/best-product8.jpg" alt="Denim Jeans" style="width:100%">
                        <h4>Tailored Jeans</h4>
                        <p class="price">$19.99</p>
                      
                        <p><button  class="btn btn-skin-outline full-width ">Compare price</button></p>
                      </div>
                    </div> 
                    <div class="col-md-2 col-sm-4 col-lg-2 col-xs-12">
                      <div class="card">
                        <img src="./assets/images/best-product5.jpg" alt="Denim Jeans" style="width:100%">
                        <h4>Tailored Jeans</h4>
                        <p class="price">$19.99</p>
                      
                        <p><button class="btn btn-skin-outline full-width">Compare price</button></p>
                      </div>
                    </div> 
                    <div class="col-md-2 col-sm-4 col-lg-2 col-xs-12">
                      <div class="card">
                        <img src="./assets/images/best-product2.jpg" alt="Denim Jeans" style="width:100%">
                        <h4>Tailored Jeans</h4>
                        <p class="price">$19.99</p>
                      
                        <p><button class="btn btn-skin-outline full-width">Compare price</button></p>
                      </div>
                    </div> 

                    <div class="col-md-2 col-sm-4 col-lg-2">
                      <div class="card">
                        <img src="./assets/images/best-product3.jpg" alt="Denim Jeans" style="width:100%">
                        <h4>Tailored Jeans</h4>
                        <p class="price">$19.99</p>
                      
                        <p><button class="btn btn-skin-outline full-width">Compare price</button></p>
                      </div>
                    </div> 

                    <div class="col-md-2 col-sm-4 col-lg-2">
                      <div class="card">
                        <img src="./assets/images/best-product7.jpg" alt="Denim Jeans" style="width:100%">
                        <h4>Tailored Jeans</h4>
                        <p class="price">$19.99</p>
                      
                        <p><button class="btn btn-skin-outline full-width">Compare price</button></p>
                      </div>
                    </div> 
                  </div>
                </div>-->

              </div>
            </div>
          </section>
        

</section>


<!-- ========FOOTER START======== -->
<?php 
include_once("inc/footer.php");
?>
<!-- ========FOOTER END======== -->