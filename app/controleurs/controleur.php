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
    setcookie('page', '?action=tableau', time() + 3600);
    require __DIR__ . "/../vues/vueTableau.php";
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

// Affichage de la page d'erreur (utilisation de __DIR__ . "/..." pour forcer le lien)
function erreur($message)
{
    require __DIR__ . "/../vues/vueErreur.php";
}