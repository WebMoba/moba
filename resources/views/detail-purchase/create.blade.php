@extends('layouts.app')

@section('template_title')
    {{ __('Create') }} Detail Purchase
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Create') }} Detalle de compra</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('detail_purchases.store') }}" role="form"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="box box-large">
                                <h2>Detalle Compra</h2>
                                <div class="box-body">
                                    <table id="detalle-table" class="table">
                                        <thead>
                                            <tr>
                                                <th>Materia prima</th>
                                                <th>Cantidad</th>
                                                <th>Precio unitario</th>
                                                <th>Subtotal</th>
                                                <th>Descuento</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th>
                                                    <div class="form-group">
                                                        {{ Form::select('materials_raws_id', $materialsRaws, $detailPurchase->materials_raws_id, ['class' => 'form-control' . ($errors->has('materials_raws_id') ? ' is-invalid' : ''), 'placeholder' => 'Seleccione una materia prima']) }}
                                                        {!! $errors->first('materials_raws_id', '<div class="invalid-feedback">:message</div>') !!}
                                                    </div>
                                                </th>
                                                <th>
                                                    <div class="form-group">
                                                        {{ Form::text('quantity', $detailPurchase->quantity, ['id' => 'quantity', 'class' => 'form-control' . ($errors->has('quantity') ? ' is-invalid' : ''), 'placeholder' => 'Quantity']) }}
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
                                                        <small class="text-muted">No
                                                            es editable.</small>
                                                    </div>
                                                </th>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="box-footer">
                                    <button type="button" id="agregarDetalle" class="btn btn-primary">Agregar
                                        detalle</button>
                                </div>
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

                        // Agregar eventos de escucha para el detalle inicial
                        document.addEventListener('DOMContentLoaded', function() {
                            const initialDetail = document.querySelector('#detalle-table tbody tr');
                            addEventListeners(initialDetail);
                        });


                        // Modificar la función para recopilar tanto los detalles como la información principal del formulario de compra
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
                            const nombreProveedor = document.querySelector('input[name="name"]').value;
                            const fecha = document.querySelector('input[name="date"]').value;
                            const proveedorId = document.querySelector('select[name="people_id"]').value;

                            const data = {
                                nombre_proveedor: nombreProveedor,
                                fecha: fecha,
                                proveedor_id: proveedorId,
                                detalles: detalles
                            };

                            // Ahora puedes enviar `data` que contiene tanto la información principal como los detalles de la compra
                            //console.log(data);
                            // Aquí puedes enviar `data` a través de AJAX u otro método según tus necesidades

                            $.ajax({
                                type: "POST",
                                url: "{{ route('purchases.store') }}",
                                data: {
                                    datos: data
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


                        }
                    </script>


                    </form>
                </div>
            </div>
        </div>
        </div>
    </section>
@endsection
