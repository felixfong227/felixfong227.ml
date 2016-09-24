$(function(){

  var $pornArray = [];
  var $text = $('.urlinput').val()



  function checkPorn(){
    $.getJSON('https://cdn.rawgit.com/aredo/porn-site-list/master/sites.json',function(data){

      $(data).each(function(index,value){
        $pornArray.push(value.parent_domain);
      });

      $('.urlinput').on('input',function(){
        $text = $(this).val();
        $text = $text.split("http://").pop();

        if ($pornArray.some(function(v) { return $text.indexOf(v) >= 0; })) {
            $('.audltContent').prop('checked', true);
            $('.commitent').slideDown();
            return false;
        }else {
          $('.audltContent').prop('checked', false);
          $('.commitent').slideUp();
          return false;
          $pornArray.push('facebook.com');
        }


      });

    });
  }

  $('.urlinput').on('keydown',function(){
    checkPorn();
  });





  $('.urlinput').on('input',function(){
    var text = $(this).val()
    $urlContnet = text.split("http://").pop();



    if (text.indexOf('https://')>=0) {
      $('.sslCheck').addClass('ssl');
      $('.sslCheck').removeClass('nullssl');
    }else {
      $('.sslCheck').removeClass('ssl');
      $('.sslCheck').addClass('nullssl');
    }


    checkPorn();


    function icon (keyWord){
      if (text.indexOf(keyWord)>=0) {
        $('.sslCheck').removeClass('fa');
        $('.sslCheck').addClass('fa fa-' + keyWord);
      }else {
        $('.sslCheck').removeClass('fa-' + keyWord);
        $('.sslCheck').addClass('fa fa-lock');
      }
    }


    icon('soundcloud');
    icon('google');
    icon('facebook');
    icon('twitter');
    icon('youtube');
    icon('github');
    icon('codepen');
    icon('jsfiddle');
    icon('instagram');
    icon('tumblr');
    icon('deviantart');
    icon('windows');
    icon('apple');
    icon('flickr');
    icon('reddit');
    icon('weibo');
    icon('linkedin');
    icon('vk');
    icon('bitbucket');
    icon('amazon');
    icon('paypal');
    icon('wordpress');
    icon('slack');
    icon('dropbox');
    icon('steam');



  });




  $('.showFileURL').hover(function(){
      $(this).select();
    },function(){
      this.selectionStart = this.selectionEnd = -1;
  });





  mkcolor = function(){var color = "#" + Math.floor(Math.random()*16777215).toString(16);return color;}

});
