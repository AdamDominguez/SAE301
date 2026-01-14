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
