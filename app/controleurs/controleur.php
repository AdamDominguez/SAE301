<?php
require_once __DIR__ . "/../modeles/contact.php";
require_once __DIR__ . "/../modeles/inscription.php";
require_once __DIR__ . "/../modeles/connexion.php";
require_once __DIR__ . "/../modeles/connexionAdmin.php";
require_once __DIR__ . "/../modeles/uploadPhoto.php";
require_once __DIR__ . "/../modeles/Ruche.php";
require_once __DIR__ . "/../modeles/usermodel.php";


// Affichage de la page d'accueil
function accueil()
{
    setcookie('page', '?action=accueil', time() + 3600);
    require __DIR__ . "/../vues/vueAccueil.php";
}

// Affichage de la page fonctionnalités
function fonctionnalites()
{
    setcookie('page', '?action=fonctionnalites', time() + 3600);
    require __DIR__ . "/../vues/vueFonction.php";
}

// Affichage de la page tableau de bord accueil
function tableau()
{
    // extension de la classe Ruche
    $rucheModel = new Ruche();
    $ruches = $rucheModel->getRuches();

    //    si on reçoit une ruche dans $_SESSION & qu'elle existe alors...
    if (isset($_SESSION['selected_ruche']) && array_key_exists($_SESSION['selected_ruche'], $ruches)) {
        $selectedRucheId = $_SESSION['selected_ruche'];
    } else {
        $selectedRucheId = array_key_first($ruches);
        $_SESSION['selected_ruche'] = $selectedRucheId;
    }

    // récupération val minimum & max pour chaque champs
    $tempStats = $rucheModel->getMinMax($selectedRucheId, 'temperature');
    $humStats = $rucheModel->getMinMax($selectedRucheId, 'humidite');
    $poidsStats = $rucheModel->getMinMax($selectedRucheId, 'poids');
    $freqStats = $rucheModel->getMinMax($selectedRucheId, 'frequence');

    $latestData = $rucheModel->getLatestData($selectedRucheId);

    setcookie('page', '?action=tableauAccueil', time() + 3600);
    require __DIR__ . "/../vues/vueTableauAccueil.php";
}

// Affichage de la page tableau de bord données
function tableauDonnees()
{
    $rucheModel = new Ruche();
    $ruches = $rucheModel->getRuches();

    // si on reçoit une ruche dans $_SESSION & qu'elle existe alors...
    if (isset($_GET['id']) && array_key_exists($_GET['id'], $ruches)) {
        $selectedRucheId = $_GET['id'];
        $_SESSION['selected_ruche'] = $selectedRucheId;
    } elseif (isset($_SESSION['selected_ruche']) && array_key_exists($_SESSION['selected_ruche'], $ruches)) {
        $selectedRucheId = $_SESSION['selected_ruche'];
    } else {
        $selectedRucheId = array_key_first($ruches);
        $_SESSION['selected_ruche'] = $selectedRucheId;
    }

    $latestData = $rucheModel->getLatestData($selectedRucheId);
    $rucheDataFull = $rucheModel->getRuche($selectedRucheId);
    $history = $rucheDataFull['data'] ?? [];

    // récupération val minimum & max pour chaque champs
    $tempStats = $rucheModel->getMinMax($selectedRucheId, 'temperature');
    $humStats = $rucheModel->getMinMax($selectedRucheId, 'humidite');
    $poidsStats = $rucheModel->getMinMax($selectedRucheId, 'poids');
    $freqStats = $rucheModel->getMinMax($selectedRucheId, 'frequence');
    $gps = $ruches[$selectedRucheId]['gps'];

    setcookie('page', '?action=tableauDonnees', time() + 3600);
    require __DIR__ . "/../vues/vueTableauDonnees.php";
}

// Affichage de la page tableau de bord données graphiques
function tableauDonneesGraphiques()
{
    $rucheModel = new Ruche();
    $ruches = $rucheModel->getRuches();

    // si on reçoit une ruche dans $_SESSION & qu'elle existe alors...
    if (isset($_GET['id']) && array_key_exists($_GET['id'], $ruches)) {
        $selectedRucheId = $_GET['id'];
        $_SESSION['selected_ruche'] = $selectedRucheId;
    } elseif (isset($_SESSION['selected_ruche']) && array_key_exists($_SESSION['selected_ruche'], $ruches)) {
        $selectedRucheId = $_SESSION['selected_ruche'];
    } else {
        $selectedRucheId = array_key_first($ruches);
        $_SESSION['selected_ruche'] = $selectedRucheId;
    }

    // récupération et stockage de l'historique d'une ruche
    $rucheData = $rucheModel->getRuche($selectedRucheId);
    $history = $rucheData['data'] ?? [];

    // calcul pour l'affichage des données
    $tempSum = $humSum = $poidsSum = $freqSum = 0;
    $count = count($history);
    if ($count > 0) {
        foreach ($history as $row) {
            $tempSum += $row['temperature'];
            $humSum += $row['humidite'];
            $poidsSum += $row['poids'];
            $freqSum += $row['frequence'];
        }
        // on arrondit nos valeurs à la virgule
        $tempMoy = round($tempSum / $count, 1);
        $humMoy = round($humSum / $count);
        $poidsMoy = round($poidsSum / $count, 1);
        $freqMoy = round($freqSum / $count);
    } else {
        $tempMoy = $humMoy = $poidsMoy = $freqMoy = 0;
    }

    setcookie('page', '?action=tableauDonneesGraphiques', time() + 3600);
    require __DIR__ . "/../vues/vueTableauDonneesGraphiques.php";
}

// Affichage de la page tableau de bord données tableau
function tableauDonneesTableau()
{
    $rucheModel = new Ruche();
    $ruches = $rucheModel->getRuches();

    // si on reçoit une ruche dans $_SESSION & qu'elle existe alors...
    if (isset($_GET['id']) && array_key_exists($_GET['id'], $ruches)) {
        $selectedRucheId = $_GET['id'];
        $_SESSION['selected_ruche'] = $selectedRucheId;
    } elseif (isset($_SESSION['selected_ruche']) && array_key_exists($_SESSION['selected_ruche'], $ruches)) {
        $selectedRucheId = $_SESSION['selected_ruche'];
    } else {
        $selectedRucheId = array_key_first($ruches);
        $_SESSION['selected_ruche'] = $selectedRucheId;
    }

    // récupération et stockage de l'historique d'une ruche
    $rucheData = $rucheModel->getRuche($selectedRucheId);
    $history = $rucheData['data'] ?? [];

    setcookie('page', '?action=tableauDonneesTableau', time() + 3600);
    require __DIR__ . "/../vues/vueTableauDonneesTableau.php";
}

// Affichage de la page tableau de bord profil
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
/**
 * @throws Exception
 */
function enregPhotoProfil($idMembre)
{
    $objProfil = new UploadPhoto();
    $objProfil->updatePhotoProfil($idMembre);
    //  Ajout d'une redirection après l'enregistrement pour éviter la page blanche et le re-soumission du formulaire.
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
            'lastname' => $_POST['lastname'],
            'email' => $_POST['email'],
            'mobile' => $_POST['mobile'],
            'adresse' => $_POST['adresse'],
            'ville' => $_POST['ville'],
            'postal' => $_POST['postal'],
            'pays' => $_POST['pays']
        ];

        $success = $userCO->updateUserData($_SESSION['id'], $newData);

        if ($success) {
            $_SESSION['acces'] = $newData['firstname'];
            $_SESSION['nom'] = $newData['lastname'];
            $_SESSION['email'] = $newData['email'];
            $_SESSION['numero'] = $newData['mobile'];
            $_SESSION['adresse'] = $newData['adresse'];
            $_SESSION['ville'] = $newData['ville'];
            $_SESSION['postal'] = $newData['postal'];
            $_SESSION['pays'] = $newData['pays'];

            header("Location: index.php?action=tableauProfil&update=success");
            exit();
        } else {
            header("Location: index.php?action=tableauProfil&update=error");
            exit();
        }
    }
}

// Affichage de la page contact & permet d'envoyer un message en bdd
function contact()
{
    // vérification de la valeur de REQUEST_METHOD et qu'elle soit strictement égale à la méthode POST avant de procéder
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // extension de la classe Contact qui se gère d'envoyer nos données
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

// Affichage de la page de connexion administrateur
function connexionAdmin()
{
    require __DIR__ . "/../vues/vueConnexionAdmin.php";
}

// Affichage de la page de connexion administrateur
function admin()
{
    // vérification pour être sûr qu'on est bien administrateur sinon au revoir
    if (!isset($_SESSION['admin'])) {
        header("Location: index.php?action=connexionadmin");
        exit();
    }

    $adminModel = new ConnexionAdmin();
    $membres = $adminModel->getUsers();
    require __DIR__ . "/../vues/vueAdmin.php";
}

function supprimerMembre($id)
{
    // vérification pour être sûr qu'on est bien administrateur sinon au revoir
    if (isset($_SESSION['admin'])) {
        $adminModel = new ConnexionAdmin();
        $adminModel->deleteUser($id);
    }

    header("Location: index.php?action=admin");
    exit();
}

function loginAdmin($email, $mdp)
{
    $adminDB = new ConnexionAdmin();
    $adminData = $adminDB->getAdminContent($email);

    if ($adminData) {
        $_SESSION['admin'] = true;
        $_SESSION['id'] = $adminData['id'];
        $_SESSION['email'] = $adminData['email'];
        header("Location: index.php?action=admin");
    } else
        connexionAdmin();
}

// Permet une déconnexion de la session utilisateur
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

    // les nombreux $_SESSION nous permettent d'afficher les valeurs directement en front pour plus de dynamisme
    // (nom d'util par exemple sur le tableau de bord)
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

        $action = $_COOKIE["page"] ?? "?action=accueil";

        header("Location: index.php" . $action . "&login=success");
        exit();
    } else {
        header("Location: index.php?action=accueil&login=error");
        exit();
    }
}

// Affichage de la page d'erreur (utilisation de __DIR__ . "/..." pour forcer le lien)
function erreur($message)
{
    require __DIR__ . "/../vues/vueErreur.php";
}
