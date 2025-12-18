<?php
// var qui permet de récup l'action d'url et sinon retourner accueil en url
$pageActive = $_GET['action'] ?? 'accueil';

// Nouvelle variable pour vérifier si l'action actuelle commence par 'tableau'
$tableauPage = strpos($pageActive, 'tableau') === 0;
?>

<header>
    <div><a href="index.php?action=accueil">
            <img src="./public/img/logo.avif" alt="Logo BEELINK">
        </a></div>
    <div class="Liens">
        <nav>
            <!-- L'attribut class permet au ternaire de vérifier si 
             on a bien l'action qu'on souhaite, si oui alors on met 
             la classe active, sinon on fait rien psk ça marche pas  -->
            <!-- Accueil (Adam.D) -->
            <a href='index.php?action=accueil' class='<?= $pageActive == 'accueil' ? 'active' : '' ?>'>Accueil</a>
            <!-- Tableau de bord (Clément) -->
            <a href='index.php?action=fonctionnalites'
                class='<?= $pageActive == 'fonctionnalites' ? 'active' : '' ?>'>Fonctionnalités</a>
            <!-- Tableau de bord (Clément) -->
            <a href='index.php?action=tableauAccueil' class='<?= $tableauPage ? 'active' : '' ?>'>Tableau de
                bord</a>
            <!-- Contact (Adam.D) -->
            <a href='index.php?action=contact' class='<?= $pageActive == 'contact' ? 'active' : '' ?>'>Nous
                contacter</a>
        </nav>
    </div>

    <?php if (isset($_SESSION['acces'])): ?>
        <div class="Connecter">
            <a href="index.php?action=tableauAccueil"
                style="text-decoration: none; color: inherit; font-weight: bold; display: flex; align-items: center; gap: 10px;">
                <?= $_SESSION['acces'] ?>
            </a>
        </div>

    <?php else: ?>
        <div class="Connecter" id="menuConnexion">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#333333" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5.52 19c.64-2.2 1.84-3 3.22-3h6.52c1.38 0 2.58.8 3.22 3"/><circle cx="12" cy="10" r="3"/><circle cx="12" cy="12" r="10"/></svg>
            Se connecter
        </div>
        <div class="fond"></div>
        <div class="ConnecterMenu">
            <div class="cross">
                <span class="stick"></span>
                <span class="stick2"></span>
            </div>
            <div class="ConnecterContent">
                <h2>BeeLink</h2>
                <h3>Connectez-vous pour accéder à votre espace client</h3>
                <form method="post" action=<?= $_SERVER["PHP_SELF"] . "?action=login" ?>>
                    <div>
                        <label for="email">Email
                        <div class="ConnecterInput1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="16" viewBox="0 0 20 16" fill="none">
                                <path
                                    d="M2 16C1.45 16 0.979333 15.8043 0.588 15.413C0.196667 15.0217 0.000666667 14.5507 0 14V2C0 1.45 0.196 0.979333 0.588 0.588C0.98 0.196666 1.45067 0.000666667 2 0H18C18.55 0 19.021 0.196 19.413 0.588C19.805 0.98 20.0007 1.45067 20 2V14C20 14.55 19.8043 15.021 19.413 15.413C19.0217 15.805 18.5507 16.0007 18 16H2ZM10 9L2 4V14H18V4L10 9ZM10 7L18 2H2L10 7ZM2 4V2V14V4Z"
                                    fill="#333333" />
                            </svg>
                            <input type="text" id="email" name="email" placeholder="Email" value="" required>
                        </div>
                        </label>
                    </div>

                    <div>
                        <label for="password">Mot de passe
                        <div class="ConnecterInput2">
                            <div class="ConnecterInput2a">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="21" viewBox="0 0 16 21"
                                    fill="none">
                                    <path
                                        d="M8 16C7.46957 16 6.96086 15.7893 6.58579 15.4142C6.21071 15.0391 6 14.5304 6 14C6 12.89 6.89 12 8 12C8.53043 12 9.03914 12.2107 9.41421 12.5858C9.78929 12.9609 10 13.4696 10 14C10 14.5304 9.78929 15.0391 9.41421 15.4142C9.03914 15.7893 8.53043 16 8 16ZM14 19V9H2V19H14ZM14 7C14.5304 7 15.0391 7.21071 15.4142 7.58579C15.7893 7.96086 16 8.46957 16 9V19C16 19.5304 15.7893 20.0391 15.4142 20.4142C15.0391 20.7893 14.5304 21 14 21H2C1.46957 21 0.960859 20.7893 0.585786 20.4142C0.210714 20.0391 0 19.5304 0 19V9C0 7.89 0.89 7 2 7H3V5C3 3.67392 3.52678 2.40215 4.46447 1.46447C5.40215 0.526784 6.67392 0 8 0C8.65661 0 9.30679 0.129329 9.91342 0.380602C10.52 0.631876 11.0712 1.00017 11.5355 1.46447C11.9998 1.92876 12.3681 2.47995 12.6194 3.08658C12.8707 3.69321 13 4.34339 13 5V7H14ZM8 2C7.20435 2 6.44129 2.31607 5.87868 2.87868C5.31607 3.44129 5 4.20435 5 5V7H11V5C11 4.20435 10.6839 3.44129 10.1213 2.87868C9.55871 2.31607 8.79565 2 8 2Z"
                                        fill="#333333" />
                                </svg>
                                <input type="password" id="password" name="password" placeholder="Mot de passe" value=""
                                    required>
                        </div>
                        </label>
                            <a href="">Mot de passe oublié ?</a>
                        </div>
                    </div>

                    <button type="submit">CONNEXION</button>
                </form>
                <p>Pas encore de compte ? <a href="index.php?action=inscription">S’inscrire</a></p>
                <p class="ConnecterAdmin">Vous êtes administrateur ? <a
                        href="index.php?action=connexionadmin">Connectez-vous</a></p>
            </div>
        </div>
    <?php endif; ?>
    <script src="./public/js/connecter.js"></script>
</header>