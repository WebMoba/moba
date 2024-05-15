<small class="text-right">Los campos indicados con <span style="color: red;">*</span> son obligatorios</small>

<div class="box box-info padding-1">
    <div class="box-body">
        <div class="form-group col-md-8">
            {{ Form::label('Nombre', null, ['class' => 'required']) }}
            {{ Form::text('name', $project->name, ['class' => 'form-control' . ($errors->has('name') ? 'is-invalid' : '')]) }}
            {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group col-md-8">
            {{ Form::label('Descripción', null, ['class' => 'required']) }}
            {{ Form::text('description', $project->description, ['id' => 'Descripción', 'class' => 'form-control' . ($errors->has('description') ? ' is-invalid' : '')]) }}
            {!! $errors->first('description', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group col-md-8">
            {{ Form::label('Fecha de inicio', null, ['class' => 'required']) }}
            {{ Form::date('date_start', optional($project->date_start)->format('Y-m-d'), ['class' => 'form-control' . ($errors->has('date_start') ? ' is-invalid' : ''), 'required', 'id' => 'date_start', 'min' => now()->format('Y-m-d')]) }}
            {!! $errors->first('date_start', '<div class="invalid-feedback">:message</div>') !!}

            <small class="text-muted">Por cuestiones de seguridad este campo no es editable.</small>
        </div>

        <div class="form-group col-md-8">
            {{ Form::label('Fecha de finalización', null, ['class' => 'required']) }}
            {{ Form::date('date_end', optional($project->date_end)->format('Y-m-d'), ['class' => 'form-control' . ($errors->has('date_end') ? ' is-invalid' : ''), 'required', 'id' => 'date_end', 'min' => optional($project->date_start)->format('Y-m-d') ?: now()->format('Y-m-d')]) }}
            {!! $errors->first('date_end', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group col-md-8">
            {{ Form::label('Estado', null, ['class' => 'required']) }}
            {{ Form::select('status', ['en curso' => 'En Curso', 'finalizado' => 'Finalizado', 'pausado' => 'Pausado', 'pendiente' => 'Pendiente'], isset($project->status) ? $project->status : old('status'), ['id' => 'Estado', 'class' => 'form-control' . ($errors->has('status') ? ' is-invalid' : ''), 'required' => 'required']) }}
            {!! $errors->first('status', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <br>
    </div>
    <div class="box-footer mt20 my-2">
        @if ($editing)
            {{ Form::button('<i class="bi bi-pencil-square"></i>', ['type' => 'submit', 'class' => 'btn btn-success', 'id' => 'editButton']) }}
        @else
            {{ Form::button('<i class="bi bi-plus-circle"></i>', ['type' => 'submit', 'class' => 'btn btn-success', 'id' => 'createButton']) }}
        @endif
        <a class="btn btn-primary" href="{{ route('projects.index') }}"><i class="bi bi-arrow-left-circle"></i></a>
    </div>

</div>
<style>
    .required::after {
        content: "*";
        color: red;
        margin-left: 4px;
    }

    .text-right {
        float: right;
        margin-top: -8px;
        /* Ajusta según sea necesario para alinear verticalmente con el formulario */
    }
</style>

@extends('layouts.alerts')
