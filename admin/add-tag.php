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
        Tags
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Tags</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border" style="background-color: #3c8dbc; color:#ffffff">
          <h3 class="box-title">Add Tag</h3>
          
        </div>
            <form id="addtag">
        <div class="box-body">

        <div style="width:50%; margin:0px auto; margin-top:3%">

        <div class="form-group">
            <label>Tag Name</label>
            <input type="text" class="form-control" required placeholder="Tag Name" name="tagName">
        </div>

        <div class="form-group">
            <label>Tag Default</label>
            <input type="checkbox" style="margin-left:10px" value="1" name="tagDefault">
        </div>

        </div>


        </div>

        <!-- /.box-body -->
        <div class="box-footer text-center">
         <input type="submit" name="btn" class="btn btn-primary"/>
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->
      </form>

    </section>
    <!-- /.content -->
</div>
    <!-- /.content -->

  <!-- /.content-wrapper -->

  <?php include_once('include/footer.php');?>