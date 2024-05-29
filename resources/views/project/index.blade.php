@extends('layouts.app')
@if (Session::has('msj'))
    {{ Session::get('msj') }}
@endif
@section('template_title')
    Project
@endsection

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Proyectos'])
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-11 mx-auto">
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
                                    <button type="submit" class="btn btn-primary btn-sm"><i
                                            class="bi bi-search"></i>  <span class="tooltiptext">Buscar</span></button>
                                </div>
                            </form>
                            <div class="float-right">
                                <a href="{{ route('pdf.project') }}" class="btn btn-danger btn-sm float-right">
                                    <i class="bi bi-file-pdf-fill"></i><span class="tooltiptext">Pdf</span>
                                </a>

                                <a href="{{ route('excel.project') }}" class="btn btn-success btn-sm float-right">
                                    <i class="bi bi-file-earmark-excel-fill"></i><span class="tooltiptext">Excel</span>
                                </a>
                            </div>
                            <div class="float-right">
                                <a href="{{ route('projects.create') }}" class="btn btn-success" data-placement="left">
                                    <i class="bi bi-plus-circle"></i><span class="tooltiptext">Crear</span>
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
                        <div class="table-responsive text-center">
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
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $project->name }}</td>
                                            <td>{{ $project->description }}</td>
                                            <td>{{ $project->date_start }}</td>
                                            <td>{{ $project->date_end }}</td>
                                            <td>{{ $project->status }}</td>
                                            <td>
                                                <form class="frData" action="{{ route('projects.destroy', $project->id) }}"
                                                    method="POST" data-disable="{{ $project->disable }}">
                                                    <a class="btn btn-sm btn-primary {{ $project->disable ? 'disabled' : '' }}"
                                                        href="{{ route('projects.show', $project->id) }}"> <i
                                                            class="bi bi-eye-fill"></i><span class="tooltiptext">Mostrar</span></a>
                                                    <a class="btn btn-sm btn-success {{ $project->disable ? 'disabled' : '' }}"
                                                        href="{{ route('projects.edit', $project->id) }}"><i
                                                            class="bi bi-pencil-square"></i><span class="tooltiptext">Editar</span></a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm">
                                                        {!! $project->disable ? '<i class="bi bi-check-circle-fill"></i>' : '<i class="bi bi-x-circle"></i>' !!}
                                                    </button>
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
    <style>
        th, td{
            text-align: center;
        }
    </style>
    @include('layouts.footers.auth.footer')
@endsection

@extends('layouts.alerts')
