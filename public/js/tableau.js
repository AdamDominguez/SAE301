var mapElement = document.getElementById('map');
if (mapElement) {
    var lat = parseFloat(mapElement.getAttribute('data-lat')) || 47.769622034321365;
    var lng = parseFloat(mapElement.getAttribute('data-lng')) || 7.270559009574735;

    var nomRuche = mapElement.getAttribute('data-id') || 'Votre ruche';

    var map = L.map('map').setView([lat, lng], 13);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    }).addTo(map);

    L.marker([lat, lng]).addTo(map)
        .bindPopup(nomRuche)
        .openPopup();
}

// Export logic
document.addEventListener('DOMContentLoaded', function () {
    var btnExport = document.querySelector('.btn-export');
    if (btnExport) {
        btnExport.addEventListener('click', function () {
            if (typeof window.jspdf === 'undefined') {
                alert("La librairie jsPDF n'est pas chargée. Vérifiez votre connexion internet.");
                return;
            }

            const { jsPDF } = window.jspdf;
            const doc = new jsPDF();

            // Titre
            doc.setFontSize(18);
            doc.text("Relevé de données - Ruche " + (typeof rucheId !== 'undefined' ? rucheId : ''), 14, 22);
            doc.setFontSize(11);
            doc.text("Date d'export : " + new Date().toLocaleDateString(), 14, 30);

            // Préparation des données pour le tableau
            var tableBody = [];
            if (typeof rucheExportData !== 'undefined' && Array.isArray(rucheExportData)) {
                rucheExportData.forEach(function (row) {
                    tableBody.push([
                        new Date(row.date).toLocaleString(),
                        row.temperature + " °C",
                        row.humidite + " %",
                        row.poids + " kg",
                        row.frequence + " Hz"
                    ]);
                });
            }

            // Génération du tableau
            doc.autoTable({
                startY: 40,
                head: [['Date', 'Température', 'Humidité', 'Poids', 'Fréquence']],
                body: tableBody,
            });

            // Sauvegarde
            doc.save('releve_ruche_' + (typeof rucheId !== 'undefined' ? rucheId : 'export') + '.pdf');
        });
    }

    // Table sorting logic
    const tableInfo = document.getElementById('donneesTable');
    if (tableInfo) {
        const headers = tableInfo.querySelectorAll('th.sortable');
        const tbody = tableInfo.querySelector('tbody');

        headers.forEach((header, index) => {
            header.addEventListener('click', () => {
                const type = header.getAttribute('data-type');
                const isAsc = header.classList.contains('asc');

                // Clear other headers
                headers.forEach(h => {
                    h.classList.remove('asc', 'desc');
                });

                // Toggle sort direction
                header.classList.toggle('asc', !isAsc);
                header.classList.toggle('desc', isAsc);

                const direction = !isAsc ? 1 : -1;

                const rows = Array.from(tbody.querySelectorAll('tr'));

                // If it's the "No data" row, don't sort
                if (rows.length === 1 && rows[0].cells.length === 1) return;

                rows.sort((a, b) => {
                    const cellA = a.cells[index].innerText.trim();
                    const cellB = b.cells[index].innerText.trim();

                    if (type === 'number') {
                        // Extract number from string (e.g., "12.5 °C" -> 12.5)
                        const valA = parseFloat(cellA.replace(/[^0-9.-]/g, ''));
                        const valB = parseFloat(cellB.replace(/[^0-9.-]/g, ''));
                        return (valA - valB) * direction;
                    } else if (type === 'date') {
                        // Parse date DD/MM/YYYY HH:mm:ss
                        const parseDate = (str) => {
                            const [datePart, timePart] = str.split(' ');
                            const [day, month, year] = datePart.split('/');
                            return new Date(`${year}-${month}-${day}T${timePart}`);
                        };
                        return (parseDate(cellA) - parseDate(cellB)) * direction;
                    } else {
                        return cellA.localeCompare(cellB) * direction;
                    }
                });

                // Re-append sorted rows
                rows.forEach(row => tbody.appendChild(row));
            });
        });
    }
});
