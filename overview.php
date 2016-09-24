<link rel="stylesheet" href="style.css" />
<?php

session_start();
if($_SESSION['username']='moongod101'){
    include_once("db.php");

    $sql = mysql_query("SELECT * FROM urls ORDER BY CAST(`clicks` AS UNSIGNED) DESC");
    while($rows = mysql_fetch_array($sql)){

        $newURL = $rows['newURL'];
        $orgURL = $rows['orgURL'];
        $clicks = $rows['clicks'];

        ?>

        <div class="console">
        
            <div class="orgURL">
                <?php echo $orgURL?>
            </div>

            <div class="newURL">
                <?php echo $newURL?>
            </div>

            <div class="clicks">
                <h1>Clicks: <?php echo $clicks?></h1>
            </div>

        </div>

        <?


    }


}else{
    readfile("index2.php");
}





?>