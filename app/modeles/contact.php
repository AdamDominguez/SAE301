<?php
require_once "database.php";
class Contact extends Database
{
    /*******************************************************
    Permet l'envoi d'un mail avec un insert en bdd en utilisant une requête préparée
    Entrée : $nom, $prenom, $email, $numero, $message
    Retour : $success
    *******************************************************/
    public function pushMail()
    {
        // utilisation de $_POST pour lire la requête http et ses valeurs
        $nom = $_POST['nom'] ?? '';
        $prenom = $_POST['prenom'] ?? '';
        $email = $_POST['email'] ?? '';
        $numero = $_POST['numero'] ?? '';
        $message = $_POST['message'] ?? '';

        // la condition permet de s'assurer que tout les champs nécéssaires sont disponibles avant d'envoyer le tout en bdd
        //  utilisation du filtre FILTER_VALIDATE_EMAIL pour être sûr d'avoir un format correcte
        if ($nom && $prenom && filter_var($email, FILTER_VALIDATE_EMAIL) && $message) {

            $req = 'INSERT INTO contact (nom, prenom, email, numero, message, date_envoi) VALUES (:nom, :prenom, :email, :numero, :message, NOW())';

            $data = [
                'nom' => $nom,
                'prenom' => $prenom,
                'email' => $email,
                // ici on précise bien que l'on peut retourner une valeur vide pour le numéro car notre formulaire ne le demande pas strictement
                'numero' => $numero ?: null,
                'message' => $message
            ];

            $success = $this->execReqPrep($req, $data);

            return $success;
        } else {
            return false;
        }
    }
}