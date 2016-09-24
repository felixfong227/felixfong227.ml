<?php

include_once('db.php');

$ip = isset($_SERVER['HTTP_X_FORWARDED_FOR']) ? $_SERVER['HTTP_X_FORWARDED_FOR'] : $_SERVER['REMOTE_ADDR'];

mysql_query("INSERT INTO upload_access(ip) VALUES ('$ip') ");

 ?>

 <h1>You <b>Can't</b> Using this plain url to view or use,please using the ID url i offer to you <b>Thank you!</b></h1>
 <p>If you do this <b>multiple</b> times,i'll ban you to accessing this website <b>widht out any warning message</b></p><br />


 <style>

html{
  text-align: center;
}

 </style>
