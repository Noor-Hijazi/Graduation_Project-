document.getElementById('driving_license_yes').addEventListener('change', function() {
    var uploadDiv = document.getElementById('driving_license_upload');
    if (this.checked) {
        uploadDiv.style.display = 'block';
        document.getElementById('error_message').style.display = 'none';
    }
});

document.getElementById('driving_license_no').addEventListener('change', function() {
    var uploadDiv = document.getElementById('driving_license_upload');
    if (this.checked) {
        uploadDiv.style.display = 'none';
        document.getElementById('error_message').style.display = 'block';
    } else {
        document.getElementById('error_message').style.display = 'none';
    }
});

document.getElementById('rentalForm').addEventListener('submit', function(event) {
    if (document.getElementById('driving_license_no').checked) {
        event.preventDefault();
        document.getElementById('error_message').style.display = 'block';
    }
});