<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>PDF Template</title>
    <!-- Estilos CSS -->
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
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
        /* Agrega más estilos según sea necesario */
    </style>
</head>
<body>
    <h1>Listado de Personas</h1>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Identificación</th>
                <th>Dirección</th>
                <th>Equipo de Trabajo</th>
                <th>Número Celular</th>
                <th>Ciudad</th>
                <th>Usuario</th>
            </tr>
        </thead>
        <tbody>
            @php $i = 0; @endphp
            @foreach ($people as $person)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $person->id_card }}</td>
                    <td>{{ $person->addres }}</td>
                    <td>{{ $person->teamWork ? $person->teamWork->assigned_work : 'N/A' }}</td>
                    <td>{{ $person->numberPhone ? $person->numberPhone->number : 'N/A' }}</td>
                    <td>{{ $person->town ? $person->town->name : 'N/A' }}</td>
                    <td>{{ $person->user ? $person->user->email : 'N/A' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>