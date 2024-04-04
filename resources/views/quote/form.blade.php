<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Título de tu página</title>
        <!-- Agrega enlaces a tus estilos CSS y a Bootstrap si los estás utilizando -->
        <style>
            body {
                background-color: white; /* Cambia el color de fondo según sea necesario */
            }

            .container {
                display: flex;
                justify-content: space-between;
                margin: 20px; /* Agrega un margen para separar del borde del cuerpo */
            }

            .box {
                width: 48%; /* Para dejar un pequeño espacio entre las tablas */
                background-color: white; /* Fondo blanco para las tablas */
                padding: 20px; /* Agrega un relleno para separar el contenido del borde */
                border-radius: 5px; /* Agrega bordes redondeados */
            }

            /* .box-footer {
                margin-top: 20px;
                text-align: center; /* Para centrar el botón "Enviar" 
            }

            .btn-enviar {
                margin-top: 20px;
            }*/
        </style>
    </head>
    <body>

        <div class="container">
            <div class="box">
                <h2>Cotización</h2>
                <!-- Contenido de la primera tabla -->
                <div class="box-body">
                            <div class="form-group">
                                {{ Form::label('Fecha de expedición') }}
                                {{ Form::text('date_issuance', $quote->date_issuance, ['id' => 'Fecha de expedición','class' => 'form-control' . ($errors->has('date_issuance') ? ' is-invalid' : ''), 'required', 'readonly' => 'readonly', 'style' => 'background-color: #f8f9fa; cursor: not-allowed;']) }}
                                {!! $errors->first('date_issuance', '<div class="invalid-feedback">:message</div>') !!}

                                <small class="text-muted">Por cuestiones de seguridad este campo no es editable.</small>
                            </div>    
                            <div class="form-group">
                                {{ Form::label('Descripción') }}
                                {{ Form::text('description', $quote->description, ['id' => 'Descripción','class' => 'form-control' . ($errors->has('description') ? ' is-invalid' : ''),'required']) }}
                                {!! $errors->first('description', '<div class="invalid-feedback">:message</div>') !!}
                            </div>
                            <div class="form-group">
                                {{ Form::label('Total') }}
                                {{ Form::number('total', $quote->total, ['id' => 'Total','class' => 'form-control' . ($errors->has('total') ? ' is-invalid' : ''),'required']) }}
                                {!! $errors->first('total', '<div class="invalid-feedback">:message</div>') !!}
                            </div>
                            <div class="form-group">
                                {{ Form::label('Descuento') }}
                                {{ Form::text('discount', $quote->discount, ['id' => 'Descuento','class' => 'form-control' . ($errors->has('discount') ? ' is-invalid' : ''),'required']) }}
                                {!! $errors->first('discount', '<div class="invalid-feedback">:message</div>') !!}
                            </div>
                            <div class="form-group">
                                {{ Form::label('Estado') }}
                                {{ Form::select('status', [
                                    'aprobado' => 'Aprobado',
                                    'rechazado' => 'Rechazado',
                                    'pendiente' => 'Pendiente'
                                ], isset($quote->status) ? $quote->status : old('status'), ['id' => 'Estado','class' => 'form-control' . ($errors->has('status') ? ' is-invalid' : ''),'required']) }}
                                {!! $errors->first('status', '<div class="invalid-feedback">:message</div>') !!}
                            </div>
                            <div class="form-group">
                                {{ Form::label('Persona') }}
                                {{ Form::select('people_id',$persons, $quote->people_id, ['id' => 'Persona','class' => 'form-control' . ($errors->has('people_id') ? ' is-invalid' : ''),'required']) }}
                                {!! $errors->first('people_id', '<div class="invalid-feedback">:message</div>') !!}
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
                            <tr>
                                <th>
                                    <a type="submit" class="btn btn-primary" href="{{ route('service.index') }}"> Crear Servicio </a>
                                </th>
                                <th>
                                    <a type="submit" class="btn btn-primary " href="{{ route('product.index') }}"> Crear Producto </a>
                                </th>
                                <th>
                                    <a type="submit" class="btn btn-primary " href="{{ route('projects.index') }}"> Crear Proyecto </a>
                                </th>
                            </tr>
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
                                    <button class="btn btn-danger eliminar-detalle">Eliminar detalle</button>
                                </th>
                                <!-- <th>
                                    <div class="form-group">
                                    {{ Form::label('Cotización') }}
                                    {{ Form::select('quotes_id[]', $quotes, null, ['class' => 'form-control' . ($errors->has('quotes_id') ? ' is-invalid' : ''), 'required']) }}
                                    {!! $errors->first('quotes_id', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                </th> -->
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

                var botonesEliminar = document.querySelectorAll('.eliminar-detalle');

                // Agrega un evento de clic a cada botón de eliminar detalle
                botonesEliminar.forEach(function(boton) {
                    boton.addEventListener('click', function() {
                        // Obtén la fila a la que pertenece el botón
                        var fila = this.closest('tr');
                        
                        // Elimina la fila
                        fila.parentNode.removeChild(fila);
                    });

                // // Agregar botón de eliminación a la nueva fila
                // var eliminarBtn = document.createElement('button');
                // eliminarBtn.textContent = 'Eliminar';
                // eliminarBtn.classList.add('btn', 'btn-danger');
                // eliminarBtn.addEventListener('click', function() {
                //     container.removeChild(nuevoDetalle); // Eliminar la fila al hacer clic en el botón
                // });
                // nuevoDetalle.appendChild(eliminarBtn);

                // // Agregar el nuevo detalle a la tabla
                // container.appendChild(nuevoDetalle);
            });
        </script>

    </body>
</html>

// <!-- 
//     <script>
//     document.addEventListener('DOMContentLoaded', function() {
//         // Agregar evento a todos los botones con la clase "agregar"
//         var agregarBotones = document.querySelectorAll('.agregar');
//         agregarBotones.forEach(function(boton) {
//             boton.addEventListener('click', function() {
//                 // Obtener el tipo de detalle del atributo "data-tipo"
//                 var tipoDetalle = boton.getAttribute('data-tipo');
//                 // Realizar una solicitud AJAX para obtener los detalles del tipo correspondiente
//                 var xhr = new XMLHttpRequest();
//                 xhr.open('GET', '/obtener-detalle/' + tipoDetalle, true);
//                 xhr.onreadystatechange = function() {
//                     if (xhr.readyState === 4 && xhr.status === 200) {
//                         // Manejar la respuesta y agregar los detalles a la tabla
//                         var detalle = JSON.parse(xhr.responseText);
//                         agregarDetalleATabla(detalle);
//                     }
//                 };
//                 xhr.send();
//             });
//         });

//         // Función para agregar los detalles a la tabla
//         function agregarDetalleATabla(detalle) {
//             var detalleTable = document.getElementById('detalle-table').getElementsByTagName('tbody')[0];
//             var newRow = detalleTable.insertRow();
//             for (var i = 0; i < detalle.length; i++) {
//                 var cell = newRow.insertCell();
//                 cell.appendChild(document.createTextNode(detalle[i]));
//             }
//         }
//     });
// </script>

//     <!-- <script>
//     document.addEventListener('DOMContentLoaded', function() {
//         // Evento para agregar un servicio
//         document.querySelector('.agregar-servicio').addEventListener('click', function() {
//             // Lógica para agregar un servicio
//             var servicio = prompt("Ingrese el nombre del servicio:");
//             if (servicio) {
//                 // Agregar el servicio a la tabla de detalle
//                 var detalleTable = document.getElementById('detalle-table').getElementsByTagName('tbody')[0];
//                 var newRow = detalleTable.insertRow();
//                 var cell = newRow.insertCell();
//                 cell.appendChild(document.createTextNode(servicio));
//             }
//         });

//         // Evento para agregar un producto
//         document.querySelector('.agregar-producto').addEventListener('click', function() {
//             // Lógica para agregar un producto
//             var producto = prompt("Ingrese el nombre del producto:");
//             if (producto) {
//                 // Agregar el producto a la tabla de detalle
//                 var detalleTable = document.getElementById('detalle-table').getElementsByTagName('tbody')[0];
//                 var newRow = detalleTable.insertRow();
//                 var cell = newRow.insertCell();
//                 cell.appendChild(document.createTextNode(producto));
//             }
//         });

//         // Evento para agregar un proyecto
//         document.querySelector('.agregar-proyecto').addEventListener('click', function() {
//             // Lógica para agregar un proyecto
//             var proyecto = prompt("Ingrese el nombre del proyecto:");
//             if (proyecto) {
//                 // Agregar el proyecto a la tabla de detalle
//                 var detalleTable = document.getElementById('detalle-table').getElementsByTagName('tbody')[0];
//                 var newRow = detalleTable.insertRow();
//                 var cell = newRow.insertCell();
//                 cell.appendChild(document.createTextNode(proyecto));
//             }
//         });

//         // Evento para agregar una cotización
//         document.querySelector('.agregar-cotizacion').addEventListener('click', function() {
//             // Lógica para agregar una cotización
//             var cotizacion = prompt("Ingrese el nombre de la cotización:");
//             if (cotizacion) {
//                 // Agregar la cotización a la tabla de detalle
//                 var detalleTable = document.getElementById('detalle-table').getElementsByTagName('tbody')[0];
//                 var newRow = detalleTable.insertRow();
//                 var cell = newRow.insertCell();
//                 cell.appendChild(document.createTextNode(cotizacion));
//             }
//         });
//     });
// </script>                        

//         <!-- <script>
//             document.getElementById('agregarDetalle').addEventListener('click', function() {
//                 var container = document.getElementById('detalle-container');
//                 var nuevoDetalle = container.children[0].cloneNode(true);

//                 // Limpiar los campos del nuevo detalle clonado
//                 nuevoDetalle.querySelectorAll('select').forEach(function(select) {
//                     select.selectedIndex = 0;
//                 });

//                 // Agregar solo los detalles que tienen un servicio seleccionado
//                 if (nuevoDetalle.querySelector('select[name="services_id[]"]').value !== '') {
//                     container.appendChild(nuevoDetalle);
//                 }
//                 if (nuevoDetalle.querySelector('select[name="products_id[]"]').value !== '') {
//                     container.appendChild(nuevoDetalle);
//                 }
//                 if (nuevoDetalle.querySelector('select[name="projects_id[]"]').value !== '') {
//                     container.appendChild(nuevoDetalle);
//                 }
//                 if (nuevoDetalle.querySelector('select[name="quotes_id[]"]').value !== '') {
//                     container.appendChild(nuevoDetalle);
//                 }
//             });
//         </script>

//     </body>
// </html>





// <!-- <div class="container">
//     <div class="row">
//         <div class="col-md-6">
//             <div class="box box-info padding-1">
//                 <div class="box-body">
//                     <div class="form-group">
//                         {{ Form::label('Fecha de expedición') }}
//                         {{ Form::text('date_issuance', $quote->date_issuance, ['id' => 'Fecha de expedición','class' => 'form-control' . ($errors->has('date_issuance') ? ' is-invalid' : ''), 'required', 'readonly' => 'readonly', 'style' => 'background-color: #f8f9fa; cursor: not-allowed;']) }}
//                         {!! $errors->first('date_issuance', '<div class="invalid-feedback">:message</div>') !!}

//                         <small class="text-muted">Por cuestiones de seguridad este campo no es editable.</small>
//                     </div>    
//                     <div class="form-group">
//                         {{ Form::label('Descripción') }}
//                         {{ Form::text('description', $quote->description, ['id' => 'Descripción','class' => 'form-control' . ($errors->has('description') ? ' is-invalid' : ''),'required']) }}
//                         {!! $errors->first('description', '<div class="invalid-feedback">:message</div>') !!}
//                     </div>
//                     <div class="form-group">
//                         {{ Form::label('Total') }}
//                         {{ Form::number('total', $quote->total, ['id' => 'Total','class' => 'form-control' . ($errors->has('total') ? ' is-invalid' : ''),'required']) }}
//                         {!! $errors->first('total', '<div class="invalid-feedback">:message</div>') !!}
//                     </div>
//                     <div class="form-group">
//                         {{ Form::label('Descuento') }}
//                         {{ Form::text('discount', $quote->discount, ['id' => 'Descuento','class' => 'form-control' . ($errors->has('discount') ? ' is-invalid' : ''),'required']) }}
//                         {!! $errors->first('discount', '<div class="invalid-feedback">:message</div>') !!}
//                     </div>
//                     <div class="form-group">
//                         {{ Form::label('Estado') }}
//                         {{ Form::select('status', [
//                             'aprobado' => 'Aprobado',
//                             'rechazado' => 'Rechazado',
//                             'pendiente' => 'Pendiente'
//                         ], isset($quote->status) ? $quote->status : old('status'), ['id' => 'Estado','class' => 'form-control' . ($errors->has('status') ? ' is-invalid' : ''),'required']) }}
//                         {!! $errors->first('status', '<div class="invalid-feedback">:message</div>') !!}
//                     </div>
//                     <div class="form-group">
//                         {{ Form::label('Persona') }}
//                         {{ Form::select('people_id',$persons, $quote->people_id, ['id' => 'Persona','class' => 'form-control' . ($errors->has('people_id') ? ' is-invalid' : ''),'required']) }}
//                         {!! $errors->first('people_id', '<div class="invalid-feedback">:message</div>') !!}
//                     </div>
//                 </tr></div>
//             </div>
//         </div>
//         <div class="col-md-6">
//             <div class="box box-info padding-1">
//                 <div class="box-body">
//                     <tr>
//                         <th>
//                             <div class="form-group">
//                             {{ Form::label('Servicio') }}
//                             {{ Form::select('services_id[]', $services, null, ['class' => 'form-control' . ($errors->has('services_id') ? ' is-invalid' : ''), 'required']) }}
//                             {!! $errors->first('services_id', '<div class="invalid-feedback">:message</div>') !!}
//                             </div>
//                         </th>
//                         <th>
//                             <div class="form-group">
//                             {{ Form::label('Producto') }}
//                             {{ Form::select('products_id[]', $products, null, ['class' => 'form-control' . ($errors->has('products_id') ? ' is-invalid' : ''), 'required']) }}
//                             {!! $errors->first('products_id', '<div class="invalid-feedback">:message</div>') !!}
//                             </div>
//                         </th>
//                         <th>
//                             <div class="form-group">
//                             {{ Form::label('Proyecto') }}
//                             {{ Form::select('projects_id[]', $projects, null, ['class' => 'form-control' . ($errors->has('projects_id') ? ' is-invalid' : ''), 'required']) }}
//                             {!! $errors->first('projects_id', '<div class="invalid-feedback">:message</div>') !!}
//                             </div>
//                         </th>
//                         <th>
//                             <div class="form-group">
//                             {{ Form::label('Cotización') }}
//                             {{ Form::select('quotes_id[]', $quotes, null, ['class' => 'form-control' . ($errors->has('quotes_id') ? ' is-invalid' : ''), 'required']) }}
//                             {!! $errors->first('quotes_id', '<div class="invalid-feedback">:message</div>') !!}
//                             </div>
//                         </th>
//                     </tr>
//                 </div>
//             </div>
//         </div>
//     </div>
//     <div class="row">
//         <div class="col-md-12">
//             <div class="box-footer mt20">
//                 <button type="submit" class="btn btn-success">{{ __('Enviar') }}</button>
//                 <a type="submit" class="btn btn-primary" href="{{ route('quotes.index') }}">Volver</a>
//             </div>
//         </div>
//     </div>
// </div>

// <script>
//     document.getElementById('agregarDetalle').addEventListener('click', function() {
//         var container = document.getElementById('detalle-container');
//         var nuevoDetalle = container.children[0].cloneNode(true);

//         // Limpiar los campos del nuevo detalle clonado
//         nuevoDetalle.querySelectorAll('select').forEach(function(select) {
//             select.selectedIndex = 0;
//         });

//         // Agregar solo los detalles que tienen un servicio seleccionado
//         if (nuevoDetalle.querySelector('select[name="services_id[]"]').value !== '') {
//             container.appendChild(nuevoDetalle);
//         }
//     });
// </script> -->








// <!-- <script>
//     document.getElementById('agregarDetalle').addEventListener('click', function() {
//         var container = document.getElementById('detalle-container');
//         var newDetalle = container.children[0].cloneNode(true);
//         container.appendChild(newDetalle);
//     });
// </script> -->


// <!-- 
// <script>
//     $(document).ready(function() {
//         // Función para obtener opciones de select desde el servidor
//         function getOptions(endpoint, selectElement) {
//             $.ajax({
//                 url: endpoint,
//                 method: 'GET',
//                 success: function(response) {
//                     console.log(response);
//                     // Limpiar opciones existentes
//                     $(selectElement).empty();
//                     // Agregar opciones al select
//                     $.each(response, function(key, value) {
//                         $(selectElement).append('<option value="' + value.id + '">' + value.name + '</option>');
//                     });
//                 },
//                 error: function(xhr, status, error) {
//                     console.error(error);
//                 }
//             });
//         }

//         // Al hacer clic en el botón "Agregar detalle"
//         $('#agregarDetalle').click(function() {
//             // Agregar una nueva fila a la tabla
//             $('#detalle-table tbody').append(`
//                 <tr>
//                     <td>
//                         <select name="services_id[]" class="form-control services-select">
//                             <option value="">Seleccionar servicio</option>
//                         </select>
//                     </td>
//                     <td>
//                         <select name="products_id[]" class="form-control products-select">
//                             <option value="">Seleccionar producto</option>
//                         </select>
//                     </td>
//                     <td>
//                         <select name="projects_id[]" class="form-control projects-select">
//                             <option value="">Seleccionar proyecto</option>
//                         </select>
//                     </td>
//                     <td>
//                         <select name="quotes_id[]" class="form-control quotes-select">
//                             <option value="">Seleccionar cotización</option>
//                         </select>
//                     </td>
//                     <td>
//                         <button type="button" class="btn btn-danger btn-remove">Eliminar</button>
//                     </td>
//                 </tr>
//             `);

//             // Obtener opciones para cada select
//             getOptions('/api/servicess', '.services-select');
//             getOptions('/api/productss', '.products-select');
//             getOptions('/api/projectss', '.projects-select');
//             getOptions('/api/quotess', '.quotes-select');
//         });

//         // Controlar la eliminación de filas de la tabla
//         $(document).on('click', '.btn-remove', function() {
//             $(this).closest('tr').remove();
//         });
//     });
// </script> -->




// <!-- 
// <script>
//     $(document).ready(function() {
//         $('#agregarDetalle').click(function() {
//             $('#detalle-table tbody').append(`
//                 <tr>
//                     <td>
//                         <select name="services_id[]" class="form-control">
//                             -- Opciones de servicios --
//                         </select>
//                     </td>
//                     <td>
//                         <select name="products_id[]" class="form-control">
//                             <-- Opciones de productos --
//                         </select>
//                     </td>
//                     <td>
//                         <select name="projects_id[]" class="form-control">
//                             <-- Opciones de proyectos --
//                         </select>
//                     </td>
//                     <td>
//                         <select name="quotes_id[]" class="form-control">
//                             <-- Opciones de cotizaciones --
//                         </select>
//                     </td>
//                     <td>
//                         <button type="button" class="btn btn-danger btn-remove">Eliminar</button>
//                     </td>
//                 </tr>
//             `);
//         });

//         // Controlar la eliminación de filas de la tabla
//         $(document).on('click', '.btn-remove', function() {
//             $(this).closest('tr').remove();
//         });
//     });
// </script> -->


// <!-- <script>
//     document.getElementById('agregarDetalle').addEventListener('click', function() {
//         var container = document.getElementById('detalle-container');
//         var nuevoDetalle = container.children[0].cloneNode(true);

//         // Limpiar los campos del nuevo detalle clonado
//         nuevoDetalle.querySelectorAll('select').forEach(function(select) {
//             select.selectedIndex = 0;
//         });

//         // Agregar solo los detalles que tienen un servicio seleccionado
//         if (nuevoDetalle.querySelector('select[name="services_id[]"]').value !== '') {
//             container.appendChild(nuevoDetalle);
//         }
//     });
// </script> -->