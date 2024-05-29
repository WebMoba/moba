<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Listado de usuarios</title>
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
        <div class="logo2">
            <img src="{{ public_path('logos/LogotuArte.png') }}" alt="Logo de Tu Arte">
        </div>
    </div>

    <div class="content">
        
        <h1>Listado de Personas</h1>
        <p style="text-align: right;">Fecha: {{ now()->format('Y-m-d') }}</p>

        <table>
            <thead>
                <tr>
                <th>No</th>
                    <th>Rol</th>
                    <th>Tipo Identificacion</th>
                    <th>Identificacion</th>
                    <th>Nombre</th>
                    <th>Direccion</th>
                    <th>Equipo de trabajo</th>
                    <th>Numero Celular</th>
                    <th>Departamento</th>
                    <th>Ciudad</th>
                    <th>Usuario</th>
                </tr>
            </thead>
            <tbody>
                @php $i = 0; @endphp
                @foreach ($people as $person)
                    <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $person->rol}}</td>
                    <td>{{ $person->identification_type}}</td>
                    <td>{{ $person->id_card }}</td>
                    <td>{{ $person->user ? $person->user->name : 'N/A' }}</td>
                    <td>{{ $person->addres }}</td>
                    <td>{{ $person->teamWork ? $person->teamWork->assigned_work : 'N/A'}}</td>
                    <td>{{ $person->numberPhone ? $person->numberPhone->number : 'N/A'}}</td>
                    <td>{{ $person->region ? $person->region->name : 'N/A' }}</td>
                    <td>{{ $person->town ? $person->town->name : 'N/A'}}</td>
                    <td>{{ $person->user ? $person->user->email: 'N/A' }}</td>

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