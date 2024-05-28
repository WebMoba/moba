<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Cotizaciones</title>
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
        li{
            text-align: left;
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
            display: flex; !important
            justify-content: center; !important
            align-items: center; !important
            flex-direction: column; !important
            padding: 20px;
            border-bottom: 1px solid #ddd;
            margin-bottom: 20px;
        }
        .logo1, .logo2 {
            flex: 0 0 auto;
            width: 25%; !important
        }
        .info {
            flex: 1;
            text-align: center;
            width: 50%;
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
        <table class="table">
            <tbody>
                <tr>
                    <th>Fecha de expedición:</th>
                    <td>{{ $quote->date_issuance }}</td>
                </tr>
                <tr>
                    <th>Descripción:</th>
                    <td>{{ $quote->description }}</td>
                </tr>
                <tr>
                    <th>Total:</th>
                    <td>{{ $quote->total }}</td>
                </tr>
                <tr>
                    <th>Descuento:</th>
                    <td>{{ $quote->discount }}</td>
                </tr>
                <tr>
                    <th>Estado:</th>
                    <td>{{ $quote->status }}</td>
                </tr>
                <tr>
                    <th>Persona:</th>
                    <td>{{ $quote->people_id }}</td>
                </tr>
                <tr>
                    <th>Detalles de la cotización:</th>
                    <td>
                        <ul>
                            @foreach ($quote->detailQuotes as $index => $detail)
                            <li>
                                <strong>Detalle:</strong>{{  $index + 1  }}<br>
                                <strong>Servicio:</strong> {{ $detail->service ? $detail->service->name : 'N/A' }}<br>
                                <strong>Producto:</strong> {{ $detail->product ? $detail->product->name : 'N/A' }}<br>
                                <strong>Proyecto:</strong> {{ $detail->project ? $detail->project->name : 'N/A' }}<br>
                                <strong>Cotización:</strong> {{ $detail->quotes_id }}<br>
                                <br>
                            </li>
                            @endforeach
                        </ul>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <footer class="footer">
        <p>&copy; {{ date('Y') }} MOBA. Todos los derechos reservados.</p>
    </footer>
</body>
</html>
