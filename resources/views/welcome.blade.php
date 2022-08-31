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
            <div class="d-flex align-items-start border shadow rounded-2 text-light h-75">

                <div class="nav flex-column nav-pills justify-content-center sticky-top bg-white rounded-start w-50 h-100 fs-1"
                    id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <button class="nav-link active h-25" id="juntas_vecinos" data-bs-toggle="pill" data-bs-target="#jjvv"
                        type="button" role="tab" aria-controls="jjvv" aria-selected="true" >
                        Juntas de Vecinos
                    </button>
                    <button class="nav-link h-25" id="clubes_deportivos" data-bs-toggle="pill"
                        data-bs-target="#clubes-deportivos" type="button" role="tab" aria-controls="clubes-deportivos"
                        aria-selected="false" >
                        Clubes Deportivos
                    </button>
                    <button class="nav-link h-25" id="clubes_adultos" data-bs-toggle="pill" data-bs-target="#clubes-adultos"
                        type="button" role="tab" aria-controls="clubes-adultos" aria-selected="false"
                        >
                        Clubes de Adultos
                    </button>
                    <button class="nav-link h-25" id="lugares_interes" data-bs-toggle="pill"
                        data-bs-target="#lugares-interes" type="button" role="tab" aria-controls="lugares-interes"
                        aria-selected="false" disabled>
                        Lugares de Interés
                    </button>
                </div>



                <div class="tab-content w-75 h-100 p-5 bg-primary rounded-end" id="v-pills-tabContent">
                    <div class="tab-pane fade show active h-100" id="map-container" role="tabpanel" tabindex="0">

                        @include('layouts.partials.map')

                    </div>


                    <div class="tab-pane fade show active " id="jjvv" role="tabpanel" aria-labelledby="jjvv-tab"
                        tabindex="0">
                        JJVV
                    </div>

                    <div class="tab-pane fade" id="clubes-deportivos" role="tabpanel"
                        aria-labelledby="clubes-deportivos-tab" tabindex="0">
                        Clubes Deportivos
                    </div>

                    <div class="tab-pane fade" id="clubes-adultos" role="tabpanel">
                        Clubes de Adultos
                    </div>

                    <div class="tab-pane fade" id="lugares-interes" role="tabpanel"
                        aria-labelledby="lugares-interes-tab" tabindex="0">
                        Lugares de Interés
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
