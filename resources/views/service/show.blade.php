@extends('layouts.app')

@section('template_title')
    {{ $service->name ??  __('Mostrar Servicio') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Mostrar') }} Servicio</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('service.index') }}"> {{ __('Volver') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $service->name }}
                        </div>
                        <div class="form-group">
                            <strong>Descripcion:</strong>
                            {{ $service->description }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha de inicio:</strong>
                            {{ $service->date_start }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha de finalizacion:</strong>
                            {{ $service->date_end }}
                        </div>
                        <div class="form-group">
                            <strong>Imagen:</strong>
                            <img src="{{asset('storage/' . $service->image) }}" width='150' height="150">
                        </div>
                        <div class="form-group">
                            <strong>Categorias:</strong>
                            {{ $service->categories_products_services_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
