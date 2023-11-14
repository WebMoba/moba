@extends('layouts.app')

@section('template_title')
    {{ $quote->name ?? "{{ __('Show') Quote" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Quote</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('quotes.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Date Issuance:</strong>
                            {{ $quote->date_issuance }}
                        </div>
                        <div class="form-group">
                            <strong>Description:</strong>
                            {{ $quote->description }}
                        </div>
                        <div class="form-group">
                            <strong>Total:</strong>
                            {{ $quote->total }}
                        </div>
                        <div class="form-group">
                            <strong>Discount:</strong>
                            {{ $quote->discount }}
                        </div>
                        <div class="form-group">
                            <strong>Status:</strong>
                            {{ $quote->status }}
                        </div>
                        <div class="form-group">
                            <strong>People Id:</strong>
                            {{ $quote->people_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
