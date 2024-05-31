<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Listado Cotizaciones</title>
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

    <div class="content">
        <div style="text-align: right; margin-bottom: 20px;">
            <h3>Listado de Cotizaciones</h3>
            <p>Fecha: {{ date(now()->format('Y-m-d')) }}</p>
        </div>

        <table>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Fecha de expedición</th>
                    <th>Descripción</th>
                    <th>Total</th>
                    <th>Descuento</th>
                    <th>Estado</th>
                    <th>Cliente</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($quotes as $index => $quote)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $quote->date_issuance }}</td>
                        <td>{{ $quote->description }}</td>
                        <td>{{ $quote->total }}</td>
                        <td>{{ $quote->discount }}</td>
                        <td>{{ $quote->status }}</td>
                        <td>{{ $quote->person->name ?? 'N/A' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <footer class="footer">
        <p>&copy; {{ date('Y') }} MOBA. Todos los derechos reservados.</p>
    </footer>
</body>
</html>

