$(function(){

$image = $('[name=image]');
$upload = $('.upload');
$url = window.location.href;

$image.change(function(){


  $('.uploadIcon').addClass('gotfile');
  $upload.submit();

});

// Ya ya ya i got a same settings of Hostmystuff,got a problem with that?HUM?
// https://hostmystuff.ml

$('[name=image]').on('dragenter',function(){
  $('.upload').addClass('gotfile');
  $('.uploadIcon').addClass('gotfile');
});

$('[name=image]').on('dragleave',function(){
  $('.upload').removeClass('gotfile');
  $('.uploadIcon').removeClass('gotfile');
});

$('[name=image]').on('drop',function(){
  $('.upload').addClass('readyhost');
  $('.uploadIcon').removeClass('gotfile');
  $('.uploadIcon').addClass('uploadfile');
});

$('.myface').on('contextmenu',function(){
  // Hay why you try to clicking my face HUM???
  return false;
});

$('.myface').on('mousedown',function(){
  //Oh how you want to drag my face right? AM I RIGHT??
  return false;
});



});
