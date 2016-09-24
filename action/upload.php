<?php
include_once('int/function.php');
$id = mkid();

$file = file_get_contents($url);

$path = "uploads/access/$id";

$fileExt = pathinfo($url, PATHINFO_EXTENSION);

$fileExt = '.' . $fileExt;
$file_path = $path . $fileExt;

$fileType = get_headers($url);
$fileType =  $fileType[3];
$fileType = substr($fileType, strpos($fileType, ": ") + 1);

$putFile = file_put_contents($path.$fileExt,$file);



if ($file != FALSE) {

  //Get file no error

  if ($putFile != FALSE) {

    //No error of putting file to server
    $JSONBack = array(
      "value" => true,
      "id" => $id,
      "url" => "http://codepenassets.ml/GetImage?$id",
      "url2" => "http://codepenassets.ml/?$id",
      "exten" => $fileExt,
      "type" => $fileType,
    );
    echo json_encode($JSONBack);

    //Save image to mysql
    mysql_query("INSERT INTO shout(orgURL,newURL,types,upload_by) VALUES  ('$file_path','$id','$fileType','api')  ");



  }else {
    $JSONBack = array(
      "value" => false,
      "problem" => "Can't not upload file to Codepenassets server"
    );
    echo json_encode($JSONBack);
  }





}else {
  $JSONBack = array(
    "value" => false,
    "problem" => "Can't not find the file"
  );
  echo json_encode($JSONBack);
}


 ?>
