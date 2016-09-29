$(document).ready(function() {

   $(".menu-button").click(function() {
    $("#menu").toggleClass("move");
});


   $(window).scroll(function() {

    if ($("header").offset().top > 0) {
     $('#menu').addClass("act"); 
    }else{
     
     $('#menu').removeClass("act");
   }
  });
});