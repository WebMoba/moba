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

        th,
        td {
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
    <h1>Listado de Unidades</h1>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Tipo de unidad</th>
            </tr>
        </thead>
        <tbody>
            @php $i = 0; @endphp
            @foreach ($units as $unit)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $unit->unit_type }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
