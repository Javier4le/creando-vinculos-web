@extends('layouts.app')

@section('template_title')
    {{ $juntaVecinos->name ?? 'Show Junta Vecinos' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Junta Vecinos</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('juntas_vecinos.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Unidad Vecinal:</strong>
                            {{ $juntaVecinos->unidad_vecinal }}
                        </div>
                        <div class="form-group">
                            <strong>Direccion:</strong>
                            {{ $juntaVecinos->direccion }}
                        </div>
                        <div class="form-group">
                            <strong>Sector:</strong>
                            {{ $juntaVecinos->sector }}
                        </div>
                        <div class="form-group">
                            <strong>Representante:</strong>
                            {{ $juntaVecinos->representante }}
                        </div>
                        <div class="form-group">
                            <strong>Email:</strong>
                            {{ $juntaVecinos->email }}
                        </div>
                        <div class="form-group">
                            <strong>Horario:</strong>
                            {{ $juntaVecinos->horario }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
