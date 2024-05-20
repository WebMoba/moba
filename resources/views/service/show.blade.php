@extends('layouts.app')

@section('template_title')
    {{ $service->name ?? __('Mostrar Servicio') }}
@endsection

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Mostrar Servicio'])
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Mostrar') }} Servicio</span>
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
                            <img src="{{ asset('storage/' . $service->image) }}" width='150' height="150">
                        </div>
                        <div class="form-group">
                            <strong>Categorias:</strong>
                            {{ $service->categories_products_services_id }}
                        </div>
                        <a class="btn btn-primary" href="{{ route('service.index') }}"><i
                                class="bi bi-arrow-left-circle"></i><span class="tooltiptext">Volver</span></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('layouts.footers.auth.footer')
@endsection
