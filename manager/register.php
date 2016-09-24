<?php
session_start();
if ($_SESSION['username']) {
  header('Location: manager');
}else {
  include_once('../db.php');
  include_once('../htmlheader.php');

  $u = $_GET['u'];
  $p = $_GET['p'];



  if ( isset($_POST['register']) ) {

    $username = addslashes($_POST['username']);
    $password = addslashes($_POST['password']);
    $checkusername = mysql_query("SELECT username FROM meanger_accounts WHERE username = '$username' ");
    $numrows = mysql_numrows($checkusername);

    if ($numrows != 0) {
      die("Look like someone already using your username :(");
    }else {
      mysql_query("INSERT INTO meanger_accounts(username,password) VALUES ('$username','$password')");
      $_SESSION['username']=$dbusername;
      // setcookie("username",$dbusername,time()+31556926 ,'/');
      header('Location: manager');
    }


  }



}
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Codepenimg Assets Register</title>
  </head>
  <body>
    <h1>Sign me up please</h1>
    <div class="background"></div>

    <form  action="register" method="post">


      <p>Username: <input type="text" name="username" required="text" value="<?php echo $u?>"/></p>
      <p>Password: <input type="password" name="password" required="text" value="<?php echo $p?>"/></p>
      <input type="submit" name="register" value="Register :D " />
    </form>

    <a href="./index.php">Login</a>

  </body>
</html>


<style>
*{
  padding: 0;
  margin: 0;
}

html{
  text-align: center;
}

.background {
  background: url("https://hostmystuff.ml/hosting/11285/ArrayCodepenimg.png") no-repeat center fixed;
  -webkit-filter: blur(5px);
          filter: blur(5px);
  width: 100vw;
  height: 100vh;
  position: absolute;
  top: 0;
  right: 0;
  z-index: -99;
}
</style>