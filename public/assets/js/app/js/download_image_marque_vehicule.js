document.addEventListener('DOMContentLoaded', function() {
    const fileInput = document.getElementById('imageInput');
    const imagePreview = document.getElementById('imagePreview');
    const removeButton = document.getElementById('removeButton');

    fileInput.addEventListener('change', function(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                imagePreview.src = e.target.result;
                removeButton.style.display = 'block';
                fileInput.style.display = 'none';
            }
            reader.readAsDataURL(file);
        }
    });

    removeButton.addEventListener('click', function() {
        imagePreview.src = ''; // Réinitialiser l'image
        fileInput.value = ''; // Réinitialiser l'input file
        removeButton.style.display = 'none'; // Masquer le bouton
        fileInput.style.display = 'block'; // Réafficher l'input file
    });

    // Masquer le bouton au début
    removeButton.style.display = 'none';
});
