document.addEventListener('DOMContentLoaded', function() {
    var passwordField = document.getElementById('password');
    var cpasswordField = document.getElementById('cpassword');

    function preventCopyPaste(event) {
        if (event.ctrlKey && (event.key === 'c' || event.key === 'v')) {
            event.preventDefault();
        }
    }

    function preventContextMenu(event) {
        event.preventDefault();
    }

    // Bloquer les événements Ctrl+C et Ctrl+V
    passwordField.addEventListener('keydown', preventCopyPaste);
    cpasswordField.addEventListener('keydown', preventCopyPaste);

    // Bloquer le menu contextuel (clic droit)
    passwordField.addEventListener('contextmenu', preventContextMenu);
    cpasswordField.addEventListener('contextmenu', preventContextMenu);
});
