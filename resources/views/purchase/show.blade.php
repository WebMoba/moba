@extends('layouts.app')

@section('template_title')
    {{ $purchase->name ?? __('Show Purchase') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Compra</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('purchases.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Nombre de la compra:</strong>
                            {{ $purchase->name }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha realizacion de la compra:</strong>
                            {{ $purchase->date }}
                        </div>
                        <div class="form-group">
                            <strong>Documento - Dirección del proveedor:</strong>
                            {{ $purchase->person->id_card }}
                        </div>

                        <h2>Detalle de la compra</h2>

                        <div class="form-group">
                            <strong>Nombre de materia prima comprada:</strong>
                            {{ $detailPurchase->materialsRaw->name }}
                        </div>
                        <div class="form-group">
                            <strong>Cantidad:</strong>
                            {{ $detailPurchase->quantity }}
                        </div>
                        <div class="form-group">
                            <strong>Precio unitario:</strong>
                            {{ $detailPurchase->price_unit }}
                        </div>
                        <div class="form-group">
                            <strong>Subtotal:</strong>
                            {{ $detailPurchase->subtotal }}
                        </div>
                        <div class="form-group">
                            <strong>Descuento:</strong>
                            {{ $detailPurchase->discount }}
                        </div>
                        <div class="form-group">
                            <strong>Total:</strong>
                            {{ $detailPurchase->total }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
