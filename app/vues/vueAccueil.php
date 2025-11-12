<?php
$title = "ACCUEIL";
require "header.php";
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
    <main>
        <section class="Home">
            <div class="Content">
                <div class="Gauche">
                    <h1>Surveillez vos ruches en temps réel</h1>
                    <p>Un système intelligent de surveillance pour vos ruches connectées. Suivez la température, le
                        poids, l'humidité et la santé de vos colonies où que vous soyez.</p>
                    <div class="Boutons">
                        <div class="Decouvrir"><a href="">Découvrir le tableau de bord</a></div>
                        <div class="Savoir"><a href="">En savoir plus</a></div>
                    </div>
                </div>
                <div class="Droite">
                    <img src="./public/img/home_droite.avif" alt="Ruche schématisé avec abeilles et éléments graphiques">
                </div>
            </div>
        </section>
    </main>
</body>

</html>