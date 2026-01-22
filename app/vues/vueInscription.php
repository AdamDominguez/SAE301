<?php
$title = "Inscription | BeeLink";
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link href="./public/css/main.css" rel="stylesheet">
    <link href="./public/css/inscription.css" rel="stylesheet">
    <link href="./public/css/mobile.css" rel="stylesheet" media="(max-width: 680px)">
    <link href="./public/css/tablette.css" rel="stylesheet" media="(min-width: 681px) and (max-width: 1200px)">
    <link rel="icon" type="image/png" sizes="32x32" href="./public/img/favicons/favicon-32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="./public/img/favicons/favicon-16.png">
</head>

<body>
    <?php require "header.php"; ?>
    
    <main class="main-inscription">
        <section class="Inscription">
            
            <?php
            $mode = isset($_GET['mode']) ? $_GET['mode'] : 'inscription';
            ?>

            <?php if ($mode == 'inscription'): ?>
                <h1 class="page-title">Créez votre <span class="accent">compte</span></h1>
                <form id="form-inscription" class="InscriptionForm-card" method="POST" action="index.php?action=inscription">
                    
                    <p class="form-title">Remplissez le formulaire d'inscription</p>
                    
                    <fieldset class="form-section">
                    
                        <div class="form-group-container">
                            
                            <div class="form-group-row">
                                <div class="form-row">
                                    <label for="nom">Nom <span>*</span></label>
                                    <input type="text" id="nom" name="nom" placeholder="Votre nom" required>
                                </div>
                                <div class="form-row">
                                    <label for="prenom">Prénom <span>*</span></label>
                                    <input type="text" id="prenom" name="prenom" placeholder="Votre prénom" required>
                                </div>
                            </div>

                            <div class="form-group-row">
                                <div class="form-row">
                                    <label for="dob">Date de naissance <span>*</span></label>
                                    <input type="date" id="dob" name="dob" required>
                                </div>
                                <div class="form-row">
                                    <label for="email-inscription">Email <span>*</span></label>
                                    <input type="email" id="email-inscription" name="email" placeholder="nom@example.com" required>
                                </div>
                            </div>

                            <div class="form-group-row">
                                <div class="form-row">
                                    <label for="telephone">Numéro de téléphone</label>
                                    <input type="tel" id="telephone" name="numero" placeholder="01 23 45 67 89">
                                </div>
                                <div class="form-row">
                                    <label for="mdp-inscription">Mot de passe <span>*</span></label>
                                    <input type="password" id="mdp-inscription" name="mdp" placeholder="MDP123$" required>
                                </div>
                            </div>                        

                            <div class="form-group-row">
                                <div class="form-row">
                                    <label for="adresse">Adresse <span>*</span></label>
                                    <input type="text" id="adresse" name="adresse" placeholder="Votre adresse" required>
                                </div>
                            </div>

                            <div class="form-group-row">
                                <div class="form-row">
                                    <label for="ville">Ville <span>*</span></label>
                                    <input type="text" id="ville" name="ville" placeholder="Votre ville" required>
                                </div>
                                <div class="form-row">
                                    <label for="postal">Code Postal <span>*</span></label>
                                    <input type="text" id="postal" name="postal" placeholder="Votre code postal" required>
                                </div>
                                <div class="form-row">
                                    <label for="pays">Pays <span>*</span></label>
                                    <input type="text" id="pays" name="pays" placeholder="Votre pays" required>
                                </div>
                            </div>
                        </div>
                    </fieldset>

                    <button type="submit" class="submit-button">Rejoindre BeeLink</button>
                    <p class="auth-switch-link">Déjà un compte ? <a href="index.php?action=inscription&mode=connexion">Se connecter</a></p>
                </form>
            <?php else: ?>
                <h1 class="page-title">Accédez à votre <span class="accent">espace</span></h1>
                <form id="form-connexion" class="InscriptionForm-card" method="POST" action="index.php?action=login">
                    
                    <p class="form-title">Connectez-vous à votre compte</p>
                    
                    <fieldset class="form-section">
                        <div class="form-group-container">
                            <div class="form-group-row">
                                <div class="form-row" style="width: 100%;">
                                    <label for="email-connexion">Email <span>*</span></label>
                                    <input type="email" id="email-connexion" name="email" placeholder="nom@example.com" required>
                                </div>
                            </div>
                            <div class="form-group-row">
                                <div class="form-row" style="width: 100%;">
                                    <label for="mdp-connexion">Mot de passe <span>*</span></label>
                                    <input type="password" id="mdp-connexion" name="password" placeholder="Votre mot de passe" required>
                                </div>
                            </div>
                        </div>
                    </fieldset>

                    <button type="submit" class="submit-button">Se connecter</button>
                    <p class="auth-switch-link">Pas encore de compte ? <a href="index.php?action=inscription&mode=inscription">S'inscrire</a></p>
                </form>
            <?php endif; ?>
        </section>
    </main>
    
    <?php require "footer.php"; ?>
</body>

</html>