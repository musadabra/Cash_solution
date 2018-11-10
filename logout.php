<?php
if(isset($_GET['userid']))
    $userid = $_GET['userid'];
include_once 'includes/authentication.php';
    logout($userid);
    header("location:login.php");
?>
