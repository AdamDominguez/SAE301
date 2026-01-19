var mapElement = document.getElementById('map');
if (mapElement) {
    // on attribue des variables lattitude & longitude qui écoute les données concernées, sinon
    // on affecte en dur les données de base de la ruche 01
    var lat = parseFloat(mapElement.getAttribute('data-lat')) || 47.769622034321365;
    var lng = parseFloat(mapElement.getAttribute('data-lng')) || 7.270559009574735;

    // idem qu'en haut
    var nomRuche = mapElement.getAttribute('data-id') || 'Votre ruche';

    var map = L.map('map').setView([lat, lng], 13);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    }).addTo(map);

    L.marker([lat, lng]).addTo(map)
        .bindPopup(nomRuche)
        .openPopup();
}

// ne fonctionne plus
// utilisation de la librarie jsPDF pour permettre d'exporter en pdf nos données
// https://www.npmjs.com/package/jspdf avec aide IA pour s'assurer du bon fonctionnement de la lib
// on attend le chargement du DOM & on ne lance le processus uniquement au clic sur exporter
// document.addEventListener('DOMContentLoaded', function () {
//     var btnExport = document.querySelector('.btn-export');
//     if (btnExport) {
//         btnExport.addEventListener('click', function () {
//             if (typeof window.jspdf === 'undefined') {
//                 alert("La librairie jsPDF n'est pas chargée. Vérifiez votre connexion internet.");
//                 return;
//             }

//             const { jsPDF } = window.jspdf;
//             const doc = new jsPDF();

//             // titre
//             doc.setFontSize(18);
//             doc.text("Relevé de données - Ruche " + (typeof rucheId !== 'undefined' ? rucheId : ''), 14, 22);
//             doc.setFontSize(11);
//             doc.text("Date d'export : " + new Date().toLocaleDateString(), 14, 30);

//             // chargement données du tableau
//             var tableBody = [];
//             if (typeof rucheExportData !== 'undefined' && Array.isArray(rucheExportData)) {
//                 rucheExportData.forEach(function (row) {
//                     tableBody.push([
//                         new Date(row.date).toLocaleString(),
//                         row.temperature + " °C",
//                         row.humidite + " %",
//                         row.poids + " kg",
//                         row.frequence + " Hz"
//                     ]);
//                 });
//             }

//             // génération du tableau
//             doc.autoTable({
//                 startY: 40,
//                 head: [['Date', 'Température', 'Humidité', 'Poids', 'Fréquence']],
//                 body: tableBody,
//             });

//             // sauvegarde
//             doc.save('releve_ruche_' + (typeof rucheId !== 'undefined' ? rucheId : 'export') + '.pdf');
//         });
//     }
// });
