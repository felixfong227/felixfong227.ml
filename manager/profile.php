<?php




$getIcon = mysql_query("SELECT icon,username FROM meanger_accounts WHERE username = '$username' ");

while ($rows = mysql_fetch_array($getIcon)) {
  $icon = $rows['icon'];
  $username = $rows['username'];

  echo '<link type="text/css" rel="stylesheet" href="../css/style.profile.css" />';
  echo '<div class="userInfo">';
  echo '    <a href="https://codepenassets.ml/manager/manager" class="icon" style="background: url(https://cpapropic.ml/'.$username.')no-repeat center; background-size: 100% 100%;"></a>';
  echo '    <a href="https://codepenassets.ml/manager/edit">Edit Profile</a>';
  echo '    <a href="https://codepenassets.ml/">Upload</a>';
  echo '    <a href="https://codepenassets.ml/manager/logout">Logout</a>';
  echo '</div>';


}


 ?>
