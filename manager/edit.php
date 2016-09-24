<?php
session_start();
if ($_SESSION['username']) {
    include_once('../db.php');
    $username = $_SESSION['username'];

} else {
    header('Location: logout.php');
}
?>
<!DOCTYPE html>
<html>
<head>
    <?php include_once("../htmlheader.php") ?>
    <script src="../js/script.editProfile.js"></script>
    <link type="text/css" rel="stylesheet" href="../css/style.edit.css"/>
    <meta charset="utf-8">
    <title>Codepenimg Manager Edit</title>
</head>
<body>
<div class="background"></div>

<div class="profileBar">
    <?php include_once("profile.php"); ?>
</div>

<div class="notif"></div>
<!-- Change profile icon -->

<form action="" method="post">

    <img class="showProfileIcon" src=""/>

    <h1>Select picture from your assets</h1>

    <div class="showAssets">

        <?php
        $getImages = mysql_query("SELECT orgURL,newURL FROM shout WHERE upload_by = '$username' AND types != 'application/javascript' AND types != 'application/json' AND types != 'text/json' AND types != 'audio/mp3' AND types != 'audio/ogg' AND types != 'audio/wav'");

        while ($rows = mysql_fetch_array($getImages)) {
            $images = $rows['orgURL'];
            $newURL = $rows['newURL'];

            echo "<div class='assets' source='https://codepenassets.ml/$images' '>";
            echo " <img src='https://codepenassets.ml/$images'/>  ";
            echo '</div>';

        }

        ?>


    </div>



</form>

<hr/>
<!-- Change password -->

<form action="" method="post" class="changePassword">

    <p>Old Password: <input name="oldPassword" type="password" autocomplete="off"/></p>
    <p>New Password: <input name="newPassword" type="password" autocomplete="off"/></p>
    <p><input type="submit" name="savePassword" value="Save"/></p>
</form>

<hr/>
<!-- Remove account -->

<form action="" method="post" class="removeAccount">

    <p>Password: <input name="password" type="password" autocomplete="off"/></p>
    <p><input type="submit" name="removeAccount" value="Remove Account"/></p>
</form>


</body>
</html>

<?php


//Change password
if (isset($_POST['savePassword'])) {

    $username = $_SESSION['username'];
    $oldPassword = $_POST['oldPassword'];
    $newPassword = $_POST['newPassword'];


    $savePassword = mysql_query("SELECT password FROM meanger_accounts WHERE username = '$username' ");

    while ($rows = mysql_fetch_array($savePassword)) {

        //Change for old password is real
        $dbPassword = $rows['password'];

        if ($oldPassword == $dbPassword) {
            mysql_query("UPDATE meanger_accounts SET password = '$newPassword' WHERE username = '$username' ");
        } else {
            die ("Your old password is incorrect!");
        }


    }


}


//Remove account
if (isset($_POST['removeAccount'])) {


    $password = addslashes($_POST['password']);


    $savePassword = mysql_query("SELECT password FROM meanger_accounts WHERE username = '$username' ");

    while ($rows = mysql_fetch_array($savePassword)) {

        //Change for old password is real
        $dbPassword = $rows['password'];

        if ($password == $dbPassword) {


            //Password correct and ready to remove account

            //Remove all the image from mysql
            mysql_query("DELETE FROM shout WHERE upload_by = '$username'");

            //Remove the account
            mysql_query("DELETE FROM meanger_accounts WHERE username = '$username'");
            header("Location: logout");


        } else {
            die ("Password incorrect!");
        }


    }


}


?>
