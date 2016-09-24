<?php
$dir = '/uploads/images';
chdir($dir);
system("git init");
system("git remote add origin https://gitlab.com/moongod101/cpa-src.git");
system("git add .");
system("git commit -m'message'");
system("git push -u origin master");
 ?>
