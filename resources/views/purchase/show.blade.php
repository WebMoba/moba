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
                        <h2>Compra</h2>


                        <div class="form-group">
                            <strong>Nombre del proveedor:</strong>
                            {{ $purchase->user->name }}
                        </div>
                        <div class="form-group">
                            <strong>Documento del proveedor:</strong>
                            {{ $purchase->person->id_card }} 
                        </div>
                        <div class="form-group">
                            <strong>Fecha realizacion de la compra:</strong>
                            {{ $purchase->date }}
                        </div>

                        <h2>Detalles de la compra</h2>

                        @if ($details->count())
                            <div class="form-group">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Cantidad</th>
                                            <th>Precio unitario</th>
                                            <th>Subtotal</th>
                                            <th>Descuento</th>
                                            <th>Total</th>
                                            <th>Nombre de materia prima</th>
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
                                                <td>{{ $detail->materialsRaw->name }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <p>No se encontraron detalles asociados a esta compra.</p>
                        @endif



                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
