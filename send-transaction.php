<?php
include_once 'includes/header.php';
include_once 'includes/footer.php';
include_once 'includes/forms.php';

display_header();

$userid = $_SESSION['user_no'];
echo $_SESSION['user'];

footerJs();
