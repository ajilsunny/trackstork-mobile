<?php
   
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
// print_r(login("sudo","sudo"));
function con() {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $db = "trackstork";
    // $servername = "mysql.tlmtcs.com";
    // $username = "xidiva";
    // $password = "X1d1v@99";
    // $db = "beatroute_app"; 
    // Create connection
    $conn = new mysqli($servername, $username, $password,$db);
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
 }
return $conn;

}

function login($unm,$pwd){
    $con=con();

    $unm=mysqli_real_escape_string($con, $unm);
    $pwd=mysqli_real_escape_string($con, $pwd);
    $pwd=md5($pwd);
    
     $sql="SELECT `user_id`, `name`, `user_type`, `reference_id`, `organization_id` FROM `tbl_user` WHERE `username`='$unm' and md5(`password`)='$pwd'";
    
    
    $stmt = mysqli_query($con,$sql);
    
    $user = mysqli_fetch_array($stmt);
    session_start();
    // Verify user password and set $_SESSION
    if ( mysqli_num_rows($stmt)>0) {
  
    $_SESSION['user_id'] = $user['user_id'];
    $_SESSION['name'] = $user['name'];
    $_SESSION['type'] = $user['user_type'];
    $_SESSION['ref'] = $user['reference_id'];
    $_SESSION['org'] = $user['organization_id'];
    if($user['user_type']==0){
      return 11;
    }else{
      return 1;
    }
  //  return 1;
    }else{
    return 0;
  }
}

function create_org($name,$cper,$email,$cnt,$username,$password){
  $con=con();
  date_default_timezone_set("Asia/Dubai"); 
  $date = date('H:i:s', time());
  $date2 = date('Y-m-d', time());
  $date3 = date('Y-m-d H:i:s', time());

  $name=mysqli_real_escape_string($con, $name);
  $cper=mysqli_real_escape_string($con, $cper);
  $email=mysqli_real_escape_string($con, $email);
  $cnt=mysqli_real_escape_string($con, $cnt);

  $unm=mysqli_real_escape_string($con, $username);
  $pwd=mysqli_real_escape_string($con, $password);
  $cntl=mysqli_query($con,"SELECT * FROM `tbl_user` WHERE `username`='$unm'");
  if(mysqli_num_rows($cntl)<1){
   $sql="INSERT INTO `organization`(`organization_name`, `contact_person`,  `email_id`,`rl`, `created_at`, `updated_at`) VALUES ('$name','$cper','$email',$cnt,'$date3','$date3')";
 
  
  $stmt = mysqli_query($con,$sql);

      
  // Verify user password and set $_SESSION
  if ( $stmt) {
    $lid=mysqli_insert_id($con);
    $crt=mysqli_query($con,"INSERT INTO `tbl_user`( `name`, `username`, `password`, `user_type`, `reference_id`, `organization_id`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES ('$name','$unm','$pwd',1,$lid,$lid,'$date3',0,'$date3',0)");
if($crt){
  return 1;
}else{
  return 0;
}
  
  }else{
  return 0;
}
  }else{
    return 2;
  }
}


function edit_org($oid,$name,$cper,$email,$cnt,$username,$password){
  $con=con();
  date_default_timezone_set("Asia/Dubai");
  $date = date('H:i:s', time());
  $date2 = date('Y-m-d', time());
  $date3 = date('Y-m-d H:i:s', time());

  $name=mysqli_real_escape_string($con, $name);
  $cper=mysqli_real_escape_string($con, $cper);
  $email=mysqli_real_escape_string($con, $email);
  $cnt=mysqli_real_escape_string($con, $cnt);

  $unm=mysqli_real_escape_string($con, $username);
  $pwd=mysqli_real_escape_string($con, $password);
  $cntl=mysqli_query($con,"SELECT * FROM `tbl_user` WHERE`organization_id`<>$oid and `username`='$unm'");
  if(mysqli_num_rows($cntl)<1){
   $sql="UPDATE `organization` SET `organization_name`='$name',`contact_person`='$cper',`email_id`='$email',`rl`=$cnt,`updated_at`='$date3' WHERE `organization_id`=$oid";
 
  
  $stmt = mysqli_query($con,$sql);

      
  // Verify user password and set $_SESSION
  if ( $stmt) {
    $lid=mysqli_insert_id($con);
    $crt=mysqli_query($con,"UPDATE `tbl_user` SET `name`='$name',`username`='$unm',`password`='$pwd',`updated_at`='$date3'WHERE `organization_id`=$oid and`user_type`=1");
if($crt){
  return 1;
}else{
  return 0;
}
  
  }else{
  return 0;
}
  }else{
    return 2;
  }
}


function getorgs(){
  $con=con();

 
  
   $sql="SELECT o.`organization_id`,o.`organization_name`,o.`contact_person`,o.`email_id`,o.`rl`, u.`username`,u.`password` FROM `organization` o,`tbl_user` u WHERE u.`organization_id`=o.`organization_id` and u.`user_type`=1";
  
  
  $stmt = mysqli_query($con,$sql);
  $res=array();
  while($user = mysqli_fetch_assoc($stmt)){
$res[]=$user;
  }
      

  return json_encode($res);
 

  
}

function getcust(){
  $con=con();
  session_start();
  $oid=$_SESSION['org'];
  
   $sql="SELECT `cust_id`,`cust_name`,`cust_num`,`contact_person`,`mobile`,`email` FROM `customer` WHERE `org_id`=$oid";
  
  
  $stmt = mysqli_query($con,$sql);
  $res=array();
  while($user = mysqli_fetch_assoc($stmt)){
$res[]=$user;
  }
      

  return json_encode($res);;
 

  
}


function del_org($oid){
  $con=con();

 
  
   $sql="DELETE FROM `organization` WHERE `organization_id`=$oid";
  
  
  $stmt = mysqli_query($con,$sql);
  if($stmt){
    $duser=mysqli_query($con,"DELETE FROM `tbl_user` WHERE `organization_id`=$oid");
    if($duser){
      return 1;
    }else{
      return 0;
    }
  }else{
    return 0;
  }
}


function cust($isedit,$vid,$name,$c_num,$cper,$email,$ph1,$ph2,$adr,$lat,$lon){
  $con=con();
  date_default_timezone_set("Asia/Dubai");
  $date = date('H:i:s', time());
  $date2 = date('Y-m-d', time());
  $date3 = date('Y-m-d H:i:s', time());
  session_start();
  $oid=$_SESSION['org'];
  $uid=$_SESSION['user_id'];
  $vid=mysqli_real_escape_string($con, $vid);
  $name=mysqli_real_escape_string($con, $name);
  $c_num=mysqli_real_escape_string($con, $c_num);
  $cper=mysqli_real_escape_string($con, $cper);
  $email=mysqli_real_escape_string($con, $email);
  $ph1=mysqli_real_escape_string($con, $ph1);
  $ph2=mysqli_real_escape_string($con, $ph2);
  $adr=mysqli_real_escape_string($con, $adr);
  $lat=mysqli_real_escape_string($con, $lat);
  $lon=mysqli_real_escape_string($con, $lon); 
  $cntl=mysqli_query($con,"SELECT * FROM `customer` WHERE `cust_id`<>$vid AND `cust_name`='$name'");
  if(mysqli_num_rows($cntl)<1){
   $sql="INSERT INTO `customer`( `cust_name`,`cust_num`, `contact_person`, `mobile`, `phone`, `email`, `address`, `latitude`, `longitude`, `org_id`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES ('$name','$c_num','$cper','$ph1','$ph2','$email','$adr','$lat','$lon',$oid,$uid,'$date3',$uid,'$date3')";
    if($isedit=="1"){
      $sql="UPDATE `customer` SET `cust_name`='$name',`cust_num`='$c_num',`contact_person`='$cper',`mobile`='$ph1',`phone`='$ph2',`email`='$email',`address`='$adr',`latitude`='$lat',`longitude`='$lon',`updated_by`=$uid,`updated_at`='$date3' WHERE `cust_id`=$vid";
    }
  
  $stmt = mysqli_query($con,$sql);

      
  // Verify user password and set $_SESSION
  if ( $stmt) {

  return 1;

  
  }else{
  return 0;
}
  }else{
    return 2;
  }
}

function del_cust($oid){
  $con=con();

   $sql="DELETE FROM `customer` WHERE `cust_id`=$oid";
  
  
  $stmt = mysqli_query($con,$sql);
  if($stmt){
  
      return 1;
  
  }else{
    return 0;
  }
}

function veh($isedit,$vid,$reg,$make,$model){
  $con=con();
  date_default_timezone_set("Asia/Dubai");
  $date = date('H:i:s', time());
  $date2 = date('Y-m-d', time());
  $date3 = date('Y-m-d H:i:s', time());
  session_start();
  $oid=$_SESSION['org'];
  $uid=$_SESSION['user_id'];
  $reg=mysqli_real_escape_string($con, $reg);
  $make=mysqli_real_escape_string($con, $make);
  $model=mysqli_real_escape_string($con, $model);

  $cntl=mysqli_query($con,"SELECT * FROM `vehicle` WHERE `vehicle_id`<>$vid and `registration`='$reg'");
  if(mysqli_num_rows($cntl)<1){
   $sql="INSERT INTO `vehicle`(`registration`, `make`, `model`, `org_id`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES ('$reg','$make','$model',$oid,$uid,'$date3',$uid,'$date3')";
 if($isedit=="1"){
  $sql="UPDATE `vehicle` SET `registration`='$reg',`make`='$make',`model`='$model',`updated_by`=$uid,`updated_at`='$date3' WHERE `vehicle_id`=$vid";
 }
  
  $stmt = mysqli_query($con,$sql);

      
  // Verify user password and set $_SESSION
  if ( $stmt) {
    if($isedit!="1"){
      $lid=mysqli_insert_id($con);
      $mdf=md5($lid);
     $vdc=mysqli_query($con,"UPDATE `vehicle` SET `vcode`='$mdf' WHERE `vehicle_id`=$lid");
    }
  return 1;

  
  }else{
  return 0;
}
  }else{
    return 2;
  }
}

function getveh(){
  $con=con();
  session_start();
  $oid=$_SESSION['org'];
  $user=$_SESSION['user_id'];
  
  $sql="SELECT `vehicle_id`,`registration`,`make`,`model`,`vcode` FROM `vehicle` WHERE `created_by`='$user'AND `org_id`=$oid";
  
  $stmt = mysqli_query($con,$sql);
  $res=array();
  while($user = mysqli_fetch_assoc($stmt)){
  $res[]=$user;
  }
  return json_encode($res);
}

function del_veh($oid){
  $con=con();

  $sql="DELETE FROM `vehicle` WHERE `vehicle_id`=$oid";
  
  $stmt = mysqli_query($con,$sql);
  if($stmt){
  
      return 1;
  
  }else{
    return 0;
  }
}

function driv($isedit,$did,$name,$phone,$address,$uname,$pwd,$sales,$delivery){
  $con=con();
  date_default_timezone_set("Asia/Dubai");
  $date = date('H:i:s', time());
  $date2 = date('Y-m-d', time());
  $date3 = date('Y-m-d H:i:s', time());
  session_start();
  $oid=$_SESSION['org'];
  $uid=$_SESSION['user_id'];
  $did = mysqli_real_escape_string($con, $did);
  $name=mysqli_real_escape_string($con, $name);
  $phone=mysqli_real_escape_string($con, $phone);
  $address=mysqli_real_escape_string($con, $address);
  $uname=mysqli_real_escape_string($con, $uname);
  $pwd=mysqli_real_escape_string($con, $pwd);
  $sales=mysqli_real_escape_string($con, $sales);
  $delivery=mysqli_real_escape_string($con, $delivery);

  $cntl=mysqli_query($con,"SELECT * FROM `tbl_user` WHERE `username`='$uname' AND `reference_id`!='$did'");

  if(mysqli_num_rows($cntl)<1){
   
  if($isedit=="1"){
    $sql="UPDATE `driver` SET `name`='$name',`phone`='$phone',`address`='$address',`sales`='$sales',`delivery`='$delivery',`updated_by`='$uid',`updated_at`='$date3' WHERE `id`=$did ";

    $select_user = mysqli_query($con,"SELECT `user_id` FROM `tbl_user` WHERE `reference_id`='$did'");
    $user=mysqli_fetch_array($select_user);
    $user_id = $user['user_id'];
    $update_user=mysqli_query($con,"UPDATE `tbl_user` SET `name`='$name',`username`='$uname',`password`='$pwd',`updated_at`='$date3',`updated_by`='$uid' WHERE `user_id`='$user_id'" );
  } else{
    $sql="INSERT INTO `driver`(`org_id`, `name`, `phone`, `address`, `sales`, `delivery`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES ('$oid','$name','$phone','$address','$sales','$delivery','$uid','$date3','$uid','$date3')";
    
  }
  
  $stmt = mysqli_query($con,$sql);

  // Verify user password and set $_SESSION
  if ( $stmt) {
    if($isedit!="1"){
      $lid=mysqli_insert_id($con);
      $sql_user = mysqli_query($con,"INSERT INTO `tbl_user`(`name`, `username`, `password`, `user_type`, `reference_id`, `organization_id`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES ('$name','$uname','$pwd','2','$lid','$oid','$date3','$uid','$date3','$uid')");
    }
  return 1;

  }else{
  return 0;
}
  }else{
    return 2;
  }
}

function getDriver(){
  $con=con();
  session_start();
  $user=$_SESSION['user_id'];
  $oid=$_SESSION['org'];
  $res=[];
  
  $sql="SELECT * FROM `driver` JOIN `tbl_user` ON driver.id=tbl_user.reference_id WHERE `driver`.`created_by`='$user' AND `org_id`='$oid' ";
  
  $stmt = mysqli_query($con,$sql);
  
  while($driver = mysqli_fetch_assoc($stmt)) {
    $res[]=$driver;
  }
  return json_encode($res);
}


function delDriver($driver_id){
  $con=con();
  session_start();
  $oid=$_SESSION['org'];

  $sql="DELETE FROM `driver` WHERE `id`=$driver_id";
  $del_user = mysqli_query($con,"DELETE FROM `tbl_user` WHERE `reference_id`='$driver_id' && `organization_id`='$oid' ");
  
  $stmt = mysqli_query($con,$sql);
  if($stmt){
    if($del_user){
  
      return 1;
    }
  
  }else{
    return 0;
  }
}

function getUser() {
  session_start();
  $oid=$_SESSION['org'];
  $con = con();
  $res=[];
  $sql = mysqli_query($con,"SELECT * FROM `profile` JOIN `tbl_user` ON profile.profile_id=tbl_user.reference_id WHERE `organization_id`='$oid' AND `user_type`='2' ");
  while($row=mysqli_fetch_assoc($sql)){
    $res[]=$row;
  }
  return json_encode($res);
}
function delUser($user_id,$profile_id) {
  session_start();
  $con = con();
  $oid = $_SESSION['org'];
  $sql1 = mysqli_query($con,"DELETE FROM `profile` WHERE `profile_id`='$profile_id' ");
  $sql2 = mysqli_query($con,"DELETE FROM `tbl_user` WHERE `user_id`='$user_id' ");

  if($sql1 && $sql2){
    return 1;
  }
}

function changePassword($old_pwd,$new_pwd){

  if($old_pwd){
    session_start();
    $con = con();
    $user_id=$_SESSION['user_id'];
    $org_id=$_SESSION['org'];
    $sql = mysqli_query($con,"SELECT `password` FROM `tbl_user` WHERE `password`='$old_pwd' AND `user_id`='$user_id' ");
    $num_row = mysqli_num_rows($sql);

    if($num_row == 1 ){
      $upd_pwd = mysqli_query($con,"UPDATE `tbl_user` SET `password`='$new_pwd' WHERE `user_id`='$user_id' ");
      if($upd_pwd){
        echo 1;
      } else {
        echo 0;
      }
    }
  }
}

function getDespatch() {
  session_start();
  $con = con();
  $uid = $_SESSION['user_id'];
  $oid = $_SESSION['org'];
  $res= [];
  $sql = mysqli_query($con,"SELECT * FROM despatch JOIN customer ON despatch.customer_id = customer.cust_id WHERE `imported_by` = '$uid' AND `org_id`='$oid'  ");
  while($desp_data = mysqli_fetch_assoc($sql)) {
    $desp_id = $desp_data['despatch_id'];
    $sql_assigned = mysqli_query($con,"SELECT * FROM `waytrip_items` WHERE `despatch_id`= $desp_id");
    $k=0;
    if(mysqli_num_rows($sql_assigned)>0) {
      $k=1;
    }
    $desp_data['flag']=$k;
    $res []= $desp_data;
  }
  return json_encode($res);
}

function delDespatch($did) {
  session_start();
  $con = con();
  $uid = $_SESSION['user_id'];
  $sql = mysqli_query($con,"DELETE FROM `despatch` WHERE `despatch_id`='$did' AND `imported_by` = '$uid' ");
  if($sql){
    return 1;
  }
}
function addDespatch($customer,$order_num,$remarks){
  session_start();
  $con = con();
  $oid = $_SESSION['org'];
  $uid = $_SESSION['user_id'];
  $customer = mysqli_real_escape_string($con,$customer);
  $order_num = mysqli_real_escape_string($con,$order_num);
  $remarks = mysqli_real_escape_string($con,$remarks);

    if($customer) {

      date_default_timezone_set("Asia/Dubai");
      $date = date('H:i:s', time());
      $date2 = date('Y-m-d', time());
      $date3 = date('Y-m-d H:i:s', time());

      $check_order = mysqli_query($con,"SELECT * FROM `despatch` WHERE `order_no`='$order_num' AND `customer_id`='$customer' ");
      $num_orders = mysqli_num_rows($check_order);
      if($num_orders<1) {

        $desp_entry=mysqli_query($con,"INSERT INTO `despatch`(`customer_id`, `order_no`, `remarks`, `despatch_import_timestamp`, `imported_by`) VALUES ('$customer','$order_num','$remarks','$date3','$uid')");
        
      }
    }
    return 1;
}

function assignDespatch($desp_id,$driver_id) {
  session_start();
  $con = con();
  $uid = $_SESSION['user_id'];

  date_default_timezone_set("Asia/Dubai");
  $date = date('H:i:s', time());
  $date2 = date('Y-m-d', time());
  $date3 = date('Y-m-d H:i:s', time());

  $driver_id = mysqli_real_escape_string($con,$driver_id);
  $num_order = count($desp_id);

  $sql = mysqli_query($con,"INSERT INTO `waytrip`(`date`, `driver_id`, `total_orders`,`assigned_by`, `assigned_at`) VALUES('$date2','$driver_id','$num_order','$uid','$date3')");
  if($sql) {
    $waytrip_id = mysqli_insert_id($con);

    foreach($desp_id as $did) {

      $des_id = mysqli_real_escape_string($con,$did);
  
      $submit_items = mysqli_query($con,"INSERT INTO `waytrip_items`(`waytrip_id`, `despatch_id`) VALUES ('$waytrip_id','$des_id')");
      
      
    }
    return 1;
}
  
}

function getWaytrips() {
  session_start();
  $con = con();
  $uid = $_SESSION['user_id'];
  $oid = $_SESSION['org'];
  $res = [];
  $sql = mysqli_query($con,"SELECT * FROM `waytrip` INNER JOIN `driver` ON waytrip.`driver_id`=driver.`id` WHERE `trip_completed`='false' AND `assigned_by`= '$uid' ");
  while($desp_data = mysqli_fetch_assoc($sql)) {
    $route = mysqli_query($con,"SELECT * FROM `route` WHERE `waytrip_id` = ".$desp_data['waytrip_id'] );
    $is_route = mysqli_num_rows($route);
    
    $desp_data['is_route'] = $is_route;
    $res []= $desp_data;
    
  }
  return json_encode($res);
}
function deleteWaytrip($wid){
  session_start();
  $uid = $_SESSION['user_id'];
  $oid = $_SESSION['org'];
  $con=con();
  $wid = mysqli_real_escape_string($con,$wid);
  $sql = mysqli_query($con,"DELETE FROM `waytrip` WHERE `waytrip_id`='$wid' AND `assigned_by` = '$uid' ");
  
  if($sql){
    $wtItems = mysqli_query($con,"DELETE FROM `waytrip_items` WHERE `waytrip_id` =  '$wid' ");
    if($wtItems){
      return 1;
    }
  }
}
function getWaytripItems($wid) {
  session_start();
  $con = con();
  $uid = $_SESSION['user_id'];
  $wid = mysqli_real_escape_string($con,$wid);
  $res = [];
  $sql = mysqli_query($con,"SELECT * FROM `waytrip_items` INNER JOIN `despatch` ON waytrip_items.`despatch_id` = despatch.`despatch_id` WHERE `waytrip_id`= '$wid' ");
  while($row = mysqli_fetch_assoc($sql)){

    $customer = mysqli_query($con,"SELECT `cust_name`  FROM `customer` WHERE `cust_id` =".$row['customer_id']);
    while($customer_name = mysqli_fetch_array($customer)){
      $row['cust_name'] = $customer_name['cust_name'];
    }
   
    $res [] = $row; 
  }
  
  return json_encode($res);
}

function delWaytripItems($wtid,$wid) {  
  $con = con();
  $wtid = mysqli_real_escape_string($con,$wtid);

  $ref_array = [];
  $checked_id = [];
  $unchecked_id = [];
  $checked_ll = [];
  $unchecked_ll = [];
  $distance = [];
  $first_distance  = [];
  $ini_ll = '';

  $desp_id = mysqli_query($con,"SELECT `despatch_id` FROM `waytrip_items` WHERE `id`= '$wtid' ");
  $fetch_desp_id = mysqli_fetch_array($desp_id);

  $cust_id = mysqli_query($con,"SELECT `customer_id` FROM `despatch` WHERE `despatch_id` =".$fetch_desp_id['despatch_id']) ;
  $fetch_cust_id = mysqli_fetch_array($cust_id);
  $desp_cust_id = $fetch_cust_id['customer_id'];

  $cust_existing = mysqli_query($con,"SELECT * FROM waytrip_items w, despatch d WHERE d.despatch_id = w.despatch_id AND w.`waytrip_id`='$wid' AND d.`customer_id`='$desp_cust_id' ");
  $fetch_cust_existing = mysqli_num_rows($cust_existing);
    
  $sql = mysqli_query($con,"DELETE FROM `waytrip_items` WHERE `id`= '$wtid' ");
  if($sql) {
    $waytrip_items = mysqli_query($con,"SELECT * FROM `waytrip_items` WHERE `waytrip_id`= '$wid' ");
    $num_wt_items = mysqli_num_rows($waytrip_items);
    $update_waytrip = mysqli_query($con,"UPDATE `waytrip` SET `total_orders`= '$num_wt_items' WHERE `waytrip_id` = '$wid'");

    // Check whether the customer has another order //// 

    if($fetch_cust_existing == 1) {

      $route = mysqli_query($con,"SELECT * FROM `route` WHERE `waytrip_id`= '$wid' ");
      $fetch_route = mysqli_fetch_array($route);
      $rid = $fetch_route['route_id'];
  
      $route_items = mysqli_query($con,"SELECT * FROM `route_items` WHERE `route_id`='$rid' ");
  
      $warehouse = mysqli_query($con,"SELECT `latitude`, `longitude` FROM `warehouse` WHERE `warehouse_id` =".$fetch_route['warehouse_id']);
      $fetch_wh = mysqli_fetch_array($warehouse);
      $w_lat = $fetch_wh['latitude'];
      $w_long = $fetch_wh['longitude'];
      $w_ll = $w_lat.','.$w_long;

    
        while($rt_items = mysqli_fetch_assoc($route_items)) {
          $cid = $rt_items['customer_id'];
          $lat = $rt_items['latitude'];
          $long = $rt_items['longitude'];
          $latlong = $lat.(','.$long); 
          $ref_array[$cid]  = $latlong;
          $distance[] = $rt_items['distance_from_prev'];
          $det_time = $fetch_route['detention_time'];
          $avg_speed = $fetch_route['avg_speed'];
          if(($rt_items['is_fixed']==1) && ( $cid != $desp_cust_id ) ) {
            $checked_id[] = $cid;
            $checked_ll[] = $latlong;
          } elseif(($rt_items['is_fixed']==0) && ( $cid != $desp_cust_id )) {
            $unchecked_id[] = $cid;
            $unchecked_ll[] = $latlong;
          }
        }
        // print_r($checked_ll);
        // print_r($unchecked_ll);
        
        
        if(!empty($checked_id)) {
          $ini_ll = $checked_ll[(count($checked_ll)-1)];
          $ini_id = $checked_id[(count($checked_id)-1)];
          $first_distance = array_slice($distance,0,count($checked_id)) ;
        } else {
          $ini_ll = $w_ll;
          $first_distance = array_slice($distance,0,1) ;
        }

        if($fetch_route['return_to_warehouse'] == 1) {
          $unchecked_ll[] = $w_ll;
        }
        // echo $w_ll;
        // echo count($unchecked_ll) ;
        // print_r($unchecked_ll);

        if((count($unchecked_ll) == 1 && $unchecked_ll[0] == $w_ll) || (count($unchecked_ll) == 0) ) {
          
          $delete_route_items = mysqli_query($con,"DELETE FROM `route_items` WHERE `route_id`='$rid' ");
        } else {

        $array_to_opt = $unchecked_ll;
        array_unshift($array_to_opt,$ini_ll);
        $data_arr = json_encode($array_to_opt);
        // print_r($data_arr);

          $ch = curl_init();
          curl_setopt($ch, CURLOPT_URL, 'http://open.mapquestapi.com/directions/v2/optimizedroute?key=8xGh2RLW6ZtzPegw9gVbv4MFasaSZ6nk');
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
          curl_setopt($ch, CURLOPT_POST, 1);
          curl_setopt($ch, CURLOPT_POSTFIELDS, "{ \"locations\": ".$data_arr." }");

          $headers = array();
          $headers[] = 'Content-Type: application/json';
          $headers[] = 'Accept: application/json';
          curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

          $result = curl_exec($ch);
          // print_r($result);
          
          curl_close($ch);

          $dec_res = json_decode($result,true);


          $locSeq = $dec_res['route']['locationSequence'];
          
          if($fetch_route['return_to_warehouse'] == 1) {
            array_pop($locSeq);
          }
          array_shift($locSeq);
          // if(empty($checked_id)) {
          //   echo "empty";
          //   array_shift($locSeq);
          // }
          
          for($i = 0; $i<count($locSeq); $i++) {
            $k = $locSeq[$i];
            $kth_val = $array_to_opt[$k];
            $optimized_arr[] = $kth_val;
            $optimized_id[] = array_search($kth_val,$ref_array);
            $optimized_ll[] = $ref_array[array_search($kth_val,$ref_array)];
          }
          // print_r($optimized_id);
          // print_r($optimized_ll);
          $legs = $dec_res['route']['legs'];
          $dis = []; 
          for($p = 0; $p < count($legs);$p++) {
            $dis[] = $legs[$p]['distance'];
          }
          
          $pointDistance = array_merge($first_distance,$dis);
          
          // array_shift($optimized_id);
          // array_shift($optimized_ll);
          if(!empty($checked_id)){
            $complete_id = array_merge($checked_id,$optimized_id);
            $complete_ll = array_merge($checked_ll,$optimized_ll);
          } else {
            $complete_id = $optimized_id;
          }

          $delete_route_items = mysqli_query($con,"DELETE FROM `route_items` WHERE `route_id`='$rid' ");
          

          for($i=0; $i<count($complete_id); $i++) { 
            $is_fixed = '0'; 
            $det_time = (int) $det_time;
            $avg_speed = (int)$avg_speed;
            $dis_from_prev = $pointDistance[$i];
            $dis_from_prev = (int) $dis_from_prev;
            $delay = ($dis_from_prev/$avg_speed)*60;
            $delay += $det_time;
            $delay = $delay*60;
            $id = $complete_id[$i];
            $latlong = $ref_array[$id];
            $ll = explode(',',$latlong);
            $lat = $ll['0'];
            $long = $ll['1'];
            $item_order = $i+1;

            if(in_array($id, $checked_id)) {
              $is_fixed = '1';
            } 
            
            $insert_items = mysqli_query($con,"INSERT INTO `route_items`(`route_id`, `customer_id`, `is_fixed`, `item_order`, `latitude`, `longitude`,`delay`,`distance_from_prev`)
                            VALUES('$rid','$id','$is_fixed','$item_order','$lat','$long','$delay','$dis_from_prev') ");

          }

        }

    }

    return 1;
  }
}

function getAddress($toOptId ) {
  $con=con();
  $res = [];
  foreach($toOptId as $optId){
    $address = mysqli_query($con,"SELECT `latitude`,`longitude` FROM `customer` WHERE `cust_id`='$optId' ");
    
    while($row = mysqli_fetch_assoc($address)){
      $res[] = $row;
    }
  }
  return json_encode($res);
  
}

function getNewRoute($cid) {
session_start();
$uid = $_SESSION['user_id'];
$con = con();
$res = [];
foreach($cid as $cus_id) {
$sql = mysqli_query($con,"SELECT `cust_id`, `cust_name` FROM `customer` WHERE `cust_id`='$cus_id'  AND `created_by`= '$uid' ");
  
  while($row = mysqli_fetch_assoc($sql)) {
    $res[] = $row;
  }
}


return json_encode($res);
}

function getWarehouse() {
  session_start();
  $oid = $_SESSION['org'];
  $uid = $_SESSION['user_id'];
  $con = con();
  $res = [];

  $sql = mysqli_query($con, "SELECT * FROM `warehouse` WHERE `org_id` = '$oid' AND `created_by`='$uid' ");
  while($row = mysqli_fetch_assoc ($sql)) {
    $res[] = $row;
  }
  return json_encode($res);
}

function delWarehouse($wid) {
  session_start();
  $oid = $_SESSION['org'];
  $uid = $_SESSION['user_id'];
  $con = con();
  $wid = mysqli_real_escape_string($con,$wid);
  $res = [];

  $sql = mysqli_query($con,"DELETE FROM `warehouse` WHERE `warehouse_id`='$wid' AND `org_id` = '$oid' ");
  if($sql) {
    return 1;
  }
}

function addWarehouse($isedit,$whid,$whname,$lng,$ltd){
  $con=con();
  date_default_timezone_set("Asia/Dubai");
  $date = date('H:i:s', time());
  $date2 = date('Y-m-d', time());
  $date3 = date('Y-m-d H:i:s', time());
  session_start();
  $oid=$_SESSION['org'];
  $uid=$_SESSION['user_id'];
  $whname = mysqli_real_escape_string($con,$whname);
  $lng = mysqli_real_escape_string($con,$lng);
  $ltd = mysqli_real_escape_string($con,$ltd);

  $cntl=mysqli_query($con,"SELECT * FROM `warehouse` WHERE `warehouse_id`<>$whid AND `warehouse_name`='$whname'");
  if(mysqli_num_rows($cntl)<1){
   $sql="INSERT INTO `warehouse`(`warehouse_name`, `latitude`, `longitude`, `org_id`, `created_by`, `created_at`) VALUES ('$whname','$ltd','$lng','$oid','$uid','$date3')";
   if($isedit=="1") {
      $sql="UPDATE `warehouse` SET `warehouse_name`='$whname',`latitude`='$ltd',`longitude`='$lng',`updated_by`='$uid',`updated_at`='$date3' WHERE `warehouse_id`='$whid' AND `org_id`='$oid' ";
    }
  
  $stmt = mysqli_query($con,$sql);

      
  // Verify user password and set $_SESSION
  if ( $stmt) {

  return 1;

  
  }else{
  return 0;
}
  }else{
    return 2;
  }
}

function getSelWarehouse($wid) {
  $con = con();
  $wid = mysqli_real_escape_string($con,$wid);

  $sql = mysqli_query($con,"SELECT * FROM `warehouse` WHERE `warehouse_id` = '$wid' ");
  $row = mysqli_fetch_array($sql); 

  return json_encode($row);
}

function aeCustomerLatlong($chgf,$cid,$lat,$long){
  session_start();
  $con = con();
  $chgf = mysqli_real_escape_string($con,$chgf);
  $cid = mysqli_real_escape_string($con,$cid);
  $lat = mysqli_real_escape_string($con,$lat);
  $long = mysqli_real_escape_string($con,$long);

  $oid = $_SESSION['org'];
  $uid = $_SESSION['user_id'];

  date_default_timezone_set("Asia/Dubai");
  $date = date('H:i:s', time());
  $date2 = date('Y-m-d', time());
  $date3 = date('Y-m-d H:i:s', time());

  if ($lat&&$long) {
    $sql = mysqli_query($con,"UPDATE `customer` SET `latitude`='$lat',`longitude`='$long',`updated_by`='$uid',`updated_at`='$date3' WHERE `cust_id`= '$cid' AND `org_id`= '$oid' ");
    if($sql) { return 1; }
   } 
  
}

function saveRoute ($saveRouteId,$checkedArr,$tempLatlong,$whId,$wtId,$rtwh,$enTraffic,$totalDistance,$avgSpeed,$detTime,$totalRouteTime,$pointDistance,$pointTime ) {
  session_start();
  $con = con();
  $whId = mysqli_real_escape_string($con,$whId);
  $wtId = mysqli_real_escape_string($con,$wtId);
  $rtwh = mysqli_real_escape_string($con,$rtwh);
  $enTraffic = mysqli_real_escape_string($con,$enTraffic);
  $totalDistance = mysqli_real_escape_string($con,$totalDistance);
  $avgSpeed = mysqli_real_escape_string($con,$avgSpeed);
  $detTime = mysqli_real_escape_string($con,$detTime);
  $totalRouteTime = mysqli_real_escape_string($con,$totalRouteTime);
  $fixed = [];
  
   if($checkedArr){
     $fixed = $checkedArr;
   }

  $uid = $_SESSION['user_id'];

  date_default_timezone_set("Asia/Dubai");
  $date = date('H:i:s', time());
  $date2 = date('Y-m-d', time());
  $date3 = date('Y-m-d H:i:s', time());

  $driver = mysqli_query($con,"SELECT `driver_id` FROM `waytrip` WHERE `waytrip_id` = '$wtId'");
  $driver_details = mysqli_fetch_array($driver);
  $did = $driver_details['driver_id'];

  $check_waytrip = mysqli_query($con,"SELECT * FROM `route` WHERE `waytrip_id`='$wtId' AND `driver_id`='$did'");
  if(mysqli_num_rows($check_waytrip)==0){
    $sql = mysqli_query($con,"INSERT INTO `route`(`waytrip_id`, `driver_id`, `warehouse_id`, `return_to_warehouse`, `enable_traffic`, `total_distance`, `avg_speed`, `detention_time`, `total_time`, `time_stamp`, `created_by`, `created_at`)
         VALUES('$wtId','$did','$whId','$rtwh','$enTraffic','$totalDistance','$avgSpeed','$detTime','$totalRouteTime','$date3','$uid','$date3') ");

  } else {
    $sql = mysqli_query($con,"UPDATE `route` SET `warehouse_id`='$whId',`return_to_warehouse`='$rtwh',`enable_traffic`='$enTraffic',`total_distance`='$totalDistance',`avg_speed`='$avgSpeed',`detention_time`='$detTime',`total_time`='$totalRouteTime',`time_stamp`='$date3',`created_by`='$uid',`created_at`='$date3' WHERE `waytrip_id` = '$wtId' AND `created_by`= '$uid' ");
  }

  $route_details = mysqli_query($con,"SELECT `route_id` FROM `route` WHERE `waytrip_id`='$wtId' ");

  $route_result = mysqli_fetch_array($route_details) ;
  $route_id = $route_result['route_id'];

  $delete_route_items = mysqli_query($con,"DELETE FROM `route_items` WHERE `route_id`='$route_id' ");

  $lat='';
  $long='';

  for($i=0; $i<count($saveRouteId); $i++) {
    $is_fixed = '';
    $delay = $pointTime[$i];
    $distance = $pointDistance[$i];
    $id = $saveRouteId[$i];
    $latlong = $tempLatlong[$id];
    $ll = explode(',',$latlong);
    $lat = $ll['0'];
    $long = $ll['1'];
    $item_order = $i+1;
    // $item_eta = $eta[$i];
    if(in_array($id,$fixed)){
     $is_fixed = '1';
    } else { $is_fixed = '0'; }
    

    $insert_items = mysqli_query($con,"INSERT INTO `route_items`(`route_id`, `customer_id`, `is_fixed`, `item_order`, `latitude`, `longitude`,`delay`,`distance_from_prev`)
     VALUES('$route_id','$id','$is_fixed','$item_order','$lat','$long','$delay','$distance') ");

     
  }
  
  if($insert_items) {
    return 1;
  }
}

function getUnAssignedItems() {
  session_start();
  $con = con();
  $uid = $_SESSION['user_id'];
  $oid = $_SESSION['org'];
  $res= [];
  $sql = mysqli_query($con,"SELECT `despatch`.despatch_id,`despatch`.customer_id,`despatch`.order_no,`despatch`.remarks,`customer`.cust_name FROM despatch JOIN customer ON despatch.customer_id = customer.cust_id  LEFT JOIN `waytrip_items` ON `despatch`.despatch_id = `waytrip_items`.despatch_id  WHERE `waytrip_items`.despatch_id IS NULL AND  `imported_by` = '$uid' AND `org_id`='$oid' ");
  while($desp_data = mysqli_fetch_assoc($sql)) {
    $desp_id = $desp_data['despatch_id'];
    $sql_assigned = mysqli_query($con,"SELECT * FROM `waytrip_items` WHERE `despatch_id`= $desp_id");
    $k=0;
    if(mysqli_num_rows($sql_assigned)>0) {
      $k=1;
    }
    $desp_data['flag']=$k;
    $res []= $desp_data;
  }
  
  return json_encode($res);
}

function addItemsToDriver($wtid,$desp_id) {
    session_start();
    $con = con();
    $uid = $_SESSION['user_id'];
    $oid = $_SESSION['org'];
    $wtId = mysqli_real_escape_string($con,$wtid);
    $checked_ll = [];
    $checked_id = [];
    $unchecked_ll = [];
    $unchecked_id = [];
    $last_ll = '';
    $last_id = '';
    $ini_ll = '';
    $ini_id = '';
    $wh_latlong = '';
    $wid = '';
    $optimized_arr = [];
    $ref_arr = [];
    $optimized_id = [];
    $delay = [];
    $distance = [];
    $first_distance = [];
    $id_not_in_route = [];
    $all_route_items = [];


    foreach($desp_id as $did) {

      $des_id = mysqli_real_escape_string($con,$did);
      $submit_items = mysqli_query($con,"INSERT INTO `waytrip_items`(`waytrip_id`, `despatch_id`) VALUES ('$wtid','$des_id')");
      
    }

    $orders = mysqli_query($con,"SELECT * FROM `waytrip_items` WHERE `waytrip_id` = '$wtId' ");
    $total_orders = mysqli_num_rows($orders);

    $update_waytrip = mysqli_query($con,"UPDATE `waytrip` SET `total_orders`='$total_orders' WHERE `waytrip_id` = '$wtid' ");

    $fetch_route = mysqli_query($con,"SELECT `route_id`, `waytrip_id`, `driver_id`, `warehouse_id`, `return_to_warehouse`, `enable_traffic`, `total_distance`, `avg_speed`, `detention_time`, `total_time`, `time_stamp`, `created_by`, `created_at` FROM `route` WHERE `waytrip_id` = '$wtId' ");
    $route = mysqli_fetch_array($fetch_route);
    $rid = $route['route_id'];

    $route_items_id = mysqli_query($con,"SELECT  `customer_id` FROM `route_items` WHERE `route_id` = '$rid' ");
      while($items_id = mysqli_fetch_array($route_items_id)) {
        $all_route_items[] = $items_id['customer_id'];
      }
    
    for($j = 0; $j<count($desp_id); $j++) {

      $des_id = mysqli_real_escape_string($con,$desp_id[$j]);
      $customer = mysqli_query($con,"SELECT `customer_id` FROM `despatch` WHERE `despatch_id` = '$des_id' ");
      $fetch_cust = mysqli_fetch_array($customer);
      $cust_id =  $fetch_cust['customer_id'];
      
      if(!in_array($cust_id,$all_route_items) && !in_array($cust_id,$id_not_in_route)) {
        $id_not_in_route[] = $cust_id;
      } 
      
    }
    
    // $id_not_in_route = array_unique($id_not_in_route);
    

    if(!empty($id_not_in_route)) {
      
      $det_time = $route['detention_time'];
      $avg_speed = $route['avg_speed'];
      $wid = $route['warehouse_id'];
      $route_items = mysqli_query($con,"SELECT `route_item_id`, `route_id`, `customer_id`, `is_fixed`, `item_order`, `latitude`, `longitude`, `delay`, `distance_from_prev` FROM `route_items` WHERE `route_id` = '$rid' ");
      while($items_row = mysqli_fetch_array($route_items)) { 
          $cid = $items_row['customer_id'];
          $cid_arr[] = $cid;
          $lat= $items_row['latitude'];
          $long = $items_row['longitude'];
          $ll = $lat.','.$long;
          $ref_arr[$cid] = $ll;
          $distance[] = $items_row['distance_from_prev'];
        if($items_row['is_fixed']==1) {
          $checked_ll[] = $ll;
          $checked_id [] = $cid;
        } else {
          $unchecked_ll[] = $ll;
          $unchecked_id[] = $cid;
        }
      }
      
      if($items_row['return_to_warehouse'] == 0 && count($unchecked_ll) > 0 ) {
        $last_ll = $unchecked_ll[count($unchecked_ll)-1];
        $last_id = $unchecked_id[count($unchecked_id)-1];
        array_pop($unchecked_ll);
        array_pop($unchecked_id);
      }
      
      
        for($j = 0; $j<count($id_not_in_route); $j++) {
          $cust_id = $id_not_in_route[$j];
          array_push($unchecked_id,$cust_id);
          $latlong = mysqli_query($con,"SELECT `latitude`,`longitude` FROM `customer` WHERE `cust_id`='$cust_id' ");
          $fetch_latlong = mysqli_fetch_array($latlong);
          $new_lat =  $fetch_latlong['latitude'];
          $new_long =  $fetch_latlong['longitude'];
          $new_latlong = $new_lat.','.$new_long;
          array_push($unchecked_ll,$new_latlong);
          $ref_arr[$cust_id] = $new_latlong;

        }
      
      if(!empty($last_id)) {
        array_push($unchecked_ll,$last_ll);
        array_push($unchecked_id,$last_id);
      }
      if(!empty($checked_id)) {
        $ini_ll = $checked_ll[(count($checked_ll)-1)];
        $ini_id = $checked_id[(count($checked_id)-1)];
        $first_distance = array_slice($distance,0,count($checked_id)) ;
      } else {
        $warehouse = mysqli_query($con,"SELECT `latitude`, `longitude` FROM `warehouse` WHERE `warehouse_id` = '$wid' ");
        $fetch_wh = mysqli_fetch_array($warehouse);
        $w_lat = $fetch_wh['latitude'];
        $w_long = $fetch_wh['longitude'];
        $ini_ll = $w_lat.','.$w_long;
        $first_distance = array_slice($distance,0,1) ;
      }

      $array_to_opt = $unchecked_ll;
      array_unshift($array_to_opt,$ini_ll);
      $data_arr = json_encode($array_to_opt);
      // print_r($data_arr);
      
      
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, 'http://open.mapquestapi.com/directions/v2/optimizedroute?key=8xGh2RLW6ZtzPegw9gVbv4MFasaSZ6nk');
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      curl_setopt($ch, CURLOPT_POST, 1);
      curl_setopt($ch, CURLOPT_POSTFIELDS, "{ \"locations\": ".$data_arr." }");

      $headers = array();
      $headers[] = 'Content-Type: application/json';
      $headers[] = 'Accept: application/json';
      curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

      $result = curl_exec($ch);
      // print_r($result);
      
      curl_close($ch);

      $dec_res = json_decode($result,true);

      $locSeq = $dec_res['route']['locationSequence'];

      if($items_row['return_to_warehouse'] == 1) {
        array_pop($locSeq);
      }
      array_shift($locSeq);

      for($i = 0; $i<count($locSeq); $i++) {
        $k = $locSeq[$i];
        $kth_val = $array_to_opt[$k];
        $optimized_arr[] = $kth_val;
        $optimized_id[] = array_search($kth_val,$ref_arr);
        $optimized_ll[] = $ref_arr[array_search($kth_val,$ref_arr)];
      }
      $legs = $dec_res['route']['legs'];
      $dis = []; 
      
      for($p = 0; $p < count($legs);$p++) {
        $dis[] = $legs[$p]['distance'];
      }
      
      $pointDistance = array_merge($first_distance,$dis);
      
      // array_shift($optimized_id);
      // array_shift($optimized_ll);
      if(!empty($checked_id)){
        $complete_id = array_merge($checked_id,$optimized_id);
        $complete_ll = array_merge($checked_ll,$optimized_ll);
      } else {
        $complete_id = $optimized_id;
      }
      
      
      $delete_route_items = mysqli_query($con,"DELETE FROM `route_items` WHERE `route_id`='$rid' ");
      

      for($i=0; $i<count($complete_id); $i++) { 
        $is_fixed = '0'; 
        $det_time = (int) $det_time;
        $avg_speed = (int)$avg_speed;
        $dis_from_prev = $pointDistance[$i];
        $dis_from_prev = (int) $dis_from_prev;
        $delay = ($dis_from_prev/$avg_speed)*60;
        $delay += $det_time;
        $delay = $delay*60;
        $id = $complete_id[$i];
        $latlong = $ref_arr[$id];
        $ll = explode(',',$latlong);
        $lat = $ll['0'];
        $long = $ll['1'];
        $item_order = $i+1;

        if(in_array($id, $checked_id)) {
          $is_fixed = '1';
        } 
        
        $insert_items = mysqli_query($con,"INSERT INTO `route_items`(`route_id`, `customer_id`, `is_fixed`, `item_order`, `latitude`, `longitude`,`delay`,`distance_from_prev`)
                        VALUES('$rid','$id','$is_fixed','$item_order','$lat','$long','$delay','$dis_from_prev') ");

      }
      if($insert_items) {
        return 1;
      }

    } else {
      return 1;
    }
}


function getRoute($wid) {
  session_start();
  $con = con();
  $uid = $_SESSION['user_id'];
  $oid = $_SESSION['org'];
  $wid = mysqli_real_escape_string($con,$wid);
  $sql1 = mysqli_query($con,"SELECT * FROM `route` WHERE waytrip_id = '$wid' AND `created_by` = '$uid' ");
  $row1 = mysqli_fetch_array($sql1);
  $sql2 = mysqli_query($con, "SELECT * FROM `route_items` WHERE `route_id`=".$row1['route_id']);
  while($row2 = mysqli_fetch_assoc($sql2)) {
    
      $items[] = $row2;
      $customer = mysqli_query($con,"SELECT `cust_name` FROM `customer` WHERE `cust_id`=".$row2['customer_id']);
      while($cust_name = mysqli_fetch_assoc($customer)) {
        $route[] = $cust_name;
      }
      
  }
  $res['route'] = $items;
  $res['cust'] = $route;
  return json_encode($res);
  
}

function getLocationOfAddItems($desp_id) {
  session_start();
  $uid = $_SESSION['user_id'];
  $oid = $_SESSION['org'];
  $con = con();
  $cname = [];
  foreach($desp_id as $did) {
    $des_id = mysqli_real_escape_string($con,$did);
    $cust = mysqli_query($con,"SELECT `customer_id` FROM `despatch` WHERE `despatch_id`= '$des_id ' ");
    $fetch_cust = mysqli_fetch_array($cust);
    $cid = $fetch_cust['customer_id'];
    $cust_latlong = mysqli_query($con,"SELECT `latitude`,`longitude` FROM `customer` WHERE `cust_id` = '$cid' ");
    $fetch_cust_latlong = mysqli_fetch_array($cust_latlong);
    $lat = $fetch_cust_latlong['latitude'];
    $long = $fetch_cust_latlong['longitude'];
    if(empty($lat) OR empty($long)) {
      $cust_name = mysqli_query($con,"SELECT `cust_name` FROM `customer` WHERE `cust_id` = '$cid' ");
      $fetch_cust_name= mysqli_fetch_array($cust_name);
      $cname[] = $fetch_cust_name['cust_name'];

    }
  }
  return json_encode($cname);

}
