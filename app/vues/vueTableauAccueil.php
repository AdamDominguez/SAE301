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
            <div class="bandeau-accueil">
                <div class="icone">💡</div>
                <div class="contenu-bandeau">
                    <h3>Bienvenue sur BeeLink</h3>
                    <p>Découvrez toutes les fonctionnalités pour surveiller vos ruches connectées. Explorez les différentes sections via la navigation de gauche.</p>
                    <div class="actions">
                        <button class="btn-primaire">Voir les valeurs en temps réel</button>
                        <button class="btn-secondaire">Analyser les données</button>
                    </div>
                </div>
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

                <div class="widget-alerte">
                    <h3 class="titre-widget">Alertes récentes <a href="#">Tout voir</a></h3>
                    <div class="liste-alertes">
                        <div class="alerte">
                            <div class="icone-alerte">⚠️</div>
                            <p>Température élevée dans Ruche #3</p>
                            <small>Il y a 2h</small>
                        </div>
                        <div class="alerte">
                            <div class="icone-alerte">ℹ️</div>
                            <p>Production de miel en hausse - Ruche #1</p>
                            <small>Il y a 5h</small>
                        </div>
                    </div>
                </div>

                <div class="widget-actions">
                    <h3 class="titre-widget">Actions rapides</h3>
                    <div class="liste-actions">
                        <a href="#">
                            <div class="icone-action">📈</div> Voir les valeurs
                        </a>
                        <a href="#">
                            <div class="icone-action">📊</div> Analyser les données
                        </a>
                        <a href="#">
                            <div class="icone-action">🔄</div> Synchroniser
                        </a>
                    </div>
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