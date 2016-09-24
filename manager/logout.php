<?php

session_start();

session_destroy();

// unset($_COOKIE['username']);

header('Location: ../index.php');

 ?>
