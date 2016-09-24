<?php
include_once('db.php');
$url = $_SERVER['QUERY_STRING'];
while ($rows = mysql_fetch_array(mysql_query("SELECT types,orgURL,upload_by,uploadsURL FROM shout WHERE newURL = '$url'"))) {


  $upload_by = $rows['upload_by'];
  $orgURL = $rows['orgURL'];
  $type = $rows['types'];
  $uploadsURL = $rows['uploadsURL'];



  if ($upload_by == 'api') {

    //API
    header('Content-Type: ' . 'image/png');
    readfile("http://cpaapi.imgix.net/$orgURL?auto=compress");
    die();

  }else {

    //Codepenassets
    header('Content-Type: ' . $type);
    readfile("http://cpaimg.imgix.net/$orgURL?auto=compress");
    die();

  }



}


 ?>
