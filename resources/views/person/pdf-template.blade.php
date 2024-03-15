<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>PDF Template</title>
    <!-- Estilos CSS -->
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 10px;
        }
        h1 {
            color: #333;
        }
        table {
            width: 80%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }

        @page {
            size: landscape;
        }
        /* Agrega más estilos según sea necesario */
    </style>
</head>
<body>
    <h1>Listado de Personas</h1>

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
</body>
</html>