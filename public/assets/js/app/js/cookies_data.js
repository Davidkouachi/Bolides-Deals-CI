document.addEventListener('DOMContentLoaded', function() {
    // Fonction pour obtenir un cookie par son nom
    function getCookie(name) {
        const value = `; ${document.cookie}`;
        const parts = value.split(`; ${name}=`);
        if (parts.length === 2) return parts.pop().split(';').shift();
    }

    // Obtenez la valeur du cookie de consentement
    const cookieConsent = getCookie('cookieConsent');

    if (cookieConsent) {
        // Sélectionner tous les liens qui doivent inclure le cookie de consentement
        const links = document.querySelectorAll('a[data-cookie-consent]');

        links.forEach(link => {
            const originalHref = link.getAttribute('href');
            const newHref = new URL(originalHref, window.location.origin);
            newHref.searchParams.set('cookieConsent', cookieConsent);
            link.setAttribute('href', newHref.toString());
        });
    }
});
