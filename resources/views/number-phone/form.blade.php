<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('number') }}
            {{ Form::text('number', $numberPhone->number, ['class' => 'form-control' . ($errors->has('number') ? ' is-invalid' : ''), 'placeholder' => 'Number']) }}
            {!! $errors->first('number', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary" onclick="return confirm('¿Está seguro de que desea crear numero telefonico?')">{{ __('Enviar') }}</button>
    </div>
</div>