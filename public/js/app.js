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