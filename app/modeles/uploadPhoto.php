<?php

class UploadPhoto
{

    /*******************************************************
    Enregistre la photo d'un membre
    Entrée :
    idMembre [string] : l'identifiant du membre
    _FILES [array] : tableau contenant les fichiers uploadé

    Retour :
     *******************************************************/
    public function updatePhotoProfil($idMembre)
    {
        // Test s'il n'y a pas d'erreur
        if ($_FILES['photoMembre']['error'] == 0) {
            // Test si la taille du fichier uploadé est conforme
            if ($_FILES['photoMembre']['size'] <= 5000000) {
                // Test si l'extension du fichier uploadé est autorisée
                $infosfichier = new SplFileInfo($_FILES['photoMembre']['name']);
                $extension_upload = $infosfichier->getExtension();
                $extensions_autorisees = array('jpeg', 'jpg', 'png', 'webp');
                if (in_array($extension_upload, $extensions_autorisees)) {
                    // Stockage définitif du fichier photo dans le dossier "photoMembre"
                    move_uploaded_file(
                        $_FILES['photoMembre']['tmp_name'],
                        PHOTOMEMDIR . "/" . $idMembre . '.' . $extension_upload
                    );
                } else
                    throw new Exception("Erreur : Type de fichier non autorisé. Veuillez utiliser une image au format JPG, PNG ou WEBP.");
            } else
                throw new Exception("Erreur : L'image est trop volumineuse. La taille maximum autorisée est de 5 Mo.");
        } else
            throw new Exception("Une erreur est survenue lors du téléchargement de l'image. (Code d'erreur : " . $_FILES['photoMembre']['error'] . ")");
    }
}
