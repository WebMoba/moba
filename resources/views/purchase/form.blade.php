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
</style>

<div class="box box-small">
    <h2>Compra</h2>
    <div class="box-body">
    <div class="form-group">
            {{ Form::label('Nombre y documento del proveedor', null, ['class' => 'required-label']) }}
            {{ Form::select(
                'name',
                $usersName->mapWithKeys(function ($name, $id) use ($providers) {
                    $provider = $providers->firstWhere('id', $id);
                    $document = $provider ? $provider->id_card : ''; // Ajusta la propiedad que contiene el documento del proveedor

                    
                    return [$id => $name . ' - ' . $document];
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

        <div class="form-group">
            {{ Form::label('Fecha', null, ['class' => 'required-label']) }}
            {{ Form::text('date', $purchase->date, ['class' => 'form-control' . ($errors->has('date') ? ' is-invalid' : ''), 'required', 'placeholder' => 'Date', 'readonly' => true, 'style' => 'background-color: #f8f9fa; cursor: not-allowed;']) }}
            {!! $errors->first('date', '<div class="invalid-feedback">:message</div>') !!}

            <small class="text-muted">Por cuestiones de seguridad este campo no es editable.</small>
        </div>


    </div>
    <div class="box-footer" style="margin: 20px;">
        <button type="button" class="btn btn-success" onclick="enviarDetalles()">Crear</button>
        <a type="submit" class="btn btn-primary" href="{{ route('purchases.index') }}">Volver</a>
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
                        <button type="button" class="btn btn-danger" onclick="eliminarDetalle(this)"><i
                                class="fas fa-trash-alt"></i></button>
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

        // Agregar el nuevo detalle a la tabla
        container.appendChild(nuevoDetalle);
    });


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
        }

        quantityField.addEventListener('input', calculateSubtotalAndTotal);
        priceUnitField.addEventListener('input', calculateSubtotalAndTotal);
        discountField.addEventListener('input', calculateSubtotalAndTotal);
    }

    function eliminarDetalle(button) {
        var row = button.parentNode.parentNode;
        row.parentNode.removeChild(row);
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
        const detalles = [];
        document.querySelectorAll('#detalle-table tbody tr').forEach(function(detalle) {
            const materiaPrima = detalle.querySelector('select[name^="materials_raws_id"]').value;
            const cantidad = detalle.querySelector('input[name^="quantity"]').value;
            const precioUnitario = detalle.querySelector('input[name^="price_unit"]').value;
            const subtotal = detalle.querySelector('input[name^="subtotal"]').value;
            const descuento = detalle.querySelector('input[name^="discount"]').value;
            const total = detalle.querySelector('input[name^="total"]').value;

            detalles.push({
                materia_prima: materiaPrima,
                cantidad: cantidad,
                precio_unitario: precioUnitario,
                subtotal: subtotal,
                descuento: descuento,
                total: total
            });
        });

        // Recopilar información principal del formulario de compra
        const fecha = document.querySelector('input[name="date"]').value;

        const data = {
            nombre_proveedor: proveedorSeleccionado.nombre,
            proveedor_id: proveedorSeleccionado.proveedor_id,
            fecha: fecha,
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
            },
            error: function(err) {
                // Manejar errores si los hay
                console.error(err);
            }
        });

        window.location.href = "{{ route('purchases.index') }}";
    }
</script>