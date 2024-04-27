@extends('layouts.app')

@section('template_title')
    Purchase
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
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
                                    <button type="submit" class="btn btn-primary btn-sm"><i
                                            class="bi bi-search"></i></button>
                                </div>
                            </form>
                            <div class="float-right">
                                <a href="{{ route('pdf.purchase') }}" class="btn btn-danger btn-sm float-right">
                                    <i class="fa fa-file-pdf"></i></i><i class="bi bi-file-pdf-fill"></i>
                                </a>
                                <a href="{{ route('excel.purchase') }}" class="btn btn-success btn-sm float-right">
                                    <i class="fa fa-file-excel"></i><i class="bi bi-file-earmark-excel-fill"></i>
                                </a>

                            </div>
                            <div class="float-right">
                                <a href="{{ route('purchases.create') }}" class="btn btn-primary btn-sm float-right"
                                    data-placement="left">
                                    {{ __('Crear nuevo') }}
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


                                                <td>{{ $purchase->date }}</td>

                                                <td>
                                                    <form action="{{ route('purchases.destroy', $purchase->id) }}"
                                                        method="POST">
                                                        <a class="btn btn-sm btn-primary {{ $purchase->disable ? 'disabled' : '' }}"
                                                            href="{{ route('purchases.show', $purchase->id) }}"><i
                                                                class="bi bi-eye-fill"></i></a>
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm"
                                                            onclick="return confirm('¿Está seguro de que desea {{ $purchase->disable ? 'Habilitar' : 'Deshabilitar' }} a la  compra?')">
                                                            <i class="fa fa-fw fa-trash"></i>
                                                            {!! $purchase->disable ? '<i class="bi bi-check-circle-fill"></i>' : '<i class="bi bi-x-circle"></i>' !!}
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
@endsection
