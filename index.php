<?php

include_once('db.php');
include_once('apiheader.php');
include_once("analyticstracking.php");

?>

<?php
header('Content-Type: ' . 'text/html');
session_start();
if ($_SESSION['username']) {
    $username = $_SESSION['username'];

    $getIcon = mysql_query("SELECT icon,username FROM meanger_accounts WHERE username = '$username' ");

    while ($rows = mysql_fetch_array($getIcon)) {
        $icon = $rows['icon'];
        $username = $rows['username'];

        ?>
        <div class="profileBar">
            <?php include_once("manager/profile.php"); ?>
        </div>
        <?
    }

} else {
    ?>
    <div class="profileBar">
            <link type="text/css" rel="stylesheet" href="css/style.profile.css" />
            <div class="userInfo">
                <a class="icon" style="background: url(https://bytebucket.org/moongod101/codepenassets-official-source/raw/a1b9e34c68e7ff9c69435a494dc534431b282393/dfFace.jpg?token=93dde2efd07a62a8e65686261d2fc8d4ecb8e390)no-repeat center; background-size: 100% 100%;"></a>
                <a href="https://codepenassets.ml/manager/">Login</a>
                <a href="https://codepenassets.ml/manager/register">Register</a>
            </div>
    </div>
    <?
}


if (empty($_GET)) {
    //Upload image

} else {

    $url = $_SERVER['QUERY_STRING'];
    $getURL = mysql_query("SELECT newURL FROM shout WHERE newURL = '$url'");
    $getSource = $_GET['getsource'];


    while ($rows = mysql_fetch_array($getURL)) {
        $id = $rows['id'];
        $orgURL = $rows['orgURL'];
        $newURL = $rows['newURL'];
        $type = $rows['type'];

        header('Location:' . 'GetImage?' . $newURL, true, 301);
        die();


    }


}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Codepen Img (CDN Image Hosting)</title>
    <link type="text/css" rel="icon"
          href="https://bytebucket.org/moongod101/codepenassets-official-source/raw/8b02ff20941ca491562172be34c550b8f2059342/Codepenassets.png?token=326c89d1e8a0adb8313e8613dd33b579f7711f31"/>
    <link type="text/css" rel="stylesheet" href="css/style.main.css"/>
    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
    <script src="js/jq.js"></script>
    <script src="js/script.index.js"></script>
</head>
<body>

<div class="background"></div>

<!-- Form now on you can't upload image,unstill the database problem is softed sorry -->
<form action="upload" class="upload" method="post" enctype="multipart/form-data">
    <img
        src="https://bytebucket.org/moongod101/codepenassets-official-source/raw/5dd045f2ba8a743df7084dba3f00b854647c1fbd/cloud.png?token=e395e9ddf6fe3467bae82783479afc485167cc00"
        class="uploadIcon"/>
    <input type="file" name="image"/>
</form>


<img src="https://avatars3.githubusercontent.com/u/13918481?v=3" class="myface"/>


<div class="showcase">

    <p>I'm the creator of Codepenimg,<a href="https://cpaana.ml/mytwitter">@felixfong227</a>,and also other projects,you
        can find other at <a href="https://cpaana.ml/mytwitter">my website</a></p>
</div>

<a href="https://cpaana.ml/cpaapi">Developer API Docs</a>

<!-- Indiegogo -->
<!-- <iframe src="https://www.indiegogo.com/project/super-upgrade-codepenassets/embedded/14567210"  frameborder="0" scrolling="no" class="indiegogoCampaign"></iframe> -->

<!-- <h1 style="position:relative;z-index:100;background:#c7f789;color:#FFF;">If you really need to hosting your assets,please go to my an other project <a href="https://hostmystuff.ml">Hostmystuff</a></h1> -->

<script type="text/javascript" src="js/jq.js"></script>
<script type="text/javascript" src="js/main.js"></script>
</body>
</html>

<!-- <p>This is a website you can host your Codepen asset with <b>free</b> and <b>unlimited GB</b></p>

<p>Hay take a look,before we can use <a href="http://imgur.com" target="_blank">Imgur</a>,but now we can't,so Codepen designed to make a asset features just for Codepen<span class="pro">PRO</span></p>
<p>And the most cheep <span class="pro">PRO</span> plan you can find still need to pay for 9 USD for a month,and that just only come with 1GB for asset?REALLY</p>
<br /><p>Forget it,just host your asset here,and link it to Codepen,write code like a <span class="pro">PRO</span></p><br /> -->
