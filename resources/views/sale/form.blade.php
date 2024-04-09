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
            width: 70%
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
    </style>
</head>

<body>


    <div class="container">
        <div class="box box-small">
            <H2>Formulario de Venta</H2>
            <!-- contenido de la primera tabla "ventas" -->
            <div class="box-body">

                <div class="form-group">
                    <label for="name">Nombre Cliente</label>
                    <input type="text" name="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="Nombre Cliente">
                    @if ($errors->has('name'))
                        <div class="invalid-feedback">{{ $errors->first('name') }}</div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="people_id">Id Persona</label>
                    <input type="text" name="people_id" class="form-control{{ $errors->has('people_id') ? ' is-invalid' : '' }}" placeholder="Id Persona">
                    @if ($errors->has('people_id'))
                        <div class="invalid-feedback">{{ $errors->first('people_id') }}</div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="date">Fecha Venta</label>
                    <input type="date" name="date" class="form-control{{ $errors->has('date') ? ' is-invalid' : '' }}" placeholder="Fecha Venta" min="{{ now()->format('Y-m-d') }}">
                    @if ($errors->has('date'))
                        <div class="invalid-feedback">{{ $errors->first('date') }}</div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="quotes_id">Id Cotización</label>
                    <input type="text" name="quotes_id" class="form-control{{ $errors->has('quotes_id') ? ' is-invalid' : '' }}" placeholder="Id Cotización">
                    @if ($errors->has('quotes_id'))
                        <div class="invalid-feedback">{{ $errors->first('quotes_id') }}</div>
                    @endif
                </div>
            </div>



            <div class="box-footer">
                <button type="submit" class="btn btn-success btn-enviar">{{ __('Enviar') }}</button>
                <a type="submit" class="btn btn-primary" href="{{ route('sales.index') }}">Volver</a>
            </div>
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
                                            @if($detailSale->product)
                                                {{ Form::select('product_name', [$detailSale->product->id => $detailSale->product->name], null, ['class' => 'form-control' . ($errors->has('products_name') ? ' is-invalid' : ''), 'placeholder' => 'Seleccione un producto']) }}
                                            @else
                                                {{-- Aquí puedes manejar el caso cuando $detailSale->product es null --}}
                                                {{ Form::select('product_name', [], null, ['class' => 'form-control' . ($errors->has('products_name') ? ' is-invalid' : ''), 'placeholder' => 'No hay productos disponibles']) }}
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

                                </tr>
                            </tbody>
                        </table>
                        
                        <div class="box-footer">
                            <button type="button" id="agregarDetalle" class="btn btn-primary mt-2" data-tipo="tipo_de_detalle">Agregar detalle</button>
                        </div>
                    
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
            });
        </script>
        
        

</body>

</html>

