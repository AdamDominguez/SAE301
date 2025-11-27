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
                <div class="accueil"><a href="#">Accueil</a></div>
                <div class="valeurs"><a href="#">Valeurs</a></div>
                <div class="donnees"><a href="#">Données</a></div>
                <div class="alertes"><a href="#">Alertes</a></div>
                <div class="campagne"><a href="#">Ma Campagne</a></div>
            </div>
            <div class="gestion">
                <h3>GESTION</h3>
                <div class="contacts"><a href="#">Contacts</a></div>
                <div class="parametres"><a href="#">Paramètres</a></div>
                <div class="profil"><a href="#">Profil</a></div>
            </div>
        </nav>
    </main>
    <?php require "footer.php"; ?>
</body>

</html>