@extends('layouts.app')

@section('template_title')
    {{ $quote->name ?? __('Show Quote') }}
@endsection

@section('content')
@include('layouts.navbars.auth.topnav', ['title' => 'Mostrar Cotización'])
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-11 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Cotización Detallada') }}</span>
                        </div>
                        <div class="float-right">
                            <a href="{{ route('pdf.quote-detail', ['findId' => $quote->id]) }}" class="btn btn-danger btn-sm float-right">
                               <i class="bi bi-file-pdf-fill"></i><span class="tooltiptext">Pdf</span>
                            </a>
                        </div>
                    </div>

                    <div class="card-body">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th>Fecha de expedición:</th>
                                    <td>{{ $quote->date_issuance }}</td>
                                </tr>
                                <tr>
                                    <th>Descripción:</th>
                                    <td>{{ $quote->description }}</td>
                                </tr>
                                <tr>
                                    <th>Total:</th>
                                    <td>{{ $quote->total }}</td>
                                </tr>
                                <tr>
                                    <th>Descuento:</th>
                                    <td>{{ $quote->discount }}</td>
                                </tr>
                                <tr>
                                    <th>Estado:</th>
                                    <td>{{ $quote->status }}</td>
                                </tr>
                                <tr>
                                    <th>Cliente:</th>
                                    <td>{{ $quote->person->name ?? 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <th>Detalles de la cotización:</th>
                                    <td>
                                        <ul>
                                            @foreach ($quote->detailQuotes as $index => $detail)
                                            <li>
                                                <strong>Detalle:</strong>{{  $index + 1  }}<br>
                                                <strong>Servicio:</strong> {{ $detail->service ? $detail->service->name : 'N/A' }}<br>
                                                <strong>Producto:</strong> {{ $detail->product ? $detail->product->name : 'N/A' }}<br>
                                                <strong>Proyecto:</strong> {{ $detail->project ? $detail->project->name : 'N/A' }}<br>
                                                <strong>Cotización:</strong> {{ $detail->quotes_id }}<br>
                                                <br>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <a type="submit" class="btn btn-primary" href="{{ route('quotes.index') }}"><i
                            class="bi bi-arrow-left-circle"></i><span class="tooltiptext">Volver</span></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('layouts.footers.auth.footer')
@endsection
