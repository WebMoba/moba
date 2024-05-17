@extends('layouts.app')

@if (Session::has('msj'))
    {{ Session::get('msj') }}
@endif

@section('template_title')
    Team Work
@endsection

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Equipo de Trabajo'])
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Equipo de trabajo') }}
                            </span>

                            <form action="{{ route('team-works.index') }}" method="get" class="d-flex align-items-center">
                                <div class="col-auto mr-2">
                                    <input type="text" class="form-control" name="search" id="search"
                                        placeholder="Buscar...">
                                </div>
                                <div class="col-auto">
                                    <button type="submit" class="btn btn-primary btn-sm"><i
                                            class="bi bi-search"></i></button>
                                </div>
                            </form>
                            <div class="float-right">
                                <a href="{{ route('pdf.teamwork') }}" class="btn btn-danger btn-sm float-right">
                                    <i class="bi bi-file-pdf-fill"></i>
                                </a>

                                <a href="{{ route('excel.teamwork') }}" class="btn btn-success btn-sm float-right">
                                    <i class="bi bi-file-earmark-excel-fill"></i>
                                </a>
                            </div>
                            <div class="float-right">
                                <a href="{{ route('team-works.create') }}" class="btn btn-success" data-placement="left">
                                    <i class="bi bi-plus-circle"></i>
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
                                        <th>Especialidad</th>
                                        <th>Trabajo asignado</th>
                                        <th>Fecha asignada</th>
                                        <th>Proyecto</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($teamWorks as $teamWork)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $teamWork->specialty }}</td>
                                            <td>{{ $teamWork->assigned_work }}</td>
                                            <td>{{ $teamWork->assigned_date }}</td>
                                            <td>{{ $teamWork->project->name }}</td>
                                            <td>
                                                <form class="frData"
                                                    action="{{ route('team-works.destroy', $teamWork->id) }}"
                                                    method="POST" data-disable="{{ $teamWork->disable }}">
                                                    <a class="btn btn-sm btn-primary {{ $teamWork->disable ? 'disabled' : '' }}"
                                                        href="{{ route('team-works.show', $teamWork->id) }}"><i
                                                            class="bi bi-eye-fill"></i></a>
                                                    <a class="btn btn-sm btn-success {{ $teamWork->disable ? 'disabled' : '' }}"
                                                        href="{{ route('team-works.edit', $teamWork->id) }}"> <i
                                                            class="bi bi-pencil-square"></i></a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm">
                                                        {!! $teamWork->disable ? '<i class="bi bi-check-circle-fill"></i>' : '<i class="bi bi-x-circle"></i>' !!}
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
                {!! $teamWorks->links() !!}
            </div>
        </div>
    </div>
    @include('layouts.footers.auth.footer')
@endsection

@extends('layouts.alerts')
