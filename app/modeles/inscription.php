<?php
require_once "database.php";
class Inscription extends Database
{
    /*******************************************************
    Permet l'inscription d'un user avec un insert en bdd en utilisant une requête préparée, on utilise password_hash pour encrypter le mdp :D (https://www.php.net/manual/en/function.password-hash.php)
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
        $pays = $_POST['pays'] ?? '';
        $postal = $_POST['postal'] ?? '';
        $ville = $_POST['ville'] ?? '';
        $adresse = $_POST['adresse'] ?? '';

        if ($nom && $prenom && filter_var($email, FILTER_VALIDATE_EMAIL) && $dob && $mdp) {

            $mdpHashed = password_hash($mdp, PASSWORD_DEFAULT);
            $req = 'INSERT INTO membres (nom, prenom, email, numero, dob, mdp, adresse, ville, postal, pays date_envoi)
                VALUES (:nom, :prenom, :email, :numero, :dob, :mdp, :adresse, :ville, :postal, :pays NOW())';

            $data = [
                'nom' => $nom,
                'prenom' => $prenom,
                'email' => $email,
                'numero' => $numero ?: null,
                'adresse' => $adresse,
                'ville' => $ville,
                'postal' => $postal,
                'pays' => $pays,
                'dob' => $dob,
                'mdp' => $mdpHashed
            ];

            $success = $this->execReqPrep($req, $data);

            return $success;
        } else {
            return false;
        }
    }
}