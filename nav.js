function loadContent(url, selector) {
    fetch(url)
        .then(response => response.text())
        .then(html => {
            document.querySelector(selector).innerHTML = html;
        })
        .catch(error => console.error('Error loading content:', error));
}


// Load the nav bar
loadContent('nav.php', 'header');

// // Load the footer
loadContent('footer.html', 'footer');
