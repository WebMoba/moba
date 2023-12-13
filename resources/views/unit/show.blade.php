@extends('layouts.app')

@section('template_title')
    {{ $unit->name ?? "{{ __('Show') Unit" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Unit</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('units.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Unit Type:</strong>
                            {{ $unit->unit_type }}
                        </div>
                        <div class="form-group">
                            <strong>Size:</strong>
                            {{ $unit->size }}
                        </div>
                        <div class="form-group">
                            <strong>Area:</strong>
                            {{ $unit->area }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
