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
    <header>
        <div style="text-align: left; margin-bottom: 20px;">
            <img src="{{ public_path('Imagenes/Logotipo_Moba.png') }}"
                alt="Logo de la Empresa" height="50">
        </div>
        <div style="text-align: right; margin-bottom: 20px;">
            <h3>Listado de Projectos</h3>
            <p>Fecha: {{ date(now()->format('Y-m-d')) }}</p>
        </div>
    </header>
    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Descripción</th>
				<th>Fecha de inicio</th>
				<th>Fecha de finalización</th>
				<th>Estado</th>
            </tr>
        </thead>
        <tbody>
            <!-- @php $i = 0; @endphp -->
            @foreach ($project as $projects)
                <tr>
                    <td>{{ ++$i }}</td>               
					<td>{{ $projects->name }}</td>
					<td>{{ $projects->description }}</td>
					<td>{{ $projects->date_start }}</td>
					<td>{{ $projects->date_end }}</td>
					<td>{{ $projects->status }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <footer>
        <div style="text-align: center; margin-top: 20px; border-top: 1px solid #ddd; padding-top: 10px;">
            <p>&copy; {{ date('Y') }} MOBA. Todos los derechos reservados.</p>
        </div>
    </footer>
</body>
</html>
