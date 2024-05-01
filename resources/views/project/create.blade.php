@extends('layouts.app')

@section('template_title')
    {{ __('Create') }} Project
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Crear') }} Proyecto</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('projects.store') }}" role="form"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="box box-info padding-1">
                                <div class="box-body">
                                    <div class="form-group">
                                        {{ Form::label('Nombre', null, ['class' => 'required']) }}
                                        {{ Form::text('name', $project->name, ['class' => 'form-control' . ($errors->has('name') ? 'is-invalid' : ''), 'required']) }}
                                        {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>

                                    <div class="form-group">
                                        {{ Form::label('Descripción', null, ['class' => 'required']) }}
                                        {{ Form::text('description', $project->description, ['id' => 'Descripción', 'class' => 'form-control' . ($errors->has('description') ? ' is-invalid' : ''), 'required']) }}
                                        {!! $errors->first('description', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>

                                    <div class="form-group">
                                        {{ Form::label('Fecha de inicio', null, ['class' => 'required']) }}
                                        {{ Form::date('date_start', optional($project->date_start)->format('Y-m-d'), ['class' => 'form-control' . ($errors->has('date_start') ? ' is-invalid' : ''), 'required', 'id' => 'date_start', 'min' => now()->format('Y-m-d')]) }}
                                        {!! $errors->first('date_start', '<div class="invalid-feedback">:message</div>') !!}

                                        <small class="text-muted">Por cuestiones de seguridad este campo no es
                                            editable.</small>
                                    </div>

                                    <div class="form-group">
                                        {{ Form::label('Fecha de finalización', null, ['class' => 'required']) }}
                                        {{ Form::date('date_end', optional($project->date_end)->format('Y-m-d'), ['class' => 'form-control' . ($errors->has('date_end') ? ' is-invalid' : ''), 'required', 'id' => 'date_end', 'min' => optional($project->date_start)->format('Y-m-d') ?: now()->format('Y-m-d')]) }}
                                        {!! $errors->first('date_end', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>

                                    <div class="form-group">
                                        {{ Form::label('Estado', null, ['class' => 'required']) }}
                                        {{ Form::select('status', ['en curso' => 'En Curso', 'finalizado' => 'Finalizado', 'pausado' => 'Pausado', 'pendiente' => 'Pendiente'], isset($project->status) ? $project->status : old('status'), ['id' => 'Estado', 'class' => 'form-control' . ($errors->has('status') ? ' is-invalid' : ''), 'required' => 'required']) }}
                                        {!! $errors->first('status', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                    <br>
                                </div>
                                <div class="box-footer mt20">
                                    <button type="submit" class="btn btn-success">{{ __('Crear') }}</button>
                                    <a type="submit" class="btn btn-primary"
                                        href="{{ route('projects.index') }}">Volver</a>
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
