$(document).ready(function() {


  //Old of me
  var d = new Date();
  var oldOfmeVAL = d.getFullYear() - 2001
  $('#oldOfme').text(oldOfmeVAL);

  //Scroll back to top
  $("html, body").animate({ scrollTop: 0 });


  $('a').click(function(){
    var link = $(this).attr('href')

    if (link.indexOf('#')>=0) {
      //Let him pass
    }else {
      window.open(link,'_blank');
      return false;
    }


  });


//YouTube background//
$('#YTbgv').YTPlayer({
    fitToBackground: true,
    videoId: '1G4isv_Fylg',
    repeat: true,
    mute: true,
});





  var devWith = $(window).width();

  if (devWith < '1000') {
    //On mobile
    $('.downContent').removeClass('notshowyet');


  }else {
    //On desktop
    $(window).scroll(function(){

      var windowOffset = $(this).scrollTop();


      if (windowOffset > $('.topabout').offset().top/5) {
        $('.topabout').addClass('topFadein');
        }else {
          $('.topabout').removeClass('topFadein');
        }


      if (windowOffset > $('.aboutMe').offset().top/1.4) {
        $('.aboutMe').addClass('rightFadein');
        }else {
        $('.aboutMe').removeClass('rightFadein');
        }


      if (windowOffset > $('.youtubeiwatch').offset().top/1.3) {
        $('.youtubeiwatch').addClass('leftFadein');
      }else {
        $('.youtubeiwatch').removeClass('leftFadein');
      }


      if (windowOffset > $('.placeigo').offset().top/1.3) {
        $('.placeigo').addClass('rightFadein');
      }else {
        $('.placeigo').removeClass('rightFadein');
      }

      if (windowOffset > $('.findmeon').offset().top/1.3) {
        $('.findmeon').addClass('leftFadein');
      }else {
        $('.findmeon').removeClass('leftFadein');
      }


    });



  }//END of window scrolling function







});
