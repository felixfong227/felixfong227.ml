<?php
session_start();
if ($_SESSION['username']) {


    include_once('../db.php');

    $username = $_SESSION['username'];
    $incomeType = $_GET['type'];
    $error = $_GET['error'];

    function echoError($msg)
    {
        echo "<div class='error'>
    <p>$msg</p>
  </div>";
    }

    if ($error == "profilePic") {
        echoError("Please change your profile picture before removing this image");
    }

    ?>

    <!DOCTYPE html>
    <html>
    <head>
        <link rel="icon"
              href="https://bytebucket.org/moongod101/codepenassets-official-source/raw/8b02ff20941ca491562172be34c550b8f2059342/Codepenassets.png?token=326c89d1e8a0adb8313e8613dd33b579f7711f31"/>
        <link type="text/css" rel="stylesheet" href="../css/style.main.css"/>
        <link type="text/css" rel="stylesheet" href="../css/style.meanger.css"/>
        <meta charset="utf-8">
        <title>Codepenimg Manager</title>
    </head>
    <body>
    <div class="background"></div>

    <div class="profileBar">
        <?php include_once("profile.php"); ?>
    </div>

    <div class="choseTypes">
        <a href="http://codepenassets.ml/manager/manage">Image</a>
        <a href="http://codepenassets.ml/manager/manage?type=json">JSON</a>
        <a href="http://codepenassets.ml/manager/manage?type=css">CSS</a>
        <a href="http://codepenassets.ml/manager/manage?type=js">JS</a>
        <a href="http://codepenassets.ml/manager/manage?type=audio">Audio</a>
    </div>


    <div class="showAssets">
        <?php


        if ($incomeType == "") {

            $sql = mysql_query("SELECT orgURL,newURL,types,uploadsURL FROM shout WHERE upload_by = '$username' AND types != 'text/javascript' AND types != 'application/json' AND types != 'text/json' AND types != 'audio/mp3' AND types != 'audio/ogg' AND types != 'audio/wav' AND types != 'text/css' ORDER BY id DESC LIMIT 5");

            while ($rows = mysql_fetch_array($sql)) {

                $src = "https://codepenassets.ml/" . $rows['orgURL'];
                $shoutUrl = "https://codepenassets.ml?" . $rows['newURL'];
                $newURL = $rows['newURL'];

                ?>
                <div class='assets image'>
                    <a href="<?php echo $src ?>" target='_blank'>
                        <img src="<?php echo $src ?>"/>
                    </a>
                    <p class='url'><?php echo $shoutUrl ?></p>
                    <!-- Remove that image  -->
                    <form action="removeImage.php" class="removeImage" method="POST">
                        <input class="fa fa-times" value="Remove" type="submit"/>
                        <input type="hidden" value="<?php echo $newURL ?>" name="id"/>
                    </form>

                </div>
                <?

            }


        } else if($incomeType == "json") {

            $sql = mysql_query("SELECT orgURL,newURL,types,uploadsURL FROM shout WHERE upload_by = '$username'AND types = 'application/json' ORDER BY id DESC LIMIT 5");

            while ($rows = mysql_fetch_array($sql)){

                $src = "https://codepenassets.ml/" . $rows['orgURL'];
                $shoutUrl = "https://codepenassets.ml?" . $rows['newURL'];
                $newURL = $rows['newURL'];

                ?>
                <div class='assets image'>
                    <a href="<?php echo $src?>" target='_blank'>
                        <img src="<?php echo $src?>" />
                    </a>
                    <p class='url'><?php echo $shoutUrl?></p>
                    <!-- Remove that image  -->
                    <form action="removeImage.php" class="removeImage" method="POST">
                        <input class="fa fa-times" value="Remove" type="submit"/>
                        <input type="hidden" value="<?php echo $newURL?>" name="id" />
                    </form>

                </div>
                <?

            }

        }else if($incomeType == "css"){

            $sql = mysql_query("SELECT orgURL,newURL,types,uploadsURL FROM shout WHERE upload_by = '$username'AND types = 'text/css' ORDER BY id DESC LIMIT 5");

            while ($rows = mysql_fetch_array($sql)){

                $src = "https://codepenassets.ml/" . $rows['orgURL'];
                $shoutUrl = "https://codepenassets.ml?" . $rows['newURL'];
                $newURL = $rows['newURL'];

                ?>
                <div class='assets image'>
                    <a href="<?php echo $src?>" target='_blank'>
                        <img src="<?php echo $src?>" />
                    </a>
                    <p class='url'><?php echo $shoutUrl?></p>
                    <!-- Remove that image  -->
                    <form action="removeImage.php" class="removeImage" method="POST">
                        <input class="fa fa-times" value="Remove" type="submit"/>
                        <input type="hidden" value="<?php echo $newURL?>" name="id" />
                    </form>

                </div>
                <?

            }

        }elseif($incomeType == "js"){

            $sql = mysql_query("SELECT orgURL,newURL,types,uploadsURL FROM shout WHERE upload_by = '$username'AND types = 'text/javascript' ORDER BY id DESC LIMIT 5");

            while ($rows = mysql_fetch_array($sql)){

                $src = "https://codepenassets.ml/" . $rows['orgURL'];
                $shoutUrl = "https://codepenassets.ml?" . $rows['newURL'];
                $newURL = $rows['newURL'];

                ?>
                <div class='assets image'>
                    <a href="<?php echo $src?>" target='_blank'>
                        <img src="<?php echo $src?>" />
                    </a>
                    <p class='url'><?php echo $shoutUrl?></p>
                    <!-- Remove that image  -->
                    <form action="removeImage.php" class="removeImage" method="POST">
                        <input class="fa fa-times" value="Remove" type="submit"/>
                        <input type="hidden" value="<?php echo $newURL?>" name="id" />
                    </form>

                </div>
                <?

            }

        }elseif($incomeType == "audio"){

            $sql = mysql_query("SELECT orgURL,newURL,types,uploadsURL FROM shout WHERE upload_by = '$username'AND types = 'audio/mp3' OR types = 'audio/ogg' OR types = 'audio/wav' ORDER BY id DESC LIMIT 5");

            while ($rows = mysql_fetch_array($sql)){

                $src = "https://codepenassets.ml/" . $rows['orgURL'];
                $shoutUrl = "https://codepenassets.ml?" . $rows['newURL'];
                $newURL = $rows['newURL'];

                ?>
                <div class='assets image'>
                    <a href="<?php echo $src?>" target='_blank'>
                        <img src="<?php echo $src?>" />
                    </a>
                    <p class='url'><?php echo $shoutUrl?></p>
                    <!-- Remove that image  -->
                    <form action="removeImage.php" class="removeImage" method="POST">
                        <input class="fa fa-times" value="Remove" type="submit"/>
                        <input type="hidden" value="<?php echo $newURL?>" name="id" />
                    </form>

                </div>
                <?

            }

        }


        ?>
    </div>
    <img
        src="https://bytebucket.org/moongod101/codepenassets-official-source/raw/a1b9e34c68e7ff9c69435a494dc534431b282393/loadIcon.gif?token=3893ac95dcd183157416abe65d7b04c53aa4dd64"
        alt="Loading gif" class="loadIcon hide">
    <div class="bottom"></div>
    <?php

    if ($incomeType == "") {
        echo '<script src="../js/showImage.es5.js"></script>';
    }elseif($incomeType == "json"){
        echo '<script src="../js/showJSON.es5.js"></script>';
    }elseif($incomeType == "css"){
        echo '<script src="../js/showCSS.es5.js"></script>';
    }elseif($incomeType == "js"){
        echo '<script src="../js/showJS.es5.js"></script>';
    }elseif($incomeType == "audio"){
        echo '<script src="../js/showAudio.es5.js"></script>';
    }

//    ?>
    


    </body>
    </html>


    <?


} else {
    header('Location: logout.php');
}
?>
