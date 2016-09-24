<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<?php
$b = $_GET['b'];

if ($b == 'yes') {
  echo '
        <script type="text/javascript">
          $(function(){
            $(".notif").click(function(){
              $(this).addClass("hide");
              setTimeout(function(){
                $(".notifBox").remove();
              },300);
            });
          });
        </script>
  ';
  echo "
    <div class='notifBox'>
      <div class='notif'>
        <p>You can't request from a browser,please request fomr some JS code</p>
      </div>
    </div>
  ";
}


 ?>

<!DOCTYPE html>
<html>
  <head>
    <title>Codepenassets API Docs</title>
    <meta charset="utf-8">
    <script src="https://cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js"></script>
    <link rel="stylesheet" href="https://cdn.rawgit.com/google/code-prettify/master/src/prettify.css" />
    <link rel="stylesheet" href="desert.css" type="text/css"/>
    <script src="access/js/script.index.js"></script>
  </head>
  <body>

    <h1>What can you do with Codepenassets API?</h1>

    <a href="#login"><li class="login">Login with Codepenassets Account</li></a>
    <a href="#imageinfo"><li class="imageinfo">Get image info</li></a>
    <a href="#upload"><li class="upload">Uploading access</li></a>


    <div class="loginWidthCPA">

      <h1>Login</h1>

    <pre class="showcode prettyprint lang-js linenums:0" style="width:80%;height:auto;">
$.post('https://cpaapi.ml',{
  "request": "login",
  "username": "username",
  "password": "password"
},function(back){
  value = back.value;
  if(value === true){
   console.log("Login success");
  }else if(value === false){
   console.log("Login fail");
  }
});
    </pre>

    <a href="../demo">Login demo</a>


    </div>

    <hr />


    <div class="imageInfo">

      <h1>Get image info</h1>

      <pre class="showcode prettyprint lang-js linenums:0" style="width:80%;height:auto;">
$.post('https://cpaapi.ml',{
  &quot;request&quot;: &quot;imageinfo&quot;,
  &quot;id&quot;: &quot;aS0LC9jEEL5LvXb8dwBA&quot;
},function(feedback){
  console.log(feedback);
});
  </pre>


    </div>

    <hr />

    <h1>Upload file</h1>

<pre class="showcode prettyprint lang-js linenums:0" style="width:80%;height:auto;">
$.post('https://cpaapi.ml',{
  "request": "upload",
  "url": "http://img02.deviantart.net/e5d4/i/2012/260/c/d/rainbow_dash_agrees_with_a_smile__by_canon_lb-d5f1f1i.png" //MLP Image
},function(back){
  console.log(back);
});
</pre>

  </body>
</html>
<style>

  html{
    text-align: center;
  }

  pre{
    position: relative;
    margin: 0 auto;
  }

  *{
    padding: 0;
    margin: 0;
  }

  .notifBox{
    width: 100vw;
    position: relative;
    padding: 0.5em;
    text-align: center;
    font-size: 1.5em;
    color: #FFF;
    height: 2em;
  }

  .notifBox .notif{
    position: fixed;
    height: 2em;
    width: 100%;
    background: rgba(226, 51, 34,0.6);
    top: 0em;
    left: 0em;
    z-index: 99;
    transition: all 0.3s ease;
  }

  .notifBox .notif.hide{
    position: fixed;
    left: -100vw;
  }

  .notifBox .notif p{
    position: relative;
    top: 50%;
    transform: translateY(-50%);
  }

  pre{
    text-align: left;
  }


</style>
