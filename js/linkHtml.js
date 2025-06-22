function loadHTML(url, elementId) {
    fetch(url)
        .then(response => {
            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            }
            return response.text();
        })
        .then(html => {
            document.getElementById(elementId).innerHTML = html;
        })
        .catch(error => {
            console.error(`Error loading ${url}:`, error);
            document.getElementById(elementId).innerHTML = `<p style="color: red;">Error loading ${url}</p>`;
        });
}

// Call the function for header and footer when the DOM is fully loaded
document.addEventListener('DOMContentLoaded', function() {
    loadHTML('/Header/header.html', 'header-placeholder');
    loadHTML('/Footer/footer.html', 'footer-placeholder');
});