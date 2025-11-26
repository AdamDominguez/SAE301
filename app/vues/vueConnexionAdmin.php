<?php
$title = "ACCUEIL";
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title><?= $title ?></title>
    <link href="./public/css/main.css" rel="stylesheet">
    <link href="./public/css/connexionadmin.css" rel="stylesheet">
    <link rel="icon" type="image/png" sizes="32x32" href="./public/img/favicons/favicon-32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="./public/img/favicons/favicon-16.png">
</head>

<body>
    <main>
        <section class="ConnexionAdmin">
            <img src="./public/img/logo_admin.avif" alt="Logo Administrateur">
            <form method="POST">
                <fieldset>
                    <div class="form-group">
                        <div class="form-row">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" placeholder="nom@example.com" required>
                        </div>

                        <div class="form-row">
                            <label for="mdp">Mot de passe</label>
                            <input type="text" id="mdp" name="mdp" placeholder="MDP123$" required>
                        </div>
                    </div>
                </fieldset>

                <button type="submit">CONNEXION</button>
            </form>
        </section>
    </main>
</body>

</html>