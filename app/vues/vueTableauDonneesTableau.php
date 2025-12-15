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
                <a href="index.php?action=tableauDonneesGraphiques" class="onglet">Graphiques</a>
                <a href="index.php?action=tableauDonneesTableau" class="onglet actif">Tableau</a>
            </nav>

            <table>
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Temp. (°C)</th>
                        <th>Poids (kg)</th>
                        <th>Humidité (%)</th>
                        <th>Fréq. (Hz)</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>03/11/2024 20:00:00</td>
                        <td>21°C</td>
                        <td>15.6 kg</td>
                        <td>82%</td>
                        <td>233 Hz</td>
                    </tr>
                    <tr>
                        <td>03/11/2024 08:00:00</td>
                        <td>20°C</td>
                        <td>15.8 kg</td>
                        <td>80%</td>
                        <td>242 Hz</td>
                    </tr>
                    <tr>
                        <td>02/11/2024 20:00:00</td>
                        <td>22°C</td>
                        <td>15.6 kg</td>
                        <td>85%</td>
                        <td>244 Hz</td>
                    </tr>
                    <tr>
                        <td>02/11/2024 08:00:00</td>
                        <td>21°C</td>
                        <td>15.4 kg</td>
                        <td>83%</td>
                        <td>205 Hz</td>
                    </tr>
                    <tr>
                        <td>01/11/2024 20:00:00</td>
                        <td>23°C</td>
                        <td>15.7 kg</td>
                        <td>80%</td>
                        <td>222 Hz</td>
                    </tr>
                    <tr>
                        <td>01/11/2024 08:00:00</td>
                        <td>22°C</td>
                        <td>15.5 kg</td>
                        <td>81%</td>
                        <td>213 Hz</td>
                    </tr>
                </tbody>
            </table>
        </section>
    </main>
    <?php require "footer.php"; ?>
</body>

</html>