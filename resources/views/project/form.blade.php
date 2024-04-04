<div class="box box-info padding-1">
    <div class="box-body">
        <div class="form-group">
            {{Form::label('Nombre')}}
            {{Form::text ('name',$project->name, ['class' => 'form-control' . ($errors->has('name') ? 'is-invalid':''),'required'])}}
            {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Descripción</label>
            <textarea class="form-control" name="description" required id="description" rows="3">{{ isset($project->description) ? $project->description : old('description')}}</textarea>
        </div>

        <div class="form-group">
            {{ Form::label('Fecha de inicio') }}
            {{ Form::date('date_start', $project->date_start, ['class' => 'form-control' . ($errors->has('date_start') ? ' is-invalid' : ''), 'required', 'readonly' => 'readonly', 'style' => 'background-color: #f8f9fa; cursor: not-allowed;','id' => 'date_start' ]) }}
            {!! $errors->first('date_start', '<div class="invalid-feedback">:message</div>') !!}

            <small class="text-muted">Por cuestiones de seguridad este campo no es editable.</small>
        </div>
        
        <div class="form-group">
            {{ Form::label('Fecha de finalización') }}
            {{ Form::date('date_end', $project->date_end, ['class' => 'form-control' . ($errors->has('date_end') ? ' is-invalid' : ''), 'required', 'disabled' => $project-> exists, 'style' => 'background-color: #f8f9fa; cursor: allowed;','id' => 'date_end']) }}
            {!! $errors->first('date_end', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            <label for="status">Estado</label>
            <select name="status" id="status" required class="form-select">
                <option value="en curso" {{ isset($project->status) && $project->importance_range === 'en curso' ? 'selected' : '' }}>En curso</option>
                <option value="finalizado" {{ isset($project->status) && $project->importance_range === 'finalizado' ? 'selected' : '' }}>Finalizado</option>
                <option value="pausado" {{ isset($project->status) && $project->importance_range === 'pausado' ? 'selected' : '' }}>Pausado</option>
                <option value="pendiente" {{ isset($project->status) && $project->importance_range === 'pendiente' ? 'selected' : '' }}>Pendiente</option>
            </select>
        </div>
        <br>
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-success">{{ __('Enviar') }}</button>
        <a type="submit" class="btn btn-primary" href="{{ route('projects.index') }}">Volver</a>
    </div>
</div>