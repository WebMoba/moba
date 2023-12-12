@extends('layouts.app')

@section('template_title')
    {{ $teamWork->name ?? "{{ __('Show') Team Work" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Team Work</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('team-works.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Specialty:</strong>
                            {{ $teamWork->specialty }}
                        </div>
                        <div class="form-group">
                            <strong>Assigned Work:</strong>
                            {{ $teamWork->assigned_work }}
                        </div>
                        <div class="form-group">
                            <strong>Assigned Date:</strong>
                            {{ $teamWork->assigned_date }}
                        </div>
                        <div class="form-group">
                            <strong>Projects Id:</strong>
                            {{ $teamWork->projects_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
