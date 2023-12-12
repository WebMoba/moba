@extends('layouts.app')

@section('template_title')
    {{ $sale->name ?? "{{ __('Show') Sale" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Sale</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-danger" href="{{ route('sales.index') }}"> {{ __('Volver') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $sale->name }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha:</strong>
                            {{ $sale->date }}
                        </div>
                        <div class="form-group">
                            <strong>Id Persona:</strong>
                            {{ $sale->people_id }}
                        </div>
                        <div class="form-group">
                            <strong>Id Cotización:</strong>
                            {{ $sale->quotes_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
