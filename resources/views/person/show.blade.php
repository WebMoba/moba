@extends('layouts.app')

@section('template_title')
    {{ $person->name ?? __('Show Person') }}
@endsection

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Mostrar Persona'])
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="card-title">{{ __('Mostrar Persona') }}</span>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Rol:</strong>
                            {{ $person->rol ?? __('N/A') }}
                        </div>

                        <div class="form-group">
                            <strong>Identificación:</strong>
                            {{ $person->identification_type ?? __('N/A') }}
                        </div>

                        <div class="form-group">
                            <strong>ID Card:</strong>
                            {{ $person->id_card ?? __('N/A') }}
                        </div>
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $person->user->name ?? __('N/A') }}
                        </div>
                        <div class="form-group">
                            <strong>Dirección:</strong>
                            {{ $person->addres ?? __('N/A') }}
                        </div>
                        <div class="form-group">
                            <strong>Equipo de trabajo:</strong>
                            {{ $person->teamWork ? $person->teamWork->assigned_work : __('N/A') }}
                        </div>
                        <div class="form-group">
                            <strong>Número Celular:</strong>
                            {{ $person->numberPhone ? $person->numberPhone->number : __('N/A') }}
                        </div>
                        <div class="form-group">
                            <strong>Departamento:</strong>
                            {{ $person->region ? $person->region->name : 'N/A' }}
                        </div>
                        <div class="form-group">
                            <strong>Ciudad:</strong>
                            {{ $person->town->name ?? __('N/A') }}
                        </div>
                        <div class="form-group">
                            <strong>Usuario:</strong>
                            {{ $person->user->email ?? __('N/A') }}
                        </div>
                        <a class="btn btn-primary" href="{{ route('person.index') }}"><i
                                class="bi bi-arrow-left-circle"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
