@extends('layouts.app')

@section('template_title')
    {{ $project->name ?? __('Show Project') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Ver') }} Projecto</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('projects.index') }}"> {{ __('Volver') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $project->name }}
                        </div>
                        <div class="form-group">
                            <strong>Descripción:</strong>
                            {{ $project->description }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha de inicio:</strong>
                            {{ $project->date_start }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha de finalización:</strong>
                            {{ $project->date_end }}
                        </div>
                        <div class="form-group">
                            <strong>Estado:</strong>
                            {{ $project->status }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
