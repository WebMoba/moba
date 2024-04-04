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
            <img src=""
                alt="Logo de la Empresa" height="50">
        </div>
        <div style="text-align: right; margin-bottom: 20px;">
            <h3>Listado de Cotizaciones</h3>
            <p>Fecha: {{ date(now()->format('Y-m-d')) }}</p>
        </div>
    </header>
    <table>
        <thead>
            <tr>
                <th>Id</th>
				<th>Fecha de expedición</th>
				<th>Descripción</th>
				<th>Total</th>
				<th>Descuento</th>
				<th>Estado</th>
				<th>Persona</th>
            </tr>
        </thead>
        <tbody>
            <!-- @php $i = 0; @endphp -->
            @foreach ($quote as $quotes)
                <tr>
                    <td>{{ $quotes->id }}</td>
				    <td>{{ $quotes->date_issuance }}</td>
				    <td>{{ $quotes->description }}</td>
				    <td>{{ $quotes->total }}</td>
				    <td>{{ $quotes->discount }}</td>
				    <td>{{ $quotes->status }}</td>
				    <td>{{ $quotes->people_id }}</td>
                    
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
