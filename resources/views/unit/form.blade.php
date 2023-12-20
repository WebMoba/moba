<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            {{ Form::label('Tipo de unidad (unidad, docena, centena, mil)') }}
            {{ Form::text('unit_type', $unit->unit_type, ['class' => 'form-control' . ($errors->has('unit_type') ? ' is-invalid' : '')]) }}
            {!! $errors->first('unit_type', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Tamaño (mm, cm, m)') }}
            {{ Form::text('size', $unit->size, ['class' => 'form-control' . ($errors->has('size') ? ' is-invalid' : '')]) }}
            {!! $errors->first('size', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Area (cm2, m2)') }}
            {{ Form::text('area', $unit->area, ['class' => 'form-control' . ($errors->has('area') ? ' is-invalid' : '')]) }}
            {!! $errors->first('area', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary"
            @if ($mode == 'Editar') onclick="return confirm('¿Está seguro de que desea {{ $mode }} esta unidad?')" @endif>{{ $mode }}</button>
    </div>
</div>
