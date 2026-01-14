<?php
$title = "Tableau de bord | BeeLink";
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title><?= $title ?></title>
    <link href="./public/css/main.css" rel="stylesheet">
    <link href="./public/css/tableau.css?v=<?= time() ?>" rel="stylesheet">
    <link rel="icon" type="image/png" sizes="32x32" href="./public/img/favicons/favicon-32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="./public/img/favicons/favicon-16.png">
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
                    <select class="select-ruche" onchange="window.location.href='index.php?action=tableauDonneesTableau&id=' + this.value">
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
                <a href="index.php?action=tableauDonnees&id=<?= $selectedRucheId ?>" class="onglet">Aperçu</a>
                <a href="index.php?action=tableauDonneesGraphiques&id=<?= $selectedRucheId ?>" class="onglet">Graphiques</a>
                <a href="index.php?action=tableauDonneesTableau&id=<?= $selectedRucheId ?>" class="onglet actif">Tableau</a>
            </nav>

            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Temp.</th>
                            <th>Poids</th>
                            <th>Humidité</th>
                            <th>Fréq.</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($history)): ?>
                            <?php foreach ($history as $row): ?>
                                <tr>
                                    <td><?= date('d/m/Y H:i:s', strtotime($row['date'])) ?></td>
                                    <td><?= $row['temperature'] ?>°C</td>
                                    <td><?= $row['poids'] ?> kg</td>
                                    <td><?= $row['humidite'] ?>%</td>
                                    <td><?= $row['frequence'] ?> Hz</td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="5">Aucune donnée disponible.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </section>
    </main>
    <?php require "footer.php"; ?>
</body>

</html>