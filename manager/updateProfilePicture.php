<?php
session_start();
$username = $_SESSION['username'];
include_once('../db.php');

$icon = $_GET['icon'];

mysql_query("UPDATE meanger_accounts SET icon = '$icon' WHERE username = '$username'");

 ?>
