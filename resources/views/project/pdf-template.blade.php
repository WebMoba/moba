<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Proyectos</title>
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
    </div>

    <div class="content">
        <div style="text-align: right; margin-bottom: 20px;">
            <h1>Listado de Projectos</h1>
            <p>Fecha: {{ date(now()->format('Y-m-d')) }}</p>
        </div>

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
    </div>
    

    <footer class="footer">
        <p>&copy; {{ date('Y') }} MOBA. Todos los derechos reservados.</p>
    </footer>


    <style>
        h1 {
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
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }


        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            position: relative;
            margin: 0;
            padding: 0;
            height: 100%;
        }
        .moba {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            padding: 20px;
            border-bottom: 1px solid #ddd;
            margin-bottom: 20px;
        }

        .logo1,
        .logo2 {
            flex: 0 0 auto;
            width: 25%;
        }

        .info {
            flex: 1;
            text-align: center;
        }

        .info h1 {
            margin-top: 0;
        }

        .info h2, .info h3, .info h4 {
            margin-bottom: 5px;
        }

        .content {
            margin: 20px;
            padding-bottom: 60px; /* Espacio para el footer */
        }


        img {
            max-width: 150px;
            max-height: 150px;
        }

        .footer {
            text-align: center;
            margin-top: 20px;
            border-top: 1px solid #ddd;
            padding-top: 10px;
            position: fixed;
            bottom: 0;
            width: 100%;
            background-color: white;
        }

    </style>

</body>
</html>
