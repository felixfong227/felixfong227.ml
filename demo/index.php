<?php
include_once('../int/db.php');



 ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
 <form action="" method="post">

   <p>Username: <input type="text" class="username"/></p>
   <p>Password: <input type="password" class="password"/></p>
   <button class="login">Login</button>

 </form>

 <div class="show"> </div>

 <script type="text/javascript">

 // Connect to the API using jQuery

 $('.login').click(function(){


   $.post('http://cpaapi.ml',{
     "request": "login",
     "username": $('.username').val(),
     "password": $('.password').val()
   },function(feedback){
     //Get back the data from the API

     //First thing need to check from login API is the return of value

     if (feedback.value === true) {
       //Username and password is correc
       $('.show').html('Username:' + feedback.username + '<br />' + 'Password:' + feedback.password + '<br />' + 'Icon:' + '<img src="'+feedback.icon+'" style="height:20em;width:20em;"  ">');
     }else if (feedback.value === false) {
       $('.show').html('Look like somethings wrong with the username and password');
     }



   });
   return false;


 });


 </script>
