@extends('layouts.app')

@section('template_title')
    {{ __('Update') }} Person
@endsection

@section('content')
@include('layouts.navbars.auth.topnav', ['title' => 'Editar Persona'])

    <section class="content container-fluid">
        <a class="btn btn-primary" href="{{ route('person.index') }}"> {{ __('Volver') }}</a>
        <div class="container"> <!-- Agregar contenedor -->
            <div class="row justify-content-center"> 
            <div class="col-md-8">


                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Editar') }} Persona</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('person.update', $person->id) }}"  role="form" enctype="multipart/form-data">
                            
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('person.form')

                        </form>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </section>
@endsection