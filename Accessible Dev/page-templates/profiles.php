<?php get_header(); /*Template Name: Profiles template*/ ?>



<div id="profiles-template">

  

</div>

<!-- btn to top of page -->
<button onclick="topFunction()" id="btn-top" title="Go to top"><i class="fa-solid fa-arrow-up"></i></button>

<!-- js for top button -->
<script>
// Get the button:
let mybutton = document.getElementById("btn-top");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0; // For Safari
  document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
}
</script>



<?php get_footer();?>