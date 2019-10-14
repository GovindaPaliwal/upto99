<?php 
include_once('Function/DbOperation.php');
$db = new DbOperation;

unset($_SESSION['msg']);

if(empty($_SESSION['admin'])){
  header("Location: login");
}

$btn = "Submit";

if(@$_POST['btnSubmit'] == "Submit"){

    $title = $_POST['title'];
    $content = $_POST['body'];
    $user = $_SESSION['admin'];
    $ad1 = $_POST['ad1'];
    $ad2 = $_POST['ad2'];
    $mtitle = $_POST['mtitle'];
    $mkeyword = $_POST['mkeyword'];
    $mdes = $_POST['mdes'];
    
    $r = $db->Check_record(['b_title','tbl_blog'],$title);
    if($r == 1){
        $_SESSION['msg'] = "Blog With This Title Already Exist.";
    }
    else{
    
        $file = explode(".",$_FILES['file']['name']);
        $file_name = md5(rand()).'.'.end($file);
        $file_path = "uploads/blogfeatured/".$file_name;
        
        if(move_uploaded_file($_FILES['file']['tmp_name'],$file_path)){
            $fields = array(
                "b_title" => "?",
                "b_image" => "?",
                "b_content" => "?",
                "b_user" => "?",
                "ad1" => "?",
                "ad2" => "?",
                "b_mtitle" => "?",
                "b_keyword" => "?",
                "b_description" => "?",
            );
        $res = $db->Record_insert('tbl_blog',$fields,[$title,$file_name,$content,$user,$ad1,$ad2,$mtitle,$mkeyword,$mdes]);
        if($res == true){
            $_SESSION['msg'] = "Blog Added Successfully";
        }
    
        }
    
    }

}

$image = "";

if(@$_GET['Edit']){
    $btn = "Update";
    $Edit = $_GET['Edit'];
    $Edit = substr($Edit,2,-13);
  
    $sql = $db->con->prepare("SELECT * From tbl_blog WHERE b_id = ?");
    $sql->bind_param("s",$Edit);
    $sql->bind_result($id,$title,$image,$content,$user,$date,$ad1,$ad2,$mtitle,$mkeyword,$mdes);
    $sql->execute();
    $sql->store_result();
    if(!$sql->num_rows > 0){
        echo "<script>window.location.href='view-blog'</script>";
    }
    $sql->fetch();
  
  }


  if(@$_POST['btnSubmit'] == "Update"){

    $Edit = $_GET['Edit'];
    $EditId = substr($Edit,2,-13);
  
    $$title = $_POST['title'];
    $content = $_POST['body'];
    $user = $_SESSION['admin'];
    $ad1 = $_POST['ad1'];
    $ad2 = $_POST['ad2'];
    $mtitle = $_POST['mtitle'];
    $mkeyword = $_POST['mkeyword'];
    $mdes = $_POST['mdes'];
    if(!empty($_FILES['file']['name'])){
      unlink("uploads/blogfeatured/".$image);
      $icon_image_ext = explode(".",$_FILES['file']['name']);
      $icon_image = md5(rand()).'.'.end($icon_image_ext);
      $icon_image_path = "uploads/blogfeatured/".$icon_image;
      move_uploaded_file($_FILES['file']['tmp_name'],$icon_image_path);
    }
    else{
      $icon_image = $image;
    }
  
    $table = ['tbl_blog','b_id'];
    $fields = [
        "b_title = ?",
        "b_image = ?",
        "b_content = ?",
        "b_user = ?",
        "ad1 = ?",
        "ad2 = ?",
        "b_mtitle = ?",
        "b_keyword = ?",
        "b_description = ?",
    ];
    $val = [$title,$icon_image,$content,$user,$ad1,$ad2,$mtitle,$mkeyword,$mdes,$EditId];
    $r = $db->Update_record($table,$fields,$val);
    if($r == 1){
      echo "<script>window.location.href='view-blog'</script>";
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
        Blog
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
        <li><a href="#"><i class="fa fa-dashboard"></i> Blog</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box" id="csvBox" style="display:none">
        <div class="box-header with-border" style="background-color: #3c8dbc; color:#ffffff">
          <h3 class="box-title">Get Image Link</h3>
          <a href="javscript:void(0)" class="btn btn-danger" style="float:right;" id="csvBoxClose">Close</a>
        </div>
            <form id="imageLink" enctype="multipart/form-data">
        <div class="box-body">

        <div style="width:50%; margin:0px auto; margin-top:3%">

        <div class="form-group">
            <input type="file" name="image" class="form-control" required accept="image/*" >
        </div>

        <div class="form-group">
        <input type="submit" name="btnSub" class="btn btn-primary" style="float:right"/>
        </div>

        </div>


        </div>
        </form>
    <p style="padding:20px;">Image Link : <span id="urlPath"></span></p>
        <input type="hidden" id="hiddenField">
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
      


      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border" style="background-color: #3c8dbc; color:#ffffff">
          <h3 class="box-title">Add Blog</h3>
          <a href="javascript:void(0)" id="csvBoxOpen" class="btn btn-success" style="float:right">Get Image Link</a> 
        </div>
            <form method="post" enctype="multipart/form-data">
        <div class="box-body">

        <div style="width:80%; margin:0px auto; margin-top:3%">

        <div class="form-group">
            <label>Title</label>
            <input type="text" class="form-control" value="<?php echo @$title; ?>" required placeholder="Title Here" name="title">
        </div>

        <div class="form-group">
            <label>Featured Image</label>
            <input type="file" class="form-control" required name="file">
        </div>

        <div class="form-group">
            <label>Content</label>
            <textarea class="tinymce" name="body"><?php echo @$content; ?></textarea>
        </div>

        <div class="form-group">
            <label>Adsense Code (1) 760px</label>
            <textarea class="form-control" name="ad1" placeholder="Adsense Code (1) 760px"><?php echo @$ad1; ?></textarea>
        </div>

        <div class="form-group">
            <label>Adsense Code (2) 360px</label>
            <textarea class="form-control" placeholder="Adsense Code (2) 360px" name="ad2"><?php echo @$ad2; ?></textarea>
        </div>

        <div class="form-group">
            <label>Meta Title</label>
            <input type="text" class="form-control" required placeholder="Meta Title" value="<?php echo @$mtitle; ?>" name="mtitle">
        </div>

        <div class="form-group">
            <label>Meta Keywords</label>
            <input type="text" class="form-control" required placeholder="Meta Keywords" value="<?php echo @$mkeyword; ?>" name="mkeyword">
        </div>

        <div class="form-group">
            <label>Meta Description</label>
            <textarea class="form-control" name="mdes" placeholder="Meta Description"><?php echo @$mdes; ?></textarea>
        </div>

        </div>


        </div>

        <!-- /.box-body -->
        <div class="box-footer">
        <input type="submit" name="btnSubmit" class="btn btn-primary" value="<?php echo $btn; ?>" style="float:right"/>
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