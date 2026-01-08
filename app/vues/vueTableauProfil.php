<?php
$title = "Tableau de bord | BeeLink";

$idUtilisateur = $_SESSION['id'];
$urlPhoto = "photoArticle/defaut.png"; // lien relatif image de profil par défaut 

// Vérification de l'existence d'une image personnalisée (jpg ou png)
if (file_exists("photoArticle/" . $idUtilisateur . ".jpg")) {
    $urlPhoto = "photoArticle/" . $idUtilisateur . ".jpg";
} elseif (file_exists("photoArticle/" . $idUtilisateur . ".png")) {
    $urlPhoto = "photoArticle/" . $idUtilisateur . ".png";
}

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
                <div class="donnees element-menu"><a href="index.php?action=tableauDonnees">Données</a></div>
            </div>
            <div class="gestion">
                <h4>GESTION</h4>
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
                            <div class="photo-profil" id="photoProfil" style="background-image: url('<?= $urlPhoto ?>'); background-size: cover; background-position: center;">
                                <button class="upload-photo">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="var(--blanc)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-camera w-5 h-5" aria-hidden="true">
                                        <path d="M13.997 4a2 2 0 0 1 1.76 1.05l.486.9A2 2 0 0 0 18.003 7H20a2 2 0 0 1 2 2v9a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V9a2 2 0 0 1 2-2h1.997a2 2 0 0 0 1.759-1.048l.489-.904A2 2 0 0 1 10.004 4z"></path>
                                        <circle cx="12" cy="13" r="3"></circle>
                                    </svg>
                                </button>
                            </div>
                            <div class="utilisateur-profil">
                                <div class="nom-utilisateur"><?= $_SESSION['acces'] ?> <?= $_SESSION['nom'] ?></div>
                                <div class="fonction">Apiculteur</div>
                            </div>

                        </div>

                        <!-- formulaire d'upload de la photo de profil -->
                        <form method="post"
                            action="index.php?action=enregMembrePhoto&idMembre=<?= $_SESSION['id'] ?>"
                            enctype="multipart/form-data" class="formPhoto">

                            <div class="form_elt">
                                <input type="hidden" name="MAX_FILE_SIZE" value="500000">
                                <input type="file" class="texte" name="photoMembre" accept="image/jpeg, image/jpg, image/png,  img/webp">
                            </div>

                            <input type="submit" class="valid" name="ok" value="Valider">
                        </form>
                        <!---->

                        <div class="container-profil-contact">
                            <div class="element-profil">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="var(--jaune)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-mail w-4 h-4 text-[#E5B444]" aria-hidden="true">
                                    <path d="m22 7-8.991 5.727a2 2 0 0 1-2.009 0L2 7"></path>
                                    <rect x="2" y="4" width="20" height="16" rx="2"></rect>
                                </svg>
                                <span><?= $_SESSION['email'] ?></span>
                            </div>
                            <div class="element-profil">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="var(--jaune)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-phone w-4 h-4 text-[#E5B444]" aria-hidden="true">
                                    <path d="M13.832 16.568a1 1 0 0 0 1.213-.303l.355-.465A2 2 0 0 1 17 15h3a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2A18 18 0 0 1 2 4a2 2 0 0 1 2-2h3a2 2 0 0 1 2 2v3a2 2 0 0 1-.8 1.6l-.468.351a1 1 0 0 0-.292 1.233 14 14 0 0 0 6.392 6.384"></path>
                                </svg>
                                <span><?= $_SESSION['numero'] ?? "Non renseigné" ?></span>
                            </div>
                            <div class="element-profil">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="var(--jaune)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-map-pin w-4 h-4 text-[#E5B444]" aria-hidden="true">
                                    <path d="M20 10c0 4.993-5.539 10.193-7.399 11.799a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 16 0"></path>
                                    <circle cx="12" cy="10" r="3"></circle>
                                </svg>
                                <span><?= $_SESSION['adresse'] ?><br><?= $_SESSION['postal'] ?> <?= $_SESSION['ville'] ?></span>
                            </div>
                            <div class="element-profil">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="var(--jaune)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-calendar w-4 h-4 text-[#E5B444]" aria-hidden="true">
                                    <path d="M8 2v4"></path>
                                    <path d="M16 2v4"></path>
                                    <rect width="18" height="18" x="3" y="4" rx="2"></rect>
                                    <path d="M3 10h18"></path>
                                </svg>
                                <span>Membre depuis: <?= $_SESSION['date_envoi'] ?></span>
                            </div>
                        </div>

                    </div>

                    <div class="info-profil">
                        <h3>Informations personnelles</h3>
                        <div class="container-info-perso">
                            <div class="flex-element info">
                                <div class="element-info perso">
                                    <label class="prenom" for="firstname">Prénom<span style="color: var(--jaune);">*</span></label>
                                    <input type="text" id="firstname" name="firstname" value="<?= $_SESSION['acces'] ?>">
                                </div>
                                <div class="element-info perso-2">
                                    <label class="nom" for="lastname">Nom<span style="color: var(--jaune);">*</span></label>
                                    <input type="text" id="lastname" name="lastname" value="<?= $_SESSION['nom'] ?>">
                                </div>
                            </div>

                            <div class="element-info perso-3">
                                <label class="email" for="email">Email<span style="color: var(--jaune);">*</span></label>
                                <input type="text" id="email" name="email" value="<?= $_SESSION['email'] ?>">
                            </div>

                            <div class="element-info perso-4">
                                <label class="mobile" for="mobile">Mobile</label>
                                <input type="text" id="mobile" name="mobile" value="<?= $_SESSION['numero'] ?? '' ?>" placeholder="Veuillez rentrer votre numéro de téléphone...">
                            </div>

                            <div class="element-info perso-5">
                                <label class="adresse" for="adresse">Adresse<span style="color: var(--jaune);">*</span></label>
                                <input type="text" id="adresse" name="adresse" value="<?= $_SESSION['adresse'] ?>">
                            </div>

                            <div class="flex-element info-2">
                                <div class="element-info perso-6">
                                    <label class="ville" for="ville">Ville<span style="color: var(--jaune);">*</span></label>
                                    <input type="text" id="ville" name="ville" value="<?= $_SESSION['ville'] ?>">
                                </div>
                                <div class="element-info perso-7">
                                    <label class="postal" for="postal">Code postal<span style="color: var(--jaune);">*</span></label>
                                    <input type="text" id="postal" name="postal" value="<?= $_SESSION['postal'] ?>">
                                </div>
                                <div class="element-info perso-8">
                                    <label class="pays" for="pays">France<span style="color: var(--jaune);">*</span></label>
                                    <input type="text" id="pays" name="pays" value="<?= $_SESSION['pays'] ?>">
                                </div>
                            </div>

                            <!--  <div class="element-info perso-9">
                                <label class="bio" for="bio">Biographie</label>
                                <textarea type="text" id="bio" name="bio" placeholder="Veuillez rentrer votre description..."></textarea>
                            </div> -->

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
            </div>
        </section>
    </main>
    <?php require "footer.php"; ?>

    <script src="public/js/photo.js"></script>
</body>

</html>