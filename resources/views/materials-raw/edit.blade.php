@extends('layouts.app')

@section('template_title')
    {{ __('Update') }} Materials Raw
@endsection

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Editar Materia Prima'])
    <section class="content container-fluid">
    <div class="container"> <!-- Agregar contenedor -->
            <div class="row justify-content-center"> 
            <div class="col-md-8">


                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Update') }} Materia Prima</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('materials_raws.update', $materialsRaw->id) }}" role="form"
                            enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('materials-raw.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>
@endsection

