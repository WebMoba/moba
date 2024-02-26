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
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $purchase->name }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha:</strong>
                            {{ $purchase->date }}
                        </div>
                        <div class="form-group">
                            <strong>Documento:</strong>
                            {{ $purchase->people_id }}
                        </div>
                        
                        
                        
                        
                        
                        <div class="form-group">
                            <strong>materials_raws_id:</strong>
                            {{ $purchase->$materialsRaws->name }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
