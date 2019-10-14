<?php 
include_once('Function/DbOperation.php');

if(empty($_SESSION['admin'])){
  header("Location: login");
}

$db = new DbOperation;

unset($_SESSION['msg']);

if(@$_GET['Delete']){

  $Delete = $_GET['Delete'];
  $Delete = substr($Delete,2,-13);

  $sql = $db->con->prepare("SELECT img_link FROM tbl_slider WHERE img_s_id=?");
  $sql->bind_param("s",$Delete);
  $sql->bind_result($img);
  $sql->execute();
  $sql->store_result();
  if($sql->num_rows > 0){
    while($sql->fetch()){
      unlink("uploads/sliderImage/".$img);
    }
  $q = $db->Delete_record(['tbl_slider','img_s_id'],$Delete);
  }
  $sql->close();

  $sql = $db->con->prepare("SELECT s_id,s_image FROM tbl_stores WHERE s_id=?");
  $sql->bind_param("s",$Delete);
  $sql->bind_result($id,$image);
  $sql->execute();
  $sql->store_result();
  if($sql->num_rows > 0){
    if($image != ""){
      unlink("uploads/storeImage/".$image);
    }
  $q = $db->Delete_record(['tbl_stores','s_id'],$Delete);
  if($q == true){
    $_SESSION['msg'] = "Store Deleted Successfully";
  }
  }
  $sql->close();
  

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
    $name = $data[0];
    $popular = $data[1];
    $disable = $data[2];
    $link = $data[3];
    $country = $data[4];
    $cat = $data[5];
    $subcat = $data[6];
    $image = $data[7];
    $imagealt = $data[8];
    $heading = $data[9];
    $desc = $data[10];
    $special = $data[11];
    $mtitle = $data[12];
    $mdes = $data[13];
    $mkeyword = $data[14];
    $status = $data[15];
    $slider = $data[16];
    $cstyle = $data[17];
    $ad1 = $data[18];
    $ad2 = $data[19];
    $c1 = $data[20];
    $c2 = $data[21];
    $user = $_SESSION['admin'];

    $fields = array(
      "s_name" => "?",
      "s_popular" => "?",
      "s_disablelink" => "?",
      "s_link" => "?",
      "s_country" => "?",
      "s_cat" => "?",
      "s_sub_cat" => "?",
      "s_image" => "?",
      "s_image_alt" => "?",
      "s_heading" => "?",
      "s_description" => "?",
      "s_specialcontent" => "?",
      "s_m_title" => "?",
      "s_m_desc" => "?",
      "s_m_keyword" => "?",
      "s_status" => "?",
      "s_slider" => "?",
      "s_cstyle" => "?",
      "ad1" => "?",
      "ad2" => "?",
      "c1" => "?",
      "c2" => "?",
      "s_user" => "?"
  );
  $f = [
    $name,
    $popular,
    $disable,
    $link,
    $country,
    $cat,
    $subcat,
    $image,
    $imagealt,
    $heading,
    $desc,
    $special,
    $mtitle,
    $mdes,
    $mkeyword,
    $status,
    $slider,
    $cstyle,
    $ad1,
    $ad2,
    $c1,
    $c2,
    $user
  ];
  $qry = $db->Record_insert("tbl_stores",$fields,$f);
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
        View Stores
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
        <li><a href="#"><i class="fa fa-dashboard"></i> View Stores</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

<?php
if(isset($_GET['Details'])){
    $Details = $_GET['Details'];
    $Details = substr($Details,2,-13);

    $sql = $db->con->prepare("SELECT * From tbl_stores WHERE s_id = ?");
    $sql->bind_param("s",$Details);
    $sql->bind_result($id,$name,$popular,$disableLink,$storeLink,$country,$cat,$scat,$tags,$img,$alt,$heading,$des,$special,$mtitle,$mdes,$mkeyword,$status,$slide,$style,$ad1,$ad2,$c1,$c2,$user);
    $sql->execute();
    $sql->store_result();
    if(!$sql->num_rows > 0){
        echo "<script>window.location.href='view-store'</script>";
    }
    $sql->fetch();
    $sql->close();

    $q = $db->con->prepare("SELECT so_facebook,so_twitter,so_instagram,so_linkdin,so_pintrest,so_google
    FROM tbl_social WHERE so_store=?");
    $q->bind_param("s",$id);
    $q->bind_result($sfb,$stw,$sin,$sli,$spi,$sgo);
    $q->execute();
    $q->store_result();
    if($q->num_rows > 0){
    $q->fetch();
    }
    $pcat = explode(",",$cat);
    $subcat = explode(",",$scat);
    $tag = explode(",",$tags);
?>

    <!--- Detail Display Start --->

          <!-- Box Comment -->
          <div class="box box-widget">
            <div class="box-header with-border">

            <h3 style="font-size:15px; font-weight:bold">Store Details</h3>

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
                            if(empty($img)){
                              $simg = "uploads/storeImage/no.png";
                            }
                            else{
                              $simg = "uploads/storeImage/".$img;
                            }

?>
                          <img src="<?php echo $simg; ?>" style="width:150px; height:150px" />
                          <h4><b>Store Image</b></h4>
                          </center></td>
                      </tr>
                      <tr>
                        <th>Image ALT</th>
                        <th><?php echo $alt; ?></th>
                      <tr>
                     
                      <tr>
                          <th>Store Name</th>
                          <th><?php echo $name; ?></th>
                      </tr>
                      </thead>
                      <tbody>
                      <tr>
                           <td>Popular Store</td>
                           <td><?php echo ($popular == "1") ? "Popular" : ""; ?></td>
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
                              <td><?php echo $des; ?></td>
                          </tr>
                          <tr>
                              <td>Country</td>
                              <td><?php echo $country; ?></td>
                          </tr>
                          <tr>
                              <td>Parent Categories</td>
                              <td>
                              <?php 
                               if(preg_match("/[a-z]/i", $cat)){
                                echo "<b>".$cat."</b>";
                            }
                            else{
                              //foreach ($pcat as $p) {
                                $q = "SELECT ct_name FROM tbl_categories WHERE ct_id IN (".$cat.")";
                                $qry = $db->con->prepare($q);
                                $qry->bind_result($pname);
                                $qry->execute();
                                while($qry->fetch()){
                                  echo "<b>".$pname.",</b>";
                                }
                              //}
                              $qry->close(); 
                            }
                              ?>
                              </td>
                          </tr>
                          <tr>
                              <td>Sub Categories</td>
                              <td>
                              <?php 
                               if(preg_match("/[a-z]/i", $scat)){
                                echo "<b>".$scat."</b>";
                            }
                            else{
                              foreach ($subcat as $s) {
                                $qry = $db->con->prepare("SELECT sc_name FROM tbl_subcategory WHERE sc_id=?");
                                $qry->bind_param("s",$s);
                                $qry->bind_result($sname);
                                $qry->execute();
                                while($qry->fetch()){
                                  echo "<b>".$sname.",</b>";
                                }
                              } 
                              $qry->close();
                            }
                              ?>
                              </td>
                              </td>
                          </tr>
                          <tr>
                              <td>Tags</td>
                              <td>
                              <?php 
                               if(preg_match("/[a-z]/i", $tags)){
                                echo "<b>".$tags."</b>";
                            }
                            else{
                              foreach ($tag as $t) {
                                $qry = $db->con->prepare("SELECT t_name FROM tbl_tags WHERE t_id=?");
                                $qry->bind_param("s",$t);
                                $qry->bind_result($tag);
                                $qry->execute();
                                while($qry->fetch()){
                                  echo "<b>".$tag.",</b>";
                                }
                              } 
                              $qry->close();
                            }
                              ?>
                              </td>
                              </td>
                          </tr>
                          <tr>
                              <td>Special Content</td>
                              <td><?php echo $special; ?></td>
                          </tr>
                          <tr>
                              <td>Content 1</td>
                              <td><?php echo $c1; ?></td>
                          </tr>
                          <tr>
                              <td>Content 2</td>
                              <td><?php echo $c2; ?></td>
                          </tr>
                          <tr>
                              <td>Store URL</td>
                              <td><a href="<?php echo $storeLink; ?>" target="blank">Store URL</a></td>
                          </tr>
                          <tr>
                              <td>Slider Status</td>
                              <td><?php echo ($slide == "1") ? "Enable" : "Disable"; ?></td>
                          </tr>
                          <tr>
                              <td>Store Disable URL</td>
                              <td><a href="<?php echo $disableLink; ?>" target="blank">Store Disable URL</a></td>
                          </tr>
                          <tr>
                              <td>Meta Title</td>
                              <td><?php echo $mtitle; ?></td>
                          </tr>
                          <tr>
                              <td>Meta Description</td>
                              <td><?php echo $mdes; ?></td>
                          </tr>
                          <tr>
                              <td>Meta Keywords</td>
                              <td><?php echo $mkeyword; ?></td>
                          </tr>
                          <tr>
                              <td>Adsense Code 760px</td>
                              <td><?php echo $ad1; ?></td>
                          </tr>
                          <tr>
                              <td>Adsense Code 360px</td>
                              <td><?php echo $ad2; ?></td>
                          </tr>
                          <tr>
                              <td>Store Status</td>
                              <td>
                              <?php
                                if($status == 1){
                                  echo "Enabled";
                                }
                                else{
                                  echo "Disable";
                                }
                              ?>
                              </td>
                          </tr>
                          <tr>
                          <td><b>Store Social Links</b></td>
                          <td>
                          <?php
                          echo ($sfb != "") ? "<a href='".$sfb."' target='Blank' style='padding-left:10px'><i class='fab fa-facebook-square' style='font-size:24px'></i></a>" : "";
                          echo ($sin != "") ? "<a href='".$sin."' target='Blank' style='padding-left:10px'><i class='fab fa-instagram' style='font-size:24px'></i></a>" : "";
                          echo ($stw != "") ? "<a href='".$stw."' target='Blank' style='padding-left:10px'><i class='fab fa-twitter' style='font-size:24px'></i></a>" : "";
                          echo ($spi != "") ? "<a href='".$spi."' target='Blank' style='padding-left:10px'><i class='fab fa-pinterest' style='font-size:24px'></i></a>" : "";
                          echo ($sgo != "") ? "<a href='".$sgo."' target='Blank' style='padding-left:10px'><i class='fab fa-google-plus' style='font-size:24px'></i></a>" : "";
                          echo ($sli != "") ? "<a href='".$sli."' target='Blank' style='padding-left:10px'><i class='fab fa-linkedin' style='font-size:24px'></i></a>" : "";

                          ?>
                          </td>
                          </tr>

                      </tbody>
              </table>

              <div class="col-md-12">
                <br>
                <center><h4><b>Store Slider Images</b></h4></center>
                <br>
               <?php
               
               $sql = $db->con->prepare("SELECT img_link FROM tbl_slider WHERE img_s_id=?");
               $sql->bind_param("s",$id);
               $sql->bind_result($imgLink);
               $sql->execute();
               $sql->store_result();
               if($sql->num_rows > 0){
               while($sql->fetch()){
               ?>
              <div class="col-md-3">
              <img src="uploads/sliderImage/<?php echo $imgLink; ?>" style="width:180px;height:180px"/>
              </div>

              <?php
               }
              }
              $sql->close();
               ?>
              
              </div>
             
            <!-- /.box-body -->

            <!-- /.box-footer -->
            <div class="box-footer">

                <a href="view-store" class="btn btn-primary" style="float:right" >Back To Stores</a>

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
              <h3 class="box-title">Store Detail</h3>
              <a href="javscript:void(0)" class="btn btn-success" style="float:right;" id="csvBoxOpen">Upload Csv</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Store ID</th>
                  <th>Store Name</th>
                  <th>Store Heading</th>
                  <th>Disable Link</th>
                  <th>Store Link</th>
                  <th>Actions</th>
                </tr>
                </thead>

                <tbody>
                <?php
                $sql = $db->con->prepare("SELECT s_id,s_name,s_heading,s_disablelink,s_link
                 FROM tbl_stores Order By s_id DESC");
                 $sql->bind_result($id,$name,$heading,$disable,$link);
                 $sql->execute();
                 while($sql->fetch()){
                ?>
                <tr>
                  <td><?php echo $id; ?></td>
                  <td><?php echo $name; ?></td>
                  <td><?php echo $heading; ?></td>
                  <td><a href="<?php echo $disable; ?>" target="blank">Disable Link</a></td>
                  <td><a href="<?php echo $link; ?>" target="blank">Store Link</a></td>
                  <td>
                  <a href="view-store?Details=<?php echo rand(10,100).$id.uniqid(); ?>" style="margin-left:10px;"> <i class="fas fa-book"></i></a> <span> | </span>
                  <a href="add-store?Edit=<?php echo rand(10,100).$id.uniqid(); ?>" style="margin-left:10px;"> <i class="fas fa-edit"></i></a> <span> | </span>
                  <a href="view-store?Delete=<?php echo rand(10,100).$id.uniqid(); ?>" style="margin-left:10px;"> <i class="fa fa-trash"></i></a> 
                      
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