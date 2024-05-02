@extends('layouts.app')

@section('template_title')
    {{ __('Editar') }} Categorias 
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default ">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <span class="card-title">{{ __('Editar') }} Categorias </span>
                        <a class="btn btn-primary" href="{{ route('categories-products-service.index') }}"> {{ __('Volver') }}</a>

                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('categories-products-service.update', $categoriesProductsService->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('categories-products-service.form',['mode'=>'Editar'])

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection