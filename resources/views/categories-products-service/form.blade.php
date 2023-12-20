<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            {{ Form::label('Nombre') }}
            {{ Form::text('name', $categoriesProductsService->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : '')]) }}
            {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Descripcion') }}
            {{ Form::text('description', $categoriesProductsService->description, ['class' => 'form-control' . ($errors->has('description') ? ' is-invalid' : '')]) }}
            {!! $errors->first('description', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Estado (active, inactive)') }}
            {{ Form::text('status', $categoriesProductsService->status, ['class' => 'form-control' . ($errors->has('status') ? ' is-invalid' : '')]) }}
            {!! $errors->first('status', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Cantidad') }}
            {{ Form::text('quantity', $categoriesProductsService->quantity, ['class' => 'form-control' . ($errors->has('quantity') ? ' is-invalid' : '')]) }}
            {!! $errors->first('quantity', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Popular (Alta, Media, Baja)') }}
            {{ Form::text('popular', $categoriesProductsService->popular, ['class' => 'form-control' . ($errors->has('popular') ? ' is-invalid' : '')]) }}
            {!! $errors->first('popular', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Tipo (servicio, producto)') }}
            {{ Form::text('type', $categoriesProductsService->type, ['class' => 'form-control' . ($errors->has('type') ? ' is-invalid' : '')]) }}
            {!! $errors->first('type', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary"
            @if ($mode == 'Editar') onclick="return confirm('¿Está seguro de que desea {{ $mode }} esta categoria?')" @endif>{{ $mode }}</button>
    </div>
</div>
