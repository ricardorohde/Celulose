$(document).ready(function() {

   $(".menu-button").click(function() {
    $("#menu").toggleClass("move");
});

   
   $("#menu-button-home").click(function() {
    $("#menu").toggleClass("move");
});


   $(window).scroll(function() {

    if ($("header").offset().top > 0) {
     $('#menu-home').addClass("act"); 
    }else{
     
     $('#menu-home').removeClass("act");
   }
  });
});