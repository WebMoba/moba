<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Servicios</title>
</head>

<body>

    <div class="moba">
        <div class="logo1">
            <img src="{{ asset('logos/LogoMoba.png') }}" alt="Logo de MOBA">
        </div>
        <div class="info">
            <h1>Moba</h1>
            <h2>agenciamoba@gmail.com</h2>
            <h3>Cl. 15a No.7A - 30, Sogamoso, Boyacá</h3>
            <h4>3112437979</h4>
        </div>
        <div class="logo2">
            <img src="{{ asset('logos/LogotuArte.png') }}" alt="Logo de Tu Arte">
        </div>
    </div>

    <div class="content">
        
        <h1 style="text-align: right;">Listado de Servicios</h1>
        <p style="text-align: right;">Fecha: {{ now()->format('Y-m-d') }}</p>

        <table>
            <thead>
                <tr>
                    <th>No</th>
    
                    <th>Nombre</th>
                    <th>Descripcion</th>
                    <th>Fecha de inicio</th>
                    <th>Fecha de finalizacion</th>
                    <th>Imagen</th>
                    <th>Categoria</th>
                </tr>
            </thead>
            <tbody>
                @php $i = 0; @endphp
                @foreach ($services as $service)
                    @php
                        $imagePath = public_path('storage/' . $service->image);
                        $imageData = base64_encode(file_get_contents($imagePath));
                        $imageExtension = pathinfo($imagePath, PATHINFO_EXTENSION);
                        $imageBase64 = 'data:image/' . $imageExtension . ';base64,' . $imageData;
                    @endphp
                    <tr>
                        <td>{{ ++$i }}</td>
    
                        <td>{{ $service->name }}</td>
                        <td>{{ $service->description }}</td>
                        <td>{{ $service->date_start }}</td>
                        <td>{{ $service->date_end }}</td>
                        <td><img src="{{ $imageBase64 }}" width="150" height="150"></td>
                        <td>{{ $service->categoriesProductsService->name }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <footer class="footer">
        <p>&copy; {{ date('Y') }} MOBA. Todos los derechos reservados.</p>
    </footer>

    <!-- Estilos CSS -->
    <style>
        h1 {
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
