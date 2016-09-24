function afterString(a,b) {
    return a.split(b)[1];
}

function goto(a,b) {
  $("html, body").animate({ scrollTop: $(a).offset().top }, b);
}

$(function(){


  $('a').click(function(){
    $link = $(this).attr('href');

    //Check for #

    if ($link.indexOf('#')>=0) {

      $link = $link.split('#').pop();
      $link = '.'+$link;
      goto($link,150);

    }

  });


});
