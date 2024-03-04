<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            {{ Form::label('Tipo de unidad') }}
            {{ Form::select('unit_type', ['unidad' => 'Unidad', 'docena' => 'Docena', 'centena' => 'Centena', 'mil' => 'Mil'], $unit->unit_type, ['class' => 'form-control' . ($errors->has('unit_type') ? ' is-invalid' : '')]) }}
            {!! $errors->first('unit_type', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Tamaño') }}
            {{ Form::select('size', ['mm' => 'MM', 'cm' => 'CM','m' => 'M'], $unit->size, ['class' => 'form-control' . ($errors->has('size') ? ' is-invalid' : '')]) }}
            {!! $errors->first('size', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Area') }}
            {{ Form::select('area', ['cm2' => 'CM2', 'M2' => 'CM','m' => 'M'], $unit->area, ['class' => 'form-control' . ($errors->has('area') ? ' is-invalid' : '')]) }}
            {!! $errors->first('area', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary"
            @if ($mode == 'Editar') onclick="return confirm('¿Está seguro de que desea {{ $mode }} esta unidad?')" @endif>{{ $mode }}</button>
    </div>
</div>
