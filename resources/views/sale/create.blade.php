@extends('layouts.app')

@section('template_title')
    {{ __('Create') }} Sale
@endsection


@section('content')
@include('layouts.navbars.auth.topnav', ['title' => 'Agregar Venta'])
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Crear') }} Venta</span>
                    </div>


                    <div class="card-body">
                        <form method="POST" action="{{ route('sales.store') }}" role="form" enctype="multipart/form-data">
                            @csrf
                            @include('sale.form')
                            
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection