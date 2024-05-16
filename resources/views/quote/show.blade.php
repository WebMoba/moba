@extends('layouts.app')

@section('template_title')
    {{ $quote->name ?? __('Show Quote') }}
@endsection

@section('content')
@include('layouts.navbars.auth.topnav', ['title' => 'Mostrar Cotización'])
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-10 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Ver Cotización') }}</span>
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
                                    <th>Persona:</th>
                                    <td>{{ $quote->people_id }}</td>
                                </tr>
                                <tr>
                                    <th>Detalles de la cotización:</th>
                                    <td>
                                        <ul>
                                            @foreach ($quote->detailQuotes as $detail)
                                                <li>
                                                    <strong>Servicio:</strong> {{ $detail->service ? $detail->service->name : 'N/A' }}<br>
                                                    <strong>Producto:</strong> {{ $detail->product ? $detail->product->name : 'N/A' }}<br>
                                                    <strong>Proyecto:</strong> {{ $detail->project ? $detail->project->name : 'N/A' }}<br>
                                                    <strong>Cotización:</strong> {{ $detail->quotes_id }}
                                                </li>
                                            @endforeach
                                        </ul>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <a type="submit" class="btn btn-primary" href="{{ route('quotes.index') }}"><i
                            class="bi bi-arrow-left-circle"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('layouts.footers.auth.footer')
@endsection