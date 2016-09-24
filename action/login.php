<?php

$getAccounts = mysql_query("SELECT username,password FROM meanger_accounts WHERE username = '$username' ");
$check = mysql_num_rows($getAccounts);


if ($check == 1) {

  //Username correct

  //Check for password


  while ($rows = mysql_fetch_array($getAccounts)) {

    $dbusername = $rows['username'];
    $dbpassword = $rows['password'];

    if ($password==$dbpassword) {
      $back = array(
        "value" => true,
        "username" => $dbusername,
        "password" => $dbpassword,
        "icon" => "https://cpapropic.ml/$username"
      );
      echo json_encode($back);


    }else {
      $back = array(
        "value" => false,
        "problem" => "Incorrect password"
      );
      echo json_encode($back);
    }

  }



}elseif ($check == 0) {
  $back = array(
    "value" => false,
    "problem" => "Incorrect username "
  );
  echo json_encode($back);
}


 ?>
