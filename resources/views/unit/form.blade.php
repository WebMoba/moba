<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('unit_type') }}
            {{ Form::text('unit_type', $unit->unit_type, ['class' => 'form-control' . ($errors->has('unit_type') ? ' is-invalid' : ''), 'placeholder' => 'Unit Type']) }}
            {!! $errors->first('unit_type', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('size') }}
            {{ Form::text('size', $unit->size, ['class' => 'form-control' . ($errors->has('size') ? ' is-invalid' : ''), 'placeholder' => 'Size']) }}
            {!! $errors->first('size', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('area') }}
            {{ Form::text('area', $unit->area, ['class' => 'form-control' . ($errors->has('area') ? ' is-invalid' : ''), 'placeholder' => 'Area']) }}
            {!! $errors->first('area', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>