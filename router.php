<?php
include('helper.php');

if (isset($_REQUEST['fx'])) {
  $fx = $_REQUEST['fx'];

  switch ($fx) {

    case 1:
      $username = $_REQUEST['username'];
      $password = $_REQUEST['password'];
      $res = login($username, $password);
      echo $res;
      break;
    case 2:
      $isedit = $_REQUEST['isedit'];
      $oid = $_REQUEST['oid'];
      $name = $_REQUEST['name'];
      $cper = $_REQUEST['cper'];
      $email = $_REQUEST['email'];
      $cnt = $_REQUEST['cnt'];
      $username = $_REQUEST['username'];
      $password = $_REQUEST['password'];
      if ($isedit == "0") {
        $res = create_org($name, $cper, $email, $cnt, $username, $password);
      } else {
        $res = edit_org($oid, $name, $cper, $email, $cnt, $username, $password);
      }
      echo $res;
      break;
    case 3:
      $res = getorgs();
      echo $res;
      break;
    case 4:
      $oid = $_REQUEST['oid'];
      $res = del_org($oid);
      echo $res;
      break;
    case 5:
      $res = getcust();
      echo $res;
      break;
    case 6:
      $isedit = $_REQUEST['isedit'];
      $vid = $_REQUEST['oid'];
      $name = $_REQUEST['name'];
      $c_num = $_REQUEST['c_num'];
      $cper = $_REQUEST['cper'];
      $email = $_REQUEST['email'];
      $ph1 = $_REQUEST['ph1'];
      $ph2 = $_REQUEST['ph2'];
      $adr = $_REQUEST['adr'];
      $lat = $_REQUEST['lat'];
      $lon = $_REQUEST['lon'];

      $res = cust($isedit, $vid, $name, $c_num, $cper, $email, $ph1, $ph2, $adr, $lat, $lon);

      echo $res;
      break;
    case 7:
      $oid = $_REQUEST['oid'];
      $res = del_cust($oid);
      echo $res;
      break;
    case 8:
      $isedit = $_REQUEST['isedit'];
      $oid = $_REQUEST['oid'];
      $reg = $_REQUEST['reg'];
      $make = $_REQUEST['make'];
      $model = $_REQUEST['model'];
      $res = veh($isedit, $oid, $reg, $make, $model);
      echo $res;
      break;
    case 9:
      $res = getveh();
      echo $res;
      break;
    case 10:
      $oid = $_REQUEST['oid'];
      $res = del_veh($oid);
      echo $res;
      break;
    case 11:
      $isedit = $_REQUEST['isedit'];
      $did = $_REQUEST['did'];
      $name = $_REQUEST['name'];
      $phone = $_REQUEST['phone'];
      $address = $_REQUEST['address'];
      $uname = $_REQUEST['uname'];
      $pwd = $_REQUEST['pwd'];
      $sales = $_REQUEST['sales'];
      $delivery = $_REQUEST['delivery'];
      $res = driv($isedit, $did, $name, $phone, $address, $uname, $pwd, $sales, $delivery);
      echo $res;
      break;
    case 12:
      $res = getDriver();
      echo $res;
      break;
    case 13:
      $driver_id = $_REQUEST['driver_id'];
      $res = delDriver($driver_id);
      echo $res;
      break;
    case 14:
      $res = getUser();
      echo $res;
      break;
    case 15:
      $user_id = $_REQUEST['user_id'];
      $profile_id = $_REQUEST['profile_id'];
      $res = delUser($user_id, $profile_id);
      echo $res;
      break;
    case 16:
      $old_pwd = $_REQUEST['opwd'];
      $new_pwd = $_REQUEST['npwd'];
      $res = changePassword($old_pwd, $new_pwd);
      break;
    case 17:
      $res = getDespatch();
      echo $res;
      break;
    case 18:
      $did = $_REQUEST['did'];
      $res = delDespatch($did);
      echo $res;
      break;
    case 19:
      $customer = $_REQUEST['customer'];
      $order_num = $_REQUEST['order_num'];
      $remarks = $_REQUEST['remarks'];
      $res = addDespatch($customer, $order_num, $remarks);
      echo $res;
      break;
    case 20:
      $desp_id = $_REQUEST['desp_id'];
      $driver_id = $_REQUEST['driver_id'];
      $res = assignDespatch($desp_id, $driver_id);
      echo $res;
      break;
    case 21:
      $res = getWaytrips();
      echo $res;
      break;
    case 22:
      $wid = $_REQUEST['wid'];
      $res = deleteWaytrip($wid);
      echo $res;
      break;
    case 23:
      $wid = $_REQUEST['wid'];
      $res = getWaytripItems($wid);
      echo $res;
      break;
    case 24:
      $wtid = $_REQUEST['wtid'];
      $wid = $_REQUEST['wid'];
      $res = delWaytripItems($wtid, $wid);
      echo $res;
      break;
    case 25:
      $toOptId = $_REQUEST['idToOptimize'];
      $res = getAddress($toOptId);
      echo $res;
      break;
    case 26:
      $cid = $_REQUEST['custId'];
      $res = getNewRoute($cid);
      echo $res;
      break;
    case 27:
      $res = getWarehouse();
      echo $res;
      break;
    case 28:
      $wid = $_REQUEST['wid'];
      $res = delWarehouse($wid);
      echo $res;
      break;
    case 29:
      $isedit = $_REQUEST['isedit'];
      $whid = $_REQUEST['whid'];
      $whname = $_REQUEST['whname'];
      $ltd = $_REQUEST['ltd'];
      $lng = $_REQUEST['lng'];
      $res = addWarehouse($isedit, $whid, $whname, $lng, $ltd);
      echo $res;
      break;
    case 30:
      $wid = $_REQUEST['wid'];
      $res = getSelWarehouse($wid);
      echo $res;
      break;
    case 31:
      $chgf = $_REQUEST['chgf'];
      $cid = $_REQUEST['cid'];
      $lat = $_REQUEST['lat'];
      $long = $_REQUEST['lng'];
      $res = aeCustomerLatlong($chgf, $cid, $lat, $long);
      echo $res;
      break;
    case 32:
      $checkedArr = [];
      $saveRouteId = $_REQUEST['saveRouteId'];
      if (isset($_REQUEST['checkedArr'])) {
        $checkedArr = $_REQUEST['checkedArr'];
      }
      $tempLatlong = $_REQUEST['tempLatlong'];
      $whId = $_REQUEST['whId'];
      $wtId = $_REQUEST['wtId'];
      $rtwh = $_REQUEST['rtwh'];
      $enTraffic = $_REQUEST['enTraffic'];
      $totalDistance = $_REQUEST['totalDistance'];
      $avgSpeed = $_REQUEST['avgSpeed'];
      $detTime = $_REQUEST['detTime'];
      $totalRouteTime = $_REQUEST['totalRouteTime'];
      $pointDistance = $_REQUEST['pointDistance'];
      $pointTime = $_REQUEST['pointTime'];
      $res = saveRoute($saveRouteId, $checkedArr, $tempLatlong, $whId, $wtId, $rtwh, $enTraffic, $totalDistance, $avgSpeed, $detTime, $totalRouteTime, $pointDistance, $pointTime);
      echo $res;
      break;
    case 33:
      $res = getUnAssignedItems();
      echo $res;
      break;
    case 34:
      $wtid = $_REQUEST['wtid'];
      $desp_id = $_REQUEST['desp_id'];
      $res = addItemsToDriver($wtid, $desp_id);
      echo $res;
      break;
    case 35:
      $wid = $_REQUEST['wid'];
      $res = getRoute($wid);
      echo $res;
      break;
    case 36:
      $desp_id = $_REQUEST['desp_id'];
      $res = getLocationOfAddItems($desp_id);
      echo $res;
      break;
    case 37:
      $res = getDriverandwaytripstatus();
      echo $res;
      break;
    case 38:
      $res = getdriverprogress();
      echo $res;
      break;
    case 39:
      $res = getorderprogress();
      echo $res;
      break;
    case 40:
      $from = $_REQUEST['from'];
      $to = $_REQUEST['to'];
      $custm_select = $_REQUEST['custm_select'];
      $res = getcustomerdespatchreport($from,$to,$custm_select);
      echo $res;
      break;
    case 41:
      $from = $_REQUEST['from'];
      $to = $_REQUEST['to'];
      $custm_select = $_REQUEST['custm_select'];
      $res = getdespatchsummaryreport($from,$to,$custm_select);
      echo $res;
      break;
    case 42:
      $from = $_REQUEST['from'];
      $to = $_REQUEST['to'];
      $custm_select = $_REQUEST['custm_select'];
      $res = gettripwisesummaryreport($from,$to,$custm_select);
      echo $res;
      break;
    case 43:
      $from = $_REQUEST['from'];
      $to = $_REQUEST['to'];
      $res = getroutereport($from,$to);
      echo $res;
      break;
    case 44:
      $from = $_REQUEST['from'];
      $drive_select = $_REQUEST['drive_select'];
      $res = getvehiclewiseroutereport($from,$drive_select);
      echo $res;
      break;
    case 45:
      $sort_day = $_REQUEST['sort_day'];
      $res = gettotaldelivary_graph($sort_day);
      echo $res;
      break;
    case 46:
      $sort_day = $_REQUEST['sort_day'];
      $res = gettopdrivers_graph($sort_day);
      echo $res;
      break;
    case 47:
      $sort_day = $_REQUEST['sort_day'];
      $res = gettopcustomer_graph($sort_day);
      echo $res;
      break;
    case 48:
      $res = gettodays_graph();
      echo $res;
      break;
    case 49:
      $from = $_REQUEST['from'];
      $to = $_REQUEST['to'];
      $res = getdelivered_orders($from,$to);
      echo $res;
      break;
    default:
      echo 0;
      break;
  }
}