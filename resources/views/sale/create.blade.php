@extends('layouts.app')


@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Crear nuevo') }} Venta</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('sales.store') }}" role="form"
                            enctype="multipart/form-data">
                            @csrf

                            @include('Sale.form')
                            <div class="p-3 mb-1 text-dark my-1 mx-auto p-2" style="width: 300px;">
                                <h3>Detalle de la Venta</h3>
                            </div>
                            @include('detail-sale.form', [
                                'saleId' => $sale->id,
                                'salesName' => isset($salesName) ? $salesName : null,
                                'creating' => true,
                            ]);


                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection