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
                        <form method="POST" action="{{ route('unit.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('unit.form', ['mode'=>'Crear'])

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection