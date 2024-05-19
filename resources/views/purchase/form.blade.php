<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
    integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

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

<small class="text-right">Los campos indicados con <span style="color: red;">*</span> son obligatorios</small>

<div class="box box-small">
    <h2>Compra</h2>
    <div class="box-body">
        <div class="form-group col-md-5">
            {{ Form::label('Nombre y documento del proveedor', null, ['class' => 'required-label']) }}
            {{ Form::select(
                'name',
                $usersName->mapWithKeys(function ($name, $id) use ($providers) {
                    $provider = $providers->firstWhere('id', $id);
                    $document = $provider ? $provider->id_card : ''; // Ajusta la propiedad que contiene el documento del proveedor
                    return [$id => $name . '  ' . $document];
                }),
                $purchase->name,
                [
                    'class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''),
                    'required',
                    'placeholder' => 'Name',
                    'id' => 'name',
                ],
            ) }}

            {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group col-md-3">
            {{ Form::label('Fecha', null, ['class' => 'required-label']) }}
            {{ Form::text('date', $purchase->date, ['class' => 'form-control' . ($errors->has('date') ? ' is-invalid' : ''), 'required', 'placeholder' => 'Date', 'readonly' => true, 'style' => 'background-color: #f8f9fa; cursor: not-allowed;']) }}
            {!! $errors->first('date', '<div class="invalid-feedback">:message</div>') !!}

            <small class="text-muted">Este campo no es editable.</small>
        </div>

        <div class="form-group col-md-3">
            {{ Form::label('Total', null, ['class' => 'required-label']) }}
            {{ Form::text('total', $purchase->total, ['class' => 'form-control' . ($errors->has('total') ? ' is-invalid' : ''), 'required', 'placeholder' => 'Total', 'readonly' => true, 'style' => 'background-color: #f8f9fa; cursor: not-allowed;']) }}
            {!! $errors->first('total', '<div class="invalid-feedback">:message</div>') !!}
            <small class="text-muted">Este campo no es editable.</small>
        </div>
    </div>
    <div class="box-footer" style="margin: 20px;">
        <button type="button" id="enviarBtn" class="btn btn-success" onclick="enviarDetalles()"><i class="bi bi-plus-circle"></i></button>
        <a type="submit" class="btn btn-primary" href="{{ route('purchases.index') }}"><i class="bi bi-arrow-left-circle"></i></a>
    </div>
</div>

<div class="box box-large">
    <h2>Detalle Compra</h2>
    <div class="box-body">
        <table id="detalle-table" class="table">
            <thead>
                <tr>
                    <th class="required-label">Materia prima</th>
                    <th class="required-label">Cantidad</th>
                    <th class="required-label">Precio unitario</th>
                    <th class="required-label">Subtotal</th>
                    <th class="required-label">% Descuento</th>
                    <th class="required-label">Total</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>
                        <div class="form-group">
                            {{ Form::select('materials_raws_id', $materialsRaws, $detailPurchase->materials_raws_id, ['class' => 'form-control' . ($errors->has('materials_raws_id') ? ' is-invalid' : ''), 'required', 'placeholder' => 'Seleccione una materia prima']) }}
                            {!! $errors->first('materials_raws_id', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                    </th>
                    <th>
                        <div class="form-group">
                            {{ Form::text('quantity', $detailPurchase->quantity, ['id' => 'quantity', 'class' => 'form-control' . ($errors->has('quantity') ? ' is-invalid' : ''), 'required', 'placeholder' => 'Quantity']) }}
                            {!! $errors->first('quantity', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                    </th>
                    <th>
                        <div class="form-group">
                            {{ Form::text('price_unit', $detailPurchase->price_unit, ['id' => 'price_unit', 'class' => 'form-control' . ($errors->has('price_unit') ? ' is-invalid' : ''), 'placeholder' => 'Price Unit']) }}
                            {!! $errors->first('price_unit', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                    </th>
                    <th>
                        <div class="form-group">
                            {{ Form::text('subtotal', $detailPurchase->subtotal, ['id' => 'subtotal', 'class' => 'form-control' . ($errors->has('subtotal') ? ' is-invalid' : ''), 'placeholder' => 'Subtotal', 'readonly' => true, 'style' => 'background-color: #f8f9fa; cursor: not-allowed;']) }}
                            {!! $errors->first('subtotal', '<div class="invalid-feedback">:message</div>') !!}
                            <small class="text-muted">No es editable.</small>
                        </div>
                    </th>
                    <th>
                        <div class="form-group">
                            {{ Form::text('discount', $detailPurchase->discount, ['id' => 'discount', 'class' => 'form-control' . ($errors->has('discount') ? ' is-invalid' : ''), 'placeholder' => 'Discount']) }}
                            {!! $errors->first('discount', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                    </th>
                    <th>
                        <div class="form-group">
                            {{ Form::text('total', $detailPurchase->total, ['id' => 'total', 'class' => 'form-control' . ($errors->has('total') ? ' is-invalid' : ''), 'placeholder' => 'Total', 'readonly' => true, 'style' => 'background-color: #f8f9fa; cursor: not-allowed;']) }}
                            {!! $errors->first('total', '<div class="invalid-feedback">:message</div>') !!}
                            <small class="text-muted">No es editable.</small>
                        </div>
                    </th>
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

<script>
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
        const quantityField = detalle.querySelector('#quantity');
        const priceUnitField = detalle.querySelector('#price_unit');
        const discountField = detalle.querySelector('#discount');
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
    }

    document.querySelectorAll('#detalle-table input').forEach(function(input) {
        input.addEventListener('input', calcularTotalCompra);
    });

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

    // Agregar eventos de escucha para el detalle inicial
    document.addEventListener('DOMContentLoaded', function() {
        const initialDetail = document.querySelector('#detalle-table tbody tr');
        addEventListeners(initialDetail);
    });

    // Variable global para almacenar la información del proveedor seleccionado
    var proveedorSeleccionado = {
        nombre: '',
        proveedor_id: ''
    };

    // Evento de cambio para el campo de selección de proveedor
    document.getElementById('name').addEventListener('change', function() {
        // Obtener el valor seleccionado
        var selectedOption = this.options[this.selectedIndex];
        // Obtener el nombre y la llave foránea del proveedor seleccionado
        var text = selectedOption.text;
        var splitText = text.split(' - ');
        proveedorSeleccionado.nombre = splitText[0];
        proveedorSeleccionado.proveedor_id = selectedOption.value;
    });

    // Función para enviar detalles
    function enviarDetalles() {
        // Validar si se ha seleccionado un proveedor
        if (!proveedorSeleccionado.nombre || !proveedorSeleccionado.proveedor_id) {
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "Por favor, selecciona un proveedor antes de continuar.",
            });
            return; // Detener el proceso si no se ha seleccionado un proveedor
        }
        
        let allFieldsCompleted = true; // Bandera para controlar si todos los campos están completos
        const detalles = [];
        
        document.querySelectorAll('#detalle-table tbody tr').forEach(function(detalle) {
            const materiaPrima = detalle.querySelector('select[name^="materials_raws_id"]').value;
            const cantidad = detalle.querySelector('input[name^="quantity"]').value;
            const precioUnitario = detalle.querySelector('input[name^="price_unit"]').value;
            const subtotal = detalle.querySelector('input[name^="subtotal"]').value;
            const descuento = detalle.querySelector('input[name^="discount"]').value;
            const total = detalle.querySelector('input[name^="total"]').value;

            // Validar que los campos de precio unitario y descuento no estén vacíos
            if (precioUnitario.trim() === '' || descuento.trim() === '') {
                allFieldsCompleted = false; // Si hay algún campo vacío, setear la bandera a false
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: "Completa todos los campos!",
                });
                return; // Detener el proceso si los campos obligatorios no están completados
            }

            detalles.push({
                materia_prima: materiaPrima,
                cantidad: cantidad,
                precio_unitario: precioUnitario,
                subtotal: subtotal,
                descuento: descuento,
                total: total
            });
        });

        // Validar campos antes de enviar los datos
        if (!allFieldsCompleted) {
            return; // Detener el proceso si no están completados todos los campos
        }

        // Recopilar información principal del formulario de compra
        const fecha = document.querySelector('input[name="date"]').value;
        const totalP = document.querySelector('input[name="total"]').value;

        const data = {
            nombre_proveedor: proveedorSeleccionado.nombre,
            proveedor_id: proveedorSeleccionado.proveedor_id,
            fecha: fecha,
            totalP: totalP,
            detalles: detalles
        };

        // Enviar datos al controlador de Laravel mediante AJAX
        $.ajax({
            type: "POST",
            url: "{{ route('purchases.store') }}",
            data: {
                _token: '{{ csrf_token() }}',
                data: data
            },
            success: function(response) {
                // Manejar la respuesta del servidor si es necesario
                console.log(response);
                // Redireccionar solo si la compra se creó exitosamente
                window.location.href = "{{ route('purchases.index') }}";
            },
            error: function(err) {
                // Manejar errores si los hay
                console.error(err);
            }
        });
    }
</script>
