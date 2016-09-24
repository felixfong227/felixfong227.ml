<?php

include_once('../db.php');
include_once('../functions.php');
include_once('../apihead.php');
$incomeURL = $_POST['url'];
$incomeMethod = $_POST['method'];
$IP = $_SERVER['REMOTE_ADDR'];
$rqURL = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '';

$acceptheader=explode(',',$_SERVER['HTTP_ACCEPT']);
if(in_array("text/html", $acceptheader)){
  header('Location: ../developer');
}else{
  //From get method

  if ($incomeMethod == 'makeURL') {
      //making shty url
      if ($incomeURL == '') {
        // Url is empty
        echo "URL can't be empty";
        die();
      }elseif ($incomeURL == 'http://') {
        // No link
        echo "http:// is not a correct URL";
        die();
      }elseif ($incomeURL == 'https://') {
        // No link
        echo "https:// is not a correct URL";
        die();
      }elseif ($incomeURL == 'https://shty.ml/?' || $incomeURL == 'https://shty.ml?' || $incomeURL == 'http://shty.ml/?' || $incomeURL == 'http://shty.ml?') {
        echo "You can be short a URL is already been short by Shty";
        die();
      }
      else {
        $newURL = mkid();

        //Set the url in to database
        $setUrls = "INSERT INTO urls (orgURL,newURL,rqURL) VALUES ('$incomeURL' , '$newURL','$rqURL')";

        mysql_query($setUrls);

        echo 'https://shty.ml?'.$newURL;
      }
    }elseif ($incomeMethod == 'overview') {
    $incomeURL = $_POST['url'];
    $incomeURL = substr($incomeURL, strpos($incomeURL, "?") + 1);

    header('Content-type: application/json');

    $getinfo = mysql_query("SELECT * FROM urls WHERE newURL='$incomeURL'");

    while ($rows = mysql_fetch_array($getinfo)) {

      $newURL = $rows['newURL'];
      $orgURL = $rows['orgURL'];
      $create_time = $rows['create_time'];
      $clicks = $rows['clicks'];
      $rqTime = $rows['rqTime'];

      $JSONfeedback = array(
        "newURL"   => "$newURL",
        "orgURL" => "$orgURL",
        "create_time" => "$create_time",
        "clicks" => "$clicks",
        "rqTime" => "$rqTime"
      );


      echo json_encode($JSONfeedback);



        }

    }

}







 ?>
