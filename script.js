function scrollToContent(sectionId) {
    var section = document.getElementById(sectionId);
    section.scrollIntoView({ behavior: 'smooth' });
}

// JavaScript for slider loop
let slideIndex = 0;
const slides = document.querySelectorAll('.slider img');
const totalSlides = slides.length;

function showSlide(n) {
    slides.forEach(slide => {
        slide.style.display = 'none';  // Hide all slides
    });
    slideIndex = (n + totalSlides) % totalSlides; // Ensure slideIndex loops back to 0 after the last slide
    slides[slideIndex].style.display = 'block'; // Display the current slide
}

function nextSlide() {
    showSlide(slideIndex + 1); // Display next slide
}

// Auto play the slider
setInterval(nextSlide, 3000); // Change slide every 3 seconds (adjust as needed)

// Function to scroll to the top of the page
function goToTop() {
    document.body.scrollTop = 0; // For Safari
    document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
  }
  
  // Show the button when the user scrolls down 20px from the top of the document
  window.onscroll = function() {scrollFunction()};
  
  function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
      document.getElementById("goToTopBtn").style.display = "block";
    } else {
      document.getElementById("goToTopBtn").style.display = "none";
    }
  }
  