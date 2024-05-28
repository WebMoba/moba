@extends('layouts.app')
@if (Session::has('msj'))
    {{ Session::get('msj') }}
@endif
@section('template_title')
    Quote
@endsection

@section('content')
@include('layouts.navbars.auth.topnav', ['title' => 'Cotizaciones'])
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-11 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Cotizaciones') }}
                            </span>

                            <form action="{{ route('quotes.index') }}" method="get" class="d-flex align-items-center">
                                <div class="col-auto mr-2">
                                    <input type="text" class="form-control" name="search" placeholder="Buscar..."
                                        id="search">
                                </div>
                                <div class="col-auto">
                                    <button type="submit" class="btn btn-primary btn-sm"><i class="bi bi-search"></i><span class="tooltiptext">Buscar</span></button>
                                </div>
                            </form>
                            <div class="float-right">
                                <a href="{{ route('pdf.quote') }}" class="btn btn-danger btn-sm float-right">
                                   <i class="bi bi-file-pdf-fill"></i><span class="tooltiptext">Pdf</span>
                                </a>

                                <a href="{{ route('excel.quote') }}" class="btn btn-success btn-sm float-right">
                                    <i class="bi bi-file-earmark-excel-fill"></i><span class="tooltiptext">Excel</span>
                                </a>
                            </div>
                            <div class="float-right">
                                <a href="{{ route('quotes.create') }}" class="btn btn-success"
                                    data-placement="left">
                                    <i class="bi bi-plus-circle"></i><span class="tooltiptext">Crear</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>Id</th>
                                        <th>Fecha de expedición</th>
                                        <th>Descripción</th>
                                        <th>Total</th>
                                        <th>Descuento</th>
                                        <th>Estado</th>
                                        <th>Persona</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($quotes as $quote)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $quote->date_issuance }}</td>
                                            <td>{{ $quote->description }}</td>
                                            <td>{{ $quote->total }}</td>
                                            <td>{{ $quote->discount }}</td>
                                            <td>{{ $quote->status }}</td>
                                            <td>{{ $quote->people_id }}</td>
                                            <td>
                                                <form class="frData"
                                                    action="{{ route('quotes.destroy', $quote->id) }}"
                                                    method="POST" data-disable="{{ $quote->disable }}">
                                                    <a class="btn btn-sm btn-primary {{ $quote->disable ? 'disabled' : '' }}"
                                                        href="{{ route('quotes.show', $quote->id) }}">
                                                        <i class="bi bi-eye-fill"></i><span class="tooltiptext">Mostrar</span>
                                                    </a>
                                                    {{--  <a class="btn btn-sm btn-success {{ $quote->disable ? 'disabled' : '' }}"
                                                        href="{{ route('quotes.edit', $quote->id) }}"><i class="fa fa-fw fa-edit"></i> 
                                                        <i class="bi bi-pencil-square"></i>
                                                    </a>  --}}
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"
                                                        >
                                                        {!! $quote->disable ? '<i class="bi bi-check-circle-fill"></i>' : '<i class="bi bi-x-circle"></i>'!!}
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $quotes->links() !!}
            </div>
        </div>
    </div>
    @include('layouts.footers.auth.footer')
@endsection


@extends('layouts.alerts')
