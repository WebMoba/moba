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
                        <div class="float-right">
                            <a href="{{ route('pdf.sale-detail', ['findId' => $sale->id]) }}" class="btn btn-danger btn-sm float-right">
                                </i><i class="bi bi-file-pdf-fill"></i><span class="tooltiptext">Pdf</span>
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        @if ($sale->detailSales->count())
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th>Nombre del cliente:</th>
                                    <td>{{ $sale->name }}</td>
                                </tr>
                                <tr>
                                    <th>Documento del cliente:</th>
                                    <td>{{ $sale->person->id_card }}</td>
                                </tr>
                                <tr>
                                    <th>Total de la venta:</th>
                                    <td>{{ $sale->total }}</td>
                                </tr>
                                <tr>
                                    <th>Fecha realización de la venta:</th>
                                    <td>{{ $sale->date }}</td>
                                </tr>
                                <tr>
                                    <th>Detalles de la venta:</th>
                                    <td>
                                        <ul>
                                            @foreach ($sale->detailSales as $detail)
                                                <li>
                                                    {{--  @foreach ($sale as $index => $detail)
                                                    <strong>Detalle:</strong>{{  $index + 1  }}<br>
                                                    @endforeach  --}}
                                                    <strong>Cantidad:</strong> {{ $detail->quantity }}<br>
                                                    <strong>Precio unitario:</strong> {{ $detail->price_unit }}<br>
                                                    <strong>Subtotal:</strong> {{ $detail->subtotal }}<br>
                                                    <strong>Descuento:</strong> {{ $detail->discount }}<br>
                                                    <strong>Total:</strong> {{ $detail->total }}<br>
                                                    <strong>Nombre del producto:</strong> {{ $detail->product->name }}
                                                </li>
                                            @endforeach
                                        </ul>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        @else
                        <p>No se encontraron detalles asociados a esta venta.</p>
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
