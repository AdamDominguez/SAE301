<?php
// Vérification de l'existence d'une image personnalisée (jpg ou png)
$urlPhoto = PHOTOMEMDIR . "/defaut.png"; // lien relatif image de profil par défaut

if (isset($_SESSION['id'])) {
    $idUtilisateur = $_SESSION['id'];

    if (file_exists(PHOTOMEMDIR . "/" . $idUtilisateur . ".jpg")) {
        $urlPhoto = PHOTOMEMDIR . "/" . $idUtilisateur . ".jpg";
    } elseif (file_exists(PHOTOMEMDIR . "/" . $idUtilisateur . ".png")) {
        $urlPhoto = PHOTOMEMDIR . "/" . $idUtilisateur . ".png";
    }
}


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
        <div class="Connecter" style="border-radius: 100%">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#333333"
                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M5.52 19c.64-2.2 1.84-3 3.22-3h6.52c1.38 0 2.58.8 3.22 3" />
                <circle cx="12" cy="10" r="3" />
                <circle cx="12" cy="12" r="10" />
            </svg>
            <div class=UserMenu>
                <p><?= $_SESSION['email'] ?></p>
                <div class="UserMenuPP">
                    <img src="<?= $urlPhoto ?>" alt="">
                </div>
                <p>Bonjour <?= $_SESSION['acces'] ?> !</p>
                <div class="UserMenuLiens">
                    <div class="UserMenuLienA">
                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12" fill="none">
                            <path
                                d="M5.33333 8.66667H0V10.6667C0 11.0333 0.130667 11.3473 0.392 11.6087C0.653333 11.87 0.967111 12.0004 1.33333 12H5.33333V8.66667ZM6.66667 8.66667V12H10.6667C11.0333 12 11.3473 11.8696 11.6087 11.6087C11.87 11.3478 12.0004 11.0338 12 10.6667V8.66667H6.66667ZM5.33333 7.33333V4H0V7.33333H5.33333ZM6.66667 7.33333H12V4H6.66667V7.33333ZM0 2.66667H12V1.33333C12 0.966667 11.8696 0.652889 11.6087 0.392C11.3478 0.131111 11.0338 0.000444444 10.6667 0H1.33333C0.966667 0 0.652889 0.130667 0.392 0.392C0.131111 0.653333 0.000444444 0.967111 0 1.33333V2.66667Z"
                                fill="white" />
                        </svg>
                        <a href="index.php?action=tableauAccueil">Tableau de Bord</a>
                    </div>
                    <div class="UserMenuLienB">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="13" viewBox="0 0 14 13" fill="none">
                            <path
                                d="M2.75 0C2.02065 0 1.32118 0.289731 0.805456 0.805456C0.289731 1.32118 0 2.02065 0 2.75V10.25C0 10.9793 0.289731 11.6788 0.805456 12.1945C1.32118 12.7103 2.02065 13 2.75 13H8.75C8.94891 13 9.13968 12.921 9.28033 12.7803C9.42098 12.6397 9.5 12.4489 9.5 12.25C9.5 12.0511 9.42098 11.8603 9.28033 11.7197C9.13968 11.579 8.94891 11.5 8.75 11.5H2.75C2.06 11.5 1.5 10.94 1.5 10.25V2.75C1.5 2.06 2.06 1.5 2.75 1.5H8.75C8.94891 1.5 9.13968 1.42098 9.28033 1.28033C9.42098 1.13968 9.5 0.948912 9.5 0.75C9.5 0.551088 9.42098 0.360322 9.28033 0.21967C9.13968 0.0790177 8.94891 0 8.75 0H2.75ZM10.53 3.22C10.4613 3.14631 10.3785 3.08721 10.2865 3.04622C10.1945 3.00523 10.0952 2.98319 9.99452 2.98141C9.89382 2.97963 9.79379 2.99816 9.7004 3.03588C9.60701 3.0736 9.52218 3.12974 9.45096 3.20096C9.37974 3.27218 9.3236 3.35701 9.28588 3.4504C9.24816 3.54379 9.22963 3.64382 9.23141 3.74452C9.23318 3.84523 9.25523 3.94454 9.29622 4.03654C9.33721 4.12854 9.39631 4.21134 9.47 4.28L10.94 5.75H5.25C5.05109 5.75 4.86032 5.82902 4.71967 5.96967C4.57902 6.11032 4.5 6.30109 4.5 6.5C4.5 6.69891 4.57902 6.88968 4.71967 7.03033C4.86032 7.17098 5.05109 7.25 5.25 7.25H10.94L9.47 8.72C9.39631 8.78866 9.33721 8.87146 9.29622 8.96346C9.25523 9.05546 9.23318 9.15478 9.23141 9.25548C9.22963 9.35618 9.24816 9.45621 9.28588 9.5496C9.3236 9.64299 9.37974 9.72782 9.45096 9.79904C9.52218 9.87026 9.60701 9.9264 9.7004 9.96412C9.79379 10.0018 9.89382 10.0204 9.99452 10.0186C10.0952 10.0168 10.1945 9.99477 10.2865 9.95378C10.3785 9.91279 10.4613 9.85369 10.53 9.78L13.28 7.03C13.4205 6.88937 13.4993 6.69875 13.4993 6.5C13.4993 6.30125 13.4205 6.11063 13.28 5.97L10.53 3.22Z"
                                fill="white" />
                        </svg>
                        <a href="index.php?action=quit">Se déconnecter</a>
                    </div>
                </div>
            </div>
        </div>

    <?php else: ?>
        <div class="Connecter" id="menuConnexion">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#333333"
                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M5.52 19c.64-2.2 1.84-3 3.22-3h6.52c1.38 0 2.58.8 3.22 3" />
                <circle cx="12" cy="10" r="3" />
                <circle cx="12" cy="12" r="10" />
            </svg>
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
                    <div class="ConnecterField">
                        <label for="email">Email</label>
                        <div class="ConnecterInput1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="16" viewBox="0 0 20 16" fill="none">
                                <path
                                    d="M2 16C1.45 16 0.979333 15.8043 0.588 15.413C0.196667 15.0217 0.000666667 14.5507 0 14V2C0 1.45 0.196 0.979333 0.588 0.588C0.98 0.196666 1.45067 0.000666667 2 0H18C18.55 0 19.021 0.196 19.413 0.588C19.805 0.98 20.0007 1.45067 20 2V14C20 14.55 19.8043 15.021 19.413 15.413C19.0217 15.805 18.5507 16.0007 18 16H2ZM10 9L2 4V14H18V4L10 9ZM10 7L18 2H2L10 7ZM2 4V2V14V4Z"
                                    fill="#333333" />
                            </svg>
                            <input type="text" id="email" name="email" placeholder="Email" value="" required>
                        </div>
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