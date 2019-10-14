
<section class="dark-blue">
	<div class="container">
		<div class="col-md-6">
			<div class="subcribe-box">
				<?php
				if(!empty($_SESSION['msg'])){
					echo '<h2 class="font-500">'.$_SESSION["msg"].'</h2>';
				}
				else{
					echo '<h2 class="font-500">JOIN OUR NEWSLETTER</h2>';
				}
				?>
				<h6>Join our newsletter to see all the new products and sale specials.</h6>
			</div>
		</div>
		<form method="post">
		<div class="col-md-4 rp-rv">
			
			  <div class="form-group">
				<input class="form-control input-lg border-radius-0 mt-15" required type="text" name="email" placeholder="Enter your email address">
			  </div>
			
		</div>
		<div class="col-md-2">
			<input type="submit" name="btnSub" class="btn btn-outline orange mt-15" value="SUBMIT NOW">
		</div>
		</form>
	</div>
</section>
<footer class="pb-0">
	<div class="container">
		<div class="row">
		<div class="col-md-4 border-right col-xs-12">
			<div class="logo-footer mb-20">
				<img class="img-responsive" src="assets/images/footer-logo.png" alt=""/>
			</div>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus tincidunt bibendum odio, vel condimentum leo pulvinar et. Nulla a eros scelerisque, volutpat odio et, posuere lectus. Aenean iaculis magna vel lacus interdum.</p>
			
		</div>
		
		<div class="col-md-5 col-sm-7 border-right col-xs-12">
			<h4>QUCIK LINKS</h4>
			<div class="footer-nav">
				<ul>
					<li><i class="fa fa-angle-double-right"></i> <a href="/">Home</a></li>
					<li><i class="fa fa-angle-double-right"></i> <a href="deals">Deals</a></li>
					<li><i class="fa fa-angle-double-right"></i> <a href="allstore">Store</a></li>
					<li><i class="fa fa-angle-double-right"></i> <a href="category">Categories</a></li>
					<li><i class="fa fa-angle-double-right"></i> <a href="compare">Price Compare</a></li>
				</ul>
			</div>
			<div class="footer-nav">
				<ul>
					<li><i class="fa fa-angle-double-right"></i> <a href="login">Login/Register</a></li>
					<li><i class="fa fa-angle-double-right"></i> <a href="blogs">Blog</a></li>
					<li><i class="fa fa-angle-double-right"></i> <a href="site-map">Site Map</a></li>
				</ul>
			</div>
		</div>
		
		<div class="col-md-3 col-sm-5 col-xs-12">
			<h4>Connect With us</h4>
			<div class="social-media">
				<ul>
					<li><a href="#"><i class="fa fa-facebook"></i></a></li>
					<li><a href="#"><i class="fa fa-twitter"></i></a></li>
					<li><a href="#"><i class="fa fa-instagram"></i></a></li>
					<li><a href="#"><i class="fa fa-google"></i></a></li>
				</ul>
			</div>
		</div>
		
		</div>
        
        <section class="pt-30 pb-30 copyright-bg">
		<div class="container">
			<div class="row">
				<div class="col-md-12 text-center">
					<p>All rights Reserved © 2017 <span class="upper-case secondary-color">UPTO99%OFF.COM</span></p>
				</div>
			</div>
		</div>
	</section>
        
	</div>
	
	
</footer>

<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h1 class="modal-title">up to 99</h4>
        </div>
        <div class="modal-body">        
        <div class="container ">
         <div class="row mt-10 ">
            
             <div class="col-md-1  col-xs-12 ">
             </div>          
             <div class="col-md-7 col-xs-12 text-center" >   
			 <?php
				$coupon_id = $_GET['coupon'];
				$coupon_id = substr($coupon_id,2,-13);
				$qry = $db->con->prepare("SELECT c_code,c_title FROM tbl_coupens WHERE c_id=?");
				$qry->bind_param("s",$coupon_id);
				$qry->bind_result($coupon_code,$coupon_title);
				$qry->execute();
				$qry->store_result();
				if($qry->num_rows > 0){
					$qry->fetch();
				?>
                <h3 class=" primary-color flash infinite"><?php echo $coupon_title; ?></h1><br>
                    <div class="input-group">
				
                            <input class="form-control  input-lg animated zoomIn border-radius-0 " style="font-weight:bold; font-size:24px;"  value="<?php echo $coupon_code; ?>" id="myInput" id="inputlg" type="text" >
                            <div class="input-group-btn">
                              <button class="btn btn-skin-outline btn-lg " onclick="myFunction()" >get coupon</button>
							</div>
				<?php } ?>			
             </div>
            </div>
             <div class="col-md-3 col-xs-12">

                </div>

         </div>
         <div class="row mt-10 text-center"  >
            <div class="col-md-1  col-xs-12">
              </div>
            <div class="col-md-7 col-xs-12 text-center" >
                
                    <h3 class=" primary-color ">Newsletter!!!</h1>
           <p class="page-title secondary-color">Subscribe to our weekly Newsletter and stay tuned.</p>
      <form id="subscriber">
                   <div class="input-group">
               <input type="text" class="form-control input-lg" name="email" required placeholder="Enter your Email"/>
      
      <div class="input-group-btn">
        <input type="submit" name="btnSub" class="btn btn-skin-outline" value="Get Connect">
      </div>


      
                    </div>       
                   </form>
           
        
        </div>
        <div class="col-md-2  col-xs-12">
        </div>
    </div>
           <br><br>
                             
                </div>
        
        </div>
        <div class="modal-footer">
          <button type="button primary-color" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

<script src="assets/js/jquery.js"></script> 
<script src="assets/script.js"></script> 
<script src="assets/js/sweet/sweetalert.min.js"></script> 
<script src="assets/js/bootstrap.min.js"></script> 
<script src="assets/js/custom.js"></script> 
<script src="assets/js/jquery.flexslider.js"></script> 
<script src="assets/js/owl.carousel.min.js"></script> 
<script src="assets/js/wow.min.js"></script> 
<script src="assets/js/checkbox.min.js"></script> 
<script src="assets/js/bootsnav.js"></script> 
<script src="assets/js/bootstrap-select.min.js"></script>
<!-- Select2 -->
<script src="admin/bower_components/select2/dist/js/select2.full.min.js"></script>
<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">-->
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>-->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<script src="https://node1.sdccdn.com/dist/shared.chunk.min.js?v=83b36cfa" async crossorigin="anonymous"></script>
<script src="https://node1.sdccdn.com/dist/common.bundle.min.js?v=741c77fa" async crossorigin="anonymous"></script>
 <!--<script src="https://node1.sdccdn.com/dist/merchant.bundle.min.js?v=ea52361" async crossorigin="anonymous"></script>-->
 <script>
 

	<?php 
	if($_GET['coupon']){
	?>

	$('#myModal').modal('toggle');

	<?php } ?>


	$("#subscriber").on('submit', function(e){
	  e.preventDefault();
	  $.ajax({
		  type: 'POST',
		  url: 'admin/Function/Insert.php?form=subscriber',
		  data: new FormData(this),
		  contentType: false,
		  cache: false,
		  processData:false,
		  beforeSend: function(){
			  $('#subscriber').css("opacity",".5");
		  },
		  success: function(msg){
			  $('#subscriber').css("opacity","");
			  var a = JSON.parse(msg);
			  if(a == "0"){
				  swal("Success","Thank You! You're Successfully Subscribe.","success")
			  }
			  else if(a == "1"){
				  swal("Success","Email Exist! You're already subscribe", "success")
			  }
			  else{
				  swal("Error","Error While Subscribtion.","error")
			  }

		  }
	  });
  });



</script>
<script>

		
		//Initialize Select2 Elements
		$('.select2').select2()


            function myFunction() {
              var copyText = document.getElementById("myInput");
              copyText.select();
              document.execCommand("copy");
              
              var tooltip = document.getElementById("myTooltip");
              tooltip.innerHTML = "Copied: " + copyText.value;
            }
            
            function outFunc() {
              var tooltip = document.getElementById("myTooltip");
              tooltip.innerHTML = "Copy to clipboard";
            }
            </script>

<script>

</script>
</body>


</html>
