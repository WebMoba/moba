@extends('layouts.app')

@section('template_title')
    {{ $purchase->name ?? __('Show Purchase') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Compra</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('purchases.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        <h2>Compra</h2>

                        <div class="form-group">
                            <strong>Nombre dell proveedor:</strong>
                            {{ $purchase->name }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha de compra:</strong>
                            {{ $purchase->date }}
                        </div>
                        <div class="form-group">
                            <strong>Nº de identificación y dirección:</strong>
                            {{ $purchase->person->id_card }} - {{ $purchase->person->addres }}
                        </div>


                        <h2>Detalles de la compra</h2>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
