<?php
include_once('db.php');
$url = $_SERVER['QUERY_STRING'];
while ($rows = mysql_fetch_array(mysql_query("SELECT orgURL,upload_by FROM shout WHERE newURL = '$url'"))) {


  if ($rows['upload_by'] == 'api') {

    //API
    header("Location: https://cpaapi.ml/uploads/access/" . $rows['orgURL']);
    die();

  }else{
    header("Location: https://codepenassets.ml/" . $rows['orgURL']);
    die();
  }



}

// function getExtension ($mime_type){

//     $extensions = array(
//       'image/jpeg' => 'jpg',
//       'image/jpg' => 'jpg',
//       'image/png' => 'png',
//       'image/gif' => 'gif',
//       'image/bmp' => 'bmp',
//       'image/ico' => 'ico',
//       'image/webp' => 'webp',
//       'image/svg' => 'svg',
//       'text/javascript' => 'js',
//       'text/css' => 'css',
//       'application/json' => 'json',
//       'audio/mp3' => 'mp3',
//       'audio/ogg' => 'ogg',
//       'audio/mp3' => 'mp3',
//       'audio/webv' => 'webv'

//      );

//     // Add as many other Mime Types / File Extensions as you like

//     return $extensions[$mime_type];

// }



 ?>
