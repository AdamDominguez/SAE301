<?php
$title = "BeeLink";
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title><?= $title ?></title>
    <link href="./public/css/main.css" rel="stylesheet">
    <link href="./public/css/contact.css" rel="stylesheet">*
    <link rel="icon" type="image/png" sizes="32x32" href="./public/img/favicons/favicon-32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="./public/img/favicons/favicon-16.png">
</head>

<body>
    <?php require "header.php"; ?>
    <main>
        <section class="Contact">
            <div class="Gauche">
                <div class="gauche-un">
                    <h1>CONTACTEZ-NOUS</h1>
                    <p>Une question, un besoin spécifique ? Nous sommes à votre service du tous les jours, 24h sur 24,
                        par
                        e-mail ou par téléphone.</p>
                </div>
                <div class="gauche-deux">
                    <h2>Contact</h2>
                    <p>info@beelink.fr</p>
                </div>
                <div class="gauche-trois">
                    <h2>Adresse</h2>
                    <div>
                        <p>Beelink SARL - 61 Rue Albert</p>
                        <p>Camus, 68200 Mulhouse</p>
                    </div>
                </div>
            </div>
            <div class="Droite">
                <form method="POST">
                    <h3>Remplissez le formulaire et nous vous contacterons.</h3>
                    <fieldset>
                        <div class="form-group">
                            <div class="form-row">
                                <label for="nom">Nom <span>*</span></label>
                                <input type="text" id="nom" name="nom" placeholder="Votre nom" required>
                            </div>

                            <div class="form-row">
                                <label for="prenom">Prénom <span>*</span></label>
                                <input type="text" id="prenom" name="prenom" placeholder="Votre prénom" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-row">
                                <label for="email">Email <span>*</span></label>
                                <input type="email" id="email" name="email" placeholder="nom@example.com" required>
                            </div>

                            <div class="form-row">
                                <label for="telephone">Numéro de téléphone</label>
                                <input type="tel" id="telephone" name="numero" placeholder="01 23 45 67 89">
                            </div>
                        </div>
                    </fieldset>

                    <div class="form-message">
                        <label for="message">Votre demande <span>*</span></label>
                        <textarea id="demande" name="message" rows="6" placeholder="Décrivez votre demande ici..."
                            required></textarea>
                    </div>

                    <button type="submit">Envoyer</button>
                </form>
            </div>
        </section>
    </main>
    <?php require "footer.php"; ?>
</body>

</html>