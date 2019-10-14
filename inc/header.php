<?php
$uri_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri_segments = explode('/', $uri_path);
include_once("admin/Function/DbOperation.php");
$db = new DbOperation;
unset($_SESSION['msg']);
if(isset($_POST['btnSub'])){
    $email = $db->con->real_escape_string($_POST['email']);

    $res = $db->Check_record(['su_email','tbl_subscriber'],$email);
    if($res == 1){
        $_SESSION['msg'] = "You're already subscribe";
    }
    else{
    $arr = array(
        "su_email" => "?"
    );
    $r = $db->Record_insert("tbl_subscriber",$arr,[$email]);
    if($r == true){
        $_SESSION['msg'] = "Thank Yoy! You're successfully subscibe";
    }
    }
}
?>
<header>

<section class="top-bar pt-0 pb-0">
	<div class="container">
    	<div class="row">
        	<div class="col-md-2 col-sm-6">
            	<div class="top-bar-social-links">
                	<ul>
                    	<li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-10 col-sm-6">
            	<div class="top-elements">
                	<ul>
                    	<li class="dropdown">
                        <?php echo (isset($_SESSION['user'])) ? '
                            <a class="log" href="javscript:void(0)" style="padding-right:50px;"><i class="fa fa-user" aria-hidden="true"></i> '.$_SESSION['name'].'</a>
                            <a class="log logout" href="javscript:void(0)"><i class="fa fa-sign-out" aria-hidden="true"></i> LogOut </a>'
                            :
                            '<a class="log" href="login" class="dropdown-toggle" ><i class="fa fa-user" aria-hidden="true"></i> Login / Register </a>'; ?>
                    	</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="mid-area pt-30 pb-30">
	<div class="container">
    	<div class="row">
        	<div class="col-md-3 col-sm-4">
            	<a href="index" class="logo"><img src="assets/images/logo.png" class="img-responsive" alt=""></a>
            </div>
            <div class="col-md-2 hidden-xs hidden-sm">
            	<div class="offers">
                	<!--<div class="icon"><i class="fa fa-truck" aria-hidden="true"></i></div>
                    <h4>Free <span>Shipping</span></h4>-->
                </div>
            </div>
            <div class="col-md-2 hidden-xs hidden-sm">
            	<div class="offers">
                	<!--<div class="icon"><i class="fa fa-phone" aria-hidden="true"></i></div>
                    <h4>24/7 <span>SUPPORT</span></h4>-->
                </div>
            </div>

            <form method="post" action="search">
            <div class="col-md-2 search-box" style="float:right">
            <input type="submit" name="search" class="btn btn-skin-outline full-width border-radius-5" value="Search"/>
			</div>

            <div class="col-md-3" style="float:right">
            <div class="form-group">
            <input class="form-control input-lg" type="text" required name="txtsearch" placeholder="Search Item here...">
            </div>
             </div>
        </form>

    </div>
</section>

<section class="navigation pt-0 pb-0">
	<!-- Start Navigation -->
    <nav class="navbar navbar-default bootsnav">
		<div class="container">  

            <!-- Start Header Navigation -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                    <i class="fa fa-bars"></i>
                </button>
            </div>
            <!-- End Header Navigation -->

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="navbar-menu">
                <ul class="nav navbar-nav" data-in="fadeInDown" data-out="fadeOutUp">
                    <li><a href="index">Home</a></li>
                    <li><a href="allstore">Store</a></li>
                    <li><a href="category">Categories</a></li>
                    <li><a href="deals">Deals</a></li>
                    <li><a href="compare">Price Compare</a></li>
                    <li><a href="blogs">Blogs</a></li>
                    <li><a href="site-map">Site Map</a></li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div>   
    </nav>
    <!-- End Navigation -->
</section>

</header>