<small class="text-right">Los campos indicados con <span style="color: red;">*</span> son obligatorios</small>
<div class="box box-info padding-1">
    
    <div class="box-body">

        <div class="form-group">
            {{ Form::label('Nombre', null, ['class' => 'required']) }}
            {{ Form::text('name', $categoriesProductsService->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : '')]) }}
            {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Descripcion', null, ['class' => 'required']) }}
            {{ Form::text('description', $categoriesProductsService->description, ['class' => 'form-control' . ($errors->has('description') ? ' is-invalid' : '')]) }}
            {!! $errors->first('description', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Estado', null, ['class' => 'required']) }}
            {{ Form::select('status', ['active' => 'Activo', 'inactive' => 'Inactivo'], $categoriesProductsService->status, ['class' => 'form-control' . ($errors->has('status') ? ' is-invalid' : '')]) }}
            {!! $errors->first('status', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Cantidad', null, ['class' => 'required']) }}
            {{ Form::number('quantity', $categoriesProductsService->quantity, ['class' => 'form-control' . ($errors->has('quantity') ? ' is-invalid' : ''), 'min' => 0]) }}
            {!! $errors->first('quantity', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        
        <div class="form-group">
            {{ Form::label('Popular', null, ['class' => 'required']) }}
            {{ Form::select('popular', ['Alta' => 'Alta', 'Media' => 'Media', 'Baja' => 'Baja'], $categoriesProductsService->popular, ['class' => 'form-control' . ($errors->has('popular') ? ' is-invalid' : '')]) }}
            {!! $errors->first('popular', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Tipo', null, ['class' => 'required']) }}
            {{ Form::select('type', ['servicio' => 'Servicio', 'producto' => 'Producto'], $categoriesProductsService->type, ['class' => 'form-control' . ($errors->has('type') ? ' is-invalid' : '')]) }}
            {!! $errors->first('type', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div><br>
    <div class="box-footer mt20 my-2">
        @if ($editing)
            {{ Form::button('<i class="bi bi-pencil-square"></i>', ['type' => 'submit', 'class' => 'btn btn-success', 'id' => 'editButton']) }}
        @else
            {{ Form::button('<i class="bi bi-plus-circle"></i>', ['type' => 'submit', 'class' => 'btn btn-success', 'id' => 'createButton']) }}
        @endif
        <a class="btn btn-primary" href="{{ route('categories-products-service.index') }}"><i class="bi bi-arrow-left-circle"></i></a>
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
