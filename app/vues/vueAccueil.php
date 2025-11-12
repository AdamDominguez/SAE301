<?php
$title = "ACCUEIL";
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title><?= $title ?></title>
    <link href="./public/css/main.css" rel="stylesheet">
    <link href="./public/css/index.css" rel="stylesheet">
</head>

<body>
    <?php require "header.php"; ?>
    <main>
        <section class="Home">
            <div class="Content">
                <div class="Gauche">
                    <h1>Surveillez vos ruches en temps réel</h1>
                    <p>Un système intelligent de surveillance pour vos ruches connectées. Suivez la température, le
                        poids, l'humidité et la santé de vos colonies où que vous soyez.</p>
                    <div class="Boutons">
                        <div class="Decouvrir"><a href="">Découvrir le tableau de bord <svg
                                    xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30"
                                    fill="none">
                                    <path d="M6.25 15H23.75M23.75 15L15 6.25M23.75 15L15 23.75" stroke="white"
                                        stroke-width="4" stroke-linecap="round" stroke-linejoin="round" />
                                </svg></a></div>
                        <div class="Savoir"><a href="">En savoir plus</a></div>
                    </div>
                </div>
                <div class="Droite">
                    <img src="./public/img/home_droite.avif"
                        alt="Ruche schématisé avec abeilles et éléments graphiques">
                </div>
            </div>
            <div class="HomeHero">
            </div>
        </section>
    </main>
</body>

</html>