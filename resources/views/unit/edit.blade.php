@extends('layouts.app')

@section('template_title')
    {{ __('Editar') }} Unit
@endsection

@section('content')
@include('layouts.navbars.auth.topnav', ['title' => 'Menu'])
    @if ($message = Session::get('danger'))
        <div class="alert alert-danger text-center">
            <p>{{ $message }}</p>
        </div>
    @endif
    <section class="content container-fluid">
    <div class="container"> <!-- Agregar contenedor -->
            <div class="row justify-content-center"> 
            <div class="col-md-8">


                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <span class="card-title">{{ __('Editar') }} Unidad</span>
                        <a class="btn btn-primary" href="{{ route('unit.index') }}">{{ __('Volver') }}</a>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('unit.update', $unit->id) }}" role="form"
                            enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('unit.form', ['mode' => 'Editar'])

                        </form>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </section>
    @include('layouts.footers.auth.footer')
@endsection