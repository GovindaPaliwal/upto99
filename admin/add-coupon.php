<?php 
include_once('Function/DbOperation.php');

if(empty($_SESSION['admin'])){
    header("Location: login");
  }
  

$db = new DbOperation;

unset($_SESSION['msg']);

$btn = "Submit";

if(@$_POST['btnSubmit'] == "Submit"){

    $name = $db->con->real_escape_string($_POST['name']);
    $url = $_POST['url'];
    $couponsel = $db->con->real_escape_string($_POST['couponsel']);
    $ccode = $_POST['ccode'];
    $rank = $db->con->real_escape_string($_POST['rank']);
    $catrank = $db->con->real_escape_string($_POST['catrank']);
    $subrank = $db->con->real_escape_string($_POST['subrank']);
    $tags = $_POST['tags'];
    $tag = implode(",",$tags);
    $category = $_POST['category'];
    $cat = implode(",",$category);
    $subcategory = $_POST['subcategory'];
    $sub = implode(",",$subcategory);
    $curl = $_POST['curl'];
    $edate = $db->con->real_escape_string($_POST['edate']);
    $store = $db->con->real_escape_string($_POST['store']);
    //$category = $db->con->real_escape_string($_POST['category']);
    $description = $db->con->real_escape_string($_POST['description']);
    $status = $db->con->real_escape_string($_POST['status']);
    $mtitle = $db->con->real_escape_string($_POST['mtitle']);
    $mkeyword = $_POST['mkeyword'];
    $mdesc = $db->con->real_escape_string($_POST['mdesc']);
    $special = $_POST['special'];
    $user = $_SESSION['admin'];
    $scheduleDate = (isset($_POST['schedule'])) ? $_POST['schedule'] : "";
    $now = $_POST['now'];
    $featured = "";
    if(empty($_POST['featured'])){
        $featured = "0";
    }
    else{
        $featured = $_POST['featured'];
    }
    $image = "";

    if(!empty($_FILES['image']['name'])){

        $image_ext = explode(".",$_FILES['image']['name']);
        $image = md5(rand()).'.'.end($image_ext);
        $image_path = "uploads/couponimage/".$image;
        move_uploaded_file($_FILES['image']['tmp_name'],$image_path);
    }
    $fields = array(
        "c_title" => "?",
        "c_featured" => "?",
        "c_url" => "?",
        "c_description" => "?",
        "c_type" => "?",
        "c_tags" => "?",
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
        "c_cat_id" => "?",
        "c_sub_cat_id" => "?",
        "schedule_date" => "?",
        "schedule_status" => "?",
        "c_user" => "?"
    );
    $f = [$name,$featured,$url,$description,$couponsel,$tag,$image,$edate,$ccode,$rank,$catrank,$subrank,$status,
    $special,$mtitle,$mkeyword,$mdesc,$curl,$store,$cat,$sub,$scheduleDate,$now,$user];
    $res = $db->Record_insert('tbl_coupens',$fields,$f);

    if($res == true){

        $qry = $db->con->prepare("SELECT c_id FROM tbl_coupens ORDER BY c_id DESC");
        $qry->bind_result($ct_id);
        $qry->execute();
        $qry->fetch();
        $qry->close();
        $total = count($_FILES['sfile']['name']);

        for ($i=0; $i < $total; $i++) { 

            $file_ext = explode(".",$_FILES['sfile']['name'][$i]);
            $file = md5(rand()).'.'.end($file_ext);
            $file_path = "uploads/sliderImage/".$file;

            move_uploaded_file($_FILES['sfile']['tmp_name'][$i],$file_path);

            $fields = array(
                "img_link" => "?",
                "img_c_id" => "?",
            );
            $f = [$file,$ct_id];
            $sql = $db->Record_insert("tbl_slider",$fields,$f);

        }
        
        $_SESSION['msg'] = "Coupon Added Successfully";
    }
    else{
        $_SESSION['msg'] = "Error While Adding Coupon";
    }
    

}

if(@$_GET['Edit']){

    $btn = "Update";

  $Edit = $_GET['Edit'];
  $Edit = substr($Edit,2,-13);

  $sql = $db->con->prepare("SELECT * From tbl_coupens WHERE c_id = ?");
    $sql->bind_param("s",$Edit);
    $sql->bind_result($cid,$title,$fea,$curl,$cdesc,$ctype,$ctags,$cimage,$cexpiry,$ccode,$crank,$catrank,$subrank,
    $cstatus,$cspecial,$mtitle,$mkeyword,$mdes,$curllink,$csid,$ccid,$sscid,$clike,$cdis,$sDate,$sStatus,$cuser);
    $sql->execute();
    $sql->store_result();
    if($sql->num_rows > 0){
        $sql->fetch();
    }
    else{
        Header("Loaction : view-coupon");
    }
}


if(@$_POST['btnSubmit'] == "Update"){

    $EditId = $_GET['Edit'];
    $EditId = substr($EditId,2,-13);
    
    $name = $db->con->real_escape_string($_POST['name']);
    $featured = $db->con->real_escape_string($_POST['featured']);
    $url = $_POST['url'];
    $couponsel = $db->con->real_escape_string($_POST['couponsel']);
    $ccode = $_POST['ccode'];
    $rank = $db->con->real_escape_string($_POST['rank']);
    $catrank = $db->con->real_escape_string($_POST['catrank']);
    $subrank = $db->con->real_escape_string($_POST['subrank']);
    $tags = $_POST['tags'];
    $tag = implode(",",$tags);
    $category = $_POST['category'];
    $cat = implode(",",$category);
    $subcategory = $_POST['subcategory'];
    $sub = implode(",",$subcategory);
    $curl = $_POST['curl'];
    $edate = $db->con->real_escape_string($_POST['edate']);
    $store = $db->con->real_escape_string($_POST['store']);
    //$category = $db->con->real_escape_string($_POST['category']);
    $description = $db->con->real_escape_string($_POST['description']);
    $status = $db->con->real_escape_string($_POST['status']);
    $mtitle = $db->con->real_escape_string($_POST['mtitle']);
    $mkeyword = $_POST['mkeyword'];
    $mdesc = $db->con->real_escape_string($_POST['mdesc']);
    $special = $_POST['special'];
    $user = $_SESSION['admin'];
    $scheduleDate = (isset($_POST['schedule'])) ? $_POST['schedule'] : "";
    $now = $_POST['now'];
    $storeImgPath = "";
    $sql = $db->con->prepare("SELECT c_image FROM tbl_coupens WHERE c_id=?");
    $sql->bind_param("s",$EditId);
    $sql->bind_result($storeImage);
    $sql->execute();
    $sql->fetch();
    $sql->close();

    if(!empty($_FILES['image']['name'])){

        unlink("uploads/couponimage/".$storeImage);

        $img = explode(".",$_FILES['image']['name']);
        $storeImgPath = md5(rand()).".".end($img);
        $path = "uploads/couponimage/".$storeImgPath;
        move_uploaded_file($_FILES['image']['tmp_name'],$path);
    }
    else{
        $storeImgPath = $storeImage;
    }

    $fields = [
        "c_title = ?",
        "c_featured = ?",
        "c_url = ?",
        "c_description = ?",
        "c_type = ?",
        "c_tags = ?",
        "c_image = ?",
        "c_expirydate = ?",
        "c_code = ?",
        "c_rank = ?",
        "c_catrank = ?",
        "c_subrank = ?",
        "c_status = ?",
        "c_specialcontent = ?",
        "c_metatitle = ?",
        "c_metakeyword = ?",
        "c_metadescription = ?",
        "c_urllink = ?",
        "c_s_id = ?",
        "c_cat_id = ?",
        "c_sub_cat_id = ?",
        "schedule_date = ?",
        "schedule_status = ?",
        "c_user = ?"
    ];
    $val = [$name,$featured,$url,$description,$couponsel,$tag,$storeImgPath,$edate,$ccode,$rank,$catrank,$subrank,$status,
    $special,$mtitle,$mkeyword,$mdesc,$curl,$store,$cat,$sub,$scheduleDate,$now,$user,$EditId];
    $up = $db->Update_record(['tbl_coupens','c_id'],$fields,$val);

    if($up == true){

        $total = count($_FILES['sfile']['name']);

        for ($i=0; $i < $total; $i++) { 
        
        if(!empty($_FILES['sfile']['tmp_name'][$i])){

            for ($i=0; $i < $total; $i++) { 
                
                $file_ext = explode(".",$_FILES['sfile']['name'][$i]);
                $file_name = md5(rand()).'.'.end($file_ext);
                $file_path = "uploads/sliderImage/".$file_name;
                move_uploaded_file($_FILES['sfile']['tmp_name'][$i],$file_path);

                $sql = $db->con->prepare("INSERT INTO tbl_slider (img_link,img_c_id) VALUES (?,?)");
                $sql->bind_param("ss",$file_name,$EditId);
                $sql->execute();

            }

        }
    }
        

    $_SESSION['msg'] = "Coupons Details Update Successfully";

    }
    else{
        $_SESSION['msg'] = "Error While Updating Coupons Details";
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
        Coupon
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
        <li><a href="#"><i class="fa fa-dashboard"></i> Coupon</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border" style="background-color: #3c8dbc; color:#ffffff">
          <h3 class="box-title">Add Coupon</h3>
          
        </div>
            <form method="post" enctype="multipart/form-data">
        <div class="box-body">

        <div id="myDiv" style="width:100%; margin:0px auto; margin-top:3%;">

        <div class="col-md-12">

        <div class="col-md-6">
            <label class="control-label">Coupon Title</label>
            <input type="text" class="form-control" value="<?php echo @$title; ?>" required placeholder="Coupon Title" name="name">
            <br>
        </div>
        

        <div class="col-md-6">
            <label class="control-label">URL</label>
            <input type="url" class="form-control" value="<?php echo @$curl; ?>" required placeholder="URL" name="url">
            <br>
        </div>
        </div>

        <div class="col-md-12">

        <div class="col-md-6">
            <label class="control-label">Type</label>
            <select name="couponsel" class="form-control" required id="couponsel">
            <option></option>
            <?php 
            if(@$_GET['Edit']){
                echo "<option selected='selected' value='".$ctype."'>".$ctype."</option>";
            }
            ?>
            <option value="Coupon">Coupon</option>
            <option value="Deal">Deal</option>
            </select>
            <br>
        </div>

            <?php
            $style = "style='display:none'";
            if(@$_GET['Edit']){
                if($ctype == "Coupon"){
                    $style = "style='display:block'";
                }
                else{
                    $style = "style='display:none'";
                }
            }
            ?>
        <div class="col-md-6" <?php echo $style; ?>  id="coupon">
            <label class="control-label">Coupon Code</label>
            <input type="text" id="ctext" class="form-control" value='<?php echo (@$_GET["Edit"]) ? "$ccode" : "0" ?>' placeholder="Coupon Code" name="ccode">
            <br>
        </div>
        </div>


        
        <div class="col-md-12">
        <hr>
        <h4><b><u>Post Schedule</u></b></h4>
        <br>
        </div>

        <div class="col-md-12">
        
        <div class="col-md-6">
        
            <div class="col-md-3">
            <div class="form-group">
            <label>
            <input type="radio" name="now" value="Enable" required class="now" <?php echo @($sStatus == "Enable") ? "checked" : ""; ?>/> Now
            </label>
            </div>
            </div>

            <div class="col-md-3">
            <div class="form-group">
            <label>
            <input type="radio" name="now" value="Disable" required class="now" <?php echo @($sStatus == "Disable") ? "checked" : ""; ?>/> Later
            </label>
            </div>
            </div>

        </div>

       <div class="col-md-6">

       <div class="row" <?php echo (@$sStatus == "Disable" && isset($_GET['Edit'])) ? '' : 'style="display:none"'; ?> id="dateBox">
       <div class="col-md-3">
       <label>Schedule Date</label>
       </div>

       <div class="col-md-9">
       <input type="date" class="form-control" name="schedule" required id="scheduleDate" value="<?php echo @$sDate; ?>"/>
       </div>
       </div>

        </div>
        </div>


        <div class="col-md-12">
<hr><br>
        <div class="col-md-2">
            <label class="control-label">Featured Coupon</label>
            <br>
            <input type="checkbox" name="featured" value="1" <?php echo (@$fea == "1") ? "checked" : ""; ?>/>
            <br>
        </div>
        

        <div class="col-md-4">
            <label class="control-label">Store Rank</label>
            <select name="rank" class="form-control">
            <?php
            if(@$_GET['Edit']){
                if($crank != ""){
                    echo "<option>".$crank."</option>";
                }
            }
            ?>
            <option></option>
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
            <option>5</option>
            <option>6</option>
            <option>7</option>
            <option>8</option>
            <option>9</option>
            <option>10</option>
            </select>
            <br>
        </div>

        <div class="col-md-3">
            <label class="control-label">Category Rank</label>
            <select name="catrank" class="form-control">
            <?php
            if(@$_GET['Edit']){
                if($catcrank != ""){
                    echo "<option>".$catcrank."</option>";
                }
            }
            ?>
            <option></option>
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
            <option>5</option>
            <option>6</option>
            <option>7</option>
            <option>8</option>
            <option>9</option>
            <option>10</option>
            </select>
            <br>
        </div>

        <div class="col-md-3">
            <label class="control-label">SubCategory Rank</label>
            <select name="subrank" class="form-control">
            <?php
            if(@$_GET['Edit']){
                if($subcrank != ""){
                    echo "<option>".$subcrank."</option>";
                }
            }
            ?>
            <option></option>
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
            <option>5</option>
            <option>6</option>
            <option>7</option>
            <option>8</option>
            <option>9</option>
            <option>10</option>
            </select>
            <br>
        </div>
        
        </div>

        <div class="col-md-12">
        <div class="col-md-12">
            <label class="control-label">Tags</label>
            <select class="form-control select2" multiple="multiple" name="tags[]" required data-placeholder="Tags"
                        style="width: 100%;">
                        <option></option>
                        <?php
                if(@$_GET['Edit']){
                    $tag = explode(",",$ctags);
                foreach ($tag as $t) {
                    $q = $db->con->prepare("SELECT t_id,t_name FROM tbl_tags WHERE t_id = ?");
                    $q->bind_param("s",$t);
                    $q->bind_result($tag_id,$tag_name);
                    $q->execute();
                    while($q->fetch()){
                        echo '<option value="'.$tag_id.'" selected="selected">'.$tag_name.'</option>';
                    }
                }
                }

                        ?>
                   <?php
                   $sql = $db->con->prepare("SELECT t_id,t_name,t_is_default FROM tbl_tags");
                   $sql->bind_result($tid,$tname,$tdefault);
                   $sql->execute();
                   while($sql->fetch()){
                    if(@$_GET['Edit']){
                        if(!in_array($tid,$tag)){
                        echo '<option value="'.$tid.'">'.$tname.'</option>';
                    }
                    }
                    else{
                    if($tdefault == "1"){
                        
                        echo '<option value="'.$tid.'" selected="selected">'.$tname.'</option>';
                    }
                    
                    else{
                        echo '<option value="'.$tid.'">'.$tname.'</option>';
                    }
                }
                } ?>
                </select>
            <br><br>
        </div>
        </div>

        <div class="col-md-12">

        <div class="col-md-6">
        <label class="control-label">Coupon URL</label>
            <input type="url" class="form-control" value="<?php echo @$curllink; ?> " required placeholder="Coupon URL" name="curl">
            <br>
        </div>
        

        <div class="col-md-6">
            <label class="control-label">Expiry Date</label>
            <input type="date" class="form-control" value="<?php echo $cexpiry; ?>" required  name="edate">
            <br>
        </div>
        </div>

        <div class="col-md-12">

        <div class="col-md-6">
        <label class="control-label">Coupon Featured Images</label>
        <input type="file" class="form-control" name="image">
            <br>
        </div>
<?php
        if(@$_GET['Edit']){
?>


    <div class="col-md-6">
        <img src="uploads/couponimage/<?php echo $cimage; ?>" style="width:100px; height:100px"/>
        <br>
    </div>

<?php } ?>
        

        <div class="col-md-6" style="display:none">
            <label class="control-label">Coupon Slider Images</label>
                <input type="file" class="form-control" name="sfile[]" multiple>
            <br>
        </div>
        </div>

        
        <?php

if(@$_GET['Edit']){
?>
<!--
    <div class="col-md-12" style="margin-top:2%">

    <div class="col-md-6">
        <img src="uploads/couponimage/<?php echo $cimage; ?>" style="width:100px; height:100px"/>
        <br>
    </div>

    <div class="col-md-6" style="display:none">-->
    <?php 
/*
        $sql = $db->con->prepare("SELECT img_id,img_link,img_c_id FROM tbl_slider WHERE img_c_id=?");
        $sql->bind_param("s",$cid);
        $sql->bind_result($idImg,$image,$imageId);
        $sql->execute();
        $sql->store_result();
        if($sql->num_rows > 0){
            while($sql->fetch()){

         */
    ?>
  <!--  <div class="col-md-3">

    <img src="uploads/sliderImage/<?php //echo $image; ?>" style="width:100px; height:100px; border:black solid thin"/><br>
    <center><a href="javascript:void(0)" id="<?php //echo $idImg; ?>" value="<?php //echo $image; ?>" class="imgDel"><b>Delete</b></a></center>
        <br><br>
    </div>
-->
<?php 
   /*}
}*/
?>
<!--</div>
    </div>-->

<?php } ?>

        <div class="col-md-12">

        <div class="col-md-12">
            <label class="control-label">Select Store</label>
            <select name="store" class="form-control" required>
            <option></option>
            <?php 
             $sql = $db->con->prepare("SELECT s_id,s_name FROM tbl_stores");
             $sql->bind_result($s_id,$s_name);
             $sql->execute();
             while($sql->fetch()){
                if(@$_GET['Edit']){
                    if($s_id == $csid){
                        echo "<option value='".$s_id."' selected='selected'>".$s_name."</option>";
                    }
                }
            ?>
            <option value="<?php echo $s_id; ?>"><?php echo $s_name; ?></option>
            <?php } ?>
            </select>
            <br>
        </div>
        

        
        </div>

        <div class="col-md-12">

        <div class="col-md-6">
            <label class="control-label">Select Category</label>
            <div style="width:100%; border: 1px solid #ccc; height:250px; overflow-y: scroll;">
            <?php

            $row = array();
            //$s = 1;
            $sql = $db->con->prepare("SELECT ct_id,ct_name FROM tbl_categories");
            $sql->bind_result($cid,$cname);
            $sql->execute();
            while($sql->fetch()){
                $rows['cid'] = $cid;
                $rows['cname'] = $cname;
            $row[] = $rows;
            }
            
           
            @$pcat = explode(",",$ccid);
            @$subcat = explode(",",$sscid);
            
            foreach ($row as $r) {
                   $idd = $r['cid'];

                $res = in_array($idd,$pcat) ? "checked" : "";
                
                
                echo "<ul> <li style='list-style: none; margin-left:-15px'>
                <input type='checkbox' name='category[]' value='".$r['cid']."'
                
                $res
                
                /> 
                <label>".$r['cname']."</label>
                <span style='margin-left:20px; font-size:12px; color:red; display:none' class='category'></span>";
                $a = $r['cid'];
                $qry = $db->con->prepare("SELECT sc_id,sc_name FROM tbl_subcategory WHERE sc_ct_id=?");
                $qry->bind_param("s",$a);
                $qry->bind_result($sid,$sname);
                $qry->execute();
                while($qry->fetch()){
                    $r = in_array($sid,$subcat) ? "checked" : "";
                    echo "<ul><li style='list-style: none; margin-left:-15px;margin-top:5px;'>
                    <input type='checkbox' name='subcategory[]' value='".$sid."' $r/> 
                    <label>".$sname."</label>
                    <span style='margin-left:20px; font-size:12px; color:red; display:none' class='subcategory'></span>
                    </li></ul>";
                }
                
                echo "</li></ul>";
            }
            
            ?>
            </div>
            </div>
            <br>

        <div class="col-md-6">
            <label class="control-label">Description</label>
            <textarea class="form-control" name="description" required rows="11"><?php echo @$cdesc; ?></textarea>
            <br>
        </div>
        
        </div>



              <div class="col-md-12" style="margin-top:2%">

            <div class="col-md-12">
                <label class="control-label">Status</label>
            <select name="status" class="form-control" required>
            <?php 
            if(@$_GET['Edit']){
                echo "<option>".$cstatus."</option>";
            }
            ?>
            <option></option>
            <option>Enable</option>
            <option>Disable</option>
            </select>
                <br>
            </div>

            </div>


            <div class="col-md-12">

            <div class="col-md-6">
                <label class="control-label">Meta Title</label>
                <input type="text" class="form-control" value="<?php echo @$mtitle; ?>" placeholder="Meta Title" name="mtitle" >
                <br>
            </div>


            <div class="col-md-6">
                <label class="control-label">Meta Keywords</label>
                <input type="text" class="form-control" value="<?php echo @$mkeyword; ?>" placeholder="Meta Keywords" name="mkeyword">
                <br>
            </div>
            </div>

        

        <div class="col-md-12">
        <div class="col-md-12">
            <label class="control-label">Meta Description</label>
            <textarea class="form-control" placeholder="Meta Description" name="mdesc"><?php echo @$mdes; ?></textarea>
            <br>
            </div>
        </div>

        

        <div class="col-md-12">
        <div class="col-md-12">
            <label class="control-label">Special Content</label>
            <textarea class="tinymce" name="special"><?php echo @$cspecial; ?></textarea>
        </div>

        </div>
</div>
</div>

        <!-- /.box-body -->
        <div class="box-footer">
          <div  style="float:right">
         <input type="submit" name="btnSubmit" class="btn btn-primary" id="btnsub" value="<?php echo $btn; ?>"/>
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