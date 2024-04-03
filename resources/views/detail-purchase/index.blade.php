@extends('layouts.app')

@section('template_title')
    Detail Purchase
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Detalle de compra') }}
                            </span>

                            <div class="float-right">
                                <a href="{{ route('detail_purchases.create') }}" class="btn btn-primary btn-sm float-right"
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

                                        <th>Cantidad</th>
                                        <th>Precio unitario</th>
                                        <th>Subtotal</th>
                                        <th>Descuento</th>
                                        <th>Total</th>
                                        <th>Nombre de materia prima</th>
                                        <th>Nombre de compra</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($detailPurchases as $detailPurchase)
                                        <tr>
                                            <td>{{ ++$i }}</td>

                                            <td>{{ $detailPurchase->quantity }}</td>
                                            <td>{{ $detailPurchase->price_unit }}</td>
                                            <td>{{ $detailPurchase->subtotal }}</td>
                                            <td>{{ $detailPurchase->discount }}</td>
                                            <td>{{ $detailPurchase->total }}</td>
                                            <td>{{ $detailPurchase->materialsRaw->name }}</td>
                                            <td>{{ $detailPurchase->purchase->name }}</td>

                                            <td>
                                                <form action="{{ route('detail_purchases.destroy', $detailPurchase->id) }}"
                                                    method="POST">
                                                    <a class="btn btn-sm btn-primary "
                                                        href="{{ route('detail_purchases.show', $detailPurchase->id) }}"><i
                                                            class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success"
                                                        onclick="return confirm('¿Está seguro de editar este registro?');"
                                                        href="{{ route('detail_purchases.edit', $detailPurchase->id) }}"><i
                                                            class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"
                                                        onclick="return confirm('¿Está seguro de eliminar este registro?');"><i
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
                {!! $detailPurchases->links() !!}
            </div>
        </div>
    </div>
@endsection
