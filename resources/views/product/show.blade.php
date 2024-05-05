@extends('layouts.app')

@section('template_title')
    {{ $product->name ?? __('Mostrar Productos') }}
@endsection

@section('content')
@include('layouts.navbars.auth.topnav', ['title' => 'Menu'])
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="card-title">{{ __('Mostrar Productos') }}</span>
                            <a class="btn btn-primary" href="{{ route('product.index') }}">{{ __('Volver') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $product->name }}
                        </div>
                        <div class="form-group">
                            <strong>Imagen:</strong>
                            <img src="{{ asset('storage/' . $product->image) }}" width="150" height="150">
                        </div>
                        <div class="form-group">
                            <strong>Cantidad:</strong>
                            {{ $product->quantity }}
                        </div>
                        <div class="form-group">
                            <strong>Precio:</strong>
                            {{ $product->price }}
                        </div>
                        <div class="form-group">
                            <strong>Unidades:</strong>
                            {{ $product->unit->unit_type }}
                        </div>
                        <div class="form-group">
                            <strong>Categoria:</strong>
                            {{ $product->categoriesProductsService->name }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
