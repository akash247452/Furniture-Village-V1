<?php
session_start();
unset($_SESSION['admin_username']);
unset($_SESSION['admin_login']);
header('location:login.php');
session_unset();
die();
?>