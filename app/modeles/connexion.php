<?php
require_once "database.php";

class Connexion extends Database
{
    /*******************************************************
    Permet de récuperer le mail et le mdp dans la bdd et vérifier que
    ce qui est écrit dans la page connexion correspond à quoi que ce soit
    sinon on retourne 0 (NULL)
    Entrée : $loginInput
Retour : $result
*******************************************************/
    public function getUserContent($loginInput)
    {
        $sql = "SELECT nom, prenom, email, mdp, postal, ville, adresse, numero, pays, date_envoi FROM membres WHERE email = ?";

        $result = $this->execReqPrep($sql, array($loginInput));

        if (!empty($result)) {
            return $result[0];
        }

        return null;
    }
}