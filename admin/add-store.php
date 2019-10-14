<?php 
include_once('Function/DbOperation.php');

if(empty($_SESSION['admin'])){
    header("Location: login");
  }
  

$db = new DbOperation;

unset($_SESSION['msg']);



$btn = "Submit";
$eslider = "0";

if(@$_POST['btnSubmit'] == "Submit"){

    $name = $db->con->real_escape_string($_POST['name']);
    $popular = "";
    if(!empty($_POST['popular'])){
        $popular = $_POST['popular'];
    }
    else{
        $popular = "0";
    }
    $disablelink = $_POST['disablelink'];
    $storelink = $_POST['storelink'];
    $country = $db->con->real_escape_string($_POST['country']);
    $tags = $_POST['tags'];
    $tag = implode(",",$tags);
    $category = $_POST['category'];
    $cat = implode(",",$category);
    $subcategory = $_POST['subcategory'];
    $sub = implode(",",$subcategory);
    $description  = $db->con->real_escape_string($_POST['description']);
    $heading = $db->con->real_escape_string($_POST['heading']);
    $status = $db->con->real_escape_string($_POST['status']);
    $mtitle = $db->con->real_escape_string($_POST['mtitle']);
    $mkeyword = $db->con->real_escape_string($_POST['mkeyword']);
    $mdesc = $db->con->real_escape_string($_POST['mdesc']);
    $cstyle = $db->con->real_escape_string($_POST['cstyle']);
    $ads1 = $_POST['ad1'];
    $ads2 = $_POST['ad2'];
    $c1 = $_POST['c1'];
    $c2 = $_POST['c2'];
    $alt = $_POST['alt'];
    if(isset($_POST['eslider'])){
    $eslider = $db->con->real_escape_string($_POST['eslider']);
}
    $special = $_POST['special'];
    $user = $_SESSION['admin'];
    $fb = @$_POST['fb'];
    $in = @$_POST['in'];
    $pi = @$_POST['pi'];
    $go = @$_POST['go'];
    $tw = @$_POST['tw'];
    $li = @$_POST['li'];

    $storeImgPath = "";
    
    $check = $db->Check_record(['s_name','tbl_stores'],$name);
    if($check == 1){
        $_SESSION['msg'] = "Store Already Exist";
    }
    else{

        if(!empty($_FILES['file']['name'])){

            $img = explode(".",$_FILES['file']['name']);
            $storeImgPath = md5(rand()).".".end($img);
            $path = "uploads/storeImage/".$storeImgPath;
            move_uploaded_file($_FILES['file']['tmp_name'],$path);
        }

        $fields = array(
            "s_name" => "?",
            "s_popular" => "?",
            "s_disablelink" => "?",
            "s_link" => "?",
            "s_country" => "?",
            "s_cat" => "?",
            "s_sub_cat" => "?",
            "s_tags" => "?",
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
        $f = [$name,$popular,$disablelink,$storelink,$country,$cat,$sub,
        $tag,$storeImgPath,$alt,$heading,$description,$special,$mtitle,
        $mdesc,$mkeyword,$status,$eslider,$cstyle,$ads1,$ads2,$c1,$c2,$user];
        $res = $db->Record_insert("tbl_stores",$fields,$f);
        if($res == 1){

            $qry = $db->con->prepare("SELECT s_id FROM tbl_stores ORDER BY s_id DESC");
            $qry->bind_result($s_id);
            $qry->execute();
            $qry->fetch();
            $qry->close();
        

            if($fb != "" || $in != "" || $pi != "" || $go != "" || $tw != "" || $li != ""){

                $fields = array(
                    "so_facebook" => "?",
                    "so_instagram" => "?",
                    "so_twitter" => "?",
                    "so_linkdin" => "?",
                    "so_pintrest" => "?",
                    "so_google" => "?",
                    "so_store" => "?"
                );
                $f = [$fb,$in,$tw,$li,$pi,$go,$s_id];
                $re = $db->Record_insert("tbl_social",$fields,$f);
            }

        if(!empty($_FILES['sfile']['name'])){
            

            $total = count($_FILES['sfile']['name']);

            for ($i=0; $i < $total; $i++) { 
                
                $file_ext = explode(".",$_FILES['sfile']['name'][$i]);
                $file_name = md5(rand()).'.'.end($file_ext);
                $file_path = "uploads/sliderImage/".$file_name;
                move_uploaded_file($_FILES['sfile']['tmp_name'][$i],$file_path);

                $sql = $db->con->prepare("INSERT INTO tbl_slider (img_link,img_s_id) VALUES (?,?)");
                $sql->bind_param("ss",$file_name,$s_id);
                $sql->execute();

            }

        }

            $_SESSION['msg'] = "Store Added Successfully";
        }
        else{
            $_SESSION['msg'] = "Error While Adding Store";
        }

    }

}

if(@$_GET['Edit']){

    $btn = "Update";

  $Edit = $_GET['Edit'];
  $Edit = substr($Edit,2,-13);

  $sql = $db->con->prepare("SELECT * From tbl_stores WHERE s_id = ?");
    $sql->bind_param("s",$Edit);
    $sql->bind_result($id,$name,$popular,$disableLink,$storeLink,$country,$cat,$scat,$tags,$image,$alt,$heading,$des,$special,$mtitle,$mdes,$mkeyword,$status,$slide,$style,$ad1,$ad2,$c1,$c2,$user);
    $sql->execute();
    $sql->store_result();
    if($sql->num_rows > 0){
        $sql->fetch();

        $q = $db->con->prepare("SELECT so_facebook,so_twitter,so_instagram,so_linkdin,so_pintrest,so_google
        FROM tbl_social WHERE so_store=?");
        $q->bind_param("s",$id);
        $q->bind_result($sfb,$stw,$sin,$sli,$spi,$sgo);
        $q->execute();
        $q->store_result();
        if($q->num_rows > 0){
            $q->fetch();
        }
    }
    else{
        Header("Loaction : view-store");
    }
}


if(@$_POST['btnSubmit'] == "Update"){

    $EditId = $_GET['Edit'];
    $EditId = substr($EditId,2,-13);
    
    $name = $db->con->real_escape_string($_POST['name']);
    $popular = @$_POST['popular'];
    $disablelink = $_POST['disablelink'];
    $storelink = $_POST['storelink'];
    $country = $db->con->real_escape_string($_POST['country']);
    $tags = $_POST['tags'];
    $tag = implode(",",$tags);
    $category = $_POST['category'];
    $cat = implode(",",$category);
    $subcategory = $_POST['subcategory'];
    $sub = implode(",",$subcategory);
    $description  = $db->con->real_escape_string($_POST['description']);
    $heading = $db->con->real_escape_string($_POST['heading']);
    $status = $db->con->real_escape_string($_POST['status']);
    $mtitle = $db->con->real_escape_string($_POST['mtitle']);
    $mkeyword = $db->con->real_escape_string($_POST['mkeyword']);
    $mdesc = $db->con->real_escape_string($_POST['mdesc']);
    $cstyle = $db->con->real_escape_string($_POST['cstyle']);
    $ads1 = $_POST['ad1'];
    $ads2 = $_POST['ad2'];
    $c1 = $_POST['c1'];
    $c2 = $_POST['c2'];
    $alt = $_POST['alt'];
    if(isset($_POST['eslider'])){
        $eslider = $db->con->real_escape_string($_POST['eslider']);
    }
    $special = $_POST['special'];
    $user = $_SESSION['admin'];
    $fb = @$_POST['fb'];
    $in = @$_POST['in'];
    $pi = @$_POST['pi'];
    $go = @$_POST['go'];
    $tw = @$_POST['tw'];
    $li = @$_POST['li'];

    $storeImgPath = "";
    $sql = $db->con->prepare("SELECT s_image FROM tbl_stores WHERE s_id=?");
    $sql->bind_param("s",$EditId);
    $sql->bind_result($storeImage);
    $sql->execute();
    $sql->fetch();
    $sql->close();

    if(!empty($_FILES['file']['name'])){

        unlink("uploads/storeImage/".$storeImage);

        $img = explode(".",$_FILES['file']['name']);
        $storeImgPath = md5(rand()).".".end($img);
        $path = "uploads/storeImage/".$storeImgPath;
        move_uploaded_file($_FILES['file']['tmp_name'],$path);
    }
    else{
        $storeImgPath = $storeImage;
    }

    $fields = [
        "s_name = ?",
        "s_popular = ?",
        "s_disablelink = ?",
        "s_link = ?",
        "s_country = ?",
        "s_cat = ?",
        "s_sub_cat = ?",
        "s_tags = ?",
        "s_image = ?",
        "s_image_alt = ?",
        "s_heading = ?",
        "s_description = ?",
        "s_specialcontent = ?",
        "s_m_title = ?",
        "s_m_desc = ?",
        "s_m_keyword = ?",
        "s_status = ?",
        "s_slider = ?",
        "s_cstyle = ?",
        "ad1 = ?",
        "ad2 = ?",
        "c1 = ?",
        "c2 = ?",
        "s_user = ?"
    ];
    $val = [$name,$popular,$disablelink,$storelink,$country,$cat,$sub,
    $tag,$storeImgPath,$alt,$heading,$description,$special,$mtitle,
    $mdesc,$mkeyword,$status,$eslider,$cstyle,$ads1,$ads2,$c1,$c2,$user,$EditId];
    $up = $db->Update_record(['tbl_stores','s_id'],$fields,$val);

    if($up == true){

        if($fb != "" || $in != "" || $pi != "" || $go != "" || $tw != "" || $li != ""){

            $field = [
                "so_facebook = ?",
                "so_instagram = ?",
                "so_twitter = ?",
                "so_linkdin = ?",
                "so_pintrest = ?",
                "so_google = ?"
            ];
            $val = [$fb,$in,$tw,$li,$pi,$go,$EditId];
            $re = $db->Update_record(['tbl_social','so_store'],$field,$val);
        }

        $total = count($_FILES['sfile']['name']);

        for ($i=0; $i < $total; $i++) { 
        
        if(!empty($_FILES['sfile']['tmp_name'][$i])){

            for ($i=0; $i < $total; $i++) { 
                
                $file_ext = explode(".",$_FILES['sfile']['name'][$i]);
                $file_name = md5(rand()).'.'.end($file_ext);
                $file_path = "uploads/sliderImage/".$file_name;
                move_uploaded_file($_FILES['sfile']['tmp_name'][$i],$file_path);

                $sql = $db->con->prepare("INSERT INTO tbl_slider (img_link,img_s_id) VALUES (?,?)");
                $sql->bind_param("ss",$file_name,$EditId);
                $sql->execute();

            }

        }
    }
        

    $_SESSION['msg'] = "Store Details Update Successfully";

    }
    else{
        $_SESSION['msg'] = "Error While Updating Store Details";
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
        Store
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
        <li><a href="#"><i class="fa fa-dashboard"></i> Store</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border" style="background-color: #3c8dbc; color:#ffffff">
          <h3 class="box-title">Add Store</h3>
          
        </div>
            <form method="post" enctype="multipart/form-data">
        <div class="box-body">

        <div id="myDiv" style="width:100%; margin:0px auto; margin-top:3%;">

        <div class="col-md-12">

        <div class="col-md-6">
            <label class="control-label">Store Name</label>
            <input type="text" class="form-control" value="<?php echo @$name; ?>" required placeholder="Store Name" name="name">
            <br>
        </div>
        

        <div class="col-md-6">
            <label class="control-label">Disable Link</label>
            <input type="text" class="form-control" value="<?php echo @$disableLink; ?>" required placeholder="Heading" name="disablelink">
            <br>
        </div>
        </div>


        <div class="col-md-12">

        <div class="col-md-6">
            <label class="control-label">Store Link</label>
            <input type="text" class="form-control" value="<?php echo @$storeLink; ?>" required placeholder="Store Link" name="storelink">
            <br>
        </div>
        

        <div class="col-md-6">
            <label class="control-label">Tags</label>
            <select class="form-control select2" multiple="multiple" name="tags[]" required data-placeholder="Tags"
                        style="width: 100%;">
                        <option></option>
                        <?php
                if(@$_GET['Edit']){
                    $tag = explode(",",$tags);
                foreach ($tag as $t) {
                    $q = $db->con->prepare("SELECT t_id,t_name FROM tbl_tags WHERE t_id = ?");
                    $q->bind_param("s",$t);
                    $q->bind_result($tag_id,$tag_name);
                    $q->execute();
                    while($q->fetch()){
                        print_r($tag_id);
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
            <br>
        </div>
        </div>

        <div class="col-md-12">
        
        <div class="col-md-2">
            <label class="control-label">Popular Store</label><br>
            <input type="checkbox" value="1" name="popular" <?php echo (@$popular == "1") ? "checked" : ""; ?>/>
            <br>
        </div>

        <div class="col-md-5">
            <label class="control-label">Country</label>
            <!--<input type="text" class="form-control" value="<?php //echo @$country; ?>" required placeholder="Country" name="country">-->
            <select class="form-control select2" name="country" data-placeholder="Select Country" required>
            <?php 
                echo (@isset($_GET['Edit']) ? "<option selected>".$country."</option>" : "");
                ?>
                <option></option>
                <option value="Afganistan">Afghanistan</option>
                <option value="Albania">Albania</option>
                <option value="Algeria">Algeria</option>
                <option value="American Samoa">American Samoa</option>
                <option value="Andorra">Andorra</option>
                <option value="Angola">Angola</option>
                <option value="Anguilla">Anguilla</option>
                <option value="Antigua & Barbuda">Antigua & Barbuda</option>
                <option value="Argentina">Argentina</option>
                <option value="Armenia">Armenia</option>
                <option value="Aruba">Aruba</option>
                <option value="Australia">Australia</option>
                <option value="Austria">Austria</option>
                <option value="Azerbaijan">Azerbaijan</option>
                <option value="Bahamas">Bahamas</option>
                <option value="Bahrain">Bahrain</option>
                <option value="Bangladesh">Bangladesh</option>
                <option value="Barbados">Barbados</option>
                <option value="Belarus">Belarus</option>
                <option value="Belgium">Belgium</option>
                <option value="Belize">Belize</option>
                <option value="Benin">Benin</option>
                <option value="Bermuda">Bermuda</option>
                <option value="Bhutan">Bhutan</option>
                <option value="Bolivia">Bolivia</option>
                <option value="Bonaire">Bonaire</option>
                <option value="Bosnia & Herzegovina">Bosnia & Herzegovina</option>
                <option value="Botswana">Botswana</option>
                <option value="Brazil">Brazil</option>
                <option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
                <option value="Brunei">Brunei</option>
                <option value="Bulgaria">Bulgaria</option>
                <option value="Burkina Faso">Burkina Faso</option>
                <option value="Burundi">Burundi</option>
                <option value="Cambodia">Cambodia</option>
                <option value="Cameroon">Cameroon</option>
                <option value="Canada">Canada</option>
                <option value="Canary Islands">Canary Islands</option>
                <option value="Cape Verde">Cape Verde</option>
                <option value="Cayman Islands">Cayman Islands</option>
                <option value="Central African Republic">Central African Republic</option>
                <option value="Chad">Chad</option>
                <option value="Channel Islands">Channel Islands</option>
                <option value="Chile">Chile</option>
                <option value="China">China</option>
                <option value="Christmas Island">Christmas Island</option>
                <option value="Cocos Island">Cocos Island</option>
                <option value="Colombia">Colombia</option>
                <option value="Comoros">Comoros</option>
                <option value="Congo">Congo</option>
                <option value="Cook Islands">Cook Islands</option>
                <option value="Costa Rica">Costa Rica</option>
                <option value="Cote DIvoire">Cote DIvoire</option>
                <option value="Croatia">Croatia</option>
                <option value="Cuba">Cuba</option>
                <option value="Curaco">Curacao</option>
                <option value="Cyprus">Cyprus</option>
                <option value="Czech Republic">Czech Republic</option>
                <option value="Denmark">Denmark</option>
                <option value="Djibouti">Djibouti</option>
                <option value="Dominica">Dominica</option>
                <option value="Dominican Republic">Dominican Republic</option>
                <option value="East Timor">East Timor</option>
                <option value="Ecuador">Ecuador</option>
                <option value="Egypt">Egypt</option>
                <option value="El Salvador">El Salvador</option>
                <option value="Equatorial Guinea">Equatorial Guinea</option>
                <option value="Eritrea">Eritrea</option>
                <option value="Estonia">Estonia</option>
                <option value="Ethiopia">Ethiopia</option>
                <option value="Falkland Islands">Falkland Islands</option>
                <option value="Faroe Islands">Faroe Islands</option>
                <option value="Fiji">Fiji</option>
                <option value="Finland">Finland</option>
                <option value="France">France</option>
                <option value="French Guiana">French Guiana</option>
                <option value="French Polynesia">French Polynesia</option>
                <option value="French Southern Ter">French Southern Ter</option>
                <option value="Gabon">Gabon</option>
                <option value="Gambia">Gambia</option>
                <option value="Georgia">Georgia</option>
                <option value="Germany">Germany</option>
                <option value="Ghana">Ghana</option>
                <option value="Gibraltar">Gibraltar</option>
                <option value="Great Britain">Great Britain</option>
                <option value="Greece">Greece</option>
                <option value="Greenland">Greenland</option>
                <option value="Grenada">Grenada</option>
                <option value="Guadeloupe">Guadeloupe</option>
                <option value="Guam">Guam</option>
                <option value="Guatemala">Guatemala</option>
                <option value="Guinea">Guinea</option>
                <option value="Guyana">Guyana</option>
                <option value="Haiti">Haiti</option>
                <option value="Hawaii">Hawaii</option>
                <option value="Honduras">Honduras</option>
                <option value="Hong Kong">Hong Kong</option>
                <option value="Hungary">Hungary</option>
                <option value="Iceland">Iceland</option>
                <option value="Indonesia">Indonesia</option>
                <option value="India">India</option>
                <option value="Iran">Iran</option>
                <option value="Iraq">Iraq</option>
                <option value="Ireland">Ireland</option>
                <option value="Isle of Man">Isle of Man</option>
                <option value="Israel">Israel</option>
                <option value="Italy">Italy</option>
                <option value="Jamaica">Jamaica</option>
                <option value="Japan">Japan</option>
                <option value="Jordan">Jordan</option>
                <option value="Kazakhstan">Kazakhstan</option>
                <option value="Kenya">Kenya</option>
                <option value="Kiribati">Kiribati</option>
                <option value="Korea North">Korea North</option>
                <option value="Korea Sout">Korea South</option>
                <option value="Kuwait">Kuwait</option>
                <option value="Kyrgyzstan">Kyrgyzstan</option>
                <option value="Laos">Laos</option>
                <option value="Latvia">Latvia</option>
                <option value="Lebanon">Lebanon</option>
                <option value="Lesotho">Lesotho</option>
                <option value="Liberia">Liberia</option>
                <option value="Libya">Libya</option>
                <option value="Liechtenstein">Liechtenstein</option>
                <option value="Lithuania">Lithuania</option>
                <option value="Luxembourg">Luxembourg</option>
                <option value="Macau">Macau</option>
                <option value="Macedonia">Macedonia</option>
                <option value="Madagascar">Madagascar</option>
                <option value="Malaysia">Malaysia</option>
                <option value="Malawi">Malawi</option>
                <option value="Maldives">Maldives</option>
                <option value="Mali">Mali</option>
                <option value="Malta">Malta</option>
                <option value="Marshall Islands">Marshall Islands</option>
                <option value="Martinique">Martinique</option>
                <option value="Mauritania">Mauritania</option>
                <option value="Mauritius">Mauritius</option>
                <option value="Mayotte">Mayotte</option>
                <option value="Mexico">Mexico</option>
                <option value="Midway Islands">Midway Islands</option>
                <option value="Moldova">Moldova</option>
                <option value="Monaco">Monaco</option>
                <option value="Mongolia">Mongolia</option>
                <option value="Montserrat">Montserrat</option>
                <option value="Morocco">Morocco</option>
                <option value="Mozambique">Mozambique</option>
                <option value="Myanmar">Myanmar</option>
                <option value="Nambia">Nambia</option>
                <option value="Nauru">Nauru</option>
                <option value="Nepal">Nepal</option>
                <option value="Netherland Antilles">Netherland Antilles</option>
                <option value="Netherlands">Netherlands (Holland, Europe)</option>
                <option value="Nevis">Nevis</option>
                <option value="New Caledonia">New Caledonia</option>
                <option value="New Zealand">New Zealand</option>
                <option value="Nicaragua">Nicaragua</option>
                <option value="Niger">Niger</option>
                <option value="Nigeria">Nigeria</option>
                <option value="Niue">Niue</option>
                <option value="Norfolk Island">Norfolk Island</option>
                <option value="Norway">Norway</option>
                <option value="Oman">Oman</option>
                <option value="Pakistan">Pakistan</option>
                <option value="Palau Island">Palau Island</option>
                <option value="Palestine">Palestine</option>
                <option value="Panama">Panama</option>
                <option value="Papua New Guinea">Papua New Guinea</option>
                <option value="Paraguay">Paraguay</option>
                <option value="Peru">Peru</option>
                <option value="Phillipines">Philippines</option>
                <option value="Pitcairn Island">Pitcairn Island</option>
                <option value="Poland">Poland</option>
                <option value="Portugal">Portugal</option>
                <option value="Puerto Rico">Puerto Rico</option>
                <option value="Qatar">Qatar</option>
                <option value="Republic of Montenegro">Republic of Montenegro</option>
                <option value="Republic of Serbia">Republic of Serbia</option>
                <option value="Reunion">Reunion</option>
                <option value="Romania">Romania</option>
                <option value="Russia">Russia</option>
                <option value="Rwanda">Rwanda</option>
                <option value="St Barthelemy">St Barthelemy</option>
                <option value="St Eustatius">St Eustatius</option>
                <option value="St Helena">St Helena</option>
                <option value="St Kitts-Nevis">St Kitts-Nevis</option>
                <option value="St Lucia">St Lucia</option>
                <option value="St Maarten">St Maarten</option>
                <option value="St Pierre & Miquelon">St Pierre & Miquelon</option>
                <option value="St Vincent & Grenadines">St Vincent & Grenadines</option>
                <option value="Saipan">Saipan</option>
                <option value="Samoa">Samoa</option>
                <option value="Samoa American">Samoa American</option>
                <option value="San Marino">San Marino</option>
                <option value="Sao Tome & Principe">Sao Tome & Principe</option>
                <option value="Saudi Arabia">Saudi Arabia</option>
                <option value="Senegal">Senegal</option>
                <option value="Seychelles">Seychelles</option>
                <option value="Sierra Leone">Sierra Leone</option>
                <option value="Singapore">Singapore</option>
                <option value="Slovakia">Slovakia</option>
                <option value="Slovenia">Slovenia</option>
                <option value="Solomon Islands">Solomon Islands</option>
                <option value="Somalia">Somalia</option>
                <option value="South Africa">South Africa</option>
                <option value="Spain">Spain</option>
                <option value="Sri Lanka">Sri Lanka</option>
                <option value="Sudan">Sudan</option>
                <option value="Suriname">Suriname</option>
                <option value="Swaziland">Swaziland</option>
                <option value="Sweden">Sweden</option>
                <option value="Switzerland">Switzerland</option>
                <option value="Syria">Syria</option>
                <option value="Tahiti">Tahiti</option>
                <option value="Taiwan">Taiwan</option>
                <option value="Tajikistan">Tajikistan</option>
                <option value="Tanzania">Tanzania</option>
                <option value="Thailand">Thailand</option>
                <option value="Togo">Togo</option>
                <option value="Tokelau">Tokelau</option>
                <option value="Tonga">Tonga</option>
                <option value="Trinidad & Tobago">Trinidad & Tobago</option>
                <option value="Tunisia">Tunisia</option>
                <option value="Turkey">Turkey</option>
                <option value="Turkmenistan">Turkmenistan</option>
                <option value="Turks & Caicos Is">Turks & Caicos Is</option>
                <option value="Tuvalu">Tuvalu</option>
                <option value="Uganda">Uganda</option>
                <option value="United Kingdom">United Kingdom</option>
                <option value="Ukraine">Ukraine</option>
                <option value="United Arab Erimates">United Arab Emirates</option>
                <option value="United States of America">United States of America</option>
                <option value="Uraguay">Uruguay</option>
                <option value="Uzbekistan">Uzbekistan</option>
                <option value="Vanuatu">Vanuatu</option>
                <option value="Vatican City State">Vatican City State</option>
                <option value="Venezuela">Venezuela</option>
                <option value="Vietnam">Vietnam</option>
                <option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
                <option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
                <option value="Wake Island">Wake Island</option>
                <option value="Wallis & Futana Is">Wallis & Futana Is</option>
                <option value="Yemen">Yemen</option>
                <option value="Zaire">Zaire</option>
                <option value="Zambia">Zambia</option>
                <option value="Zimbabwe">Zimbabwe</option>
            </select>
            <br>
        </div>

        <div class="col-md-5">
            <label class="control-label">Coupon Style</label>
            <select name="cstyle" class="form-control" required>
                <?php
                if(@$_GET['Edit']){
                    echo "<option>$style</option>";
                }
                ?>
                <option>Grid</option>
                <option>Card</option>
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
            
           
            @$pcat = explode(",",$cat);
            @$subcat = explode(",",$scat);
            
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
                    <input type='checkbox' name='subcategory[]' value='".$sid."' $r id='subcategory'/> 
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
            <textarea class="form-control" rows="11" required placeholder="Description" name="description"><?php echo @$des; ?></textarea>
            </div>
              </div>



              <div class="col-md-12" style="margin-top:2%">

            <div class="col-md-4">
                <label class="control-label">Store Image</label>
                <input type="file" class="form-control" name="file" <?php echo (isset($_GET['Edit'])) ? "" : "required"; ?>>
            </div>

            <div class="col-md-3">
                <label class="control-label">Image Alt</label>
                <input type="text" class="form-control" name="alt" value="<?php echo @$alt; ?>" placeholder="Image ALT" <?php echo (isset($_GET['Edit'])) ? "" : "required"; ?>/>
                <br>
            </div>

            <?php
        if(@$_GET['Edit']){

        $ch = ($slide == "1") ? "checked" : "";
        }
        ?>

            <div class="col-md-1">
            <label class="control-label">Enable Slider</label><br>
            <input type="checkbox" value="1" name="eslider" <?php echo @$ch; ?>/>
            <br>
            </div>


            <div class="col-md-4">
                <label class="control-label">Slider Images</label>
                <input type="file" class="form-control" name="sfile[]" multiple>
                <br>
            </div>
            </div>

            <?php

            if(@$_GET['Edit']){
?>

                <div class="col-md-12" style="margin-top:2%">

                <div class="col-md-6">
                    <img src="uploads/storeImage/<?php echo $image; ?>" style="width:100px; height:100px"/>
                    <br>
                </div>

                <div class="col-md-6">
                <?php 

                    $sql = $db->con->prepare("SELECT img_id,img_link,img_s_id FROM tbl_slider WHERE img_s_id=?");
                    $sql->bind_param("s",$id);
                    $sql->bind_result($idImg,$image,$imageId);
                    $sql->execute();
                    $sql->store_result();
                    if($sql->num_rows > 0){
                        while($sql->fetch()){

                     
                ?>
                <div class="col-md-3">

                <img src="uploads/sliderImage/<?php echo $image; ?>" style="width:100px; height:100px; border:black solid thin"/><br>
                <center><a href="javascript:void(0)" id="<?php echo $idImg; ?>" value="<?php echo $image; ?>" class="imgDel"><b>Delete</b></a></center>
                    <br><br>
                </div>

            <?php 
               }
            }
            ?>
</div>
                </div>

<?php } ?>

            <div class="col-md-12">

            <div class="col-md-6">
                <label class="control-label">Heading</label>
                <input type="text" class="form-control" value="<?php echo @$heading; ?>" required placeholder="Heading" name="heading">
                <br>
            </div>

        <div class="col-md-6">
            <label class="control-label">Store Status</label>
            <select class="form-control select2" name="status" required data-placeholder="Select Store Status">
            <option></option>
            <?php
            if(@$_GET['Edit']){
                if($status == "1"){
                    echo "<option value='1' selected>Enable</option>";
                }
                else{
                    echo "<option value='0' selected>Disable</option>";
                }
            }
            ?>
            <option value="1">Enable</option>
            <option value="0">Disable</option>
            </select>
            
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
        
        <div class="col-md-6">
        <label class="control-label">Adsense Code 760px</label>
        <textarea class="form-control" placeholder="Adsense Code 760px" name="ad1"><?php echo @$ad1; ?></textarea>
        <br>
        </div>

        <div class="col-md-6">
        <label class="control-label">Adsense Code 360px</label>
        <textarea class="form-control" placeholder="Adsense Code 360px" name="ad2"><?php echo @$ad2; ?></textarea>
        <br>
        </div>
        
        </div>


                
        <div class="col-md-12">
        
        <div class="col-md-6">
        <label class="control-label">Content 1</label>
        <textarea class="form-control" placeholder="Content 1" name="c1"><?php echo @$c1; ?></textarea>
        <br>
        </div>

        <div class="col-md-6">
        <label class="control-label">Content 2</label>
        <textarea class="form-control" placeholder="Content 2" name="c2"><?php echo @$c2; ?></textarea>
        <br><br>
        </div>
        
        </div>

        <div class="col-md-12">
        <div class="row text-center">
        <h4 class="text-center"><b>Store Social Links</b></h4>
        </div>
        <div class="col-md-12">

       <div class="col-md-2">
        <input type="url" name="fb" placeholder="Facebook" class="form-control" value="<?php echo @$sfb; ?>"/>
        </div>

        <div class="col-md-2">
        <input type="url" name="in" placeholder="Instagram" class="form-control" value="<?php echo @$sin; ?>"/>
        </div>

        <div class="col-md-2">
        <input type="url" name="pi" placeholder="Pinterest" class="form-control" value="<?php echo @$spi; ?>"/>
        </div>

        <div class="col-md-2">
        <input type="url" name="go" placeholder="Google-Plus" class="form-control" value="<?php echo @$sgo; ?>"/>
        </div>

        <div class="col-md-2">
        <input type="url" name="tw" placeholder="Twitter" class="form-control" value="<?php echo @$stw; ?>"/>
        </div>

        <div class="col-md-2">
        <input type="url" name="li" placeholder="Linkdin" class="form-control" value="<?php echo @$sli; ?>"/>
        </div>
        <br><br>
        </div>

       
        </div>
        <br> <br>

        <div class="col-md-12">
        <br>
        <div class="col-md-12">
            <label class="control-label">Special Content</label>
            <textarea class="tinymce" name="special"><?php echo @$special; ?></textarea>
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