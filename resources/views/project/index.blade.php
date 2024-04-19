@extends('layouts.app')
@if (Session::has('msj'))
    {{ Session::get('msj') }}
@endif
@section('template_title')
    Project
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Proyectos') }}
                            </span>
                            <form action="{{ route('projects.index') }}" method="get" class="d-flex align-items-center">
                                <div class="col-auto mr-2">
                                    <input type="text" class="form-control" name="search" id="search"
                                        placeholder="Buscar...">
                                </div>
                                <div class="col-auto">
                                    <button type="submit" class="btn btn-primary btn-sm">Buscar</button>
                                </div>
                            </form>
                            <div class="float-right">
                                <a href="{{ route('pdf.project') }}" class="btn btn-danger btn-sm float-right">
                                    <i class="fa fa-file-pdf"></i> {{ __('PDF') }}
                                </a>

                                <a href="{{ route('excel.project') }}" class="btn btn-success btn-sm float-right">
                                    <i class="fa fa-file-excel"></i> {{ __('Excel') }}
                                </a>
                            </div>
                            <div class="float-right">
                                <a href="{{ route('projects.create') }}" class="btn btn-primary btn-sm float-right"
                                    data-placement="left">
                                    {{ __('Crear nuevo') }}
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
                                        <th>Id</th>
                                        <th>Nombre</th>
                                        <th>Descripción</th>
                                        <th>Fecha de inicio</th>
                                        <th>Fecha de finalización</th>
                                        <th>Estado</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($projects as $project)
                                        <tr>
                                            <td>{{ $project->id }}</td>
                                            <td>{{ $project->name }}</td>
                                            <td>{{ $project->description }}</td>
                                            <td>{{ $project->date_start }}</td>
                                            <td>{{ $project->date_end }}</td>
                                            <td>{{ $project->status }}</td>
                                            <td>
                                                <form action="{{ route('projects.destroy', $project->id) }}"
                                                    method="POST">
                                                    <a class="btn btn-sm btn-primary {{ $project->disable ? 'disabled' : '' }}"
                                                        href="{{ route('quotes.show', $project->id) }}"><i
                                                            class="fa fa-fw fa-eye"></i> {{ __('Ver') }}</a>
                                                    <a class="btn btn-sm btn-success {{ $project->disable ? 'disabled' : '' }}"
                                                        href="{{ route('quotes.edit', $project->id) }}"><i
                                                            class="fa fa-fw fa-edit"></i> {{ __('Editar') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        onclick="return confirm('¿Está seguro de que desea {{ $project->disable ? 'Habilitar' : 'Deshabilitar' }} el proyecto?')"
                                                        class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i>
                                                        {{ $project->disable ? 'Habilitar' : 'Deshabilitar' }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $projects->links() !!}
            </div>
        </div>
    </div>
@endsection
