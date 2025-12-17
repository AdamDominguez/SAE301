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
                <h3>PRINCIPAL</h3>
                <div class="accueil element-menu"><a href="index.php?action=tableauAccueil">Accueil</a></div>
                <div class="donnees element-menu"><a href="index.php?action=tableauDonnees">Données</a></div>
                <div class="alertes element-menu"><a href="index.php?action=tableauAlertes">Alertes</a></div>
                <div class="campagne element-menu"><a href="index.php?action=tableauCampagne">Ma Campagne</a></div>
            </div>
            <div class="gestion">
                <h3>GESTION</h3>
                <div class="contacts element-menu"><a href="index.php?action=tableauContacts">Contacts</a></div>
                <div class="parametres element-menu"><a href="index.php?action=tableauParametres">Paramètres</a></div>
                <div class="profil element-menu actif"><a href="index.php?action=tableauProfil">Profil</a></div>
            </div>
        </nav>

        <section class="contenu-tableau profil">

            <div class="entete-page-profil">
                <div class="titres">
                    <h1 class="titre-principal">Mon profil</h1>
                    <p class="sous-titre">Gérez vos informations personnelles.</p>
                </div>

                <div class="container-profil">
                    <div class="recap-profil">
                        <div class="container-profil-photo">
                            <div class="photo-profil"></div>
                            <div class="nom-utilisateur">TEST</div>
                            <div class="fonction">Apiculteur</div>
                        </div>

                        <div class="container-profil-contact">
                            <div class="element-profil">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="var(--jaune)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-mail w-4 h-4 text-[#E5B444]" aria-hidden="true">
                                    <path d="m22 7-8.991 5.727a2 2 0 0 1-2.009 0L2 7"></path>
                                    <rect x="2" y="4" width="20" height="16" rx="2"></rect>
                                </svg>
                                <span>Mail</span>
                            </div>
                            <div class="element-profil">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="var(--jaune)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-phone w-4 h-4 text-[#E5B444]" aria-hidden="true">
                                    <path d="M13.832 16.568a1 1 0 0 0 1.213-.303l.355-.465A2 2 0 0 1 17 15h3a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2A18 18 0 0 1 2 4a2 2 0 0 1 2-2h3a2 2 0 0 1 2 2v3a2 2 0 0 1-.8 1.6l-.468.351a1 1 0 0 0-.292 1.233 14 14 0 0 0 6.392 6.384"></path>
                                </svg>
                                <span>Numéro tel</span>
                            </div>
                            <div class="element-profil">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="var(--jaune)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-map-pin w-4 h-4 text-[#E5B444]" aria-hidden="true">
                                    <path d="M20 10c0 4.993-5.539 10.193-7.399 11.799a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 16 0"></path>
                                    <circle cx="12" cy="10" r="3"></circle>
                                </svg>
                                <span>Localisation</span>
                            </div>
                            <div class="element-profil">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="var(--jaune)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-calendar w-4 h-4 text-[#E5B444]" aria-hidden="true">
                                    <path d="M8 2v4"></path>
                                    <path d="M16 2v4"></path>
                                    <rect width="18" height="18" x="3" y="4" rx="2"></rect>
                                    <path d="M3 10h18"></path>
                                </svg>
                                <span>Membre depuis</span>
                            </div>
                        </div>

                    </div>

                    <div class="info-profil">
                        <h3>Informations personnelles</h3>
                        <div class="container-info-perso">
                            <div class="flex-element info">
                                <div class="element-info perso">
                                    <label class="prenom" for="firstname">Prénom</label>
                                    <input type="text" id="firstname" value="Jean">
                                </div>
                                <div class="element-info perso-2">
                                    <label class="nom" for="lastname">Nom</label>
                                    <input type="text" id="lastname" value="Dupont">
                                </div>
                            </div>

                            <div class="element-info perso-3">
                                <label class="email" for="email">Email</label>
                                <input type="text" id="email" value="test@gmail.com">
                            </div>

                            <div class="element-info perso-4">
                                <label class="mobile" for="mobile">Mobile</label>
                                <input type="text" id="mobile" value="06 12 34 56 78">
                            </div>

                            <div class="element-info perso-5">
                                <label class="adresse" for="address">Adresse</label>
                                <input type="text" id="adresse" value="123 Route de Provence">
                            </div>

                            <div class="flex-element info-2">
                                <div class="element-info perso-6">
                                    <label class="ville" for="ville">Ville</label>
                                    <input type="text" id="ville" value="Aix-en-Provence">
                                </div>
                                <div class="element-info perso-7">
                                    <label class="postal" for="postal">Code postal</label>
                                    <input type="text" id="postal" value="13100">
                                </div>
                                <div class="element-info perso-8">
                                    <label class="pays" for="country">France</label>
                                    <input type="text" id="country" value="France">
                                </div>
                            </div>

                            <div class="element-info perso-9">
                                <label class="bio" for="bio">Biographie</label>
                                <textarea type="text" id="bio" value="123 Route de Provence">Apiculteur passionné depuis 15 ans, spécialisé dans la production de miel de lavande en Provence.</textarea>
                            </div>

                            <div class="flex-bouton">
                                <button class="enregistrer">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-save w-4 h-4" aria-hidden="true">
                                        <path d="M15.2 3a2 2 0 0 1 1.4.6l3.8 3.8a2 2 0 0 1 .6 1.4V19a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2z"></path>
                                        <path d="M17 21v-7a1 1 0 0 0-1-1H8a1 1 0 0 0-1 1v7"></path>
                                        <path d="M7 3v4a1 1 0 0 0 1 1h7"></path>
                                    </svg>
                                    Enregistrer les modifications
                                </button>
                                <button class="annuler">Annuler</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex-info-ruche">
                    <div class="widget-indicateur">
                        <p class="etiquette-indicateur">Ruches actives</p>
                        <p class="valeur-indicateur">4</p>
                    </div>
                    <div class="widget-indicateur">
                        <p class="etiquette-indicateur">Production totale</p>
                        <p class="valeur-indicateur">165 kg</p>
                    </div>
                    <div class="widget-indicateur">
                        <p class="etiquette-indicateur">Alertes traitées</p>
                        <p class="valeur-indicateur">12</p>
                    </div>
                    <div class="widget-indicateur">
                        <p class="etiquette-indicateur">Taux de satisfaction</p>
                        <p class="valeur-indicateur">98%</p>
                    </div>
                </div>

            </div>
        </section>
    </main>
    <?php require "footer.php"; ?>
</body>

</html>