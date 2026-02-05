<?php
require_once "database.php";

class ConnexionAdmin extends Database
{
    /*******************************************************
    Permet de récuperer le mail et le mdp dans la bdd et vérifier que
    ce qui est écrit dans la page connexion correspond à quoi que ce soit
    sinon on retourne 0 (NULL)
    Entrée : $loginInput
    Retour : $result
     *******************************************************/
    public function getAdminContent($loginInput)
    {
        $sql = "SELECT id, email, mdp FROM admin WHERE email = ?";

        $result = $this->execReqPrep($sql, array($loginInput));

        if (!empty($result)) {
            return $result[0];
        }

        return null;
    }

    public function getUsers()
    {
        $sql = "SELECT * FROM membres";
        $result = $this->execReq($sql);

        if (!empty($result)) {
            return $result;
        }

        return [];
    }

    public function deleteUser($id)
    {
        $sql = "DELETE FROM membres WHERE id = ?";
        $this->execReqPrep($sql, array($id));
    }
}
