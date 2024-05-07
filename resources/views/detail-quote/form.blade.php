<div class="box box-info padding-1">
    <div class="box-body">
        @if (count($errors) > 0)
            <div class="alert alert-danger" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="form-group">
            {{ Form::label('Servicio') }}
            {{ Form::select('services_id', $services, $detailQuote->services_id, ['class' => 'form-control' . ($errors->has('services_id') ? ' is-invalid' : ''), 'required']) }}
            {!! $errors->first('services_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Producto') }}
            {{ Form::select('products_id', $products, $detailQuote->products_id, ['class' => 'form-control' . ($errors->has('products_id') ? ' is-invalid' : ''), 'required']) }}
            {!! $errors->first('products_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Proyecto') }}
            {{ Form::select('projects_id', $projects, $detailQuote->projects_id, ['class' => 'form-control' . ($errors->has('projects_id') ? ' is-invalid' : ''), 'required']) }}
            {!! $errors->first('projects_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Cotización') }}
            {{ Form::select('quotes_id', $quotes, $detailQuote->quotes_id, ['class' => 'form-control' . ($errors->has('quotes_id') ? ' is-invalid' : ''), 'required']) }}
            {!! $errors->first('quotes_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
    </div>
    <br>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>
