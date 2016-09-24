<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Shty > Warning!</title>
    <link type="text/css" rel="stylesheet" href="css/style.beta.css" />
  </head>
  <body>

    <h1 class="warning">Warning!</h1>
    <h1>This url is content adult content!</h1>


    <?php
      $orgURL = $_GET['orgURL'];

     ?>

     <h1>Are you sure you still want to continue?</h1>

     <div class="info">
       <a class="link keepGoing" href="<?php echo $orgURL;?>" target="_self">Yes,content</a>
       <a class="link nothings" href="https://shty.ml" target="_self">No Thanks</a>
    </div>



  </body>
</html>
