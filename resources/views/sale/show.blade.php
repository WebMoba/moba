@extends('layouts.app')

@section('template_title')
    {{ $sale->name ?? __('mostrar Sale') }}
@endsection

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Mostrar Venta'])
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Vista') }} Venta</span>
                        </div>
                    </div>
                    <div class="card-body">
                        <h2>Venta</h2>
                        <div class="form-group">
                            <strong>Nombre del proveedor:</strong>
                            {{ $sale->name }}
                        </div>
                        <div class="form-group">
                            <strong>Documento del Cliente:</strong>
                            {{ $sale->person->id_card }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha realizacion de la venta:</strong>
                            {{ $sale->date }}
                        </div>
                        <div class="form-group">
                            <strong>Total de la venta:</strong>
                            {{ $sale->total }}
                        </div>
                        <h2>Detalles de la venta</h2>
                        @if ($details->count())
                            <div class="form-group">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>'#'</th>
                                            <th>Cantidad</th>
                                            <th>Precio unitario</th>
                                            <th>Subtotal</th>
                                            <th>Descuento</th>
                                            <th>Total</th>
                                            <th>Nombre del producto</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($details as $index => $detail)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $detail->quantity }}</td>
                                                <td>{{ $detail->price_unit }}</td>
                                                <td>{{ $detail->subtotal }}</td>
                                                <td>{{ $detail->discount }}</td>
                                                <td>{{ $detail->total }}</td>
                                                <td>{{ $detail->product->name }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <p>No se encontraron detalles asociados a esta compra.</p>
                        @endif
                        <a type="button" class="btn btn-primary" href="{{ route('sales.index') }}"><i
                                class="bi bi-arrow-left-circle"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('layouts.footers.auth.footer')
@endsection
