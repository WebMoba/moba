<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            <label for="name">Nombre</label>
            <input type="text" class="form-control" name="name" id="name" value="{{ isset($project->name)?$project->name:old('name')}}">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Descripción</label>
            <textarea class="form-control" name="description" id="description" rows="3">{{ isset($project->description) ? $project->description : old('description') }}</textarea>
        </div>
        <div class="form-group">
            <label for="date_start">Fecha de inicio</label>
            <input type="date" class="form-control" name="date_start" id="date_start" value="{{ isset($project->date_start)?$project->date_start:old('date_start')}}">
        </div>
        <div class="form-group">
            <label for="date_end">Fecha de finalización</label>
            <input type="date" class="form-control" name="date_end" id="date_end" value="{{ isset($project->date_end)?$project->date_end:old('date_end')}}">
        </div>
        <div class="form-group">
            <label for="status">Estado</label>
            <select name="status" id="status" class="form-select">
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