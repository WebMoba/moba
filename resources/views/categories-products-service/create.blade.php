@extends('layouts.app')

@section('template_title')
    {{ __('Crear') }} Categorias
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <span class="card-title">{{ __('Crear') }} Categorias </span>
                        <a class="btn btn-primary" href="{{ route('categories-products-service.index') }}">
                            {{ __('Volver') }}</a>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('categories-products-service.store') }}" role="form"
                            enctype="multipart/form-data">
                            @csrf

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
                                        {{ Form::text('quantity', $categoriesProductsService->quantity, ['class' => 'form-control' . ($errors->has('quantity') ? ' is-invalid' : '')]) }}
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

                                </div>
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
