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
        $nom = $_POST['nom'] ?? '';
        $prenom = $_POST['prenom'] ?? '';
        $email = $_POST['email'] ?? '';
        $numero = $_POST['numero'] ?? '';
        $message = $_POST['message'] ?? '';

        if ($nom && $prenom && filter_var($email, FILTER_VALIDATE_EMAIL) && $message) {

            $req = 'INSERT INTO contact (nom, prenom, email, numero, message, date_envoi) VALUES (:nom, :prenom, :email, :numero, :message, NOW())';

            $data = [
                'nom' => $nom,
                'prenom' => $prenom,
                'email' => $email,
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