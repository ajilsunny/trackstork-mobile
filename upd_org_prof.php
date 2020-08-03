<?php
include('helper.php');
  $con=con();
  date_default_timezone_set("Asia/Dubai");
  $date = date('H:i:s', time());
  $date2 = date('Y-m-d', time());
  $date3 = date('Y-m-d H:i:s', time());
//  print_r($_FILES);
//  print_r($_POST);
   if($_FILES['logo']['name']!="" && isset($_POST['oid'])){
      $errors= array();
      $file_name = $_FILES['logo']['name'];
      $file_size =$_FILES['logo']['size'];
      $file_tmp =$_FILES['logo']['tmp_name'];
      $file_type=$_FILES['logo']['type'];
      $exp=explode('.',$_FILES['logo']['name']);
      $end=end($exp);
      $file_ext=strtolower($end);
      
      $extensions= array("jpeg","jpg","png");
      
      if(in_array($file_ext,$extensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }
      
      if($file_size > 2097152){
         $errors[]='File size must be excately 2 MB';
      }
      
      if(empty($errors)==true){
          $oid=$_POST['oid'];
          $filename2="org_".$oid."_".time().".".$file_ext;
         move_uploaded_file($file_tmp,"uploads/".$filename2);
         $lgins=mysqli_query($con,"UPDATE `organization` SET `logo`='$filename2' WHERE `organization_id`=$oid");
        
      }else{
         print_r($errors);
         exit();
      }
   }
   $oid=$_POST['oid'];
  
   $cper=mysqli_real_escape_string($con,$_POST['c_per']);
   $email=mysqli_real_escape_string($con,$_POST['email']);
   $ph1=mysqli_real_escape_string($con,$_POST['phn1']);
   $ph2=mysqli_real_escape_string($con,$_POST['phn2']);
   $address=mysqli_real_escape_string($con,$_POST['address']);
   $upd=mysqli_query($con,"UPDATE `organization` SET `contact_person`='$cper',`contact_1`='$ph1',`contact_2`='$ph2',`email_id`='$email',`address`='$address',`updated_at`='$date3' WHERE `organization_id`=$oid");
if($upd){
    
    echo "<script>window.location.href='org_profile.php';</script>";
}

?>
<html>
<head>

<title>TrackStork</title>

<meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0, width=device-width"> 
<style>
.cd-header {
  position: relative;
  height: 100vh;
  
}

@media only screen and (min-width: 1170px) {
 .cd-header {
   height: 100vh;
  }
}

.logo { 
  width: 100%;
  height: 100%;
  float:left;
  text-align: center;
  padding:22.5px 0px 0px 10px;
}

.banner-1{
  float:right;
  padding:50px 40px;
  width:728px;
  height:90px;
}

@media screen and (max-width: 1100px) {
.logo {
    width: 100%;
    height: 100%;
    float: none;
    text-align: center;
    padding: 22.5px 0px 0px 0px; /*to make it exactly to the center*/
}
   .banner-1 {
    display: none;
  }

div.logo{
margin: 0 auto;
width: 250px;
}
}</style>
</head>
<body>

    <header class="cd-header">
		
		<div class="logo">
            <img src="assets/img/logo.png" alt="CRED" style="width:40%;position: absolute;top: 0;bottom: 0;margin: auto;left: 0;right: 0;"/>
		</div>
  

	
	</header>
  
</body>
</html>