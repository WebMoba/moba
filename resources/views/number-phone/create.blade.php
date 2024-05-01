@extends('layouts.app')

@section('template_title')
    {{ __('Create') }} Number Phone
@endsection

@section('content')
    <section class="content container-fluid">
        <a class="btn btn-primary" href="{{ route('number-phone.index') }}"> {{ __('Volver') }}</a><br><br>
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Crear') }} Numero Telefono</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('number-phone.store') }}" role="form"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="box box-info padding-1">
                                <div class="box-body">

                                    <div class="form-group">
                                        {{ Form::label('Numero Telefono') }}
                                        {{ Form::text('number', $numberPhone->number, ['class' => 'form-control' . ($errors->has('number') ? ' is-invalid' : ''), 'placeholder' => 'Numero Telefono']) }}
                                        {!! $errors->first('number', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>

                                </div>
                                <div class="box-footer mt20">
                                    <button type="submit" class="btn btn-primary"
                                        onclick="return confirm('¿Está seguro de que desea crear numero telefonico?')">{{ __('Enviar') }}</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
