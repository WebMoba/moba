@extends('layouts.app')

@section('template_title')
    {{ $quote->name ?? "{{ __('Show') Quote" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Ver') }} Cotización</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('quotes.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Fecha de expedición:</strong>
                            {{ $quote->date_issuance }}
                        </div>
                        <div class="form-group">
                            <strong>Descripción:</strong>
                            {{ $quote->description }}
                        </div>
                        <div class="form-group">
                            <strong>Total:</strong>
                            {{ $quote->total }}
                        </div>
                        <div class="form-group">
                            <strong>Descuento:</strong>
                            {{ $quote->discount }}
                        </div>
                        <div class="form-group">
                            <strong>Estado:</strong>
                            {{ $quote->status }}
                        </div>
                        <div class="form-group">
                            <strong>Persona:</strong>
                            {{ $quote->people_id }}
                        </div>
                        <div class="form-group">
                            <strong>Servicio:</strong>
                            {{ $quote->services_id }}
                        </div>
                        <div class="form-group">
                            <strong>Producto:</strong>
                            {{ $quote->products_id }}
                        </div>
                        <div class="form-group">
                            <strong>Proyecto:</strong>
                            {{ $quote->projects_id }}
                        </div>
                        <div class="form-group">
                            <strong>Cotización:</strong>
                            {{ $quote->quotes_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
