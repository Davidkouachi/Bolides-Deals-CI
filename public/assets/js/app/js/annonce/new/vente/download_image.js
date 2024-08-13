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

    function updateFileCount() {
        let filledCount = 0;
        fileInputs.forEach(input => {
            if (input.files.length > 0) {
                filledCount++;
            }
        });
        fileCountDisplay.textContent = ` ${filledCount} / ${fileInputs.length - 1}`;
    }

    fileInputs.forEach((input, index) => {
        input.addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    imagePreviews[index].src = e.target.result;
                    removeButtons[index].style.display = 'block';
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
            updateFileCount();
        });
    });

    // Initial hide of all remove buttons
    removeButtons.forEach(button => button.style.display = 'none');

    // Initial update
    updateFileCount();
});