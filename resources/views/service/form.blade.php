<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            {{ Form::label('Nombre', null, ['class' => 'required']) }}
            {{ Form::text('name', $service->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : '')]) }}
            {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Descripcion', null, ['class' => 'required']) }}
            {{ Form::text('description', $service->description, ['class' => 'form-control' . ($errors->has('description') ? ' is-invalid' : '')]) }}
            {!! $errors->first('description', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Fecha de inicio', null, ['class' => 'required']) }}
            {{ Form::date('date_start', $service->date_start ?? null, ['class' => 'form-control' . ($errors->has('date_start') ? ' is-invalid' : '')]) }}
            {!! $errors->first('date_start', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        
        <div class="form-group">
            {{ Form::label('Fecha final', null, ['class' => 'required']) }}
            {{ Form::date('date_end', $service->date_end ?? null, ['class' => 'form-control' . ($errors->has('date_end') ? ' is-invalid' : '')]) }}
            {!! $errors->first('date_end', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        
        
        <div class="form-group">
            {{ Form::label('Imagen', null, ['class' => 'required']) }}
            <br><img src="{{ asset('storage/' . $service->image) }}" width='150' height="150">
            {{ Form::file('image', ['class' => 'form-control' . ($errors->has('image') ? ' is-invalid' : '')]) }}
            {!! $errors->first('image', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Categorias', null, ['class' => 'required']) }}
            {{ Form::select('categories_products_services_id', $categories_products_service, $service->categories_products_services_id, ['class' => 'form-control' . ($errors->has('categories_products_services_id') ? ' is-invalid' : '')]) }}
            {!! $errors->first('categories_products_services_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary"
            @if ($mode == 'Editar') onclick="return confirm('¿Está seguro de que desea {{ $mode }} este servicio ?')" @endif>
            {{ $mode }}</button>
    </div>
</div>
<style>
    .required::after {
    content: "*";
    color: red;
    margin-left: 4px;
}
</style>