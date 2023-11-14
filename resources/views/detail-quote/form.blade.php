<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('services_id') }}
            {{ Form::text('services_id', $detailQuote->services_id, ['class' => 'form-control' . ($errors->has('services_id') ? ' is-invalid' : ''), 'placeholder' => 'Services Id']) }}
            {!! $errors->first('services_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('products_id') }}
            {{ Form::text('products_id', $detailQuote->products_id, ['class' => 'form-control' . ($errors->has('products_id') ? ' is-invalid' : ''), 'placeholder' => 'Products Id']) }}
            {!! $errors->first('products_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('projects_id') }}
            {{ Form::text('projects_id', $detailQuote->projects_id, ['class' => 'form-control' . ($errors->has('projects_id') ? ' is-invalid' : ''), 'placeholder' => 'Projects Id']) }}
            {!! $errors->first('projects_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('quotes_id') }}
            {{ Form::text('quotes_id', $detailQuote->quotes_id, ['class' => 'form-control' . ($errors->has('quotes_id') ? ' is-invalid' : ''), 'placeholder' => 'Quotes Id']) }}
            {!! $errors->first('quotes_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>