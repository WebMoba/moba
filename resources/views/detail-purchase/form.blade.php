<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            {{ Form::label('Cantidad') }}
            {{ Form::text('quantity', $detailPurchase->quantity, ['class' => 'form-control' . ($errors->has('quantity') ? ' is-invalid' : ''), 'placeholder' => 'Quantity', 'required']) }}
            {!! $errors->first('quantity', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Precio unitario') }}
            {{ Form::text('price_unit', $detailPurchase->price_unit, ['class' => 'form-control' . ($errors->has('price_unit') ? ' is-invalid' : ''), 'placeholder' => 'Price Unit', 'required']) }}
            {!! $errors->first('price_unit', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Subtotal') }}
            {{ Form::text('subtotal', $detailPurchase->subtotal ?? '0', ['class' => 'form-control' . ($errors->has('subtotal') ? ' is-invalid' : ''), 'placeholder' => 'Subtotal']) }}
            {!! $errors->first('subtotal', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Descuento') }}
            {{ Form::text('discount', $detailPurchase->discount ?? '0', ['class' => 'form-control' . ($errors->has('discount') ? ' is-invalid' : ''), 'placeholder' => 'Discount']) }}
            {!! $errors->first('discount', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Total') }}
            {{ Form::text('total', $detailPurchase->total, ['class' => 'form-control' . ($errors->has('total') ? ' is-invalid' : ''), 'placeholder' => 'Total', 'required']) }}
            {!! $errors->first('total', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Nombre de materia prima') }}
            {{ Form::select('materials_raws_id', $materialsRaws, $detailPurchase->materials_raws_id, ['class' => 'form-control' . ($errors->has('materials_raws_id') ? ' is-invalid' : '')]) }}
            {!! $errors->first('materials_raws_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Nombre de compra') }}
            {{ Form::select('purchases_id', $purchases, $detailPurchase->purchases_id, ['class' => 'form-control' . ($errors->has('purchases_id') ? ' is-invalid' : '')]) }}
            {!! $errors->first('purchases_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>
