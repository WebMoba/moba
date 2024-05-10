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
                                {{ Form::date('date_issuance', \Carbon\Carbon::now()->format('Y-m-d'), [
                                    'class' => 'form-control' . ($errors->has('date_issuance') ? ' is-invalid' : ''),
                                    'required',
                                    'min' => now()->format('Y-m-d'),
                                    'readonly' => 'readonly',
                                ]) }}
                                {!! $errors->first('date_issuance', '<div class="invalid-feedback">:message</div>') !!}
                            
                                <small class="text-muted">Por cuestiones de seguridad este campo no es editable.</small>
                            </div>
                            
                            <div class="form-group">
                                {{ Form::label('Descripción', null, ['class' => 'required']) }}
                                {{ Form::text('description', $quote->description, ['id' => 'Descripción','class' => 'form-control' . ($errors->has('description') ? ' is-invalid' : ''),'required','placeholder' => 'Descripción de la cotización']) }}
                                {!! $errors->first('description', '<div class="invalid-feedback">:message</div>') !!}
                            </div>
                            <div class="form-group">
                                {{ Form::label('Total', null, ['class' => 'required']) }}
                                {{ Form::number('total', $quote->total, ['id' => 'Total','class' => 'form-control' . ($errors->has('total') ? ' is-invalid' : ''),'required', 'placeholder' => 'Valor total de la cotización']) }}
                                {!! $errors->first('total', '<div class="invalid-feedback">:message</div>') !!}
                            </div>
                            <div class="form-group">
                                {{ Form::label('Descuento', null, ['class' => 'required']) }}
                                {{ Form::text('discount', $quote->discount, ['id' => 'Descuento','class' => 'form-control' . ($errors->has('discount') ? ' is-invalid' : ''),'required', 'placeholder' => 'Descuento en pesos']) }}
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
                                    'people_id',
                                    $persons,
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
                        <a type="submit" class="btn btn-primary" href="{{ route('quotes.index') }}"><i
                            class="bi bi-arrow-left-circle"></i></a>
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
                                    <button type="button" class="btn btn-primary mt-2 agregar-detalleS">
                                        <i class="bi bi-plus-circle-fill"></i> Agregar Servicio
                                    </button>
                                </th>
                                <th>
                                    <button type="button" class="btn btn-primary mt-2 agregar-detalleP">
                                        <i class="bi bi-plus-circle-fill"></i> Agregar Producto
                                    </button>
                                </th>
                                <th>
                                    <button type="button" class="btn btn-primary mt-2 agregar-detallePj">
                                        <i class="bi bi-plus-circle-fill"></i> Agregar Proyecto
                                    </button>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="form-group" id="select-service">
                                        {{ Form::label('') }}
                                        {{ Form::select('services_id[]', $services, null, ['class' => 'form-control' . ($errors->has('services_id') ? ' is-invalid' : '')]) }}
                                        {!! $errors->first('services_id', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                    <button type="button" class="btn btn-danger mt-3 eliminar-detalleS">
                                        <i class="fas fa-trash-alt"></i> Eliminar
                                    </button>
                                </td>
                                <td>
                                    <div class="form-group" id="select-product">
                                        {{ Form::label('') }}
                                        {{ Form::select('products_id[]', $products, null, ['class' => 'form-control' . ($errors->has('products_id') ? ' is-invalid' : '')]) }}
                                        {!! $errors->first('products_id', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                    <button type="button" class="btn btn-danger mt-3 eliminar-detalleP">
                                        <i class="fas fa-trash-alt"></i> Eliminar
                                    </button>
                                </td>
                                <td>
                                    <div class="form-group" id="select-project">
                                        {{ Form::label('') }}
                                        {{ Form::select('projects_id[]', $projects, null, ['class' => 'form-control' . ($errors->has('projects_id') ? ' is-invalid' : '')]) }}
                                        {!! $errors->first('projects_id', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                    <button type="button" class="btn btn-danger mt-3 eliminar-detallePj">
                                        <i class="fas fa-trash-alt"></i> Eliminar
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            
            <script>

                document.querySelectorAll('.agregar-detalleS').addEventListener('click', function() {
                    var container = document.querySelector('#select-service');
                    var nuevoDetalle = container.children[0].cloneNode(true);
    
                    // Limpiar los campos del nuevo detalle clonado
                    nuevoDetalle.querySelectorAll('select').forEach(function(select) {
                        select.selectedIndex = 0;
                    });
                    container.appendChild(nuevoDetalle);
                });

                var botonEliminar = nuevoDetalle.querySelector('.eliminar-detalleS');
                    botonEliminar.addEventListener('click', function() {
                        // Obtén la fila a la que pertenece el botón
                        var fila = this.closest('td');
                        
                        // Elimina la fila
                        fila.parentNode.removeChild(fila);
                    });

            
                document.querySelectorAll('.agregar-detalleP').addEventListener('click', function() {
                    var container = document.querySelector('#select-product');
                    var nuevoDetalle = container.children[0].cloneNode(true);
    
                    // Limpiar los campos del nuevo detalle clonado
                    nuevoDetalle.querySelectorAll('select').forEach(function(select) {
                        select.selectedIndex = 0;
                    });
                    container.appendChild(nuevoDetalle);
                });

                var botonEliminar = nuevoDetalle.querySelector('.eliminar-detalleP');
                    botonEliminar.addEventListener('click', function() {
                        // Obtén la fila a la que pertenece el botón
                        var fila = this.closest('td');
                        
                        // Elimina la fila
                        fila.parentNode.removeChild(fila);
                    });

            
                document.querySelectorAll('.agregar-detallePj').addEventListener('click', function() {
                    var container = document.querySelector('#select-project');
                    var nuevoDetalle = container.children[0].cloneNode(true);
    
                    // Limpiar los campos del nuevo detalle clonado
                    nuevoDetalle.querySelectorAll('select').forEach(function(select) {
                        select.selectedIndex = 0;
                    });
                    container.appendChild(nuevoDetalle);
                });

                var botonEliminar = nuevoDetalle.querySelector('.eliminar-detallePj');
                    botonEliminar.addEventListener('click', function() {
                        // Obtén la fila a la que pertenece el botón
                        var fila = this.closest('td');
                        
                        // Elimina la fila
                        fila.parentNode.removeChild(fila);
                    });

                /*
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
                */
            </script>
            

    </body>
</html>