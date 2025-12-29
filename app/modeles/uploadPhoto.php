<?php
require_once "database.php";

class UploadPhoto extends Database
{

    /*******************************************************
    Enregistre la photo d'un membre
    Entrée :
    idArt [string] : l'identifiant du membre
    _FILES [array] : tableau contenant les fichiers uploadé

    Retour :
     *******************************************************/
    public function updatePhotoProfil($idMembre)
    {
        // Test s'il n'y a pas d'erreur
        if ($_FILES['photoArticle']['error'] == 0) {
            // Test si la taille du fichier uploadé est conforme
            if ($_FILES['photoArticle']['size'] <= 500000) {
                // Test si l'extension du fichier uploadé est autorisée
                $infosfichier = new SplFileInfo($_FILES['photoArticle']['name']);
                $extension_upload = $infosfichier->getExtension();
                $extensions_autorisees = array('jpg', 'png');
                if (in_array($extension_upload, $extensions_autorisees)) {
                    // Stockage définitif du fichier photo dans le dossier "photoArticle"
                    move_uploaded_file(
                        $_FILES['photoArticle']['tmp_name'],
                        PHOTOARTDIR . "/" . $idMembre . '.' . $extension_upload
                    );
                } else
                    throw new Exception("Photo de l'article $idMembre : type de fichier non autorisé");
            } else
                throw new Exception("Photo de l'article $idMembre : Fichier trop volumineux");
        } else
            throw new Exception("Photo de l'article $idMembre : Code d'erreur : " . $_FILES['photoArticle']['error']);
    }
}
