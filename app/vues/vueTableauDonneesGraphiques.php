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
            </div>
            <div class="gestion">
                <h4>GESTION</h4>
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
                    <select class="select-ruche"
                        onchange="window.location.href='index.php?action=tableauDonnees&id=' + this.value">
                        <?php
                        $mesRuchesIds = explode(', ', $_SESSION['id_ruche']);

                        foreach ($mesRuchesIds as $idRuche):
                            if (isset($ruches[$idRuche])):
                                ?>
                                <option value="<?= $idRuche ?>" <?= ($selectedRucheId == $idRuche) ? 'selected' : '' ?>>
                                    Ruche <?= $idRuche ?>
                                </option>
                                <?php
                            endif;
                        endforeach;
                        ?>
                    </select>
                    <!--                    <button class="btn-export">-->
                    <!--                        Exporter-->
                    <!--                    </button>-->
                </div>
            </div>

            <nav class="nav-onglets">
                <a href="index.php?action=tableauDonnees&id=<?= $selectedRucheId ?>" class="onglet">Aperçu</a>
                <a href="index.php?action=tableauDonneesGraphiques&id=<?= $selectedRucheId ?>"
                    class="onglet actif">Graphiques</a>
                <a href="index.php?action=tableauDonneesTableau&id=<?= $selectedRucheId ?>" class="onglet">Tableau</a>
            </nav>

            <div class="grille-widgets-donnees">

                <div class="widget-indicateur">
                    <p class="etiquette-indicateur">Température moy.</p>
                    <p class="valeur-indicateur"><?= $tempMoy ?>°C</p>
                </div>

                <div class="widget-indicateur">
                    <p class="etiquette-indicateur">Poids moy.</p>
                    <p class="valeur-indicateur"><?= $poidsMoy ?>kg</p>
                </div>

                <div class="widget-indicateur">
                    <p class="etiquette-indicateur">Humidité moy.</p>
                    <p class="valeur-indicateur"><?= $humMoy ?>%</p>
                </div>

                <div class="widget-indicateur">
                    <p class="etiquette-indicateur">Fréquences moy.</p>
                    <p class="valeur-indicateur"><?= $freqMoy ?> Hz</p>
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
                    <p class="note-graphique">Note: Les valeurs sont affichées sur la même échelle pour permettre la
                        comparaison visuelle des tendances.</p>
                </div>

            </div>
        </section>
    </main>

    <?php require "footer.php"; ?>

    <script>
        // envoie des info php au js avec json_encode et notre historique
        const rucheHistory = <?= json_encode($history) ?>;
    </script>

    <script src="./public/js/graph.js"></script>
</body>

</html>