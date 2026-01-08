<?php
abstract class Database
{

  // Objet permettant la connexion à la BDD
  private $bdd;

  /*******************************************************
  Execution d'une requête simple 
    Entrée : 
      req [string] : Requête SQL

    Retour : 
      [array] : Tableau associatif contenant le résultat de la requête
  *******************************************************/
  protected function execReq($req)
  {
    // $bdd = $this->connexionBDD();
    // $reponse = $bdd->query($req);
    // $resultat  = $this->connexionBDD()->query($req)->fetch(PDO::FETCH_ASSOC);
    // $resultat = $reponse->fetchAll(PDO::FETCH_ASSOC);
    return $this->connexionBDD()->query($req)->fetchAll(PDO::FETCH_ASSOC);
  }

  /*******************************************************
  Execution d'une requête préparée 
    Entrée : 
      req [string] : Requête préparée
      data [array] : Tableau contenant les données utilisées par la requête préparée

    Retour : 
      [array] : Tableau associatif contenant le résultat de la requête
  *******************************************************/
  protected function execReqPrep($req, $data)
  {
    $reponse = $this->connexionBDD()->prepare($req);
    $success = $reponse->execute($data);

    if (strpos(strtoupper($req), 'SELECT') === 0) {
      return $reponse->fetchAll(PDO::FETCH_ASSOC);
    }

    return $success;
  }

  /*******************************************************
  Connexion à la BDD à partir des paramètres de configuration
    Entrée : 

    Retour : 
      [object] : Objet de type PDO
  *******************************************************/
  private function connexionBDD()
  {
    if (!isset($this->bdd))     // Si la connexion à la BDD n'est pas encore établie
      try {  // Connexion à la base de données et initialisation de la propriété bdd
        $options = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
        $this->bdd = new PDO('mysql:host=' . DBHOST . ';dbname=' . DBNAME, DBUSER, DBPWD, $options);
      } catch (Exception $err) {   // Erreur lors de la connexion à la BDD
        throw new Exception("Connexion à la BDD"); //.$err->getMessage());
      }

    return $this->bdd;
  }
}