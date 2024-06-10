@extends('layouts.app')

@section('template_title')
    {{ $project->name ?? __('Show Project') }}
@endsection

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Mostrar Proyectos'])
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-11 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Ver') }} Proyecto</span>
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
                                <tr>
                                    <th>Logo:</th>
                                    <td>
                                        @if ($project->logo)
                                            <div class="form-group">
                                                <img src="{{ $project->logo_url }}" alt="Logo" style="max-width: 100%;">
                                            </div>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>Imagenes:</th>
                                    <td> 
                                        <ul>
                                            <li>
                                                @if ($project->imageOne)
                                                    <div class="form-group">
                                                        <img src="{{ $project->imageOne_url }}" alt="Imagen Uno" style="max-width: 100%;">
                                                    </div>
                                                @endif
                                            </li>
                                            <li>
                                                @if ($project->imageTwo)
                                                    <div class="form-group">
                                                        <img src="{{ $project->imageTwo_url }}" alt="Imagen Dos" style="max-width: 100%;">
                                                    </div>
                                                @endif
                                            </li>
                                            <li>
                                                @if ($project->imageThree)
                                                    <div class="form-group">
                                                        <img src="{{ $project->imageThree_url }}" alt="Imagen Tres" style="max-width: 100%;">
                                                    </div>
                                                @endif
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <a class="btn btn-primary" href="{{ route('projects.index') }}"><i
                                class="bi bi-arrow-left-circle"></i><span class="tooltiptext">Volver</span></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('layouts.footers.auth.footer')
@endsection
