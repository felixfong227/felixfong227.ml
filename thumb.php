<?php
include_once("db.php");

$id = $_GET['id'];


$getAccess = mysql_query("SELECT uploadsURL,types FROM shout WHERE newURL = '$id'");

while ($r = mysql_fetch_array($getAccess)) {

  $u = $r['uploadsURL'];
  $t = $r['types'];

  header("Content-type:" . $t);
  readfile($u);

  // header("Location: $u");

}


 ?>
