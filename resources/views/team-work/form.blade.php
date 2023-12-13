<div class="box box-info padding-1">
    <div class="box-body">
        <div class="form-group">
            {{ Form::label('Especialidad') }}
            {{ Form::text('specialty', $teamWork->specialty, ['class' => 'form-control' . ($errors->has('specialty') ? ' is-invalid' : '')]) }}
            {!! $errors->first('specialty', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group">
            {{ Form::label('Trabajo asignado') }}
            {{ Form::text('assigned_work', $teamWork->assigned_work, ['class' => 'form-control' . ($errors->has('assigned_work') ? ' is-invalid' : '')]) }}
            {!! $errors->first('assigned_work', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group">
            {{ Form::label('Fecha asignada') }}
            {{ Form::date('assigned_date', $teamWork->assigned_date, ['class' => 'form-control' . ($errors->has('assigned_date') ? ' is-invalid' : '')]) }}
            {!! $errors->first('assigned_date', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group">
            {{ Form::label('Proyecto') }}
            {{ Form::select('projects_id',$projects, $teamWork->projects_id, ['class' => 'form-control' . ($errors->has('projects_id') ? ' is-invalid' : ''),]) }}
            {!! $errors->first('projects_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <br>
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-success">{{ __('Enviar') }}</button>
        <a type="submit" class="btn btn-primary" href="{{ route('team-works.index') }}">Volver</a>
    </div>
</div>