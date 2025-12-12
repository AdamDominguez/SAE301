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
                <h3>PRINCIPAL</h3>
                <div class="accueil element-menu"><a href="index.php?action=tableauAccueil">Accueil</a></div>
                <div class="donnees element-menu actif"><a href="index.php?action=tableauDonnees">Données</a></div>
                <div class="alertes element-menu"><a href="index.php?action=tableauAlertes">Alertes</a></div>
                <div class="campagne element-menu"><a href="index.php?action=tableauCampagne">Ma Campagne</a></div>
            </div>
            <div class="gestion">
                <h3>GESTION</h3>
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
                <a href="index.php?action=tableauDonnees" class="onglet actif">Aperçu</a>
                <a href="index.php?action=tableauDonneesGraphiques" class="onglet">Graphiques</a>
                <a href="index.php?action=tableauDonneesTableau" class="onglet">Tableau</a>
            </nav>

            <div class="grille-widgets-donnees">

                <div class="widget-indicateur">
                    <div class="entete-indicateur">
                        <span class="icone-indicateur">🌡️</span>
                        <span class="etiquette-etat etiquette-optimal">OPTIMAL</span>
                    </div>
                    <p class="etiquette-indicateur">Température</p>
                    <p class="valeur-indicateur">21.0°C</p>
                    <div class="min-max">
                        <div class="min">
                            <small>Min</small>
                            <p>20.0°C</p>
                        </div>
                        <div class="max">
                            <small>Max</small>
                            <p>23.0°C</p>
                        </div>
                    </div>
                </div>

                <div class="widget-indicateur">
                    <div class="entete-indicateur">
                        <span class="icone-indicateur">💧</span>
                        <span class="etiquette-etat etiquette-elevee">élevée</span>
                    </div>
                    <p class="etiquette-indicateur">Humidité</p>
                    <p class="valeur-indicateur">82%</p>
                    <div class="min-max">
                        <div class="min">
                            <small>Min</small>
                            <p>80%</p>
                        </div>
                        <div class="max">
                            <small>Max</small>
                            <p>85%</p>
                        </div>
                    </div>
                </div>

                <div class="widget-indicateur">
                    <div class="entete-indicateur">
                        <span class="icone-indicateur">⚖️</span>
                        <span class="etiquette-etat etiquette-optimal">OPTIMAL</span>
                    </div>
                    <p class="etiquette-indicateur">Poids total</p>
                    <p class="valeur-indicateur">15.6 kg</p>
                    <div class="min-max">
                        <div class="min">
                            <small>Min</small>
                            <p>15.4 kg</p>
                        </div>
                        <div class="max">
                            <small>Max</small>
                            <p>15.8 kg</p>
                        </div>
                    </div>
                </div>

                <div class="widget-indicateur">
                    <div class="entete-indicateur">
                        <span class="icone-indicateur">〰️</span>
                        <span class="etiquette-etat etiquette-normal">NORMAL</span>
                    </div>
                    <p class="etiquette-indicateur">Fréquence</p>
                    <p class="valeur-indicateur">233 Hz</p>
                    <div class="min-max">
                        <div class="min">
                            <small>Min</small>
                            <p>205 Hz</p>
                        </div>
                        <div class="max">
                            <small>Max</small>
                            <p>244 Hz</p>
                        </div>
                    </div>
                </div>

                <div class="conteneur-widgets-egaux">
                    <div class="widget-color couleur-synchro">
                        <h3 class="titre-bloc-couleur">Dernière synchronisation</h3>
                        <p class="valeur-bloc-couleur">Il y a 2 min</p>
                        <small>Prochain sync dans 3 min</small>
                    </div>

                    <div class="widget-color couleur-etat">
                        <h3 class="titre-bloc-couleur">État général</h3>
                        <p class="valeur-bloc-couleur">Excellent</p>
                        <small>4/4 ruches opérationnelles</small>
                    </div>

                    <div class="widget-color couleur-alertes">
                        <h3 class="titre-bloc-couleur">Alertes actives</h3>
                        <p class="valeur-bloc-couleur">1</p>
                        <small>Température élevée - Ruche #3</small>
                    </div>
                </div>

                <div id="map"></div>

            </div>
        </section>
    </main>
    <?php require "footer.php"; ?>
</body>
<script src="./public/js/tableau.js"></script>
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
    integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
    crossorigin=""></script>

</html>