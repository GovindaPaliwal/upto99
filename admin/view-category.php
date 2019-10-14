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

    $delete = $db->Delete_record(['tbl_categories','ct_id'],$id);
    if($delete == 1){
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
    $ct_name = $data[0];
    $ct_heading = $data[1];
    $image = $data[2];
    $icon = $data[3];
    $ct_desctiption = $data[4];
    $ct_special = $data[5];
    $ct_mtitle = $data[6];
    $ct_mdesc = $data[7];
    $ct_mkeyword = $data[8];
    $ct_url = $data[9];
    $slide = $data[10];
    $ad1 = $data[11];
    $ad2 = $data[12];
    $cstyle = $data[13];
    $user = $_SESSION['admin'];

    $fields = array(
      "ct_name" => "?",
      "ct_heading" => "?",
      "ct_icons" => "?",
      "ct_iconSel" => "?",
      "cat_description" => "?",
      "cat_sp_content" => "?",
      "cat_m_title" => "?",
      "cat_m_desc" => "?",
      "cat_m_keyword" => "?",
      "cat_url" => "?",
      "ct_slide" => "?",
      "adsense1" => "?",
      "adsense2" => "?",
      "cstyle" => "?",
      "cat_user" => "?"
  );
  $f = [
    $ct_name,
    $ct_heading,
    $image,
    $icon,
    $ct_desctiption,
    $ct_special,
    $ct_mtitle,
    $ct_mdesc,
    $ct_mkeyword,
    $ct_url,
    $slide,
    $ad1,
    $ad2,
    $cstyle,
    $user
  ];

    $qry = $db->Record_insert("tbl_categories",$fields,$f);
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
        View Category
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
        <li><a href="#"><i class="fa fa-dashboard"></i> View Category</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

<?php
if(isset($_GET['Details'])){
    $Details = $_GET['Details'];
    $Details = substr($Details,2,-13);

    $sql = $db->con->prepare("SELECT * From tbl_categories WHERE ct_id = ?");
    $sql->bind_param("s",$Details);
    $sql->bind_result($id,$name,$heading,$icon,$iconSel,$description,$special,$mtitle,$mdesc,$mkeyword,$url,$slide,$ad1,$ad2,$style,$user);
    $sql->execute();
    $sql->store_result();
    if(!$sql->num_rows > 0){
        echo "<script>window.location.href='view-category'</script>";
    }
    $sql->fetch(); 
?>

    <!--- Detail Display Start --->

          <!-- Box Comment -->
          <div class="box box-widget">
            <div class="box-header with-border">

            <h3 style="font-size:15px; font-weight:bold">Category Details</h3>

            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <!-- post text -->

              <table class="table table-striped text-center" style="text-align:center">
                  <thead class="thead-inverse">
                      <tr>
                          <td colspan="2"><center>
                          <?php
                            $simg = "";
                            if($icon == ""){
                              $simg = "uploads/categoryImage/no.png";
                            }
                            else{
                              $simg = "uploads/categoryImage/".$icon;
                            }
?>
                          <img src="<?php echo $simg; ?>" style="width:150px; height:150px;">
                          </center></td>
                      </tr>
                     
                      <tr>
                          <th>Category Name</th>
                          <th><?php echo $name; ?></th>
                      </tr>
                      </thead>
                      <tbody>
                      <tr>
                          <td>Icon</td>
                          <td><i class="<?php echo $iconSel; ?>"></i></td>
                          </tr>
                          <tr>
                              <td>Heading</td>
                              <td><?php echo $heading; ?></td>
                          </tr>
                          <tr>
                              <td>Coupon Style</td>
                              <td><?php echo $style; ?></td>
                          </tr>
                          <tr>
                              <td>Description</td>
                              <td><?php echo $description; ?></td>
                          </tr>
                          <tr>
                              <td>Special Content</td>
                              <td><?php echo $special; ?></td>
                          </tr>
                          <tr>
                              <td>Category URL</td>
                              <td><?php echo $url; ?></td>
                          </tr>
                          <tr>
                              <td>Slider Status</td>
                              <td><?php echo ($slide == "1") ? "Enable" : "Disable"; ?></td>
                          </tr>
                          <tr>
                              <td>Meta Title</td>
                              <td><?php echo $mtitle; ?></td>
                          </tr>
                          <tr>
                              <td>Meta Description</td>
                              <td><?php echo $mdesc; ?></td>
                          </tr>
                          <tr>
                              <td>Meta Keywords</td>
                              <td><?php echo $mkeyword; ?></td>
                          </tr>
                      </tbody>
              </table>

              <div class="col-md-12">
                <br>
                <center><h4><b>Category Slider Images</b></h4></center>
                <br>
               <?php
               $s = 0;
               $sql = $db->con->prepare("SELECT img_link,img_user FROM tbl_slider WHERE img_c_id=?");
               $sql->bind_param("s",$id);
               $sql->bind_result($imgLink,$sta);
               $sql->execute();
               $sql->store_result();
               if($sql->num_rows > 0){
               while($sql->fetch()){
               ?>
              <div class="col-md-2">
              <img src="uploads/sliderImage/<?php echo $imgLink; ?>" style="width:120px;height:120px"/>
              </div>

              <?php
              
               $s++; 
              }
              }
              $sql->close();
               ?>
              
              </div>
             
            <!-- /.box-body -->
            
            <!-- /.box-footer -->
            <div class="box-footer">
            
                <a href="view-category" class="btn btn-primary" style="float:right" >Back To Categories</a>

            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->

    <!--- Detail Display End --->

<?php }
    else{
 ?>


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
              <h3 class="box-title">Categories Detail</h3>
              <a href="javscript:void(0)" class="btn btn-success" style="float:right;" id="csvBoxOpen">Upload Csv</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Category ID</th>
                  <th>Image</th>
                  <th>Name</th>
                  <th>Heading</th>
                  <th>Description</th>
                  <th>Actions</th>
                </tr>
                </thead>

                <tbody>
                <?php
                $sql = $db->con->prepare("SELECT ct_id,ct_name,ct_icons,ct_heading,cat_description
                 FROM tbl_categories Order By ct_id DESC");
                 $sql->bind_result($id,$name,$icon,$heading,$description);
                 $sql->execute();
                 while($sql->fetch()){
                ?>
                <tr>
                  <td><?php echo $id; ?></td>
                  <td>
                  <?php
                            $simg = "";
                            if($icon == ""){
                              $simg = "uploads/categoryImage/no.png";
                            }
                            else{
                              $simg = "uploads/categoryImage/".$icon;
                            }
?>
                  <img src="<?php echo $simg; ?>" style="width:60px; height:60px;">
                  </td>
                  <td><?php echo $name; ?></td>
                  <td><?php echo $heading; ?></td>
                  <td><?php echo $description; ?></td>
                  <td>
                  <a href="view-category?Details=<?php echo rand(10,100).$id.uniqid(); ?>" style="margin-left:10px;"> <i class="fas fa-book"></i></a> <span> | </span>
                  <a href="add-category?Edit=<?php echo rand(10,100).$id.uniqid(); ?>" style="margin-left:10px;"> <i class="fas fa-edit"></i></a> <span> | </span>
                  <a href="view-category?Delete=<?php echo rand(10,100).$id.uniqid(); ?>" style="margin-left:10px;"> <i class="fa fa-trash"></i></a> 
                      
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