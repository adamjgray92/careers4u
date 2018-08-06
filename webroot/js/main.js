$(document).ready(function(){
  $(".button a").click(function(){
    $(".overlay").fadeToggle(200);
     $(this).toggleClass('btn-open').toggleClass('btn-close');
     $('body').toggleClass('no-scroll');
  });
  $(".job-view--mobile-btn").on("click",function(){
    $(".job-view--actions-menu").toggleClass("open");
  });
});

$('.overlay').on('click', function(){
  $(".overlay").fadeToggle(200);   
  $(".button a").toggleClass('btn-open').toggleClass('btn-close');
  $('body').toggleClass('no-scroll');
  open = false;
});