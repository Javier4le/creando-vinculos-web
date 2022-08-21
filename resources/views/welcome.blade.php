@extends('layouts.app')

@section('template_title')
    Creando Vínculos
@endsection


@section('content')
    <div class="m-0 vh-100 row justify-content-center align-items-center">

        {{-- <div class="row w-25 justify-content-md-center">
            <input id="search" style="width: 350px;" type="text">
            <button type="button" class=" btn btn-primary" id="search-button">Search</button>
        </div>
        <ul id="result-list" class="col-4 list-group"></ul> --}}

        <div class="w-75 h-75">
            <div class="d-flex align-items-start border border-danger rounded-2 text-light h-75">

                <div class="nav flex-column nav-pills justify-content-center sticky-top bg-white rounded-start w-50 h-100 fs-1"
                    id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <button class="nav-link active h-25" id="juntas_vecinos" data-bs-toggle="pill" data-bs-target="#jjvv"
                        type="button" role="tab" aria-controls="jjvv" aria-selected="true"
                        data-href="{{ URL::to('api/juntas_vecinos') }}" onclick="getData(this)">
                        Juntas de Vecinos
                    </button>
                    <button class="nav-link h-25" id="clubes_deportivos" data-bs-toggle="pill"
                        data-bs-target="#clubes-deportivos" type="button" role="tab" aria-controls="clubes-deportivos"
                        aria-selected="false" data-href="{{ URL::to('api/clubes_deportivos') }}" onclick="getData(this)">
                        Clubes Deportivos
                    </button>
                    <button class="nav-link h-25" id="clubes_adultos" data-bs-toggle="pill"
                        data-bs-target="#clubes-adultos" type="button" role="tab" aria-controls="clubes-adultos"
                        aria-selected="false" data-href="{{ URL::to('api/clubes_adultos') }}" onclick="getData(this)">
                        Clubes de Adultos
                    </button>
                    <button class="nav-link h-25" id="lugares_interes" data-bs-toggle="pill"
                        data-bs-target="#lugares-interes" type="button" role="tab" aria-controls="lugares-interes"
                        aria-selected="false" data-href="{{ URL::to('api/juntas_vecinos') }}" disabled>
                        Lugares de Interés
                    </button>
                </div>



                <div class="tab-content w-75 h-100 p-5 bg-danger" id="v-pills-tabContent">
                    <div class="tab-pane fade show active h-100" id="map-container" role="tabpanel" tabindex="0">

                        @include('layouts.partials.map')

                    </div>


                    <div class="tab-pane fade show active h-100" id="jjvv" role="tabpanel" aria-labelledby="jjvv-tab"
                        tabindex="0">
                        JJVV
                    </div>

                    <div class="tab-pane fade h-100" id="clubes-deportivos" role="tabpanel"
                        aria-labelledby="clubes-deportivos-tab" tabindex="0">
                        Clubes Deportivos
                    </div>

                    <div class="tab-pane fade h-100" id="clubes-adultos" role="tabpanel">
                        Clubes de Adultos
                    </div>

                    <div class="tab-pane fade h-100" id="lugares-interes" role="tabpanel"
                        aria-labelledby="lugares-interes-tab" tabindex="0">
                        {{-- <x-maps-leaflet
                            id="map"
                            class="rounded"
                            :centerPoint="['lat' => -33.039, 'long' => -71,591]"
                            :zoomLevel="12"
                            :markers="[['lat' => -33.0391578, 'long' => -71.5913582, 'title' => 'Club Deportivo JJVV']]"
                        ></x-maps-leaflet> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <!-- Scripts -->
    @vite(['resources/sass/welcome.scss', 'resources/js/welcome.js'])

@endpush
