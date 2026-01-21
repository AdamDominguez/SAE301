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
        // utilisation de $_POST pour lire la requête http et ses valeurs
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

        // la condition permet de s'assurer que tout les champs nécéssaires sont disponibles avant d'envoyer le tout en bdd
        //  utilisation du filtre FILTER_VALIDATE_EMAIL pour être sûr d'avoir un format correcte
        if ($nom && $prenom && filter_var($email, FILTER_VALIDATE_EMAIL) && $dob && $mdp && $pays && $postal && $ville && $adresse) {
            // stockage du mdp en hashed en utilisant password_hash et un hashage par défaut (PASSWORD_DEFAULT)
            $mdpHashed = password_hash($mdp, PASSWORD_DEFAULT);
            $req = 'INSERT INTO membres (nom, prenom, email, numero, dob, mdp, adresse, ville, postal, pays, date_envoi)
                VALUES (:nom, :prenom, :email, :numero, :dob, :mdp, :adresse, :ville, :postal, :pays, NOW())';

            $data = [
                'nom' => $nom,
                'prenom' => $prenom,
                'email' => $email,
                // ici on précise bien que l'on peut retourner une valeur vide pour le numéro car notre formulaire ne le demande pas strictement
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