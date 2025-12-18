<?php
$title = "Inscription | BeeLink";
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title><?= $title ?></title>
    <link href="./public/css/main.css" rel="stylesheet">
    <link href="./public/css/inscription.css" rel="stylesheet">*
    <link rel="icon" type="image/png" sizes="32x32" href="./public/img/favicons/favicon-32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="./public/img/favicons/favicon-16.png">
</head>

<body>
    <?php require "header.php"; ?>
    <main>
        <section class="Inscription">
            <form class="InscriptionForm" method="POST">
                <h3>Remplissez le formulaire d'inscription</h3>
                <fieldset>
                    <div class="form-group">
                        <div class="form-group1">
                            <div class="form-row">
                                <label for="email">Email <span>*</span></label>
                                <input type="email" id="email" name="email" placeholder="nom@example.com" required>
                            </div>

                            <div class="form-row">
                                <label for="telephone">Numéro de téléphone</label>
                                <input type="tel" id="telephone" name="numero" placeholder="01 23 45 67 89">
                            </div>
                        </div>

                        <div class="form-group2">
                            <div class="form-row">
                                <label for="dob">Date de naissance <span>*</span></label>
                                <input type="text" id="dob" name="dob" placeholder="02/12/2005" required>
                            </div>

                            <div class="form-row">
                                <label for="mdp">Mot de passe <span>*</span></label>
                                <input type="text" id="mdp" name="mdp" placeholder="MDP123$" required>
                            </div>

                        </div>

                        <div class="form-group3">
                            <div class="form-row">
                                <label for="nom">Nom <span>*</span></label>
                                <input type="text" id="nom" name="nom" placeholder="Votre nom" required>
                            </div>

                            <div class="form-row">
                                <label for="prenom">Prénom <span>*</span></label>
                                <input type="text" id="prenom" name="prenom" placeholder="Votre prénom" required>
                            </div>
                        </div>

                        <div class="form-group4">
                            <div class="form-row">
                                <label for="nom">Adresse <span>*</span></label>
                                <input type="text" id="adresse" name="adresse" placeholder="Votre adresse" required>
                            </div>
                        </div>

                        <div class="form-group5">
                            <div class="form-row">
                                <label for="nom">Ville <span>*</span></label>
                                <input type="text" id="ville" name="ville" placeholder="Votre ville" required>
                            </div>
                            <div class="form-row">
                                <label for="nom">Code Postal <span>*</span></label>
                                <input type="text" id="postal" name="postal" placeholder="Votre code postal" required>
                            </div>
                            <div class="form-row">
                                <label for="nom">Pays <span>*</span></label>
                                <input type="text" id="pays" name="pays" placeholder="Votre pays" required>
                            </div>
                        </div>
                    </div>
                </fieldset>

                <button type="submit">REJOINDRE BEELINK</button>
            </form>
        </section>
    </main>
    <?php require "footer.php"; ?>
</body>

</html>