@extends('layouts.app')

@section('template_title')
    {{ $detailSale->name ?? "{{ __('Show') Detail Sale" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Detail Sale</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-danger" href="{{ route('detail-sale.index') }}"> {{ __('Volver') }}</a>
                            
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Cantidad:</strong>
                            {{ $detailSale->quantity }}
                        </div>
                        <div class="form-group">
                            <strong>Precio Unidad:</strong>
                            {{ $detailSale->price_unit }}
                        </div>
                        <div class="form-group">
                            <strong>Subtotal:</strong>
                            {{ $detailSale->subtotal }}
                        </div>
                        <div class="form-group">
                            <strong>Descuento:</strong>
                            {{ $detailSale->discount }}
                        </div>
                        <div class="form-group">
                            <strong>Total:</strong>
                            {{ $detailSale->total }}
                        </div>
                        <div class="form-group">
                            <strong>Venta Id:</strong>
                            {{ $detailSale->sales_id }}
                        </div>
                        <div class="form-group">
                            <strong>Producto Id:</strong>
                            {{ $detailSale->products_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
