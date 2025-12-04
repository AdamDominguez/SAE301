<?php
$title = "ACCUEIL";
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title><?= $title ?></title>
    <link href="./public/css/main.css" rel="stylesheet">
    <link href="./public/css/tableau.css" rel="stylesheet">
    <link rel="icon" type="image/png" sizes="32x32" href="./public/img/favicons/favicon-32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="./public/img/favicons/favicon-16.png">
</head>

<body>
    <?php require "header.php"; ?>
    <main>
        <nav class="FonctionNav">
            <div class="principal">
                <h3>PRINCIPAL</h3>
                <div class="accueil element-menu"><a href="index.php?action=tableauAccueil">Accueil</a></div>
                <div class="valeurs element-menu"><a href="index.php?action=tableauValeurs">Valeurs</a></div>
                <div class="donnees element-menu"><a href="index.php?action=tableauDonnees">Données</a></div>
                <div class="alertes element-menu"><a href="index.php?action=tableauAlertes">Alertes</a></div>
                <div class="campagne element-menu"><a href="index.php?action=tableauCampagne">Ma Campagne</a></div>
            </div>
            <div class="gestion">
                <h3>GESTION</h3>
                <div class="contacts element-menu"><a href="index.php?action=tableauContacts">Contacts</a></div>
                <div class="parametres element-menu actif"><a href="index.php?action=tableauParametres">Paramètres</a></div>
                <div class="profil element-menu"><a href="index.php?action=tableauProfil">Profil</a></div>
            </div>
        </nav>
    </main>
    <?php require "footer.php"; ?>
</body>

</html>