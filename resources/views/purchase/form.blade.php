<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            {{ Form::label('Nombre') }}
            {{ Form::text('name', $purchase->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Name', 'required']) }}
            {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group">
            {{ Form::label('Fecha') }}
            {{ Form::text('date', $purchase->date, ['class' => 'form-control' . ($errors->has('date') ? ' is-invalid' : ''), 'required', 'placeholder' => 'Date', 'disabled' => $purchase->exists, 'style' => 'background-color: #f8f9fa; cursor: not-allowed;']) }}
            {!! $errors->first('date', '<div class="invalid-feedback">:message</div>') !!}

            <small class="text-muted">Por cuestiones de seguridad este campo no es editable.</small>
        </div>

        <div class="form-group">
            {{ Form::label('Documento') }}
            {{ Form::select('people_id', $people, $purchase->people_id, ['class' => 'form-control' . ($errors->has('people_id') ? ' is-invalid' : '')]) }}
            {!! $errors->first('people_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>

</div>

<h1>Detalle de compra</h1>


<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            {{ Form::label('Cantidad') }}
            {{ Form::number('quantity',  null, ['class' => 'form-control' . ($errors->has('quantity') ? ' is-invalid' : '')]) }}
            {!! $errors->first('quantity', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group">
            {{ Form::label('materials_raws_id') }}
            {{ Form::select('materials_raws_id', $materialsRaws, $purchase->materials_raws_id, ['class' => 'form-control' . ($errors->has('materials_raws_id') ? ' is-invalid' : '')]) }}
            {!! $errors->first('materials_raws_id', '<div class="invalid-feedback">:message</div>') !!}
            </div>


    </div>
    <div class="box-footer mt20 my-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
        <a class="btn btn-primary" href="{{ route('purchases.index') }}">
            {{ __('Back') }}</a>
    </div>
</div>
