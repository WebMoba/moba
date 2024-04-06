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
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $sale->name }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha:</strong>
                            {{ $sale->date }}
                        </div>
                        <div class="form-group">
                            <strong>Id Persona:</strong>
                            {{ $sale->people_id }}
                        </div>
                        <div class="form-group">
                            <strong>Id Cotización:</strong>
                            {{ $sale->quotes_id }}
                        </div>

                  



                                <h2> <strong> Detalle de la Venta</strong></h2>

                                <div class="form-group">
                                    <strong>Nombre Producto:</strong>
                                    {{ $detailSale->products_id }}
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

                                <div class="form-group">
                                    <strong>Nombre Producto:</strong>
                                    {{ $detailSale->products_id }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
