@extends('layouts.app')

@section('template_title')
    {{ __('Update') }} Sale
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Editar') }} Venta</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('sales.update', $sale->id) }}"  
                            role="form" enctype="multipart/form-data">
                            @method('PATCH')
                            @csrf


                            @include('sale.form')
                            <div class="p-3 mb-1 text-dark my-1 mx-auto p-2" style="width: 300px;">
                                <h3>Detalle de la Venta</h3>
                            </div>
                            @include('detail-sale.form', [
                                'saleId' => $sale->id,
                                'salesName' => isset($saleName) ? $salesName : null,
                                'creating' => true,
                            ])
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection