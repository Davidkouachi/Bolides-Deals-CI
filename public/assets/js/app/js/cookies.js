document.addEventListener('DOMContentLoaded', function(event) {
    event.preventDefault();
    // Vérifiez si le cookie de consentement existe
    const cookieConsent = getCookie('cookieConsent');

    if (!cookieConsent) {
        var modalHtml = `
                    <div class="modal fade" id="CookiesOver" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true" aria-modal="true" style="position: fixed;" role="dialog" data-bs-backdrop="static" data-bs-keyboard="false">
                        <div class="modal-dialog modal-dialog-centered modal-lg align-items-center justify-content-center">
                        </div>
                    </div>
                `;

        // Insert the modal into the DOM
        document.body.insertAdjacentHTML('beforeend', modalHtml);

        // Show the modal
        var modal = new bootstrap.Modal(document.getElementById('CookiesOver'));
        modal.show();

        document.getElementById('cookieConsent').style.display = 'block';
    } else {
        document.getElementById('cookieConsent').style.display = 'none';
        modal.hide();
    }

    // Gérer le clic sur le bouton d'acceptation des cookies
    document.getElementById('acceptCookies').addEventListener('click', function() {
        setCookie('cookieConsent', 'accepted', 365); // Cookie valide pendant 1 an
        document.getElementById('cookieConsent').style.display = 'none';
        modal.hide();
    });

    // Fonction pour obtenir un cookie par son nom
    function getCookie(name) {
        const value = `; ${document.cookie}`;
        const parts = value.split(`; ${name}=`);
        if (parts.length === 2) return parts.pop().split(';').shift();
    }

    // Fonction pour définir un cookie
    function setCookie(name, value, days) {
        let expires = '';
        if (days) {
            const date = new Date();
            date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
            expires = `; expires=${date.toUTCString()}`;
        }
        document.cookie = `${name}=${(value || '') + expires}; path=/`;
    }
});
