<?php 
include_once('Function/DbOperation.php');

if(empty($_SESSION['admin'])){
  header("Location: login");
}


$db = new DbOperation;

unset($_SESSION['msg']);

$btn = "Submit";

if(@$_POST['btnSubmit'] == "Submit"){

  $scat = $_POST['scat'];
  $pcat = $_POST['pcat'];
  $sdescription = $_POST['description'];
  $sspecial = $_POST['special'];
  $sad1 = $_POST['adsense1'];
  $sad2 = $_POST['adsense2'];
  $stitle = $_POST['mtitle'];
  $skeyword = $_POST['mkeyword'];
  $sdes = $_POST['mdes'];
  $enable = (isset($_POST['enable'])) ? $_POST['enable'] : "0";
  $user = $_SESSION['admin'];
  $style = $_SESSION['style'];

  $res = $db->Check_record(['sc_name','tbl_subcategory'],$scat);
  if($res == 1){
    $_SESSION['msg'] = "Alert! Sub Category Already Exist";
  }
  else{
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
  $f = [$scat,$pcat,$sdescription,$sspecial,$sad1,$sad2,$stitle,$skeyword,$sdes,$enable,$style,$user];
  $r = $db->Record_insert("tbl_subcategory",$fields,$f);
  if($r == true){

    $sql = $db->con->prepare("SELECT sc_id FROM tbl_subcategory ORDER BY sc_id DESC");
    $sql->bind_result($sc_id);
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
        "img_user" => "?"
      );
      $f = [$file_name,$sc_id,];
      $qr = $db->Record_insert("tbl_slider",$fields,$f);

    }
  }


    $_SESSION['msg'] = "Sub Category Added Successfully";
  }
  else{
    $_SESSION['msg'] = "Alert! Error While Adding Sub Category";
  }

  }


}


if(@$_GET['Edit']){
  $btn = "Update";
  $Edit = $_GET['Edit'];
  $Edit = substr($Edit,2,-13);

  $sql = $db->con->prepare("SELECT tbl_subcategory.sc_id,tbl_subcategory.sc_name,
  tbl_subcategory.sc_description,tbl_subcategory.sc_special,tbl_subcategory.sc_adsense1,tbl_subcategory.sc_adsense2,
  tbl_subcategory.sc_mtitle,tbl_subcategory.sc_mkeyword,tbl_subcategory.sc_mdes,tbl_subcategory.sc_slide,tbl_subcategory.sc_style,
  tbl_categories.ct_id,tbl_categories.ct_name From tbl_subcategory
  LEFT JOIN tbl_categories on tbl_subcategory.sc_ct_id = tbl_categories.ct_id WHERE tbl_subcategory.sc_id = ?");
  $sql->bind_param("s",$Edit);
  $sql->bind_result($sid,$sname,$description,$specail,$ad1,$ad2,$title,$keyword,$des,$slide,$style,$cid,$pname);
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

  $scat = $_POST['scat'];
  $pcat = $db->con->real_escape_string($_POST['pcat']);
  $sdescription = $_POST['description'];
  $sspecial = $_POST['special'];
  $sad1 = $_POST['adsense1'];
  $sad2 = $_POST['adsense2'];
  $stitle = $_POST['mtitle'];
  $skeyword = $_POST['mkeyword'];
  $sdes = $_POST['mdes'];
  $enable = (isset($_POST['enable'])) ? $_POST['enable'] : "0";
  $user = $_SESSION['admin'];
  $style = $_POST['style'];

  $table = ['tbl_subcategory','sc_id'];
  $fields = [
        "sc_name = ?",
        "sc_ct_id = ?",
        "sc_description = ?",
        "sc_special = ?",
        "sc_adsense1 = ?",
        "sc_adsense2 = ?",
        "sc_mtitle = ?",
        "sc_mkeyword = ?",
        "sc_mdes = ?",
        "sc_slide = ?",
        "sc_style = ?",
        "sc_user = ?"
  ];
  $val = [$scat,$pcat,$sdescription,$sspecial,$sad1,$sad2,$stitle,$skeyword,$sdes,$enable,$style,$user,$EditId];
  $r = $db->Update_record($table,$fields,$val);
  if($r == 1){

    if(!empty($_FILES['slider']['tmp_name'][0])){

      $total = count($_FILES['slider']['name']);

      for ($i=0; $i < $total; $i++) { 
          
          $file_ext = explode(".",$_FILES['slider']['name'][$i]);
          $file_name = md5(rand()).'.'.end($file_ext);
          $file_path = "uploads/sliderImage/".$file_name;
          move_uploaded_file($_FILES['slider']['tmp_name'][$i],$file_path);

          $sql = $db->con->prepare("INSERT INTO tbl_slider (img_link,img_user) VALUES (?,?)");
          $sql->bind_param("ss",$file_name,$sid);
          $sql->execute();

      }

  }

    echo "<script>window.location.href='view-subcategory'</script>";
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
        Sub Category
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
        <li><a href="#"><i class="fa fa-dashboard"></i> Sub Category</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border" style="background-color: #3c8dbc; color:#ffffff">
          <h3 class="box-title">Add Sub Category</h3>
          
        </div>
            <form method="post" enctype="multipart/form-data">
        <div class="box-body">

        <div style="width:70%; margin:0px auto; margin-top:3%">

        <div class="form-group">
            <label>Sub category Name</label>
            <input type="text" class="form-control" required placeholder="Sub Category Name" name="scat" value="<?php echo @$sname; ?>">
        </div>

        <div class="form-group">
                <label>Select Parent Category</label>
                <select class="form-control select2" required name="pcat" style="width: 100%;">
                  <?php
                    if(isset($cid)){
                        echo '<option value="'.$cid.'">'.$pname.'</option>';
                    }
                  ?>
                  <option></option>
                <?php
                $sql = $db->con->prepare("SELECT ct_id,ct_name FROM tbl_categories");
                $sql->bind_result($cid,$cname);
                $sql->execute();
                while($sql->fetch()){
                ?>
                  <option value="<?php echo $cid; ?>"><?php echo $cname; ?></option>
                <?php } ?>
                </select>
              </div>

              <div class="form-group">
              <label class="control-label">Coupon Style</label>
            <select name="style" class="form-control">
                <?php
                if(@$_GET['Edit']){
                    echo "<option>$style</option>";
                }
                ?>
                <option>Grid</option>
                <option>Card</option>
            </select>
              </div>

              <div class="form-group">
            <label class="control-label">Enable Slider</label>
            <input type="checkbox" name="enable" value="1" <?php echo (@$slide == "1") ? "checked" : ""; ?>/>
        </div>

        <div class="form-group">
            <label>Slider Image</label>
            <input type="file" class="form-control" name="slider[]" multiple <?php echo (@$_GET['Edit']) ? "" : "required" ?>/>
        </div>

        <?php
        if(@$_GET['Edit']){
        ?>
        <div class="row">
            <div class="col-sm-12"><br>
            <?php 

        $sql = $db->con->prepare("SELECT img_id,img_link,img_user FROM tbl_slider WHERE img_user=?");
        $sql->bind_param("s",$sid);
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
            <label>Description</label>
            <textarea class="form-control" placeholder="Description" name="description"><?php echo @$description; ?></textarea>
        </div>

        <div class="form-group">
        <label>Special Content</label>
            <textarea class="tinymce" name="special"><?php echo @$specail; ?></textarea>
        </div> 

        <div class="form-group">
            <label>Adsense Code (1) 360px</label>
            <textarea class="form-control" placeholder="Adsense Code (1) 360px" name="adsense1"><?php echo @$ad1; ?></textarea>
        </div>

        <div class="form-group">
        <label>Adsense Code (2) 360px</label>
            <textarea class="form-control" placeholder="Adsense Code (2) 360px" name="adsense2"><?php echo @$ad2; ?></textarea>
        </div>

        <div class="form-group">
            <label>Meta Title</label>
            <input type="text" class="form-control" required placeholder="Meta Title" name="mtitle" value="<?php echo @$title; ?>">
        </div>

        <div class="form-group">
            <label>Meta Keywords</label>
            <input type="text" class="form-control" required placeholder="Meta Keywords" name="mkeyword" value="<?php echo @$keyword; ?>">
        </div>

        <div class="form-group">
            <label>Meta Description</label>
            <textarea class="form-control" placeholder="Meta Description" name="mdes"><?php echo @$des; ?></textarea>
        </div> 


        </div>


        </div>

        <!-- /.box-body -->
        <div class="box-footer">
         <input type="submit" name="btnSubmit" style="float:right" value="<?php echo $btn; ?>" class="btn btn-primary"/>
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