<?php
session_start();
$username = addslashes($_POST['username']);
$password = addslashes($_POST['password']);



  if ($username&&$password) {

    include_once('../db.php');

    $getUsername = mysql_query("SELECT username,password FROM meanger_accounts WHERE username = '$username' ");
    $numrows = mysql_numrows($getUsername);



    if ($numrows != 0) {


      while ($rows = mysql_fetch_array($getUsername)) {
        $dbusername = $rows['username'];
        $dbpassword = $rows['password'];
      }

      if ($username==$dbusername&&$password==$dbpassword) {

        $_SESSION['username']=$dbusername;
        // setcookie("username",$dbusername,time()+31556926 ,'/');
        header('Location: manager');

      }else {
        echo("Username or password incorrect :(<br />");
        echo "<a href='../index.php'>Back</a>";
      }


    }else {
      echo("I don't got that $username in my databse?<br />");
      echo "<a href='../index.php'>Back</a>";
    }



  }else {
    echo ("PLease enter the username and password<br />");
    echo "<a href='../index.php'>Back</a>";
  }






 ?>
