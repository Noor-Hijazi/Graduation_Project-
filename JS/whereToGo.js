
// language filter

const languageFilter = document.getElementById('language-filter');


languageFilter.addEventListener('change', function() {
    // Get the selected language value
    const selectedLanguage = languageFilter.value;

   
    const guideBoxes = document.querySelectorAll('.box');

    // Loop through each guide box
    guideBoxes.forEach(function(box) {
        const languages = box.getAttribute('data-languages');
        
        console.log(selectedLanguage);
        // Check if languages is not null and the selected language is present in the guide's languages
        if (languages && languages.includes(selectedLanguage)) {

            // Show the guide box if it speaks the selected language
            box.style.display = 'block';
        } else {
            // Hide the guide box if it does not speak the selected language or if languages is null
            box.style.display = 'none';
        }
    });
});

// experience filter

const experienceFilter = document.getElementById('experience-filter');


experienceFilter.addEventListener('change', function() {
   
    const selectedExperience = experienceFilter.value;
  
    const guideBoxes = document.querySelectorAll('.box');


    guideBoxes.forEach(function(box) {
        
        const experience = box.getAttribute('data-experience');
        
        // Check if experience is not null and the selected experience matches the guide's experience
        if (experience && experience === selectedExperience) {
          
            box.style.display = 'block';
        } else {
            // Hide the guide box if it does not match the selected experience
            box.style.display = 'none';
        }
    });
});

// filter places 



const placeFilter = document.getElementById('can-go-filter');

placeFilter.addEventListener('change', function() {
  
    const selectedPlace = placeFilter.value;

  
    const guideBoxes = document.querySelectorAll('.box');

    // Loop through each guide box
    guideBoxes.forEach(function(box) {
       
        const places = box.getAttribute('data-cango');

        // Check if the data attribute is not null
        if (places) {
            // Split the places string into an array of places, removing any whitespace
            const placesArray = places.split(/,\s*/);

            // Check if the selected place is in the array of places
            const shouldDisplay = placesArray.includes(selectedPlace);

            // Set the guide box display based on whether it should be shown or hidden
            box.style.display = shouldDisplay ? 'block' : 'none';
        } else {
            // If places attribute is missing, hide the guide box
            box.style.display = 'none';
        }
    });
});
