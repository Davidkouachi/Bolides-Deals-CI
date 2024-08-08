function handleFormSubmit(event) {
    event.preventDefault(); // Prevent default form submission
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

    // If all validations pass, submit the form
    this.submit();
}

// Attach event listener to both forms
document.getElementById("form").addEventListener("submit", handleFormSubmit);
document.getElementById("form_click").addEventListener("submit", handleFormSubmit);
