// slider Slick
$(document).ready(function(){
  if (jQuery('.slider-slick').size() > 0) {
    $('.slider-slick').slick({
      autoplay: true,
      pauseOnHover: true,
      autoplaySpeed: 3000,
      fade: true,
      cssEase: 'linear',
      arrows: false,
      dots: true,
      centerMode: true,
      focusOnSelect: true
    });
  }
});

// Fonction exécutée au redimensionnement et/ou load
function redimensionnement() {
  if("matchMedia" in window) { // Détection
    if(window.matchMedia("(max-width:640px)").matches) {

      // detection position du scroll
      var lastScrollTop = 0;
      $(window).scroll(function() {
         var st = $(this).scrollTop();
         if (st > lastScrollTop) {
            $('#navPageSmall').slideUp("fast");
            $('#navPictosRaccourcis').slideDown();
         }
          else {
            $('#navPageSmall').slideDown();
            $('#navPictosRaccourcis').slideUp("fast");
         }
         lastScrollTop = st;
      });

    }
  }
}
// On lie l'événement resize et/ou load à la fonction
window.addEventListener('resize', redimensionnement, false);
$(window).load(function() {
  redimensionnement();
});
