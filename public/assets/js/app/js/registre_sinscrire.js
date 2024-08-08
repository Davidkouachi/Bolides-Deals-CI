document.getElementById("registre_sinscrire").addEventListener("submit", function(event) {
    event.preventDefault();

    document.getElementById('errorMessage').style.display = 'none';

    var name_sinscrire = document.getElementById("nom_sinscrire").value;
    var email_sinscrire = document.getElementById("email_sinscrire").value;
    var tel_sinscrire = document.getElementById("tel_sinscrire").value;
    var password1_sinscrire = document.getElementById("password_sinscrire").value;
    var password2_sinscrire = document.getElementById("password2_sinscrire").value;

    if (!name_sinscrire || !email_sinscrire || !tel_sinscrire || !password1_sinscrire || !password2_sinscrire) {
        NioApp.Toast("<h5>Alert</h5><p>Veuillez remplir tous les champs.</p>", "warning", { position: "top-right" });
        return false;
    }

    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email_sinscrire)) {
        NioApp.Toast("<h5>Information</h5><p>Veuillez saisir une adresse e-mail valide.</p>", "info", { position: "top-right" });
        return false;
    }

    if (tel_sinscrire.length !== 10) {
        NioApp.Toast("<h5>Information</h5><p>Veuillez saisir un numéro de téléphone valide.</p>", "info", { position: "top-right" });
        return false;
    }

    var checkboxes = document.querySelectorAll('#checkboxGroup input[type="checkbox"]');
    var isChecked = Array.from(checkboxes).some(checkbox => checkbox.checked);

    if (!isChecked) {
        document.getElementById('errorMessage').style.display = 'block';
        NioApp.Toast("<h5>Alert</h5><p>Veuillez selectionner une case.</p>", "warning", { position: "top-right" });
        return false;
    }

    if (password1_sinscrire !== password2_sinscrire) {
        NioApp.Toast("<h5>Erreur</h5><p>Les mots de passe ne correspondent pas.</p>", "error", { position: "top-right" });
        return false;
    }

    if (password1_sinscrire === password2_sinscrire) {
        // Vérification si le mot de passe satisfait les critères
        if (!verifierMotDePasse(password1_sinscrire) || !verifierMotDePasse(password2_sinscrire)) {
            NioApp.Toast("<h5>Information</h5><p>Le mot de passe doit comporter au moins 8 caractères, une lettre majuscule, une lettre minuscule et un chiffre.</p>", "error", { position: "top-right" });
            return false;
        }
    }

    var modalConnexion = bootstrap.Modal.getInstance(document.getElementById('modalSinscrire'));
    if (modalConnexion) {
        modalConnexion.hide();
    }

    // Preload modal HTML
    var modalHtml = `
                <div class="modal fade" tabindex="-1" id="modalL" aria-modal="true" style="position: fixed;" role="dialog" data-bs-backdrop="static" data-bs-keyboard="false">
                    <div class="modal-dialog modal-sm" role="document">
                        <div class="modal-content">
                            <div class="modal-body modal-body-lg text-center">
                                <div class="nk-modal">
                                    <h5 class="nk-modal-title text-warning ">Traitement en cours</h5>
                                    <div class="nk-modal-text">
                                        <div class="text-center">
                                            <div class="spinner-border text-warning" role="status"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            `;

    // Insert the modal into the DOM
    document.body.insertAdjacentHTML('beforeend', modalHtml);

    // Show the modal
    var modal = new bootstrap.Modal(document.getElementById('modalL'));
    modal.show();

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
