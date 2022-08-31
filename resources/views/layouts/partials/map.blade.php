@section('styles')

@endsection


<div class="rounded-1" id="map"></div>


@push('scripts')
    <!-- Scripts -->
    @vite(['resources/sass/map.scss'])

    <script>
        let btnContainer = document.getElementById("v-pills-tab");

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

        btnContainer.addEventListener('click', () => {
            // layerGroup.clearLayers()
            getData(event.target)
        })



        function getData(element) {
            let url = `{{ url('api/${element.id}') }}`;

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



        getCoordinates = (address) => {
            // console.log(address)
            fetch(`https://nominatim.openstreetmap.org/search?q=${address}&format=json`)
                .then(response => response.json())
                .then(data => {
                    console.log(data[0].lat, data[0].lon)
                    return [data[0].lat, data[0].lon]
                    // const coordinates = {
                    //     lat: data[0].lat,
                    //     lng: data[0].lon
                    // }

                    // console.log(coordinates)

                    // console.log(data[0].lat)
                    // return data[0].lat
                    // return coordinates;
                    // let coor = [coordinates.lat, coordinates.lng]

                    // return coordinates;
                    // return coor;
                    // return {
                    //     lat: data[0].lat,
                    //     lng: data[0].lon
                    // }

                })
                .catch(err => console.error(err))
        }



        const setJuntasVecinos = (juntas) => {
            juntas.forEach((junta) => {
                fetch(`https://nominatim.openstreetmap.org/search?q=${junta.direccion}&format=json`)
                    .then(response => response.json())
                    .then(data => {
                        L.marker([data[0].lat, data[0].lon])
                            .bindPopup(`
                                <li>${junta.unidad_vecinal}</li>
                                <li>${junta.direccion}</li>
                                <li>${junta.sector}</li>
                                <li>${junta.representante}</li>
                                <li>${junta.email}</li>
                                <li>${junta.horario}</li>
                            `).addTo(layerGroup);
                    })
                    .catch(err => console.error(err))
            })
        }

        const setClubesDeportivos = (clubes) => {
            clubes.forEach((club) => {
                fetch(`https://nominatim.openstreetmap.org/search?q=${club.direccion}&format=jsonv2`)
                    .then(response => response.json())
                    .then(data => {
                        L.marker([data[0].lat, data[0].lon])
                            .bindPopup(`
                                <li>${club.nombre}</li>
                                <li>${club.direccion}</li>
                                <li>${club.sector}</li>
                                <li>${club.encargado}</li>
                                <li>${club.email}</li>
                                <li>${club.estado}</li>
                            `).addTo(layerGroup);
                    })
                    .catch(err => console.error(err))
            })
        }

        const setClubesAdultos = (clubes) => {
            clubes.forEach((club) => {
                fetch(`https://nominatim.openstreetmap.org/search?q=${club.direccion}&format=jsonv2`)
                    .then(response => response.json())
                    .then(data => {
                        L.marker([data[0].lat, data[0].lon])
                            .bindPopup(`
                                <li>${club.nombre}</li>
                                <li>${club.direccion}</li>
                                <li>${club.sector}</li>
                                <li>${club.representante}</li>
                                <li>${club.email}</li>
                                <li>${club.estado}</li>
                            `).addTo(layerGroup);
                    })
                    .catch(err => console.error(err))
            })
        }
    </script>
@endpush
