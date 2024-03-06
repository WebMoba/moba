@extends('layouts.app')

@section('template_title')
    {{ __('Update') }} Person
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Update') }} Person</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('people.update', $person->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('person.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
