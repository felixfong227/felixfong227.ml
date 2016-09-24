<?php

if (empty($_GET)) {
  //Post method

  $request = $_POST['request'];
  $id = $_POST['id'];
  $username = $_POST['username'];
  $password = $_POST['password'];
  $url = $_POST['url'];

}else {

  //Get method

  $request = $_GET['request'];
  $id = $_GET['id'];
  $username = $_GET['username'];
  $password = $_GET['password'];
  $url = $_GET['url'];

}


include_once('int/apiheader.php');
include_once('int/json.php');
include_once('int/db.php');
?>
<?php
$acceptheader=explode(',',$_SERVER['HTTP_ACCEPT']);
if(in_array("text/html", $acceptheader)){
  header("Location: docs?b=yes");
}else {
  //View form get method

  if ($request == 'imageinfo') {
    include_once('action/imageinfo.php');
  }elseif ($request == 'login') {
    include_once('action/login.php');
  }elseif ($request == 'upload') {
    include_once('action/upload.php');
  }
  else {
    $ERROR = array(
      "value" => false,
      "problem" => "No such a API call",
      "debug" => $request
    );
    echo json_encode($ERROR);
  }

}
 ?>
