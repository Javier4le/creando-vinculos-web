@extends('layouts.app')

@section('template_title')
    {{ $clubDeportivo->name ?? 'Show Club Deportivo' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Club Deportivo</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('clubes_deportivos.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $clubDeportivo->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Direccion:</strong>
                            {{ $clubDeportivo->direccion }}
                        </div>
                        <div class="form-group">
                            <strong>Sector:</strong>
                            {{ $clubDeportivo->sector }}
                        </div>
                        <div class="form-group">
                            <strong>Email:</strong>
                            {{ $clubDeportivo->email }}
                        </div>
                        <div class="form-group">
                            <strong>Actividad:</strong>
                            {{ $clubDeportivo->actividad }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
