document.getElementById("registre_password").addEventListener("submit", function(event) {
    event.preventDefault();

    var email = document.getElementById("email").value;
    
    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email)) {
        NioApp.Toast("<h5>Information</h5><p>Veuillez saisir une adresse e-mail valide.</p>", "info", { position: "top-center" });
        return false;
    }

    this.submit();

});
