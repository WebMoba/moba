<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Venta Detallada</title>
    <style>
        h1 {
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            position: relative;
            margin: 0;
            padding: 0;
            height: 100%;
        }
        .moba {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            padding: 20px;
            border-bottom: 1px solid #ddd;
            margin-bottom: 20px;
        }
        .logo1, .logo2 {
            flex: 0 0 auto;
            width: 25%;
        }
        .info {
            flex: 1;
            text-align: center;
        }
        .info h1 {
            margin-top: 0;
        }
        .info h2, .info h3, .info h4 {
            margin-bottom: 5px;
        }
        .content {
            margin: 20px;
            padding-bottom: 60px; /* Espacio para el footer */
        }
        img {
            max-width: 150px;
            max-height: 150px;
        }
        .footer {
            text-align: center;
            margin-top: 20px;
            border-top: 1px solid #ddd;
            padding-top: 10px;
            position: fixed;
            bottom: 0;
            width: 100%;
            background-color: white;
        }
    </style>
</head>
<body>
    <div class="moba">
        <div class="logo1">
            <img src="{{ asset('logos/LogoMoba.png') }}" alt="Logo de MOBA">
        </div>
        <div class="info">
            <h1>Moba</h1>
            <h2>agenciamoba@gmail.com</h2>
            <h3>Cl. 15a No.7A - 30, Sogamoso, Boyacá</h3>
            <h4>3112437979</h4>
        </div>
        <div class="logo2">
            <img src="{{ asset('logos/LogotuArte.png') }}" alt="Logo de Tu Arte">
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
                            @foreach ($sale->detailSales as $detail)
                                <li>
                                    @foreach ($details as $index => $detail)
                                    <strong>Detalle:</strong>{{  $index + 1  }}
                                    @endforeach
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
