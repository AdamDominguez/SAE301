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
    <link rel="icon" type="image/png" sizes="32x32" href="./public/img/favicons/favicon-32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="./public/img/favicons/favicon-16.png">
</head>

<body>
    <?php require "header.php"; ?>
    
    <main class="main-inscription">
        <section class="Inscription">
            
            <h1 class="page-title">Créez votre <span class="accent">compte</span></h1>
            
            <form class="InscriptionForm-card" method="POST">
                
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
                                <label for="email">Email <span>*</span></label>
                                <input type="email" id="email" name="email" placeholder="nom@example.com" required>
                            </div>
                        </div>

                        <div class="form-group-row">
                            <div class="form-row">
                                <label for="telephone">Numéro de téléphone</label>
                                <input type="tel" id="telephone" name="numero" placeholder="01 23 45 67 89">
                            </div>
                            <div class="form-row">
                                <label for="mdp">Mot de passe <span>*</span></label>
                                <input type="password" id="mdp" name="mdp" placeholder="MDP123$" required>
                            </div>
                        </div>
                        
                    </div>
                </fieldset>

                <button type="submit" class="submit-button">Rejoindre BeeLink</button>
            </form>
        </section>
    </main>
    
    <?php require "footer.php"; ?>
</body>

</html>