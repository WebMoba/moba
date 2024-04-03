@extends('layouts.app')

@section('template_title')
    {{ $numberPhone->name ?? __('Show Number Phone')  }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Number Phone</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('number-phone.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Number:</strong>
                            {{ $numberPhone->number }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
