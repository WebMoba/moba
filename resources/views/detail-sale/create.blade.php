@extends('layouts.app')

@section('template_title')
    {{ __('Create') }} Detail Sale
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Crear nuevo') }} detalle venta</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('detail-sale.store') }}" role="form"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="box box-info padding-1">
                                <div class="box-body">

                                    <div class="form-group">
                                        {{ Form::label('Producto') }}
                                        {{ Form::select('product_name', $products, $detailSale->product_name, ['class' => 'form-control' . ($errors->has('products_name') ? ' is-invalid' : ''), 'placeholder' => 'Seleccione un producto']) }}
                                        {!! $errors->first('product_id', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>



                                    <div class="form-group">
                                        {{ Form::label('Cantidad') }}
                                        {{ Form::text('quantity', $detailSale->quantity, ['class' => 'form-control' . ($errors->has('quantity') ? ' is-invalid' : ''), 'placeholder' => 'Cantidad']) }}
                                        {!! $errors->first('quantity', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('Precio Unidad') }}
                                        {{ Form::text('price_unit', $detailSale->price_unit, ['class' => 'form-control' . ($errors->has('price_unit') ? ' is-invalid' : ''), 'placeholder' => 'Precio Unidad']) }}
                                        {!! $errors->first('price_unit', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('Subtotal') }}
                                        {{ Form::text('subtotal', $detailSale->subtotal, ['class' => 'form-control' . ($errors->has('subtotal') ? ' is-invalid' : ''), 'placeholder' => 'Subtotal']) }}
                                        {!! $errors->first('subtotal', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('Descuento') }}
                                        {{ Form::text('discount', $detailSale->discount, ['class' => 'form-control' . ($errors->has('discount') ? ' is-invalid' : ''), 'placeholder' => 'Descuento']) }}
                                        {!! $errors->first('discount', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('Total') }}
                                        {{ Form::text('total', $detailSale->total, ['class' => 'form-control' . ($errors->has('total') ? ' is-invalid' : ''), 'placeholder' => 'Total']) }}
                                        {!! $errors->first('total', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('Id Venta') }}
                                        {{ Form::text('sales_id', $detailSale->sales_id, ['class' => 'form-control' . ($errors->has('sales_id') ? ' is-invalid' : ''), 'placeholder' => 'Id Venta']) }}
                                        {!! $errors->first('sales_id', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>



                                    <div class="box-footer mt20 my-2">
                                        @if ($confirm)
                                            <button type="submit" class="btn btn-primary"
                                                onclick="return confirm('¿Está seguro de editar este registro?');">{{ __('Submit') }}</button>
                                        @else
                                            <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
                                        @endif
                                        <a class="btn btn-primary" href="{{ route('sales.index') }}">
                                            {{ __('Back') }}</a>

                                    </div>



                                </div>



                                <script>
                                    document.addEventListener('DOMContentLoaded', function() {
                                        const quantityField = document.getElementById('quantity');
                                        const priceUnitField = document.getElementById('price_unit');
                                        const discountField = document.getElementById('discount');
                                        const subtotalField = document.getElementById('subtotal');
                                        const totalField = document.getElementById('total');

                                        //calcula subtotal y total
                                        function calculateSubtotalAndTotal() {
                                            const quantity = parseFloat(quantityField.value) || 0;
                                            const priceUnit = parseFloat(priceUnitField.value) || 0;
                                            const discount = parseFloat(discountField.value) || 0;

                                            const subtotal = quantity * priceUnit;
                                            const total = subtotal - (subtotal * (discount / 100));

                                            // Muestra los valores en los campos
                                            subtotalField.value = subtotal.toFixed(2);
                                            totalField.value = total.toFixed(2);
                                        }

                                        // Asocia la función al evento de cambio en los campos relevantes
                                        quantityField.addEventListener('input', calculateSubtotalAndTotal);
                                        priceUnitField.addEventListener('input', calculateSubtotalAndTotal);
                                        discountField.addEventListener('input', calculateSubtotalAndTotal);
                                    });
                                </script>


                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
