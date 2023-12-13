<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('Fecha de expedición') }}
            {{ Form::date('date_issuance', $quote->date_issuance, ['class' => 'form-control' . ($errors->has('date_issuance') ? ' is-invalid' : '')]) }}
            {!! $errors->first('date_issuance', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Descripción') }}
            {{ Form::text('description', $quote->description, ['class' => 'form-control' . ($errors->has('description') ? ' is-invalid' : '')]) }}
            {!! $errors->first('description', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Total') }}
            {{ Form::text('total', $quote->total, ['class' => 'form-control' . ($errors->has('total') ? ' is-invalid' : '')]) }}
            {!! $errors->first('total', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Descuento') }}
            {{ Form::text('discount', $quote->discount, ['class' => 'form-control' . ($errors->has('discount') ? ' is-invalid' : '')]) }}
            {!! $errors->first('discount', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Estado') }}
            {{ Form::select('status', [
                'aprobado' => 'Aprobado',
                'rechazado' => 'Rechazado',
                'pendiente' => 'Pendiente'
            ], isset($quote->status) ? $quote->status : old('status'), ['class' => 'form-control' . ($errors->has('status') ? ' is-invalid' : '')]) }}
            {!! $errors->first('status', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Persona') }}
            {{ Form::select('people_id',$peoples, $quote->people_id, ['class' => 'form-control' . ($errors->has('people_id') ? ' is-invalid' : '')]) }}
            {!! $errors->first('people_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
            <br>
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-success">{{ __('Enviar') }}</button>
        <a type="submit" class="btn btn-primary" href="{{ route('quotes.index') }}">Volver</a>
    </div>
</div>