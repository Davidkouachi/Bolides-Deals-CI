document.addEventListener('DOMContentLoaded', function() {
    const fileInputs = document.querySelectorAll('input[type="file"]');
    const fileCountDisplay = document.getElementById('fileCount');
    const imagePreviews = [
        document.getElementById('imagePreview1'),
        document.getElementById('imagePreview2'),
        document.getElementById('imagePreview3'),
        document.getElementById('imagePreview4'),
        document.getElementById('imagePreview5'),
        document.getElementById('imagePreview6')
    ];
    const removeButtons = [
        document.getElementById('btn_image1'),
        document.getElementById('btn_image2'),
        document.getElementById('btn_image3'),
        document.getElementById('btn_image4'),
        document.getElementById('btn_image5'),
        document.getElementById('btn_image6')
    ];

    const image_sizes = [
        document.getElementById('image_size1'),
        document.getElementById('image_size2'),
        document.getElementById('image_size3'),
        document.getElementById('image_size4'),
        document.getElementById('image_size5'),
        document.getElementById('image_size6')
    ];

    const maxFileSize = 2 * 1024 * 1024; // 2 Mo

    function updateFileCount() {
        let filledCount = 0;
        fileInputs.forEach(input => {
            if (input.files.length > 0) {
                filledCount++;
            }
        });
        fileCountDisplay.textContent = ` ${filledCount} / ${fileInputs.length }`;
    }

    fileInputs.forEach((input, index) => {
        input.addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (file) {

                if (file.size > maxFileSize) {
                    NioApp.Toast("<h5>Alert</h5><p>La taille du fichier dépasse 2 Mo. Veuillez télécharger un fichier plus petit.</p>", "warning", {position: "top-center"});
                    input.value = ''; // Clear the file input value
                    updateFileCount();
                    return;
                }

                const reader = new FileReader();
                reader.onload = function(e) {
                    imagePreviews[index].src = e.target.result;
                    removeButtons[index].style.display = 'block';
                    image_sizes[index].style.display = 'block';

                    // Conversion de la taille en Mo
                    const sizeInMB = file.size / (1024 * 1024);

                    let displaySize;
                    if (sizeInMB >= 1) {
                        displaySize = sizeInMB.toFixed(2) + ' Mo'; // Afficher en Mo
                    } else {
                        const sizeInKB = (file.size / 1024).toFixed(2);
                        displaySize = sizeInKB + ' Ko'; // Afficher en Ko
                    }

                    image_sizes[index].textContent = 'Taille : ' + displaySize;
                    input.style.display = 'none';
                }
                reader.readAsDataURL(file);
            }
            updateFileCount();
        });
    });

    removeButtons.forEach((button, index) => {
        button.addEventListener('click', function() {
            imagePreviews[index].src = ''; // Reset to default image or clear it
            fileInputs[index].value = ''; // Clear the file input value
            button.style.display = 'none'; // Hide the remove button
            fileInputs[index].style.display = 'block';
            image_sizes[index].style.display = 'none';
            updateFileCount();
        });
    });

    // Initial hide of all remove buttons
    removeButtons.forEach(button => button.style.display = 'none');

    // Initial update
    updateFileCount();
});