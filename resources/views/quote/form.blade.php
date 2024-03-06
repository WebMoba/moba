<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            {{ Form::label('Fecha de expedición') }}
            {{ Form::text('date_issuance', $quote->date_issuance, ['class' => 'form-control' . ($errors->has('date_issuance') ? ' is-invalid' : ''), 'required', 'readonly' => 'readonly', 'style' => 'background-color: #f8f9fa; cursor: not-allowed;']) }}
            {!! $errors->first('date_issuance', '<div class="invalid-feedback">:message</div>') !!}

            <small class="text-muted">Por cuestiones de seguridad este campo no es editable.</small>
        </div>    
        <div class="form-group">
            {{ Form::label('Descripción') }}
            {{ Form::text('description', $quote->description, ['class' => 'form-control' . ($errors->has('description') ? ' is-invalid' : ''),'required']) }}
            {!! $errors->first('description', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Total') }}
            {{ Form::number('total', $quote->total, ['class' => 'form-control' . ($errors->has('total') ? ' is-invalid' : ''),'required']) }}
            {!! $errors->first('total', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Descuento') }}
            {{ Form::text('discount', $quote->discount, ['class' => 'form-control' . ($errors->has('discount') ? ' is-invalid' : ''),'required']) }}
            {!! $errors->first('discount', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Estado') }}
            {{ Form::select('status', [
                'aprobado' => 'Aprobado',
                'rechazado' => 'Rechazado',
                'pendiente' => 'Pendiente'
            ], isset($quote->status) ? $quote->status : old('status'), ['class' => 'form-control' . ($errors->has('status') ? ' is-invalid' : ''),'required']) }}
            {!! $errors->first('status', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Persona') }}
            {{ Form::select('people_id',$persons, $quote->people_id, ['class' => 'form-control' . ($errors->has('people_id') ? ' is-invalid' : ''),'required']) }}
            {!! $errors->first('people_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Servicio') }}
            {{ Form::select('services_id',$services, $quote->services_id, ['class' => 'form-control' . ($errors->has('services_id') ? ' is-invalid' : ''),'required']) }}
            {!! $errors->first('services_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Producto') }}
            {{ Form::select('products_id',$products, $quote->products_id, ['class' => 'form-control' . ($errors->has('products_id') ? ' is-invalid' : ''),'required']) }}
            {!! $errors->first('products_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Proyecto') }}
            {{ Form::select('projects_id',$projects , $quote->projects_id, ['class' => 'form-control' . ($errors->has('projects_id') ? ' is-invalid' : ''),'required']) }}
            {!! $errors->first('projects_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Cotización') }}
            {{ Form::select('quotes_id',$quotes, $quote->quotes_id, ['class' => 'form-control' . ($errors->has('quotes_id') ? ' is-invalid' : ''),'required']) }}
            {!! $errors->first('quotes_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
            <br>
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-success">{{ __('Enviar') }}</button>
        <a type="submit" class="btn btn-primary" href="{{ route('quotes.index') }}">Volver</a>
    </div>
</div>