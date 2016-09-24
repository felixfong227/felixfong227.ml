<?php
session_start();
include_once("../db.php");
$id = $_POST['id'];
$username = $_SESSION['username'];

$checkProfilePicture = mysql_query("SELECT icon FROM meanger_accounts WHERE username = '$username' ");
$checkNowImage = mysql_query("SELECT newURL,orgURL FROM shout WHERE newURL = '$id'");

$_a = "";
$_b = "";
$_c = "";

while ($a = mysql_fetch_array($checkProfilePicture)) {
    $_a = $a['icon'];
}

while ($a = mysql_fetch_array($checkNowImage)) {
    $_b = "https://codepenassets.ml/" . $a['orgURL'];
    $_c = $a['orgURL'];
}

if ($_a != $_b) {

    //Remove from the cloud storage
    unlink("../$_c");

    //Remove form the database
    mysql_query("DELETE FROM shout WHERE newURL = '$id'");

    header("Location: manager");


} else {
    header("Location: manager?error=profilePic");
}


?>
