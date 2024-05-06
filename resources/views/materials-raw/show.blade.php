@extends('layouts.app')

@section('template_title')
    {{ $materialsRaw->name ??  __('Show Materials Raw') }}
@endsection

@section('content')
@include('layouts.navbars.auth.topnav', ['title' => 'Menu'])
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Materials Raw</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('materials_raws.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $materialsRaw->name }}
                        </div>
                        <div class="form-group">
                            <strong>Cantidad existente:</strong>
                            {{ $materialsRaw->existing_quantity }}
                        </div>
                        <div class="form-group">
                            <strong>Tipo de unidad:</strong>
                            {{ $materialsRaw->unit->unit_type }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
