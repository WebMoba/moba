@extends('layouts.app')

@section('template_title')
    Purchase
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">

                <div class="col-sm-12">
                    <form class="d-flex my-2" action="{{ route('purchases.index') }}" method="GET">
                        <div class="mr-2">
                            <input type="text" class="form-control" name="search" placeholder="Buscar por nombre o fecha">
                        </div>
                        <div>
                            <input type="submit" class="btn btn-primary ms-2" value="Buscar">
                        </div>
                    </form>
                </div>


                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Compras') }}
                            </span>

                            <div class="float-right">
                                <a href="{{ route('pdf.purchase') }}" class="btn btn-info btn-sm float-right">
                                    <i class="fa fa-file-pdf"></i> {{ __('Generar PDF') }}
                                </a>
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

                                        <th>Nombre de compra</th>
                                        <th>Fecha realizacion de la compra</th>
                                        <th>Documento - Dirección del proveedor</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($purchases as $purchase)
                                        <tr>
                                            <td>{{ ++$i }}</td>

                                            <td>{{ $purchase->name }}</td>
                                            <td>{{ $purchase->date }}</td>
                                            <td>{{ $purchase->person->id_card }} - {{ $purchase->person->addres }}</td>

                                            <td>
                                                <form action="{{ route('purchases.destroy', $purchase->id) }}"
                                                    method="POST">
                                                    <a class="btn btn-sm btn-primary "
                                                        href="{{ route('purchases.show', $purchase->id) }}"><i
                                                            class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success"
                                                        href="{{ route('purchases.edit', $purchase->id) }}"><i
                                                            class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"
                                                        onclick="return confirm('¿Está seguro de eliminar esta compra? Ten en cuenta que esto eliminará todos los registro asociados');"><i
                                                            class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
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
