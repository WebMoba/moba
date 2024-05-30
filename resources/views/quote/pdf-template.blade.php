<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Listado Cotizaciones</title>
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
                    <th>Persona</th>
                </tr>
            </thead>
            <tbody>
                <!-- @php $i = 0; @endphp -->
                @foreach ($quote as $quotes)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $quotes->date_issuance }}</td>
                        <td>{{ $quotes->description }}</td>
                        <td>{{ $quotes->total }}</td>
                        <td>{{ $quotes->discount }}</td>
                        <td>{{ $quotes->status }}</td>
                        <td>{{ $quotes->people_id }}</td>
                        
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
