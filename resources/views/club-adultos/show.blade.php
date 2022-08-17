@extends('layouts.app')

@section('template_title')
    {{ $clubAdultos->name ?? 'Show Club Adultos' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Club Adultos</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('clubes_adultos.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $clubAdultos->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Direccion:</strong>
                            {{ $clubAdultos->direccion }}
                        </div>
                        <div class="form-group">
                            <strong>Sector:</strong>
                            {{ $clubAdultos->sector }}
                        </div>
                        <div class="form-group">
                            <strong>Representante:</strong>
                            {{ $clubAdultos->representante }}
                        </div>
                        <div class="form-group">
                            <strong>Email:</strong>
                            {{ $clubAdultos->email }}
                        </div>
                        <div class="form-group">
                            <strong>Actividad:</strong>
                            {{ $clubAdultos->actividad }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
