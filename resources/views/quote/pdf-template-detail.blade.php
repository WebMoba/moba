<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Detalle de Cotización</title>
    <link rel="stylesheet" href="{{ public_path('css/pdf.css') }}" type="text/css">
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
                    <td>{{ $quote->person->name }}</td>
                </tr>
                <tr>
                    <th>Detalles de la cotización:</th>
                    <td>
                        <ul>
                            @foreach ($quote->detailQuotes as $index => $detail)
                                <li>
                                    <strong>Detalle:</strong> {{ $index + 1 }}<br>
                                    <strong>Servicio:</strong> {{ $detail->service ? $detail->service->name : 'N/A' }}<br>
                                    <strong>Producto:</strong> {{ $detail->product ? $detail->product->name : 'N/A' }}<br>
                                    <strong>Proyecto:</strong> {{ $detail->project ? $detail->project->name : 'N/A' }}<br>
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
