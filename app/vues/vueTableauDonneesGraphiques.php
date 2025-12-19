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

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
    <?php require "header.php"; ?>
    <main>
        <nav class="FonctionNav">
            <div class="principal">
                <h4>PRINCIPAL</h4>
                <div class="accueil element-menu"><a href="index.php?action=tableauAccueil">Accueil</a></div>
                <div class="donnees element-menu actif"><a href="index.php?action=tableauDonnees">Données</a></div>
                <div class="alertes element-menu"><a href="index.php?action=tableauAlertes">Alertes</a></div>
                <div class="campagne element-menu"><a href="index.php?action=tableauCampagne">Ma Campagne</a></div>
            </div>
            <div class="gestion">
                <h4>GESTION</h4>
                <div class="contacts element-menu"><a href="index.php?action=tableauContacts">Contacts</a></div>
                <div class="parametres element-menu"><a href="index.php?action=tableauParametres">Paramètres</a></div>
                <div class="profil element-menu"><a href="index.php?action=tableauProfil">Profil</a></div>
            </div>
        </nav>
        <section class="contenu-tableau">

            <div class="entete-page-donnees">
                <div class="titres">
                    <h1 class="titre-principal">Données et Valeurs</h1>
                    <p class="sous-titre">Surveillance complète et analyse en temps réel de vos ruches.</p>
                </div>
                <div class="actions-globales">
                    <select class="select-ruche">
                        <option>Ruche 001</option>
                        <option>Ruche 002</option>
                        <option>Ruche 003</option>
                    </select>
                    <button class="btn-export">
                        Exporter
                    </button>
                </div>
            </div>

            <nav class="nav-onglets">
                <a href="index.php?action=tableauDonnees" class="onglet">Aperçu</a>
                <a href="index.php?action=tableauDonneesGraphiques" class="onglet actif">Graphiques</a>
                <a href="index.php?action=tableauDonneesTableau" class="onglet">Tableau</a>
            </nav>

            <div class="grille-widgets-donnees">

                <div class="widget-indicateur">
                    <p class="etiquette-indicateur">Température moy.</p>
                    <p class="valeur-indicateur">22.0°C</p>
                    <div class="indicateur-bas">
                        <p class="plage-cible">20.0°C - 23.0°C</p>
                        <span class="etiquette-variation variation-rouge">
                            <span>⬋</span> -1.00°C
                        </span>
                    </div>
                </div>

                <div class="widget-indicateur">
                    <p class="etiquette-indicateur">Poids moy.</p>
                    <p class="valeur-indicateur">15.6kg</p>
                    <div class="indicateur-bas">
                        <p class="plage-cible">15.4kg - 16.0kg</p>
                        <span class="etiquette-variation variation-verte">
                            <span>⬈</span> +0.20kg
                        </span>
                    </div>
                </div>

                <div class="widget-indicateur">
                    <p class="etiquette-indicateur">Humidité moy.</p>
                    <p class="valeur-indicateur">82%</p>
                    <div class="indicateur-bas">
                        <p class="plage-cible">80% - 85%</p>
                        <span class="etiquette-variation variation-verte">
                            <span>⬈</span> +2.0%
                        </span>
                    </div>
                </div>

                <div class="widget-indicateur">
                    <p class="etiquette-indicateur">Fréquences moy.</p>
                    <p class="valeur-indicateur">227 Hz</p>
                    <div class="indicateur-bas">
                        <p class="plage-cible">205Hz - 244Hz</p>
                        <span class="etiquette-variation variation-rouge">
                            <span>⬋</span> -17Hz
                        </span>
                    </div>
                </div>

                <div class="widget-graphique-donnees principal">
                    <h3>Température et Humidité</h3>
                    <div class="canvas-container">
                        <canvas id="chartDonnees"></canvas>
                    </div>
                </div>

                <div class="ligne-graphiques-duo">
                    <div class="widget-graphique-donnees">
                        <h3>Évolution du poids</h3>
                        <div class="canvas-container">
                            <canvas id="chartPoids"></canvas>
                        </div>
                    </div>
                    <div class="widget-graphique-donnees">
                        <h3>Fréquence sonore</h3>
                        <div class="canvas-container">
                            <canvas id="chartFrequence"></canvas>
                        </div>
                    </div>
                </div>

                <div class="widget-graphique-donnees principal">
                    <h3>Comparaison multi-métriques</h3>
                    <div class="canvas-container">
                        <canvas id="chartComparaison"></canvas>
                    </div>
                    <p class="note-graphique">Note: Les valeurs sont affichées sur la même échelle pour permettre la comparaison visuelle des tendances.</p>
                </div>

            </div>
        </section>
    </main>
    <?php require "footer.php"; ?>
    <script src="./public/js/graph.js"></script>
</body>

</html>