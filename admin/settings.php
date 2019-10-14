<?php 
include_once('Function/DbOperation.php');

if(empty($_SESSION['admin'])){
  header("Location: login");
}


include_once('include/header.php');
include_once('include/sidebar.php');

?>

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Settings
      </h1>
      <div style="margin:0px auto;width:40%; display:none" id="al">

      <div class="alert alert-info alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <p id="alertText"></p>
              </div>
    </div>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Settings</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

 <!-- Main content -->
 <section class="content">
      <div class="row">
        <div class="col-md-3">

          <div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Pages</h3>

            </div>
            <div class="box-body no-padding">
              <ul class="nav nav-pills nav-stacked">
                <li class="sel fetch active" id="homeBox"><a href="javscript:void(0)" class="Home"> Home</a></li>
                <li class="sel fetch" id="storeBox"><a href="javscript:void(0)" class="Store"> All Store</a></li>
                <li class="sel fetch" id="categoryBox"><a href="javscript:void(0)" class="Category"> All Categories</a></li>
                <li class="sel fetch" id="dealsBox"><a href="javscript:void(0)" class="Deals"> Deals</a></li>
              </ul>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /. box -->
          
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title pageTitle">Home</h3>

            </div>
            <!-- /.box-header -->
              <div class="table-responsive mailbox-messages">

<!-- ===== Home Box Start ===== -->

                <div class="homeBox b">
      
                <nav class="navbar navbar-inverse" style="border:0px;">
  <div class="container-fluid">
    <ul class="nav navbar-nav">
      <li class="home active"><a href="javascript:void(0)" id="homeAdForm">AdSense</a></li>
      <li class="home fetchMeta" id="Home"><a href="javascript:void(0)" id="homeMetaForm">Meta Tags</a></li>
      <li class="home"><a href="javascript:void(0)" id="homeSliderForm">Slider</a></li>
      <li class="home"><a href="javascript:void(0)" id="homeSliderDetails">Slider Details</a></li>
    </ul>
  </div>
</nav>           

                <div style="width:80%; margin:0px auto; margin-top:3%">

 

        <div class="homeAdForm h">
        <center><h2><b>AdSense</b></h2></center>
        <form class="homead">
        <div class="form-group">
            <label>Adsense Code 760px</label>
            <textarea class="form-control adsense760" placeholder="Adsense Code 760px" name="homead1"></textarea>
        </div>
        <input type="hidden" name="page" value="Home"/>
        <div class="form-group">
        <label>Adsense Code 360px</label>
            <textarea class="form-control adsense360" placeholder="Adsense Code 360px" name="homead2"></textarea>
        </div>

        <div class="form-group">
            <input type="submit" name="btnsub" value="Save Changes" class="btn btn-primary" style="float:right" />
           
        </div>
        </form>
<br><Br>
</div>


<div class="homeMetaForm h" style="display:none">
    <center><h2><b>Meta Tags</b></h2></center>
    <form class="homeMeta">
        <div class="form-group">
            <label>Meta Title</label>
            <input type="text" class="form-control mtitle" required placeholder="Meta Title" name="homemtitle">
        </div>

        <div class="form-group">
            <label>Meta Keywords</label>
            <input type="text" class="form-control mkeyword" required placeholder="Meta Keywords" name="homemkeyword">
        </div>
        <input type="hidden" name="page" value="Home"/>
        <div class="form-group">
        <label>Meta Description</label>
            <textarea class="form-control mdescription" required placeholder="Meta Description" name="homemdescription"></textarea>
        </div>

        <div class="form-group">
            <input type="submit" name="btnsub" value="Save Changes" class="btn btn-primary" style="float:right" />
           
        </div>
        </form>
<br><Br>
</div>

<div class="homeSliderDetails h" style="display:none">
    <center><h2><b>Slider Details</b></h2></center>
    <table class="table table-hover">
      <thead class="thead-inverse">
        <tr>
        <th>Slide</th>
          <th>Image</th>
          <th>Upper Text</th>
          <th>Center Bold Text</th>
          <th>Bottom Text</th>
          <th>Actions</th>
        </tr>
        </thead>
        <tbody id="homeSlide">
        </tbody>
    </table>
<br><Br>
</div>

<div class="homeSliderForm h" style="display:none">
    <form class="homeSlider">

<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <input type="text" class="form-control" id="slide1Upper"  placeholder="Slide 1 Upper Text" name="text1">
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            <input type="text" class="form-control" id="slide1Center"  placeholder="Slide 1 Center Bold Text" name="text2">
        </div>
    </div>
    <input type="hidden" value="slide1" name="slide">
    <div class="col-md-4">
        <div class="form-group">
            <input type="text" class="form-control" id="slide1bottom" placeholder="Slide 1 Bottom Text" name="text3">
        </div>
    </div>

</div>

<div class="row">

<div class="col-md-8">
    <div class="form-group">
            <label>Slide 1 Image</label>
            <input type="file" class="form-control" required name="image" id="slide1Image" accept="image/jpg, image/jpeg">
        </div>
</div>

<div class="col-md-4" style="margin-top:4%">
    <div class="form-group">
        <input type="submit" name="btnsub" value="Save Changes" class="btn btn-success" style="width:100%" />
    </div>
</div>

    </div>


        </form>
    <hr>

    <form class="homeSlider">

<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <input type="text" class="form-control" id="slide2Upper"  placeholder="Slide 2 Upper Text" name="text1">
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            <input type="text" class="form-control" id="slide2Center" placeholder="Slide 2 Center Bold Text" name="text2">
        </div>
    </div>
    <input type="hidden" value="slide2" name="slide">
    <div class="col-md-4">
        <div class="form-group">
            <input type="text" class="form-control" id="slide2bottom" placeholder="Slide 2 Bottom Text" name="text3">
        </div>
    </div>

</div>

<div class="row">

<div class="col-md-8">
    <div class="form-group">
            <label>Slide 2 Image</label>
            <input type="file" class="form-control" required name="image" id="slide2Image" accept="image/jpg, image/jpeg">
        </div>
</div>

<div class="col-md-4" style="margin-top:4%">
    <div class="form-group">
        <input type="submit" name="btnsub" value="Save Changes" class="btn btn-success" style="width:100%" />
    </div>
</div>

    </div>


        </form>
    <hr>

    <form class="homeSlider">

<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <input type="text" class="form-control" id="slide3Upper" placeholder="Slide 3 Upper Text" name="text1">
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            <input type="text" class="form-control" id="slide3Center" placeholder="Slide 3 Center Bold Text" name="text2">
        </div>
    </div>
    <input type="hidden" value="slide3" name="slide">
    <div class="col-md-4">
        <div class="form-group">
            <input type="text" class="form-control" id="slide3bottom" placeholder="Slide 3 Bottom Text" name="text3">
        </div>
    </div>

</div>

<div class="row">

<div class="col-md-8">
    <div class="form-group">
            <label>Slide 3 Image</label>
            <input type="file" class="form-control" id="slide3Image" required name="image" accept="image/jpg, image/jpeg">
        </div>
</div>

<div class="col-md-4" style="margin-top:4%">
    <div class="form-group">
        <input type="submit" name="btnsub" value="Save Changes" class="btn btn-success" style="width:100%" />
    </div>
</div>

    </div>


        </form>
    <hr>
<br><Br>
</div>

        </div> </div>

<!-- ===== Home Box End ===== -->

<!-- ===== All Store Box Start ===== -->

        <div class="storeBox b" style="display:none">
      
      <nav class="navbar navbar-inverse" style="border:0px;">
<div class="container-fluid">
<ul class="nav navbar-nav">
<li class="store active"><a href="javascript:void(0)" id="storeAdForm">AdSense</a></li>
<li class="store fetchMeta" id="Store"><a href="javascript:void(0)" id="storeMetaForm">Meta Tags</a></li>
</ul>
</div>
</nav>           

      <div style="width:80%; margin:0px auto; margin-top:3%">



<div class="storeAdForm s">
<center><h2><b>AdSense</b></h2></center>
<form class="homead">
<div class="form-group">
  <label>Adsense Code 760px</label>
  <textarea class="form-control adsense760" placeholder="Adsense Code 760px" name="homead1"></textarea>
</div>
<input type="hidden" name="page" value="Store"/>
<div class="form-group">
<label>Adsense Code 360px</label>
  <textarea class="form-control adsense360" placeholder="Adsense Code 360px" name="homead2"></textarea>
</div>

<div class="form-group">
  <input type="submit" name="btnsub" value="Save Changes" class="btn btn-primary" style="float:right" />
 
</div>
</form>
<br><Br>
</div>


<div class="storeMetaForm s" style="display:none">
<center><h2><b>Meta Tags</b></h2></center>
<form class="homeMeta">
<div class="form-group">
  <label>Meta Title</label>
  <input type="text" class="form-control mtitle" required placeholder="Meta Title" name="homemtitle">
</div>

<div class="form-group">
  <label>Meta Keywords</label>
  <input type="text" class="form-control mkeyword" required placeholder="Meta Keywords" name="homemkeyword">
</div>
<input type="hidden" name="page" value="Store"/>
<div class="form-group">
<label>Meta Description</label>
  <textarea class="form-control mdescription" placeholder="Meta Description" name="homemdescription"></textarea>
</div>

<div class="form-group">
  <input type="submit" name="btnsub" value="Save Changes" class="btn btn-primary" style="float:right" />
 
</div>
</form>
<br><Br>
</div>

</div></div>
<!-- ===== All Store Box End ===== -->



<!-- ===== All Categories Box Start ===== -->

<div class="categoryBox b" style="display:none">
      
      <nav class="navbar navbar-inverse" style="border:0px;">
<div class="container-fluid">
<ul class="nav navbar-nav">
<li class="category active"><a href="javascript:void(0)" id="categoryAdForm">AdSense</a></li>
<li class="category fetchMeta" id="Category"><a href="javascript:void(0)" id="categoryMetaForm">Meta Tags</a></li>
</ul>
</div>
</nav>           

      <div style="width:80%; margin:0px auto; margin-top:3%">



<div class="categoryAdForm c">
<center><h2><b>AdSense</b></h2></center>
<form class="homead">
<div class="form-group">
  <label>Adsense Code 760px</label>
  <textarea class="form-control adsense760" placeholder="Adsense Code 760px" name="homead1"></textarea>
</div>
<input type="hidden" name="page" value="Category"/>
<div class="form-group">
<label>Adsense Code 360px</label>
  <textarea class="form-control adsense360" placeholder="Adsense Code 360px" name="homead2"></textarea>
</div>

<div class="form-group">
  <input type="submit" name="btnsub" value="Save Changes" class="btn btn-primary" style="float:right" />
 
</div>
</form>
<br><Br>
</div>


<div class="categoryMetaForm c" style="display:none">
<center><h2><b>Meta Tags</b></h2></center>
<form class="homeMeta">
<div class="form-group">
  <label>Meta Title</label>
  <input type="text" class="form-control mtitle" required placeholder="Meta Title" name="homemtitle">
</div>

<div class="form-group">
  <label>Meta Keywords</label>
  <input type="text" class="form-control mkeyword" required placeholder="Meta Keywords" name="homemkeyword">
</div>
<input type="hidden" name="page" value="Category"/>
<div class="form-group">
<label>Meta Description</label>
  <textarea class="form-control mdescription" placeholder="Meta Description" name="homemdescription"></textarea>
</div>

<div class="form-group">
  <input type="submit" name="btnsub" value="Save Changes" class="btn btn-primary" style="float:right" />
 
</div>
</form>
<br><Br>
</div>

</div></div>
<!-- ===== All Categories Box End ===== -->




<!-- ===== Deals Box Start ===== -->

<div class="dealsBox b" style="display:none">
      
      <nav class="navbar navbar-inverse" style="border:0px;">
<div class="container-fluid">
<ul class="nav navbar-nav">
<li class="deal active"><a href="javascript:void(0)" id="dealAdForm">AdSense</a></li>
<li class="deal fetchMeta" id="Deals"><a href="javascript:void(0)" id="dealMetaForm">Meta Tags</a></li>
</ul>
</div>
</nav>           

      <div style="width:80%; margin:0px auto; margin-top:3%">



<div class="dealAdForm d">
<center><h2><b>AdSense</b></h2></center>
<form class="homead">
<div class="form-group">
  <label>Adsense Code 760px</label>
  <textarea class="form-control adsense760" placeholder="Adsense Code 760px" name="homead1"></textarea>
</div>
<input type="hidden" name="page" value="Deals"/>
<div class="form-group">
<label>Adsense Code 360px</label>
  <textarea class="form-control adsense360" placeholder="Adsense Code 360px" name="homead2"></textarea>
</div>

<div class="form-group">
  <input type="submit" name="btnsub" value="Save Changes" class="btn btn-primary" style="float:right" />
 
</div>
</form>
<br><Br>
</div>


<div class="dealMetaForm d" style="display:none">
<center><h2><b>Meta Tags</b></h2></center>
<form class="homeMeta">
<div class="form-group">
  <label>Meta Title</label>
  <input type="text" class="form-control mtitle" required placeholder="Meta Title" name="homemtitle">
</div>
<input type="hidden" name="page" value="Deals"/>
<div class="form-group">
  <label>Meta Keywords</label>
  <input type="text" class="form-control mkeyword" required placeholder="Meta Keywords" name="homemkeyword">
</div>

<div class="form-group">
<label>Meta Description</label>
  <textarea class="form-control mdescription" placeholder="Meta Description" name="homemdescription"></textarea>
</div>

<div class="form-group">
  <input type="submit" name="btnsub" value="Save Changes" class="btn btn-primary" style="float:right" />
 
</div>
</form>
<br><Br>
</div>


<!-- ===== Deals Box End ===== -->




</div>


                </div>

                
                <!-- /.table -->
              </div>
              <!-- /.mail-box-messages -->
            </div>
            <!-- /.box-body -->
            
          </div>
          <!-- /. box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->

  <!-- /.content-wrapper -->

  <?php include_once('include/footer.php');?>