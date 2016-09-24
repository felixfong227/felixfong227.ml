<?php

mysql_connect('cpasql1.heliohost.org','cpasql1_ilovemlp','FuckmysqlHacterGameing');
mysql_select_db('cpasql1_source');

$id = $_GET['id'];

$getThumb = mysql_query("SELECT types,uploadsURL FROM shout WHERE newURL = '$id'");

while ($r = mysql_fetch_array($getThumb)) {

  $u = $r['uploadsURL'];
  $t = $r['types'];
  header("Content-type:" . $t);
  readfile($u);

}


 ?>
