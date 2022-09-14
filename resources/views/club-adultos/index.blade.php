@extends('layouts.app')

@section('template_title')
    Club Adultos
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Club Adultos') }}
                            </span>

                            <div class="float-right">
                                <a href="{{ route('clubes_adultos.create') }}" class="btn btn-primary btn-sm float-right"
                                    data-placement="left">
                                    {{ __('Create New') }}
                                </a>
                            </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>

                                        <th>Nombre</th>
                                        <th>Direccion</th>
                                        <th>Sector</th>
                                        <th>Representante</th>
                                        <th>Email</th>
                                        <th>Estado</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($clubesAdultos as $clubAdultos)
                                        <tr>
                                            <td>{{ ++$i }}</td>

                                            <td>{{ $clubAdultos->nombre }}</td>
                                            <td>{{ $clubAdultos->direccion }}</td>
                                            <td>{{ $clubAdultos->sector }}</td>
                                            <td>{{ $clubAdultos->representante }}</td>
                                            <td>{{ $clubAdultos->email }}</td>
                                            <td>{{ $clubAdultos->estado }}</td>

                                            <td>
                                                <form action="{{ route('clubes_adultos.destroy', $clubAdultos->id) }}"
                                                    method="POST">
                                                    <a class="btn btn-sm btn-primary "
                                                        href="{{ route('clubes_adultos.show', $clubAdultos->id) }}"><i
                                                            class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success"
                                                        href="{{ route('clubes_adultos.edit', $clubAdultos->id) }}"><i
                                                            class="fa fa-fw fa-edit"></i> Edit</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i
                                                            class="fa fa-fw fa-trash"></i> Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $clubesAdultos->links() !!}
            </div>
        </div>
    </div>
@endsection
