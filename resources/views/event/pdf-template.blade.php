<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Eventos</title>
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

    
    <h1 style="text-align: right;">Listado de Eventos</h1>
    <p style="text-align: right;">Fecha: {{ now()->format('Y-m-d') }}</p>

    <table>
        <thead>
            <tr>
            <th>No</th>
            <th>Lugar</th>
            <th>Titulo</th>
            <th>Descripcion</th>
            <th>Fecha Inicio</th>
            <th>Fecha Final</th>
            <th>Rango Importancia</th>
            </tr>
        </thead>
        <tbody>
            @php $i = 0; @endphp
            @foreach ($events as $event)
                <tr>
                <td>{{ ++$i }}</td>

            <td>{{ $event->place }}</td>
            <td>{{ $event->title }}</td>
            <td>{{ $event->description }}</td>
            <td>{{ $event->date_start }}</td>
            <td>{{ $event->date_end }}</td>
            <td>{{ $event->importance_range }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <footer class="footer">
        <p>&copy; {{ date('Y') }} MOBA. Todos los derechos reservados.</p>
    </footer>
    
</body>
</html>