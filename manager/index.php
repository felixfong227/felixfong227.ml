<?php

session_start();

if ($_SESSION['username']) {
  //Got username
  header('Location: manager');
}
?>

<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="../css/style.login.css" />
    <?php include_once('../htmlheader.php'); ?>
    <script src="../js/script.login.js"></script>
    <meta charset="utf-8">
    <title>Codepenimg Assets Meanger Login</title>
  </head>
  <body>
    <h1>Login</h1>
    <div class="background"></div>
    <form action="login" method="post" name="loginForm">


      <div class="loginForm">

        <div class="username">
          <p><input type="text" name="username" placeholder="Username"></p>
        </div>

        <div class="password hide">
          <p> <input type="password" name="password" placeholder="Password"></p>
          <input type="submit" value="Login" class="login"/>
        </div>
        <div class="loading">
          <img src="https://bytebucket.org/moongod101/codepenassets-official-source/raw/ec007fb504ab63ec31c133c932774994f2e7f3ba/loadIcon.gif?token=55edb1012cd64affcfd35ad34d42ba98d8587159" class="hide"/>
        </div>

      </div>

      <a href="register">Register A New Account</a>


    </form>

  </body>
</html>
