<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Creando Vinculos') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js', 'resources/sass/welcome.scss'])

    <!-- Styles -->
    <style>
        #map {
            height: 100% !important;
        }
    </style>
</head>

<body class="m-0 vh-100 row justify-content-center align-items-center">
    <div class="w-75 h-75">

        <div class="d-flex align-items-start border border-danger rounded-2 text-light h-75">

            <div class="nav flex-column nav-pills justify-content-center sticky-top bg-white rounded-start w-50 h-100 fs-1"
                id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <button class="nav-link active h-25" id="jjvv-tab" data-bs-toggle="pill"
                    data-bs-target="#jjvv" type="button" role="tab" aria-controls="jjvv"
                    aria-selected="true">Juntas de Vecinos</button>
                <button class="nav-link h-25" id="clubes-deportivos-tab" data-bs-toggle="pill"
                    data-bs-target="#clubes-deportivos" type="button" role="tab" aria-controls="clubes-deportivos"
                    aria-selected="false">Clubes Deportivos</button>
                <button class="nav-link h-25" id="clubes-adultos-tab" data-bs-toggle="pill"
                    data-bs-target="#clubes-adultos" type="button" role="tab" aria-controls="clubes-adultos"
                    aria-selected="false">Clubes de Adultos</button>
                <button class="nav-link h-25" id="lugares-interes-tab" data-bs-toggle="pill"
                    data-bs-target="#lugares-interes" type="button" role="tab" aria-controls="lugares-interes"
                    aria-selected="false" disabled>Lugares de Interés</button>
            </div>

            <div class="tab-content w-75 h-100 p-5 bg-danger" id="v-pills-tabContent">
                <div class="tab-pane fade show active" id="jjvv" role="tabpanel"
                    aria-labelledby="jjvv-tab" tabindex="0">Lorem ipsum dolor sit amet consectetur,
                    adipisicing elit. Dolore, dolorem consectetur asperiores explicabo labore quae nostrum harum earum
                    ratione adipisci. Doloribus voluptate eius delectus non illo fuga facilis voluptatem sequi!
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium similique voluptates odit
                    numquam consequuntur sunt repellat quaerat autem veniam sint, fugit consectetur! Volu accusamus
                    placeat debitis pariatur consectetur facere. Saepe, similique consectetur. Reprehenderit voluptate
                    dolore eius assumenda incidunt temporibus, ab neque facere exercitationem mollitia eum consectetur
                    architecto ratione nulla reiciendis ea tenetur optio consequuntur eveniet maxime molestiae ducimus
                    amet a molestias? Vel voluptatem debitis autem sed nam quibusdam doloribus commodi laborum eius
                    officia? Voluptas obcaecati amet sit, eum vel architecto eveniet reiciendis odit, laborum,
                    cupiditate qui cumque illum error nostrum molestias laboriosam ipsum. Minus nisi veniam cupiditate
                    et ex dicta magnam rerum blanditiis fuga deleniti totam ad veritatis magni non, nam dolores culpa
                    quaerat aliquam nulla modi eius! Quibusdam beatae nihil quaerat sapiente error, excepturi voluptatum
                    molestiae ea nemo magnam sit ipsum molestias hic et impedit, ullam architecto exercitationem
                    doloribus eligendi incidunt iure fugit laudantium temporibus quis! Repudiandae nemo molestias amet
                    saepe ex, eaque quos porro quia, adipisci quasi, labore ut nobis dicta id fugiat! Quisquam
                    laboriosam quasi fugit enim laudantium aspernatur cum distinctio voluptates quas vel voluptatum
                    cupiditate officiis, at nemo accusantium doloribus nobis veritatis consequuntur labore, aliquam
                    saepe. Voluptatem iste blanditiis quas deleniti dolore. Ex, modi quia tenetur voluptate, iste quod
                    nam deleniti ea rerum earum laboriosam. Hic officiis nihil rem corporis ad velit veniam, quasi
                    laboriosam cumque recusandae repellat porro repudiandae odio adipisci nostrum deleniti eligendi
                    dolores saepe praesentium dolorum harum, natus molestias dolorem eaque.</div>
                <div class="tab-pane fade h-100" id="clubes-deportivos" role="tabpanel"
                    aria-labelledby="clubes-deportivos-tab" tabindex="0">
                    <x-maps-leaflet id="map"></x-maps-leaflet>
                </div>
                <div class="tab-pane fade h-100" id="clubes-adultos" role="tabpanel"
                    aria-labelledby="clubes-adultos-tab" tabindex="0">Lorem ipsum dolor sit amet, consectetur
                    adipisicing elit. Voluptatum sint sed ullam
                    ducimus esse enim nobis animi corporis architecto quaerat impedit fuga, exercitationem magni atque
                    sit quasi explicabo laudantium repellat!</div>
                <div class="tab-pane fade h-100" id="lugares-interes" role="tabpanel"
                    aria-labelledby="lugares-interes-tab" tabindex="0">
                    <x-maps-leaflet id="map"></x-maps-leaflet>
                </div>
            </div>

        </div>

    </div>
</body>

</html>
