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
                <h1 class="titre-principal">Accueil</h1>
                <p class="sous-titre1">Bienvenue sur BeeLink.</p>
            </div>
            <div class="grille-widgets">

                <div class="widget-indicateur">
                    <div class="entete-indicateur">
                        <div class="icone-indicateur">🌡️</div>
                        <div class="changement positif">+0.3°C</div>
                    </div>
                    <p class="etiquette-indicateur">Température</p>
                    <p class="valeur-indicateur">35.2°C</p>
                </div>
                <div class="widget-indicateur">
                    <div class="entete-indicateur">
                        <div class="icone-indicateur">💧</div>
                        <div class="changement negatif">-2%</div>
                    </div>
                    <p class="etiquette-indicateur">Humidité</p>
                    <p class="valeur-indicateur">62%</p>
                </div>
                <div class="widget-indicateur">
                    <div class="entete-indicateur">
                        <div class="icone-indicateur">⚖️</div>
                        <div class="changement positif">+1.2 kg</div>
                    </div>
                    <p class="etiquette-indicateur">Poids</p>
                    <p class="valeur-indicateur">42.5 kg</p>
                </div>
                <div class="widget-indicateur">
                    <div class="entete-indicateur">
                        <div class="icone-indicateur">〰️</div>
                        <div class="changement positif">+15 Hz</div>
                    </div>
                    <p class="etiquette-indicateur">Fréquence</p>
                    <p class="valeur-indicateur">233 Hz</p>
                </div>

                <div class="widget-ruches">
                    <h3 class="titre-widget">Vos ruches</h3>
                    <div class="liste-ruches">
                        <a class="ruche-item" href="#">
                            <div class="icone-ruche">🍯</div>
                            <p>Ruche IUT</p>
                            <small>Zone A</small>
                            <div class="statut statut-ok"></div>
                        </a>
                        <a class="ruche-item" href="#">
                            <div class="icone-ruche">🍯</div>
                            <p>Ruche IUT</p>
                            <small>Zone A</small>
                            <div class="statut statut-ok"></div>
                        </a>
                        <a class="ruche-item" href="#">
                            <div class="icone-ruche">🍯</div>
                            <p>Ruche IUT</p>
                            <small>Zone A</small>
                            <div class="statut statut-alerte"></div>
                        </a>
                        <a class="ruche-item" href="#">
                            <div class="icone-ruche">🍯</div>
                            <p>Ruche IUT</p>
                            <small>Zone A</small>
                            <div class="statut statut-ok"></div>
                        </a>
                    </div>
                </div>

            </div>
        </section>
    </main>
    <?php require "footer.php"; ?>
</body>

</html>