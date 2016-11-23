$(document).ready(function() {
  
  // Smooth Scroll
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
  
  // Mostra o dropdown menu e exibe só as categorias filhas da categoria que se passa o mouse em cima
  $("#js-main-menu li p").hover(function() {
     // Mostra dorpdown menu
    $("#dropdown").slideDown(010);
    
    // Mostra subcategorias atreladas à categoria clicada
    var clickedId = $(this).attr("id");
    $(".child-cat").hide();
    $("."+clickedId).css("display", "inline-block");
    
  });
  
  // Esconde dropdown menu quando cursor sai do elemento <header>
  $("header").hover(function(){/* Empty */}, function() {
    $("#dropdown").slideUp(010);
  });
  
});