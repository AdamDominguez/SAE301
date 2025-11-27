<?php
session_start();
require "config/config.php";
require "app/controleurs/controleur.php";

if (isset($_GET["action"])) {
    if ($_GET["action"] == "fonctionnalites")
        fonctionnalites(); // Affichage des fonctionnalités
    else if ($_GET["action"] == "tableauAccueil")
        tableau(); // Affichage du tableau de bord
    else if ($_GET["action"] == "tableauValeurs")
        tableauValeurs(); // Affichage de la page "Valeurs" du tableau de bord
    else if ($_GET["action"] == "tableauDonnees")
        tableauDonnees(); // Affichage de la page "Données" du tableau de bord
    else if ($_GET["action"] == "tableauAlertes")
        tableauAlertes(); // Affichage de la page "Alertes" du tableau de bord
    else if ($_GET["action"] == "tableauCampagne")
        tableauCampagne(); // Affichage de la page "Ma Camapgne" du tableau de bord
    else if ($_GET["action"] == "tableauContacts")
        tableauContacts(); // Affichage de la page "Contacts" du tableau de bord
    else if ($_GET["action"] == "tableauParametres")
        tableauParametres(); // Affichage de la page "Paramètres" du tableau de bord
    else if ($_GET["action"] == "tableauProfil")
        tableauProfil(); // Affichage de la page "Profil" du tableau de bord
    else if ($_GET["action"] == "contact")
        contact(); // Affichage du formulaire de contact
    else if ($_GET["action"] == "inscription")
        inscription(); // Affichage du formulaire d'inscription
    else if ($_GET["action"] == "connexionadmin")
        connexionadmin(); // Affichage du formulaire de connexion administrateur
    else {
        accueil();
    }

} else {
    // Page d'accueil
    accueil();
}