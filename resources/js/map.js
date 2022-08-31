// import * as L from 'leaflet';
// import 'leaflet.markercluster';

const mapID = document.getElementById('map');
const mapContainer = document.getElementById('map-container');

const markers = [{
        "name": "Canada",
        "url": "https://en.wikipedia.org/wiki/Canada",
        "lat": -33.04,
        "lng": -71.59
    },
    {
        "name": "Anguilla",
        "url": "https://en.wikipedia.org/wiki/Anguilla",
        "lat": -33.03,
        "lng": -71.59
    },
    {
        "name": "Japan",
        "url": "https://en.wikipedia.org/wiki/Japan",
        "lat": -33.035,
        "lng": -71.58
    },
    {
        "name": "Peru",
        "url": "https://en.wikipedia.org/wiki/Japan",
        "lat": -33.045,
        "lng": -71.59
    }
];


const locationPoint = [-33.04, -71.59];


// Create map
const map = L.map(mapID, {
    fadeAnimation: false,
    zoomAnimation: false,
    markerZoomAnimation: false
}).setView(locationPoint, 14);


// Layer base
const osm = L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="http://openstreetmap.org">OpenStreetMap</a>',
    maxZoom: 18,
    updateWhenIdle: true,
    reuseTiles: true,
}).addTo(map);


let layerGroup = L.layerGroup();
layerGroup.clearLayers()





// Add markers
markers.forEach((point) => {
    let marker = L.marker([point.lat, point.lng])
        .bindPopup(`
        <li>${point.name}</li>
        <li>${point.lat}</li>
        <li>${point.lng}</li>
    `).addTo(map);
});












const setJuntasVecinos = (juntas) => {
    console.log(juntas)
    juntas.forEach((junta) => {
        console.log(junta.unidad_vecinal)
        console.log(junta.direccion)
        getCoordinates(junta.direccion)

        // console.log(Object.entries(getCoordinates(junta.direccion)))

        // console.log(lat, lng)



    })
}

const setClubesDeportivos = (clubes) => {
    // console.log(clubes)
    clubes.forEach((club) => {
        L.marker([getCoordinates(club.direccion)])
            .bindPopup(`
                <li>${club.nombre}</li>
                <li>${club.direccion}</li>
                <li>${club.sector}</li>
                <li>${club.encargado}</li>
                <li>${club.email}</li>
                <li>${club.estado}</li>
            `).addTo(map);
    })
}

const setClubesAdultos = (clubes) => {
    // console.log(clubes)
    clubes.forEach((club) => {
        // console.log(lat, lng)
        L.marker([lat, lng])
            .bindPopup(`
                <li>${club.nombre}</li>
                <li>${club.direccion}</li>
                <li>${club.sector}</li>
                <li>${club.representante}</li>
                <li>${club.email}</li>
                <li>${club.estado}</li>
            `).addTo(map);
    })
}



const getCoordinates = (address) => {
    // console.log(address)
    fetch(`https://nominatim.openstreetmap.org/search?q=${address}&format=json`)
        .then(response => response.json())
        .then(data => {
            // console.log(data[0].lat, data[0].lon)

            let lat = data[0].lat
            let lng = data[0].lon

            let coordinates = { lat, lng }
            console.log(coordinates)
            return coordinates

        })
        .catch(err => console.error(err))
}

function getData(element) {
    console.log('hola funcionó')
    let url = `{{ url('api/${element.id}') }}`;

    fetch(url)
        .then(response => response.json())
        .then(data => {
            if (element.id == 'juntas_vecinos') {
                setJuntasVecinos(data);
            } else if (element.id == 'clubes_deportivos') {
                setClubesDeportivos(data);
            } else if (element.id == 'clubes_adultos') {
                setClubesAdultos(data);
            }
        })
        .catch(err => console.error(err))
}



// window.getData = function (element) {


