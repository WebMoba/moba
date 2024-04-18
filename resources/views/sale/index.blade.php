@extends('layouts.app')
@if (Session::has('msj'))
    {{ Session::get('msj') }}
@endif
@section('template_title')
    Sale
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
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
                                    <button type="submit" class="btn btn-primary btn-sm">Buscar</button>
                                </div>


                            </form>
                            <div class="float-right">
                                <a href="{{ route('pdf.sales') }}" class="btn btn-danger btn-sm float-right">
                                    <i class="fa fa-file-pdf"></i> {{ __('PDF') }}
                                </a>
                            </div>
                            <div class="float-right">
                                <a href="{{ route('sales.create') }}" class="btn btn-primary btn-sm float-right"
                                    data-placement="left">
                                    {{ __('Crear Nuevo') }}
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
                                        <th>No</th>
                                        <th>Nombre Cliente</th>
                                        <th>Id Persona</th>
                                        <th>Fecha venta</th>
                                        <th>Fecha de Cotización</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($sales as $sale)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $sale->person->name }}</td>
                                            <td>{{ $sale->person->id_card }}</td>
                                            <td>{{ $sale->date }}</td>
                                            <td>{{ $sale->quote->date_issuance }}</td>
                                            <td>
                                                <form action="{{ route('sales.destroy', $sale->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary "
                                                        href="{{ route('sales.show', $sale->id) }}"><i
                                                            class="fa fa-fw fa-eye"></i> {{ __('Mostrar') }}</a>
                                                    
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i
                                                            class="fa fa-fw fa-trash"></i> {{ __('Eliminar') }}</button>
                                                </form>

                                            </td>
                                        </tr>
                                    @endforeach



                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $sales->links() !!}
            </div>
        </div>
    </div>
@endsection
