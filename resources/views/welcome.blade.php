@extends('layouts.app')

@section('template_title')
    Creando Vínculos
@endsection


@section('content')

        {{-- <div class="row w-25 justify-content-md-center">
            <input id="search" style="width: 350px;" type="text">
            <button type="button" class=" btn btn-primary" id="search-button">Search</button>
        </div>
        <ul id="result-list" class="col-4 list-group"></ul> --}}


        {{-- <div class="container-fluid shadow"> --}}

            <div class="row text-light bg-back rounded" style="min-height: 75vh;">

                <div class="col-4">
                    <div class="nav h-100 flex-column nav-pills  rounded-start fs-1" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <button class="nav-link active h-25" id="juntas_vecinos" data-bs-toggle="pill" href="#jjvv" aria-controls="jjvv" aria-selected="true" >
                            Juntas de Vecinos
                        </button>
                        <button class="nav-link h-25" id="clubes_deportivos" data-bs-toggle="pill" href="#clubes-deportivos" aria-controls="clubes-deportivos" aria-selected="false" >
                            Clubes Deportivos
                        </button>
                        <button class="nav-link h-25" id="clubes_adultos" data-bs-toggle="pill" href="#clubes-adultos" aria-controls="clubes-adultos" aria-selected="false">
                            Clubes de Adultos
                        </button>
                        <button class="nav-link h-25" id="lugares_interes" data-bs-toggle="pill" href="#lugares-interes" aria-controls="lugares-interes" aria-selected="false" disabled>
                            Lugares de Interés
                        </button>
                    </div>
                </div>


                <div class="col-8" id="v-pills-tabContent">
                    <div class="tab-content h-100 p-5 bg-item rounded-end">
                        <div class="tab-pane fade show active h-100" id="map-container" role="tabpanel" tabindex="0">
                            @include('layouts.partials.map')
                        </div>

                        <div class="tab-pane fade show active" id="jjvv" role="tabpanel" aria-labelledby="jjvv-tab"
                            tabindex="0">
                            {{-- JJVV --}}
                        </div>
                        <div class="tab-pane fade" id="clubes-deportivos" role="tabpanel"
                            aria-labelledby="clubes-deportivos-tab" tabindex="0">
                            {{-- Clubes Deportivos --}}
                        </div>
                        <div class="tab-pane fade" id="clubes-adultos" role="tabpanel">
                            {{-- Clubes de Adultos --}}
                        </div>
                        <div class="tab-pane fade" id="lugares-interes" role="tabpanel"
                            aria-labelledby="lugares-interes-tab" tabindex="0">
                            {{-- Lugares de Interés --}}
                        </div>
                    </div>
                </div>

            </div>
        {{-- </div> --}}

@endsection

@push('scripts')
    <!-- Scripts -->
    @vite(['resources/sass/welcome.scss', 'resources/js/welcome.js'])

@endpush
