document.getElementById("registre_password_new").addEventListener("submit", function(event) {
    event.preventDefault();

    var password = document.getElementById("password").value;
    var cpassword = document.getElementById("cpassword").value;

    if (password !== cpassword) {
        NioApp.Toast("<h5>Erreur</h5><p>Les mots de passe ne correspondent pas.</p>", "error", { position: "top-center" });
        return false;
    }

    if (password === cpassword) {
        // Vérification si le mot de passe satisfait les critères
        if (!verifierMotDePasse(password) || !verifierMotDePasse(cpassword)) {
            NioApp.Toast("<h5>Information</h5><p>Le mot de passe doit comporter au moins 8 caractères, une lettre majuscule, une lettre minuscule et un chiffre.</p>", "error", { position: "top-center" });
            return false;
        }
    }

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
