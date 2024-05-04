<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Título de tu página</title>
    <!-- Agrega enlaces a tus estilos CSS y a Bootstrap si los estás utilizando -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>

    <div class="container">
        <div class="box mt-2">
            <h2>Formulario de Venta</h2>

            <!-- contenido de la primera tabla "ventas" -->
            <form id="salesForm" method="POST" action="{{ route('sales.store') }}">
                @csrf
                <div class="box-body mt-3 ">

                    <div class="form-group">
                        {{ Form::label('Nombre y documento del cliente', null, ['class' => 'required-label']) }}
                        {{ Form::select(
                            'name',
                            $usersName->mapWithKeys(function ($name, $id) use ($providers) {
                                $provider = $providers->firstWhere('id', $id);
                                $document = $provider ? $provider->id_card : '';
                                return [$id => $name . ' - ' . $document];
                            }),
                            $sale->name,
                            ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'required', 'placeholder' => 'Name'],
                        ) }}
                        {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
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
                        {{ Form::label('Numero de cotizacion', null, ['class' => 'required-label']) }}
                        {{ Form::select('quotes_id', $quotes, $sale->sales_id, ['class' => 'form-control' . ($errors->has('quotes_id') ? ' is-invalid' : ''), 'required', 'placeholder' => 'Seleccione ']) }}
                        {!! $errors->first('quotes_id', '<div class="invalid-feedback">:message</div>') !!}
                    </div>

                </div>
                <div class="box-footer mt-3">
                    <button type="button" id="submitButton" class="btn btn-success btn-enviar"
                        onclick="enviarDetalles()">
                        {{ __('Crear') }}
                    </button>
                    <a type="button" class="btn btn-primary" href="{{ route('sales.index') }}">Volver</a>
                </div>

            </form>
        </div>

        <div class="box mt-5  ">
            <h2> Detalle de Ventas</h2>
            <!-- contenido de la segunda tabla -->

            <div class="">
                <div class="box-body">

                    <table id="detalle-table" class="table">
                        <thead>
                            <th class="required-label">Producto</th>
                            <th class="required-label">Cantidad</th>
                            <th class="required-label">Precio unitario</th>
                            <th class="required-label">Subtotal</th>
                            <th class="required-label">% Descuento</th>
                            <th class="required-label">Total</th>
                        </thead>
                        <tbody>

                            <tr>
                                <th>
                                    <div class="form-group">
                                        @if ($detailSale->product)
                                            {{ Form::select('product_id', [$detailSale->product->id => $detailSale->product->name], null, ['class' => 'form-control', 'id' => 'productSelect', 'placeholder' => 'Seleccione un producto']) }}
                                        @else
                                            {{-- Aquí puedes manejar el caso cuando $detailSale->product es null --}}
                                            {{ Form::select('product_id', $products, null, ['class' => 'form-control', 'id' => 'productSelect', 'placeholder' => 'No hay productos disponibles']) }}
                                        @endif
                                        {!! $errors->first('product_id', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                </th>
                                <th>
                                    <div class="form-group">
                                        {{ Form::text('quantity', $detailSale->quantity, ['id' => 'quantity', 'class' => 'form-control' . ($errors->has('quantity') ? ' is-invalid' : ''), 'placeholder' => 'Cantidad']) }}
                                        {!! $errors->first('quantity', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                </th>
                                <th>
                                    <div class="form-group">
                                        {{ Form::text('price_unit', $detailSale->product ? $detailSale->product->price : '', ['id' => 'price_unit', 'class' => 'form-control' . ($errors->has('price_unit') ? ' is-invalid' : ''), 'placeholder' => 'Precio Unidad', 'id' => 'priceUnitInput', 'readonly' => 'readonly', 'style' => 'background-color: #f8f9fa; cursor: not-allowed;']) }}
                                        {!! $errors->first('price_unit', '<div class="invalid-feedback">:message</div>') !!}
                                        <small class="text-muted">Este campo no es
                                            editable.</small>
                                    </div>

                                </th>
                                <th>
                                    <div class="form-group">
                                        {{ Form::text('subtotal', $detailSale->subtotal, ['id' => 'subtotal', 'class' => 'form-control' . ($errors->has('subtotal') ? ' is-invalid' : ''), 'placeholder' => 'Subtotal', 'id' => 'subtotalInput', 'readonly' => 'readonly']) }}
                                        {!! $errors->first('subtotal', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                </th>
                                <th>
                                    <div class="form-group">
                                        {{ Form::text('discount', $detailSale->discount, ['id' => 'discount', 'class' => 'form-control' . ($errors->has('discount') ? ' is-invalid' : ''), 'placeholder' => 'Descuento']) }}
                                        {!! $errors->first('discount', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                </th>
                                <th>
                                    <div class="form-group">
                                        {{ Form::text('total', $detailSale->total, ['id' => 'total', 'class' => 'form-control' . ($errors->has('total') ? ' is-invalid' : ''), 'placeholder' => 'Total', 'id' => 'TotalInput', 'readonly' => 'readonly']) }}
                                        {!! $errors->first('total', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                </th>

                                <!-- boton para eliminar el detalle creado demás -->
                                <th>

                                    <button type="button" class="btn btn-danger mt-3" onclick="eliminarDetalle(this)">
                                        <i class="fas fa-trash-alt"></i>
                                        <!-- Icono de papelera de Font Awesome -->
                                    </button>

                                </th>
                            </tr>
                        </tbody>
                    </table>

                    <div class="box-footer">
                        <button type="button" id="agregarDetalle" class="btn btn-primary">Agregar detalle</button>
                    </div>

                </div>
            </div>
        </div>
    </div>
</body>

<script>
    var productPrices = @json($productPrices);

    $('#productSelect').on('change', function() {
        var productId = $(this).val();
        var price = productPrices[productId] || '';
        $('#priceUnitInput').val(price);
    });
</script>

<script>
    $('#name').on('change', function() {
        var selectedValue = $(this).val();
        $('#people_id').val(selectedValue);
    });
</script>

<script>
    function enviarDetalles() {
        const detalles = [];
        const fechaInput = document.querySelector('input[name="date"]');
        const nombreClienteSelect = document.querySelector('select[name="name"]');
        const cotizacionSelect = document.querySelector('select[name="quotes_id"]');

        const fecha = fechaInput.value;
        const clienteId = nombreClienteSelect.value;
        const cotizacionId = cotizacionSelect.value;

        const nombreCliente = nombreClienteSelect.options[nombreClienteSelect.selectedIndex].text.split(' - ')[0];

        document.querySelectorAll('#detalle-table tbody tr').forEach(function(detalle) {
            const productoSelect = detalle.querySelector('select[name^="product_id"]');
            const cantidadInput = detalle.querySelector('input[name^="quantity"]');
            const precioUnitarioInput = detalle.querySelector('input[name^="price_unit"]');
            const subtotalInput = detalle.querySelector('input[name^="subtotal"]');
            const descuentoInput = detalle.querySelector('input[name^="discount"]');
            const totalInput = detalle.querySelector('input[name^="total"]');

            const productoId = productoSelect.value;
            const cantidad = cantidadInput.value;
            const precioUnitario = precioUnitarioInput.value;
            const subtotal = subtotalInput.value;
            const descuento = descuentoInput.value;
            const total = totalInput.value;

            detalles.push({
                producto_id: productoId,
                cantidad: cantidad,
                precio_unitario: precioUnitario,
                subtotal: subtotal,
                descuento: descuento,
                total: total
            });
        });

        const data = {
            cliente_id: clienteId,
            nombre_cliente: nombreCliente,
            fecha: fecha,
            cotizacion_id: cotizacionId,
            detalles: detalles
        };

        $.ajax({
            type: "POST",
            url: "{{ route('sales.store') }}",
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
        window.location.href = "{{ route('sales.index') }}";
    }



    // Agregar eventos de escucha para el detalle inicial
    document.addEventListener('DOMContentLoaded', function() {
        const initialDetail = document.querySelector('#detalle-table tbody tr');
        addEventListeners(initialDetail);
    });

    document.getElementById('agregarDetalle').addEventListener('click', function() {
        var container = document.querySelector('#detalle-table tbody');
        var nuevoDetalle = container.children[0].cloneNode(true);

        // Limpiar los campos del nuevo detalle clonado
        nuevoDetalle.querySelectorAll('select, input').forEach(function(element) {
            element.value = '';
            // Agregar un índice único a los nombres de los campos clonados
            element.name = element.name + '_' + container.children.length;

            // Agregar evento change al select de productos para rellenar el precio unitario
            if (element.id === 'productSelect') {
                element.addEventListener('change', function() {
                    var productId = $(this).val();
                    var price = productPrices[productId] || '';
                    var priceUnitInput = nuevoDetalle.querySelector('#priceUnitInput');
                    priceUnitInput.value = price;
                });
            }
        });

        // Llamar a la función para agregar event listeners al nuevo detalle
        addEventListeners(nuevoDetalle);

        // Agregar el nuevo detalle a la tabla
        container.appendChild(nuevoDetalle);
    });

    function eliminarDetalle(button) {
        var row = button.parentNode.parentNode;
        row.parentNode.removeChild(row);
    }
</script>


</html>
