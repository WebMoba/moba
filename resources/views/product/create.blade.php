@extends('layouts.app')

@section('template_title')
    {{ __('Crear') }} Producto
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <span class="card-title">{{ __('Crear') }} Producto</span>
                        <a class="btn btn-primary" href="{{ route('product.index') }}">{{ __('Volver') }}</a>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('product.store') }}" role="form"
                            enctype="multipart/form-data">
                            @csrf

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
                                <div class="box-footer mt20">
                                    <button type="submit" class="btn btn-primary"
                                        @if ($mode == 'Editar') onclick="return confirm('¿Está seguro de que desea {{ $mode }} el producto?')" @endif>{{ $mode }}</button>
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
                            </style>



                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
