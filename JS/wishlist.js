document.addEventListener("DOMContentLoaded", function() {
    const loveButtons = document.querySelectorAll(".love-button");
  
    // Function to handle clicking on the love button
    function handleButtonClick(event) {
      const button = event.target;
      button.classList.toggle("clicked"); // Toggle class 'clicked'
      
      // Update local storage to save the state
      const buttonId = button.getAttribute("data-id");
      const isClicked = button.classList.contains("clicked");
      localStorage.setItem(buttonId, isClicked);
    }
  
    // Add event listener to each love button to handle clicks
    loveButtons.forEach(function(button) {
      button.addEventListener("click", handleButtonClick);
  
      // Check local storage for saved state and apply if exists
      const buttonId = button.getAttribute("data-id");
      const isClicked = localStorage.getItem(buttonId) === "true";
      if (isClicked) {
        button.classList.add("clicked");
      }
    });
  });
  
  console.log("Hi");