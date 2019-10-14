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

  $sql = $db->con->prepare("SELECT img_link FROM tbl_slider WHERE img_c_id=?");
  $sql->bind_param("s",$Delete);
  $sql->bind_result($img);
  $sql->execute();
  $sql->store_result();
  if($sql->num_rows > 0){
    while($sql->fetch()){
      unlink("uploads/sliderImage/".$img);
    }
  $sql->close();
  $q = $db->Delete_record(['tbl_slider','img_c_id'],$Delete);
  }

  $sql = $db->con->prepare("SELECT c_id,c_image FROM tbl_coupens WHERE c_id=?");
  $sql->bind_param("s",$Delete);
  $sql->bind_result($id,$image);
  $sql->execute();
  $sql->store_result();
  if($sql->num_rows > 0){
    if($image != ""){
      unlink("uploads/couponimage/".$image);
    }
  $sql->close();
  $q = $db->Delete_record(['tbl_coupens','c_id'],$Delete);
  if($q == true){
    $_SESSION['msg'] = "Coupon Deleted Successfully";
  }
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
    $title = $data[0];
    $featured = $data[1];
    $url = $data[2];
    $des = $data[3];
    $type = $data[4];
    $image = $data[5];
    $expiry = $data[6];
    $code = $data[7];
    $rank = $data[8];
    $catrank = $data[9];
    $subrank = $data[10];
    $status = $data[11];
    $special = $data[12];
    $mtitle = $data[13];
    $mkeyword = $data[14];
    $mdes = $data[15];
    $urllink = $data[16];
    $store = $data[17];
    $category = $data[18];
    $subcat = $data[19];
    $scheduledate = $data[20];
    $schedulestatus = $data[21];
    $user = $_SESSION['admin'];
    if($status == "1"){
      $status = "Enable";
    }
    else{
      $status = "Disable";
    }

    $fields = array(
      "c_title" => "?",
      "c_featured" => "?",
      "c_url" => "?",
      "c_description" => "?",
      "c_type" => "?",
      "c_image" => "?",
      "c_expirydate" => "?",
      "c_code" => "?",
      "c_rank" => "?",
      "c_catrank" => "?",
      "c_subrank" => "?",
      "c_status" => "?",
      "c_specialcontent" => "?",
      "c_metatitle" => "?",
      "c_metakeyword" => "?",
      "c_metadescription" => "?",
      "c_urllink" => "?",
      "c_s_id" => "?",
      "c_cat_id" => "?",
      "c_sub_cat_id" => "?",
      "schedule_date" => "?",
      "schedule_status" => "?",
      "c_user" => "?"
  );
  $f = [
    $title,
    $featured,
    $url,
    $des,
    $type,
    $image,
    $expiry,
    $code,
    $rank,
    $catrank,
    $subrank,
    $status,
    $special,
    $mtitle,
    $mkeyword,
    $mdes,
    $urllink,
    $store,
    $category,
    $subcat,
    $scheduledate,
    $schedulestatus,
    $user
  ];

    $qry = $db->Record_insert("tbl_coupens",$fields,$f);
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
        View Coupon
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
        <li><a href="#"><i class="fa fa-dashboard"></i> View Coupon</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

<?php
if(isset($_GET['Details'])){
    $Details = $_GET['Details'];
    $Details = substr($Details,2,-13);

    $sql = $db->con->prepare("SELECT * From tbl_coupens WHERE c_id = ?");
    $sql->bind_param("s",$Details);
    $sql->bind_result($cid,$title,$fea,$curl,$cdesc,$ctype,$ctags,$cimage,$cexpiry,$ccode,$crank,$catrank,$subrank,
    $cstatus,$cspecial,$mtitle,$mkeyword,$mdes,$curllink,$csid,$ccid,$csubid,$clike,$cdis,$sDate,$sStatus,$cuser);
    $sql->execute();
    $sql->store_result();
    if(!$sql->num_rows > 0){
        echo "<script>window.location.href='view-coupon'</script>";
    }
    $sql->fetch(); 
    $tag = explode(",",$ctags);
?>

    <!--- Detail Display Start --->

          <!-- Box Comment -->
          <div class="box box-widget">
            <div class="box-header with-border">

            <h3 style="font-size:15px; font-weight:bold">Coupon Details</h3>

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
                            if(empty($cimage)){
                              $simg = "uploads/storeImage/no.png";
                            }
                            else{
                              $simg = "uploads/couponimage/".$cimage;
                            }

?>
                          <img src="<?php echo $simg; ?>" style="width:150px; height:150px" />
                          <h4><b>Coupon Featured Image</b></h4>
                          </center></td>
                      </tr>
                     
                      <tr>
                          <th>Coupon Title</th>
                          <th><?php echo $title; ?></th>
                      </tr>
                      <tr>
                        <th>Store</th>
                        <th><?php echo $_GET['store']; ?></th>
                      </tr>
                      <tr>
                          <th>Featured</th>
                          <th><?php echo ($fea == "1") ? "Featured" : "Not Featured"; ?></th>
                      </tr>
                      </thead>
                      <tbody>
                          <tr>
                              <td>Coupon Type</td>
                              <td><?php echo $ctype; ?></td>
                          </tr>
                          <?php 
                            if($ctype == "Coupon"){
                          ?>
                          <tr>
                              <td>Coupon Code</td>
                              <td><?php echo $ccode; ?></td>
                          </tr>
                            <?php } ?>

                        <tr>
                        <td>Expiry Date</td>
                        <td><?php echo $cexpiry; ?></td>
                        </tr>

                        <tr>
                        <td>Schedule Date</td>
                        <td><?php echo $sDate; ?></td>
                        </tr>

                        <tr>
                        <td>Schedule Status</td>
                        <td><?php echo $sStatus; ?></td>
                        </tr>

                        <tr>
                        <td>Store Rank</td>
                        <td><?php echo $crank; ?></td>
                        </tr>

                        <tr>
                        <td>Category Rank</td>
                        <td><?php echo $catrank; ?></td>
                        </tr>

                        <tr>
                        <td>SubCategory Rank</td>
                        <td><?php echo $subrank; ?></td>
                        </tr>

                          <tr>
                              <td>Category</td>
                              <td><ul style='list-style-type: none;'>
                              <?php 
                              if(preg_match("/[a-z]/i", $ccid)){
                                echo "<b>".$ccid."</b>";
                            }
                            else{
                              $q = "SELECT ct_name FROM tbl_categories WHERE ct_id IN (".$ccid.")";
                                $qry = $db->con->prepare($q);
                                //$qry->bind_param("s",$ccid);
                                $qry->bind_result($pname);
                                $qry->execute();
                                while($qry->fetch()){
                                
                                  echo "<li><b>".$pname.",</b></li>";
                                }
                                $qry->close();
                                }
                              ?>
                              </ul>
                              </td>
                          </tr>

                          <tr>
                              <td>Sub Category</td>
                              <td><ul style='list-style-type: none;'>
                              <?php 
                              if(preg_match("/[a-z]/i", $ccid)){
                                echo "<b>".$ccid."</b>";
                            }
                            else{
                              $q = "SELECT sc_name FROM tbl_subcategory WHERE sc_id IN (".$csubid.")";
                                $qry = $db->con->prepare($q);
                                //$qry->bind_param("s",$ccid);
                                $qry->bind_result($pname);
                                $qry->execute();
                                while($qry->fetch()){
                                
                                  echo "<li><b>".$pname.",</b></li>";
                                }
                                $qry->close();
                                }
                              ?>
                              </ul>
                              </td>
                          </tr>
                          <tr>
                              <td>Tags</td>
                              <td>
                              <?php 
                                if(preg_match("/[a-z]/i", $ctags)){
                                  echo "<b>".$ctags."</b>";
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
                            }
                              ?>
                              </td>
                              </td>
                          </tr>
                          <tr>
                              <td>Special Content</td>
                              <td><?php echo $cspecial; ?></td>
                          </tr>
                          <tr>
                              <td>URL</td>
                              <td><a href="<?php echo $curl; ?>" target="blank">URL</a></td>
                          </tr>
                          <tr>
                              <td>Coupon Link</td>
                              <td><a href="<?php echo $curllink; ?>" target="blank">Coupon Link</a></td>
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
                              <td>Coupon Status</td>
                              <td>
                              <?php
                                if($cstatus == "Enable"){
                                  echo "Enable";
                                }
                                else{
                                  echo "Disable";
                                }
                              ?>
                              </td>
                          </tr>
                      </tbody>
              </table>

            <!-- /.box-body -->

            <!-- /.box-footer -->
            <div class="box-footer">
<br>
                <a href="view-coupon" class="btn btn-primary" style="float:right" >Back To Coupons</a>

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
              <h3 class="box-title">Coupon Detail</h3>
              <a href="javscript:void(0)" class="btn btn-success" style="float:right;" id="csvBoxOpen">Upload Csv</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Coupon ID</th>
                  <th>Coupon Title</th>
                  <th>Store</th>
                  <th>Expire</th>
                  <th>Type</th>
                  <th>URL</th>
                  <th>Coupon Link</th>
                  <th>Actions</th>
                </tr>
                </thead>

                <tbody>
                <?php
                $sql = $db->con->prepare("SELECT tbl_coupens.c_id,tbl_coupens.c_title,tbl_coupens.c_type,tbl_coupens.c_expirydate,
                tbl_coupens.c_url,tbl_coupens.c_urllink,tbl_stores.s_name FROM tbl_coupens
                INNER JOIN tbl_stores ON tbl_coupens.c_s_id = tbl_stores.s_id
                Order By c_id DESC");
                $sql->bind_result($cid,$title,$ctype,$cexpiry,$curl,$curllink,$store);
                 $sql->execute();
                 while($sql->fetch()){
                ?>
                <tr>
                  <td><?php echo $cid; ?></td>
                  <td><?php echo $title; ?></td>
                  <td><?php echo $store; ?></td>
                  <td><?php echo $cexpiry; ?></td>
                  <td><?php echo $ctype; ?></td>
                  <td><a href="<?php echo $curl; ?>" target="blank">URL</a></td>
                  <td><a href="<?php echo $curllink; ?>" target="blank">Coupon Link</a></td>
                  <td>
                  <a href="view-coupon?Details=<?php echo rand(10,100).$cid.uniqid(); ?>&store=<?php echo $store; ?>" style="margin-left:10px;"> <i class="fas fa-book"></i></a> <span> | </span>
                  <a href="add-coupon?Edit=<?php echo rand(10,100).$cid.uniqid(); ?>" style="margin-left:10px;"> <i class="fas fa-edit"></i></a> <span> | </span>
                  <a href="view-coupon?Delete=<?php echo rand(10,100).$cid.uniqid(); ?>" style="margin-left:10px;"> <i class="fa fa-trash"></i></a> 
                      
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