    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Título de tu página</title>
        <!-- Agrega enlaces a tus estilos CSS y a Bootstrap si los estás utilizando -->
        <style>
            body {
                background-color: white;
                /* Cambia el color de fondo según sea necesario */
            }

            .container {
                display: flex;
                justify-content: space-between;
                margin: 20px;
            }

            .box {
                width: 48%;
                background-color: white;
                padding: 20px;
                border-radius: 5px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                /* Agrega una sombra suave */
            }

            .box-small {
                width: 30%
            }

            .box-large {
                width: 70%;

                min-width: 1000px;
            }

            .box-body {
                margin-bottom: 20px;
            }

            .box-body {
                margin-bottom: 20px;
            }

            .box-footer {
                text-align: center;
            }


            #detalle-table th,
            #detalle-table td {
                /* Ancho de columna predeterminado */
                padding: 8px;
                text-align: center;
            }

            #detalle-table th:nth-child(1),
            #detalle-table td:nth-child(1) {
                width: 250px;
                /* Ancho para la columna "Producto" */
                text-align: left;
            }

            #detalle-table th:nth-child(2),
            #detalle-table td:nth-child(2) {
                width: 120px;
                /* Ancho para la columna "Cantidad" */
            }

            #detalle-table th:nth-child(3),
            #detalle-table td:nth-child(3) {
                width: 120px;
                /* Ancho para la columna "Precio Unidad" */
            }

            #detalle-table th:nth-child(4),
            #detalle-table td:nth-child(4) {
                width: 120px;
                /* Ancho para la columna "Subtotal" */
            }

            #detalle-table th:nth-child(5),
            #detalle-table td:nth-child(5) {
                width: 120px;
                /* Ancho para la columna "Descuento" */
            }

            #detalle-table th:nth-child(6),
            #detalle-table td:nth-child(6) {
                width: 120px;
                /* Ancho para la columna "Total" */
            }

            #detalle-table th:nth-child(7),
            #detalle-table td:nth-child(7) {
                width: 120px;
                /* Ancho para la columna "Id Venta" */
            }

            #detalle-table th:nth-child(8),
            #detalle-table td:nth-child(8) {
                width: 120px;
                /* Ancho para la columna de botones */
            }
        </style>
    </head>

    <body>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


        <div class="container">
            <div class="box box-small mt-2">
                <H2>Formulario de Venta</H2>

                <!-- contenido de la primera tabla "ventas" -->
                <form method="POST" action="{{ route('sales.store') }}">
                    @csrf
                    <div class="box-body mt-5 ">

                        <div class="form-group">

                            <label for="people_id">Nombre Cliente</label>
                            <select name="people_id"
                                class="form-control{{ $errors->has('people_id') ? ' is-invalid' : '' }}">
                                @foreach ($people as $personId => $personName)
                                    <option value="{{ $personId }}">{{ $personName }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('people_id'))
                                <div class="invalid-feedback">{{ $errors->first('people_id') }}</div>
                            @endif
                        </div>


                    </div>

                    <div class="form-group">
                        <label for="people_id">Id Cliente</label>
                        <select name="people_id"
                            class="form-control{{ $errors->has('people_id') ? ' is-invalid' : '' }}">
                            @foreach ($people as $idCard => $personName)
                                <option value="{{ $idCard }}">{{ $idCard }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('people_id'))
                            <div class="invalid-feedback">{{ $errors->first('people_id') }}</div>
                        @endif
                    </div>


                    <div class="form-group">
                        <label for="date">Fecha Venta</label>
                        <input type="date" name="date"
                            class="form-control{{ $errors->has('date') ? ' is-invalid' : '' }}"
                            placeholder="Fecha Venta" min="{{ now()->format('Y-m-d') }}">
                        @if ($errors->has('date'))
                            <div class="invalid-feedback">{{ $errors->first('date') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="quotes_id">Id Cotización</label>
                        <input type="text" name="quotes_id"
                            class="form-control{{ $errors->has('quotes_id') ? ' is-invalid' : '' }}"
                            placeholder="Id Cotización">
                        @if ($errors->has('quotes_id'))
                            <div class="invalid-feedback">{{ $errors->first('quotes_id') }}</div>
                        @endif
                    </div>


                    <div class="box-footer mt-3">
                        <button type="submit" class="btn btn-success btn-enviar">{{ __('Enviar') }}</button>
                        <a type="submit" class="btn btn-primary" href="{{ route('sales.index') }}">Volver</a>
                    </div>
                </form>
            </div>

            <div class="box box-large ms-5 btn btn- ">
                <h2> Detalle de Ventas</h2>
                <!-- contenido de la segunda tabla -->

                <div class="">
                    <div class="box-body">


                        <table id="detalle-table" class="table">
                            <thead>

                            </thead>
                            <tbody>

                                <tr>
                                    <th>
                                        <div class="form-group">
                                            {{ Form::label('Producto') }}
                                            @if ($detailSale->product)
                                                {{ Form::select('product_name', [$detailSale->product->id => $detailSale->product->name], null, ['class' => 'form-control' . ($errors->has('product_name') ? ' is-invalid' : ''), 'placeholder' => 'Seleccione un producto']) }}
                                            @else
                                                {{-- Aquí puedes manejar el caso cuando $detailSale->product es null --}}
                                                {{ Form::select('product_name', $products, null, ['class' => 'form-control' . ($errors->has('product_name') ? ' is-invalid' : ''), 'placeholder' => 'No hay productos disponibles']) }}
                                            @endif
                                            {!! $errors->first('products_id', '<div class="invalid-feedback">:message</div>') !!}
                                        </div>
                                    </th>
                                    <th>
                                        <div class="form-group">
                                            {{ Form::label('Cantidad') }}
                                            {{ Form::text('quantity', $detailSale->quantity, ['class' => 'form-control' . ($errors->has('quantity') ? ' is-invalid' : ''), 'placeholder' => 'Cantidad']) }}
                                            {!! $errors->first('quantity', '<div class="invalid-feedback">:message</div>') !!}
                                        </div>
                                    </th>
                                    <th>
                                        <div class="form-group">
                                            {{ Form::label('Precio Unidad') }}
                                            {{ Form::text('price_unit', $detailSale->price_unit, ['class' => 'form-control' . ($errors->has('price_unit') ? ' is-invalid' : ''), 'placeholder' => 'Precio Unidad']) }}
                                            {!! $errors->first('price_unit', '<div class="invalid-feedback">:message</div>') !!}
                                        </div>
                                    </th>
                                    <th>
                                        <div class="form-group">
                                            {{ Form::label('Subtotal') }}
                                            {{ Form::text('subtotal', $detailSale->subtotal, ['class' => 'form-control' . ($errors->has('subtotal') ? ' is-invalid' : ''), 'placeholder' => 'Subtotal']) }}
                                            {!! $errors->first('subtotal', '<div class="invalid-feedback">:message</div>') !!}
                                        </div>
                                    </th>
                                    <th>
                                        <div class="form-group">
                                            {{ Form::label('Descuento') }}
                                            {{ Form::text('discount', $detailSale->discount, ['class' => 'form-control' . ($errors->has('discount') ? ' is-invalid' : ''), 'placeholder' => 'Descuento']) }}
                                            {!! $errors->first('discount', '<div class="invalid-feedback">:message</div>') !!}
                                        </div>
                                    </th>
                                    <th>
                                        <div class="form-group">
                                            {{ Form::label('Total') }}
                                            {{ Form::text('total', $detailSale->total, ['class' => 'form-control' . ($errors->has('total') ? ' is-invalid' : ''), 'placeholder' => 'Total']) }}
                                            {!! $errors->first('total', '<div class="invalid-feedback">:message</div>') !!}
                                        </div>
                                    </th>
                                    <th>
                                        <div class="form-group">
                                            {{ Form::label('Id Venta') }}
                                            {{ Form::text('sales_id', $detailSale->sales_id, ['class' => 'form-control' . ($errors->has('sales_id') ? ' is-invalid' : ''), 'placeholder' => 'Id Venta']) }}
                                            {!! $errors->first('sales_id', '<div class="invalid-feedback">:message</div>') !!}
                                        </div>

                                    </th>
                                    <!-- boton para eliminar el detalle creado demás -->
                                    <th>
                                        <button type="button" class="btn btn-danger"
                                            onclick="eliminarDetalle(this)">Eliminar</button>

                                    </th>
                                </tr>
                            </tbody>
                        </table>

                        <div class="box-footer">
                            <button type="button" id="agregarDetalle" class="btn btn-primary mt-2"
                                data-tipo="tipo_de_detalle">Agregar detalle</button>
                        </div>

                    </div>
                </div>
            </div>

            <script>
                // Función para agregar un nuevo detalle vacío
                function agregarDetalle() {
                    var container = document.querySelector('#detalle-table tbody');
                    var nuevoDetalle = container.children[0].cloneNode(true);

                    // Limpiar los campos del nuevo detalle clonado
                    nuevoDetalle.querySelectorAll('select, input').forEach(function(element) {
                        element.value = ''; // Limpiar el valor del campo
                    });

                    // Agregar el nuevo detalle a la tabla
                    container.appendChild(nuevoDetalle);

                    // Agrega event listeners al nuevo detalle
                    addEventListeners(nuevoDetalle);
                }

                // Agregar evento de clic al botón "Agregar detalle"
                document.getElementById('agregarDetalle').addEventListener('click', agregarDetalle);

                // Función para agregar event listeners a un detalle
                function addEventListeners(detalle) {
                    const quantityField = detalle.querySelector('[name="quantity"]');
                    const priceUnitField = detalle.querySelector('[name="price_unit"]');
                    const discountField = detalle.querySelector('[name="discount"]');
                    const subtotalField = detalle.querySelector('[name="subtotal"]');
                    const totalField = detalle.querySelector('[name="total"]');

                    function calculateSubtotalAndTotal() {
                        const quantity = parseFloat(quantityField.value) || 0;
                        const priceUnit = parseFloat(priceUnitField.value) || 0;
                        const discount = parseFloat(discountField.value) || 0;

                        const subtotal = quantity * priceUnit;
                        const total = subtotal - (subtotal * (discount / 100));

                        subtotalField.value = subtotal.toFixed(2);
                        totalField.value = total.toFixed(2);
                    }

                    // Escucha los cambios en los campos relevantes
                    quantityField.addEventListener('input', calculateSubtotalAndTotal);
                    priceUnitField.addEventListener('input', calculateSubtotalAndTotal);
                    discountField.addEventListener('input', calculateSubtotalAndTotal);
                }

                // Agregar event listeners al detalle inicial
                addEventListeners(document.querySelector('#detalle-table tbody tr'));

                // Función para eliminar un detalle
                function eliminarDetalle(button) {
                    var row = button.parentNode.parentNode;
                    row.parentNode.removeChild(row);
                }

                /*------------------------------*/


                // Modificar la función para recopilar tanto los detalles como la información principal del formulario de compra
                function enviarDetalles() {
                    const detalles = [];
                    document.querySelectorAll('#detalle-table tbody tr').forEach(function(detalle) {
                        const product = detalle.querySelector('select[name^="product_id"]').value;
                        const cantidad = detalle.querySelector('input[name^="quantity"]').value;
                        const precioUnitario = detalle.querySelector('input[name^="price_unit"]').value;
                        const subtotal = detalle.querySelector('input[name^="subtotal"]').value;
                        const descuento = detalle.querySelector('input[name^="discount"]').value;
                        const total = detalle.querySelector('input[name^="total"]').value;
                        const sale_id = detalle.querySelector('input[name^="sale_id"]').value;

                        detalles.push({
                            product: product,
                            cantidad: cantidad,
                            precio_unitario: precioUnitario,
                            subtotal: subtotal,
                            descuento: descuento,
                            total: total,
                            sale_id: sale_id
                        });
                    });

                    // Recopilar información principal del formulario de compra
                    const nombreCliente = document.querySelector('input[name="name"]').value;
                    const id_cliente = document.querySelector('input[name="people_id"]').value;
                    const fecha = document.querySelector('input[name="date"]').value;
                    const cotizaciones = document.querySelector('select[name="quotes_id"]').value;

                    const data = {
                        nombre_cliente: nombreCliente,
                        id_cliente: id_cliente,
                        fecha: fecha,
                        cotizaciones: cotizaciones,
                        detalles: detalles
                    };

                    console.log(data);

                }
                /**              
                                            Enviar datos al controlador de Laravel mediante AJAX
                                            $.ajax({
                                                type: "POST",
                                                url: "{{ route('sale.store') }}",
                                                data: {
                                                    _token: '{{ csrf_token() }}',
                                                    data: data
                                                },
                                                success: function(response) {
                                                    // Manejar la respuesta del servidor si es necesario
                                                    console.log(response);
                                                },
                                                error: function(err) {
                                                    // Manejar errores si los hay
                                                    console.error(err);
                                                }
                                            });

                                            // window.location.href = "purchases.index";
                                        }  // 
                                            */
            </script>





    </body>

    </html>
