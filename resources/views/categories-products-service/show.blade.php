@extends('layouts.app')

@section('template_title')
    {{ $categoriesProductsService->name ?? "{{ __('Show') Categories Products Service" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Categories Products Service</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('categories-products-service.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $categoriesProductsService->name }}
                        </div>
                        <div class="form-group">
                            <strong>Description:</strong>
                            {{ $categoriesProductsService->description }}
                        </div>
                        <div class="form-group">
                            <strong>Status:</strong>
                            {{ $categoriesProductsService->status }}
                        </div>
                        <div class="form-group">
                            <strong>Quantity:</strong>
                            {{ $categoriesProductsService->quantity }}
                        </div>
                        <div class="form-group">
                            <strong>Popular:</strong>
                            {{ $categoriesProductsService->popular }}
                        </div>
                        <div class="form-group">
                            <strong>Type:</strong>
                            {{ $categoriesProductsService->type }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
