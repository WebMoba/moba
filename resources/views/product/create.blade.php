@extends('layouts.app')

@section('template_title')
    {{ __('Crear') }} Product
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Crear') }} Product</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('product.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('product.form', ['mode'=>'Crear'])

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
