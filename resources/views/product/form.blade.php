<small class="text-right">Los campos indicados con <span style="color: red;">*</span> son obligatorios</small>

<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            {{ Form::label('Nombre', null, ['class' => 'required']) }}
            {{ Form::text('name', $product->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : '')]) }}
            {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Imagen', null, ['class' => 'required']) }}
            <br>
            <img id="image-preview" src="#" alt="Vista previa de la imagen"
                style="display: none; width: 150px; height: 150px;">
            {{ Form::file('image', ['class' => 'form-control' . ($errors->has('image') ? ' is-invalid' : ''), 'onchange' => 'previewImage(event)']) }}
            {!! $errors->first('image', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Cantidad', null, ['class' => 'required']) }}
            {{ Form::text('quantity', $product->quantity, ['class' => 'form-control' . ($errors->has('quantity') ? ' is-invalid' : '')]) }}
            {!! $errors->first('quantity', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Precio', null, ['class' => 'required']) }}
            {{ Form::text('price', $product->price, ['class' => 'form-control' . ($errors->has('price') ? ' is-invalid' : '')]) }}
            {!! $errors->first('price', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Unidad', null, ['class' => 'required']) }}
            {{ Form::select('units_id', $units, $product->units_id, ['class' => 'form-control' . ($errors->has('units_id') ? ' is-invalid' : '')]) }}
            {!! $errors->first('units_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Categoria', null, ['class' => 'required']) }}
            {{ Form::select('categories_products_services_id', $categories_products_service, $product->categories_products_services_id, ['class' => 'form-control' . ($errors->has('categories_products_services_id') ? ' is-invalid' : '')]) }}
            {!! $errors->first('categories_products_services_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20 my-2">
        @if ($editing)
            {{ Form::submit(__('Submit'), ['class' => 'btn btn-primary', 'id' => 'editButton']) }}
        @else
            {{ Form::submit(__('Crear'), ['class' => 'btn btn-success', 'id' => 'createButton']) }}
        @endif
        <a class="btn btn-primary" href="{{ route('materials_raws.index') }}">{{ __('Back') }}</a>
    </div>

</div>

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
    .required::after {
        content: "*";
        color: red;
        margin-left: 4px;
    }
</style>
<style>
    #image-preview {
        display: none;
        width: 150px;
        height: 150px;
    }
     .text-right {
        float: right;
        margin-top: -8px;
        /* Ajusta según sea necesario para alinear verticalmente con el formulario */
    }
</style>

@extends('layouts.alerts')
