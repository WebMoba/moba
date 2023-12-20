@extends('layouts.app')

@section('template_title')
    {{ __('Editar') }} Servicio
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Editar') }} Servicio</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('service.update', $service->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('service.form',['mode'=>'Editar'])

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
