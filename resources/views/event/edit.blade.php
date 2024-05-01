@extends('layouts.app')

@section('template_title')
    {{ __('Update') }} Event
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')
                <a class="btn btn-primary" href="{{ route('events.index') }}"> {{ __('Volver') }}</a><br><br>
                <div class="card card-default">
                    <div class="card-header">

                        <span class="card-title">{{ __('Actualizar') }} Evento</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('events.update', $event->id) }}" role="form"
                            enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            <div class="box box-info padding-1">
                                <div class="box-body">

                                    <div class="form-group">
                                        {{ Form::label('Lugar', null, ['class' => 'required']) }}
                                        {{ Form::text('place', $event->place, ['class' => 'form-control' . ($errors->has('place') ? ' is-invalid' : ''), 'placeholder' => 'Lugar']) }}
                                        {!! $errors->first('place', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('Titulo', null, ['class' => 'required']) }}
                                        {{ Form::text('title', $event->title, ['class' => 'form-control' . ($errors->has('title') ? ' is-invalid' : ''), 'placeholder' => 'Titulo']) }}
                                        {!! $errors->first('title', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('Descripcion', null, ['class' => 'required']) }}
                                        {{ Form::text('description', $event->description, ['class' => 'form-control' . ($errors->has('description') ? ' is-invalid' : ''), 'placeholder' => 'Descripcion']) }}
                                        {!! $errors->first('description', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('Fecha Inicio', null, ['class' => 'required']) }}
                                        {{ Form::date('date_start', optional($event->date_start)->format('Y-m-d'), ['class' => 'form-control' . ($errors->has('date_start') ? ' is-invalid' : ''), 'placeholder' => 'Fecha Inicio', 'min' => now()->format('Y-m-d')]) }}
                                        {!! $errors->first('date_start', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('Fecha Final', null, ['class' => 'required']) }}
                                        {{ Form::date('date_end', optional($event->date_end)->format('Y-m-d'), ['class' => 'form-control' . ($errors->has('date_end') ? ' is-invalid' : ''), 'placeholder' => 'Fecha Final', 'min' => optional($event->date_start)->format('Y-m-d') ?: now()->format('Y-m-d')]) }}
                                        {!! $errors->first('date_end', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('Rango importancia', null, ['class' => 'required']) }}
                                        {{ Form::select('importance_range', ['baja' => 'baja', 'media' => 'media', 'alta' => 'alta'], $event->importance_range, ['class' => 'form-control' . ($errors->has('importance_range') ? ' is-invalid' : ''), 'placeholder' => 'Seleccione Rango Importancia']) }}
                                        {!! $errors->first('importance_range', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>

                                </div>
                                <br>
                                <div class="box-footer mt20">
                                    <button type="submit" class="btn btn-primary">{{ __('Crear') }}</button>
                                </div>
                            </div>

                            <style>
                                .required::after {
                                    content: "*";
                                    color: red;
                                    margin-left: 4px;
                                }
                            </style>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
