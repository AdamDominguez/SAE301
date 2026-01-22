document.addEventListener('DOMContentLoaded', function () {
    const urlParams = new URLSearchParams(window.location.search);
    const updateStatus = urlParams.get('update');
    console.log("Update status:", updateStatus);

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
                const newUrl = window.location.protocol + "//" + window.location.host + window.location.pathname + '?action=tableauProfil';
                window.history.pushState({ path: newUrl }, '', newUrl);
            }, 4000);
            // } else {
            //     console.error("Aucune notification trouvée");
        }
    }
});
