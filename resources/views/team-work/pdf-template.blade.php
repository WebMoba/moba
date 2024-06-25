<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>PDF Template</title>
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
            <h3>Listado de Equipos de Trabajo</h3>
            <p>Fecha: {{ date(now()->format('Y-m-d')) }}</p>
        </div>

        <table>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Especialidad</th>
                    <th>Trabajo asignado</th>
                    <th>Fecha asignada</th>
                    <th>Proyecto</th>
                </tr>
            </thead>
            <tbody>
                <!-- @php $i = 0; @endphp -->
                @foreach ($teamwork as $teamWork)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $teamWork->specialty }}</td>
                        <td>{{ $teamWork->assigned_work }}</td>
                        <td>{{ $teamWork->assigned_date }}</td>
                        <td>{{ $teamWork->project->name }}</td>
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
