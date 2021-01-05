<?php 

session_start(); 

if (isset($_POST['logout'])) {
    session_unset();
    $_SESSION['message'] = "You have been logged out successfully.";
    $_SESSION['msg_type'] = "success";

    header("location: index.php");
}
?>