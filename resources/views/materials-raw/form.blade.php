<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            {{ Form::label('Nombre') }}
            {{ Form::text('name', $materialsRaw->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Name', 'required']) }}
            {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Cantidad existente') }}
            {{ Form::text('existing_quantity', $materialsRaw->existing_quantity, ['class' => 'form-control' . ($errors->has('existing_quantity') ? ' is-invalid' : ''), 'placeholder' => 'Existing Quantity', 'required']) }}
            {!! $errors->first('existing_quantity', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Tipo de unidad') }}
            {{ Form::select('units_id', $units, $materialsRaw->units_id ?? 'Sin tipo de unidad', ['class' => 'form-control' . ($errors->has('units_id') ? ' is-invalid' : '')]) }}
            {!! $errors->first('units_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20 my-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>

        <a class="btn btn-primary" href="{{ route('materials_raws.index') }}">
            {{ __('Back') }}</a>

    </div>

</div>
