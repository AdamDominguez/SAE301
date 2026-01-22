const menuConnexion = document.querySelector('#menuConnexion');
const cross = document.querySelector('.cross');
const fond = document.querySelector('.fond');

if (menuConnexion) menuConnexion.addEventListener("click", menuToggle);
if (cross) cross.addEventListener("click", menuToggle);
if (fond) fond.addEventListener("click", menuToggle);

function menuToggle() {
    const connecterMenu = document.querySelector('.ConnecterMenu');
    const cross = document.querySelector('.cross');
    const stick = document.querySelector('.stick');
    const stick2 = document.querySelector('.stick2');
    const fond = document.querySelector('.fond');

    if (connecterMenu) connecterMenu.classList.toggle('ConnecterMenu-active');
    if (cross) cross.classList.toggle('cross-active');
    if (stick) stick.classList.toggle('stick-active');
    if (stick2) stick2.classList.toggle('stick2-active');
    if (fond) fond.classList.toggle('fond-active');
};

document.addEventListener('DOMContentLoaded', function () {
    const urlParams = new URLSearchParams(window.location.search);
    const updateStatus = urlParams.get('login');
    console.log("Login status:", updateStatus);

    if (updateStatus === 'success') {
        const notification = document.getElementById('notification-succes');
        showNotification(notification);
    } else if (updateStatus === 'error') {
        const notification = document.getElementById('notification-erreur');
        showNotification(notification);
    }

    function showNotification(notification) {
        if (notification) {
            notification.classList.add('show');

            // Masquer après 4 secondes
            setTimeout(() => {
                notification.classList.remove('show');
                // Nettoyer l'URL
                const newUrl = window.location.protocol + "//" + window.location.host + window.location.pathname + '?action=accueil';
                window.history.pushState({ path: newUrl }, '', newUrl);
            }, 4000);
            // } else {
            // console.error("Aucune notification trouvée");
        }
    }
});
