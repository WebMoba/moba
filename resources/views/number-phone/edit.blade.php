@extends('layouts.app')

@section('template_title')
    {{ __('Update') }} Number Phone
@endsection

@section('content')
    <section class="content container-fluid">
    <a class="btn btn-primary" href="{{ route('number-phone.index') }}"> {{ __('Volver') }}</a><br><br>
        <div class="">
            <div class="col-md-12">

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
    </section>
@endsection