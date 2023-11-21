<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="mb-3">
            <label for="specialty" class="form-label">Especialidad</label>
            <textarea class="form-control" name="specialty" id="specialty" rows="3">{{ isset($project->specialty) ? $project->specialty : old('specialty') }}</textarea>
        </div>
        <div class="form-group">
            <label for="assigned_work">Trabajo asignado</label>
            <input type="text" class="form-control" name="assigned_work" id="assigned_work" value="{{ isset($project->assigned_work)?$project->assigned_work:old('assigned_work')}}">
        </div>
        <div class="form-group">
            <label for="assigned_date">Fecha asignada</label>
            <input type="date" class="form-control" name="assigned_date" id="assigned_date" value="{{ isset($project->assigned_date)?$project->assigned_date:old('assigned_date')}}">
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