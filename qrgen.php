<?php
 session_start();

if ( isset( $_SESSION['user_id'] ) ) {
   
} else {
    // Redirect them to the login page
    echo "<script>window.location.href='index.php';</script>";
}
include('plugins/qr/qrlib.php');
if(isset($_GET['i'])){
    $iii=$_GET['i'];
    QRcode::png($iii,false,QR_ECLEVEL_H,40,4,true); 
}else{
    echo "invalid Request";
}
// outputs image directly into browser, as PNG stream


?>