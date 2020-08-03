<?php
 session_start();
include('helper.php');
require 'plugins\spreadsheet\vendor\autoload.php';
  $con=con();
  date_default_timezone_set("Asia/Dubai");
  $date = date('H:i:s', time());
  $date2 = date('Y-m-d', time());
  $date3 = date('Y-m-d H:i:s', time());
  $oid=$_SESSION['org'];
  $uid=$_SESSION['user_id'];
//  print_r($_FILES);
//  print_r($_POST);
   if($_FILES['excel']['name']!=""){
      $errors= array();
      $file_name = $_FILES['excel']['name'];
      $file_size =$_FILES['excel']['size'];
      $file_tmp =$_FILES['excel']['tmp_name'];
      $file_type=$_FILES['excel']['type'];
      $exp=explode('.',$_FILES['excel']['name']);
      $end=end($exp);
      $file_ext=strtolower($end);
      
      $extensions= array("xlsx");
      
      if(in_array($file_ext,$extensions)=== false){
         $errors[]="extension not allowed, please choose a XLSX file.";
      }
      
      if($file_size > 2097152){
         $errors[]='File size must be excately 2 MB';
      }
      
      if(empty($errors)==true){
//         $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
// $spreadsheet = $reader->load($file_tmp);


//use PhpOffice\PhpSpreadsheet\IOFactory;


$inputFileName =$file_tmp;
//$helper->log('Loading file ' . pathinfo($inputFileName, PATHINFO_BASENAME) . ' using IOFactory to identify the format');
$spreadsheet = PhpOffice\PhpSpreadsheet\IOFactory::load($inputFileName);
$sheetData = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);
//var_dump($sheetData);
$qrw=0;
foreach($sheetData as $srow){

  if($qrw>0 && !empty($srow['A'])) {
    $c_name=$srow['A'];
    $cnum=$srow['B'];
    $order_num=$srow['C'];
    $remarks=$srow['D'];

    $ccheck=mysqli_query($con,"SELECT * FROM `customer` WHERE `cust_name`='$c_name' AND `org_id`='$oid' ");
    if(mysqli_num_rows($ccheck)==1) {
      $customer = mysqli_fetch_array($ccheck);
      $cust_id = $customer['cust_id'];
      $uid = $_SESSION['user_id'];

      date_default_timezone_set("Asia/Dubai");
      $date = date('H:i:s', time());
      $date2 = date('Y-m-d', time());
      $date3 = date('Y-m-d H:i:s', time());

      $check_order = mysqli_query($con,"SELECT * FROM `despatch` WHERE `order_no`='$order_num' AND `customer_id`='$cust_id' ");
      $num_orders = mysqli_num_rows($check_order);
      if($num_orders<1) {

        $desp_entry=mysqli_query($con,"INSERT INTO `despatch`(`customer_id`, `order_no`, `remarks`, `despatch_import_timestamp`, `imported_by`) VALUES ('$cust_id','$order_num','$remarks','$date3','$uid')");
        
      }
    }

  }
  $qrw++;
}
echo "<script>window.location.href='despatch.php';</script>";
        //   $oid=$_POST['oid'];
        //   $filename2="org_".$oid."_".time().".".$file_ext;
        //  move_uploaded_file($file_tmp,"uploads/".$filename2);
        //  $lgins=mysqli_query($con,"UPDATE `organization` SET `logo`='$filename2' WHERE `organization_id`=$oid");
        
      }else{
         print_r($errors);
         exit();
      }
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