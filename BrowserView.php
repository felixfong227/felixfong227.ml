<?php
header('Content-Type: ' . 'no-transform');
include_once('db.php');
$url = $_SERVER['QUERY_STRING'];
// $getURL = mysql_query("SELECT type,orgURL FROM shout WHERE newURL = '$url'");

header('Location:' . 'GetImage?' . $url);
die();


 ?>
