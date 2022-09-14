@extends('layouts.app')

@section('template_title')
    Update Club Adultos
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-7">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Update Club Adultos</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('clubes_adultos.update', $clubAdultos->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('club-adultos.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
