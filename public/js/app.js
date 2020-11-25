//Viser le bouton
var mybutton = document.getElementById("scroll-to-top-button");

// Si on scroll a 20px du haut le bouton apparait
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

// Au click on remonte
function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}


// Menu fixe sur la page Blog 

// $(function(){
//   // On recupere la position du bloc par rapport au haut du site
//   var position_top_raccourci = $(".category-menu").offset().top;
  
//   //Au scroll dans la fenetre on déclenche la fonction
//   $(window).scroll(function () {
  
//   //si on a defile de plus de 150px du haut vers le bas
//   if ($(this).scrollTop() > position_top_raccourci) {
  
//   //on ajoute la classe "fixNavigation" a <div id="navigation">
//   $('.category-menu').addClass("fixNavigation"); 
//   } else {
  
//   //sinon on retire la classe "fixNavigation" a <div id="navigation">
//   $('.category-menu').removeClass("fixNavigation");
//   }
//   });
//   });
