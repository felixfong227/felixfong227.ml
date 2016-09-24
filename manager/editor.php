<?php

if ($_COOKIE['username']) {
  include_once("../db.php");

  $id = $_POST['id'];

  $getURL = mysql_query("SELECT orgURL FROM shout WHERE newURL = '$id'");


}else {
  header("Location: logout");
}
?>
<link rel="stylesheet" href="../css/style.editor.css">
<form action="" class="editor">

  <textarea class="codeEditor">
    <?php
      while ($a = mysql_fetch_array($getURL)) {
        echo file_get_contents("https://codepenassets.ml/" . $a['orgURL']);
      }
   ?>
 </textarea>


</form>
