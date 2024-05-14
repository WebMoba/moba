@extends('layouts.app')

@section('template_title')
    {{ __('Create') }} Quote
@endsection

@section('content')
@include('layouts.navbars.auth.topnav', ['title' => 'Agregar Cotización'])
    <section class="content container-fluid">
    <div class="container"> <!-- Agregar contenedor -->
            <div class="row justify-content-center"> 
            <div class="col-md-8">


                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Crear') }} Cotización</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('quotes.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('quote.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>
@endsection