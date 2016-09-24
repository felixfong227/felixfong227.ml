<?php

$id = $_GET['id'];


if($_GET){
    //Go for a work
    include_once("db.php");
    $getAccess = mysql_query("SELECT * FROM urls WHERE newURL = '$id'");
    $error = mysql_num_rows($getAccess);
    
    if($error == 1){
        while($rows = mysql_fetch_array($getAccess)){

            $newURL = $rows['newURL'];
            $orgURL = $rows['orgURL'];
            $newURL = $rows['newURL'];
            $click = $rows['clicks'];
            $newClicks = $click+=1;
            echo $newClicks;
            mysql_query("UPDATE urls SET clicks = '$newClicks' WHERE newURL = '$id' ");
            header("Location: $orgURL");

        };
    }else{
        //Error
        readfile("index2.php");
    }

    
}else{
    //Not redirecting
    readfile("index2.php");
}




?>