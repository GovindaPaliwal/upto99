<?php 
include_once('Function/DbOperation.php');

$db = new DbOperation;

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
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">

            <?php
              $sql = $db->con->prepare("SELECT count(s_id) as s_id from tbl_stores");
              $sql->bind_result($sid);
              $sql->execute();
              $sql->fetch();
              $sql->close();
            ?>

              <h3><?php echo $sid; ?></h3>

              <p>Store</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="view-store" class="small-box-footer">View Store <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
            <?php
              $sql = $db->con->prepare("SELECT count(c_id) as s_id from tbl_coupens");
              $sql->bind_result($sid);
              $sql->execute();
              $sql->fetch();
              $sql->close();
            ?>

              <h3><?php echo $sid; ?></h3>

              <p>Coupons</p>
            </div>
            <div class="icon">
              <i class="fa fa-tag"></i>
            </div>
            <a href="view-coupon" class="small-box-footer">View Coupons <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
            <?php
              $sql = $db->con->prepare("SELECT count(ct_id) as s_id from tbl_categories");
              $sql->bind_result($sid);
              $sql->execute();
              $sql->fetch();
              $sql->close();
            ?>

              <h3><?php echo $sid; ?></h3>

              <p>Parent Categories</p>
            </div>
            <div class="icon">
              <i class="fa fa-list-alt"></i>
            </div>
            <a href="view-category" class="small-box-footer">Parent Categoriew <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
            <?php
              $sql = $db->con->prepare("SELECT count(sc_id) as s_id from tbl_subcategory");
              $sql->bind_result($sid);
              $sql->execute();
              $sql->fetch();
              $sql->close();
            ?>

              <h3><?php echo $sid; ?></h3>

              <p>Sub Categories</p>
            </div>
            <div class="icon">
              <i class="fa fa-copy"></i>
            </div>
            <a href="view-subcategory" class="small-box-footer">Sub Categories <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>

      
      <div class="row">
      <div class="col-md-12">
      <div class='box box-primary box-solid'>
      <div class="box-header">
      <h3 class="box-title">Get Image Link</h3>
      </div>

      <div class="box-body table-responsive no-padding">
      <table class="table table-hover">
        <thead>
          <tr>
            <th>Select Image</th>
            <th>Select Category</th>
            <th>Action</th>
          </tr>
          </thead>
          <tbody>
          <form id='imageLinkForm'>
            <tr>
              <td><input type='file' class='form-control' name='file' required accept="image/*"/></td>
              <td><select class='form-control select2' name='cat' data-placeholder='Select Image Category' required>
              <option></option>
              <option value='1'>Coupon</option>
              <option value='2'>Store</option>
              <option value='3'>Category</option>
              </select></td>
              <td><input type='submit' class='btn btn-primary btn-md' name='btnSub' value='Get Link' id='linkBtn'/></td>
            </tr>
            </form>
          </tbody>
      </table>
      </div>

      <div class='box-footer'>
      <p>Image Link: <span id='imageLink'></span></p>
      </div>

      </div>
      </div>
      </div>
</div>
      <!-- /.row -->
      <!-- Main row -->
 
    <!-- /.content -->

  <!-- /.content-wrapper -->

  <?php include_once('include/footer.php');?>