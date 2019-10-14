<?php 
include_once('Function/DbOperation.php');

if(empty($_SESSION['admin'])){
  header("Location: login");
}


$db = new DbOperation;

unset($_SESSION['msg']);

$btn = "Submit";
$enable = "0";

if(@$_POST['btnSubmit'] == "Submit"){

  $name = $db->con->real_escape_string($_POST['name']);
  $heading = $db->con->real_escape_string($_POST['heading']);
  $description  = $db->con->real_escape_string($_POST['description']);
  $mtitle = $db->con->real_escape_string($_POST['mtitle']);
  $mdescription = $db->con->real_escape_string($_POST['mdescription']);
  $mkeywords = $db->con->real_escape_string($_POST['mkeywords']);
  $cstyle = $db->con->real_escape_string($_POST['cstyle']);
  if(isset($_POST['enable'])){
    $enable = $db->con->real_escape_string($_POST['enable']);
  }
  $iconSel = $_POST['iconSel'];
  $url = $_POST['url'];
  $special = $_POST['special'];
  $adsense1 = $_POST['adsense1'];
  $adsense2 = $_POST['adsense2'];
  $user = $_SESSION['admin'];

  $res = $db->Check_record(['ct_name','tbl_categories'],$name);
  if($res == 1){
    $_SESSION['msg'] = "Alert! Category Already Exist";
  }
  else{

    $icon_ext = explode(".",$_FILES['icon']['name']);
    $icon = md5(rand()).'.'.end($icon_ext);
    $icon_path = "uploads/categoryImage/".$icon;
    move_uploaded_file($_FILES['icon']['tmp_name'],$icon_path);

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
  $f = [$name,$heading,$icon,$iconSel,$description,$special,$mtitle,$mdescription,$mkeywords,$url,
  $enable,$adsense1,$adsense2,$cstyle,$user];
  $r = $db->Record_insert("tbl_categories",$fields,$f);
  if($r == 1){

    $sql = $db->con->prepare("SELECT ct_id FROM tbl_categories ORDER BY ct_id DESC");
    $sql->bind_result($ct_id);
    $sql->execute();
    $sql->fetch();
    $sql->close();

    if(!empty($_FILES['slider']['name'][0])){

    $total = count($_FILES['slider']['name']);

    for ($i=0; $i < $total; $i++) { 

      $file_ext = explode(".",$_FILES['slider']['name'][$i]);
      $file_name = md5(rand()).'.'.end($file_ext);
      $file_path = "uploads/sliderImage/".$file_name;
      move_uploaded_file($_FILES['slider']['tmp_name'][$i],$file_path);

      $fields = array(
        "img_link" => "?",
        "img_c_id" => "?",
      );
      $f = [$file_name,$ct_id];
      $qr = $db->Record_insert("tbl_slider",$fields,$f);

    }
  }


    $_SESSION['msg'] = "Category Added Successfully";
  }
  else{
    $_SESSION['msg'] = "Alert! Error While Adding Category";
  }

  }


}

$image = "";
if(@$_GET['Edit']){
  $btn = "Update";
  $Edit = $_GET['Edit'];
  $Edit = substr($Edit,2,-13);

  $sql = $db->con->prepare("SELECT * From tbl_categories WHERE ct_id = ?");
  $sql->bind_param("s",$Edit);
  $sql->bind_result($id,$name,$heading,$image,$icon,$description,$special,$mtitle,$mdesc,$mkeyword,$url,$slide,$ad1,$ad2,$style,$user);
  $sql->execute();
  $sql->store_result();
  if(!$sql->num_rows > 0){
      echo "<script>window.location.href='view-subcategory'</script>";
  }
  $sql->fetch();

}


if(@$_POST['btnSubmit'] == "Update"){

  $Edit = $_GET['Edit'];
  $EditId = substr($Edit,2,-13);

  $name = $db->con->real_escape_string($_POST['name']);
  $heading = $db->con->real_escape_string($_POST['heading']);
  $description  = $db->con->real_escape_string($_POST['description']);
  $mtitle = $db->con->real_escape_string($_POST['mtitle']);
  $mdescription = $db->con->real_escape_string($_POST['mdescription']);
  $mkeywords = $db->con->real_escape_string($_POST['mkeywords']);
  $cstyle = $db->con->real_escape_string($_POST['cstyle']);
  if(isset($_POST['enable'])){
    $enable = $db->con->real_escape_string($_POST['enable']);
  }
  $iconSel = $_POST['iconSel'];
  $url = $_POST['url'];
  $special = $_POST['special'];
  $user = $_SESSION['admin'];
  $adsense1 = $_POST['adsense1'];
  $adsense2 = $_POST['adsense2'];
  $icon_image = "";
  if(!empty($_FILES['icon']['name'])){
    unlink("uploads/categoryImage/".$image);
    $icon_image_ext = explode(".",$_FILES['icon']['name']);
    $icon_image = md5(rand()).'.'.end($icon_image_ext);
    $icon_image_path = "uploads/categoryImage/".$icon_image;
    move_uploaded_file($_FILES['icon']['tmp_name'],$icon_image_path);
  }
  else{
    $icon_image = $image;
  }

  $table = ['tbl_categories','ct_id'];
  $fields = [
        "ct_name = ?",
        "ct_heading = ?",
        "ct_icons = ?",
        "ct_iconSel = ?",
        "cat_description = ?",
        "cat_sp_content = ?",
        "cat_m_title = ?",
        "cat_m_desc = ?",
        "cat_m_keyword = ?",
        "cat_url = ?",
        "ct_slide = ?",
        "adsense1 = ?",
        "adsense2 = ?",
        "cstyle = ?",
        "cat_user = ?"
  ];
  $val = [$name,$heading,$icon_image,$iconSel,$description,$special,$mtitle,$mdescription,$mkeywords,$url,
  $enable,$adsense1,$adsense2,$cstyle,$user,$EditId];
  $r = $db->Update_record($table,$fields,$val);
  if($r == 1){

    if(!empty($_FILES['slider']['tmp_name'][0])){

      $total = count($_FILES['slider']['name']);

      for ($i=0; $i < $total; $i++) { 
          
          $file_ext = explode(".",$_FILES['slider']['name'][$i]);
          $file_name = md5(rand()).'.'.end($file_ext);
          $file_path = "uploads/sliderImage/".$file_name;
          move_uploaded_file($_FILES['slider']['tmp_name'][$i],$file_path);

          $sql = $db->con->prepare("INSERT INTO tbl_slider (img_link,img_c_id) VALUES (?,?)");
          $sql->bind_param("ss",$file_name,$id);
          $sql->execute();

      }

  }


    echo "<script>window.location.href='view-category'</script>";
  }
  else{
    $_SESSION['msg'] = "Alert! Error While Updating Category";
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
        Category
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
        <li><a href="#"><i class="fa fa-dashboard"></i> Category</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border" style="background-color: #3c8dbc; color:#ffffff">
          <h3 class="box-title">Add Category</h3>
          
        </div>
            <form method="post" enctype="multipart/form-data">
        <div class="box-body">

        <div style="width:85%; margin:0px auto; margin-top:3%">

        <div class="form-group">
          <div class="col-sm-2 ">
            <label class="control-label">Category Name</label>
            </div>
            <div class="col-sm-10">
            <input type="text" class="form-control" required placeholder="Category Name" name="name" value="<?php echo @$name; ?>">
            </div>
            <br><br>
        </div>

        <div class="form-group">
        <div class="col-sm-2 ">
            <label class="control-label">Heading</label>
            </div>
            <div class="col-sm-10">
            <input type="text" class="form-control" required placeholder="Heading" name="heading" value="<?php echo @$heading; ?>">
            </div><br><br>
        </div>

        <div class="form-group">
        <div class="col-sm-2 ">
            <label class="control-label">Coupon Style</label>
            </div>
            <div class="col-sm-10">
            <select name="cstyle" class="form-control" required>
                <?php
                if(@$_GET['Edit']){
                    echo "<option>$style</option>";
                }
                ?>
                <option>Grid</option>
                <option>Card</option>
            </select>
            </div><br><br>
        </div>

        <div class="form-group">
        <div class="col-sm-2 ">
            <label class="control-label">Select Icon</label>
            </div>
            <div class="col-sm-10">
            <input type="text" class="form-control social-icon" required placeholder="Select Icon" name="iconSel" value="<?php echo @$icon; ?>">
            </div><br><br>
        </div>

        <div class="form-group">
        <div class="col-sm-2 ">
            <label class="control-label">Select Image</label>
            </div>
            <div class="col-sm-10">
            <!--<input type="text" class="form-control social-icon" required placeholder="Select Icon" name="icon" value="">-->
            <input type="file" class="form-control" name="icon" <?php echo (@$_GET['Edit']) ? "" : "required" ?>/>
            </div><br><br>
        </div>
        <?php
        if(@$_GET['Edit']){
        ?>
        <div class="form-group">
        <div class="col-sm-2 ">
            <label class="control-label">Category Image</label>
            </div>
            <div class="col-sm-10">
            <!--<input type="text" class="form-control social-icon" required placeholder="Select Icon" name="icon" value="">-->
            <img src="uploads/categoryImage/<?php echo $image; ?>" style="width:100px; height:100px;" />
            </div><br><br>
        </div>
        <?php } ?>

        <?php
        if(@$_GET['Edit']){

        $ch = ($slide == "1") ? "checked" : "";
        }
        ?>

        <div class="form-group">
        <div class="col-sm-2 ">
            <label class="control-label">Enable Slider</label>
            </div>
            <div class="col-sm-10">
            <input type="checkbox" name="enable" value="1" <?php echo @$ch; ?>/>
            </div><br>
        </div>

        <div class="row">
        <div class="col-md-12">
        <div class="col-sm-2 ">
            <label class="control-label">Slider Image</label>
            </div>
            <div class="col-sm-10">
            <input type="file" class="form-control" name="slider[]" multiple <?php echo (@$_GET['Edit']) ? "" : "required" ?>/>
            </div>
        </div>
        </div>
        <?php
        if(@$_GET['Edit']){
        ?>
        <div class="row">
            <div class="col-sm-12"><br>
            <?php 

        $sql = $db->con->prepare("SELECT img_id,img_link,img_c_id FROM tbl_slider WHERE img_c_id=?");
        $sql->bind_param("s",$id);
        $sql->bind_result($idImg,$image,$imageId);
        $sql->execute();
        $sql->store_result();
        if($sql->num_rows > 0){
            while($sql->fetch()){

        
        ?>
        <div class="col-md-2">
            <img src="uploads/sliderImage/<?php echo $image; ?>" style="width:100px; height:100px; border:black solid thin"/><br>
                <center><a href="javascript:void(0)" id="<?php echo $idImg; ?>" value="<?php echo $image; ?>" class="imgDel"><b>Delete</b></a></center>
                </div>
            <?php } }?>
            </div><br>
        </div>
        <?php } ?>

        <div class="form-group">
        <br><br><br>
        <div class="col-sm-2 ">
            <label class="control-label">Description</label>
            </div>
            <div class="col-sm-10">
            <textarea class="form-control" required placeholder="Description" name="description"><?php echo @$description; ?></textarea>
            </div><br><br><br>
        </div>

        <div class="form-group">
        <div class="col-sm-2 ">
            <label class="control-label">Meta Title</label>
            </div>
            <div class="col-sm-10">
            <input type="text" class="form-control" placeholder="Meta Title" name="mtitle" value="<?php echo @$mtitle; ?>">
            </div><br><br>
        </div>

        <div class="form-group">
        <div class="col-sm-2 ">
            <label class="control-label">Meta Description</label>
            </div>
            <div class="col-sm-10">
            <textarea class="form-control" placeholder="Meta Description" name="mdescription"><?php echo @$mdesc; ?></textarea>
            </div><br><br><br>
        </div>

        <div class="form-group">
        <div class="col-sm-2 ">
            <label class="control-label">Meta Keywords</label>
            </div>
            <div class="col-sm-10">
            <input type="text" class="form-control" placeholder="Meta Keywords" name="mkeywords" value="<?php echo @$mkeyword; ?>">
            </div><br><br>
        </div>

        <div class="form-group">
        <div class="col-sm-2 ">
            <label class="control-label">Category Url</label>
            </div>
            <div class="col-sm-10">
            <input type="text" class="form-control" required placeholder="Category URL" name="url" value="<?php echo @$url; ?>">
            </div><br>
        </div>

        <div class="form-group">
        <br><br><br>
        <div class="col-sm-2 ">
            <label class="control-label">Adsense Code (1) 360px</label>
            </div>
            <div class="col-sm-10">
            <textarea class="form-control" placeholder="Adsense Code (1) 360px" name="adsense1"><?php echo @$ad1; ?></textarea>
            </div>
        </div>

        <div class="form-group">
        <br><br><br>
        <div class="col-sm-2 ">
            <label class="control-label">Adsense Code (2) 360px</label>
            </div>
            <div class="col-sm-10">
            <textarea class="form-control" placeholder="Adsense Code (2) 360px" name="adsense2"><?php echo @$ad2; ?></textarea>
            </div><br><br><br>
        </div>

        <div class="form-group">
        <div class="col-sm-2">
            <label class="control-label">Special Content</label>
            </div>
            <div class="col-sm-10">
            <textarea class="tinymce" name="special"><?php echo @$special; ?></textarea>
            </div>
        </div>

        </div>


        </div>

        <!-- /.box-body -->
        <div class="box-footer">
          <div  style="float:right">
         <input type="submit" name="btnSubmit" class="btn btn-primary" value="<?php echo $btn; ?>"/>
         </div>
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