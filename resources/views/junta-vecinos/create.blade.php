@extends('layouts.app')

@section('template_title')
    Create Junta Vecinos
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-7">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Create Junta Vecinos</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('juntas_vecinos.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('junta-vecinos.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
