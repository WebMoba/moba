@extends('layouts.app')

@section('template_title')
    {{ __('Create') }} Team Work
@endsection

@section('content')
@include('layouts.navbars.auth.topnav', ['title' => 'Agregar Equipo de Trabajo'])
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-10 mx-auto">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Crear') }} Equipo de trabajo</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('team-works.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('team-work.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection