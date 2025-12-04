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
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                <path
                    d="M12 1.5C6.477 1.5 2 5.977 2 11.5C2 17.023 6.477 21.5 12 21.5C17.523 21.5 22 17.023 22 11.5C22 5.977 17.523 1.5 12 1.5Z"
                    stroke="#333333" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                <path
                    d="M18.9409 18.4609C18.9319 18.4503 18.9144 18.4298 18.8882 18.4014C18.8357 18.3444 18.7482 18.2544 18.6245 18.1426C18.3772 17.919 17.9844 17.6072 17.4312 17.291C16.3305 16.6621 14.5677 16 11.9995 16C9.43143 16.0001 7.66913 16.6621 6.56885 17.291C6.01585 17.6071 5.62363 17.919 5.37647 18.1426C5.25288 18.2544 5.16525 18.3444 5.1128 18.4014C5.08666 18.4297 5.0691 18.4503 5.06006 18.4609C5.05567 18.4661 5.05354 18.4693 5.05323 18.4697C5.05323 18.4697 5.05345 18.4687 5.0542 18.4678C5.05463 18.4672 5.05552 18.4666 5.05616 18.4658L5.05713 18.4639C4.71636 18.8975 4.08914 18.973 3.65479 18.6328C3.21999 18.2923 3.14335 17.6643 3.48389 17.2295L4.18018 17.7744C3.53319 17.2676 3.48777 17.2315 3.48487 17.2285V17.2275L3.48682 17.2256C3.48804 17.224 3.48922 17.2216 3.49073 17.2197C3.4938 17.2159 3.49822 17.2112 3.50245 17.2061C3.51086 17.1957 3.52167 17.1823 3.53467 17.167C3.56093 17.136 3.59678 17.0951 3.64209 17.0459C3.73302 16.9472 3.86345 16.8151 4.03467 16.6602C4.37731 16.3502 4.88529 15.9499 5.57666 15.5547C6.96574 14.7607 9.06811 14.0001 11.9995 14C14.931 14 17.034 14.7607 18.4233 15.5547C19.1146 15.9497 19.6236 16.3492 19.9663 16.6592C20.1377 16.8142 20.2679 16.9472 20.3589 17.0459C20.4043 17.0952 20.44 17.136 20.4663 17.167C20.4794 17.1824 20.4901 17.1957 20.4985 17.2061C20.5027 17.2112 20.5062 17.2159 20.5093 17.2197C20.5108 17.2216 20.5129 17.2231 20.5142 17.2246L20.5151 17.2275L20.5161 17.2285C20.513 17.2317 20.4657 17.2691 19.8208 17.7744L20.5171 17.2295C20.8575 17.6641 20.7815 18.2921 20.3472 18.6328C19.9127 18.9733 19.2836 18.898 18.9429 18.4639L18.9409 18.4609ZM13.9995 8.5C13.9995 7.96968 13.7895 7.46099 13.4146 7.08594C13.0395 6.71086 12.5299 6.5 11.9995 6.5C11.4693 6.50013 10.9604 6.71098 10.5855 7.08594C10.2105 7.46099 9.99952 7.96968 9.99952 8.5C9.99952 9.03032 10.2105 9.53901 10.5855 9.91406C10.9604 10.289 11.4693 10.4999 11.9995 10.5C12.5299 10.5 13.0395 10.2891 13.4146 9.91406C13.7895 9.53901 13.9995 9.03032 13.9995 8.5ZM15.9995 8.5C15.9995 9.56075 15.5786 10.578 14.8286 11.3281C14.0785 12.0783 13.0604 12.5 11.9995 12.5C10.9388 12.4999 9.92142 12.0782 9.17139 11.3281C8.4214 10.578 7.99952 9.56075 7.99952 8.5C7.99952 7.43925 8.4214 6.422 9.17139 5.67188C9.92142 4.92184 10.9388 4.50013 11.9995 4.5C13.0604 4.5 14.0785 4.92173 14.8286 5.67188C15.5786 6.422 15.9995 7.43925 15.9995 8.5ZM18.9458 18.4658L18.9478 18.4697C18.9474 18.4693 18.9462 18.4677 18.9439 18.4648L18.9458 18.4658Z"
                    fill="#333333" />
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
                    <div>
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
                        <label for="password">Mot de passe</label>
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