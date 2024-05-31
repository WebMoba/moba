@extends('layouts.app')

@section('template_title')
    {{ $purchase->name ?? __('Show Purchase') }}
@endsection

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Mostrar Compra'])
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-11">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Compra</span>
                        </div>
                        <div class="float-right">
                            <button type="button" class="btn btn-danger ms-2 rounded" tooltip="tooltip" title="PDF" 
                                    onclick="window.location.href='{{ route('purchaseDetail.pdf', ['id' => $purchase->id]) }}'">
                                <i class="bi bi-file-pdf-fill"></i><span class="tooltiptext">Pdf</span>
                            </button>
                        </div>
                    </div>

                    <div class="card-body">
                        <h2>Compra</h2>
                        @if ($purchase->detailPurchases->count())
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th>Nombre del proveedor:</th>
                                    <td>{{ $purchase->user->name }}</td>
                                </tr>
                                <tr>
                                    <th>Documento del proveedor:</th>
                                    <td>{{ $purchase->person->id_card }}</td>
                                </tr>
                                <tr>
                                    <th>Total de la compra:</th>
                                    <td>{{ $purchase->total }}</td>
                                </tr>
                                <tr>
                                    <th>Fecha realización de la compra:</th>
                                    <td>{{ $purchase->date }}</td>
                                </tr>
                                <tr>
                                    <th>Detalles de la compra:</th>
                                    <td>
                                        <ul>
                                            @foreach ($purchase->detailPurchases as $detail)
                                                <li>
                                                    @foreach ($details as $index => $detail)
                                                    <strong>Detalle:</strong> {{ $index + 1 }}<br>
                                                    @endforeach
                                                    <strong>Cantidad:</strong> {{ $detail->quantity }}<br>
                                                    <strong>Precio unitario:</strong> {{ $detail->price_unit }}<br>
                                                    <strong>Subtotal:</strong> {{ $detail->subtotal }}<br>
                                                    <strong>Descuento:</strong> {{ $detail->discount }}<br>
                                                    <strong>Total:</strong> {{ $detail->total }}<br>
                                                    <strong>Nombre de la materia prima:</strong> {{ $detail->materialsRaw->name }}
                                                </li>
                                            @endforeach
                                        </ul>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        @else
                        <p>No se encontraron detalles asociados a esta compra.</p>
                        @endif
                    
                        <a type="submit" class="btn btn-primary" href="{{ route('purchases.index') }}"><i
                                class="bi bi-arrow-left-circle"></i><span class="tooltiptext">Volver</span></a>
                    </div>

                </div>
            </div>
        </div>
    </section>
    @include('layouts.footers.auth.footer')
@endsection
