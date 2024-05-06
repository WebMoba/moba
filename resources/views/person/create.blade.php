@extends('layouts.app')

@section('template_title')
    {{ __('Crear') }} Persona
@endsection

@section('content')
@include('layouts.navbars.auth.topnav', ['title' => 'Menu'])
    <section class="content container-fluid">
        <a class="btn btn-primary" href="{{ route('person.index') }}"> {{ __('Volver') }}</a><br><br>
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Crear') }} Persona</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('person.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('person.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection