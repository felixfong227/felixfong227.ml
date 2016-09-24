<?php
session_start();
$username = $_SESSION['username'];
$getSync = mysql_query("SELECT upload FROM meanger_accounts WHERE username = '$username'");

function checkSync(){
  while ($sync = mysql_fetch_array($getSync)) {
    $status = $sync['upload'];
    if ($status == 1) {

      //Need to be sync

      mysql_query("UPDATE meanger_accounts SET upload = 0 WHERE username = '$username'");
      header("Location: ../manager");

    }
  }
}

$timeCursor = microtime(true);

while (TRUE)
{
    $read = fgets($fp); //get data
    if (preg_match("/:(\S+)!\S+@\S+ JOIN (#\S+)/i", $read, $match)) { user_joined($match[1],    $match[2]); } //JOIN
    if (preg_match("/:(\S+)!\S+@\S+ PART (#\S+)/i", $read, $match)) { user_parted($match[1], $match[2]); } //PART
    if (preg_match("/:(\S+)!\S+@\S+ PRIVMSG (#\S+) :(.*)/i", $read, $match)) { inc_message($match[1], $match[2], $match[3]); } //MESSAGE
    if (preg_match("/:jtv!jtv@\S+ PRIVMSG $nick :(\S+)/i", $read, $match)){jtv_error($match[1]);} //JTV WARNING
    if (preg_match("/PING :.*/i", $read, $match)) { fwrite($fp, "PONG :$match[1]\r\n"); } //respond to server

    usleep(50000); // do nothing for 50 ms

    $currentTime = microtime(true);
    if ($timeCursor + 10 <= $currentTime) {
        $timeCursor = $currentTime;
        // here you can call a function every 10s
        checkSync();
    }
}


function setInterval($f, $milliseconds)
{
    $seconds=(int)$milliseconds/1000;
    while(true)
    {
        $f();
        sleep($seconds);
    }
}


 ?>
