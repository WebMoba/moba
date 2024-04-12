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
            <img src="/resources/img/zoroChikito.jpg"
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
                <th>Nombre Cliente</th>
                <th>Id Cliente</th>
                <th>Fecha venta</th>                                            
                <th>Fecha de Cotización</th>

            </tr>
        </thead>
        <tbody>
            <!-- @php $i = 0; @endphp -->
            @foreach ($sale as $sales)
                <tr>
                    @foreach ($sales as $sale)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $sale->person->name }}</td>
                        <td>{{ $sale->person->id_card }}</td>
                        <td>{{ $sale->date }}</td>                                                
                        <td>{{ $sale->quote->date_issuance }}</td>
				                        
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
