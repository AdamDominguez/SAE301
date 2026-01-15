<?php
require_once __DIR__ . "/../modeles/contact.php";
require_once __DIR__ . "/../modeles/inscription.php";
require_once __DIR__ . "/../modeles/connexion.php";
require_once __DIR__ . "/../modeles/uploadPhoto.php";

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

function tableauDonneesGraphiques()
{
    setcookie('page', '?action=tableauDonneesGraphiques', time() + 3600);
    require __DIR__ . "/../vues/vueTableauDonneesGraphiques.php";
}

function tableauDonneesTableau()
{
    setcookie('page', '?action=tableauDonneesTableau', time() + 3600);
    require __DIR__ . "/../vues/vueTableauDonneesTableau.php";
}

function tableauProfil()
{
    setcookie('page', '?action=tableauProfil', time() + 3600);
    require __DIR__ . "/../vues/vueTableauProfil.php";
}

// Changement de la photo d'un membre
function photoProfil()
{
    require __DIR__ . "/../vues/vueTableauProfil.php";
}

// Enregistrement de la photo d'un membre
function enregPhotoProfil($idMembre)
{
    $objProfil = new UploadPhoto();
    $objProfil->updatePhotoProfil($idMembre);
    //  Ajout d'une redirection après l'enregistrement pour éviter la page blanche et le re-soumission du formulaire.
    header("Location: index.php?action=tableauProfil");
    exit(); // Toujours exit après une redirection
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

function inscription($redirectUrl = null)
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $inscriptionModel = new Inscription();
        $success = $inscriptionModel->pushInscription();
    }
    
    // Only update the redirect cookie if a specific URL is passed, 
    // or if no cookie is set (fallback to default).
    // This allows preserving the original destination (e.g. tableauAccueil) when switching modes.
    if ($redirectUrl) {
        setcookie('page', $redirectUrl, time() + 3600);
    } elseif (!isset($_COOKIE['page'])) {
        setcookie('page', '?action=inscription', time() + 3600);
    }
    
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
    header("Location: index.php?action=accueil");
}

// ici on utilise password_verify pour justement vérifier qu'on ai bien un password 'encrypté' ou hash!
function login($email, $mdp)
{
    $userDB = new Connexion();
    $userData = $userDB->getUserContent($email);

    if ($userData && password_verify($mdp, $userData['mdp'])) {
        $_SESSION['id'] = $userData['id'];
        $_SESSION['acces'] = $userData['prenom'];
        $_SESSION['nom'] = $userData['nom'];
        $_SESSION['email'] = $userData['email'];
        $_SESSION['numero'] = $userData['numero'];
        $_SESSION['adresse'] = $userData['adresse'];
        $_SESSION['ville'] = $userData['ville'];
        $_SESSION['postal'] = $userData['postal'];
        $_SESSION['pays'] = $userData['pays'];
        $_SESSION['date_envoi'] = $userData['date_envoi'];

        if (isset($_COOKIE["page"])) {
            $action = $_COOKIE["page"];
        } else {
            $action = "?action=accueil";
        }

        header("Location: index.php" . $action);
    } else
        accueil();
}

// Affichage de la page d'erreur (utilisation de __DIR__ . "/..." pour forcer le lien)
function erreur($message)
{
    require __DIR__ . "/../vues/vueErreur.php";
}
