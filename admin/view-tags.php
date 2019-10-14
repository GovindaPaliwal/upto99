<?php 
include_once('Function/DbOperation.php');

if(empty($_SESSION['admin'])){
  header("Location: login");
}

$db = new DbOperation;

unset($_SESSION['msg']);

if(isset($_GET['Delete'])){
    $id = $_GET['Delete'];
    $id = substr($id,2,-13);

    $qry = $db->con->prepare("DELETE FROM tbl_tags WHERE t_id=?");
    $qry->bind_param("s",$id);
    if($qry->execute()){
        header("Loaction: view-tags");
        $_SESSION['msg'] = "Record Delete Successfully";
    }
    else{
        $_SESSION['msg'] = "Error While Deleting Record";
    }
}


if(isset($_POST["btnSub"]))
{
 if($_FILES['csv']['name'])
 {
  $filename = explode(".", $_FILES['csv']['name']);
  if($filename[1] == 'csv')
  {
   $handle = fopen($_FILES['csv']['tmp_name'], "r");
   while($data = fgetcsv($handle))
   {
    $t_name = $data[0];
    $t_is_default = $data[1];
    $user = $_SESSION['admin'];

    $fields = array(
      "t_name" => "?",
      "t_is_default" => "?",
      "t_user" => "?"
  );
  $f = [$t_name,$t_is_default,$user];

    $qry = $db->Record_insert("tbl_tags",$fields,$f);
   }
   fclose($handle);
   $_SESSION['msg'] = "Import Done";
  }
 }
}


include_once('include/header.php');
include_once('include/sidebar.php');

?>

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        View Tags
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
        <li><a href="#"><i class="fa fa-dashboard"></i> View Tags</a></li>
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
              <h3 class="box-title">Tag Details</h3>
              <a href="javscript:void(0)" class="btn btn-success" style="float:right;" id="csvBoxOpen">Upload Csv</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>TagName</th>
                  <th>Default</th>
                  <th>Added By</th>
                  <th>Actions</th>
                </tr>
                </thead>

                <tbody>
                <?php
                $sql = $db->con->prepare("SELECT tbl_tags.t_id,tbl_tags.t_name,tbl_tags.t_is_default,tbl_user.u_name
                 FROM tbl_tags INNER JOIN tbl_user on tbl_tags.t_user = tbl_user.u_id Order By t_id DESC");
                 $sql->bind_result($id,$tag,$default,$name);
                 $sql->execute();
                 while($sql->fetch()){
                ?>
                <tr>
                  <td><?php echo $tag; ?></td>
                  <td><?php echo $default; ?></td>
                  <td><?php echo $name; ?></td>
                  <td>
                      <a href="view-tags?Delete=<?php echo rand(10,100).$id.uniqid(); ?>" style="margin-left:10px;"> <i class="fa fa-trash"></i> </a>
                </td>
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