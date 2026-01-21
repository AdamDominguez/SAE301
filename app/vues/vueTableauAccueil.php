<?php
$title = "Tableau de bord | BeeLink";
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title><?= $title ?></title>
    <link href="./public/css/main.css" rel="stylesheet">
    <link href="./public/css/tableau.css" rel="stylesheet">
    <link rel="icon" type="image/png" sizes="32x32" href="./public/img/favicons/favicon-32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="./public/img/favicons/favicon-16.png">
</head>

<body>
    <?php require "header.php"; ?>
    <main>
        <nav class="FonctionNav">
            <div class="principal">
                <h4>PRINCIPAL</h4>
                <div class="accueil element-menu actif"><a href="index.php?action=tableauAccueil">Accueil</a></div>
                <div class="donnees element-menu"><a href="index.php?action=tableauDonnees">Données</a></div>
            </div>
            <div class="gestion">
                <h4>GESTION</h4>
                <div class="profil element-menu"><a href="index.php?action=tableauProfil">Profil</a></div>
            </div>
        </nav>

        <section class="contenu-tableau">
            <div class="titres">
                <h1 class="titre-principal">Accueil - Ruche n°<?= $selectedRucheId ?></h1>
                <p class="sous-titre1">Bienvenue sur BeeLink.</p>
            </div>
            <div class="grille-widgets">
                <?php require "data.php"; ?>
                <div class="widget-ruches">
                    <h3 class="titre-widget">Vos ruches</h3>
                    <div class="liste-ruches">
                        <!-- si la var $ruches existe et est remplie alors on lance un foreach qui va attribuer chaque ruche du JSON de manière dynamique! -->
                        <?php if (isset($ruches)): ?>
                            <?php foreach ($ruches as $id => $ruche): ?>
                                <a class="ruche-item <?= ($id == $selectedRucheId) ? 'actif' : '' ?>" href="index.php?action=tableauDonnees&id=<?= $id ?>">
                                    <div class="icone-ruche">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="266" height="244" viewBox="0 0 266 244" fill="none">
                                            <g clip-path="url(#clip0_1_2)">
                                                <g filter="url(#filter0_i_1_2)">
                                                    <path d="M123 77.7735C129.188 74.2008 136.812 74.2008 143 77.7735L166.301 91.2265C172.489 94.7992 176.301 101.402 176.301 108.547V135.453C176.301 142.598 172.489 149.201 166.301 152.774L143 166.226C136.812 169.799 129.188 169.799 123 166.226L99.6987 152.774C93.5107 149.201 89.6987 142.598 89.6987 135.453V108.547C89.6987 101.402 93.5107 94.7992 99.6987 91.2265L123 77.7735Z" fill="#F0C753"/>
                                                </g>
                                                <path d="M124 79.5059C129.569 76.2905 136.431 76.2905 142 79.5059L165.302 92.959C170.871 96.1744 174.302 102.116 174.302 108.547V135.453C174.302 141.884 170.871 147.826 165.302 151.041L142 164.494C136.431 167.71 129.569 167.71 124 164.494L100.698 151.041C95.1294 147.826 91.6993 141.884 91.6992 135.453V108.547C91.6993 102.116 95.1294 96.1744 100.698 92.959L124 79.5059Z" stroke="#333333" stroke-width="4"/>
                                                <g filter="url(#filter1_i_1_2)">
                                                    <path d="M40 77.7735C46.188 74.2008 53.812 74.2008 60 77.7735L83.3013 91.2265C89.4893 94.7992 93.3013 101.402 93.3013 108.547V135.453C93.3013 142.598 89.4893 149.201 83.3013 152.774L60 166.226C53.812 169.799 46.188 169.799 40 166.226L16.6987 152.774C10.5107 149.201 6.69873 142.598 6.69873 135.453L6.69873 108.547C6.69873 101.402 10.5107 94.7992 16.6987 91.2265L40 77.7735Z" fill="#F0C753"/>
                                                </g>
                                                <path d="M41 79.5059C46.5692 76.2905 53.4308 76.2905 59 79.5059L82.3018 92.959C87.8706 96.1744 91.3017 102.116 91.3018 108.547V135.453C91.3017 141.884 87.8706 147.826 82.3018 151.041L59 164.494C53.4308 167.71 46.5692 167.71 41 164.494L17.6982 151.041C12.1294 147.826 8.69926 141.884 8.69922 135.453L8.69922 108.547C8.69927 102.116 12.1294 96.1744 17.6982 92.959L41 79.5059Z" stroke="#333333" stroke-width="4"/>
                                                <g filter="url(#filter2_i_1_2)">
                                                    <path d="M206 77.7735C212.188 74.2008 219.812 74.2008 226 77.7735L249.301 91.2265C255.489 94.7992 259.301 101.402 259.301 108.547V135.453C259.301 142.598 255.489 149.201 249.301 152.774L226 166.226C219.812 169.799 212.188 169.799 206 166.226L182.699 152.774C176.511 149.201 172.699 142.598 172.699 135.453V108.547C172.699 101.402 176.511 94.7992 182.699 91.2265L206 77.7735Z" fill="#F0C753"/>
                                                </g>
                                                <path d="M207 79.5059C212.569 76.2905 219.431 76.2905 225 79.5059L248.302 92.959C253.871 96.1744 257.302 102.116 257.302 108.547V135.453C257.302 141.884 253.871 147.826 248.302 151.041L225 164.494C219.431 167.71 212.569 167.71 207 164.494L183.698 151.041C178.129 147.826 174.699 141.884 174.699 135.453V108.547C174.699 102.116 178.129 96.1744 183.698 92.959L207 79.5059Z" stroke="#333333" stroke-width="4"/>
                                                <g filter="url(#filter3_i_1_2)">
                                                    <path d="M164 149.774C170.188 146.201 177.812 146.201 184 149.774L207.301 163.226C213.489 166.799 217.301 173.402 217.301 180.547V207.453C217.301 214.598 213.489 221.201 207.301 224.774L184 238.226C177.812 241.799 170.188 241.799 164 238.226L140.699 224.774C134.511 221.201 130.699 214.598 130.699 207.453V180.547C130.699 173.402 134.511 166.799 140.699 163.226L164 149.774Z" fill="#F0C753"/>
                                                </g>
                                                <path d="M165 151.506C170.569 148.29 177.431 148.29 183 151.506L206.302 164.959C211.871 168.174 215.302 174.116 215.302 180.547V207.453C215.302 213.884 211.871 219.826 206.302 223.041L183 236.494C177.431 239.71 170.569 239.71 165 236.494L141.698 223.041C136.129 219.826 132.699 213.884 132.699 207.453V180.547C132.699 174.116 136.129 168.174 141.698 164.959L165 151.506Z" stroke="#333333" stroke-width="4"/>
                                                <g filter="url(#filter4_i_1_2)">
                                                    <path d="M82 149.774C88.188 146.201 95.812 146.201 102 149.774L125.301 163.226C131.489 166.799 135.301 173.402 135.301 180.547V207.453C135.301 214.598 131.489 221.201 125.301 224.774L102 238.226C95.812 241.799 88.188 241.799 82 238.226L58.6987 224.774C52.5107 221.201 48.6987 214.598 48.6987 207.453V180.547C48.6987 173.402 52.5107 166.799 58.6987 163.226L82 149.774Z" fill="#F0C753"/>
                                                </g>
                                                <path d="M83 151.506C88.5692 148.29 95.4308 148.29 101 151.506L124.302 164.959C129.871 168.174 133.302 174.116 133.302 180.547V207.453C133.302 213.884 129.871 219.826 124.302 223.041L101 236.494C95.4308 239.71 88.5692 239.71 83 236.494L59.6982 223.041C54.1294 219.826 50.6993 213.884 50.6992 207.453V180.547C50.6993 174.116 54.1294 168.174 59.6982 164.959L83 151.506Z" stroke="#333333" stroke-width="4"/>
                                                <g filter="url(#filter5_i_1_2)">
                                                    <path d="M164 5.7735C170.188 2.20085 177.812 2.20085 184 5.7735L207.301 19.2265C213.489 22.7992 217.301 29.4017 217.301 36.547V63.453C217.301 70.5983 213.489 77.2008 207.301 80.7735L184 94.2265C177.812 97.7992 170.188 97.7992 164 94.2265L140.699 80.7735C134.511 77.2008 130.699 70.5983 130.699 63.453V36.547C130.699 29.4017 134.511 22.7992 140.699 19.2265L164 5.7735Z" fill="#F0C753"/>
                                                </g>
                                                <path d="M165 7.50586C170.569 4.29047 177.431 4.29047 183 7.50586L206.302 20.959C211.871 24.1744 215.302 30.1164 215.302 36.5469V63.4531C215.302 69.8836 211.871 75.8256 206.302 79.041L183 92.4941C177.431 95.7095 170.569 95.7095 165 92.4941L141.698 79.041C136.129 75.8256 132.699 69.8836 132.699 63.4531V36.5469C132.699 30.1164 136.129 24.1744 141.698 20.959L165 7.50586Z" stroke="#333333" stroke-width="4"/>
                                                <g filter="url(#filter6_i_1_2)">
                                                    <path d="M82 5.7735C88.188 2.20085 95.812 2.20085 102 5.7735L125.301 19.2265C131.489 22.7992 135.301 29.4017 135.301 36.547V63.453C135.301 70.5983 131.489 77.2008 125.301 80.7735L102 94.2265C95.812 97.7992 88.188 97.7992 82 94.2265L58.6987 80.7735C52.5107 77.2008 48.6987 70.5983 48.6987 63.453V36.547C48.6987 29.4017 52.5107 22.7992 58.6987 19.2265L82 5.7735Z" fill="#F0C753"/>
                                                </g>
                                                <path d="M83 7.50586C88.5692 4.29047 95.4308 4.29047 101 7.50586L124.302 20.959C129.871 24.1744 133.302 30.1164 133.302 36.5469V63.4531C133.302 69.8836 129.871 75.8256 124.302 79.041L101 92.4941C95.4308 95.7095 88.5692 95.7095 83 92.4941L59.6982 79.041C54.1294 75.8256 50.6993 69.8836 50.6992 63.4531V36.5469C50.6993 30.1164 54.1294 24.1744 59.6982 20.959L83 7.50586Z" stroke="#333333" stroke-width="4"/>
                                            </g>
                                            <defs>
                                                <filter id="filter0_i_1_2" x="89.6987" y="75.094" width="86.6025" height="97.812" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                                    <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                                                    <feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape"/>
                                                    <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                                                    <feOffset dy="4"/>
                                                    <feGaussianBlur stdDeviation="2"/>
                                                    <feComposite in2="hardAlpha" operator="arithmetic" k2="-1" k3="1"/>
                                                    <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0"/>
                                                    <feBlend mode="normal" in2="shape" result="effect1_innerShadow_1_2"/>
                                                </filter>
                                                <filter id="filter1_i_1_2" x="6.69873" y="75.094" width="86.6025" height="97.812" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                                    <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                                                    <feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape"/>
                                                    <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                                                    <feOffset dy="4"/>
                                                    <feGaussianBlur stdDeviation="2"/>
                                                    <feComposite in2="hardAlpha" operator="arithmetic" k2="-1" k3="1"/>
                                                    <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0"/>
                                                    <feBlend mode="normal" in2="shape" result="effect1_innerShadow_1_2"/>
                                                </filter>
                                                <filter id="filter2_i_1_2" x="172.699" y="75.094" width="86.6025" height="97.812" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                                    <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                                                    <feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape"/>
                                                    <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                                                    <feOffset dy="4"/>
                                                    <feGaussianBlur stdDeviation="2"/>
                                                    <feComposite in2="hardAlpha" operator="arithmetic" k2="-1" k3="1"/>
                                                    <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0"/>
                                                    <feBlend mode="normal" in2="shape" result="effect1_innerShadow_1_2"/>
                                                </filter>
                                                <filter id="filter3_i_1_2" x="130.699" y="147.094" width="86.6025" height="97.812" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                                    <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                                                    <feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape"/>
                                                    <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                                                    <feOffset dy="4"/>
                                                    <feGaussianBlur stdDeviation="2"/>
                                                    <feComposite in2="hardAlpha" operator="arithmetic" k2="-1" k3="1"/>
                                                    <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0"/>
                                                    <feBlend mode="normal" in2="shape" result="effect1_innerShadow_1_2"/>
                                                </filter>
                                                <filter id="filter4_i_1_2" x="48.6987" y="147.094" width="86.6025" height="97.812" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                                    <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                                                    <feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape"/>
                                                    <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                                                    <feOffset dy="4"/>
                                                    <feGaussianBlur stdDeviation="2"/>
                                                    <feComposite in2="hardAlpha" operator="arithmetic" k2="-1" k3="1"/>
                                                    <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0"/>
                                                    <feBlend mode="normal" in2="shape" result="effect1_innerShadow_1_2"/>
                                                </filter>
                                                <filter id="filter5_i_1_2" x="130.699" y="3.09401" width="86.6025" height="97.812" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                                    <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                                                    <feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape"/>
                                                    <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                                                    <feOffset dy="4"/>
                                                    <feGaussianBlur stdDeviation="2"/>
                                                    <feComposite in2="hardAlpha" operator="arithmetic" k2="-1" k3="1"/>
                                                    <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0"/>
                                                    <feBlend mode="normal" in2="shape" result="effect1_innerShadow_1_2"/>
                                                </filter>
                                                <filter id="filter6_i_1_2" x="48.6987" y="3.09401" width="86.6025" height="97.812" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                                    <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                                                    <feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape"/>
                                                    <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                                                    <feOffset dy="4"/>
                                                    <feGaussianBlur stdDeviation="2"/>
                                                    <feComposite in2="hardAlpha" operator="arithmetic" k2="-1" k3="1"/>
                                                    <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0"/>
                                                    <feBlend mode="normal" in2="shape" result="effect1_innerShadow_1_2"/>
                                                </filter>
                                                <clipPath id="clip0_1_2">
                                                    <rect width="266" height="244" fill="white"/>
                                                </clipPath>
                                            </defs>
                                        </svg>
                                    </div>
                                    <p>Ruche <?= $id ?></p>
                                </a>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>

            </div>
        </section>
    </main>
    <?php require "footer.php"; ?>
</body>

</html>