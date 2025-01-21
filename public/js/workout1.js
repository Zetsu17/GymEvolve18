// Fetch PHP content and inject it into the div with id 'php-content'
fetch('php/workout1.php')
    .then(response => response.text())
    .then(data => {
        document.getElementById('php-content').innerHTML = data;
    })
    .catch(error => console.error('Error loading PHP file:', error));
