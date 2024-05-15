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
            text-align: center;
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
            width: 20px;
        }
        th {
            background-color: #f2f2f2;
        }

        @page{
            size: landscape;
        }
        /* Agrega más estilos según sea necesario */
    </style>
</head>
<body>
    <h1>Eventos</h1>

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
</body>
</html>