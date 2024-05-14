@extends('layouts.app')

@section('template_title')
    {{ __('Update') }} Project
@endsection

@section('content')
@include('layouts.navbars.auth.topnav', ['title' => 'Editar Proyecto'])
    <section class="content container-fluid">
    <div class="container"> <!-- Agregar contenedor -->
            <div class="row justify-content-center"> 
            <div class="col-md-8">


                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Editar') }} Proyecto</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('projects.update', $project->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('project.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>
@endsection