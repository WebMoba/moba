@extends('layouts.app')

@section('template_title')
    {{ __('Create') }} Purchase
@endsection

@section('content')
@include('layouts.navbars.auth.topnav', ['title' => 'Agregar Compra'])
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-11">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Create') }} Compra</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('purchases.store') }}" role="form"
                            enctype="multipart/form-data">
                            @csrf

                            @include('purchase.form')
                            
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('layouts.footers.auth.footer')
@endsection