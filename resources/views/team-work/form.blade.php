<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('specialty') }}
            {{ Form::text('specialty', $teamWork->specialty, ['class' => 'form-control' . ($errors->has('specialty') ? ' is-invalid' : ''), 'placeholder' => 'Specialty']) }}
            {!! $errors->first('specialty', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('assigned_work') }}
            {{ Form::text('assigned_work', $teamWork->assigned_work, ['class' => 'form-control' . ($errors->has('assigned_work') ? ' is-invalid' : ''), 'placeholder' => 'Assigned Work']) }}
            {!! $errors->first('assigned_work', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('assigned_date') }}
            {{ Form::text('assigned_date', $teamWork->assigned_date, ['class' => 'form-control' . ($errors->has('assigned_date') ? ' is-invalid' : ''), 'placeholder' => 'Assigned Date']) }}
            {!! $errors->first('assigned_date', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('projects_id') }}
            {{ Form::text('projects_id', $teamWork->projects_id, ['class' => 'form-control' . ($errors->has('projects_id') ? ' is-invalid' : ''), 'placeholder' => 'Projects Id']) }}
            {!! $errors->first('projects_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>