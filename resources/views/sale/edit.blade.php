@extends('layouts.app')

@section('template_title')
    {{ __('Update') }} Sale
@endsection

@section('content')
@include('layouts.navbars.auth.topnav', ['title' => 'Editar Venta'])
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Editar') }} Venta</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('sales.update', $sale->id) }}"  
                            role="form" enctype="multipart/form-data">
                            @method('PATCH')
                            @csrf


                            @include('sale.form')
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('layouts.footers.auth.footer')
@endsection