
// Automatic slider functionality
let currentIndex = 0;
const slides = document.querySelectorAll('.slides li');
const totalSlides = slides.length;

function showSlide(index) {
    slides.forEach((slide, i) => {
        slide.classList.remove('active');
        if (i === index) {
            slide.classList.add('active');
        }
    });
}

function nextSlide() {
    currentIndex = (currentIndex + 1) % totalSlides; // Loop back to the first slide
    showSlide(currentIndex);
}

setInterval(nextSlide, 3000); // Change slide every 3 seconds