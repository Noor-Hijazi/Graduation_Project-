
document.addEventListener('DOMContentLoaded', (event) => {
    document.addEventListener('click', function(event) {
        const clickedButton = event.target.closest('.love-button');
        if (!clickedButton) return; // Ignore clicks on elements other than love buttons
        
        const loveButtons = document.querySelectorAll('.love-button');
        if (!clickedButton.classList.contains('active')) {
            // Remove 'active' class from all buttons
            loveButtons.forEach(btn => btn.classList.remove('active'));
            // Add 'active' class to the clicked button
            clickedButton.classList.add('active');
        }
    });
});

