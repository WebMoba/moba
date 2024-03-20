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
    <h1>Listado de categorias</h1>

    <table>
        <thead>
            <tr>
                <th>No</th>

                <th>Nombre</th>
                <th>Descripcion</th>
                <th>Estado</th>
                <th>Cantidad</th>
                <th>Popularidad</th>
                <th>Tipo</th>

            </tr>
        </thead>
        <tbody>
            @php $i = 0; @endphp
            @foreach ($categoriesProductsServices as $categoriesProductsService)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $categoriesProductsService->name }}</td>
                    <td>{{ $categoriesProductsService->description }}</td>
                    <td>{{ $categoriesProductsService->status }}</td>
                    <td>{{ $categoriesProductsService->quantity }}</td>
                    <td>{{ $categoriesProductsService->popular }}</td>
                    <td>{{ $categoriesProductsService->type }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
