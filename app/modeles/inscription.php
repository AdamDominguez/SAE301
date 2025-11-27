<?php
require_once "database.php";
class Inscription extends Database
{
    /*******************************************************
    Permet l'inscription d'un user avec un insert en bdd en utilisant une requête préparée
    Entrée : $nom, $prenom, $email, $numero, $message
    Retour : $success
    *******************************************************/
    public function pushInscription()
    {
        $nom = $_POST['nom'] ?? '';
        $prenom = $_POST['prenom'] ?? '';
        $email = $_POST['email'] ?? '';
        $numero = $_POST['numero'] ?? '';
        $dob_raw = $_POST['dob'] ?? '';
        $dob = date('Y-m-d', strtotime(str_replace('/', '-', $dob_raw)));
        $mdp = $_POST['mdp'] ?? '';

        if ($nom && $prenom && filter_var($email, FILTER_VALIDATE_EMAIL) && $dob && $mdp) {

            $req = 'INSERT INTO membres (nom, prenom, email, numero, dob, mdp, date_envoi)
                VALUES (:nom, :prenom, :email, :numero, :dob, :mdp, NOW())';

            $data = [
                'nom' => $nom,
                'prenom' => $prenom,
                'email' => $email,
                'numero' => $numero ?: null,
                'dob' => $dob,
                'mdp' => $mdp
            ];

            $success = $this->execReqPrep($req, $data);

            return $success;
        } else {
            return false;
        }
    }
}