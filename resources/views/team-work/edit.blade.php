@extends('layouts.app')

@section('template_title')
    {{ __('Update') }} Team Work
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Actualizar') }} equipo de trabajo</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('team-works.update', $teamWork->id) }}" role="form"
                            enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf
                            <div class="box box-info padding-1">
                                <div class="box-body">
                                    <div class="form-group">
                                        {{ Form::label('Especialidad', null, ['class' => 'required']) }}
                                        {{ Form::text('specialty', $teamWork->specialty, ['class' => 'form-control' . ($errors->has('specialty') ? ' is-invalid' : ''), 'required']) }}
                                        {!! $errors->first('specialty', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>

                                    <div class="form-group">
                                        {{ Form::label('Trabajo asignado', null, ['class' => 'required']) }}
                                        {{ Form::text('assigned_work', $teamWork->assigned_work, ['class' => 'form-control' . ($errors->has('date') ? ' is-invalid' : ''), 'required']) }}
                                        {!! $errors->first('assigned_work', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>

                                    <div class="form-group">
                                        {{ Form::label('Fecha asignada', null, ['class' => 'required']) }}
                                        {{ Form::date('assigned_date', optional($teamWork->assigned_date)->format('Y-m-d'), ['class' => 'form-control' . ($errors->has('assigned_date') ? ' is-invalid' : ''), 'required', 'id' => 'assigned_date', 'min' => now()->format('Y-m-d')]) }}
                                        {!! $errors->first('assigned_date', '<div class="invalid-feedback">:message</div>') !!}

                                        <small class="text-muted">Por cuestiones de seguridad este campo no es
                                            editable.</small>
                                    </div>

                                    <div class="form-group">
                                        {{ Form::label('Proyecto', null, ['class' => 'required']) }}
                                        {{ Form::select('projects_id', $projects, $teamWork->projects_id, ['class' => 'form-control' . ($errors->has('projects_id') ? ' is-invalid' : ''), 'required']) }}
                                        {!! $errors->first('projects_id', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                    <br>
                                </div>
                                <div class="box-footer mt20">
                                    <button type="submit" class="btn btn-success">{{ __('Enviar') }}</button>
                                    <a type="submit" class="btn btn-primary"
                                        href="{{ route('team-works.index') }}">Volver</a>
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
