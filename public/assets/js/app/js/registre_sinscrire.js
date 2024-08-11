document.getElementById("registre_sinscrire").addEventListener("submit", function(event) {
    event.preventDefault();

    var nom = document.getElementById("nom").value;
    var prenom = document.getElementById("prenom").value;
    var email = document.getElementById("email").value;
    var phone = document.getElementById("phone").value;
    var password = document.getElementById("password").value;
    var cpassword = document.getElementById("cpassword").value;

    if (phone.length !== 10) {
        NioApp.Toast("<h5>Information</h5><p>Veuillez saisir un numéro de téléphone valide.</p>", "info", { position: "top-center" });
        return false;
    }
    
    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email)) {
        NioApp.Toast("<h5>Information</h5><p>Veuillez saisir une adresse e-mail valide.</p>", "info", { position: "top-center" });
        return false;
    }

    // var phoneRegex = /^[0-9]{10}$/;
    // if (!phoneRegex.test(phone)) {
    //     NioApp.Toast("<h5>Information</h5><p>Veuillez saisir un numéro de téléphone valide.</p>", "info", { position: "top-center" });
    //     return false;
    // }

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
