<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Título de tu página</title>
    <style>
        .required::after {
            content: "*";
            color: red;
            margin-left: 4px;
        }
    </style>
</head>
<body>
    <div class="container">
        <form method="POST" action="{{ route('quotes.store') }}">
            @csrf
            <div class="box">
                <h2>Cotización</h2>
                <!-- Contenido de la primera tabla -->
                <div class="box-body col-mt-10">
                    <div class="form-group col-md-3">
                        {{ Form::label('Fecha de expedición', null, ['class' => 'required']) }}
                        {{ Form::date('date_issuance', \Carbon\Carbon::now()->format('Y-m-d'), [
                            'class' => 'form-control' . ($errors->has('date_issuance') ? ' is-invalid' : ''),
                            'required',
                            'min' => now()->format('Y-m-d'),
                            'readonly' => 'readonly',
                        ]) }}
                        {!! $errors->first('date_issuance', '<div class="invalid-feedback">:message</div>') !!}
                        <small class="text-muted">Este campo no es editable.</small>
                    </div>
                    <div class="form-group">
                        {{ Form::label('Descripción', null, ['class' => 'required']) }}
                        {{ Form::text('description', old('description'), ['id' => 'Descripción', 'class' => 'form-control' . ($errors->has('description') ? ' is-invalid' : ''), 'required', 'placeholder' => 'Descripción de la cotización']) }}
                        {!! $errors->first('description', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                    <div class="form-group">
                        {{ Form::label('Total', null, ['class' => 'required']) }}
                        {{ Form::number('total', old('total'), ['id' => 'Total', 'class' => 'form-control' . ($errors->has('total') ? ' is-invalid' : ''), 'required', 'placeholder' => 'Valor total de la cotización']) }}
                        {!! $errors->first('total', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                    <div class="form-group">
                        {{ Form::label('Descuento', null, ['class' => 'required']) }}
                        {{ Form::text('discount', old('discount'), ['id' => 'Descuento', 'class' => 'form-control' . ($errors->has('discount') ? ' is-invalid' : ''), 'required', 'placeholder' => 'Descuento en pesos']) }}
                        {!! $errors->first('discount', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                    <div class="form-group">
                        {{ Form::label('Estado', null, ['class' => 'required']) }}
                        {{ Form::select('status', ['aprobado' => 'Aprobado', 'rechazado' => 'Rechazado', 'pendiente' => 'Pendiente'], old('status'), ['id' => 'Estado', 'class' => 'form-control' . ($errors->has('status') ? ' is-invalid' : ''), 'required']) }}
                        {!! $errors->first('status', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                    <div class="form-group">
                        {{ Form::label('Nombre del cliente', null, ['class' => 'required-label']) }}
                        {{ Form::select('people_id', $persons, old('people_id'), ['class' => 'form-control' . ($errors->has('people_id') ? ' is-invalid' : ''), 'required', 'placeholder' => 'Nombre del cliente', 'id' => 'name']) }}
                        {!! $errors->first('people_id', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                </div>
                <div class="container">
                    <div class="box-footer">
                        <button type="submit" class="btn btn-success btn-enviar"><i class="bi bi-plus-circle"></i><span class="tooltiptext">Crear</span></button>
                        <a type="submit" class="btn btn-primary" href="{{ route('quotes.index') }}"><i class="bi bi-arrow-left-circle"></i><span class="tooltiptext">Volver</span></a>
                    </div>
                </div>
            </div>
            <div class="box">
                <h2>Detalle Cotización</h2>
                <div class="box-body">
                    <table id="detalle-table" class="table">
                        <thead>
                            <tr>
                                <th>Servicio</th>
                                <th>Producto</th>
                                <th>Proyecto</th>
                            </tr>
                            <tr>
                                <th>
                                    <button type="button" class="btn btn-primary mt-2" onclick="agregarDetalle('service')">
                                        <i class="bi bi-plus-circle-fill"></i> Agregar Servicio
                                    </button>
                                </th>
                                <th>
                                    <button type="button" class="btn btn-primary mt-2" onclick="agregarDetalle('product')">
                                        <i class="bi bi-plus-circle-fill"></i> Agregar Producto
                                    </button>
                                </th>
                                <th>
                                    <button type="button" class="btn btn-primary mt-2" onclick="agregarDetalle('project')">
                                        <i class="bi bi-plus-circle-fill"></i> Agregar Proyecto
                                    </button>
                                </th>
                            </tr>
                        </thead>
                        <tbody id="detalle-body">
                            <tr>
                                <td id="service-column"></td>
                                <td id="product-column"></td>
                                <td id="project-column"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </form>
    </div>

    <script>
        function agregarDetalle(type) {
            var columnId = type + '-column';
            var column = document.getElementById(columnId);
            var div = createNewDetail(type);
            column.appendChild(div);
        }

        function createNewDetail(type) {
            var div = document.createElement('div');
            div.className = type;
            div.id = 'select-' + type;

            var formGroup = document.createElement('div');
            formGroup.className = 'form-group';

            var select = document.createElement('select');
            select.className = 'form-control';
            select.name = type + 's_id[]';
            select.innerHTML = getOptions(type);

            var button = document.createElement('button');
            button.type = 'button';
            button.className = 'btn btn-danger mt-3 eliminar-detalle';
            button.innerHTML = '<i class="fas fa-trash-alt"></i> Eliminar';
            button.onclick = function () {
                eliminarDetalle(div);
            };

            formGroup.appendChild(select);
            div.appendChild(formGroup);
            div.appendChild(button);

            return div;
        }

        function getOptions(type) {
            var options = '';
            if (type === 'service') {
                options = `{!! $services->map(function($name, $id) { return "<option value=\"$id\">$name</option>"; })->implode('') !!}`;
            } else if (type === 'product') {
                options = `{!! $products->map(function($name, $id) { return "<option value=\"$id\">$name</option>"; })->implode('') !!}`;
            } else if (type === 'project') {
                options = `{!! $projects->map(function($name, $id) { return "<option value=\"$id\">$name</option>"; })->implode('') !!}`;
            }
            return options;
        }

        function eliminarDetalle(div) {
            div.remove();
        }
    </script>

    @extends('layouts.alerts')
</body>
</html>
