@extends('layouts.app')

@section('template_title')
    {{ __('Update') }} Number Phone
@endsection

@section('content')
@include('layouts.navbars.auth.topnav', ['title' => 'Menu'])
    <section class="content container-fluid">
    <a class="btn btn-primary" href="{{ route('number-phone.index') }}"> {{ __('Volver') }}</a><br><br>
    <div class="container"> <!-- Agregar contenedor -->
            <div class="row justify-content-center"> 
            <div class="col-md-8">


                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Editar') }} Number de Telefono</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('number-phone.update', $numberPhone->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('number-phone.form')

                        </form>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </section>
    @include('layouts.footers.auth.footer')
@endsection