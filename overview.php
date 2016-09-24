<!DOCTYPE html>
<html>
  <head>
    <link rel="icon" href="https://hostmystuff.ml/hosting/81403/Arrayshty.png" />
    <script src="https://anitklib.ml/js/jquery2.2.0.js"></script>
    <meta charset="utf-8">
    <title>Shty Overview</title>
  </head>
  <body>

  <h2>Real Time Update Analytics<h2>
    <form action="" method="post" enctype="multipart/form-data">
      <input type="url" name="url" placeholder="Please enter the Short URL here" autocomplete="off" required class="url"/>
      <input type="submit" name="check" />
    </form>


  </body>
</html>

<?php

include_once('db.php');

$url = $_POST['url'];

$url = substr($url, strpos($url, "?") + 1);   


$getinfo = mysql_query("SELECT * FROM urls WHERE newURL='$url' ");

while ($rows = mysql_fetch_array($getinfo)) {

  $newURL = $rows['newURL'];
  $orgURL = $rows['orgURL'];
  $create_time = $rows['create_time'];
  $clicks = $rows['clicks'];
  $rqTime = $rows['rqTime'];

  echo "Original URL: <a href='$orgURL' target='_blank' class='orgURL'>$orgURL</a><br />";
  echo "Create Time: $create_time<br />";
  echo "How many clicks: $clicks<br />";
  echo "How many request you got: $rqTime";

}


 ?>


 <style>

 html{
   width: 100vw;
   height: 100vh;
   display: flex;
   justify-content: center;
   align-items: center;
   text-align: center;
 }

 input[name="url"]{
   width: 50vw;
   padding: 1em;
   text-align: center;
   outline: none;
   border: none;
   border-bottom: 2px solid #212323;
   display: inherit;
 }

 input[name="check"]{
   text-align: center;
   border: none;
   background: none;
   outline: none;
   border: 2px solid #FFF;
   background: rgba(29,29,29,0.6);
   color: #FFF;
   transition: all 0.2s ease;
   display: flex;
   padding: 1.5em;
   width: 100%;
 }

input[name="check"]:hover{
  background: #faf2f2;
  color: #1b1a1a;
}

.orgURL{
  color: #9cd71d;
}


 </style>
