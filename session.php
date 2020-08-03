<?php
session_start();

if ( isset( $_SESSION['user_id'] ) ) {
   
} else {
    // Redirect them to the login page
    echo "<script>window.location.href='index.php';</script>";
}
?>