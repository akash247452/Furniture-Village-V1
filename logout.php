<?php
session_start();
unset($_SESSION['username']);
unset($_SESSION['login']);
header('location:index.php');
session_unset();
die();
?>