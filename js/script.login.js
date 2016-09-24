$(function(){


  $username = $('[name=username]');
  $password = $('[name=password]');
  e = 13;
  $username.keypress(function(e){
    key = e.keyCode;

    if (key == 13) {
      $('.username').addClass('hide');
      $('.password').removeClass('hide');
      return false;
    }

  });

  $password.keypress(function(e){
    key = e.keyCode;

    if (key == 13) {
      $('.password').addClass('pass');
      $('.loading img').removeClass('hide');
      // If the login is too long,it will show up a error message
      setTimeout(function(){
        window.open('loginError.php','_self');
      },60000);
    }

  });




});
