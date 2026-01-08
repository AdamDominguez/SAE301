<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Erreur | BeeLink</title>
    <link href="./public/css/main.css" rel="stylesheet">
</head>

<body>
    <?php require __DIR__ . "/header.php"; ?>
    <main style="display: flex; flex-direction: column; align-items: center; justify-content: center; text-align: center; gap: 20px;">
        <h1 style="color: var(--jaune);">Oups ! Une erreur est survenue</h1>
        <p style="font-size: 1.2em; color: var(--blanc); background: var(--noir); padding: 20px; border-radius: 8px; border: 1px solid var(--jaune);">
            <?= htmlspecialchars($message ?? "Erreur inconnue") ?>
        </p>
        <a href="index.php?action=accueil" class="btn-export" style="text-decoration: none; padding: 10px 20px;">Retour à l'accueil</a>
    </main>
    <?php require __DIR__ . "/footer.php"; ?>
</body>

</html>