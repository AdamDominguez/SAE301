<?php
session_start();
require "config/config.php";
require "app/controleurs/controleur.php";

accueil();

// try {
//     if (isset($_SESSION["acces"])) {
//         if (isset($_GET["action"])) {
//             if ($_GET["action"] == "clients")
//                 clients(); // Affichage de la liste des clients
//             else if ($_GET["action"] == "articles")
//                 articles(); // Affichage de la liste des articles
//             else if ($_GET["action"] == "commandes")
//                 commandes();
//             else if ($_GET["action"] == "quit")
//                 quit();
//             else if ($_GET["action"] == "articlePhoto")
//                 articlePhoto($_GET["idArt"]);
//             else if ($_GET["action"] == "enregArticlePhoto")
//                 enregArticlePhoto($_GET["idArt"]);
//             else if ($_GET["action"] == "commande")
//                 if (isset($_GET["idComm"])) {
//                     $idComm = (int) $_GET["idComm"];
//                     if ($idComm > 0)
//                         commande($idComm); // Affichage d'une commande
//                     else
//                         throw new Exception("Identifiant de commande non valide");
//                 } else
//                     throw new Exception("Aucun identifiant de commande");
//             else
//                 throw new Exception("Action non valide");
//         } else // Page d'accueil
//             accueil();
//     } else {
//         if (isset($_GET["action"]) && $_GET["action"] == "login")
//             login($_POST["nom"], $_POST["mdp"]);
//         else
//             acces();
//     }

// } catch (Exception $e) {
//     erreur($e->getMessage());
// }