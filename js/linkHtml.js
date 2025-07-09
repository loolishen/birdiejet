function loadHTML(url, elementId, callback) {
    fetch(url)
        .then(response => {
            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            }
            return response.text();
        })
        .then(html => {
            document.getElementById(elementId).innerHTML = html;
            if (callback) callback(); // run event binding only after HTML is injected
        })
        .catch(error => {
            console.error(`Error loading ${url}:`, error);
            document.getElementById(elementId).innerHTML = `<p style="color: red;">Error loading ${url}</p>`;
        });
}

function initMobileMenu() {
    const burgerIcon = document.getElementById('burgerIcon');
    const mobileOverlay = document.getElementById('mobileOverlay');
    const closeOverlay = document.getElementById('closeOverlay');

    if (burgerIcon && mobileOverlay && closeOverlay) {
        burgerIcon.addEventListener('click', function () {
            mobileOverlay.classList.add('active');
        });

        closeOverlay.addEventListener('click', function () {
            mobileOverlay.classList.remove('active');
        });
    }
}

// Call header and footer loading when DOM is ready
document.addEventListener('DOMContentLoaded', function () {
    loadHTML('Header/header.html', 'header-placeholder', initMobileMenu);
    loadHTML('/staging/birdiejet/Footer/footer.html', 'footer-placeholder');
});
