var map = L.map('map').setView([47.769622034321365, 7.270559009574735], 13);

L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
}).addTo(map);

L.marker([47.769622034321365, 7.270559009574735]).addTo(map)
    .bindPopup('Votre ruche principale')
    .openPopup();