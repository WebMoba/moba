@extends('layouts.app')

@section('template_title')
    {{ $detailQuote->name ?? "{{ __('Show') Detail Quote" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Detail Quote</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('detail-quotes.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Services Id:</strong>
                            {{ $detailQuote->services_id }}
                        </div>
                        <div class="form-group">
                            <strong>Products Id:</strong>
                            {{ $detailQuote->products_id }}
                        </div>
                        <div class="form-group">
                            <strong>Projects Id:</strong>
                            {{ $detailQuote->projects_id }}
                        </div>
                        <div class="form-group">
                            <strong>Quotes Id:</strong>
                            {{ $detailQuote->quotes_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
