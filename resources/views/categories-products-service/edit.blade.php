@extends('layouts.app')

@section('template_title')
    {{ __('Editar') }} Categorias 
@endsection

@section('content')
@include('layouts.navbars.auth.topnav', ['title' => 'Editar Categoria'])
    <section class="content container-fluid">
    <div class="container"> <!-- Agregar contenedor -->
            <div class="row justify-content-center"> 
            <div class="col-md-8">

                @includeif('partials.errors')
                <div class="card card-default ">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <span class="card-title">{{ __('Editar') }} Categorias </span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('categories-products-service.update', $categoriesProductsService->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf
                            @include('categories-products-service.form', ['mode'=>'Editar'])
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>
@endsection