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
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
        crossorigin="" />
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
                    <!-- changement d'url avec window.location.href & attribution de l'id avec + this.value -->
                    <select class="select-ruche" onchange="window.location.href='index.php?action=tableauDonnees&id=' + this.value">
                        <!-- affichage dynamique des ruches avec un foreach pour chaque id on propose l'option -->
                        <?php foreach ($ruches as $id => $ruche): ?>
                            <option value="<?= $id ?>" <?= ($selectedRucheId == $id) ? 'selected' : '' ?>>Ruche <?= $id ?></option>
                        <?php endforeach; ?>
                    </select>
                    <button class="btn-export">
                        Exporter
                    </button>
                </div>
            </div>

            <nav class="nav-onglets">
                <a href="index.php?action=tableauDonnees&id=<?= $selectedRucheId ?>" class="onglet actif">Aperçu</a>
                <a href="index.php?action=tableauDonneesGraphiques&id=<?= $selectedRucheId ?>" class="onglet">Graphiques</a>
                <a href="index.php?action=tableauDonneesTableau&id=<?= $selectedRucheId ?>" class="onglet">Tableau</a>
            </nav>

            <div class="grille-widgets-donnees">
                <?php require "data.php"; ?>
                <div id="map" data-lat="<?= $gps[0] ?>" data-lng="<?= $gps[1] ?>" data-id="Ruche <?= $selectedRucheId ?>"></div>
            </div>
        </section>
    </main>
    <?php require "footer.php"; ?>
</body>

<!--intég leaflet-->
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
    integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
    crossorigin=""></script>

<!--exportation pdf-->
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>-->
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.28/jspdf.plugin.autotable.min.js"></script>-->

<script src="./public/js/tableau.js"></script>

</html>