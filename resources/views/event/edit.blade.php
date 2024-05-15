@extends('layouts.app')

@section('template_title')
    {{ __('Update') }} Event
@endsection

@section('content')
@include('layouts.navbars.auth.topnav', ['title' => 'Editar Evento'])
    <section class="content container-fluid">
    <div class="container"> <!-- Agregar contenedor -->
            <div class="row justify-content-center"> 
            <div class="col-md-8">


                @includeif('partials.errors')
                <a class="btn btn-primary" href="{{ route('events.index') }}"> {{ __('Volver') }}</a><br><br>
                <div class="card card-default">
                    <div class="card-header">

                        <span class="card-title">{{ __('Actualizar') }} Evento</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('events.update', $event->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('event.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>
@endsection