<small class="text-right">Los campos indicados con <span style="color: red;">*</span> son obligatorios</small>

<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            {{ Form::label('Nombre', null, ['class' => 'required']) }}
            {{ Form::text('name', $service->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : '')]) }}
            {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Descripcion', null, ['class' => 'required']) }}
            {{ Form::text('description', $service->description, ['class' => 'form-control' . ($errors->has('description') ? ' is-invalid' : '')]) }}
            {!! $errors->first('description', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Fecha Inicio', null, ['class' => 'required']) }}
            {{ Form::date('date_start', optional($service->date_start)->format('Y-m-d'), ['class' => 'form-control' . ($errors->has('date_start') ? ' is-invalid' : ''), 'placeholder' => 'Fecha Inicio', 'min' => now()->format('Y-m-d')]) }}
            {!! $errors->first('date_start', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Fecha Final', null, ['class' => 'required']) }}
            {{ Form::date('date_end', optional($service->date_end)->format('Y-m-d'), ['class' => 'form-control' . ($errors->has('date_end') ? ' is-invalid' : ''), 'placeholder' => 'Fecha Final', 'min' => optional($service->date_start)->format('Y-m-d') ?: now()->format('Y-m-d')]) }}
            {!! $errors->first('date_end', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group">
            {{ Form::label('Imagen', null, ['class' => 'required']) }}
            <br><img id="image-preview" src="#" alt="vista previa de la imagen"
                style="display: none; width: 150px; height: 150px;">
            {{ Form::file('image', ['class' => 'form-control' . ($errors->has('image') ? ' is-invalid' : ''), 'onchange' => 'previewImage(event)']) }}
            {!! $errors->first('image', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Categorias', null, ['class' => 'required']) }}
            {{ Form::select('categories_products_services_id', $categories_products_service, $service->categories_products_services_id, ['class' => 'form-control' . ($errors->has('categories_products_services_id') ? ' is-invalid' : '')]) }}
            {!! $errors->first('categories_products_services_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20 my-2">
        @if ($editing)
            {{ Form::button('<i class="bi bi-pencil-square"></i>', ['type' => 'submit', 'class' => 'btn btn-success', 'id' => 'editButton']) }}
        @else
            {{ Form::button('<i class="bi bi-plus-circle"></i>', ['type' => 'submit', 'class' => 'btn btn-success', 'id' => 'createButton']) }}
        @endif
        <a class="btn btn-primary" href="{{ route('service.index') }}"><i class="bi bi-arrow-left-circle"></i></a>
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
<script>
    function previewImage(event) {
        var input = event.target;
        var preview = document.getElementById('image-preview');

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.style.display = 'block';
            }

            reader.readAsDataURL(input.files[0]);
        } else {
            preview.src = '#';
            preview.style.display = 'none';
        }
    }
</script>
<style>
    #image-preview {
        display: none;
        width: 150px;
        height: 150px;
    }
</style>


@extends('layouts.alerts')
