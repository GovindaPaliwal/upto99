<?php 
include_once('Function/DbOperation.php');

if(empty($_SESSION['admin'])){
  header("Location: login");
}

$db = new DbOperation;

unset($_SESSION['msg']);

include_once('include/header.php');
include_once('include/sidebar.php');

?>

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        View Sub Categories
      </h1>

      <?php
        if(isset($_SESSION['msg'])){
      ?>
      <div style="margin:0px auto;width:40%">

      <div class="alert alert-info alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <?php echo $_SESSION['msg']; ?>
              </div>
    </div>
    <?php } ?>

      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> View Subscribers</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

    
      <!-- Default box -->
      <div class="box" id="csvBox" style="display:none">
        <div class="box-header with-border" style="background-color: #3c8dbc; color:#ffffff">
          <h3 class="box-title">Upload Csv</h3>
          <a href="javscript:void(0)" class="btn btn-danger" style="float:right;" id="csvBoxClose">Close</a>
        </div>
            <form method="POST" enctype="multipart/form-data">
        <div class="box-body">

        <div style="width:50%; margin:0px auto; margin-top:3%">

        <div class="form-group">
            <input type="file" name="csv" class="form-control" required accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" >
        </div>

        <div class="form-group">
        <input type="submit" name="btnSub" class="btn btn-primary" style="float:right"/>
        </div>

        </div>


        </div>

        <!-- /.box-body -->
      </div>
      <!-- /.box -->
      </form>

      <!--- Table Start Here --->

    
    <div class="box">
            <div class="box-header with-border" style="background-color: #3c8dbc; color:#ffffff">
              <h3 class="box-title">Subscriber Details</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example3" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Email</th>
                </tr>
                </thead>

                <tbody>
                <?php
                $sql = $db->con->prepare("SELECT su_email from tbl_subscriber ORDER BY su_id DESC");
                $sql->bind_result($email);
                $sql->execute();
                 while($sql->fetch()){
                ?>
                <tr>
                  <td><?php echo $email; ?></td>
                </tr>

                 <?php } ?>

                </tbody>

              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

    <!--- Table End Here ---->

    </section>
    <!-- /.content -->
</div>
    <!-- /.content -->

  <!-- /.content-wrapper -->

  <?php include_once('include/footer.php');?>