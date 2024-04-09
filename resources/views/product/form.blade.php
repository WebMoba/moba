<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            {{ Form::label('Nombre', null, ['class' => 'required']) }}
            {{ Form::text('name', $product->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : '')]) }}
            {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Imagen', null,['class' => 'required']) }}
            <br><img src="{{ asset('storage/' . $product->image) }}" width="150" height="150">
            {{ Form::file('image', ['class' => 'form-control' . ($errors->has('image') ? ' is-invalid' : '')]) }}
            {!! $errors->first('image', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Cantidad', null, ['class' => 'required']) }}
            {{ Form::text('quantity', $product->quantity, ['class' => 'form-control' . ($errors->has('quantity') ? ' is-invalid' : '')]) }}
            {!! $errors->first('quantity', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Precio', null, ['class' => 'required']) }}
            {{ Form::text('price', $product->price, ['class' => 'form-control' . ($errors->has('price') ? ' is-invalid' : '')]) }}
            {!! $errors->first('price', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Unidad', null, ['class' => 'required']) }}
            {{ Form::select('units_id', $units, $product->units_id, ['class' => 'form-control' . ($errors->has('units_id') ? ' is-invalid' : '')]) }}
            {!! $errors->first('units_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>       
        <div class="form-group">
            {{ Form::label('Categoria', null, ['class' => 'required']) }}
            {{ Form::select('categories_products_services_id', $categories_products_service, $product->categories_products_services_id, ['class' => 'form-control' . ($errors->has('categories_products_services_id') ? ' is-invalid' : '')]) }}
            {!! $errors->first('categories_products_services_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary"
            @if ($mode == 'Editar') onclick="return confirm('¿Está seguro de que desea {{ $mode }} el producto?')" @endif>{{ $mode }}</button>
    </div>
</div>
<style>
    .required::after {
    content: "*";
    color: red;
    margin-left: 4px;
}
</style>