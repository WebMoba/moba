@extends('layouts.app')

@section('template_title')
    {{ $unit->name ?? "{{ __('Show') Unit" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Mostrar') }} Unidad</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('unit.index') }}"> {{ __('Volver') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Tipo de unidad:</strong>
                            {{ $unit->unit_type }}
                        </div>
                        <div class="form-group">
                            <strong>Tamaño:</strong>
                            {{ $unit->size }}
                        </div>
                        <div class="form-group">
                            <strong>Area:</strong>
                            {{ $unit->area }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
