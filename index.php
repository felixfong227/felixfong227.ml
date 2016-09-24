<?php

include_once('db.php');
include_once('functions.php');

$url = $_SERVER['QUERY_STRING'];


 ?>

 <!DOCTYPE html>
 <html>
   <head>
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <link rel="icon" href="https://hostmystuff.ml/hosting/81403/Arrayshty.png" />
     <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" />
     <script type="text/javascript" src="https://anitklib.ml/js/jquery2.2.0.js"></script>
     <script type="text/javascript" src="main.js"></script>
     <link rel="stylesheet" type="text/css" href="css/style.main.css" />
     <meta charset="utf-8">
     <title>Shty > Short URL</title>
   </head>
   <body>

     <form action="" method="post">
       <div class="sslCheck nullssl fa fa-lock"></div>
       <input name="urlinput" type="url" maxlength="500" autocomplete="off" value="http://" class="urlinput"><br />
       <div class="commitent">
         <label>Commit Adult Content: <input type="checkbox" name="adultContent" class="audltContent"/></label><br />
       </div>
       <input type="submit" name="submit" value="Short It~" class="submit"/>
     </form>

     <img src="https://github.com/moongod101.png" draggable="false" contextmenu="return false" class="mylogo"/><br />
     <p>I'm the creater of Shty<a href="https://twitter.com/felixfong227" target="_blank" style="color:#fb8f64;">@felixfong227</a>,and also an other <a href="http://felixfong227.ml" target="_blank" style="color:#fb8f64;">projects</a> too :D</p><br />

     <a href="developer" style="color:#fb8f64;">Developer</a><br />
     <a href="overview" style="color:#fb8f64;">Overview</a><br />


   </body>
 </html>



<?php
$fullurl="https://".$_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"];
$day = date("d/m/Y");


if (empty($_GET)) {
  //Make new url

  if (isset($_POST['submit'])) {

    $orgURL = $_POST['urlinput'];
    $newURL = mkid();


    if (isset($_POST['adultContent'])) {
      $newURL = mkid() . '-XXX';

      $setUrls = "INSERT INTO urls (orgURL,newURL,create_time,adult) VALUES ('$orgURL' , '$newURL','$day',1)";

      mysql_query($setUrls);
    }else {
      $setUrls = "INSERT INTO urls (orgURL,newURL,create_time,adult) VALUES ('$orgURL' , '$newURL','$day',0)";

      mysql_query($setUrls);
    }
    echo "<br><a href='https://shty.ml?$newURL' class='showFileURL' target='_blank'>https://shty.ml?$newURL</a><br>";




  }



}else {

  //Go url

  $getURL = mysql_query("SELECT * FROM urls WHERE newURL = '$url'");

  while ($rows = mysql_fetch_array($getURL)) {

    //Check porn

    $getPorn = mysql_query("SELECT * FROM urls WHERE newURL = '$url' ");


    while ($rows = mysql_fetch_array($getPorn)) {

      $porn = $rows['adult'];


      $acceptheader=explode(',',$_SERVER['HTTP_ACCEPT']);
      if(in_array("text/html", $acceptheader)){
        //View from browser
        if ($porn == 1) {
          //PORN
          header('Location:' . 'warning?orgURL=' . $rows['orgURL']);
          }else {
            //NOT PORN
            $leaderOrgURL = mysql_query("SELECT * FROM urls WHERE newURL = '$url' ");
            $url_query = $_SERVER['QUERY_STRING'];
            while ($rows = mysql_fetch_array($leaderOrgURL)) {
            header('Location:' . $rows['orgURL']);
          }

        }
      }else {
        //View from get method
        header('Location:' . $rows['orgURL']);
      }


    //Add the clicks


    //Get the clicks from the database

    $clicks = $rows['clicks'] += 1;

    $addClicks = mysql_query("UPDATE urls SET clicks=$clicks WHERE newURL = '$url'");

    $rqTime = $rows['rqTime'] += 1;


    mysql_fetch_array($addClicks);

    $acceptheader=explode(',',$_SERVER['HTTP_ACCEPT']);
    if(in_array("text/html", $acceptheader)){
      //View from browser
    }else{
      //Get method
      $addrqTime = mysql_query("UPDATE urls SET rqTime=$rqTime WHERE newURL = '$url'");
      mysql_fetch_array($addrqTime);
    }




    }

  }


}




 ?>
