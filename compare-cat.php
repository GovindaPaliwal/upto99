<?php
include_once("admin/Function/ebay.php");

if(!isset($_GET['cat'])){
    header("Location: index");
}
if(!isset($_GET['category'])){
    header("Location: index");
}
?>
<!doctype html>
<html>


<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
<meta charset="utf-8">
<title>Upto99% | Compare</title>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

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

<div class="jumbotron text-center " style="margin-bottom:0;background-color:#f7941d; color: #6;font-size:22px">
    <h1 class="text-uppercase "> <?php echo @$_GET['cat']; ?></h1>
   
  </div>



  <section class="container ">
     
     <section class="best-product ">
        
          
           <div class="row">
             <div class="col-md-12 col-xs-12">
               
               <div class="top-offers">
                 <?php 

               echo getItem($_GET['category'],70); 
               ?>
                   
               </div>



              
            

           </div>
         </div>
       </section>
     

</section>



<!-- ========FOOTER START======== -->
<?php 
include_once("inc/footer.php");
?>
<!-- ========FOOTER END======== -->