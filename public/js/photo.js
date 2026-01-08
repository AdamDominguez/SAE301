document.addEventListener("DOMContentLoaded", () => {
    const btnUpload = document.querySelector(".upload-photo");
    const formPhoto = document.querySelector(".formPhoto");
    const inputPhoto = formPhoto.querySelector("input[type='file']");

    if (btnUpload && inputPhoto) {
        // Déclenche la saisie du fichier lorsque l'on clique sur le bouton de l'appareil photo
        btnUpload.addEventListener("click", (e) => {
            e.preventDefault(); // Prevent default button behavior
            inputPhoto.click();
        });

        // Envoie automatiquement le formulaire quand un fichier est sélectionné 
        inputPhoto.addEventListener("change", () => {
            if (inputPhoto.files.length > 0) {
                formPhoto.submit();
            }
        });
    }
});
