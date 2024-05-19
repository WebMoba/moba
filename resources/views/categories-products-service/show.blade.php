@extends('layouts.app')

@section('template_title')
    {{ $categoriesProductsService->name ?? __('Mostrar Categories Products Service') }}
@endsection

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Mostrar Categoria'])
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Mostrar') }} Categorias</span>
                        </div>
                    </div>
                    <div class="card-body">

                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $categoriesProductsService->name }}
                        </div>
                        <div class="form-group">
                            <strong>Descripcion:</strong>
                            {{ $categoriesProductsService->description }}
                        </div>
                        <div class="form-group">
                            <strong>Estado:</strong>
                            {{ $categoriesProductsService->status }}
                        </div>
                        <div class="form-group">
                            <strong>Cantidad:</strong>
                            {{ $categoriesProductsService->quantity }}
                        </div>
                        <div class="form-group">
                            <strong>Popularidad:</strong>
                            {{ $categoriesProductsService->popular }}
                        </div>
                        <div class="form-group">
                            <strong>Tipo:</strong>
                            {{ $categoriesProductsService->type }}
                        </div>
                        <a class="btn btn-primary" href="{{ route('categories-products-service.index') }}"><i
                                class="bi bi-arrow-left-circle"></i><span class="tooltiptext">Volver</span></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('layouts.footers.auth.footer')
@endsection
