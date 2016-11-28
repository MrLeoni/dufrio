$(document).ready(function() {
  
  /* ---------------------------------------------
  // Smooth Scroll
  ----------------------------------------------*/
  
  $(function() {
  $('a[href*="#"]:not([href="#"])').click(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
      if (target.length) {
        $('html, body').animate({
          scrollTop: target.offset().top
        }, 800);
        return false;
        }
      }
    });
  });
  
  /* ---------------------------------------------
  // Mobile Engine
  ----------------------------------------------*/
  
  $("#js-mobile-btn").click(function() {
    
    // Toggle class active in #js-mobile-btn
    $(this).toggleClass("active");
    
    // Store elements
    // Mobile button
    var button = $("#js-mobile-btn");
    // Main navigation menu
    var navigation = $(".main-nav");
    
    // Use hasClass to check if the button has a CSS class of "active"
    var buttonClass = $(this).hasClass("active");
    
    // If the button has "active" CSS class
    if(buttonClass) {
      
      // Slide menu down
      navigation.slideDown(500);
      // Change "Menu" button text to "Fechar"
      button.html("Fechar");
      
    } else {
      // If the button don't have "active" CSS class
      
      // Slide up the main menu
      navigation.slideUp(500);
      // Change button text to "Menu"
      button.html("Menu");
      
    }
    
  });
  
});