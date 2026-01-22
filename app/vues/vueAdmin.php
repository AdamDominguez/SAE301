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
    <link href="./public/css/admin.css" rel="stylesheet">
    <link href="./public/css/mobile.css" rel="stylesheet" media="(max-width: 680px)">
    <link href="./public/css/tablette.css" rel="stylesheet" media="(min-width: 681px) and (max-width: 1200px)">
    <link rel="icon" type="image/png" sizes="32x32" href="./public/img/favicons/favicon-32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="./public/img/favicons/favicon-16.png">
</head>

<body>
<main>
    <a href="index.php?action=quit" class="BackAccueil">← Retour à la page d'accueil</a>

    <h1>Gestion des membres</h1>

    <div class="table-container">
        <table>
            <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <?php
            if (!empty($membres)) :
                foreach ($membres as $membre) : ?>
                    <tr>
                        <td><?= $membre['id'] ?></td>
                        <td><?= $membre['nom'] ?></td>
                        <td><?= $membre['prenom'] ?></td>
                        <td><?= $membre['email'] ?></td>
                        <td>
                            <a href="index.php?action=supprimerMembre&id=<?= $membre['id'] ?>">❌</a>
                        </td>
                    </tr>
                <?php endforeach;
            else : ?>
                <tr>
                    <td colspan="5">Aucun membre inscrit pour le moment.</td>
                </tr>
            <?php endif; ?>
            </tbody>
        </table>
    </div>
</main>
</body>

</html>