document.addEventListener("DOMContentLoaded", () => {
    const btnUpload = document.querySelector(".upload-photo");
    const formPhoto = document.querySelector(".formPhoto");
    const inputPhoto = formPhoto.querySelector("input[type='file']");

    if (btnUpload && inputPhoto) {
        // déclenche la saisie du fichier lorsque l'on clique sur le bouton de l'appareil photo
        btnUpload.addEventListener("click", (e) => {
            e.preventDefault(); // grâce à cette méthode du DOM on empêche le caractère de base d'un bouton en html et qui permet de ne pas soumettre le formulaire immédiatement
            inputPhoto.click();
        });

        // envoie automatiquement le formulaire quand un fichier est sélectionné
        inputPhoto.addEventListener("change", () => {
            if (inputPhoto.files.length > 0) {
                formPhoto.submit();
            }
        });
    }
});
