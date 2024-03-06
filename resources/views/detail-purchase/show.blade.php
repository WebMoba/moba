@extends('layouts.app')

@section('template_title')
    {{ $detailPurchase->name ?? __('Show Detail Purchase') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show Detail Purchase') }} </span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('detail_purchases.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
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
                        <div class="form-group">
                            <strong>Nombre de materia prima:</strong>
                            {{ $detailPurchase->materialsRaw->name }}
                        </div>
                        <div class="form-group">
                            <strong>Nombre de compra:</strong>
                            {{ $detailPurchase->purchase->name }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
