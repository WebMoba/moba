@extends('layouts.app')

@section('template_title')
    {{ __('Update') }} Categories Products Service
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Update') }} Categories Products Service</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('categories-products-services.update', $categoriesProductsService->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('categories-products-service.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
