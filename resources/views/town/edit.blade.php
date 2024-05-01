@extends('layouts.app')

@section('template_title')
    {{ __('Update') }} Town
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Update') }} Town</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('towns.update', $town->id) }}" role="form"
                            enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            <div class="box box-info padding-1">
                                <div class="box-body">

                                    <div class="form-group">
                                        {{ Form::label('name') }}
                                        {{ Form::text('name', $town->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Name']) }}
                                        {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('regions_id') }}
                                        {{ Form::text('regions_id', $town->regions_id, ['class' => 'form-control' . ($errors->has('regions_id') ? ' is-invalid' : ''), 'placeholder' => 'Regions Id']) }}
                                        {!! $errors->first('regions_id', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>

                                </div>
                                <div class="box-footer mt20">
                                    <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
