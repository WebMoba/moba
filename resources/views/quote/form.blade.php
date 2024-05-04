<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Título de tu página</title>
        <!-- Agrega enlaces a tus estilos CSS y a Bootstrap si los estás utilizando -->
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
            <div class="box">
                <h2>Cotización</h2>
                <!-- Contenido de la primera tabla -->
                <div class="box-body col-mt-10">
                            <div class="form-group">
                                {{ Form::label('Fecha de expedición', null, ['class' => 'required']) }}
                                {{ Form::date('date_issuance', optional($quote->date_issuance)->format('y-m-d'), ['id' => 'Fecha de expedición','class' => 'form-control' . ($errors->has('date_issuance') ? ' is-invalid' : ''), 'required', 'id' => 'date_issuance','min' => now()->format('Y-m-d')]) }}
                                {!! $errors->first('date_issuance', '<div class="invalid-feedback">:message</div>') !!}

                                <small class="text-muted">Por cuestiones de seguridad este campo no es editable.</small>
                            </div>    
                            <div class="form-group">
                                {{ Form::label('Descripción', null, ['class' => 'required']) }}
                                {{ Form::text('description', $quote->description, ['id' => 'Descripción','class' => 'form-control' . ($errors->has('description') ? ' is-invalid' : ''),'required']) }}
                                {!! $errors->first('description', '<div class="invalid-feedback">:message</div>') !!}
                            </div>
                            <div class="form-group">
                                {{ Form::label('Total', null, ['class' => 'required']) }}
                                {{ Form::number('total', $quote->total, ['id' => 'Total','class' => 'form-control' . ($errors->has('total') ? ' is-invalid' : ''),'required']) }}
                                {!! $errors->first('total', '<div class="invalid-feedback">:message</div>') !!}
                            </div>
                            <div class="form-group">
                                {{ Form::label('Descuento', null, ['class' => 'required']) }}
                                {{ Form::text('discount', $quote->discount, ['id' => 'Descuento','class' => 'form-control' . ($errors->has('discount') ? ' is-invalid' : ''),'required']) }}
                                {!! $errors->first('discount', '<div class="invalid-feedback">:message</div>') !!}
                            </div>
                            <div class="form-group">
                                {{ Form::label('Estado', null, ['class' => 'required']) }}
                                {{ Form::select('status', ['aprobado' => 'Aprobado', 'rechazado' => 'Rechazado', 'pendiente' => 'Pendiente'], isset($quote->status) ? $quote->status : old('status'), ['id' => 'Estado', 'class' => 'form-control' . ($errors->has('status') ? ' is-invalid' : ''), 'required' => 'required']) }}
                                {!! $errors->first('status', '<div class="invalid-feedback">:message</div>') !!}
                            </div>

                            <div class="form-group">
                                {{ Form::label('Nombre del cliente', null, ['class' => 'required-label']) }}
                                {{ Form::select(
                                    'name',
                                    $usersName,
                                    $quote->client_name,
                                    [
                                        'class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''),
                                        'required',
                                        'placeholder' => 'Nombre del cliente',
                                        'id' => 'name',
                                    ]
                                ) }}
                                {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
                            </div>
                </div>
                
                <div class="container">
                    <div class="box-footer">
                        <button type="submit" class="btn btn-success btn-enviar">{{ __('Enviar') }}</button>
                        <a type="submit" class="btn btn-primary" href="{{ route('quotes.index') }}">Volver</a>
                    </div>
                </div>
            </div>
            <div class="box">
                <h2>Detalle Cotización</h2>
                <!-- Contenido de la segunda tabla -->
                <div class="box-body">
                    <table id="detalle-table" class="table">
                        <thead>
                            <tr>
                                <th>Servicio</th>
                                <th>Producto</th>
                                <th>Proyecto</th>
                                <th>Eliminar</th>
                                
                            </tr>
                            <!-- <tr>
                                <th>
                                    <a type="submit" class="btn btn-primary" href="{{ route('service.index') }}"> Crear Servicio </a>
                                </th>
                                <th>
                                    <a type="submit" class="btn btn-primary " href="{{ route('product.index') }}"> Crear Producto </a>
                                </th>
                                <th>
                                    <a type="submit" class="btn btn-primary " href="{{ route('projects.index') }}"> Crear Proyecto </a>
                                </th>
                            </tr> -->
                        </thead>
                        <tbody>
                            <tr>
                                <th>
                                    <div class="form-group">
                                    {{ Form::label('') }}
                                    {{ Form::select('services_id[]', $services, null, ['class' => 'form-control' . ($errors->has('services_id') ? ' is-invalid' : ''), 'required']) }}
                                    {!! $errors->first('services_id', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                </th>
                                <th>
                                    <div class="form-group">
                                    {{ Form::label('') }}
                                    {{ Form::select('products_id[]', $products, null, ['class' => 'form-control' . ($errors->has('products_id') ? ' is-invalid' : ''), 'required']) }}
                                    {!! $errors->first('products_id', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                </th>
                                <th>
                                    <div class="form-group">
                                    {{ Form::label('') }}
                                    {{ Form::select('projects_id[]', $projects, null, ['class' => 'form-control' . ($errors->has('projects_id') ? ' is-invalid' : ''), 'required']) }}
                                    {!! $errors->first('projects_id', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                </th>
                                <th>
                                    <button type="button" class="btn btn-danger mt-3 eliminar-detalle">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </th>
                            </tr>
                        </tbody>
                    </table>
                            <button type="button" id="agregarDetalle" class="btn btn-primary mt-2">Agregar detalle</button>
                </div>
            </div>
        </div>

        <script>
            document.getElementById('agregarDetalle').addEventListener('click', function() {
                var container = document.querySelector('#detalle-table tbody');
                var nuevoDetalle = container.children[0].cloneNode(true);

                // Limpiar los campos del nuevo detalle clonado
                nuevoDetalle.querySelectorAll('select').forEach(function(select) {
                    select.selectedIndex = 0;
                });

                // Agregar el nuevo detalle a la tabla
                container.appendChild(nuevoDetalle);

                // Obtener el botón de eliminar del nuevo detalle y agregar el evento de clic
                var botonEliminar = nuevoDetalle.querySelector('.eliminar-detalle');
                botonEliminar.addEventListener('click', function() {
                    // Obtén la fila a la que pertenece el botón
                    var fila = this.closest('tr');
                    
                    // Elimina la fila
                    fila.parentNode.removeChild(fila);
                });
            });
        </script>

    </body>
</html>