<?php

$getData = mysql_query("SELECT * FROM shout WHERE newURL = '$id' ");

while ($rows = mysql_fetch_array($getData)) {

  $newURL = $rows['newURL'];
  $orgURL = $rows['orgURL'];
  $type = $rows['types'];
  $upload_by = $rows['upload_by'];

  $JSONfeedback = array(

    "newURL" => $newURL,
    "type" => $type,
    "upload_by" => $upload_by

  );
  echo json_encode($JSONfeedback);
}

 ?>
