$(document).ready(function() {

   $(".menu-button").click(function() {
    $("#menu").toggleClass("move");
});


   $(window).scroll(function() {

    if ($("#hhome header").offset().top > 0) {
     $('#menu').addClass("act");
     //$('#menu container nav ul li').removeClass("sliding-u-l-r ");
     
    }else{
     
     $('#menu').removeClass("act");
    // $('#menu container nav ul li').addClass("sliding-u-l-r ");
   }
  });
});