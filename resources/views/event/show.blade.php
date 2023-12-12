@extends('layouts.app')

@section('template_title')
    {{ $event->name ?? "{{ __('Show') Event" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <a class="btn btn-primary" href="{{ route('events.index') }}"> {{ __('Volver') }}</a>
                <br>   <br>

                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Mostrar') }} Evento</span>
                        </div>
                        <div class="float-right">

                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Lugar:</strong>
                            {{ $event->place }}
                        </div>
                        <div class="form-group">
                            <strong>Titulo:</strong>
                            {{ $event->title }}
                        </div>
                        <div class="form-group">
                            <strong>Descripcion:</strong>
                            {{ $event->description }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha Inicio:</strong>
                            {{ $event->date_start }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha Final:</strong>
                            {{ $event->date_end }}
                        </div>
                        <div class="form-group">
                            <strong>Rango Importancia:</strong>
                            {{ $event->importance_range }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
