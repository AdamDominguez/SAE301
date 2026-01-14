// --- Initialisation des graphiques BeeLink ---

// Options globales communes
Chart.defaults.color = '#AAAAAA';
Chart.defaults.font.family = 'sans-serif';

// Data processing
let chartLabels = [];
let tempData = [];
let humData = [];
let poidsData = [];
let freqData = [];

if (typeof rucheHistory !== 'undefined' && rucheHistory.length > 0) {
    // Reverse history to show oldest to newest left to right
    const reversedHistory = [...rucheHistory].reverse();

    reversedHistory.forEach(item => {
        // Format date: dd/mm HH h
        const date = new Date(item.date);
        const day = String(date.getDate()).padStart(2, '0');
        const month = String(date.getMonth() + 1).padStart(2, '0');
        const hour = String(date.getHours()).padStart(2, '0');
        chartLabels.push(`${day}/${month} ${hour} h`);

        tempData.push(item.temperature);
        humData.push(item.humidite);
        poidsData.push(item.poids);
        freqData.push(item.frequence);
    });
} else {
    // Default fallback data
    chartLabels = ['01/11 08 h', '01/11 20 h', '02/11 08 h', '02/11 20 h', '03/11 08 h', '03/11 20 h'];
    tempData = [21, 23, 21.5, 22.8, 20.2, 21];
    humData = [82, 80, 85, 84, 80, 82];
    poidsData = [15.8, 16.0, 15.9, 15.6, 16.0, 15.7];
    freqData = [235, 245, 248, 205, 222, 215];
}

// --- Graphique 1 : Température et Humidité ---
const ctxDonnees = document.getElementById('chartDonnees');
if (ctxDonnees) {
    new Chart(ctxDonnees, {
        type: 'line',
        data: {
            labels: chartLabels,
            datasets: [
                { label: 'Température (°C)', data: tempData, borderColor: '#F0C753', backgroundColor: 'transparent', tension: 0.4, yAxisID: 'yTemp' },
                { label: 'Humidité (%)', data: humData, borderColor: '#2196F3', backgroundColor: 'rgba(33, 150, 243, 0.1)', fill: true, tension: 0.4, yAxisID: 'yHum' }
            ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                yTemp: { type: 'linear', position: 'left', ticks: { color: '#F0C753' }, grid: { color: '#444444', borderDash: [5, 5] } },
                yHum: { type: 'linear', position: 'right', min: 0, max: 100, ticks: { color: '#2196F3' }, grid: { display: false } }
            }
        }
    });
}

// --- Graphique 2 : Évolution du poids (Aire violette) ---
const ctxPoids = document.getElementById('chartPoids');
if (ctxPoids) {
    new Chart(ctxPoids, {
        type: 'line',
        data: {
            labels: chartLabels,
            datasets: [{ label: 'Poids (kg)', data: poidsData, borderColor: '#AD46FF', backgroundColor: 'rgba(173, 70, 255, 0.2)', fill: true, tension: 0.4 }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: { legend: { display: false } },
            scales: {
                y: { grid: { color: '#444444', borderDash: [5, 5] } },
                x: { grid: { display: false } }
            }
        }
    });
}

// --- Graphique 3 : Fréquence sonore (Barres vertes) ---
const ctxFreq = document.getElementById('chartFrequence');
if (ctxFreq) {
    new Chart(ctxFreq, {
        type: 'bar',
        data: {
            labels: chartLabels,
            datasets: [{ label: 'Hz', data: freqData, backgroundColor: '#00C951', borderRadius: 5 }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: { legend: { display: false } },
            scales: {
                y: { grid: { color: '#444444', borderDash: [5, 5] } },
                x: { grid: { display: false } }
            }
        }
    });
}

// --- Graphique 4 : Comparaison multi-métriques ---
const ctxComp = document.getElementById('chartComparaison');
if (ctxComp) {
    new Chart(ctxComp, {
        type: 'line',
        data: {
            labels: chartLabels,
            datasets: [
                { label: 'Fréquence (Hz)', data: freqData, borderColor: '#00C951', backgroundColor: 'transparent', tension: 0.4, pointRadius: 4 },
                { label: 'Humidité (%)', data: humData, borderColor: '#2196F3', backgroundColor: 'transparent', tension: 0.4, pointRadius: 4 },
                { label: 'Température (°C)', data: tempData, borderColor: '#F0C753', backgroundColor: 'transparent', tension: 0.4, pointRadius: 4 }
            ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            interaction: { mode: 'index', intersect: false },
            plugins: {
                legend: { position: 'bottom', labels: { usePointStyle: true, padding: 20 } },
                tooltip: { backgroundColor: 'rgba(43, 43, 43, 0.9)', borderColor: '#444444', borderWidth: 1, padding: 12 }
            },
            scales: {
                y: { grid: { color: '#444444', borderDash: [5, 5] } },
                x: { grid: { display: false } }
            }
        }
    });
}