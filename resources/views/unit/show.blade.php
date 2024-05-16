@extends('layouts.app')

@section('template_title')
    {{ $unit->name ?? __('Show Unit') }}
@endsection

@section('content')
@include('layouts.navbars.auth.topnav', ['title' => 'Menu'])
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="card-title">{{ __('Mostrar') }} Unidad</span>
                            <a class="btn btn-primary" href="{{ route('unit.index') }}"> {{ __('Volver') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="form-group">
                            <strong>Tipo de unidad:</strong>
                            {{ $unit->unit_type }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('layouts.footers.auth.footer')
@endsection
