@extends('layouts.app')

@section('template_title')
    {{ $person->name ?? __('Show Person') }}
@endsection

@section('content')
@include('layouts.navbars.auth.topnav', ['title' => 'Menu'])
    <section class="content container-fluid">
        <a class="btn btn-primary" href="{{ route('person.index') }}"> {{ __('Volver') }}</a><br><br>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Mostrar Persona') }}</span>
                        </div>
                        <div class="float-right">
                            <!-- Aquí puedes agregar contenido adicional en el encabezado si es necesario -->
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
                            {{ $person->teamWork ? $person->teamWork->assigned_work : __('N/A')}}
                        </div>
                        <div class="form-group">
                            <strong>Número Celular:</strong>
                            {{ $person->numberPhone ? $person->numberPhone->number : __('N/A')}}
                        </div>
                        <div class="form-group">
                            <strong>Departamento:</strong>
                            {{ $person->region ? $person->region->name : 'N/A' }}
                        </div>
                        <div class="form-group">
                            <strong>Ciudad:</strong>
                            {{ $person->town->name ?? __('N/A')}}
                        </div>
                        <div class="form-group">
                            <strong>Usuario:</strong>
                            {{ $person->user->email ?? __('N/A') }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection