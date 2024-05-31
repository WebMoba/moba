<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Venta Detallada</title>
    <link rel="stylesheet" href="{{public_path('css/pdf.css')}}" type="text/css">
</head>
<body>
  
    <div class="moba">
        <div class="logo1">
            <img src="{{ public_path('logos/LogoMoba.png') }}" alt="Logo de MOBA">
        </div>
        <div class="info">
            <h1>Moba</h1>
            <h2>agenciamoba@gmail.com</h2>
            <h3>Cl. 15a No.7A - 30, Sogamoso, Boyacá</h3>
            <h4>3112437979</h4>
        </div>
    </div>

    <div class="card-body">
        @if ($sale->detailSales->count())
        <table class="table">
            <tbody>
                <tr>
                    <th>Nombre del cliente:</th>
                    <td>{{ $sale->name }}</td>
                </tr>
                <tr>
                    <th>Documento del cliente:</th>
                    <td>{{ $sale->person->id_card }}</td>
                </tr>
                <tr>
                    <th>Total de la venta:</th>
                    <td>{{ $sale->total }}</td>
                </tr>
                <tr>
                    <th>Fecha realización de la venta:</th>
                    <td>{{ $sale->date }}</td>
                </tr>
                <tr>
                    <th>Detalles de la venta:</th>
                    <td>
                        <ul>
                            @foreach ($sale->detailSales as $index => $detail)
                                <li>
                                    <strong>Detalle:</strong>{{  $index + 1  }} <br>
                                    <strong>Cantidad:</strong> {{ $detail->quantity }}<br>
                                    <strong>Precio unitario:</strong> {{ $detail->price_unit }}<br>
                                    <strong>Subtotal:</strong> {{ $detail->subtotal }}<br>
                                    <strong>Descuento:</strong> {{ $detail->discount }}<br>
                                    <strong>Total:</strong> {{ $detail->total }}<br>
                                    <strong>Nombre del producto:</strong> {{ $detail->product->name }}
                                </li>
                            @endforeach
                        </ul>
                    </td>
                </tr>
            </tbody>
        </table>
        @else
        <p>No se encontraron detalles asociados a esta venta.</p>
        @endif
    </div>

    <footer class="footer">
        <p>&copy; {{ date('Y') }} MOBA. Todos los derechos reservados.</p>
    </footer>
</body>
</html>
