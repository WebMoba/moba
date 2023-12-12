@extends('layouts.app')

@section('template_title')
    {{ __('Update') }} Number Phone
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Update') }} Number Phone</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('number-phones.update', $numberPhone->id) }}"  role="form" enctype="multipart/form-data">
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
