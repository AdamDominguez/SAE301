<?php

class Membre extends Database
{

    /*******************************************************
    Retourne retourne la description d'un article
    Entrée :
    idArt [string] : l'identifiant de l'article

    Retour :
    [array] : Tableau associatif contenant tous les attributs de l'article
     *******************************************************/
    public function getPhoto($idMembre)
    {
        $req = 'SELECT id AS "Identifiant" FROM membres WHERE id_article=?;';
        $resultat = $this->execReqPrep($req, array($idMembre));
        return $resultat[0];
    }
}
