 
 
 const slides =document.querySelectorAll(".slide img");
 var prev = document.querySelector(".prev"); 
 var next = document.querySelector(".next"); 
 console.log(next);

 let slideIndex =0;
 let intervalId = null;

 //initializeSlider();
document.addEventListener("DOMContentLoaded" , initializeSlider);
 function initializeSlider(){
    if(slides.length >= 0){
    slides[slideIndex].classList.add("displaySlide");
    //its about a timer to call the nextslide function
    intervalId = setInterval(nextSlide , 3000);

 }}

 function showSlide(Index){
    if (Index >= slides.length) {
       slideIndex =0; 
    }
    else if(Index < 0 ){
        slideIndex = slides.length -1; // last line
    }
    slides.forEach(slides=> {
            slides.classList.remove("displaySlide");
    });
    slides[slideIndex].classList.add("displaySlide");
 }

 function prevSlide(){
    
    slideIndex--;
    showSlide(slideIndex);
    
 }
 function nextSlide(){
    slideIndex++;
    showSlide(slideIndex);
 }
 
 prev.addEventListener("click" ,prevSlide);
 next.addEventListener("click" ,nextSlide);