@extends('layouts.app')

@section('template_title')
    {{ $sale->name ?? __('mostrar Sale') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Vista') }} Venta</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-danger" href="{{ route('sales.index') }}"> {{ __('Volver') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <div class="form-group">
                                    <strong>Nombre:</strong>
                                    {{ $sale->person->name }}
                                    </div>
                                </tr>
                                <tr>
                                    <div class="form-group">
                                    <strong>Id Cliente:</strong>
                                    {{ $sale->person->id_card }}
                                    </div>
                                </tr>
                                <tr>
                                    <div class="form-group">
                                    <strong>Fecha:</strong>
                                    {{ $sale->date }}
                                </div>
                                </tr>
                                
                                <tr>
                                    <div class="form-group">
                                    <strong>Fecha de Cotización:</strong>
                                    {{ $sale->quote->date_issuance }}
                                    </div>
                                </tr>
                        
                                <tr>
                                    <div class="container ms-1">
                                        <h2><strong>Detalle de la Venta</strong></h2>
                                        @if($detailSale)
                                            <div class="form-group">
                                                <strong>Nombre Producto:</strong>
                                                {{ $detailSale->product->name }}
                                            </div>
                                            <div class="form-group">
                                                <strong>Cantidad:</strong>
                                                {{ $detailSale->quantity }}
                                            </div>
                                            <div class="form-group">
                                                <strong>Precio unitario:</strong>
                                                {{ $detailSale->price_unit }}
                                            </div>
                                            <div class="form-group">
                                                <strong>Subtotal:</strong>
                                                {{ $detailSale->subtotal }}
                                            </div>
                                            <div class="form-group">
                                                <strong>Porcentaje de descuento:</strong>
                                                {{ $detailSale->discount }}
                                            </div>
                                            <div class="form-group">
                                                <strong>Total:</strong>
                                                {{ $detailSale->total }}
                                            </div>
                                        @else
                                            <div class="alert alert-info" role="alert">
                                                No hay detalles asociados a esta venta.
                                            </div>
                                        @endif
                                    </div>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
