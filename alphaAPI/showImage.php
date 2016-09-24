<?php
session_start();
header("Content-type: application/json");

if ($_SESSION['username']) {
    include_once("../db.php");
    $username = $_SESSION['username'];
    $time = $_GET['time'];
    $type = $_GET["type"];


    if($type == "image"){

        $sql = mysql_query("SELECT orgURL,newURL,types,uploadsURL FROM shout WHERE upload_by = '$username' AND types != 'text/javascript' AND types != 'application/json' AND types != 'text/json' AND types != 'audio/mp3' AND types != 'audio/ogg' AND types != 'audio/wav' AND types != 'text/css' ORDER BY id DESC LIMIT ".$time.",3");
        $getMax = mysql_query("SELECT orgURL,newURL,types,uploadsURL FROM shout WHERE upload_by = '$username' AND types != 'text/javascript' AND types != 'application/json' AND types != 'text/json' AND types != 'audio/mp3' AND types != 'audio/ogg' AND types != 'audio/wav' AND types != 'text/css' ORDER BY id DESC");
        $max = mysql_num_rows($getMax);
        $JSONback = [];

        while ($a = mysql_fetch_array($sql)) {

            $JSONback[] = $a;

        }
        array_push($JSONback,[max => $max]);
        echo json_encode($JSONback);

    }elseif ($type == "json"){

        $sql = mysql_query("SELECT orgURL,newURL,types,uploadsURL FROM shout WHERE upload_by = '$username'AND types = 'application/json' ORDER BY id DESC LIMIT ".$time.",3");
        $getMax = mysql_query("SELECT orgURL,newURL,types,uploadsURL FROM shout WHERE upload_by = '$username'AND types = 'application/json' ORDER BY id DESC");
        $max = mysql_num_rows($getMax);
        $JSONback = [];

        while ($a = mysql_fetch_array($sql)) {

            $JSONback[] = $a;

        }
        array_push($JSONback,[max => $max]);
        echo json_encode($JSONback);

    }elseif ($type == "css"){

        $sql = mysql_query("SELECT orgURL,newURL,types,uploadsURL FROM shout WHERE upload_by = '$username'AND types = 'text/css' ORDER BY id DESC LIMIT ".$time.",3");
        $getMax = mysql_query("SELECT orgURL,newURL,types,uploadsURL FROM shout WHERE upload_by = '$username'AND types = 'text/css' ORDER BY id DESC");
        $max = mysql_num_rows($getMax);
        $JSONback = [];

        while ($a = mysql_fetch_array($sql)) {

            $JSONback[] = $a;

        }
        array_push($JSONback,[max => $max]);
        echo json_encode($JSONback);

    }elseif ($type == "js"){

        $sql = mysql_query("SELECT orgURL,newURL,types,uploadsURL FROM shout WHERE upload_by = '$username'AND types = 'text/javascript' ORDER BY id DESC LIMIT ".$time.",3");
        $getMax = mysql_query("SELECT orgURL,newURL,types,uploadsURL FROM shout WHERE upload_by = '$username'AND types = 'text/javascript' ORDER BY id DESC");
        $max = mysql_num_rows($getMax);
        $JSONback = [];

        while ($a = mysql_fetch_array($sql)) {

            $JSONback[] = $a;

        }
        array_push($JSONback,[max => $max]);

    }elseif($type == "audio"){

        echo json_encode($JSONback); $sql = mysql_query("SELECT orgURL,newURL,types,uploadsURL FROM shout WHERE upload_by = '$username' AND types = 'audio/mp3' OR types = 'audio/ogg' OR types = 'audio/wav' ORDER BY id DESC LIMIT ".$time.",3");
        $getMax = mysql_query("SELECT orgURL,newURL,types,uploadsURL FROM shout WHERE upload_by = '$username' AND types = 'audio/mp3' OR types = 'audio/ogg' OR types = 'audio/wav' ORDER BY id DESC");
        $max = mysql_num_rows($getMax);
        $JSONback = [];

        while ($a = mysql_fetch_array($sql)) {

            $JSONback[] = $a;

        }
        array_push($JSONback,[max => $max]);
        echo json_encode($JSONback);


    }







} else {

    header('Location: ../manager/logout');

}