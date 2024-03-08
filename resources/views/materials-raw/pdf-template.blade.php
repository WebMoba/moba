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
            margin: 0;
            padding: 20px;
        }

        h1,
        h3 {
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        .table-container {
            overflow-x: auto;
        }
    </style>

</head>

<body>

    <header>
        <div style="text-align: left; margin-bottom: 20px;">
            <img src="#" alt="Logo de la Empresa" height="50">
        </div>
        <div style="text-align: right; margin-bottom: 20px;">
            <h3>Listado de la materia prima existente</h3>
            <p>Fecha: {{ date(now()->format('Y-m-d')) }}</p>
        </div>
    </header>


    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nombre</th>
                    <th>Cantidad existente</th>
                    <th>Tipo de unidad</th>
                </tr>
            </thead>
            <tbody>
                @php $i = 0; @endphp
                @foreach ($materials_raws as $materialsRaw)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td> {{ $materialsRaw->name }}</td>
                        <td> {{ $materialsRaw->existing_quantity }}</td>
                        <td>{{ $materialsRaw->unit->unit_type }}</td>
                    </tr>
                @endforeach
            </tbody>

        </table>
    </div>

    <footer>
        <div style="text-align: center; margin-top: 20px; border-top: 1px solid #ddd; padding-top: 10px;">
            <p>&copy; {{ date('Y') }} MOBA. Todos los derechos reservados.</p>
        </div>
    </footer>
</body>

</html>
