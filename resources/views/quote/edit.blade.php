@extends('layouts.app')

@section('template_title')
    {{ __('Update') }} Quote
@endsection

@section('content')
@include('layouts.navbars.auth.topnav', ['title' => 'Menu'])
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-10 mx-auto">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Editar') }} Cotización</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('quotes.update', $quote->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('quote.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection