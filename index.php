<?php
session_start();
require "config/config.php";
require "app/controleurs/controleur.php";

if (isset($_GET["action"])) {
    if ($_GET["action"] == "fonctionnalites")
        fonctionnalites(); // Affichage des fonctionnalités
    else if ($_GET["action"] == "tableau")
        tableau(); // Affichage du tableau de bord
    else if ($_GET["action"] == "contact")
        contact(); // Affichage du formulaire de contact
    else {
        accueil();
    }

} else {
    // Page d'accueil
    accueil();
}