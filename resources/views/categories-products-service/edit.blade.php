@extends('layouts.app')

@section('template_title')
    {{ __('Editar') }} Categorias 
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Editar') }} Categorias </span>
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
