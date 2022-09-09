// import * as L from 'leaflet';
// import 'leaflet.markercluster';

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




const btnContainer = document.getElementById("v-pills-tab");

const mapID = document.getElementById('map');
const mapContainer = document.getElementById('map-container');

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
    minZoom: 8,
    updateWhenIdle: true,
    reuseTiles: true,
}).addTo(map);

let layerGroup = L.layerGroup().addTo(map);




// Add markers

btnContainer.querySelectorAll(".active").forEach(element => {
    element.addEventListener("active", e => {
        const id = e.target.getAttribute("id");
        console.log("Se ha clickeado el id " + id);
    });
});


window.onload = () => btnContainer.firstElementChild.click();

btnContainer.addEventListener('click', e => {
    loadData(e.target)
})



function loadData(element) {
    // let url = `{{ url('api/${element.id}') }}`;
    let url = window.location.origin + `/api/${element.id}`;

    fetch(url)
        .then(response => response.json())
        .then(data => {
            layerGroup.clearLayers()

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


async function loadAddress(address) {
    const response = await fetch(`https://nominatim.openstreetmap.org/search?q=${address}&format=json`)
    return await response.json()
}

const getCoordinates = async (address) => {
    const data = await loadAddress(address)
    const {
        lat,
        lon
    } = data[0]
    return [lat, lon]
}



const setJuntasVecinos = (juntas) => {
    juntas.forEach((junta) => {
        getCoordinates(junta.direccion).then((coordinates) => {
            L.marker(coordinates)
                .bindPopup(`
                   <b>${junta.unidad_vecinal}</b><br>
                   ${junta.direccion}<br>
                   ${junta.sector}<br>
                   ${junta.representante}<br>
                   ${junta.email}<br>
                   ${junta.horario}
                `)
                .addTo(layerGroup);
        })
    })
}

const setClubesDeportivos = (clubes) => {
    clubes.forEach((club) => {
        getCoordinates(club.direccion).then((coordinates) => {
            L.marker(coordinates)
                .bindPopup(`
                   <b>${club.nombre}</b><br>
                   ${club.direccion}<br>
                   ${club.sector}<br>
                   ${club.encargado}<br>
                   ${club.email}<br>
                   ${club.estado}
                `)
                .addTo(layerGroup);
        })
    })
}

const setClubesAdultos = (clubes) => {
    clubes.forEach((club) => {
        getCoordinates(club.direccion).then((coordinates) => {
            L.marker(coordinates)
                .bindPopup(`
                    <b>${club.nombre}</b>
                    ${club.direccion}<br>
                    ${club.sector}<br>
                    ${club.representante}<br>
                    ${club.email}<br>
                    ${club.estado}
                `)
                .addTo(layerGroup);
        })
    })
}
