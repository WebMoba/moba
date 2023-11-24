@extends('layouts.app')

@section('template_title')
    {{ $event->name ?? "{{ __('Show') Event" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Event</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('events.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Place:</strong>
                            {{ $event->place }}
                        </div>
                        <div class="form-group">
                            <strong>Title:</strong>
                            {{ $event->title }}
                        </div>
                        <div class="form-group">
                            <strong>Description:</strong>
                            {{ $event->description }}
                        </div>
                        <div class="form-group">
                            <strong>Date Start:</strong>
                            {{ $event->date_start }}
                        </div>
                        <div class="form-group">
                            <strong>Date End:</strong>
                            {{ $event->date_end }}
                        </div>
                        <div class="form-group">
                            <strong>Importance Range:</strong>
                            {{ $event->importance_range }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
