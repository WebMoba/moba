@extends('layouts.app')

@section('template_title')
    {{ __('Update') }} Purchase
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Update') }} Compra</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('purchases.update', ['purchase' => $purchase->id]) }}"
                            role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('purchase.form')

                            <h2>Detalle</h2>
                            @include('detail-purchase.form', [
                                'purchaseId' => $purchase->id,
                                'purchaseName' => isset($purchaseName) ? $purchaseName : null,
                                'creating' => true,
                            ])
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
