<?php
$title = "Panel Administrateur | BeeLink";
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link href="./public/css/main.css" rel="stylesheet">
    <link href="./public/css/connexionadmin.css" rel="stylesheet">
    <link href="./public/css/mobile.css" rel="stylesheet" media="(max-width: 680px)">
    <link href="./public/css/tablette.css" rel="stylesheet" media="(min-width: 681px) and (max-width: 1200px)">
    <link rel="icon" type="image/png" sizes="32x32" href="./public/img/favicons/favicon-32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="./public/img/favicons/favicon-16.png">
</head>

<body>
    <main>
        <a href="index.php?action=accueil" class="BackAccueil">← Retour à la page d'accueil</a>
        <section class="ConnexionAdmin">
            <img src="./public/img/logo_admin.avif" alt="Logo Administrateur">
            <form method="POST" action=<?= $_SERVER["PHP_SELF"] . "?action=loginadmin" ?>>
                <fieldset>
                    <div class="form-group">
                        <div class="form-row">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" placeholder="nom@example.com" value="" required>
                        </div>

                        <div class="form-row">
                            <label for="password">Mot de passe</label>
                            <input type="password" id="password" name="password" placeholder="MDP123$" value=""
                                   required>
                        </div>
                    </div>
                </fieldset>

                <button type="submit">CONNEXION</button>

                <div class="ConnexionOpt">
                    <div class="ConnexionCheck">
                        <input type="checkbox" id="remember" name="remember" />
                        <label for="remember">Se souvenir de moi</label>
                    </div>
                    <div class="ConnexionMDP">
                        <a href="">Mot de passe oublié</a>
                    </div>
                </div>
            </form>
        </section>
    </main>
</body>

</html>