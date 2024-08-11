document.getElementById("registre_connexion").addEventListener("submit", function(event) {
    event.preventDefault();

    var login = document.getElementById("login").value;
    var password = document.getElementById("password").value;

    if (!login || !password) {
        NioApp.Toast("<h5>Alert</h5><p>Veuillez remplir tous les champs.</p>", "warning", { position: "top-center" });
        return false;
    }

    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    var phoneRegex = /^[0-9]{10}$/;
    if (!emailRegex.test(login) && !phoneRegex.test(login)) {
        NioApp.Toast("<h5>Information</h5><p>Veuillez saisir une adresse e-mail ou un numéro de téléphone valide.</p>", "info", { position: "top-center" });
        return false;
    }

    if (!verifierMotDePasse(password)) {
        NioApp.Toast("<h5>Information</h5><p>Le mot de passe doit comporter au moins 8 caractères, une lettre majuscule, une lettre minuscule et un chiffre.</p>", "error", { position: "top-center" });
        return false;
    }

    var modalConnexion = bootstrap.Modal.getInstance(document.getElementById('modalConnexion'));
    if (modalConnexion) {
        modalConnexion.hide();
    }

    // Preload modal HTML
    // var modalHtml = `
    //             <div class="modal fade" tabindex="-1" id="modalL" aria-modal="true" style="position: fixed;" role="dialog" data-bs-backdrop="static" data-bs-keyboard="false">
    //                 <div class="modal-dialog modal-sm" role="document">
    //                     <div class="modal-content">
    //                         <div class="modal-body modal-body-lg text-center">
    //                             <div class="nk-modal">
    //                                 <h5 class="nk-modal-title text-warning ">Traitement en cours</h5>
    //                                 <div class="nk-modal-text">
    //                                     <div class="text-center">
    //                                         <div class="spinner-border text-warning" role="status"></div>
    //                                     </div>
    //                                 </div>
    //                             </div>
    //                         </div>
    //                     </div>
    //                 </div>
    //             </div>
    //         `;

    // document.body.insertAdjacentHTML('beforeend', modalHtml);

    // var modal = new bootstrap.Modal(document.getElementById('modalL'));
    // modal.show();

    this.submit();

    function verifierMotDePasse(motDePasse) {

        if (motDePasse.length < 8) {
            return false;
        }

        if (!/[A-Z]/.test(motDePasse)) {
            return false;
        }

        if (!/[a-z]/.test(motDePasse)) {
            return false;
        }

        if (!/\d/.test(motDePasse)) {
            return false;
        }

        return true;
    }

});
