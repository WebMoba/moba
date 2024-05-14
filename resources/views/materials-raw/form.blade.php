<style>
    .required-label::after {
        content: "*";
        color: red;
        margin-left: 5px;
    }

    .text-right {
        float: right;
        margin-top: -8px;
        /* Ajusta según sea necesario para alinear verticalmente con el formulario */
    }
</style>

<small class="text-right">Los campos indicados con <span style="color: red;">*</span> son obligatorios</small>
<div class="box box-info padding-1">

    <div class="box-body">

        <div class="form-group">
            {{ Form::label('Nombre', null, ['class' => 'required-label']) }}
            {{ Form::text('name', $materialsRaw->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Name']) }}
            {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Cantidad existente', null, ['class' => 'required-label']) }}
            {{ Form::text('existing_quantity', $materialsRaw->existing_quantity, ['class' => 'form-control' . ($errors->has('existing_quantity') ? ' is-invalid' : ''), 'placeholder' => 'Existing Quantity']) }}
            {!! $errors->first('existing_quantity', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Tipo de unidad', null, ['class' => 'required-label']) }}
            {{ Form::select('units_id', $units, $materialsRaw->units_id ?? 'Sin tipo de unidad', ['class' => 'form-control' . ($errors->has('units_id') ? ' is-invalid' : ''), 'placeholder' => 'Seleccione el tipo de unidades']) }}
            {!! $errors->first('units_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20 my-2">
        @if ($editing)
            {{ Form::button('<i class="bi bi-pencil-square"></i>', ['type' => 'submit', 'class' => 'btn btn-success', 'id' => 'editButton']) }}
        @else
            {{ Form::button('<i class="bi bi-plus-circle"></i>', ['type' => 'submit', 'class' => 'btn btn-success', 'id' => 'createButton']) }}
        @endif
        <a class="btn btn-primary" href="{{ route('materials_raws.index') }}"><i class="bi bi-arrow-left-circle"></i></a>
    </div>

</div>

@extends('layouts.alerts')
