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

    $delete = $db->Delete_record(['tbl_subcategory','sc_id'],$id);
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
    $sc_name = $data[0];
    $sc_ct = $data[1];
    $dis = $data[2];
    $special = $data[3];
    $ad1 = $data[4];
    $ad2 = $data[5];
    $mtitle = $data[6];
    $mkeyword = $data[7];
    $mdis = $data[8];
    $slide = $data[9];
    $style = $data[10];
    $user = $_SESSION['admin'];

    $fields = array(
      "sc_name" => "?",
      "sc_ct_id" => "?",
      "sc_description" => "?",
      "sc_special" => "?",
      "sc_adsense1" => "?",
      "sc_adsense2" => "?",
      "sc_mtitle" => "?",
      "sc_mkeyword" => "?",
      "sc_mdes" => "?",
      "sc_slide" => "?",
      "sc_style" => "?",
      "sc_user" => "?"
  );
  $f = [
    $sc_name,
    $sc_ct,
    $dis,
    $special,
    $ad1,
    $ad2,
    $mtitle,
    $mkeyword,
    $mdis,
    $slide,
    $style,
    $user
  ];

    $qry = $db->Record_insert("tbl_subcategory",$fields,$f);
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
        <li><a href="#"><i class="fa fa-dashboard"></i> View Sub Categories</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

    <?php
if(isset($_GET['Details'])){
    $Details = $_GET['Details'];
    $Details = substr($Details,2,-13);

    $sql = $db->con->prepare("SELECT sc_id,sc_name,sc_description,sc_special,sc_adsense1,sc_adsense2,
    sc_mtitle,sc_mkeyword,sc_mdes,sc_slide,sc_style,ct_name FROM tbl_subcategory
    LEFT JOIN tbl_categories ON tbl_subcategory.sc_ct_id = tbl_categories.ct_id
     WHERE sc_id=?");
    $sql->bind_param("s",$Details);
    $sql->bind_result($sc_id,$sc_name,$sc_des,$sc_special,$sc_ad1,$sc_ad2,$sc_title,$sc_keyword,$sc_desc,$sc_slide,$sc_style,$sc_ct_name);
    $sql->execute();
    $sql->store_result();
    if(!$sql->num_rows > 0){
        echo "<script>window.location.href='view-subcategory'</script>";
    }
    $sql->fetch();
    $sql->close();
    
?>

    <!--- Detail Display Start --->

          <!-- Box Comment -->
          <div class="box box-widget">
            <div class="box-header with-border">

            <h3 style="font-size:15px; font-weight:bold">SubCategory Details</h3>

            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <!-- post text -->

              <table class="table table-striped text-center" style="text-align:center">
                  <thead class="thead-inverse">
                     
                      <tr>
                          <th>Sub Category Name</th>
                          <th><?php echo $sc_name; ?></th>
                      </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>Main Category</td>
                          <td><?php echo $sc_ct_name; ?></td>
                        </tr>
                        <tr>
                          <td>Description</td>
                          <td><?php echo $sc_des; ?></td>
                        </tr>
                        <tr>
                          <td>Special Content</td>
                          <td><?php echo $sc_special; ?></td>
                        </tr>
                        <tr>
                          <td>Adsense Code (1) 360px</td>
                          <td><?php echo $sc_ad1; ?></td>
                        </tr>
                        <tr>
                          <td>Adsense Code (2) 360px</td>
                          <td><?php echo $sc_ad2; ?></td>
                        </tr>
                        <tr>
                          <td>Meta Title</td>
                          <td><?php echo $sc_title; ?></td>
                        </tr>
                        <tr>
                          <td>Meta Keywords</td>
                          <td><?php echo $sc_keyword; ?></td>
                        </tr>
                        <tr>
                          <td>Meta Description</td>
                          <td><?php echo $sc_desc; ?></td>
                        </tr>
                        <tr>
                          <td>Coupon Style</td>
                          <td><?php echo $sc_style; ?></td>
                        </tr>
                        <tr>
                          <td>Slider</td>
                          <td><?php echo ($sc_slide == "1") ? "Enabled" : "Disabled"; ?></td>
                        </tr>
                      

                      </tbody>
              </table>

            <!-- /.box-body -->

            <!-- /.box-footer -->
            <div class="box-footer">

                <a href="view-subcategory" class="btn btn-primary" style="float:right" >Back To SubCategories</a>

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
              <h3 class="box-title">Sub Categories Detail</h3>
              <a href="javscript:void(0)" class="btn btn-success" style="float:right;" id="csvBoxOpen">Upload Csv</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Sub Cat ID</th>
                  <th>Sub Category Name</th>
                  <th>Parent Category</th>
                  <th>Actions</th>
                </tr>
                </thead>

                <tbody>
                <?php
                $sql = $db->con->prepare("SELECT tbl_subcategory.sc_id,tbl_subcategory.sc_name,tbl_subcategory.sc_ct_id,tbl_categories.ct_id,tbl_categories.ct_name From tbl_subcategory
                LEFT JOIN tbl_categories on tbl_subcategory.sc_ct_id = tbl_categories.ct_id ");
                $sql->bind_result($sid,$sname,$idd,$cid,$pname);
                $sql->execute();
                 while($sql->fetch()){
                ?>
                <tr>
                  <td><?php echo $sid;?></td>
                  <td><?php echo $sname; ?></td>
                  <td>
                  <?php
                   if(preg_match("/[a-z]/i", $idd)){
                    echo "<b>".$idd."</b>";
                }
                else{
                  echo $pname;
                 }
                  ?></td>
                  <td>
                  <a href="view-subcategory?Details=<?php echo rand(10,100).$sid.uniqid(); ?>" style="margin-left:10px;"> <i class="fas fa-book"></i></a> | 
                  <a href="view-subcategory?Delete=<?php echo rand(10,100).$sid.uniqid(); ?>" style="margin-left:10px;"> <i class="fa fa-trash"></i> </a> | 
                  <a href="add-subcategory?Edit=<?php echo rand(10,100).$sid.uniqid(); ?>" style="margin-left:10px;"> <i class="fas fa-edit"></i> </a>
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