<div class="box box-small">
    <h2>Compra</h2>
    <div class="box-body">
        <div class="form-group">
            {{ Form::label('Nombre del proveedor') }}
            {{ Form::text('name', $purchase->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Name']) }}
            {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group">
            {{ Form::label('Fecha') }}
            {{ Form::text('date', $purchase->date, ['class' => 'form-control' . ($errors->has('date') ? ' is-invalid' : ''), 'required', 'placeholder' => 'Date', 'readonly' => true, 'style' => 'background-color: #f8f9fa; cursor: not-allowed;']) }}
            {!! $errors->first('date', '<div class="invalid-feedback">:message</div>') !!}

            <small class="text-muted">Por cuestiones de seguridad este campo no es editable.</small>
        </div>

        <div class="form-group">
            {{ Form::label('Documento y dirección del proveedor') }}
            {{ Form::select('people_id', $people, $purchase->people_id, ['class' => 'form-control' . ($errors->has('people_id') ? ' is-invalid' : ''), 'placeholder' => 'Seleccione un proveedor']) }}
            {!! $errors->first('people_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
    </div>
    <div class="box-footer">
    <button type="button" class="btn btn-success" onclick="enviarDetalles()">Enviar</button>
    <a type="submit" class="btn btn-primary" href="{{ route('purchases.index') }}">Volver</a>
</div>
</div>
