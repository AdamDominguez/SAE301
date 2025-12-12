<?php
require_once __DIR__ . "/../modeles/contact.php";
require_once __DIR__ . "/../modeles/inscription.php";

// Affichage de la page d'accueil
function accueil()
{
    setcookie('page', '?action=accueil', time() + 3600);
    require __DIR__ . "/../vues/vueAccueil.php";
}

function fonctionnalites()
{
    setcookie('page', '?action=fonctionnalites', time() + 3600);
    require __DIR__ . "/../vues/vueFonction.php";
}

function tableau()
{
    setcookie('page', '?action=tableauAccueil', time() + 3600);
    require __DIR__ . "/../vues/vueTableauAccueil.php";
}

function tableauValeurs()
{
    setcookie('page', '?action=tableauValeurs', time() + 3600);
    require __DIR__ . "/../vues/vueTableauValeurs.php";
}

function tableauDonnees()
{
    setcookie('page', '?action=tableauDonnees', time() + 3600);
    require __DIR__ . "/../vues/vueTableauDonnees.php";
}

function tableauAlertes()
{
    setcookie('page', '?action=tableauAlertes', time() + 3600);
    require __DIR__ . "/../vues/vueTableauAlertes.php";
}

function tableauCampagne()
{
    setcookie('page', '?action=tableauCampagne', time() + 3600);
    require __DIR__ . "/../vues/vueTableauCampagne.php";
}

function tableauContacts()
{
    setcookie('page', '?action=tableauContacts', time() + 3600);
    require __DIR__ . "/../vues/vueTableauContacts.php";
}

function tableauParametres()
{
    setcookie('page', '?action=tableauParametres', time() + 3600);
    require __DIR__ . "/../vues/vueTableauParametres.php";
}

function tableauProfil()
{
    setcookie('page', '?action=tableauProfil', time() + 3600);
    require __DIR__ . "/../vues/vueTableauProfil.php";
}

function contact()
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $contactModel = new Contact();
        $success = $contactModel->pushMail();
    }
    setcookie('page', '?action=contact', time() + 3600);
    require __DIR__ . "/../vues/vueContact.php";
}

function inscription()
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $inscriptionModel = new Inscription();
        $success = $inscriptionModel->pushInscription();
    }
    setcookie('page', '?action=inscription', time() + 3600);
    require __DIR__ . "/../vues/vueInscription.php";
}

function connexionadmin()
{
    setcookie('page', '?action=connexionadmin', time() + 3600);
    require __DIR__ . "/../vues/vueConnexionAdmin.php";
}

function quit()
{
    session_destroy();
    setcookie(session_name(), '', time() - 1, "/");
    accueil();
}

function login($nom, $mdp)
{
    if ($mdp == ACCES_MDP && $mdp == ACCES_MDP) {
        $_SESSION["acces"] = $nom;
        // accueil();

        if (isset($_COOKIE["page"])) {
            $action = $_COOKIE["page"];
        } else
            $action = $_COOKIE["page"];

        header("Location: index.php" . $action);
    } else
        accueil();
}

// Affichage de la page d'erreur (utilisation de __DIR__ . "/..." pour forcer le lien)
function erreur($message)
{
    require __DIR__ . "/../vues/vueErreur.php";
}