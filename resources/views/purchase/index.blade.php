@extends('layouts.app')

@section('template_title')
    Purchase
@endsection

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Compras'])
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-11">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Compras') }}
                            </span>

                            <form action="{{ route('purchases.index') }}" method="GET" class="d-flex align-items-center">
                                <div class="col-auto mr-2">
                                    <input type="text" class="form-control" name="search" placeholder="Buscar...">
                                </div>
                                <div class="col-auto">
                                    <button type="submit" class="btn btn-primary btn-sm"><i class="bi bi-search"></i><span
                                            class="tooltiptext">Buscar</span></button>
                                </div>
                            </form>
                            <div class="float-right">
                                <a href="{{ route('pdf.purchase') }}" class="btn btn-danger btn-sm float-right">
                                    </i><i class="bi bi-file-pdf-fill"></i><span class="tooltiptext">Pdf</span>
                                </a>
                                <a href="{{ route('excel.purchase') }}" class="btn btn-success btn-sm float-right">
                                    <i class="bi bi-file-earmark-excel-fill"></i><span class="tooltiptext">Excel</span>
                                </a>

                            </div>
                            <div class="float-right">
                                <a href="{{ route('purchases.create') }}" class="btn btn-success" data-placement="left">
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
                                        <th>No</th>
                                        <th>Nombre del proveedor</th>
                                        <th>Documento del proveedor</th>
                                        <th>Valor de la compra</th>
                                        <th>Fecha realizacion de la compra</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($purchases === null || count($purchases) <= 0)
                                        <tr>
                                            <td colspan="4">No se encontraron resultados en su busqueda.</td>
                                        </tr>
                                    @else
                                        @foreach ($purchases as $purchase)
                                            <tr>
                                                <td>{{ ++$i }}</td>

                                                <td>{{ $purchase->user->name }}</td>
                                                <td>{{ $purchase->person->id_card }}</td>
                                                <td>{{ $purchase->total }}</td>
                                                <td>{{ $purchase->date }}</td>

                                                <td>
                                                    <form class="frData"
                                                        action="{{ route('purchases.destroy', $purchase->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <a class="btn btn-sm btn-primary {{ $purchase->disable ? 'disabled' : '' }}"
                                                            href="{{ route('purchases.show', $purchase->id) }}">
                                                            <i class="bi bi-eye-fill"></i><span
                                                                class="tooltiptext">Mostrar</span>
                                                        </a>
                                                        <button type="submit"
                                                            class="btn btn-danger btn-sm {{ $purchase->disable ? 'disabled' : '' }}">
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
                {!! $purchases->links() !!}
            </div>
        </div>
    </div>
    @include('layouts.footers.auth.footer')
@endsection

@extends('layouts.alerts')
