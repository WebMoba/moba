<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    

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
</head>
<body>
    <small class="text-right">Los campos indicados con <span style="color: red;">*</span> son obligatorios</small>

    <div class="box box-info padding-1">
        <div class="box-body">
            <div class="form-group ">
                {{ Form::label('Primer Nombre', null, ['class' => 'required']) }}
                {{ Form::text('name', $teamWork->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'required']) }}
                {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
            </div>
           
            <div class="form-group">
                {{ Form::label('Imagen', null, ['class' => 'required']) }}
                <br>
                @if ($teamWork->image)
                    <img src="{{ asset('storage/' . $teamWork->image) }}" alt="Imagen actual" style="width: 150px; height: 150px;">
                    <br><br>
                @endif
                <img id="image-preview" alt="Vista previa de la imagen" style="display:none; width: 150px; height: 150px;">
                {{ Form::file('image', ['class' => 'form-control' . ($errors->has('image') ? ' is-invalid' : ''), 'onchange' => 'previewImage(event)']) }}
                {!! $errors->first('image', '<div class="invalid-feedback">:message</div>') !!}
            </div>

            <div class="form-group ">
                {{ Form::label('Especialidad', null, ['class' => 'required']) }}
                {{ Form::text('specialty', $teamWork->specialty, ['class' => 'form-control' . ($errors->has('specialty') ? ' is-invalid' : ''), 'required']) }}
                {!! $errors->first('specialty', '<div class="invalid-feedback">:message</div>') !!}
            </div>

            <div class="form-group ">
                {{ Form::label('Descripción', null, ['class' => 'required']) }}
                {{ Form::textarea('description', $teamWork->description, ['class' => 'form-control' . ($errors->has('description') ? ' is-invalid' : ''), 'required']) }}
                {!! $errors->first('description', '<div class="invalid-feedback">:message</div>') !!}
            </div>

            <div class="form-group ">
                {{ Form::label('Trabajo asignado', null, ['class' => 'required']) }}
                {{ Form::text('assigned_work', $teamWork->assigned_work, ['class' => 'form-control' . ($errors->has('assigned_work') ? ' is-invalid' : ''), 'required']) }}
                {!! $errors->first('assigned_work', '<div class="invalid-feedback">:message</div>') !!}
            </div>

            <div class="form-group col-md-3 ">
                {{ Form::label('Fecha asignada', null, ['class' => 'required']) }}
                {{ Form::date('assigned_date', optional($teamWork->assigned_date)->format('Y-m-d'), ['class' => 'form-control' . ($errors->has('assigned_date') ? ' is-invalid' : ''), 'required', 'id' => 'assigned_date', 'min' => now()->format('Y-m-d')]) }}
                {!! $errors->first('assigned_date', '<div class="invalid-feedback">:message</div>') !!}
            </div>

            <div class="form-group ">
                {{ Form::label('Proyecto', null, ['class' => 'required']) }}
                {{ Form::select('projects_id', $projects, $teamWork->projects_id, ['class' => 'form-control' . ($errors->has('projects_id') ? ' is-invalid' : ''), 'required']) }}
                {!! $errors->first('projects_id', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <br>
        </div>
        <div class="box-footer mt20 my-2">
            @if ($editing)
            <button type="submit" class="btn btn-success" id="editButton" data-bs-toggle="tooltip" title="Editar">
            <i class="bi bi-pencil-square"></i>
            </button>
            @else
            <button type="submit" class="btn btn-success" id="createButton" data-bs-toggle="tooltip" title="Crear">
            <i class="bi bi-plus-circle"></i>
            </button>
            @endif
            <a class="btn btn-primary" href="{{ route('team-works.index') }}"><i class="bi bi-arrow-left-circle"></i><span class="tooltiptext">Volver</span></a>
        </div>
    </div>
</body>

</html>

@extends('layouts.alerts')
