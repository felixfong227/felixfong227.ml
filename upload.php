<?php
include_once('db.php');
include_once('function.php');
include_once('htmlheader.php');

if (isset($_FILES['image'])) {

$image = $_FILES['image'];

$image_name = $image['name'];
$image_type = $image['type'];
$image_tmp = $image['tmp_name'];
$image_size = $image['size'];
$path = $_FILES['image']['name'];
$image_ext = pathinfo($path, PATHINFO_EXTENSION);

$allowType = ['image/png','image/jpeg','image/jpg','image/gif','image/bmp','image/ico','image/webp','image/svg','text/javascript','text/css','application/json','audio/mp3','audio/ogg','audio/wav'];
// Check if file type in allowed
  if (in_array($image_type,$allowType)) {

    //All thing is good to go now

    //Upload file
    $file_name = mkid();
    $shoutURL = mkurl();
    $to = 'uploads/images' . '/' .$_FILES['file'].$file_name . ".$image_ext";
    move_uploaded_file($_FILES['image']['tmp_name'], $to);
    $file_location = $to;



    //Shout the image url
    session_start();
    if ($_SESSION['username']) {
    $username = $_SESSION['username'];
      //Login user

      //Get the thumb image
      $JSON = file_get_contents("http://uploads.im/api?upload=https://codepenassets.ml/$file_location");
      $JSON = json_decode($JSON,true);
      $thumbURL = $JSON['data']['thumb_url'];

      // Upload thumb image to Bitbucket
      // file_get_contents("https://cpa-git-port-moongod101.c9users.io/thumb.php?url=$thumbURL&id=$shoutURL");


      //Login in user
      $insertURL = "INSERT INTO shout (orgURL,newURL,types,upload_by,uploadsURL) VALUES ('$file_location','$shoutURL','$image_type','$username','$thumbURL')";

      //Update the upload status for syncing the assets
      mysql_query("UPDATE meanger_accounts SET upload = 1 WHERE username = '$username'");

      mysql_query($insertURL);
    }else {
      //anonymous

      $insertURL = "INSERT INTO shout (orgURL,newURL,types,upload_by,uploadsURL) VALUES ('$file_location','$shoutURL','$image_type','anonymous','NULL')";
      mysql_query($insertURL);
    }






  ?>

  <link rel="stylesheet" href="css/style.upload.css" />
  <input value="https://codepenassets.ml/GetImage?<?php echo $shoutURL;?>" readonly="true" class="showFileURL">
  <img src="https://codepenassets.ml/<?php echo $file_location?>" class="previewImage" />


  <?
  }else {
    echo "Your file is not an image<br />";
    echo "Now i only supporting this type of images<br />";

    $arrlength = count($allowType);

    echo "<div class='supportMINI'>";
      $allowType[$x] = 'i don\'t get in';
      for($x = 0; $x < $arrlength; $x++) {
          echo $allowType[$x];
          echo "<br>";
      }
    echo "</div>";

    echo "And your file type is $image_type so is not in the list";


  }
}else {
  header('Location: index.php');
}
 ?>

<style>
html{
  -webkit-user-select: inherit;
     -moz-user-select: inherit;
      -ms-user-select: inherit;
          user-select: inherit;
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-pack: center;
      -ms-flex-pack: center;
          justify-content: center;
  -webkit-box-align: center;
      -ms-flex-align: center;
          align-items: center;
  font-family: sans-serif;
}

input{
  outline: none;
  background: none;
  border: none;
  font-size: 1.5em;
  width: 50vw;
  text-align: center;
}

.showFileURL{
  font-size: 1.5em;
  border: 2px solid #212323;
}

.supportMINI{
  width: 60%;
  height: auto;
  border: 2px solid #212323;
  margin: 0 auto;
  color: #FFF;
  background: rgba(221, 21, 21,0.7);
  padding: 0.5em;
}

</style>

<script type="text/javascript">

$('.showFileURL').hover(function(){
    $(this).select();
  },function(){
    this.selectionStart = this.selectionEnd = -1;
  });

$('.showFileURL').click(function(){
  var url = $(this).val()
  window.open(url,'_blank');
});

$('.previewImage').attr('src',$('.showFileURL').val());

</script>
