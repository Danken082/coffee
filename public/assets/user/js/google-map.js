var map = L.map('map').setView([13.391242572256562, 121.16589193500313], 13);

L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 50,
    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
}).addTo(map);

L.marker([13.391242572256562, 121.16589193500313]).addTo(map)
    .bindPopup('Crossroads Cafe and Deli')
    .openPopup();