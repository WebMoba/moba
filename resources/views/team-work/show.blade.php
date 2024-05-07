@extends('layouts.app')

@section('template_title')
    {{ $teamWork->name ?? __('Show Team Work') }}
@endsection

@section('content')
@include('layouts.navbars.auth.topnav', ['title' => 'Menu'])
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-10 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Ver') }} equipo de trabajo</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('team-works.index') }}"> {{ __('Volver') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        <table class="table">
                            <tbody>
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
                                        <td>{{ $teamWork->projects_id }}</td>
                                </tr>
                            </tbody>
                        </table>        
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
