<?php
require_once "database.php";

class UserModel extends Database
{
    public function updateUserData($id, $data)
    {
        // On utilise "membres" car c'est le nom dans votre fonction login
        $sql = "UPDATE membres SET 
            prenom = ?, 
            nom = ?, 
            email = ?, 
            numero = ?, 
            adresse = ?, 
            ville = ?, 
            postal = ?, 
            pays = ? 
            WHERE id = ?";

        // On prépare le tableau des valeurs dans l'ordre des "?"
        $params = array(
            $data['firstname'],
            $data['lastname'],
            $data['email'],
            $data['mobile'],
            $data['adresse'],
            $data['ville'],
            $data['postal'],
            $data['pays'],
            $id // L'ID doit être le dernier car il correspond au WHERE
        );

        // On utilise votre méthode existante
        return $this->execReqPrep($sql, $params);
    }
}
