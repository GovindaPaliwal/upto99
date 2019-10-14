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

    $qry = $db->con->prepare("DELETE FROM tbl_blog WHERE b_id=?");
    $qry->bind_param("s",$id);
    if($qry->execute()){
        header("Loaction: view-blog");
        $_SESSION['msg'] = "Record Delete Successfully";
    }
    else{
        $_SESSION['msg'] = "Error While Deleting Record";
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
        View Blogs
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
        <li><a href="#"><i class="fa fa-dashboard"></i> View Blogs</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

    <?php
if(isset($_GET['Details'])){
    $Details = $_GET['Details'];
    $Details = substr($Details,2,-13);

    $sql = $db->con->prepare("SELECT * From tbl_blog WHERE b_id = ?");
    $sql->bind_param("s",$Details);
    $sql->bind_result($id,$title,$image,$content,$user,$date,$ad1,$ad2,$mtitle,$mkeyword,$mdes);
    $sql->execute();
    $sql->store_result();
    if(!$sql->num_rows > 0){
        echo "<script>window.location.href='view-blog'</script>";
    }
    $sql->fetch(); 
?>

    <!--- Detail Display Start --->

          <!-- Box Comment -->
          <div class="box box-widget">
            <div class="box-header with-border">

            <h3 style="font-size:15px; font-weight:bold">Blog Details</h3>

            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <!-- post text -->

              <table class="table table-striped text-center" style="text-align:center">
                  <thead class="thead-inverse">
                      <tr>
                          <td colspan="2"><center>
                          <img src="<?php echo "uploads/blogfeatured/".$image; ?>" style="width:150px; height:150px;">
                          </center></td>
                      </tr>
                     
                      <tr>
                          <th>Title</th>
                          <th><?php echo $title; ?></th>
                      </tr>
                      </thead>
                      <tbody>
                          <tr>
                              <td>Created On</td>
                              <td><?php echo $date; ?></td>
                          </tr>
                          <tr>
                          <td colspan="2">
                          <?php echo $content; ?>
                          </td>
                          </tr>
                          <tr>
                              <td>Adsense Code (1) 760px</td>
                              <td><?php echo $ad2; ?></td>
                          </tr>
                          <tr>
                              <td>Adsense Code (2) 360px</td>
                              <td><?php echo $ad1; ?></td>
                          </tr>
                          <tr>
                              <td>Meta Title</td>
                              <td><?php echo $mtitle; ?></td>
                          </tr>
                          <tr>
                              <td>Meta Keywords</td>
                              <td><?php echo $mkeyword; ?></td>
                          </tr>
                          <tr>
                              <td>Meta Description</td>
                              <td><?php echo $mdes; ?></td>
                          </tr>
                      </tbody>
              </table>
             
            <!-- /.box-body -->
            
            <!-- /.box-footer -->
            <div class="box-footer">
            
                <a href="view-blog" class="btn btn-primary" style="float:right" >Back To Blogs</a>

            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->

    <!--- Detail Display End --->

<?php }
    else{
 ?>


      <!--- Table Start Here --->

    
    <div class="box">
            <div class="box-header with-border" style="background-color: #3c8dbc; color:#ffffff">
              <h3 class="box-title">Blog Details</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Featured Image</th>
                  <th>Title</th>
                  <th>Created</th>
                  <th>Actions</th>
                </tr>
                </thead>

                <tbody>
                <?php
                $sql = $db->con->prepare("SELECT b_id,b_title,b_image,b_created_on FROM tbl_blog ORDER BY b_id DESC");
                 $sql->bind_result($id,$title,$image,$date);
                 $sql->execute();
                 while($sql->fetch()){
                ?>
                <tr>
                <td><img src="uploads/blogfeatured/<?php echo $image; ?>" style="width:120px; height:90px"/></td>
                  <td><?php echo $title; ?></td>
                  <td><?php echo $date; ?></td>
                  <td>
                  <a href="view-blog?Details=<?php echo rand(10,100).$id.uniqid(); ?>" style="margin-left:10px;"> <i class="fas fa-book"></i> </a> | 
                  <a href="add-blog?Edit=<?php echo rand(10,100).$id.uniqid(); ?>" style="margin-left:10px;"> <i class="fas fa-edit"></i></a> <span> | </span>
                      <a href="view-blog?Delete=<?php echo rand(10,100).$id.uniqid(); ?>" style="margin-left:10px;"> <i class="fa fa-trash"></i> </a>
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
                 <?php } ?>
    </section>
    <!-- /.content -->
</div>
    <!-- /.content -->

  <!-- /.content-wrapper -->

  <?php include_once('include/footer.php');?>