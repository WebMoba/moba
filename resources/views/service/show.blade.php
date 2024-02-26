@extends('layouts.app')

@section('template_title')
    {{ $service->name ?? "{{ __('Show') Service" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Service</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('services.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $service->name }}
                        </div>
                        <div class="form-group">
                            <strong>Description:</strong>
                            {{ $service->description }}
                        </div>
                        <div class="form-group">
                            <strong>Date Start:</strong>
                            {{ $service->date_start }}
                        </div>
                        <div class="form-group">
                            <strong>Date End:</strong>
                            {{ $service->date_end }}
                        </div>
                        <div class="form-group">
                            <strong>Image:</strong>
                            {{ $service->image }}
                        </div>
                        <div class="form-group">
                            <strong>Categories Products Services Id:</strong>
                            {{ $service->categories_products_services_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
