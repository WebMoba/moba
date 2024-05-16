@extends('layouts.app')

@section('template_title')
    {{ __('Crear') }} Categorias
@endsection

@section('content')
@include('layouts.navbars.auth.topnav', ['title' => 'Agregar Categoria'])
    <section class="content">
        <div class="container"> <!-- Agregar contenedor -->
            <div class="row justify-content-center"> <!-- Alinear el contenido al centro -->
                <div class="col-md-8"> <!-- Eliminar el estilo margin-left -->
                    @includeif('partials.errors')
                    <div class="card card-default">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <span class="card-title">{{ __('Crear') }} Categorias </span>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('categories-products-service.store') }}"  role="form" enctype="multipart/form-data">
                                @csrf
                                @include('categories-products-service.form',['mode'=>'Crear'])
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('layouts.footers.auth.footer')
@endsection