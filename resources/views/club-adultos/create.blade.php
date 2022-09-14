@extends('layouts.app')

@section('template_title')
    Create Club Adultos
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-7">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Create Club Adultos</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('clubes_adultos.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('club-adultos.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
