$(document).ready(function() {

$('a').click(function(){
  var link = $(this).attr('href')

  if (link.indexOf('#')>=0) {
    //Let him pass
  }else {
    window.open(link,'_blank');
    return false;
  }
});

var navOffset = $('.Navbar').offset().top;

$('.Navbar').wrap('<div class="nav-placeholder"></div>');
$('.nav-placeholder').height($('.Navbar').outerHeight());
var navplaceholderbgcolor = $('.SoundCloud').css('background-color');
$('.nav-placeholder').css('background-color', navplaceholderbgcolor);
var wWith = $(window).width();

if (wWith <= 980) {
  //On mobile
}else {
  //On desktop
  $(window).scroll(function(){
    var scrollPos = $(window).scrollTop();

    if (scrollPos >= navOffset) {
      $('.Navbar').addClass('fixed')
    }else {
      $('.Navbar').removeClass('fixed')
    }
  });
}





});
