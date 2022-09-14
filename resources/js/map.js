import 'leaflet';
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



const mapID = document.getElementById('map');

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

const layerGroup = L.layerGroup().addTo(map);





export function addMarker(address) {
    getCoordinates(address).then((coordinates) => {
        layerGroup.clearLayers()
        L.marker(coordinates, {
            draggable: true,
            autoPan: true,
            // ondragend: (e) => {
            //     console.log(e.target.getLatLng())
            // }

        }).addTo(layerGroup);
    })
}



export function loadData(element) {
    // let url = `{{ url('api/${element.id}') }}`;
    let url = `${window.location.origin}/api/${element.id}`;

    fetch(url)
        .then(response => response.json())
        .then(data => {
            data.forEach(item => {
                if (element.id == 'juntas_vecinos') {
                    setJuntasVecinos(item)
                } else if (element.id == 'clubes_deportivos') {
                    setClubesDeportivos(item)
                } else if (element.id == 'clubes_adultos') {
                    setClubesAdultos(item)
                }
            })
        })
        .catch(err => console.error(err))
}



async function loadAddress(address) {
    const response = await fetch(`https://nominatim.openstreetmap.org/search?q=${address}&format=json`)
    return await response.json()
}

const getCoordinates = async (address) => {
    const data = await loadAddress(address)
    const { lat, lon } = data[0]
    return [lat, lon]
}



const setJuntasVecinos = (junta) => {
    layerGroup.clearLayers()

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
}

const setClubesDeportivos = (club) => {
    layerGroup.clearLayers()

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
}

const setClubesAdultos = (club) => {
    layerGroup.clearLayers()

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
}


















// Autocomplete address
export function autocomplete(inp, arr) {

    var currentFocus;

    inp.addEventListener("input", function (e) {
        var a, b, i, val = this.value;

        closeAllLists();

        if (!val) {
            return false;
        }

        currentFocus = -1;

        // const arr = loadAddress(inp);

        a = document.createElement("DIV");
        a.setAttribute("id", `${this.id}-autocomplete-list`);
        a.setAttribute("class", "autocomplete-items");
        this.parentNode.appendChild(a);








        // Object.entries(arr).forEach(([key, value]) => {
        //     b = document.createElement("DIV");
        //     b.innerHTML = "<strong>" + value + "</strong>";
        //     b.innerHTML += "<input type='hidden' value='" + key + "'>";
        //     b.addEventListener("click", function (e) {
        //         inp.value = this.getElementsByTagName("input")[0].value;
        //         direccion.value = this.getElementsByTagName("input")[0].value;
        //         closeAllLists();
        //     });
        //     a.appendChild(b);
        ;



        for (i = 0; i < arr.length; i++) {

            if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {

                b = document.createElement("DIV");
                b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
                b.innerHTML += arr[i].substr(val.length);
                b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
                b.addEventListener("click", function (e) {
                    inp.value = this.getElementsByTagName("input")[0].value;
                    closeAllLists();
                });
                a.appendChild(b);
            }
        }
    });


    inp.addEventListener("keydown", function (e) {

        var x = document.getElementById(`${this.id}-autocomplete-list`);

        if (x) x = x.getElementsByTagName("div");
        if (e.keyCode == 40) {
            currentFocus++;
            addActive(x);
        } else if (e.keyCode == 38) {
            currentFocus--;
            addActive(x);
        } else if (e.keyCode == 13) {
            e.preventDefault();
            if (currentFocus > -1) {
                if (x) x[currentFocus].click();
            }
        }
    });

    function addActive(x) {
        if (!x) return false;
        removeActive(x);
        if (currentFocus >= x.length) currentFocus = 0;
        if (currentFocus < 0) currentFocus = (x.length - 1);
        x[currentFocus].classList.add("autocomplete-active");
    }

    function removeActive(x) {
        for (var i = 0; i < x.length; i++) {
            x[i].classList.remove("autocomplete-active");
        }
    }

    function closeAllLists(elmnt) {
        var x = document.getElementsByClassName("autocomplete-items");
        for (var i = 0; i < x.length; i++) {
            if (elmnt != x[i] && elmnt != inp) {
                x[i].parentNode.removeChild(x[i]);
            }
        }
    }

    document.addEventListener("click", function (e) {
        closeAllLists(e.target);
    });
}
