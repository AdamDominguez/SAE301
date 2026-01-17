<?php
require_once __DIR__ . "/../modeles/contact.php";
require_once __DIR__ . "/../modeles/inscription.php";
require_once __DIR__ . "/../modeles/connexion.php";
require_once __DIR__ . "/../modeles/uploadPhoto.php";
require_once __DIR__ . "/../modeles/userModel.php";

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
    //  Ajout d'une redirection après l'enregistrement pour éviter la page blanche et la re-soumission du formulaire.
    header("Location: index.php?action=tableauProfil");
    exit(); // Toujours exit après une redirection
}

// Modification des infos pour l'utilisateur connecté
function updateUserData()
{
    if (isset($_SESSION['id'])) {
        $userCO = new UserModel();

        $newData = [
            'firstname' => $_POST['firstname'],
            'lastname'  => $_POST['lastname'],
            'email'     => $_POST['email'],
            'mobile'    => $_POST['mobile'],
            'adresse'   => $_POST['adresse'],
            'ville'     => $_POST['ville'],
            'postal'    => $_POST['postal'],
            'pays'      => $_POST['pays']
        ];

        $success = $userCO->updateUserData($_SESSION['id'], $newData);

        if ($success) {
            $_SESSION['acces'] = $newData['firstname'];
            $_SESSION['nom']   = $newData['lastname'];
            $_SESSION['email'] = $newData['email'];
            $_SESSION['numero'] = $newData['mobile'];
            $_SESSION['adresse'] = $newData['adresse'];
            $_SESSION['ville'] = $newData['ville'];
            $_SESSION['postal'] = $newData['postal'];
            $_SESSION['pays']   = $newData['pays'];

            header("Location: index.php?action=tableauProfil&update=success");
            exit();
        } else {
            header("Location: index.php?action=tableauProfil&update=error");
            exit();
        }
    }
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
