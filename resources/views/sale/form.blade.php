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


    <style>
        .required-label::after {
            content: "*";
            color: red;
            margin-left: 5px;
        }

        .text-right {
            float: right;
            margin-top: -8px;
            /* Ajusta según sea necesario para alinear verticalmente con el formulario */
        }
    </style>


</head>

<body>
    <small class="text-right">Los campos indicados con <span style="color: red;">*</span> son obligatorios</small>

    <div class="container">
        <div class="box mt-2">
            <h2>Formulario de Venta</h2>

            <!-- contenido de la primera tabla "ventas" -->
            <form id="salesForm" method="POST" action="{{ route('sales.store') }}">
                @csrf
                <div class="box-body mt-3 ">

                    <div class="form-group col-md-5">
                        {{ Form::label('Nombre y documento del cliente', null, ['class' => 'required-label']) }}
                        {{ Form::select(
                            'name',
                            $usersName->mapWithKeys(function ($name, $id) use ($providers) {
                                $provider = $providers->firstWhere('id', $id);
                                $document = $provider ? $provider->id_card : '';
                                return [$id => $name . '  ' . $document];
                            }),
                            $sale->name,
                            ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'required', 'placeholder' => 'Name'],
                        ) }}
                        {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
                    </div>

                    <div class="form-group col-md-3">
                        {{ Form::label('Fecha', null, ['class' => 'required-label']) }}
                        {{ Form::text('date', $sale->date, ['class' => 'form-control' . ($errors->has('date') ? ' is-invalid' : ''), 'required', 'placeholder' => 'Date', 'readonly' => true, 'style' => 'background-color: #f8f9fa; cursor: not-allowed;']) }}
                        {!! $errors->first('date', '<div class="invalid-feedback">:message</div>') !!}

                        <small class="text-muted">Este campo no es editable.</small>
                    </div>

                    <div class="form-group col-md-3">
                        {{ Form::label('Total', null, ['class' => 'required-label']) }}
                        {{ Form::text('total', $sale->total, ['class' => 'form-control' . ($errors->has('total') ? ' is-invalid' : ''), 'required', 'placeholder' => 'Total', 'readonly' => true, 'style' => 'background-color: #f8f9fa; cursor: not-allowed;']) }}
                        {!! $errors->first('total', '<div class="invalid-feedback">:message</div>') !!}
                        <small class="text-muted">Este campo no es editable.</small>
                    </div>

                </div>
                <div class="box-footer mt-3">
                    <button type="button" id="submitButton" class="btn btn-success btn-enviar"
                        onclick="enviarDetalles()">
                        <i class="bi bi-plus-circle"></i>
                    </button>
                    <a type="button" class="btn btn-primary" href="{{ route('sales.index') }}"><i
                            class="bi bi-arrow-left-circle"></i></a>
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
                                        <small class="text-muted">Este campo no es editable.</small>
                                    </div>

                                </th>
                                <th>
                                    <div class="form-group">
                                        {{ Form::text('subtotal', $detailSale->subtotal, ['id' => 'subtotal', 'class' => 'form-control' . ($errors->has('subtotal') ? ' is-invalid' : ''), 'placeholder' => 'Subtotal', 'readonly' => 'readonly', 'style' => 'background-color: #f8f9fa; cursor: not-allowed;']) }}
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
                                        {{ Form::text('total', $detailSale->total, ['id' => 'total', 'class' => 'form-control' . ($errors->has('total') ? ' is-invalid' : ''), 'placeholder' => 'Total', 'readonly' => 'readonly', 'style' => 'background-color: #f8f9fa; cursor: not-allowed;']) }}
                                        {!! $errors->first('total', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                </th>

                                <!-- boton para eliminar el detalle creado demás -->
                                <th>
                        <button type="button" class="btn btn-danger eliminar-detalle" onclick="eliminarDetalle(this)"><i class="fas fa-trash-alt"></i></button>
                    </th>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="box-footer">
                    <button type="button" id="agregarDetalle" class="btn btn-primary">Agregar detalle</button>
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


    $('#name').on('change', function() {
        var selectedValue = $(this).val();
        $('#people_id').val(selectedValue);
    });
</script>

<script>
    function enviarDetalles() {
        let errores = false; // Variable para indicar si hay errores

        const detalles = [];
        const fechaInput = document.querySelector('input[name="date"]');
        const nombreClienteSelect = document.querySelector('select[name="name"]');
        const totalP = document.querySelector('input[name="total"]').value;

        const fecha = fechaInput.value;
        const clienteId = nombreClienteSelect.value;
        const nombreCliente = nombreClienteSelect.options[nombreClienteSelect.selectedIndex].text.split(' - ')[0];

        // Validar campos del formulario de detalle
        var detalleFields = document.querySelectorAll(
            '#detalle-table tbody tr input[required], #detalle-table tbody tr select[required]');
        var allDetailFieldsCompleted = true;
        detalleFields.forEach(function(field) {
            if (field.value.trim() === '') {
                errores = true; // Hay errores
                allDetailFieldsCompleted = false;
            }
        });

        if (!allDetailFieldsCompleted) {
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "Completa todos los campos!",
            });
            return; // Detener el proceso si no están completados todos los campos del detalle
        }

        document.querySelectorAll('#detalle-table tbody tr').forEach(function(detalle) {
            const cantidadInput = detalle.querySelector('input[name^="quantity"]');
            const descuentoInput = detalle.querySelector('input[name^="discount"]');

            const cantidad = cantidadInput.value;
            const descuento = descuentoInput.value;

            // Validar campos de cantidad y descuento
            if (cantidad.trim() === '' || descuento.trim() === '') {
                errores = true; // Hay errores
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: "Completa todos los campos del formulario!",
                });
                // Detener el proceso si no están completados todos los campos de cantidad y descuento del detalle
                return;
            }

            // Si todos los campos están completos, continuar con la creación del detalle
            const productoSelect = detalle.querySelector('select[name^="product_id"]');
            const precioUnitarioInput = detalle.querySelector('input[name^="price_unit"]');
            const subtotalInput = detalle.querySelector('input[name^="subtotal"]');
            const totalInput = detalle.querySelector('input[name^="total"]');

            const productoId = productoSelect.value;
            const precioUnitario = precioUnitarioInput.value;
            const subtotal = subtotalInput.value;
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
            totalP: totalP,
            detalles: detalles
        };

        // Validar campos antes de enviar los datos
        var requiredFields = document.querySelectorAll('input[name="date"], select[name="name"], input[name="total"]');
        var allFieldsCompleted = true;
        requiredFields.forEach(function(field) {
            if (field.value.trim() === '') {
                errores = true; // Hay errores
                allFieldsCompleted = false;
            }
        });

        if (!allFieldsCompleted) {
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "Completa todos los campos!",
            });
            return; // Detener el proceso si no están completados todos los campos del formulario de ventas
        }

        // Si no hay errores, enviar los datos
        if (!errores) {
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
                    window.location.href = "{{ route('sales.index') }}";
                },
                error: function(err) {
                    // Manejar errores si los hay
                    console.error(err);
                }
            });
        }
    }




    // Agregar eventos de escucha para el detalle inicial
    document.addEventListener('DOMContentLoaded', function() {
        const initialDetail = document.querySelector('#detalle-table tbody tr');
        addEventListeners(initialDetail);
    });

    function calcularTotalCompra() {
        const detalles = document.querySelectorAll('#detalle-table tbody tr');
        let totalCompra = 0;

        detalles.forEach(function(detalle) {
            const totalDetalle = parseFloat(detalle.querySelector('input[name^="total"]').value);
            if (!isNaN(totalDetalle)) {
                totalCompra += totalDetalle;
            }
        });

        // Actualizar el campo "Total" del formulario de compra
        const totalField = document.querySelector('input[name="total"]');
        totalField.value = totalCompra.toFixed(2);
    }


    function addEventListeners(detalle) {
        const productSelect = detalle.querySelector('#productSelect');
        const quantityField = detalle.querySelector('input[name^="quantity"]');
        const priceUnitField = detalle.querySelector('input[name^="price_unit"]');
        const discountField = detalle.querySelector('input[name^="discount"]');
        const subtotalField = detalle.querySelector('#subtotal');
        const totalField = detalle.querySelector('#total');

        function calculateSubtotalAndTotal() {
            const quantity = parseFloat(quantityField.value) || 0;
            const priceUnit = parseFloat(priceUnitField.value) || 0;
            const discount = parseFloat(discountField.value) || 0;

            const subtotal = quantity * priceUnit;
            const total = subtotal - (subtotal * (discount / 100));

            subtotalField.value = subtotal.toFixed(2);
            totalField.value = total.toFixed(2);
            // Llamar a la función para sumar los totales de los detalles de compra
            calcularTotalCompra();
        }

        quantityField.addEventListener('input', calculateSubtotalAndTotal);
        priceUnitField.addEventListener('input', calculateSubtotalAndTotal);
        discountField.addEventListener('input', calculateSubtotalAndTotal);

        // Agregar evento change al selector de productos
        productSelect.addEventListener('change', function() {
            var productId = $(this).val();
            var price = productPrices[productId] || '';
            priceUnitField.value = price;
            calculateSubtotalAndTotal(); // Actualizar subtotal y total después de cambiar el precio unitario
        });
    }

    // Calcular el total de la compra al cargar la página
    document.addEventListener('DOMContentLoaded', function() {
        calcularTotalCompra();

        // Ocultar el botón de eliminar del primer detalle
        document.querySelector('#detalle-table tbody tr .eliminar-detalle').style.display = 'none';
    });

    function eliminarDetalle(button) {
        var row = button.parentNode.parentNode;
        row.parentNode.removeChild(row);

        // Recalcular el total de la compra después de eliminar el detalle
        calcularTotalCompra();
    }



    document.getElementById('agregarDetalle').addEventListener('click', function() {
        var container = document.querySelector('#detalle-table tbody');
        var nuevoDetalle = container.children[0].cloneNode(true);

        // Limpiar los campos del nuevo detalle clonado
        nuevoDetalle.querySelectorAll('select, input').forEach(function(element) {
            element.value = '';
            // Agregar un índice único a los nombres de los campos clonados
            element.name = element.name + '_' + container.children.length;
        });

        // Agregar eventos de escucha para el nuevo detalle
        addEventListeners(nuevoDetalle);

        // Agregar el botón de eliminar solo al nuevo detalle
        nuevoDetalle.querySelector('.eliminar-detalle').style.display = 'inline-block';

        // Agregar el nuevo detalle a la tabla
        container.appendChild(nuevoDetalle);
    });
</script>


</html>
