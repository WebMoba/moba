@extends('layouts.app')

@section('template_title')
    {{ __('Crear') }} Unidad
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <span class="card-title">{{ __('Crear') }} Unidad</span>
                        <a class="btn btn-primary" href="{{ route('unit.index') }}">{{ __('Volver') }}</a>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('unit.store') }}" role="form" enctype="multipart/form-data">
                            @csrf
                            <div class="box box-info padding-1">
                                <div class="box-body">
                                    <div class="form-group">
                                        {{ Form::label('Tipo de unidad', null, ['class' => 'required']) }}
                                        {{ Form::select('unit_type', ['unidad' => 'Unidad', 'docena' => 'Docena', 'centena' => 'Centena', 'mil' => 'Mil', 'mm' => 'MM', 'cm' => 'CM', 'm' => 'M', 'cm2' => 'CM2', 'm2' => 'M2'], $unit->unit_type, ['class' => 'form-control' . ($errors->has('unit_type') ? ' is-invalid' : ''), 'id' => 'unit_type']) }}
                                        {!! $errors->first('unit_type', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                </div>
                                <div class="box-footer mt20">
                                    <button type="submit" class="btn btn-primary">{{ __('Crear') }}</button>
                                </div>
                            </div>
                            <style>
                                .required::after {
                                    content: "*";
                                    color: red;
                                    margin-left: 4px;
                                }
                            </style>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
