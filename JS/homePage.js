let slideIndex = 0;
let intervalId = null;
function changeSlide(n) {
    const slides = document.querySelectorAll('.slide');
    slideIndex += n;
    if (slideIndex < 0) {
        slideIndex = slides.length - 1;
    }
    if (slideIndex >= slides.length) {
        slideIndex = 0;
    }
    const offset = -slideIndex * 100;
    document.querySelector('.slider').style.transform = `translateX(${offset}%)`;
}


// Define the function to change to the next slide
function nextSlide() {
    changeSlide(1);
}

// Start the interval to automatically change slides every 5 seconds
intervalId = setInterval(nextSlide,5000);