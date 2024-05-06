@extends('layouts.app')

@section('template_title')
    {{ $project->name ?? __('Show Project') }}
@endsection

@section('content')
@include('layouts.navbars.auth.topnav', ['title' => 'Menu'])
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Ver') }} Projecto</span>
                        </div>
                        <div class="float-left">
                            <a class="btn btn-primary" href="{{ route('projects.index') }}"> {{ __('Volver') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th>Nombre:</th>
                                    <td>{{ $project->name }}</td>
                                </tr>
                                <tr>
                                    <th>Descripción:</th>
                                    <td>{{ $project->description }}</td>
                                </tr>

                                <tr>
                                    <th>Fecha de inicio:</th>
                                    <td>{{ $project->date_start }}</td>
                                </tr>

                                <tr>
                                    <th>Fecha de finalización:</th>
                                    <td>{{ $project->date_end }}</td>
                                </tr>

                                <tr>
                                    <th>Estado:</th>
                                    <td>{{ $project->status }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
