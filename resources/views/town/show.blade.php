@extends('layouts.app')

@section('template_title')
    {{ $town->name ?? "{{ __('Show') Town" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Town</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('towns.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $town->name }}
                        </div>
                        <div class="form-group">
                            <strong>Regions Id:</strong>
                            {{ $town->regions_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
