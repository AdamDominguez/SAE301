<?php
require_once "database.php";

class Avis extends Database
{
    /*******************************************************
    Récupère tous les commentaires stockés dans la table
    Retour : $result (tableau d'objets ou null)
    *******************************************************/
    public function getAllAvis()
    {
        $sql = "SELECT id, nom, citation FROM commentaires ORDER BY id DESC";

        $result = $this->execReq($sql);

        if (!empty($result)) {
            return $result;
        }

        return null;
    }
}