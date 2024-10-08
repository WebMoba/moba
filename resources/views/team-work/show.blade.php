@extends('layouts.app')

@section('template_title')
    {{ $teamWork->name ?? __('Show Team Work') }}
@endsection

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Mostrar Equipo de Trabajo'])
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-11 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Ver') }} equipo de trabajo</span>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th>Nombre: </th>
                                    <th>{{ $teamWork->name }}</th>
                                </tr>
                                <div class="form-group">
                                    <strong>Imagen:</strong>
                                    <img src="{{ asset('storage/' . $teamWork->image) }}" width="150" height="150">
                                </div>
                                <tr>
                                    <th>Especialidad:</th>
                                    <td>{{ $teamWork->specialty }}</td>
                                </tr>
                                <tr>
                                    <th>Trabajo asignado:</th>
                                    <td>{{ $teamWork->assigned_work }}</td>
                                </tr>
                                <tr>
                                    <th>Fecha asignada:</th>
                                    <td>{{ $teamWork->assigned_date }}</td>
                                </tr>
                                <tr>
                                    <th>Proyecto:</th>
                                    <td>{{ $teamWork->project->name }}</td>
                                </tr>
                            </tbody>
                        </table>
                        <a type="submit" class="btn btn-primary" href="{{ route('team-works.index') }}"><i
                                class="bi bi-arrow-left-circle"></i><span class="tooltiptext">Volver</span></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('layouts.footers.auth.footer')
@endsection
