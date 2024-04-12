@extends('layouts.app')

@section('template_title')
    {{ __('Update') }} Detail Purchase
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Update') }} Detalle de compra</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('detail_purchases.update', $detailPurchase->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf
dd($detailPurchase)
                            @include('detail-purchase.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
