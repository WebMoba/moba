@extends('layouts.app')
@if (Session::has('msj'))
    {{ Session::get('msj') }}
@endif
@section('template_title')
    Sale
@endsection

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Ventas'])
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-11">
                <div class="card">

                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Ventas') }}
                            </span>

                            <form action="{{ route('sales.index') }}" method="GET" class="d-flex align-items-center">
                                <div class="col-auto mr-2">
                                    <input type="text" class="form-control" name="search" placeholder="Buscar...">
                                </div>

                                <div class="col-auto">
                                    <button type="submit" class="btn btn-primary btn-sm"><i class="bi bi-search"></i><span
                                            class="tooltiptext">Buscar</span></button>
                                </div>


                            </form>
                            <div class="float-right">
                                <a href="{{ route('export.sales') }}" class="btn btn-success btn-sm float-right">
                                    <i class="bi bi-file-earmark-excel-fill"></i><span class="tooltiptext">Excel</span>
                                </a>
                                
                                <button type="button" class="btn btn-danger ms-2 rounded" tooltip="tooltip"
                                title="PDF" onclick="window.location.href='{{ route('sale.pdf') }}'">
                                    <i class="bi bi-file-pdf-fill"></i><span class="tooltiptext">Pdf</span>
                                </button>
                                
                                <a href="{{ route('sales.create') }}" class="btn btn-success" data-placement="left">
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
                                        <th>N°</th>
                                        <th>Nombre Cliente</th>
                                        <th>Id Persona</th>
                                        <th>Fecha venta</th>
                                        <th>Total venta</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($sales === null || count($sales) <= 0)
                                        <tr>
                                            <td colspan="4">No se encontraron resultados en su busqueda.</td>
                                        </tr>
                                    @else
                                        @foreach ($sales as $sale)
                                            <tr>
                                                <td>{{ ++$i }}</td>
                                                <td>{{ $sale->name }}</td>
                                                <td>{{ $sale->person->id_card }}</td>
                                                <td>{{ $sale->date }}</td>
                                                <td>{{ $sale->total }}</td>
                                                <td>
                                                    <form class="frDataN" action="{{ route('sales.destroy', $sale->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <a class="btn btn-sm btn-primary {{ $sale->disable ? 'disabled' : '' }}"
                                                            href="{{ route('sales.show', $sale->id) }}">
                                                            <i class="bi bi-eye-fill"></i><span
                                                                class="tooltiptext">Mostrar</span>
                                                        </a>
                                                        <button type="submit"
                                                            class="btn btn-danger btn-sm {{ $sale->disable ? 'disabled' : '' }}">
                                                            <i class="bi bi-x-circle"></i><span
                                                                class="tooltiptext">Anular</span>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $sales->links() !!}
            </div>
        </div>
    </div>
    <style>
        th, td{
            text-align: center;
        }
    </style>
    @include('layouts.footers.auth.footer')
@endsection

@extends('layouts.alerts')
