@extends('layouts.app')

@section('template_title')
    {{ $person->name ?? "{{ __('Show') Person" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <a class="btn btn-primary" href="{{ route('person.index') }}"> {{ __('Volver') }}</a><br><br>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Mostrar') }} Persona</span>
                        </div>
                        <div class="float-right">

                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Identificacion:</strong>
                            {{ $person->id_card }}
                        </div>
                        <div class="form-group">
                            <strong>Direccion:</strong>
                            {{ $person->addres }}
                        </div>
                        <div class="form-group">
                            <strong>Equipo de trabajo:</strong>
                            {{ $person->team_works_id }}
                        </div>
                        <div class="form-group">
                            <strong>Numero Celular:</strong>
                            {{ $person->number_phones_id }}
                        </div>
                        <div class="form-group">
                            <strong>Ciudad:</strong>
                            {{ $person->towns_id }}
                        </div>
                        <div class="form-group">
                            <strong>Usuarios:</strong>
                            {{ $person->users_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
