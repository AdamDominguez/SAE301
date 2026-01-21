<?php
$title = "Tableau de bord | BeeLink";
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
                <h4>PRINCIPAL</h4>
                <div class="accueil element-menu actif"><a href="index.php?action=tableauAccueil">Accueil</a></div>
                <div class="donnees element-menu"><a href="index.php?action=tableauDonnees">Données</a></div>
            </div>
            <div class="gestion">
                <h4>GESTION</h4>
                <div class="profil element-menu"><a href="index.php?action=tableauProfil">Profil</a></div>
            </div>
        </nav>

        <section class="contenu-tableau">
            <div class="titres">
                <h1 class="titre-principal">Accueil - Ruche n°<?= $selectedRucheId ?></h1>
                <p class="sous-titre1">Bienvenue sur BeeLink.</p>
            </div>
            <div class="grille-widgets">
                <?php require "data.php"; ?>
                <div class="widget-ruches">
                    <h3 class="titre-widget">Vos ruches</h3>
                    <div class="liste-ruches">
                        <!-- si la var $ruches existe et est remplie alors on lance un foreach qui va attribuer chaque ruche du JSON de manière dynamique! -->
                        <?php if (isset($ruches)): ?>
                            <?php foreach ($ruches as $id => $ruche): ?>
                                <a class="ruche-item <?= ($id == $selectedRucheId) ? 'actif' : '' ?>" href="index.php?action=tableauDonnees&id=<?= $id ?>">
                                    <div class="icone-ruche">
                                        SVG A AJOUTER
                                    </div>
                                    <p>Ruche <?= $id ?></p>
                                </a>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>

            </div>
        </section>
    </main>
    <?php require "footer.php"; ?>
</body>

</html>